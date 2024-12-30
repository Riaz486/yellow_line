<?php

namespace App\Http\Controllers;

use App\Models\AppFunctions; 
use App\Models\Career; 
use App\Models\CareerMeta; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use DB;

class CareersController extends Controller {
    private function getPreviousStepUrl($currentSlug, $steps, $jobSlug) {
        // Find the index of the current step
        $currentIndex = array_search($currentSlug, $steps);
    
        // Check if there is a previous step in the array
        if ($currentIndex !== false && $currentIndex > 0) {
            // Get the previous step slug
            $previousStepSlug = $steps[$currentIndex - 1];
            // Build and return the back URL
            return url("careers/apply/{$jobSlug}/{$previousStepSlug}");
        }
        
        // If no previous step, return an empty string
        return '';
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function careers(Request $request, $method = null, $slug = null, $step = null) {
        $data['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $data['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();
        
        if($method == 'view') {
            $data['jobData'] = Career::with('careerMeta')->where('slug', $slug)->first();
            $page = 'career-detail';
        } elseif($method == 'apply') {
            $data['jobData'] = Career::with('careerMeta')->where('slug', $slug)->first();
            $data['jobID']   = $data['jobData']->id; 

            $steps   = array('basic-details', 'education', 'work-experience', 'upload-documents');
            $backUrl = $this->getPreviousStepUrl($step, $steps, $slug);   
            $data['backUrl'] = $backUrl;
            $data['processID'] = $request->input('process');
            // $data['backUrl']   = empty($backUrl) ? '' : 'careers/apply/' . $data['jobData']->slug . '/' . $backUrl;

            if($data['processID'] != '') {
                $data['backUrl'] .= '?process=' . $data['processID'];
            }

            $data['applicationData'] = DB::table('job_application_meta')
                                        ->where('applicationID', $data['processID'])
                                        ->pluck('meta_value', 'meta_key')
                                        ->toArray();

            $data['steps'] = $step;

            $page = 'career-application';
        } else {
            $data['jobListings'] = Career::with('careerMeta')->get();
            $page = 'careers';
        }
        
        return view('pages.'.$page)->with($data); 
    }

    public function processForm(Request $request) {
        $inputData = $request->input();

        $step = $inputData['step'];

        $processID = $inputData['processID'];
        
        if($step == '2') {
            if(empty($inputData['processID'])) {
                //Initiate job application process
                $jobData = array(
                    'jobID'  => $inputData['jobID'],
                    'status' => 1 
                );

                $processID = DB::table('job_applications')->insertGetId($jobData);
            }
        } 
        

        $steps = array(1 => 'basic-details', 2 => 'education', 3 => 'work-experience', 4 => 'upload-documents');

        $applicationData = DB::table('job_applications')->where('id', $processID)->first();
        $jobData = Career::with('careerMeta')->where('id', $applicationData->jobID)->first();

        if($step == 'final') {
            DB::table('job_applications')->where('id', $processID)->update(array('status' => 2));
        }

        //Creating query param for next step
        $queryParam = '?process=' . $processID;

        // Step 1: Get existing meta keys for 'education' and 'experience' for this jobID
        $existingMetaKeys = DB::table('job_application_meta')
            ->where('applicationID', $processID)
            ->where(function ($query) use ($inputData) {
                if (isset($inputData['education'])) {
                    $query->orWhere('meta_key', 'like', 'education[%');
                }
                if (isset($inputData['experience'])) {
                    $query->orWhere('meta_key', 'like', 'experience[%');
                }
            })
            ->pluck('meta_key')
            ->toArray();
        
        // Step 2: Collect new meta keys for 'education' and 'experience'
        $newMetaKeys = [];

        if (isset($inputData['education'])) {
            foreach ($inputData['education'] as $index => $details) {
                foreach ($details as $key => $value) {
                    $meta_key = "education[{$index}][$key]";
                    $newMetaKeys[] = $meta_key;

                    $metaData = [
                        'applicationID' => $processID,
                        'meta_key'      => $meta_key,
                        'meta_value'    => $value,
                    ];
    
                    $checkData = DB::table('job_application_meta')
                        ->where('applicationID', $processID)
                        ->where('meta_key', $meta_key)
                        ->first();

                    if ($checkData) {
                        DB::table('job_application_meta')
                            ->where('applicationID', $processID)
                            ->where('meta_key', $meta_key)
                            ->update(['meta_value' => $value]);
                    } else {
                        DB::table('job_application_meta')->insert($metaData);
                    }
                }
            }
        }

        if (isset($inputData['experience'])) {
            foreach ($inputData['experience'] as $index => $details) {
                foreach ($details as $key => $value) {
                    $meta_key = "experience[{$index}][$key]";
                    $newMetaKeys[] = $meta_key;
    
                    $metaData = [
                        'applicationID'      => $processID,
                        'meta_key'   => $meta_key,
                        'meta_value' => $value,
                    ];
    
                    $checkData = DB::table('job_application_meta')
                        ->where('applicationID', $processID)
                        ->where('meta_key', $meta_key)
                        ->first();
    
                    if ($checkData) {
                        DB::table('job_application_meta')
                            ->where('applicationID', $processID)
                            ->where('meta_key', $meta_key)
                            ->update(['meta_value' => $value]);
                    } else {
                        DB::table('job_application_meta')->insert($metaData);
                    }
                }
            }
        }

        // Step 3: Delete only unused meta keys for 'education' and 'experience'
        $metaKeysToDelete = array_diff($existingMetaKeys, $newMetaKeys);

        if (!empty($metaKeysToDelete)) {
            DB::table('job_application_meta')
            ->where('applicationID', $processID)
            ->whereIn('meta_key', $metaKeysToDelete)
            ->delete();
        }

      
        // Process 'application' data (without deleting anything)
        if (isset($inputData['application'])) {
            foreach ($inputData['application'] as $key => $value) {
                if (is_array($value)) {
                    $value = serialize($value);
                }

                $metaData = [
                    'applicationID' => $processID,
                    'meta_key'   => $key,
                    'meta_value' => $value,
                ];

                $checkData = DB::table('job_application_meta')
                    ->where('applicationID', $processID)
                    ->where('meta_key', $key)
                    ->first();
           
                if ($checkData) {
                    DB::table('job_application_meta')
                        ->where('applicationID', $processID)
                        ->where('meta_key', $key)
                        ->update(['meta_value' => $value]);
                } else {
                    DB::table('job_application_meta')->insert($metaData);
                }
            }
        }

        if($inputData['step'] == 'final') {
            return redirect('careers/view/' . $jobData->slug . '?success');
        } else {
            return redirect('careers/apply/' . $jobData->slug . '/' . $steps[$step]  . $queryParam);
        }
    }

    public function processFormFiles(Request $request) {
        $inputData = $request->input();
        $filename  = $inputData['filename'];
		
		if ($request->hasFile($filename)) {      
            $directory = 'assets/uploads/applications/';
    
            // Store the file in the specified directory
            $image        = $request->file($filename);
            $originalName = $image->getClientOriginalName();
            $imageName    = uniqid() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('assets/uploads/applications'), $imageName);
    
            // Return the hidden input for the uploaded file name
            $returnFile =  '<input type="hidden" name="application['.$filename.'][]" value="' . $imageName . '" />';

            return response()->json([
                'returnFile'        => $returnFile,
                'originalFilename'  => $originalName,
                'uploadedFile'      => $imageName
            ]);
		}
    }
}

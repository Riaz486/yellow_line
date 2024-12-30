<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Http\Request;
use App\Models\AppFunctions; 
use App\Models\Career;
use App\Models\CareertMeta; 
use App\Models\JobApplication;
use App\Models\JobApplicationMeta;
use DB;
use Auth;

class AdminCareersController extends Controller {
    public function careers($method = null, $id = null) {
        $functions = new AppFunctions;
        $userID = Auth::id();   

        if($method == 'create') {
			$data['title'] = 'Create Job';

			// Initialize default values
            $data['id']              = $id;
            $data['title']           = '';
            $data['location']        = '';
            $data['age_limit']       = '';
            $data['qualification']   = '';
            $data['job_description'] = '';
            $data['last_date_apply'] = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $career = Career::findOrFail($id); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['title']           = $career->title;
                $data['location']        = $career->location; // Ensure this matches your column name
                $data['age_limit']       = $career->age_limit;
                $data['qualification']   = $career->qualification;
                $data['job_description'] = $career->job_description; 
                $data['last_date_apply'] = $career->last_date_apply;
            }

			$page = 'create-job';
		} elseif($method == 'delete') {
			$career = Career::find($id);

            if ($career) {
                $career->delete();
        
                $message = '<div class="message"><i class="fa fa-check-circle"></i> Post Deleted Successfully.</div>';
            } else {
                $message = '<div class="message"><i class="fa fa-exclamation-circle"></i> Post not found.</div>';
            }
        
            return redirect()->back()->with(['message' => $message]);
		} elseif($method == 'applications') {
            $data['applicationData'] = DB::table('job_applications')->where('status', '>', 1)->get();

			$page = 'job-appications';
        } elseif($method == 'view-application') {
            $data['applicationData'] = DB::table('job_applications')->where('id', $id)->first();
            $data['applicationMeta'] = $data['applicationData'] = DB::table('job_application_meta')
            ->where('applicationID', $id)
            ->pluck('meta_value', 'meta_key')
            ->toArray();

			$page = 'view-appication';
		} else {
			$data['title'] = 'Job Post';

			$data['careersData'] = Career::all();
			$page = 'all-jobs'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createJob(Request $request) {
        $validatedData = $request->validate([
            'careers.title' => 'required|string|max:255',
            'careers.location' => 'required|string|max:255',
            'careers.age_limit' => 'required|string',
            'careers.qualification' => 'required|string',
            'careers.job_description' => 'required|string',
            'careers.last_date_apply' => 'required|date'
        ]);

        $DBfield = [];
        $data = $request->input();

        try {
            $careers = new Career();

            // Process the blog fields
            foreach ($validatedData['careers'] as $key => $field_value) {
                $DBfield[$key] = $field_value ?: 'N/A'; // Default value for empty fields
            }

            $slug = AppFunctions::generateUniqueSlug($DBfield['title'], 'careers');

            $DBfield['slug'] = $slug;

            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('careers')->where('id', $data['id'])->update($DBfield);
                
                $jobID = $data['id'];
            } else {
                $DBfield['created_at'] = now(); 
                DB::table('careers')->insert($DBfield);
            }

            return redirect('admin/careers')->with(['message' => '<div class="alert alert-success">Post Successfully Submitted</div>']);
        } catch(Exception $e){
            return redirect()->back()
            ->withErrors(['message' => 'An error occurred while processing your request.'])
            ->withInput();
        }
    }
}

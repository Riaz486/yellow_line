<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Http\Request;
use App\Models\AppFunctions; 
use App\Models\Project; 
use App\Models\ProjectMeta; 
use App\Models\ProjectFaq; 
use DB;
use Auth;

class AdminProjectsController extends Controller {
    private static function create_project_meta($projectID, $meta_key, $meta_value) {

    }

    public function projects(Request $request, $method = null, $id = null) {
        $functions = new AppFunctions;
        $userID = Auth::id();   

        if($method == 'create') {
			$data['title'] = 'Create Project';

			// Initialize default values
            $data['id']                 = $id;
            $data['title']              = '';
            $data['content']            = '';
            $data['video_file']         = '';
            $data['thumbnail']          = '';
            $data['cta_heading']        = '';
            $data['cta_description']    = '';
            $data['cta_file']           = '';  
            $data['banner_title']       = '';
            $data['banner_description'] = '';  
            $data['map_iframe']         = '';  
            $data['custom_css']         = '';  
            $data['theme']              = '';  
            $data['projectMeta']        = array();
            $data['projectFaq']         = array();

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $project = Project::with(['metas', 'faqs'])->findOrFail($id);

                // Assign values from the fetched blog data
                $data['title']              = $project->title;
                $data['content']            = $project->content;
                $data['video_file']         = $project->video_file;
                $data['thumbnail']          = $project->thumbnail;
                $data['cta_heading']        = $project->cta_heading;
                $data['cta_description']    = $project->cta_description;
                $data['cta_file']           = $project->cta_file;
                $data['banner_title']       = $project->banner_title;
                $data['banner_description'] = $project->banner_description;
                $data['map_iframe']         = $project->map_iframe;
                $data['custom_css']         = $project->custom_css;
                $data['theme']              = $project->theme;
                $data['projectMeta']        = $project->projectMeta;
                $data['projectFaq']         = DB::table('projects_faq')->where(array('projectID' => $id))->get();
            }

			$page = 'create-project';
		} elseif($method == 'delete') {
			$procurement = Procurement::find($id);

            if ($procurement) {
                $procurement->delete();
        
                $message = '<div class="message"><i class="fa fa-check-circle"></i> Procurement Deleted Successfully.</div>';
            } else {
                $message = '<div class="message"><i class="fa fa-exclamation-circle"></i> Post not found.</div>';
            }
        
            return redirect()->back()->with(['message' => $message]);
		} else {
			$data['title'] = 'Projects';
            
            $data['projectsData'] = Project::all();

			$page = 'manage-projects'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }

    public function createProject(Request $request) {
        $validatedData = $request->validate([
            'project.title'              => 'required|string|max:255',
            'project.content'            => 'nullable|string',
            'project.theme'              => 'required|string',
            'project.cta_heading'        => 'required|string|max:255',
            'project.cta_description'    => 'required|string',
            'project.banner_title'       => 'required|string|max:255',
            'project.banner_description' => 'required|string',
            'project.map_iframe'         => 'nullable|string',
            'project.custom_css'         => 'nullable|string',
        ]);

        $DBfield = [];
        $data = $request->input();

        try {
            DB::beginTransaction();

            // Process the blog fields
            foreach ($validatedData['project'] as $key => $field_value) {
                $DBfield[$key] = $field_value; // Handle other fields normally
            }
            
            $slug = AppFunctions::generateUniqueSlug($DBfield['title'], 'projects');
            
            $DBfield['slug'] = $slug;
            
            if(!empty($_FILES['thumbnail']['name'])) {
                $imageName = uniqid().'.'.$request->thumbnail->extension();  
                $request->thumbnail->move(public_path('assets/uploads/projects'), $imageName);

                $DBfield['thumbnail'] = $imageName;
            }
            
            if(!empty($_FILES['videoFile']['name'])) {
                // $videoFile = uniqid().'.'.$request->videoFile->extension();  
                // $request->videoFile->move(public_path('assets/uploads/projects'), $videoFile);

                // $DBfield['video_file'] = $videoFile;
                $DBfield['video_file'] = 'N/A';
            }

            $DBfield['cta_file'] = 'N/A';

            if (!empty($data['id'])) {
                $projectID = $data['id'];

                $DBfield['updated_at'] = now();
                
                DB::table('projects')->where('ID', $data['id'])->update($DBfield);
            } else {

                $project = Project::create($DBfield);
                
                $projectID = $project->id;
            }

            if(isset($data['faqData'])) {
                // Delete existing FAQs for this project
                ProjectFaq::where('projectID', $projectID)->delete();

                foreach($data['faqData'] as $faq):
                    ProjectFaq::create([
                        'projectID' => $projectID, // Assuming you have the projectID available
                        'question'  => $faq['question'],
                        'answer'    => $faq['answer'],
                    ]);
                endforeach;
            }

            $slideShowImages = array();

            if ($request->has('gallery')) {
                // Fetch existing gallery images from the database and unserialize them
                $serializedData = ProjectMeta::get_meta_value($projectID, 'project_gallery');
                
                if ($serializedData === '[]') {
                    $existingImages = [];
                } elseif (!empty($serializedData) && is_string($serializedData)) {
                    $existingImages = @unserialize($serializedData) ?: [];
                } else {
                    $existingImages = [];
                }
                
                $newImages = [];
            
                foreach ($request->gallery as $key => $gallery) {
                    if (isset($gallery['galleryImage']) && $request->hasFile("gallery.$key.galleryImage")) {
                        $image = $request->file("gallery.$key.galleryImage");
            
                        // Generate a unique name and move the file to the destination
                        $imageName = uniqid() . '-' . $key . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('assets/uploads/projects'), $imageName);
            
                        // Add the new image to the array
                        $newImages[] = $imageName;
            
                        // Delete the old image if it exists
                        if (isset($gallery['existingImage']) && file_exists(public_path('assets/uploads/projects/' . $gallery['existingImage']))) {
                            unlink(public_path('assets/uploads/projects/' . $gallery['existingImage']));
                        }
                    } else {
                        // No new file uploaded; retain the existing image
                        $newImages[] = $gallery['existingImage'];
                    }
                }
            
                $slideShowImages = serialize($newImages);
                ProjectMeta::create_project_meta($projectID, 'project_gallery', $slideShowImages);
            }


            //Create Meta Data Now
            foreach($data['metaData'] as $key => $field):
                ProjectMeta::create_project_meta($projectID, $key, $field);
            endforeach;

            $directory = 'assets/uploads/projects';
            
            if(!empty($_FILES['cta_download_file']['name'])) {
                $file         = $request->file('cta_download_file');
                $originalName = $file->getClientOriginalName();
                $filename     = uniqid() . '.' . $file->getClientOriginalExtension();
                
                $file->move(public_path($directory), $filename);

                ProjectMeta::create_project_meta($projectID, 'cta_download_file', $filename);
            }

            if(!empty($_FILES['mobile_banner_background']['name'])) {
                $bg_file       = $request->file('mobile_banner_background');
                $originalName  = $bg_file->getClientOriginalName();
                $mobile_bg_img = uniqid() . '.' . $bg_file->getClientOriginalExtension();
                
                $bg_file->move(public_path($directory), $mobile_bg_img);

                ProjectMeta::create_project_meta($projectID, 'mobile_banner_background', $mobile_bg_img);
            }

            DB::commit();

            return redirect('admin/projects');
        } catch(ValidationException $e){
            DB::rollBack();

            print_r($e->errors());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AppFunctions; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use DB;
use Auth;

class AdminWidgetsController extends Controller {
    public function gallery($postType = null, $method = null, $id = null) {
        $functions = new AppFunctions;

        $data['functions'] = $functions;
        $data['postName']  = $postType;
        $data['postType']  = $postType;
        
        if($method == 'create') {
            $data['title'] = 'Create Gallery';

			// Initialize default values
            $data['id']             = $id;
            $data['title']          = '';
            $data['featured_image'] = '';
            $data['filename']       = '';
            $data['type']           = '';
            $data['created_at']     = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $gallery = DB::table('gallery')->where('id', $id)->first(); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['title']          = $gallery->title;
                $data['featured_image'] = $gallery->featured_image; // Ensure this matches your column name
                $data['filename']       = $gallery->filename;
                $data['type']           = $gallery->type;
                $data['created_at']     = $gallery->created_at;
            }

			$page = 'create-gallery';
        } elseif($method == 'delete') {
            DB::table('gallery')->where(array('id' => $id))->delete();

            return redirect('admin/manage-gallery');
        } else {
            $data['galleryData'] = DB::table('gallery')->where('type', $postType)->get();
            $page = 'manage-gallery';
        }

        return view('admin.pages.' . $page)->with($data); 
    }

    public function createGallery(Request $request) {
        $data = $request->input();

        try {
            $DBfield = array();

            foreach($data['gallery'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;

            if(!empty($_FILES['thumbnail']['name'])) {
                $imageName = time().'.'.$request->thumbnail->extension();  
                $request->thumbnail->move(public_path('assets/uploads/gallery'), $imageName);

                $DBfield['featured_image'] = $imageName;
            }
            
            if(!empty($_FILES['videoFile']['name'])) {
                $videoFile = time().'.'.$request->videoFile->extension();  
                $request->videoFile->move(public_path('assets/uploads/gallery'), $videoFile);

                $DBfield['filename'] = $videoFile;
            }

            if($data['id'] != '') {
                DB::table('gallery')->where('id', $data['id'])->update($DBfield);
            } else {
                DB::table('gallery')->insert($DBfield);
            }

            return redirect('admin/gallery/'.$data['gallery']['type']);
        } catch (Exception $e) {
            return redirect('admin/gallery/error');
        }
    }

    public function messages($method = null, $id = null) {
        $functions = new AppFunctions;

        $data['functions'] = $functions;
        
        if($method == 'create') {
            $data['title'] = 'Create Message';

			// Initialize default values
            $data['id']             = $id;
            $data['title']          = '';
            $data['sub_title']      = '';
            $data['featured_image'] = '';
            $data['description']    = '';
            $data['designation']    = '';
            $data['department']     = '';
            $data['location']       = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $message = DB::table('public_message')->where('id', $id)->first(); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['title']          = $message->title;
                $data['sub_title']      = $message->sub_title; 
                $data['featured_image'] = $message->featured_image;
                $data['description']    = $message->description;
                $data['designation']    = $message->designation;
                $data['department']     = $message->department;
                $data['location']       = $message->location;
            }

			$page = 'create-message';
        } elseif($method == 'delete') {
            DB::table('public_message')->where(array('id' => $id))->delete();

            return Redirect::back();
        } else {
            $data['messageData'] = DB::table('public_message')->get();
            $page = 'manage-messages';
        }

        return view('admin.pages.' . $page)->with($data); 
    }
    
    public function createMessage(Request $request) {
        $data = $request->input();

        try {
            $DBfield = array();

            foreach($data['message'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;

            if(!empty($_FILES['thumbnail']['name'])) {
                $imageName = time().'.'.$request->thumbnail->extension();  
                $request->thumbnail->move(public_path('assets/uploads/message'), $imageName);

                $DBfield['featured_image'] = $imageName;
            }

            $DBfield['slug'] = AppFunctions::generateUniqueSlug($DBfield['title'], 'public_message');

            if($data['id'] != '') {
                DB::table('public_message')->where('id', $data['id'])->update($DBfield);
            } else {
                DB::table('public_message')->insert($DBfield);
            }

            return redirect('admin/messages');
        } catch (Exception $e) {
            return redirect('admin/messages/error');
        }
    }

    public function processWidget(Request $request) {
        $data = $request->input();

        try {
            $DBfield  = array();
            $dataUrl  = $data['response'];
            $database = $data['processType']; 

            foreach($data['widget'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;

            if(!empty($_FILES['file']['name'])) {
                $imageName = time().'.'.$request->file->extension();  
                $request->file->move(public_path('assets/uploads/'), $imageName);

                $DBfield['file'] = $imageName;
            }

            $slugExists = Schema::hasColumn($database, 'slug');

            if ($slugExists) {
                $DBfield['slug'] = AppFunctions::generateUniqueSlug($DBfield['title'], $database);
            }

            if($data['id'] != '') {
                DB::table($database)->where('id', $data['id'])->update($DBfield);
            } else {
                DB::table($database)->insert($DBfield);
            }

            return redirect('admin/' . $dataUrl);
        } catch (Exception $e) {
            return redirect('admin/' . $dataUrl . '/error');
        }
    }

    public function team(Request $request, $method = null, $id = null) {
        $functions = new AppFunctions;

        $data['functions'] = $functions;
        
        if($method == 'create') {
            $data['title'] = 'Create Team Member';

            $data['categoriesData'] = DB::table('team_categories')->get();

			// Initialize default values
            $data['id']          = $id;
            $data['name']        = '';
            $data['file']        = '';
            $data['description'] = '';
            $data['designation'] = '';
            $data['department']  = '';
            $data['location']    = '';
            $data['featured']    = '';
            $data['categoryID']  = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $team = DB::table('team_members')->where('id', $id)->first(); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['name']        = $team->name;
                $data['file']        = $team->file;
                $data['description'] = $team->description;
                $data['designation'] = $team->designation;
                $data['department']  = $team->department;
                $data['location']    = $team->location;
                $data['categoryID']  = $team->categoryID;
                $data['featured']    = $team->featured;
            }

			$page = 'create-team-member';
        } elseif($method == 'delete') {
            DB::table('team_members')->where(array('id' => $id))->delete();

            return redirect('admin/team');
        } elseif($method == 'categories') {
            $categories = DB::table('team_categories')->get();
            $data['mainCategories'] = $categories;

			$page = 'team-categories';
        } else {
            $data['categoriesData'] = DB::table('team_categories')->get();

            $category = $request->input('category');
            $data['selectedID'] = '';

            $teamData = DB::table('team_members');
            
            if (!empty($category) && $category != 'all') {
                $teamData->where('categoryID', $category);
                $data['selectedID'] = $category;
            }
            
            $teamData = $teamData->get();

            $data['teamData'] = $teamData;

            $page = 'manage-team-members';
        }

        return view('admin.pages.' . $page)->with($data); 
    }

    public function createTeamCategory(Request $request) {
        $DBfield = [];
        $data = $request->input();

        try {
            // Process the blog fields
            foreach ($data['category'] as $key => $field_value) {
                $DBfield[$key] = $field_value ?: 'N/A'; // Default value for empty fields
            }

            $slug = AppFunctions::generateUniqueSlug($DBfield['name'], 'team_categories');

            $DBfield['slug'] = $slug;

            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('team_categories')->where('ID', $data['id'])->update($DBfield);
                $request->session()->flash('success', 'Post updated successfully!'); // Flash message
            } else {
                $DBfield['created_at'] = now(); 
                DB::table('team_categories')->insert($DBfield);
            }

            return redirect()->back()->with(['message' => '<div class="alert alert-success">Post Successfully Submitted</div>']);
        } catch(Exception $e){
            return redirect()->back()->with(['message' => '<div class="alert alert-danger">An error occurred while processing your quote.</div>'], 500);
        }
    }

    public function boardMembers($method = null, $id = null) {
        $functions = new AppFunctions;

        $data['functions'] = $functions;
        
        if($method == 'create') {
            $data['title'] = 'Create Board Member';


			// Initialize default values
            $data['id']          = $id;
            $data['name']        = '';
            $data['file']        = '';
            $data['description'] = '';
            $data['designation'] = '';
            $data['department']  = '';
            $data['location']    = '';
            $data['featured']    = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $team = DB::table('board_members')->where('id', $id)->first(); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['name']        = $team->name;
                $data['file']        = $team->file;
                $data['description'] = $team->description;
                $data['designation'] = $team->designation;
                $data['department']  = $team->department;
                $data['location']    = $team->location;
                $data['featured']    = $team->featured;
            }

			$page = 'create-board-member';
        } elseif($method == 'delete') {
            DB::table('board_members')->where(array('id' => $id))->delete();

            return redirect('admin/board-members');
        } else {
            $data['teamData'] = DB::table('board_members')->get();
            $page = 'board-members';
        }

        return view('admin.pages.' . $page)->with($data); 
    }

    public function fares($method = null, $id = null) {

        if($method == 'delete') {
            DB::table('fares')->where(array('id' => $id))->delete();

            return redirect('admin/manage-fares');
        } else {
            $data['faresData'] = DB::table('fares')->get();
            $page = 'manage-fares';

            return view('admin.pages.' . $page)->with($data); 
        }
    }
}

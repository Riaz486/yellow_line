<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Http\Request;
use App\Models\AppFunctions; 
use App\Models\Post;
use App\Models\Category;
use App\Models\PostMeta; 
use DB;
use Auth;

class AdminPosteventsController extends Controller {
    private function buildTree(array $categories, $parentId = null) {
        $branch = [];

        foreach ($categories as $category) {
            if ($category['parentID'] == $parentId) {
                $children = $this->buildTree($categories, $category['id']);
                if ($children) {
                    $category['children'] = $children;
                }
                $branch[] = $category;
            }
        }

        return $branch;
    }

    public function posts(Request $request, $method = null, $id = null) {
        $functions = new AppFunctions;
        $userID = Auth::id();   
        
        $data['postType'] = 'events';

        if($method == 'create') {
			$data['title'] = 'Create Blog';

			// Initialize default values
            $data['id'] = $id;
            $data['title'] = '';
            $data['categoryID'] = '';
            $data['content'] = '';
            $data['created_at'] = '';
            $data['event_date'] = '';
            $data['featured_image'] = '';
            $data['venue'] = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $blog = DB::table('events')->where('id', $id)->first(); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['title'] = $blog->title;
                $data['content'] = $blog->content;
                $data['featured_image'] = $blog->featured_image;
                $data['created_at'] = $blog->created_at;
                $data['event_date'] = $blog->event_date;
                $data['venue'] = $blog->venue;
            }

			$page = 'create-post';
		} elseif($method == 'delete') {

            $message = '<div class="message"><i class="fa fa-check-circle"></i> Post Deleted Successfully.</div>';
        
            return redirect()->back()->with(['message' => $message]);
		} else {
			$data['title'] = 'Posts';
            
            $data['selectedID'] = '';

            // Execute the query and get the results
            $posts = DB::table('events')->get();

			$data['postData'] = $posts;

			$page = 'all-posts'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }
}

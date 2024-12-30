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

class AdminPostController extends Controller {
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
        
        $data['postType'] = 'posts';

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
            $data['featured'] = '';
            $data['no_of_days'] = '';

            $categories = Category::with('parent')
                            ->where('postType', 'posts')
                            ->get();

            $data['mainCategories'] = $categories;
            $categoriesSet = $categories->toArray();
            $data['categoriesData'] = $this->buildTree($categoriesSet);
        
            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $blog = Post::findOrFail($id); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['title'] = $blog->title;
                $data['categoryID'] = $blog->categoryID; // Ensure this matches your column name
                $data['content'] = $blog->content;
                $data['featured_image'] = $blog->featured_image;
                $data['featured'] = $blog->featured;
                $data['no_of_days'] = $blog->no_of_days;
                $data['created_at'] = $blog->created_at;
                $data['event_date'] = $blog->event_date;
            }

			$page = 'create-post';
		} elseif($method == 'delete') {
			$post = Post::find($id);

            if ($post) {
                $post->delete();
        
                $message = '<div class="message"><i class="fa fa-check-circle"></i> Post Deleted Successfully.</div>';
            } else {
                $message = '<div class="message"><i class="fa fa-exclamation-circle"></i> Post not found.</div>';
            }
        
            return redirect()->back()->with(['message' => $message]);
        } elseif($method == 'deleteCategory') {
            $category = Category::find($id);

            if ($category) {
                $category->delete();
        
                $message = '<div class="message"><i class="fa fa-check-circle"></i> Post Deleted Successfully.</div>';
            } else {
                $message = '<div class="message"><i class="fa fa-exclamation-circle"></i> Post not found.</div>';
            }
        
            return redirect()->back()->with(['message' => $message]);
		} elseif($method == 'categories') {
            $categories = Category::with('parent')
                            ->where('postType', 'posts')->get();
            
            $data['mainCategories'] = $categories;
            $categoriesSet = $categories->toArray();
            $data['categoriesData'] = $this->buildTree($categoriesSet);

			$page = 'categories';
		} else {
			$data['title'] = 'Posts';
            
            $category = $request->input('category');
            $data['selectedID'] = '';

            $postQuery = Post::select('posts.*', 'categories.name as categoryName')
                ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id');

            // If a category is selected, filter by that category ID
            if (!empty($category)) {
                $postQuery->where('posts.categoryID', $category);
                $data['selectedID'] = $category;
            }

            $postQuery->where('posts.postType', 'posts');

            // Execute the query and get the results
            $posts = $postQuery->get();

			$data['postData'] = $posts;
            $data['categoriesData'] = DB::table('categories')->where('postType', 'posts')->get();

			$page = 'all-posts'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request) {
        $validatedData = $request->validate([
            'blog.title' => 'required|string|max:255',
            'blog.content' => 'required|string',
            'blog.categoryID' => 'required|exists:categories,id',
            'userFile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max size as needed
        ]);

        $DBfield = [];
        $data = $request->input();

        try {
            // Process the blog fields
            foreach ($data['blog'] as $key => $field_value) {
                $DBfield[$key] = $field_value ?: 'N/A'; // Default value for empty fields
            }

            if($request->hasFile('userFile')) {
                $image = $request->file('userFile');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->userFile->move(public_path('assets/uploads/posts'), $imageName);
                $DBfield['featured_image'] = $imageName; // Save the new image name
            }

            if($request->hasFile('pdfFile')) {
                $pdfFile = $request->file('pdfFile');
                $pdfFileName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
                $request->pdfFile->move(public_path('assets/uploads/posts'), $pdfFileName);
                $DBfield['pdfFile'] = $pdfFileName; // Save the new image name
            }

            $currentTitle = '';

            if(!empty($data['id'])) {
                $currentPostData = DB::table('posts')->where('id', $data['id'])->first();
                $currentTitle = $currentPostData->title;
            }

            if($currentTitle != $DBfield['title']) {
                $slug = AppFunctions::generateUniqueSlug($DBfield['title'], 'posts');

                $DBfield['slug'] = $slug;
            }

            if($DBfield['created_at'] == 'N/A' || $DBfield['created_at'] == '') {
                $DBfield['created_at'] = now();
            }
            
            $postID = $data['id'];

            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('posts')->where('ID', $data['id'])->update($DBfield);
                $request->session()->flash('success', 'Post updated successfully!'); // Flash message
            } else {
                $postID = DB::table('posts')->insertGetId($DBfield);
            }

            if(!empty($data['tags'])) {
                $tagsArray = json_decode($data['tags'], true);

                $tagValues = array_map(function($tag) {
                    return $tag['value'];
                }, $tagsArray);

                DB::table('post_meta')->where(array('postID' => $postID, 'meta_key' => 'post_tags'))->delete();

                $tagValues = serialize($tagValues);
                $dataMeta = array(
                    'postID'     => $postID,
                    'meta_key'   => 'post_tags',
                    'meta_value' => $tagValues
                );

                DB::table('post_meta')->insert($dataMeta);
            }

            $slideShowImages = array();

            if ($request->has('gallery')) {
                foreach ($request->gallery as $key => $gallery) {
                    $imageName = null;
                    $videoName = null;
            
                    // Check if the type is 'image' and handle the image file
                    if ($gallery['type'] === 'image' && isset($gallery['galleryImage'])) {
                        $image = $request->file("gallery.$key.galleryImage"); // Fetch the specific file input
            
                        if ($image) {
                            // Generate a unique name for the image and move it to the uploads folder
                            $imageName = time() . '-' . $key .'.' . $image->getClientOriginalExtension();
                            $image->move(public_path('assets/uploads/posts'), $imageName);
                        }
                    }
            
                    // Check if the type is 'video' and handle the video file
                    if ($gallery['type'] === 'video' && isset($gallery['videoFile'])) {
                        $video = $request->file("gallery.$key.videoFile"); // Fetch the specific video file
            
                        if ($video) {
                            // Generate a unique name for the video and move it to the uploads folder
                            $videoName = time() . '.' . $video->getClientOriginalExtension();
                            $video->move(public_path('assets/uploads/posts'), $videoName);
                        }
                    }
                    
                    $galleryData = array(
                        'postID'   => $postID,
                        'type'      => $gallery['type'],
                        'thumbnail' => $imageName,  
                        'filename'  => $videoName ?? 'N/A', 
                    );

                    // Save the entry into the database
                    DB::table('post_gallery')->insert($galleryData);
                }     
            }

            return redirect('admin/' . $DBfield['postType'])->with(['message' => '<div class="alert alert-success">Post Successfully Submitted</div>']);
        } catch(Exception $e){
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->with([
                    'message' => '<div class="alert alert-danger">An error occurred while processing your category submission.</div>'
                ])
                ->withInput();
        }
    }

    public function createCategory(Request $request) {
        $validatedData = $request->validate([
            'category.name' => 'required|string|max:255',
            'category.parentID' => 'nullable|integer',
            'category.status' => 'required',
            'category.postType' => 'required'
        ]);

        $DBfield = [];
        $data = $request->input();

        try {
            DB::beginTransaction();

            // Process the blog fields
            foreach ($validatedData['category'] as $key => $field_value) {
                $DBfield[$key] = $field_value; // Handle other fields normally
            }

            $slug = AppFunctions::generateUniqueSlug($DBfield['name'], 'categories');

            $DBfield['slug'] = $slug;

            if (empty($DBfield['parentID']) || $DBfield['parentID'] == 0) {
                $DBfield['parentID'] = null;
            }
            
            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('categories')->where('ID', $data['id'])->update($DBfield);
                $request->session()->flash('success', 'Post updated successfully!'); // Flash message
            } else {
                $DBfield['created_at'] = now(); 
                DB::table('categories')->insert($DBfield);
            }

            DB::commit();

            return redirect()->back()->with([
                'message' => '<div class="alert alert-success">Category Successfully Submitted</div>'
            ]);
        } catch(Exception $e){
            DB::rollBack();

            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->with([
                    'message' => '<div class="alert alert-danger">An error occurred while processing your category submission.</div>'
                ])
                ->withInput();
        }
    }

    public function createEvent(Request $request) {
        $validatedData = $request->validate([
            'blog.title' => 'required|string|max:255',
            'blog.content' => 'required|string',
            'userFile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max size as needed
        ]);

        $DBfield = [];
        $data = $request->input();

        try {
            // Process the blog fields
            foreach ($data['blog'] as $key => $field_value) {
                $DBfield[$key] = $field_value ?: 'N/A'; // Default value for empty fields
            }

            if($request->hasFile('userFile')) {
                $image = $request->file('userFile');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->userFile->move(public_path('assets/uploads/posts'), $imageName);
                $DBfield['featured_image'] = $imageName; // Save the new image name
            }

            $currentTitle = '';

            if(!empty($data['id'])) {
                $currentPostData = DB::table('events')->where('id', $data['id'])->first();
                $currentTitle = $currentPostData->title;
            }

            if($currentTitle != $DBfield['title']) {
                $slug = AppFunctions::generateUniqueSlug($DBfield['title'], 'events');

                $DBfield['slug'] = $slug;
            }

            if($DBfield['created_at'] == 'N/A' || $DBfield['created_at'] == '') {
                $DBfield['created_at'] = now();
            }
            
            $postID = $data['id'];

            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('events')->where('ID', $data['id'])->update($DBfield);
                $request->session()->flash('success', 'Post updated successfully!'); // Flash message
            } else {
                $postID = DB::table('events')->insertGetId($DBfield);
            }

           
            if ($request->has('gallery')) {
                foreach ($request->gallery as $key => $gallery) {
                    $imageName = null;
                    $videoName = null;
            
                    // Check if the type is 'image' and handle the image file
                    if ($gallery['type'] === 'image' && isset($gallery['galleryImage'])) {
                        $image = $request->file("gallery.$key.galleryImage"); // Fetch the specific file input
            
                        if ($image) {
                            // Generate a unique name for the image and move it to the uploads folder
                            $imageName = time() . '-' . $key .'.' . $image->getClientOriginalExtension();
                            $image->move(public_path('assets/uploads/posts'), $imageName);
                        }
                    }
            
                    // Check if the type is 'video' and handle the video file
                    if ($gallery['type'] === 'video' && isset($gallery['videoFile'])) {
                        $video = $request->file("gallery.$key.videoFile"); // Fetch the specific video file
            
                        if ($video) {
                            // Generate a unique name for the video and move it to the uploads folder
                            $videoName = time() . '.' . $video->getClientOriginalExtension();
                            $video->move(public_path('assets/uploads/posts'), $videoName);
                        }
                    }
                    
                    $galleryData = array(
                        'eventID'   => $postID,
                        'type'      => $gallery['type'],
                        'thumbnail' => $imageName,  
                        'filename'  => $videoName ?? 'N/A', 
                    );

                    // Save the entry into the database
                    DB::table('event_gallery')->insert($galleryData);
                }     
            }

            return redirect('admin/events')->with(['message' => '<div class="alert alert-success">Post Successfully Submitted</div>']);
        } catch(Exception $e){
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->with([
                    'message' => '<div class="alert alert-danger">An error occurred while processing your category submission.</div>'
                ])
                ->withInput();
        }
    }
}

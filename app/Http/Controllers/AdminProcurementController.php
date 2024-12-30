<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Http\Request;
use App\Models\AppFunctions; 
use App\Models\Procurement;
use App\Models\ProcurementCategory;
use App\Models\ProcurementFile; 
use DB;
use Auth;

class AdminProcurementController extends Controller {
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

    public function procurement(Request $request, $method = null, $id = null) {
        $functions = new AppFunctions;
        $userID = Auth::id();   

        if($method == 'create') {
			$data['title'] = 'Create Procurement';

			// Initialize default values
            $data['id']                = $id;
            $data['title']             = '';
            $data['categoryID']        = '';
            $data['proposalRequestID'] = '';
            $data['city']              = '';
            $data['department']        = '';
            $data['date_publication']  = '';
            $data['date_closing']      = '';  
            $data['featured']          = '';
            $data['no_of_days']        = '';  

            $categories = ProcurementCategory::with('parent')
                            ->get();

            $data['mainCategories'] = $categories;
            $categoriesSet = $categories->toArray();
            $data['categoriesData'] = $this->buildTree($categoriesSet);
            $data['attachments'] = array();

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $procurement = Procurement::findOrFail($id); // Fetch the blog post by ID
                $data['attachments'] = ProcurementFile::where('procurementID', $id)->get();
        
                // Assign values from the fetched blog data
                $data['title']             = $procurement->title;
                $data['categoryID']        = $procurement->categoryID; // Ensure this matches your column name
                $data['proposalRequestID'] = $procurement->proposalRequestID;
                $data['city']              = $procurement->city;
                $data['department']        = $procurement->department;
                $data['date_publication']  = $procurement->date_publication;
                $data['date_closing']      = $procurement->date_closing;
                $data['featured']          = $procurement->featured;
                $data['no_of_days']        = $procurement->no_of_days;
            }

			$page = 'create-procurement';
        } elseif($method == 'categories') {
            $categories = ProcurementCategory::with('parent')->get();
            
            $data['mainCategories'] = $categories;
            $categoriesSet = $categories->toArray();
            $data['categoriesData'] = $this->buildTree($categoriesSet);

			$page = 'procurement-categories';
		} elseif($method == 'delete') {
			$procurement = Procurement::find($id);

            if ($procurement) {
                $procurement->delete();
        
                $message = '<div class="message"><i class="fa fa-check-circle"></i> Procurement Deleted Successfully.</div>';
            } else {
                $message = '<div class="message"><i class="fa fa-exclamation-circle"></i> Post not found.</div>';
            }
        
            return redirect()->back()->with(['message' => $message]);
        } elseif($method == 'deleteCategory') {
            $category = ProcurementCategory::find($id);

            if ($category) {
                $category->delete();
        
                $message = '<div class="message"><i class="fa fa-check-circle"></i> Category Deleted Successfully.</div>';
            } else {
                $message = '<div class="message"><i class="fa fa-exclamation-circle"></i> Post not found.</div>';
            }
        
            return redirect()->back()->with(['message' => $message]);
		} else {
			$data['title'] = 'Procurement';
            
            $category = $request->input('category');
            $data['selectedID'] = '';

            $postQuery = Procurement::select('procurement.*', 'procurement_categories.name as categoryName')
                ->leftJoin('procurement_categories', 'procurement.categoryID', '=', 'procurement_categories.id');

            // If a category is selected, filter by that category ID
            if (!empty($category)) {
                $postQuery->where('procurement.categoryID', $category);
                $data['selectedID'] = $category;
            }

            $posts = $postQuery->get();

			$data['procurementData'] = $posts;
            $data['categoriesData'] = DB::table('procurement_categories')->get();

			$page = 'manage-procurements'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProcurement(Request $request) {
        $DBfield = [];
        $data = $request->input();

        try {
            // Process the blog fields
            foreach ($data['formData'] as $key => $field_value) {
                $DBfield[$key] = $field_value ?: 'N/A'; // Default value for empty fields
            }

            $currentTitle = '';

            if(!empty($data['id'])) {
                $currentPostData = DB::table('procurement')->where('id', $data['id'])->first();
                $currentTitle = $currentPostData->title;
            }

            if($currentTitle != $DBfield['title']) {
                $slug = AppFunctions::generateUniqueSlug($DBfield['title'], 'procurement');

                $DBfield['slug'] = $slug;
            }

            $postID = $data['id'];

            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('procurement')->where('ID', $data['id'])->update($DBfield);
                $request->session()->flash('success', 'Procurement updated successfully!'); // Flash message
            } else {
                $DBfield['created_at'] = now();
                $postID = DB::table('procurement')->insertGetId($DBfield);
            }

            if ($request->has('files')) {
                $existingFiles = ProcurementFile::where('procurementID', $postID)->get();

                $newFiles = [];

                foreach ($data['files'] as $index => $file) {
                    if (isset($file['attachment']) && $request->hasFile("files.$index.attachment")) {
                        $file = $request->file("files.$index.attachment");

                        // Generate a unique name and move the file to the destination
                        $fileName = uniqid() . '-' . $index . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('assets/uploads/procurement'), $fileName);
             
                        // Add the new image to the array
                        $newFiles[] = array('title' => $data['files'][$index]['title'], 'name' => $fileName);
             
                        // Delete the old image if it exists
                        if (isset($data['files'][$index]['existingAttachment']) && file_exists(public_path('assets/uploads/procurement/' . $data['files'][$index]['existingAttachment']))) {
                            unlink(public_path('assets/uploads/procurement/' . $data['files'][$index]['existingAttachment']));
                        }
                    } else {
                        // No new file uploaded; retain the existing image
                        if(isset($data['files'][$index]['existingAttachment'])) {
                            $newFiles[] = array('title' => $data['files'][$index]['title'], 'name' => $data['files'][$index]['existingAttachment']);
                        }
                    }
                }

             
                $newFiles = array_filter($newFiles);
                
                DB::table('procurement_files')->where(array('procurementID' => $postID))->delete();
                foreach($newFiles as $file):
                    // Save file information in the database
                    ProcurementFile::create([
                        'procurementID' => $postID,
                        'title'         => $file['title'],
                        'filename'      => $file['name'],
                    ]);
                endforeach;
            }    

            return redirect('admin/procurement')->with(['message' => '<div class="alert alert-success">Post Successfully Submitted</div>']);
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
        ]);

        $DBfield = [];
        $data = $request->input();

        try {
            DB::beginTransaction();

            // Process the blog fields
            foreach ($validatedData['category'] as $key => $field_value) {
                $DBfield[$key] = $field_value; // Handle other fields normally
            }

            $slug = AppFunctions::generateUniqueSlug($DBfield['name'], 'procurement_categories');

            $DBfield['slug'] = $slug;

            if (empty($DBfield['parentID']) || $DBfield['parentID'] == 0) {
                $DBfield['parentID'] = null;
            }
            
            if (!empty($data['id'])) {
                $DBfield['updated_at'] = now();
                DB::table('procurement_categories')->where('ID', $data['id'])->update($DBfield);
                $request->session()->flash('success', 'Category updated successfully!'); // Flash message
            } else {
                $DBfield['created_at'] = now(); 
                DB::table('procurement_categories')->insert($DBfield);
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
}

<?php

namespace App\Http\Controllers;

use App\Models\AppFunctions; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use DB;
use Auth;

class AdminDashboardController extends Controller {
    public function dashboard() {
        $userID = Auth::id();
        $functions = new AppFunctions();
        
        $data = array();

        return view('admin.pages.dashboard')->with($data);
    }

    public function faq($method = null, $id = null) {
        $functions = new AppFunctions;
        $userID = Auth::id();

        $data['functions'] = $functions;
        
        
        if($method == 'delete') {
            DB::table('faq')->where(array('id' => $id))->delete();

            return redirect('admin/manage-faq');
        }

        $data['faqData'] = DB::table('faq')->get();

        return view('admin.pages.manage-faq')->with($data); 
    }

    public function createFaq(Request $request) {
        $data   = $request->input();
        $userID = Auth::id();

        try {
            $DBfield = array();

            if(empty($data['id'])) {
                $DBfield['created_at'] = now();
                DB::table('faq')->insert($data['faq']);
            } else {
                $DBfield['updated_at'] = now();
                DB::table('faq')->where(array('id' => $data['id']))->update($data['faq']);
            }

            return redirect('admin/manage-faq');
        } catch (Exception $e) {
            return redirect('admin/manage-faq/error');
        }
    }

    public function afcCard($method = null, $id = null) {
        $functions = new AppFunctions;

        if($method == 'view') {
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
            $categories = Category::with('parent')->where('postType', $postType)->get();
            $data['mainCategories'] = $categories;
            $categoriesSet = $categories->toArray();
            $data['categoriesData'] = $this->buildTree($categoriesSet);

			$page = 'categories';
		} else {
			$data['title'] = 'Afc Card Requests';

			$data['applicationsData'] = DB::table('afc_card_requests')->get();
			$page = 'afc-card-applications'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }

}

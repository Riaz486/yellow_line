<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppFunctions; 
use App\Models\Procurement;
use App\Models\ProcurementCategory;
use App\Models\ProcurementFile; 
use DB;

class ProcurementController extends Controller {
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

    public function procurement(Request $request, $category = null, $slug = null) {
        //Search Parameters
        $searchQuery = $request->input('search');
        $timeframe   = $request->input('timeframe');
        $startDate   = $request->input('start_date');
        $endDate     = $request->input('end_date');

        $dataFilter['query']     = $searchQuery;
        $dataFilter['timeframe'] = $timeframe;
        $dataFilter['startDate'] = $startDate;
        $dataFilter['endDate']   = $endDate;

        if($category == 'preview') {
            $file = ProcurementFile::findOrFail($slug);
    
            // Increment views count
            $file->increment('views');
    
            // Redirect to the file URL for preview
            return redirect(asset('public/assets/uploads/procurement/' . $file->filename));
        }

        if($category == 'download') {
            $file = ProcurementFile::findOrFail($slug);
        
            // Increment downloads count
            $file->increment('downloads');
    
            // Trigger a direct download of the file
            return response()->download(public_path('assets/uploads/procurement/' . $file->filename));
        }

        if($category == null) {
            $pageData['postName'] = 'All Posts';
            $page = 'procurement';
        } else {
            $categoryData = ProcurementCategory::where('slug', $category)->with('parent')->first();
    
            $pageData['postName'] = $categoryData->name;
            $pageData['mainCategoryName'] = $categoryData->parent ? $categoryData->parent->name : null;
            $page = 'procurement-details';
        }

        $headerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $footerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $categoryDataChildren = ProcurementCategory::where('slug', $category)->with('children')->first();

        $postQuery = Procurement::select(
                    'procurement.*', 
                    'procurement_categories.name as categoryName', 
                    'procurement_categories.slug as categorySlug', 
                    DB::raw('COUNT(comments.id) as commentsCount')
                )
                ->leftJoin('procurement_categories', 'procurement.categoryID', '=', 'procurement_categories.id')
                ->leftJoin('comments', function($join) {
                    $join->on('procurement.id', '=', 'comments.postID')
                        ->where('comments.type', '=', 'procurement');
                });


        if ($categoryDataChildren->children->isNotEmpty()) {
            $subCategoryIDs = $categoryDataChildren->children->pluck('id')->toArray();

            $postQuery->whereIn('procurement.categoryID', $subCategoryIDs);
        } else {
            $postQuery->where('procurement.categoryID', $categoryDataChildren->id);
        }

        $postQuery->groupBy('procurement.id', 'procurement_categories.name', 'procurement_categories.slug');

        if ($searchQuery) {
            $postQuery->where('procurement.title', 'like', '%' . $searchQuery . '%');
        }

        if($timeframe) {
            if ($timeframe == 'today') {
                $postQuery->whereDate('procurement.created_at', now()->toDateString());
            } else {
                $date = now()->subDays((int) $timeframe);
                $postQuery->where('procurement.created_at', '>=', $date);
            }
        }

        if ($startDate) {
            $postQuery->where('procurement.created_at', '>=', $startDate);
        }
    
        if ($endDate) {
            $postQuery->where('procurement.created_at', '<=', $endDate);
        }

        $procurementData = $postQuery->paginate(10);


        if ($slug) {

            $postQuery = Procurement::select(
                'procurement.*', 
                'procurement_categories.name as categoryName', 
                'procurement_categories.slug as categorySlug', 
                DB::raw('COUNT(comments.id) as commentsCount')
            )
            ->leftJoin('procurement_categories', 'procurement.categoryID', '=', 'procurement_categories.id')
            ->leftJoin('comments', function($join) {
                $join->on('procurement.id', '=', 'comments.postID')
                    ->where('comments.type', '=', 'procurement');
            });

            if ($categoryDataChildren->children->isNotEmpty()) {
                $subCategoryIDs = $categoryDataChildren->children->pluck('id')->toArray();

                $postQuery->whereIn('procurement.categoryID', $subCategoryIDs);
            } else {
                $postQuery->where('procurement.categoryID', $categoryDataChildren->id);
            }

            $postQuery->groupBy('procurement.id', 'procurement_categories.name', 'procurement_categories.slug');

            $procurementData = $postQuery->first();

            if ($procurementData) {
                $attachments = ProcurementFile::where('procurementID', $procurementData->id)->get();

                return view('pages.procurement-details', compact('procurementData', 'attachments', 'pageData', 'headerSettingsData', 'footerSettingsData'));
            } else {

                return abort(404, 'Press Release not found.');
            }
        } else {
            $categories = ProcurementCategory::with('parent')
                            ->get();

            $categoriesSet  = $categories->toArray();
            $categoriesData = $this->buildTree($categoriesSet);
        }
    
        return view('pages.procurement', compact('procurementData', 'pageData', 'categoriesData', 'headerSettingsData', 'footerSettingsData', 'dataFilter'));
    }

    public function getProcurementData(Request $request) {
        $inputData   = $request->input();
        $categoryID  = $inputData['categoryID'];
        $searchQuery = $inputData['search'];
        $timeframe   = $inputData['timeframe'];
        $startDate   = $inputData['start_date'];
        $endDate     = $inputData['end_date'];

        $categoryData = ProcurementCategory::where('id', $categoryID)->with('parent')->first();
        $category = $categoryData->slug;

        $pageData['postName'] = $categoryData->name;
        $pageData['mainCategoryName'] = $categoryData->parent ? $categoryData->parent->name : null;

        $categoryDataChildren = ProcurementCategory::where('slug', $category)->with('children')->first();

        $postQuery = Procurement::select(
                    'procurement.*', 
                    'procurement_categories.name as categoryName', 
                    'procurement_categories.slug as categorySlug', 
                    DB::raw('COUNT(comments.id) as commentsCount')
                )
                ->leftJoin('procurement_categories', 'procurement.categoryID', '=', 'procurement_categories.id')
                ->leftJoin('comments', function($join) {
                    $join->on('procurement.id', '=', 'comments.postID')
                        ->where('comments.type', '=', 'procurement');
                });


        $postQuery->where('procurement.categoryID', $categoryID);

        // Apply optional filters only if they have a value
        if (!empty($searchQuery)) {
            $postQuery->where('procurement.title', 'like', '%' . $searchQuery . '%');
        }

        if (!empty($timeframe)) {
            if ($timeframe == 'today') {
                $postQuery->whereDate('procurement.created_at', now()->toDateString());
            } else {
                $date = now()->subDays((int) $timeframe);
                $postQuery->where('procurement.created_at', '>=', $date);
            }
        }

        if (!empty($startDate)) {
            $postQuery->where('procurement.created_at', '>=', $startDate);
        }

        if (!empty($endDate)) {
            $postQuery->where('procurement.created_at', '<=', $endDate);
        }

        // Group by required fields
        $postQuery->groupBy('procurement.id', 'procurement_categories.name', 'procurement_categories.slug');


        $data['procurementData'] = $postQuery->paginate(10);

        return view('pages.templates.procurement-data', $data)->render();
    }

    public function postComment(Request $request) {
        $inputData = $request->input();

		$inputData['comment']['created_at'] = now();

        $functions = new AppFunctions();

		$commentID = DB::table('comments')->insertGetId($inputData['comment']);
		
        $commentsDaTa = DB::table('comments')->where(array('postID' => $inputData['comment']['postID']))->get();	

        $name = $inputData['comment']['author'];
		$initials = AppFunctions::getInitialsAttribute($inputData['comment']['author']);

		if($inputData['comment']['response'] == 0) {
			$commentHtml  = '<div class="media mb-4 comment-'.$commentID.'">';
			$commentHtml .= '<div class="user-thumb" style="background: #'. AppFunctions::stringToColorCode($initials) . '">'.$initials.'</div>';
			$commentHtml .= '<div class="media-body">';
			$commentHtml .= '<h6><a class="text-secondary font-weight-bold" href="">'.$name.'</a> <small><i>'.date('d F Y').'</i></small></h6>';
			$commentHtml .= '<p>'.$inputData['comment']['content'] .'</p>';
			$commentHtml .= '<button class="btn btn-sm btn-outline-secondary">Reply</button>';
			$commentHtml .= '</div>';
			$commentHtml .= '</div>';

			$dataReturn['commentHtml'] 	 = $commentHtml;
		} else {
			$dataReturn['parentID'] = $inputData['comment']['response'];
			$dataReturn['replies']  = $function->get_replies($inputData['comment']['response']);
		}
		
		$dataReturn['totalComments'] = count($commentsDaTa) . ' Comments';
		$dataReturn['reply'] 		 = $inputData['comment']['response'];

		echo json_encode($dataReturn);
    }

    
}

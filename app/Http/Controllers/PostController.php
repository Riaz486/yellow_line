<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppFunctions; 
use App\Models\Post; 
use App\Models\PostMeta;
use App\Models\Comment; 
use App\Models\Category; 
use DB;

class PostController extends Controller {
    public function posts(Request $request, $category = null, $slug = null) {
        //Search Parameters
        $searchQuery = $request->input('search');
        $timeframe   = $request->input('timeframe');
        $startDate   = $request->input('start_date');
        $endDate     = $request->input('end_date');

        $dataFilter['query']     = $searchQuery;
        $dataFilter['timeframe'] = $timeframe;
        $dataFilter['startDate'] = $startDate;
        $dataFilter['endDate']   = $endDate;

        if($category == null) {
            $pageData['postName'] = 'All Posts';
        } else {
            $categoryData = Category::where('slug', $category)->first();

            $pageData['postName'] = $categoryData->name;
        }

        $headerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $footerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $postQuery = Post::select(
                        'posts.*', 
                        'categories.name as categoryName', 
                        'categories.slug as categorySlug', 
                        DB::raw('COALESCE(COUNT(comments.id), 0) as commentsCount')
                    )
                    ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
                    ->leftJoin('comments', 'posts.id', '=', 'comments.postID')
                    ->groupBy('posts.id', 'categories.name', 'categories.slug')
                    ->where('posts.postType', 'posts')
                    ->where('posts.status', AppFunctions::STATUS_PUBLISHED);

        if ($category != null) {
            $postQuery->where('posts.categoryID', $categoryData->id);
        }

        if ($searchQuery) {
            $postQuery->where('posts.title', 'like', '%' . $searchQuery . '%');
        }

        if($timeframe) {
            if ($timeframe == 'today') {
                $postQuery->whereDate('posts.created_at', now()->toDateString());
            } else {
                $date = now()->subDays((int) $timeframe);
                $postQuery->where('posts.created_at', '>=', $date);
            }
        }

        if ($startDate) {
            $postQuery->where('posts.created_at', '>=', $startDate);
        }
    
        if ($endDate) {
            $postQuery->where('posts.created_at', '<=', $endDate);
        }

        $postsData = $postQuery->paginate(10);


        if ($slug) {
            $post = Post::where('slug', $slug)
                        ->first();

            $categoriesData = Category::where('postType', $post->postType)->get();
            
            $postMeta = DB::table('post_meta')->where(array('postID' => $post->id, 'meta_key' => 'post_tags'))->first();
            
            $previousPost = Post::select('posts.*', 'categories.slug as categorySlug')
                                ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
                                ->where('posts.id', '<', $post->id)
                                ->where('posts.postType', '=', $post->postType)->orderBy('posts.id', 'desc')->first(); 
            $nextPost = Post::select('posts.*', 'categories.slug as categorySlug')
                                ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
                                ->where('posts.id', '>', $post->id)
                                ->where('posts.postType', '=', $post->postType)->orderBy('posts.id', 'desc')->first(); 
     
            if($postMeta) {
                $postMeta = unserialize($postMeta->meta_value);
            } else {
                $postMeta = '';
            }

            if ($post) {
                $galleryData = DB::table('post_gallery')
                            ->where('postID', $post->id)
                            ->get();

                $commentsData = DB::table('comments')->where('postID', $post->id)->get();

                return view('pages.post-single', compact('post', 'galleryData', 'postMeta', 'commentsData', 'previousPost', 'nextPost', 'categoriesData', 'pageData', 'headerSettingsData', 'footerSettingsData'));
            } else {

                return abort(404, 'Press Release not found.');
            }
        } else {
            $categoriesData = Category::where('postType', 'posts')->get();
        }
    
        return view('pages.posts', compact('postsData', 'pageData', 'categoriesData', 'headerSettingsData', 'footerSettingsData', 'dataFilter'));
    }

    public function news(Request $request, $category = null, $slug = null) {
        //Search Parameters
        $searchQuery = $request->input('search');
        $timeframe   = $request->input('timeframe');
        $startDate   = $request->input('start_date');
        $endDate     = $request->input('end_date');

        $categoriesData = Category::all();

        $dataFilter['query']     = $searchQuery;
        $dataFilter['timeframe'] = $timeframe;
        $dataFilter['startDate'] = $startDate;
        $dataFilter['endDate']   = $endDate;

        if($category == null) {
            $pageData['postName'] = 'All Posts';
        } else {
            $categoryData = Category::where('slug', $category)->first();

            $pageData['postName'] = $categoryData->name;
        }

        $headerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $footerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $postQuery = Post::select('posts.*', 'categories.name as categoryName', 'categories.slug as categorySlug', DB::raw('COUNT(comments.id) as commentsCount'))
                    ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id')
                    ->leftJoin('comments', 'posts.id', '=', 'comments.postID')
                    ->groupBy('posts.id', 'categories.name')
                    ->where('posts.postType', 'news')
                    ->where('posts.status', AppFunctions::STATUS_PUBLISHED); 

        if ($category != null) {
            $postQuery->where('posts.categoryID', $categoryData->id);
        }

        if ($searchQuery) {
            $postQuery->where('posts.title', 'like', '%' . $searchQuery . '%');
        }

        if($timeframe) {
            if ($timeframe == 'today') {
                $postQuery->whereDate('posts.created_at', now()->toDateString());
            } else {
                $date = now()->subDays((int) $timeframe);
                $postQuery->where('posts.created_at', '>=', $date);
            }
        }

        if ($startDate) {
            $postQuery->where('posts.created_at', '>=', $startDate);
        }
    
        if ($endDate) {
            $postQuery->where('posts.created_at', '<=', $endDate);
        }

        $postsData = $postQuery->paginate(10);

        $categoriesData = Category::where('postType', 'news')->get();
    
        return view('pages.news', compact('postsData', 'pageData', 'categoriesData', 'headerSettingsData', 'footerSettingsData', 'dataFilter'));
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

    public function events(Request $request, $slug = null) {
        $headerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $footerSettingsData = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        if($slug == null) {
            $postQuery = DB::table('events')
                            ->where('status', AppFunctions::STATUS_PUBLISHED);

            $eventsData = $postQuery->paginate(12);

            return view('pages.events', compact('eventsData', 'headerSettingsData', 'footerSettingsData'));
        } else {
            $eventData = DB::table('events')->where('slug', $slug)->first();

            $previousPost = DB::table('events')
                ->where('id', '<', $eventData->id)
                ->orderBy('id', 'desc')->first(); 
            
            $nextPost =  DB::table('events')
                        ->where('id', '>', $eventData->id)
                        ->orderBy('id', 'desc')->first(); 

            $galleryData = DB::table('event_gallery')
                            ->where('eventID', $eventData->id)
                            ->get();

            return view('pages.event-single', compact('eventData', 'galleryData', 'previousPost', 'nextPost', 'headerSettingsData', 'footerSettingsData'));
        }
    }
}

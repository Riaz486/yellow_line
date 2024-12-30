<?php

namespace App\Http\Controllers;

use App\Models\AppFunctions; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Post; 
use App\Models\Project; 
use App\Models\ProjectMeta; 
use App\Models\ProjectFaq; 
use DB;
use PDF;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $data['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $postQuery = Post::select('posts.*', 'categories.name as categoryName', 'categories.slug as categorySlug')
                ->leftJoin('categories', 'posts.categoryID', '=', 'categories.id');

        $posts = $postQuery->where('posts.postType', 'news')
                        ->orderBy('posts.created_at', 'desc')
                        ->take(6)
                        ->get();
                        
        $data['latestNews'] = $posts;

        return view('pages.home')->with($data); 
    }

    public function page($page = null) {
        $pageData['settingsData']       = DB::table('settings_meta')->where(array('postID' => AppFunctions::THEME_SETTINGS))->get();
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();
        $pageData['officeHoursData']    = DB::table('website_office_hours')->get();
        
        $page_cond = array('slug' => $page);

        if($page == null) {
            $page_cond = array('page_attr' => 1);
        }

        $allPagesData = DB::table('pages')->where($page_cond)->get();
        $appFunctions = new AppFunctions();
        $pageWidgets  = DB::table('widgets')->where(array('pageID' => $allPagesData[0]->ID))->orderBy('position', 'asc')->get();
        $blogs        = DB::table('blogs')->orderBy('ID')->get();

        $unit_types = "
            SELECT unit_type.*, 
                COUNT(units.ID) AS TotalUnits,
                MAX(CASE WHEN units.status = 1 THEN 1 ELSE 0 END) AS hasAvailableUnits
            FROM unit_type 
            LEFT JOIN units ON units.unit_type = unit_type.ID 
            GROUP BY unit_type.ID 
            ORDER BY unit_type.ID ASC
        ";

        $unit_types = DB::select($unit_types);

        $pageData['appFunctions'] = $appFunctions;
        $pageData['pageContent']  = $allPagesData;
        $pageData['widgetsData']  = $pageWidgets;
        $pageData['postsData']    = $blogs;
        $pageData['taxRatesData'] = DB::table('tax_rates')->get();
        $pageData['unit_types_data'] = $unit_types;
        
        $page_name = 'page-single';

        return view('pages.'.$page_name)->with($pageData); 
    }
    
    private function buildTree(array $categories, $parentId = null)
    {
        $branch = [];

        foreach ($categories as $category) {
            if ($category->parentID == $parentId) {
                $children = $this->buildTree($categories, $category->ID);
                if ($children) {
                    $category->children = $children;
                }
                $branch[] = $category;
            }
        }

        return $branch;
    }
    protected function generateUniqueSlug($title, $table, $slugField = 'slug') {
        // Generate the initial slug
        $slug = Str::slug($title);

        // Base slug to be used for generating unique slugs
        $originalSlug = $slug;
        $count = 1;

        // Check if the slug exists in the database
        while (DB::table($table)->where($slugField, $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function faq() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();
        
        $pageData['faqData'] = DB::table('faq')->get();

        return view('pages.faq')->with($pageData); 
    }

    public function teamMembers($category = null) {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();
        
        $categoryData = DB::table('team_categories');
        
        if($category != null) {
            $categoryData->where(array('slug' => $category));
        }
        
        $categoryData = $categoryData->first(); 

        if($category != null) {
            $categoryTeam = $categoryData->name;
            $categoryID   = $categoryData->id;
        } else {
            $categoryTeam = 'Our Team Memebers';
            $categoryID   = 0;
        }

        $pageData['teamCategory'] = $categoryTeam;
        $pageData['categoryID']   = $categoryID;

        $teamData = DB::table('team_members'); 

        if($category != null) {
            $teamData->where(array('categoryID' => $categoryData->id));
        }
        
        $teamData = $teamData->get(); 

        $pageData['teamData'] = $teamData;
        $pageData['categoriesData'] = DB::table('team_categories')->get();

        return view('pages.team-members')->with($pageData); 
    }

    public function boardMembers() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $pageData['boardMembers'] = DB::table('board_members')->get();

        return view('pages.board-members')->with($pageData); 
    }

    public function messages($slug = null) {
        if($slug != null) {
            $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
            $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

            $pageData['publicMessage'] = DB::table('public_message')->where('slug', $slug)->first();
            $pageData['allMessages']   = DB::table('public_message')->get();

            return view('pages.message-single')->with($pageData); 
        }
    }

    public function AutomatedFareCollection() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.auto-fare-collection')->with($pageData); 
    }

    public function processAfcCard(Request $request) {
        $inputData = $request->input();
        $imageData = $request->input('image');

        if($imageData != '') {
            // Remove the "data:image/png;base64," part to get only the Base64 string
            $image = str_replace('data:image/png;base64,', '', $imageData);
            $image = str_replace(' ', '+', $image);
            
            // Decode the image and store it
            $imageName = 'fingerprint_' . time() . '.png';
            \File::put(public_path('/assets/uploads/') . $imageName, base64_decode($image));

            $inputData['formData']['file'] = $imageName;
            $inputData['formData']['created_at'] = now();

            DB::table('afc_card_requests')->insert($inputData['formData']);

            $response['status'] = 1;
            $response['message'] = '<div class="message">Your request for AFC card is recieved and we will process your application soon.</div>';
        } else {
            $response['status'] = 0;
            $response['message'] = '<div class="message">Please scan your fingers before prcoeding.</div>';
        }

        echo json_encode($response);
    }

    public function helpComplaints() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.help-and-support')->with($pageData); 
    }

    public function historical() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.historical')->with($pageData); 
    }

    public function smtaAct() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.smta-act')->with($pageData); 
    }

    public function WhoWeAre() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.who-we-are')->with($pageData); 
    }

    public function contactUs() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.contact-us')->with($pageData); 
    }

    public function processContact(Request $request) {
        $data = $request->input();

        try {
            $DBfield  = array();

            foreach($data['formData'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;


            DB::table('contact_requests')->insert($DBfield);


            $response = array(
                'status'    => 1,
                'message'   => '<div class="message">Thank you for getting in touch we have received your query.</div>',
            );

            return response()->json($response);
        } catch (Exception $e) {
            return redirect('admin/' . $dataUrl . '/error');
        }
    }

    public function gallery($slug = null) {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $pageData['pageName'] = ucwords(str_replace('-', ' ', $slug));
        $pageData['postType'] = explode('-', $slug);
        $pageData['postType'] = $pageData['postType'][0];

        $pageData['galleryData'] = DB::table('gallery')->where('type', $pageData['postType'])->get();

        return view('pages.gallery')->with($pageData); 
    }

    public function processComplains(Request $request) {
        $data = $request->input();

        try {
            $DBfield  = array();

            foreach($data['formData'] as $key => $field_value):
                if($field_value == '') {
                    $field_value = 'N/A';
                }

                $DBfield[$key] = $field_value;
            endforeach;

            if (isset($data['application'])) {
                foreach ($data['application'] as $key => $value) {
                    if (is_array($value)) {
                        $value = serialize($value);
                    }
                }

                $DBfield['attachments'] = $value;
            } else {
                $DBfield['attachments'] = 'N/A';
            }

            $DBfield['created_at'] = now();

            DB::table('support_complains')->insert($DBfield);

            $response = array(
                'status'    => 1,
                'message'   => '<div class="message">Thank you for getting in touch we have received your query we will get back to you shortly.</div>',
            );

            return response()->json($response);
        } catch (Exception $e) {
            return redirect('admin/' . $dataUrl . '/error');
        }
    }

    public function organogram() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.organogram')->with($pageData); 
    }

    public function fare() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        $locations = DB::table('fares')
        ->select('from')
        ->union(DB::table('fares')->select('to'))
        ->distinct()
        ->pluck('from'); // Using 'from' as a placeholder to hold unique locations

        $pageData['locations'] = $locations;
        
        return view('pages.fare')->with($pageData); 
    }

    public function calculateFare(Request $request) {
        $from = $request->input('from');
        $to = $request->input('to');

        // Retrieve the fare amount based on 'from' and 'to' locations
        $fare = DB::table('fares')->where(array('from' => $from, 'to' => $to))->first();

        // Check if a fare was found
        if ($fare) {
            // Generate the HTML content
            $fareData = '<h5 class="calculator_val">PKR. ' . number_format($fare->amount, 2) . '<small>* One Way</small></h5>';

            // Return the response in JSON format
            return response()->json([
                'status' => 1,
                'fareData' => $fareData
            ]);
        } else {
            // Return an error response if no fare was found
            return response()->json([
                'status' => 0,
                'fareData' => '<h5 class="calculator_val">Fare not available</h5>'
            ]);
        }
    }

    public function routes($slug = null) {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        if($slug != null) {
            $busData = DB::table('manage_buses')->where('slug', $slug)->first();

            $pageData['citiesData'] = DB::table('operating_routes_categories')
                                    ->where('busID', $busData->id)
                                    ->get();

            $routesData = DB::table('operating_routes')
                ->leftJoin('operating_routes_stops', 'operating_routes.id', '=', 'operating_routes_stops.routeID')
                ->select(
                    'operating_routes.id', 
                    'operating_routes.name', 
                    'operating_routes.busID', 
                    'operating_routes.description',
                    'operating_routes.distance', 
                    DB::raw('COUNT(operating_routes_stops.id) as stopsCount')
                )
                ->where('operating_routes.busID', $busData->id);

            if (count($pageData['citiesData']) > 0) {
                $routesData->where('operating_routes.cityID', $pageData['citiesData'][0]->id);
            }

            $routesData = $routesData->groupBy('operating_routes.id', 'operating_routes.name', 'operating_routes.busID')
                ->get();

            $routesStopsData = DB::table('operating_routes_stops')->where('busID', $busData->id)->get();
            
			$pageData['routesData']      = $routesData;
            $pageData['routesStopsData'] = $routesStopsData;
            $pageData['busData']         = $busData;
        
            $pageData['routeTheme']  = 'theme-' . $busData->theme;
            $pageData['navTheme']    = 'nav-theme-' . $busData->theme;
            $pageData['projectName'] =  $busData->title; 
        }

        return view('pages.routes')->with($pageData); 
    }

    public function impactValues() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.impact-values')->with($pageData); 
    }

    public function missionVission() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.mission-and-vision')->with($pageData); 
    }

    public function whatIsBrt() {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        return view('pages.what-is-brt')->with($pageData); 
    }

    public function routesCityData($cityID = null) {
        $cityData = DB::table('operating_routes_categories')
                                    ->where('id', $cityID)
                                    ->first();

        $routesData = DB::table('operating_routes')
            ->leftJoin('operating_routes_stops', 'operating_routes.id', '=', 'operating_routes_stops.routeID')
            ->select(
                'operating_routes.id', 
                'operating_routes.name', 
                'operating_routes.busID', 
                'operating_routes.description',
                'operating_routes.distance', 
                DB::raw('COUNT(operating_routes_stops.id) as stopsCount')
            )
            ->where('operating_routes.cityID', $cityID);

        $routesData = $routesData->groupBy('operating_routes.id', 'operating_routes.name', 'operating_routes.busID')
            ->get();

        $routesStopsData = DB::table('operating_routes_stops')->where('routeID', $routesData[0]->id)->get();

        $response['cityName'] = $cityData->name . ' Routes';
        $response['city']     = $cityData->name;

        $routesMenuData = '';

        $j = 1;
        foreach($routesData as $route):
            $routesMenuData .= '<a href="' . url('/get-routes/' . $route->id) . '" class="get-routes ' . (($j == 1) ? 'get-routes-active' : '') . '">' ;
            $routesMenuData .= '
                <h6>' . htmlspecialchars($route->name) . '</h6>
                <span>' . htmlspecialchars($route->description) . '</span>
            </a>';
        
            if($j == 1) {
                $routeTitle  = $route->name;
                $description = $route->description;
                $distance    = $route->distance;
                $routeID     = $route->id;
            }

            $j++;
        endforeach;

        $response['routesMenuData']   = $routesMenuData;
        $response['routeTitle']       = $routeTitle;
        $response['routeDescription'] = $description;
        $response['distance']         = $distance;

        $routeStops = '';

        foreach ($routesStopsData as $stop) {
            if ($stop->RouteID == $routeID) {
                $routeStops .= '<li><span>' . htmlspecialchars($stop->stopName) . '</span></li>';
            }
        }

        $response['routeStops'] = $routeStops;
    }

    public function getRoutesData($routeID = null) {
        $routesData = DB::table('operating_routes')
            ->leftJoin('operating_routes_stops', 'operating_routes.id', '=', 'operating_routes_stops.routeID')
            ->select(
                'operating_routes.id', 
                'operating_routes.name', 
                'operating_routes.busID', 
                'operating_routes.description',
                'operating_routes.distance', 
                DB::raw('COUNT(operating_routes_stops.id) as stopsCount')
            )
            ->where('operating_routes.id', $routeID);

        $routesData = $routesData->groupBy('operating_routes.id', 'operating_routes.name', 'operating_routes.busID')
            ->first();

        
        $citiesData = DB::table('operating_routes_categories')
                        ->where('busID', $routesData->busID)
                        ->get();

        $busData = DB::table('manage_buses')->where('id', $routesData->busID)->first();
        
        // if(count($citiesData) > 0) {
        //     $response['cityName'] = $citiesData[0]->name . ' Routes';
        // } else {

        // }

        $routesStopsData = DB::table('operating_routes_stops')->where('routeID', $routesData->id)->get();

        $response['cityName'] = $busData->title . ' Routes';


        $response['routeTitle']       = $routesData->name;
        $response['routeDescription'] = $routesData->description;
        $response['distance']         = $routesData->distance;

        $routeStops = '';

        foreach ($routesStopsData as $stop) {
            $routeStops .= '<li><span>' . htmlspecialchars($stop->stopName) . '</span></li>';
        }

        $response['routeStops'] = $routeStops;

        return response()->json($response, 200);
    }

    public function projects($slug = null) {
        $pageData['headerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::HEADER_SETTINGS))->get();
        $pageData['footerSettingsData'] = DB::table('settings_meta')->where(array('postID' => AppFunctions::FOOTER_SETTINGS))->get();

        if($slug != null) {
            $project = Project::with(['metas', 'faqs'])->where('slug', $slug)->firstOrFail();

            $pageData['projectData'] = $project;
            $pageData['routeTheme']  = 'theme-' . $project->theme;
            $pageData['projectName'] = $project->title; 
            $pageData['id']          = $project->id;
        }

        return view('pages.projects')->with($pageData); 
    }
}

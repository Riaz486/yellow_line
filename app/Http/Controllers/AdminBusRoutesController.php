<?php

namespace App\Http\Controllers;

use App\Models\AppFunctions; 
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use DB;
use Auth;

class AdminBusRoutesController extends Controller {
    public function manageBuses($method = null, $id = null, $reffID = null) {
        $functions = new AppFunctions;

        if($method == 'create') {
			$data['title'] = 'Create Bus';

			// Initialize default values
            $data['id']          = $id;
            $data['title']       = '';
            $data['description'] = '';
            $data['file']        = '';

            // If an ID is provided, fetch the existing blog data
            if ($id) {
                $bus = DB::table('manage_buses')->where('id', $id)->first(); // Fetch the blog post by ID
        
                // Assign values from the fetched blog data
                $data['title']       = $bus->title;
                $data['description'] = $bus->description; 
                $data['file']        = $bus->file;
            }

			$page = 'create-bus';
		} elseif($method == 'delete') {
            DB::table('manage_buses')->where('id', $id)->delete();

            $message = '<div class="message"><i class="fa fa-check-circle"></i> Post Deleted Successfully.</div>';
        
            return redirect()->back()->with(['message' => $message]);
        } elseif($method == 'routes') {
            $data['title'] = 'Bus Routes';

            $cityID = 0;

            if($reffID != null) {
                $cityID = $reffID;
                $data['cityData'] =  DB::table('operating_routes_categories')->where('id', $cityID)->first();
            }
            
            $data['cityID'] = $cityID;

            $busData = DB::table('manage_buses')->where('id', $id)->first();

            $routesData = DB::table('operating_routes')
                ->leftJoin('operating_routes_stops', 'operating_routes.id', '=', 'operating_routes_stops.routeID')
                ->select(
                    'operating_routes.id', 
                    'operating_routes.name', 
                    'operating_routes.busID', 
                    'operating_routes.description', 
                    DB::raw('COUNT(operating_routes_stops.id) as stopsCount')
                )
                ->where('operating_routes.busID', $id);

            if ($cityID > 0) {
                $routesData->where('operating_routes.cityID', $cityID);
            }

            $routesData = $routesData->groupBy('operating_routes.id', 'operating_routes.name', 'operating_routes.busID')
                ->get();

            $routesStopsData = DB::table('operating_routes_stops')->where('busID', $id)->get();
            
			$data['routesData']      = $routesData;
            $data['routesStopsData'] = $routesStopsData;
            $data['busData']         = $busData;

			$page = 'manage-routes'; 
        } elseif($method == 'city') {
            $data['title'] = 'Manage Cities';

            $busData = DB::table('manage_buses')->where('id', $id)->first();

            $data['busID']   = $busData->id;
            $data['busName'] = $busData->title;

            $data['manageCities'] = DB::table('operating_routes_categories')
                ->leftJoin('operating_routes', 'operating_routes.cityID', '=', 'operating_routes_categories.id')
                ->select(
                    'operating_routes_categories.id',
                    'operating_routes_categories.name',
                    DB::raw('COUNT(operating_routes.id) as totalRoutes')
                )
                ->where('operating_routes_categories.busID', $busData->id)
                ->groupBy('operating_routes_categories.id', 'operating_routes_categories.name')
                ->get();

            $page = 'manage-cities'; 
        } elseif($method == 'delete-route') {
            DB::table('operating_routes')->where('id', $id)->delete();
            DB::table('operating_routes_stops')->where('RouteID', $id)->delete();

            $message = '<div class="message"><i class="fa fa-check-circle"></i> Post Deleted Successfully.</div>';
        
            return redirect()->back()->with(['message' => $message]);
        } elseif($method == 'delete-route-stop') {
            DB::table('operating_routes_stops')->where('id', $id)->delete();
		} else {
			$data['title'] = 'Buses';
            
            $busQuery = DB::table('manage_buses')->get();

			$data['busData'] = $busQuery;

			$page = 'manage-buses'; 
		}

        return view('admin.pages.' . $page)->with($data);
    }
}
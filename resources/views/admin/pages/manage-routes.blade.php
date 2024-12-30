@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Routes</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Routes</li>
                </ol>


                <a href="{{url('admin/manage-buses')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Routes For - {{$busData->title}}</h4>
                    
                    <ul class="nav nav-tabs m-t-40" id="myTab" role="tablist">
                    @foreach($routesData as $index => $route)	
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}" data-bs-target="#route-{{$route->id}}" data-id="{{$route->id}}" type="button" >
                                <span>{{$route->name}}</span>
                                <span class="m-l-10">
                                    <a href="javascript:void(0);" class="edit-route" id="{{$route->id}}" name="{{$route->name}}" description="{{$route->description}}">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{url('admin/manage-buses/delete-route/' . $route->id. '/' . $route->busID)}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </span>
                            </button>
                        </li>
                    @endforeach
                    </ul>
                    <div class="tab-content m-t-20 p-20" id="myTabContent">
                    @foreach($routesData as $index => $route)
                        <div class="tab-pane fade  {{ $index === 0 ? 'show active' : '' }}" id="route-{{$route->id}}">
                            <div class="d-flex alig-items-center justify-content-between">
                                <h4 class="box-title">{{$route->name}}</h4>
                                <a href="javascript:void(0);" class="btn btn-info create-route-stop" data-id="{{$route->id}}">
                                    Create Stop
                                </a>
                            </div>
                            
                            <div class="table-responsive m-t-40" id="route-table-{{$route->id}}">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Stop Name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($routesStopsData->where('RouteID', $route->id) as $stop)
                                            <tr class="row-{{ $stop->id }}">
                                                <td class="stopID">{{ $stop->id }}</td>
                                                <td class="stopName">{{ $stop->stopName }}</td>
                                                <td class="stopAddress">{{ $stop->address }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="edit-stop" id="{{$stop->id}}" name="{{$stop->stopName}}" address="{{$stop->address}}" route="{{$stop->RouteID}}" lat="{{$stop->latitude}}" long="{{$stop->longitude}}">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="{{url('admin/manage-buses/delete-route-stop/' . $stop->id)}}" class="delete-route-stop" id="{{$stop->id}}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach 
                    <div class="loader-ab" id="loader-route-stop" style="display: none;">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>

                    <div id="route-table-form" style="display: none;">
                        <form method="POST" action="{{url('admin/process-main-form')}}" class="processRouteStop" onsubmit="return false;">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Stop Name</label>
                                <input type="text" name="formData[stopName]" class="form-control" value="" required />
                            </div>

                            <div class="form-group">
                                <label>Stop Location</label>
                                <input type="text" name="formData[address]" class="form-control" value="" required />
                            </div>

                            <input type="hidden" name="formData[latitude]" value="" />
                            <input type="hidden" name="formData[longitude]" value="" />

                            <input type="hidden" name="id" value="" />
                            <input type="hidden" name="formData[routeID]" value="{{$routesData[0]->id ?? ''}}" />
                            <input type="hidden" name="formData[busID]" value="{{$busData->id}}" />
                            <input type="hidden" name="response" value="async" />
                            <input type="hidden" name="processType" value="operating_routes_stops" />

                            <div class="btn-row">
                                <button type="submit" class="btn btn-info btn-create-stop">Save Stop</button>
                                <button type="button" class="btn btn-secondary cancel-create-stop" data-id="">Cancel</button>
                            </div>
                        </form>

                        <div class="loader-ab" id="loader-route" style="display: none;">
                            <div class="lds-ellipsis">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Route</h4>
                    
                    <form method="POST" action="{{url('admin/process-main-form')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="formData[name]" class="form-control" value="" required />
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="formData[description]" class="form-control" value="" required />
                        </div>

                        <input type="hidden" name="id" value="" />
                        <input type="hidden" name="formData[busID]" value="{{$busData->id}}" />
                        <input type="hidden" name="formData[cityID]" value="{{$cityID}}" />
              
                        <input type="hidden" name="response" value="manage-buses/routes/{{$busData->id}}" />
                        <input type="hidden" name="processType" value="operating_routes" />

                        <button type="submit" class="btn btn-info row-inline waves-effect waves-light m-r-10 cat-submit">Publish</button>
                        <div class="btn-reset row-inline"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
</div>
@endsection
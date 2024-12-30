@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Cities</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Cities</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Cities - ( {{$busName}} )</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Routes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($manageCities as $post)	
                                <tr>
                                    <td><?= $post->id; ?></td>
                                    <td class="row-{{$post->id}}">{{$post->name}}</td>
                                    <td>{{$post->totalRoutes}}</td>
                                    <td>
                                        <a href="{{url('admin/manage-buses/routes/'.$busID.'/'. $post->id)}}" data-toggle="tooltip" data-placement="top" title="Manage Routes">
                                            <i class="fa fa-bus"></i>
                                            Manage Routes
                                        </a>
                                        &nbsp;
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit" class="edit-city" id="{{$post->id}}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/manage-buses/delete-city/' . $post->id)}}" onclick="return confirm('Want to delete the Bus');" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Bus</h4>
                    
                    <form method="POST" action="{{url('admin/process-main-form')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="formData[name]" class="form-control" value="" required />
                        </div>
                        
                        <input type="hidden" name="formData[busID]" value="{{$busID}}" />

                        <input type="hidden" name="id" value="" />
                        <input type="hidden" name="response" value="manage-buses/city/{{$busID}}" />
                        <input type="hidden" name="processType" value="operating_routes_categories" />

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
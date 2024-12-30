@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">AFC Card Applucations</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ol>

                <a href="{{url('admin/afc-card/page')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Edit Page
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">AFC Card Applications</h4>
                    </div>
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($applicationsData as $data)	
                                <tr>
                                    <td><?= $data->id; ?></td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->city}}</td>
                                    <td>{{ucfirst($data->paymentMethod)}}</td>
                                    <td>
                                        <?php if($data->status == 0) { ?>
                                        <label class='badge badge-warning'>Inactive</label> 
                                        <?php } else { ?>
                                        <label class='badge badge-success'>Active</label> 
                                        <?php } ?>                                       
                                    </td>
                                    <td>
                                        <a href="{{url('admin/afc-card0/view/'. $data->id)}}'" data-toggle="tooltip" data-placement="top" title="Edit">
                                            View Application
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
    </div>
    <!-- End Page Content -->
</div>
@endsection
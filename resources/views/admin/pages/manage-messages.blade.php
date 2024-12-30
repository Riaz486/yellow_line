@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Messages</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Messages</li>
                </ol>

                <a href="{{url('admin/messages/create')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Create Message
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Messages</h4>
                    </div>
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($messageData as $mesage)	
                                <tr>
                                    <td><?= $mesage->id; ?></td>
                                    <?php 
                                        if($mesage->featured_image == '') {
                                            $postImage = 'noimage.webp';
                                        } else {
                                            $postImage = 'message/' . $mesage->featured_image;
                                        }
                                    ?>
                                    <td><img src="{{asset('public/assets/uploads/'.  $postImage)}}" /></td>
                                    <td><?= $mesage->title; ?></td>
                                    <td>{{$mesage->designation}}</td>
                                    <td>{{$mesage->department}}</td>
                                    <td>{{$mesage->location}}</td>
                                    <td>
                                        <a href="{{url('admin/messages/create/'. $mesage->id)}}'" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/messages/delete/' . $mesage->id)}}" onclick="return confirm('Want to delete the blog ');" data-toggle="tooltip" data-placement="top" title="Delete">
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
    </div>
    <!-- End Page Content -->
</div>
@endsection
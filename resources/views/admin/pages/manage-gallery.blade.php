@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Gallery</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>


                <a href="{{url('admin/gallery/' . $postType . '/create')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Create New
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$postName}} Gallery</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($galleryData as $post)	
                                <tr>
                                    <td><?= $post->id; ?></td>
                                    <?php 
                                        if($post->featured_image == '') {
                                            $postImage = 'noimage.webp';
                                        } else {
                                            $postImage = $post->featured_image;
                                        }
                                    ?>
                                    <td><img src="{{asset('public/assets/uploads/gallery/'.  $postImage)}}" /></td>
                                    <td><?= $post->title; ?></td>
                                    <td>{{ucfirst($post->type)}}</td>
                                    <td>
                                        <a href="{{url('admin/gallery/create/'. $post->id)}}'" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/gallery/delete/' . $post->id)}}" onclick="return confirm('Want to delete the blog ');" data-toggle="tooltip" data-placement="top" title="Delete">
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
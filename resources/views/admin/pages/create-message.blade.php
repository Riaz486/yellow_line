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
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/messages')}}">Messages</a></li>
                    <li class="breadcrumb-item active">Create Message</li>
                </ol>

                <a href="{{url('admin/messages/')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Create' : 'Edit'; ?> Message</h4>

                    <form method="POST" action="{{url('admin/create-message')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group col-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="message[title]" class="form-control bg-gray rounded-half" value="{{$title}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Sub Title</label>
                            <input type="text" name="message[sub_title]" class="form-control bg-gray rounded-half" value="{{$sub_title}}" required />
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-6">
                            <label>Featured image</label>
                            <input type="file" name="thumbnail" class="form-control m-b-20" />
                            @php
                                if($featured_image == '') {
                                    $featured_image = 'noimage.webp';
                                } else {
                                    $featured_image = 'message/' . $featured_image;
                                }
                            @endphp
                        </div>

                        <div class="form-group col-6">
                            <img src="{{asset('public/assets/uploads/'.  $featured_image)}}" style="width: 300px;" />
                        </div>

                        <div class="clearfix"></div>          
                        
                        <div class="form-group ">
                            <label>Description</label>
                            <textarea id="editorRichText" name="message[description]" class="content1 form-control" data-target="content1" rows="15">{{$description}}</textarea>
                        </div>

                        <div class="clearfix"></div>          

                        <div class="form-group col-6">
                            <label class="form-label">Designation</label>
                            <input type="text" name="message[designation]" class="form-control bg-gray rounded-half" value="{{$designation}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Department</label>
                            <input type="text" name="message[department]" class="form-control bg-gray rounded-half" value="{{$department}}" required />
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="message[location]" class="form-control bg-gray rounded-half" value="{{$location}}" required />
                        </div>

                        <input type="hidden" name="id" value="{{$id}}" />
                        
                        <div class="clearfix"></div>
                        
                        <?php
                            $buttonText = 'Publish';

                            if($id != '') {
                                $buttonText = 'Update Message';
                            }
                        ?>

                        <div class="btn-row">
                            <button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">{{$buttonText}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
</div>
@endsection
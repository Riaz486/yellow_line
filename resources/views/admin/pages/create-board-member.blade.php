@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Board Members</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ol>

                <a href="{{url('admin/board-members/')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Create' : 'Edit'; ?> Board Member</h4>

                    <form method="POST" action="{{url('admin/process-widget')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="widget[name]" class="form-control bg-gray rounded-half" value="{{$name}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Designation</label>
                            <input type="text" name="widget[designation]" class="form-control bg-gray rounded-half" value="{{$designation}}" required />
                        </div>                       

                        <div class="form-group col-6">
                            <label class="form-label">Department</label>
                            <input type="text" name="widget[department]" class="form-control bg-gray rounded-half" value="{{$department}}" required />
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="widget[location]" class="form-control bg-gray rounded-half" value="{{$location}}" required />
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-6">
                            <label>Featured image</label>
                            <input type="file" name="file" class="form-control m-b-20" />
                            @php
                                if($file == '') {
                                    $file = 'noimage.webp';
                                }
                            @endphp
                        </div>

                        <div class="form-group col-6">
                            <img src="{{asset('public/assets/uploads/'.  $file)}}" style="width: 300px;" />
                        </div>

                        <div class="clearfix"></div>          
                        
                        <div class="form-group ">
                            <label>Description</label>
                            <textarea  id="editorRichText" name="widget[description]" class="content1 form-control" data-target="content1" rows="15">{{$description}}</textarea>
                        </div>

                        <div class="form-group col-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck1" name="widget[featured]" value="1" <?= ($featured == 1) ? 'checked' : ''; ?> />
                                <label class="form-check-label" for="customCheck1">Featured</label>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="hidden" name="response" value="board-members" />
                        <input type="hidden" name="processType" value="board_members" />
                        
                        <?php
                            $buttonText = 'Create Member';

                            if($id != '') {
                                $buttonText = 'Update Memeber';
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
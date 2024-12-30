@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Library</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Library</li>
                </ol>

                <a href="{{url('admin/gallery/'.$postType)}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Add' : 'Edit'; ?> Gallery</h4>

                    <form method="POST" action="{{url('admin/create-gallery')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="gallery[title]" class="form-control bg-gray rounded-half" value="{{$title}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Date Created</label>
                            <input type="date" name="gallery[created_at]" class="form-control bg-gray rounded-half" value="{{$created_at}}" required />
                        </div>

                        <div class="form-group col-6"></div>
                        
                        <div class="clearfix"></div>

                        <div class="form-group col-6">
                            <label>Featured image</label>
                            <input type="file" name="thumbnail" class="form-control m-b-20" />
                            @php
                                if($featured_image == '') {
                                    $featured_image = 'noimage.webp';
                                }
                            @endphp
                        
                        </div>

                        <div class="form-group col-6">
                            <img src="{{asset('public/assets/uploads/gallery/'.  $featured_image)}}" style="width: 300px;" />
                        </div>
                        
                        @if($postType == 'video')
                        <div class="form-group col-6" id="video">
                            <label>Video File</label>
                            <input type="file" name="videoFile" class="form-control m-b-20" />
                        </div>
                        @endif

                        <div class="clearfix"></div>          

                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="hidden" name="gallery[type]" value="{{$postType}}" />
                        
                        <?php
                            $buttonText = 'Publish';

                            if($id != '') {
                                $buttonText = 'Update Gallery';
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
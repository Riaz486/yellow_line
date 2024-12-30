@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-12">
            <h4 class="text-themecolor">Edit Page</h4>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <form method="POST" action="{{url('admin/create-page')}}" enctype="multipart/form-data">
                    	{{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Banner Heading</label>
                            <input type="text" name="page[heading_main]" class="form-control bg-gray rounded-half" value="{{$heading_main}}" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Banner Title</label>
                            <input type="text" name="page[title]" class="form-control bg-gray rounded-half" value="{{$title}}" />
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="page[banner_type]" class="form-control">
                                <option value="image" {{$banner_type == 'image' ? 'selected' : ''}}>Image</option>
                                <option value="video" {{$banner_type == 'video' ? 'selected' : ''}}>Video</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-6">
                            <label>File</label>
                            <input type="file" name="uploadFile" class="form-control m-b-20" />
                            @php
                                if($bannerFile == '') {
                                    $bannerFile = 'projects/noimage.webp';
                                }
                            @endphp
                        </div>
                        <?php if($banner_type == 'image' || $banner_type == '') { ?>
                        <div class="form-group col-6">
                            <img src="{{asset('public/assets/uploads/'.  $bannerFile)}}" style="width: 300px;" />
                        </div>
                        <?php } ?>

                        <div class="clearfix"></div>
                        
                        <div class="form-group ">
                            <label>Content</label>
                            <textarea  id="summernote" name="page[content]" class="form-control" rows="15"><?= htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta keywords</label>
                            <input type="text" name="page[meta_keywords]" class="form-control bg-gray rounded-half" value="{{$meta_keywords}}" />
                            <span class="text-gray text-sm mt-2 dsp-block">
                                Relevant keywords may improve this page's visibility to search engines.
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="page[meta_description]" class="form-control bg-gray rounded-half" rows="6">{{$meta_description}}</textarea>

                            <span class="text-gray text-sm mt-2 dsp-block">
                                The description provides an explanation of this page's content to search engines.
                            </span>
                        </div>

                        <input type="hidden" name="page[page_type]" value="1" />
                        <input type="hidden" name="id" value="{{$id}}" />


                        <div class="btn-row">
                            <button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Save</button>
                            <a href="{{url('admin/website/pages')}}" class="btn btn-outline-danger btn-rounded btn-bordered row-inline m-r-10">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- column -->
        <div class="col-lg-4">
        </div>
        <!-- column -->
    </div>
</div>
@endsection
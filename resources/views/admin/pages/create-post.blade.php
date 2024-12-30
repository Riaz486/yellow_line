@extends('layouts.admin.admin-layout')

@section('admin')
<!-- Tagify CSS -->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">

<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Posts</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ol>

                <a href="{{url('admin/posts/')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Add' : 'Edit'; ?> Post</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <?php 
                        $url = 'create-post';

                        if($postType == 'events') {
                            $url = 'create-event';
                        }
                    ?>
                    <form method="POST" action="{{url('admin/' . $url)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="blog[title]" class="form-control bg-gray rounded-half" value="{{$title}}" required />
                        </div>

                        @if($postType == 'events')
                        <div class="form-group col-6">
                            <label class="form-label">Venue</label>
                            <input type="text" name="blog[venue]" class="form-control bg-gray rounded-half" value="{{$venue}}" required />
                        </div>
                        @endif

                        @if($postType != 'events')
                        <div class="form-group col-6">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="blog[categoryID]" required>
                                <option value="">Select Category</option>
                                @foreach ($categoriesData as $category)
                                    <?php $selected = ''; ?>
                                    <?php  
                                        if($category['id'] == $categoryID) {
                                            $selected = 'selected';
                                        }
                                    ?>
                                    <option value="{{ $category['id'] }}" {{ $selected}} >{{ $category['name'] }}</option>
                                    @if (isset($category->children))
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child['id'] }}">-- {{ $child['name'] }}</option>
                                            @if (isset($child->children))
                                                @foreach ($child->children as $grandChild)
                                                    <option value="{{ $grandChild['id'] }}">---- {{ $grandChild['name'] }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-group col-6">
                            <label>Featured image</label>
                            <input type="file" name="userFile" class="form-control m-b-20" />
                            @php
                                if($featured_image == '') {
                                    $featured_image = 'noimage.webp';
                                }
                            @endphp

                            <img src="{{asset('public/assets/uploads/posts/'.  $featured_image)}}" style="width: 300px;" />
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="form-group col-6">
                            <?php 
                                $formatedDate = \Carbon\Carbon::parse($created_at)->format('Y-m-d');
                            ?>
                            <label class="form-label">Date Created</label>
                            <input type="date" name="blog[created_at]" class="form-control bg-gray rounded-half" value="{{$formatedDate}}" />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Date Attend / Event (If this is an event else leave it blank)</label>
                            <input type="date" name="blog[event_date]" class="form-control bg-gray rounded-half" value="{{\Carbon\Carbon::parse($event_date)->format('Y-m-d')}}" />
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="form-group ">
                            <label>Content</label>
                            <textarea  id="editorRichText" name="blog[content]" class="content1 form-control" data-target="content1" rows="15">{{$content}}</textarea>
                        </div>

                        @if($postType != 'events')
                        <div class="col-6 form-group">
                            <div class="form-check d-flex">
                                <input type="checkbox" name="blog[featured]" class="form-check-input show-form" data-target="noOfDays" value="1" {{($featured == '1') ? ' checked' : ''}} />
                                <label class="form-check-label">
                                    Featured
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-6 noOfDays" style="display: none;">
                            <label class="form-label">No Of Days</label>
                            <input type="number" name="blog[no_of_days]" class="form-control bg-gray rounded-half" value="{{$no_of_days}}" />
                        </div>

                        <div class="clearfix"></div>        

                        <div class="form-group col-6">
                            <label>Add PDF</label>
                            <input type="file" name="pdfFile" class="form-control m-b-20" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <input name="tags" class="tags-input form-control" placeholder="Type tags and press Enter" />
                        </div>
                        <input type="hidden" name="blog[postType]" value="{{$postType}}" />
                        @endif
                                
                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between">
                                <label>Gallery Images</label>
                                <a href="javascript:void(0);" class="btn btn-info d-none d-lg-block m-l-15 add-gallery">
                                    <i class="fa fa-plus-circle"></i> Add Images
                                </a>
                            </div>

                            <div class="gallery-images-wrapper"></div>
                        </div>

                        <input type="hidden" name="id" value="{{$id}}" />
                        
                        <?php
                            $buttonText = 'Publish';

                            if($id != '') {
                                $buttonText = 'Update Post';
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

<div class="gallery-images" style="display: none;">
    <div class="gallery-image">
        <div class="form-group">
            <label>Type</label>
            <select name="gallery[0][type]" class="form-control">
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="gallery[0][galleryImage]" class="form-control" />
        </div>

        <div class="form-group video" style="display: none;">
            <label>Video File</label>
            <input type="file" name="gallery[0][videoFile]" class="form-control" />
        </div>

        <div class="btn-close">
            <button type="button" class="btn-delete">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>
<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
<script>
    var input = document.querySelector('.tags-input');
    var tagify = new Tagify(input, {
        enforceWhitelist: false,  // Allow custom tags
        dropdown: {
            enabled: 0  // Disable suggestions/autocomplete
        }
    });
</script>
@endsection
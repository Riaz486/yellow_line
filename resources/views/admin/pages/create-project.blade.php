@extends('layouts.admin.admin-layout')

@section('admin')

<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Project</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Create Project</li>
                </ol>

                <a href="{{url('admin/projects/')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Add' : 'Edit'; ?> Project</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{url('admin/process-project')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="project[title]" class="form-control bg-gray rounded-half" value="{{$title}}" required />
                        </div>

                        <?php
                            $stations         = \App\Models\ProjectMeta::get_meta_value($id, 'stations');
                            $passengers_count = \App\Models\ProjectMeta::get_meta_value($id, 'passengers_count');
                            $travel_time      = \App\Models\ProjectMeta::get_meta_value($id, 'travel_time');
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="box-title">Project Stats</h4>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Stations</label>
                                    <input type="text" name="metaData[stations]" class="form-control bg-gray rounded-half" value="{{$stations}}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Passengers / Day</label>
                                    <input type="text" name="metaData[passengers_count]" class="form-control bg-gray rounded-half" value="{{$passengers_count}}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Minutes (Travel Time)</label>
                                    <input type="text" name="metaData[travel_time]" class="form-control bg-gray rounded-half" value="{{$travel_time}}" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label>Thumbnail (Will be shown in mega menu)</label>
                            <input type="file" name="thumbnail" class="form-control m-b-20" />
                            @php
                                if($thumbnail == '') {
                                    $thumbnail = 'noimage.webp';
                                }
                            @endphp

                            <img src="{{asset('public/assets/uploads/projects/'.  $thumbnail)}}" style="width: 300px;" />
                        </div>

                        <div class="form-group col-6">
                            <label>Video</label>
                            <input type="file" name="videoFile" class="form-control m-b-20" />
                            @php
                                if($video_file == '') {
                                    $video_file = 'noimage.webp';
                                }
                            @endphp

                            <img src="{{asset('public/assets/uploads/projects/'.  $video_file)}}" style="width: 300px;" />
                        </div>

                         <!-- <div class="form-group ">
                            <label>Content</label>
                           <textarea  id="summernote" name="project[content]" class="form-control" rows="15"><?= htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>-->

                        <div class="form-group col-6">
                            <label class="form-label">Select Color Scheme</label>
                            <select class="form-control" name="project[theme]" required>
                                <option value="yellow" {{ $theme === 'yellow' ? 'selected' : '' }}>Theme Yellow</option>
                                <option value="green" {{ $theme === 'green' ? 'selected' : '' }}>Theme Green</option>
                                <option value="black" {{ $theme === 'black' ? 'selected' : '' }}>Theme Black</option>
                                <option value="orange" {{ $theme === 'orange' ? 'selected' : '' }}>Theme Orange</option>
                                <option value="pink" {{ $theme === 'pink' ? 'selected' : '' }}>Theme Pink</option>
                                <option value="red" {{ $theme === 'red' ? 'selected' : '' }}>Theme Red</option>                              
                            </select>
                        </div>

                        <div class="clearfix"></div>
                                
                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between">
                                <label>Slide Show Images</label>
                                <a href="javascript:void(0);" class="btn btn-info d-none d-lg-block m-l-15 add-gallery">
                                    <i class="fa fa-plus-circle"></i> Add Images
                                </a>
                            </div>

                            <?php
                                $existingImages = \App\Models\ProjectMeta::get_meta_value($id, 'project_gallery');

                                // If the data is '[]', treat it as an empty array to avoid unserialize issues
                                if ($existingImages === '[]') {
                                    $galleryImages = [];
                                } elseif (!empty($existingImages) && is_string($existingImages)) {
                                    $galleryImages = @unserialize($existingImages) ?: [];
                                } else {
                                    $galleryImages = [];
                                }
                            
                            ?>
                            <div class="gallery-images-wrapper">
                            @if(!empty($galleryImages))
                                @foreach($galleryImages as $index => $imagePath)
                                    <div class="gallery-image">
                                        <div class="form-group">
                                            <label>Image {{ $index + 1 }}</label>
                                            <input type="file" name="gallery[{{ $index }}][galleryImage]" class="form-control" />   
                                            <input type="hidden" name="gallery[{{ $index }}][existingImage]" value="{{ $imagePath }}" />                                         
                                        </div>

                                        <div class="gallery-img-thumbnail">
                                            <img src="{{asset('public/assets/uploads/projects/' . $imagePath)}}" class="img-fluid">
                                        </div>

                                        <div class="btn-close">
                                            <button type="button" class="btn-delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between">
                                <label>Faq</label>
                                <a href="javascript:void(0);" class="btn btn-info d-none d-lg-block m-l-15 add-faq">
                                    <i class="fa fa-plus-circle"></i> Add Faq
                                </a>
                            </div>

                            <div class="faq-wrapper">
                            @if(count($projectFaq) > 0)
                                @foreach($projectFaq as $index => $faq)
                                    <div class="faq-data-wrap">
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input type="text" name="faqData[{{ $index }}][question]" class="form-control" value="{{ $faq->question }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Answer</label>
                                            <textarea name="faqData[{{ $index }}][answer]" class="form-control" rows="4">{{ $faq->answer }}</textarea>
                                        </div>

                                        <div class="btn-close">
                                            <button type="button" class="btn-delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="box-title">Banner (CTA)</h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Cta Banner Heading</label>
                                <input type="text" name="project[cta_heading]" class="form-control bg-gray rounded-half" value="{{$cta_heading}}" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label">Cta Banner Text</label>
                                <input type="text" name="project[cta_description]" class="form-control bg-gray rounded-half" value="{{$cta_description}}" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label">Cta Banner Download File</label>
                                <input type="file" name="cta_download_file" class="form-control bg-gray rounded-half" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="box-title">Mobile Banner</h4>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">Heading</label>
                                <input type="text" name="project[banner_title]" class="form-control bg-gray rounded-half" value="{{$banner_title}}" required />
                            </div>

                            <div class="col-md-6"></div>

                            <div class="form-group col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="project[banner_description]" class="form-control bg-gray rounded-half"  rows="6">{{$banner_description}}</textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label">Banner Background Image</label>
                                <input type="file" name="mobile_banner_background" class="form-control bg-gray rounded-half" />
                            </div>

                            <?php
                                $ios_app_url     = \App\Models\ProjectMeta::get_meta_value($id, 'ios_app_url');
                                $android_app_url = \App\Models\ProjectMeta::get_meta_value($id, 'android_app_url');
                            ?>

                            <div class="form-group col-md-4">
                                <label class="form-label">ios App Url</label>
                                <input type="text" name="metaData[ios_app_url]" class="form-control bg-gray rounded-half" value="{{$ios_app_url}}" required />
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label">Android App Url</label>
                                <input type="text" name="metaData[android_app_url]" class="form-control bg-gray rounded-half" value="{{$android_app_url}}" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Google Map Iframe</label>
                            <textarea name="project[map_iframe]" class="form-control bg-gray rounded-half"  rows="6">{{$map_iframe}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Custom Css</label>
                            <textarea name="project[custom_css]" class="form-control bg-gray rounded-half"  rows="6">{{$custom_css}}</textarea>
                        </div>

                        <input type="hidden" name="id" value="{{$id}}" />
                        
                        <?php
                            $buttonText = 'Publish';

                            if($id != '') {
                                $buttonText = 'Update Project';
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
            <label>Image</label>
            <input type="file" name="gallery[0][galleryImage]" class="form-control" />
        </div>

        <div class="btn-close">
            <button type="button" class="btn-delete">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>

<div class="faq-data" style="display: none;">
    <div class="faq-data-wrap">
        <div class="form-group">
            <label>Question</label>
            <input type="text" name="faqData[0][question]" class="form-control" />
        </div>

        <div class="form-group">
            <label>Answer</label>
            <textarea name="faqData[0][answer]" class="form-control" rows="4"></textarea>
        </div>

        <div class="btn-close">
            <button type="button" class="btn-delete">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>
@endsection
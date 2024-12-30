@extends('layouts.admin.admin-layout')

@section('admin')
<!-- Tagify CSS -->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">

<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Procurement</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ol>

                <a href="{{url('admin/procurement/')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Add' : 'Edit'; ?> Procurement</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{url('admin/process-procurement')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="formData[title]" class="form-control bg-gray rounded-half" value="{{$title}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Request for Proposal  No</label>
                            <input type="text" name="formData[proposalRequestID]" class="form-control bg-gray rounded-half" value="{{$proposalRequestID}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">City</label>
                            <input type="text" name="formData[city]" class="form-control bg-gray rounded-half" value="{{$city}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Department</label>
                            <input type="text" name="formData[department]" class="form-control bg-gray rounded-half" value="{{$department}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="formData[categoryID]" required>
                                <option value="">Select Category</option>
                                @foreach ($categoriesData as $category)
                                    <?php $selected = ''; ?>
                                    <?php  
                                        if($category['id'] == $categoryID) {
                                            $selected = 'selected';
                                        }
                                    ?>
                                    <option value="{{ $category['id'] }}" {{ $selected}} >{{ $category['name'] }}</option>
                                    @if (isset($category['children']))
                                        @foreach ($category['children'] as $child)
                                            <?php  
                                                if($child['id'] == $categoryID) {
                                                    $selected = 'selected';
                                                }
                                            ?>
                                            <option value="{{ $child['id'] }}" {{ $selected}} >-- {{ $child['name'] }}</option>
                                            @if (isset($child['children']))
                                                @foreach ($child-['children'] as $grandChild)
                                                    <option value="{{ $grandChild['id'] }}">---- {{ $grandChild['name'] }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-6"></div>

                        <div class="clearfix"></div>
                        
                        <div class="form-group col-6">
                            <?php 
                                $formatedDate = \Carbon\Carbon::parse($date_publication)->format('Y-m-d');
                            ?>
                            <label class="form-label">Date of publication of the call for tenders</label>
                            <input type="date" name="formData[date_publication]" class="form-control bg-gray rounded-half" value="{{$formatedDate}}" />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Date of Closing of tenders</label>
                            <input type="date" name="formData[date_closing]" class="form-control bg-gray rounded-half" value="{{\Carbon\Carbon::parse($date_closing)->format('Y-m-d')}}" />
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-6 form-group">
                            <div class="form-check d-flex">
                                <input type="checkbox" name="formData[featured]" class="form-check-input show-form" data-target="noOfDays" value="1" {{($featured == '1') ? ' checked' : ''}} />
                                <label class="form-check-label">
                                    Featured
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-6 noOfDays" style="display: {{($featured == '1') ? ' block' : 'none'}};">
                            <label class="form-label">No Of Days</label>
                            <input type="number" name="formData[no_of_days]" class="form-control bg-gray rounded-half" value="{{$no_of_days}}" />
                        </div>

                        <div class="clearfix"></div>    
                        
                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between">
                                <label>Attachment</label>
                                <a href="javascript:void(0);" class="btn btn-info d-none d-lg-block m-l-15 add-gallery">
                                    <i class="fa fa-plus-circle"></i> Add File
                                </a>
                            </div>

                            <div class="gallery-images-wrapper">
                            @if(!empty($attachments))
                                @foreach($attachments as $index => $attachment)
                                    <div class="gallery-image">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="files[{{ $index }}][title]" class="form-control" value="{{ $attachment->title }}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Attachment</label>
                                            <input type="file" name="files[{{ $index }}][attachment]" class="form-control" />   
                                            <input type="hidden" name="files[{{ $index }}][existingAttachment]" value="{{ $attachment->filename }}" />                                         
                                        </div>

                                        <div class="gallery-img-thumbnail">
                                            <a href="{{asset('public/assets/uploads/procurement/' . $attachment->filename)}}" target="_blank">View File</a>
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

                        <input type="hidden" name="id" value="{{$id}}" />
                        
                        <?php
                            $buttonText = 'Publish';

                            if($id != '') {
                                $buttonText = 'Update';
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
            <label>Title</label>
            <input type="text" name="files[0][title]" class="form-control" />
        </div>

        <div class="form-group">
            <label>Attachment</label>
            <input type="file" name="files[0][attachment]" class="form-control" />
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
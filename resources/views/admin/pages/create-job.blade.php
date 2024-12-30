@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Jobs</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Jobs</li>
                </ol>

                <a href="{{url('admin/careers/')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= ($id == '') ? 'Add' : 'Edit'; ?> Job</h4>

                    <form method="POST" action="{{url('admin/create-job')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="careers[title]" class="form-control bg-gray rounded-half" value="{{$title}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="careers[location]" class="form-control bg-gray rounded-half" value="{{$location}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Age Limit</label>
                            <input type="text" name="careers[age_limit]" class="form-control bg-gray rounded-half" value="{{$age_limit}}" required />
                        </div>
                        
                        <div class="clearfix"></div>

                        <div class="form-group col-6">
                            <label class="form-label">Qualification</label>
                            <input type="text" name="careers[qualification]" class="form-control bg-gray rounded-half" value="{{$qualification}}" required />
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label">Last Date Apply</label>
                            <input type="date" name="careers[last_date_apply]" class="form-control bg-gray rounded-half" value="{{$last_date_apply}}" required />
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group ">
                            <label>Job Description</label>
                            <textarea  id="editorRichText" name="careers[job_description]" class="content1 form-control" data-target="content1" rows="15">{{$job_description}}</textarea>
                        </div>

                        <input type="hidden" name="id" value="{{$id}}" />
                        
                        <?php
                            $buttonText = 'Publish';

                            if($id != '') {
                                $buttonText = 'Update Job';
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
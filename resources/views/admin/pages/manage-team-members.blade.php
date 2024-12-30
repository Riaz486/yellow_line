@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Team Members</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Team Members</li>
                </ol>

                <a href="{{url('admin/team/categories')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Manage Categories
                </a>

                <a href="{{url('admin/team/create')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Create Member
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Team Members</h4>
                    
                        <form method="GET">
                        <div class="form-group">
                            <label>Filter By Categories</label>
                            <select name="category" class="form-control" onchange="this.form.submit();">
                                <option value="all">View All</option>
                                <?php foreach($categoriesData as $category): ?>
                                <?php $selected = ''; ?>
                                <?php if($category->id == $selectedID) { ?>
                                <?php
                                    $selected = 'selected';
                                ?>
                                <?php } ?>
                                    <option value="{{ $category->id }}" {{$selected}}>{{ $category->name }}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </form>
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
                            @foreach($teamData as $team)	
                                <tr>
                                    <td><?= $team->id; ?></td>
                                    <?php 
                                        if($team->file == '') {
                                            $postImage = 'noimage.webp';
                                        } else {
                                            $postImage = $team->file;
                                        }
                                    ?>
                                    <td><img src="{{asset('public/assets/uploads/'.  $postImage)}}" /></td>
                                    <td><?= $team->name; ?></td>
                                    <td>{{$team->designation}}</td>
                                    <td>{{$team->department}}</td>
                                    <td>{{$team->location}}</td>
                                    <td>
                                        <a href="{{url('admin/team/create/'. $team->id)}}'" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/team/delete/' . $team->id)}}" onclick="return confirm('Want to delete the blog ');" data-toggle="tooltip" data-placement="top" title="Delete">
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
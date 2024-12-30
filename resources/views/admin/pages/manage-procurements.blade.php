@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Procurements</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Procurements</li>
                </ol>

                <a href="{{url('admin/procurement/categories')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Manage Categories
                </a>

                <a href="{{url('admin/procurement/create')}}" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="fa fa-plus-circle"></i> Create Procurement
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Procurement</h4>

                        @if(isset($categoriesData))
                        <form method="GET">
                        <div class="form-group">
                            <label>Filter By Categories</label>
                            <select name="category" class="form-control" onchange="this.form.submit();">
                                <option value="all">View All</option>
                                <?php foreach($categoriesData as $category): ?>
                                <?php if($category->parentID == 0) { ?>
                                <?php $selected = ''; ?>
                                <?php if($category->id == $selectedID) { ?>
                                <?php
                                    $selected = 'selected';
                                ?>
                                <?php } ?>
                                    <option value="{{ $category->id }}" {{$selected}}>{{ $category->name }}</option>
                                <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </form>
                        @endif
                    </div>
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($procurementData as $post)	
                                <tr>
                                    <td><?= $post->id; ?></td>
                                    <td><?= $post->title; ?></td>
                                    <td>{{$post->categoryName}}</td>
                                    <td>
                                        <a href="{{url('admin/procurement/create/'. $post->id)}}'" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/procurement/delete/' . $post->id)}}" onclick="return confirm('Want to delete the blog ');" data-toggle="tooltip" data-placement="top" title="Delete">
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
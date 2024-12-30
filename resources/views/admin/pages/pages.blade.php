@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Manage Pages</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                    </ol>

                    <!-- <a href="{{url('admin/website/manage-navigation')}}" class="btn btn-info d-none d-lg-block m-l-15">
                        <i class="fa fa-plus-circle"></i> Manage Navigations
                    </a> -->
                </div>
            </div>
        </div>
    	<div class="col-lg-12">
            <div class="card">
                <div class="card-body"> 
                	<div class="card-header no-p-lr">
                        <h4 class="card-title mb-0">Manage Pages</h4>
                    </div>

                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>  
                                    <th>Url</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->title}}</td>
                                    <td>{{url($page->slug)}}</td>
                                    <td>
                                        <a href="{{url('/')}}" class="btn btn-sm btn-info btn-rounded" target="_blank">View</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/website/pages/create/'.$page->ID)}}" class="btn btn-sm btn-info btn-rounded">Edit</a>
                                    </td>
                                    <td>
                                        @if($page->page_type == 2)
                                        <a href="{{url('admin/website/pages/delete/'.$page->ID)}}" class="btn btn-sm btn-info btn-rounded">Delete</a>
                                        @endif
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
</div>
@endsection
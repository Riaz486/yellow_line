@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Buses</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Buses</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Buses</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Theme</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($busData as $post)	
                                <tr>
                                    <td><?= $post->id; ?></td>
                                    <?php 
                                        if($post->file == '') {
                                            $postImage = 'noimage.webp';
                                        } else {
                                            $postImage = $post->file;
                                        }
                                    ?>
                                    <td><img src="{{asset('public/assets/uploads/'.  $postImage)}}" /></td>
                                    <td class="row-{{$post->id}}">{{$post->title}}</td>
                                    <td>{{$post->theme}}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{url('admin/manage-buses/city/'. $post->id)}}" data-toggle="tooltip" data-placement="top" title="Manage Routes">
                                                <i class="fa fa-map-marker"></i>
                                                Manage Cities
                                            </a>
                                            &nbsp;
                                            <a href="{{url('admin/manage-buses/routes/'. $post->id)}}" data-toggle="tooltip" data-placement="top" title="Manage Routes">
                                                <i class="fa fa-bus"></i>
                                                Manage Routes
                                            </a>
                                        </div>
                                        
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit" class="edit-bus" id="{{$post->id}}" theme="{{$post->theme}}" file="{{asset('public/assets/uploads/'.  $postImage)}}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{url('admin/manage-buses/delete/' . $post->id)}}" onclick="return confirm('Want to delete the Bus');" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                        <div class="description-{{$post->id}}" style="display: none;">{{nl2br($post->description)}}</div>
                                    </td>
                                </tr>
                            @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Bus</h4>
                    
                    <form method="POST" action="{{url('admin/process-main-form')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="formData[title]" class="form-control" value="" required />
                        </div>
                        
                        <div class="form-group">
                            <label>Featured image</label>
                            <input type="file" name="file" class="form-control m-b-20" />
                            @php
                                $featured_image = 'noimage.webp';
                            @endphp

                            <img src="{{asset('public/assets/uploads/'.  $featured_image)}}" class="ftImage" style="width: 300px;" />
                        </div>

                        <div class="form-group">
                            <label>Theme</label>
                            <select name="formData[theme]" class="form-control">
                                <option value="yellow">Theme Yellow</option>
                                <option value="green">Theme Green</option>
                                <option value="black">Theme Black</option>
                                <option value="orrange">Theme Orrange</option>
                                <option value="pink">Theme Pink</option>
                                <option value="red">Theme Red</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="formData[description]" class="form-control" rows="6"></textarea>
                        </div>

                        <input type="hidden" name="id" value="" />
                        <input type="hidden" name="currentFile" value="{{asset('public/assets/uploads/noimage.webp')}}" />
                        <input type="hidden" name="response" value="manage-buses" />
                        <input type="hidden" name="processType" value="manage_buses" />

                        <button type="submit" class="btn btn-info row-inline waves-effect waves-light m-r-10 cat-submit">Publish</button>
                        <div class="btn-reset row-inline"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
</div>
@endsection
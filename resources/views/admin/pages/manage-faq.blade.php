@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Manage Faq</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Faq</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Faq</h4>
                    
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($faqData as $data): ?>    
                                <tr>
                                    <td><?php echo $data->id; ?></td>
                                    <td class="row-<?php echo $data->id; ?>"><?php echo $data->question; ?></td>
                                    <td>{{ $data->answer }}</td>
                                    <td>
                                        <?php if($data->status == 0) { ?>
                                        <label class='badge badge-warning'>Inactive</label> 
                                        <?php } else { ?>
                                        <label class='badge badge-success'>Active</label> 
                                        <?php } ?>                                       
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="edit-faq" data-id="{{$data->id}}" data-status="{{$data->status}}" answer="{{$data->answer}}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/manage-faq/delete/' . $data->id)}}" onclick="return confirm('Want to delete the category');">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>                                  
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Faq</h4>
                    
                    <form method="POST" action="{{url('admin/create-faq')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="faq[question]" class="form-control" value="" required />
                        </div>

                        <div class="form-group">
                            <label>Answer</label>
                            <textarea name="faq[answer]" class="form-control" required rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="faq[status]" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <input type="hidden" name="id" value="" />

                        <button type="submit" class="btn btn-info row-inline waves-effect waves-light m-r-10 cat-submit">Create Faq</button>
                        <div class="btn-reset row-inline"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
@endsection
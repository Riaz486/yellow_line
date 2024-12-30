@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Fares</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Fares</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Fares</h4>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Fare</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($faresData as $data): ?>    
                                <tr>
                                    <td><?php echo $data->id; ?></td>
                                    <td><?php echo $data->from; ?></td>
                                    <td><?php echo $data->to; ?></td>
                                    <td><?php echo $data->amount; ?></td>
                                    <td>
                                        <a href="javascript:void(0);" class="edit-fare" id="{{$data->id}}" from="{{$data->from}}" to="{{$data->to}}" fare="{{$data->amount}}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('admin/fares/delete/' . $data->id)}}" onclick="return confirm('Want to delete the category');">
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
                    <h4 class="card-title">Create Fare</h4>
                    
                    <form method="POST" action="{{url('admin/process-main-form')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" name="formData[From]" class="form-control" value="" required />
                        </div>

                        <div class="form-group">
                            <label>To</label>
                            <input type="text" name="formData[to]" class="form-control" value="" required />
                        </div>

                        <div class="form-group">
                            <label>Fare</label>
                            <input type="text" name="formData[amount]" class="form-control" value="" required />
                        </div>

                        <input type="hidden" name="id" value="" />
                        <input type="hidden" name="response" value="manage-fares" />
                        <input type="hidden" name="processType" value="fares" />

                        <button type="submit" class="btn btn-info row-inline waves-effect waves-light m-r-10 cat-submit">Create Fare</button>
                        <div class="btn-reset row-inline"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
@endsection
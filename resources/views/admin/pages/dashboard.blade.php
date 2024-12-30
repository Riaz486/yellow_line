@extends('layouts.admin.admin-layout')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card" style="min-height: 174px;">
                <div class="card-body card-bg-green d-flex flex-column align-items-center justify-content-center">
                    <h4 class="card-title text-white">Dashboard</h4>
                    <p class="card-text text-white">You are currently logged in as Administrator!</p>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>

    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body no-padding">
                    <div class="p-5">
                        <div class="card-title text-x1 m-0">Daily Website Visitor's Flow</div>
                    </div> 

                    <div id="morris-area-chart" style="height: 340px;"></div>             
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
</div>

@endsection
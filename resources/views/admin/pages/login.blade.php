<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" href="assets/images/favicon.png">
    <link rel="icon" type="image/icon" href="assets/images/favicon.png"/>
    <title>Yellow Line - Dashboard</title>
    <!-- Custom CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&family=Open+Sans:wght@300;400;500;600;700&family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <link href="{{asset('public/assets/admin/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 31 Page CSS -->
    <link href="{{asset('public/assets/admin/css/dashboard3.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-red-dark fixed-layout">
<div id="main-wrapper"  class="hv-100 d-flex flex-column align-items-center justify-content-center">
    <section class="banner-inner m-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <h1>Admin Login</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="pad-80 w-100">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control bg-gray rounded-half @error('username') is-invalid @enderror" value="{{ old('username') }}" />
                                    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control bg-gray rounded-half @error('password') is-invalid @enderror" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="btn-row align-items-center justify-between">
                                    <button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Login</button>
                                    <a href="{{url('forget-password')}}">Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('public/assets/admin/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/assets/admin/js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/admin/js/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
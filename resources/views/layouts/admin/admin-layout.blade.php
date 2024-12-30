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

      <!-- This page CSS -->
    <link href="{{asset('public/assets/admin/css/morris.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('public/assets/admin/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 31 Page CSS -->
    <link href="{{asset('public/assets/admin/css/dashboard3.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/admin/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/admin/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/admin/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/admin/css/richtext.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-red-dark fixed-layout">

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Loading...</p>
    </div>
</div>

<div id="main-wrapper">
    <header class="topbar">
        @include('layouts.admin.includes.admin-header')
    </header>

    <aside class="left-sidebar">
    	@include('layouts.admin.includes.admin-sidebar')
    </aside>

	<div class="page-wrapper">
	    @yield('admin')
	</div>

    <footer class="footer">
       @include('layouts.admin.includes.admin-footer')
    </footer>
</div>
    @include('layouts.admin.includes.global-scripts')
    @if(isset($edit_layout))
    @include('layouts.admin.includes.edit-layout-script')
    @endif
</body>
</html>
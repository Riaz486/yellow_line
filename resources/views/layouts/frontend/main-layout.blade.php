<!DOCTYPE html>
<html lang="en">
@php
    $logo_size = '';
    $header_logo = '';
    $favicon = '';
    $footer_logo = '';

    $header_contact_phone = '';
    $header_contact_email = '';
    $newsletter_heading = '';
    $newsletter_text    = '';
    
    $socialIcons = array(
        'facebook'  => '',
        'twitter'   => '',
        'google'    => '',
        'instagram' => '',
        'linkedin'  => '',
        'youtube'   => ''
    );

    $contactInfo = array(
        'contact_phone' => '',
        'contact_email' => '',
        'contact_address' => '',
    );

    $labels = array(
        'contact_phone' => 'P',
        'contact_email' => 'E',
        'contact_address' => 'A',
    );
    

    foreach($headerSettingsData as $headerSetting):
        if($headerSetting->meta_key == 'logo_size') {
            $logo_size = $headerSetting->meta_value;
        }

        if($headerSetting->meta_key == 'header_logo') {
            $header_logo = $headerSetting->meta_value;
        }

        if($headerSetting->meta_key == 'favicon') {
            $favicon = $headerSetting->meta_value;
        }
        
        if($headerSetting->meta_key == 'header_contact_phone') {
            $header_contact_phone = $headerSetting->meta_value;
        }

        if($headerSetting->meta_key == 'header_contact_email') {
            $header_contact_email = $headerSetting->meta_value;
        }
    endforeach;

    foreach($footerSettingsData as $footer):
        if(in_array($footer->meta_key, array_keys($socialIcons)) ) {
            $socialIcons[$footer->meta_key] = $footer->meta_value;
        }

        if(array_key_exists($footer->meta_key, $contactInfo)) {
            $contactInfo[$footer->meta_key] = $footer->meta_value;
        }

        if($footer->meta_key == 'newsletter_heading') {
            $newsletter_heading = $footer->meta_value;
        }

        if($footer->meta_key == 'newsletter_text') {
            $newsletter_text = $footer->meta_value;
        }

        if($footer->meta_key == 'footer_logo') {
            $footer_logo = $footer->meta_value;
        }

        if($footer->meta_key == 'description') {
            $description = $footer->meta_value;
        }

        if($footer->meta_key == 'footer_text') {
            $footer_text = $footer->meta_value;
        }
    endforeach;
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <?php
        if($favicon == '') {
            $favicon = 'images/faviconDefault.png';
        } else {
            $favicon = 'uploads/images/' . $favicon;
        }
    ?>

    <link rel="apple-touch-icon" href="{{asset('public/assets/' . $favicon)}}">
    <link rel="icon" type="image/icon" href="{{asset('public/assets/' . $favicon)}}"/>
    <title>Yellow Line</title>
   
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/assets/careers/css/icomoon/style.css?ver='.time())}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/main.css?ver='.time())}}">
    <link rel="stylesheet" href="{{asset('public/assets/careers/css/m-style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/careers/css/style.css?ver='.time())}}">
    <link rel="stylesheet" href="{{asset('public/assets/careers/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/careers/css/career-pg-1.css')}}">

    <!-- Google Font Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Google Font Lato -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        <?php 

            if($logo_size != '') {
                if($logo_size == 'small') {
                    $logoWidth = '150px';
                }

                if($logo_size == 'medium') {
                    $logoWidth = '200px';
                }
                
                if($logo_size == 'large') {
                    $logoWidth = '300px';
                }

                echo 'header .logo-main {
                    width: '.$logoWidth.';
                }';
            }
        ?>
    </style>
</head>

<body>
    <!-- HEADER START  -->
    <header class="header">
        <div class="top-header">
            <div class="container">
                <div class="info">
                    <div class="iconinfo">
                        <i class="fa-solid fa-phone text-white"></i>
                        <a href="tel:{{$header_contact_phone}}">{{$header_contact_phone}}</a>
                    </div>
                    <div class="iconinfo">
                        <i class="fa-solid fa-envelope text-white"></i>
                        <a href="mailto:{{$header_contact_email}}">{{$header_contact_email}}</a>
                    </div>
                </div>

                <div class="info">
                    <h5><a href="https://smta.sindh.gov.pk/">SMTA</a></h5>
                    <a href="https://sindh.gov.pk"><i class="fa-solid text-white fa-house"></i></a>
                    <a href="{{$socialIcons['instagram']}}"><i class="fa-brands text-white fa-instagram"></i></a>
                    <a href="{{$socialIcons['facebook']}}"><i class="fa-brands text-white fa-facebook-f"></i></a>
                    <a href="{{$socialIcons['twitter']}}"><i class="fa-brands text-white fa-twitter"></i></a>
                    <a href="{{$socialIcons['linkedin']}}"><i class="fa-brands text-white fa-linkedin-in"></i></a>                    
                    <a href="{{url('/contact-us')}}" class="btn btn-leaf btn-outline border-color-yellow text-white ml-15">Contact Us</a>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="header-item-left">
                </div>
                <!-- Section: Navbar Menu -->
                <div class="header-item-center">
                    <a href="{{url('/')}}" class="logo">
                        <?php
                            if($header_logo == '') {
                                $header_logo = 'images/logo.png';
                            } else {
                                $header_logo = 'uploads/logo/' . $header_logo;
                            }
                        ?>
                        <img src="{{asset('public/assets/'.$header_logo)}}" />
                    </a>
                    <nav class="menu">
                        <ul class="menu-section">
                            <li class="menu-item-has-children">
                                <a href="#">Welcome</a>
                                <div class="menu-subs about-menu menu-mega menu-column-4">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3">
                                            <a href="{{url('who-we-are')}}">
                                                <div class="preview-home-image position-relative who-we-are-menu">
                                                    <div class="overlay-text">
                                                        <h4 class="text-uppercase">Who Are We?</h4>
                                                        <p>Sindh region Urban Transport organizing authority</p>
                                                    </div>
                                                </div>
                                             </a>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="{{url('historical')}}">
                                                <div class="preview-home-image position-relative historical-menu">
                                                    <div class="overlay-text">
                                                        <h4 class="text-uppercase">Historical</h4>
                                                        <p>Dakar has an estimated population of nearly 3.5 million
                                                            inhabitants.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="{{url('mission-and-vision')}}">
                                                <div class="preview-home-image position-relative mission-menu">
                                                    <div class="overlay-text">
                                                        <h4 class="text-uppercase">Mission & Vision</h4>
                                                        <p>CETUD operates on behalf of the State, local authorities, and professionals.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="{{url('impact-values')}}">
                                                <div class="preview-home-image position-relative vision-menu">
                                                    <div class="overlay-text">
                                                        <h4 class="text-uppercase">Values & Impact</h4>
                                                        <p>CETUD operates on behalf of the State, local authorities, and professionals.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">About Us</a>
                                <div class="menu-subs about-us-menu menu-mega menu-column-4">
                                    <div class="row">
                                        <div class="col-lg-4 men-column-sidebar" style="position: relative;">
                                            <div>
                                                <ul>
                                                    <li><a href="{{url('smta-act')}}">SMTA ACT</a></li>
                                                    <li><a href="{{url('board-members')}}">Board Members</a></li>
                                                    <li class="has-sub-menu">
                                                        <a href="javascript:void(0);" class="d-flex align-items-center has-sub-menu">
                                                            <span>Our Team</span>
                                                            <i class="icon-chevron-down"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="{{url('our-team/sindh-mass-transit-authority')}}">SMTA Team</a></li>
                                                            <li><a href="{{url('our-team/karachi-mobility-project')}}">KMP Team</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="{{url('organogram')}}">Organogram</a></li>
                                                    <li><a href="{{url('notifications')}}">Notifications</a></li>
                                                </ul>
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/about-us-menu-img.png')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8 side2">
                                            <h5>MESSAGES</h5>
                                            @foreach($publicMessageData as $message)
                                            <div class="mt-4">
                                                <a href="{{url('messages/'.$message->slug)}}">{{$message->title}}</a>
                                                <p>{{$message->designation}}, {{$message->department}}
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Projects</a>
                                <div class="menu-subs projects-mega-menu menu-mega menu-column-7">
                                    <div class="row">
                                    @foreach($projectsData as $project)
                                    <?php 
                                        if($project->thumbnail == '') {
                                            $postImage = 'noimage.webp';
                                        } else {
                                            $postImage = $project->thumbnail;
                                        }
                                    ?>
                                        <div class="col-lg-1-7 list-item">
                                            <a href="{{url('projects/' . $project->slug)}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/uploads/projects/'.  $postImage)}}" class="img-fluid"
                                                        alt="{{$project->title}}">
                                                    <div class="title text-center">{{$project->title}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="#">Routes</a>
                                <div class="menu-subs menu-mega routes-mega-menu menu-column-7">
                                    <div class="row">
                                        <div class="col-lg-1-7 list-item" style="background-color: #E5BD32;">
                                            <a href="{{url('routes/yellow-line-brt-kmp')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/yellow-line-map.png')}}" class="img-fluid"
                                                        alt="People's Bus Service">
                                                    <div class="title text-center text-white">BRT YELLOW LINE ROUTE</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-1-7 list-item" style="background-color: #AB1F1F;">
                                            <a href="{{url('routes/red-line-brt')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/red-line-map.png')}}" class="img-fluid"
                                                        alt="BRT Orange Line">

                                                    <div class="title text-center text-white">BRT RED LINE ROUTE</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-1-7 list-item" style="background-color: #08763F;">
                                            <a href="{{url('routes/green-line-brt')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/green-line-map.png')}}" class="img-fluid"
                                                        alt="BRT Red Line">

                                                    <div class="title text-center text-white">BRT GREEN LINE ROUTE</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-1-7 list-item" style="background-color: #F18100">
                                            <a href="{{url('routes/orange-line-brt')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/orrange-line-map.png')}}" class="img-fluid"
                                                        alt="BRT Green Line">

                                                    <div class="title text-center text-white">BRT ABDUL SATTAR EDHI ORANGE LINE ROUTE</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-1-7 list-item" style="background-color: #000000">
                                            <a href="{{url('routes/electric-vehicle-ev-bus')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/ev-bus-route.png')}}" class="img-fluid"
                                                        alt="BRT Yellow Line">

                                                    <div class="title text-center text-white">EV BUS ROUTES</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-1-7 list-item" style="background-color: #C01010 ">
                                            <a href="{{url('routes/people-bus-service-pbs')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/people-bus-route.png')}}" class="img-fluid"
                                                        alt="Electric Vehicle Buses">

                                                    <div class="title text-center text-white">PEOPLES BUS SERVICE ROUTES</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-1-7 list-item" style="background-color: #ED14A8">
                                            <a href="{{url('routes/pink-bus')}}">
                                                <div class="preview-home-image">
                                                    <img src="{{asset('public/assets/images/pink-bus-route.png')}}" class="img-fluid"
                                                        alt="Pink Buses">
                                                    <div class="title text-center text-white">PINK BUS ROUTES</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Fare / Afc</a>
                                <div class="menu-subs menu-mega menu-column-4"
                                    style="max-width: 18rem; left: 58%; transform: translateX(-50%);">
                                    <div class="row small-dropdown">
                                        <div>
                                            <ul>
                                                <li><a href="{{url('fare')}}">Fare</a></li>
                                                <li><a href="{{url('automated-fare-collection')}}">Automated Fare Collection</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Procurement</a>
                                <div class="menu-subs menu-mega menu-column-4"
                                    style="max-width: 22rem; left: 67%; transform: translateX(-50%);">
                                    <div class="row small-dropdown">
                                        <div>
                                            <ul>
                                                <li><a href="{{url('procurement/procurement-of-consulting-non-consulting-goods-service')}}">Procurements of Goods Services and Work</a></li>
                                                <li><a href="{{url('procurement/procurement-of-civil-work')}}">Procurement Of Civil Work</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Reports</a>
                                <div class="menu-subs menu-mega menu-column-4"
                                    style="max-width: 18rem; left: 75%; transform: translateX(-50%);">
                                    <div class="row small-dropdown">
                                        <div>
                                            <ul>
                                                <li><a href="{{url('financial-reports')}}">Financial Reports</a></li>
                                                <li><a href="{{url('social-and-resettlement-reports')}}">Social and Resettlement Reports</a></li>
                                                <li><a href="#!">Environment Reports</a></li>
                                                <li><a href="{{url('gender-action-plan-reports')}}">Gender action plan Reports</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children last-mega">
                                <a href="#">More</a>
                                <div class="menu-subs menu-mega more-menu menu-column-4">
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-lg-5 men-column-sidebar">
                                            <div>
                                                <ul>
                                                    <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                                                    <li><a href="{{url('help-and-complaints')}}">Help & Complaints</a></li>
                                                    <li><a href="{{url('advertisements')}}">Advertisements</a></li>
                                                    <li><a href="{{url('careers')}}">Career</a></li>
                                                    <li><a href="{{url('downloads')}}">Downloads</a></li>
                                                    <li><a href="{{url('what-is-brt')}}">Project BRT</a></li>
                                                    <li><a href="{{url('frequently-asked-questions')}}">Frequently Asked Questions</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Middle Column -->
                                        <div class="col-lg-7 men-column-sidebar">
                                            <h5>NEWS & CURRENT EVENTS - Media Corner</h5>
                                            <div>
                                                <ul>
                                                    <li class="has-sub-menu">
                                                        <a href="javascript:void(0);" class="d-flex align-items-center has-sub-menu">
                                                            <span>Gallery</span>
                                                            <i class="icon-chevron-down"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="{{url('gallery/photo-library')}}">Photo Library</a></li>
                                                            <li><a href="{{url('gallery/video-library')}}">Video Library</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#!">Newsletters</a></li>
                                                    <li><a href="{{url('press-release')}}">Press Releases</a></li>
                                                    <li><a href="{{url('events')}}">All Events</a></li>
                                                    <li><a href="{{url('news/all-smta-prohect-news')}}">News</a></li>
                                                    <li><a href="{{url('news/featured-news')}}">Featured News</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Right Column with Image -->
                                        <div class="image-column">
                                            <div class="preview-home-image"
                                                style="position:absolute; right: 45px;bottom: 25px;">
                                                <img src="{{asset('public/assets/images/more-menu-img.png')}}" alt="BRT Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="search-dropdown dropdown">
                                <a href="#" class="search-header-btn" 
                                    aria-expanded="false">
                                    <i class="icon-search"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="search-header bg-yellow text-white">
        <form method="POST" class="header-search-form">
            <div class="search-header-input">
                <input type="text" name="searchQuery" placeholder="Search here..." />
                <button type="submit" class="sm-search-btn">
                    <span class="iconify" data-icon="ion:search-outline" data-inline="false"></span>
                </button>
            </div>
        </form>
    </div>

    <!-- HEADER END  -->

    @yield('content')

    <div class="mini-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white mini-footer-content">
                    <h2>NEWSLETTER</h2>
                    <p>Stay connected! Subscribe to the newsletter to receive the essentials of CETUD's Major Projects
                        and more...</p>
                </div>
                <div class="col-md-6">
                    <div class="newsletter-form d-flex align-items-center justify-content-end">
                        <input type="text" placeholder="Your Email Address">
                        <button type="button" class="bg-yellow text-white">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #######################body content end###################### -->

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <?php
                        if($footer_logo == '') {
                            $footer_logo = 'images/logo.png';
                        } else {
                            $footer_logo = 'uploads/logo/' . $footer_logo;
                        }
                    ?>
   
                    <img src="{{asset('public/assets/' . $footer_logo)}}" class="logo" alt="">
                    <p class="mb-lg-4">
                        {{$description}}
                    </p>
                </div>

                <div class="col-md-3">
                    <h4 class="title">Contacts</h4>

                    <?php 
                        $nonEmptyContactInfo = array_filter($contactInfo, fn($value) => !empty($value));

                        if (!empty($nonEmptyContactInfo)): 
                    ?>
                        <div class="footerContact">
                            <h5 class="text-white">Address</h5>

                            <p>
                                {{$nonEmptyContactInfo['contact_address']}}
                            </p>
                        </div>

                        <div class="footerContact">
                            <h5 class="text-white">Coordinates</h5>

                            <p>
                                Email : {{$nonEmptyContactInfo['contact_email']}}
                            </p>

                            <p>
                                Cell : {{$nonEmptyContactInfo['contact_phone']}}
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-2">
                    <h4 class="title">Quick Access</h4>
                    <div class="links">
                        <a href="{{url('who-we-are')}}">WHO ARE WE?</a>
                        <a href="{{url('help-and-complaints')}}">help & Complaints</a>
                        <a href="{{url('advertisements')}}">Advertisements</a>
                        <a href="{{url('contact-us')}}">Contact Us</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4 class="title">FOLLOW US</h4>
                    <div class="social">
                        <a href="{{$socialIcons['instagram']}}"><img src="{{asset('public/assets/images/instagram-icon.png')}}" alt=""></a>
                        <a href="{{$socialIcons['facebook']}}"><img src="{{asset('public/assets/images/facebook-icon.png')}}" alt=""></a>
                        <a href="{{$socialIcons['linkedin']}}"><img src="{{asset('public/assets/images/linkedin-icon.png')}}" alt=""></a>
                        <a href="{{$socialIcons['twitter']}}"><img src="{{asset('public/assets/images/twitter-icon.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="topbtn">
                <div class="sidedrop">
                    This site in: <img src="{{asset('public/assets/careers/images/site.png')}}" alt="">
                    <!-- <select name="" id="">
                        <option value="">United America</option>
                    </select> -->
                </div>
                <a href="#top" class="top-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="0.9em" height="1em" viewBox="0 0 630 700"><path fill="currentColor" d="M0 352L311 41l311 311l-66 65l-245-245L65 417z"/></svg>
                </a>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="container">
            <p>{{$footer_text}}</p>
            <div class="menu">
                <a href="#">Legal</a>
                <a href="#">Privacy Notes</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Site Accessibillity</a>
            </div>
        </div>

    </section>

    <div class="social_slider" style="top: 10% !important;">
        <input id="tab1" type="radio" name="tabs" checked />
        <label for="tab1" class="facebook_icon"  style="max-width: 32px;"></label>
        <input id="tab2" type="radio" name="tabs" />
        <label for="tab2" class="twitter_icon" style="max-width: 32px;"></label>
        <section id="content1">
            <div class="facebook_box">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/cetudsn&tabs=timeline&width=350&height=470&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true" width="350" height="470" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">
                </iframe>
            </div>
        </section>
        <section id="content2">
            <div class="twitter_box">
                <a class="twitter-timeline" data-width="350" data-height="470" href="https://twitter.com/CETUD_SN">Tweets by CETUD_SN</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </section>
        <a href="https://jsns.eu/joomla-extensions" title="Joomla Extensions" target="_blank" class="copyrightlink">Joomla Extensions</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('public/assets/careers/js/mlib.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery-simple-upload.js')}}"></script>
    <script src="{{asset('public/assets/careers/js/function.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
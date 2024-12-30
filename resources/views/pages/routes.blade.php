@extends('layouts.frontend.main-layout')

@section('content')
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p class="category-main-title">Projects Routes</p>
                <h2 class="heading py-2">{{$projectName}}</h2>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey pt-80 pb-80">
    <div class="container">
        <div class="{{$routeTheme}}">
            <div class="row">
                <div class="col-md-6 pr-100">
                    <div class="route-content">
                        <h2><strong>{{$projectName}}</strong> Routes</h2>
                        <p>
                            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="route-info-wrapper">
                        <div class="route-info-box">
                            <div class="route-thumbnail">
                                <img src="{{asset('public/assets/images/route-box-img.png')}}" class="img-fluid" />
                            </div>

                            <div class="route-info-content">
                                <p>
                                    address mobility issues, CETUD has risen to the challenge and, over time, activated 
                                </p>

                                <a href="#">
                                    <span>Read More</span>
                                    <span class="iconify" data-icon="mdi:menu-right" style="font-size: 48px; color: black;"></span>
                                </a>
                            </div>
                        </div>

                        <div class="route-info-box">
                            <div class="route-thumbnail">
                                <img src="{{asset('public/assets/images/route-box-img.png')}}" class="img-fluid" />
                            </div>

                            <div class="route-info-content">
                                <p>
                                    address mobility issues, CETUD has risen to the challenge and, over time, activated 
                                </p>

                                <a href="#">
                                    <span>Read More</span>
                                    <span class="iconify" data-icon="mdi:menu-right" style="font-size: 48px; color: black;"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container pt-70">
    <div class="row">
        <div class="col-md-12">
            <?php
                $cityName = $projectName;
                $cityID   = 'manual';    
            ?>
            @if(count($citiesData))
            <ul class="nav-tabs-pane">
            <?php $i = 1; ?>
            @foreach($citiesData as $city)
                <li><a href="{{url('get-cities-data/' . $city->id)}}" class="nav-item-btn get-city-data {{$i == 1 ? 'nav-item-active' : ''}} {{$navTheme}}">{{$city->name}} Routes</a></li>
            <?php
                if($i == 1) {
                    $cityName = $city->name;
                    $cityID   = $city->id;
                }
            ?>
            <?php $i++; ?>
            @endforeach
            </ul>
            @endif

            <div class="fare-tabs-wrapper routes-tab">
                <div class="fare-tab-content {{$routeTheme}} fare-tab-active" id="karachiroutes">
                    <h3 class="cityname">{{$cityName}} ROUTES</h3>

                    <div class="d-flex align-items-center gap-20 mc-dropdown-wrap">
                        <div class="m-cat-dropdown">
                            <a href="#tab1" class="nav-tab-default-item drop-tab-selected has-mega-menu">{{$projectName}} Routes & Stops</a>
                        </div>

                        <div class="m-cat-dropdown">
                            <a href="#tab2" class="nav-tab-default-item">{{$projectName}} Live Map</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="loader-sub" id="route-load">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $routeTitle  = '';
    $description = '';
    $distance    = '';
?>

<section class="position-relative {{$routeTheme}}">
    <div class="mega-menu-routes">
        <div class="row">
            <div class="col-md-9">
                <div class="routes-menu-tabs flex-4">
                <?php $j = 1; ?>
                @foreach($routesData as $route)
                    <a href="{{url('/get-routes/' . $route->id)}}" class="get-routes {{$j == 1 ? 'get-routes-active' : ''}}">
                        <h6>{{$route->name}}</h6>
                        <span>{{$route->description}}</span>
                    </a>
                <?php
                    if($j == 1) {
                        $routeTitle  = $route->name;
                        $description = $route->description;
                        $distance    = $route->distance;
                        $routeID     = $route->id;
                    }
                ?>
                <?php $j++; ?>
                @endforeach
                </div>
            </div>

            <div class="col-md-3">
                <div class="img-full">
                    <img src="{{asset('public/assets/images/yellow-line-mega-menu-img.jpg')}}" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container pb-70">
    <div class="row">
        <div class="col-md-12">
            <div class="fare-tabs-wrapper routes-tab">
                <div class="fare-tab-content {{$routeTheme}} fare-tab-active" id="karachiroutes">
                    <div class="tabs-wrapper">
                        <div class="tabs-content default-tab-show pt-40 pb-40 pl-0 pr-0" id="tab1">
                            <h4 class="routes-title"><strong class="city">{{$cityName}}</strong> Routes & Stops </h4>

                            <div class="routesWrapper">
                                <div class="routes-info-box">
                                    <h4>
                                        <span class="iconify" data-icon="maki:bus"></span>
                                        <strong class="route-title">{{$routeTitle}}</strong>
                                        <span class="route-description">{{$description}}</span>
                                    </h4>

                                    <span class="route-distance">{{$distance}} Kilometeres</span>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="routes-stops-wrapper">
                                        <ul>
                                            @foreach($routesStopsData as $stop)
                                            @if($stop->RouteID == $routeID)
                                            <li>
                                                <span>{{$stop->stopName}}</span>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="google-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m46!1m12!1m3!1d28946.866598839275!2d67.09519469888524!3d24.919860255341806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m31!3e0!4m5!1s0x3eb3385adeb3a5db%3A0x424d30b4941075ff!2sGulistan%20e%20Johar%20Block%209%20Gul%20Housing%20Society%20Block%209%20A%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.927971799999998!2d67.1525821!4m5!1s0x3eb3385cc434f833%3A0x64cb0c1986be496d!2sStreet%20No.%206%2C%20Block%207%20Gulistan-e-Johar%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!3m2!1d24.9336737!2d67.1532909!4m5!1s0x3eb33940834342c5%3A0x594d4a79399f86f9!2sSamama%20Shopping%20Complex%2C%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.9283429!2d67.1116109!4m5!1s0x3eb338cd9867c58f%3A0xc1507c3c3825eb1e!2sNipa%20Chowrangi%20Bus%20Stop%2C%20Block%2010%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.917755!2d67.0971768!4m5!1s0x3eb33edf57c0d5f5%3A0x956c5a189579b59d!2sExpo%20Centre%20Karachi%2C%20Main%20University%20Road%2C%20Block%2015%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.901895399999997!2d67.0767307!5e0!3m2!1sen!2s!4v1730324795990!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tabs-content pt-40 pb-40 pl-0 pr-0" id="tab2">
                            <div class="routesWrapper liveBusTracking">
                                <div class="routes-info-box">
                                    <h4>
                                        <span class="iconify" data-icon="maki:bus"></span>
                                        <strong class="route-title">{{$routeTitle}}</strong>
                                        <span class="route-description">{{$description}}</span>
                                    </h4>

                                    <span class="route-distance">{{$distance}} Kilometeres</span>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="live-bus-tracking-info">
                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus bus-live">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus bus-stopped">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus bus-live">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>

                                        <a href="javascript:void(0);" class="btn-bus-location bn-info-bus">
                                            <div class="bud-btn-details">
                                                <span class="iconify" data-icon="maki:bus"></span>
                                                <span>JB 4736</span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="google-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m46!1m12!1m3!1d28946.866598839275!2d67.09519469888524!3d24.919860255341806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m31!3e0!4m5!1s0x3eb3385adeb3a5db%3A0x424d30b4941075ff!2sGulistan%20e%20Johar%20Block%209%20Gul%20Housing%20Society%20Block%209%20A%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.927971799999998!2d67.1525821!4m5!1s0x3eb3385cc434f833%3A0x64cb0c1986be496d!2sStreet%20No.%206%2C%20Block%207%20Gulistan-e-Johar%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!3m2!1d24.9336737!2d67.1532909!4m5!1s0x3eb33940834342c5%3A0x594d4a79399f86f9!2sSamama%20Shopping%20Complex%2C%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.9283429!2d67.1116109!4m5!1s0x3eb338cd9867c58f%3A0xc1507c3c3825eb1e!2sNipa%20Chowrangi%20Bus%20Stop%2C%20Block%2010%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.917755!2d67.0971768!4m5!1s0x3eb33edf57c0d5f5%3A0x956c5a189579b59d!2sExpo%20Centre%20Karachi%2C%20Main%20University%20Road%2C%20Block%2015%20Gulshan-e-Iqbal%2C%20Karachi!3m2!1d24.901895399999997!2d67.0767307!5e0!3m2!1sen!2s!4v1730324795990!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
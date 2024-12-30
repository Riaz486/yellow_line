@extends('layouts.frontend.main-layout')

@section('content')

<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<section class="banner">
    <div class="container">
        <div class="banner-slider">
            <div class="banner-slide-item">
                <div class="inner-text text-white">
                    <h1>BRT - Bus Rapid Transit</h1>
                    <h2>KMP - Yellow Line</h2>
                    <p class="text-md-2 text-white">For Sustainable Urban Mobility</p>
                </div>
            </div>

            <div class="banner-slide-item">
                <div class="inner-text text-white">
                    <h1>Projects</h1>
                    <h2>Career Oppo</h2>
                    <p class="text-md-2 text-white">For Sustainable Urban Mobility</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-yellow text-white">
    <div class="info-data">
        <div class="marquee-slider">
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Explore our project -  BRT</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Explore our project -  BRT</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Explore our project -  BRT</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Explore our project -  BRT</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
            <div class="d-flex align-items-center justify-content-center gap-10 text-sm-1">Bus Rapid Transit Yellow Line Karachi Mobility</div>
        </div>
    </div>
</section>

<section class="bg-grey pt-60 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center mb-60">
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="main-testimonial-slider">
                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-1.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Third Generation BRT</h3>
                                <p>
                                    The BRT system, featuring a dedicated BRT corridor, façade-to-façade improvements, and
                                state-of-the-art electric and diesel hybrid buses, offers seamless integration both on
                                and off the corridor, significantly enhancing mobility, accessibility, and safety for
                                commuters.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-2.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Safe for Women & Transgenders</h3>
                                <p>
                                    Our objective is to foster inclusivity and ensure that female and transgender/intersex
                                commuters feel safe and welcome. Each bus will feature designated compartments for
                                passengers, complemented by state-of-the-art CCTV surveillance ensuring a secure journey
                                experience for all.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-3.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Clean Electric Vehicle Buses</h3>
                                <p>
                                Introducing an innovative sustainable transport system featuring electric vehicle (EV)
                                buses, designed to eliminate emissions and promote environmental stewardship in urban
                                mobility.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-4.jpeg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Platform Level Boarding</h3>
                                <p>Level boarding ensures a seamless experience for senior citizens, women, and individuals
                                with special needs, allowing them to board and alight buses without the need to climb
                                stairs.</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-5.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Pedestrian Facilities</h3>
                                <p>
                                    Specially designed pathways exclusively for non-motorized transport and BRT stations
                                equipped with escalators and elevators, aims to improve accessibility for the elderly
                                and people with special needs and encourage sustainable, eco-friendly commuting choices.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-6.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Universal Access to Stations</h3>
                                <p>
                                The BRT project provides secure station access with designated parking spaces,
                                complemented by convenient access through feeder and direct services, improving
                                connectivity and making public transport more accessible to everyone.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-7.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Automated Fare Collection</h3>
                                <p>
                                The Automated Fare Collection (AFC) system integrates various components to automate the
                                ticketing process within a public transportation network, enhancing both operational
                                efficiency and passenger satisfaction, making commuting smoother and more convenient.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-8.jpeg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Economic Growth and Job Opportunities</h3>
                                <p>
                                The project envisaged the employment opportunities along the Yellow Corridor. It has
                                connected key areas, facilitating job access within a short commute.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('public/assets/images/testimonial/testimoni-img-9.jpg')}}" class="img-fluid d-block" />
                            </div>    

                            <div class="testimonial-content">
                                <div class="thumb-icon">
                                    <img src="{{asset('public/assets/images/icon-quotes.svg')}}" class="img-fluid d-block" />
                                </div>
                                <h3>Environmental and Social Impact</h3>
                                <p>
                                The project's commitment to environmental and social initiatives, along with the
                                implementation of safety protocols and a focus on mitigating gender-based violence, will
                                make a significant impact.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-140 pb-140 brt-bg-img position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="brt-info-box text-center position-relative">
                    <div class="d-flex align-items-center justify-content-center mb-30">
                        <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                    </div>

                    <h2 class="text-lg-1 mb-40"><span class="pt-serif">What is a</span> BRT?</h2>

                    <p>
                        A Bus Rapid Transit (BRT) or Bus High Level Service (BHNS) is a mass transport
                        <br />
                        by high capacity bus.,
                        <br />
                        running on a exclusively reserved lane
                    </p>

                    <a href="#" class="btn btn-half-curved text-uppercase text-white bg-yellow custom-btn mt-60">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center mb-30">
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>
                
                <div class="text-center">
                    <h2 class="text-lg-3 pt-serif text-uppercase">Discover the bus rapid transit {BRT} project</h2>
                    <h3 class="text-col-info">A vast urban project for high-quality transport</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <h2 class="text-grey-1">Our Services</h2>
                <p>The Karachi BRT Red Line will be a game-changer for the city, integrating proximate land use with Transit-Oriented development. The design features of the Red Line infrastructure are at par with international standards, ensuring accessibility, mobility, and last-mile connectivity for citizens.</p>
            </div>

            <div class="col-md-7">
                <h2 class="text-grey-1">Key  Mobility Figures</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="stat-box">
                            <span class="stat-number">22</span>
                            <span class="stat-heading">K-BRT Stations</span>
                            <p>A total of 22 stations will be built on a dedicated BRT corridor from Malir Halt to Numaish.</p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="stat-box">
                            <span class="stat-number">22</span>
                            <span class="stat-heading">Off Corridor Bus Shelters</span>
                            <p>A total of 22 off-corridor shelters will be built on a dedicated BRT corridor from Malir Halt to Numaish.</p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="stat-box">
                            <span class="stat-number">22</span>
                            <span class="stat-heading">Bus Depots</span>
                            <p>A total of 22 depots will be built on a dedicated BRT corridor from Malir Halt to Numaish.</p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="stat-box">
                            <span class="stat-number">22</span>
                            <span class="stat-heading">Structures</span>
                            <p>A total of 22 structures will be built on a dedicated BRT corridor from Malir Halt to Numaish.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="recent-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center mb-30">
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="section-heading text-center">
                    <h2 class="text-lg-1">Recent <span class="pt-serif">News</span></h2>
                    <p class="text-grey-1">Find the recent news on the Bus rapid project In Karachi</p>
                </div>

                <div class="news-items">
                    <div class="row mb-60">
                    @foreach($latestNews as $post)	
                        <div class="col-md-4">
                            <div class="recruitment-card thubnail-card">
                                <div class="postThumbnail">
                                <?php 
                                    if($post->featured_image == '') {
                                        $postImage = 'noimage.webp';
                                    } else {
                                        $postImage = $post->featured_image;
                                    }
                                ?>
                                    <img src="{{asset('public/assets/uploads/posts/'.  $postImage)}}" />
                                </div>
                                <div class="recruitment-sun"></div>
                                <div class="recruitment-date d-flex gap-2">
                                    <img src="{{asset('public/assets/images/calendar.svg')}}" class="ms-2" alt=""> {{\Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}
                                </div>
                                <div class="recruitment-title">
                                    <a href="{{url($post->categorySlug . '/' . $post->slug)}}">
                                        {{ \Illuminate\Support\Str::limit($post->title, 120) }}
                                    </a>
                                </div>
                                <div class="recruitment-stats">
                                    <div class="recruitment-stat">
                                        <span class="recruitment-stat-icon d-flex gap-2">{{$post->commentsCount}} <img src="{{asset('public/assets/images/comment.svg')}}" alt=""></span>
                                        <span> Comments</span>
                                    </div>
                                    <div class="recruitment-stat ms-2">
                                        <span class="recruitment-stat-icon d-flex gap-2">{{$post->shares}} <img src="{{asset('public/assets/images/share.svg')}}" alt=""></span>
                                        <span>Share</span>
                                    </div>
                                    <div class="recruitment-stat ms-2">
                                        <span class="recruitment-stat-icon">
                                        <span class="iconify" data-icon="octicon:eye-24" data-inline="false"></span>
                                        </span>
                                        <span>{{$post->views}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <a href="{{url('news/all-smta-prohect-news')}}" class="btn-curved-outline">See More News</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="upcoming-events">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-center mb-30">
                <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
            </div>

            <div class="events-section">
                <!-- Left Side (Static Content) -->
                <div class="left-box">
                    <h3>UPCOMING EVENTS</h3>
                    <p>Please visit our Website frequently to know more about upcoming events.</p>
                </div>

                <!-- Right Side (Slider Content) -->
                <div class="right-box">
                    <div class="right-slider w-100 gap-10">
                        <div class="event-item bg-yellow text-white">
                            <h5>Launch of New EV-5 Bus Service Operation (DHA City And Nearby Goths Towards Down Town)</h5>
                            <p>Date of Event: 23rd May 2024</p>
                            <p>Venue: SMTA Office</p>
                            <span>>Posted on 23rd May 2024 | <a href="#">READ MORE</a></span>
                        </div>
                        <div class="event-item bg-yellow text-white">
                            <h5>Launch of New EV-5 Bus Service Operation (DHA City And Nearby Goths Towards Down Town)</h5>
                            <p>Date of Event: 23rd May 2024</p>
                            <p>Venue: SMTA Office</p>
                            <span>>Posted on 23rd May 2024 | <a href="#">READ MORE</a></span>
                        </div>
                        <div class="event-item bg-yellow text-white">
                            <h5>Launch of New EV-5 Bus Service Operation (DHA City And Nearby Goths Towards Down Town)</h5>
                            <p>Date of Event: 23rd May 2024</p>
                            <p>Venue: SMTA Office</p>
                            <span>>Posted on 23rd May 2024 | <a href="#">READ MORE</a></span>
                        </div>
                        <div class="event-item bg-yellow text-white">
                            <h5>Launch of New EV-5 Bus Service Operation (DHA City And Nearby Goths Towards Down Town)</h5>
                            <p>Date of Event: 23rd May 2024</p>
                            <p>Venue: SMTA Office</p>
                            <span>>Posted on 23rd May 2024 | <a href="#">READ MORE</a></span>
                        </div>

                        <div class="event-item bg-yellow text-white">
                            <h5>Launch of New EV-5 Bus Service Operation (DHA City And Nearby Goths Towards Down Town)</h5>
                            <p>Date of Event: 23rd May 2024</p>
                            <p>Venue: SMTA Office</p>
                            <span>>Posted on 23rd May 2024 | <a href="#">READ MORE</a></span>
                        </div>

                        <div class="event-item bg-yellow text-white">
                            <h5>Launch of New EV-5 Bus Service Operation (DHA City And Nearby Goths Towards Down Town)</h5>
                            <p>Date of Event: 23rd May 2024</p>
                            <p>Venue: SMTA Office</p>
                            <span>>Posted on 23rd May 2024 | <a href="#">READ MORE</a></span>
                        </div>
                    </div>

                    <a href="{{url('events')}}"class="btn btn-outline-dark">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey p-120">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="values-section">
                    <div class="values-heading">
                        <h2>Our Values</h2>
                        <p>Strong values guide our daily actions.</p>
                    </div>
                    
                    <div class="values-tabs">
                        <!-- Value Cards -->
                        <div class="value-card active">
                            <div class="value-header">
                                <span class="icon">−</span> Human Bet
                            </div>
                            <p class="value-description">
                                Around renewed skills and a strong team spirit, CETUD makes user satisfaction a strategic dimension at the heart of its action.
                            </p>
                        </div>

                        <div class="value-card">
                            <div class="value-header">
                                <span class="icon">+</span> Human Bet
                            </div>

                            <p class="value-description" style="display: none;">
                                Around renewed skills and a strong team spirit, CETUD makes user satisfaction a strategic dimension at the heart of its action.
                            </p>
                        </div>

                        <div class="value-card">
                            <div class="value-header">
                                <span class="icon">+</span> Human Bet
                            </div>

                            <p class="value-description" style="display: none;">
                                Around renewed skills and a strong team spirit, CETUD makes user satisfaction a strategic dimension at the heart of its action.
                            </p>
                        </div>

                        <div class="value-card">
                            <div class="value-header">
                                <span class="icon">+</span> Human Bet
                            </div>

                            <p class="value-description" style="display: none;">
                                Around renewed skills and a strong team spirit, CETUD makes user satisfaction a strategic dimension at the heart of its action.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="values-heading">
                    <h2 class="pt-serif">Key figures on mobility</h2>
                    <p>Distribution of  travel in Sindh region</p>
                </div>
                <div class="figures">
                    <div class="figure-box">
                        <span class="iconify" data-icon="mdi:walk"></span>
                        <p class="percentage">70%</p>
                        <p>Walking</p>
                    </div>
                    <div class="figure-box">
                        <span class="iconify" data-icon="maki:bus"></span>
                        <p class="percentage">24%</p>
                        <p>Public Transport</p>
                    </div>
                    <div class="figure-box">
                        <span class="iconify" data-icon="mdi:car"></span>
                        <p class="percentage">4%</p>
                        <p>Car</p>
                    </div>
                    <div class="figure-box">
                        <span class="iconify" data-icon="mdi:bicycle"></span>
                        <p class="percentage">2%</p>
                        <p>Bicycles, motorcycles, cart</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video-slider-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="video-heading">NEWS Room</h2>

                <div class="video-preview-box">
                    <video id="video-item" controls muted>
                        <source src="{{asset('public/assets/videos/video-1.mp4')}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="video-slider-nav">
                @for($j = 1; $j <= 9; $j++)
                    <div class="slider-nav-btn">
                        <a class="btn-video-nav" data-url="{{asset('public/assets/videos/video-'.$j.'.mp4')}}">
                            <video id="video-thumbnail" controls muted>
                                <source src="{{asset('public/assets/videos/video-'.$j.'.mp4')}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="thumbnail-meta">
                                <div class="meta-box">
                                    <div class="meta-data">
                                        <img src="{{asset('public/assets/images/calendar.svg')}}" class="ms-2" alt="" /> 
                                        <span>July 1,2024</span>
                                    </div>

                                    <div class="meta-data">
                                        <img src="{{asset('public/assets/images/share.svg')}}" alt="" />
                                    </div>
                                </div>
                                
                                <div class="meta-box">
                                    <div class="meta-data">
                                        <img src="{{asset('public/assets/images/eye.png')}}" class="ms-2" alt="" /> 
                                        <span>1964</span>
                                    </div>
                                </div>
                            </div>

                            <h5>Prime Minister Visits Mohmand Dam Site</h5>
                        </a>
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-120 section-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center text-center">
                    <h2 class="text-uppercase mb-30 text-lg-1">FUNDING</h2>

                    <p class="text-grey-2 text-md-2">
                    The project is sponsored by the Government of Sindh, with financial assistance from the Asian Development Bank (ADB) and co-financiers, including the Asian Infrastructure Investment Bank (AIIB), the French Agency for Development (AFD), and the Green Climate Fund (GCF).
                    </p>

                    <ul class="images-inline">
                        <li>
                            <img src="{{asset('public/assets/images/govt-sindh-logo.png')}}" class="img-fluid">
                        </li>

                        <li>
                            <img src="{{asset('public/assets/images/world-bank-logo.png')}}" class="img-fluid">
                        </li>
                    </ul>
                </div>    
            </div>
        </div>
    </div>
</section>


<section class="images-library">
    <ul class="sppb-gallery clearfix">
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-1.png')}}">
            </span>
        </li>
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-2.png')}}">
            </span>
        </li>
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-3.png')}}">
            </span>
        </li>
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-4.png')}}">
            </span>
        </li>
    </ul>
</section>

<section class="info-banner bg-yellow">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center mb-30">
                    <img src="{{asset('public/assets/images/smta-logo.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="info-banner-content text-center">
                    <h2>Discover</h2>
                    <h2 class="pt-serif">the BRT project presentation video</h2>

                    <div class="btn-wrap d-flex align-items-center">
                        <img src="{{asset('public/assets/images/play-icon-2.svg')}}" class="img-fluid d-block">
                        <span>Watch the video (3.26sec)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
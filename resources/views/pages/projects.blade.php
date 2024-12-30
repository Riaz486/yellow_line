@extends('layouts.frontend.main-layout')

@section('content')
<script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p class="category-main-title">Project</p>
                <h2 class="heading py-2">{{$projectName}}</h2>
            </div>
        </div>
    </div>
</section>

<style>
<?= $projectData->custom_css; ?>
</style>

<section class="bg-grey-2 pt-80 pb-120">
    <div class="container">
        <div class="{{$routeTheme}}">
            <div class="row mb-100">
                <div class="col-md-12">
                    <h2 class="text-center text-lg-1">{{$projectName}}</h2>
                </div>
            </div>

            <?php
                $stations         = \App\Models\ProjectMeta::get_meta_value($id, 'stations');
                $passengers_count = \App\Models\ProjectMeta::get_meta_value($id, 'passengers_count');
                $travel_time      = \App\Models\ProjectMeta::get_meta_value($id, 'travel_time');
            ?>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-box-white">
                        <h2>{{$stations}}</h2>
                        <p>Stations</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stats-box-white">
                        <h2>{{$passengers_count}}</h2>
                        <p>Passengers / Day</p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="stats-box-white">
                        <h2>{{$travel_time}}</h2>
                        <p>Minutes (Travel Time)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-content">
@if($projectName == 'People Bus Service')
@include('pages.templates.projects.brt-people-bus')
@endif

@if($projectName == 'BRT Green Line')
@include('pages.templates.projects.brt-green-line')
@endif

@if($projectName == 'BRT Abdul Sattar Edhi Orange Line')
@include('pages.templates.projects.brt-orrange-line')
@endif

@if($projectName == 'Bus Rapid Transit Red Line')
@include('pages.templates.projects.brt-red-line')
@endif

@if($projectName == 'BUS RAPID TRANSIT YELLOW LINE')
@include('pages.templates.projects.brt-yellow-line')
@endif

@if($projectName == 'Electric Vehicle Bus')
@include('pages.templates.projects.brt-ev-bus')
@endif

@if($projectName == 'Pink Bus')
@include('pages.templates.projects.brt-pink-bus')
@endif
</section>

<section class="video pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-preview-box">
                    <video id="video-item" controls muted>
                        <source src="{{asset('public/assets/uploads/projects/' . $projectData->video_file)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map-slider">
    <div class="map-slide-wrap-box">
        <div class="row">
            <div class="col-md-5">
                <div class="projects-map">
                    {!! $projectData->map_iframe !!}
                </div>
            </div>

            <div class="col-md-7">
                <div class="image-slider-projects-wrapper">
                    <div class="projects-slideshow">
                        <?php
                            $galleryImages = \App\Models\ProjectMeta::get_meta_value($id, 'project_gallery');
                        
                        if(!empty($galleryImages)) {
                            $galleryImages = @unserialize($galleryImages); 
                            if(!empty($galleryImages)) {
                            foreach($galleryImages as $index => $imagePath):
                        ?>
                            <div class="project-slide">
                                <img src="{{asset('public/assets/uploads/projects/' . $imagePath)}}" class="img-fluid">
                            </div>
                        <?php
                            endforeach;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="{{$routeTheme}}">
    <section class="banner-cta">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="banner-cta-text">
                        <h4 class="text-white">{{$projectData->cta_heading}}</h4>
                        <p class="text-white">{{$projectData->cta_description}}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-end">
                    <a href="{{asset('public/assets/uploads/projects/' . $projectData->cta_file)}}" class="btn-cta">
                        <span>Download</span>
                        <span class="iconify" data-icon="bytesize:download" data-inline="false"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @php
        $faqsLeft = $projectData->faqs->slice(0, ceil($projectData->faqs->count() / 2));
        $faqsRight = $projectData->faqs->slice(ceil($projectData->faqs->count() / 2));
    @endphp

    <section class="bg-grey pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="faq-inline faq-straight faq-full">
                        <div class="values-tabs">
                        @foreach($faqsLeft as $faq)
                            <div class="value-card">
                                <div class="value-header">
                                    <span class="icon">+</span> {{$faq->question}}
                                </div>
                                <p class="value-description" style="display: none;">{!! nl2br($faq->answer) !!}</p>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="faq-inline faq-straight faq-full">
                        <div class="values-tabs">
                        @foreach($faqsRight as $faq)
                            <div class="value-card">
                                <div class="value-header">
                                    <span class="icon">+</span> {{$faq->question}}
                                </div>
                                <p class="value-description" style="display: none;">{!! nl2br($faq->answer) !!}</p>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mobile-app-banner pt-90 pb-90 m-0">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="app-content">
                        <h2 class="text-white text-md-3">{{$projectData->banner_title}}</h2>
                        <p class="text-white text-sm-1">{{$projectData->banner_description}}</p>

                        <div class="app-store-icons">
                            <div class="icon-app">
                                <img src="{{asset('public/assets/images/ios-store-icon.png')}}" class="img-fluid" />
                            </div>  
                            <div class="icon-app">
                                <img src="{{asset('public/assets/images/play-store-icon.png')}}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
@endsection
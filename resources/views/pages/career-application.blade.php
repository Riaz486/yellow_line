@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>KARACHI MOBILITY PROJECT</p>
                <h2 class="heading py-2">Career Opportunities</h2>
            </div>
        </div>
    </div>
</section>

<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<section class="pt-90 pb-90">
    <div class="container">
        <div class="steps-form-wrapper">
            <div class="steps-sidebar">
                <ul>
                    <li>
                        <a href="" class="bg-yellow text-white">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Basic Information</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Education</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Work Experience</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Upload Documents</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="steps-form-area">
                <div class="form-header">
                    <h2>{{$jobData->title}}</h2>
                    <div class="form-header-meta">
                        <span>
                            <i class="fa fa-map-marker text-yellow"></i>
                            {{$jobData->location}}
                        </span>
                        <span>
                            (Age Limit: {{$jobData->age_limit}})
                        </span>
                    </div>
                </div>

                <div class="steps-form-inner pt-30 pb-30 pr-40 pl-40">
                    @include('pages.application-steps.' . $steps)
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.frontend.main-layout')

@section('content')
<!-- HEADER END  -->
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

<!-- #######################body content start###################### -->
<div class="container my-5">
    <!-- Job Detail Page -->
    <div class="career-job-container">
        <div class="career-job-card mt-4">
            <div class="d-flex justify-content-between align-items-start">
                <h5 class="career-job-title mb-3" style="width: 85%;">{{$jobData->title}}</h5>
                <a href="{{url('careers/apply/' . $jobData->slug . '/basic-details')}}" class="apply-now-btn">Apply Now</a>
            </div>

            <div class="d-flex align-items-center">
                <span class="career-location me-3 d-flex"><img class="me-1"
                        src=".{{asset('public/assets/careers/images/location-icon-fb.png')}}" alt=""> {{$jobData->location}}</span>
                <span class="career-age-limit">(Age Limit: {{$jobData->age_limit}})</span>
            </div>

            <div class="due-date mt-4">
                <p><span>Apply Before</span> <br>
                {{\Carbon\Carbon::parse($jobData->last_date_apply)->format('F j, Y')}}
                </p>
            </div>

            <div class="career-description mt-4">
                Job Description:
            </div>

            <div class="career-description mt-4">
                {!! $jobData->job_description !!}
            </div>

            <div class="job-loc mt-4">
                Job Advertisement
            </div>

            <div class="career-pdf-list">
                <a href="#" class="career-pdf-item">
                    <i class="fas fa-file-pdf career-pdf-icon"></i>
                    <div class="career-pdf-text">
                        <div class="career-pdf-title">Junior Executive Position</div>
                        <div class="career-pdf-size">250 KB</div>
                    </div>
                </a>
                <a href="#" class="career-pdf-item">
                    <i class="fas fa-file-pdf career-pdf-icon"></i>
                    <div class="career-pdf-text">
                        <div class="career-pdf-title">Senior Manager Role</div>
                        <div class="career-pdf-size">180 KB</div>
                    </div>
                </a>
                <a href="#" class="career-pdf-item">
                    <i class="fas fa-file-pdf career-pdf-icon"></i>
                    <div class="career-pdf-text">
                        <div class="career-pdf-title">IT Specialist Opening</div>
                        <div class="career-pdf-size">200 KB</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- #######################body content end###################### -->
@if(isset($_GET['success']))
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        swal({
            type: "success",
            title: "Success!",
            text: "Application submitted successfully!",
            button: "Okay!",
            className: "swal-yellow" // Optional custom class for styling
        });
    });
</script>
@endif
@endsection
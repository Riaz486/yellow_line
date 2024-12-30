@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>KARACHI MOBILITY PROJECT</p>
                <h2 class="heading py-2">Career Opportunities</h2>
                <!-- <h4 class="mheading">KMP - Yellow Line</h4> -->
            </div>
        </div>
    </div>
</section>


<div class="container my-5">
    <div class="container">
        <div class="row">
            <!-- Top Description Left Column -->
            <div class="col-md-8">
                <p class="career-disc">Find Your Next Job at Sindh Mass Transit Authority, Karachi <br> Mobility
                    project
                    Yellow Line Bus Rapid
                    Transit (BRT).
                </p>
            </div>
            <!-- Top Search Bar Right Column -->
            <div class="col-md-4">
                <!-- Search Box -->
                <div class="search-box">
                    <input type="text" placeholder="Search Here">
                    <button type="button">SEARCH</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Details -->
    <div class="container mt-5">
        <ul class="nav career-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#current">Current Openings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#archived">Archived</a>
            </li>
        </ul>
        <hr class="job-post-hr">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="current">
            @foreach($jobListings as $job)
                <div class="career-job-container">
                    <div class="career-job-card mt-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="career-job-title mb-3" style="width: 85%;">{{$job->title}}</h5>
                            <a href="{{url('careers/view/' . $job->slug)}}" class="career-view-btn">View Details</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="career-location me-3 d-flex"><img class="me-1"
                                src="{{asset('public/assets/careers/images/location-icon-fb.png')}}" alt=""> {{$job->location}}</span>
                            <span class="career-age-limit">(Age Limit: {{$job->age_limit}})</span>
                        </div>
                        <div class="career-qualification mt-4">
                            <b>Qualifications:</b> {{$job->qualification}}
                        </div>
                        <div class="career-description mt-4">
                            <span><b>Job Description:</b></span> 
                            {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($job->job_description)), 150) }}
                        </div>
                    </div>
                    <div class="career-dates py-2 px-4">
                        <span class="career-opening-date d-flex align-items-center">
                            <img src="{{asset('public/assets/careers/images/briefcase-icon.png')}}" class="me-2" alt="">
                            Opening Date : {{\Carbon\Carbon::parse($job->created_at)->format('F j, Y')}}
                        </span>
                        <span class="career-closing-date d-flex align-items-center">
                            <img src="{{asset('public/assets/careers/images/alarm-icon.png')}}" class="me-2" alt="">
                            Last date to apply: {{\Carbon\Carbon::parse($job->last_date_apply)->format('F j, Y')}}
                        </span>
                    </div>
                </div>
            @endforeach
            </div>

            <div class="tab-pane fade" id="archived">
                <div class="text-center py-5">
                    <h5 class="text-muted">No archived job postings available at this time.</h5>
                    <p class="text-muted">Check back later for archived opportunities.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
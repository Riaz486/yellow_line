@extends('layouts.frontend.main-layout')

@section('content')
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p class="category-main-title">{{$pageData['postName']}}</p>
                <h2 class="heading py-2">Notice For Invitation</h2>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 pr-50 procurement-single">
            <div class="container">
                <div class="row mb-5 procurementData ">
                    <div class="procurement-card">
                        <div class="category-box">
                            {{$procurementData->categoryName}}
                        </div>
                        <div class="procurement-post-title">
                            <a href="{{url('/procurement/' . $procurementData->categorySlug . '/' . $procurementData->slug)}}">
                                {{ $procurementData->title }}
                            </a>
                        </div>
                        <div class="procurement-post-content">
                            <p>Request for Proposal  No: {{$procurementData->proposalRequestID}}</p>
                        </div>

                        <div class="recruitment-stats">
                            <div class="recruitment-stat">
                                <span class="recruitment-stat-icon d-flex gap-2"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span>
                                <span>{{\Carbon\Carbon::parse($procurementData->created_at)->format('F j, Y')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="input-files-desplay">
                        <div class="row">
                        @if(!empty($attachments))
                            @foreach($attachments as $index => $attachment)    
                            <div class="col-md-6">
                                <div class="procurement-file-box">
                                    <div class="icon-prc">
                                        <img src="{{asset('public/assets/images/pdf-icon.png')}}" alt="" />
                                    </div>
                                    <div class="pr-mid-content">
                                        <h4>{{ \Illuminate\Support\Str::limit($attachment->title, 20) }}</h4>
                                        <span>Preview: {{$attachment->views}}</span>
                                        <span>Downloads: {{$attachment->downloads}}</span>
                                    </div>
                                    <div class="pr-btn-row">
                                        <a href="{{ route('procurement.download', $attachment->id) }}" class="btn-curved btn-download">
                                            <span>Download</span>
                                            <span class="iconify" data-icon="bytesize:download" data-inline="false"></span>
                                        </a>
                                        <a href="{{ route('procurement.preview', $attachment->id) }}" class="btn-curved btn-preview" target="_blank">
                                            <span>Preview</span>
                                            <span class="iconify" data-icon="icon-park-outline:screenshot-one" data-inline="false"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <div class="col-md-4 pl-50 border-l-light">
            <!-- News Feed Section -->
            <div class="news-feed">
                <div class="news-header">
                    <div class="icon-bookmark-img"><img src="{{asset('public/assets/images/bookmark-icon.svg')}}" alt=""></div>
                    <h5>NEWS FEED</h5>
                </div>

                <div class="latest-news-marquee">
                    <!-- News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item py-4">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>
                    <!-- News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item py-4">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="news-feed">
                <div class="news-header">
                    <div class="icon-bookmark-img"><img src="{{asset('public/assets/images/bookmark-icon.svg')}}" alt=""></div>
                    <h5>MEDIA CORNER</h5>
                </div>
                <div class="section media-corner">
                    <ul class="side-menu-items">
                        <li><a href="{{url('gallery/photo-library')}}">Photo Library</a></li>
                        <li><a href="{{url('gallery/video-library')}}">Video Library</a></li>
                    </ul>
                </div>
                <div class="news-feed">
                    <div class="news-header">
                        <div class="icon-bookmark-img"><img src="{{asset('public/assets/images/bookmark-icon.svg')}}" alt=""></div>
                        <h5>CATEGORIES</h5>
                    </div>
                    <div class="section media-corner">
                        <ul class="side-menu-items">
                            <li><a href="{{url('news/all-smta-prohect-news')}}">News</a></li>
                            <li><a href="{{url('frequently-asked-questions')}}">Frequently Asked Questions</a></li>
                            <li><a href="{{url('events')}}">Upcoming Events</a></li>
                            <li><a href="{{url('help-and-complaints')}}">Help & Complaint</a></li>
                        </ul>
                    </div>
                    <div class="section video-preview">
                        <div class="video-tab-sidebar">
                            <video id="video-item-sidebar" controls muted>
                                <source src="{{asset('public/assets/videos/video-1.mp4')}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="targeturl" value="{{url('get-procurement-data')}}" />
@endsection
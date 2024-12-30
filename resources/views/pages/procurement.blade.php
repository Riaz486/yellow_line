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
    <div class="row mb-5 pt-80">
        <div class="col-md-12">
            <div class="d-flex align-items-center gap-20 mc-dropdown-wrap">
            @foreach ($categoriesData as $category)
                <div class="m-cat-dropdown">
                    <a href="{{$category['slug']}}" data-id="{{$category['id']}}" type="main" class="selected-category dropdown-tab {{($pageData['postName'] == $category['name']) ? 'bg-yellow text-white' : ''}}">{{ $category['name'] }}</a>
                    @if (isset($category['children']))
                    <ul class="category-dropdown">
                        @foreach ($category['children'] as $child)
                        <li><span class="select-category" data-id="{{$child['id']}}" type="child">{{ $child['name'] }}</span></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            @endforeach
            </div>

            <div class="loader-sub" id="carReq-load">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 pr-50">
            <div class="container">
                <div class="mb-5">
                    <div class="heading-box text-left">
                        <h2 class="text-grey text-uppercase text-md-2 mb-60 category-main-title">{{$pageData['postName']}}</h2>
                        <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                    </div>
                </div>

                <div class="row mb-5 procurementData">
                @if(count($procurementData) > 0)
                @foreach($procurementData as $post)	
                    <div class="procurement-card">
                        <div class="category-box">
                            {{$post->categoryName}}
                        </div>
                        <div class="procurement-post-title">
                            <a href="{{url('/procurement/' . $post->categorySlug . '/' . $post->slug)}}">
                                {{ $post->title }}
                            </a>
                        </div>
                        <div class="procurement-post-content">
                            <p>Request for Proposal  No: {{$post->proposalRequestID}}</p>
                            <p><strong>City :</strong> {{$post->city}}</p>
                            <p><strong>Department :</strong> {{$post->department}}</p>
                            <p><strong>Date of publication of the call for tenders :</strong> {{\Carbon\Carbon::parse($post->date_publication)->format('F j, Y')}}</p>
                            <p><strong>Date of Closing of tenders :</strong> {{\Carbon\Carbon::parse($post->date_closing)->format('F j, Y')}}</p>
                        </div>

                        <div class="recruitment-stats">
                            <div class="recruitment-stat">
                                <span class="recruitment-stat-icon d-flex gap-2"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span>
                                <span>{{\Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}</span>
                            </div>
                            <div class="recruitment-stat">
                                <span class="recruitment-stat-icon d-flex gap-2">{{$post->commentsCount}} <img src="{{asset('public/assets/images/comment.svg')}}" alt=""></span>
                                <span> Comments</span>
                            </div>
                            <div class="recruitment-stat ms-2">
                                <span class="recruitment-stat-icon d-flex gap-2">{{$post->shares}} <img src="{{asset('public/assets/images/share.svg')}}" alt=""></span>
                                <span>Share</span>
                            </div>
                            <div class="recruitment-stat ms-2">
                                <span class="recruitment-stat-icon"><img src="{{asset('public/assets/images/eye.png')}}" alt=""></span>
                                <span>{{$post->views}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach 
                @else
                    <div class="notfound">
                        <h2>Nothing posted</h2>
                    </div>
                @endif
                </div>                
            </div>
            
            <section class="pagination-section">
                <nav aria-label="Page navigation">
                    {{ $procurementData->links() }}
                </nav>
            </section>
        </div>
        <div class="col-md-4 pl-50 border-l-light">
            <!-- Search Box -->
            <form method="GET">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Search">
                    <button type="submit">SEARCH</button>
                </div>  
            </form>
            
            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-header">
                    <h5>FILTER</h5>
                    <a href="#" class="text-decoration-none text-sm-2 text-yellow">Clear All</a>
                </div>

                <div class="filter-items-wrapper">
                    <div class="filter-item">
                        <div class="filter-item-button" data-target="date-range">
                            <h4>Specific Date Range</h4>
                            <span class="iconify" data-icon="icon-park-outline:down" data-inline="false"></span>
                        </div>

                        <div class="filter-content" id="date-range">
                            <div class="card-body">
                                <form method="GET">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{!empty($dataFilter['start_date']) ? $dataFilter['start_date'] : ''}}" />
                                    </div>

                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{!empty($dataFilter['end_date']) ? $dataFilter['end_date'] : ''}}" />
                                    </div>

                                    <button type="submit" class="btn btn-default">Filter</button>
                                </form>     
                            </div>
                        </div>
                    </div>

                    <div class="filter-item">
                        <div class="filter-item-button" data-target="timeframe">
                            <h4>Timeframe</h4>
                            <span class="iconify" data-icon="icon-park-outline:down" data-inline="false"></span>
                        </div>

                        <div class="filter-content" id="timeframe">
                            <div class="card-body">
                                <form method="GET">
                                    <div class="form-group">
                                        <label>Timeframe</label>
                                        <select name="timeframe" class="form-control" onChange="this.form.submit()"> 
                                            <option value="">Select Timeframe</option>
                                            <option value="today" {{ request('timeframe') == 'today' ? 'selected' : '' }}>Today</option>
                                            <option value="7" {{ request('timeframe') == '7' ? 'selected' : '' }}>Past 7 Days</option>
                                            <option value="30" {{ request('timeframe') == '30' ? 'selected' : '' }}>Past Month</option>
                                            <option value="365" {{ request('timeframe') == '365' ? 'selected' : '' }}>Past Year</option>
                                        </select>
                                    </div>
                                </form>     
                            </div>
                        </div>
                    </div>

                    <div class="filter-item">
                        <div class="filter-item-button" data-target="rfp">
                            <h4>RFP / RFB NO</h4>
                            <span class="iconify" data-icon="icon-park-outline:down" data-inline="false"></span>
                        </div>

                        <div class="filter-content" id="rfp">
                            <form method="GET" class="search-transparent">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="rfp_rfb_no" placeholder="Entre RFP / RFB NO" />
                                    <button type="submit">
                                        <span class="iconify" data-icon="iconamoon:search-thin" data-inline="false"></span>
                                    </button>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
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
@extends('layouts.frontend.main-layout')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.27/dist/fancybox.css" />

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <h2 class="heading py-2">Events</h2>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-md-8 pr-50 pt-100 pb-100">
            <div class="container">
                <div class="row mb-5 content-event">
                    <div class="col-md-5">
                        <div class="event-img">
                            <div class="post-image">
                                <?php 
                                    if($eventData->featured_image == '') {
                                        $postImage = 'noimage.webp';
                                    } else {
                                        $postImage = $eventData->featured_image;
                                    }
                                ?>
                                <img src="{{asset('public/assets/uploads/posts/'.  $postImage)}}" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <h2 class="post-heading">
                            {{ $eventData->title }}
                        </h2>

                        <div class="eventMeta">
                            <span>Date: {{ \Carbon\Carbon::parse($eventData->event_date)->format('d M Y') }} </span>
                            <span>Venue {{$eventData->venue}}</span>
                            <span>Posted on : {{ \Carbon\Carbon::parse($eventData->created_at)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="postContentWrapper">                            
                            <div class="postContent">
                                {!! $eventData->content !!}
                            </div>
                      
                            @if($eventData->tags != '')
                            <div class="tags">
                                <?php
                                    $eventTags = unserialize($eventData->tags);
                                    ?>
                                @foreach($eventTags as $tag)
                                <a>#{{$tag}}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <div class="event-massionary-gallery">
                            <div class="grid">
                            <div class="grid-sizer"></div> 
                            @foreach($galleryData as $gallery)
                                <a href="{{asset('public/assets/uploads/posts/' . $gallery->thumbnail)}}" data-fancybox="gallery" class="grid-item">
                                    <div class="massionary-img-box">
                                        <?php 
                                            if($gallery->thumbnail == '') {
                                                $postImage = 'noimage.webp';
                                            } else {
                                                $postImage = $gallery->thumbnail;
                                            }
                                        ?>
                                        <img src="{{asset('public/assets/uploads/posts/'.  $postImage)}}" />
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post-bottom">
                    <h4>Share</h4>
                    <div class="social-share">
                        <?php
                            $postUrl = url('event/'.$eventData->slug); 
                        ?>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($postUrl) }}" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($eventData->title) }}&url={{ urlencode($postUrl) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($postUrl) }}&title={{ urlencode($eventData->title) }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="whatsapp://send?text={{ urlencode($eventData->title) }} {{ urlencode($postUrl) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="javascript:void(0);" onclick="copyToClipboard()"><i class="fa fa-link"></i></a>
                    </div>

                    <div style="display: none">
                        <textarea id="instagramCaption" rows="4" cols="50" readonly>
                            {{ $eventData->title }} - {{ url('/events/'.$eventData->slug) }}
                        </textarea>
                    </div>
                </div>
                            
                <section class="post-navigation">
                    @if($previousPost)
                        <a href="{{ url('/events/' . $previousPost->slug) }}">
                            <div class="post-nav-box">
                                <div class="inner-arrow">
                                    <img src="{{ asset('public/assets/images/arrow-left.svg') }}" alt="">
                                </div>

                                <div class="nav-content">
                                    <span>Previous Post</span>
                                    <h4>{{ \Illuminate\Support\Str::limit($previousPost->title, 60) }}</h4>
                                </div>
                            </div>
                        </a>
                    @endif

                    @if($nextPost)
                        <a href="{{ url('/events/' . $nextPost->slug) }}">
                            <div class="post-nav-box">
                                <div class="nav-content">
                                    <span>Next Post</span>
                                    <h4>{{ \Illuminate\Support\Str::limit($nextPost->title, 60) }}</h4>
                                </div>

                                <div class="inner-arrow">
                                    <img src="{{ asset('public/assets/images/arrow-right.svg') }}" alt="">
                                </div>
                            </div>
                        </a>
                    @endif
                </section>
            </div>
        </div>

        <script>
            function copyToClipboard() {
                const caption = document.getElementById('instagramCaption');
                caption.select();
                document.execCommand('copy');
                alert('Post copied to clipboard! Now open Instagram to share it.');
            }
        </script>

        <div class="col-md-4 pl-50 pt-100 pb-100 border-l-light">
            <!-- News Feed Section -->
            <div class="news-feed">
                <div class="news-header">
                    <div class=""><img src="{{asset('public/assets/images/bookmark.svg')}}" alt=""></div>
                    <h5>NEWS FEED</h5>
                </div>
                <!-- News Item -->
                <div class="news-item">
                    <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                    <div class="date">
                        <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                        <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                    </div>
                </div>
                <hr>
                <!-- Another News Item -->
                <div class="news-item py-4">
                    <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                    <div class="date">
                        <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                        <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                    </div>
                </div>
                <hr>
                <!-- Another News Item -->
                <div class="news-item">
                    <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                    <div class="date">
                        <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                        <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="news-feed">
                <div class="news-header">
                    <div class=""><img src="{{asset('public/assets/images/bookmark.svg')}}" alt=""></div>
                    <h5>MEDIA CORNER</h5>
                </div>
                <div class="section media-corner">
                    <ul class="side-menu-items">
                        <li><a href="#">Photo Library</a></li>
                        <li><a href="#">Video Library</a></li>
                    </ul>
                </div>
                <div class="news-feed">
                    <div class="news-header">
                        <div class=""><img src="{{asset('public/assets/images/bookmark.svg')}}" alt=""></div>
                        <h5>CATEGORIES</h5>
                    </div>
                    <div class="section media-corner">
                        <ul class="side-menu-items">

                            <li><a href="#">Routes</a></li>
                            <li><a href="{{url('frequently-asked-questions')}}">Frequently Asked Questions</a></li>
                            <li><a href="#">Upcoming Events</a></li>
                            <li><a href="{{url('help-and-complaints')}}"">Help & Complaint</a></li>
                        </ul>
                    </div>
                    <div class="section video-preview">
                        <img src="{{asset('public/assets/images/video-pplayer.png')}}" alt="Video Preview">
                        <div class="play-icon">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (Load this first) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.27/dist/fancybox.umd.js"></script>
<script>
    // Initialize Masonry
    var $grid = $('.grid').masonry({
      itemSelector: '.grid-item',
      columnWidth: '.grid-sizer', // Define the column width
      gutter: 10, // Set gutter
      percentPosition: true // Use percent for responsive layout
    });

    // Layout Masonry after each image loads
    $grid.imagesLoaded().progress(function() {
      $grid.masonry('layout');
    });

    Fancybox.bind('[data-fancybox="gallery"]', {
        Toolbar: {
          display: [
            "close",  // Close button
            "counter",  // Pagination (1/4, 2/4, etc.)
            "zoom",   // Zoom button for images
          ],
        },
        Thumbs: false, // Disable thumbnail preview (optional)
      });
</script>
@endsection
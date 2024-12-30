@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <h2 class="heading py-2">All Events</h2>
            </div>
        </div>
    </div>
</section>

<section class="mt-50 bg-upcoming pt-30 pb-30">
    <div class="container">
        <h2 class="text-white text-uppercase text-md-24 mb-30">All upcoming Events<h2>

        <div class="upcoming-slider-wrapper">
            <div class="upcoming-slider d-flex align-items-center justify-content-between">
            @foreach($eventsData as $index => $event)
                @if(\Carbon\Carbon::parse($event->event_date)->isFuture()) <!-- Change 'event_date' to the actual field for event date -->
                    <div class="upcoming-box {{ $index % 3 === 0 ? '' : ($index % 3 === 1 ? 'bg-dark-grey' : 'bg-green') }}">
                        <?php 
                            $classText = '';

                            if($index % 3 === 0) {
                                $classText = '';
                            } else if($index % 3 === 1) {
                                $classText = 'text-white';
                            } else {
                                $classText = 'text-white';
                            }
                            
                        ?>
                        <h4 class="{{ $classText}}">
                            {{ $event->title }}
                        </h4>
                        <div class="upcoming-meta">
                            <span class="{{ $classText }}">
                                Date: {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}
                            </span>  
                            <span class="{{ $classText }}">
                                Venue: {{ $event->venue ?? 'SMTA Office' }}
                            </span>  
                            <span class="{{ $classText }}">
                                Posted on {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y') }} | 
                                <a href="{{ url('events/'. $event->slug) }}" class="{{ $classText }}">Read More</a>
                            </span>  
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>

        <a href="javascript:void(0);" class="btn btn-theme btn-half-curved bg-yellow all-events-btn">View All</a>
    </div>
</section>

<section class="all-events pt-40 pb-80">
    <div class="container">
        <h2 class="mb-40 text-md-24 text-uppercase">All Past Events</h2>

        <div class="gallery-wrapper all-events-wrapper gap-20">
            @foreach($eventsData as $event)
            <?php 
                if($event->featured_image == '') {
                    $postImage = 'images/noimage.webp';
                } else {
                    $postImage = 'uploads/posts/' . $event->featured_image;
                }
            ?>
            <a href="{{ url('events/'. $event->slug) }}">
                <div class="gallery-box" style="background-image: url('{{asset('public/assets/'.  $postImage)}}')">
                    <div class="inner-content">
                        <h3>{{ \Illuminate\Support\Str::limit($event->title, 80, '...') }}</h3>

                        <span class="meta-log">
                            <i class="fa fa-calendar"></i>
                            <span>{{\Carbon\Carbon::parse($event->created_at)->format('F j,  Y')}}</span>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
@extends('layouts.frontend.main-layout')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.27/dist/fancybox.css" />

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <h2 class="heading py-2">{{$pageName}}</h2>
            </div>
        </div>
    </div>
</section>

<section class="gallery-library pt-40 pb-80">
    <div class="container">
        <h2 class="text-yellow mb-40">{{$pageName}}</h2>

        <?php
            $setClass = '';

            if($postType == 'video') {
                $setClass="gallery-video";
            } 
        ?>

        <div class="gallery-wrapper {{$setClass}}">
            @foreach($galleryData as $gallery)
            <?php 
                if($gallery->featured_image == '') {
                    $postImage = 'images/noimage.webp';
                } else {
                    $postImage = 'uploads/gallery/' . $gallery->featured_image;
                }

                $previewImage = '';

                if($postType == 'video') {
                    $previewImage = 'uploads/gallery/' . $gallery->filename;
                } else {
                    $previewImage = $postImage;
                }
            ?>
            <a href="{{asset('public/assets/' . $previewImage)}}" data-fancybox="gallery" data-caption="{!! $gallery->title !!}">
                <div class="gallery-box" style="background-image: url('{{asset('public/assets/'.  $postImage)}}')">
                    <div class="inner-content">
                        <h3>{!! $gallery->title !!}</h3>

                        <span class="meta-log">
                            <i class="fa fa-calendar"></i>
                            <span>{{\Carbon\Carbon::parse($gallery->created_at)->format('F j,  Y')}}</span>
                        </span>
                    </div>

                    <?php if($postType == 'video') { ?>
                    <div class="play-icon">
                        <img src="{{asset('public/assets/images/play-icon.svg')}}" />
                    </div>
                    <?php } ?>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.27/dist/fancybox.umd.js"></script>
<script>
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
@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Our</p>
                <h2 class="heading py-2">Messages</h2>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section p-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="style-heading mb-80">
                    <span class="bg-yellow line-border"></span>

                    <h2 class="text-uppercase text-md-24 m-0">MESSAGES</h2>
                </div>

                <div class="head text-center">
                    <h3 class="text-black mb-20">{{$publicMessage->title}}</h3>
                    <h4>{{$publicMessage->sub_title}}</h4>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid mx-auto d-block mt-3">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?php 
                    if($publicMessage->featured_image == '') {
                        $postImage = 'noimage.webp';
                    } else {
                        $postImage = 'message/' . $publicMessage->featured_image;
                    }
                ?>
                
                <div class="img-user">
                    <img src="{{asset('public/assets/uploads/' . $postImage)}}" class="img-fluid">
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-text mb-100 text-justify">
                    {!! $publicMessage->description !!}
                </div>

                <div class="user-details">
                    <p><strong>{{$publicMessage->designation}}</strong></p>
                    <p><strong>{{$publicMessage->department}}</strong></p>
                    <p><strong>{{$publicMessage->location}}</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey pt-80 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head text-center mg-50">
                    <h3 class="text-black mb-40">Other Messages</h3>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid mx-auto d-block mt-3">
                </div>
            </div>
        </div>

        <div class="row user-other-msg">
            @foreach($allMessages as $message)
            @if($publicMessage->id != $message->id)
            <div class="col-md-6">
                <a href="{{url('messages/'.$message->slug)}}" class="color-inherit">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <?php 
                                if($message->featured_image == '') {
                                    $userImage = 'noimage.webp';
                                } else {
                                    $userImage = 'message/' . $message->featured_image;
                                }
                            ?>
                            
                            <div class="thumb-img">
                                <img src="{{asset('public/assets/uploads/' . $userImage)}}" class="img-fluid" />    
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="info-content">
                                <h4 class="text-uppercase">{{$message->title}}</h4>
                                <strong>{{$message->designation}}</strong>
                                <small class="text-grey">{{$message->department}}</small>
                            </div>
                        </div>
                    </div>           
                </a>     
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@endsection
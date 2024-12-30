@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <h2 class="heading py-2">Frequently Asked Questions</h2>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section p-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-left">
                <div class="heading-box text-left">
                    <h2 class="text-grey text-uppercase text-md-2 mb-60">Everything you need to know about</h2>
                    <h2 class="mb-5 wd-45 text-lg text-dark-grey">Frequently Asked Questions</h2>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>
                
                <img src="{{asset('public/assets/images/q&a.svg')}}" alt="Q & A" class="img-fluid mb-4">
            </div>
            <div class="col-lg-5">
                <!-- Search Box -->
                <div class="text-center mb-4 position-relative">
                    <input type="text" class="form-control search-box" placeholder="Describe your issue">
                    <i class="fa fa-search search-icon"></i>
                </div>
                <!-- Human Bet Section -->
                <div class="human-bet-section mb-4">
                    <div class="faq-items">
                    @foreach($faqData as $data)
                    @if($data->status)
                        <div class="faq-item-box">
                            <div class="faq-item mb-3">
                                <span class="">{{$data->question}}</span>
                                <span class="faq-icon">+</span>
                            </div>

                            <div class="faq-item-content">
                                <p>
                                {!! nl2br($data->answer) !!}
                                </p>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
                </div>
            </div> 
        
        </div>
    </div>
</section>
<!-- Contact Section -->
<section class="contact-section text-white text-center py-5">
    <div class="container flex-column">
        <h2>Still have a question?</h2>
        <p class="">If you cannot find the answer to your question in our FAQ, you can always contact us.<br> We will answer your questions shortly.</p>
        <h6>Contact Us at :</h6>
        <div class="contact-info d-flex text-end gap-4">
            <p class="text-dark text-start"><i class="bi bi-telephone"></i> +92 34552 204</p>
            <p class="text-dark text-start"><i class="bi bi-envelope"></i> GBMLMPTVL@gmail.com</p>
        </div>
    </div>
</section>

<section class="images-library">
    <ul class="sppb-gallery clearfix">
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-1.png')}}">
            </span>
        </li>
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-2.png')}}">
            </span>
        </li>
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-3.png')}}">
            </span>
        </li>
        <li>
            <span class="sppb-gallery-btn">
                <img class="sppb-img-responsive" src="{{asset('public/assets/images/faq-img-4.png')}}">
            </span>
        </li>
    </ul>
</section>
@endsection
@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Historical</p>
                <h2 class="heading py-2">Discover Our Story</h2>
            </div>
        </div>
    </div>
</section>

<section class="faq-section p-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-left">
                <div class="heading-box text-left">
                    <h2 class="text-grey text-uppercase text-md-2 mb-60">THE HISTORY OF SINDH MASS TRANSIT AUTHORITY</h2>
                    <h2 class="mb-5 wd-100 text-md-1 text-dark-grey">Organizing Authority for Urban Transport of the Sindh Region</h2>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="card-text pr-30 pl-30">
                    <p>
                        o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. 
                    </p>

                    <p>
                        o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its prerogatives extended to traffic and parking management. o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. 
                    </p>
                </div>

                <div class="pl-60 pr-60 mt-90 mb-90">
                    <div class="bg-yellow text-block h-60 d-flex align-items-center justify-content-center">
                        <h2 class="text-md-1 font-800 text-white m-0">Some historical landmarks:</h2>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="img-full">
                        <img src="{{asset('public/assets/images/historical.png')}}" class="img-fluid" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
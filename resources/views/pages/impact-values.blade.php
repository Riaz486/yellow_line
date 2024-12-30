@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Our</p>
                <h2 class="heading py-2">Impact & Values</h2>
            </div>
        </div>
    </div>
</section>

<section class="faq-section pt-80 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-left">
                <div class="heading-box text-left">
                    <h2 class="text-grey text-uppercase text-md-2 mb-60">SINDH MASS TRANSIT AUTHORITY</h2>
                    <h2 class="mb-5 wd-100 text-md-1 text-dark-grey">Organizing Authority for Mobility for Sindh Province</h2>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="col-md-12">
                    <h2 class="text-center text-lg-1 mb-80">Our Values</h2>
                
                    <div class="row">
                        <div class="col-md-6 pl-60 pr-60">
                            <div class="box-heading mb-60">
                                <h3 class="text-md-24">Of the Human</h3>
                                <p class="text-sm-2">o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation</p>
                            </div>
                        </div>

                        <div class="col-md-6 pl-60 pr-60">
                            <div class="box-heading mb-60">
                                <h3 class="text-md-24">Professionalism at the service of user</h3>
                                <p class="text-sm-2">o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation</p>
                            </div>
                        </div>

                        <div class="col-md-6 pl-60 pr-60">
                            <div class="box-heading mb-60">
                                <h3 class="text-md-24">Sustainable mobility</h3>
                                <p class="text-sm-2">o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation</p>
                            </div>
                        </div>

                        <div class="col-md-6 pl-60 pr-60">
                            <div class="box-heading mb-60">
                                <h3 class="text-md-24">Sustainable development objectives</h3>
                                <p class="text-sm-2">o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="img-full d-flex justify-content-center">
                    <img src="{{asset('public/assets/images/our-impact-img.png')}}" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-lg-1 mb-80">Our Values</h2>
            </div>
        </div>
    </div>

    <div class="full-col-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="impact-box d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Karachi</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="impact-box d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Hyderabad</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="impact-box d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Larkana</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="impact-box d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Other cities of Sindh</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
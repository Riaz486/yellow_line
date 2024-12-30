@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Organogram</p>
                <h2 class="heading py-2">Organizational Structure</h2>
            </div>
        </div>
    </div>
</section>

<section class="faq-section p-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-left">
                <div class="heading-box text-left">
                    <h2 class="text-grey text-uppercase text-md-2 mb-40">SINDH MASS TRANSIT AUTHORITY</h2>
                    <h2 class="mb-5 wd-100 text-md-1 text-dark-grey">Organizational Structure</h2>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="card-text mb-60">
                    <p>
                        It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban transport sub-sector began, at the initiative  .
                    </p>

                    <p>
                        It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program, that the process of reforming the urban t
                    </p>

                    <ul>
                        <li>It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the framework of the SSATP-Urban Transport program,</li>
                        <li>It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the </li>
                        <li>It was at the end of the Saly seminar in May 1992, organized under the auspices of the World Bank and French Cooperation within the </li>
                    </ul>
                </div>

                <div class="d-flex align-items-center gap-20 mc-dropdown-wrap">
                    <div class="m-cat-dropdown">
                        <a href="#tab1" class="dropdown-tab tab-select bg-yellow text-white">SINDH MASS TRANSIT AUTHORITY BOARD</a>
                    </div>

                    <div class="m-cat-dropdown">
                        <a href="#tab2" class="dropdown-tab tab-select">Sindh Mass Transit Authority</a>
                    </div>
                </div>

                <div class="tabs-wrapper">
                    <div class="tabs-content" id="tab1" style="display: block;">
                        <div class="d-flex justify-content-center">
                            <div class="img-full">
                                <img src="{{asset('public/assets/images/sindh-mass-transit.png')}}" class="img-fluid" alt="" srcset="">
                            </div>
                        </div>
                    </div>

                    <div class="tabs-content" id="tab2">
                        <div class="d-flex justify-content-center">
                            <div class="img-full">
                                <img src="{{asset('public/assets/images/sindh-mass-transit.png')}}" class="img-fluid" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
@endsection
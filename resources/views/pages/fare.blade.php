@extends('layouts.frontend.main-layout')

@section('content')
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Projects</p>
                <h2 class="heading py-2">Fare</h2>
            </div>
        </div>
    </div>
</section>

<!-- bodyyy -->
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="block-heading">
            <h2 class="text-uppercase text-white pl-180 pr-180">Fare Inforamtion</h2>
        </div>
    </div>

    <div class="row pb-80">
        <div class="col-md-7 pr-100">
            <div class="card-text">
                <p>
                    Welcome to our Government Transport Services! We are committed to providing reliable and accessible transportation options for all citizens. Our fares are designed to be affordable, ensuring that everyone can access essential services and resources.
                </p>
                <p>
                    We operate a network of well-planned routes that connect key locations across the Karachi and other cities of Sindh province, including schools, hospitals, and community centers. Whether you're commuting to work or running errands, our schedule is tailored to meet your needs, with frequent services and convenient stops. For detailed project information and route maps, please explore our website or contact our customer service team. Your journey starts here!
                </p>
            </div>
        </div>

        <div class="col-md-5">
            <div class="full-img">
                <img src="{{asset('public/assets/images/fare-img.png')}}" class="img-fluid" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav-tabs-pane">
                <li><a href="#brtyellow" class="nav-item-btn nav-item-active nav-theme-yellow" theme="theme-yellow" footer-title="BUS RAPID TRANSIT FARE POLICY">BRT Yellow line fare</a></li>
                <li><a href="#brtgreenline" class="nav-item-btn nav-theme-green" theme="theme-green" footer-title="BUS RAPID TRANSIT FARE POLICY">BRT GREEN LINE FARE</a></li>
                <li><a href="#brtorrangeline" class="nav-item-btn nav-theme-orrange" theme="theme-orrange" footer-title="BUS RAPID TRANSIT FARE POLICY">BRT ABDUL SATTAR EDHI ORANGE LINE FARE</a></li>
                <li><a href="#brtredline" class="nav-item-btn nav-theme-red" theme="theme-red" footer-title="BUS RAPID TRANSIT FARE POLICY">BRT RED LINE FARE</a></li>
                <li><a href="#peoplebus" class="nav-item-btn nav-theme-red" theme="theme-red" footer-title="PEOPLES  BUS SERVICE FARE POLICY">PEOPLE BUS SERVICE (PBS) FARE</a></li>
                <li><a href="#evbus" class="nav-item-btn nav-theme-black" theme="theme-black" footer-title="ELECTRIC VEHICLE (EV) BUS FARE POLICY">ELECTRIC VEHICLE (EV) BUS FARE</a></li>
                <li><a href="#pinkbus" class="nav-item-btn nav-theme-pink" theme="theme-pink" footer-title="PINK BUS FARE POLICY">PINK BUS FARE</a></li>
            </ul>

            <div class="fare-tabs-wrapper">
                <div class="fare-tab-content theme-yellow fare-tab-active" id="brtyellow">
                    @include('pages.templates.fare-tabs.brt-yellow-line')
                </div>

                <div class="fare-tab-content theme-green" id="brtgreenline">
                    @include('pages.templates.fare-tabs.brt-green-line')
                </div>

                <div class="fare-tab-content theme-orrange" id="brtorrangeline">
                    @include('pages.templates.fare-tabs.brt-orrange-line')
                </div>

                <div class="fare-tab-content theme-red" id="brtredline">
                    @include('pages.templates.fare-tabs.brt-red-line')
                </div>

                <div class="fare-tab-content theme-red" id="peoplebus">
                    @include('pages.templates.fare-tabs.people-bus')
                </div>

                <div class="fare-tab-content theme-black" id="evbus">
                    @include('pages.templates.fare-tabs.ev-bus')
                </div>

                <div class="fare-tab-content theme-pink" id="pinkbus">
                    @include('pages.templates.fare-tabs.pink-bus')
                </div>
            </div>
        </div>
    </div>
</div>

<section class="divide-banner">
    <div class="row">
        <div class="col-md-6 dbanner-dark divider-banner-box">
            <div class="dbanner-inner-content">
                <div class="d-banner-icon">
                    <span class="iconify" data-icon="carbon:policy" data-inline="false"></span>
                </div>

                <h4 class="text-white text-uppercase text-md-24">BRT FARE POLICY</h4>
                <p class="text-white text-sm-4">Paper Ticket, Karachi Breeze Card, Breeze Application</p>
            </div>

            <div class="dbanner-overlay-content">
                <div class="dbanner-inner-content-overlay">
                    <p class="text-white text-sm-4">AFTU, réseau de transport en commun de Dakar par Mini Bus</p>
                    <a href="#paper-ticket" class="btn btn-white btn-policy-data">Discover</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 dbanner-green divider-banner-box">
            <div class="dbanner-inner-content">
                <div class="d-banner-icon">
                    <span class="iconify" data-icon="fluent-emoji-high-contrast:ticket" data-inline="false"></span>
                </div>

                <h4 class="text-white text-uppercase text-md-24">TICKTING / PAYMENT MODES</h4>
                <p class="text-white text-sm-4">Karachi Breeze app, Ticket Vending Machine, Ticketing Booth  </p>
            </div>

            <div class="dbanner-overlay-content">
                <div class="dbanner-inner-content-overlay">
                    <p class="text-white text-sm-4">AFTU, réseau de transport en commun de Dakar par Mini Bus</p>
                    <a href="#payment-modes" class="btn btn-white btn-policy-data">Discover</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="theme-yellow" id="theme-content-area">
    <section class="pt-80 pb-80">
        <div class="container">
            <div class="policy-tab-content" id="paper-ticket">
                <div class="row">
                    <div class="col-md-12 pb-80">
                        <span class="tab-pane-header footer-title">PINK BUS FARE POLICY</span>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center image-text policy-btn" data-target="paper-ticket-policy">
                            <div class="full-img tab-info-img">
                                <img src="{{asset('public/assets/images/fare-cell-img-1.png')}}" class="img-fluid" />
                            </div>
                            <span class="text-md-24">Paper Ticket</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex justify-content-center image-text policy-btn" data-target="breeze-card-policy">
                            <div class="full-img tab-info-img">
                                <img src="{{asset('public/assets/images/breeze-card.png')}}" class="img-fluid" />
                            </div>
                            <span class="text-md-24">Karachi Breeze Card</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex justify-content-center image-text policy-btn" data-target="breeze-app-policy">
                            <div class="full-img tab-info-img">
                                <img src="{{asset('public/assets/images/breeze-app.png')}}" class="img-fluid" />
                            </div>
                            <span class="text-md-24">Breeze Application</span>
                        </div>
                    </div>

                    <div class="col-md-12 mt-90">
                        <div class="policy-tabs-data" id="paper-ticket-policy">
                            <h3 class="text-lg-3"><strong>PAPER TICKET</strong> POLICY</h3>

                            <div class="text-wrapper-info">
                                <div class="row justify-content-between">
                                    <div class="col-md-7">
                                        <ul>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="full-img">
                                            <img src="{{asset('public/assets/images/fare-cell-img-1.png')}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="policy-tabs-data" id="breeze-card-policy">
                            <h3 class="text-lg-3"><strong>Karachi Breeze Card</strong> POLICY</h3>

                            <div class="text-wrapper-info">
                                <div class="row justify-content-between">
                                    <div class="col-md-7">
                                        <ul>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="full-img">
                                            <img src="{{asset('public/assets/images/breeze-card.png')}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="policy-tabs-data" id="breeze-app-policy">
                            <h3 class="text-lg-3"><strong>Breeze Application</strong> POLICY</h3>

                            <div class="text-wrapper-info">
                                <div class="row justify-content-between">
                                    <div class="col-md-7">
                                        <ul>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="full-img">
                                            <img src="{{asset('public/assets/images/breeze-app.png')}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="policy-tab-content" id="payment-modes">
                <div class="row">
                    <div class="col-md-12 pb-80">
                        <span class="tab-pane-header footer-title">PINK BUS Payment Modes</span>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center image-text policy-btn" data-target="payment-mode-policy">
                            <div class="full-img tab-info-img">
                                <img src="{{asset('public/assets/images/fare-cell-img-1.png')}}" class="img-fluid" />
                            </div>
                            <span class="text-md-24">Paper Ticket</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex justify-content-center image-text policy-btn" data-target="breeze-payment-card-policy">
                            <div class="full-img tab-info-img">
                                <img src="{{asset('public/assets/images/breeze-card.png')}}" class="img-fluid" />
                            </div>
                            <span class="text-md-24">Karachi Breeze Card</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex justify-content-center image-text policy-btn" data-target="breeze-payment-app-policy">
                            <div class="full-img tab-info-img">
                                <img src="{{asset('public/assets/images/breeze-app.png')}}" class="img-fluid" />
                            </div>
                            <span class="text-md-24">Breeze Application</span>
                        </div>
                    </div>

                    <div class="col-md-12 mt-90">
                        <div class="policy-tabs-data" id="payment-mode-policy">
                            <h3 class="text-lg-3"><strong>Payment Modes</strong> Policy</h3>

                            <div class="text-wrapper-info">
                                <div class="row justify-content-between">
                                    <div class="col-md-7">
                                        <ul>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="full-img">
                                            <img src="{{asset('public/assets/images/fare-cell-img-1.png')}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="policy-tabs-data" id="breeze-payment-card-policy">
                            <h3 class="text-lg-3"><strong>Karachi Breeze Card</strong> POLICY</h3>

                            <div class="text-wrapper-info">
                                <div class="row justify-content-between">
                                    <div class="col-md-7">
                                        <ul>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="full-img">
                                            <img src="{{asset('public/assets/images/breeze-card.png')}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="policy-tabs-data" id="breeze-payment-app-policy">
                            <h3 class="text-lg-3"><strong>Breeze Application</strong> POLICY</h3>

                            <div class="text-wrapper-info">
                                <div class="row justify-content-between">
                                    <div class="col-md-7">
                                        <ul>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="full-img">
                                            <img src="{{asset('public/assets/images/breeze-app.png')}}" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mobile-app-banner pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="app-content">
                        <h2 class="text-white text-md-3">DOWNLOAD  KARACHI BREEZE APP</h2>
                        <p class="text-white text-sm-1">
                        For your travels, to have information on our network or to report an incident, you can now use our application For your travels, to have information on our network or to report an incident, you can now use our application
                        </p>

                        <div class="app-store-icons">
                            <div class="icon-app">
                                <img src="{{asset('public/assets/images/ios-store-icon.png')}}" class="img-fluid" />
                            </div>  
                            <div class="icon-app">
                                <img src="{{asset('public/assets/images/play-store-icon.png')}}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="btn-sticky">
        <a href="javascript:void(0);" class="fare-calculator">Fare Calculator</a>
    </div>

    <div class="fare-calculator-popup">
        <div class="d-flex align-items-center justify-content-center">
            <div class="calculator-popup-content">
                <div class="header-btn">
                    <a href="javascript:void(0);" class="close-fare-calculator">
                        <span class="iconify" data-icon="basil:cross-solid" data-inline="false"></span>
                    </a>
                </div>

                <div class="calculator-inner">
                    <h2>Fare Calculator</h2>

                    <form method="POST" action="{{url('calculate-fare')}}" class="calculate-fare" onsubmit="return false;">
                        {{csrf_field()}}
                        <select name="from" class="form-control">
                            <option>From</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        </select>

                        <select name="to" class="form-control">
                            <option>To</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                            @endforeach
                        </select>

                        <div class="bottom-row d-flex align-items-center justify-content-between">
                            <div class="price-info"></div>

                            <button type="submit" class="btn btn-fare">Calculate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
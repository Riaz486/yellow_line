@extends('layouts.frontend.main-layout')

@section('content')
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Our</p>
                <h2 class="heading py-2">Mission & Vision</h2>
            </div>
        </div>
    </div>
</section>

<section class="p-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-lg-1 mb-80">Mission</h2>
            </div>


            <div class="col-md-6 col-p-left">
                <div class="color-box bg-green">
                    <h3 class="text-white text-md-4">Redistribute space according to Mobility Needs and Space</h3>

                    <p class="text-white text-sm-2">
                        Redistributing space according to mobility needs and scales involves rethinking urban infrastructure to prioritize efficient, sustainable, and equitable transportation systems. This process emphasizes balancing space for various modes of transport—walking, cycling, public transit, and motor vehicles—based on their usage, efficiency, and environmental
                    </p>

                    <ul class="smll-dots-list">
                        <li>Pedestrian-Friendly Zones</li>
                        <li>Efficient Public Transit Lanes</li>
                        <li>Flexible & Scalable Urban Design</li>
                        <li>Integration of Public Transit</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-p-right">
                <div class="verticle-inline">
                    <div class="color-box">
                        <h3 class="text-white text-md-4">Sindh Mass Transit Authority</h3>

                        <p class="text-white text-sm-2">
                            Our mission is to design, develop, and implement state-of-the-art mass transit solutions that meet the needs of Karachi’s growing population. We are committed to ensuring high standards of safety, efficiency, and accessibility in our transportation network, improving connectivity and enhancing the urban experience for all.
                        </p>
                    </div>
                    
                    <div class="color-box bg-yellow">
                        <h3 class="text-white text-md-4">Prioritize environmentally sustainable transportation methods</h3>

                        <p class="text-white text-sm-2">
                            In our commitment to fostering a sustainable future, as urban populations grow and environmental challenges intensify, we aim to create a transportation network that not only meets the mobility needs of our citizens but also protects our environment for future generations
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-lg-1 mb-90">Vision</h2>
        
            <div class="bg-img-row d-flex align-items-center">
                <div class="bg-img-box">
                    <div class="arrow-img">
                        <img src="{{asset('public/assets/images/arrow-bottom-right.svg')}}" class="img-fluid" />
                    </div>

                    <div class="bg-img-text">
                        <p>
                            We envision a future where every citizen of Karachi enjoys seamless, safe, and reliable public transportation.
                        </p>
                    </div>
                </div>

                <div class="bg-img-box">
                    <div class="arrow-img">
                        <img src="{{asset('public/assets/images/arrow-top-right.svg')}}" class="img-fluid" />
                    </div>

                    <div class="bg-img-text">
                        <p>
                            Our goal is to transform Karachi and other cites of Sindh into a model city for sustainable urban mobility, fostering economic growth, environmental sustainability.
                        </p>
                    </div>
                </div>

                <div class="bg-img-box">
                    <div class="arrow-img">
                        <img src="{{asset('public/assets/images/arrow-bottom-right.svg')}}" class="img-fluid" />
                    </div>

                    <div class="bg-img-text">
                        <p>
                            To build a safe, sustainable, transportation system for Sindh Province that enhances mobility system which meet international standards, for a healthier environment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="p-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-lg-1 mb-90">Facilities</h2>
            </div>
        </div>

        <div class="row gap-tb-70">
            <div class="col-md-4">
                <div class="box-with-icon">
                    <div class="box-icon">
                        <span class="iconify" data-icon="mdi:air-conditioner" data-inline="false"></span>
                    </div>

                    <div class="box-content">
                        <h2 class="text-md-2">Air Conditioned</h2>
                        <p class="text-sm-2">
                            Air Conditioner Always working on all busesAir Conditioner Always working on all buses busesAvailable and Installed in all bus main stops
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box-with-icon">
                    <div class="box-icon">
                        <span class="iconify" data-icon="token-branded:airi" data-inline="false"></span>
                    </div>

                    <div class="box-content">
                        <h2 class="text-md-2">Cafeteria & Vending Machines</h2>
                        <p class="text-sm-2">Available and Installed in all bus main stopsAvailable and Installed in all bus main stops</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box-with-icon">
                    <div class="box-icon">
                        <span class="iconify" data-icon="game-icons:despair" data-inline="false"></span>
                    </div>

                    <div class="box-content">
                        <h2 class="text-md-2">Facilities for people & determination</h2>
                        <p class="text-sm-2">Air Conditioner Always working on all buses Available and Installed in all bus main stops</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box-with-icon">
                    <div class="box-icon">
                        <span class="iconify" data-icon="tabler:hexagon-letter-i-filled" data-inline="false"></span>
                    </div>

                    <div class="box-content">
                        <h2 class="text-md-2">Information Screens</h2>
                        <p class="text-sm-2">Air Conditioner Always working on all busesAir Conditioner Always working on all buses busesAvailable and Installed in all bus main stops</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box-with-icon">
                    <div class="box-icon">
                        <span class="iconify" data-icon="mynaui:letter-p-diamond-solid" data-inline="false"></span>
                    </div>

                    <div class="box-content">
                        <h2 class="text-md-2">Parking for taxis and Motor Bikes</h2>
                        <p class="text-sm-2">Available and Installed in all bus main stopsbusesAvailable and Installed in all bus main stops </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box-with-icon">
                    <div class="box-icon">
                        <span class="iconify" data-icon="fluent-emoji-high-contrast:womens-room" data-inline="false"></span>
                    </div>

                    <div class="box-content">
                        <h2 class="text-md-2">Separate women compartment</h2>
                        <p class="text-sm-2">Air Conditioner Always working on all busesAvailable and Installed in all bus main stops</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
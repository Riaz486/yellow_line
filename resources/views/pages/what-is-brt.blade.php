@extends('layouts.frontend.main-layout')

@section('content')
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>BUS RAPID TRANSIT PROJECT</p>
                <h2 class="heading py-2">What is BRT?</h2>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey-2 pt-60 pb-60">
    <div class="container">
        <div class="row mb-80">
            <div class="col-md-12">
                <h2 class="text-lg text-center wd-70 mg-auto">The BRT: A transformative public transportation development project</h2>

                <div class="text-meta">
                    <span>MARCH 8, 2024</span>
                    <span>
                        <span class="iconify" data-icon="mdi:eye" data-inline="false"></span> 1964
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="custom-text pr-80">
                    <p>
                    To address the challenges of urban transportation in Karachi, Sindh Province, the Sindh Mass Transit Authority (SMTA) is implementing an innovative solution known as "Bus Rapid Transit" (BRT). This "Rapid Buses on Reserved Lanes" project is designed as a high-capacity public transport system, with studies indicating it can accommodate up to 300,000 passengers daily. By prioritizing dedicated lanes for buses, the BRT system aims to offer a sustainable and efficient alternative to current urban transport issues Karachi.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="img-full">
                    <img src="{{asset('public/assets/images/what-brt-img-1.jpg')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<div class="img-full">
    <img src="{{asset('public/assets/images/brt-map.jpg')}}" class="img-fluid" alt="" />
</div>

<section class="pt-90 pb-90">
    <div class="container">
        <div class="col-md-12">
            <div class="custom-text">
                <h3 class="text-uppercase text-lg">BUSES ON RESERVED LANE</h3>
                <p>
                    "Buses on a reserved lane" refers to buses utilizing specially designated lanes on the road that are exclusively set aside for their use. These lanes ensure that buses can travel without interference from regular traffic, significantly reducing delays and improving efficiency. Reserved lanes are designed to streamline public transit, offering a faster and more reliable alternative to traditional mixed-traffic routes. By prioritizing bus travel, these lanes help alleviate congestion and promote a more sustainable and effective transportation system. Ultimately, they enhance the overall commuting experience for bus passengers by providing a smoother and more predictable journey.
                </p>
            </div>

            <div class="video-block">
                <p class="text-yellow">VIDEO PRESENTATION OF THE BRT PROJECT IN KARACHI - SHORT VERSION</p>

                <div class="video-preview-box">
                    <video id="video-item" controls muted>
                        <source src="{{asset('public/assets/videos/video-1.mp4')}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="custom-text">
                <h3 class="text-uppercase text-lg">ALTERNATIVE TO AUTOMOBILITY</h3>
                <p>
                    The Karachi region, known for its high urban density, serves as the hub for Pakistan's administrative, political, economic, and cultural activities. Currently home to 3.63 million residents and projected to reach 5 million by 2030, Karachi accounts for nearly 24% of the nation's population, 50% of the urban population, and 70% of registered vehicles, all within just 0.3% of the country's land area. With an average annual population growth rate of nearly 3% and a yearly increase in the vehicle fleet of about 10%, the volume of motorized travel is expected to double over the next two decades. In response to these challenges, the Sindh Government has decided to prioritize mass public transportation solutions like the Bus Rapid Transit (BRT) system.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-100">
                <div class="custom-text text-center">
                    <h3 class="text-uppercase text-lg">A STRUCTURING PUBLIC TRANSPORT PROJECT</h3>
                    <p>
                        In Karachi, public transport facilitates over 80% of daily motorized travel, amounting to 3 million trips per day. Despite severe road congestion and parking challenges, motorized mobility represents only 30% of the 2.5 million daily trips. The Bus Rapid Transit (BRT) pilot line is part of an ambitious strategy for sustainable urban mobility spearheaded by the Sindh Mass Transit Authority. This project will significantly reduce travel times between Dawood Chowrangi and the Numaish from 90 to 45 minutes, enhancing comfort
                    </p>
                </div>        
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 pr-80">
                <div class="img-full">
                    <img src="{{asset('public/assets/images/brt-img-2.jpg')}}" class="img-fluid" alt="" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="custom-text">
                    <h4>AN URBAN PROJECT WITH A STRONG ENVIRONMENTAL AND SOCIAL DIMENSION</h4>
                    <p>
                    In Karachi, public transport facilitates over 80% of daily motorized travel, amounting to 3 million trips per day. Despite severe road congestion and parking challenges, motorized mobility represents only 30% of the 2.5 million daily trips. The Bus Rapid Transit (BRT) pilot line is part of an ambitious strategy for sustainable urban mobility spearheaded by the Sindh Mass Transit Authority. This project will significantly reduce travel times between Dawood Chowrangi and the Numaish from 90 to 45 minutes, enhancing comfort, safety, and reliability. Additionally, the 
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-120 section-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-center text-center">
                    <h2 class="text-uppercase mb-30 text-lg-1">FUNDING</h2>

                    <p class="text-grey-2 text-md-2">
                    The project is sponsored by the Government of Sindh, with financial assistance from the Asian Development Bank (ADB) and co-financiers, including the Asian Infrastructure Investment Bank (AIIB), the French Agency for Development (AFD), and the Green Climate Fund (GCF).
                    </p>

                    <ul class="images-inline">
                        <li>
                            <img src="{{asset('public/assets/images/govt-sindh-logo.png')}}" class="img-fluid">
                        </li>

                        <li>
                            <img src="{{asset('public/assets/images/world-bank-logo.png')}}" class="img-fluid">
                        </li>
                    </ul>
                </div>    
            </div>
        </div>
    </div>
</section>

@endsection
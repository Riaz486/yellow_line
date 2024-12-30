@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <video id="video-item" controls muted>
        <source src="{{asset('public/assets/uploads/projects/' . $projectData->video_file)}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>SINDH MASS TRANSIT AUTHORITY</p>
                <h2 class="heading py-2">WHO ARE WE?</h2>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section p-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-left pr-100">
                <div class="heading-box text-left">
                    <h2 class="text-grey text-uppercase text-md-2 mb-60">WHO ARE WE ?</h2>
                    <h2 class="mb-5 wd-45 text-md-1 text-dark-grey"><strong>Urban Mobility</strong> Organizing Authority</h2>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>
                
            </div>

            <div class="col-md-6">
               <div class="card-text text-justify">
                    <p>
                        Sindh Mass Transit Authority was established in October 2016 under the Sindh Mass Transit Authority Act, 2014. The Authority was created with the purpose of planning, developing, operating, maintaining and regulating mass transit systems in the Province of Sindh. Its core function is to provide safe, efficient, affordable, sustainable and reliable mass transit systems. SMTA has not been able to deliver as originally envisaged.
                    </p>

                    <p>
                        The citizens of Karachi rely almost entirely on the road network for travel within the city. The city has approximately 10,000 kilometers of roads, with local roads accounting for 93 percent and highways and arterial roads for less than 5 percent of the total length. Karachi has also six arterial or trunk roads that extend radially from the central area. There is currently no mass transit system per se. There are nearly 13.5 million motorized trips made each day within the city, of which about 42 percent are made by public and 58 percent by private transport. There were 3.6 million registered vehicles in Karachi as of mid-2015 (over 30 percent of the national total), and private vehicles—mainly motorcycles and cars—constitute about 84 percent of total registered vehicles, while public transport accounts for 4.5 percent of the total registered vehicles. With growth rates for private vehicles at over 4 percent, over 1000 new vehicles added to the streets of the city each day. There were over 12,000 public transport vehicles (including buses, minibuses, and coaches) serving 267 routes in the city. However, the number of buses has been steadily decreasing, and in 2017, reduced to less than 5000 vehicles serving about 100 routes. A city in the scale of Karachi should have at least 15,000 modern buses.
                    </p>

                    <p>
                        Sindh Mass Transit Authority (SMTA) Karachi Mobility Project (KMP) places sustainability at the heart of its actions, in line with World Bank and Government of Sindh commitments to achieve sustainable development goals, which should make it possible to reconcile the objectives of economic growth, environmental preservation and social equity. This desire is reflected in the promotion of green, inclusive and climate-resilient urban mobility systems, while considering the challenges of energy and digital transitions.

                    </p>

                    <p>
                        In Karachi, urban infrastructure and service delivery is fragmented among national, provincial and local governments. In recent years, many core city services have been centralized under the Government of Sindh (GoS) like solid waste, water and sewerage, mass transit, land use and building control, among others. Local councils represented by Karachi Metropolitan Corporation (KMC) and the six District Municipal Corporations (DMCs) deliver basic services in Karachi but suffer from limited financial resources and institutional and governance weaknesses. Institutional fragmentation and unclear or overlapping responsibilities have thus led to deterioration in the delivery of basic urban services.
                    </p>
               </div>
            </div> 
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

<section class="text-quote p-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-text text-center">
                    <p class="text-center">
                    The proposed Project is part of a long-term vision for Karachi, one that is served with safe, reliable,  efficient and accessible sustainable transport services. At the center of this Project is a Bus Rapid Transit (BRT),  which is intended to form the backbone of a fully integrated and extensive transit system for the city, enabling  public transport to become the mode of choice for travel.
                    </p>

                    <div class="quote-meta">
                        <h4>Sindh Mass Transi Authority</h4>
                        <span>Karachi Mobility Project Yellow Line</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-quote bg-yellow pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-text text-center">
                    <span class="text-white mb-50">Our Added Value:</span>
                    <p class="text-center quote-text-light">
                        Planning a roadmap to meet the challenge of sustainable urban mobility
                    </p>

                    <h4>A consultation framework that brings together all stakeholders cocncerned by mobility</h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
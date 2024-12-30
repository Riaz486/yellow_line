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
                    <h2 class="text-grey text-uppercase text-md-2 mb-60">SMTA ACT 2014</h2>
                    <h2 class="mb-5 wd-100 text-md-1 text-dark-grey">Sindh Mass Transit Authority </h2>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid d-block mt-3">
                </div>

                <div class="card-text pr-30 pl-30">
                    <p>
                        To provide for the establishment of an Authority known as the Sindh Mass Transit Authority in the Province of Sindh. Whereas it is expedient to establish and empower the Sindh Mass Transit Authority for the purpose of, inter alia, planning, coordinating, constructing, developing, operating, maintaining, monitoring and regulating mass transit systems in the Province of Sindh and carrying out all ancillary functions thereto for providing safe, efficient, comfortable, affordable, sustainable and reliable forms of mass transit systems and to make provisions for matters connected therewith or ancillary thereto.
                    </p>
                </div>

                <div class="pl-60 pr-60 mt-90 mb-90">
                    <div class="bg-yellow text-block h-60 d-flex align-items-center justify-content-center">
                        <h2 class="text-md-1 font-800 text-white m-0">LAW</h2>
                    </div>

                    <div class="pdf-box">
                        <div class="pdf-wrapper">
                            <embed src="{{asset('public/assets/files/smta-act.pdf')}}" height='600px' type='application/pdf' width='100%'></object>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
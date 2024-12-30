@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Fare</p>
                <h2 class="heading py-2">Automated Fare Collection</h2>
            </div>
        </div>
    </div>
</section>

<!-- bodyyy -->
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="block-heading">
            <h2 class="text-uppercase text-white">Automated Fare Collection (AFC) Card</h2>
        </div>
    </div>

    <div class="card-text">
        <p>
            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
        </p>
        <p>
            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
        </p>
        <p>
            o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
        </p>
    </div>

    <div class="centered-img full-img">
        <img src="{{asset('public/assets/images/automated.svg')}}" class="img-fluid" alt="" srcset="">
    </div>

    <div class="mt-4">
        <div class="card-body pt-50 pb-50 pl-60 pr-60">
            <div class="mesageBox"></div>

            <form method="POST" action="{{url('process-afc-card-request')}}" class="afc-card-request-form" onsubmit="return false;">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-6 pr-30">
                        <label class="form-label">Your Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="formData[name]" placeholder="Enter your name" required />
                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Your Father Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="formData[father_name]" placeholder="Enter Your Father Name"  required />
                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pr-30">
                        <label class="form-label">Your Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="formData[email]" placeholder="Enter your email" required />
                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Your Phone Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="formData[phone]" placeholder="Enter Your Phone Number" required />
                            <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pr-30">
                        <label class="form-label">CNIC number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="formData[cnic]" placeholder="Enter your CNIC number" required />
                            <span class="input-group-addon"><i class="fas fa-id-card"></i></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Your Address</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="formData[address]" placeholder="Enter your address" required />
                            <span class="input-group-addon"><i class="fas fa-home"></i></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pr-30">
                        <label class="form-label">Your City</label>
                        <select class="form-control" name="formData[city]"  required>
                            <option value="">Select City</option>
                            <option value="karachi">Karachi</option>
                            <option value="lahore">Lahore</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="rawalpindi">Rawalpindi</option>
                            <option value="peshawar">Peshawar</option>
                            <option value="quetta">Quetta</option>
                            <option value="faisalabad">Faisalabad</option>
                            <option value="multan">Multan</option>
                            <option value="sialkot">Sialkot</option>
                            <option value="gujranwala">Gujranwala</option>
                            <option value="hyderabad">Hyderabad</option>
                            <option value="sukkur">Sukkur</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Your Card</label>
                        <select class="form-control"  name="formData[your_card]"  required>
                            <option value="">Select Card</option>
                            <option value="karachi">Student Card</option>
                            <option value="lahore">Office Card</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pr-30">
                        <h4 class="box-title text-uperrcase">Biometric:</h4>

                        <div class="biotmetric-wrapper d-flex align-items-start jsutify-content-between">
                            <div class="fingerprintScanner">
                                <div class="fingerprintScannerDataForm">
                                    <button type="button" id="start-camera">Start Scan</button>
                                    <video id="video" width="320" height="240" autoplay></video>
                                    <button type="button" id="snap">Scan Now</button>
                                    <canvas id="canvas" width="320" height="240"></canvas>
                                </div>
                                    
                                <input type="hidden" name="image" id="imageData">
                            </div>
                            
                            <div class="sp-img">
                                <img src="{{asset('public/assets/images/fingerPrint.svg')}}" class="img-thumbnail2" alt="Right Side Thumb Biometric Image">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6"></div>

                    <div class="form-group col-md-6 pr-30">
                        <label class="form-label">Payment Method</label>
                        <div class="inputRadioInline">
                            <div class="radio-group">
                                <input type="radio" name="formData[paymentMethod]" class="paymentMethodbtn" value="cod" />
                                <label for="cod">Cash on Delivery</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" name="formData[paymentMethod]" class="paymentMethodbtn" value="online" />
                                <label for="online">Online Payment</label>
                            </div>
                        </div>
                        
                        <div class="paymentWrapper" id="online">
                            <div class="payment-options d-flex align-items-center gap-35">
                                <div class="method">
                                    <img src="{{asset('public/assets/images/jazcash.svg')}}" alt="JazzCash">
                                </div>
                                <div class="method">
                                    <img src="{{asset('public/assets/images/easypaisa.svg')}}" alt="EasyPaisa">
                                </div>
                                <div class="method">
                                    <img src="{{asset('public/assets/images/hbl.svg')}}" alt="HBL">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-row">
                        <button type="submit" class="btn btn-default formSubmit">Submit</button> 
                        <a href="" class="btn btn-default-outline">Cancel</a> 

                        <div class="loader-sub" id="carReq-load">
                            <div class="lds-ellipsis">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="bg-grey pt-80 pb-80 mb-80 mt-80">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-blue mb-50 text-lg-2 text-uppercase">FOLLOW THE STEPS TO APPLY FOR AFC CARD:</h3>

                <ol class="text-list pr-100">
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </li>
                </ol>
            </div>

            <div class="col-md-6">
                <h4 class="text-uppercase text-md-2">A VIDEO GUIDE HOW TO APPLY FOR AFC CARD:</h4>
                <div class="img-full">
                    <img src="{{asset('public/assets/images/children.svg')}}" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
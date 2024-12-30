@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>HELP & COMPLAINTS</p>
                <h2 class="heading py-2">Grivance Redress Mechanism</h2>
            </div>
        </div>
    </div>
</section>

<!-- bodyyy -->
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="block-heading">
            <h2 class="text-uppercase text-white">GRIVANCE REDRESS MECHANISM FORM </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 pr-100">
            <div class="card-text">
                <p>
                    o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership and skills development to rethink everyday mobility. It is in this context that it was given new missions in 2022 to provide concrete responses to traffic congestion and the lack of transport provision. Its scope of intervention has thus been extended to the Thiès region and its 
                </p>
                <p>
                    o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership 
                </p>
                <p>
                    <strong>o address mobility issues, CETUD has risen to the challenge and, over time, activated numerous levers in terms of investment, regulation, partnership </strong>
                </p>
            </div>
        </div>

        <div class="col-md-5">
            <div class="infobox bg-grey">
                <p class="text-danger">
                    <strong>
                        You may also address your issue to our Team by call and email at  given below contact details (only for Complaints)
                    </strong>
                </p>

                <ul class="info-list">
                    <li>
                        <span class="icon">
                            <img src="{{asset('public/assets/images/icon-1.svg')}}" />
                        </span>
                        <span>0329-3041618</span>
                    </li>

                    <li>
                        <span class="icon">
                            <img src="{{asset('public/assets/images/icon-2.svg')}}" />
                        </span>
                        <span>0800-07682</span>
                    </li>

                    <li>
                        <span class="icon">
                            <img src="{{asset('public/assets/images/icon-3.svg')}}" />
                        </span>
                        <span>021-99332206 / 021-99332207</span>
                    </li>

                    <li>
                        <span class="icon">
                            <img src="{{asset('public/assets/images/icon-4.svg')}}" />
                        </span>
                        <span>GRM.KMP.YLC@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-4 pb-80">
        <div class="card-body pt-50 pb-50 pl-60 pr-60">
            <div class="messageBox"></div>

            <form method="POST" action="{{url('process-complains')}}" class="complains-request-form" onsubmit="return false;">
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
                            <option value="Karachi">Karachi</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Sukkur">Sukkur</option>
                            <option value="Larkana">Larkana</option>
                            <option value="Mirpur Khas">Mirpur Khas</option>
                            <option value="Shaheed Benazirabad">Shaheed Benazirabad</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Select Project</label>
                        <select class="form-control" name="formData[project]"  required>
                            <option value="BRT Yellow Line">BRT Yellow Line</option>
                            <option value="BRT Green Line">BRT Green Line</option>
                            <option value="Orrange Line">Orrange Line</option>
                            <option value="Electric Vehicle (EV) Bus">Electric Vehicle (EV) Bus</option>
                            <option value="People Bus Service (PBS)">People Bus Service (PBS)</option>
                            <option value="Pink Bus">Pink Bus</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Your Route</label>
                        <select class="form-control" name="formData[route]"  required>
                            <option value="route1">Route 1</option>
                            <option value="route2">Route 2</option>
                            <option value="route3">Route 3</option>
                            <option value="route4">Route 4</option>
                            <option value="route5">Route 5</option>
                            <option value="route6">Route 6</option>
                            <option value="route7">Route 7</option>
                            <option value="route8">Route 8</option>
                            <option value="route9">Route 9</option>
                            <option value="route10">Route 10</option>
                            <option value="route11">Route 11</option>
                            <option value="route12">Route 12</option>
                            <option value="route13">Route 13</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pr-30">
                        <label class="form-label">Your Complaint Nature</label>
                        <select class="form-control" name="formData[complain_type]"  required>
                            <option value="Gender">Gender</option>
                            <option value="Environment issues">Environment issues</option>
                            <option value="Harassment">Harassment</option>
                            <option value="Behavior of staff & other passengers">Behavior of staff & other passengers</option>
                            <option value="Over crowding & comfort">Over crowding & comfort</option>
                            <option value="Accessibility & inclusivity">Accessibility & inclusivity</option>
                            <option value="Routes & schedule issues">Routes & schedule issues</option>
                            <option value="Vehicle condition & maintenance">Vehicle condition & maintenance</option>
                            <option value="Ticketing & fare issues">Ticketing & fare issues</option>
                            <option value="Safety & security">Safety & security</option>
                            <option value="Communication & information">Communication & information</option>
                            <option value="Ticketing fraud & scams">Ticketing fraud & scams</option>
                            <option value="Parking facilities">Parking facilities</option>
                            <option value="Station & facility issues">Station & facility issues</option>
                            <option value="Technology & App issues">Technology & App issues</option>
                            <option value="Lost & find goods">Lost & find goods</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pr-30">
                        <div class="image-uploader">
                            <div class="file-upload-init">
                                <div class="fileUploader">
                                    <input type="file" name="documents" class="input-upload-file" multiple="true" id="documents" />
                                    <div id="documents_dropzone" class="dropZone">
                                        <h4>
                                            <i class="fa fa-cloud-upload"></i>
                                            <h2>Upload A File</h2>
                                            <span>Drag & Drop files here</span>
                                            <small>( PDF / Word / Image and Video etc.)</small>
                                        </h4>
                                    </div>
                                    <div id="documents_progress"></div>                            
                                </div>
                            </div>  

                            <div id="documents_message" class="file-uploader-message"></div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 pl-30">
                        <label class="form-label">Your Complaint Statement</label>
                        <textarea class="form-control h-150" name="formData[statement]" maxlength="150" rows="6"></textarea>
                        <span class="text-gray text-sm mt-2 dsp-block">(Character limit is 250)</span>
                    </div>

                    <div class="btn-row mt-50">
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

<input type="hidden" name="processUrl" value="{{url('process-careeer-files')}}" />

@endsection
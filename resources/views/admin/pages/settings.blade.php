@extends('layouts.admin.admin-layout')

@section('admin')


<div class="container-fluid">
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Website Settings</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Header Settings</h4>

                @php
                    $logo_size            = '';
                    $header_logo 	      = '';
                    $favicon 		      = '';
                    $header_contact_phone = '';
                    $header_contact_email = '';

                    foreach($headerSettingsData as $setting):
                        if($setting->meta_key == 'logo_size') {
                            $logo_size = $setting->meta_value;
                        }

                        if($setting->meta_key == 'header_contact_phone') {
                            $header_contact_phone = $setting->meta_value;
                        }

                        if($setting->meta_key == 'header_contact_email') {
                            $header_contact_email = $setting->meta_value;
                        }

                        if($setting->meta_key == 'header_logo') {
                            $header_logo = $setting->meta_value;
                        }

                        if($setting->meta_key == 'header_favicon') {
                            $favicon = $setting->meta_value;
                        }
                    endforeach;
                @endphp

                <form method="POST" action="{{url('admin/update_header_settings')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="form-label">Logo</label>
                            <?php
                                if($header_logo == '') {
                                    $header_logo = 'images/logo.png';
                                } else {
                                    $header_logo = 'uploads/logo/' . $header_logo;
                                }
                            ?>
                            <div class="smImageHolder">
                                <img src="{{asset('public/assets/' . $header_logo)}}" />
                            </div>
                            <input type="file" name="header_logo" class="form-control" />

                            <span class="text-gray text-sm mt-2 dsp-block">Must be a JPG, PNG or GIF file. Alpha-transparent PNG is recommended.</span>
                        </div>

                        <div class="form-group col-md-7">
                            <label class="form-label">Logo Size</label>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio" name="header_settings[logo_size]" class="form-check-input" value="small" {{($logo_size == 'small') ? ' checked' : ''}} />
                                    <label class="form-check-label">
                                        Small
                                    </label>

                                    <span class="text-gray text-sm mt-2 dsp-block">
                                        maximum 75px height
                                    </span>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="header_settings[logo_size]" class="form-check-input"  value="medium" {{($logo_size == 'medium') ? ' checked' : ''}} />
                                    <label class="form-check-label">
                                        Medium
                                    </label>

                                    <span class="text-gray text-sm mt-2 dsp-block">
                                        maximum 130px height
                                    </span>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="header_settings[logo_size]" class="form-check-input" value="large" {{($logo_size == 'large') ? ' checked' : ''}} />
                                    <label class="form-check-label">
                                        Large
                                    </label>

                                    <span class="text-gray text-sm mt-2 dsp-block">
                                        maximum 200px height
                                    </span>
                                </div>
                            </div>

                            <span class="text-gray text-sm mt-2 dsp-block">
                                Choose a maximum size for your logo. Your logo will be reduced in size according to the selected option. All logos have a maximum width of 550px.
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Website Header Contact Phone</label>
                            <input type="text" name="header_settings[header_contact_phone]" class="form-control" value="{{$header_contact_phone}}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Website Header Contact Email</label>
                            <input type="text" name="header_settings[header_contact_email]" class="form-control" value="{{$header_contact_email}}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Favicon</label>
                            <?php
                                if($favicon == '') {
                                    $favicon = 'images/faviconDefault.png';
                                } else {
                                    $favicon = 'uploads/logo/' . $favicon;
                                }
                            ?>
                            <div class="smImageHolder2">
                                <img src="{{asset('public/assets/' . $favicon)}}" />
                            </div>

                            <input type="file" name="header_favicon" class="form-control" />
                            <span class="text-gray text-sm mt-2 dsp-block">
                                Must be an ICO, PNG or GIF file. Alpha-transparent PNG is recommended.
                            </span>
                        </div>
                    </div>

                    <div class="btn-row">
                        <button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Update Settings</button>
                    </div>
                </form>                        
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Footer Settings</h4>

                @php
                    $social_links_data = array('google', 'facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'yelp', 'review');
                    $socialIcons = array(
                        'facebook'  => '',
                        'twitter'   => '',
                        'google'    => '',
                        'instagram' => '',
                        'linkedin'  => '',
                        'youtube'   => ''
                    );
                    $data_social_value = array();

                    $contact_email      = '';
                    $contact_address    = '';
                    $contact_phone 	    = '';
                    $footer_logo        = '';
                    $description        = '';
                    $footer_text        = '';
                    $newsletter_heading = '';
                    $newsletter_text    = '';

                    foreach($footerSettingsData as $setting):
                        if(in_array($setting->meta_key, array_keys($socialIcons)) ) {
                            $socialIcons[$setting->meta_key] = $setting->meta_value;
                        }

                        if($setting->meta_key == 'newsletter_heading') {
                            $newsletter_heading = $setting->meta_value;
                        }

                        if($setting->meta_key == 'newsletter_text') {
                            $newsletter_text = $setting->meta_value;
                        }

                        if($setting->meta_key == 'contact_email') {
                            $contact_email = $setting->meta_value;
                        }

                        if($setting->meta_key == 'contact_address') {
                            $contact_address = $setting->meta_value;
                        }

                        if($setting->meta_key == 'contact_phone') {
                            $contact_phone = $setting->meta_value;
                        }

                        if($setting->meta_key == 'footer_logo') {
                            $footer_logo = $setting->meta_value;
                        }

                        if($setting->meta_key == 'description') {
                            $description = $setting->meta_value;
                        }

                        if($setting->meta_key == 'footer_text') {
                            $footer_text = $setting->meta_value;
                        }
                    endforeach;
                @endphp

                <form method="POST" action="{{url('admin/update_footer_settings')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <h4 class="box-title">Newsletter</h4>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Heading</label>
                            <input type="text" name="footer_settings[newsletter_heading]" class="form-control" value="{{$newsletter_heading}}" />
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-label">Description</label>
                            <input type="text" name="footer_settings[newsletter_text]" class="form-control" value="{{$newsletter_text}}" />
                        </div>
                    </div>

                    <h4 class="box-title">Footer Content</h4>

                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="form-label">Footer Logo</label>
                            <?php
                                if($footer_logo == '') {
                                    $footer_logo = 'images/logo.png';
                                } else {
                                    $footer_logo = 'uploads/logo/' . $footer_logo;
                                }
                            ?>
                            <div class="smImageHolder">
                                <img src="{{asset('public/assets/' . $footer_logo)}}" />
                            </div>
                            <input type="file" name="footer_logo" class="form-control" />

                            <span class="text-gray text-sm mt-2 dsp-block">Must be a JPG, PNG or GIF file. Alpha-transparent PNG is recommended.</span>
                        </div>

                        <div class="form-group col-md-7">
                            <label class="form-label">Description</label>
                            <textarea name="footer_settings[description]" class="form-control" rows="6">{{$description}}</textarea>
                        </div>
                    </div>
                    
                    <h4 class="box-title">Footer Contact Info</h4>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Contact Email</label>
                            <input type="text" name="footer_settings[contact_email]" class="form-control" value="{{$contact_email}}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Contact Address</label>
                            <input type="text" name="footer_settings[contact_address]" class="form-control" value="{{$contact_address}}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Website Contact Phone</label>
                            <input type="text" name="footer_settings[contact_phone]" class="form-control" value="{{$contact_phone}}" />
                        </div>
                    </div>

                    <h4 class="box-title">Social Links</h4>

                    <div class="row">
                    @foreach($social_links_data as $social)	
                        <div class="form-group col-md-6">
                            <label class="form-label">{{ucfirst($social)}} URL</label>
                            <input type="text" name="footer_settings[{{$social}}]" class="form-control" value="{{isset($socialIcons[$social]) ? $socialIcons[$social] : ''}}" />
                        </div>
                    @endforeach
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Footer text</label>
                            <input type="text" name="footer_settings[footer_text]" class="form-control" value="{{$footer_text}}" />
                        </div>
                    </div>

                    <div class="btn-row">
                        <button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Update Settings</button>
                    </div>
                </form>                        
            </div>
        </div>
    </div>
</div>
                    
@endsection
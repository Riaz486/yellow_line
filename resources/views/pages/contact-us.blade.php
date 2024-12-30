@extends('layouts.frontend.main-layout')

@section('content')
<?php
    $socialIcons = array(
        'facebook'  => '',
        'twitter'   => '',
        'google'    => '',
        'instagram' => '',
        'linkedin'  => '',
        'youtube'   => ''
    );

    $contactInfo = array(
        'contact_address' => '',
        'contact_phone' => '',
        'contact_email' => '',
    );

    $labels = array(
        'contact_address' => 'Address',
        'contact_phone' => 'Telephone',
        'contact_email' => 'Email',
    );

    $icons = array(
        'contact_address' => 'fa-map-marker-alt',
        'contact_phone' => 'fa-phone',
        'contact_email' => 'fa-envelope',
    );

    foreach($footerSettingsData as $footer):
        if(in_array($footer->meta_key, array_keys($socialIcons)) ) {
            if($footer->meta_value != '' && $footer->meta_value != 'N/A') {
                $socialIcons[$footer->meta_key] = $footer->meta_value;
            }
        }

        if(array_key_exists($footer->meta_key, $contactInfo)) {
            $contactInfo[$footer->meta_key] = $footer->meta_value;
        }
    endforeach;
?>
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <h2 class="heading py-2">Contact Us</h2>
            </div>
        </div>
    </div>
</section>

<section class="getInTouch pr-30">
    <div class="d-flex align-items-end">
        <div class="contactForm">
            <div class="card-body pt-50 pb-50 pl-60 pr-60">
                <div class="mesageBox"></div>

                <form method="POST" action="{{url('process-contact')}}" class="contact-form-process" onsubmit="return false;">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Your Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="formData[name]" placeholder="Enter your name" required />
                                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-label">Your Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="formData[email]" placeholder="Enter your email" required />
                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-label">Subject</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="formData[subject]" placeholder="Enter Your Phone Number" required />
                                <span class="input-group-addon"><i class="fas fa-folder"></i></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-label">Your Message</label>
                            <textarea class="form-control h-150" name="formData[message]" placeholder="Enter your Message" required rows="6"></textarea>
                        </div>

                        <div class="btn-row mt-50">
                            <button type="submit" class="btn btn-default formSubmit">Send</button> 

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

        <div class="contact-info">
            <div class="card-text mb-50">
                <p class="text-justify">
                    The Executive Council for Sustainable Urban Transport (CETUD). This is a consultation framework that brings together all stakeholders concerned with mobility to ensure, in particular, better coordination of public transport policies, with the participation of the State and local authorities.
                </p>
            </div>

            <div class="icon-box-wrapper">
                <?php 
                    $nonEmptyContactInfo = array_filter($contactInfo, fn($value) => !empty($value));

                    if (!empty($nonEmptyContactInfo)): 
                ?>

                <?php foreach($nonEmptyContactInfo as $key => $value): ?>
                <div class="icon-info-box border-1 border-grey">
                    <div class="icon">
                        <i class="fa <?= htmlspecialchars($icons[$key]) ?>"></i>
                    </div>

                    <div class="icon-content">
                        <h4><?= htmlspecialchars($labels[$key]) ?></h4>
                        <p><?= htmlspecialchars($value) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="social">
                <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            </div>

            <?php
            /*
            $nonEmptySocialIcons = array_filter($socialIcons, fn($url) => !empty($url));

            if (!empty($nonEmptySocialIcons)): ?>
                <div class="social">
                    <?php foreach($nonEmptySocialIcons as $icon => $url): ?>
                        <a href="<?= htmlspecialchars($url) ?>" target="_blank"><i class="fa-brands fa-<?= htmlspecialchars($icon) ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            <?php endif;*/ ?>
        </div>
    </div>
</section>

<section class="full-width-map">
<iframe
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28954.188454859156!2d68.35268057538332!3d25.396009796614037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c710e7d19fdef%3A0x5f1101e66a7e0e56!2sHyderabad%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2sus!4v1698061136955!5m2!1sen!2sus"
    class="mb-80 mt-80"
  style="width: 100%;"
  height="280"
  style="border:0;"
  allowfullscreen=""
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade"
></iframe>

</section>
@endsection
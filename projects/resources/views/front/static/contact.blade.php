@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("logo",$data->image)
@section("header-section")
{!! $data->header_section !!}
@stop
@section("footer-section")
{!! $data->footer_section !!}
@stop
@section("container")
@php
$name=$data->name;
$bannerImage=asset('front/images/breadcrumb.webp');
if($data->bannerImage){
	$bannerImage=asset($data->bannerImage);
}
@endphp
<section class="contact-banner" style="background-image:url({{ asset($bannerImage) }});">
    <div class="contact-overlay"></div>
    <div class="container">
        <h1 data-aos="zoom-in">Contact Us</h1>
    </div>
</section>

   <!-- start about section -->
    <section class="contact-page-section">
        <div class="container">
            <div class="row">
                <!-- Contact Info Box -->
                <div class="contact-info-box col-lg-3 col-md-6 col-sm-12 d-none" >
                    <div class="box-inner">
                        <h5>Address</h5>
                        <p><i class="fas fa-map-marker-alt"></i> {!! $setting_data['address'] ?? '#' !!}</p>
                    </div>
                </div>
                <div class="contact-info-box col-lg-4 col-md-6 col-sm-12" >
                    <div class="box-inner">
                        <h5>Phone</h5>
                        <p><i class="fa-solid fa-phone"></i><a href="tel:{!! $setting_data['mobile'] ?? '#' !!}"> {!! $setting_data['mobile'] ?? '#' !!}</a></p>
                    </div>
                </div>
                <div class="contact-info-box col-lg-4 col-md-6 col-sm-12" >
                    <div class="box-inner">
                        <h5>Email address</h5>
                        <p><i class="fa-solid fa-envelope"></i><a href="mailto:{!! $setting_data['email'] ?? '#' !!}"> {!! $setting_data['email'] ?? '#' !!}</a></p>
                    </div>
                </div>
                <div class="contact-info-box col-lg-4 col-md-6 col-sm-12" >
                    <div class="box-inner">
                        <h5>Directions</h5>
                         <p><i class="fa-solid fa-location-dot"></i>{{$data->shortDescription}}</p>
                        <!-- <p><i class="fa-solid fa-mobile"></i><a href="tel:{!! $setting_data['mobile'] ?? '#' !!}"> {!! $setting_data['mobile'] ?? '#' !!}</a></p> -->
                    </div>
                </div>
            </div>
            <!-- Sec Title -->
            <div class="row mt-md-5">
                <div class="col-md-6">
                    <div class="inner-container" >
                        <div class="sec-title">
                            <h3 >Feel free to contact us</h3>
                            <div class="line">  </div>
                        </div>
                        <div class="contact-form">
                            {!! Form::open(["route"=>"contactPost"])  !!}
                                <div class="row clearfix">
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Full Name *</label>
                                        <input type="text" name="name" id="form_fname" placeholder="Full name" value="" required="">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Email *</label>
                                        <input type="email" name="email" id="form_email" placeholder="Email *" value="" required="">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Phone *</label>
                                        <input type="number" name="mobile" id="form_phone" placeholder="Phone" value="" required="">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Message *</label>
                                        <textarea class="" name="message" id="msg" placeholder="Message" required=""></textarea>
                                    </div> 
                                  
                                 
                               
                                     @if($setting_data['g_captcha_enabled'])
                                        @if($setting_data['g_captcha_enabled']=="yes")
                                            @if($setting_data['google_captcha_site_key']!="" && $setting_data['google_captcha_secret_key']!="")
                							<script src="https://www.google.com/recaptcha/api.js" async defer></script>
                							<div class="form-group col-lg-12 col-md-12 col-sm-12">
                							    <div class="g-recaptcha" data-sitekey="{{ $setting_data['google_captcha_site_key'] }}"></div>
                							 </div>  
                							 @endif
        							    @endif
        							 @endif
                                  
                                 
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" name="submit" class="main-btn"><span>Send Message</span></button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-map" >
                        <iframe src="{!! $setting_data['map'] ?? '#' !!}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        </section>

{!! $data->seo_section !!}
@stop

@section("css")
    @parent
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('front')}}/css/contact.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/contact-responsive.css" />
@stop 
@section("js")
    @parent
    <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
    <script src="{{ asset('front')}}/js/contact.js" ></script>
    <script>
        AOS.init({
  duration: 1400,
})
    </script>
@stop
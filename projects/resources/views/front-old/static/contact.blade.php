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
    <!-- start banner sec -->
  
    <section class="breadcrumb" style="background-image: url({{ $bannerImage }});">
        <div class="auto-container">
            <h2 data-aos="zoom-in" data-aos-duration="1500">{{$name}}</h2>
            <ul class="page-breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>/ {{$name}}</li>
            </ul>
        </div>
    </section>


    <!-- start about section -->
         <!-- contact-sec -->
    <section class="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <div class="contact-form-c" data-aos="zoom-in-right" data-aos-duration="1500">
                        Send a Message
                        </div>
                        {!! Form::open(["route"=>"contactPost"])  !!}
                            <div class="row" data-aos="fade-up" data-aos-duration="1500">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <!-- <label>Full Name *</label> -->
                                    <input type="text" name="name" id="form_fname" placeholder="Full name" value="" required="">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <!-- <label>Phone *</label> -->
                                    <input type="tel" name="mobile" id="form_phone" placeholder="Phone" value="" required="">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <!-- <label>Email *</label> -->
                                    <input type="email" name="email" id="form_email" placeholder="Email " value="" required="">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <!-- <label>Message *</label> -->
                                    <textarea class="" name="message" id="msg" placeholder="Message" required=""></textarea>
                                </div>
                                 <div class="form-group mt-4 mb-4">
                                            <div class="captcha">
                                                <span>{!! captcha_img() !!}</span>
                                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                    &#x21bb;
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                        </div>
                                         @if ($errors->has('captcha'))
                                              <div class="text-danger">
                                                  <strong>{{ $errors->first('captcha') }}</strong>
                                              </div>
                                          @endif
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
                                    <button type="submit" name="submit" class="main-btn">Send Message</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cont-info-c">
                        <h2 data-aos="zoom-in-left" data-aos-duration="1500">Contact Info</h2>
                        <p data-aos="fade-up" data-aos-duration="1500"> {!!  $data->longDescription !!}</p>
                    </div>
                    <div class="contact-infos">
                        <div class="contct-info" data-aos="fade-up" data-aos-duration="1500">
                            <div class="contact-icons">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="contact-about" >
                                <div class="headings">Phone Number</div>
                                <div class="contact-type"><a href="tel:{!! $setting_data['mobile'] ?? '#' !!}">{!! $setting_data['mobile'] ?? '#' !!}</a></div>
                            </div>
                        </div>
                        <div class="contct-info" data-aos="fade-up" data-aos-duration="1500">
                            <div class="contact-icons">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="contact-about">
                                <div class="headings">Email Address</div>
                                <div class="contact-type"><a href="mailto:{!! $setting_data['email'] ?? '#' !!}">{!! $setting_data['email'] ?? '#' !!}</a></div>
                            </div>
                        </div>
                        <div class="contct-info" data-aos="fade-up" data-aos-duration="1500">
                            <div class="contact-icons">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="contact-about">
                                <div class="headings">Our Location</div>
                                <div class="contact-type">{!! $setting_data['address'] ?? '#' !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- end contact-sec -->
<!-- Map Section -->
@if($setting_data['map'])
    <section class="map-sec">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="1500">
                <iframe src="{!! $setting_data['map'] ?? '#' !!}" width="100%" height="400"></iframe>
            </div>
        </div>
    </section>      

    <!-- end map sec -->
@endif
{!! $data->seo_section !!}
@stop

@section("js")

@stop
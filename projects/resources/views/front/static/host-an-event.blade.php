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
<section class="host-banner" style="background-image:url({{ asset($bannerImage) }});">
    <div class="host-overlay"></div>
    <div class="container">
        <h1 data-aos="zoom-in">{{ $data->name }}</h1>
    </div>
</section>
<section class="host-form">
    <div class="container">
        <div class="head-sec">
            <h2 data-aos="fade-up">Ready to Plan Your Event?</h2>
            <h4 data-aos="fade-up">Event Booking Form</h4>
            <p data-aos="fade-up">From intimate gatherings to larger celebrations, Sol & Santosha offers the perfect nature-inspired venue for your event.</p>
        </div>
        {!! Form::open(["files"=>true,"route"=>"hostaneventPost"]) !!}
            <div class="row">
            <div class="col-12" data-aos="fade-up">
                <p>You're Interested In*</p>
                <div class="check-list">
                    <div>
                        <input type="checkbox" id="Wellness Retreats (Yoga or spiritual)" name="you_are_interested_in[]" value="Wellness Retreats (Yoga or spiritual)">
                        <label for="Wellness Retreats (Yoga or spiritual)"> Wellness Retreats (Yoga or spiritual)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="Group Getaways (Birthdays)" name="you_are_interested_in[]" value="Group Getaways (Birthdays)">
                        <label for="Group Getaways (Birthdays)"> Group Getaways (Birthdays)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="Corporate/ Team retreats" name="you_are_interested_in[]" value="Corporate/ Team retreats">
                        <label for="Corporate/ Team retreats"> Corporate/ Team retreats</label>
                    </div>
                    <div>
                        <input type="checkbox" id="Family gatherings" name="you_are_interested_in[]" value="Family gatherings">
                        <label for="Family gatherings"> Family gatherings</label>
                    </div>
                    <div>
                        <input type="checkbox" id="Small Weddings" name="you_are_interested_in[]" value="Small Weddings">
                        <label for="Small Weddings"> Small Weddings</label>
                    </div>
                    <div>
                        <input type="checkbox" id="Something Else" name="you_are_interested_in[]" value="Something Else">
                        <label for="Something Else"> Something Else</label>
                    </div>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up">
                <label for="Something Else">Something Else</label>
                <input type="text"   name="something_else">
            </div>
            <div class="col-6" data-aos="fade-up">
                <label for="First Name">First Name*</label>
                <input type="text" name="first_name" required="">
            </div>
            <div class="col-6" data-aos="fade-up">
                <label for="Last Name">Last Name*</label>
                <input type="text" name="last_name" required="">
            </div>
             <div class="col-6" data-aos="fade-up">
                <label for="Phone">Phone*</label>
                <input type="tel" name="mobile" required>
            </div>
             <div class="col-6" data-aos="fade-up">
                <label for="Email" data-aos="fade-up">Email*</label>
                <input type="email" name="email" required>
            </div>
            <div class="col-6" data-aos="fade-up">
                <label for="Date" data-aos="fade-up">Date</label>
                <input type="date" name="date_of_request" >
            </div>
            <div class="col-6" data-aos="fade-up"> 
                <p>Select your Budget</p>
                <div class="budget-list">
                    <div>
                        <input type="checkbox" id="$1000 - $5000" name="select_your_budget[]" value="$1000 - $5000">
                        <label for="$1000 - $5000"> $1000 - $5000</label>
                    </div>
                    <div>
                        <input type="checkbox" id="$6000 - $10,000" value="$6000 - $10,000" name="select_your_budget[]" >
                        <label for="$6000 - $10,000"> $6000 - $10,000</label>
                    </div>
                    <div>
                        <input type="checkbox" id="$11,000 - $15,000" value="$11,000 - $15,000" name="select_your_budget[]" >
                        <label for="$11,000 - $15,000"> $11,000 - $15,000</label>
                    </div>
                    <div>
                        <input type="checkbox" id="$16,000 - $20,000" value="$16,000 - $20,000" name="select_your_budget[]" >
                        <label for="$16,000 - $20,000"> $16,000 - $20,000</label>
                    </div>
                    
                </div>
            </div>
            <div class="col-12" data-aos="fade-up">
                <label for="tell-us-more">Tell us more about your Event</label>
                <textarea name="tell_us_more" id=""></textarea>
            </div>
            <div class="col-12" data-aos="fade-up">
                <div class="terms">
                    <div>
                        <input type="checkbox" id="Sign up for news and updates" name="sign_up_for_news_and_update" value="Sign up for news and updates">
                        <label for="Sign up for news and updates"> Sign up for news and updates</label>
                    </div>
                </div>
            </div>
            <div class="col-12  form-button" data-aos="fade-up">
                <button class="main-btn">Submit Inquiry</button>
            </div>
            </div>
        {!! Form::close() !!}
    </div>
</section>
@stop
@section("css")
@parent
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
<link rel="stylesheet" href="{{ asset('front')}}/css/host-an-event.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/host-an-event-responsive.css" />
@stop 
@section("js")
@parent
 <script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script src="{{ asset('front')}}/js/host-an-event.js" ></script>
 <script>
        AOS.init({
  duration: 1400,
})
@stop
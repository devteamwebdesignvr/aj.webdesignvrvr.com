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
@include("front.layouts.banner")
<section class="property-management">
	<div class="container">
		<div class="property-content">
			<h2>Short & Long-term Property Management without the B.S.</h2>
			<p>At StayLowcountry, we like to classify our approach as <i>non-bougie boutique.</i></p>
			<p>We intentionally pace the number of new properties we take on so that we can continue to providinge a level of personalized service that you can’t find at a big property management firm.</p>
			<p>We're more nimble, more attentive, and personally invested in your success.</p>
			<p>After years of real-world testing, we’ve got our process down to a science.</p>
			<p>10 years of construction experience, 8 years as an Airbnb SuperHost, a dash of AI automation, and a heavy-handed sprinkle of southern hospitality – our secret formula for successful property management.</p>
			<p>Now stir it all up, pour it over ice, then sit back and watch the passive income roll in (while we deal with all the annoying stuff).</p>
			<h4>Relax, darlin. Our “Got This” approach means you won’t have to worry about a thing.</h4>
			<p>Our reporting dashboard provides all the essential details without overwhelming you.</p>
			<p>Hear what our homeowners (clients) have to say. Real stories of success with StayLowcountry.</p>
			<div class="cta">
				<h5>Ready to talk? Fill out the form, and we'll schedule a good old-fashioned phone call. <span class="form-click">Click Here</span></h5>
				
			</div>
			
		</div>
		<form action="{{ route('property-management-post') }}" method="post" class="manage-form">
		    @csrf
			<div class="fields">
				<label class="main-label">Property Owner Name:</label>
				{!! Form::text("name",null,["class"=>"form-control common-i","required","placeholder"=>"Enter Property Owner Name"]) !!}
			</div>
			<div class="fields">
				<label class="main-label">Email:</label>
				{!! Form::email("email",null,["class"=>"form-control common-i","required","placeholder"=>"Enter Email ID"]) !!}
			</div>
			<div class="fields">
				<label class="main-label">Phone:</label>
				{!! Form::text("mobile",null,["class"=>"form-control common-i","required","placeholder"=>"Enter Mobile Number"]) !!}
			</div>
			<div class="fields">
				<label class="main-label">Property Address:</label>
				{!! Form::text("property_address",null,["class"=>"form-control common-i","required","placeholder"=>"Enter Property Address"]) !!}
			</div>
			<div class="fields">
				<label class="main-label">Property Type</label>
				<div class="radio-sel common-i">
					<input type="radio" name="property_type" value="Single Family" checked>
					<label>Single Family</label><br>
					<input type="radio" name="property_type" value="Condo" >
					<label>Condo</label><br>
					<input type="radio" name="property_type" value="Townhouse" >
					<label>Townhouse</label> <br>
					<input type="radio" name="property_type" value="Commerical" >
					<label>Commerical</label>
				</div>
			</div>
			<div class="fields">
				<label class="main-label">Number of Bedrooms</label>
				{!! Form::selectRange("number_of_bedrooms",0,1000,null,["class"=>"","placeholder"=>"Choose Number of Bedrooms"]) !!}
			</div>
			<div class="fields">
				<label class="main-label">Number of Bathrooms</label>
				{!! Form::selectRange("number_of_bathrooms",0,1000,null,["class"=>"","placeholder"=>"Choose Number of Bathrooms"]) !!}
			</div>
			<div class="fields">
				<label class="main-label">What is your Rental Goal</label>
				<div class="radio-sel common-i">
					<input type="radio" name="what_is_your_rental_goal" value="Long Term Investment" checked>
					<label>Long Term Rentals</label><br>
					<input type="radio" name="what_is_your_rental_goal" value="Short Term Rentals" >
					<label>Short Term Rentals</label><br>
					<input type="radio" name="what_is_your_rental_goal" value="Undecided" >
					<label>Undecided</label> 
				</div>
			</div>
		
			<div class="submit-btn"><button type="submit">Free Property Analysis</button></div>
		</form>
	</div>
</section>
@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/property-managegement.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/property-managegement-responsive.css" />
@stop 
@section("js")
@parent
<script src="{{ asset('front')}}/js/property-management.js" ></script>
@stop
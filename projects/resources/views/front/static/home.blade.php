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
$currency=$setting_data['payment_currency'];
@endphp
<section class="video-banner">
	@if($setting_data['home_video'])
	<div class="video-sec">
		<!-- <img src="{{ asset('front')}}/images/video.webp" alt=""> -->
    
<div style="padding:56.25% 0 0 0;position:relative;" class="home-banner-video">
  <iframe src="https://player.vimeo.com/video/{{ $data->image_2 }}?autoplay=1&loop=1&muted=1&title=0&background=1" 
          frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" 
          style="position:absolute;top:0;left:0;width:100%;height:100%;" title="video-6758416460fd3"></iframe>
</div>

      
      <!--	<div class="wistia-container">
<wistia-player class="full-width-player wistia-fullscreen" media-id="{{ $data->image_2 }}" autoplay loop muted></wistia-player>
      
<div>-->		
      
        <!--<video src="{!! asset($setting_data['home_video']) !!}" loop muted autoplay
			playsinline id="mob" class="mob__video"></video>
		<button onclick="playVideo()" id="play"><i
				class="fa-solid fa-play"></i></button>
		<button onclick="pauseVideo()" id="pause"><i
				class="fa-solid fa-pause"></i></button>  -->
      
		<div class="video-cont">
			<div class="container">
              <p class="head-p" > WELCOME TO </p>
              
				<img src="{{ asset('front')}}/images/logo-banner.png" alt
					class="banner-logo" data-aos="zoom-in">
				{!! $setting_data['home-video-text'] !!}
				<div class="banner-btn d-none">
					<a href="{{ url('joshua-tree-1#property-list-data') }}" class="main-btn vd-btn"
						data-aos="fade-up">Book now</a>
				</div>
              
              <div class="btmbanner-btn">
                <!-- <div class="btm-btn">
					<a href="{{ url('production') }}" class="btmvd-btn"
						>Production</a>
                  </div> -->
                    <p class="head-dwnp" > Experience nature, recharge fully. </p>
                  <!-- <div class="btm-btn">
                <a href="{{ url('services') }}" class="btmvd-btn"
						>Events</a>
				</div> -->
                  </div>
              
            
              
			<div class="search-sec" >
		<div class="container">
			<div class="search-bar">			    
				<form method="get" action="{{ url('joshua-tree-1') }}">
					<div class="row">
						<div class="col-3 md-12 sm-12 select">
							{!! Form::select("location_id",ModelHelper::getLocationSelectList(),null,["class"=>"","placeholder"=>"Location","title"=>"Location","id"=>"loc"]) !!}
						</div>
						<div class="col-5 col-lg md-6 icns mb-lg-0 position-relative  datepicker-section datepicker-common-2 main-check">
							<div class="row">
								<div class="check left icns mb-lg-0 position-relative datepicker-common-2">
									<label for="check-in">Check In</label>
									{!! Form::text("start_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"start_date","placeholder"=>"check in","class"=>"form-control"]) !!}
									<img src="{{ asset('/') }}/front/images/calendar.png" alt="">
								</div>
								<div class="check right icns mb-lg-0 position-relative datepicker-common-2 check-out">
									<label for="check-out">Check Out</label>
									{!! Form::text("end_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"end_date","placeholder"=>"check out","class"=>" form-control lst" ]) !!}
									<img src="{{ asset('/') }}/front/images/calendar.png" alt="">
								</div>
								<div class="col-12 md-12 sm-12 datepicker-common-2 datepicker-main">
									<input type="text" id="demo17" value="" aria-label="Check-in and check-out dates" aria-describedby="demo17-input-description" readonly />
								</div>
							</div>
						</div>
						<div class="col-2 md-12 sm-12 guest">
							<label for="guests">Adult</label>
							<input type="text" name="Guests" readonly="" class="form-control gst" id="show-target-data" placeholder="Adult" title="Select Guests">
							<img src="{{ asset('/') }}/front/images/user.png" alt="">
							<input type="hidden" value="1" name="adults" id="adults-data" />
							<input type="hidden" value="0" name="child" id="child-data" />
							<div class="adult-popup" id="guestsss">
								<i class="fa fa-times close1"></i>
								<div class="adult-box">
									<div class="adult-value">
										<p id="adults-data-show">1 Adult</p>
										<!-- <p class="adult-name">Adult</p> -->
									</div>

									<div class="adult-btn">
										<button class="button1" type="button" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Decrement Value">-</button>
										<button class="button11 button1" type="button" onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</button>
									</div>
								</div>
								<div class="adult-box d-none">
									<div class="adult-value">
										<p id="child-data-show">0 Children</p>
										<!-- <p class="adult-name">Children</p> -->
									</div>
									<div class="adult-btn">
										<button class="button1" type="button" onclick="functiondec('#child-data','#show-target-data','#adults-data')" value="Decrement Value">-</button>
										<button class="button11 button1" type="button" onclick="functioninc('#child-data','#show-target-data','#adults-data')" value="Increment Value">+</button>
									</div>
								</div>
								<div class="pets-box d-none">
									<p class="pets-label">Pets</p>
									<div class="pets-calculator">
										<div class="pets-value">
											<label for="pets-yes">Yes</label>
											<input type="radio" id="pets-yes" name="pets" value="Yes">
										</div>
										<div class="pets-value">
											<label for="pets-no">No</label>
											<input type="radio" id="pets-no" name="pets" value="No">
										</div>
									</div>
								</div>
								<button class="main-btn  close111" type="button" onclick=""><span>Apply</span></button>
							</div>
						</div>
						<div class="col-2 md-12 sm-12 srch-btn">
							<button type="submit" class="main-btn "><span>Search</span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


			</div>
			<div class="scroll">
				<a href="#abt">
					<div class="chevron"></div>
					<div class="chevron"></div>
					<div class="chevron"></div><span class="text">Scroll down</span>
				</a>
			</div>
		</div>
	</div>
	@endif
</section>


<!-- About Section Start -->

<section class="about-us-home">
   <div class="container">
      <div class="row">
      	<div class="col-7 abt-right">
            <div class="abt-co-img" data-aos="fade-right">
               <div class="abt-co-img-left">
                 @if($data->section_image)<img src="{{asset($data->section_image)}}" class="img-fluid" alt="About us">@endif
               </div>
            </div>
         </div>
         <div class="col-5 abt-left">
            <div class="abt-cont" data-aos="fade-left">
               <div class="serv-content">
                  <div class="para">
                    {!! $data->section_desc !!}
                  </div>
                  <a href="{{url('properties')}}" class="main-btn">BOOK YOUR STAY</a>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</section> 

<!-- About Section End -->


<!-- property section Start -->
@php
$List=App\Models\Hospitable\HospitableProperty::where(["status"=>"true", "is_home"=>"true"])->orderBy("ordering","asc")->limit(3)->get();
@endphp
@if(count($List)>0)
<section class="amenities prop">
    <div class="container-fluid">
      <div class="row main propamen">
            <h2>Rental  <span>Units</span></h2>
            <p class="tag">Find spaces that suit your style</p>                                            
                <div class="row">
                  @php $i = 1; @endphp
                  @foreach($List as $c)
                  @php
                  $i1=1;
					$images = [];				   
					if($c->feature_image){
						$images = asset($c->feature_image);
					}
					$propertyImages = App\Models\Hospitable\HospitablePropertyPhoto::where("property_id",$c->id)->orderBy('order','asc')->get();			
					foreach($propertyImages as $c1){
						if($i <= 6){
							$images[] = $c1['url'];
						}				
						$i1++; 
					}			
					$address = json_decode($c->address_object, true);	
					$price = '';
					if($c->price){
						$price = $c->price;
					}
					$priceData = App\Models\Hospitable\HospitablePropertyDate::where(['property_id'=> $c->id,"date"=> date('y-m-d')])->first();
					if($priceData){
						$price = $priceData->price_formatted;
					}
                  if($i++ <3 ){
                  @endphp      
                  <div class="col-lg-3 col-md-4 col-12 am" data-aos="fade-right" data-aos-duration="1500">
                   <div class="prop-image"> 
                    @if($c->feature_image)
                    <a
							href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img
								src="{{asset($c->feature_image)}}" alt></a>
                      
                    @else
                      @isset($images)
                      <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">
                        <img src="{{$images[0]}}" alt="{{$c1->public_name ?? ''}}"></a>
                      @endisset
                    @endif
                    </div>
                   
                    <h4>{{$c->public_name ?? $c->name}}</h4>
                    <div class="anchor">
                      <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><span>{{ $price}}/ night </span></a>
                      <div class="anchor-star" > <i class="fa-solid fa-star"></i> 5.0 </div>
                    </div>
                  </div>
        
                  @php }else{ @endphp
        
        				<div class="col-lg-6 col-md-4 col-12 am" data-aos="fade-right" data-aos-duration="1500">
                             <div class="prop-image"> 
                              @if($c->feature_image)
                              <a
                                      href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img
                                          src="{{asset($c->feature_image)}}" alt></a>

                              @else
                              @isset($images)
                              <a
                                      href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">
                                <img src="{{$images[0]}}" alt="{{$c1->public_name  ?? ''}}"></a>
                              @endisset
                              @endif
                              </div>

                              <h4>{{$c->public_name ?? $c->name}}</h4>
                              <div class="anchor">
                                <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><span>{{ $price}}/ night </span></a>
                                <div class="anchor-star" > <i class="fa-solid fa-star"></i> 5.0 </div>
                              </div>
                            </div>

                  @php  } @endphp
                  @endforeach
                  
           
      
        </div>        
     @php
    $List=App\Models\Hospitable\HospitableProperty::where(["status"=>"true", "is_home"=>"true"])->orderBy("ordering","asc")->skip(3)->take(3)->get();
    @endphp
        <div class="row mt-3">
                 @php $i2 = 1; @endphp
                  @foreach($List as $c)
                  @php
                  $i1=1;
					$images = [];
					$rightImage=[];    
					if($c->feature_image){
						$images = asset($c->feature_image);
					}
					$propertyImages = App\Models\Hospitable\HospitablePropertyPhoto::where("property_id",$c->id)->orderBy('order','asc')->get();			
					foreach($propertyImages as $c1){
						if($i1 <= 6){
							$images[] = $c1['url'];
						}				
						$i++; 
					}			
					$address = json_decode($c->address_object, true);	
					$price = '';
					if($c->price){
						$price = $c->price;
					}
					$priceData = App\Models\Hospitable\HospitablePropertyDate::where(['property_id'=> $c->id,"date"=> date('y-m-d')])->first();
					if($priceData){
						$price = $priceData->price_formatted;
					}
                  if($i2++ <2 ){					
                  @endphp      
                  <div class="col-lg-6 col-md-4 col-12 am" data-aos="fade-right" data-aos-duration="1500">
                   <div class="prop-image"> 
                    @if($c->feature_image)
                    <a
							href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img
								src="{{asset($c->feature_image)}}" alt></a>
                      
                    @else
                      @isset($images)
                      <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">
                        <img src="{{$images[0]}}" alt="{{$c->public_name ?? ''}}"></a>
                      @endisset
                    @endif
                    </div>
                   
                    <h4>{{$c->public_name ?? $c->name}}</h4>
                    <div class="anchor">
                      <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><span>{{ $price }}/ night </span></a>
                      <div class="anchor-star" > <i class="fa-solid fa-star"></i> 5.0 </div>
                    </div>
                  </div>
        
                  @php }else{ @endphp
        
        				<div class="col-lg-3 col-md-4 col-12 am" data-aos="fade-right" data-aos-duration="1500">
                             <div class="prop-image"> 
                              @if($c->feature_image)
                              <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img
                                          src="{{asset($c->feature_image)}}" alt></a>

                              @else
                              @isset($images)
                              <a
                                      href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">
                                <img src="{{$images[0]}}" alt="{{$c->public_name ?? ''}}"></a>
                              @endisset
                              @endif
                              </div>

                              <h4>{{$c->public_name ?? $c->name}}</h4>
                              <div class="anchor">
                                <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><span>{{ $price }}/ night </span></a>
                                <div class="anchor-star" > <i class="fa-solid fa-star"></i> 5.0 </div>
                              </div>
                            </div>

                  @php  } @endphp
                  @endforeach                
            </div>
        </div>
    </div>
</section>
@endif
<!-- property section End -->

<!-- Book Entire Compound Section Start -->
@php 
  $list1=App\Models\Hospitable\HospitableProperty::where(["status"=>"true","is_featured" =>"true"])->orderby('id')->first();
  $i=1;
	$images = [];	 
	if($c->feature_image){
		$images = asset($c->feature_image);
	}
	$propertyImages = App\Models\Hospitable\HospitablePropertyPhoto::where("property_id",$list1->id)->orderBy('order','asc')->get();			
	foreach($propertyImages as $c1){
		if($i <= 6){
			$images[] = $c1['url'];
		}				
		$i++; 
	}			
	$address = json_decode($list1->address_object, true);	
	$price = '';
	$priceData = App\Models\Hospitable\HospitablePropertyDate::where(['property_id'=> $list1->id,"date"=> date('y-m-d')])->first();
	if($priceData){
		$price = $priceData->price_formatted;
	} 
 @endphp  
 @if($list1)                            
   <section class="book-entire-compound">
    <div class="container">
      <div class="row">
            <div class="bkimage-sec col-lg-6" data-aos="fade-right" data-aos-duration="1500">                            
              <div class="about_img" >
				<img src="{{ asset('front/images/aj-book.png') }}" alt="">
              <!-- <div style="padding:56.25% 0 0 0;position:relative;">
                <iframe src="https://player.vimeo.com/video/{{ $data->book_compound_video }}?autoplay=1&loop=1&muted=1&title=0&background=1"
                        frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture"
                        style="position:absolute; top:0; left:0; width:100%; height:100%;"
                        title="Plan the Ultimate Group Getaway at Sol &amp; Santosha"
                        allowfullscreen>
                </iframe>
               </div> -->

         
                
                
 <!--<iframe
  width="100%"
  height="400"
  src="{{ $list1->youtube_iframe_link }}"
  title="YouTube video player"
  frameborder="0"
  allow="autoplay; encrypted-media; clipboard-write"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>  -->
                
                <!--
                @if($list1->feature_image)
                <a
                   href="{{ url($list1->seo_url).'?'.http_build_query(request()->all()) }}"><img  class="img-fluid"
                                                                                             src="{{asset($c->feature_image)}}" alt></a>
                @else
                @isset($images)
                <a
                   href="{{ url($list1->seo_url).'?'.http_build_query(request()->all()) }}"><img  class="img-fluid"
                                                                                             src="{{$images[0]}}" alt="{{ $list1->public_name ?? ''}}"></a>
                @endisset
                @endif
                -->
              </div>
              
        </div>
        
            <div class="content-sec col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="about_content">
                    <div>
                        <h5><a href="{{ url($list1->seo_url) }}" > BOOK {{$list1->public_name ??  $list1->name}} </a></h5>
                      <!--<p class="sm-p" >{{$list1->summary}}</p> -->
                         <p class="sm-p" >{!!$data->mediumDescription!!}</p>
                      <a href="{{ url($list1->seo_url) }}" class="bk-btn main-btn"> {{ $price }}/ night </a>
                      
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>
@endif

@php $list=App\Models\Service::orderBy("id","desc")->limit(10)->get();@endphp
@if(count($list)>0)
<!-- Book Entire Compound Section End -->
<section class="attractionlist">
	<div class="container-fluid">
      <div class="head-sec">
			<h2>PERFECT FOR GROUP GETAWAYS AND RETREATS </h2>
		</div>
		<div class="owl-carousel" id="studio-slider" data-aos="fade-up">
			@foreach($list as $c)
                <div class="item">
                   <div class="attr-card-sec">
                      <div class="pro-img">
                         <img src="{{ asset($c->image)}}" alt="" class="img-fluid pro-img">
                      </div>
                      <div class="pro-content">
                         <h4>{{$c->name}}</h4>
                         <p> {{ $c->description }}</p>
                      </div>
                   </div>
                </div>
          @endforeach
          
                           
            
		</div>
	</div>
</section>
@endif
<!-- Gallery Section Start -->
       
@php
$galleryList = App\Models\HomeGallery::orderByRaw('ISNULL(ordering), ordering ASC')
    ->take(10)
    ->get();
@endphp
          


<section class="gallery-section">
    <div class="container">
        <div class="head-sec">
            <h2>Our Gallery</h2>
        </div>

        <!-- Nav Tabs -->
        <div class="gallery-info">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#interior">Interior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#campground">Campground</a>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content mt-4">

            <!-- All Tab -->
            <div id="all" class="container tab-pane active">
              @php
                  $interiorImages = App\Models\HomeGallery::where('type', 'Interior')->orderBy('id', 'desc')->take(4)->get();
                  $campgroundImages = App\Models\HomeGallery::where('type', 'Campground')->orderBy('id')->take(4)->get();
                  $galleryItems = $interiorImages->merge($campgroundImages);
              @endphp
                <div class="owl-carousel owl-theme">
                    @foreach($galleryItems as $item)
                        <div class="item mx-2">
                            <div class="gall_slide_img">
                                <img src="{{ asset($item->image) }}" select-type="{{ $item->type }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Interior Tab -->
            <div id="interior" class="container tab-pane fade">
                <div class="owl-carousel owl-theme">
                    @foreach(App\Models\HomeGallery::where("type","Interior")->orderBy('id', 'desc')->take(8)->get() as $item)
                        <div class="item mx-2">
                            <div class="gall_slide_img">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Campground Tab -->
            <div id="campground" class="container tab-pane fade">
                <div class="owl-carousel owl-theme">
                    @foreach(App\Models\HomeGallery::where("type","Campground")->orderBy('id')->take(8)->get() as $item)
                        <div class="item mx-2">
                            <div class="gall_slide_img">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- View More Button -->
        <div class="gallery-btn text-center mt-5">
            <a href="{{ url('galleries') }}" class="main-btn gallery-btn">View More</a>
        </div>
    </div>
</section>




<section class="gallery-section d-none">
  <div class="container">
    <div class="head-sec">
      <h2>Our Gallery</h2>
    </div>

    <div class="gallery-info">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#all">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#interior">Interior</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#campground">Campground</a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="all" class="container tab-pane active"><br>
          <div class="row" id="gallery-all">
            <!-- Wrap each image in .gall-img-wrapper -->
             @foreach(App\Models\HomeGallery::orderBy('id')->take(8)->get() as $c)
            <div class="gall-img-wrapper col-lg-4 col-md-4 col-12">
              <div class="gall-img">
                <a href="{{asset($c->image)}}" data-fancybox="images">
                  <img src="{{asset($c->image)}}" alt="gallery">
                </a>
              </div>
            </div>
            @endforeach            
          </div>

          <div class="text-center mt-4">
            <a href="javascript:void(0)" class="main-btn" id="loadMore">View more</a>
          </div>
        </div>

        <!-- Add other tabs content here -->
        <div id="interior" class="container tab-pane fade"><br>
          <div class="row">
             @foreach(App\Models\HomeGallery::where("type","Campground")->orderBy('id')->take(8)->get() as $c)
            <div class="col-lg-4 col-md-4 col-12 gall-img-wrapper">
              <div class="gall-img">
                <a href="{{asset($c->image)}}" data-fancybox="images">
                  <img src="{{asset($c->image)}}" alt="gallery">
                </a>
              </div>
            </div>
            @endforeach           
          </div>
        </div>

        <div id="campground" class="container tab-pane fade"><br>
          <div class="row">
             @foreach(App\Models\HomeGallery::where("type","Interior")->orderBy('id')->take(8)->get() as $c)
            <div class="col-lg-4 col-md-4 col-12 gall-img-wrapper">
              <div class="gall-img">
                <a href="{{asset($c->image)}}" data-fancybox="images">
                  <img src="{{asset($c->image)}}" alt="gallery">
                </a>
              </div>
            </div>
             @endforeach              
          </div>
        </div>
      </div>
    </div>
    </div>
</section>


<!-- Gallery Section End -->


<!-- Testimonial Section Start -->

@php
$list=App\Models\Testimonial::where("status","true")->orderBy("stay_date","desc")->get();
@endphp
@if(count($list)>0)
<section class="testimonial ">
 <div class="container">
  <h2>What people <span>Think About Us</span></h2>

  <div class="testi-carou ">
    <!-- Carousel -->
    <div class="owl-carousel owl-theme testi-owl">
    @foreach($list as $c)
      <!-- Testimonial 1 -->
      <div class="item">
        <div class="card p-4">
          <div class="testi-disp">
            <div class="text-warning">★★★★★</div>
            <small class="text-muted">{{  date('d M, Y', strtotime($c->stay_date)) }}</small>
          </div>
		  <div class="ser-para short">
        <p class="mt-3 text-muted">{{$c->message}}</p>
</div>
<a href="javascript:void(0);" class="toggle-btn">Show more <i class="fa-solid fa-chevron-down"></i></a>
    
          <div class="testi-disp-ant">
            @if($c->image)
            <img src="{{ asset($c->image)}}" alt="Ray" class="rounded-circle me-3" width="50" height="50">
            @else
            <img src="{{ asset('front')}}/images/no-image.webp" alt="Ray" class="rounded-circle me-3" width="50" height="50">
          	@endif
            <div class="text-start">
              <strong>{{$c->name}}</strong><br>
              <small class="text-muted">{{$c->position}}</small>
            </div>
          </div>
        </div>
      </div>
     	@endforeach
      <!-- Testimonial 2 -->
      
      <!-- Add more items as needed -->

    </div>

    <!-- View All Button -->
    <div class="more-testi">
      <a href="{{ url('reviews') }}" class=" main-btn">View All</a>
    </div>
  </div>
</div>

</section>
@endif
  
 
  
@php $list=App\Models\OurClient::orderBy("id","desc")->get();@endphp
@if(count($list)>0)
<section class="services-section">
	<div class="container">
		<div class="row">
			@foreach($list as $c)
			<div class="col-6 col-md-4 col-lg-3">
				<div class="service-info">
					<img src="{{ asset($c->icon)}}" alt>
					<h5>{{$c->title}}</h5>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif



<!-- slider section -->


<!--<section class="gallery">
	<div class="row">
		<div class="col-12 p-0"  data-aos="zoom-in" data-aos-duration="1500">
			<div class="owl-carousel owl-theme gallery-owl">
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9e4e6802.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9d7d890c.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9d1c3bb3.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9ccbfe9f.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9c5c0864.jpg" alt="pinny">				</div>
								
			</div>
		</div>
	</div>
	<div class="row mt-3 ">
		<div class="col-12 p-0"  data-aos="zoom-in" data-aos-duration="1500">
			<div class="owl-carousel owl-theme gallery-owl2">
			   				<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9be36669.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae98d20c2f.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9a21c685.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9ad238e7.jpg" alt="pinny">				</div>
								<div class="items">
					<img src="https://aj.webdesignvrvr.com/uploads/galleries/675ae9d7d890c.jpg" alt="pinny">				</div>
									
			</div>
		</div>
	</div>
</section>-->


<section class="events-section d-none" >

  <div class="container">
    
    <div class="head-sec">
			<h2>PERFECT FOR GROUP GETAWAYS AND RETREATS </h2>
		</div>
    
    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-md-4" data-aos="fade-right" data-aos-duration="1500">
        <div class="card bg-transparent border-0 text-center">
          <img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/d4b158cb-d7fc-41dd-8bb3-8f3c47849eab/imresizer-1726481090883.jpg?format=500w" class="card-img-top " alt="Amy Cline">
          <div class="card-body">
            <h6 class="mb-0">WELLNESS RETREATS</h6>
            <small>Our wellness retreats offer serene spaces for yoga, meditation, and spiritual growth. Whether you’re looking for a solo retreat or organizing a group event, our glamping tents and natural setting are perfect for mindfulness and healing.</small>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4" data-aos="fade-down" data-aos-duration="1500">
        <div class="margin card bg-transparent border-0 text-center">
          <img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/72582aca-ba73-4bdf-9238-98bac5746545/0.png?format=500w" class="card-img-top " alt="Ashley Neal">
          <div class="card-body">
            <h6 class="mb-0">COMMERCIAL PRODUCTIONS</h6>
            <small>Dreaming of a breathtaking backdrop for your next commercial production? With the rugged beauty of the desert and vast star-lit skies, our compound provides a natural, versatile space.</small>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4" data-aos="fade-left" data-aos-duration="1500">
        <div class="card bg-transparent border-0 text-center">
          <img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/0205c2df-1991-46bf-8387-a1fce4cf8dc7/Ranger+Station-7.jpg?format=500w" class="card-img-top bradius" alt="Dallas Vivier">
          <div class="card-body">
            <h6 class="mb-0">GROUP WEEKENDERS</h6>
            <small>Celebrate your special day in the heart of nature! Whether it’s an intimate gathering or a lively celebration, we create memorable experiences for birthdays. Picture lantern-lit dinners, starry nights, and a cozy outdoor setting.</small>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-4" data-aos="fade-right" data-aos-duration="1500">
        <div class="card bg-transparent border-0 text-center">
          <img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/2cee7981-5ca4-4b94-9fa8-4423bed45655/000399150002.jpg?format=500w" class="card-img-top bradius" alt="Sara Colella">
          <div class="card-body">
            <h6 class="mb-0">TEAM RETREATS</h6>
            <small>Break away from the office and immerse your team in a productive yet relaxing retreat. Our nature-inspired setting fosters creativity, collaboration, and rejuvenation. Perfect for team-building exercises, strategic planning sessions.</small>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="margin card bg-transparent border-0 text-center">
          <img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/93613179-47ac-4fc9-831b-ba8846132257/DSCF1383.jpg" class="card-img-top " alt="Theresa Wiles">
          <div class="card-body">
            <h6 class="mb-0">FAMILY GATHERINGS</h6>
            <small>Reconnect with loved ones in a space designed for togetherness. Whether it’s a family reunion or just a weekend getaway, Sol & Santosha offers the perfect backdrop for laughter, shared stories, and relaxation.</small>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-4" data-aos="fade-left" data-aos-duration="1500">
        <div class="card bg-transparent border-0 text-center">
          <img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/6e7c20eb-610d-4853-9126-c82c27a8f380/Leaving+Ceremony-8.jpg?format=500w" class="card-img-top " alt="Brian Fiedler">
          <div class="card-body">
            <h6 class="mb-0">SMALL WEDDINGS</h6>
            <small>Dreaming of an intimate wedding surrounded by nature? Sol & Santosha provides a stunning, natural venue for small, magical ceremonies. From the rustic elegance of the desert, your special day will feel both intimate and extraordinary.</small>
          </div>
        </div>
      </div>

    </div>
  </div>

</section>

<!-- Event section End -->



<!-- property section -->


<!--
<section class="reviews-section" id="rvws">
	<div class="container-fluid">
		<div class="head-sec">
			<h2>Our properties</h2>
		</div>
		<div class="owl-carousel" id="review-slider">
			<div class="item">
				<div class="reviews-list">
					<img
						src="https://hotellerv5.b-cdn.net/resort/wp-content/uploads/sites/7/2018/09/edelle-bruton-PJNO2sLlbB8-unsplash-700x466.jpg"
						alt>
					<div class="main-class-room">
						<div>
							<h3><a href>Star Dream</a></h3>
							<div class="span-price">
								<span>55</span>
								<span>m2</span>
								<span>/ &nbsp;</span>
								<span>3 Aults</span>
								<span>1 Cildren</span>
							</div>
						</div>
						<div class="price-div">
							<span>From</span>
							<span class="price">$99/Night</span>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="reviews-list">
					<img
						src="https://hotellerv5.b-cdn.net/resort/wp-content/uploads/sites/7/2018/09/edelle-bruton-PJNO2sLlbB8-unsplash-700x466.jpg"
						alt>
					<div class="main-class-room">
						<div>
							<h3><a href>Ranger Station</a></h3>
							<div class="span-price">
								<span>55</span>
								<span>m2</span>
								<span>/ &nbsp;</span>
								<span>3 Aults</span>
								<span>1 Cildren</span>
							</div>
						</div>
						<div class="price-div">
							<span>From</span>
							<span class="price">$250/Night</span>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="reviews-list">
					<img
						src="https://hotellerv5.b-cdn.net/resort/wp-content/uploads/sites/7/2018/09/edelle-bruton-PJNO2sLlbB8-unsplash-700x466.jpg"
						alt>
					<div class="main-class-room">
						<div>
							<h3><a href>Bunk House</a></h3>
							<div class="span-price">
								<span>55</span>
								<span>m2</span>
								<span>/ &nbsp;</span>
								<span>3 Aults</span>
								<span>1 Cildren</span>
							</div>
						</div>
						<div class="price-div">
							<span>From</span>
							<span class="price">$99/Night</span>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="reviews-list">
					<img
						src="https://hotellerv5.b-cdn.net/resort/wp-content/uploads/sites/7/2018/09/edelle-bruton-PJNO2sLlbB8-unsplash-700x466.jpg"
						alt>
					<div class="main-class-room">
						<div>
							<h3><a href>Lil Miss Daisy</a></h3>
							<div class="span-price">
								<span>55</span>
								<span>m2</span>
								<span>/ &nbsp;</span>
								<span>3 Aults</span>
								<span>1 Cildren</span>
							</div>
						</div>
						<div class="price-div">
							<span>From</span>
							<span class="price">$99/Night</span>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="reviews-list">
					<img
						src="https://hotellerv5.b-cdn.net/resort/wp-content/uploads/sites/7/2018/09/edelle-bruton-PJNO2sLlbB8-unsplash-700x466.jpg"
						alt>
					<div class="main-class-room">
						<div>
							<h3><a href>Sun Ray</a></h3>
							<div class="span-price">
								<span>55</span>
								<span>m2</span>
								<span>/ &nbsp;</span>
								<span>3 Aults</span>
								<span>1 Cildren</span>
							</div>
						</div>
						<div class="price-div">
							<span>From</span>
							<span class="price">$99/Night</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>-->

<!--  

<section class="full-sec">
	<div class="container-fluid px-0">
		<div class="row">
			<div class="col-6 px-0">
				<div class="left-img">
					<div class="cont-box">
						<h4>STAY IN JOSHUA TREE – FROM AIRSTREAMS TO LUXURY CABINS</h4>
						<p>Sol and Santosha offers the best accommodations in Joshua Tree,
							blending luxury with nature. Whether you're looking for the best glamping
							experience in Joshua Tree, or searching for a peaceful cabin near the
							park, we have it all.

							Our air-conditioned Airstreams, fully equipped cabins, and desert domes
							are perfect for couples, families, or group retreats</p>
						<div>
							<a href="{{ url('about-us') }}" class="main-btn">BOOK YOUR STAY</a>
						</div>
					</div>

				</div>
			</div>
			<div class="col-6 px-0">
				<div class="right-img">
					<div class="cont-box">
						<h4>BOOK ENTIRE COMPOUND</h4>
						<p>Events, Retreats, Weddings, & More for Large Groups

							Joshua Tree Village Campground offers a peaceful 9-acre retreat with six
							unique spaces, featuring 20 beds and 7 baths.

							Perfect for yoga and meditation retreats, reunions, artist gatherings, or
							simply exploring the hi-desert with friends, this one-of-a-kind
							destination can host groups of up to 22+ guests. Experience Joshua Tree
							your way!</p>
						<a href="{{ url('joshua-tree-1#property-list-data') }}"
							class="main-btn">$750/ night</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about-us-home">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-7 abt-right p-0">
				<div class="abt-co-img" data-aos="fade-right">
					<div class="abt-co-img-left">
						<img src="{{asset($data->section_image)}}" class="img-fluid" alt>
					</div>
				</div>
			</div>
			<div class="col-5 abt-left">
				<div class="abt-cont" data-aos="fade-down">
					<div class="serv-content">
						<div class="para">
							{!! $data->section_desc ?? ''!!}
						</div>
						<div class="book_btn_about">
							<a href="{{ url('about-us') }}" class="main-btn">BOOK YOUR STAY</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
@php $i=0;
$List=App\Models\Guesty\GuestyProperty::where(["status"=>"true","active"=>1,"is_home"=>"true"])->orderBy("ordering","asc")->get();
@endphp
@if(count($List)>0)
<section class="property-list">
	<div class="container-fluid">
		<div class="row">
			@foreach($List as $c)
			@php
			$picture=json_decode($c->picture,true);
			$pictures=json_decode($c->pictures,true);
			if($pictures){
			if(count($pictures)>0){
			$picture=$pictures[0];
			}
			}
			$prices=json_decode($c->prices,true);
			$address=json_decode($c->address,true);
			@endphp
			<div class="col-2">
				<div class="pro-list" data-aos="fade-up">
					<div class="pro-img">
						@if($c->feature_image)
						<a
							href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img
								src="{{asset($c->feature_image)}}" alt></a>
						@else
						@isset($picture['original'])
						<a
							href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img
								src="{{$picture['original']}}" alt="{{$picture['caption'] ?? ''}}"></a>
						@endisset
						@endif
					</div>
					<div class="pro-content">
						<h3><a href="{{ url($c->seo_url) }}">{{$c->title ?? $c->name}}</a></h3>
						<p class="pro-price">
							@isset($prices['basePrice'])
							<a href="{{ url($c->seo_url) }}">$ {{ $prices['basePrice'] }}/ night</a>
							@endisset
						</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
<section class="book-compound d-none">
	<div class="container">
		<div class="row">
			<div class="col-6 compound-left">
				<div class="compound-img" data-aos="fade-right">
					<img src="{{ asset($data->image)}}" alt>
				</div>
			</div>
			<div class="col-6 compound-right">
				<div class="compound-content" data-aos="fade-left">
					<h3><span>BOOK ENTIRE COMPOUND</span></h3>
					<div class="compound-para">
						{!! $data->mediumDescription !!}
					</div>
					<a href="{{ url('joshua-tree-1#property-list-data') }}"
						class="main-btn">$750/ night</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="business"
	style="background-image:url({{ asset($data->strip_image) }})">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="box" data-aos="fade-up">
					<div class="cta-head d-none">
						<h2>{!! $data->strip_title !!}</h2>
						<div class="TextShape-node"
							data-text-attribute-id="467830d8-93c4-4a87-8466-6f8bb3881569"
							data-shape="underlineCurve" data-font-size="44" data-is-front="false"
							data-index="0"
							style="font-size: 44px; --stroke: hsla(var(--white-hsl),1); --stroke-width: 0.1em; --stroke-linecap: round; --stroke-linejoin: round; --blend: none; --opacity: undefined; opacity: 1; transform: scale(1); width: 463px; height: 63px; left: -3px; top: -3px;"><svg><path
									d="M 0,62.37 c 57.875,-1.7325000000000017 115.75,-5.354999999999983 231.5,-6.93 c 115.75,-1.5750000000000028 175.94,1.4210854715202004e-14 231.5,0.6300000000000026 c 11.112000000000023,0.12599999999999767 -8.796999999999969,1.795500000000004 -9.259999999999991,1.8900000000000006"
									vector-effect="non-scaling-stroke" stroke-dasharray="480"
									stroke-dashoffset="960"></path></svg></div>
						<div class="TextShape-node"
							data-text-attribute-id="467830d8-93c4-4a87-8466-6f8bb3881569"
							data-shape="underlineCurve" data-font-size="44" data-is-front="false"
							data-index="1"
							style="font-size: 44px; --stroke: hsla(var(--white-hsl),1); --stroke-width: 0.1em; --stroke-linecap: round; --stroke-linejoin: round; --blend: none; --opacity: undefined; opacity: 1; transform: scale(1); width: 371px; height: 63px; left: -3px; top: 55px;"><svg><path
									d="M 0,62.37 c 46.37499999999999,-1.7325000000000017 92.75,-5.354999999999997 185.5,-6.93 c 92.75,-1.5750000000000028 140.98000000000002,0 185.5,0.6300000000000026 c 8.903999999999996,0.12599999999999767 -7.049000000000035,1.795499999999997 -7.420000000000016,1.8900000000000006"
									vector-effect="non-scaling-stroke" stroke-dasharray="385"
									stroke-dashoffset="770"></path></svg></div>
						<div class="TextShape-node"
							data-text-attribute-id="467830d8-93c4-4a87-8466-6f8bb3881569"
							data-shape="underlineCurve" data-font-size="44" data-is-front="false"
							data-index="2"
							style="font-size: 44px; --stroke: hsla(var(--white-hsl),1); --stroke-width: 0.1em; --stroke-linecap: round; --stroke-linejoin: round; --blend: none; --opacity: undefined; opacity: 1; transform: scale(1); width: 227px; height: 63px; left: -3px; top: 113px;"><svg><path
									d="M 0,62.37 c 28.375000000000004,-1.7325000000000017 56.75,-5.355000000000004 113.5,-6.93 c 56.75,-1.5750000000000028 86.25999999999999,0 113.5,0.6300000000000026 c 5.4480000000000075,0.12599999999999767 -4.312999999999988,1.795500000000004 -4.539999999999992,1.8900000000000006"
									vector-effect="non-scaling-stroke" stroke-dasharray="236"
									stroke-dashoffset="472"></path></svg></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

@php $list=App\Models\Service::orderBy("id","desc")->limit(10)->get();@endphp
@if(count($list)>0)
<section class="attractionlist">
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<h2>Attractions</h2>
			</div>
			<div class="col-8">
				<div class="owl-carousel" id="studio-slider" data-aos="fade-up">

					@foreach($list as $c)
					<div class="item">
						<div class="attr-card-sec">
							<div class="pro-img">
								<img src="{{ asset($c->image)}}" alt class="img-fluid pro-img">
							</div>
							<div class="pro-content">
								<h4>{{$c->name}}</h4>
								<p>{{ $c->description }}</p>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</section>
@endif

<section class="plan-event d-none">
	<div class="container">
		<div class="row">
			<div class="col-7">
				<div class="plan-video" data-aos="zoom-in">
					<video playsinline webkit-playsinline muted autoplay
						data-poster="{{ asset('front')}}/images/thumbnail.jpeg"
						src="{{ asset($data->image_2)}}" controls></video>
				</div>
			</div>
			<div class="col-5">
				<div class="plan-content" data-aos="fade-left">
					{!! $data->longDescription !!}
					<a href="{{ url('joshua-tree-1#property-list-data') }}"
						class="main-btn">SEE OUR LOCATION GUIDE</a>
				</div>
			</div>
		</div>
	</div>
</section>

@php
$list=App\Models\Gallery::where("type",$data->id)->where("status","active")->orderBy("id","desc")->limit(10)->get();@endphp
@if(count($list)>0)
<section class="gallery-section">
	<div class="container">
		<div class="owl-carousel" id="gallery-slider" data-aos="fade-up">
			@foreach($list as $c)
			<div class="item">
				<img src="{{ asset($c->image)}}" alt>
			</div>
			@endforeach
		</div>
	</div>
</section>-->
@endif




<!--
<section class="testimonial ">
	<div class="bg-overlay"></div>
	<div class="container" data-aos="fade-up">
		<div class="head-sec">

			<h2>HEAR FROM OUR GUESTS</h2>
		</div>
		<div class="testy">
			<div class="row owl-carousel" id="test-slider">
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="https://aj.webdesignvrvr.com/front/images/t1.jpg"
									class="img-fluid" alt>
							</div>
							<div class="user-icon">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									class="img-fluid"
									alt="User">
							</div>
						</div>
						<div class="cont-sec">
							<div class="owner-img">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									alt="User">
								<h3>Samantha B.</h3>
							</div>
							<div class="review-star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
						</div>
							<div class="para less-data-testimonial common-data-testimonial">
								<p>Anna&#039;s home was welcoming and warm. We had a great spring break
									trip and enjoyed the clubhouse amenities. The neighborhood was close
									and convenient to many fun activities for the kids. Anna is a
									responsive host and always accommodating, as this was our second stay
									at one of her properties. We will be back. Thank you!</p>
							</div>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="https://aj.webdesignvrvr.com/front/images/t1.jpg"
									class="img-fluid" alt>
							</div>
							<div class="user-icon">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									class="img-fluid"
									alt="User">
							</div>
						</div>
						<div class="cont-sec">
							<div class="owner-img">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									alt="User">
								<h3>Mary A.</h3>
							</div>
							<div class="review-star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
						</div>
							<div class="para less-data-testimonial common-data-testimonial">
								<p>We had a wonderful stay in Bayside. Everything was clean and ready to
									go for our arrival. Anna was always quick to respond to questions that
									we had ( We are out of state and are not familiar with the area)
									We were in town for a wedding and it was a perfect place to relax!
									Thank you!</p>
							</div>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="https://aj.webdesignvrvr.com/front/images/t1.jpg"
									class="img-fluid" alt>
							</div>
							<div class="user-icon">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									class="img-fluid"
									alt="User">
							</div>
						</div>
						<div class="cont-sec">
							<div class="owner-img">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									alt="User">
								<h3>Jenny Lester</h3>
							</div>
							<div class="review-star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
						</div>
							<div class="para less-data-testimonial common-data-testimonial">
								<p>Anna&#039;s home was absolutely amazing! Our family had a wonderful
									time staying in this home. The weather turned out to be a disaster,
									however the house made it all better! Ping-bong, ice hockey, plenty of
									smart TVs to watch movies, space for board games, etc.; the
									entertainment was non-stop! We ran into a few small issues and Anna
									resolved them right away! She&#039;s very responsive, friendly, and
									accommodating. I&#039;m already looking forward to a follow-up
									visit!!!</p>
							</div>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="https://aj.webdesignvrvr.com/front/images/t1.jpg"
									class="img-fluid" alt>
							</div>
							<div class="user-icon">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									class="img-fluid"
									alt="User">
							</div>
						</div>
						<div class="cont-sec">
							<div class="owner-img">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									alt="User">
								<h3>Mikul</h3>
							</div>
							<div class="review-star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
						</div>
							<div class="para less-data-testimonial common-data-testimonial">
								<p>Anna property was amazing, it was great for the family and kids. A
									lot of space both 1st floor and 2nd floor. Amazing backyard space.
									Community was great peaceful and quiet. Great for walking and bike
									riding. Absolutely loved it.</p>
							</div>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="https://aj.webdesignvrvr.com/front/images/t1.jpg"
									class="img-fluid" alt>
							</div>
							<div class="user-icon">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									class="img-fluid"
									alt="User">
							</div>
						</div>
						<div class="cont-sec">
							<div class="owner-img">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									alt="User">
								<h3>Barbara M.</h3>
							</div>
							<div class="review-star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
						</div>
							<div class="para less-data-testimonial common-data-testimonial">
								<p>Anna&#039;s home was a delightful and welcoming retreat. It
									comfortably accommodated our family of 14, offering ample space with
									everything we needed and a variety of activities. We loved the
									refreshing pool, well-equipped gym, and the safe neighborhood for
									biking and walking. The proximity to beaches and nearby towns made our
									stay even more enjoyable. We&#039;re already looking forward to our
									next visit!</p>
							</div>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="https://aj.webdesignvrvr.com/front/images/t1.jpg"
									class="img-fluid" alt>
							</div>
							<div class="user-icon">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									class="img-fluid"
									alt="User">
							</div>
						</div>
						<div class="cont-sec">
							<div class="owner-img">
								<img src="https://aj.webdesignvrvr.com/front/images/no-image.webp"
									alt="User">
								<h3>Joanne K.</h3>
							</div>
							<div class="review-star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
						</div>
							<div class="para less-data-testimonial common-data-testimonial">
								<p>This is our 4th time renting from Anna, and we had a blast as usual!
									We were three families and a total of 11 people. Everyone had plenty of
									space and we loved grilling and cooking together. The kids sat at the
									kitchen island, and the grownups were at the table -- a perfect setup.
									The indoor porch was a lovely bonus to enjoy catching up and the
									occasional work zoom call. And of course, Bayside was picturesque and
									had all the extra amenities we could want, from tennis to pools to
									yoga. Anna&#039;s houses in particular always have everything -- from
									the fully stocked kitchen to the bikes and beach chairs in the garage
									to the pillows and towels in the closets. We can&#039;t wait to try
									another property next year, thank you for the memories Anna!</p>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>-->

@php
$list=App\Models\Testimonial::where("status","true")->orderBy("id","desc")->take(6)->get();
@endphp
@if(count($list)>0)
<!--Testimonial section-->
<section class="testimonial d-none">
	<div class="bg-overlay"></div>
	<div class="container" data-aos="fade-up">
		<div class="head-sec">

			<h2>HEAR FROM OUR GUESTS</h2>
		</div>
		<div class="testy">
			<div class="row owl-carousel" id="test-slider">
				@foreach($list as $c)
				<div class="item">
					<div class="test-card">
						<div class="top-text">
							<div class="test-pro">
								<img src="{{ asset('front')}}/images/t1.jpg" class="img-fluid" alt>
							</div>
							<div class="user-icon">
								@if($c->image)
								<img src="{{ asset($c->image)}}" class="img-fluid" alt="User">
								@else
								<img src="{{ asset('front')}}/images/no-image.webp" class="img-fluid"
									alt="User">
								@endif
							</div>
						</div>
						<div class="cont-sec">
							<div class="para less-data-testimonial common-data-testimonial">
								<p>{{$c->message}}</p>
							</div>
							<div class="owner-img">
								@if($c->image)
								<img src="{{ asset($c->image)}}" alt="User">
								@else
								<img src="{{ asset('front')}}/images/no-image.webp" alt="User">
								@endif
								<h3>{{$c->name}}</h3>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif

@if($data->strip_desction)
<section class="map-section d-none">
	<div class="container">
		<iframe src="{{ $data->strip_desction }}" width="100%" height="400"
			style="border:0;" allowfullscreen loading="lazy"
			referrerpolicy="no-referrer-when-downgrade" data-aos="zoom-in"></iframe>
	</div>
</section>
@endif
<section class="book-stay d-none">
	<div class="container">
		<p data-aos="fade-up">Our Properties</p>
		<h2 data-aos="fade-up">BOOK YOUR STAY</h2>
		<a href="{{ url('joshua-tree-1#property-list-data') }}" class="main-btn"
			data-aos="fade-up">Book Now</a>
	</div>
</section>
@stop
@section("css")
@parent
<link rel="stylesheet"
	href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />

<link rel="stylesheet"
	href="{{ asset('front')}}/assets/owl/owl.carousel.min.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/home.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/home-responsive.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
<link rel="stylesheet"
	href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
@stop
@section("js")
@parent
<script
	src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script src="{{ asset('front')}}/assets/owl/owl.carousel.min.js"></script>
<script src="{{ asset('front')}}/js/home.js"></script>
  
  <script src="https://fast.wistia.com/embed/medias/mfwoap4x5o.jsonp" async></script>
<script src="https://fast.wistia.com/player.js" async></script>
  
  
<script>
	var val = 0;

	function functiondec($getter_setter, $show, $cal) {
		val = parseInt($($getter_setter).val());
		if ($getter_setter === "#adults-data") {
			if (val > 1) {
				val = val - 1;
			}
		} else {
			if (val > 0) {
				val = val - 1;
			}
		}
		$($getter_setter).val(val);
		person1 = val;
		person2 = parseInt($($cal).val());
		$show_data = person1 + person2;
		$show_actual_data = $show_data + " Guests";
		if ($getter_setter == "#adults-data") {
			$($getter_setter + '-show').html(val + " Adults");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Adult");
			}
		} else {
			$($getter_setter + '-show').html(val + " Children");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Child");
			}
		}
		$($show).val($show_actual_data);
	}

	function functioninc($getter_setter, $show, $cal) {
		val = parseInt($($getter_setter).val());
		val = (val * 1) + 1;
		$($getter_setter).val(val);
		person1 = val;
		person2 = parseInt($($cal).val());
		$show_data = person1 + person2;
		$show_actual_data = $show_data + " Guests";
		$($show).val($show_actual_data);
		if ($getter_setter == "#adults-data") {
			$($getter_setter + '-show').html(val + " Adults");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Adult");
			}
		} else {
			$($getter_setter + '-show').html(val + " Children");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Child");
			}
		}
	}
</script>
<script
	src="{{ asset('datepicker') }}/node_modules/fecha/dist/fecha.min.js"></script>
<script src="{{ asset('datepicker') }}/dist/js/hotel-datepicker.js"></script>
<script>
	@php
	$new_data_blocked = LiveCart::iCalDataCheckInCheckOutCheckinCheckout(0);
	$checkin = json_encode($new_data_blocked['checkin']);
	$checkout = json_encode($new_data_blocked['checkout']);
	$blocked = json_encode($new_data_blocked['blocked']);
	@endphp
	var checkin = <?php echo $checkin;  ?>;
	var checkout = <?php echo ($checkout);  ?>;
	var blocked = <?php echo ($blocked);  ?>;

	function clearDataForm() {
		$("#start_date").val('');
		$("#end_date").val('');
	}
	(function() {
		@if(Request::get("start_date"))
		@if(Request::get("end_date"))
		$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");
		@endif
		@endif
		abc = document.getElementById("demo17");
		var demo17 = new HotelDatepicker(
			abc, {
				@if($checkin)
				noCheckInDates: checkin,
				@endif
				@if($checkout)
				noCheckOutDates: checkout,
				@endif
				@if($blocked)
				disabledDates: blocked,
				@endif
				onDayClick: function() {
					d = new Date();
					d.setTime(demo17.start);
					document.getElementById("start_date").value = getDateData(d);
					d = new Date();
					console.log(demo17.end)
					if (Number.isNaN(demo17.end)) {
						document.getElementById("end_date").value = '';
					} else {
						d.setTime(demo17.end);
						document.getElementById("end_date").value = getDateData(d);
					}
				},
				clearButton: function() {
					return true;
				}
			}
		);

		@if(Request::get("start_date"))
		@if(Request::get("end_date"))
		setTimeout(function() {
			$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");
			document.getElementById("start_date").value = "{{ request()->start_date }}";
			document.getElementById("end_date").value = "{{ request()->end_date }}";
		}, 1000);
		@endif
		@endif

	})();

	$(document).on("click", "#clear", function() {
		$("#clear-demo17").click();
	});
	x = document.getElementById("month-2-demo17");
	x.querySelector(".datepicker__month-button--next").addEventListener("click", function() {
		y = document.getElementById("month-1-demo17");
		y.querySelector(".datepicker__month-button--next").click();
	});
	x = document.getElementById("month-1-demo17");
	x.querySelector(".datepicker__month-button--prev").addEventListener("click", function() {
		y = document.getElementById("month-2-demo17");
		y.querySelector(".datepicker__month-button--prev").click();
	});

	function getDateData(objectDate) {
		let day = objectDate.getDate();
		let month = objectDate.getMonth() + 1;
		let year = objectDate.getFullYear();
		if (day < 10) {
			day = '0' + day;
		}
		if (month < 10) {
			month = `0${month}`;
		}
		format1 = `${year}-${month}-${day}`;
		return format1;
	}
	AOS.init({
  duration: 1400,
})

</script>
<script>
  $('#review-slider').owlCarousel( {
  
          loop: true,
          items: 2,
          margin: 30,
          dots: false,
          nav: false,
          autoplay: true,
          autoplayTimeout:4000,
          smartSpeed: 550,
		 stagePadding: 80,
  
    
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 2
  
        },
  
        1170: {
  
          items: 2
  
        }
  
      }
  
    });
</script>

<script>
	$(".gallery-owl").owlCarousel({
	  loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 8000,
      autoplaySpeed: 8000,
      slideTransition: 'linear',
		navText: [
			"<img src='' class='owl-nav-img left'>",
			"<img src='' class='owl-nav-img right'>",
		],
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 2,
			},
			1000: {
				items: 3,
			},
		},
	});
</script>

<script>
	$(".gallery-owl2").owlCarousel({
	  loop: true,
      margin: 10,
      rtl:true,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 9000,
      autoplaySpeed: 9000,
      slideTransition: 'linear',
		navText: [
			"<img src='' class='owl-nav-img left'>",
			"<img src='' class='owl-nav-img right'>",
		],
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 2,
			},
			1000: {
				items: 3,
			},
		},
	});
</script>
<script>
  $(document).ready(function(){
    $('.testi-owl').owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      dots: false,
      autoplay: true,
      navText: [
        '<span class="btn btn-outline-danger rounded-circle px-2 py-1">&#8249;</span>',
        '<span class="btn btn-outline-danger rounded-circle px-2 py-1">&#8250;</span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
		1000: {
				items: 2,
			}
      }
    });
  });
</script>

<script>
  $(document).ready(function(){
    // Hide all gallery items initially
    $("#gallery-all .gall-img-wrapper").hide();

    // Show first 4
    $("#gallery-all .gall-img-wrapper").slice(0, 6).show();

    // On click load more
    // $("#loadMore").click(function(){
    //   $("#gallery-all .gall-img-wrapper:hidden").slice(0, 6).slideDown();

    //   if($("#gallery-all .gall-img-wrapper:hidden").length == 0){
    //     $(this).fadeOut();
    //   }
    // });
  });
</script>
<script>
$i = 2;	
$(document).on('click','#loadMore',function(){
	$i++;
	galleryAjax($i);
});

function galleryAjax($id){
	$.ajax({
		url: "{{route('get-home-gallery-ajax')}}", // Replace with your actual route
		type: 'GET',
		data: {page:$id},
		success: function(response) {
			// $('#gallery-all').append(response.gallery);				
			const newItems = $(response.gallery); // assume response.gallery is HTML       
            newItems.hide();
            $('#gallery-all').append(newItems);
            newItems.slice(0, 6).slideDown();
			if(response.gallery == ''){
				$('#loadMore').fadeOut();
			}
		},
		error: function(xhr) {
			console.log('Error:', xhr.responseText);
		}
	});
}	
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.toggle-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const para = this.previousElementSibling;
        para.classList.toggle('short');
        if (para.classList.contains('short')) {
          this.innerHTML = 'Show more <i class="fa-solid fa-chevron-down"></i>';
        } else {
          this.innerHTML = 'Show less <i class="fa-solid fa-chevron-up"></i>';
        }
      });
    });
  });
</script>
<script>
	    $('#big').owlCarousel({
      loop: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots: false,
      nav: true,
      loop: true,
      autoplayTimeout: 4000,
      smartSpeed: 550,
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      responsive: {0: {items: 1},768: {items: 2},1170: {items: 3}}
   });
</script>
  
  <script>
$(document).ready(function () {
    // Function to initialize carousel
    function initOwlCarousel(selector) {
        $(selector).owlCarousel({
           loop: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots: false,
      nav: true,
      loop: true,
      autoplayTimeout: 4000,
      smartSpeed: 550,
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      responsive: {0: {items: 1},768: {items: 2},1170: {items: 3}}
        });
    }

    // Initialize "All" tab on page load
    initOwlCarousel('#all .owl-carousel');

    // Re-initialize when tab is shown
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // e.g., "#interior"
        var $carousel = $(target).find('.owl-carousel');

        // Check if not already initialized
        if (!$carousel.hasClass('owl-loaded')) {
            initOwlCarousel($carousel);
        }
    });
});
</script>
@stop
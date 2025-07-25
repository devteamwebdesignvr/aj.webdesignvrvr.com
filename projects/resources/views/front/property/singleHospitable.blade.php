@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("header-section")
{!! $data->header_section !!}
@stop
@section("footer-section")
{!! $data->footer_section !!}
@stop
@section("container")
@php
$currency= $data->currency ?? $setting_data['payment_currency'];
$name = $data->public_name ?? $data->name;
$bannerImage=asset('front/images/internal-banner.webp');;
if($data->banner_image){
$bannerImage=asset($data->banner_image);
}
@endphp
<div class="banner">
  <div class="c-hero__background">
    <img class="img-fluid" src="{{ $bannerImage }}" title="{{ $name }}" alt="{{ $name }}">
  </div>
  <div class="guides">
    <h1 class="c-hero__title">{{$data->public_name}}</h1>
  </div>
</div>
<div class="breadcrumb-wrap">
  <div class="container">
    <div class="breadcrumb single-breadcrumb">
      <a href="{{ url('/') }}" rel="nofollow"><i class="fa-solid fa-house"></i>Home</a>
      <span><i class="fa-solid fa-chevron-right"></i></span> {{$name}}
    </div>
  </div>
</div>
<a href="#book" class="sticky main-btn book1 book-now"><span class="button-text">BOOK NOW</span></a>
<section class="property-detail">
  <div class="container">
    <div class="upper-area">
      <h3>{{$data->public_name}}</h3>
      <div class="adr-area">
        @if($data->address_object)
        @php $address = json_decode($data->address_object);@endphp
        <h6><i class="fa-solid fa-location-dot"></i> {{$address->display ?? ''}}</h6>
        @endif
        <div class="share-area">
          <button class="main-btn share"><i class="fa-regular fa-share-from-square"></i> Share</button>
          <div class="icon-area">
            <a onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{ url($data->seo_url) }}" target="_BLANK"><i class="fab fa-facebook-f"></i></a>
            <a onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://twitter.com/share?text={{ $data->meta_title }}&amp;url={{ url($data->seo_url) }}" target="_BLANK"><i class="fa-brands fa-twitter"></i></a>
            <a onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ url($data->seo_url) }}"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
      @php
      $images = [];
      $rightImage=[];
      $leftImage=[];
      $propertyImages = App\Models\Hospitable\HospitablePropertyPhoto::where("property_id",$data->id)->orderBy('order','asc')->get();
      foreach($propertyImages as $c){
      $images[] = $c;
      }
      $i=1;
      if(count($images)>0){
      foreach($images as $img){
      if($i == 1){
      $rightImage[] = $img;
      }
      if($i >1 && $i <=5){
        $leftImage[]=$img;
        }
        $i++;
        }
        }
        @endphp
        <div class="row gallery">
        @if(isset($rightImage))
        <div class="col-6 left">
          @foreach($rightImage as $rimg)
          <a href="{{asset($rimg->url)}}" data-fancybox="gallery"> <img src="{{asset($rimg->url)}}" class="img-fluid" alt="{{$rimg->caption ?? ''}}" title="{{$rimg->caption ?? ''}}"></a>
          @endforeach
        </div>
        @endif
        <div class="col-6 right">
          <div class="row">
            @if(isset($leftImage))
            @php $i =1; @endphp
            @foreach($leftImage as $limg)
            <div class="col-6">
              <a href="{{asset($limg->url)}}" data-fancybox="gallery">
                <img src="{{asset($limg->url)}}" class="img-fluid" alt="{{$limg->caption ?? ''}}" title="{{$limg->caption ?? ''}}">
                @if($i==4)
                <button type="button" class="main-btn">Show All</button>
                @endif
              </a>
            </div>
            @endforeach
            @endif
          </div>
        </div>
        <div class="hidden-gallery">
          @if(isset($images))
          @foreach($images as $c)
          <div class="img-active"><a href="{{asset($c->url)}}" data-fancybox="gallery"> <img src="{{asset($c->url)}}" class="img-fluid" alt="{{$c->caption ?? ''}}" title="{{$c->caption ?? ''}}"></a></div>
          @endforeach
          @endif
        </div>
    </div>
  </div>
  <div class="row bottom">
    <div class="col-lg-8 col-12">
      <div class="row hosted">
        <div class="col-9">
          <h4>{{$data->heading}}</h4>
          <div class="ammenity-home">
            @if($data->capacity_max)
            <span><i class="fa-solid fa-user-group"></i> {{$data->capacity_max}} Guests</span>
            @endif
            @if($data->capacity_bathrooms)
            <span><i class="fa-solid fa-bath"></i> {{$data->capacity_bathrooms}} Baths</span>
            @endif
            @if($data->capacity_bedrooms)
            <span><i class="fa-solid fa-bed"></i> {{$data->capacity_bedrooms}} Bedrooms</span>
            @endif
            @if($data->capacity_beds)
            <span><i class="fa-solid fa-bed"></i> {{$data->capacity_beds}} Beds</span>
            @endif
          </div>
        </div>
      </div>
      <hr>
      <div class="overview">
        <h4>Overview</h4>
        <div class="overcontent">
          {!! $data->summary !!}
        </div>
        <a class="more" id="more">Show More <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; ">
            <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path>
          </svg></a>
        <a class="less" id="less">Show Less <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; ">
            <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path>
          </svg></a>
      </div>
      <hr>
      @if(isset($data->amenities_object))
      @php
      $amenitiesList = json_decode($data->amenities_object);
      @endphp
      <div class="amenities">
        <h4>Amenities</h4>
        <ul class="amenities-detail">
          @foreach(Helper::getFirstEightItems($amenitiesList) as $c)
          <li>
            <i class="fa-solid fa-check text-success"></i> {{ ucwords(str_replace('_', ' ', $c)) }}
          </li>
          @endforeach
        </ul>
        <button class="main-btn amn-btn" data-bs-toggle="modal" data-bs-target="#amn">Show all amenities</button>
        <div class="modal" id="amn">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <h4>What this place offers</h4>
                <div class="amn-area">
                  <div class="single-amenity">
                    <ul>
                      @foreach($amenitiesList as $c1)
                      <li>
                        {{ ucwords(str_replace('_', ' ', $c1)) }}
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @if($data->hospitable_calendar_widget)
      <section class="policies">
        <div class="container-fluid">
          <h2>Availability</h2>
          <div class="row">
            <div class="col-12">
              {!! $data->hospitable_calendar_widget !!}
            </div>
          </div>
        </div>
      </section>
      @endif
      @if($data->hospitable_review_widget)
      <section class="reviews">
        <div class="container-fluid">
          <div class="row">
            <div class="col-9">
              {!! $data->hospitable_review_widget !!}
            </div>
          </div>
        </div>
      </section>
      @endif
    </div>

    <div class="col-lg-4 sidebar" id="book">
      <div class='side-area'>
        <div class="get-quote">
          <div class="contact-box">
             {!! $data->hospitable_booking_widget !!} 
            <div class="text-center about-owner-section">
              <p>Or<br>Contact Owner</p>
              <p><a href="mailto:{{$data->email ?? $setting_data['email'] }}"><i class="fa-solid fa-envelope"></i> {{$data->email ?? $setting_data['email'] }}</a></p>
              <p><a href="mailto:{{$data->mobile ?? $setting_data['mobile'] }}"><i class="fa-solid fa-phone"></i> {{$data->mobile ?? $setting_data['mobile'] }}</a></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
  <!-- experience -->
  
  
  <!-- Testimonial Section Start -->

@php
$list=App\Models\Testimonial::where("status","true")->where('property_id', $data->id)->orderBy("stay_date","desc")->take(6)->get();
@endphp
@if(count($list)>0)
<section class="testimonial ">
 <div class="container">
  <h2>What people <span>think about us</span></h2>

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

  </div>
</div>

</section>
@endif
  
@php
    $ids = json_decode($data->why_stay_ids, true) ?? [];
    $whyStayItems = App\Models\WhyStayWithUs::whereIn('id', $ids)->get()->keyBy('id');
@endphp

@if(count($ids) > 0 && $whyStayItems->isNotEmpty())
    <section class="experience-sec d-none">
        <div class="experience">
            <div class="container-fluid">
                <h2>Why stay with us?</h2>
                <div class="row">
                    @foreach($ids as $id)
                        @php $c = $whyStayItems[$id] ?? null; @endphp
                        @if($c)
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="feature">
                                    <div class="img">
                                        <img src="{{ asset($c->image) }}" alt class="experience-normal">
                                        <img src="{{ asset($c->image) }}" alt class="experience-hover">
                                    </div>
                                    <div class="content">
                                        <h4>{{ $c->title }}</h4>
                                        <p>{{ $c->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

@php
    $ids = json_decode($data->accommodation_ids, true) ?? [];
    $accommodationItems = App\Models\Accommodation::whereIn('id', $ids)->get()->keyBy('id');
  
@endphp

@if(count($ids) > 0 && $accommodationItems->isNotEmpty())
  
<section class="accomodation-sec">
  <div class="accomodation">
    <div class="container">
    <div class="row">
    <div class="col-lg-4 col-12">
<img src="{{ asset(($data->faq_image)) }}" alt="">
</div>
<div class="col-lg-8 col-12">
    
  <h2>Vendor Partnerships</h2>
  
  <ul class="p-list">
    
     @foreach($ids as $id)
     @php $c = $accommodationItems[$id] ?? null; @endphp
     @if($c)
   <li>
  <p class="accomodation-title">{!! $c->question !!}</p>
  <p>{!! $c->answer !!}</p>
  </li>
    
    @endif
    @endforeach
    
    <!--
    
  <li>
  <p class="accomodation-title">Dedicated concierge</p>
  <p>You will be assigned a personal concierge, who will meticulously attend to your needs.</p>
  </li>
    
  <li>
  <p class="accomodation-title">Warm welcome</p>
  <p>Upon arrival at your villa, you’ll be personally greeted and assisted with settling in.</p>
  </li>
    
  <li>
  <p class="accomodation-title">Villa preparation</p>
  <p>Every home undergoes a cleaning and preparation process before your arrival and after your departure.</p>
  </li>
  
  <li>
  <p class="accomodation-title">Around-the-clock assistance</p>
  <p>Our devoted team is available 24/7  to offer you support. Your comfort and satisfaction are our top priorities.</p>
  </li>
    
    -->
  
  </ul>
  
  </div>
  </div>
  </div>
  </div>
  </section>
  @endif



 @if($data->map)
 <section class="location-sec">
      <div class="location">
          <div class="container-fluid">
              <h3>Our location</h3>
              <iframe src="{{$data->map}}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </div>
</section>
@endif

<section class="cont-btn-sec">
	  <div class="details-center text-center">
	<a href="{{ url('contact-us') }}" class="main-btn">Contact Us</a>
  </div>
</section>

@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-details.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-details-responsive.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/property-detail.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/property-detail-responsive.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/assets/owl/owl.carousel.min.css" />
@stop
@section("js")
@parent
<script>
  $(document).ready(function() {
    $("#book").click(function() {
      $(".days-box").css("display", "none");
    });
    $(document).on("click", ".days", function() {
      $(".days-box").toggle();
    });
    $(document).on("click", "#book>.close-date", function() {
      $(".days-box").toggle();
    });
    $(document).on("click", "#book>.days-box", function() {
      $("this").css("display", "block");
    });
    $(document).on("click", ".col-8", function() {
      $(".days-box").css("display", "none");
    });
    $(document).on("click", ".additional", function() {
      $(".days-box").css("display", "none");
    });
  });


  $(document).ready(function() {
    $("#book").click(function() {
      $(".additional-box").css("display", "none");
    });
    $(document).on("click", ".additional", function() {
      $(".additional-box").toggle();
    });
    $(document).on("click", "#book>.close-additional", function() {
      $(".additional-box").toggle();
    });
    $(document).on("click", "#book>.additional-box", function() {
      $("this").css("display", "block");
    });
    $(document).on("click", ".col-8", function() {
      $(".additional-box").css("display", "none");
    });
    $(document).on("click", ".days", function() {
      $(".additional-box").css("display", "none");
    });
  });
</script>
<script src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js"></script>
<script src="{{ asset('front')}}/js/adu-for-sale-details.js"></script>
<script src="{{ asset('front')}}/assets/owl/owl.carousel.min.js"></script>
<script>
  $(document).ready(function() {
    $('#attr-slider').owlCarousel({
      loop: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots: false,
      nav: true,
      autoplayTimeout: 3000,
      smartSpeed: 450,
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1170: {
          items: 3
        }
      }
    });
  });
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
  $(document).ready(function(){
    $('.testi-owl').owlCarousel({
      loop: false,
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
@stop
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
 $currency=$setting_data['payment_currency'];
   $name=$data->name;
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
            <h1 class="c-hero__title">{{$data->heading}}</h1>
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
                <h3>{{$data->name}}</h3>
                <div class="adr-area">
                    @if($data->address)
                      <h6><i class="fa-solid fa-location-dot"></i> {{$data->address}}</h6>
                    @endif
                    <div class="share-area">
                        <button class="main-btn share"><i class="fa-regular fa-share-from-square"></i> Share</button>
                        <div class="icon-area">
                            <a  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{ url($data->seo_url) }}" target="_BLANK"><i class="fab fa-facebook-f"></i></a>
                            <a  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://twitter.com/share?text={{ $data->meta_title }}&amp;url={{ url($data->seo_url) }}" target="_BLANK"><i class="fa-brands fa-twitter"></i></a>
                            <a  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ url($data->seo_url) }}"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row gallery">
                    <div class="col-6 left">
                        <a href="{{asset($data->feature_image)}}" data-fancybox="gallery"> <img src="{{asset($data->feature_image)}}" class="img-fluid"  alt="{{$data->caption}}"  title="{{$data->caption}}"></a>
                    </div>
                    <div class="col-6 right" >
                        <div class="row">
                             
                            @php  $i=1; @endphp
                            @foreach(App\Models\PropertyGallery::where("property_id",$data->id)->orderBy("sorting","asc")->limit(4)->skip(0)->get() as $c)
                                <div class="col-6">
                                    <a href="{{asset($c->image)}}" data-fancybox="gallery"> 
                                       <img src="{{asset($c->image)}}" class="img-fluid"  alt="{{$c->caption}}"  title="{{$c->caption}}">
                                       @if($i==4)
                                            <button type="button" class="main-btn">Show All</button>
                                       @endif
                                   </a>
                               </div>
                               @php $i++; @endphp
                            @endforeach
                         </div>
                    </div>
                    <div class="hidden-gallery">
                        @foreach(App\Models\PropertyGallery::where("property_id",$data->id)->orderBy("sorting","asc")->limit(100)->skip(4)->get() as $c)
                          <div class="img-active"><a href="{{asset($c->image)}}" data-fancybox="gallery"> <img src="{{asset($c->image)}}" class="img-fluid"  alt="{{$c->caption}}"  title="{{$c->caption}}"></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row bottom">
                <div class="col-8">
                 <div class="row hosted">
                     <div class="col-9">
                             <h4>{{$data->heading}}</h4>
                             <div class="ammenity-home">
                                 @if($data->bedroom)
                                    <span><i class="fa-solid fa-bed"></i> {{$data->bedroom}} Beds</span>
                                 @endif
                                 @if($data->bathroom)
                                    <span><i class="fa-solid fa-bath"></i> {{$data->bathroom}} Baths</span>
                                 @endif
                                 @if($data->full_bath)
                                    <span><i class="fa-solid fa-shower"></i> {{$data->full_bath}}  Outside Shower</span>
                                 @endif
                                 @if($data->sleeps)
                                    <span><i class="fa-solid fa-user-group"></i> {{$data->sleeps}} Guests</span>
                                 @endif
                            </div>
                     </div>
                 </div>   
                  <hr> 
                  <div class="overview">
                        <h4>Overview</h4>
                        <div class="overcontent">
                           {!! $data->long_description !!} 
                        </div>
                        <a class="more" id="more">Show More <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg></a>
                        <a class="less" id="less">Show Less <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg></a>
                    </div>
                    <hr>
                    @if(App\Models\PropertyAmenityGroup::where("property_id",$data->id)->where("status","true")->orderBy("sorting","asc")->limit(8)->count()>0)
                        <div class="amenities">
                          <h4>Amenities</h4>
                          <ul class="amenities-detail">
                            @foreach(App\Models\PropertyAmenityGroup::where("property_id",$data->id)->where("status","true")->orderBy("sorting","asc")->limit(8)->get() as $c)
                            <li>
                                @if($c->image)
                                    <img src="{{ asset($c->image) }}" alt="{{ $c->name }}"> 
                                @endif
                                {{ $c->name}}
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
                                    @foreach(App\Models\PropertyAmenityGroup::where(["property_id"=>$data->id,"status"=>"true"])->orderBy("sorting","asc")->get() as $c)
                                    <div class="single-amenity">
                                        <h5>{{$c->name}}</h5>
                                        <ul>
                                            @foreach(App\Models\PropertyAmenity::where(["property_amenity_id"=>$c->id,"status"=>"true"])->orderBy("sorting","asc")->get() as $c1)
                                                <li>
                                                    @if($c1->image)
                                                        <img src="{{ asset($c1->image) }}" alt="{{ $c1->name }}"> 
                                                    @endif
                                                    {{ $c1->name}}
                                                    <hr>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                 
                    @endif
          
                    </div>
                    <div class="col-lg-4 sidebar" id="book">
                        <div class='side-area'>
                            
                        <div class="error-box d-none" id="gaurav-error-show-parent">
                            <p id="gaurav-error-show-p"></p>
                        </div>
                        <div class="get-quote">
                        <div class="contact-box">
                                
                                 {!! Form::open([ "route"=>["singlePost",$data->id],"id"=>"booking_form","class"=>"form booking_form"]) !!}
                                    <input type="hidden" name="property_id" value="{{ $data->id }}">
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="text" name="first_name"   class="form-control gst" placeholder="First Name"  required> 
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="text" name="last_name"   class="form-control gst" placeholder="Last Name" > 
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="text" name="mobile"   class="form-control gst" placeholder="Phone Number"  required> 
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="email" name="email"   class="form-control gst" placeholder="Email" required > 
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ovabrw-book-now"  ><button type="submit" class="main-btn"><span> Request Quote</span></button></div>
                                        </div>
                                    </div>
                                </form>
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
            @if(App\Models\Testimonial::where("property_id",$data->id)->where("status","true")->orderBy("stay_date","desc")->count()>0)
            <hr>
            
            <div class="reviews">
                <h4>Reviews</h4>
                <div class="row rev">
                     @foreach(App\Models\Testimonial::where("property_id",$data->id)->where("status","true")->orderBy("stay_date","desc")->get() as $c)
                    <div class="col-lg-6 col-6">
                        <div class="guest-profile">
                            @if($c->image)
                                <img src="{{ asset($c->image)}}" alt="{{$data->name}}  -- {{$c->name}}" class="">
                            @else
                                <img src="{{ asset('front')}}/images/user-no.png" alt="{{$data->name}}  -- {{$c->name}}" class="">
                            @endif
                            <div class="prof">
                                <p>{{$c->name}}</p>
                                @if($c->stay_date)
                                    <span>{{date('F-d Y',strtotime($c->stay_date))}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="guest-content">
                        <p>{{$c->message}}</p>
                        </div>
                    
                    </div>
                    @endforeach
                </div>
                        <button class="main-btn rvws" id="rvws" data-bs-toggle="modal" data-bs-target="#rvw">Show all reviews</button>
                        <div class="modal" id="rvw">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                        
                              <!-- Modal body -->
                              <div class="modal-body">
                                <h4>What people think about us</h4>
                                <div class="rvw-area">
                                  @foreach(App\Models\Testimonial::where("property_id",$data->id)->where("status","true")->orderBy("stay_date","desc")->get() as $c)
                                      <div class="review-box">
                                      <div class="guest-profile">
                                          @if($c->image)
                                              <img src="{{ asset($c->image)}}" alt="{{$data->name}}  -- {{$c->name}}" class="">
                                          @else
                                              <img src="{{ asset('front')}}/images/user-no.png" alt="{{$data->name}}  -- {{$c->name}}" class="">
                                          @endif
                                          <div class="prof">
                                              <p>{{$c->name}}</p>
                                              @if($c->stay_date)
                                                  <span>{{date('F-d Y',strtotime($c->stay_date))}}</span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="guest-content">
                                      <p>{{$c->message}}</p>
                                      </div>
                                      </div>
                                      <hr>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            </div>
            @endif
            <hr>
            
@if(App\Models\Attraction::count()>0)
<div class="attraction-sec container d-none">
   <h4>Explore Attractions</h4>
   <div class="row owl-carousel" id="attr-slider">
      @foreach(App\Models\Attraction::orderBy("id","desc")->get() as $c)
      <div class="item">
         <div class="attr-card">
            <div class="pro-img">
               @if($c->image)
               <a href="{{ url('attractions/detail/'.$c->seo_url) }}">
               <img src="{{ asset($c->image) }}" class="img-fluid" alt=""> 
               </a>
               @endif
            </div>
            <a href="{{ url('attractions/detail/'.$c->seo_url) }}">
               <div class="pro-cont">
                  <h3 class="title">
                     {{$c->name}}
                  </h3>
                  <p class="txt">{{ Str::limit($c->description,200) }}</p>
               </div>
            </a>
         </div>
      </div>
      @endforeach    
   </div>
</div>
<!-- <hr> -->
@endif
            @if($data->map)
              <div class="map">
                    <h4>Where you'll be</h4>
                    <iframe src="{!! $data->map !!}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <hr>
              </div>
            @endif
            @if($data->booking_policy!="" || $data->short_description!="" || $data->cancellation_policy!="")
            <div class="policy">
                <h4>Things to know</h4>
                <div class="row">
                    @if($data->booking_policy)
                    <div class="col-lg-4 rule">
                        <div class="area">
                            <p class="main">House Rules</p>
                            {!! $data->booking_policy !!}
                        </div>
                        <a class="rul rull" id="rul" data-bs-toggle="modal" data-bs-target="#house">
                        Show More 
                        <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; ">
                        <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path>
                        </svg>
                        </a>
                        <div class="modal" id="house">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                        
                              <!-- Modal body -->
                              <div class="modal-body">
                                <h4>House Rules</h4>
                                <div class="house-area">
                                {!! $data->booking_policy !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endif
                    @if($data->short_description)
                    <div class="col-lg-4 safety">
                        <div class="area">
                            <p class="main">Safety & Property</p>
                            {!! $data->short_description !!}
                        </div>
                        <a class="rul safee" id="safe" data-bs-toggle="modal" data-bs-target="#safety">
                        Show More 
                        <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; ">
                        <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path>
                        </svg>
                        </a>
                        <div class="modal" id="safety">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                        
                              <!-- Modal body -->
                              <div class="modal-body">
                                <h4>Safety & Property</h4>
                                <div class="house-area">
                                {!! $data->short_description !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endif
                    @if($data->cancellation_policy)
                    <div class="col-lg-4 cancel">
                        <div class="area">
                            <p class="main">Cancellation policy</p>
                            {!! $data->cancellation_policy !!}
                            </div>
                            <a class="rul cancl" id="canc" data-bs-toggle="modal" data-bs-target="#cancel">
                            Show More 
                            <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; ">
                            <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path>
                            </svg>
                            </a>
                            <div class="modal" id="cancel">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                        
                              <!-- Modal body -->
                              <div class="modal-body">
                                <h4>Cancellation policy</h4>
                                <div class="house-area">
                                {!! $data->cancellation_policy !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        @endif
                </div>
            </div>
            @endif
            </div>
        </div>
</section>

@stop
@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-details.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-details-responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css"/>
    <link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
@stop 
@section("js")
    @parent
<script>
$(document).ready(function(){
     $("#book").click(function(){
        $(".days-box").css("display", "none");
      });
     $(document).on("click",".days",function(){
        $(".days-box").toggle();
      });
      $(document).on("click","#book>.close-date",function(){
        $(".days-box").toggle();
      });
      $(document).on("click","#book>.days-box",function(){
        $("this").css("display","block");
      });
      $(document).on("click",".col-8",function(){
        $(".days-box").css("display","none");
      });
       $(document).on("click",".additional",function(){
        $(".days-box").css("display","none");
      });
});
   
  
$(document).ready(function(){
     $("#book").click(function(){
        $(".additional-box").css("display", "none");
      });
     $(document).on("click",".additional",function(){
        $(".additional-box").toggle();
      });
      $(document).on("click","#book>.close-additional",function(){
        $(".additional-box").toggle();
      });
      $(document).on("click","#book>.additional-box",function(){
        $("this").css("display","block");
      });
      $(document).on("click",".col-8",function(){
        $(".additional-box").css("display","none");
      });
      $(document).on("click",".days",function(){
        $(".additional-box").css("display","none");
      });
});
</script>
<script src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js" ></script>
<script src="{{ asset('front')}}/js/adu-for-sale-details.js" ></script>
<script>
    $(document).ready(function(){
        $('#attr-slider').owlCarousel({
             loop: true,
            items: 3,
            margin: 0,
            autoplay: true,
            dots:false,
            nav:true,
            autoplayTimeout: 3000,
            smartSpeed: 450,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
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
@stop 
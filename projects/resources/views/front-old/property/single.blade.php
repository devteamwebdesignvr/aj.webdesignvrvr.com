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
@section("css")
<link href="{{asset('front/royalslider.css')}}" rel="stylesheet">
 <link href="{{asset('front/rs-defaulte166.css')}}" rel="stylesheet">
@stop

@section("container")
@php
$name=$data->name;
$bannerImage=asset('front/images/internal-banner.webp');;
if($data->banner_image){
$bannerImage=asset($data->banner_image);
}
@endphp
      
    <section class="breadcrumb" style="background-image: url({{ $bannerImage }});">
        <div class="auto-container">
            <h2 data-aos="zoom-in" data-aos-duration="1500">{{$data->heading}}</h2>
            <ul class="page-breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                <li><a href="{{ url('/') }}">Home</a></li>
                <!--<li><a href="{{ url('properties') }}">Vacation Rental</a></li>-->
                <li>/ {{$name}}</li>
            </ul>
        </div>
    </section>
<!-- end banner sec -->

<a href="#book" class="sticky main-btn book1">
<span class="button-text">BOOK NOW</span>
</a>

 <section id="property" class="padding_top padding_bottom_half">
         <div class="container">
            <div class="row first-pro">
               <div class="col-lg-8 listing1 property-details">
                  <div class="upper-box">
                     <div class="row clearfix">
                        <div class="col-lg-9 col-md-10 col-12 col-sm-12">
                           <h3 data-aos="zoom-in-right" data-aos-duration="1500">{{$name}}</h3>
                           <div class="hotel-info" data-aos="fade-up" data-aos-duration="1500"><i class="fas fa-map-marker-alt"></i>{{$data->address}}</div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-12 col-sm-12">
                           <div class="clearfix">
                              <div class="price" data-aos="zoom-in-left" data-aos-duration="1500">
                                 {!! $setting_data['payment_currency'] !!} {{$data->price}}<span>/ Night</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <ul class="food-list" data-aos="fade-up" data-aos-duration="1500">
                
                        <li><i class="fa fa-users" aria-hidden="true"></i> Sleeps {{$data->sleeps}}  </li>
                        <li><i class="fa fa-bed" aria-hidden="true"></i>   Bedrooms {{$data->bedroom}}  </li>
                        <li><i class="fa fa-bathtub" aria-hidden="true"></i>  Bathrooms {{$data->bathroom}}  </li>
                     </ul>
                     <div class="flexible pro-det">
									    <p>"Flexible Rates depending on season, demand, or length of stay."</p>
									</div>
                  </div>
                  <section class="blog-details-area ptb-90">
                     <div class="container-fluid" style="" id="calender_nrj">
                        <div class="row">
                           <div class="col-md-12 col-xs-12 col-lg-12  col-sm-12 main-content"style="padding-right: 0px;padding-left: 0px;">
                              <div  class="page wrapper main-wrapper">
                                 <div class="row clearfix">
                                    <div class="col span_6 fwImage"style="text-align: center;">
                                       <div id="gallery-1" class="royalSlider rsDefault">

                                         
                                         @foreach(App\Models\PropertyGallery::where("property_id",$data->id)->orderBy("sorting","asc")->get() as $c)
                                          <a class="rsImg"   data-rsBigImg="{{asset($c->image)}}" href="{{asset($c->image)}}">
                                          <img width="126" height="82" class="rsTmb" src="{{asset($c->image)}}" alt="{{$c->caption}}"/>
                                          <span>{{$c->caption}}</span>
                                         
                                          </a>
                                         
                         
                                        @endforeach     
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-- Slider js -->
                 <div class="property-tab">
                     <ul class="main-menu-list-in navbar-nav menu-navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#ovrvw">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#amenities">Amenities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#policies">Policies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#availability">Availability</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Reviews</a>
                    </li>
                </ul>
                 </div>
                  <div class="property_meta">
                     <div class="propert-box-sec" id="ovrvw">
                        <div class="tab-content">
                           <h3 class="heading-2" data-aos="zoom-in-right" data-aos-duration="1500">Overview</h3>
                        </div>
                        <hr class="hr">
                     </div>
                     <div class="overview-content" data-aos="fade-up" data-aos-duration="1500">
                        {!! $data->long_description !!}
                     </div>
                     <div class="cta-btn" id="more">
                        <a class="main-btn mt-4">Read More</a>
                    </div>
                    <div class="cta-btn" id="less">
                        <a class="main-btn mt-4">Read Less</a>
                    </div>
                  </div>
                  <div id="amenities" class="abouttext" style="margin-top: 30px;">
                     <div class="properties-amenities mb-30">
                        <div class="tab-content">
                           <h3 class="heading-2" data-aos="zoom-in-right" data-aos-duration="1500">Amenities</h3>
                        </div>
                        <hr class="hr">
                        @foreach(App\Models\PropertyAmenityGroup::where("property_id",$data->id)->orderBy("sorting","asc")->get() as $c)
                        <h4 style="font-size: 1.4rem;" data-aos="fade-up" data-aos-duration="1500">{{$c->name}}</h4>
                        <div class="row" data-aos="fade-up" data-aos-duration="1500">
                            @foreach(App\Models\PropertyAmenity::where("property_amenity_id",$c->id)->where("status","true")->orderBy("sorting","asc")->get() as $c1)
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <ul class="amenities">
                                 <li><i class="fa fa-check"></i> {{ $c1->name}}</li>
                              </ul>
                           </div>
                           @endforeach
                          
                        </div>
                        <hr class="hr">

                        @endforeach
                     </div>
                  </div>
                  <div id="rates" class="abouttext" style="margin-top: 30px;">
                    
                  
                     <div id="policies" class="abouttext" style="margin-top: 30px;">
                        <div class="tab-content">
                           <h3 class="heading-2" data-aos="zoom-in-right" data-aos-duration="1500">Policies</h3>
                           <hr class="hr">
                        </div>
                        
                     </div>
                     <br>
                     @if($data->cancellation_policy)
                     <h4 data-aos="fade-up" data-aos-duration="1500">Cancellation Policy</h4>
                     {!! $data->cancellation_policy !!}
                     @endif
                     @if($data->short_description)
                     <h4 data-aos="fade-up" data-aos-duration="1500">Damage and Incidentals</h4>
                     {!! $data->short_description !!}
                     @endif
                     @if($data->booking_policy)
                     <h4 data-aos="fade-up" data-aos-duration="1500">Booking Policy</h4>
                     {!! $data->booking_policy !!}
                     @endif
                     @if($data->notes)
                     <h4 data-aos="fade-up" data-aos-duration="1500">Notes</h4>
                     {!! $data->notes !!}
                     @endif
                     <p></p>
                  </div>
                  <div id="availability" class="abouttext" style="margin-top: 30px;">
                     <div class="properties-amenities mb-40">
                        <h3 class="heading-2" data-aos="zoom-in-right" data-aos-duration="1500">Availability</h3>
                        <hr class="hr">
                     </div>
                     <div class="calender">
                         <iframe src="{{ url('fullcalendar-demo/'.$data->id) }}"  width="100%" height="400" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
                    @if($data->map)
                    <div class="map" id="map">
                        <iframe src="{!! $data->map !!}" width="100%" height="600" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    @endif
                  <div id="reviews" class="abouttext" style="margin-top: 30px;">
                     <div class="inside-properties mb-50">
                        <div class="tab-content">
                           <h3 class="heading-2" data-aos="zoom-in-right" data-aos-duration="1500">Review</h3>
                        </div>
                        <hr class="hr">
                        <div class="comments" data-aos="fade-up" data-aos-duration="1500">
                           <div class="comment">
                            @foreach(App\Models\Testimonial::where("property_id",$data->id)->where("status","true")->orderBy("id","desc")->get() as $c)
                              <div class="comment-content">
                                 <div class="comment-meta">
                                    <!-- <h3 style="margin-bottom: 18px;">Wonderful house and pool</h3> -->
                                    <span style="font-size: 14px;">5/5</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                 </div>
                                 <div class="comment-meta" style="margin-top: 18px;">
                                    <h3 style="">{{$c->name}}</h3>
                                 </div>
                                 <p style="font-size: 14px;line-height: 20px;margin-top: 18px;"></p>
                                 <p>{{$c->message}}</p>
                                 <p></p>
                                 <span style="font-size: 14px;font-weight: 500;">Stayed {{date('F Y',strtotime($c->stay_date))}}</span>
                              </div>
                              <hr class="hr">
                            @endforeach


                              <section class="contact-page-section">
                                 <div class="auto-container">
                                    <!-- Sec Title -->
                                    <div class="sec-title">
                                       <h3 class="heading-2" data-aos="zoom-in-right" data-aos-duration="1500">Leave a Review</h3>
                                    </div>
                                    <div class="inner-container">
                                       <!-- Contact Form -->
                                       <div class="contact-form">
                                   
                                        {!! Form::open(["autocomplete"=>"off","route"=>"reviewSubmit","data-aos"=>"fade-up", "data-aos-duration"=>"1500"]) !!}
                                             <div class="">
                                                <div class="row clearfix">
                                                   <!-- Form Group -->
                                                   <div class="form-group col-lg-6 col-md-6">
                                                      <label>
                                                      Name *
                                                      </label>
                                                      <input type="text" name="name" placeholder="Name" required="">
                                                   </div>
                                                   <!-- Form Group -->
                                                   <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                      <label>Email *</label>
                                                      <input type="email" name="email" placeholder="Email" required="">
                                                   </div>
                                                   <!-- Form Group -->
                                                   <div class="form-group col-lg-4 col-md-4 col-sm-6">
                                                      <label>Captions  *</label>
                                                      <input type="text" name="profile" placeholder="Captions">
                                                   </div>
                                                   <div class="form-group col-lg-4 col-md-4 col-sm-6">
                                                      <label>Stay Date</label>
                                                       <input type="date"  class="datepicker123" name="stay_date" placeholder="Stay date" >
                                                        <input type="hidden" name="property_id" value="{{ $data->id }}">
                                                   </div>
                                                   <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                      <label>Rating  *</label>
                                                      <fieldset class="score">
                                                         <input type="radio" id="score-5" name="score" value="5" checked>
                                                         <label title="5 stars" for="score-5" style="font-size: 20px;">5 stars</label>
                                                         <input type="radio" id="score-4" name="score" value="4">
                                                         <label title="4 stars" for="score-4" style="font-size: 20px;">4 stars</label>
                                                         <input type="radio" id="score-3" name="score" value="3">
                                                         <label title="3 stars" for="score-3" style="font-size: 20px;">3 stars</label>
                                                         <input type="radio" id="score-2" name="score" value="2">
                                                         <label title="2 stars" for="score-2" style="font-size: 20px;">2 stars</label>
                                                         <input type="radio" id="score-1" name="score" value="1">
                                                         <label title="1 stars" for="score-1" style="font-size: 20px;">1 stars</label>
                                                      </fieldset>
                                                   </div>
                                                   <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                      <label>Review *</label>
                                                      <textarea class="" required name="message" placeholder="Review"></textarea>
                                                   </div>
                                                   <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                      <button type="submit" class="main-btn" name="reviewsubmit"><span class="txt">Submit Review</span></button>
                                                   </div>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4" id="book">
                  <div class="elementor-widget-container get-quote">
                     <div class="forms-booking-tab">
                        <ul class="tabs">
                           <li class="item booking active" data-form="ovabrw_booking_form">Quote Details</li>
                        </ul>
                        <div class="ovabrw_booking_form ovabrw-booking romancy-booking" id="ovabrw_booking_form" style="">
                           
                            @php $days_gaurav=Helper::getWeekNameSelect();@endphp
                             {!! Form::open(["class"=>"form booking_form" ,"id"=>"booking_form","url"=>"get-quote","method"=>"get"]) !!}

                             <input type="hidden" name="property_id" value="{{ $data->id }}">

                              <div class="ovabrw-container wrap_fields">
                                 <div class="ovabrw-row">
                                    <div class="wrap-item two_column">
                                       <!-- Display Booking Form -->
                                       <div class="rental_item">
                                          <!--  <label>
                                             Check in    </label> -->
                                          <div class="ovabrw_datetime_wrapper">
                                          
                                             {!! Form::text("start_date",Request::get("start_date"),["required","autocomplete"=>"off","inputmode"=>"none","id"=>"txtFrom","placeholder"=>"Check in"]) !!}
                                             <i class="fa-solid fa-calendar-days"></i>
                                          </div>
                                          <label class="text-danger" style="font-size: 11px;">Check-in Day: {{ $days_gaurav[$data->checkin_day] ?? '' }}</label>
                                       </div>
                                       <div class="rental_item">
                                          <!-- <label>
                                             Check out   </label> -->
                                          <div class="ovabrw_datetime_wrapper">
                                             {!! Form::text("end_date",Request::get("end_date"),["required","autocomplete"=>"off","inputmode"=>"none","id"=>"txtTo","placeholder"=>"Check Out"]) !!}
                                             <i class="fa-solid fa-calendar-days"></i>
                                          </div>
                                          <label class="text-danger" style="font-size: 11px;">Check-out Day: {{ $days_gaurav[$data->checkout_day] ?? '' }}</label>
                                       </div>
                                             <div class="ovabrw_service_wrap row"   style="{{ ModelHelper::showPetFee($data->pet_fee) }} " >
                                                 <!--<div class="col-md-12" style="text-align: left;padding-top: 15px;color: #02c3ff;">-->
                                                     <!--<label>No. of Pet</label>-->
                                                 <!--</div>-->
                                                 <div class="col-md-12 pets" style="">
                                                     {!! Form::selectRange("no_of_pets",1,$data->max_pet,null,["class"=>"form-control","style"=>"border: 1px solid #cacaca;margin-top: 0px;","id"=>"pet_fee_data_guarav","placeholder"=>"Pets"]) !!}
                                                     <i class="fa-solid fa-paw"></i>
                                                 </div>
                                             </div>
                                             <div class="ovabrw_service_wrap row"   style="{{ ModelHelper::showpoolFee($data->heating_pool_fee) }} " >
                                                 <div class="col-md-12" style="text-align: left;padding-bottom: 15px;color: #02c3ff;">
                                                     <label>Heated Swimming Pool Fee</label>
                                                 </div>
                                                 <div class="col-md-12 pets" style="">
                                                     {!! Form::select("heating_pool_fee",["Yes"=>"Yes","No"=>"No"],null,["class"=>"form-control","style"=>"border: 1px solid #cacaca;margin-top: 0px;","id"=>"heating_pool_fee_data_guarav"]) !!}
                                                     <i class="fa-sharp fa-solid fa-person-swimming"></i>
                                                 </div>
                                             </div>
                                             
                                             
                                       <div class="ovabrw_service_wrap">
                                           <!--<label>-->
                                           <!--  Guests  -->
                                           <!--  </label> -->
                                       
                                          <div class="row ovabrw_service">
                                             <div class="ovabrw_service_select rental_item">
                                                <input type="text" name="Guests" required value="{{ Request::get('Guests') ?? '' }}" readonly class="form-control gst" id="show-target-data" placeholder="Guests">
                   
                                                <i class="fa-solid fa-users "></i>
                                                <input type="hidden" value="{{ Request::get('adults') ?? '0' }}" name="adults" id="adults-data" />
                                                <input type="hidden" value="{{ Request::get('child') ?? '0' }}" name="child" id="child-data" />
                                                <div class="adult-popup">
                    	                          <div class="modal-bodyss" id="guestsss">
                    	                          		<p class="close1" onclick=""><i class="fa fa-times"></i></p>
                    	                               <div class="ac-box">
                    	                                  <div class="adult">
                    	                                     <span id="adults-data-show">
                    	                                         @if(Request::get('adults'))
                    	                                            @if(Request::get('adults')>1)
                    	                                                {{ Request::get('adults') }} Adults
                    	                                            @else
                    	                                                {{ Request::get('adults') }} Adult
                    	                                            @endif
                    	                                         @else
                    	                                         Adult
                    	                                         @endif
                    	                                     </span>
                    	                                     <p>(18+)</p>
                    	                                  </div>
                    	                                  <div class="btnssss">
                    	                                     <div class="button button1 btnnn" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Increment Value">-</div>  
                    	                                     <div class="button11 button1" onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</div>
                    	                                  </div>
                    	                               </div>
                    	                                <div class="ac-box">
                    	                                  <div class="adult">
                    	                                     <span id="child-data-show">
                    	                                          @if(Request::get('adults'))
                    	                                            @if(Request::get('adults')>1)
                    	                                                {{ Request::get('adults') }} Children
                    	                                            @else
                    	                                                {{ Request::get('adults') }} Child
                    	                                            @endif
                    	                                         @else
                    	                                         Child
                    	                                         @endif
                    	                                     </span>
                    	                                     <p>(0-17)</p>
                    	                                  </div>
                    	                                  <div class="btnssss btnsss">
                    	                                     <div class="button button1" onclick="functiondec('#child-data','#show-target-data','#adults-data')" value="Increment Value">-</div> 
                    	                                     <div class="button11 button1" onclick="functioninc('#child-data','#show-target-data','#adults-data')" value="Increment Value">+</div>
                    	                                  </div>
                    	                               </div>
                    	                               <button type="button" class="btn main-btn close1" data-dismiss="modal" onclick="">Apply</button>
                    	                           </div>
                    	                      </div>
                                     
                                             </div>
                                          </div>
                                          <label class="text-danger" style="font-size: 11px;">Minimum Stay Days: {{ $data->min_stay }}</label>
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="booking-error"></div>
                              
                              <div id="gaurav-new-data-area">
                            
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="ovabrw-book-now" style="display:none;" id="submit-button-gaurav-data">
                                            <button type="submit" class="main-btn">
                                             Book Now</button>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="ovabrw-book-now" >
                                            <button type="button" class="main-btn"  id="reset-button-gaurav-data">
                                             Refresh Form</button>
                                        </div>
                                    </div>
                                </div>
                              
                              <p>Or<br>Contact Owner</p>
                              <p><a href="mailto:{{$data->email}}"><i class="fa-solid fa-envelope"></i> {{$data->email}}</a></p>
                           </form>
                        </div>
                        
                        <div class="img-logo">
                            @if($data->airbnb_link)
                                <a href="{{ $data->airbnb_link }}" target="_BLANK"><img src="{{ asset('front')}}/images/airbnb-logo.webp" class="img-fluid" alt="airbnb" /></a>
                            @endif
                            @if($data->vrbo_link)
                                <a href="{{ $data->vrbo_link }}" target="_BLANK"><img src="{{ asset('front')}}/images/vrbo-logo.webp" class="img-fluid" alt="vrbo" /></a>
                            @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

@stop

@section("js")  
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Days</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="gaurav-new-modal-days-area">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<!-- The Modal -->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Additional Fee</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="gaurav-new-modal-service-area">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>







<script src="{{asset('front/jquery.royalslider.minf76d.js')}}"></script> 
<script src="https://rawgit.com/jedfoster/Readmore.js/master/readmore.js"></script>
<script>
    function functiondec($getter_setter,$show,$cal){
        val=parseInt($($getter_setter).val());
        if(val>0){
            val=val-1;
        }
        $($getter_setter).val(val);
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        $show_actual_data=$show_data+" Guests";
        if($getter_setter=="#adults-data"){
            $($getter_setter+'-show').html(val +" Adults");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Adult"); 
            }
        }else{
             $($getter_setter+'-show').html(val +" Children");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Child"); 
            }
        }
        $($show).val($show_actual_data);
        ajaxCallingData();
    }
    function functioninc($getter_setter,$show,$cal){
        val=parseInt($($getter_setter).val());
        
            val=val+1;
      
        $($getter_setter).val(val);
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        $show_actual_data=$show_data+" Guests";
        $($show).val($show_actual_data);
        if($getter_setter=="#adults-data"){
            $($getter_setter+'-show').html(val +" Adults");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Adult"); 
            }
        }else{
             $($getter_setter+'-show').html(val +" Children");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Child"); 
            }
        }
        ajaxCallingData();
    }
</script>
<script>
  $('.more').readmore({
    speed: 75, //Açılma Hızı
    collapsedHeight:312, // 100px sonra yazının kesileceğini belirtir.
    moreLink: '<a class="ac" href="#">Show more</a>', // açma linki yazısı
    lessLink: '<a class="kapat" href="#">Show Less</a>', // kapatma linki yazısı
  });
</script>

<script src="{{ asset('front/js/showmore.js')}}"></script>

<script>
$(function(){
    $(".datepicker").datepicker();
});
</script>

@php
$new_data_blocked=LiveCart::iCalDataCheckInCheckOut($data->id);
    $checkin=$new_data_blocked['checkin'];
    
    $checkout=$new_data_blocked['checkout'];

@endphp
<script type="text/javascript">
    var checkin = <?php echo json_encode($checkin);  ?>;
    var checkout = <?php echo json_encode($checkout);  ?>;
    $(function() {
        $("#txtFrom").datepicker({
            numberOfMonths: 1,
            minDate: '@minDate',
            dateFormat: 'yy-mm-dd',
            beforeShowDay: function(date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [checkin.indexOf(string) == -1];

            },

            onSelect: function(selected) {
                $("#submit-button-gaurav-data").hide();
                var dt = new Date(selected);
                dt.setDate(dt.getDate() + 1);
                $("#txtTo").datepicker("option", "minDate", dt);
                $("#txtTo").val('');
            },
            onClose: function() {
                $("#txtTo").datepicker("show");
            }
        });

        $("#txtTo").datepicker({
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd', 
            beforeShowDay: function(date) {

                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

                return [checkout.indexOf(string) == -1]

            },

            onSelect: function(selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() - 1);
                $("#txtFrom").datepicker("option", "maxDate", dt);
                ajaxCallingData();

            },
            onClose: function() {
                $('.popover-1').addClass('opened');
            }
        });
    });

                                                                $("#reset-button-gaurav-data").click(function(){
                                        $("#txtFrom").val('');
                                        $("#txtTo").val('');
                                        $("#adults-area").val('');
                                        $("#child-area").val('');
                                         $("#adults-data").val(0);
                                        $("#child-data").val(0);
                                        $("#show-target-data").val(null);
                                        $("#submit-button-gaurav-data").hide();
                                        $("#gaurav-new-modal-days-area").html('');
                                        $("#gaurav-new-modal-service-area").html('');
                                        $("#gaurav-new-data-area").html('');
                                        $("#adults-data-show").html("Adult");
                                        $("#child-data-show").html("Child");
                                       $("#pet_fee_data_guarav").val(0)
                                        
                                       $("#txtFrom").datepicker("option", "maxDate",  '2043-10-10');

                                   });
                       
    @php
       if(Request::get("start_date")){
        if(Request::get("end_date")){
        
    @endphp
    $(document).ready(function(){
        ajaxCallingData();
    });
        
    @php
        }
       }
    @endphp
    
    $(document).on("change","#pet_fee_data_guarav",function(){
        ajaxCallingData();
    });
    $(document).on("change","#heating_pool_fee_data_guarav",function(){
        ajaxCallingData();
    });
    
    
    
    function ajaxCallingData(){
        pet_fee_data_guarav=$("#pet_fee_data_guarav").val();
        heating_pool_fee_data_guarav=$("#heating_pool_fee_data_guarav").val();
        adults=$("#adults-data").val();
        childs=$("#child-data").val();
        
        total_guests=parseInt(adults)+parseInt(childs);
        if(total_guests>0){
             if($("#txtFrom").val()!=""){
                 if($("#txtTo").val()!=""){
                     $.post("{{route('checkajax-get-quote')}}",{start_date:$("#txtFrom").val(),end_date:$("#txtTo").val(),heating_pool_fee_data_guarav:heating_pool_fee_data_guarav,pet_fee_data_guarav:pet_fee_data_guarav,adults:adults,childs:childs,book_sub:true,property_id:{{ $data->id }}},function(data){
                        if(data.status==400){
                           
                            $("#gaurav-new-modal-days-area").html(null);
                            $("#gaurav-new-modal-service-area").html(null);
                            $("#gaurav-new-data-area").html(null);
                            $("#submit-button-gaurav-data").hide();
                            toastr.error(data.message);
                        }else{
                            $("#submit-button-gaurav-data").show();
                            $("#gaurav-new-modal-days-area").html(data.modal_day_view);
                            $("#gaurav-new-modal-service-area").html(data.modal_service_view);
                            $("#gaurav-new-data-area").html(data.data_view);
                        }
                    });
                 }
             }
        }else{
             $("#gaurav-new-modal-days-area").html(null);
                            $("#gaurav-new-modal-service-area").html(null);
                            $("#gaurav-new-data-area").html(null);
                            $("#submit-button-gaurav-data").hide();
        }
        
    }
</script>
 <script>
         jQuery(document).ready(function($) {
         $('#gallery-1').royalSlider({
             fullscreen: {
                 enabled: true,
                 nativeFS: true
             },
             controlNavigation: 'thumbnails',
             autoScaleSlider: true, 
             autoScaleSliderWidth: 800,     
             autoScaleSliderHeight: 550,
             loop: true,
             imageScaleMode: 'fit-if-smaller',
             navigateByClick: true,
             numImagesToPreload:2,
             arrowsNav:true,
             arrowsNavAutoHide: true,
             arrowsNavHideOnTouch: true,
             keyboardNavEnabled: true,
             fadeinLoadedSlide: true,
             globalCaption: true,
             globalCaptionInside: false,
             thumbs: {
                 appendSpan: true,
                 firstMargin: true,
                 paddingBottom: 4
             }
         });
         
         $('.rsContainer').on('touchmove touchend', function(){});
         
         });
         
      </script>
      
      <script>
      $(document).ready(function(){
  $("#more").click(function(){
    $("#less>a").css("display", "block");
    $("#more").css("display", "none");
    $(".overview-content").css("height", "100%");
  });
  
  $("#less").click(function(){
    $("#less>a").css("display", "none");
    $("#more").css("display", "block");
    $(".overview-content").css("height", "252px");
  });
});
      </script>
@stop
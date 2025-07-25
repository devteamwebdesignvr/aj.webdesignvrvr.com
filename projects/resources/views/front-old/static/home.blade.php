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


    <!-- Banner slider -->

    <section id="home" class="banner-wrapper p-0">
        <div class="video-sec">
            <video id="mob" class="mob__video" src="{{ asset('front')}}/images/liz.mp4" loop="" muted="" autoplay="" playsinline="" preload="none" class="js-hero-slide__inner" width="100%" style=""> </video>
            <button onclick="playVideo()" id="play">
       <i class="fa-solid fa-play"></i>
    </button>
    <button onclick="pauseVideo()" id="pause">
       <i class="fa-solid fa-pause"></i>
    </button>
            <div class="video-content">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Your Private Getaway <br/> <span>Florida Keys Villas</span></h1>
                
            </div>
        </div>
        <div class="container booking-area">
            <form method="get" action="{{ url('properties') }}"> <div class="row">
               
                <div class="col-lg md-3 mb-lg-0 loct icns position-relative d-none">

                   
                    {!! Form::select("location_id",ModelHelper::getLocationSelectList(),null,["class"=>"form-select","placeholder"=>"Choose Location"]) !!}

                    <i class="fa fa-map-marker-alt"></i>

                </div> 
                <div class="col-lg md-4 icns mb-lg-0 position-relative">

                    {!! Form::text("start_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"txtFrom","placeholder"=>"Check in","class"=>"form-control"]) !!}
                    <i class="fa-solid fa-calendar-days"></i>

                </div>

                <div class="col-lg md-4 icns mb-lg-0 position-relative">

                    
                    
                     {!! Form::text("end_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"txtTo","placeholder"=>"Check Out","class"=>"form-control lst" ]) !!}

                    <i class="fa-solid fa-calendar-days"></i>

                </div> 
                <div class="col-lg md-3 mb-lg-0 loct icns position-relative">
                    
                    <input type="text" name="Guests" readonly class="form-control gst" id="show-target-data" placeholder="Guests">
                    
                    <i class="fa-solid fa-users "></i>
                    <input type="hidden" value="0" name="adults" id="adults-data" />
                    <input type="hidden" value="0" name="child" id="child-data" />
                    <div class="adult-popup">
	                          <div class="modal-bodyss" id="guestsss">
	                          		<p class="close1" onclick=""><i class="fa fa-times"></i></p>
	                               <div class="ac-box">
	                                  <div class="adult">
	                                     <span id="adults-data-show">Adult</span>
	                                     <p>(18+)</p>
	                                  </div>
	                                  <div class="btnssss">
	                                     <div class="button button1 btnnn" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Increment Value">-</div>  
	                                     <div class="button11 button1" onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</div>
	                                  </div>
	                               </div>
	                                <div class="ac-box">
	                                  <div class="adult">
	                                     <span id="child-data-show">Children</span>
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

                <div class="col-lg md-4 md-lg-0 srch-btn">

                    <button type="submit" class="main-btn ">Check Availability</button>

                </div>
             
            </div>   </form>
        </div>
    </section>


<!-- Start property -->
<section id="property" class="property_wrapper">
	<div class="container">
		<div class="row">
			<div class="subtitle-wrapper about" data-aos="fade-up" data-aos-duration="1500">
				<div class="dash"></div>
				<div >CHECK OUT OUR</div>
				<div class="dash"></div>
			</div>
			<h3 data-aos="zoom-in" data-aos-duration="1500">Waterfront Vacation Rental</h3>
			@foreach(App\Models\Property::where(["is_home"=>"true","status"=>"true"])->orderBy("ordering","asc")->get() as $c)
			<div class="col-md-6 mb-lg-0">
				<div class="property-items overflow-hidden">
				<a href="{{url('properties/detail/'.$c->seo_url)}}"><img src="{{asset($c->feature_image)}}" class="img-fluid pro" data-aos="zoom-in-right" data-aos-duration="1500"/></a>
				</div>
				<div class="property-items">
					<div class="property-item-wrap">
						<div class="property-content">
							<h5 class="mb-lg-3 mt-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">{{$c->name}}</h5>
							<div class="address"><i class="fas fa-map-marker-alt"></i>{{$data->address}}</div>
							<p class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
							    {{$c->description}}
							</p>
							<div class="rates" data-aos="fade-up" data-aos-duration="1500">
								<div class="amenities_home">
									<div>
										<i class="fa fa-users"></i>
										<div class="amt-type">Guests</div>
										<div class="amt-num">{{ $c->sleeps }}</div>
									</div>
									<div>
										<i class="fa fa-bed"></i>
										<div class="amt-type">Beds</div>
										<div class="amt-num">{{ $c->beds }}</div>
									</div>
									<div>
										<i class="fa fa-bath"></i>
										<div class="amt-type">Baths</div>
										<div class="amt-num">{{ $c->bathroom }}</div>
									</div>
									<div>
										<i class="fa fa-home"></i>
										<div class="amt-type">Bedrooms</div>
										<div class="amt-num">{{ $c->bedroom }}</div>
									</div>
								</div>
						
							</div>
							<div class="r-price">
								<!-- <div class="from-text">From</div> -->
								<div class="main-head">
								<div class="price-wrapper">
								    <div class="price-head">
									<div class="price">$ {{$c->price}}</div>
									<div> / night</div>
									</div>
									<div class="flexible desk">
									    <p>"Flexible Rates depending on season, demand, or length of stay."</p>
									</div>
								</div>
								<div class="pro-btn" data-aos="fade-up" data-aos-duration="1500">
									<a href="{{url('properties/detail/'.$c->seo_url)}}" class="main-btn">View Details</a>
								</div>
								</div>
								<div class="flexible mob">
									    <p>"Flexible Rates depending on season, demand, or length of stay."</p>
									</div>
							</div>
							
						</div>
					</div>
					<div class="dot">
						<img src="{{ asset('front')}}/images/dot-shape.png">
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

    <!-- end property -->
<section id="about" class="about_wrapper">
     <div class="container">
         
     	<div class="row flex-lg-row flex-column-reverse">
     		<div class="col-lg-6 text-center text-lg-start">
     			<div class="heading_sec">
     		<h3 class="heading">{{ $data->shortDescription }}</h3>
     	</div>
         		{!!  $data->mediumDescription !!}
         		
         		<a href="{{url('/about-us')}}" class="main-btn mt-4">Explore</a>
     		</div>
     		<div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 position-relative text-center">
     		   
     			<div class="about-img1">
     				<img src="{{ asset($data->image) }}" class="img-fluid abt-img1" alt="" >
     			</div>
     		
     		
     			<div class="about-img2">
     				<img  src="{{ asset($data->image_2)}}" class="img-fluid abt-img2" alt="">
     			</div>
     			
     			<div class="about-img3">
     				<img src="{{ asset($data->image_3)}}" class="img-fluid abt-img3" alt="">
     			</div>
     		
     		</div>
     	</div>
     	
     </div>
</section>


<!--<div class="col-12 text-center">-->
<!--                    <a href="#" class="main-btn aos-init aos-animate prop-btn" data-aos="fade-up" data-aos-duration="1500">View More</a>-->
<!--                </div>-->
    <!-- Booking section -->
    <section class="booking_sec" style="display:none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 right-book position-relative">
                    <div class="booking_img">
                        <img src="{{ asset('front')}}/images/attrabg.webp">
                    </div>
                    <div class="booking-right_sec">
                        <div class="bookin_box">
                            <h2 data-aos="fade-up" data-aos-duration="1500">Welcome to your next getaway!</h2>
                            <p data-aos="fade-up" data-aos-duration="1500">Enjoy Fishing, Boating, Eats & Drinks, Night Life, Beaches, Lighthouses, Family Fun & more! Family friendly and centrally located between great attractions such as Cedar Point, The Lake Erie Islands, The Marblehead Lighthouse and The Greatest of Lakes, Lake Erie and all that it has to offer!  Let us host you as your enjoy your time spent visiting The Walleye Capital of the World!</p>
                            <a href="{{url('properties')}}" class="main-btn mt-4" data-aos="fade-up" data-aos-duration="1500">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end booking section -->
        <!-- amenities start -->
    
    <section class="fifth-sec" style="display:none;">
       <div class="container">
          <div class="row ">
            <div class="col-sm-12 section-title text-center mb-5">
                <h3 data-aos="zoom-in" data-aos-duration="1500">Amenities</h3>
            </div>
        </div>
          <div class="amenity-sec">
             <div class="row amn-grid">
                    @php $i=1; @endphp
                @foreach(App\Models\OurClient::orderBy("id","asc")->get() as $c)
                <div class="left-f">
                   <div class="left-amn" data-aos="zoom-in-right" data-aos-duration="1500">
                      <h2>{{$c->title}}</h2>
                      <p>{{$c->description}}</p>
                   </div>
                </div>
                <div class="right-f">
                   <div class="right-amn-img" data-aos="zoom-in-left" data-aos-duration="1500">
                      <img src="{{ asset($c->image)}}" class="img-fluid" alt="">
                   </div>
                </div>
                @php $i++; @endphp
                  @endforeach
             </div>
          </div>
       </div>
    </section>

    <!-- end amenities -->
    
     <div class="bg-image-home">
        <div class="container">
            <div class="row">
                <div class="card-cta cta1" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="dash-accent"></div>
                    <h2 class="title cta cta2" >Florida Keys Vacation Villas</h2>
                    <p class="paragraph" style="color: white;">Florida Keys Vacation Villas is perfect for family reunions, large get-togethers, groups of friends, corporate retreats and other getaways.</p>
                    <div class="cta-btn">
                        <a href="{{url('contact-us')}}" class="main-btn mt-4">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    @php
  $list=App\Models\Attraction::orderBy("ordering","asc")->paginate(6);
  @endphp
  @if(count($list)>0)
    <!-- start attractions -->
    <section id="attractions" class="attractions_wrapper">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12 section-title text-center mb-5">
                    <div class="subtitle-wrapper about" data-aos="fade-up" data-aos-duration="1500">
                        <div class="dash"></div>
                        <div>ATTRACTIONS</div>
                        <div class="dash"></div>
                    </div>
                    <h3 data-aos="zoom-in" data-aos-duration="1500">Joyful experiences for you and your family</h3>
                </div>
            </div>
            <div class="row align-items-center attractions-item-wrap" >
             
  @foreach($list as $c)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="attractions_left">
                        <div class="attr_img position-relative">
                            <a href="{{ url('attractions/detail/'.$c->seo_url) }}">
                                <img src="{{asset($c->image)}}" alt="{{$c->name}}" class="img-fluid" />
                                <div class="attr_overlay">
                                    <div class="dash-accent"></div>
                                    <h4>{{$c->name}}</h4>
                                    <p>{{$c->description}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12 text-center">
                    <a href="{{url('attractions')}}" class="main-btn mt-4" data-aos="fade-up" data-aos-duration="1500">View More</a>
                </div>
            </div>
        </div>

    </section>
@endif
    <!-- end attractions -->

   
@if(App\Models\Testimonial::where("status","true")->where("status","true")->count()>0)
    <!-- review section -->
    <section class="review_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <div class="subtitle-wrapper about" data-aos="fade-up" data-aos-duration="1500">
                        <div class="dash"></div>
                        <div>Testimonials</div>
                        <div class="dash"></div>
                    </div>
                    
                    <h3 data-aos="zoom-in" data-aos-duration="1500">Hear From Our Past Guests</h3>
                </div>
            </div>
            <div class="row testiSlide">
                @foreach(App\Models\Testimonial::where("status","true")->orderBy("id","desc")->take(4)->get() as $c)
                <div class="col-md-6">
                    <div class="review_box ">
                        <figure class="testimonials">
                            <blockquote>{{$c->message}} <div class="btn"></div>
                            </blockquote>
                            <img src="{{asset($c->image)}}" alt="images" class="image testimonial" style="">
                            <div class="peopl">
                                <h3>{{$c->name}}</h3>
                                <p class="indentity">Stayed {{date('F Y',strtotime($c->stay_date))}}</p>
                            </div>
                        </figure>
                    </div>
                </div>
             @endforeach
            </div>
        </div>
    </section>

    <!-- end review section -->
    


{!! $data->seo_section !!}

@endif

@stop
@section("js")
<script>
$(document).ready(function(){
    setTimeout(function(){$("#gaurav-data-ram").click();},5000);
});
</script>
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
    }
</script>

@php
$new_data_blocked=LiveCart::iCalDataCheckInCheckOut(0);
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
                $.post("{{route('checkajax-get-quote')}}",{start_date:$("#txtFrom").val(),end_date:$("#txtTo").val(),book_sub:true,property_id:{{ $data->id }}},function(data){
                    if(data.status==400){
                       // $("#submit-button-gaurav-data").hide();
                      //  toastr.error(data.message);
                    }else{
                        // $("#submit-button-gaurav-data").show();
                        // $("#gaurav-new-modal-days-area").html(data.modal_day_view);
                        // $("#gaurav-new-modal-service-area").html(data.modal_service_view);
                        // $("#gaurav-new-data-area").html(data.data_view);
                    }
                })

            },
            onClose: function() {
                $('.popover-1').addClass('opened');
            }
        });
    });
</script>


@stop
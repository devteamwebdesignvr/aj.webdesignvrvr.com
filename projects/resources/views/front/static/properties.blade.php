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

<!-- search bar -->

<div class="search-sec">
	<div class="container">
		<div class="search-bar">
			<form method="get" action="{{ url('joshua-tree-1') }}">
				<div class="row">
                  
                   @php
                       $currentUrl = request()->path(); // e.g. "joshua-tree-1"
                       $locationId = request()->get('location_id'); // e.g. 17
                       $selectedLocation = null;

                       if ($currentUrl === 'joshua-tree-1' && $locationId) {
                           $selectedLocation = $locationId;
                       }
                   @endphp
                  
					
                    <div class="col-3 md-12 sm-12 select">
                      {!! 
                      Form::select('location_id',ModelHelper::getLocationSelectList(), $selectedLocation, ['class' => '', 'placeholder' => 'Location', 'title' => 'Location', 'id' => 'loc']) 
                      !!}
                    </div>
					<div
						class="col-5 col-lg md-6 icns mb-lg-0 position-relative  datepicker-section datepicker-common-2 main-check">
						<div class="row">
							<div
								class="check left icns mb-lg-0 position-relative datepicker-common-2">
								<label for="check-in">Check In</label>
								{!!
								Form::text("start_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"start_date","placeholder"=>"check in","class"=>"form-control"])
								!!}
								<img src="{{ asset('/') }}/front/images/calendar.png" alt>
							</div>
							<div
								class="check right icns mb-lg-0 position-relative datepicker-common-2 check-out">
								<label for="check-out">Check Out</label>
								{!!
								Form::text("end_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"end_date","placeholder"=>"check out","class"=>" form-control lst"
								]) !!}
								<img src="{{ asset('/') }}/front/images/calendar.png" alt>
							</div>
							<div class="col-12 md-12 sm-12 datepicker-common-2 datepicker-main">
								<input type="text" id="demo17" value
									aria-label="Check-in and check-out dates"
									aria-describedby="demo17-input-description" readonly />
							</div>
						</div>
					</div>
					<div class="col-2 md-12 sm-12 guest">
						<label for="guests">Adult</label>
						<input type="text" name="Guests" value="{{ Request::get('Guests') ?? '' }}" readonly="" class="form-control gst" id="show-target-data" placeholder="Guests">
						<img src="{{ asset('/') }}/front/images/user.png" alt>
						<input type="hidden" value="{{ Request::get('adults') ?? '1' }}" name="adults" id="adults-data" />
                    <input type="hidden" value="{{ Request::get('child') ?? '0' }}" name="child" id="child-data" />
						<div class="adult-popup" id="guestsss">
							<i class="fa fa-times close1"></i>
							<div class="adult-box">
								<div class="adult-value">
									<p id="adults-data-show">@if(Request::get('adults'))
                                    @if(Request::get('adults')>1)
                                    {{ Request::get('adults') }} Adults
                                    @else
                                    {{ Request::get('adults', 1) }} Adult
                                    @endif
                                    @else
                                    Adult
                                    @endif</span> 18+</p>
									<!-- <p class="adult-name">Adult</p> -->
								</div>

								<div class="adult-btn">
									<button class="button1" type="button"
										onclick="functiondec('#adults-data','#show-target-data','#child-data')"
										value="Decrement Value">-</button>
									<button class="button11 button1" type="button"
										onclick="functioninc('#adults-data','#show-target-data','#child-data')"
										value="Increment Value">+</button>
								</div>
							</div>
							<div class="adult-box d-none">
								<div class="adult-value">
									<p id="child-data-show">0 Children</p>
									<!-- <p class="adult-name">Children</p> -->
								</div>
								<div class="adult-btn">
									<button class="button1" type="button"
										onclick="functiondec('#child-data','#show-target-data','#adults-data')"
										value="Decrement Value">-</button>
									<button class="button11 button1" type="button"
										onclick="functioninc('#child-data','#show-target-data','#adults-data')"
										value="Increment Value">+</button>
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
							<button class="main-btn  close111" type="button"
								onclick><span>Apply</span></button>
						</div>
					</div>
					<div class="col-2 md-12 sm-12 srch-btn">
						<button type="submit" class="main-btn "><span>Search</span></button>
					</div>
				</div>
			</form>
		</div>
		<div class="banner-text">
		<h6>Luxury Glamping and Retreat Experiences</h6>
		</div>
	</div>
</div>



<!-- pro card design  -->

<section class="home-list">
	<div class="container-fluid">
		<div class="row">
		<div class="col-lg-8 col-12 pro-box-sec">
				<div class="row">					                  
         @php
          $currency=$setting_data['payment_currency'];
			$list=App\Models\Hospitable\HospitableProperty::where(["status"=>"true"]);
			$total_sleep=0;			
			if(Request::get("Guests")){
				if(Request::get("adults")!=""){
					if(is_int((int)Request::get("adults"))){
						$total_sleep+=Request::get("adults");
					}
				}
				if(Request::get("child")!=""){
					if(is_int((int)Request::get("child"))){
						$total_sleep+=Request::get("child");
					}
				}
			}			
			if(Request::get("location_id")){
				$list->where("location_id",Request::get("location_id"));
			}
		 
		/*	if(Request::get("start_date")){
				if(Request::get("end_date")){
					$ids=Helper::getPropertyAvailability(Request::get("start_date"),Request::get("end_date"),$total_sleep);				
					$list->whereIn("id",$ids);
				}
			} */
                  
            if(Request::get("start_date")){
              if(Request::get("end_date")){
                $ids =[];
                $ids=HospitableApi::CheckPropertyAvailability(Request::get("start_date"),Request::get("end_date"),Request::get("adults"),Request::get("child"),Request::get('pet'),Request::get('infants'));
                 
                if($ids['status'] == 200){ 
                 $list->whereIn("hospitable_id", $ids['id']);
                 
                }
               }         
             }

			if($total_sleep>0){
				$list->where("capacity_max",">=",$total_sleep); 
			}       
			$list=$list->orderBy("ordering","asc")->paginate(1000);
                  
                  
                  
			$i=0;			 
        @endphp

    @foreach($list as $c)
          @php
		    $i=1;
			$images = [];
			$rightImage=[];    
            if($c->feature_image){
				$images = asset($c->feature_image);
			}
			$propertyImages = App\Models\Hospitable\HospitablePropertyPhoto::where("property_id",$c->id)->orderBy('order','asc')->get();			
			foreach($propertyImages as $c1){
				if($i <= 6){
					$images[$c1['order']] = $c1['url'];
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
		@endphp         

             <div class="col-6 col-md-6 col-sm-12 prop-card prop-img ">
              @if(count($images)>0)              
              <div id="carousel" class="owl-carousel owl-theme carousel">
                    @foreach($images  as $c1)                     
                    <div class="item">
                        <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">
                        <img src="{{$c1}}" class="img-fluid"  alt="Beautiful Sunsets"  title="Beautiful Sunsets">
                        </a>
                    </div>                   
                     @endforeach                     
                </div>
               @endif				
				<div class="pro-cont">
                    <span>{{$address['city']}}, {{$address['state']}}</span>
					<h3 class="title">
						<a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">{{$c->public_name}}</a>
					</h3>
				
					<div class="amn">
						<ul class="first">
							<li>{{ $c->capacity_max }} Guests </li> 
                            <li>.</li>
                            <li> {{ $c->capacity_beds }} Beds  </li>
                            <li>.</li>
                             <li>{{ $c->capacity_bedrooms }} Baths </li>
                             </ul>
					</div>
					<div class="prop-view-btn">
						<div class="view">
							<p>Price starts from:</p>
							<h5><span> {{ $price }}</span>/ Night </h5>
						</div>
						<a   href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">Check Availability <i class="fa-solid fa-plus"></i></a>
					</div>
				</div>
			</div>
                  
    @endforeach        
				
				</div>
		</div>
		<div class="col-lg-4 col-12">
          <div id="map" class="map_div" style="height:100%;width:100%;"></div>
          
          <!--
		    <div class="map-box ">
              
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766738.48171446!2d60.9691763862997!3d19.725163578221917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1748602338903!5m2!1sen!2sin" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		    </div>
 -->
          
		</div>
          

		</div>
	</div>
</section>

@section("css")
@parent

<link rel="stylesheet" href="https://wesley.webdesignvrvr.com/front/assets/jquery-ui/jquery-ui.min.css?ver=2.0.0">
<link rel="stylesheet"
	href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
<link rel="stylesheet"
	href="{{ asset('front')}}/assets/owl/owl.carousel.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
<link rel="stylesheet" href="{{ asset('front')}}/css/properties.css" />
<link rel="stylesheet"
	href="{{ asset('front')}}/css/properties-responsive.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/map1.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/map.responsive.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
@stop
@section("js")
@parent
<script src="https://wesley.webdesignvrvr.com/front/assets/jquery/jquery-3.7.0.min.js?ver=2.0.0"></script>
<script
	src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script src="{{ asset('front')}}/assets/owl/owl.carousel.min.js"></script>
<script src="{{ asset('front')}}/js/properties.js"></script>
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
<script src="{{ asset('datepicker') }}/node_modules/fecha/dist/fecha.min.js"></script>
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
                setTimeout(function() {$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");document.getElementById("start_date").value = "{{ request()->start_date }}";document.getElementById("end_date").value = "{{ request()->end_date }}";}, 1000);
            @endif
        @endif

    })();
    $(document).on("click", "#clear", function() {$("#clear-demo17").click();});
    x = document.getElementById("month-2-demo17");
    x.querySelector(".datepicker__month-button--next").addEventListener("click", function() {y = document.getElementById("month-1-demo17");y.querySelector(".datepicker__month-button--next").click();});
    x = document.getElementById("month-1-demo17");
    x.querySelector(".datepicker__month-button--prev").addEventListener("click", function() {y = document.getElementById("month-2-demo17");y.querySelector(".datepicker__month-button--prev").click();});

    function getDateData(objectDate) { let day = objectDate.getDate(); let month = objectDate.getMonth() + 1; let year = objectDate.getFullYear(); if (day < 10) { day = '0' + day; } if (month < 10) { month = `0${month}`; } format1 = `${year}-${month}-${day}`; return format1; }
</script>
<script>
    AOS.init({
  duration: 1400,
})
</script>

<script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCSbz_9_xYwTVsSJAxJtc6axWq_1FZF58&libraries=places&callback=initMap"
   async defer></script>

@php
$latitude='34.1953715';
$longitude='-116.3121054';
$zoom=18;

$new_data_locations=[];
foreach($list as $c){
$i1 = 1;
$pictures=json_decode($c->pictures,true);
$image = App\Models\Hospitable\HospitablePropertyPhoto::where("property_id",$c->id)->orderBy('order','asc')->first()->url;
  
if($image == ""){
 $image=asset('front/images/prop1.webp');
}

  
$address = json_decode($c->address_object,true); 
if($address){
	if($address['coordinates']){
		//dd($address['coordinates']);
		$lat = $address['coordinates']['latitude'];
        $long = $address['coordinates']['longitude'];
	}
}

$priceData = App\Models\Hospitable\HospitablePropertyDate::where(['property_id'=> $c->id,"date"=> date('y-m-d')])->first();
if($priceData){
$price = $priceData->price_formatted;
}

$lat_offset = (rand(-10, 10)) / 100000;
$lng_offset = (rand(-10, 10)) / 100000;

$new_data_locations[]=[
"address"=> $address['display'],
"description"=> $c->summary,
"name"=>  $c->public_name ?? $c->name,
"link"=> url($c->seo_url),
"price"=> ($price) ,
"type"=> "home",
"bed"=> $c->capacity_beds,
"bath"=>$c->capacity_bathrooms,
"size"=> $c->capacity_max,
"image"=>$image,
"position"=>[
"lat"=>(float)$lat+$lat_offset,
"lng"=>(float)$long+$lng_offset
]
];
}

@endphp


<script> 
let markers = []; // sab markers track karne ke liye array
const properties = {!! json_encode($new_data_locations) !!};
    console.log("Total properties loaded:", properties.length);
    console.log(properties);
    window.initMap = async function() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const { LatLng } = await google.maps.importLibrary("core");

    const center = new LatLng({{ $latitude }}, {{ $longitude }});
    const map = new Map(document.getElementById("map"), {
        zoom: {{ $zoom }},
        center,
        mapId: "4504f8b37365c3d0",
    });

    for (const property of properties) {
        const marker = new AdvancedMarkerElement({
            map,
            content: buildContent(property),
            position: property.position,
            title: property.description,
        });

        markers.push(marker);

        marker.addListener("click", () => {
            toggleHighlight(marker);
        });
    }
};
  
   //console.log(markers)
  
function toggleHighlight(markerView) {
   
    markers.forEach(m => {
        m.content.classList.remove("highlight");
        const detail = m.content.querySelector(".details");
        if (detail) {
            detail.style.display = "none";
        }
        m.zIndex = null;
    });


    markerView.content.classList.add("highlight");
    const clickedDetail = markerView.content.querySelector(".details");
    if (clickedDetail) {
        clickedDetail.style.display = "block";  // block se popup dikhega
    }
    markerView.zIndex = google.maps.Marker.MAX_ZINDEX + 1;
}


function buildContent(property) {
  const content = document.createElement("div");
  content.classList.add("property");
  content.innerHTML = `
    <div class="icon">
        <img src="{{ asset('front')}}/images/dot.png" alt="">
        <span class="fa-sr-only">${property.type}</span>
    </div>
    <div class="details">
 <div class="close-icon">
    <i class="fa-solid fa-xmark"></i>
    </div>
        <a href="${property.link}" target="_BLANK"><img src="${property.image}"></a>        
        <div class="price">${property.price}</div>
        <div class="address-map"><a href="${property.link}"  target="_BLANK">${property.name}</a></div>
        <div class="features">
        <div>
            <i aria-hidden="true" class="fa fa-bed fa-lg bed" title="bedroom"></i>
            <span class="fa-sr-only">bedroom</span>
            <span>${property.bed}</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-bath fa-lg bath" title="bathroom"></i>
            <span class="fa-sr-only">bathroom</span>
            <span>${property.bath}</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-ruler fa-lg size" title="size"></i>
            <span class="fa-sr-only">sleep</span>
            <span>${property.size} </span>
        </div>
        </div>
    </div>
    `;
  return content;
}

</script>
<script>
    $(document).on('click', '.close-icon', function (e) {
        e.stopPropagation(); // Prevent marker click when clicking close button

        const details = $(this).closest('.details');
        details.hide(); // Hide only this popup
        const parentProperty = $(this).closest('.property')[0];
        if (parentProperty) {
            parentProperty.classList.remove('highlight');
        }

        // Find the marker and reset its zIndex
        markers.forEach(m => {
            if (m.content === parentProperty) {
                m.zIndex = null;
            }
        });
    });
  
     $(".carousel").owlCarousel({
       	loop: true,
        items: 1,
        margin: 15,
        autoplay: true,
        dots:false,
        nav: false,
        autoplayTimeout: 4000,
        smartSpeed: 550,
    });

</script>



@stop


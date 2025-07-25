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
<div class="search-bar" id="check">
    <div class="container">
        <form method="get" action="{{ url('properties')}}">
            <div class="row">
                <div class="col-3 md-12 sm-12 select">
                       {!! Form::select("location_id",ModelHelper::getLocationTrueSelectList(),null,["class"=>"","placeholder"=>"Select Location","title"=>"Select Location","id"=>"loc"]) !!}
                       <i class="fa-solid fa-location-dot"></i>
                    </div>
               <div class="col-6 md-12 sm-12">
                            <div class="row">
                                <div class="check left icns mb-lg-0 position-relative datepicker-common-2 col-md-6">
                               {!! Form::text("start_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"start_date","placeholder"=>"Check in","title"=>"Select Check In Dates","class"=>"form-control"]) !!}
                               <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <div class="check right icns mb-lg-0 position-relative datepicker-common-2 check-out col-md-6">
                               {!! Form::text("end_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"end_date","placeholder"=>"Check Out","title"=>"Select Check Out Dates","class"=>"form-control lst" ]) !!}
                               <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <div class="col-12 md-12 sm-12 datepicker-common-2 datepicker-main">
                                    <input type="text" id="demo17" value="" aria-label="Check-in and check-out dates" aria-describedby="demo17-input-description" readonly />
                                </div>
                            </div>
                    </div>
                    
                    
            <div class="col-3 md-12 sm-12 guest">
                    <input type="text" name="Guests"   value="{{ Request::get('Guests') ?? '' }}" readonly="" class="form-control gst" id="show-target-data" placeholder="Guests">
                    <i class="fa-solid fa-users "></i>
                    <input type="hidden" value="{{ Request::get('adults') ?? '0' }}"  name="adults" id="adults-data" />
                    <input type="hidden" value="{{ Request::get('child') ?? '0' }}"  name="child" id="child-data" />
                    <div class="adult-popup" id="guestsss">
                        <i class="fa fa-times close1"></i>
                        <div class="adult-box">
                            <p id="adults-data-show"><span>@if(Request::get('adults'))
                                                                @if(Request::get('adults')>1)
                                                                    {{ Request::get('adults') }} Adults
                                                                @else
                                                                    {{ Request::get('adults') }} Adult
                                                                @endif
                                                             @else
                                                             Adult
                                                             @endif</span> 18+</p>
                            <div class="adult-btn">
                                <button class="button1"  type="button" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Decrement Value">-</button>
                                <button class="button11 button1" type="button"  onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</button>
                            </div>
                        </div>
                        <div class="adult-box">
                            <p id="child-data-show"><span>@if(Request::get('child'))
                                                                @if(Request::get('child')>1)
                                                                    {{ Request::get('child') }} Children
                                                                @else
                                                                    {{ Request::get('child') }} Child
                                                                @endif
                                                             @else
                                                             Child
                                                             @endif</span> (0-17)</p>
                            <div class="adult-btn">
                                <button class="button1" type="button"  onclick="functiondec('#child-data','#show-target-data','#adults-data')" value="Decrement Value">-</button>
                                <button class="button11 button1" type="button"  onclick="functioninc('#child-data','#show-target-data','#adults-data')" value="Increment Value">+</button>
                            </div>
                        </div>
                        <button class="main-btn  close111" type="button" onclick="">Apply</button>
                    </div>
                </div>
                <div class="col-3 md-12 sm-12 srch-btn">
                    <button type="submit" class="main-btn ">Check Availability</button>
                </div>
            </div>   
        </form>
    </div>
 </div>
@php
 $currency=$setting_data['payment_currency'];
    $list=App\Models\Guesty\GuestyProperty::where(["status"=>"true"]);
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
    if(Request::get("start_date")){
        if(Request::get("end_date")){
            $ids=Helper::getPropertyListNew(Request::get("start_date"),Request::get("end_date"),$total_sleep);
            #dd($ids);
            $list->whereIn("_id",$ids);
        }
    }
    if($total_sleep>0)
    $list->where("accommodates",">=",$total_sleep);
    $list->where("status","true");
    $list->where("active","1");
    $list->where("location_id",$data->id);
    $list=$list->orderBy("id","desc")->paginate(1000);
@endphp
<a href="#check" class="sticky main-btn book1 check"><span class="button-text">CHECK AVAILABILITY</span></a>
<section class="home-list">
   <div class="container">
      <div class="how-we-value-heading"></div>
      <div class="row">
         @forelse($list as $c)
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
         <div class="col-4 col-md-4 col-sm-12">
            <div class="pro-img">
                @isset($picture['original'])
                    <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}"><img src="{{$picture['original']}}" class="img-fluid" alt="{{$picture['caption'] ?? ''}}"></a>
                @endisset
                @isset($prices['basePrice'])
                    <h5><span>{{ $currency }}  {{$prices['basePrice']}}</span> / Night</h5>
                @endif
               <div class="featured">
                  <span>{{$c->propertyType}}</span>
               </div>
            </div>
            <div class="pro-cont">
               <div class="rating">
                    <span class="rating-count"><i class="fa-solid fa-star checked"></i><i class="fa-solid fa-star checked"></i><i class="fa-solid fa-star checked"></i><i class="fa-solid fa-star checked"></i><i class="fa-solid fa-star checked"></i></span>
               </div>
               <h3 class="title"><a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">{{$c->title}}</a></h3>
               @isset($address['full'])
               <p class="adr"><i class="fa-solid fa-location-dot"></i>{{$address['full']}}</p>
               @endisset
               <div class="amn">
                  <ul class="first">
                     <li><i class="fa-solid fa-bed"></i> {{ $c->bedrooms }} Bedrooms</li>
                     <li>|</li>
                     <li><i class="fa-solid fa-bath"></i> {{ $c->bathrooms }} Bathrooms</li>
                     <li>|</li>
                     @isset($c->accommodates)
                        <li><i class="fa-solid fa-users"></i> {{ $c->accommodates }} Guests</li>
                     @endisset
                  </ul>
               </div>
               <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">
                  <div class="view">
                     View More 
               <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}" class="forward"><i class="fa-solid fa-arrow-right"></i></a>
               </div></a>
            </div>
         </div>
             @empty
         <div class="col-12 col-md-12 col-sm-12">
                No result found
             </div>
         @endforelse
      </div>
      <div class="pro">
        
            <div class="col-md-12 text-center">
                {{ $list->appends(request()->all())}}
            </div>
      </div>
   </div>
</section>
      
@stop

@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-list.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-list-responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css"/>
<link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/js/properties-list.js" ></script>
    <script>
    var val=0;
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
        val=(val*1)+1;
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
<script src="{{ asset('datepicker') }}/node_modules/fecha/dist/fecha.min.js"></script>
<script src="{{ asset('datepicker') }}/dist/js/hotel-datepicker.js"></script>
<script>
	@php
	    $new_data_blocked=LiveCart::iCalDataCheckInCheckOutCheckinCheckout(0);
	    $checkin=json_encode($new_data_blocked['checkin']);
	    $checkout=json_encode($new_data_blocked['checkout']);
	    $blocked=json_encode($new_data_blocked['blocked']);
	@endphp
	var checkin = <?php echo $checkin;  ?>;
	var checkout = <?php echo ($checkout);  ?>;
	var blocked= <?php echo ($blocked);  ?>;  
    function clearDataForm(){
        $("#start_date").val('');
        $("#end_date").val('');
    }
    (function () {
        @if(Request::get("start_date"))
            @if(Request::get("end_date"))
                $("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");     
            @endif
        @endif
        abc=document.getElementById("demo17");
        var demo17 = new HotelDatepicker(
            abc,
            {
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
                    if(Number.isNaN(demo17.end)){
                        document.getElementById("end_date").value = '';
                    }else{
                        d.setTime(demo17.end);
                        document.getElementById("end_date").value = getDateData(d);
                    }
                },
                clearButton:function(){
                    return true;
                }
            }
        );
        @if(Request::get("start_date"))
            @if(Request::get("end_date"))
                setTimeout(function(){$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");document.getElementById("start_date").value ="{{ request()->start_date }}";document.getElementById("end_date").value ="{{ request()->end_date }}";},1000);
            @endif
        @endif
    })();

    $(document).on("click","#clear",function(){
        $("#clear-demo17").click();
    })
    x=document.getElementById("month-2-demo17");
    x.querySelector(".datepicker__month-button--next").addEventListener("click", function(){
        y=document.getElementById("month-1-demo17");
        y.querySelector(".datepicker__month-button--next").click();
    })  ;


    x=document.getElementById("month-1-demo17");
    x.querySelector(".datepicker__month-button--prev").addEventListener("click", function(){
        y=document.getElementById("month-2-demo17");
        y.querySelector(".datepicker__month-button--prev").click();
    })  ;
    function getDateData(objectDate){let day = objectDate.getDate();let month = objectDate.getMonth()+1;let year = objectDate.getFullYear();if (day < 10) {day = '0' + day;}if (month < 10) {month = `0${month}`;}format1 = `${year}-${month}-${day}`;return  format1 ;}  
</script>
@stop
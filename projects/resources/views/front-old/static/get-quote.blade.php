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
      @php
     
        $start_date=$main_data["start_date"];
        $end_date=$main_data["end_date"];
        $adults=$main_data["adults"];
        $child=$main_data["child"];
        $total_guests=$adults+$child;
        $gross_amount=$main_data['gross_amount'];
        $day=$main_data['total_night'];
        $sub_total=$gross_amount;
        $total_amount=$gross_amount;
        $before_total_fees=[];
        $after_total_fees=[];
        
        
        
        $total_guests=$main_data["adults"]+$main_data["childs"];
        $total_pets=$main_data['pet_fee_data_guarav'];
        $heating_pool_fee=$main_data['heating_pool_fee'];
        $pet_fee=0;
        $guest_fee=0;
        $rest_guests=0;
        $single_guest_fee=0;
        $tax=0;
        $define_tax=$property->tax;
        
    @endphp
   <section class="get-quote-sec">
       <div class="container">
           <div class="row">
              <div class="col-md-12 text-center">
                  <h2>{{$property->name ?? ''}} : Booking Quote</h2>
              </div>
            </div>
            <div class="table-box">
            <table class="table table-bordered">
            <tr>
              <th>Check IN</th>
              <th>Check Out</th>
              <th>Total Guests</th>
              <th>Total Nights</th>
              <th   align="right" style="text-align: right !important;">Gross Amount</th>
           </tr>
            <tr>
              <td>{{date('F jS, Y',strtotime($start_date))}}</td>
              <td>{{date('F jS, Y',strtotime($end_date))}}</td>
              <td>{{$total_guests}} Guests   ({{ $adults }} Adults , {{ $child }} Child)</td>
              <td>{{$day}}</td>
              <td  align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($gross_amount,2)}}</td>
           </tr>
           
          @if($property->guest_fee)
    @if($property->guest_fee>0)
        @if($property->no_of_guest)
            @if($property->no_of_guest<$total_guests)
            
                @php $single_guest_fee=$property->guest_fee; @endphp
                @php $rest_guests=$total_guests-$property->no_of_guest; @endphp
                @php $guest_fee=$single_guest_fee*$day*$rest_guests;   @endphp
                @php 
                $sub_total+=$guest_fee;$total_amount+=$guest_fee; 
                @endphp

        
          <tr>
                      <td colspan="4"  align="left">Additional Guest Fee <br> <span style="font-size:13px;">({{$day}} nights * {!! $setting_data['payment_currency'] !!}{{$single_guest_fee}} * {{$rest_guests}} Guests)</span></td>
                      <td align="right"> {!! $setting_data['payment_currency'] !!} {{number_format($guest_fee,2)}}</td>
                   </tr>
            @endif
        @endif
    @endif
@endif


@if($property->pet_fee_type =="taxable")   
    @if($property->pet_fee)
        @if($property->pet_fee>0)
            @if($total_pets>0)
             @php 
            if($property->pet_fee_interval=="per_pet")
            {
                $pet_fee=$property->pet_fee*$total_pets;
            }else{
                $pet_fee=$property->pet_fee;
            }
             
                    $sub_total+=$pet_fee;$total_amount+=$pet_fee; 
                    @endphp
             
                    
                    <tr>
                          <td colspan="4"  align="left"> Pet Fee</td>
                          <td align="right"> {!! $setting_data['payment_currency'] !!} {{number_format($pet_fee,2)}}</td>
                       </tr>
            @endif
        @endif
    @endif 
@endif


@php
$heating_pool_fee1=0;
@endphp
@if($property->heating_pool_fee_type =="taxable")
    @if($property->heating_pool_fee)
        @if($property->heating_pool_fee>0)
            @if($heating_pool_fee=="Yes")
                @php
                     $sub_total+=$property->heating_pool_fee;$total_amount+=$property->heating_pool_fee; 
                     $heating_pool_fee1=$property->heating_pool_fee;
                    @endphp
             
                    
                    <tr>
                          <td colspan="4"  align="left"> Heating the Swimming Pool fee</td>
                          <td align="right"> {!! $setting_data['payment_currency'] !!} {{number_format($heating_pool_fee1,2)}}</td>
                       </tr>
            @endif
        @endif
    @endif
@endif
   
           @foreach(App\Models\PropertyFee::where("property_id",$property->id)->where("fee_apply","gross")->get() as $c)
                @php  $fee=Helper::getFeeAmountAndName($c,$gross_amount); @endphp
                @if($fee['status']==true)
                    <tr>
                      <td colspan="4"  align="left">{{ $fee['name'] }}</td>
                      <td align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($fee['amount'],2)}}</td>
                   </tr>
                    @php 

                        $sub_total+=$fee['amount'];$total_amount+=$fee['amount']; 
                        $before_total_fees[]=[
                            "name"=>$fee['name'],
                            "amount"=>$fee['amount'],
                            "fee_name"=>$c->fee_name,
                            "fee_rate"=>$c->fee_rate,
                            "fee_type"=>$c->fee_type,
                            "fee_apply"=>$c->fee_apply,
                            "fee_status"=>$c->fee_status
                        ];
                    @endphp
                @endif
           @endforeach
           @if($sub_total!=$gross_amount)
               @if(App\Models\PropertyFee::where("property_id",$property->id)->where("fee_apply","total")->count()>0)
               <tr>
                    <td colspan="4"  align="left"><strong>Sub total</strong></td>
                    <td align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($sub_total,2)}}</td>
               </tr>
               @endif
           @endif
           
           
@if($define_tax)
    @php
        $tax=round(($sub_total*$define_tax)/100,2);
        $sub_total+=$tax;$total_amount+=$tax; 
        
    @endphp
 
        <tr>
          <td colspan="4"  align="left"> Tax ({{ $define_tax }}%)</td>
          <td align="right">{!! $setting_data['payment_currency'] !!} {{number_format($tax,2)}}</td>
       </tr>

@endif




@if($property->pet_fee_type !="taxable")   
    @if($property->pet_fee)
        @if($property->pet_fee>0)
            @if($total_pets>0)
             @php 
            if($property->pet_fee_interval=="per_pet")
            {
                $pet_fee=$property->pet_fee*$total_pets;
            }else{
                $pet_fee=$property->pet_fee;
            }
             
                    $total_amount+=$pet_fee; 
                    @endphp
             
                    
                    <tr>
                          <td colspan="4"  align="left"> Pet Fee</td>
                          <td align="right"> {!! $setting_data['payment_currency'] !!} {{number_format($pet_fee,2)}}</td>
                       </tr>
            @endif
        @endif
    @endif 
@endif


@if($property->heating_pool_fee_type !="taxable")
    @if($property->heating_pool_fee)
        @if($property->heating_pool_fee>0)
            @if($heating_pool_fee=="Yes")
                @php
                    $total_amount+=$property->heating_pool_fee; 
                     $heating_pool_fee1=$property->heating_pool_fee;
                    @endphp
             
                    
                    <tr>
                          <td colspan="4"  align="left"> Heating the Swimming Pool fee</td>
                          <td align="right"> {!! $setting_data['payment_currency'] !!} {{number_format($heating_pool_fee1,2)}}</td>
                       </tr>
            @endif
        @endif
    @endif
@endif      
           
           @foreach(App\Models\PropertyFee::where("property_id",$property->id)->where("fee_apply","total")->get() as $c)
                @php  $fee=Helper::getFeeAmountAndName($c,$sub_total); @endphp
                @if($fee['status']==true)
                    <tr>
                      <td colspan="4"  align="left">{{ $fee['name'] }}</td>
                      <td align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($fee['amount'],2)}}</td>
                   </tr>
                    @php $total_amount+=$fee['amount'];
                    $after_total_fees[]=[
                            "name"=>$fee['name'],
                            "amount"=>$fee['amount'],
                            "fee_name"=>$c->fee_name,
                            "fee_rate"=>$c->fee_rate,
                            "fee_type"=>$c->fee_type,
                            "fee_apply"=>$c->fee_apply,
                            "fee_status"=>$c->fee_status
                        ];
                     @endphp
                @endif
           @endforeach
            <tr>
                <td colspan="4"  align="left"><strong>Total</strong></td>
                <td align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($total_amount,2)}}</td>
           </tr>
                 @php
                    
                        $apply_button_name="Apply";
                        $apply=0;
                        $discount=0;
                        $error=0;
                        if(Request::get("coupon")){
                            $coupon=App\Models\Coupon::where(["property_id"=>Request::get("property_id"),"code"=>Request::get("coupon")])->first();
                          
                            if($coupon){
                            
                                if($coupon->type=="excat"){
                                    if($total_amount<$coupon->amount){
                                        $error=1;
                                    }else{
                                        $apply=1;
                                        $discount=$coupon->amount;
                                        $apply_button_name="Applied";
                                    }
                                }else{
                                    if($coupon->amount>100){
                                     $error=1;
                                    }else{
                                        $apply=1;
                                        $discount=($total_amount*$coupon->amount)/100;
                                        $apply_button_name="Applied";
                                    }
                                }
                            }else{
                                $error=1;
                            }
                        }
                    @endphp
            <tr >
                <td colspan="4"  align="left">
                    <strong><input type="checkbox" {{ $apply==1?'disabled':'' }} name="is_coupon" id="is_coupon" /> Do you have coupon code?</strong>
                    
                </td>
                <td align="right"></td>
           </tr>
            <tr  id="coupon-form" style="display:none;">
                <td colspan="4"  align="left">
              
                   
                    <form method="get" action="{{ url('get-quote') }}" style="display:inline-block;">
                        <input type="text" name="coupon" style="height:35px;" value="{{Request::get('coupon')}}" placeholder="Enter Coupon Code" />
                        <button type="submit" {{ $apply==1?'disabled':'' }} class="btn btn-success {{ $apply==1?'d-none':'' }}" >{{ $apply_button_name }}</button>
                        @if($apply==0)
                            @foreach(Request::except(["coupon"]) as $key=>$c_gaurav)
                                <input type="hidden" name="{{  $key }}" value="{{ $c_gaurav }}" />
                            @endforeach
                        @endif
                     
                     </form>
                     @if($apply==1)
                    <form method="get" action="{{ url('get-quote') }}" style="display:inline-block;">
                       
                        
                            @foreach(Request::except(["coupon"]) as $key=>$c_gaurav)
                                <input type="hidden" name="{{  $key }}" value="{{ $c_gaurav }}" />
                            @endforeach
                     
                        <button type="submit"  class="btn btn-danger" > <i class="fa fa-times"></i> Remove</button>
                     </form>
                        @if($error==1)
                            <div class="text-danger">Invalid Coupon</div>
                        @endif
                        @if($apply==1)
                        <div class="text-success">Coupon code applied successfully</div>
                        @endif
                    @endif
                </td>
                <td align="right">@if($apply==1) {!! ModelHelper::getDataFromSetting('payment_currency') !!} {{number_format($discount,2)}} @endif</td>
           </tr>
           @php $remaining_total_amount=$total_amount-$discount; @endphp
            @if($apply==1)
                  <tr>
                        <td colspan="4"  align="left"><strong>Total Amount after Discount</strong></td>
                        <td align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($remaining_total_amount,2)}}</td>
                   </tr>
            @endif

@php
$days=Helper::calculateDays(date('Y-m-d'),$start_date);


$payment_interval=ModelHelper::getDataFromSetting("payment_interval");
if($payment_interval){
}else{
    $payment_interval=1;
}
//dd($payment_interval,$days);
$total_payment=$payment_interval;
$amount_data=[];
if($payment_interval==1){
        $first_amount=$remaining_total_amount;

        $first_message="Total Amount to be Paid";
        $total_payment=1;
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message];
}
elseif($payment_interval==2){

     $second_days=ModelHelper::getDataFromSetting('second_min_total_days');

    if($days>=$second_days){

        $second_per=ModelHelper::getDataFromSetting('second_payment_per');

        $second_amount=round(($remaining_total_amount*$second_per)/100,2);
        $first_amount=$remaining_total_amount-$second_amount;

        $second_days=ModelHelper::getDataFromSetting('second_how_many_days');
        $second_date=date('F jS, Y',strtotime('- '.$second_days.' days',strtotime($start_date)));


        $first_message="Initial Deposit to be Paid";
        $second_message="Final Remaining Amount Due on ".$second_date;
   
        $total_payment=2;
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message];
        $amount_data[]=["amount"=>$second_amount,"type"=>"second","message"=>$second_message]; 

    }else{
        $first_amount=$remaining_total_amount;

        $first_message="Total Amount to be Paid";
        $total_payment=1;
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message];
    } 
}
elseif($payment_interval==3){
    $second_days=ModelHelper::getDataFromSetting('second_min_total_days');
    $third_days=ModelHelper::getDataFromSetting('third_min_total_days');

    if($days>=$third_days){

        $second_per=ModelHelper::getDataFromSetting('second_third_payment_per');
        $third_per=ModelHelper::getDataFromSetting('third_payment_per');


        $second_amount=round(($remaining_total_amount*$second_per)/100,2);
        $third_amount=round(($remaining_total_amount*$third_per)/100,2);
        $first_amount=$remaining_total_amount-$second_amount-$third_amount;


        $second_days=ModelHelper::getDataFromSetting('second_third_how_many_days');
        $third_days=ModelHelper::getDataFromSetting('third_how_many_days');

        $second_date=date('F jS, Y',strtotime('- '.$second_days.' days',strtotime($start_date)));
        $third_date=date('F jS, Y',strtotime('- '.$third_days.' days',strtotime($start_date)));
        $total_payment=3;
        $first_message="Initial Deposit to be Paid";
        $second_message="Second Remaining Amount Due on ".$second_date;
        $third_message="Final Remaining Amount Due on ".$third_date;

        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message];
        $amount_data[]=["amount"=>$second_amount,"type"=>"second","message"=>$second_message]; 
        $amount_data[]=["amount"=>$third_amount,"type"=>"third","message"=>$third_message]; 

    }elseif($days>=$second_days){

        $second_per=ModelHelper::getDataFromSetting('second_payment_per');

        $second_amount=round(($remaining_total_amount*$second_per)/100,2);
        $first_amount=$remaining_total_amount-$second_amount;

        $second_days=ModelHelper::getDataFromSetting('second_how_many_days');
        $second_date=date('F jS, Y',strtotime('- '.$second_days.' days',strtotime($start_date)));


        $first_message="Initial Deposit to be Paid";
        $second_message="Final Remaining Amount Due on ".$second_date;
   
        $total_payment=2;
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message];
        $amount_data[]=["amount"=>$second_amount,"type"=>"second","message"=>$second_message]; 

    }else{
        $first_amount=$remaining_total_amount;
        $total_payment=1;
        $first_message="Total Amount to be Paid";

        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message];
    }   
}
@endphp
        @foreach($amount_data as $c)
            <tr>
                <td colspan="4"  align="left"><strong>{{$c['message']}}</strong></td>
                <td align="right">{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($c['amount'],2)}}</td>
            </tr>
        @endforeach

       </table>
            </div>

       {!! Form::open(["url"=>"save-booking-data","class"=>"","id"=>"save-booking-data"]) !!}
       
       
       
      <input type="hidden" name="discount" value="{{ $discount }}" />
      <input type="hidden" name="discount_coupon" value="{{ Request::get('coupon') }}" />
      <input type="hidden" name="after_discount_total" value="{{ $remaining_total_amount }}" />
      
  
        
        <input type="hidden" name="total_pets" value="{{ $total_pets }}">
        
        <input type="hidden" name="pet_fee" value="{{ $pet_fee }}">
        
        <input type="hidden" name="guest_fee" value="{{ $guest_fee }}">
        
        <input type="hidden" name="rest_guests" value="{{ $rest_guests }}">
        
        <input type="hidden" name="single_guest_fee" value="{{ $single_guest_fee }}">
        
        
        <input type="hidden" name="total_payment" value="{{ $total_payment }}">
        <input type="hidden" name="amount_data" value="{{ json_encode($amount_data) }}">
        <input type="hidden" name="property_id" value="{{ $property->id }}">
        <input type="hidden" name="checkin" value="{{ $start_date }}" >
        <input type="hidden" name="checkout" value="{{ $end_date }}" >
        <input type="hidden" name="total_guests" value="{{ $total_guests }}" >
        <input type="hidden" name="adults" value="{{ $adults }}" >
        <input type="hidden" name="child" value="{{ $child }}" >
        <input type="hidden" name="gross_amount" value="{{ $gross_amount }}" >
        <input type="hidden" name="total_night" value="{{ $day }}" >
        <input type="hidden" name="sub_amount" value="{{ $sub_total }}" >
        <input type="hidden" name="total_amount" value="{{ $total_amount }}" >
        <input type="hidden" name="after_total_fees" value="{{ json_encode($after_total_fees) }}">
        <input type="hidden" name="before_total_fees" value="{{ json_encode($before_total_fees) }}">
        <input type="hidden" name="request_id" value="{{ uniqid() }}" >
        <input type="hidden" name="tax" value="{{ $tax }}" >
        <input type="hidden" name="define_tax" value="{{ $define_tax }}" >
        
<input type="hidden" name="pet_fee_type" value="{{ $property->pet_fee_type }}" />
<input type="hidden" name="heating_pool_fee_type" value="{{ $property->heating_pool_fee_type }}" />
        
        
        
        <input type="hidden" name="heating_pool_fee" value="{{ $heating_pool_fee1 }}" />
        <div class="row">
            <div class="col-md-12">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label("name") !!}
                            {!! Form::text("name",null,["class"=>"form-control","required","placeholder"=>"Enter Name"])!!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label("email") !!}
                            {!! Form::email("email",null,["class"=>"form-control","required","placeholder"=>"Enter email"])!!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label("mobile") !!}
                            {!! Form::number("mobile",null,["class"=>"form-control","placeholder"=>"Enter mobile","required"])!!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label("message") !!}
                            {!! Form::textarea("message",null,["class"=>"form-control","placeholder"=>"Enter message","rows"=>"2"])!!}
                        </div>
                    </div>
                </div>
                <div class="row text-center mt-4 bttn">
                    <div class="">
                        <div class="form-group">
                            <button type="submit" class=" btn-success main-btn" name="operation" value="send-quote">Submit Request</button>
                        </div>
                    </div>
                    @if($property->instant_booking_button=="true")
                    <div class="">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class=" btn-success main-btn pay" name="operation" value="direct-booking">Pay Now</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
       {!! Form::close() !!}
       </div>
   </section>
@stop

@section("js")
<script>
    $(document).on("change","#is_coupon",function(){
        if($(this).prop("checked")==true){
            $("#coupon-form").show();
        }else{
            $("#coupon-form").hide();
        }
    });
    $(function(){
        @if(Request::get("coupon"))
            $("#is_coupon").prop("checked","true");
            $("#coupon-form").show();
        @endif
    })
</script>
@stop
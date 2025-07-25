@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("container")
    @php
        $name='Get Quote';
        $bannerImage=asset('front/images/breadcrumb.webp');
    @endphp
    @include("front.layouts.banner")
    @php 
        $before=json_decode($booking->before_total_fees,true);
        $new_result_booking_object=json_decode($booking->new_result_booking_object,true);
        $all_data=json_decode($property->all_data,true);
        if(isset($new_result_booking_object['money'])){
            $money=$new_result_booking_object['money'];
        }
        //dd($new_result_booking_object);      
    @endphp
@php
$start_date = $booking->checkin;
$days=Helper::calculateDays(date('Y-m-d'),$start_date);
$remaining_total_amount=$money['netIncome'];

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
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message,"date"=> date("Y-m-d")];
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
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message,"date"=> date("Y-m-d")];
        $amount_data[]=["amount"=>$second_amount,"type"=>"second","message"=>$second_message,"date"=> date("Y-m-d", strtotime('- '.$second_days.' days',strtotime($start_date)))]; 

    }else{
        $first_amount=$remaining_total_amount;

        $first_message="Total Amount to be Paid";
        $total_payment=1;
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message,"date"=> date("Y-m-d")];
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

        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message,"date"=> date("Y-m-d")];
        $amount_data[]=["amount"=>$second_amount,"type"=>"second","message"=>$second_message,"date"=> date("Y-m-d", strtotime('- '.$second_days.' days',strtotime($start_date)))]; 
        $amount_data[]=["amount"=>$third_amount,"type"=>"third","message"=>$third_message,"date"=> date("Y-m-d", strtotime('- '.$third_days.' days',strtotime($start_date)))]; 

    }elseif($days>=$second_days){

        $second_per=ModelHelper::getDataFromSetting('second_payment_per');

        $second_amount=round(($remaining_total_amount*$second_per)/100,2);
        $first_amount=$remaining_total_amount-$second_amount;

        $second_days=ModelHelper::getDataFromSetting('second_how_many_days');
        $second_date=date('F jS, Y',strtotime('- '.$second_days.' days',strtotime($start_date)));


        $first_message="Initial Deposit to be Paid";
        $second_message="Final Remaining Amount Due on ".$second_date;
   
        $total_payment=2;
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message,"date"=> date("Y-m-d")];
        $amount_data[]=["amount"=>$second_amount,"type"=>"second","message"=>$second_message,"date"=> date("Y-m-d", strtotime('- '.$second_days.' days',strtotime($start_date)))]; 

    }else{
        $first_amount=$remaining_total_amount;
        $total_payment=1;
        $first_message="Total Amount to be Paid";
        $amount_data[]=["amount"=>$first_amount,"type"=>"first","message"=>$first_message,"date"=> date("Y-m-d")];
    }   
}
@endphp
    
   <section class="get-quote-sec">
       <div class="container">
           <div class="row">
              <div class="col-md-12 text-center">
                  <h2>{{$property->title ?? ''}} : Booking Quote</h2>
              </div>
            </div>
            <div class="table-box">
            <div class="quote desk">
            <div class="head-area">
                <div class="row">
                <div class="col-2 col-md-2 col-sm-12 check-in">
                    <h6>Check In</h6>
                </div>
                <div class="col-2 col-md-2 col-sm-12 check-out">
                    <h6>Check Out</h6>
                </div>
                <div class="col-3 col-md-3 col-sm-12 guest">
                    <h6>Total Guests</h6>
                </div>
                <div class="col-2 col-md-2 col-sm-12 nights">
                    <h6>Total Nights</h6>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <h6> Amount</h6>
                </div>
                </div>
            </div>
            <div class="body-area">
                <div class="row">
                <div class="col-2 col-md-2 col-sm-12 check-in">
                    <p>{{date('F jS, Y',strtotime($booking->checkin))}}</p>
                </div>
                <div class="col-2 col-md-2 col-sm-12 check-out">
                    <p>{{date('F jS, Y',strtotime($booking->checkout))}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 guest">
                    <p>{{$booking->total_guests}} Guests   ({{ $booking->adults }} Adults , {{ $booking->child }} Child)</p>
                </div>
                <div class="col-2 col-md-2 col-sm-12 nights">
                    <p>{{$booking->total_night}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    
                </div>
                </div>
            </div>
            @foreach($money['invoiceItems'] as $c)  
                <div class="taxes">
                    <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 tax">            
                        <p>{{str_replace("_"," ",$c['title']) }}
                            @if(isset($c['secondIdentifier']))@if($c['secondIdentifier'] == 'DAMAGE_WAIVER')({{str_replace("_"," ",$c['secondIdentifier']) }})@endif @endif</p>                           
                    </div>
                    <div class="col-3 col-md-3 col-sm-12 amt">
                        <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($c['amount'],2)}}</p>
                    </div>
                    </div>
                </div>
            @endforeach
     
     
            <div class="total">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>Total</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($money['netIncome'],2)}}</p>
                </div>
                </div>
            </div>
            @foreach($amount_data as $c)
            <div class="total">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>{{$c['message']}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
             
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($c['amount'],2)}}</p>
                </div>
                </div>
            </div>
            @endforeach
        </div>
   
    </div>

    {!! Form::open(["route"=>["update-payment-booking-data",$booking->new_reservation_id],"class"=>"","id"=>"paymentFrm"]) !!}
        <input type="hidden" value="{{  $money['netIncome'] }}" name="total_amount">
        <input type="hidden" value="{{  json_encode($amount_data) }}" name="amount_data">
        <div class="row ">
            <div class="col-md-12">
                 <div class="row payment">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            
                          <label>Card Name <span class="text-danger">*</span></label>
                            {!! Form::text("card_name",null,["class"=>"form-control","required","placeholder"=>"Enter Card Name"])!!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            
                          <label>Card Number <span class="text-danger">*</span></label>
                            {!! Form::text("card_number",null,["class"=>"form-control","required","placeholder"=>"Enter Card Number"])!!}
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            
                          <label>Card CVV <span class="text-danger">*</span></label>
                            {!! Form::text("card_cvv",null,["class"=>"form-control","placeholder"=>"Enter Card CVV","required"])!!}
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            
                          <label>Card Expiry Month <span class="text-danger">*</span></label>
                            {!! Form::select("card_expiry_month",Helper::getMonthListArray(),null,["class"=>"form-control","required"])!!}
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            
                          <label>Card Expiry Year <span class="text-danger">*</span></label>
                            {!! Form::selectRange("card_expiry_year",date('Y'),2050,null,["class"=>"form-control","required"])!!}
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            
                          <label>Billing Address <span class="text-danger">*</span></label>
                            {!! Form::text("address_line_1",null,["class"=>"form-control","required","placeholder"=>"Enter Address Line 1"])!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            
                          <label>City <span class="text-danger">*</span></label>
                            {!! Form::text("city",null,["class"=>"form-control","required","placeholder"=>"Enter City"])!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                            {!! Form::label("zipcode *") !!}
                          <label>Zipcode <span class="text-danger">*</span></label>
                            {!! Form::text("zipcode",null,["class"=>"form-control","required","placeholder"=>"Enter Zipcode"])!!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Country <span class="text-danger">*</span></label>
                            {!! Form::select("country",Helper::getCountryListArray(),'US',["class"=>"form-control","placeholder"=>"Enter country","required"])!!}
                        </div>
                    </div>
                   
                 
               
                </div>
                <div class="row text-center mt-4 bttn">
                    <div class="">
                        <div class="form-group">
                            <button type="submit" id="submitBtn"  class=" btn-success main-btn" name="operation" value="send-quote">
                             <div class="spinner hidden" id="spinner"></div> <span id="buttonText">Pay Now</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       {!! Form::close() !!}
       </div>
   </section>
@stop
@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/css/get-quote.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/get-quote-responsive.css" />
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/js/get-quote.js" ></script>

@stop
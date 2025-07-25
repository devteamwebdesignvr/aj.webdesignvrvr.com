    @extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)

@section("container")

   @php 
        $name=$data->name;
        $bannerImage=asset('front/images/internal-banner.webp');
        $amount=$booking['total_amount'];
        $payment_currency= $setting_data['payment_currency'];
    @endphp
    @if($booking['discount'])
        @if($booking['discount']!="")
            @if($booking['discount']!=0)
            @php $amount=$booking['after_discount_total']; @endphp
            @endif
        @endif
    @endif

@php
$start_date = $booking['checkin'];
$days=Helper::calculateDays(date('Y-m-d'),$start_date);
$remaining_total_amount=$booking['total_amount'];

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
        @include("front.layouts.banner")      
      <!-- About Section -->
 
      <section class="payment">

        <div class="container">

            <div class="row">
                <h4 style="font-size: 17px; color: #222; font-weight: 600">Hey {{$booking['name']}},</h4>

                            <p style=" font-size: 15px; color: #454545; line-height: 24px; font-weight: 400; margin: 0 0 15px 0; text-align: left">Congratulations, Your booking is confirmed. You will receive an email with further details.</p>
                            
                <div class="pro-detail">
                    <div class="head-area">
                        <h6>Property Detail</h6>
                    </div>
                    <div class="body-area">
                        <div class="row">
                          <div class="col-3 col-md-3 col-sm-12 pdl">
                                <p>Property Name</p>
                            </div>
                            <div class="col-9 col-md-9 col-sm-12 amt">
                                <p>{{$property->title }}</p>
                            </div>  
                        </div>
                    </div>
                </div>
                
                         
             
                   
                <h3 class="quote-head">Booking Detail</h3>
                <div class="quote">
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
                    <h6>Gross Amount</h6>
                </div>
                </div>
            </div>
            <div class="body-area">
                <div class="row">
                <div class="col-2 col-md-2 col-sm-12 check-in">
                    <p>{{$booking['checkin'] }}</p>
                </div>
                <div class="col-2 col-md-2 col-sm-12 check-out">
                    <p>{{$booking['checkout'] }}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 guest">
                    <p>{{$booking['total_guests'] }} ({{$booking['adults']}} Adults, {{$booking['child']}} Child)</p>
                </div>
                <div class="col-2 col-md-2 col-sm-12 nights">
                    <p>{{$booking['total_night'] }}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p></p>
                </div>
                </div>
            </div>
             @foreach(json_decode($booking['before_total_fees']) as $c)
            <div class="misc">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 mis">
                    <p>{{$c->title}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! $payment_currency !!}{{number_format($c->amount,2) }}</p>
                </div>
                </div>
            </div>
            
            @endforeach
            @if($booking['tax'])
            <div class="taxes" style="display:none;">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tax">
                    <p>Total Taxes</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! $payment_currency !!}{{number_format($booking['tax'],2) }}</p>
                </div>
                </div>
            </div>
            @endif
           
            @if($amount_data)
            <div class="total">
                <div class="row">
                 @foreach($amount_data as $c)   
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>{{$c['message']}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! $payment_currency !!}{{number_format($c['amount'],2)}}</p>
                </div>
                @endforeach
                </div>
            </div>
            @endif

            <div class="total">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>Total </p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! $payment_currency !!}{{number_format($booking['total_amount'],2) }}</p>
                </div>
                </div>
            </div>
            </div>


            </div>

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
    
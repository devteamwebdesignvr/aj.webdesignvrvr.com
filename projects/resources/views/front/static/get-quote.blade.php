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
      @php
        $guestyapi=$main_data['guestyapi'];
        $start_date=$main_data["start_date"];
        $end_date=$main_data["end_date"];
        $adults=$main_data["adults"];
        $child=$main_data["child"];
        $total_guests=$adults+$child;
        if(isset($guestyapi['data']['rates']['ratePlans'])){            
            if(isset($guestyapi['data']['rates']['ratePlans'][0])){
                if(isset($guestyapi['data']['rates']['ratePlans'][0]['ratePlan'])){               
                    if(isset($guestyapi['data']['rates']['ratePlans'][0]['ratePlan']['money'])){                                    
                        $moneyData=$guestyapi['data']['rates']['ratePlans'][0]['ratePlan']['money'];
                        $rate_api_id=$guestyapi['data']['rates']['ratePlans'][0]['ratePlan']['_id'];
                        $gross_amount=$moneyData['fareAccommodation'];
                        $sub_total=$moneyData['subTotalPrice'];
                        $total_amount=$moneyData['hostPayout'];
                        $taxes=$moneyData['totalTaxes'];
                        $before_total_fees=$moneyData['invoiceItems'];
                        $quote_id=$guestyapi['data']['_id'];
                    }else{
                        @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
                    }
                }else{
                    @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
                }
            }else{
                @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
            }
        }else{
            @endphp <script>window.location = "{{ url($property->seo_url) }}";</script> @php
        } 
        $total_guests=$main_data["adults"]+$main_data["childs"];
        $gross_amount=$gross_amount;
        $tax=0;
        $now = strtotime($start_date); 
        $your_date = strtotime($end_date);
        $datediff =  $your_date-$now;
        $day= ceil($datediff / (60 * 60 * 24));
        $total_night=$day;
        $after_total_fees=[];
        $pet_fee=0;
        $total_pets=0;
        $amount_data=[];
        $total_payment=$total_amount;
        $after_total_fees=[];
        $define_tax=0;
        
        foreach($before_total_fees as $b){
            if($b['type']=="ACCOMMODATION_FARE"){               
            } else if($b['type']=="CLEANING_FEE"){                
            } elseif($b['type']!="TAX"){
                if($b['normalType']=="AFE"){
                    $type='DAMAGE_WAIVER';
                }else{
                    $type=$b['type'];
                }
                /*  if($type == 'DAMAGE_WAIVER'){
                       $before_total_fees[] = [
                                "title" => $b['title'] . "(".str_replace("_"," ",$type).")",
                                "amount" => $b['amount'],
                                "normalType" => $b['normalType'],
                                "secondIdentifier" => $type,
                            ];
                        $total_amount += $b['amount'];
                   }
*/
            }
        }
    @endphp


@php
$days=Helper::calculateDays(date('Y-m-d'),$start_date);

$remaining_total_amount=$total_amount;

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
                    <p>{{date('F jS, Y',strtotime($start_date))}}</p>
                </div>
                <div class="col-2 col-md-2 col-sm-12 check-out">
                    <p>{{date('F jS, Y',strtotime($end_date))}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 guest">
                    <p>{{$total_guests}} Guests   ({{ $adults }} Adults , {{ $child }} Child)</p>
                </div>
                <div class="col-2 col-md-2 col-sm-12 nights">
                    <p>{{$day}}</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    
                </div>
                </div>
            </div>
            @foreach($before_total_fees as $c)
                <div class="taxes">
                    <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 tax">
                        <p>{{str_replace("_"," ",$c['title']) }}</p>
                    </div>
                    <div class="col-3 col-md-3 col-sm-12 amt">
                        <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($c['amount'],2)}}</p>
                    </div>
                    </div>
                </div>
            @endforeach
            @php    $apply_button_name="Apply";$apply=0;$error=0; @endphp
            <div class="coupon ">
                <div class="row">
                    <div class="col-9 coupon-field" id="coupon-form" >
                        <div class="coupon-head"><strong>Do you have discount code?</strong></div>
                        @if(Request::get("coupon"))
                           <form method="get" action="{{ url('get-quote') }}" style="display:inline-block;">
                                @foreach(Request::except(["coupon"]) as $key=>$c_gaurav)
                                    <input type="hidden" name="{{  $key }}" value="{{ $c_gaurav }}" />
                                @endforeach
                                <input type="text" disabled name="coupon" style="height:35px;" value="{{Request::get('coupon')}}" placeholder="Enter Coupon Code" />
                                <button type="submit"  class="btn btn-danger main-btn" > <i class="fa fa-times"></i> Remove</button>
                            </form>
                        @else
                            <form method="get" action="{{ url('get-quote') }}" style="display:inline-block;">
                                <input type="text" name="coupon" style="height:35px;" value="{{Request::get('coupon')}}" placeholder="Enter Coupon Code" />
                                <button type="submit" {{ $apply==1?'disabled':'' }} class="btn btn-success main-btn {{ $apply==1?'d-none':'' }}" >{{ $apply_button_name }}</button>
                                @if($apply==0)
                                    @foreach(Request::except(["coupon"]) as $key=>$c_gaurav)
                                        <input type="hidden" name="{{  $key }}" value="{{ $c_gaurav }}" />
                                    @endforeach
                                @endif
                            </form>
                        @endif
                        @if($apply==1)
                            @if($error==1)
                                <div class="text-danger">Invalid Coupon</div>
                            @endif
                            @if($apply==1)
                            <div class="text-success">Coupon code applied successfully</div>
                            @endif
                        @endif 
                    </div>
                    <div class="col-3 coupon-currency">
                        @if($apply==1) {!! ModelHelper::getDataFromSetting('payment_currency') !!} {{number_format($discount,2)}} @endif
                    </div>
                </div>
            </div>
            <div class="total" style="display:none;">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>Total Taxes</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($taxes,2)}}</p>
                </div>
                </div>
            </div>
            <div class="total">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>Total</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($total_amount,2)}}</p>
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
        <div class="quote mob">
            <div class="check-in">
                <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 g-amt">
                    <p>Check In</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{{date('F jS, Y',strtotime($start_date))}}</p>
                </div>
                </div>
            </div>
            <div class="check-out">
                <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 g-amt">
                    <p>Check Out</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{{date('F jS, Y',strtotime($end_date))}}</p>
                </div>
                </div>
            </div>
            <div class="guest">
                <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 g-amt">
                    <p>Total Guests</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{{$total_guests}} Guests   ({{ $adults }} Adults , {{ $child }} Child)</p>
                </div>
                </div>
            </div>
            <div class="nights">
                <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 g-amt">
                    <p>Total Nights</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{{$day}}</p>
                </div>
                </div>
            </div>
            <div class="amt">
                <div class="row">
                    <div class="col-9 col-md-9 col-sm-12 g-amt">
                    <p>Amount</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p></p>
                </div>
                </div>
            </div>
             @foreach($before_total_fees as $c)
                        <div class="taxes">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tax">
                    <p>{{str_replace("_"," ",$c['title']) }}</p>
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
                    <p>Sub Total</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($sub_total,2)}}</p>
                </div>
                </div>
            </div>
            <div class="total" style="display:none;">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>Total Taxes</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($taxes,2)}}</p>
                </div>
                </div>
            </div>
            <div class="total">
                <div class="row">
                <div class="col-9 col-md-9 col-sm-12 tl">
                    <p>Total</p>
                </div>
                <div class="col-3 col-md-3 col-sm-12 amt">
                    <p>{!! ModelHelper::getDataFromSetting('payment_currency') !!}{{number_format($total_amount,2)}}</p>
                </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(["url"=>"save-booking-data","class"=>"","id"=>"paymentFrm"]) !!}
        <input type="hidden" name="discount" value="{{ 0 }}" />
        <input type="hidden" name="discount_coupon" value="{{ Request::get('coupon') }}" />
        <input type="hidden" name="total_pets" value="{{ 0 }}">
        <input type="hidden" name="pet_fee" value="{{ 0 }}">
        <input type="hidden" name="guest_fee" value="{{ 0 }}">
        <input type="hidden" name="rest_guests" value="{{ 0 }}">
        <input type="hidden" name="single_guest_fee" value="{{ 0 }}">
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
        <input type="hidden" name="tax" value="{{ $taxes }}" >
        <input type="hidden" name="define_tax" value="{{ 0 }}" >
        <input type="hidden" name="rate_api_id" value="{{ $rate_api_id }}">
        <input type="hidden" name="stripe_intent_data_id" value="" id="stripe_intent_data_id">
        <input type="hidden" name="stripe_main_payment_method" value="" id="stripe_main_payment_method">
        <input type="hidden" name="quote_id" value="{{ $quote_id }}" >
        {{-- <div class="row ">
            <div class="col-md-12">
                 <div class="row payment">
                    <div class="col-md-6">
                        <div class="form-group">
                            
                           <label>First Name <span class="text-danger">*</span></label>
                            {!! Form::text("firstname",null,["class"=>"form-control","required","placeholder"=>"Enter First Name","id"=>"first_name"])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            
                           <label>Last Name <span class="text-danger">*</span></label>
                            {!! Form::text("lastname",null,["class"=>"form-control","required","placeholder"=>"Enter Last Name","id"=>"last_name"])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            
                           <label>Email ID <span class="text-danger">*</span></label>
                            {!! Form::email("email",null,["class"=>"form-control","required","placeholder"=>"Enter email","id"=>"email"])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            
                           <label>Mobile Number <span class="text-danger">*</span></label>
                            {!! Form::number("mobile",null,["class"=>"form-control","placeholder"=>"Enter mobile","required"])!!}
                        </div>
                    </div>
                    @php
                     $all_data= GuestyApi::getAdditionalFeeData($property->_id);
                    if(isset($all_data['data'])){
                        if(isset($all_data['data']['isPetsAllowed'])){
                            if($all_data['data']['isPetsAllowed']==true){
                                    @endphp
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label("Pet") !!}
                                                {!! Form::selectRange("total_pets",0,2,null,["class"=>"form-control","placeholder"=>"Choose Pet"])!!}
                                            </div>
                                        </div>
                                    @php
                            }      
                        }
                    }
                    @endphp
                </div>
                <div class="row text-center mt-4 bttn">
                    <div class="">
                        <div class="form-group">
                            <button type="submit" id="submitBtn"  class=" btn-success main-btn" name="operation" value="send-quote">
                             <div class="spinner hidden" id="spinner"></div> <span id="buttonText">Book Now</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row ">
            <div class="col-md-12">
                <div class="row payment">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            {!! Form::text("firstname", null, ["class" => "form-control", "required", "placeholder" => "Enter First Name", "id" => "first_name"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            {!! Form::text("lastname", null, ["class" => "form-control", "required", "placeholder" => "Enter Last Name", "id" => "last_name"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email ID <span class="text-danger">*</span></label>
                            {!! Form::email("email", null, ["class" => "form-control", "required", "placeholder" => "Enter email", "id" => "email"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile Number <span class="text-danger">*</span></label>
                            {!! Form::number("mobile", null, ["class" => "form-control", "placeholder" => "Enter mobile", "required"]) !!}
                        </div>
                    </div>
        
                    @php
                    $all_data = GuestyApi::getAdditionalFeeData($property->_id);
                    if (isset($all_data['data'])) {
                        if (isset($all_data['data']['isPetsAllowed'])) {
                            if ($all_data['data']['isPetsAllowed'] == true) {
                    @endphp
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("Pet") !!}
                                        {!! Form::selectRange("total_pets", 0, 2, null, ["class" => "form-control", "placeholder" => "Choose Pet"]) !!}
                                    </div>
                                </div>
                    @php
                            }
                        }
                    }
                    @endphp
        
                    <!-- New Fields for Card Information -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Card Number <span class="text-danger">*</span></label>
                            {!! Form::text("card_number", null, ["class" => "form-control", "required", "placeholder" => "Enter Card Number", "id" => "card_number"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Card CVV <span class="text-danger">*</span></label>
                            {!! Form::text("card_cvv", null, ["class" => "form-control", "required", "placeholder" => "Enter CVV", "id" => "card_cvv", "minlength" => "3"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Card Expiry Year <span class="text-danger">*</span></label>
                            {!! Form::selectRange("card_expiry_year", date('Y'), date('Y') + 10, null, ["class" => "form-control", "required", "placeholder" => "Select Year"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">                            
                          <label>Card Expiry Month <span class="text-danger">*</span></label>
                            {!! Form::select("card_expiry_month",Helper::getMonthListArray(),null,["class"=>"form-control","required"])!!}
                        </div>
                    </div>                  
        
                    <!-- New Fields for Billing Address -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1 <span class="text-danger">*</span></label>
                            {!! Form::text("address_line_1", null, ["class" => "form-control", "required", "placeholder" => "Enter Address Line 1", "id" => "address_line_1"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City <span class="text-danger">*</span></label>
                            {!! Form::text("city", null, ["class" => "form-control", "required", "placeholder" => "Enter City", "id" => "city"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Zip Code <span class="text-danger">*</span></label>
                            {!! Form::text("zipcode", null, ["class" => "form-control", "required", "placeholder" => "Enter Zip Code", "id" => "zipcode"]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            {!! Form::select("country",Helper::getCountryListArray(),'US',["class"=>"form-control","placeholder"=>"Enter country","required"])!!}
                        </div>
                    </div>
                </div>
                <div class="row text-center mt-4 bttn">
                    <div class="">
                        <div class="form-group">
                            <button type="submit" id="submitBtn" class="btn-success main-btn" name="operation" value="send-quote">
                                <div class="spinner hidden" id="spinner"></div> <span id="buttonText">Book Now</span>
                            </button>
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
    });
</script>
@stop
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
                        @endphp <script>window.location = "{{ url('properties/detail/'.$property->seo_url) }}";</script> @php
                    }
                }else{
                    @endphp <script>window.location = "{{ url('properties/detail/'.$property->seo_url) }}";</script> @php
                }
            }else{
                @endphp <script>window.location = "{{ url('properties/detail/'.$property->seo_url) }}";</script> @php
            }
        }else{
            @endphp <script>window.location = "{{ url('properties/detail/'.$property->seo_url) }}";</script> @php
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
            @php
                    
                        $apply_button_name="Apply";
                        $apply=0;
                      
                        $error=0;
                        if(Request::get("coupon")){
                            
                          
                            
                           
                        }
                    @endphp
            <div class="coupon">
                <div class="row">
                    <div class="col-4 coupon-head">
                        <strong>Do you have coupon code?</strong>
                    </div>
                    <div class="col-4 coupon-field" id="coupon-form" style="display:none;">
                         @if(Request::get("coupon"))
                       <form method="get" action="{{ url('get-quote') }}" style="display:inline-block;">
                       
                        
                            @foreach(Request::except(["coupon"]) as $key=>$c_gaurav)
                                <input type="hidden" name="{{  $key }}" value="{{ $c_gaurav }}" />
                            @endforeach
                        <input type="text" disabled name="coupon" style="height:35px;" value="{{Request::get('coupon')}}" placeholder="Enter Coupon Code" />
                        <button type="submit"  class="btn btn-danger" > <i class="fa fa-times"></i> Remove</button>
                     </form>
                   @else
                    <form method="get" action="{{ url('get-quote') }}" style="display:inline-block;">
                        <input type="text" name="coupon" style="height:35px;" value="{{Request::get('coupon')}}" placeholder="Enter Coupon Code" />
                        <button type="submit" {{ $apply==1?'disabled':'' }} class="btn btn-success {{ $apply==1?'d-none':'' }}" >{{ $apply_button_name }}</button>
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
                    <div class="col-4 coupon-currency">
                        @if($apply==1) {!! ModelHelper::getDataFromSetting('payment_currency') !!} {{number_format($discount,2)}} @endif
                    </div>
                </div>
            </div>
            <div class="total">
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

            
            <div class="total">
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
        
        <div id="paymentResponse" class="hidden"></div>
                
        <div class="row ">
            <div class="col-md-12">
                 <div class="row payment">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label("first name") !!}
                            {!! Form::text("firstname",null,["class"=>"form-control","required","placeholder"=>"Enter First Name","id"=>"first_name"])!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label("last name") !!}
                            {!! Form::text("lastname",null,["class"=>"form-control","required","placeholder"=>"Enter Last Name","id"=>"last_name"])!!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label("email") !!}
                            {!! Form::email("email",null,["class"=>"form-control","required","placeholder"=>"Enter email","id"=>"email"])!!}
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
                <div id="paymentElement">
                        <!--Stripe.js injects the Payment Element-->
                    </div>
                <div id="frmProcess" class="hidden">
                    <span class="ring"></span> 
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
    })
</script>
    <!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe_intent_data='';
        var stripe_intent_data_id='';
        $.get("{{ url('getIntendentData') }}",function(data){
            if(data.status==200){
                stripe_intent_data=data.stripe_object;    
                stripe_intent_data_id=data.stripe_object.client_secret;

            }else{
                stripe_intent_data='';
                stripe_intent_data_id='';
            }
            $("#stripe_intent_data_id").val(stripe_intent_data_id);
        });
        // Get API Key
        let STRIPE_PUBLISHABLE_KEY = "{{ ModelHelper::getDataFromSetting('stripe_publish_key') }}";
        // Create an instance of the Stripe object and set your publishable API key
        const stripe = Stripe(STRIPE_PUBLISHABLE_KEY);
        let clientSecret1;
        let elements; // Define card elements
        let cardElement;
        const paymentFrm = document.querySelector("#paymentFrm"); // Select payment form element
        // Get payment_intent_client_secret param from URL
        const clientSecretParam = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );
        // Check whether the payment_intent_client_secret is already exist in the URL
        setProcessing(true);
        if(!clientSecretParam){
            setProcessing(false);
            // Create an instance of the Elements UI library and attach the client secret
            initialize();
        }
        // Attach an event handler to payment form
        paymentFrm.addEventListener("submit", handleSubmit);
        // Fetch a payment intent and capture the client secret
        let payment_intent_id;
        async function initialize() {
            const { id, clientSecret } = await fetch("{{route('payment_init') }}", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ request_type:'create_payment_intent',total_amount:"{{ $total_amount }}" }),
            }).then((r) => r.json());
        let elements = stripe.elements();
        var style = {
            base: {
                lineHeight: "30px",
                fontSize: "16px",
                border: "1px solid #ced4da",
            }
        };
        cardElement = elements.create('card', { style: style });
        cardElement.mount('#paymentElement');
            payment_intent_id = id;
        }
        // Card form submit handler
        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);
            let customer_name = document.getElementById("first_name").value+ " "+ document.getElementById("last_name").value;
            let customer_email = document.getElementById("email").value;
            stripe
              .confirmCardSetup(stripe_intent_data_id, {
                payment_method: {
                  card: cardElement,
                  billing_details: {
                    name: customer_name,
                    email: customer_email,
                  },
                },
              })
              .then(function(result) {
                // Handle result.error or result.setupIntent
                 if (typeof result === 'undefined' || result === null) {
                    // variable is undefined or null
                }else{
                    if (typeof result.setupIntent === 'undefined' || result.setupIntent === null) {
                        // variable is undefined or null
                         if (typeof result.error === 'undefined' || result.error === null) {
                            // variable is undefined or null
                        }else{
                            showMessage(error.message);
                        }
                    }else{
                        if(result.setupIntent.status=="succeeded"){
                            $("#stripe_main_payment_method").val(result.setupIntent.payment_method);
                            $("#paymentFrm").submit()
                        }else{
                            showMessage("Something Happen");   
                        }
                    }
                }
                console.log(result);
              });
            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            setLoading(false);
        }
        // Display message
        function showMessage(messageText) {
            const messageContainer = document.querySelector("#paymentResponse");
            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;
            setTimeout(function () {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 5000);
        }
        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submitBtn").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#buttonText").classList.add("hidden");
            } else {
                // Enable the button and hide spinner
                document.querySelector("#submitBtn").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#buttonText").classList.remove("hidden");
            }
        }
        // Show payment re-initiate button
        function setReinit() {
            document.querySelector("#frmProcess").classList.add("hidden");
            document.querySelector("#payReinit").classList.remove("hidden");
        }
        // Show a spinner on payment form processing
        function setProcessing(isProcessing) {
            if (isProcessing) {
                paymentFrm.classList.add("hidden");
                document.querySelector("#frmProcess").classList.remove("hidden");
            } else {
                paymentFrm.classList.remove("hidden");
                document.querySelector("#frmProcess").classList.add("hidden");
            }
        }
    </script>
@stop
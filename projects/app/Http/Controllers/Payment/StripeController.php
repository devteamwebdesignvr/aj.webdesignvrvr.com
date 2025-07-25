<?php
namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingRequest;
use App\Models\Property;
use App\Models\Payment;
use Stripe;
use Session;
use ModelHelper;
use MailHelper;
use App\Models\Guesty\GuestyProperty;

class StripeController extends Controller
{
    function index(Request $request,$id){
        $booking=BookingRequest::find($id);
        if($booking){
            $property=GuestyProperty::find($booking->property_id);
            if($property){
                $data = new \stdClass();
                $data->name="Stripe Payment Booking ";
                $data->meta_title="Stripe Payment Booking ";
                $data->meta_keywords="Stripe Payment Booking ";
                $data->meta_description="Stripe Payment Booking ";
                $booking=$booking->toArray();
                return view("front.booking.payment.stripe",compact("booking","data","property"));
            }
        }
        return abort(404);
    }

    function indexPost(Request $request,$id){
        $booking=BookingRequest::find($id);
        if($booking){
            $property=GuestyProperty::find($booking->property_id);
            if($property){
                try {
                    Stripe\Stripe::setApiKey(ModelHelper::getDataFromSetting('stripe_secret_key'));
                    $customer = Stripe\Customer::create(array("email" => $booking->email,"source" => $request->stripeToken,));
                    $amount=$request->amount;
                    $charge=Stripe\Charge::create (['customer' => $customer->id,"amount" => $amount * 100,"currency" => "usd","description" => "Payment for ".$property->name]);
                    $chargeJson=$charge->jsonSerialize();
                    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
                        $payment=Payment::create(['booking_id'=>$booking->id,'receipt_url'=>$chargeJson['receipt_url'] ,'customer_id'=>$chargeJson['customer'] ,'balance_transaction'=>$chargeJson['balance_transaction'] ,'tran_id'=>$chargeJson['id'] ,'description'=>json_encode($chargeJson),'status'=>"complete",'type'=>"stripe",'amount'=>$amount]);
                        ModelHelper::finalEmailAndUpdateBookingPayment($id,$booking,$payment,$property);
                        return redirect('payment/success/'.$payment->id)->with("success","successfully Payment");
                    }else{
                        $message="something happen";
                    }
                } catch(Stripe\Exception\CardException $e) {
                  $message =$e->getError()->message ;
                } catch (Stripe\Exception\RateLimitException $e) {
                    $message =$e->getError()->message ;
                } catch (Stripe\Exception\InvalidRequestException $e) {
                    $message =$e->getError()->message ;
                } catch (Stripe\Exception\AuthenticationException $e) {
                    $message =$e->getError()->message ;
                } catch (Stripe\Exception\ApiConnectionException $e) {
                    $message =$e->getError()->message ;
                } catch (Stripe\Exception\ApiErrorException $e) {
                    $message =$e->getError()->message ;
                } catch (Exception $e) {
                    $message =$e->getError()->message ;
                }
            }else{
                $message="property is not longer";
            }
        }else{
            $message="Booking is invalid";
        }
        return redirect()->back()->with("danger",$message);
    }

    function getIntendentData(){
        $stripe_obj=''; $status=400; $message='';
        try {
            $stripe = new \Stripe\StripeClient(ModelHelper::getDataFromSetting('stripe_secret_key'));
            $stripe_obj=($stripe->setupIntents->create(['automatic_payment_methods' => ['enabled' => true,],]));
            $status=200;
            $message="success";
        } catch(Stripe\Exception\CardException $e) {
          $message =$e->getError()->message ;
        } catch (Stripe\Exception\RateLimitException $e) {
            $message =$e->getError()->message ;
        } catch (Stripe\Exception\InvalidRequestException $e) {
            $message =$e->getError()->message ;
        } catch (Stripe\Exception\AuthenticationException $e) {
            $message =$e->getError()->message ;
        } catch (Stripe\Exception\ApiConnectionException $e) {
            $message =$e->getError()->message ;
        } catch (Stripe\Exception\ApiErrorException $e) {
            $message =$e->getError()->message ;
        } catch (Exception $e) {
            $message =$e->getError()->message ;
        }
        return response()->json(["status"=>$status,"message"=>$message,"stripe_object"=>$stripe_obj]);
    }

    function payment_init(Request $request){
        try { 
            Stripe\Stripe::setApiKey(ModelHelper::getDataFromSetting('stripe_secret_key'));
            $itemPriceCents=$request->total_amount*100;
            $paymentIntent = Stripe\PaymentIntent::create([ 'amount' => $itemPriceCents, 'currency' => 'USD', 'description' => 'Website Payment ', 'payment_method_types' => [ 'card' ] ]); 
            $output = [ 'id' => $paymentIntent->id, 'clientSecret' => $paymentIntent->client_secret ]; 
            echo json_encode($output); 
        } catch (Error $e) { 
            http_response_code(500); 
            echo json_encode(['error' => $e->getMessage()]); 
        } 
    }
}
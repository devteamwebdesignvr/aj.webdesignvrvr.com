<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;


class WebhookController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth'); // later enable it when needed user login
    }
  
    
    public function setReviewsWebhooks(Request $request){   
        Log::channel('hospitable_webhooks')->info($request->all());
        Log::channel('hospitable_webhooks')->info('Hospitable Review Webhook Received', [           
            'payload' => $request->all(),
        ]); 
      
    }

    public function setReservationsWebhooks(Request $request){
        Log::channel('hospitable_webhooks')->info($request->all());
        Log::channel('hospitable_webhooks')->info('Hospitable Reservation Webhook Received', [           
            'payload' => $request->all(),
        ]); 
        
         /**if(! $this->verifyHostawaySignature($request)) {
            Log::channel('hostaway_webhooks')->warning('Hostaway Webhook: Invalid Signature', [
                'ip' => $request->ip(),
                'payload' => $request->all(),
            ]);
            return response()->json(['error' => 'Invalid signature'], Response::HTTP_UNAUTHORIZED);
        } **/
        
        /**$eventType = $request->header('X-Hostaway-Event');
          
        $payload = $request->all();
      
        if (isset($payload['event']) && is_string($payload['event'])) {
             $eventType = $payload['event'];
        } else {
             $eventType = 'unknown_event_type';
        }

        Log::channel('hostaway_webhooks')->info("Hostaway Webhook Event Type: {$eventType}");
      
        try {             
            switch ($eventType) {
                case 'reservation.created':
                    $this->handleReservationCreate($payload);
                    break;
                case 'reservation.updated':
                    $this->handleReservationUpdated($payload);
                    break;
              
                default:
                    Log::info('Hostaway Webhook: Unhandled Event Type', ['event_type' => $eventType]);
                    break;
            }
          
            return response()->json(['message' => 'Webhook received successfully'], Response::HTTP_OK);

        } catch (\Exception $e) {
           Log::channel('hostaway_webhooks')->error('Hostaway Webhook Processing Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'payload' => $payload,
            ]);          
            return response()->json(['error' => 'Internal server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } **/
    }  
    
   public function handleReservationCreate($payload){
       
   }

   public function handleReservationUpdated($payload){
       
   }

  
   protected function verifyHostawaySignature(Request $request): bool
    {
        
    } 
  
      
  
  
   public function test(){
      
   }
   
}
<?php 
namespace App\Helper;

use Auth;
use DB;
use App\Models\BasicSetting;
use App\Models\EmailTemplete;

use Mail;
use Config;
use ModelHelper;

/**
 * Class Helper
 * @package App\Helper
 */
class MailHelper{

    public function __construct(){
      
    }
   


    function emailSender($mailData){
        $temp = EmailTemplete::where('email_type','=',$mailData['type'])->first();
        if($temp){
            $body=$temp->email_body;
            if(isset($mailData['useremail'])){
                $body = preg_replace("/{useremail}/", $mailData['useremail'] ,$body);
            }
            if(isset($mailData['username'])){
                $body = preg_replace("/{username}/", $mailData['username'] ,$body);
            }
            if(isset($mailData['usermobile'])){
                $body = preg_replace("/{usermobile}/", $mailData['usermobile'] ,$body);
            }
            if(isset($mailData['first_name'])){
                $body = preg_replace("/{first_name}/", $mailData['first_name'] ,$body);
            }
            if(isset($mailData['last_name'])){
                $body = preg_replace("/{last_name}/", $mailData['last_name'] ,$body);
            }
            if(isset($mailData['email'])){
                $body = preg_replace("/{email}/", $mailData['email'] ,$body);
            }
            if(isset($mailData['mobile'])){
                $body = preg_replace("/{mobile}/", $mailData['mobile'] ,$body);
            }
            if(isset($mailData['bill_to_address'])){
                $body = preg_replace("/{bill_to_address}/", $mailData['bill_to_address'] ,$body);
            }
            if(isset($mailData['rental_property_address'])){
                $body = preg_replace("/{rental_property_address}/", $mailData['rental_property_address'] ,$body);
            }
            if(isset($mailData['owner_birthday'])){
                $body = preg_replace("/{owner_birthday}/", $mailData['owner_birthday'] ,$body);
            }
            if(isset($mailData['company_name'])){
                $body = preg_replace("/{company_name}/", $mailData['company_name'] ,$body);
            }
            if(isset($mailData['social_security_number'])){
                $body = preg_replace("/{social_security_number}/", $mailData['social_security_number'] ,$body);
            }
            if(isset($mailData['business_ein_number'])){
                $body = preg_replace("/{business_ein_number}/", $mailData['business_ein_number'] ,$body);
            }
            if(isset($mailData['routing_number_of_deposites'])){
                $body = preg_replace("/{routing_number_of_deposites}/", $mailData['routing_number_of_deposites'] ,$body);
            }
            if(isset($mailData['account_number'])){
                $body = preg_replace("/{account_number}/", $mailData['account_number'] ,$body);
            }
            if(isset($mailData['account_name'])){
                $body = preg_replace("/{account_name}/", $mailData['account_name'] ,$body);
            }
            if(isset($mailData['account_card_number'])){
                $body = preg_replace("/{account_card_number}/", $mailData['account_card_number'] ,$body);
            }
            if(isset($mailData['account_exp'])){
                $body = preg_replace("/{account_exp}/", $mailData['account_exp'] ,$body);
            }
            if(isset($mailData['account_cvv'])){
                $body = preg_replace("/{account_cvv}/", $mailData['account_cvv'] ,$body);
            }
            if(isset($mailData['housekeeping_closet_access'])){
                $body = preg_replace("/{housekeeping_closet_access}/", $mailData['housekeeping_closet_access'] ,$body);
            }
            if(isset($mailData['wifi_lock_Access'])){
                $body = preg_replace("/{wifi_lock_Access}/", $mailData['wifi_lock_Access'] ,$body);
            }
            if(isset($mailData['security_camera_login_instruction'])){
                $body = preg_replace("/{security_camera_login_instruction}/", $mailData['security_camera_login_instruction'] ,$body);
            }
            if(isset($mailData['usermobile'])){
                $body = preg_replace("/{usermobile}/", $mailData['usermobile'] ,$body);
            }
            if(isset($mailData['usermobile'])){
                $body = preg_replace("/{usermobile}/", $mailData['usermobile'] ,$body);
            }
            if(isset($mailData['usermobile'])){
                $body = preg_replace("/{usermobile}/", $mailData['usermobile'] ,$body);
            }
           
            if(isset($mailData['usermessage'])){
                $body = preg_replace("/{usermessage}/", $mailData['usermessage'] ,$body);
            }
            if(isset($mailData['date_of_request'])){
                $body = preg_replace("/{date_of_request}/", $mailData['date_of_request'] ,$body);
            }
            if(isset($mailData['guests'])){
                $body = preg_replace("/{guests}/", $mailData['guests'] ,$body);
            }
            if(isset($mailData['budget'])){
                $body = preg_replace("/{budget}/", $mailData['budget'] ,$body);
            }
            if(isset($mailData['property_address'])){
                $body = preg_replace("/{property_address}/", $mailData['property_address'] ,$body);
            }
            if(isset($mailData['userpropertyname'])){
                $body = preg_replace("/{userpropertyname}/", $mailData['userpropertyname'] ,$body);
            }
            
            
            
            if(isset($mailData['property_type'])){
                $body = preg_replace("/{property_type}/", $mailData['property_type'] ,$body);
            }
            if(isset($mailData['number_of_bedrooms'])){
                $body = preg_replace("/{number_of_bedrooms}/", $mailData['number_of_bedrooms'] ,$body);
            }
            if(isset($mailData['number_of_bathrooms'])){
                $body = preg_replace("/{number_of_bathrooms}/", $mailData['number_of_bathrooms'] ,$body);
            }
            if(isset($mailData['what_is_your_rental_goal'])){
                $body = preg_replace("/{what_is_your_rental_goal}/", $mailData['what_is_your_rental_goal'] ,$body);
            }
            if(isset($mailData['what_are_you_looking_to_rent_your_property'])){
                $body = preg_replace("/{what_are_you_looking_to_rent_your_property}/", $mailData['what_are_you_looking_to_rent_your_property'] ,$body);
            }
            if(isset($mailData['is_the_property_currently_closed'])){
                $body = preg_replace("/{is_the_property_currently_closed}/", $mailData['is_the_property_currently_closed'] ,$body);
            }

            $data = ['email_body' => $body];
            $objDemo = new \stdClass();
            $objDemo->to = explode(',',$mailData['to']);
            $objDemo->from = ModelHelper::getDataFromSetting("mail_from");
            $objDemo->title = ModelHelper::getDataFromSetting("mail_from_name");
            $objDemo->subject = $temp->email_subject;
            try{
                Mail::send('mail.dummyMail',$data, function ($message) use ($objDemo) {
                    $message->from($objDemo->from,$objDemo->title);
                    $message->to($objDemo->to);
                    $message->subject($objDemo->subject);
                });
            }
            catch (\Exception $e){
                 ($e->getMessage());
            }
        }
    }

    function emailSenderByController($html,$to,$subject,$files=[]){
        $data = ['email_body' => $html];
        $objDemo = new \stdClass();
        $objDemo->to = explode(',',$to);
        $objDemo->from = ModelHelper::getDataFromSetting("mail_from");
        $objDemo->title = ModelHelper::getDataFromSetting("mail_from_name");
        $objDemo->subject = $subject;
        try{
            Mail::send('mail.dummyMail',$data, function ($message) use ($objDemo,$files) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
                if(count($files)>0){
                    foreach ($files as $file){
                        $message->attach($file);
                    }
                }
            });
        }
        catch (\Exception $e){
             ($e->getMessage());
        }
    }
}
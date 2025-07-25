<?php 
namespace App\Helper;
use App\Models\BasicSetting;
use DB;
use Auth;
use Mail;
use App\Models\EmailTemplete;
use App\Models\User;
use MailHelper;
use Session;
use LiveCart;
use Helper;
use GuestyApi;
use App\Models\PropertyGallery;
use App\Models\Blogs\BlogGallery;
use App\Models\Blogs\BlogCategory;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyRate;
use App\Models\BookingRequest;
use App\Models\Hospitable\HospitableProperty;
use App\Models\Guesty\GuestyPropertyPrice;
use App\Models\Guesty\GuestyProperty;
use App\Models\Cms;

class ModelHelper{
    
    public function finalEmailAndUpdateBookingPayment($id,$booking,$payment,$property){
        $new_amount_data=[];
        $status_payment='partially';
        if($booking->amount_data){
            $amount_data=json_decode($booking->amount_data,true);
            if(is_array($amount_data)){
                $update=0;
                foreach($amount_data as $c){
                    $ar=$c;
                    if(isset($c['status'])){}else{
                        if((double)trim($c['amount'])==(double)$payment->amount){
                            if($update==0){
                                $ar['status']="complete";
                                $ar['tran_id']=$payment->tran_id;
                                $ar['mode']=$payment->type;
                                $ar['date']=date('Y-m-d H:m:i');
                                $update=1;
                            }
                        }
                    }
                    $new_amount_data[]=$ar;
                }
            }
        }
        $i=0;$j=0;
        foreach($new_amount_data as $c){
            if(isset($c['status'])){
                $i++;
            }
            $j++;
        }
        if($i==$j){
            $status_payment='paid';
        }
        BookingRequest::find($id)->update(["booking_status"=>"booking-confirmed","payment_status"=>$status_payment,"amount_data"=>$new_amount_data,"how_many_payment_done"=>$i]);
        $data=BookingRequest::Find($id);
        $price_data=GuestyPropertyPrice::where("property_id",$property->id)->first();
        if($price_data){
            $property_id=$property->_id;
            $fareAccommodation=$data->gross_amount+$data->guest_fee;
            $fareCleaning=$price_data->cleaningFee;
            $startDate=$data->checkin;
            $endDate=$data->checkout;
            $firstname=$data->firstname;
            $lastname=$data->lastname;
            $email=$data->email;
            $mobile=$data->mobile;
            $total_guests=$data->total_guests;
            $total_amount=$data->total_amount;
        }
        LiveCart::getFileIcalFileData($property->id);
         $data=BookingRequest::Find($id);
        $html= view("mail.booking-first-admin",compact("property","data","payment"))->render();
        $to=ModelHelper::getDataFromSetting('payment_receiving_mail');
        $admin_subject="Booking Confirmation  for ".$property->name;
        MailHelper::emailSenderByController($html,$to,$admin_subject);
        $html= view("mail.booking-first-customer",compact("property","data","payment"))->render();
        $to=$data->email;
        $admin_subject="Booking Confirmation for ".$property->name;
        MailHelper::emailSenderByController($html,$to,$admin_subject);
    }
    
    public function getImageByProduct($product_id){
        return PropertyGallery::where("property_id",$product_id)->orderBy("sorting","asc")->get();
    }
  
    public function getImageByBlog($blog_id){
        return BlogGallery::where("blog_id",$blog_id)->orderBy("sorting","asc")->get();
    }

    public function getBlogCategoriesSelect(){
        $data=[];
        $all=BlogCategory::all();
        foreach($all as $a){
            $data[$a->id]=$a->title;
        }
        return $data;
    }

    public function saveSIngleDatePropertyRate($request,$id='default'){
        PropertyRate::where("rate_group_id",$id)->delete();
        if($request->start_date){
            $now = strtotime($request->start_date); // or your date as well
            $your_date = strtotime($request->end_date);
            $datediff =  $your_date-$now;
            $day= ceil($datediff / (60 * 60 * 24));
            for($i=0;$i<=$day;$i++){
                $data=$request->only(["discount_weekly","discount_monthly","is_available","platform_type","currency","base_price","notes","min_stay","base_min_stay",'property_id','checkin_day','checkout_day']);
                $data['rate_group_id']=$id;
                $date = strtotime($request->start_date);
                $date = strtotime("+".$i." day", $date);
                $date= date('Y-m-d', $date);
                $data['single_date_timestamp']=strtotime($date);
                $data["single_date"]=$date;
                if($request->type_of_price=="default"){
                    $data['price']=$request->price;
                }else{
                    $newDay = date('l', strtotime($date));
                    if($newDay=="Monday"){
                        $data['price']=$request->monday_price;
                    }else if($newDay=="Tuesday"){
                        $data['price']=$request->tuesday_price;
                    }else if($newDay=="Wednesday"){
                        $data['price']=$request->wednesday_price;
                    }else if($newDay=="Thursday"){
                        $data['price']=$request->thrusday_price;
                    }else if($newDay=="Friday"){
                        $data['price']=$request->friday_price;
                    }else if($newDay=="Saturday"){
                        $data['price']=$request->saturday_price;
                    }else if($newDay=="Sunday"){
                        $data['price']=$request->sunday_price;
                    }
                }
                PropertyRate::create($data);
            }
        }
    }

    public function showPetFee($pet_fee){
        if($pet_fee){
            if($pet_fee>0){
                return "display:block;";
            }
        }
        return "display:none;";
    }

    public function showpoolFee($pet_fee){
        if($pet_fee){
            if($pet_fee>0){
                return "display:block;";
            }
        }
        return "display:none;";
    }

    public function getProperptySelectList(){
        $data=[];
        $all=Property::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }
  
  public function getHospitableProperptySelectList(){
        $data=[];
        $all=HospitableProperty::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }
    
    public function getLocationSelectList(){
        $data=[];
        $all=Location::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }
    
    public function getLocationTrueSelectList(){
        $data=[];
        $all=Location::where("status","true")->get();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }
    
    public function getPageSelectList(){
        $data=[];
        $all=Cms::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }

    public function getProppertySelectList(){
        $data=[];
        $all=Property::all();
        foreach($all as $a){
            $data[$a->id]=$a->name;
        }
        return $data;
    }
	
	public function getDataFromSetting($name){
		$result=null;
		$data=BasicSetting::where("name",$name)->first();
		if($data){
			$result=$data->value;
		}
		return $result;
	}
}
<?php 
namespace App\Helper;
use App\Models\Agent;
use Auth;
use DB;
use ModelHelper;
use LiveCart;
use App\Models\BasicSetting;
use App\Models\PropertyRate;
use App\Models\Property;
use App\Models\Guesty\GuestyAvailablityPrice;
use GuestyApi;
use App\Models\Hospitable\HospitablePropertyDate;
use Session;

class Helper{
    	
	function getGrossDataCheckerDays($property,$start_date,$end_date){
	    $status=false; $gross_amount=0; $message=''; $stay_flag=0;
		$day_gaurav=$this->getWeekNameSelect();
        $now = strtotime($start_date);  $your_date = strtotime($end_date); $datediff =  $your_date-$now; $day = ceil($datediff / (60 * 60 * 24)); $total_night=$day;
        if($property){
             if($day>0){
    	         //for($i=0;$i<$day;$i++){
    	         	$date = strtotime($start_date); 
    	         //	$date = strtotime("+".$i." day", $date); 
    	         	$date = date('Y-m-d', $date);
					
    	            $guesty_night=GuestyAvailablityPrice::where(["listingId"=>$property->_id,"status"=>"available"])->where("start_date",$date)->first();
							
    	            if($guesty_night){
    	                if($guesty_night->minNights<=$day){ }else{
    	                    return ["status"=>400,"message"=>"The minimum stay requirement is ".$guesty_night->minNights."nights for the selected dates"];
    	                }
    	            }else{
    	               // break;
    	                return ["status"=>400,"message"=>"Not available those dates"];
    	            }
    	        // }
             }else{
                 return ["status"=>400,"message"=>"Not available those dates"];
             }
        }else{
            return ["status"=>400,"message"=>"Not available"];
        }
        return ["status"=>200,"message"=>"Not available those dates"];
	}

    public function getMonthListArray(){return ["01"=>"JAN","02"=>"FEB","03"=>"MAR","04"=>"APR","05"=>"MAY","06"=>"JUN","07"=>"JUL","08"=>"AUG","09"=>"SEP","10"=>"OCT","11"=>"NOV","12"=>"DEC"];}
  
    public function getCountryListArray(){return ["AF"=>"Afghanistan","AX"=>"�land Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BY"=>"Belarus","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia, Plurinational State of","BQ"=>"Bonaire, Sint Eustatius and Saba","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","BN"=>"Brunei Darussalam","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","CF"=>"Central African Republic","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos (Keeling) Islands","CO"=>"Colombia","KM"=>"Comoros","CG"=>"Congo","CD"=>"Congo, the Democratic Republic of the","CK"=>"Cook Islands","CR"=>"Costa Rica","CI"=>"C�te d'Ivoire","HR"=>"Croatia","CU"=>"Cuba","CW"=>"Cura�ao","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","ER"=>"Eritrea","EE"=>"Estonia","ET"=>"Ethiopia","FK"=>"Falkland Islands (Malvinas)","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GW"=>"Guinea-Bissau","GY"=>"Guyana","HT"=>"Haiti","HM"=>"Heard Island and McDonald Islands","VA"=>"Holy See (Vatican City State)","HN"=>"Honduras","HK"=>"Hong Kong","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IR"=>"Iran, Islamic Republic of","IQ"=>"Iraq","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KP"=>"Korea, Democratic People's Republic of","KR"=>"Korea, Republic of","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Lao People's Democratic Republic","LV"=>"Latvia","LB"=>"Lebanon","LS"=>"Lesotho","LR"=>"Liberia","LY"=>"Libya","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macao","MK"=>"Macedonia, the former Yugoslav Republic of","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia, Federated States of","MD"=>"Moldova, Republic of","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","MM"=>"Myanmar","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","NC"=>"New Caledonia","NZ"=>"New Zealand","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territory, Occupied","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"R�union","RO"=>"Romania","RU"=>"Russian Federation","RW"=>"Rwanda","BL"=>"Saint Barth�lemy","SH"=>"Saint Helena, Ascension and Tristan da Cunha","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin (French part)","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"Sao Tome and Principe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SX"=>"Sint Maarten (Dutch part)","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","SO"=>"Somalia","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","SS"=>"South Sudan","ES"=>"Spain","LK"=>"Sri Lanka","SD"=>"Sudan","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","SY"=>"Syrian Arab Republic","TW"=>"Taiwan, Province of China","TJ"=>"Tajikistan","TZ"=>"Tanzania, United Republic of","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UG"=>"Uganda","UA"=>"Ukraine","AE"=>"United Arab Emirates","GB"=>"United Kingdom","US"=>"United States","UM"=>"United States Minor Outlying Islands","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VE"=>"Venezuela, Bolivarian Republic of","VN"=>"Viet Nam","VG"=>"Virgin Islands, British","VI"=>"Virgin Islands, U.S.","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","YE"=>"Yemen","ZM"=>"Zambia","ZW"=>"Zimbabwe"];}

	public function calculateDays($start_date,$end_date){
		$now = strtotime($start_date); $your_date = strtotime($end_date);$datediff =  $your_date-$now;$day= ceil($datediff / (60 * 60 * 24));return $day;
	}

	public function getBookingStatus($item,$id){
		if($item=="booked"){
			$s='<a href="'.url('admin/booking-enquiries/confirmed/'.$id).'" class="btn btn-xs btn-primary">Accept Booking</a>';
		}
		if($item=="rental-aggrement-success"){
			$s='<a href="'.url('admin/booking-enquiries/confirmed/'.$id).'" class="btn btn-xs btn-warning">Booking Accepted</a>';
		}
		if($item=="rental-aggrement"){
			$s='<a href="'.url('admin/booking-enquiries/confirmed/'.$id).'" class="btn btn-xs btn-warning">Booking Accepted</a>';
		}
		if($item=="booking-confirmed"){
			$s='<a href="javascript:;" class="btn btn-xs btn-success">Booking Confirmed</a>';
		}
		if($item=="booking-cancel"){
			$s='<a href="javascript:;" class="btn btn-xs btn-danger">Booking Cancelled</a>';
		}
		return $s;
	}

	public function checkStatus($item){
		if($item=="true"){
			return '<i class="fa fa-check"></i>';
		}else{
			return '<i class="fa fa-times"></i>';
		}
	}

	public function getDayBetweenTwoDates($start_date,$end_date){
        $now = strtotime($start_date); $your_date = strtotime($end_date);$datediff =  $your_date-$now;$day= ceil($datediff / (60 * 60 * 24));return $day;
	}

	public function getFeeAmountAndName($c,$gross_amount){
		$name=$c->fee_name;
        if($c->fee_type=="Percentage"):
            $name.='('.$c->fee_rate.'%)';
            $amount=round(($gross_amount*$c->fee_rate)/100,2);
        else:
            $amount=$c->fee_rate; 
        endif;
        return ["status"=>true,"name"=>$name,"amount"=>$amount];
	}

	public function getPropertyRates($id){
		$ar=PropertyRate::where(["property_id"=>$id])->orderBy("id","desc")->get();
		$ar_checkin_checkout=LiveCart::iCalDataCheckInCheckOut($id);
		$new_dates=[];
		$payment_currency=ModelHelper::getDataFromSetting('payment_currency');
		$property=Property::find($id);
		$price='';
		if($property){
		    $price=$property->standard_rate;
		}
		for($i=0;$i<=365;$i++){
		     $title=$payment_currency.''.$price;
		    $class="available-date-full-calendar";
		    $date_single=date('Y-m-d',strtotime("+ ".$i."days",strtotime(date('Y-m-d'))));
		    $a=PropertyRate::where(["property_id"=>$id])->where("single_date",$date_single)->orderBy("id","desc")->first();
		    if($a){
		        $title=$payment_currency.''.$a->price;
		    }
			if(in_array($date_single, $ar_checkin_checkout['checkin'])){
				$title='';$class="booked-date-full-calendar";
			}
			if(in_array($date_single, $ar_checkin_checkout['checkout'])){
				$title='';$class="booked-date-full-calendar";
			}
		    $new_dates[]=["title"=>$title,"start"=>$date_single,"end"=>$date_single,"className"=>$class];
		}
		return json_encode($new_dates);
	}

	public function getGrossAmountData($property,$start_date,$end_date){
		$status=false; $gross_amount=0; $message=''; $stay_flag=0; $day_gaurav=$this->getWeekNameSelect(); $now = strtotime($start_date);  $your_date = strtotime($end_date); $datediff =  $your_date-$now; $day= ceil($datediff / (60 * 60 * 24));
        $total_night=$day;
        if($property){
             if($day>0){
    	         for($i=0;$i<$day;$i++){
    	         	$date = strtotime($start_date);
    	            $date = strtotime("+".$i." day", $date);
    	            $date= date('Y-m-d', $date);
    	            $rate=PropertyRate::where(["property_id"=>$property->id,"single_date"=>$date])->first();
    	            if($rate){
    	            	$stay_flag=1;
    	            	if($rate->min_stay<=$day){
    	            	    if($i==0){
    	            	        if(in_array($rate->checkin_day,['0','1','2','3','4','5','6'])){
    	            	            $new_day=(date('w', strtotime($date)));
    	            	            if($new_day==$rate->checkin_day){}else{
    	            	                $status='checkin-checkout-day';
    	            	                $message="Please select checkin  day is ".$day_gaurav[$rate->checkin_day];
    	            	                break;
    	            	            }
    	            	        }
    	            	    }
    	            	    if($i==($day-1)){
    	            	        if(in_array($rate->checkout_day,['0','1','2','3','4','5','6'])){
    	            	            $new_day=(date('w', strtotime("+1 day",strtotime($date))));
    	            	            if($new_day==$rate->checkout_day){}else{
    	            	                $status='checkin-checkout-day';
    	            	                $message="Please select checkout  day is ".$day_gaurav[$rate->checkout_day];
    	            	                break;
    	            	            }
    	            	        }
    	            	    }
    	            		if($rate->price){
    		            		$gross_amount+=$rate->price;
    		            		$status=true;
    		            	}
    	            	}else{
    	            		$status='min-stay-day';
    	            		break;
    	            	}
    	            }else{
    	            	if($property->standard_rate){
    	            	     if($i==0){
    	            	        if(in_array($property->checkin_day,['0','1','2','3','4','5','6'])){
    	            	            $new_day=(date('w', strtotime($date)));
    	            	            if($new_day==$property->checkin_day){ }else{
    	            	                $status='checkin-checkout-day';
    	            	                $message="Please select checkin  day is ".$day_gaurav[$property->checkin_day];
    	            	                break;
    	            	            }
    	            	        }
    	            	    }
    	            	    if($i==($day-1)){
    	            	        if(in_array($property->checkout_day,['0','1','2','3','4','5','6'])){
    	            	            $new_day=(date('w', strtotime("+1 day",strtotime($date))));
    	            	            if($new_day==$property->checkout_day){}else{
    	            	                $status='checkin-checkout-day';
    	            	                $message="Please select checkout  day is ".$day_gaurav[$property->checkout_day];
    	            	                break;
    	            	            }
    	            	        }
    	            	    }
    	            		$gross_amount+=$property->standard_rate;
    	            		$status=true;
    	            	}else{
    	            		$status='date-price';
    	            		break;
    	            	}
    	            }
    	         }
    	         if($stay_flag==0){
    	         	if($property->min_stay){
    	         		if($property->min_stay<=$day){}else{
    	         			$status='min-stay-day';
    	         		}
    	         	}else{
    	         		$status='min-stay-day';
    	         	}
    	         }
    	        $ar=[];
    	        $checkinCheckout=LiveCart::iCalDataCheckInCheckOut($property->id);
    	        for($i=0;$i<$day;$i++){
    	         	$date = strtotime($start_date);
    	            $date = strtotime("+".$i." day", $date);
    	            $date= date('Y-m-d', $date);
    	            $ar[]=$date;
    	            if(in_array($date, $checkinCheckout['checkin'])){
    	            	$status="already-booked";
    	            	break;
    	            }
    	        }
    	     }else{
    	     	$status='min-stay-day';
    	     }
         }else{
             $status='min-stay-day';
         }
		return [	"status"=>$status,"gross_amount"=>$gross_amount,"total_night"=>$total_night,"message"=>$message];
	}
	
	public function getWeekNameSelect(){
        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        return $days;
    }
	
	public function getPropertyList($start_date,$end_date){
	    $now = strtotime($start_date);  $your_date = strtotime($end_date); $datediff =  $your_date-$now; $day= ceil($datediff / (60 * 60 * 24));
	    $data=Property::where("status","true")->get();
	    $prop_ids=[];
	    foreach($data as $property){
    	    $checkinCheckout=LiveCart::iCalDataCheckInCheckOut($property->id);
	        for($i=0;$i<$day;$i++){
	         	$date = strtotime($start_date);
	            $date = strtotime("+".$i." day", $date);
	            $date= date('Y-m-d', $date);
	            $ar[]=$date;
	            if(in_array($date, $checkinCheckout['checkin'])){
	            	$prop_ids[]=$property->id;
	            	break;
	            }
	        }
	    }
	    return $prop_ids;
	}

	public function getPropertyListNew($start_date,$end_date,$total_guest=0){
		$property_ids=[];
		$data=GuestyApi::getSearchAvailability($start_date,$end_date,$total_guest);
		if(isset($data['results'])){
			foreach($data['results'] as $d){
				if(isset($d['_id'])){
					$property_ids[]=$d['_id'];
				}
			}
		}
	    return $property_ids;
	}

	public function getPropertyAvailability($start_date,$end_date,$total_guest=0){		
		$day =$this->calculateDays($start_date,$end_date);
		$property =  HospitablePropertyDate::whereIn('date', [$start_date, $end_date])
		                                     ->where('status_available',1)
											 ->where("min_stay","<=" ,$day)											 											 
		                                     ->select('property_id')
											->distinct()
											->pluck('property_id');		
		return $property;
	}

	public function languageChanger($lan){
		Session::put("current_language",$lan);
	}

	public function getPropertyStatus(){
		return ["Available"=>"Available","No Available"=>"No Available","Rented"=>"Rented","Trending"=>"Trending","Sale"=>"Sale"];
	}

	function getFirstEightItems(array $items): array
	{
		return array_slice($items, 0, 8);
	}
	
	public function getSeoUrlGet($title){
		return strtolower(str_replace( array('/', '\\','\'', '"', ',' , ';', '<', '>','&',' ','*','!','@','#','$','%','+',',','.','`','~',':','[',']','{','}','(',')','?'), '-', $title));
	}
	
	public function getTypeOfField(){
		return ["select"=>"select","text"=>"text","color"=>"color","date"=>"date","time"=>"time","number"=>"number","textarea"=>"textarea",];
	}
	
	public function getGenderData(){
		return["male"=>"male","female"=>"female",'unisex'=>"unisex",'kids'=>"kids"];
	}

	public function getLoginTypeData(){
		return["normal"=>"normal","google"=>"google",'facebook'=>"facebook"];
	}

	public function getDeviceTypeData(){
		return ["ios"=>"ios","A"=>"android"];
	}

	public  function getBooleanData(){
		return ['0'=>"false","1"=>"true"];
	}

	public  function getBooleanDataActual(){
		return ['false'=>"false","true"=>"true"];
	}

	public  function getfirstTrueBooleanData(){
		return ["1"=>"true","0"=>"false"];
	}

	public function getCoupanCodeList(){
		return ["exact"=>"Exact","percentage"=>"Percentage"];
	}

	public  function getTempletes(){
		return ["home"=>"Home","onboarding"=>"onboarding","about"=>"about","production"=>"production","prearrival"=>"prearrival","about-owner"=>"about-owner","property-detail"=>"property-detail","common"=>"Common","contact"=>"contact","properties"=>"properties","blogs"=>"blogs","map"=>"map","reviews"=>"reviews","host-an-event"=>"host-an-event","events"=>"events","adu-for-sale"=>"adu-for-sale","adu-for-sale-details"=>"adu-for-sale-details","gallery"=>"gallery","property-management"=>"property-management","property-list"=>"property-list","attractions"=>"attractions","get-quote"=>"get-quote","faq"=>"FAQ"];
	}
	
	public  function getImage($image){
	    if($image!=""){
	        if(is_file(public_path($image))){
	            return $image;
	        }
	    }
	    return 'uploads/no-image.jpg';
	}

    public function deleteFile($file){ }
  
    public function getConvertedAmountWithSymbol($price){
		if(Session::get("current_currency_data")){
			$data=Session::get("current_currency_data");
			if($data){
				return $data->symbol."".number_format(round(($data->amount*$price),0),2);
			}
		}
		return "$".$price;
	}
	
}
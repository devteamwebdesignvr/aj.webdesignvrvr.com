<?php 

namespace App\Helper;

use Guzzle\Http\Exception\ClientException;
use GuzzleHttp;
use Helper;
use App\Models\Hospitable\HospitablePropertyPhoto;
use App\Models\Hospitable\HospitableProperty;
use App\Models\Hospitable\HospitablePropertyAmenity;
use App\Models\Hospitable\HospitablePropertyAddress;
use App\Models\Hospitable\HospitablePropertyDate;
use App\Models\Hospitable\HospitableReview;


/**
 * Class Upload
 * @package App\Helper
 */
class HospitableApi{
    
    protected  function baseUrl(){
        return 'https://a008.vercel.app';
    } 

    protected  function authToken(){
        //return 'dc5b21e1-78cd-44de-8c83-c381606978bd';
      return 'dc5b21e1-78cd-44de-8c83-c381606978bd';
    }    

    public function getAllPropertiesList(){
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
           	$client = new \GuzzleHttp\Client();
           	$url= $this->baseUrl() . '/properties';
			$response = $client->request('GET', $url, [
			  'headers' => ['Accept' => 'application/json','Authorization' => 'Bearer '.$this->authToken()]
			]);
			$data=json_decode($response->getBody(), true);
            $ids=[]; 
			if(isset($data['data'])){
				foreach($data['data'] as $d){
					$hospitable_id=$d['id'];
					$ar=$d;
					$ar['hospitable_id']=$d['id'];
                    $ids[] = $d['id'];
					unset($ar['id']);
					if(isset($d['address'])){
						$ar['address_object']=json_encode($d['address']);
						unset($ar['address']);
					}
					if(isset($d['amenities'])){
						$ar['amenities_object']=json_encode($d['amenities']);
						unset($ar['amenities']);
					}
					if(isset($d['capacity'])){
						$ar['capacity_object']=json_encode($d['capacity']);
						$ar["capacity_max"]=$d['capacity']['max'];
						$ar["capacity_bedrooms"]=$d['capacity']['bedrooms'];
						$ar["capacity_beds"]=$d['capacity']['beds'];
						$ar["capacity_bathrooms"]=$d['capacity']['bathrooms'];
						unset($ar['capacity']);
					}
					if(isset($d['room_details'])){
						$ar['room_details_object']=json_encode($d['room_details']);
						unset($ar['room_details']);
					}
					if(isset($d['tags'])){
						$ar['tags_object']=json_encode($d['tags']);
						unset($ar['tags']);
					}
                    if(isset($d['parent_child'])){
                        $ar['parent_child_object']= json_encode($d['parent_child']);
                         unset($ar['parent_child']);
                    }
					if(isset($d['house_rules'])){
						$ar['house_rules_object']=json_encode($d['house_rules']);
						$ar["house_rules_pets_allowed" ]=$d['house_rules']['pets_allowed'];
						$ar["house_rules_smoking_allowed"]=$d['house_rules']['smoking_allowed'];
						$ar["house_rules_events_allowed"]=$d['house_rules']['events_allowed'];
						unset($ar['house_rules']);
					}
					$property=HospitableProperty::where("hospitable_id",$ar['hospitable_id'])->first();
					if($property){
						$id=$property->id;
						HospitableProperty::where("hospitable_id",$ar['hospitable_id'])->update($ar);
					}else{
						$seo_url=Helper::getSeoUrlGet(strtolower(str_replace(" ","-",$ar['name'])).'-'.$ar['hospitable_id']);
	                    $ar['seo_url']=$seo_url;
						$property=HospitableProperty::create($ar);
						$id=$property->id;
					}                   
					// $this->getPropertyDetailReview($hospitable_id,$id);
					$this->getPropertyDetailImage($hospitable_id,$id);
					$this->getPropertyDetailCalendar($hospitable_id,$id);

				}
			}
			// $this->getAmenityAddressRefresh();
            HospitableProperty::whereNotIn("hospitable_id",$ids)->update(['status'=>'false']);
            HospitableProperty::whereIn("hospitable_id",$ids)->update(['status'=>'true']);
              
            return ["status"=>200,"message"=>"success"];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $e->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
        // $this->getAmenityAddressRefresh();
	}
  
    public function getupdatedPropertiesCalendar() {
        $properties = HospitableProperty::select('id', 'hospitable_id')->get();
    
        foreach ($properties as $property) {
            $this->getPropertyDetailCalendar($property->hospitable_id,$property->id);
        }
    }

    //propety details
    public function getPropertyDetails($hospitable_id){
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
           	$client = new \GuzzleHttp\Client();
           	$url= $this->baseUrl() . "/properties/".$hospitable_id;
			$response = $client->request('GET', $url, [
			  'headers' => ['Accept' => 'application/json','Authorization' => 'Bearer '.$this->authToken()]
			]);
			$data=json_decode($response->getBody(), true);
             dd($data);              
            return ["status"=>200,"message"=>"success"];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $e->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }       
    }


	//propety details
    public function getPropertyViews($hospitable_id){
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
           	$client = new \GuzzleHttp\Client();
           	$url= $this->baseUrl() . "/properties/".$hospitable_id."/quote";
			$response = $client->request('GET', $url, [
			  'headers' => ['Accept' => 'application/json','Authorization' => 'Bearer '.$this->authToken()]
			]);
			$data=json_decode($response->getBody(), true);
             dd($data);              
            return ["status"=>200,"message"=>"success"];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $e->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }       
    }

    //property Calender
    public function getPropertyDetailCalendar($hospitable_id,$id){
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
           	$client = new \GuzzleHttp\Client();
           	$url= $this->baseUrl() . "/properties/".$hospitable_id ."/calendar";
			$response = $client->request('GET', $url, [
			  'headers' => ['Accept' => 'application/json','Authorization' => 'Bearer '.$this->authToken()]
			]);
			$data=json_decode($response->getBody(), true);
            foreach($data['data']['days'] as $d){
				$ar=$d;
				$ar['property_id']=$id;
				if(isset($d['status'])){
					$ar['status_object']=json_encode($d['status']);
					$ar["status_reason" ]=$d['status']['reason'];
					$ar["status_available"]=$d['status']['available'];
					unset($ar['status']);
				}
				if(isset($d['price'])){
					$ar['price_object']=json_encode($d['price']);
					$ar["price_amount" ]=$d['price']['amount'];
					$ar["price_currency"]=$d['price']['currency'];
					$ar["price_formatted"]=$d['price']['formatted'];
					unset($ar['price']);
				}
				$ar12=HospitablePropertyDate::where(["date"=>$ar['date'],"property_id"=>$id])->first();
				if($ar12){
					HospitablePropertyDate::where(["date"=>$ar['date'],"property_id"=>$id])->update($ar);
				}else{
					HospitablePropertyDate::create($ar);
				}
			}
            return ["status"=>200,"message"=>"success"];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $e->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }       
    }

    //property image
    public function getPropertyDetailImage($hospitable_id,$id){
         $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
           	$client = new \GuzzleHttp\Client();
           	$url= $this->baseUrl() . "/properties/".$hospitable_id. '/images';
			$response = $client->request('GET', $url, [
			  'headers' => ['Accept' => 'application/json','Authorization' => 'Bearer '.$this->authToken()]
			]);
			$data=json_decode($response->getBody(), true);
            HospitablePropertyPhoto::where("property_id",$id)->delete();
			foreach($data['data'] as $d){
				$ar=$d;
				$ar['property_id']=$id;
				HospitablePropertyPhoto::create($ar);
			}
            return ["status"=>200,"message"=>"success"];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $e->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }       
    }
  
  // Property check throuh Api 
  
  public function CheckPropertyAvailability($start_date,$end_date,$adults,$children,$pets=0,$infants=0){
     	$token=$this->authToken();
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
           	$client = new \GuzzleHttp\Client();
           	$url=$this->baseUrl() .'/properties/search?start_date='.$start_date.'&end_date='.$end_date.'&adults='.$adults;
			$response = $client->request('GET', $url, [
			  'headers' => ['Accept' => 'application/json','Authorization' => 'Bearer '.$token,'Content-Type' => '']
			]);
			$data=json_decode($response->getBody(), true);
            $id=[];
			if(isset($data)){
              foreach($data as $key => $value){
                   foreach($value as $it){
                     if($it['availability']['available'] == 'true'){
                       if($pets > 0){
                       	 if(isset($it['property']['house_rules'])){
                           if(isset($it['property']['house_rules']['pets_allowed'])){
                             if($it['property']['house_rules']['pets_allowed'] == true ){
                              $id[] =  $it['property']['id'];
                             }
                           }
                         }
                       }else{
                          $id[] =  $it['property']['id'];
                       }
                     }
                   }
              }
            }
            return ["status"=>200,"message"=>"success", "id" =>$id];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $e->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
	}

}	
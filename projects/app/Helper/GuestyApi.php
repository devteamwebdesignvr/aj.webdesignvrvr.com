<?php 
namespace App\Helper;
use App\Models\Agent;
use Auth;
use DB;
use Helper;
use MailHelper;
use Mail;
use Config;
use ModelHelper;
use App\Models\BasicSetting;
use Guzzle\Http\Exception\ClientException;
use GuzzleHttp;
use App\Models\Guesty\GuestyProperty;
use App\Models\Guesty\GuestyPropertyPrice;
use App\Models\Guesty\GuestyPropertyBooking;
use App\Models\Guesty\GuestyPropertyReview;
use App\Models\Guesty\GuestyAvailablityPrice;
use App\Models\Location;
use Session;
class GuestyApi{

    public function getToken(){
        $payload = ['grant_type' => 'client_credentials','scope' => 'open-api','client_id'   => ModelHelper::getDataFromSetting('OpenClientid'),'client_secret'   => ModelHelper::getDataFromSetting('OpenClientSecretkey')];
        $url='https://open-api.guesty.com/oauth2/token';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($payload));
        curl_setopt($curl,CURLOPT_HTTPHEADER , ["accept: application/json"]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return ( ["status"=>400,"message"=>$err]);
        } else {
            $response=(json_decode($response,true));
            if(isset($response['access_token'])){
                $token_data=BasicSetting::where("name","API-TOKEN-DATA")->first();
                if($token_data){
                    BasicSetting::where("name","API-TOKEN-DATA")->update(["value"=>$response['access_token']]);
                }else{
                    BasicSetting::create(["name"=>"API-TOKEN-DATA","value"=>$response['access_token']]);
                }
            }
            return (["status"=>200,"data"=>$response]);
        }
    }

    public function getBookingToken(){
        $payload = ['grant_type' => 'client_credentials','scope' => 'booking_engine:api','client_id'   => ModelHelper::getDataFromSetting('BookingClientid'),'client_secret'   => ModelHelper::getDataFromSetting('BookingClientSecretkey')];
        $url='https://booking.guesty.com/oauth2/token';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($payload));
        curl_setopt($curl,CURLOPT_HTTPHEADER , ["accept: application/json"]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return ( ["status"=>400,"message"=>$err]);
        } else {
            $response=(json_decode($response,true));
            if(isset($response['access_token'])){
                $token_data=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();
                if($token_data){
                    BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->update(["value"=>$response['access_token']]);
                }else{
                    BasicSetting::create(["name"=>"BOOKING-API-TOKEN-DATA","value"=>$response['access_token']]);
                }
            }
            return (["status"=>200,"data"=>$response]);
        }
    }

    public function getPropertyDataOld(){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $url='https://open-api.guesty.com/v1/listings?active=true&pmsActive=true&&listed=true';
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            foreach($data['results'] as $item){
                $fillable=["_id","picture","terms","terms_min_night","terms_max_night","prices","publicDescription","summary","space","access","interactionWithGuests","neighborhood","transit","notes","houseRules","privateDescription","type","amenities","amenitiesNotIncluded","active","nickname","title","propertyType","roomType","bedrooms","bathrooms","beds","isListed","address","defaultCheckInTime","defaultCheckInEndTime","defaultCheckOutTime","accommodates","pictures","accountId","createdAt","lastUpdatedAt","all_data"];
                $new_array=[];
                foreach($item as $key=>$r){
                    if(in_array($key, $fillable)){
                        $new_array[$key]=$r;
                    }
                }
                $new_array['all_data']=json_encode($item);
                if(isset($new_array['picture'])){
                    $new_array['picture']=json_encode($new_array['picture']);
                }
                if(isset($new_array['terms'])){
                    if(isset($new_array['terms']['maxNights'])){
                        $new_array['terms_max_night']=$new_array['terms']['maxNights'];
                    }
                    if(isset($new_array['terms']['minNights'])){
                        $new_array['terms_min_night']=$new_array['terms']['minNights'];
                    }
                    $new_array['terms']=json_encode($new_array['terms']);
                }
                $price=[];
                if(isset($new_array['prices'])){
                    $price["prices"]=json_encode($new_array['prices']);
                    if(isset($new_array['prices']['weekendDays'])){
                        $price['weekendDays']=json_encode($new_array['prices']['weekendDays']);
                    }
                    if(isset($new_array['prices']['guestsIncludedInRegularFee'])){
                        $price['guestsIncludedInRegularFee']=$new_array['prices']['guestsIncludedInRegularFee'];
                        $new_array['guests']=$new_array['prices']['guestsIncludedInRegularFee'];
                    }
                    if(isset($new_array['prices']['securityDepositFee'])){
                        $price['securityDepositFee']=$new_array['prices']['securityDepositFee'];
                    }
                    if(isset($new_array['prices']['weekendBasePrice'])){
                        $price['weekendBasePrice']=$new_array['prices']['weekendBasePrice'];
                    }
                    if(isset($new_array['prices']['basePrice'])){
                        $price['basePrice']=$new_array['prices']['basePrice'];
                    }
                    if(isset($new_array['prices']['currency'])){
                        $price['currency']=$new_array['prices']['currency'];
                    }
                    if(isset($new_array['prices']['weeklyPriceFactor'])){
                        $price['weeklyPriceFactor']=$new_array['prices']['weeklyPriceFactor'];
                    }
                    if(isset($new_array['prices']['monthlyPriceFactor'])){
                        $price['monthlyPriceFactor']=$new_array['prices']['monthlyPriceFactor'];
                    }
                    if(isset($new_array['prices']['extraPersonFee'])){
                        $price['extraPersonFee']=$new_array['prices']['extraPersonFee'];
                    }
                    if(isset($new_array['prices']['cleaningFee'])){
                        $price['cleaningFee']=$new_array['prices']['cleaningFee'];
                    }
                    $new_array['prices']=json_encode($new_array['prices']);
                }
                if(isset($new_array['publicDescription'])){
                    if(isset($new_array['publicDescription']['space'])){
                        $new_array['space']=$new_array['publicDescription']['space'];
                    }
                    if(isset($new_array['publicDescription']['access'])){
                        $new_array['access']=$new_array['publicDescription']['access'];
                    }
                    if(isset($new_array['publicDescription']['interactionWithGuests'])){
                        $new_array['interactionWithGuests']=$new_array['publicDescription']['interactionWithGuests'];
                    }
                    if(isset($new_array['publicDescription']['neighborhood'])){
                        $new_array['neighborhood']=$new_array['publicDescription']['neighborhood'];
                    }
                    if(isset($new_array['publicDescription']['transit'])){
                        $new_array['transit']=$new_array['publicDescription']['transit'];
                    }
                    if(isset($new_array['publicDescription']['notes'])){
                        $new_array['notes']=$new_array['publicDescription']['notes'];
                    }
                    if(isset($new_array['publicDescription']['houseRules'])){
                        $new_array['houseRules']=$new_array['publicDescription']['houseRules'];
                    }
                    if(isset($new_array['publicDescription']['summary'])){
                        $new_array['summary']=$new_array['publicDescription']['summary'];
                    }
                   $new_array['publicDescription']=json_encode($new_array['publicDescription']);
              
                }
                if(isset($new_array['privateDescription'])){
                    $new_array['privateDescription']=json_encode($new_array['privateDescription']);
                }
                if(isset($new_array['amenities'])){
                    $new_array['amenities']=json_encode($new_array['amenities']);
                }
                if(isset($new_array['amenitiesNotIncluded'])){
                    $new_array['amenitiesNotIncluded']=json_encode($new_array['amenitiesNotIncluded']);
                }
                if(isset($new_array['pictures'])){
                    $new_array['pictures']=json_encode($new_array['pictures']);
                }
                if(isset($new_array['address'])){
                    if(isset($new_array['address']['city'])){
                       // $location=Location::where("name",$new_array['address']['city'])->first();
                      //  if($location){}else{
                            $city=$new_array['address']['city'];
                           // $location=Location::create(["name"=>$city,'meta_title'=>$city,'meta_keywords'=>$city,'meta_description'=>$city,'show_name'=>$city,'templete'=>"common","seo_url"=>Helper::getSeoUrlGet($city)]);
                      //  }
                       // $new_array['location_id']=$location->id;
                    }
                    $new_array['address']=json_encode($new_array['address']);
                }
                $property=GuestyProperty::where("_id",$item['_id'])->first();
                if($property){
                    GuestyProperty::where("_id",$item['_id'])->update($new_array);
                }else{
                    $seo_url=Helper::getSeoUrlGet(strtolower(str_replace(" ","-",$item['title'])).'-'.$item['_id']);
                    $new_array['seo_url']=$seo_url;
                    $new_array['meta_title']=substr($item['title'],0,60);
                    $new_array['meta_keywords']=$item['title'];
                    $new_array['meta_description']=substr($item['title'],0,160);
                    GuestyProperty::create($new_array);
                }
                $property=GuestyProperty::where("_id",$item['_id'])->first();
                $price['property_id']=$property->id;
                GuestyPropertyPrice::where(["property_id"=>$property->id])->delete();
                GuestyPropertyPrice::create($price);
                $this->getAVailablityDataData($item['_id']);
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

    public function getPropertyData(){
        $token_data=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();
        if($token_data){$token=$token_data->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $url='https://booking.guesty.com/api/listings';
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            foreach($data['results'] as $item){
                $fillable=["_id","picture","terms","terms_min_night","terms_max_night","prices","publicDescription","summary","space","access","interactionWithGuests","neighborhood","transit","notes","houseRules","privateDescription","type","amenities","amenitiesNotIncluded","active","nickname","title","propertyType","roomType","bedrooms","bathrooms","beds","isListed","address","defaultCheckInTime","defaultCheckInEndTime","defaultCheckOutTime","accommodates","pictures","accountId","createdAt","lastUpdatedAt","all_data"];
                $new_array=[];
                foreach($item as $key=>$r){
                    if(in_array($key, $fillable)){
                        $new_array[$key]=$r;
                    }
                }
                $new_array['all_data']=json_encode($item);
                if(isset($new_array['picture'])){
                    $new_array['picture']=json_encode($new_array['picture']);
                }
                if(isset($new_array['terms'])){
                    if(isset($new_array['terms']['maxNights'])){
                        $new_array['terms_max_night']=$new_array['terms']['maxNights'];
                    }
                    if(isset($new_array['terms']['minNights'])){
                        $new_array['terms_min_night']=$new_array['terms']['minNights'];
                    }
                    $new_array['terms']=json_encode($new_array['terms']);
                }
                $price=[];
                if(isset($new_array['prices'])){
                    $price["prices"]=json_encode($new_array['prices']);
                    if(isset($new_array['prices']['weekendDays'])){
                        $price['weekendDays']=json_encode($new_array['prices']['weekendDays']);
                    }
                    if(isset($new_array['prices']['guestsIncludedInRegularFee'])){
                        $price['guestsIncludedInRegularFee']=$new_array['prices']['guestsIncludedInRegularFee'];
                        $new_array['guests']=$new_array['prices']['guestsIncludedInRegularFee'];
                    }
                    if(isset($new_array['prices']['securityDepositFee'])){
                        $price['securityDepositFee']=$new_array['prices']['securityDepositFee'];
                    }
                    if(isset($new_array['prices']['weekendBasePrice'])){
                        $price['weekendBasePrice']=$new_array['prices']['weekendBasePrice'];
                    }
                    if(isset($new_array['prices']['basePrice'])){
                        $price['basePrice']=$new_array['prices']['basePrice'];
                    }
                    if(isset($new_array['prices']['currency'])){
                        $price['currency']=$new_array['prices']['currency'];
                    }
                    if(isset($new_array['prices']['weeklyPriceFactor'])){
                        $price['weeklyPriceFactor']=$new_array['prices']['weeklyPriceFactor'];
                    }
                    if(isset($new_array['prices']['monthlyPriceFactor'])){
                        $price['monthlyPriceFactor']=$new_array['prices']['monthlyPriceFactor'];
                    }
                    if(isset($new_array['prices']['extraPersonFee'])){
                        $price['extraPersonFee']=$new_array['prices']['extraPersonFee'];
                    }
                    if(isset($new_array['prices']['cleaningFee'])){
                        $price['cleaningFee']=$new_array['prices']['cleaningFee'];
                    }
                    $new_array['prices']=json_encode($new_array['prices']);
                }
                if(isset($new_array['publicDescription'])){
                    if(isset($new_array['publicDescription']['space'])){
                        $new_array['space']=$new_array['publicDescription']['space'];
                    }
                    if(isset($new_array['publicDescription']['access'])){
                        $new_array['access']=$new_array['publicDescription']['access'];
                    }
                    if(isset($new_array['publicDescription']['interactionWithGuests'])){
                        $new_array['interactionWithGuests']=$new_array['publicDescription']['interactionWithGuests'];
                    }
                    if(isset($new_array['publicDescription']['neighborhood'])){
                        $new_array['neighborhood']=$new_array['publicDescription']['neighborhood'];
                    }
                    if(isset($new_array['publicDescription']['transit'])){
                        $new_array['transit']=$new_array['publicDescription']['transit'];
                    }
                    if(isset($new_array['publicDescription']['notes'])){
                        $new_array['notes']=$new_array['publicDescription']['notes'];
                    }
                    if(isset($new_array['publicDescription']['houseRules'])){
                        $new_array['houseRules']=$new_array['publicDescription']['houseRules'];
                    }
                    if(isset($new_array['publicDescription']['summary'])){
                        $new_array['summary']=$new_array['publicDescription']['summary'];
                    }
                   $new_array['publicDescription']=json_encode($new_array['publicDescription']);
              
                }
                if(isset($new_array['privateDescription'])){
                    $new_array['privateDescription']=json_encode($new_array['privateDescription']);
                }
                if(isset($new_array['amenities'])){
                    $new_array['amenities']=json_encode($new_array['amenities']);
                }
                if(isset($new_array['amenitiesNotIncluded'])){
                    $new_array['amenitiesNotIncluded']=json_encode($new_array['amenitiesNotIncluded']);
                }
                if(isset($new_array['pictures'])){
                    $new_array['pictures']=json_encode($new_array['pictures']);
                }
                if(isset($new_array['address'])){
                    if(isset($new_array['address']['city'])){
                       // $location=Location::where("name",$new_array['address']['city'])->first();
                      //  if($location){}else{
                            $city=$new_array['address']['city'];
                           // $location=Location::create(["name"=>$city,'meta_title'=>$city,'meta_keywords'=>$city,'meta_description'=>$city,'show_name'=>$city,'templete'=>"common","seo_url"=>Helper::getSeoUrlGet($city)]);
                      //  }
                       // $new_array['location_id']=$location->id;
                    }
                    $new_array['address']=json_encode($new_array['address']);
                }
                $property=GuestyProperty::where("_id",$item['_id'])->first();
                if($property){
                    GuestyProperty::where("_id",$item['_id'])->update($new_array);
                }else{
                    $seo_url=Helper::getSeoUrlGet(strtolower(str_replace(" ","-",$item['title'])).'-'.$item['_id']);
                    $new_array['seo_url']=$seo_url;
                    $new_array['meta_title']=substr($item['title'],0,60);
                    $new_array['meta_keywords']=$item['title'];
                    $new_array['meta_description']=substr($item['title'],0,160);
                    GuestyProperty::create($new_array);
                }
                $property=GuestyProperty::where("_id",$item['_id'])->first();
                $price['property_id']=$property->id;
                GuestyPropertyPrice::where(["property_id"=>$property->id])->delete();
                GuestyPropertyPrice::create($price);
                $this->getAVailablityDataData($item['_id']);
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

    public function getBookingDataOld(){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $url='https://open-api.guesty.com/v1/reservations?limit=10&skip=0';
            $data=($this->getLimitBookingData($url,$token));
            $new_data=[];
            $new_data=$data['results'];
            if(isset($data['count'])){
                if($data['count']){
                    for($i=10;$i<=$data['count'];$i+=10){
                        sleep(20);
                        $url='https://open-api.guesty.com/v1/reservations?skip='.$i.'&limit='.(10);
                        $da=($this->getLimitBookingData($url,$token));
                        $new_data=array_merge($new_data,$da['results']);
                    }
                }
            }
            DB::table('guesty_property_bookings')->truncate();
            foreach($new_data as $item){
                $fillable=["_id","integration","confirmationCode","checkIn","checkOut",'start_date','end_date',"listingId","guest","accountId","guestId","listing"];
                $new_array=[];
                foreach($item as $key=>$r){
                    if(in_array($key, $fillable)){
                        $new_array[$key]=$r;
                    }
                }
                $new_array['all_data']=json_encode($item);
                if(isset($new_array['picture'])){
                    $new_array['picture']=json_encode($new_array['picture']);
                }
                if(isset($new_array['listing'])){
                    $new_array['listing']=json_encode($new_array['listing']);
                }
                if(isset($new_array['guest'])){
                    $new_array['guest']=json_encode($new_array['guest']);
                }
                if(isset($new_array['integration'])){
                    $new_array['integration']=json_encode($new_array['integration']);
                }
                if(isset($new_array['checkOut'])){
                    $new_array['end_date']=date('Y-m-d',strtotime($new_array['checkOut']));
                }
                if(isset($new_array['checkIn'])){
                    $new_array['start_date']=date('Y-m-d',strtotime($new_array['checkIn']));
                }
                GuestyPropertyBooking::create($new_array);
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

    public function getReviewDataOld(){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $url='https://open-api.guesty.com/v1/reviews?limit=100&skip=0';
            $data=($this->getLimitBookingData($url,$token));
            $new_data=[];
            $new_data=$data['data'];
            for($i=100;$i<=1000;$i+=100){
                $url='https://open-api.guesty.com/v1/reviews?skip='.$i.'&limit='.(100);
                $da=($this->getLimitBookingData($url,$token));
                $new_data=array_merge($new_data,$da['data']);
            }
            DB::table('guesty_property_reviews')->truncate();
            foreach($new_data as $item){
            $fillable=[  "_id","externalReviewId","accountId","channelId","createdAt","createdAtGuesty","externalListingId","externalReservationId","guestId","listingId","rawReview","reservationId","updatedAt","updatedAtGuesty","reviewReplies",];
                $new_array=[];
                foreach($item as $key=>$r){
                    if(in_array($key, $fillable)){
                        $new_array[$key]=$r;
                    }
                }
                $new_array['all_data']=json_encode($item);
                if(isset($new_array['rawReview'])){
                    $new_array['rawReview']=json_encode($new_array['rawReview']);
                }
                if(isset($new_array['reviewReplies'])){
                    $new_array['reviewReplies']=json_encode($new_array['reviewReplies']);
                }
                if(isset($new_array['guestId'])){
                    $guest=$this->getGuestData($new_array['guestId']);
                    if($guest['status']==200){
                        if(isset($guest['data'])){
                            $new_array['guest_data']=json_encode($guest['data']);
                            if(isset($guest['data']['fullName']))
                            $new_array['full_name']=json_encode($guest['data']['fullName']);
                        }
                    }
                }
                GuestyPropertyReview::create($new_array);
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

    public function getReviewData(){
        $token_data=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();
        if($token_data){$token=$token_data->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();

        try {
            $url='https://booking.guesty.com/api/reviews?limit=100&skip=0';
            $data=($this->getLimitBookingData($url,$token));
            $new_data=[];
            $new_data=$data['data'];
            for($i=100;$i<=1000;$i+=100){
                $url='https://booking.guesty.com/api/reviews?skip='.$i.'&limit='.(100);
                $da=($this->getLimitBookingData($url,$token));
                $new_data=array_merge($new_data,$da['data']);
            }
            DB::table('guesty_property_reviews')->truncate();
            foreach($new_data as $item){
            $fillable=[  "_id","externalReviewId","accountId","channelId","createdAt","createdAtGuesty","externalListingId","externalReservationId","guestId","listingId","rawReview","reservationId","updatedAt","updatedAtGuesty","reviewReplies",];
                $new_array=[];
                foreach($item as $key=>$r){
                    if(in_array($key, $fillable)){
                        $new_array[$key]=$r;
                    }
                }
                $new_array['all_data']=json_encode($item);
                if(isset($new_array['rawReview'])){
                    $new_array['rawReview']=json_encode($new_array['rawReview']);
                }
                if(isset($new_array['reviewReplies'])){
                    $new_array['reviewReplies']=json_encode($new_array['reviewReplies']);
                }
                if(isset($new_array['guestId'])){
                    $guest=$this->getGuestData($new_array['guestId']);
                    if($guest['status']==200){
                        if(isset($guest['data'])){
                            $new_array['guest_data']=json_encode($guest['data']);
                            if(isset($guest['data']['fullName']))
                            $new_array['full_name']=json_encode($guest['data']['fullName']);
                        }
                    }
                }
                GuestyPropertyReview::create($new_array);
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

    public function getLimitBookingData($url,$token){
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return $data;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }

    public function getAdditionalFeeData($prop_id){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $url='https://open-api.guesty.com/v1/financials/listing/'.$prop_id;
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function getAVailablityDataDataOld($prop_id){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $start=date('Y-m-d');
        $end=date('Y-m-d',strtotime("+1000 days",strtotime($start)));
        $url='https://open-api.guesty.com/v1/availability-pricing/api/calendar/listings/'.$prop_id.'?startDate='.$start.'&endDate='.$end;
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            GuestyAvailablityPrice::where("listingId",$prop_id)->delete();
            if(isset($data['data'])){
                if(isset($data['data']['days'])){
                    foreach($data['data']['days'] as $d){
                        GuestyAvailablityPrice::create(["start_date"=>$d['date'],"listingId"=>$prop_id,"price"=>$d['price'],"minNights"=>$d['minNights'],"status"=>$d['status'],]);
                    }
                }
            }
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function getAVailablityDataData($prop_id){
        $token_data=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();
        if($token_data){$token=$token_data->value;}else{$this->getToken();}
        $start=date('Y-m-d');
        $end=date('Y-m-d',strtotime("+1000 days",strtotime($start)));
        $url='https://booking.guesty.com/api/listings/'.$prop_id.'/calendar?from='.$start.'&to='.$end;
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            GuestyAvailablityPrice::where("listingId",$prop_id)->delete();

            if(is_array($data)){
                if(sizeof($data)){
                    foreach ($data as $key => $d) {
                        GuestyAvailablityPrice::create(["start_date"=>$d['date'],"listingId"=>$prop_id,"minNights"=>$d['minNights'],"status"=>$d['status'],"cta"=>$d['cta'],"ctd"=>$d['ctd']]);
                    }
                }
            }
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function getCalFeeData($prop_id,$start_date,$end_date){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $end_date=date('Y-m-d',strtotime("- 1 days",strtotime($end_date)));
        $url="https://open-api.guesty.com/v1/availability-pricing/api/calendar/listings/".$prop_id."?startDate=".$start_date."&endDate=".$end_date."&includeAllotment=true";
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function getCalAddFeeData(){
         $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $url="https://open-api.guesty.com/v1/additional-fees/account";
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function createGuest($firstname,$lastname,$email,$mobile){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('POST', 'https://open-api.guesty.com/v1/guests-crud', [
                'body' => '{"firstName":"'.$firstname.'","lastName":"'.$lastname.'","email":"'.$email.'","phone":"'.$mobile.'"}',
                'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function newBookingCreate($data){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('POST', 'https://open-api.guesty.com/v1/reservations', [ 'body' => $data, 'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function paymentAttached($guestid,$paymentprovideid,$paymentid,$reservationid){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $client = new \GuzzleHttp\Client();
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://open-api.guesty.com/v1/guests/'.$guestid.'/payment-methods', [
              'body' => '{"skipSetupIntent":false,"paymentProviderId":"'.$paymentprovideid.'","reuse":false,"_id":"'.$paymentid.'","reservationId":"'.$reservationid.'"}',
                 'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']
            ]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function confirmBooking($id){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('PUT', 'https://open-api.guesty.com/v1/reservations/'.$id, [  'body' => '{"status":"confirmed"}', 'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function getAdditionalFeeDataAll($prop_id){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $url='https://open-api.guesty.com/v1/additional-fees/listing/'.$prop_id;
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return (["status"=>200,"data"=>$data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return ( $error);
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return ( $error);
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return ( $error);
        }
    }

    public function getGuestData($id){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', 'https://open-api.guesty.com/v1/guests-crud/'.$id.'?fields=', ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
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

    public function getSearchAvailability($checkin,$checkout,$total_guest){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
             $url='https://open-api.guesty.com/v1/listings?active=true&pmsActive=true&listed=true&available={"checkIn":"'.$checkin.'","checkOut":"'.$checkout.'","minOccupancy":'.$total_guest.'}&sort=title&limit=100&skip=0';
            $response = $client->request('GET', $url, ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token]]);
            $data=json_decode($response->getBody(), true);
            return $data;  
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

    public function saveBookingUsingGuestyData($property_id,$fareAccommodation,$fareCleaning,$startDate,$endDate,$firstname,$lastname,$email,$mobile,$total_guests,$total_amount){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('POST', 'https://open-api.guesty.com/v1/reservations', [    'body' => '{"money":{"fareAccommodation":'.$fareAccommodation.',"fareCleaning":'.$fareCleaning.',"currency":"USD","isFullyPaid":"true","totalPaid":'.$total_amount.'},"guest":{"firstName":"'.$firstname.'","lastName":"'.$lastname.'","phone":"'.$mobile.'","email":"'.$email.'"},"status":"confirmed","checkOutDateLocalized":"'.$endDate.'","checkInDateLocalized":"'.$startDate.'","listingId":"'.$property_id.'","guestsCount":'.$total_guests.'}',    'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }

    public function paidAPi($reg_id,$amount,$stripe_id){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('POST', 'https://open-api.guesty.com/v1/reservations/'.$reg_id.'/payments', [    'body' => '{"paymentMethod":{"method":"STRIPE","saveForFutureUse":false,"id":"'.$stripe_id.'"},"isAuthorizationHold":false,"amount":'.$amount.',"shouldBePaidAt":"'.date('Y-m-d').'","paidAt":"'.date('Y-m-d').'","note":"Paid via Website"}',    'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']    ]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }
    
    public function customAPI(){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('GET', 'https://open-api.guesty.com/v1/payment-providers/summary', ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $error['error'] = $e->getMessage();
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }
      
    public function getBookingPaymentid($listingID){
       $token=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        try {
            $error=["status"=>400];
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://booking.guesty.com/api/listings/'.$listingID.'/payment-provider', ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]); 
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $er =(string)$e->getResponse()->getBody();
            $ar=json_decode($er,true);
            $error['error']=$ar;
            $error['status']=401;
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }

    public function getQuoute(){
        $token=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('POST', 'https://booking.guesty.com/api/reservations/quotes', ['body' => '{"guestsCount":1,"checkInDateLocalized":"2024-08-26","checkOutDateLocalized":"2024-08-30","listingId":"60b624d8aa5a0a002e543afd"}','headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $er =(string)$e->getResponse()->getBody();
            $ar=json_decode($er,true);
            $error['error']=$ar;
            $error['status']=401;
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }

    public function getQuoteNewNew($guestCount,$adults,$child,$checkin,$checkout,$listingid,$coupon=''){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
                $coupon_text='';
                if($coupon!="default"){
                    $coupon_text=',"couponCode": "'.$coupon.'"';
                }
                $response = $client->request('POST', 'https://open-api.guesty.com/v1/quotes', [ 'body' => '{"checkInDateLocalized":"'.$checkin.'","checkOutDateLocalized":"'.$checkout.'","listingId":"'.$listingid.'","source":"manual","guestsCount":'.$guestCount.',"numberOfGuests":{"numberOfChildren":'.$child.',"numberOfInfants":0,"numberOfAdults":'.$adults.'},"ignoreCalendar":false,"ignoreTerms":true,"ignoreBlocks":true'.$coupon_text.'}',   'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']    ]);
                $data=json_decode($response->getBody(), true);
                return ["status"=>200,"message"=>"success","data"=>$data];
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $er =(string)$e->getResponse()->getBody();
                $ar=json_decode($er,true);
                if(isset($ar['error']['message'])){
                    $error['message'] =$ar['error']['message'];
                }
                $error['error']=$ar;
                $error['status']=401;
                return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            $error['message'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            $error['message'] = $e->getMessage();
            return $error;
        }
    }

    public function getQuouteNew($guestCount,$checkin,$checkout,$listingid,$coupon='default'){
        $token=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
                $coupon_text='';
                if($coupon!="default"){
                    $coupon_text=',"coupons": "'.$coupon.'"';
                }
                $response = $client->request('POST', 'https://booking.guesty.com/api/reservations/quotes', ['body' => '{"guestsCount":'.$guestCount.',"checkInDateLocalized":"'.$checkin.'","checkOutDateLocalized":"'.$checkout.'","listingId":"'.$listingid.'"'.$coupon_text.'}','headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
                $data=json_decode($response->getBody(), true);
                return ["status"=>200,"message"=>"success","data"=>$data];
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $er =(string)$e->getResponse()->getBody();
                $ar=json_decode($er,true);
                if(isset($ar['error']['message'])){
                    $error['message'] =$ar['error']['message'];
                }
                $error['error']=$ar;
                $error['status']=401;
                return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            $error['message'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            $error['message'] = $e->getMessage();
            return $error;
        }
    }

    public function addPaymentToReservation($reservationid,$amount,$method,$paymentid = false,$shouldBePaidAt,$paidAt,$note){
        $token=BasicSetting::where("name","API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {   
                if($method === 'STRIPE'){
                    $method = '{"method":"'.$method.'","saveForFutureUse":true,"id":"'.$paymentid.'"}';
                }else{
                    $method = '{"method":"'.$method.'","saveForFutureUse":true}';
                }
                $shouldBePaidAtText = $paidAtText ='';
                if($shouldBePaidAt){
                    $shouldBePaidAtText = '"shouldBePaidAt":"'.$shouldBePaidAt.':00:00.000Z",';
                }else{
                    $shouldBePaidAtText ='';
                }
                if($paidAt){
                    $paidAtText = '"paidAt":"'.$paidAt.'T12:00:00.000Z",';
                }else{
                    $paidAtText = '';
                }    
                $body = '{"paymentMethod":'.$method.',"amount":"'.$amount.'",'.$shouldBePaidAtText.''.$paidAtText.'"note":"'.$note.'"}';
                $response = $client->request('POST', 'https://open-api.guesty.com/v1/reservations/'.$reservationid.'/payments', [
                    'body' => $body,'headers' => ['accept' => 'application/json','authorization' => 'Bearer '.$token,'content-type' => 'application/json'],
                ]);
                $data=json_decode($response->getBody(), true);
                return ["status"=>200,"message"=>"success","data"=>$data];
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $er =(string)$e->getResponse()->getBody();
                $ar=json_decode($er,true);
                if(isset($ar['error']['message'])){
                    $error['message'] =$ar['error']['message'];
                }
                $error['error']=$ar;
                $error['status']=401;
                return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            $error['message'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            $error['message'] = $e->getMessage();
            return $error;
        }
    }

    public function getRatePlanByProperty($listingId,$skip = 0, $limit= 25, $sort = 'name', $channelId = 'manual_reservations'){
        $token=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('POST', "https://open-api.guesty.com/v1/rm-rate-plans-ext/rate-plans/listing/'.$listingId.'?skip='.$skip.'&limit='.$limit.'&sort='.$sort.'&channelId='.$channelId.'", ['headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json'],]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $er =(string)$e->getResponse()->getBody();
            $ar=json_decode($er,true);
            $error['error']=$ar;
            $error['status']=401;
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }

    }

    public function setBookingData(){
        $token=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        try {
            $response = $client->request('POST', 'https://booking.guesty.com/api/reservations/quotes/64f8b525b43093730c452367/instant', ['body' => '{"guest":{"firstName":"Kumar","lastName":"Gaurav","email":"ducatgaurav@gmail.com","phone":"9045642302"},"ratePlanId":"default-rateplan-id","ccToken":"pm_1NnPmeJe5pbWYY2lfFbGgWl2"}','headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json'],]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $er =(string)$e->getResponse()->getBody();
            $ar=json_decode($er,true);
            $error['error']=$ar;
            $error['status']=401;
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }

    public function setBookingDataNew($first_name,$last_name,$email,$mobile,$rate_plan_id,$stripe_main_payment_method,$quote_id){
        $token=BasicSetting::where("name","BOOKING-API-TOKEN-DATA")->first();;
        if($token){$token=$token->value;}else{$this->getBookingToken();}
        $error=["status"=>400];
        $client = new GuzzleHttp\Client();
        $url = '{"guest":{"firstName":"'.$first_name.'","lastName":"'.$last_name.'","email":"'.$email.'","phone":"'.$mobile.'"},"ratePlanId":"'.$rate_plan_id.'","ccToken":"'.$stripe_main_payment_method.'"}';
        try {
            $response = $client->request('POST', 'https://booking.guesty.com/api/reservations/quotes/'.$quote_id.'/instant', ['body' => $url ,'headers' => ['accept' => 'application/json','Authorization' => 'Bearer '.$token,'content-type' => 'application/json']]);
            $data=json_decode($response->getBody(), true);
            return ["status"=>200,"message"=>"success","data"=>$data];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $er =(string)$e->getResponse()->getBody();
            $ar=json_decode($er,true);
            $error['error']=$ar;
            $error['status']=401;
            return $error;
        } catch(\GuzzleHttp\Exception\RequestException $se){
            $error['error'] = $se->getMessage();
            return $error;
        } catch(Exception $e){
            $error['error'] = $e->getMessage();
            return $error;
        }
    }
}
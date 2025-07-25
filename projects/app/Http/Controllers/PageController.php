<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\NewsLetter;
use App\Models\Cms;
use Mail;
use App\Helper\Upload;
use ModelHelper;
use Helper;
use DB;
use MailHelper;
use LiveCart;
use Session;
use Response;
use App\Models\Blogs\Blog;
use App\Models\Blogs\BlogCategory;
use App\Models\Guesty\GuestyProperty;
use App\Models\Guesty\GuestyAvailablityPrice;
use App\Models\ContactusRequest;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Property;
use App\Models\Location;
use App\Models\Attraction;
use App\Models\BookingRequest;
use App\Models\LandingCms;
use App\Models\SeoCms;
use App\Models\PropertyManagementRequest;
use App\Models\OnboardingRequest;
use App\Models\HostAnEvent;
use App\Models\PropertyEnquiryRequest;
use Image;
use Validator;
use GuestyApi;
use App\Models\OurTeam;
use HospitableApi;
use App\Models\Hospitable\HospitableProperty;
use App\Models\HomeGallery;
use App\Models\ProductionGallery;

class PageController extends Controller
{
    function getPropertyList(){
        HospitableApi::getAllPropertiesList();
        return redirect()->back();
    }
  
    function getupdatedPropertiesCalendar(){
        HospitableApi::getupdatedPropertiesCalendar();
        return redirect()->back();
    }

    // function getPropertyDetail($id){
    //     HospitableApi::getAllPropertiesList($id);
    //     return redirect()->back();
    // }

    function singlePost(Request $request, $seo_url)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email', 'first_name' => "required", "message" => "required", "property_id" => "required"]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first())->withErrors($validator->errors());
        }
        PropertyEnquiryRequest::create($request->all());
        $p = Property::find($request->property_id);
        $proeprty_name = $p->name;
        $mailData = ["type" => "thank_you_for_property_user", 'username' => $request->first_name . " " . $request->last_name, "to" => $request->email];
        MailHelper::emailSender($mailData);
        $mailData = ["type" => "property_admin", 'username' => $request->first_name . " " . $request->last_name, 'useremail' => $request->email, 'usermobile' => $request->mobile, 'usermessage' => $request->message, 'userpropertyname' => $proeprty_name, "to" => ModelHelper::getDataFromSetting('contact_us_receiving_mail')];
        MailHelper::emailSender($mailData);
        return redirect()->back()->with("success", "Thank you for submitting your query, we will get in touch shortly");
    }

    public function ourTeamSingle($seo_url)
    {
        $data = OurTeam::where("seo_url", $seo_url)->first();
        if ($data) {
            return view("front.meet-the-teams.common", compact("data"));
        }
        return abort(404);
    }

    public function getReviewData()
    {
        GuestyApi::getReviewData();
        return redirect()->back();
    }

    public function getPropertyData()
    {
        GuestyApi::getPropertyData();
        return redirect()->back();
    }

    public function getBookingData()
    {
        GuestyApi::getBookingData();
        return redirect()->back();
    }

    public function getToken()
    {
        GuestyApi::getToken();
        return redirect()->back();
    }

    public function getBookingToken()
    {
        GuestyApi::getBookingToken();
        return redirect()->back();
    }

    public function propertyDetail($seo_url)
    {
        return redirect($seo_url);
        $data = GuestyProperty::where("seo_url", $seo_url)->first();
        if ($data) {
            return view("front.property.singleGuesty", compact("data"));
        }
        return abort(404);
    }

    public function attractionSingle($seo_url)
    {
        $data = Attraction::where("seo_url", $seo_url)->first();
        if ($data) {
            return view("front.attractions.single", compact("data"));
        }
        return abort(404);
    }

    public function attractionLocation($seo_url)
    {
        $data = Location::where("seo_url", $seo_url)->first();
        if ($data) {
            return view("front.attractions.location", compact("data"));
        }
        return abort(404);
    }

    public function propertyLocation($seo_url)
    {
        $data = Location::where("seo_url", $seo_url)->first();
        if ($data) {
            return view("front.property.location", compact("data"));
        }
        return abort(404);
    }

    public function reviewSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email', 'name' => "required", "message" => "required"]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first())->withErrors($validator->errors());
        }
        Testimonial::create($request->all());
        return redirect()->back()->with("success", "Thank you for submitting your review");
    }

    public function hostaneventPost(Request $request)
    {
        $validator = Validator::make($request->all(), []);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first())->withErrors($validator->errors());
        }
        $data = ($request->all());
        if ($request->you_are_interested_in) {
            $data['you_are_interested_in'] = json_encode($request->you_are_interested_in);
        }
        if ($request->select_your_budget) {
            $data['select_your_budget'] = json_encode($request->select_your_budget);
        }




        HostAnEvent::create($data);
        return redirect()->back()->with("success", "Thank you for submitting your review");
    }

   public function getHomeGallery(Request $request){
    if($request->page){
        $page = $request->get('page', 1);
        $perPage = 6;
        $gallery = HomeGallery::orderBy('id')
                                ->forPage($page, $perPage)
                                ->get();
        $galleryList = view('front.property.ajax-all-gallery', compact("gallery"))->render();
        return ['status' => 200, 'gallery' => $galleryList];
    }
     return ['status' => 400, 'gallery' => []];
   }
  
    public function getProductionGallery(Request $request)
{
    if ($request->has('page')) {
        $page = (int) $request->get('page', 1);
        $perPage = 3;
        $skip = ($page - 1) * $perPage;

        $gallery = ProductionGallery::where('type', 'gallery-section')
            ->orderBy('id')
            ->skip($skip)
            ->take($perPage)
            ->get();

        // If no more data
        if ($gallery->isEmpty()) {
            return ['status' => 204, 'gallery' => ''];
        }

        // Render each gallery item using a Blade partial
        $html = '';
        foreach ($gallery as $item) {
            $html .= view('front.property.ajax-all-production-gallery', compact('item'))->render();
        }

        return ['status' => 200, 'gallery' => $html];
    }

    return ['status' => 400, 'gallery' => ''];
}

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function contactPost(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email', 'name' => "required", "message" => "required", 'captcha' => 'nullable|captcha']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first())->withErrors($validator->errors());
        }
        if (ModelHelper::getDataFromSetting('g_captcha_enabled')):
            if (ModelHelper::getDataFromSetting('g_captcha_enabled') == "yes"):
                if (ModelHelper::getDataFromSetting('google_captcha_site_key') != "" && ModelHelper::getDataFromSetting('google_captcha_secret_key') != ""):
                    if ($request->get('g-recaptcha-response')):
                        $secretKey = ModelHelper::getDataFromSetting('google_captcha_secret_key');
                        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $request->get('g-recaptcha-response'));
                        $responseData = json_decode($verifyResponse);
                        if ($responseData->success) {
                        } else {
                            return redirect()->back()->withInput()->with("danger", "Robot verification failed, please try again.");
                        }
                    else:
                        return redirect()->back()->withInput()->with("danger", "Please check on the reCAPTCHA box.");
                    endif;

                endif;
            endif;
        endif;
        $ar = explode(",", ModelHelper::getDataFromSetting('blocked_email'));
        if (in_array($request->email, $ar)) {
            return redirect()->back()->with("success", "Thank you for submitting your query, we will get in touch shortly");
        }
        ContactusRequest::create($request->all());
        $mailData = ["type" => "thank_you_for_feedback_user", 'username' => $request->name, "to" => $request->email];
        MailHelper::emailSender($mailData);
        $mailData = ["type" => "feedback_admin", 'username' => $request->name, 'useremail' => $request->email, 'usermobile' => $request->mobile, 'usermessage' => $request->message, "to" => ModelHelper::getDataFromSetting('contact_us_receiving_mail')];
        MailHelper::emailSender($mailData);
        return redirect()->back()->with("success", "Thank you for submitting your query, we will get in touch shortly");
    }

    public function onboardingPost(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first())->withErrors($validator->errors());
        }
        $data = $request->all();
        if ($request->hasFile("file1")) {
            $data['file1'] = Upload::fileUpload($request->file("file1"), "cms");
        }
        if ($request->hasFile("file2")) {
            $data['file2'] = Upload::fileUpload($request->file("file2"), "cms");
        }
        OnboardingRequest::create($data);
        $mailData = ["type" => "Onboarding_admin", "first_name" => $request->first_name, "last_name" => $request->last_name, "email" => $request->email, "mobile" => $request->mobile, "bill_to_address" => $request->bill_to_address, "rental_property_address" => $request->rental_property_address, "owner_birthday" => $request->owner_birthday, "company_name" => $request->company_name, "social_security_number" => $request->social_security_number, "business_ein_number" => $request->business_ein_number, "routing_number_of_deposites" => $request->routing_number_of_deposites, "account_number" => $request->account_number, "account_name" => $request->account_name, "account_card_number" => $request->account_card_number, "account_exp" => $request->account_exp, "account_cvv" => $request->account_cvv, "housekeeping_closet_access" => $request->housekeeping_closet_access, "wifi_lock_Access" => $request->wifi_lock_Access, "security_camera_login_instruction" => $request->security_camera_login_instruction, "to" => ModelHelper::getDataFromSetting('contact_us_receiving_mail')];
        MailHelper::emailSender($mailData);
        return redirect()->back()->with("success", "Thank you for submitting your query, we will get in touch shortly");
    }

    public function propertyManagementPost(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email', 'name' => "required",]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first())->withErrors($validator->errors());
        }
        PropertyManagementRequest::create($request->all());
        $mailData = ["type" => "thank_you_for_property_management_user", 'username' => $request->name, "to" => $request->email];
        MailHelper::emailSender($mailData);
        $mailData = ["type" => "property_management_admin", 'username' => $request->name, 'useremail' => $request->email, 'usermobile' => $request->mobile, 'property_address' => $request->property_address, 'property_type' => $request->property_type, 'number_of_bedrooms' => $request->number_of_bedrooms, 'number_of_bathrooms' => $request->number_of_bathrooms, 'what_is_your_rental_goal' => $request->what_is_your_rental_goal, 'what_are_you_looking_to_rent_your_property' => $request->what_are_you_looking_to_rent_your_property, 'is_the_property_currently_closed' => $request->is_the_property_currently_closed, "to" => ModelHelper::getDataFromSetting('contact_us_receiving_mail')];
        MailHelper::emailSender($mailData);
        return redirect()->back()->with("success", "Thank you for submitting your query, we will get in touch shortly");
    }

    public function newsletterPost(Request $request)
    {

        $validator = Validator::make($request->all(), ['email' => 'required|email|unique:newsletters,email']);
        if ($validator->fails()) {
            
            return redirect()->back()->withInput()->with("danger", $validator->errors()->first());
        }
        $data = NewsLetter::where("email", $request->email)->first();
        if ($data) {
            return redirect()->back()->withInput()->with("danger", "Already subscribe");
        } else {
            NewsLetter::create(["email" => $request->email]);
            $mailData = ["type" => "newsletter", 'useremail' => $request->email, "to" => ModelHelper::getDataFromSetting('contact_us_receiving_mail')];
            MailHelper::emailSender($mailData);
            return redirect()->back()->with("success", "Thank you for submitting your query, we will get in touch shortly");
        }
    }

    public function categoryData($seo)
    {
        $data = BlogCategory::where("seo_url", $seo)->first();
        if ($data) {
            $blogs = Blog::where("blog_category_id", $data->id)->orderBy("id", "desc")->paginate(12);
            return view("front.group.category", compact("data", "blogs"));
        }
        return abort(404);
    }

    public function blogSingle($seo_url)
    {
        $data = Blog::where("seo_url", $seo_url)->first();
        if ($data) {
            $category = BlogCategory::find($data->blog_category_id);
            return view("front.group.single", compact("data", "category"));
        }
        return abort(404);
    }

    public function index()
    {
        $data = Cms::where("seo_url", 'home')->first();
        if ($data) {
            if ($data->templete == "home") {
                $templete = "front.static." . $data->templete;
                return view($templete, compact("data"));
            }
        }
        return abort(404);
    }

    public function adminCheckAjaxGetQuoteData(Request $request)
    {
        if ($request->property_id) {
            $property = Property::find($request->property_id);
            if ($request->start_date) {
                if ($request->end_date) {
                    $main_data = Helper::getGrossAmountData($property, $request->start_date, $request->end_date);
                    if ($main_data['status'] == "true") {
                        $main_data['start_date'] = $request->get("start_date");
                        $main_data['end_date'] = $request->get("end_date");
                        $main_data['adults'] = $request->get("adults");
                        $main_data['childs'] = $request->get("childs");
                        $main_data['pet_fee_data_guarav'] = $request->get("pet_fee_data_guarav");
                        $main_data['heating_pool_fee'] = $request->heating_pool_fee_data_guarav;
                        $main_data['total_guests'] = $request->get("adults") + $request->get("childs");
                        $main_data['adults'] = $request->get("adults");
                        $main_data['child'] = $request->get("childs");
                        $main_data['start_date'] = $request->get("start_date");
                        $main_data['end_date'] = $request->get("end_date");
                        $main_data['heating_pool_fee'] = $request->get("heating_pool_fee_data_guarav");
                        $main_data['adults'] = $request->get("adults");
                        $main_data['childs'] = $request->get("childs");
                        $main_data['pet_fee_data_guarav'] = $request->get("pet_fee_data_guarav");
                        $main_data['extra_discount'] = $request->get('extra_discount');
                        $data_view = view('admin.common.get-quote', compact("main_data", "property"))->render();
                        return response()->json(["message" => "success", "status" => 200, "data_view" => $data_view]);
                    } else if ($main_data['status'] == "already-booked") {
                        return response()->json(["message" => "Already booked some date", "status" => 400]);
                    } else if ($main_data['status'] == "checkin-checkout-day") {
                        return response()->json(["message" => $main_data['message'], "status" => 400]);
                    } else if ($main_data['status'] == "min-stay-day") {
                        return response()->json(["message" => "Minimum stay is not statisfy", "status" => 400]);
                    } else if ($main_data['status'] == "date-price") {
                        return response()->json(["message" => "Price is not defined", "status" => 400]);
                    } else {
                        return response()->json(["message" => "Invalid Calling", "status" => 400, "message1" => $main_data['status']]);
                    }
                } else {
                    return response()->json(["message" => "Invalid Checkout", "status" => 400]);
                }
            } else {
                return response()->json(["message" => "Invalid Checkin", "status" => 400]);
            }
        } else {
            return response()->json(["message" => "Property Not select", "status" => 400]);
        }
    }

    public function adminCheckAjaxGetQuoteDataEdit(Request $request)
    {
        if ($request->property_id) {
            $property = Property::find($request->property_id);
            if ($request->start_date) {
                if ($request->end_date) {
                    $main_data = Helper::getGrossAmountData($property, $request->start_date, $request->end_date);
                    if ($main_data['status'] == "true") {
                        $main_data['start_date'] = $request->get("start_date");
                        $main_data['end_date'] = $request->get("end_date");
                        $main_data['adults'] = $request->get("adults");
                        $main_data['childs'] = $request->get("childs");
                        $main_data['pet_fee_data_guarav'] = $request->get("pet_fee_data_guarav");
                        $main_data['heating_pool_fee'] = $request->get("heating_pool_fee_data_guarav");
                        $main_data['total_guests'] = $request->get("adults") + $request->get("childs");
                        $main_data['adults'] = $request->get("adults");
                        $main_data['child'] = $request->get("childs");
                        $main_data['start_date'] = $request->get("start_date");
                        $main_data['end_date'] = $request->get("end_date");
                        $main_data['adults'] = $request->get("adults");
                        $main_data['childs'] = $request->get("childs");
                        $main_data['pet_fee_data_guarav'] = $request->get("pet_fee_data_guarav");
                        $main_data['extra_discount'] = $request->get('extra_discount');
                        $main_data['coupon_discount'] = $request->get('coupon_discount');
                        $main_data['coupon_discount_code'] = $request->get('coupon_discount_code');
                        $data_view = view('admin.common.get-quote-edit', compact("main_data", "property"))->render();
                        return response()->json(["message" => "success", "status" => 200, "data_view" => $data_view]);
                    } else if ($main_data['status'] == "already-booked") {
                        return response()->json(["message" => "Already booked some date", "status" => 400]);
                    } else if ($main_data['status'] == "min-stay-day") {
                        return response()->json(["message" => "Minimum stay is not statisfy", "status" => 400]);
                    } else if ($main_data['status'] == "date-price") {
                        return response()->json(["message" => "Price is not defined", "status" => 400]);
                    } else if ($main_data['status'] == "checkin-checkout-day") {
                        return response()->json(["message" => $main_data['message'], "status" => 400]);
                    } else {
                        return response()->json(["message" => "Invalid Calling", "status" => 400]);
                    }
                } else {
                    return response()->json(["message" => "Invalid Checkout", "status" => 400]);
                }
            } else {
                return response()->json(["message" => "Invalid Checkin", "status" => 400]);
            }
        } else {
            return response()->json(["message" => "Property Not select", "status" => 400]);
        }
    }

    public function checkAjaxGetQuoteData(Request $request)
    {
        if ($request->property_id) {
            $property = GuestyProperty::find($request->property_id);
            if ($request->start_date) {
                if ($request->end_date) {
                    $guestCount = $request->adults + $request->childs;
                    $coupon = "default";
                    if ($request->get("coupon")) {
                        $coupon = $request->get("coupon");
                    }
                    $data_abc = Helper::getGrossDataCheckerDays($property, $request->start_date, $request->end_date);
                    if ($data_abc) {
                        if ($data_abc['status'] == 200) {
                        } else {
                            return response()->json(["message" => $data_abc['message'], "status" => 400]);
                        }
                    }
                    $guestyapi = (GuestyApi::getQuouteNew($guestCount, $request->start_date, $request->end_date, $property->_id, $coupon));        
                    //$guestyapi=GuestyApi::getQuoteNewNew($guestCount,$request->adults,$request->childs,$request->start_date,$request->end_date,$property->_id,$coupon);
                    if ($guestyapi) {
                        if ($guestyapi['status'] == 200) {
                            $main_data['guestyapi'] = $guestyapi;
                            $main_data['total_guests'] = $guestCount;
                            $main_data['adults'] = $request->get("adults");
                            $main_data['child'] = $request->get("childs");
                            $main_data['childs'] = $request->get("childs");
                            $main_data['start_date'] = $request->get("start_date");
                            $main_data['end_date'] = $request->get("end_date");
                            $data_view = view("front.property.ajax-gaurav-data-get-quote", compact("property", "main_data"))->render();
                            return response()->json(["message" => "success", "status" => 200, "data_view" => $data_view]);
                        } else {
                            if (isset($guestyapi['message'])) {
                                return response()->json(["message" => $guestyapi['message'], "status" => 400]);
                            } else {
                                return response()->json(["message" => "something happen", "status" => 400]);
                            }
                        }
                    } else {
                        return response()->json(["message" => "something happen", "status" => 400]);
                    }
                } else {
                    return response()->json(["message" => "Invalid Checkout", "status" => 400]);
                }
            } else {
                return response()->json(["message" => "Invalid Checkin", "status" => 400]);
            }
        } else {
            return response()->json(["message" => "Property Not select", "status" => 400]);
        }
    }

    public function dynamicDataCategory(Request $request, $seo_url)
    {
        if ($seo_url == "home") {
            return redirect("/");
        }
        $data = Cms::where("seo_url", $seo_url)->first();
        if ($data) {
            $templete = "front.static." . $data->templete;
            $ogimage = '';
            if ($data->ogimage) {
                $ogimage = $data->ogimage;
            }
            if ($data->templete == "blogs") {
                $blogs = Blog::orderBy("id", "desc")->paginate(12);
                return view($templete, compact("data", "blogs"))->with("ogimage", $ogimage);
            } else if ($data->templete == "get-quote") {
                if ($request->property_id) {
                    $property = GuestyProperty::find($request->property_id);
                    if ($request->start_date) {
                        if ($request->end_date) {
                            $total_guest = $request->get("adults") + $request->get("child");
                            if ($property->accommodates >= $total_guest) {
                                $guestCount = $request->adults + $request->child;
                                $coupon = "default";
                                if ($request->get("coupon")) {
                                    $coupon = $request->get("coupon");
                                } 
                                $data_abc = Helper::getGrossDataCheckerDays($property, $request->start_date, $request->end_date);
                                if ($data_abc) {
                                    if ($data_abc['status'] == 200) {
                                    } else {
                                        return redirect($property->seo_url)->with("danger", $data_abc['message']);
                                    }
                                }
                                $guestyapi = (GuestyApi::getQuouteNew($guestCount, $request->start_date, $request->end_date, $property->_id, $coupon));                               
                                //$guestyapi=GuestyApi::getQuoteNewNew($guestCount,$request->adults,$request->child,$request->start_date,$request->end_date,$property->_id,$coupon);
                                //dd($guestyapi);
                                if ($guestyapi) {
                                    if ($guestyapi['status'] == 200) {
                                        $main_data['guestyapi'] = $guestyapi;
                                        $main_data['total_guests'] = $total_guest;
                                        $main_data['adults'] = $request->get("adults");
                                        $main_data['child'] = $request->get("child");
                                        $main_data['start_date'] = $request->get("start_date");
                                        $main_data['end_date'] = $request->get("end_date");
                                        $main_data['adults'] = $request->get("adults");
                                        $main_data['childs'] = $request->get("child");
                                        $main_data['pet_fee_data_guarav'] = $request->get("no_of_pets");
                                        $main_data['heating_pool_fee'] = $request->get("heating_pool_fee");
                                        return view($templete, compact("data", "main_data", "property"))->with("ogimage", $ogimage);
                                    } else {
                                        if (isset($guestyapi['message'])) {
                                            return redirect($property->seo_url)->with("danger", $guestyapi['message']);
                                        } else {
                                            return redirect($property->seo_url)->with("danger", 'Something happen');
                                        }
                                    }
                                } else {
                                    return redirect($property->seo_url)->with("danger", "something happen");
                                }
                            } else {
                                return redirect($property->seo_url)->with("danger", "Guest lImit not exceed " . $property->accommodates);
                            }
                        } else {
                            return redirect($property->seo_url)->with("danger", "Invalid Checkout");
                        }
                    } else {
                        return redirect($property->seo_url)->with("danger", "Invalid Checkin");
                    }
                } else {
                    return redirect()->back()->with("danger", "Invalid Property");
                }
            } else {

                return view($templete, compact("data"))->with("ogimage", $ogimage);
            }
        }
        $data = LandingCms::where("seo_url", $seo_url)->first();
        if ($data) {
            $templete = "front.landing-pages." . $data->templete;
            return view($templete, compact("data"));
        }
        // $data = GuestyProperty::where("seo_url", $seo_url)->first();
        // if ($data) {
        //     $ogimage = '';
        //     if ($data->ogimage) {
        //         $ogimage = $data->ogimage;
        //     }
        //     return view("front.property.singleGuesty", compact("data"))->with("ogimage", $ogimage);
        // }
        $data = HospitableProperty::where("seo_url", $seo_url)->first();
        if ($data) {
            $templete = "front.property.singleHospitable";
            return view($templete, compact("data"));
        }

         $data = Property::where("seo_url", $seo_url)->first();
         if ($data) {
             $templete = "front.property.single";
             return view($templete, compact("data"));
         }
        return abort(404);
    }

    public function getVacationData($seo_url)
    {
        $data = SeoCms::where("seo_url", $seo_url)->first();
        if ($data) {
            $templete = "front.seo-pages." . $data->templete;
            return view($templete, compact("data"));
        }
        return abort(404);
    }

    public function saveBookingDataOld(Request $request)
    {
        if ($request->property_id) {
            $property = GuestyProperty::find($request->property_id);
            if ($property) {
                $data = $request->all();
                $data['name'] = $request->firstname . " " . $request->lastname;
                $ar_gaurav_data = BookingRequest::where("request_id", $request->request_id)->first();
                if ($ar_gaurav_data) {
                    BookingRequest::where("request_id", $request->request_id)->delete();
                    $booking = BookingRequest::create($data);
                } else {
                    $booking = BookingRequest::create($data);
                }
                $before = json_decode($request->before_total_fees, true);
                $fareAccommodation = 0;
                $fareCleaning = 0;
                $item = [];
                foreach ($before as $b) {
                    if (isset($b['type'])) {
                        if ($b['type'] == "ACCOMMODATION_FARE") {
                            $fareAccommodation += $b['amount'];
                        } else if ($b['type'] == "CLEANING_FEE") {
                            $fareCleaning += $b['amount'];
                        } elseif ($b['type'] != "TAX") {
                            if ($b['normalType'] == "AFE") {
                                $type = 'DAMAGE_WAIVER';
                            } else {
                                $type = $b['type'];
                            }
                            $item[] = '{"title":"' . $b['title'] . '","amount":' . $b['amount'] . ',"normalType":"' . $b['normalType'] . '","secondIdentifier":"' . $type . '"}';
                        }
                    }
                }

                $all_data = json_decode($property->all_data, true);
                $booking = BookingRequest::find($booking->id);
                if ($request->total_pets) {
                    if ($request->total_pets > 0) {
                        $additionalFees = GuestyApi::getAdditionalFeeDataAll($property->_id);
                        if (isset($additionalFees['status'])) {
                            if ($additionalFees['data']) {
                                foreach ($additionalFees['data'] as $c) {
                                    if ($c['type'] == "PET") {
                                        $pet_fee = $c['value'];
                                        $item[] = '{"title":"Pet Fee","amount":' . ($pet_fee) . ',"normalType":"PF","secondIdentifier":"PET"}';
                                        BookingRequest::find($booking->id)->update(["pet_fee" => $pet_fee]);
                                    }
                                }
                            }
                        }
                    }
                }
                $guestyGuestObject = GuestyApi::createGuest($request->firstname, $request->lastname, $request->email, $request->mobile);
                if ($guestyGuestObject) {
                    if (isset($guestyGuestObject['status'])) {
                        if ($guestyGuestObject['status'] == 200) {
                            if (isset($guestyGuestObject['data'])) {
                                if (isset($guestyGuestObject['data']['_id'])) {
                                    $guest_id = $guestyGuestObject['data']['_id'];
                                    $email = $request->email;
                                    $firstname = $request->firstname;
                                    $lastname = $request->lastname;
                                    $mobile = $request->mobile;
                                    $invoiceItems = ["inv"];
                                    $checkin = $request->checkin;
                                    $checkout = $request->checkout;
                                    $adults = $request->adults;
                                    $child = $request->child;
                                    $guestCount = $adults + $child;
                                    $listingid = $property->_id;
                                    BookingRequest::find($booking->id)->update(["new_guest_id" => $guest_id, "new_guest_object" => json_encode($guestyGuestObject['data']), "new_property_id" => $listingid]);
                                    $booking = BookingRequest::find($booking->id);
                                    if (count($item) > 0) {
                                        $item = '"invoiceItems":[' . implode(",", $item) . ']';
                                        $data = '{"guestId":"' . $guest_id . '","listingId":"' . $listingid . '","checkInDateLocalized":"' . $checkin . '","checkOutDateLocalized":"' . $checkout . '","status":"inquiry","money":{"fareAccommodation":"' . $fareAccommodation . '","fareCleaning":"' . $fareCleaning . '","currency":"USD",' . $item . '},"guest":{"firstName":"' . $firstname . '","lastName":"' . $lastname . '","phone":"' . $mobile . '","email":"' . $email . '"}}';
                                    } else {
                                        $data = '{"guestId":"' . $guest_id . '","listingId":"' . $listingid . '","checkInDateLocalized":"' . $checkin . '","checkOutDateLocalized":"' . $checkout . '","status":"inquiry","money":{"fareAccommodation":"' . $fareAccommodation . '","fareCleaning":"' . $fareCleaning . '","currency":"USD"},"guest":{"firstName":"' . $firstname . '","lastName":"' . $lastname . '","phone":"' . $mobile . '","email":"' . $email . '"}}';
                                    }
                                    BookingRequest::find($booking->id)->update(["new_pre_booking_object" => $data, "new_booking_status" => "inquiry"]);
                                    $booking = BookingRequest::find($booking->id);
                                    $responseData = GuestyApi::newBookingCreate($data);
                                    //dd($responseData,$data);
                                    if (isset($responseData['status'])) {
                                        if ($responseData['status'] == 200) {
                                            if (isset($responseData['data'])) {
                                                if (isset($responseData['data']['id'])) {
                                                    BookingRequest::find($booking->id)->update(["new_result_booking_object" => json_encode($responseData['data']), "new_reservation_id" => $responseData['data']['id']]);
                                                    return redirect('get-quote-after/' . $responseData['data']['id']);
                                                } else {
                                                    return redirect()->back()->with("danger", "Something Happen Please consult our customer care.");
                                                }
                                            } else {
                                                return redirect()->back()->with("danger", "Something Happen Please consult our customer care.");
                                            }
                                        } else {
                                            return redirect()->back()->with("danger", "Something Happen Please consult our customer care.");
                                        }
                                    } else {
                                        return redirect()->back()->with("danger", "Something Happen Please consult our customer care.");
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                return redirect()->back()->with("danger", "Invalid Property");
            }
        } else {
            return redirect()->back()->with("danger", "Invalid Property");
        }
    }

    public function getQuoteAfter($id)
    {
        $booking = BookingRequest::where("new_reservation_id", $id)->where("new_booking_status", "inquiry")->first();
        if ($booking) {
            $property = GuestyProperty::find($booking->property_id);
            if ($property) {
                $data = new \stdClass();
                $data->name = "Payment Request";
                $data->meta_title = "Payment Request";
                $data->meta_keywords = "Payment Request";
                $data->meta_description = "Payment Request";
                return view("front.booking.second-step-get-quote", compact("booking", "data", "property"));
            }
        }
        return abort(404);
    }

    public function updatepaymentBookingData($id, Request $request)
    { 
        $booking = BookingRequest::where("new_reservation_id", $id)->where("new_booking_status", "inquiry")->first();
        if ($booking) {
            $property = GuestyProperty::find($booking->property_id);
            if ($property) {
                BookingRequest::where("new_reservation_id", $id)->where("new_booking_status", "inquiry")->update(["total_amount" => $request->total_amount, "amount_data" => $request->amount_data]);

                $booking = BookingRequest::where("new_reservation_id", $id)->where("new_booking_status", "inquiry")->first();
                $payment_id = '';
                $paymentIDObject = GuestyApi::getBookingPaymentid($property->_id);

                if ($paymentIDObject) {
                    if ($paymentIDObject['status'] == 200) {
                        if (isset($paymentIDObject['data'])) {
                            if (isset($paymentIDObject['data']['_id'])) {
                                if (isset($paymentIDObject['data']['status'])) {
                                    if (isset($paymentIDObject['data']['status'])) {
                                        $payment_id = $paymentIDObject['data']['_id'];
                                        $card_number = $request->card_number;
                                        $card_exp_month = $request->card_expiry_month;
                                        $card_exp_year = $request->card_expiry_year;
                                        $card_exp_cvv = $request->card_cvv;
                                        $card_name = $request->card_name;
                                        $card_address_line1 = $request->address_line_1;
                                        $card_city = $request->city;
                                        $card_zipcode = $request->zipcode;
                                        $card_country = $request->country;
                                        $amount = $booking->total_amount;
                                        $pdata = '{"paymentProviderId": "' . $payment_id . '","card": {"number": "' . $card_number . '","exp_month": "' . $card_exp_month . '","exp_year": "' . $card_exp_year . '","cvc": "' . $card_exp_cvv . '"},"billing_details": {"name": "' . $card_name . '","address": {"line1": "' . $card_address_line1 . '","city": "' . $card_city . '","postal_code": "' . $card_zipcode . '","country": "' . $card_country . '"}},"threeDS": {"amount": ' . $amount . ',"currency": "USD",  "successURL":"' . url('thankyou') . '","failureURL":"' . url('failed') . '"}}';
                                        $token = \App\Models\BasicSetting::where("name", "API-TOKEN-DATA")->first();;
                                        if ($token) {
                                            $token = $token->value;
                                        } else {
                                            $this->getBookingToken();
                                        }

                                        try {
                                            $error = ["status" => 400];
                                            $client = new \GuzzleHttp\Client();
                                            $response = $client->request('POST', 'https://pay.guesty.com/api/tokenize/v2', ['body' => $pdata, 'headers' => ['accept' => 'application/json', 'Authorization' => 'Bearer ' . $token, 'content-type' => 'application/json']]);
                                            $data11 = json_decode($response->getBody(), true);
                                            $reult_payment = (["status" => 200, "message" => "success", "data" => $data11]);
                                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                                            $er = (string)$e->getResponse()->getBody();
                                            $ar = json_decode($er, true);
                                            $error['error'] = $ar;
                                            $error['status'] = 401;
                                            $reult_payment = $error;
                                        } catch (\GuzzleHttp\Exception\RequestException $se) {
                                            $error['error'] = $se->getMessage();
                                            $reult_payment = $error;
                                        } catch (Exception $e) {
                                            $error['error'] = $e->getMessage();
                                            $reult_payment = $error;
                                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                                            $error['error'] = $e->getMessage();
                                            $reult_payment = $error;
                                        }
                                        $stripe_main_payment_method = '';
                                        if ($reult_payment['status'] == 200) {
                                            if (isset($reult_payment['data'])) {
                                                if (isset($reult_payment['data']['_id'])) {
                                                    $stripe_main_payment_method = $reult_payment['data']['_id'];
                                                    $data['stripe_main_payment_method'] = $stripe_main_payment_method;
                                                    //we need to implement the partial payment method here

                                                    GuestyApi::paymentAttached($booking->new_guest_id, $payment_id, $stripe_main_payment_method, $booking->new_reservation_id);

                                                    $apiresponse = [];
                                                    $method = [0 => "CASH", 1 => "STRIPE"];
                                                    if (isset($booking)) {
                                                        if (isset($booking['amount_data'])) {
                                                            $shouldBePaidAt = $paidAt = '';
                                                            $amount_data = json_decode($booking['amount_data']);
                                                            foreach ($amount_data as $key => $value) {
                                                                if ($value->date == date('Y-m-d')) {
                                                                    $shouldBePaidAt = $value->date;
                                                                } else if ($value->date > date('Y-m-d')) {
                                                                    $paidAt = $value->date;
                                                                }
                                                                $apiresponse[] = GuestyApi::addPaymentToReservation($booking->new_reservation_id, $value->amount, $method[1], $data['stripe_main_payment_method'], $shouldBePaidAt, $paidAt, $value->message);
                                                                $shouldBePaidAt = $paidAt = '';
                                                            }
                                                            GuestyApi::confirmBooking($booking->new_reservation_id);
                                                        }
                                                    }

                                                    BookingRequest::find($booking->id)->update(["new_booking_status" => "confirm", 'payment_object' => $apiresponse]);
                                                    $booking = BookingRequest::find($booking->id);
                                                    $new_data = ['booking_status' => "booking-confirmed", "rental_aggrement_status" => "true", "payment_status" => "Stripe key send"];
                                                    BookingRequest::find($booking->id)->update($new_data);
                                                    return redirect('payment/success/' . $booking->id);
                                                }
                                            }
                                        }
                                        if (isset($reult_payment['error'])) {
                                            if (isset($reult_payment['error']['row'])) {
                                                if (isset($reult_payment['error']['row']['message'])) {
                                                    return redirect()->back()->with("danger", $reult_payment['error']['raw']['message']);
                                                }
                                            }
                                        } else {
                                            return redirect()->back()->with("danger", $reult_payment['error']['message']);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return abort(404);
    }

    public function saveBookingData(Request $request)
    { 
        if ($request->property_id) {
            $property = GuestyProperty::find($request->property_id);            
            if ($property) {
                $payment_id = '';
                $paymentIDObject = GuestyApi::getBookingPaymentid($property->_id);                
                if ($paymentIDObject) {
                    if ($paymentIDObject['status'] == 200) {
                        if (isset($paymentIDObject['data'])) {
                            if (isset($paymentIDObject['data']['_id'])) {
                                if (isset($paymentIDObject['data']['status'])) {
                                    if (isset($paymentIDObject['data']['status'])) {
                                        $payment_id = $paymentIDObject['data']['_id'];
                                    }
                                }
                            }
                        }
                    }
                }
                if ($request->checkin) {
                    if ($request->checkout) {
                        if ($payment_id != "") {
                            $data['name'] = $request->firstname . " " . $request->lastname;
                            $card_number = $request->card_number;
                            $card_exp_month = $request->card_expiry_month;
                            $card_exp_year = $request->card_expiry_year;
                            $card_exp_cvv = $request->card_cvv;
                            $card_name = $data['name'];
                            $card_address_line1 = $request->address_line_1;
                            $card_city = $request->city;
                            $card_zipcode = $request->zipcode;
                            $card_country = $request->country;
                            $data = $request->except(["_token", "operation"]);                    
                            $pdata = '{"paymentProviderId": "' . $payment_id . '","card": {"number": "' . $card_number . '","exp_month": "' . $card_exp_month . '","exp_year": "' . $card_exp_year . '","cvc": "' . $card_exp_cvv . '"},"billing_details": {"name": "' . $card_name . '","address": {"line1": "' . $card_address_line1 . '","city": "' . $card_city . '","postal_code": "' . $card_zipcode . '","country": "' . $card_country . '"}},"threeDS": {"amount": ' . $request->total_amount . ',"currency": "USD","successURL": "' . url('thankyou') . '","failureURL": "' . url('failed') . '"}}';
                            $token = \App\Models\BasicSetting::where("name", "BOOKING-API-TOKEN-DATA")->first();;
                            if ($token) {
                                $token = $token->value;
                            } else {
                                $this->getBookingToken();
                            } 
                            try {
                                $error = ["status" => 400];
                                $client = new \GuzzleHttp\Client();
                                $response = $client->request('POST', 'https://pay.guesty.com/api/tokenize/v2', ['body' => $pdata, 'headers' => ['accept' => 'application/json', 'Authorization' => 'Bearer ' . $token, 'content-type' => 'application/json']]);
                                $data11 = json_decode($response->getBody(), true);
                                $reult_payment = (["status" => 200, "message" => "success", "data" => $data11]);                               
                            } catch (\GuzzleHttp\Exception\ClientException $e) {
                                $er = (string)$e->getResponse()->getBody();
                                $ar = json_decode($er, true);
                                $error['error'] = $ar;
                                $error['status'] = 401;
                                $reult_payment = $error;
                            } catch (\GuzzleHttp\Exception\RequestException $se) {
                                $error['error'] = $se->getMessage();
                                $reult_payment = $error;
                            } catch (Exception $e) {
                                $error['error'] = $e->getMessage();
                                $reult_payment = $error;
                            }

                            $stripe_main_payment_method = '';
                            if ($reult_payment['status'] == 200) {
                                if (isset($reult_payment['data'])) {
                                    if (isset($reult_payment['data']['_id'])) {
                                        $stripe_main_payment_method = $reult_payment['data']['_id'];
                                    }
                                }
                            }else{
                                if(isset($reult_payment['status'])){
                                    if($reult_payment['status'] == 401)
                                    {
                                        if(isset($reult_payment['error'])){
                                            if (isset($reult_payment['error']['message'])) {                                               
                                                return redirect()->back()->with("danger", $reult_payment['error']['message']);
                                            }
                                        }
                                    }
                                }
                                return redirect()->back()->with("danger", "Error From Guesty API");
                            }
                            if ($stripe_main_payment_method != "") {
                                $data['stripe_main_payment_method'] = $stripe_main_payment_method;
                                $data['name'] = $request->firstname . " " . $request->lastname;
                                $ar_gaurav_data = BookingRequest::where("request_id", $request->request_id)->first();
                                if ($ar_gaurav_data) {
                                    BookingRequest::where("request_id", $request->request_id)->update($data);
                                    $booking = BookingRequest::where("request_id", $request->request_id)->first();
                                } else {
                                    $booking = BookingRequest::create($data);
                                }
                                $data = $booking;
                                $html = view("mail.booking-user-email", compact("data", "property"))->render();
                                $booking = BookingRequest::find($booking->id);             
                                                        
                                $booking_guesty = (GuestyApi::setBookingDataNew($request->firstname, $request->lastname, $booking->email, $booking->mobile, $booking->rate_api_id, $booking->stripe_main_payment_method, $booking->quote_id));
                                if ($booking_guesty['status'] == 200) {
                                    $booking_guesty_id = $booking_guesty['data']['_id'];
                                    $new_data = ['booking_status' => "booking-confirmed", "rental_aggrement_status" => "true", "payment_status" => "Stripe key send", "booking_guesty_json" => json_encode($booking_guesty), "booking_guesty_id" => $booking_guesty_id];
                                    BookingRequest::find($booking->id)->update($new_data);
                                    return redirect('payment/success/' . $booking->id);
                                } else {                                   
                                    if(isset($reult_payment['status'])){
                                        if($reult_payment['status'] == 401)
                                        {
                                            if(isset($reult_payment['error'])){
                                                if (isset($reult_payment['error']['message'])) {                                                   
                                                    return redirect()->back()->with("danger", $reult_payment['error']['message']);
                                                }
                                            }
                                        }
                                    }
                                    return redirect()->back()->with("danger", "Error From Guesty API");
                                }
                            } else {
                                return redirect()->back()->with("danger", "Payment is not apply in Guesty Pay Account, please consult our team.");
                            }
                        } else {
                            return redirect()->back()->with("danger", "Payment is not defined in Guesty Account, please consult our team.");
                        }
                    } else {
                        return redirect()->back()->with("danger", "Invalid Checkout");
                    }
                } else {
                    return redirect()->back()->with("danger", "Invalid Checkin");
                }
            } else {
                return redirect()->back()->with("danger", "Invalid Property");
            }
        } else {
            return redirect()->back()->with("danger", "Invalid Property");
        }
    }

    public function previewBooking(Request $request, $id)
    {
        $booking = BookingRequest::find($id);
        if ($booking) {
            $property = GuestyProperty::find($booking->property_id);
            if ($property) {
                $data = new \stdClass();
                $data->name = "Booking Request";
                $data->meta_title = "Booking Request";
                $data->meta_keywords = "Booking Request";
                $data->meta_description = "Booking Request";
                $booking = $booking->toArray();
                return view("front.booking.preview", compact("booking", "data", "property"));
            }
        }
        return abort(404);
    }

    public function rentalAggrementBooking(Request $request, $id)
    {
        $booking = BookingRequest::find($id);
        if ($booking) {
            if ($booking->rental_aggrement_status != "true") {
                $property = GuestyProperty::find($booking->property_id);
                if ($property) {
                    $data = new \stdClass();
                    $data->name = "Rental Agreement  ";
                    $data->meta_title = "Rental Agreement  ";
                    $data->meta_keywords = "Rental Agreement  ";
                    $data->meta_description = "Rental Agreement  ";
                    $booking = $booking->toArray();
                    return view("front.booking.rentalAggrementBooking", compact("booking", "data", "property"));
                }
            } else {
                return redirect()->to('booking/payment/paypal/' . $booking->id)->with("danger", "Rental Agreement already submitted");
            }
        }
        return abort(404);
    }

    public function rentalAggrementDataSave(Request $request)
    {
        if ($request->booking_id) {
            $booking = BookingRequest::find($request->booking_id);
            if ($booking) {
                if ($booking->rental_aggrement_status != "true") {
                    $property = Property::find($booking->property_id);
                    if ($property) {
                        $png_url = "signature-" . time() . ".png";
                        $path = public_path() . '/uploads/signature/' . $png_url;
                        Image::make(file_get_contents($request->signature))->save($path);
                        $data = $request->all();
                        $booking->rental_aggrement_status = "true";
                        if ($request->hasFile("image")) {
                            $booking->rental_aggrement_images = Upload::fileUpload($request->file("image"), "cms");
                        }
                        $booking->rental_agreement_link = $property->rental_aggrement_attachment;
                        $booking->rental_aggrement_signature = 'uploads/signature/' . $png_url;
                        $booking->booking_status = "rental-aggrement-success";
                        $booking->save();
                        $data = BookingRequest::find($request->booking_id)->toArray();
                        $html = view("mail.rental-aggrement-admin", compact("data", "property"))->render();
                        $to = ModelHelper::getDataFromSetting('rental_aggrement_receiving_mail');
                        $admin_subject = "Rental Agreement in " . $property->name;
                        return redirect()->to('booking/payment/paypal/' . $booking->id);
                    }
                } else {
                    return redirect()->to('booking/payment/paypal/' . $booking->id)->with("danger", "Rental Agreement already submitted");
                }
            }
        }
        return abort(404);
    }

    public function notfound()
    {
        return view("errors.404");
    }

    public function sitemap()
    {
        $cms = Cms::all();
        $blogs = Blog::all();
        $blogcategories = BlogCategory::all();
        return response()->view("front.sitemap", compact("cms", "blogs", "blogcategories"))->header('Content-Type', 'text/xml');
    }
}

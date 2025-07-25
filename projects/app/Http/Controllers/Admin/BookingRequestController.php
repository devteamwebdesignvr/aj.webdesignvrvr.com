<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingRequest;
use App\Models\Property;
use App\Helper\Upload;
use Validator;
use MailHelper;
use LiveCart;
use ModelHelper;

class BookingRequestController extends Controller{
    
    public function __construct(BookingRequest $model){
        $this->model=$model;
        $this->admin_base_url="booking-enquiries.index";
        $this->admin_view="admin.booking-enquiries";
    }
    
    function getCheckinCheckoutDataGaurav(Request $request){
        $new_data_blocked=LiveCart::iCalDataCheckInCheckOut($request->id);
        $checkin=$new_data_blocked['checkin'];
        $checkout=$new_data_blocked['checkout'];
        return response()->json($new_data_blocked);
    }
    
    public function index(){
        $data=$this->model::orderBy("id","desc")->get();
        return view($this->admin_view.".index",compact("data"));
    }
    
    public function singlePropertyBookoing($id){
        $property=Property::find($id);
        if($property){
             $data=$this->model::where("property_id",$id)->orderBy("id","desc")->get();
            return view($this->admin_view.".show",compact("data"));
        }   
        return abort(404);
    }
    
    public function create(){
        return view($this->admin_view.".create");
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [ ]);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $data=$request->all();
        if($request->hasFile("image")) {$data['image'] = Upload::fileUpload($request->file("image"),"booking-enquiries");}
        if($request->hasFile("bannerImage")) {$data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"booking-enquiries");}
        if($request->booking_type_admin){
            if($request->booking_type_admin!="invoice"){
                $data['booking_status']="booking-confirmed";
            }
        }
        $data=$this->model::create($data);
        if($request->booking_type_admin){
            if($request->booking_type_admin!="invoice"){
                return redirect()->route($this->admin_base_url)->with("success","Successfully Added");
            }
        }
        return redirect()->route('booking-enquiry-confirm',$data->id)->with("success","Successfully Added");
    }

  
    public function show($id){
        return redirect()->route($this->admin_base_url);
    }
   
    public function edit($id){
        $data=$this->model::find($id);
        if($data){
            return view($this->admin_view.".edit",compact("data"));
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }
  
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [  ]);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $exist=$this->model::find($id);
        if($exist){
            $data=$request->all();
            if($request->hasFile("image")) {$data['image'] = Upload::fileUpload($request->file("image"),"booking-enquiries");}
            if($request->hasFile("bannerImage")) {$data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"booking-enquiries");}
            $property_id=$exist->property_id;
            if($request->booking_type_admin){
                if($request->booking_type_admin!="invoice"){
                    $data['booking_status']="booking-confirmed";
                }
            }
            $this->model::find($id)->update($data);
            return redirect()->route('singlePropertyBookoing',$property_id)->with("success","Successfully Updated");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

    public function destroy($id){
        $exist=$this->model::find($id);
        if($exist){
            $property_id=$exist->property_id;
            $exist->booking_status='booking-cancel';
            $exist->save();
            $data=BookingRequest::find($id)->toArray();
            if($data){
                $property=Property::find($data['property_id']);
                if($property){
                    LiveCart::getFileIcalFileData($data['property_id']);
                    if($data['booking_type_admin']=="invoice"){
                        $html= view("mail.booking-cancel-admin-email",compact("data","property"))->render();
                        $to=ModelHelper::getDataFromSetting('cancel_receiving_mail');
                        $admin_subject="Booking Cancelled for ".$property->name;
                        MailHelper::emailSenderByController($html,$to,$admin_subject);
                        $html= view("mail.booking-cancel-user-email",compact("data","property"))->render();
                        $to=$data['email'];
                        $user_subject="Booking Cancelled for ".$property->name;
                        MailHelper::emailSenderByController($html,$to,$user_subject);
                    }
                }
            }
            return redirect()->route('singlePropertyBookoing',$property_id)->with("success","Successfully Deleted");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

    function confirmed($id){
        $exist=$this->model::find($id);
        if($exist){
            $property_id=$exist->property_id;
            $property=Property::find($exist->property_id);
            if($property){
                $data=$exist->toArray();
                $html=view("mail.booking-confirmation-user-email",compact("data","property"))->render();
                $to=$exist->email;
                $customer_subject="Payment Request for ".$property->name;
                MailHelper::emailSenderByController($html,$to,$customer_subject);
                $exist->booking_status='rental-aggrement';
                $exist->save();
                return redirect()->route('singlePropertyBookoing',$property_id)->with("success","Successfully send");
            }
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }
}
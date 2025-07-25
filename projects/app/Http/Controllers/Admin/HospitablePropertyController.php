<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospitable\HospitableProperty;
use App\Helper\Upload;
use Validator;

class HospitablePropertyController extends Controller{
    
    public function __construct(HospitableProperty $model){
        $this->model=$model;
        $this->admin_base_url="hospitable-properties.index";
        $this->admin_view="admin.hospitable-properties";
    }
    
    public function index(){
        $data=$this->model::orderBy("id","desc")->get();
        return view($this->admin_view.".index",compact("data"));
    }
    
    public function create(){
        return redirect('/hospitable-properties');
    }
   
    public function edit($id){
        $data=$this->model::find($id);
        if($data){
            return view($this->admin_view.".edit",compact("data"));
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }
  
    public function update(Request $request, $id){
      
        $validator = Validator::make($request->all(), [
            'seo_url' => 'required|unique:hospitable_properties,seo_url,'.$id,
        ]);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $exist=$this->model::find($id);
        if($exist){
            $data=$request->all();
            if ($request->hasFile("feature_image")) {
                $data['feature_image'] = Upload::fileUpload($request->file("feature_image"),"properties");
            }
            if ($request->hasFile("bannerImage")) {
                $data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"properties");
            }
            if ($request->hasFile("faq_image")) {
                $data['faq_image'] = Upload::fileUpload($request->file("faq_image"),"properties");
            }
            if ($request->hasFile("wedding_package_desc")) {
                $data['wedding_package_desc'] = Upload::fileUpload($request->file("wedding_package_desc"),"properties");
            }
            $this->model::find($id)->update($data);
            return redirect()->route($this->admin_base_url)->with("success","Successfully Updated");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

    public function destroy($id){
        return redirect('/hospitable-properties');
    }
}
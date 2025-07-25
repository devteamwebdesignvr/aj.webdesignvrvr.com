<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guesty\GuestyProperty;
use Helper;
use App\Helper\Upload;
use Validator;
use LiveCart;
use Carbon\Carbon;

class GuestyPropertyController extends Controller{
    
    public function __construct(GuestyProperty $model){
        $this->model=$model;
        $this->admin_base_url="guesty_properties.index";
        $this->admin_view="admin.guesty_properties";
    }

    public function index(){
        return redirect()->route('hospitable-properties.index');
        $data=$this->model::orderBy("id","desc")->get();
        return view($this->admin_view.".index",compact("data"));
    }
    
    public function create(){
        return redirect()->route($this->admin_base_url);
    }

    public function store(Request $request){
        return redirect()->route($this->admin_base_url);
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
        $validator = Validator::make($request->all(), ['seo_url' => 'required|unique:guesty_properties,seo_url,'.$id]);  
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $exist=$this->model::find($id);
        if($exist){
            $data=$request->all();
            if($request->hasFile("banner_image")) {$data['banner_image'] = Upload::uploadWithLogoImageData($request->file("banner_image"),"properties");}
            if($request->hasFile("booklet")) {$data['booklet'] = Upload::uploadWithLogoImageData($request->file("booklet"),"properties");}
            if($request->hasFile("feature_image")) {$data['feature_image'] = Upload::uploadWithLogoImageData($request->file("feature_image"),"properties");}
            if($request->hasFile("ogimage")) {$data['ogimage'] = Upload::fileUpload($request->file("ogimage"),"properties");}
            if($request->remove_banner_image){$data['banner_image'] ='';}
            $this->model::find($id)->update($data);
            
            return redirect()->route($this->admin_base_url)->with("success","Successfully Updated");
        }
        return redirect()->back()->with("danger","Invalid Calling");
    }

    public function destroy($id){
       
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }
}
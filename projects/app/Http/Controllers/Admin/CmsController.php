<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Helper\Upload;
use Validator;

class CmsController extends Controller{
    
    public function __construct(Cms $model){
        $this->model=$model;
        $this->admin_base_url="cms.index";
        $this->admin_view="admin.cms";
    }
    
    public function index(){
        $data=$this->model::orderBy("id","desc")->get();
        return view($this->admin_view.".index",compact("data"));
    }
    
    public function create(){
        return view($this->admin_view.".create");
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), ['seo_url' => 'required|unique:cms,seo_url','name' => 'required']);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $data=$request->all();
        if($request->hasFile("image")) {$data['image'] = Upload::fileUpload($request->file("image"),"cms");}
        if($request->hasFile("bannerImage")) {$data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"cms");}
        if($request->hasFile("ogimage")) {$data['ogimage'] = Upload::fileUpload($request->file("ogimage"),"cms");}
        $this->model::create($data);
        return redirect()->route($this->admin_base_url)->with("success","Successfully Added");
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
        $validator = Validator::make($request->all(), ['seo_url' => 'required|unique:cms,seo_url,'.$id,'name' => 'required']);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $exist=$this->model::find($id);
        if($exist){
            $data=$request->all();
            if($request->hasFile("image")) {$data['image'] = Upload::fileUpload($request->file("image"),"cms");}
            if($request->hasFile("bannerImage")) {$data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"cms");}
           // if($request->hasFile("image_2")) {$data['image_2'] = Upload::fileUpload($request->file("image_2"),"cms");}
            if($request->hasFile("image_3")) {$data['image_3'] = Upload::fileUpload($request->file("image_3"),"cms");}
            if($request->hasFile("faq_image")) {$data['faq_image'] = Upload::fileUpload($request->file("faq_image"),"cms");}
            if($request->hasFile("strip_image")) {$data['strip_image'] = Upload::fileUpload($request->file("strip_image"),"cms");}
            if($request->hasFile("about_image1")) {$data['about_image1'] = Upload::fileUpload($request->file("about_image1"),"cms");}
            if($request->hasFile("about_image2")) {$data['about_image2'] = Upload::fileUpload($request->file("about_image2"),"cms");}
            if($request->hasFile("owner_image")) {$data['owner_image'] = Upload::fileUpload($request->file("owner_image"),"cms");}
            if($request->hasFile("ogimage")) {$data['ogimage'] = Upload::fileUpload($request->file("ogimage"),"cms");}
            if($request->hasFile("section_image")) {$data['section_image'] = Upload::fileUpload($request->file("section_image"),"cms");}
            if($request->hasFile("gallery_1_image")) {$data['gallery_1_image'] = Upload::fileUpload($request->file("gallery_1_image"),"cms");}
            if($request->hasFile("gallery_2_image")) {$data['gallery_2_image'] = Upload::fileUpload($request->file("gallery_2_image"),"cms");}
            if($request->hasFile("gallery_3_image")) {$data['gallery_3_image'] = Upload::fileUpload($request->file("gallery_3_image"),"cms");}
            if($request->hasFile("gallery_4_image")) {$data['gallery_4_image'] = Upload::fileUpload($request->file("gallery_4_image"),"cms");}
            if($request->hasFile("banner_video")) {$data['banner_video'] = Upload::fileUpload($request->file("banner_video"),"cms");}
            if($request->hasFile("why_choose_video")) {$data['why_choose_video'] = Upload::fileUpload($request->file("why_choose_video"),"cms");}
            if($request->hasFile("gallery_banner_image")) {$data['gallery_banner_image'] = Upload::fileUpload($request->file("gallery_banner_image"),"cms");}
            if($request->hasFile("joshua_tree_video")) {$data['joshua_tree_video'] = Upload::fileUpload($request->file("joshua_tree_video"),"cms");}
            if($request->hasFile("last_section_video")) {$data['last_section_video'] = Upload::fileUpload($request->file("last_section_video"),"cms");}
            
            
            



            $this->model::find($id)->update($data);
            return redirect()->route($this->admin_base_url)->with("success","Successfully Updated");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

    public function destroy($id){
        $exist=$this->model::find($id);
        if($exist){
            $exist->delete();
            return redirect()->route($this->admin_base_url)->with("success","Successfully Deleted");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }
}
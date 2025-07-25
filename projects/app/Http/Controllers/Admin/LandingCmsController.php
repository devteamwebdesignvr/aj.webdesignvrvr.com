<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingCms;
use App\Helper\Upload;
use Validator;

class LandingCmsController extends Controller{
    
    public function __construct(LandingCms $model){
        $this->model=$model;
        $this->admin_base_url="landing_cms.index";
        $this->admin_view="admin.landing_cms";
    }
    
    public function index(){
        $data=$this->model::orderBy("id","desc")->get();
        return view($this->admin_view.".index",compact("data"));
    }
    
    public function create(){
        return view($this->admin_view.".create");
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), ['seo_url' => 'required|unique:landing_cms,seo_url','name' => 'required']);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $data=$request->all();
        if($request->hasFile("image")) {$data['image'] = Upload::fileUpload($request->file("image"),"cms");}
        if($request->hasFile("vacation_four_image")) {$data['vacation_four_image'] = Upload::fileUpload($request->file("vacation_four_image"),"cms");}
        if($request->hasFile("vacation_three_image")) {$data['vacation_three_image'] = Upload::fileUpload($request->file("vacation_three_image"),"cms");}
        if($request->hasFile("vacation_two_image")) {$data['vacation_two_image'] = Upload::fileUpload($request->file("vacation_two_image"),"cms");}
        if($request->hasFile("vacation_one_image")) {$data['vacation_one_image'] = Upload::fileUpload($request->file("vacation_one_image"),"cms");}
        if($request->hasFile("bannerImage")) {$data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"cms");}
        $attraction_secion=[];
        if($request->attraction_heading){
            foreach($request->attraction_heading as $key=>$v){
                $attraction_image='';
                if(isset($request->file("attraction_image")[$key])){
                    $attraction_image=Upload::fileUpload($request->file("attraction_image")[$key]); 
                }else{
                    $attraction_image='';
                }
                $ar=["attraction_heading"=>$request->attraction_heading[$key],"attraction_title"=>$request->attraction_title[$key],"attraction_image"=>$attraction_image,"attraction_content"=>$request->attraction_content[$key]];
                $attraction_secion[]=$ar;
            }
        }
        $video_section=[];
        if($request->video_heading){
            foreach($request->video_heading as $key=>$v){
                $ar=["video_heading"=>$request->video_heading[$key],"video_link"=>$request->video_link[$key],"video_content"=>$request->video_content[$key]];
                $video_section[]=$ar;
            }
        }
        $data['video_section']=json_encode($video_section);
        $data['attraction_secion']=json_encode($attraction_secion);
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
        $validator = Validator::make($request->all(), ['seo_url' => 'required|unique:landing_cms,seo_url,'.$id,'name' => 'required']);   
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $exist=$this->model::find($id);
        if($exist){
            $data=$request->all();
            if($request->hasFile("image")) {$data['image'] = Upload::fileUpload($request->file("image"),"cms");}
            if($request->hasFile("vacation_four_image")) {$data['vacation_four_image'] = Upload::fileUpload($request->file("vacation_four_image"),"cms");}
            if($request->hasFile("vacation_three_image")) {$data['vacation_three_image'] = Upload::fileUpload($request->file("vacation_three_image"),"cms");}
            if($request->hasFile("vacation_two_image")) {$data['vacation_two_image'] = Upload::fileUpload($request->file("vacation_two_image"),"cms");}
            if($request->hasFile("vacation_one_image")) {$data['vacation_one_image'] = Upload::fileUpload($request->file("vacation_one_image"),"cms");}
            if($request->hasFile("bannerImage")) {$data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"cms");}
            $attraction_secion=[];
            if($request->attraction_heading){
                foreach($request->attraction_heading as $key=>$v){
                    $attraction_image='';
                    if(isset($request->file("attraction_image")[$key])){
                        $attraction_image=Upload::fileUpload($request->file("attraction_image")[$key]); 
                    }else{
                        $attraction_image='';
                        if(isset($request->attraction_image_hidden[$key])){
                            $attraction_image=$request->attraction_image_hidden[$key];
                        }
                    }
                    $ar=["attraction_heading"=>$request->attraction_heading[$key],"attraction_title"=>$request->attraction_title[$key],"attraction_image"=>$attraction_image,"attraction_content"=>$request->attraction_content[$key]];
                    $attraction_secion[]=$ar;
                }
            }
            $video_section=[];
            if($request->video_heading){
                foreach($request->video_heading as $key=>$v){
                    $ar=["video_heading"=>$request->video_heading[$key],"video_link"=>$request->video_link[$key],"video_content"=>$request->video_content[$key]];
                    $video_section[]=$ar;
                }
            }
            $data['video_section']=json_encode($video_section);
            $data['attraction_secion']=json_encode($attraction_secion);
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
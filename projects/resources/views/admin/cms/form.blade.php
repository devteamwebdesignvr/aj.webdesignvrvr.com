<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label("name") !!}
            {!! Form::text("name",null,["class"=>"form-control","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("name")}}</span>
        </div>
    </div>
 
    <div class="col-md-3">
        <div class="form-group">
          <label>SEO URL ( Only A-z,0-9,_,- are allowed)</label>
            {!! Form::text("seo_url",null,["class"=>"form-control", "readonly","pattern"=>"[a-zA-Z0-9-_]+", "title"=>"Enter Valid SEO URL", "oninvalid"=>"this.setCustomValidity('SEO URL is not Valid Please enter first letter must be a-z and only accept chars a-z 0-9,-,_')" ,"onchange"=>"try{setCustomValidity('')}catch(e){}", "oninput"=>"setCustomValidity(' ')","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("seo_url")}}</span>
        </div>
    </div>
 
    


    <div class="col-md-3 ">
        <div class="form-group">
            {!! Form::label("image") !!}
            {!! Form::file("image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("image")}}</span>
             @isset($data)
                @if($data->image!="")
                     <img src="{{ asset(($data->image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
   @isset($data)
  @if($data->seo_url=="home")
  @elseif($data->seo_url=="production")
  
  <div class="col-md-3 ">
        <div class="form-group">
            {!! Form::label("gallery_banner_image") !!}
            {!! Form::file("gallery_banner_image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("gallery_banner_image")}}</span>
             @isset($data)
                @if($data->gallery_banner_image!="")
                     <img src="{{ asset(($data->gallery_banner_image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
  
  <div class="col-md-12 ">
        <div class="form-group">
            {!! Form::label("Banner Video") !!}
           {!! Form::textarea("banner_video",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("banner_video")}}</span>
          
        </div>
    </div>
  
  <div class="col-md-12 ">
        <div class="form-group">
            {!! Form::label("Why Choose Video ") !!}
            {!! Form::textarea("why_choose_video",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("why_choose_video")}}</span>
        </div>
    </div>
  
   
  
  <div class="col-md-12 ">
        <div class="form-group">
            {!! Form::label("Joshua Tree Video ") !!}
           {!! Form::textarea("joshua_tree_video",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("joshua_tree_video")}}</span>
        </div>
    </div>
  
  <div class="col-md-12 d-none">
        <div class="form-group">
            {!! Form::label("Last Section Video ") !!}
            {!! Form::textarea("last_section_video",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("last_section_video")}}</span>
        </div>
    </div>
  
  
  <!-- <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("Main Heading") !!}
            {!! Form::text("main_heading",null,["class"=>"form-control","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("main_heading")}}</span>
        </div>
    </div>
  
  <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("Secondary Heading") !!}
            {!! Form::text("secondary_heading",null,["class"=>"form-control","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("secondary_heading")}}</span>
        </div>
    </div> -->
  
  
  @else
    <div class="col-md-3 ">
        <div class="form-group">
            @isset($data)
                @if($data->seo_url=="home")
                    {!! Form::label("image2") !!}
                @else
                    {!! Form::label("bannerImage") !!}
                @endif
            @else
                {!! Form::label("bannerImage") !!}
            @endif
            
            {!! Form::file("bannerImage",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("bannerImage")}}</span>
             @isset($data)
                @if($data->bannerImage!="")
                     <img src="{{ asset(($data->bannerImage)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
  @endif
  @endisset
    @isset($data)
        @if($data->seo_url=="joshua-tree-1")
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("Video") !!}
                {!! Form::file("image_2",["class"=>"form-control"]) !!}
                <span class="text-danger">{{ $errors->first("image_2")}}</span>
                 @isset($data)
                    @if($data->image_2!="")
                         <video width="320" height="240" controls>
                          <source src="{{ asset(($data->image_2)) }}" type="video/mp4">
                        </video>
                    @endif
                @endisset
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label("gallery_1_image") !!}
                {!! Form::file("gallery_1_image",["class"=>"form-control"]) !!}
                <span class="text-danger">{{ $errors->first("gallery_1_image")}}</span>
                 @isset($data)
                    @if($data->gallery_1_image!="")
                         <img src="{{ asset(($data->gallery_1_image)) }}" width="100" > 
                    @endif
                @endisset
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label("gallery_2_image") !!}
                {!! Form::file("gallery_2_image",["class"=>"form-control"]) !!}
                <span class="text-danger">{{ $errors->first("gallery_2_image")}}</span>
                 @isset($data)
                    @if($data->gallery_2_image!="")
                         <img src="{{ asset(($data->gallery_2_image)) }}" width="100" > 
                    @endif
                @endisset
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label("gallery_3_image") !!}
                {!! Form::file("gallery_3_image",["class"=>"form-control"]) !!}
                <span class="text-danger">{{ $errors->first("gallery_3_image")}}</span>
                 @isset($data)
                    @if($data->gallery_3_image!="")
                         <img src="{{ asset(($data->gallery_3_image)) }}" width="100" > 
                    @endif
                @endisset
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label("gallery_4_image") !!}
                {!! Form::file("gallery_4_image",["class"=>"form-control"]) !!}
                <span class="text-danger">{{ $errors->first("gallery_4_image")}}</span>
                 @isset($data)
                    @if($data->gallery_4_image!="")
                         <img src="{{ asset(($data->gallery_4_image)) }}" width="100" > 
                    @endif
                @endisset
            </div>
        </div>
            
            
        @endif
        @if($data->seo_url=="services")
  
        <div class="col-md-3 d-none">
        <div class="form-group">
            
              {!! Form::label("Video") !!}
              {!! Form::file("image_2",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("image_2")}}</span>
             @isset($data)
                @if($data->image_2!="")
                     <video width="320" height="240" controls>
                      <source src="{{ asset(($data->image_2)) }}" type="video/mp4">
                    </video>
                @endif
            @endisset
            </div>
            </div>
  
  <div class="col-md-6 ">
        <div class="form-group">
            {!! Form::label("Banner Video") !!}
           {!! Form::text("banner_video",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("banner_video")}}</span>
          
        </div>
    </div>
  
    <div class="col-md-6">
                <div class="form-group">
                      {!! Form::label("Plan Next Compound (Vimeo Video ID) ") !!}
                      {!! Form::text("book_compound_video",null,["class"=>"form-control"]) !!}
                      <span class="text-danger">{{ $errors->first("image_2")}}</span>
                 </div>
          </div>

  
        @endif
        @if($data->seo_url=="home")
                <div class="col-md-3">
        <div class="form-group">
              {!! Form::label("banner (Vimeo Video ID) ") !!}
              {!! Form::text("image_2",null,["class"=>"form-control"]) !!}
              <span class="text-danger">{{ $errors->first("image_2")}}</span>
             <!--@isset($data)
                @if($data->image_2="")
                     <video width="320" height="240" controls>
                      <source src="{{ asset(($data->image_2)) }}" type="video/mp4">
                    </video>
                @endif
             @endisset  -->
            </div>
            </div>
  
          <div class="col-md-3">
                <div class="form-group">
                      {!! Form::label("Book Compound (Vimeo Video ID) ") !!}
                      {!! Form::text("book_compound_video",null,["class"=>"form-control"]) !!}
                      <span class="text-danger">{{ $errors->first("image_2")}}</span>
                 </div>
          </div>





    <div class="col-md-3 done">
        <div class="form-group">
          {!! Form::label("image2") !!}
            {!! Form::file("bannerImage",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("bannerImage")}}</span>
             @isset($data)
                @if($data->bannerImage!="")
                     <img src="{{ asset(($data->bannerImage)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
  
  
        @endif
        @if($data->seo_url=="about-us")
            
                <div class="col-md-3 d-none">
        <div class="form-group">
              {!! Form::label("image_2") !!}
              {!! Form::file("image_2",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("image_2")}}</span>
             @isset($data)
                @if($data->image_2!="")
                     <img src="{{ asset(($data->image_2)) }}" width="200" > 
                @endif
              @endisset
                </div>
                </div>
        @endif
    @endisset
    <div class="col-md-12 d-none">
        <div class="form-group">
            {!! Form::label("template") !!}
            {!! Form::select("templete",Helper::getTempletes(),null,["class"=>"form-control","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("templete")}}</span>
        </div>
    </div>
    <div class="col-md-4 d-none">
        <div class="form-group">
            {!! Form::label("publish") !!}
            {!! Form::select("publish",["published"=>"published","draft"=>"draft","pending"=>"pending"],null,["class"=>"form-control","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("publish")}}</span>
        </div>
    </div>

   
</div>
    @isset($data)
    @if($data->seo_url=="joshua-tree-1")
    
<div class="row ">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("strip_title") !!}
            {!! Form::text("strip_title",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("strip_title")}}</span>
        </div>
        <div class="form-group d-none">
            {!! Form::label("strip_anchor") !!}
            {!! Form::text("strip_anchor",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("strip_anchor")}}</span>
        </div>
    </div>

    <div class="col-md-6 ">
        <div class="form-group">
            {!! Form::label("strip_image") !!}
            {!! Form::file("strip_image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("strip_image")}}</span>
             @isset($data)
                @if($data->strip_image!="")
                     <img src="{{ asset(($data->strip_image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
</div>
    @endif
    
@if($data->seo_url=="home")

<div class="row ">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("strip_title") !!}
            {!! Form::text("strip_title",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("strip_title")}}</span>
        </div>
        <div class="form-group">
            {!! Form::label("strip_anchor") !!}
            {!! Form::text("strip_anchor",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("strip_anchor")}}</span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("Map") !!}
            {!! Form::textarea("strip_desction",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("strip_desction")}}</span>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="form-group">
            {!! Form::label("strip_image") !!}
            {!! Form::file("strip_image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("strip_image")}}</span>
             @isset($data)
                @if($data->strip_image!="")
                     <img src="{{ asset(($data->strip_image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("about_us_image") !!}
            {!! Form::file("section_image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("section_image")}}</span>
             @isset($data)
                @if($data->section_image!="")
                     <img src="{{ asset(($data->section_image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            {!! Form::label("about_us_description") !!}
            {!! Form::textarea("section_desc",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("section_desc")}}</span>
        </div>
    </div>

</div>
@endif
@endisset
<div class="row d-none">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("description") !!}
            {!! Form::textarea("description",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("description")}}</span>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("shortDescription") !!}
            {!! Form::textarea("shortDescription",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("shortDescription")}}</span>
        </div>
    </div>
  
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("mediumDescription") !!}
            {!! Form::textarea("mediumDescription",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("mediumDescription")}}</span>
        </div>
    </div>
 
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("longDescription") !!}
            {!! Form::textarea("longDescription",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("longDescription")}}</span>
        </div>
    </div>
  
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("seo_section") !!}
            {!! Form::textarea("seo_section",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("seo_section")}}</span>
        </div>
    </div>
  
</div>

<div class="row">
    <div class="col-md-12 alert alert-warning text-center">
        <h3>Seo Section</h3>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("meta_title") !!}
            {!! Form::textarea("meta_title",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("meta_title")}}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("meta_keywords") !!}
            {!! Form::textarea("meta_keywords",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("meta_keywords")}}</span>
        </div>
    </div>
    

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("ogimage") !!}
            {!! Form::file("ogimage",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("ogimage")}}</span>
             @isset($data)
                @if($data->ogimage!="")
                     <img src="{{ asset(($data->ogimage)) }}" width="100" /> 
                @endif
            @endisset
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("meta_description") !!}
            {!! Form::textarea("meta_description",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("meta_description")}}</span>
        </div>
    </div>
</div>
<div class="row d-none">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("header_section") !!}
            {!! Form::textarea("header_section",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("header_section")}}</span>
        </div>
    </div>
</div>
<div class="row d-none">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("footer_section") !!}
            {!! Form::textarea("footer_section",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("footer_section")}}</span>
        </div>
    </div>
</div>
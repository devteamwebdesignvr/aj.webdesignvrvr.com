<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("ordering") !!}
            {!! Form::number("ordering",null,["class"=>"form-control","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("ordering")}}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("location") !!}
            {!! Form::select("location_id",ModelHelper::getLocationSelectList(),null,["class"=>"form-control","placeholder"=>"Choose Location"]) !!}
            <span class="text-danger">{{ $errors->first("location_id") }}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("title") !!}
            {!! Form::text("title",null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("title")}}</span>
        </div>
    </div>
 
    <div class="col-md-4">
        <div class="form-group">
              <label>SEO URL ( Only A-z,0-9,_,- are allowed)</label>
            {!! Form::text("seo_url",null,["class"=>"form-control", "pattern"=>"[a-zA-Z0-9-_]+", "title"=>"Enter Valid SEO URL", "oninvalid"=>"this.setCustomValidity('SEO URL is not Valid Please enter first letter must be a-z and only accept chars a-z 0-9,-,_')" ,"onchange"=>"try{setCustomValidity('')}catch(e){}", "oninput"=>"setCustomValidity(' ')","required"=>"required"]) !!}
            <span class="text-danger">{{ $errors->first("seo_url")}}</span>
        </div>
    </div>
  
  
@php
    $selectedIds = is_array($data->why_stay_ids)
        ? $data->why_stay_ids
        : json_decode($data->why_stay_ids, true) ?? [];
@endphp

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label("why_stay_ids", "Why Stay With Us") !!}
        <div class="checkbox-group">
            @foreach(App\Models\WhyStayWithUs::all() as $item)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        {!! Form::checkbox(
                            'why_stay_ids[]',
                            $item->id,
                            in_array($item->id, old('why_stay_ids', $selectedIds)),
                            ['class' => 'form-check-input']
                        ) !!}
                        {{ $item->title }}
                    </label>
                </div>
            @endforeach
        </div>
        <span class="text-danger">{{ $errors->first("why_stay_ids") }}</span>
    </div>
</div>
  
  @php
    $selectedIds = is_array($data->accommodation_ids)
        ? $data->accommodation_ids
        : json_decode($data->accommodation_ids, true) ?? [];
@endphp

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label("accommodation_ids", "Accommodation") !!}
        <div class="checkbox-group">
            @foreach(App\Models\Accommodation::all() as $item)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        {!! Form::checkbox(
                            'accommodation_ids[]',
                            $item->id,
                            in_array($item->id, old('accommodation_ids', $selectedIds)),
                            ['class' => 'form-check-input']
                        ) !!}
                        {{ $item->question }}
                    </label>
                </div>
            @endforeach
        </div>
        <span class="text-danger">{{ $errors->first("accommodation_ids") }}</span>
    </div>
</div>
 


    <div class="col-md-4 ">
        <div class="form-group">
            {!! Form::label("feature_image") !!}
            {!! Form::file("feature_image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("feature_image")}}</span>
             @isset($data)
                @if($data->feature_image!="")
                     <img src="{{ asset(($data->feature_image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
   <div class="col-md-4 ">
        <div class="form-group">
            {!! Form::label("faq_image") !!}
            {!! Form::file("faq_image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("faq_image")}}</span>
             @isset($data)
                @if($data->faq_image!="")
                     <img src="{{ asset(($data->faq_image)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="form-group">
            {!! Form::label("bannerImage") !!}
            {!! Form::file("bannerImage",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("bannerImage")}}</span>
             @isset($data)
                @if($data->bannerImage!="")
                     <img src="{{ asset(($data->bannerImage)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label("status") !!}
            {!! Form::select("status",Helper::getBooleanDataActual(),null,["class"=>"form-control","required"]) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label("is_featured") !!}
            {!! Form::select("is_featured",Helper::getBooleanDataActual(),null,["class"=>"form-control","required"]) !!}
        </div>
    </div>    
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label("Show on Home") !!}
            {!! Form::select("is_home",Helper::getBooleanDataActual(),null,["class"=>"form-control","required"]) !!}
        </div>
    </div>
    
  <div class="col-md-4 d-none">
        <div class="form-group">
            {!! Form::label("review_start") !!}
            {!! Form::text("review_start",null,["class"=>"form-control"]) !!}
        </div>
    </div>
   <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("hot_tub") !!}
            {!! Form::text("hot_tub",null,["class"=>"form-control"]) !!}
        </div>
    </div>
  <div class="col-md-8">
        <div class="form-group">
            {!! Form::label("calendar below Text") !!}
            {!! Form::textarea("calendar_text",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("calendar_text")}}</span>
        </div>
    </div>
   <div class="col-md-8">
        <div class="form-group">
            {!! Form::label("Youtube Iframe Link") !!}
            {!! Form::textarea("youtube_iframe_link",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("youtube_iframe_link")}}</span>
        </div>
    </div>
      <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("custom_description") !!}
            {!! Form::textarea("custom_description",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("custom_description")}}</span>
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("map") !!}
            {!! Form::textarea("map",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("map")}}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("hospitable_booking_widget") !!}
            {!! Form::textarea("hospitable_booking_widget",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("hospitable_booking_widget")}}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("hospitable_calendar_widget") !!}
            {!! Form::textarea("hospitable_calendar_widget",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("hospitable_calendar_widget")}}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("hospitable_review_widget") !!}
            {!! Form::textarea("hospitable_review_widget",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("hospitable_review_widget")}}</span>
        </div>
    </div>





</div>


<div class="row">
    <div class="col-md-12 alert alert-warning text-center">
        <h3>SEO Section</h3>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("meta_title") !!}
            {!! Form::textarea("meta_title",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("meta_title")}}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("meta_keywords") !!}
            {!! Form::textarea("meta_keywords",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("meta_keywords")}}</span>
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
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("header_section") !!}
            {!! Form::textarea("header_section",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("header_section")}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("footer_section") !!}
            {!! Form::textarea("footer_section",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("footer_section")}}</span>
        </div>
    </div>
</div>
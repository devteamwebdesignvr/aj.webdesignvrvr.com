<div class="row">
  <!--
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("page") !!}
            {!! Form::select("page",["home"=>"home","property-management"=>"property-management"],null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("page")}}</span>
        </div>
    </div>
-->
  
  <!--
  
 <div class="col-md-6">
    <div class="form-group">
        {!! Form::label("property_id", "Property") !!}
        {!! Form::select("property_id",
            App\Models\Hospitable\HospitableProperty::orderBy("ordering", "asc")->pluck('name', 'id'),
            null,
            ["class" => "form-control", "placeholder" => "Choose Property"]
        ) !!}
        <span class="text-danger">{{ $errors->first("property_id") }}</span>
    </div>
</div>
-->
  
   
 
    <div class="col-md-6 ">
        <div class="form-group">
            {!! Form::label("image") !!}
            {!! Form::file("image",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("image")}}</span>
             @isset($data)
                @if($data->image!="")
                     <img src="{{ asset(($data->image)) }}" width="200" > <br>
                     
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input custom-control-input-danger" name="remove_image" value="yes" type="checkbox" id="remove_image" >
                        <label for="remove_image" class="custom-control-label">Remove  Image</label>
                    </div>
                @endif
            @endisset
        </div>
    </div>
  
   <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("title") !!}
            {!! Form::text("title",null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("title")}}</span>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("description") !!}
            {!! Form::textarea("description",null,["class"=>"form-control","rows"=>2]) !!}
            <span class="text-danger">{{ $errors->first("description")}}</span>
        </div>
    </div>


</div>
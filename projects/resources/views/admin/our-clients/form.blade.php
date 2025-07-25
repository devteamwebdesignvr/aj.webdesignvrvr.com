<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("title") !!}
            {!! Form::text("title",null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("title")}}</span>
        </div>
    </div>
 
    <div class="col-md-4 d-none">
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
  
  <div class="col-md-4 ">
        <div class="form-group">
            {!! Form::label("icon") !!}
            {!! Form::file("icon",["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("icon")}}</span>
             @isset($data)
                @if($data->icon!="")
                     <img src="{{ asset(($data->icon)) }}" width="200" > 
                @endif
            @endisset
        </div>
    </div>

</div>
<div class="row d-none">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("description") !!}
            {!! Form::textarea("description",null,["class"=>"form-control","rows"=>2]) !!}
            <span class="text-danger">{{ $errors->first("description")}}</span>
        </div>
    </div>


</div>
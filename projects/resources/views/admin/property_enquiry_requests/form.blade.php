<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("first_name") !!}
            {!! Form::text("first_name",null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("first_name")}}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("last_name") !!}
            {!! Form::text("last_name",null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("last_name")}}</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label("mobile") !!}
            {!! Form::text("mobile",null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("mobile")}}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("email") !!}
            {!! Form::email("email",null,["class"=>"form-control","required"]) !!}
            <span class="text-danger">{{ $errors->first("email")}}</span>
        </div>
    </div>
 
    <div class="col-md-6">
        <div class="form-group">
            
            {!! Form::label("Property") !!}
            {!! Form::select("property_id",ModelHelper::getProperptySelectList(),null,["class"=>"form-control"]) !!}
            <span class="text-danger">{{ $errors->first("property_id")}}</span>
            
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("message") !!}
            {!! Form::textarea("message",null,["class"=>"form-control","required","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("message")}}</span>
        </div>
    </div>
   
</div>

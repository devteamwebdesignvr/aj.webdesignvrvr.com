<!--
<div class="row">
  
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("type") !!}
            {!! Form::select("type",["Booking with Book A Memory"=>"Booking with Book A Memory","During Your Stay"=>"During Your Stay","Weddings & Special Events"=>"Weddings & Special Events"],null,["class"=>"form-control","placeholder"=>"Choose Type"]) !!}
            <span class="text-danger">{{ $errors->first("type")}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label("page") !!}
            {!! Form::select("page",["faq"=>"faq","property-management"=>"property-management"],null,["class"=>"form-control","placeholder"=>"Choose page"]) !!}
            <span class="text-danger">{{ $errors->first("type")}}</span>
        </div>
    </div>
  
  
</div>

-->
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Title") !!}
            {!! Form::textarea("question",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("question")}}</span>
        </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("Description") !!}
            {!! Form::textarea("answer",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("answer")}}</span>
        </div>
    </div>
</div>

<div class="row">
  <!--
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("ordering") !!}
            {!! Form::number("ordering",null,["class"=>"form-control","rows"=>"2"]) !!}
            <span class="text-danger">{{ $errors->first("ordering")}}</span>
        </div>
  </div>
  -->
  
</div>
@extends('admin.layouts')
@section('title', 'Admin')
@php 
    $name="Blogs";$route="blogs";
@endphp            
@section('content_header')
    <h1 class="m-0 text-dark">{{$name}} Management</h1>
@stop

@section('content')
    @parent
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          @php 
            $addbar=["name"=>$name,"add-data"=>false,"add-name"=>"Add ". Str::singular($name),"add-anchor"=>route($route.'.create'),"back-anchor"=>route($route.'.index')];
          @endphp
          @include("admin.common.add-bar")
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-12">
         
          <div class="card  ">
            <div class="card-header">
              <h3 class="card-title">Edit {{ Str::singular($name) }}</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               {!! Form::model($data,['route' => [$route.'.update',$data->id],"files"=>"true","method"=>"put"]) !!}
     
                    @include("admin.".$route.".form")
               
                    <button class="btn btn-success"><span class="fa fa-save"></span> Update</button>
                
                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop

@section("css")
<link rel="stylesheet" type="text/css" href="{{ asset('drag-drop-image-uploader/src/image-uploader.css') }}">
<style>
  .gaurav-class{
    border:1px solid black;
    margin:10px;
    padding: 10px;
  }
</style>
@stop

@section("js")
@parent
<script src="{{ asset('drag-drop-image-uploader/src/image-uploader.js') }}"></script>
<script>
  $(function(){
    var dropIndex;
      $("#image-list").sortable({
            update: function(event, ui) { 
              dropIndex = ui.item.index();
          }
      });
    
     $('#submit').click(function (e) {
          
            var captionIdsArray = [];
            $('#image-list .gaurav-class input').each(function (index) {
                    
                    var id = $(this).attr('id');
                    var split_id = id.split("_");
                    captionIdsArray.push({"id":split_id[1],"value":$(this).val()});
             
            });
            console.log(captionIdsArray)
            $.ajax({
                url: '{{ route("update-blog-caption-and-sorting") }}',
                type: 'post',
                data: {captionidsarray: captionIdsArray,_token:"{{ csrf_token() }}"},
                success: function (response) {
                   $("#txtresponse").css('display', 'inline-block'); 
                   $("#txtresponse").text(response);
                }
            });
            e.preventDefault();
        });
    
    CKEDITOR.replace('longDescription',{ allowedContent:true,filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'} );
    
     $('.input-images-2').imageUploader({
      
            imagesInputName: 'images',
            extensions:['.jpg', '.jpeg', '.png', '.gif', '.svg','.webp'],
            mimes:['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml' ,'image/webp']
        });
    
    
  });
  
  
    
  $(document).on("click",".delete-image-blog",function(){
    
      $id=$(this).data("id");
      data={_token:"{{ csrf_token() }}",id:$id};
      $that=$(this);
      url="{{ route('blog-image-delete-asset') }}";
      $.post(url,data,function(data){
          $that.parent('div').parent('div').remove();
      });
  });
      $(document).on("click",".nav-item",function(){
      var target_gaurav=$(this).find(".nav-link").attr("id");
      document.cookie = "target_jhon_data="+target_gaurav;
  });


  @if(isset($_COOKIE['target_jhon_data']))
    $(function(){
      $("#{{$_COOKIE['target_jhon_data']}}").click();
    })
  @endif
  
</script>
@stop
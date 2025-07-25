@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("logo",$data->image)
@section("header-section")
{!! $data->header_section !!}
@stop
@section("footer-section")
{!! $data->footer_section !!}
@stop
@section("container")

    @php
        $name=$data->name;
        $bannerImage=asset('front/images/breadcrumb.webp');
        if($data->bannerImage){
            $bannerImage=asset($data->bannerImage);
        }
    @endphp
    @include("front.layouts.banner")
 
<section class="attr-sec">
    <div class="container">
        <div class="row heading">
           
        <div class="attraction-sec">
            <div class="row">
                @foreach(App\Models\Attraction::orderBy("ordering","asc")->get() as $c)
                                <div class="col-4">
                   <a href="{{ url('attractions/detail/'.$c->seo_url) }}"> <img src="{{ asset($c->image)}}" class="img-fluid" alt="">
                    <div class="content-overlay">
                        <h2>{{$c->name}}</h2>
                    </div>
                     </a>
                </div>
                      @endforeach
                           
            </div>
        </div>
    </div>
</div></section>
{!! $data->seo_section !!}

@stop
@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/css/attraction.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/attraction-responsive.css" />
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/js/attraction.js" ></script>
    
@stop 
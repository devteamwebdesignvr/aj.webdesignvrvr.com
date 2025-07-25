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
    <!-- start banner sec -->
  
    <section class="breadcrumb" style="background-image: url({{ $bannerImage }});">
        <div class="auto-container">
            <h2 data-aos="zoom-in" data-aos-duration="1500">{{$name}}</h2>
            <ul class="page-breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>/ {{$name}}</li>
            </ul>
        </div>
    </section>


    <section class="c-gallery">

        <div class="container">

            <div class="row main-slider">
@foreach(App\Models\Gallery::orderBy("id","desc")->get() as $c)
                <div class="col-md-4 mb-md-4">

                    <div class="gallery-box">

                        <a href="{{asset($c->image)}}" data-fancybox="images">

                            <img src="{{asset($c->image)}}" alt="dustin gallery">

                         </a>

                    </div>

                </div>
@endforeach
                

            </div>

        </div>

    </section>
{!! $data->seo_section !!}

@stop

@section("js")
<script>
         $(function(){

        $().fancybox({

          selector : '.slick-slide:not(.slick-cloned)',

          hash     : false

        });
    </script>
@stop
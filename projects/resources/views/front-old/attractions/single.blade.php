@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("header-section")
{!! $data->header_section !!}
@stop
@section("footer-section")
{!! $data->footer_section !!}
@stop
@section("container")
    @php
        $name=$data->name;
        $bannerImage=asset('front/images/internal-banner.webp');
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




    <section class="Blog-details">

        <div class="container">

           <h1>{{$data->title}}</h1>

           <img src="{{ asset($data->image)}}" class="img-fluid" alt="" />
              
            {!! $data->longDescription !!}

        </div>

    </section>


@stop
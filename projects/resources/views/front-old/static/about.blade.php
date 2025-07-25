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

	<!-- start about section -->
           <section id="about" class="about_wrapper">
         <div class="container">
            <div class="row flex-lg-row flex-column-reverse">
                <div class="col-lg-6 text-center text-lg-start">
                    <div class="heading_sec" >
                        <h1>Meet The Hosts</h1>
                        <h3 class="heading" data-aos="zoom-in-right" data-aos-duration="1500">{{ $data->shortDescription }}</h3>
                    </div>
                    <div class="para-section">
                    {!! $data->longDescription !!}
                    </div>
                    <div class="cta-btn" id="more">
                        <a class="main-btn mt-4">Read More</a>
                    </div>
                    <div class="cta-btn" id="less">
                        <a class="main-btn mt-4">Read Less</a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 position-relative text-center">
                    <div class="about-img2">
                        <img src="{{asset($data->image)}}" class="img-fluid img-2 about-page-img" alt="about" data-aos="zoom-in-left" data-aos-duration="1500"/>
                    </div>
                </div>
            </div>
         </div>
    </section>
  
{!! $data->seo_section !!}
@stop
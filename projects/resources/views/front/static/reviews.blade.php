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

<section class="common-page-wrap">
   <div class="container">
       <div class="testimonial-page-wrap">
          <div class="row" data-masonry='{"percentPosition": true }'>
    
  
        @foreach(App\Models\Testimonial::where("status","true")->orderBy("id","desc")->get() as $c)
  
    <div class="col-sm-6 col-lg-4">
      <div class="card p-3">
        <figure class="p-3 mb-0">
             @if($c->image)
             <img src="{{asset($c->image)}}" alt="" class="img-fluid">
             @else
                  <img src="{{ asset('front')}}/no-image.avif" class="img-fluid" alt="User">
             @endif
             <div class="rating">
                <span class="rating-count">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                </span>
            </div>
          <blockquote class="blockquote">
            <p>{{$c->message}}</p>
          </blockquote>
          <figcaption class="blockquote-footer mb-0 text-muted">
             
              {{ $c->name }} in <cite title="Source Title"> <small>({{date('d F,Y',strtotime($c->stay_date))}})</small></cite>
          </figcaption>
        </figure>
      </div>
    </div>
         @endforeach
  </div>


       
       </div>
    </div>
</section>
@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/reviews.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/reviews-responsive.css" />
@stop 
@section("js")
@parent
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script src="{{ asset('front')}}/js/reviews.js" ></script>
@stop
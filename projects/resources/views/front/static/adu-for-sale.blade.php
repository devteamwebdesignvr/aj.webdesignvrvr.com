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
<section class="home-list">
   <div class="container">
      <div class="how-we-value-heading">
            {!! $data->mediumDescription !!}
      </div>
      <div class="row">
        @foreach(App\Models\Property::where(["status"=>"true"])->orderBy("id","desc")->get() as $c)
         <div class="col-lg-4 col-md-6 col-12">
            <div class="pro-img">
                @if($c->feature_image)
               <a href="{{ url($c->seo_url) }}"><img src="{{ asset($c->feature_image) }}" class="img-fluid" alt="{{$c->name}}"></a>
               @endif
            </div>
            <div class="pro-cont">
               <h3 class="title"><a href="{{ url($c->seo_url) }}">{{$c->name}}</a></h3>
               <p class="adr"> {{$c->address}}</p>
               <p>{{ Str::limit($c->description,150) }}</p>
               <div class="amn">
                  <ul class="first">
                     <li><i class="fa-solid fa-bed"></i>{{ $c->bedroom }} Bedrooms</li>
                     <li><i class="fa-solid fa-bath"></i>{{ $c->bathroom }} Bathrooms</li>
                     <li><i class="fa-solid fa-users"></i>{{ $c->sleeps }} Guests</li>
                  </ul>
               </div>
               <div class="view">
                   @if($c->price)
                  <h5 style="visibility: hidden;"><span>{{$setting_data['payment_currency']}}  {{$c->price}}</span> / Night</h5>
                  @endif
                  <a href="{{ url($c->seo_url) }}" class="forward"><i class="fa-solid fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
        @endforeach
        
      </div>
   </div>
</section>
@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-responsive.css" />
@stop 
@section("js")
@parent
<script src="{{ asset('front')}}/js/adu-for-sale.js" ></script>
@stop
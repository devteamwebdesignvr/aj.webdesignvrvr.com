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

@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-details.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/adu-for-sale-details-responsive.css" />
@stop 
@section("js")
@parent
<script src="{{ asset('front')}}/js/adu-for-sale-details.js" ></script>
@stop
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
  
    <section class="about-owner">
   <div class="container">
      <div class="head-sec">
               <h2>Team Introduction</h2>
               <p>Meet David, our industry veteran with a hands-on background in Airbnb hosting, construction management, and real estate. And Deidra, the feminine magic behind our high-touch, personalized service.</p>
            </div>
      <div class="row">
          <div class="col-9 col-md-9 col-sm-12 cont">
            <div class="abt-detail">
               <h3>David Vernon</h3>
           <p>I started as an Airbnb host myself so I know the pains and challenges you’re facing, on the guest, maintenance, municipal, and administration fronts.</p>
           <p>I’ve also enjoyed the massive income benefits of short-term rentals in a year-round tourist town. I’ve been riding the waves of this industry for 9 years, and know firsthand what it takes to operate a successful vacation rental property.</p>
           <p>You get the benefit of my experience designing and optimizing management processes + my background in construction development and real estate. I know what sells. I know how to fix things. I know how to streamline.</p>
            </div>
         </div>
         <div class="col-3 col-md-3 col-sm-12 img">
            <div class="abt-owner">
               <div class="abt-img">
                  <img src="{{ asset('front')}}/images/david.jpg" class="img-fluid" alt="">
               </div>
            </div>
         </div>
        
      </div>
      <div class="row other-owner">
         <div class="col-3 col-md-3 col-sm-12 img">
            <div class="abt-owner">
               <div class="abt-img">
                  <img src="{{ asset('front')}}/images/david.jpg" class="img-fluid" alt="">
               </div>
            </div>
         </div>
          <div class="col-9 col-md-9 col-sm-12 cont">
            <div class="abt-detail">
            <h3>Deidra Benson</h3>
            <p>Deidra is our eye for design. (Though David likes to think it’s him.)</p>
            <p>All the little touches that make our properties feel like a home away from home are all hers. Deidra delivers the kind of guest experience we all want when we travel. She’s the magic behind our high-touch, personalized service that you won’t find at a big property management firm.</p>
            </div>
         </div>
         
        
      </div>
   </div>
</section>
<section class="abt-cta">
   <div class="overlay"></div>
   <div class="container">
      <div class="head-sec">
         <h3>Ask us about construction consultations on renovations & repairs</h3>
      </div>
      <div class="cta-btn"><a href="{{ url('property-management') }}">Click Here</a></div>
   </div>
</section>

@stop

@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/css/about.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/about-responsive.css" />
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/js/about.js" ></script>
    
@stop 
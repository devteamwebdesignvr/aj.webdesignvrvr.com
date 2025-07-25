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
<!--<section class="contact-banner" style="background-image:url({{ asset($bannerImage) }});">
    <div class="contact-overlay"></div>
    <div class="container">
        <h1 data-aos="zoom-in">Production</h1>
    </div>
</section>-->

<section class="hero-section">
  <div class="hero-content">
    <h3 class="hero-title">YOUR ULTIMATE <span> DESERT </span></h3>
    <h1 class="hero-subtitle">PRODUCTION <span> LOCATION </span></h1>
  </div>


  <div class="video-container">
    
    <div style="padding:56.25% 0 0 0;position:relative;">
  <iframe src="https://player.vimeo.com/video/{{ $data->banner_video }}?autoplay=1&loop=1&muted=1&title=0&background=1" frameborder="0"
          allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" 
          style="position:absolute;top:0;left:0;width:100%;height:100%;" title="video-6758416460fd3"></iframe>
</div>
    
 <!--<iframe class="hero-video"
  width="100%"
  height="600"
  src="{{ $data->banner_video }}"
  title="YouTube video player"
  frameborder="0"
  allow="autoplay; encrypted-media; clipboard-write"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>   -->
   <!-- <video class="hero-video" autoplay muted loop playsinline>
      <source src="{{ asset($data->banner_video) }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
-->
    <div class="overlay"></div>
  </div>
</section>
   
@php $list=App\Models\ProductionGallery::where("type","partner")->get(); @endphp
@if(count($list)>0)
    
    <section class="logos">
        <div class="container-fluid">
          
          <div class="head-sec">
            
            <h2> Our <span> Partners </span> </h2>
            
          </div>
           
          
            <div class="gallery-slider owl-carousel" id="logo-slider">
              
              @foreach($list as $item)
                 <div class="item">
                  <img src="{{asset($item->image)}}" alt="vogue">
                  <p class="d-none">{{ $item->title }}</p>
                </div>
              @endforeach
              <!--
                                <div class="item">
                  <img src="{{asset('front')}}/images/nahmias.png" alt="nahmias ">                  <p class="d-none">Nahmias </p>
                </div>
                                <div class="item">
                  <img src="{{asset('front')}}/images/un-deszn.png" alt="Travel ">                  <p class="d-none">Travel </p>
                </div>
                                <div class="item">
                  <img src="{{asset('front')}}/images/lulu.png" alt="lululemon ">                  <p class="d-none">Lululemon </p>
                </div>
                                <div class="item">
                  <img src="{{asset('front')}}/images/snow.png" alt="snowboard  ">                  <p class="d-none">snowboard  </p>
                </div>
                                <div class="item">
                  <img src="{{asset('front')}}/images/netflix.png" alt="netflix">                  <p class="d-none">Netflix</p>
                </div>
              <div class="item">
                  <img src="{{asset('front')}}/images/amazon.png" alt="amazon">                  <p class="d-none">Amazon</p>
                </div>
              <div class="item">
                  <img src="{{asset('front')}}/images/porsche.png" alt="porsche">                  <p class="d-none">Porsche</p>
                </div>
              <div class="item">
                  <img src="{{asset('front')}}/images/av.png" alt="av">                  <p class="d-none">AV</p>
                </div>
              <div class="item">
                  <img src="{{asset('front')}}/images/goodr.png" alt="goodr">                  <p class="d-none">Goodr</p>
                </div>
               <div class="item">
                  <img src="{{asset('front')}}/images/air.png" alt="air">                  <p class="d-none">Air Jordan</p>
                </div>
              
              -->
                             
            </div>
          </div>
       
    </section>
@endif



<!-- Why choose us Section Start -->


<section class="book-entire-compound">
    <div class="container">
      <div class="row">
            
            <div class="content-sec col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                <div class="about_content hide">
                    
                        <h5>Why Choose Sol & Santosha? </h5>
                  
                       <div>{!! $data->mediumDescription !!}</div>
                      <!--
						<p> Our venue features a variety of versatile locations, including RVs, a huge production warehouse, outdoor stages, and stunning landscapes with views of the mountain and Joshua Tree around the property. The secluded property provides a private escape that minimizes distractions and fosters creativity. Enjoy exceptional natural lighting, with breathtaking golden hour moments and starry night skies ideal for cinematic shots. Plus, our production-friendly amenities—such as power access, Wi-Fi, parking for crew vehicles, and dedicated staging areas—ensure your team has everything they need for a successful project.</p>
                      <p class="sm-p" > Available Spaces & Features </p>
                      <p>Perfect for yoga and meditation retreats, reunions, artist gatherings, or simply exploring the hi-desert with friends, this one-of-a-kind destination can host groups of up to 22+ guests. Experience Joshua Tree your way!</p>
                      
                      <p> <strong>Recreational Vehicles –</strong> Mobile comfort zones perfect for off-grid escapes and adventurous stays. </p>
                      <p> <strong>Outdoor Stages – </strong>Open-air platforms designed for gatherings, live music, and unforgettable desert performances. </p>
                      <p> <strong>Outdoor Lounge & Firepits –</strong> Cozy spaces ideal for natural, intimate settings. </p>
                      <p> <strong>Expansive Desert Terrain –</strong> Rugged landscapes and unique rock formations. </p>
                      
                      <ul>
                        <p class="ul-p" ><strong> Perfect For: </strong></p>
                        <li>Film & TV Productions</li>
                        <li>Brand & Fashion Photoshoots</li>
                        <li>Music Videos & Live Sessions</li>
                        <li>Commercials & Product Shoots</li>
                        <li>Social Media & Content Creation</li>
                      </ul>-->
                      <div class="btn-cont">
                    <a class="abt main-btn" id="abt-more">Read More</a>
                <a class="abt main-btn" id="abt-less">Read Less</a>
                </div>                
              </div>

            </div>
        
               <div class="bkimage-sec col-lg-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="about_img right">
                  
          <div style="padding:56.25% 0 0 0;position:relative;">
  <iframe src="https://player.vimeo.com/video/{{ $data->why_choose_video }}?autoplay=1&loop=1&muted=1&title=0&background=1" 
          frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" 
          style="position:absolute;top:0;left:0;width:100%;height:100%;" title="video-6758416460fd3"></iframe>
</div>            
                  
                  <!-- <iframe class="about-video"
  width="100%"
  height="400"
  src="{{ $data->why_choose_video }}"
  title="YouTube video player"
  frameborder="0"
  allow="autoplay; encrypted-media; clipboard-write"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>  -->
                       <!--   <video class="about-video" autoplay muted loop playsinline>
                         <source src="{{ asset($data->why_choose_video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                     </video> -->
                </div>
            </div>
         </div>
    </div>
</section>


<!-- middle img  -->

<section class="gallery_img p-0">
	<div class="container-fluid p-0">
	
			<div class="row">
				<div class="col-12 p-0">
					<div class="m-img">
						<img src="{{ asset($data->gallery_banner_image) }}" alt="" class="img-fluid">
					</div>
				</div>
		
		</div>
	</div>
</section>


<section class="book-entire-compound">
    <div class="container">
      <div class="row">
            <div class="bkimage-sec col-lg-6" >
                <div class="about_img">
                  
<!--<iframe class="abt-video"
  width="100%"
  height="400"
  src="{{ $data->joshua_tree_video }}"
  title="YouTube video player"
  frameborder="0"
  allow="autoplay; encrypted-media; clipboard-write"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>   -->
                  
            <div style="padding:56.25% 0 0 0;position:relative;">
  <iframe src="https://player.vimeo.com/video/{{ $data->joshua_tree_video }}?autoplay=1&loop=1&muted=1&title=0&background=1" 
          frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" 
          style="position:absolute;top:0;left:0;width:100%;height:100%;" title="video-6758416460fd3"></iframe>
</div>                 
                    
                  <!--
                  <video class="abt-video" autoplay muted loop playsinline>
                     <source src="{{ asset($data->joshua_tree_video) }}" type="video/mp4">
                       Your browser does not support the video tag.
                    </video>
-->
              
              </div>
            </div>
        
            <div class="content-sec col-lg-6" >
                <div class="about_content">
                    <div>
                        <h5>Why Joshua Tree is a Top Filming Destination </h5>
                        {!! $data->longDescription !!}
						<!--<p> Joshua Tree National Park and the surrounding high desert have become one of the most sought-after locations for film and photography. The otherworldly landscapes, clear desert air, and iconic Joshua Trees create an ethereal, timeless aesthetic that resonates across genres—from bohemian fashion campaigns to high-budget sci-fi productions.</p>
                      <p>Unlike filming in crowded urban locations, Joshua Tree offers open space, creative freedom, and natural beauty without the hassle of heavy city permits or location restrictions.</p>
                      -->
                      
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>


<!-- Gallery Section Start -->

@php
    use App\Models\ProductionGallery;
    $list = ProductionGallery::where("type", "gallery-section")->take(3)->get();
@endphp

@if($list->count() > 0)
<section class="gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 md-12 sm-12">
                <div class="head-sec">
                    <h2>Customize Your Filming Experience</h2>
                </div>
                <div class="row rev" id="gallery-all">
                    @foreach($list as $item)
                        <div class="col-4">
                            <div class="img hover-image-box">
                                <a href="{{ asset($item->image) }}" data-fancybox="images">
                                    <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                    <div class="overlay-text">
                                        <p>{{ $item->title }}</p>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="gallery-btn">
                    <a href="javascript:void(0)" class="main-btn gallery-btn" id="loadMore">View All Photos</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


<!--
 <section class="gallery d-none" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 md-12 sm-12">
                    <div class="head-sec">
                        <h2>Customize Your Filming Experience</h2>
                    </div>
                    <div class="row rev">  
                      
                      
                      
                            <div class="col-4">
                                  <div class="img hover-image-box">
                                      <a href="{{asset('front')}}/images/gallery-1.jpg" data-fancybox="images">
                                           <img src="{{asset('front')}}/images/gallery-1.jpg" class="img-fluid" alt="">
                            <div class="overlay-text">
        
                        <p>Werewolf</p>
        
                     <p>Short Film</p>
      
      
      </div>
    </a>
  </div>
</div>
                      
             <div class="col-4" >
  <div class="img hover-image-box" >
    <a href="{{asset('front')}}/images/gallery-2.jpg" data-fancybox="images">
      <img src="{{asset('front')}}/images/gallery-2.jpg" class="img-fluid" alt="">
      <div class="overlay-text">
        
        <p>Werewolf</p>
        
       <p>Short Film</p>
      
      
      </div>
    </a>
  </div>
</div>      
                      
                         <div class="col-4">
  <div class="img hover-image-box">
    <a href="{{asset('front')}}/images/gallery-3.jpg" data-fancybox="images">
      <img src="{{asset('front')}}/images/gallery-3.jpg" class="img-fluid" alt="">
      <div class="overlay-text">
        
        <p>Werewolf</p>
        
       <p>Short Film</p>
      
      
      </div>
    </a>
  </div>
</div>        
                      
                         <div class="col-4">
  <div class="img hover-image-box">
    <a href="{{asset('front')}}/images/gallery-4.jpg" data-fancybox="images">
      <img src="{{asset('front')}}/images/gallery-4.jpg" class="img-fluid" alt="">
      <div class="overlay-text">
        
        <p>Werewolf</p>
        
       <p>Short Film</p>
      
      
      </div>
    </a>
  </div>
</div>        
                      
                         <div class="col-4">
  <div class="img hover-image-box">
    <a href="{{asset('front')}}/images/gallery-5.jpg" data-fancybox="images">
      <img src="{{asset('front')}}/images/gallery-5.jpg" class="img-fluid" alt="">
      <div class="overlay-text">
        
        <p>Werewolf</p>
        
       <p>Short Film</p>
      
      
      </div>
    </a>
  </div>
</div>        
                      
                         <div class="col-4">
  <div class="img hover-image-box">
    <a href="{{asset('front')}}/images/gallery-6.jpg" data-fancybox="images">
      <img src="{{asset('front')}}/images/gallery-6.jpg" class="img-fluid" alt="">
      <div class="overlay-text">
        
        <p>Werewolf</p>
        
       <p>Short Film</p>
      
      
      </div>
    </a>
  </div>
</div>     
                      
                      
                                                                                </div>
                    </div>
                    <div class="gallery-btn"> <a href="#"
                            class="main-btn gallery-btn">View All
                            Photos</a></div>
                </div>
            

        </div>
    </section>

-->

<!-- Gallery Section End -->



<!-- Video Section Start -->

<section class="video-section d-none">
    <div class="container">
      <div class="row">
        
         <div class="btmhero-video">
           
                        <iframe class="sec-vid"
  width="100%"
  height="600"
  src="{{ $data->last_section_video }}"
  title="YouTube video player"
  frameborder="0"
  allow="autoplay; encrypted-media; clipboard-write"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>
                    <!--
                  <video class="sec-vid" autoplay muted loop playsinline>
  <source src="{{ asset($data->last_section_video) }}" type="video/mp4">
  Your browser does not support the video tag.
</video> -->
              
              </div>
        
      </div>
   </div>
</section>

<!-- Video Section End -->





{!! $data->seo_section !!}
@stop


@section("css")
@parent
<link rel="stylesheet"
	href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />

<link rel="stylesheet"
	href="{{ asset('front')}}/assets/owl/owl.carousel.min.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/production.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/production-responsive.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">

@stop
@section("js")
@parent
<script
	src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script src="{{ asset('front')}}/assets/owl/owl.carousel.min.js"></script>
<script src="{{ asset('front')}}/js/home.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>



<script>
        AOS.init({
  duration: 1400,
})
    </script>


 <script>
    $('#logo-slider').owlCarousel({
        loop: true,
        items: 5,
        margin: 0,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2500,
        smartSpeed: 800,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 3
            },
            1024: {

                items: 5

            }
        }
    });
</script>


<script>
  gsap.registerPlugin(ScrollTrigger);

  gsap.to(".hero-video", {
    width: "100%",
    ease: "power2.out",
    scrollTrigger: {
      trigger: ".hero-section",
      start: "top top",
      end: "bottom top",
      scrub: true,
    }
  });
</script>


<script>
  
   $(document).ready(function () {
    // Select all paragraphs in .about_content
    const allParagraphs = $(".about_content.hide p");
    
    // Show only the first two paragraphs by default
    const visibleParagraphs = allParagraphs.slice(0, 2);
    const hiddenParagraphs = allParagraphs.slice(2);
    
    // Initially hide paragraphs beyond the first two and the <ul>
    hiddenParagraphs.hide();
    $(".about_content.hide ul").hide();
    $("#abt-less").hide();

    // Show more functionality
    $("#abt-more").click(function () {
      hiddenParagraphs.slideDown();
      $(".about_content.hide ul").slideDown();
      $("#abt-more").hide();
      $("#abt-less").show();
    });

    // Show less functionality
    $("#abt-less").click(function () {
      hiddenParagraphs.slideUp();
      $(".about_content.hide ul").slideUp();
      $("#abt-more").show();
      $("#abt-less").hide();

      // Optional: Scroll back to the content top on collapse
      $('html, body').animate({
        scrollTop: $(".about_content").offset().top
      }, 500);
    });
  });
  
</script>

<script>
let page = 2; 

$(document).on('click', '#loadMore', function () {
    galleryAjax(page);
    page++;
});

function galleryAjax(pageNumber) {
    $.ajax({
        url: "{{ route('get-production-gallery-ajax') }}",
        type: 'GET',
        data: { page: pageNumber },
        success: function(response) {
            const newItems = $(response.gallery);
            if (newItems.length) {
                newItems.hide(); 
                $('#gallery-all').append(newItems);
                newItems.slideDown(); 
            } else {
                $('#loadMore').fadeOut(); 
            }
        },
        error: function(xhr) {
            console.log('Error:', xhr.responseText);
        }
    });
}
</script>



@stop
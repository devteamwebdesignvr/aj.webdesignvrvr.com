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

<section class="service-banner">
<div style="padding:56.25% 0 0 0;position:relative;">
  <iframe src="https://player.vimeo.com/video/{{ $data->banner_video }}?autoplay=1&loop=1&muted=1&title=0&background=1"
          frameborder="0"
          allow="autoplay; fullscreen; picture-in-picture"
          style="position:absolute; top:0; left:0; width:100%; height:100%;"
          title="Plan the Ultimate Group Getaway at Sol &amp; Santosha"
          allowfullscreen>
  </iframe>
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
</iframe>  -->
	<!--<video playsinline webkit-playsinline muted autoplay
						data-poster="{{ asset('front')}}/images/services-thumbnail.jpeg"
						src="{{ asset($data->image_2)}}" controls></video>
                        	<div class="overlay">
                                	<a href="{{ url('host-an-event ') }}" class="main-btn"> Book Now </a>
                            </div> -->
	
</section>













<!-- <section class="service-banner">

					<video playsinline webkit-playsinline muted autoplay
						data-poster="{{ asset('front')}}/images/services-thumbnail.jpeg"
						src="{{ asset($data->image_2)}}" controls></video>

						<div class="overlay"></div>
						
			
	<div class="service-path">

	</div>
	<div class="service-overlay"></div>
	<div class="container">
		<div class="service-para">
            <h1>Events</h1>
			{!! $data->mediumDescription !!}
		</div>
	</div>
</section> -->

@php $list=App\Models\Service::orderBy("id","desc")->limit(10)->get();@endphp
@if(count($list)>0)

<section class="activities-sec"><div class="activities">
    <div
			class="container-fluid">
        
                <div class="row">
                  
                  @foreach($list as $c)
                  
                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="activites-image">
                      <a>
						<img src="{{ $c->image }}" alt="">
						<div class="overlay-content"><p>{{$c->description}}</p></div>
                      </a>
                    </div>
                    <h4><a >{{ $c->name }}</a></h4>
                  </div>
                  @endforeach
                  
                  <!--
                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="activites-image">
                      <a>
						<img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/d4b158cb-d7fc-41dd-8bb3-8f3c47849eab/imresizer-1726481090883.jpg?format=500w" alt="">
						<div class="overlay-content"><p>Our wellness retreats offer serene spaces for yoga, meditation, and spiritual growth. Whether you’re looking for a solo retreat or organizing a group event, our glamping tents and natural setting are perfect for mindfulness and healing.</p></div>
                      </a>
                    </div>
                    <h4><a >WELLNESS RETREATS</a></h4>
                  </div>
                  
                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="activites-image">
                      <a>
						<img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/bd89d114-cd29-4bc4-a5a4-492b3893f415/Ranger+Station-7.jpg?format=500w" alt="">
								<div class="overlay-content"><p>Celebrate your special day in the heart of nature! Whether it’s an intimate gathering or a lively celebration, we create memorable experiences for birthdays. Picture lantern-lit dinners, starry nights, and a cozy outdoor setting</p></div></a></div><h4><a >GROUP WEEKENDERS</a></h4></div><div
					class="col-lg-4 col-md-4 col-12"><div class="activites-image"><a
							>
						<img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/2cee7981-5ca4-4b94-9fa8-4423bed45655/000399150002.jpg?format=500w" alt="">
								<div class="overlay-content"><p>Break away from the office and immerse your team in a productive yet relaxing retreat. Our nature-inspired setting fosters creativity, collaboration, and rejuvenation. Perfect for team-building exercises, strategic planning sessions.</p></div></a></div><h4><a >TEAM RETREATS</a></h4></div><div class="col-lg-4 col-md-4 col-12"><div class="activites-image"><a
							>
						<img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/93613179-47ac-4fc9-831b-ba8846132257/DSCF1383.jpg?format=500w" alt="">
								<div class="overlay-content"><p>Reconnect with loved ones in a space designed for togetherness. Whether it’s a family reunion or just a weekend getaway, Sol & Santosha offers the perfect backdrop for laughter, shared stories, and relaxation.</p></div></a></div><h4><a >FAMILY GATHERINGS</a></h4></div><div class="col-lg-4 col-md-4 col-12"><div class="activites-image"><a
							>
						<img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/6e7c20eb-610d-4853-9126-c82c27a8f380/Leaving+Ceremony-8.jpg?format=500w" alt="">
								<div class="overlay-content"><p>Dreaming of an intimate wedding surrounded by nature? Sol & Santosha provides a stunning, natural venue for small, magical ceremonies. From the rustic elegance of the desert, your special day will feel both intimate and extraordinary.</p></div></a></div><h4><a >SMALL WEDDINGS</a></h4></div>
                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="activites-image">
                      <a>
							<img src="https://images.squarespace-cdn.com/content/v1/63d873b915b65f2fd104f9aa/72582aca-ba73-4bdf-9238-98bac5746545/0.png?format=500w" alt="">
								<div class="overlay-content"><p>Dreaming of a breathtaking backdrop for your next commercial production? With the rugged beauty of the desert and vast star-lit skies, our compound provides a natural, versatile space.</p></div>
                      </a>
                    </div>
                    <h4><a>COMMERCIAL PRODUCTIONS</a></h4>
                  </div>  -->
                        
                        </div>
                    </div>
                </div>
            </section>
@endif



@php $list=App\Models\Service::orderBy("id","desc")->limit(10)->get();@endphp
@if(count($list)>0)
<section class="events-list d-none">
	<div class="container">
		<div class="row">
			@foreach($list as $c)
			<div class="col-2">
				<div class="event-content">
					@if($c->image)
					<img src="{{ asset($c->image)}}" alt>
					@endif
					<h3>{{$c->name}}</h3>
					<p>{{ $c->description }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
<section class="plan-event">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-12">
				<div class="plan-video">
                  
<!--<iframe class="hero-video"
  width="100%"
  height="400"
  src="{{ $data->banner_video }}"
  title="YouTube video player"
  frameborder="0"
  allow="autoplay; encrypted-media; clipboard-write"
  referrerpolicy="strict-origin-when-cross-origin"
  allowfullscreen>
</iframe>  -->
                  
 <div style="padding:56.25% 0 0 0;position:relative;">
  <iframe src="https://player.vimeo.com/video/{{ $data->book_compound_video }}?autoplay=1&loop=1&muted=1&title=0&background=1"
          frameborder="0"
          allow="autoplay; fullscreen; picture-in-picture"
          style="position:absolute; top:0; left:0; width:100%; height:100%;"
          title="Plan the Ultimate Group Getaway at Sol &amp; Santosha"
          allowfullscreen>
  </iframe>
</div>              
                  
                  <!--
					<video playsinline webkit-playsinline muted autoplay
						data-poster="{{ asset('front')}}/images/services-thumbnail.jpeg"
						src="{{ asset($data->image_2)}}" controls></video> -->
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-12">
				<div class="plan-content">
					{!! $data->longDescription !!}
					<a href="{{ url('joshua-tree-1#property-list-data') }}"
						class="main-btn">SEE OUR LOCATION GUIDE</a>
				</div>
			</div>
		</div>
	</div>
</section>
@php
$list=App\Models\Gallery::where("type",$data->id)->where("status","active")->orderBy("id","desc")->limit(10)->get();
@endphp
@if(count($list)>0)
<section class="gallery-section">
	<div class="container">
		<div class="owl-carousel" id="service-slider" data-aos="fade-up">
			@foreach($list as $c)
			<div class="item">
				<img src="{{ asset($c->image)}}" alt>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif



<!-- Testimonial Section Start -->
@php
$list=App\Models\Testimonial::where("status","true")->orderBy("stay_date","desc")->take(6)->get();
@endphp
@if(count($list)>0)
<section class="testimonial ">
 <div class="container">
  <h2>What people <span>think about us</span></h2>

  <div class="testi-carou ">
    <!-- Carousel -->
    <div class="owl-carousel owl-theme testi-owl">
    @foreach($list as $c)
      <!-- Testimonial 1 -->
      <div class="item">
        <div class="card p-4">
          <div class="testi-disp">
            <div class="text-warning">★★★★★</div>
            <small class="text-muted">{{  date('d M, Y', strtotime($c->stay_date)) }}</small>
          </div>
		           <div class="ser-para short">
                  <p class="mt-3 text-muted">{{$c->message}}</p>
                </div>
               <a href="javascript:void(0);" class="toggle-btn">Show more <i class="fa-solid fa-chevron-down"></i></a>
    
          <div class="testi-disp-ant">
            @if($c->image)
            <img src="{{ asset($c->image)}}" alt="Ray" class="rounded-circle me-3" width="50" height="50">
            @else
            <img src="{{ asset('front')}}/images/no-image.webp" alt="Ray" class="rounded-circle me-3" width="50" height="50">
          	@endif
            <div class="text-start">
              <strong>{{$c->name}}</strong><br>
              <small class="text-muted">{{$c->position}}</small>
            </div>
          </div>
        </div>
      </div>
     	@endforeach
      <!-- Testimonial 2 -->
      
      <!-- Add more items as needed -->

    </div>

  </div>
</div>

</section>
@endif



@stop
@section("css")
@parent
<link rel="stylesheet"
	href="{{ asset('front')}}/assets/owl/owl.carousel.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
<link rel="stylesheet" href="{{ asset('front')}}/css/events.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/events-responsive.css" />
@stop
@section("js")
@parent
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script src="{{ asset('front')}}/assets/owl/owl.carousel.min.js"></script>
<script src="{{ asset('front')}}/js/events.js"></script>
<script>
    AOS.init({
  duration: 1400,
})
</script>
<script>
  $(document).ready(function(){
    $('.testi-owl').owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      dots: false,
      autoplay: true,
      navText: [
        '<span class="btn btn-outline-danger rounded-circle px-2 py-1">&#8249;</span>',
        '<span class="btn btn-outline-danger rounded-circle px-2 py-1">&#8250;</span>'
      ],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
		1000: {
				items: 2,
			}
      }
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.toggle-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const para = this.previousElementSibling;
        para.classList.toggle('short');
        if (para.classList.contains('short')) {
          this.innerHTML = 'Show more <i class="fa-solid fa-chevron-down"></i>';
        } else {
          this.innerHTML = 'Show less <i class="fa-solid fa-chevron-up"></i>';
        }
      });
    });
  });
</script>

@stop
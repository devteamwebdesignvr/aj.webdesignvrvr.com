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
    $currency=$setting_data['payment_currency'];
    $name=$data->title;
    $bannerImage=asset('front/images/breadcrumb.webp');;
    if($data->banner_image){
        $bannerImage=asset($data->banner_image);
    }
    $picture = $data->picture ? json_decode($data->picture,true) : [];
    $amenities = $data->amenities ? json_decode($data->amenities,true) : [];
    $amenitiesNotIncluded = $data->amenitiesNotIncluded ? json_decode($data->amenitiesNotIncluded,true) : [];
    $pictures = $data->pictures ? json_decode($data->pictures,true) : [];
    $prices = $data->prices ? json_decode($data->prices,true): [];
    $address = $data->address ? json_decode($data->address,true) : [];    
@endphp
<style>
    div#gaurav-new-data-area .col-md-6, div#gaurav-new-modal-days-area .col-md-6{padding:0px;text-align: left;font-size: var(--f14);}
    div#gaurav-new-data-area .row .col-md-6:last-child{text-align:right;}
</style>




    
<section class="banner_top d-none">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				   <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>

            <!-- Image Sliders -->
            <div class="carousel-inner">
            <!-- Image one-->
              <div class="carousel-item active">
                <img src="{{asset('front')}}/images/property1.png" class="d-block" alt="...">
              </div>

              <!-- image two -->
              <div class="carousel-item">
                <img src="{{asset('front')}}/images/property2.png" class="d-block" alt="...">
              </div>

              <!-- Image Three -->
              <div class="carousel-item">
                <img src="{{asset('front')}}/images/property3.png" class="d-block" alt="...">
              </div>

              <!-- Image Four -->
              <div class="carousel-item">
                <img src="{{asset('front')}}/images/primg-5.webp" class="d-block" alt="...">
              </div>

    

            <!-- Carousel Controls -->
           <section>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
           </section>
          </div>
    </main>
			</div>
		</div>
	</div>
</section>


           <section class="gall-top-sec">
                <div class="row gallery">
                        <h4>JT Village Campground - Star Stream</h4>
                    <div class="col-6 left">
                      <a href="https://mike-vr-1.webdesignvrvr.com/uploads/properties/6734ae9950dda.webp" data-fancybox="gallery">
                        <img src="https://mike-vr-1.webdesignvrvr.com/uploads/properties/6734ae9950dda.webp" class="img-fluid" alt="">
                      </a>
                    </div>
                    <div class="col-6 right" >
                        <div class="row">
                                                                                        <div class="col-6">
                                <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55c06b.webp" data-fancybox="gallery"> 
                                   <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55c06b.webp" class="img-fluid"  alt=""  title="">
                                                                  </a>
                               </div>
                                                                                           <div class="col-6">
                                <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55d92f.webp" data-fancybox="gallery"> 
                                   <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55d92f.webp" class="img-fluid"  alt=""  title="">
                                                                  </a>
                               </div>
                                                                                           <div class="col-6">
                                <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55e34b.webp" data-fancybox="gallery"> 
                                   <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55e34b.webp" class="img-fluid"  alt=""  title="">
                                                                  </a>
                               </div>
                                                                                           <div class="col-6">
                                <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55ed41.webp" data-fancybox="gallery"> 
                                   <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55ed41.webp" class="img-fluid"  alt=""  title="">
                                                                       <button type="button" class="main-btn">Show All</button>
                                                                  </a>
                               </div>
                                                                                    </div>
                    </div>
                    <div class="hidden-gallery">
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd522d.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd522d.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3004ab4.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3004ab4.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa300562d.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa300562d.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3005e2b.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3005e2b.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa30066bb.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa30066bb.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3006e8b.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3006e8b.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3007608.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3007608.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3007dc5.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3007dc5.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3008531.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa3008531.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd2dc8.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd2dc8.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa300965b.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa300965b.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4ccf777.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4ccf777.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd0283.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd0283.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd0a1b.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd0a1b.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd1190.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd1190.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd1864.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd1864.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd1f91.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd1f91.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd2707.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd2707.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd2df4.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd2df4.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd3741.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd3741.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd3fe2.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa4cd3fe2.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa65a17a1.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa65a17a1.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011f330.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011f330.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55d92f.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55d92f.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55e34b.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55e34b.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55ed41.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55ed41.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55f804.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55f804.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e5602f3.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e5602f3.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e560e13.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e560e13.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e561853.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e561853.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e56239e.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e56239e.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e562e97.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e562e97.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011d813.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011d813.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011e326.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011e326.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011eb12.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011eb12.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55c06b.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734a9e55c06b.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011fa54.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa011fa54.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa01201c3.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa01201c3.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa0120917.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa0120917.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa01210ac.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa01210ac.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa012178a.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa012178a.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa0121ef8.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa0121ef8.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bcf42d.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bcf42d.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd074e.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd074e.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd1132.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd1132.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd1b3d.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd1b3d.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                                <div class="img-active">
                            <a href="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd246e.webp" data-fancybox="gallery"> 
                               <img src="https://mike-vr-1.webdesignvrvr.com/uploads/uploads/files/6734aa1bd246e.webp" class="img-fluid"  alt=""  title="">
                           </a>
                        </div>
                                             
                    </div>

                  </div>
           </section>

                  
   <div class="breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb single-breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fa-solid fa-house"></i>Home</a>
                <a href="{{ url('/properties') }}" rel="nofollow"><span><i class="fa-solid fa-chevron-right"></i></span> Properties</a>
               
                <span><i class="fa-solid fa-chevron-right"></i></span> {{$name}}
            </div>
        </div>
    </div>
<a href="#book" class="sticky main-btn book1 book-now"><span class="button-text">BOOK NOW</span></a>
<section class="property-detail">
    <section class="main">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-8">
                    <div class="row header-name">
                        <div class="col-10">
                            <h4>{{$data->title}}</h4>
                            @isset($address['full'])
                              <h6><i class="fa fa-map-marker-alt"></i> {{$address['full']}}</h6>
                            @endisset
                            <ul class="ammenity-home">
                              @if($data->accommodates)
                                <li><i class="fa fa-users"></i>  {{$data->accommodates}} Sleeps</li>
                              @endif
                              @if($data->bedrooms)
                                <li><i class="fa fa-bed"></i> {{$data->bedrooms}} bedrooms</li>
                              @endif
                              @if($data->bathrooms)
                                <li><i class="fa fa-bath"></i> {{$data->bathrooms}} bathrooms</li>
                              @endif
                              @if($data->beds)
                                <li><i class="fa fa-bed"></i> {{$data->beds}} Beds</li>
                              @endif
                            </ul>
                        </div>
                    </div>
                           @if($data->summary)
                    
                    <section class="description">
                        <div class="container-fluid">
                            <div class="row">
                                <h2>Listing description</h2>
                                <div class="col-12">
                                    <div class="des"> <pre>{!! $data->summary !!}</pre></div>
                                    <button class="read-more summ">Read More</button>
                                </div>
                            
                            </div>
                        </div>
                    </section>
                    @endif

             
                    @if($data->booklet)
                    <section class="booklet">
                       <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Booklet</h2>
                                </div>
                                <div class="col-9">
                                    <p>Please find the property attached booklet</p>
                                    <a href="{{ asset($data->booklet) }}" target="_BLANK" download class="book"> <i class="fa-solid fa-download"></i> Click Here</a>
                                </div>
                            </div>
                        </div> 
                    </section>


                    
                    @endif
                    <section class="ammenities">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Amenities</h2>
                                </div>
                                <div class="col-9">
                                   <div class="row amn">
                                        @foreach($amenities as $c)
                                            <div class="col-6 mt-2"><i class="fa-solid fa-check text-success"></i> {{ $c }}</div>
                                        @endforeach
                                   </div>
                                   <button class="amn-more">Read More</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    @if(count($amenitiesNotIncluded)>0)
                    <section class="ammenities">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Amenities Not Include</h2>
                                </div>
                                <div class="col-9">                                       
                                    <div class="row">
                                        @foreach($amenitiesNotIncluded as $c)
                                            <div class="col-6 mt-2"><i class="fa-solid fa-times text-danger"></i> {{ $c }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->space)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Space</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg space">
                                       <pre>{!! $data->space !!}</pre>
                                    </div>
                                    <button class="policy-space">Read More</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->access)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Access</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg access">
                                         <pre>{!! $data->access !!}</pre>
                                    </div>
                                    <button class="policy-access">Read More</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->interactionWithGuests)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Interaction With Guests</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg">
                                         <pre>{!! $data->interactionWithGuests !!}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->neighborhood)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Neighborhood</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg">
                                         <pre>{!! $data->neighborhood !!}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->transit)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Transit</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg">
                                        <pre>{!! $data->transit !!}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->notes)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Notes</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg">
                                        <pre>{!! $data->notes !!}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @if($data->houseRules)
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>House Rules</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg access">
                                         <pre>{!! $data->houseRules !!}</pre>
                                    </div>
                                    <button class="policy-access">Read More</button>

                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    <section class="policies">
                        <div class="container-fluid">
                        <h2>Availability</h2>
                            <div class="row">
                                <!-- <div class="col-3">
                                    <h2>Availability</h2>
                                </div> -->
                                <div class="col-12">
                                    <iframe src="{{ url('fullcalendar-demo/'.$data->id) }}"  width="100%" height="400" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                  @if(App\Models\Guesty\GuestyPropertyReview::where("listingId",$data->_id)->orderBy("id","asc")->count()>0)
                    <section class="reviews">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>See what others loved about this property</h2>
                                    <p>Rated by our fantastic guests.</p>
                                </div>
                                <div class="col-9">
                                    @php $listReviews=App\Models\Guesty\GuestyPropertyReview::where("listingId",$data->_id)->where('rawReview', 'LIKE', '%public_review%')->orderBy("id","asc")->paginate(10); @endphp
                                    @foreach($listReviews as $c)
                                    @php $rawReview=json_decode($c->rawReview,true);@endphp
                                       <div class="user">
                                           <div class="row">
                                               <div class="review-img">
                                                   <img src="{{ asset('front/no-image.png') }}" alt="">
                                               </div>
                                               <div class="col-review">
                                                @if($c->full_name)
                                                   <h6>{{ str_replace('"',"",$c->full_name) ?? ''}}</h6>
                                                @endif
                                                   <p>{{$rawReview['public_review'] ?? '' }}</p>
                                                   <p>{{ date('F d-Y',strtotime($c->createdAtGuesty))}}
                                               </div>
                                               <hr>
                                           </div>
                                       </div>
                                    @endforeach
                                    {{$listReviews->appends(request()->all())}}
                                </div>
                            </div>
                        </div>
                    </section> 
                  @endif         
                </div>
                <div class="col-lg-4" id="book">
                    <div class="get-quote">
                        <div class="forms-booking-tab">
                            <ul class="tabs">
                                <li class="item booking active" data-form="ovabrw_booking_form">Enter your dates and experience the charm</li>
                            </ul>
                            <div class="ovabrw_booking_form" id="ovabrw_booking_form" style="">
                                <form class="form booking_form" id="booking_form" action="{{url('get-quote')}}" method="get">
                                    <input type="hidden" name="property_id" value="{{ $data->id }}">
                                    <div class="main-cal">
                                        <div class="ovabrw_datetime_wrapper">
                                             {!! Form::text("start_date",Request::get("start_date"),["required","autocomplete"=>"off","inputmode"=>"none","id"=>"start_date","placeholder"=>"Check in"]) !!}
                                             <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div class="ovabrw_datetime_wrapper">
                                             {!! Form::text("end_date",Request::get("end_date"),["required","autocomplete"=>"off","inputmode"=>"none","id"=>"end_date","placeholder"=>"Check Out"]) !!}
                                             <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <input type="text" id="demo17" value="" aria-label="Check-in and check-out dates" aria-describedby="demo17-input-description" readonly/>
                                   </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="text" name="Guests"   value="{{ Request::get('Guests') ?? '' }}" readonly="" class="form-control gst" id="show-target-data" placeholder="Guests">
                                         <i class="fa-solid fa-users "></i>
                                         <input type="hidden" value="{{ Request::get('adults') ?? '0' }}"  name="adults" id="adults-data" />
                                         <input type="hidden" value="{{ Request::get('child') ?? '0' }}"  name="child" id="child-data" />
                                         <div class="adult-popup" id="guestsss">
                                             <i class="fa fa-times close1"></i>
                                             <div class="adult-box">
                                                 <p id="adults-data-show"><span>@if(Request::get('adults'))
                                                                                     @if(Request::get('adults')>1)
                                                                                         {{ Request::get('adults') }} Adults
                                                                                     @else
                                                                                         {{ Request::get('adults') }} Adult
                                                                                     @endif
                                                                                  @else
                                                                                  Adult
                                                                                  @endif</span> 18+</p>
                                                 <div class="adult-btn">
                                                     <button class="button1"  type="button" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Decrement Value">-</button>
                                                     <button class="button11 button1" type="button"  onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</button>
                                                 </div>
                                             </div>
                                             <div class="adult-box">
                                                 <p id="child-data-show"><span>@if(Request::get('child'))
                                                                                     @if(Request::get('child')>1)
                                                                                         {{ Request::get('child') }} Children
                                                                                     @else
                                                                                         {{ Request::get('child') }} Child
                                                                                     @endif
                                                                                  @else
                                                                                  Child
                                                                                  @endif</span> (0-17)</p>
                                                 <div class="adult-btn">
                                                     <button class="button1" type="button"  onclick="functiondec('#child-data','#show-target-data','#adults-data')" value="Decrement Value">-</button>
                                                     <button class="button11 button1" type="button"  onclick="functioninc('#child-data','#show-target-data','#adults-data')" value="Increment Value">+</button>
                                                 </div>
                                             </div>
                                             <button class="main-btn  close111" type="button" onclick="">Apply</button>
                                         </div>
                                    </div>
                                    <div id="gaurav-new-data-area"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ovabrw-book-now" id="submit-button-gaurav-data" style="display: none;" >
                                                <button type="submit" class="main-btn">
                                                <span> Book Now</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <p>Or<br>Contact Owner</p>
                                    <p><a href="mailto:{{$data->email ?? $setting_data['email'] }}"><i class="fa-solid fa-envelope"></i> {{$data->email ?? $setting_data['email'] }}</a></p> -->
                                </form>
                            </div>
                        </div>

		<div class="mt-5"> 
							<a href="#" class="main-btn ask-question" data-bs-toggle="modal" data-bs-target="#model-form1">Ask a question</a>
		</div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Things to know section -->
                <section class="things-to-know-sec">
                    <div class="things-to-know">
                        <div class="container-fluid">
                            <h3>Things to know</h3>
                            <div class="row">
                                <div class="col-4">
                                    <p>House rules</p>
                                    <ul class="rules-content">
                                        <li><img
                                                src="front/images/check-box.png">Children
                                            allowed</li>
                                        <li><img
                                                src="front/images/check-box.png">Check-in
                                            after 3:00 pm</li>
                                        <li><img
                                                src="front/images/check-box.png">Checkout
                                            before 11:00 am</li>
                                        <li><img src="front/images/check-box.png">10
                                            guests maximum</li>
                                    </ul>
                                    <button class="show-more"
                                        data-bs-toggle="modal"
                                        data-bs-target="#rule"
                                        id="rule-btn">Show more <i
                                            class="fa-solid fa-arrow-right"></i></button>
                                </div>
                                <div class="col-4">
                                    <p>Safety & property</p>
                                    <ul class="safety-content">
                                        <li><img
                                                src="front/images/check-box.png">Smoking
                                            not allowed</li>
                                        <li><img
                                                src="front/images/check-box.png">Parties
                                            not allowed</li>
                                        <li><img src="front/images/check-box.png">Pets
                                            not allowed</li>
                                    </ul>
                                    <button class="show-more"
                                        data-bs-toggle="modal"
                                        data-bs-target="#safety"
                                        id="safety-btn">Show more <i
                                            class="fa-solid fa-arrow-right"></i></button>
                                </div>
                                <div class="col-4">
                                    <p>Cancellation policy</p>
                                    <div class="policy-content">
                                        <p>For cancellations made at least 60
                                            days before check-in, a full
                                            reimbursement will be provided.
                                            Please note that an exception
                                            applies for cancellations in
                                            December and January, where a 90-day
                                            advance notice is required for a
                                            full refund. Cancellations made
                                            later than these timeframes will not
                                            be eligible for reimbursement.</p>
                                    </div>
                                    <button class="show-more"
                                        data-bs-toggle="modal"
                                        data-bs-target="#policy"
                                        id="policy-btn">Show more <i
                                            class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <div class="border-sec">
                    <div class="container-fluid">
                        <hr>
                    </div>
                </div>

      <!-- experience -->

                <section class="experience-sec">
                    <div class="experience">
                        <div class="container-fluid">
                            <h2>Why stay with us?</h2>
                            <div class="row">
                                <div class="col-4">
                                    <div class="feature">
                                        <div class="img">
                                            <img src="front/images/curated.webp" alt
                                                class="experience-normal">
                                            <img src="front/images/cure.webp" alt
                                                class="experience-hover">
                                        </div>
                                        <div class="content">
                                            <h4>Curated collection</h4>
                                            <p>Enjoy a haven of luxury living
                                                with our thoughtfully curated
                                                villa selection.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="feature">
                                        <div class="img">
                                            <img src="front/images/palm.webp" alt>
                                            <h4>Remarkable locations</h4>
                                            <p>Explore the hidden gems of the
                                                Caribbean in our stunning
                                                locations.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="feature">
                                        <div class="img">
                                            <img src="front/images/local.webp" alt>
                                            <h4>Local expertise</h4>
                                            <p>Embark on a journey of discovery
                                                with our seasoned local
                                                specialists.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="feature">
                                        <div class="img">
                                            <img src="front/images/trip.webp" alt>
                                            <h4>Trip designers</h4>
                                            <p>Immerse yourself in your dream
                                                holidays with our expert touch.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="feature">
                                        <div class="img">
                                            <img src="front/images/luxury.webp" alt>
                                            <h4>Luxury amenities</h4>
                                            <p>Savor the lavish comforts of
                                                world-class amenities at your
                                                fingertips.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="feature">
                                        <div class="img">
                                            <img src="front/images/confident.webp"
                                                alt>
                                            <h4>Confidentiality</h4>
                                            <p>Ensure your privacy with the
                                                discreet service from our
                                                staff.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>

  
<section class="accomodation-sec"><div class="accomodation"><div class="container-fluid"><div class="row">
    <div class="col-4">
<img src="{{asset('front')}}/images/accomodation.webp" alt="">
</div>
<div class="col-8">
    <h2>Accommodation services</h2><ul><li><p class="accomodation-title">Dedicated concierge</p><p>You will be assigned a personal concierge, who will meticulously attend to your needs.</p></li><li><p class="accomodation-title">Warm welcome</p><p>Upon arrival at your villa, you’ll be personally greeted and assisted with settling in.</p></li><li><p class="accomodation-title">Villa preparation</p><p>Every home undergoes a cleaning and preparation process before your arrival and after your departure.</p></li><li><p class="accomodation-title">Around-the-clock assistance</p><p>Our devoted team is available 24/7  to offer you support. Your comfort and satisfaction are our top priorities.</p></li></ul></div></div></div></div></section>

<div class="side-map d-none">
    <div class="container-fluid">
        @if($data->map)
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28021.515400954926!2d77.21230522911186!3d28.609092569562765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2db961be393%3A0xf6c7ef5ee6dd10ae!2sIndia%20Gate%2C%20New%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1748250018455!5m2!1sen!2sin" data-src="{!! $data->map !!}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        @endif
    </div>
</div>


      <div class="modal" id="amn">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>Amenities and features</h3>
                        <div class="amn-area">
                            <div class="single-amenity">
                                <ul class="amenities">
                                    <li><img src="./images/ac.png" alt>Air
                                        conditioner <hr></li>
                                    <li><img src="./images/chef.png" alt>Chef
                                        <hr></li>
                                    <li><img src="./images/wifi1.png" alt>WIFI
                                        internet <hr></li>
                                    <li><img src="./images/bbq.png" alt>BBQ
                                        grill <hr></li>
                                    <li><img src="./images/kitchen1.png"
                                            alt>Kitchen <hr></li>
                                    <li><img src="./images/pool.png" alt>Outdoor
                                        pool <hr></li>
                                    <li><img src="./images/water.png" alt>Hot
                                        water <hr></li>
                                    <li><img src="./images/refrigerator.png"
                                            alt>Refrigerator <hr></li>
                                    <li><img src="./images/hiking.png"
                                            alt>Hiking <hr></li>
                                    <li><img src="./images/iron.png" alt>Iron
                                        <hr></li>
                                    <li><img src="./images/dishwasher.png"
                                            alt>Dishwasher <hr></li>
                                    <li><img src="./images/parking.png" alt>Free
                                        street parking <hr></li>
                                    <li><img src="./images/shampoo.png"
                                            alt>Shampoo <hr></li>
                                    <li><img src="./images/dryer.png" alt>Dryer
                                        <hr></li>
                                    <li><img src="./images/beach.png" alt>Beach
                                        essentials <hr></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="rule">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>House rules</h3>
                        <div class="rule-area">
                            <div class="single-amenity">
                                <ul class="rules-content">
                                    <li><img
                                            src="front/images/check-box.png">Children
                                        allowed <hr></li>
                                    <li><img
                                            src="front/images/check-box.png">Check-in
                                        after 3:00 pm <hr></li>
                                    <li><img
                                            src="front/images/check-box.png">Checkout
                                        before 11:00 am <hr></li>
                                    <li><img src="front/images/check-box.png">10
                                        guests maximum <hr></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="safety">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>Safety & property</h3>
                        <div class="safety-area">
                            <div class="single-amenity">
                                <ul class="safety-content">
                                    <li><img src="front/images/check-box.png">Smoking
                                        not allowed <hr></li>
                                    <li><img src="front/images/check-box.png">Smoking
                                        not allowed <hr></li>
                                    <li><img src="front/images/check-box.png">Smoking
                                        not allowed <hr></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="policy">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>Cancellation policy</h3>
                        <div class="policy-area">
                            <div class="single-amenity">
                                <div class="policy-content">
                                    <p>For cancellations made at least 60 days
                                        before check-in, a full reimbursement
                                        will be provided. Please note that an
                                        exception applies for cancellations in
                                        December and January, where a 90-day
                                        advance notice is required for a full
                                        refund. Cancellations made later than
                                        these timeframes will not be eligible
                                        for reimbursement.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="policy1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>Location</h3>
                        <div class="row">
                            <div class="col-12 location-details">
                                <p class="location-title">Airport</p>
                                <div class="location-para">
                                    <p>Dignissim qui blandit praesent luptam
                                        Airport (AHYU)</p>
                                    <p>45 min drive</p>
                                </div>
                            </div>
                            <div class="col-12 location-details">
                                <p class="location-title">Beaches</p>
                                <div class="location-para">
                                    <p>Praesent luptatum zzril delenit
                                        Beaches</p>
                                    <p>55 min drive</p>
                                </div>
                            </div>
                            <div class="col-12 location-details">
                                <p class="location-title">Airport</p>
                                <div class="location-para">
                                    <p>Dignissim qui blandit praesent luptam
                                        Airport (AHYU)</p>
                                    <p>45 min drive</p>
                                </div>
                            </div>
                            <div class="col-12 location-details">
                                <p class="location-title">Beaches</p>
                                <div class="location-para">
                                    <p>Praesent luptatum zzril delenit
                                        Beaches</p>
                                    <p>55 min drive</p>
                                </div>
                            </div>
                            <div class="col-12 location-details">
                                <p class="location-title">Airport</p>
                                <div class="location-para">
                                    <p>Dignissim qui blandit praesent luptam
                                        Airport (AHYU)</p>
                                    <p>45 min drive</p>
                                </div>
                            </div>
                            <div class="col-12 location-details">
                                <p class="location-title">Beaches</p>
                                <div class="location-para">
                                    <p>Praesent luptatum zzril delenit
                                        Beaches</p>
                                    <p>55 min drive</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal form-modal" id="model-form1" aria-modal="true"
            role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- Modal Header -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3>Ask a question about Arrecife Beach House</h3>
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <label for="first-name">First name*</label>
                                    <input type="text" name="first-name"
                                        placeholder="First Name" required>
                                </div>
                                <div class="col-6">
                                    <label for="last-name">Last name*</label>
                                    <input type="text" name="last-name"
                                        placeholder="Last Name" required>
                                </div>
                                <div class="col-12">
                                    <label for="email">Email address*</label>
                                    <input type="email" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-4">
                                    <label for="phone">Phone number</label>
                                    <select name="phone" id="phone">
                                        <option value="44" selected>UK
                                            (+44)</option>
                                        <option value="1">USA (+1)</option>
                                        <option value="213">Algeria
                                            (+213)</option>
                                        <option value="376">Andorra
                                            (+376)</option>
                                        <option value="244">Angola
                                            (+244)</option>
                                    </select>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="phone">
                                </div>
                                <div class="col-12">
                                    <label for="message">HOW CAN WE
                                        HELP?</label>
                                    <textarea name="message"
                                        placeholder="Let us know about your plans, your group and any special requirements so we can help tailor your stay."
                                        required></textarea>
                                </div>
                                <div class="col-12 check-btn">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Send me emails with travel
                                            inspiration and news about
                                            Zolaz.
  </label>
</div>
									     <!-- <div class="checkbox-wrapper-19">
                                        <input type="checkbox" id="cbtest-19">
                                        <label for="cbtest-19"
                                            class="check-box"></label>
                                        <span>Send me emails with travel
                                            inspiration and news about
                                            Zolaz.</span>
                                    </div> -->
                                </div>
                                <script
                                    src="https://www.google.com/recaptcha/api.js"
                                    async defer></script>
                                <!-- <div
                                    class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="g-recaptcha"
                                        data-sitekey="6LeGXjgpAAAAAI6lxu2oOq-dyg6U-ILGyOLJwNiF"></div>
                                </div> -->
                                <div class="col-12 contact-btn">
                                    <button class="main-btn">Submit
                                        question</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

  
  <section class="location-sec">
                <div class="location">
                    <div class="container-fluid">
                        <h3>Our location</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d81205.8775094032!2d-69.48078099406423!3d19.291033119522215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaee8ab1acdbf65%3A0xc5da8feeed11c460!2sPlaya%20Ermita%C3%B1o!5e0!3m2!1sen!2sin!4v1702634916607!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
   </section>
  



@stop
@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-detail.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-detail-responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css"/>
    <link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js" ></script>
    <script src="{{ asset('front')}}/js/property-detail.js" ></script>
    <script>
    function functiondec($getter_setter,$show,$cal){
        $("#submit-button-gaurav-data").hide();
        val=parseInt($($getter_setter).val());
        if(val>0){
            val=val-1;
        }
        $($getter_setter).val(val);
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        $show_actual_data=$show_data+" Guests";
        if($getter_setter=="#adults-data"){
            $($getter_setter+'-show').html(val +" Adults");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Adult"); 
            }
        }else{
             $($getter_setter+'-show').html(val +" Children");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Child"); 
            }
        }
        $($show).val($show_actual_data);
        ajaxCallingData();
    }
    function functioninc($getter_setter,$show,$cal){
        $("#submit-button-gaurav-data").hide();
        val=parseInt($($getter_setter).val());
        val=val+1;
        $($getter_setter).val(val);
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        $show_actual_data=$show_data+" Guests";
        $($show).val($show_actual_data);
        if($getter_setter=="#adults-data"){
            $($getter_setter+'-show').html(val +" Adults");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Adult"); 
            }
        }else{
             $($getter_setter+'-show').html(val +" Children");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Child"); 
            }
        }
        ajaxCallingData();
    }
</script>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Days</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" id="gaurav-new-modal-days-area">
        Modal body..
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Additional Fee</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" id="gaurav-new-modal-service-area">
        Modal body..
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



     <div class="modal form-modal" id="model-form1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <!-- Modal Header -->

      <!-- Modal body -->
      <div class="modal-body">
        <h3>Ask a question about Arrecife Beach House</h3>
        <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="first-name">First name*</label>
                                            <input type="text" name="first-name" placeholder="First Name" required="">
                                        </div>
                                         <div class="col-6">
                                            <label for="last-name">Last name*</label>
                                            <input type="text" name="last-name" placeholder="Last Name" required="">
                                        </div>
                                        <div class="col-12">
                                            <label for="email">Email address*</label>
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="col-4">
                                            <label for="phone">Phone number</label>
                                            <select name="phone" id="phone">
                                              <option value="44" selected>UK (+44)</option>
                                              <option value="1">USA (+1)</option>
                                              <option value="213">Algeria (+213)</option>
                                              <option value="376">Andorra (+376)</option>
                                              <option value="244">Angola (+244)</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" name="phone">
                                        </div>
                                        <div class="col-12">
                                            <label for="message">HOW CAN WE HELP?</label>
                                            <textarea name="message" placeholder="Let us know about your plans, your group and any special requirements so we can help tailor your stay." required=""></textarea>
                                        </div>
                                        <div class="col-12 check-btn">
                                            <div class="checkbox-wrapper-19">
                                                  <input type="checkbox" id="cbtest-19">
                                                  <label for="cbtest-19" class="check-box"></label>
                                                  <span>Send me emails with travel inspiration and news about Zolaz.</span>
                                                </div>
                                        </div>
                                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="form-group col-lg-12 col-md-12 col-sm-12">
    <div class="g-recaptcha" data-sitekey="6LeGXjgpAAAAAI6lxu2oOq-dyg6U-ILGyOLJwNiF"></div>
</div>
                                        <div class="col-12 contact-btn">
                                            <button class="main-btn">Submit question</button>
                                        </div>
                                    </div>
                                </form>
       </div> 
    </div>
  </div>
</div>










<script>
    function clearDataForm(){
        $("#start_date").val('');
        $("#end_date").val('');
        $("#submit-button-gaurav-data").hide();
        $("#gaurav-new-modal-days-area").html('');
        $("#gaurav-new-modal-service-area").html('');
        $("#gaurav-new-data-area").html('');
    }
    $(document).on("change","#pet_fee_data_guarav",function(){
        ajaxCallingData();
    });
    $(document).on("change","#heating_pool_fee_data_guarav",function(){
        ajaxCallingData();
    });
    function ajaxCallingData(){
        $("#gaurav-new-modal-days-area").html(null);
        $("#gaurav-new-modal-service-area").html(null);
        $("#gaurav-new-data-area").html(null);
        $("#submit-button-gaurav-data").hide();
        pet_fee_data_guarav=$("#pet_fee_data_guarav").val();
        heating_pool_fee_data_guarav=$("#heating_pool_fee_data_guarav").val();
        adults=$("#adults-data").val();
        childs=$("#child-data").val();
        total_guests=parseInt(adults)+parseInt(childs);
        if(total_guests>0){
             if($("#txtFrom").val()!=""){
                 if($("#txtTo").val()!=""){
                     $.post("{{route('checkajax-get-quote')}}",{start_date:$("#start_date").val(),end_date:$("#end_date").val(),heating_pool_fee_data_guarav:heating_pool_fee_data_guarav,pet_fee_data_guarav:pet_fee_data_guarav,adults:adults,childs:childs,book_sub:true,property_id:{{ $data->id }}},function(data){
                        if(data.status==400){
                            $("#gaurav-new-modal-days-area").html(null);
                            $("#gaurav-new-modal-service-area").html(null);
                            $("#gaurav-new-data-area").html(null);
                            $("#submit-button-gaurav-data").hide();
                            toastr.error(data.message);
                        }else{
                            $("#submit-button-gaurav-data").show();
                            $("#gaurav-new-modal-days-area").html(data.modal_day_view);
                            $("#gaurav-new-modal-service-area").html(data.modal_service_view);
                            $("#gaurav-new-data-area").html(data.data_view);
                        }
                    });
                 }
             }
        }else{
            $("#gaurav-new-modal-days-area").html(null);
            $("#gaurav-new-modal-service-area").html(null);
            $("#gaurav-new-data-area").html(null);
            $("#submit-button-gaurav-data").hide();
        }
    }
    </script>
    <script src="{{ asset('datepicker') }}/node_modules/fecha/dist/fecha.min.js"></script>
    <script src="{{ asset('datepicker') }}/dist/js/hotel-datepicker.js"></script>
    <script>
    @php
        $new_data_blocked=LiveCart::iCalDataCheckInCheckOutCheckinCheckout($data->id);
        $checkin=json_encode($new_data_blocked['checkin']);
        $checkout=json_encode($new_data_blocked['checkout']);
        $blocked=json_encode($new_data_blocked['blocked']);   
    @endphp
    var checkin = <?php echo $checkin;  ?>;
    var checkout = <?php echo ($checkout);  ?>;
    var blocked= <?php echo ($blocked);  ?>;
    (function () {
        @if(Request::get("start_date"))
            @if(Request::get("end_date"))
                $("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");
            @endif
        @endif
        abc=document.getElementById("demo17");
        var demo17 = new HotelDatepicker(
            abc,
            {
                //minNights: {{ $data->terms_min_night }},
                @if($checkin)
                    noCheckInDates: checkin,
                @endif
                @if($checkout)
                    noCheckOutDates: checkout,
                @endif
                @if($blocked)
                    disabledDates: blocked,
                @endif
                onDayClick: function() {
                    d = new Date();
                    d.setTime(demo17.start);
                    document.getElementById("start_date").value = getDateData(d);
                    d = new Date();
                    console.log(demo17.end)
                    if(Number.isNaN(demo17.end)){
                        document.getElementById("end_date").value = '';
                    }else{
                        d.setTime(demo17.end);
                        document.getElementById("end_date").value = getDateData(d);
                        ajaxCallingData();
                    }
                },clearButton:function(){ return true;}
            }
        );
        @if(Request::get("start_date"))
            @if(Request::get("end_date"))
                setTimeout(function(){$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");document.getElementById("start_date").value ="{{ request()->start_date }}";document.getElementById("end_date").value ="{{ request()->end_date }}";ajaxCallingData();},1000);
            @endif
        @endif
    })();
    $(document).on("click","#clear",function(){$("#clear-demo17").click();});
    x=document.getElementById("month-2-demo17");
    x.querySelector(".datepicker__month-button--next").addEventListener("click", function(){y=document.getElementById("month-1-demo17");y.querySelector(".datepicker__month-button--next").click();})  ;
    x=document.getElementById("month-1-demo17");
    x.querySelector(".datepicker__month-button--prev").addEventListener("click", function(){y=document.getElementById("month-2-demo17");y.querySelector(".datepicker__month-button--prev").click();})  ;
    function getDateData(objectDate){let day = objectDate.getDate();let month = objectDate.getMonth()+1;let year = objectDate.getFullYear();if (day < 10) {day = '0' + day;}if (month < 10) {month = `0${month}`;}format1 = `${year}-${month}-${day}`;return  format1 ;}  
</script>
@stop 
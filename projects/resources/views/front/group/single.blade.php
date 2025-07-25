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
        $name=$data->title;
        $bannerImage='https://ga4prozbj7-flywheel.netdna-ssl.com/wp-content/themes/aspenhomes/dist/images/trees-bg-600x350.jpg';
        if($data->image){
            $bannerImage=asset($data->image);
        }
    @endphp

    @include("front.layouts.banner")




<section class="ajblog blog-details">
    <div class="site-content">
    <div class="container">
        <div class="row">
            <div class="content-area" id="primary">
                <div class="main-content">
                  
                    <div class="pura-grid-wrapper default">
                         <div class="testy">
						<div class="owl-carousel" id="test-slider">
                         @php
                          $list = App\Models\Blogs\BlogGallery::where("blog_id",$data->id)->orderBy("sorting","asc")->get();
                         @endphp 
                         @if($list)
                            @foreach($list as $c)
							<div class="item">
								<div class="test-card">
									<div class="top-text">
										<div class="user-icon">
											<img src="{{asset($c->image)}}" class="img-fluid" alt="{{asset($c->caption)}}">
										</div>
																				
									</div>
									
								</div>
							</div>
                            @endforeach
                          @endif
                          
							<div class="item">
								<div class="test-card">
									<div class="top-text">
										<div class="user-icon">
											<img src="{{asset($data->featureImage)}}" class="img-fluid" alt="{{$data->title}}">
										</div>
																				
									</div>
									
								</div>
							</div>
                          
                          
                            	
						</div>
					</div>
                       
                        <div class="post-title">
                            <h3 class="entry-title heading-font">
                                {{$data->title}}
                            </h3>
                        </div>
                        <div class="post-excerpt"><p>{!! $data->longDescription !!}</p></div>
                        
                      </div>
                    </div>
                  
                  
                       
                </div>
                
            
            <aside id="secondary"class="sidebar-right sidebar-blog-archive">
                <div class="inner-sidebar" itemscope="itemscope">
                    <section id="block-3" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                                <h4 class="wp-block-heading">Categories</h4>
                                <ul class="wp-block-categories-list wp-block-categories">
                                  
                                  @foreach(App\Models\Blogs\BlogCategory::orderBy("id","desc")->get() as $category)

                                    <li class="cat-item cat-item-16"><a href="{{ url('blogs/category/'.$category->seo_url) }}/">{{$category->title}} <span>({{ App\Models\Blogs\Blog::where("blog_category_id",$category->id)->count() }})</span></a> </li>

                                    @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <section id="block-4" class="widget widget_block d-none">
                            <div class="wp-block-group">
                                <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                                    <h4 class="wp-block-heading">Tags</h4>
                                    <p class="wp-block-tag-cloud">
                                        <a href=""
                                        class="tag-cloud-link tag-link-20 tag-link-position-1"
                                        
                                        aria-label="Festival (1 item)">Festival</a>
                                    <a href=""
                                        class="tag-cloud-link tag-link-21 tag-link-position-2"
                                       
                                        aria-label="Food (1 item)">Food</a> <a
                                        href=""
                                        class="tag-cloud-link tag-link-18 tag-link-position-3"
                                        style="font-size: 8pt;"
                                        aria-label="Hotel (1 item)">Hotel</a> <a
                                        href=""
                                        class="tag-cloud-link tag-link-19 tag-link-position-4"
                                        style="font-size: 8pt;"
                                        aria-label="Upcoming (1 item)">Upcoming</a>
                                    </p>
                                </div>
                            </div>
                        </section>
                  <hr/>
                        <section
                        id="block-7" class="widget widget_block">
                        <div class="wp-block-group"><div
                                class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained"><h4
                                    class="wp-block-heading">Latest
                                    Posts</h4>
                         			 <ul class="wp-block-latest-posts__list has-dates wp-block-latest-posts">
                                       @foreach(App\Models\Blogs\Blog::where("id","!=",$data->id)->orderBy("id","desc")->take(5)->get() as $b)
                                       @php $date=$b->publish_date; if($date){}else{$date=$b->created_at;} @endphp
                                       <li>
                                        
                                       <a class="latest-img" href="{{ url('blog/'.$b->seo_url) }}"> <img src="{{asset($b->featureImage)}}" alt="{{$b->title}}"></a>
                                           
                                         <div class="side-content">
                                            <h5><a class="wp-block-latest-posts__post-title" href="{{ url('blog/'.$b->seo_url) }}">
                                              {{$b->title}}</a></h5>
                                            <p>{{ date('d M Y',strtotime($data->created_at)) }}</p>
                                         </div>
                                       </li>
                                        @endforeach
                                     </ul>
                                </div>
                          </div>
                  </section>
                 
                    
              </div>
          </aside>
        </div>
   </div>
</div>
</section>

@stop
@section("css")
    @parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="https://mike-vr-1.webdesignvrvr.com/front/assets/bootstrap-5.3.0/dist/css/bootstrap.min.css?ver=2.0.0" rel="stylesheet"/>
<link rel="stylesheet" href="https://mike-vr-1.webdesignvrvr.com/front/assets/jquery-ui/jquery-ui.min.css?ver=2.0.0">
    <link rel="stylesheet" href="{{ asset('front')}}/css/blog.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/blog-responsive.css" />
@stop 
@section("js")
    @parent
<script src="https://mike-vr-1.webdesignvrvr.com/front/assets/jquery/jquery-3.7.0.min.js?ver=2.0.0"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://mike-vr-1.webdesignvrvr.com/front/assets/jquery-ui/jquery-ui.min.js?ver=2.0.0"></script>
    <script src="{{ asset('front')}}/js/blog.js" ></script>
<script>
   $('#test-slider').owlCarousel( {
  
          loop: true,
          items: 1,
          margin: 0,
          dots: false,
          nav: true,
          autoplay: true,
          autoplayTimeout:4000,
          smartSpeed: 550,
  
      navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
  
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 1
  
        },
  
        1170: {
  
          items: 1
  
        }
  
      }
  
    });

</script>
@stop
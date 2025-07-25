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
<!--@include("front.layouts.banner")-->

<!-- blog section -->

<section class="ajblog">
    <div class="site-content">
    <div class="container">
        <div class="row">
            <div class="head-sec text-center mb-4">
                <h2>Blog</h2>
            </div>
            <div class="content-area" id="primary">
                <div class="main-content">
                   @forelse($blogs as $b)
                   @php $date=$b->publish_date; if($date){}else{$date=$b->created_at;} @endphp
                    <div class="pura-grid-wrapper default">
                          <div class="b-img">
                           @if($b->featureImage)   
                            <img src="{{ asset($b->featureImage) }}" alt="{{ $b->title }}" >   
                            @endif
                         </div>
                       
                        <div class="post-title">
                            <h3 class="entry-title heading-font">
                                <a href="{{ url('blog/'.$b->seo_url) }}"> {{$b->title}}</a>
                            </h3>
                        </div>
                        <div class="post-excerpt"><p>{{ Str::limit($b->shortDescription,200)}}...</p></div>
                        <div class="post-footer"><div class="btn-readmore"> <a
                                    class="pura-button"
                                    href="{{ url('blog/'.$b->seo_url) }}">
                                    Read More 
                                </a></div><div class="post-meta"><div
                                    class="post-time"> <span>{{ date('d M Y',strtotime($data->created_at)) }}</span></div><div
                                    class="post-comment"> <span> 
                                     <i class='fa fa-comment-alt d-none'></i> 
                                    </span>
                          </div>
                          </div>
                      </div>
                    </div>
                  
                    @empty
        			 <div class="alert alert-danger">No any Blogs Found.</div>
                   @endforelse
                       
                </div>
                <div class="row">{{$blogs->links() }}</div>
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
                  <hr/>
                     <section id="block-8"
                        class="widget widget_block widget_media_image">
                        <figure class="wp-block-image size-full">
                           <a href="{{url('joshua-tree-1')}}"><img src="{{ $data->image }}" alt=""></a>
                         </figure>
                        </section>
              </div>
          </aside>
        </div>
    </div>
</div>
</section>

<section class="blog-wrapper d-none">
    <div class="container">
        <div class="home-blog-sec">
            <div class="row ">
                @forelse($blogs as $b)
                <div class=" col-10  offset-1 grid-item">
                    <div class="blog-page">
                        @php $date=$b->publish_date;
                        if($date){}else{$date=$b->created_at;} @endphp

                        @if($b->featureImage)
                        <div class="home-blog-image">
                            <img src="{{ asset($b->featureImage) }}"
                                alt="{{ $b->title }}">
                        </div>
                        @endif
                        <div class="blog-content">
                            <h4><a href="{{ url('blog/'.$b->seo_url) }}/">
                                    {{$b->title}} </a></h4>
                            <h6 class="blog-feat">
                                <span class="blog-date"><i
                                        class="far fa-calendar-alt"></i>&nbsp;
                                    {{date('d-F-Y',strtotime($date))}}</span>
                                @php
                                $category=App\Models\Blogs\BlogCategory::where("id",$b->blog_category_id)->first();
                                @endphp

                                @if($category)

                                <span class="blog-date"><i
                                        class="fas fa-list"></i>&nbsp;<a
                                        href="{{ url('blogs/category/'.$category->seo_url) }}/">{{$category->title}}</a></span>
                                @endif

                            </h6>
                            <p> {{ Str::limit($b->shortDescription,100)}}</p>
                            <a href="{{ url('blog/'.$b->seo_url) }}/"
                                class="main-btn">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                @empty

                <div class="alert alert-danger">No any Blogs Found.</div>

                @endforelse

            </div>

            <div class="row">{{$blogs->links() }}</div>
        </div>
    </div>
</section>

{!! $data->seo_section !!}
@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/blog.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/blog-responsive.css" />
@stop
@section("js")
@parent
<script src="{{ asset('front')}}/js/blog.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
<script>
  // external js: masonry.pkgd.js, imagesloaded.pkgd.js

  // init Masonry
  var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    columnWidth: '.grid-sizer'
  });
  // layout Masonry after each image loads
  $grid.imagesLoaded().progress(function() {
    $grid.masonry();
  });
</script>

@stop
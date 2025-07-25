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

    <section class="c-gallery">

        <div class="container">

            <div class="row" id="gallery-all">
@foreach(App\Models\HomeGallery::orderByRaw('ISNULL(ordering), ordering ASC')->get() as $c)
                <div class="col-md-4 mb-md-4">
                    <div class="gallery-box">
                        <a href="{{asset($c->image)}}" data-fancybox="images">
                            <img src="{{asset($c->image)}}" alt="">
                         </a>
                    </div>
                </div>
@endforeach
            </div>
        <!--  <div class="gallery-btn text-center mt-5">
                    <a href="javascript:void(0)" class="main-btn gallery-btn" id="loadMore">View More Photos</a>
          </div> -->

        </div>

    </section>
{!! $data->seo_section !!}

@stop

@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/gallery.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/gallery-responsive.css" />
@stop 
@section("js")
    @parent
     <script src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js" ></script>
    <script src="{{ asset('front')}}/js/gallery.js" ></script>
<script>
let page = 2; 

$(document).on('click', '#loadMore', function () {
    galleryAjax(page);
    page++;
});

function galleryAjax(pageNumber) {
    $.ajax({
        url: "{{ route('get-home-gallery-ajax') }}",
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
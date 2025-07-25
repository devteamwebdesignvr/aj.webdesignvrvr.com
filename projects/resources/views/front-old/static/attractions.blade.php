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
    <!-- start banner sec -->
  
    <section class="breadcrumb" style="background-image: url({{ $bannerImage }});">
        <div class="auto-container">
            <h2 data-aos="zoom-in" data-aos-duration="1500">{{$name}}</h2>
            <ul class="page-breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>/ {{$name}}</li>
            </ul>
        </div>
    </section>
 @php
  $list=App\Models\Attraction::orderBy("ordering","asc")->paginate(10);
  @endphp
 
  <section class="memory-section">
       <div class="container">
         @php $i=1; @endphp
              @foreach($list as $c)
              @if($i%2==0)
          <div class="row align-items-center rev">
             <div class="left-pull left-content">
                <div class="memory-item"  data-aos="zoom-in-right" data-aos-duration="1500">
                   <div class="memory-content">
                      <!-- <span>Attraction</span> -->
                      <h2>{{$c->name}}</h2>
                      <p>{{$c->description}}</p>
                   </div>
                </div>
                <div class="dot-image">
                   <img src="{{ asset('front') }}/images/dot-shape.png" alt="{{$c->name}}">
                </div>
             </div>
             <div class="left-pull right-img full-size-img">
                <div class="memory-image">
                   <img src="{{asset($c->image)}}" alt="{{$c->name}}" class="img-fluid" data-aos="zoom-in-left" data-aos-duration="1500">
                </div>
             </div>
          </div>
          @else
          <div class="row align-items-center">
               <div class="left-pull right-img">
                  <div class="memory-image imglt">
                     <img src="{{asset($c->image)}}" alt="{{$c->name}}"  class="img-fluid" data-aos="zoom-in-right" data-aos-duration="1500">
                  </div>
               </div>
               <div class="left-pull left-content">
                  <div class="memory-item trial"  data-aos="zoom-in-left" data-aos-duration="1500">
                     <div class="memory-content" >
                        <!-- <span>Attraction</span> -->
                        <h2>{{$c->name}}</h2>
                        <p style="">{{$c->description}}</p>
                     </div>
                  </div>
                  <div class="dot-image-right">
                     <img src="{{ asset('front') }}/images/dot-shape.png" alt="{{$c->name}}" style="right: -12px;">
                  </div>
               </div>
            </div>
            @endif
            @php $i++; @endphp
            @endforeach

            <div class="row align-items-center">
               {{ $list->links()}}
            </div>
       </div>
    </section>
{!! $data->seo_section !!}

@stop
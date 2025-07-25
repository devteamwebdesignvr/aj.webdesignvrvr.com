@foreach($gallery as $c)
 <div class="gall-img-wrapper col-lg-4 col-md-4 col-12">
    <div class="gall-img">
    <a href="{{asset($c->image)}}" data-fancybox="images">
        <img src="{{asset($c->image)}}" alt="gallery">
    </a>
    </div>
 </div>
@endforeach  
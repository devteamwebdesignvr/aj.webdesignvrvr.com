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
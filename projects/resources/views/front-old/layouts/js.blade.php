<!-- Bootstrao 5 cdn js -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<!-- main js -->
<script type="text/javascript" src="{{ asset('front') }}/js/main.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="{{ asset('front') }}/js/functions.js"></script>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="{{ asset('toastr/toastr.js') }}"></script>
<script>
$('#reload').click(function () {
    $.ajax({
        type: 'GET',
        url: "{{ url('reload-captcha')}}",
        success: function (data) {
            $(".captcha span").html(data.captcha);
        }
    });
});
</script>
<script>
$(document).ready(function(){
  $("#menu-toggle1").click(function(){
    $("#tag1").css("transform", "translateX(0em)");
  });
  $("#close-menu1").click(function(){
    $("#tag1").css("transform", "translateX(-38em)");
  });
});
          AOS.init();
$(document).ready(function () {
  $('.testiSlide').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
     // dots:true,
     prevArrow: '<button class="slick-prev slick-arrow"></button>',
    nextArrow: '<button class="slick-next slick-arrow"></button>',
    autoplaySpeed: 8000,
    responsive: [{
      breakpoint: 850,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    }]
  });
});

$(document).ready(function(){


    @if(Session::has("success"))
        toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has("danger"))
        toastr.error("{{ Session::get('danger') }}");
    @endif


});

$(document).ready(function(){
  $(".gst").click(function(){
    $("#guestsss").css("display", "block");
  });
   $(".close1").click(function(){
    $("#guestsss").css("display", "none");
  });
});

     function playVideo() {
            $('#mob').trigger('play');
        }
        function pauseVideo() {
            $('#mob').trigger('pause');
        }
        
        $(document).ready(function(){
  $("#pause").click(function(){
    $("#play").css("display", "block");
     $("#pause").css("display", "none");
  });
  $("#play").click(function(){
    $("#pause").css("display", "block");
     $("#play").css("display", "none");
  });
});

 $(document).ready(function(){
  $("#more").click(function(){
    $("#less>a").css("display", "block");
    $("#more").css("display", "none");
    $(".para-section").css("height", "auto");
     $(".blog-para").css("height", "auto");
  });
  
  $("#less").click(function(){
    $("#less>a").css("display", "none");
    $("#more").css("display", "block");
    $(".para-section").css("height", "250px");
     $(".blog-para").css("height", "506px");
  });
});
</script>


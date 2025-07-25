<script src="{{ asset('front') }}/assets/jquery/jquery-3.7.0.min.js"></script>
<script src="{{ asset('front') }}/assets/bootstrap-5.3.0/dist/js/bootstrap.bundle.min.js" ></script>
<script src="{{ asset('front') }}/assets/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ asset('front') }}/js/main.js"></script>
<script src="{{ asset('toastr/toastr.js') }}"></script>
<script src="https://player.vimeo.com/api/player.js"></script>  
<script>
$(function(){
    $("#sygnius-loader").addClass("d-none");
});
$(document).ready(function(){
    
    @if(Session::has("success"))
        toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has("danger"))
        toastr.error("{{ Session::get('danger') }}");
    @endif
});
$('#reload').click(function () {$.ajax({type: 'GET',url: "{{ url('reload-captcha')}}",success: function (data) {$(".captcha span").html(data.captcha);}});});
$(document).ready(function(){
  $("#menu-toggle1").click(function(){
    $("#tag1").css("transform", "translateX(0em)");
  });
  $("#close-menu1").click(function(){
    $("#tag1").css("transform", "translateX(-47em)");
  });

});
  
  
  
         $(document).ready(function(){
  $(".navi-main-menu-button-wrapper").click(function(){

      if($(this).hasClass("navi-menu-active")){
    $(".navbar").removeClass("activee");
        $(this).removeClass("navi-menu-active");
      }else{
        $(".navbar").addClass("activee");
        $(this).addClass("navi-menu-active");
      }
  });

});  
      
const header = document.querySelector(".new-header");
const toggleClass = "is-sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll > 400) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});
  
</script>
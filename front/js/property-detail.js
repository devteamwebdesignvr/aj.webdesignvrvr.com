$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
$(document).on("click",".read-more",function(){
    $(".des").css("height", "auto");
     $(".read-more").html("Read Less");
     $(".read-more").addClass("read-less");
     $(".read-more").removeClass("read-more");
  });
  
    $(document).on("click",".read-less",function(){
    $(".des").css("height", "292px");
     $(".read-less").html("Read More");
     $(".read-less").addClass("read-more");
     $(".read-less").removeClass("read-less");
  });
  
  $(document).ready(function(){
   var a = $(".des").height();
   if(a < 292){
$(".read-more").css("display", "none");
}
else{
    $(".read-more").css("display", "block");
    $(".des").css("height", "292px");
}
  });
  
  $(document).on("click",".amn-more",function(){
    $(".amn").css("height", "auto");
     $(".amn-more").html("Read Less");
     $(".amn-more").addClass("amn-less");
     $(".amn-more").removeClass("amn-more");
  });
  
    $(document).on("click",".amn-less",function(){
    $(".amn").css("height", "322px");
     $(".amn-less").html("Read More");
     $(".amn-less").addClass("amn-more");
     $(".amn-less").removeClass("amn-less");
  });
  
  $(document).ready(function(){
   var b = $(".amn").height();
   if(b < 322){
$(".amn-more").css("display", "none");
}
else{
    $(".amn-more").css("display", "block");
    $(".amn").css("height", "322px");
}
  });


$(document).on("click",".policy-space",function(){
    $(".space").css("height", "auto");
     $(".policy-space").html("Read Less");
     $(".policy-space").addClass("space-less");
     $(".policy-space").removeClass("policy-space");
  });
  
    $(document).on("click",".space-less",function(){
    $(".space").css("height", "340px");
     $(".space-less").html("Read More");
     $(".space-less").addClass("policy-space");
     $(".space-less").removeClass("space-less");
  });
  
  $(document).ready(function(){
   var c = $(".space").height();
   if(c < 340){
$(".policy-space").css("display", "none");
}
else{
    $(".policy-space").css("display", "block");
    $(".space").css("height", "340px");
}
  });
  
  $(document).on("click",".policy-access",function(){
    $(".access").css("height", "auto");
     $(".policy-access").html("Read Less");
     $(".policy-access").addClass("access-less");
     $(".policy-access").removeClass("policy-access");
  });
  
    $(document).on("click",".access-less",function(){
    $(".access").css("height", "322px");
     $(".access-less").html("Read More");
     $(".access-less").addClass("policy-access");
     $(".access-less").removeClass("access-less");
  });
  
  $(document).ready(function(){
   var d = $(".access").height();
   if(d < 322){
$(".policy-access").css("display", "none");
}
else{
    $(".policy-access").css("display", "block");
    $(".access").css("height", "322px");
}
  });
  
  
  
  
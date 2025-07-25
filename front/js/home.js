
$(document).ready(function(){
    setTimeout(function(){$("#gaurav-data-ram").click();},5000);
});



$(document).ready(function($) {
        
    $('#testimonial-home').owlCarousel( {
    
       loop: true,
    
        items: 6,
    
        margin: 0,
    
        autoplay: true,
    
        dots:false,
    
        nav:false,
    
        autoplayTimeout: 4000,
    
        smartSpeed: 550,
    
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    
        responsive: {
    
          0: {
    
            items: 2
    
          },
    
          768: {
    
            items: 4
    
          },
    
          1170: {
    
            items: 6
    
          }
    
        }
    
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



$(document).ready(function($) {
        
  $('#test-slider').owlCarousel( {
  
     loop: true,
  
      items: 3,
  
      margin: 20,
  
      autoplay: true,
  
      dots: true,
  
      nav: true,
  
      autoplayTimeout: 4000,
  
      smartSpeed: 550,
  
      // navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
  
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 2
  
        },
  
        1170: {
  
          items: 3
  
        }
  
      }
  
    });
// testimonials slider
    // setInterval(function(){
    //   var owlCarouselActive = $("#test-slider .owl-item.active");
    //   var first = owlCarouselActive[0]; //get first item
    //   var last = owlCarouselActive[owlCarouselActive.length - 1]; //get last item
     
    //   first.style.transform = "scale(1)";
    //   last.style.transform = "scale(0.8)";
  
  
    // },100);
    



  });


  
$(document).ready(function($) {
        
  $('#prop-slider').owlCarousel( {
  
     loop: true,
  
      items: 3,
  
      margin: 20,
  
      autoplay: false,
  
      dots: true,
  
      nav: true,
  
      autoplayTimeout: 4000,
  
      smartSpeed: 550,
  
      navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
  
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 2
  
        },
  
        1170: {
  
          items: 3
  
        }
  
      }
  
    });
$('#studio-slider').owlCarousel( {
  
          loop: true,
          items: 3,
          margin: 20,
          dots: false,
          stagePadding: 20,
          nav: true,
          autoplay: false,
          autoplayTimeout:5000,
          smartSpeed: 550,
  
      navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
  
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 2
  
        },
  
        1170: {
  
          items: 3
  
        }
  
      }
  });
$('#gallery-slider').owlCarousel( {
  
          loop: true,
          items: 3,
          margin: 0,
          dots: false,
          stagePadding: 80,
          nav: true,
          autoplay: false,
          autoplayTimeout:5000,
          smartSpeed: 550,
  
      navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
  
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 2
  
        },
  
        1170: {
  
          items: 3
  
        }
  
      }
  });

  });
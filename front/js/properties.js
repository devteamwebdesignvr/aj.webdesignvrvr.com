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
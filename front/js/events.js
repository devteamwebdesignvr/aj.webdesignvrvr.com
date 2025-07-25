$('#service-slider').owlCarousel( {
  
          loop: true,
          items: 1,
          margin: 0,
          dots: false,
          nav: true,
          autoplay: true,
          autoplayTimeout:3000,
          smartSpeed: 350,
          animateIn: 'fadeIn', 
  animateOut: 'fadeOut',
  
      navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
  
      responsive: {
  
        0: {
  
          items: 1
  
        },
  
        768: {
  
          items: 1
  
        },
  
        1170: {
  
          items: 1
  
        }
  
      }
  });

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
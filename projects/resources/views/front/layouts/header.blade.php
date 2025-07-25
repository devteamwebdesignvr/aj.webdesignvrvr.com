<div class="loader-head " id="sygnius-loader">
    <div class="loader">
    	 <img src="{{ asset($setting_data['header_logo'] ?? 'front/images/lg_white.webp') }}" alt="Logo" class="img-fluid logo-loader">
    	<img src="{{ asset('front')}}/images/scroll-loader1.gif" alt="">
    	<p>Please wait..</p>
    </div>
</div>


   <header class="new-header desk ">
        <div class="container-fluid">
          <div class="row">
            <div class="col-4">
              <a href="{{ url('/') }}" class="logo">
                <!--<img src="{{ asset($setting_data['header_logo'] ?? 'front/images/lg_white.webp') }}" alt="Logo"
                  class="img-fluid white_logo">-->
                <!-- <img
                  src="{{ asset($setting_data['header_logo'] ?? 'front/images/lg_white.webp') }}"
                  alt="Logo" class="img-fluid normal_logo "> -->
                  <img src="front/images/aj-balck-img.png" alt="" class="img-fluid normal_logo ">
              </a>

            </div>
            <div class="col-8">
              <div class="side-menu">
                <div class="contact">
                 
					<a href="{{ url('production') }}" class="btmvd-btn main-btn"
						>Production</a>
                	<a href="{{ url('services') }}" class="btmvd-btn main-btn"
						>Event</a>
                  <a href="{{ url('joshua-tree-1') }}" class="main-btn"><span>Book Now</span></a>
				  <!--<i class="fa-solid fa-magnifying-glass"></i>-->
                  
				</div>
                <div class="navi-main-menu-button-wrapper">
                  <div class="navi-main-menu-button">
                    <div class="navi-main-menu-button-middle"></div>
                  </div>
                </div>
                <div class="footer-about-social-list d-none">
                  <a href="{!! $setting_data['instagram'] ?? '#' !!}"
                    target="_blank" rel="noopener"><i
                      class="fa-brands fa-instagram"></i></a>
                  <a href="{!! $setting_data['facebook'] ?? '#' !!}"
                    target="_blank" rel="noopener"><i
                      class="fa-brands fa-facebook-f"></i></a>
                  <a href="tel:{!! $setting_data['mobile'] ?? '#' !!}"
                    target="_blank" rel="noopener"><i
                      class="fa-solid fa-mobile-button"></i></a>
                  <a href="mailto:{!! $setting_data['email'] ?? '#' !!}"
                    target="_blank" rel="noopener"><i
                      class="fa-solid fa-envelope-open"></i></a>
                </div>
                <nav class="navbar navbar-dark menu-nav"
                  aria-label="Dark offcanvas navbar">

                  <ul class="menu-bar">
                    <div class="menu-bar-logo">
                      <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset($setting_data['header_logo'] ?? 'front/images/lg_white.webp') }}"
                          alt="Logo" class="img-fluid">
                      </a>
                    </div>
                    <li class="nav-item"><a class="nav-link active"
                        href="{{ url('/') }}">Home </a> </li>
                  
              
    				 <li class="nav-item dropdown">
     				 <a class="nav-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Properties</a>
      				  <ul class="dropdown-menu">
        			    <li><a class="dropdown-item" href="{{ url('joshua-tree-1') }}?location_id=17">Joshua Tree, CA</a></li>
      				  </ul>

                    <li class="nav-item"><a class="nav-link "
                        href="{{ url('services') }}">Events</a></li>
               
                  
                    
                     <li class="nav-item d-none"><a class="nav-link"  href="{{ url('adu-for-sale') }}">Adu for sale</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('host-an-event') }}">Host an Events</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('production') }}"> production </a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('blogs') }}"> blogs </a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('contact-us') }}"> Contact </a></li>

                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>





<!--
<header class="page-header desk">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 logo-sec">
                <a href="{{ url('/') }}" class="logo preScale scaleIn">
                    <img src="{{ asset($setting_data['header_logo'] ?? 'front/images/lg_white.webp') }}" alt="Logo" class="img-fluid">
                </a>
            </div>
            <div class="col-4 header-nav">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="main_nav">
  <ul class="navbar-nav">
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Properties</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('joshua-tree-1') }}">Joshua Tree, CA</a></li>
        </ul>
                                </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('services') }}">Events</a>
    </li>
   
            <li class="nav-item"><a class="nav-link"  href="{{ url('adu-for-sale') }}">Adu for sale</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('host-an-event') }}">Host an Event</a></li>
    
    <li class="nav-item"><a class="nav-link" href="{{ url('contact-us') }}"> Contact </a></li>
  </ul>
 
    </div>
        </nav>
            </div>
            <div class="col-4 header-right">
               <ul class="social-bar">
                    <li><a href="{!! $setting_data['instagram'] ?? '#' !!}" target="_BLANK"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="{!! $setting_data['youtube'] ?? '#' !!}" target="_BLANK"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="{!! $setting_data['tiktok'] ?? '#' !!}" target="_BLANK"><i class="fa-brands fa-tiktok"></i></a></li>
                    <li><a href="{!! $setting_data['facebook'] ?? '#' !!}" target="_BLANK"><i class="fab fa-facebook-f"></i></a></li>     
              </ul> 
              <ul class="book-now-btn">
                    <li><a href="{{ url('joshua-tree-1#property-list-data') }}" class="main-btn" target="_BLANK">Book Now</a></li>
              </ul>
            </div>
        </div>
    </div>
</header> -->

<header class="page-header mob">
	<div class="container">
		<div class="row">
    <div class="top-bar">
          <div class="mobl-logo">
			     <a  href href="{{ url('/') }}" class="logo">
			      <img src="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" alt="Logo" class="img-fluid">
			       </a>
      
            </div>
          	
			<div class="menu-toggle1" id="menu-toggle1"><i class="fa fa-bars"></i></div>
    </div>
			<div class="menu-bar-in" id="tag1">
				<div class="mobile-nav">
					<div class="mobile-menu-logo">
						<a  href href="{{ url('/') }}" class="logo">
						<img src="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" alt="Logo" class="img-fluid">
						</a>
						<span id="close-menu"><i class="fa fa-times" id="close-menu1"></i></span>
					</div>
					<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
						<div class="navbar-collapse" id="main_nav">
							<ul class="navbar-nav">
						 <li class="nav-item"><a class="nav-link active"
                        href="{{ url('/') }}">Home </a> </li>
                  
              
    				 <li class="nav-item dropdown">
     				 <a class="nav-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Properties</a>
      				  <ul class="dropdown-menu">
        			    <li><a class="dropdown-item" href="{{ url('joshua-tree-1') }}?location_id=17">Joshua Tree, CA</a></li>
      				  </ul>

                    <li class="nav-item"><a class="nav-link "
                        href="{{ url('services') }}">Events</a></li>
               
                  
                    
                     <li class="nav-item"><a class="nav-link"  href="{{ url('adu-for-sale') }}">Adu for sale</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ url('host-an-event') }}">Host an Events</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('production') }}"> production </a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('blogs') }}"> blogs </a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('contact-us') }}"> Contact </a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

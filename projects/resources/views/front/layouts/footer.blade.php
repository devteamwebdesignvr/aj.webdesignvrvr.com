
                <footer class="footer">

                    <div class="container">

                        <div class="row">

                            <div class="col-3 info">

                                <div class="info-content">

                                    <div class="footer-logo">

                                        <a href="{{ url('/') }}">

                                            <img src="{{ asset($setting_data['footer_logo'] ?? 'front/images/logo.png') }}" alt="Logo">

                                        </a>

                                    </div>

                                    <p>{{ $setting_data['about'] ?? '' }}</p>

                                    <!-- <div class="certificate">

                                        <img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fcertificate1.png&w=96&q=75" alt="Certificate">

                                        <img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fcertificate2.png&w=96&q=75" alt="Certificate">

                                    </div>-->

                                    <span>{{ $setting_data['copyright'] ?? '' }}</span>

                                </div>

                            </div>

                            <div class="col-9 other-details">

                                <div class="row footer-details">

                                    <div class="col-4 quick-links">

                                        <h5>QUICK LINKS</h5>

                                        <ul class="footer-links">

                                            <li><a href="{{url('/')}}">Home</a></li>
                                          
                                          <li class="nav-item dropdown">
     				 <a class="nav-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Properties</a>
      				  <ul class="dropdown-menu">
        			    <li><a class="dropdown-item" href="{{ url('joshua-tree-1') }}">Joshua Tree, CA</a></li>
      				  </ul>

                    </li>

                                            <li><a href="{{url('services')}}">Events</a></li>

                                            <li class="d-none"><a href="{{url('adu-for-sale')}}">Adu For Sale</a></li>

                                            <li><a href="{{url('host-an-event')}}">Host An Events</a></li>
                                          
                                              <li><a href="{{url('production')}}">Production</a></li>
                                          
                                            <li><a href="{{url('blogs')}}">Blogs</a></li>
                                          
                                            <li><a href="{{url('contact-us')}}">Contact</a></li>

                                        </ul>

                                    </div>

                                   <div class="col-4 destinations">

                                        <h5>CONTACT US</h5>

                                        <ul class="footer-links">

                                            <li><a href="mailto:{{ $setting_data['email'] ?? '' }}"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Femail.png&w=32&q=75"
                                                        alt="Mail">  {{ $setting_data['email'] ?? '' }}</a></li>

                                            <li><a href="{{ $setting_data['whatsapp'] ?? '#' }}"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fwhatsapp.png&w=32&q=75" alt="Whatsapp">WhatsApp</a>

                                            </li>

                                            <li><a href="tel:{{ $setting_data['mobile'] ?? '' }}"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fphone.png&w=32&q=75"
                                                        alt="Tel">  {{ $setting_data['mobile'] ?? '' }}</a></li>

                                          <li><a href="tel:{{ $setting_data['mobile1'] ?? '' }}"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fphone.png&w=32&q=75"
                                                        alt="Tel">  {{ $setting_data['mobile1'] ?? '' }}</a></li>

                                        </ul>

                                    </div>

                                    <div class="col-4 newsletter">

                                        <h5>{{ $setting_data['newsletter_heading'] ?? '' }}</h5>

                                        <p>{{ $setting_data['newsletter_description'] ?? '' }}</p>

                                        <form action="{{ url('newsletter-post') }}" method="POST">
@csrf
                                            <input type="email" name="email" placeholder="Email address*">

                                            <button class="main-btn"><i class="fa-solid fa-arrow-right"></i></button>

                                        </form>

                                    </div>

                                    <div class="col-4 contact-us d-none">

                                        <!--<h5>CONTACT US</h5>

                                        <ul class="footer-links">

                                            <li><a href="#"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Femail.png&w=32&q=75"
                                                        alt="Mail">hello@sas.com</a></li>

                                            <li><a href="#"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fwhatsapp.png&w=32&q=75" alt="Whatsapp">WhatsApp</a>

                                            </li>

                                            <li><a href="#"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fphone.png&w=32&q=75"
                                                        alt="Tel">+1-123-456-7890</a></li>

                                            <li><a href="#"><img src="https://zolazuniquehomes.com/_next/image?url=%2Fimages%2Fphone.png&w=32&q=75"
                                                        alt="Tel">+1-123-456-7890</a></li>

                                        </ul>-->

                                    </div>

                                    <div class="col-4 need-to-know d-none">

                                        <!--<h5>MORE</h5>

                                        <ul class="footer-links">

                                            <li><a href="#">Careers</a></li>

                                            <li><a href="#">Sustainability</a></li>

                                            <li><a href="#">Privacy policy</a></li>

                                            <li><a href="#">Terms and conditions</a></li>

                                        </ul>-->

                                    </div>

                                    <div class="col-4 social-links">

                                        <h5>FOLLOW US</h5>

                                        <ul class="social">

                                            <li><a href="{{ $setting_data['facebook'] ?? '#' }}"><i class="fa-brands fa-facebook-f"></i></a></li>

                                            <li><a href="{{ $setting_data['linkedin'] ?? '#' }}"><i class="fa-brands fa-linkedin-in"></i></a></li>

                                            <li><a href="{{ $setting_data['instagram'] ?? '#' }}"><i class="fa-brands fa-instagram"></i></a></li>

                                            <li><a href="{{ $setting_data['twitter'] ?? '#' }}"><svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                        width="16"
                                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->

                                                        <path
                                                            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />

                                                    </svg></a></li>

                                            <li><a href="{{ $setting_data['youtube'] ?? '#' }}"><i class="fa-brands fa-youtube"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!--<div class="message-box">

                            <a href="#"><i class="fa-solid fa-message"></i></a>

                        </div>-->

                    </div>

                </footer>

         









<!--<footer>
	<div class="container">
	  <div class="footer-logo">
		<a href="{{ url('/') }}" class="logo" data-aos="zoom-in">
		  <img src="{{ asset($setting_data['footer_logo'] ?? 'front/images/logo.png') }}" alt="Logo" class="img-fluid">
		</a>
	  </div>
	  <div class="row">
		<div class="col-4 first" data-aos="fade-up">
		  <h4> CONTACT INFO</h4>
		  <div class="footer-contact-info">
	<div class="add-cont">
		<h6> Name : AJ Martinez</h6>
		<p class="footer-contact-phone"><i class="fa-solid fa-mobile-button"></i><a href="">415-846-9393</a></p>
		<p class="footer-contact-mail"><i class="fa-solid fa-envelope-open"></i><a href="">aj@solandsantosha.com </a></p>
	</div>
	<div class="add-cont">
		<h6> Name : ROBERT MORENO</h6>
		<p class="footer-contact-phone"><i class="fa-solid fa-mobile-button"></i><a href="">760-501-6938 </a></p>
		<p class="footer-contact-mail"><i class="fa-solid fa-envelope-open"></i><a href="">ROBERT@solandsantosha.com </a></p>
	</div>
	<div class="add-cont">
		<h6> Name : Luke Denuccio </h6>
		<p class="footer-contact-phone"><i class="fa-solid fa-mobile-button"></i><a href="">650-740-0584 </a></p>
		<p class="footer-contact-mail"><i class="fa-solid fa-envelope-open"></i><a href="">luke@solandsantosha.com </a></p>
	</div>
			
		</div>
		</div>
		<div class="col-4 quick" data-aos="fade-up">
		  <ul class="quick-links">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('joshua-tree-1') }}">Joshua Tree, CA</a></li>
			<li><a href="{{ url('services') }}">Events</a></li>
			<li><a href="{{ url('adu-for-sale') }}">Adu for sale</a></li>
			<li><a href="{{ url('host-an-event') }}">Host an Event</a></li>
			<li><a href="{{ url('contact-us') }}">Contact</a></li>
		  </ul>
		
		</div>
		<div class="col-4 get" data-aos="fade-up">
		  <h4>Join the club</h4>
		  <p>Sign up with your email address to receive news and updates.</p>
		  <form method="POST" action="" accept-charset="UTF-8" class="newsletter-data">
		  <input type="email" placeholder="Email Address" name="email" required="">
		  <button type="submit" class="main-btn">Sign Up</button>
		  </form>
		</div>
	  </div>
	</div>
	<div class="copyright">
	  <div class="container">
		<div class="row">
		  <div class="col-4 left">
			<p >{!! $setting_data['copyright'] !!}</p>
		  </div>
		  <div class="col-4 right">
			<div class="footer-about-social-list" >
			  <a href="{{ $setting_data['instagram'] ?? '#' }}" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
			  <a href="{{ $setting_data['youtube'] ?? '#' }}" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a>
			  <a href="{{ $setting_data['tiktok']  ?? '#' }}" target="_blank" rel="noopener"><i class="fa-brands fa-tiktok"></i></a>
			  <a href="{{ $setting_data['facebook'] ?? '#' }}" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
			</div>
		  </div>
		  <div class="col-4 right_copyright">
						  <p>Designed &amp; Developed by <a href="#" data-href="https://www.webdesignvr.com/" target="_blank"><img src="{{ asset('front')}}/images/footer_1.webp"></a></p>
					  </div>
		</div>
	  </div>
  
	</div>
  </footer>-->
  @include("front.layouts.js")
  @yield("js")
  <script>
	$(document).on("submit", ".newsletter-data", function(e) {
	  e.preventDefault();
	  data = $(this).serialize();
	  url = $(this).attr("action");
	  $.post(url, data, function(data) {
		if (data.status == 200) {
		  $(".newsletter-data")[0].reset();
		  toastr.success(data.message);
		} else {
		  toastr.error(data.message);
		}
	  });
	});
  </script>
<footer>
    <div class="footer_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 first">
                <div class="footer_box">
                    <div class="footer_logo">
                        <img src="{{ asset('front')}}/images/logo.png" class="img-fluid" alt="logo" />
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer_box">
                    <div class="footer_links">
                        <h4>Quick Links</h4>
                        <ul class="footer_link">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('about-us') }}">About</a></li>
                            <li><a href="{{ url('properties') }}">Vacation Rentals</a></li>
                            <li><a href="{{ url('attractions') }}">Attractions</a></li>
                            <li><a href="{{ url('blog') }}">Blogs</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer_box">
                    <div class="footer_links">
                        <h4>Get in touch</h4>
                        <ul class="footer_link">
                            <li><i class="fa-solid fa-location-dot"></i> {!! $setting_data['address'] ?? '#' !!}</li>
                            <li><a href="tel:{!! $setting_data['mobile'] ?? '#' !!}"><i class="fa-solid fa-phone"></i> {!! $setting_data['mobile'] ?? '#' !!}</a></li>
                            <li><a href="mailto:{!! $setting_data['email'] ?? '#' !!}"><i class="fa-solid fa-envelope"></i> {!! $setting_data['email'] ?? '#' !!}</a></li>
                        </ul>
                        <div class="social_icon">
                            <ul>
                                <li><a href="{!! $setting_data['instagram'] ?? '#' !!}" target="_BLANK"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="{!! $setting_data['facebook'] ?? '#' !!}" target="_BLANK"><i class="fa-brands fa-facebook-f"></i></a></li>        
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left_copyright">
                        <p>{!! $setting_data['copyright'] ?? '#' !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right_copyright">
                        <p>Designed & Developed by <a href="https://www.webdesignvr.com/" target="_blank"><img src="{{ asset('front')}}/images/footer_1.png"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="educate-modal-main">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="gaurav-data-ram" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" style="z-index:99999;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
      <div class="modal-education">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-padd">
              <div class="modal-edu-con">
               <div class="close-bttn"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
               <h5>Scroll down to check our Properties</h5>
               

              </div>
            </div>
         </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>  
</footer>

     
@include("front.layouts.js")
@yield("js")
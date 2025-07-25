
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('front')}}/images/logo.png" class="img-fluid" alt="logo" />
     
            </a>
            <div class="menu-bar-in d-lg-none d-block">
       
                <div class="menu-toggle1" id="menu-toggle1" ><i class="fa fa-bars" ></i></div>
            </div>


            <div class="menu-bar-in" id="tag1">
                <div class="mobile-menu-logo d-lg-none d-block">
                    <a href="{{ url('/') }}"><img src="{{ asset('front')}}/images/logo.png" width="150"></a>
                    <span id="close-menu"><i class="fa fa-times" id="close-menu1"></i></span>
                </div>
                <div class="connect-sec"><a href="tel:954-263-2995"><i class="fa-solid fa-phone"></i> 954-263-2995</a>
                <a href="mailto:info@floridakeysvillas.com"><i class="fa-solid fa-envelope"></i> info@floridakeysvillas.com</a></div>
                <ul class="main-menu-list-in navbar-nav menu-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about-us') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('properties') }}">Vacation Rentals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('attractions') }}">Attractions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('blog') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact-us') }}">Contact</a>
                    </li>
                </ul>
            </div>
      
        </div>
    </nav>
</header>
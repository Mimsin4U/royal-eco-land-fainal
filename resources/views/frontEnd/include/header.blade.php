<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>{{$company->address_one}}</li>
                    <li><i class="far fa-phone"></i>{{$company->contact_number_one}}</li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="{{$company->fb_link}}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{$company->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{$company->linkedin_link}}"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="https://wa.me/{{$company->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
                <div class="sign-box">
                    @if(Auth::guard('client')->check())
                    <a href="#" title="Logout" onclick="event.preventDefault();document.getElementById('client-log-out-form').submit();">
                        {{Str::limit(Auth::guard('client')->user()->name,8)}}
                    </a>
                    <form action="{{ route('client.signout') }}" method="post" id="client-log-out-form">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('client.signin') }}"><i class="fas fa-user"></i>Sign In</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="large-container">
            <div class="outer-box ">
                <div class="main-box">
                    <div class="logo-box">
                        <figure class="logo"><a href="{{ url('/') }}">
                                <img src="{{ asset('/') }}{{$company->logo_png}}" alt="royel_eco_land_logo" style="width: 140px"></a></figure>
                    </div>
                    <div class="menu-area clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current dropdown">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li><a href="{{route('plot.category')}}"><span>Plot Categories</span></a></li>
                                    <li><a href="{{ route('about') }}"><span>About Us</span></a></li>
                                    <li><a href="{{route('gallery')}}"><span>Gallery</span></a></li>
                                    {{-- <li ><a href="{{route('site.map')}}"><span> Site Map</span></a></li> --}}
                                    <li><a href="{{route('contact')}}"><span> Contact Us</span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="large-container">
            <div class="outer-box">
                <div class="main-box">
                    <div class="logo-box">
                        <figure class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('/') }}{{$company->logo_png}}" style="width: 140px" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="menu-area clearfix">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo">
            <a href="index.html"><img src="{{ asset('frontEndAsset') }}/assets/images/logo.png" alt=""></a>
        </div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="btn-box mt-3 ml-4">
            <a href="{{ route('client.signup') }}" class="theme-btn btn-two"><span>SignIn/SignUp</span></a>
        </div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                <li><a href="#"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->

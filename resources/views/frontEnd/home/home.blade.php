@extends('frontEnd.master')
@section('content')
    <!-- banner-style-two -->
    <section class="banner-style-two centred">
        <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
            @foreach ($sliders as $slider)
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url({{ asset('/') }}{{ $slider->image }});"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>{{ $slider->title_one }}</h2>
                            <p>{{ $slider->title_two }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- banner-style-two end -->

    <section class="about-wrap1 motion-effects-wrap">
        <div class="shape-img1">
            <img src="{{ asset('frontEndAsset') }}/assets/images/svg/video-bg-2.svg" alt="shape" width="455"
                height="516">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-box1 wow fadeInLeft" data-wow-delay=".3s">
                        <div class="">
                            <div class="motion-effects1">
                                <img src="{{ asset('frontEndAsset') }}/assets/images/figure/shape7.png" alt="shape"
                                    width="95" height="87">
                            </div>
                            <div class="motion-effects2">
                                <img src="{{ asset('frontEndAsset') }}/assets/images/figure/shape8.png" alt="shape"
                                    width="90" height="46">
                            </div>
                        </div>
                        <div class="item-img">
                            {{-- <video class="rounded" width="100%" height="100%" autoplay muted loop>
                                <source src="{{ asset('frontEndAsset') }}/assets/vedios/royal-eco-land.mp4"
                                    type="video/mp4">
                            </video> --}}
                            <video class="rounded" width="100%" height="100%" autoplay muted loop>
                                <source src="{{ asset('') }}{{$heroContent->vedio}}"
                                    type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-box2 wow fadeInRight" data-wow-delay=".5s">
                        <div class="item-heading-left mb-bottom">
                            <h3><span class="section-subtitle">Why Choose Our Properties</span></h3>
                            <h2 class="section-title mb-3">{{$heroContent->title}}</h2>
                            <div class="bg-title-wrap" style="display: block;">
                                <span class="background-title solid">Choose</span>
                            </div>
                        </div>
                        <p>
                            {{$heroContent->desc}}
                        </p>
                        <div class="about-list">
                            <ul>
                                <li><i class="fas fa-check"></i>Modern City Locations </li>
                                <li><i class="fas fa-check"></i>Specialist Broker </li>
                            </ul>
                        </div>
                        <div class="btn-box"><a href="{{route('about')}}" class="theme-btn btn-two">See Details</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-style-two py-3 bg-light">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Plot Categories</h2>
            </div>
            <div class="row">
                @foreach ($plotCategories as $plotCategory)
                    <div class="col-md-6 my-3">
                    <a href="{{route('plotCategoryDetails', $plotCategory->id)}}">
                        <div class="card h-100">
                            <div class="card-body shadow">
                                <div class="position-relative h-100">
                                    <img class="w-100 h-100" src="{{ asset('/') }}{{$plotCategory->image}}" alt="">
                                    <div class="rel-category-over position-absolute w-100 shadow p-2 rounded"
                                        style="bottom: 0px; background-color:rgba(28, 145, 51, 0.737);">
                                        <h2 class="text-center text-uppercase text-white">{{$plotCategory->name}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                

                {{-- <div class="col-md-6 my-3">
                    <a href="">
                        <div class="card h-100">
                            <div class="card-body shadow">
                                <div class="position-relative  h-100">
                                    <img class="w-100 h-100" src="{{ asset('/') }}categories/c2.png" alt="">
                                    <div class="rel-category-over position-absolute w-100 shadow p-2 rounded"
                                        style="bottom: 0px; background-color:rgba(28, 145, 51, 0.737);">
                                        <h2 class="text-center text-uppercase text-white">Paradice Vally</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 my-3">
                    <a href="">
                        <div class="card h-100">
                            <div class="card-body shadow">
                                <div class="position-relative  h-100">
                                    <img class="w-100 h-100" src="{{ asset('/') }}categories/c3.png" alt="">
                                    <div class="rel-category-over position-absolute w-100 shadow p-2 rounded"
                                        style="bottom: 0px; background-color:rgba(28, 145, 51, 0.737);">
                                        <h2 class="text-center text-uppercase text-white">Vip Vally</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 my-3">
                    <a href="">
                        <div class="card h-100">
                            <div class="card-body shadow">
                                <div class="position-relative  h-100">
                                    <img class="w-100 h-100" src="{{ asset('/') }}categories/c4.png" alt="">
                                    <div class="rel-category-over position-absolute w-100 shadow p-2 rounded"
                                        style="bottom: 0px; background-color:rgba(28, 145, 51, 0.737);">
                                        <h2 class="text-center text-uppercase text-white">Duplex Vally</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- cta-section -->
    <section class="cta-section alternate-2 centred"
        style="background-image: url({{ asset('frontEndAsset') }}/assets/images/background/cta-1.jpg);">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="text">
                    <h2>Looking to Buy a New Property ? </h2>
                </div>
                <div class="btn-box">
                    <a href="{{ url('/download-form') }}" class="theme-btn btn-one">&downarrow; Application Form</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->

    <!-- team-section -->
    <section class="team-section py-3 centred bg-color-1">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontEndAsset') }}/assets/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Team</h5>
                <h2> Our Excellent Team</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                @foreach ($teamMembers as $team)
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('/') }}{{$team->image}}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="{{$team->contact}}">{{$team->name}}</a></h4>
                                <span class="designation">( {{$team->designation}} )</span>
                                {{-- <ul class="social-links clearfix">
                                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- team-section end -->

    <!-- faq-page-section -->
    <section class="testimonial-style-four sec-pad  p-0">
        <div class="auto-container p-0">
            <div class="sec-title centred">
                <h5>FAQ’S</h5>
                <h2>Frequently Asked Questions.</h2>
            </div>
            <div class="row clearfix faq-page-section ">
                <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                    <div class="faq-content-side">
                        <ul class="accordion-box">
                            @foreach ($faqs as $faq)
                            <li class="accordion block {{$loop->index==0?'active-block':''}}">
                                <div class="acc-btn {{$loop->index==0?'active':''}}">
                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                    <h5>{{$faq->question}}</h5>
                                </div>
                                <div class="acc-content {{$loop->index==0?'current':''}}">
                                    <div class="content-box">
                                        <p>{{$faq->answer}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="faq-sidebar">
                        <div class="question-inner">
                            <div class="sec-title">
                                <h5>Submit Question</h5>
                            </div>
                            <div class="form-inner">
                                <form action="http://azim.commonsupport.com/Realshed/faq.html" method="post">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your message" rows="2"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Send Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- faq-page-section end -->

    <!-- testimonial-style-four -->
    <section class="testimonial-style-four bg-color-1 centred" >
        <div class="auto-container p-0">
            <div class="sec-title">
                <h5>Testimonials</h5>
                <h2>What Clients Say About Us</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one mb-5">
                @foreach ($testimonials as $testimonial)
                <div class="testimonial-block-three">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="{{$testimonial->image}}" alt="">
                        </div>
                        <h4>“{{$testimonial->feedback}}”</h4>
                        <h5>{{$testimonial->name}}</h5>
                        <span class="designation">{{$testimonial->designation}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </section>
    <!-- testimonial-style-four end -->
@endsection

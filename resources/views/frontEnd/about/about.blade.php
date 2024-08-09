@extends('frontEnd.master')
@section('content')
<!--Page Title-->
<section class="page-title-two bg-color-1 centred p-0 m-0">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontEndAsset') }}/assets/images/shape/shape-9.png);"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontEndAsset') }}/assets/images/shape/shape-10.png);"></div>
    </div>
    <div class="auto-container p-2">
        <div class="content-box clearfix">
            <h1>About Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

    <!-- about-section -->
    <section class="about-section about-page p-0">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_2">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('frontEndAsset') }}/assets/images/resource/about-1.jpg" alt=""></figure>
                                <div class="text wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <h2>20 +</h2>
                                    <h4>Onging<br />Projects</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_3">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h5>About</h5>
                                    <h2>From Royal Eco Vally </h2>
                                </div>
                                <div class="text">
                                    <p>{{$company->overview}}</p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{route('contact')}}" class="theme-btn btn-one">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->

    <!-- about-section -->
    <section class="about-section about-page p-0">
        <div class="container p-0"  >
            <div class="inner-container">
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Our Mission</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->mission}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Our Vision</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->vission}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Our Values</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->value}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Our Services</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->service}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Why Choose Us?</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->whyus}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Company Policy</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->policy}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-details-content py-4">
                    <div class="row align-items-center clearfix">
                        <div class="discription-box content-widget" style="background: #fdfdfd">
                            <div class="title-box">
                                <h4>Company Terms</h4>
                            </div>
                            <div class="text">
                                <p>{{$company->term}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->

    <!-- team-section -->
    <section class="team-section py-3 centred bg-color-1">
        <div class="pattern-layer" style="background-image: url({{ asset('frontEndAsset') }}/assets/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Team</h5>
                <h2> Our Excellent Team</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                @foreach ($teamMembers as $team)
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('/') }}{{$team->image}}" alt=""></figure>
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
@endsection

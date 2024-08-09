
<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url({{ asset('frontEndAsset') }}/assets/images/shape/shape-2.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Subscribe</span>
                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="{{route('storeSubscription')}}" method="post" class="subscribe-form">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            @error('email')
                                {{$message}}
                            @enderror
                            <button type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->

<!-- main-footer -->
<footer class="main-footer" >
    <div class="footer-top bg-color-2" style="padding: 0px!important;">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li class="current dropdown">
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li><a href="{{route('about')}}"><span>About Us</span></a></li>
                                <li><a href="{{route('plot.category')}}"><span>Plot Category</span></a></li>
                                <li><a href="{{route('gallery')}}"><span>Our Gallery</span></a></li>
                                <li><a href="{{route('contact')}}"><span> Contact Us</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>About</h3>
                        </div>
                        <div class="text ">
                            <p class="text-justify">{!! $company->overview !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Top News</h3>
                        </div>
                        <div class="post-inner">
                            <div class="post">
                                <figure class="post-thumb"><a href="blog-details.html">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5613.164698371258!2d90.40636466403016!3d23.73585876876533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b92df24b197b%3A0xff8219c13c5bc87d!2s63%2F1%20Pioneer%20Rd%2C%20Dhaka%201000!5e0!3m2!1sen!2sbd!4v1710408368156!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </figure>
                                <h5>
                                    <a href="blog-details.html">Royal Eco Land</a>
                                </h5>
                                <p>Head Office</p>
                            </div>
                            <div class="post">
                                <figure class="post-thumb">
                                    <figure class="post-thumb"><a href="blog-details.html">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5613.164698371258!2d90.40636466403016!3d23.73585876876533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b92df24b197b%3A0xff8219c13c5bc87d!2s63%2F1%20Pioneer%20Rd%2C%20Dhaka%201000!5e0!3m2!1sen!2sbd!4v1710408368156!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </figure>
                                </figure>
                                <h5><a href="blog-details.html">Roal Eco Land</a></h5>
                                <p>(Branch Office)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contacts</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{$company->address_one}}</li>
                                <li><i class="fas fa-microphone"></i><a href="tel:23055873407">{{$company->contact_number_one}}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:info@example.com">{{$company->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div  style="padding:5px 20px">
            <div class="inner-box clearfix">
                <div class="copyright pull-left">
                    <p>&copy; All Right Reserved 2024 @ <a href="{{url('/')}}l">Royal Eco Land</a></p>
                </div>
                <ul class="footer-nav pull-right clearfix">
                    <li><a href="index.html">Terms of Service</a></li>
                    <li><a href="index.html">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->

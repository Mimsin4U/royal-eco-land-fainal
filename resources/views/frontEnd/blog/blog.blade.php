@extends('frontEnd.master')
@section('content')

    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('frontEndAsset') }}/assets/images/background/page-title-5.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Blog Standard</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Blog Standard</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-standard sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-standard-content">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/news-21.jpg" alt=""></a></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-details.html">Including Animation In Your Design System.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="{{ asset('frontEndAsset') }}/assets/images/news/author-1.jpg" alt=""></figure>
                                            <h5><a href="blog-details.html">Eva Green</a></h5>
                                        </li>
                                        <li>April 10, 2020</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam.</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/news-22.jpg" alt=""></a></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-details.html">New Font Technologies Will Improve The Web.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="{{ asset('frontEndAsset') }}/assets/images/news/author-2.jpg" alt=""></figure>
                                            <h5><a href="blog-details.html">Eva Green</a></h5>
                                        </li>
                                        <li>April 10, 2020</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam.</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/news-23.jpg" alt=""></a></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-details.html">Most Inspiring Interior Design For Your Home.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="{{ asset('frontEndAsset') }}/assets/images/news/author-3.jpg" alt=""></figure>
                                            <h5><a href="blog-details.html">Eva Green</a></h5>
                                        </li>
                                        <li>April 10, 2020</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam.</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/news-24.jpg" alt=""></a></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-details.html">Secret To Totally Rocking Your Real Estate.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="{{ asset('frontEndAsset') }}/assets/images/news/author-1.jpg" alt=""></figure>
                                            <h5><a href="blog-details.html">Eva Green</a></h5>
                                        </li>
                                        <li>April 10, 2020</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam.</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/news-25.jpg" alt=""></a></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-details.html">Taking The Pattern Library To The Next Level</a></h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="{{ asset('frontEndAsset') }}/assets/images/news/author-2.jpg" alt=""></figure>
                                            <h5><a href="blog-details.html">Eva Green</a></h5>
                                        </li>
                                        <li>April 10, 2020</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam.</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-wrapper">
                            <ul class="pagination clearfix">
                                <li><a href="blog-3.html" class="current">1</a></li>
                                <li><a href="blog-3.html">2</a></li>
                                <li><a href="blog-3.html">3</a></li>
                                <li><a href="blog-3.html"><i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget search-widget">
                            <div class="widget-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-inner">
                                <form action="http://azim.commonsupport.com/Realshed/blog-3.html" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search_field" placeholder="Search" required="">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget social-widget">
                            <div class="widget-title">
                                <h4>Follow Us On</h4>
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="blog-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="blog-3.html"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="blog-3.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="blog-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="blog-3.html"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Category</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li><a href="blog-details.html">Home improvement<span>(9)</span></a></li>
                                    <li><a href="blog-details.html">Architecture<span>(5)</span></a></li>
                                    <li><a href="blog-details.html">Tips and advice<span>(2)</span></a></li>
                                    <li><a href="blog-details.html">Interior<span>(7)</span></a></li>
                                    <li><a href="blog-details.html">Real Estate<span>(3)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>Recent Posts</h4>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/post-1.jpg" alt=""></a></figure>
                                    <h5><a href="blog-details.html">Best interior design idea for your home.</a></h5>
                                    <span class="post-date">April 10, 2020</span>
                                </div>
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/post-2.jpg" alt=""></a></figure>
                                    <h5><a href="blog-details.html">A digital prescription for the industry.</a></h5>
                                    <span class="post-date">April 09, 2020</span>
                                </div>
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img src="{{ asset('frontEndAsset') }}/assets/images/news/post-3.jpg" alt=""></a></figure>
                                    <h5><a href="blog-details.html">Strategic & commercial approach with issues.</a></h5>
                                    <span class="post-date">April 08, 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Archives</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li><a href="blog-details.html">November 2016<span>(9)</span></a></li>
                                    <li><a href="blog-details.html">November 2017<span>(5)</span></a></li>
                                    <li><a href="blog-details.html">November 2018<span>(2)</span></a></li>
                                    <li><a href="blog-details.html">November 2019<span>(7)</span></a></li>
                                    <li><a href="blog-details.html">November 2020<span>(3)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget tags-widget">
                            <div class="widget-title">
                                <h4>Popular Tags</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="tags-list clearfix">
                                    <li><a href="blog-details.html">Real Estate</a></li>
                                    <li><a href="blog-details.html">HouseHunting</a></li>
                                    <li><a href="blog-details.html">Architecture</a></li>
                                    <li><a href="blog-details.html">Interior</a></li>
                                    <li><a href="blog-details.html">Sale</a></li>
                                    <li><a href="blog-details.html">Rent Home</a></li>
                                    <li><a href="blog-details.html">Listing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->

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
                        <form action="http://azim.commonsupport.com/Realshed/contact.html" method="post" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->

@endsection

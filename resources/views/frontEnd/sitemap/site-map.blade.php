@extends('frontEnd.master')
@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('frontEndAsset') }}/assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Site Map</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Site Map</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- contact-section -->
    <section class="contact-section bg-color-1 p-0">
        <div class="row align-items-center clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 map-column">
{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d14191.877609087724!2d90.39096759228504!3d23.74977508041811!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3755b8bd552c2b3b%3A0x4e70f117856f0c22!2s3rd%20Floor%2C%20BASIS%20Institute%20of%20Technology%20%26%20Management%20(BITM)%2C%20BDBL%20Bhaban%2C%20East%2012%2C%20Dhaka%201215!3m2!1d23.7508581!2d90.3932688!5e0!3m2!1sen!2sbd!4v1669626950647!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

                    <div class="google-map-area">
                        <div
                            class="google-map"
                            id="contact-google-map"
                            data-map-lat="40.712776"
                            data-map-lng="-74.005974"
                            data-icon-path="assets/images/icons/map-marker.png"
                            data-map-title="Brooklyn, New York, United Kingdom"
                            data-map-zoom="12"
                            data-markers='{
                                    "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                                }'>

                        </div>
{{--                        <div--}}
{{--                            class="google-map"--}}
{{--                            id="contact-google-map"--}}
{{--                            data-map-lat="23.755915"--}}
{{--                            data-map-lng="90.386008"--}}
{{--                            data-map-title="3rd Floor, BASIS Institute of Technology & Management (BITM), BDBL Bhaban, East 12, Dhaka 1215"--}}
{{--                            data-map-zoom="12"--}}
{{--                            data-markers='{--}}
{{--                                    "marker-1": [23.755915, 90.386008, "<h4>Branch Office</h4><p>77/99 New York</p>","{{ asset('frontEndAsset') }}/assets/images/icons/map-marker.png"]--}}
{{--                                }'>--}}

{{--                        </div>--}}
                    </div>
                </div>
            </div>

    </section>
    <!-- contact-section end -->



@endsection

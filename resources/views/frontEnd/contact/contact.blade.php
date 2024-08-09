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
            <h1>Contacts Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Contacts Us</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- contact-info-section -->
<section class="contact-info-section  centred">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Get In Touch</h5>
            <h2>Contacts</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                <div class="info-block-one">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-32"></i></div>
                        <h4>Email Address</h4>
                        <p><a href="mailto:royalecoland@gmail.com">royalecoland@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                <div class="info-block-one">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-33"></i></div>
                        <h4>Phone Number</h4>
                        <p><a href="tel:+23055873407">+8802226664008</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                <div class="info-block-one">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-34"></i></div>
                        <h4>Office Address</h4>
                        <p>63/1 Pioneer Road,Kakril,Dhaka-1000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-info-section end -->

<!-- contact-section -->
<section class="contact-section bg-color-3 p-0">
    <div class="container">
        <div class="row align-items-center clearfix">
            <div class="col-sm-12 content-column">
                <h1 class="text-center mt-5 mb-5">Find On Map &downarrow;</h1>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5613.164698371258!2d90.40636466403016!3d23.73585876876533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b92df24b197b%3A0xff8219c13c5bc87d!2s63%2F1%20Pioneer%20Rd%2C%20Dhaka%201000!5e0!3m2!1sen!2sbd!4v1710408368156!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- contact-section end -->
@endsection

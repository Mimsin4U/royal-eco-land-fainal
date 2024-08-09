@extends('frontEnd.master')
@section('content')
    <!-- property-details -->
    <h1 class="text-center mt-5">Plot Category Details</h1>
    <section class="property-details property-details-four mt-2">
        <div class="auto-container">
            @include('notify.notify')
            <div class="row">
                <div class="col-md-8">
                    <a href="#categoryImgModal" data-toggle="modal">
                    <div style="height:500px">
                        <img src="{{ asset('/') }}{{$plotCategory->image}}" alt="" class="w-100 h-100" height="300px">
                    </div>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="categoryImgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-danger">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('/') }}{{$plotCategory->image}}" alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-details-content mt-5">
                        <div class="discription-box content-widget">
                            <div class="title-box">
                                <h4>Description</h4>
                            </div>
                            <div class="text">
                                <p>{{$plotCategory->short_desc}}</p>
                                <p>{{$plotCategory->long_desc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div width="90%" height="240" class="bg-dark">
                        <iframe width="100%" height="240" src="{{$plotCategory->vedio}}" title="Royal  Eco Land" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="author-box">
                                <div class="inner">
                                    <ul class="info clearfix">
                                        <li>Our Contact</li>
                                        <li><i class="fas fa-phone"></i><a href="tel:01776894912">017768949</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-inner">
                                <form action="{{ route('visitRequest') }}" method="post" class="default-form">
                                    @csrf
                                    <input type="hidden" name="category_name" value="{{$plotCategory->name}}">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile" placeholder="Mobile Number" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="adress" placeholder="Adress" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Request For Visit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- property-details end -->
@endsection

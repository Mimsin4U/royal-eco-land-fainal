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
            <h1>Image Gallery</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- gallery-style-two -->
@foreach ($galleries as $gallery)
    
<section class="gallery-style-two centred bg-color-1 pt-2">
    <div class="container">
        <div class="sec-title">
            <h3 class="">
                @switch($loop->iteration)
                @case(1)
                Plot Selling
                @break
                @case(2)
                Plot Visits
                @break
                @case(3)
                Events
                @break
                @case(4)
                Plot Booking
                @break
                @case(5)
                Project Development
                @break
                @endswitch
            </h3>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
        @foreach ($gallery as $item)
            <div class="gallery-block-two">
                <div class="inner-box">
                    <figure class="image-box">
                        <a href="{{ asset('/') }}{{$item->image}}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset('/') }}{{$item->image}}" alt="" width="100%" height="100%"></a>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach
<!-- gallery-style-two end -->


@endsection

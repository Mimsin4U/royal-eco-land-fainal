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
            <h1>Plot Categories</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Plot Categories</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
<section class="feature-style-two pb-3 bg-light">
    <div class="auto-container">
        <div class="row">
            @foreach ($plotCategories as $plotCategory)
            <div class="col-md-6 mb-4">
                <a href="{{route('plotCategoryDetails', $plotCategory->id)}}">
                    <div class="card h-100">
                        <div class="card-body shadow">
                            <div class="position-relative h-100">
                                <img class="w-100 h-100" src="{{ asset('/') }}{{$plotCategory->image}}" alt="">
                                <div class="rel-category-over position-absolute w-100 shadow p-2 rounded" style="bottom: 0px; background-color:rgba(28, 145, 51, 0.737);">
                                    <h2 class="text-center text-uppercase text-white">{{$plotCategory->name}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

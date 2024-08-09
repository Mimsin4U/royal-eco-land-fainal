@extends('frontEnd.dashboard-master')
@section('content')
<div class="row">
    <h2 class="text-center  mb-4">Plot History</h2>
    <div class="col-12 col-sm-12">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h5 class="text-light">Plot Categgory :</h5>
                <h5 class="text-light">{{$plotOrder->category_name}}</h5>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h5 class="text-light">Plot No :</h5>
                <h5 class="text-light">{{$plotOrder->plot_no}}</h5>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h5 class="text-light">Plot Price :</h5>
                <h5 class="text-light">{{$plotOrder->total_price}} /-</h5>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h5 class="text-light">Plot Area :</h5>
                <h5 class="text-light">{{$plotOrder->plot_area}} Dcm</h5>
            </div>
        </div>
    </div>
</div>

<!-- content -->
@endsection

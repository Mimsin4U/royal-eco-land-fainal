@extends('frontEnd.dashboard-master')
@section('content')
<div class="row ">
    <h2 class="text-center  mb-4">Payment Summery</h2>
    <div class="col-12 col-sm-6">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h4 class="text-light">Totall Extended Price :</h4>
                <h4>{{$plotOrder->total_price_extended}} /-</h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h4 class="text-light">Totall Price :</h4>
                <h4>{{$plotOrder->total_price}} /-</h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h4 class="text-light">Booking Money Paid:</h4>
                <h4>{{$plotOrder->booking_money}} /-</h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="card bg-dark mb-2">
            <div class="card-body d-flex justify-content-between">
                <h4 class="text-light">Down Payment :</h4>
                <h4 class="text-{{$plotOrder->down_payment ? '' : 'danger'}}">{{$plotOrder->down_payment ? $plotOrder->down_payment.' /-' : 'Pending..'}}</h4>
            </div>
        </div>
    </div>

</div>

<!-- content -->
@endsection

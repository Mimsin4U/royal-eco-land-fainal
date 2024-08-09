@extends('frontEnd.dashboard-master')
@section('content')
        <div class="row">
            <h2 class="text-center mb-4">Welcome <span class="account-user-name">{{ Auth::guard('client')->user()->name }}</span> !</h2>
                    <div class="col-12 col-sm-4">
                        <div class="card bg-dark mb-2">
                            <div class="card-body border border-success border-2">
                                <h3 class="text-light">Extended Price</h3>
                                <h3 class="text-danger">{{$plotOrder->total_price_extended ?? 'N/A'}} /-</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-2">
                        <div class="card bg-dark">
                            <div class="card-body border border-success border-2">
                                <h3 class="text-light">Totall Cost:</h3>
                                <h3 class="text-danger">{{$plotOrder->total_price}} /-</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-2">
                        <div class="card bg-dark">
                            <div class="card-body border border-success border-2">
                                <h3 class="text-light">Total Paid:</h3>
                                <h3 class="text-danger">{{$plotOrder->paid_amount}} /-</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-2">
                        <div class="card bg-dark">
                            <div class="card-body border border-success border-2">
                                <h3 class="text-light">Due:</h3>
                                <h3 class="text-danger">{{$plotOrder->due_amount}} /-</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-2">
                        <div class="card bg-dark">
                            <div class="card-body border border-success border-2">
                                <h3 class="text-light">Down Payment</h3>
                                @if ($plotOrder->down_payment)
                                    <h3 class="text-danger">{{$plotOrder->down_payment}} /-</h3>
                                @else
                                    <h3 class="text-danger">{{$plotOrder->down_payment_date ? date('F j, Y', strtotime($plotOrder->down_payment_date)) : 'N/A'}}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
        </div>
    
    <!-- content -->
@endsection

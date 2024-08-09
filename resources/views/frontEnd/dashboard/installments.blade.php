@extends('frontEnd.dashboard-master')
@section('content')
<div class="row ">
    <h2 class="text-center mb-3">Installment History ( {{$plotOrder->installments->count()}} Installments )</h2>
    <div class="row">
        @foreach ($plotOrder->installments as $installment)
        <div class="col-12 col-sm-4">
            <div class="card bg-dark mb-2">
                <div class="card-body border border-{{$installment->status == 0 ? 'danger' : 'success'}} border-2 ">
                    <h3 class="text-light">Installment No: <span class="text-danger"></span> {{$installment->installment_no}}</h3>
                    <div>
                        <p>( {{ date('F j, Y', strtotime( $installment->payment_date) ) }} )</p>
                        <h4 class="text-light">{{$installment->amount}} /-</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- content -->
@endsection

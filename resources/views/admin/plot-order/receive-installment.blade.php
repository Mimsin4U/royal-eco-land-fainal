@extends('admin.master')
@section('title','Receive DownPayment')

@section('body')

@include('notify.notify')
<h1 class="text-center my-3">Receive Clients Installment</h1>
<div class="row mb-3">
    <div class="col-sm-8 col-12 offset-sm-2">
        <form action="{{route('admin.searchInstallment')}}" method="post">
            @csrf
            <div class="d-flex align-items-center">
                <select class="search-client text-center" name="client_id" >
                        <option value="" desabled>Search</option>
                        @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}} | {{$client->email}} | {{$client->mobile}}</option>
                        @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-primary ms-2">Search</button>
            </div>
        </form>
    </div>
</div>
@if ($plotOrder)
    <div class="row">
        <hr>
        <h4 class="text-center ">Client Order Details ( <span class="text-danger">Due Amount: {{$plotOrder->due_amount}}/-</span> )</h4>
        <div class="col-12 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div>Name: {{$plotOrder->client->name}}</div>
                    <div>Email: {{$plotOrder->client->email}}</div>
                    <div>Mobile: {{$plotOrder->client->mobile}}</div>
                    <div>Plot No: {{$plotOrder->plot_no}}</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div>Plot Category: {{$plotOrder->category_name}}</div>
                    
                    <div>Plot Area: {{$plotOrder->plot_area}}</div>
                    <div>Installment Year: {{$plotOrder->installment_years}}</div>
                    <div>Installment left: {{$plotOrder->installment_count}}</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div>Total Extended Price: {{$plotOrder->total_price_extended}} /-
                    </div>
                    <div>Booking Money Paid: <span class="text-success">{{$plotOrder->booking_money}}/-</span></div>
                    <div>Downpayment Paid: <span class="text-success">{{$plotOrder->down_payment}} /-</span></div>
                    <div>Amount Per Installment: <span class="text-success">{{round($plotOrder->amount_per_installment)}} /-</span></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6">
            
            
            @if ($plotOrder->down_payment == null)
            <div class="alert alert-danger" role="alert">
                Down Payment Not Yet Paid, <a href="{{route('receiveDpView',$plotOrder->id)}}" class="alert-link">Click To Recieve DP</a>.
            </div>
            @else
            <form action="{{route('admin.reciveInstallment')}}" method="post">
                @csrf
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label fs-4">Recive Amount For Installment No {{ $plotOrder->installments->count() == 0 ? '1' : $plotOrder->installments->last()->installment_no+1}}</label>
                    <input type="number" name="amount" class="form-control" placeholder="Down Payment Amount" value="{{ $plotOrder->amount_per_installment}}" min="1" required>
                    @error('amount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <input type="text" hidden name="plot_order_id" value="{{$plotOrder->id}}">
                <div class="mb-2">
                    <div>
                        <button class="btn w-100  btn-sm btn-primary mb-2" type="submit">Receive</button>
                    </div>
                </div>
            </form>    
            @endif
        </div>
        <hr>
    </div>
    <div class="row ">
        <h3 class="text-center mb-3">Installment History ( {{$plotOrder->installments->count()}} Installments )</h3>
        <div class="row">
            @foreach ($plotOrder->installments as $installment)
            <div class="col-12 col-sm-3">
                <div class="card bg-dark mb-2">
                    <div class="ps-2 border border-{{$installment->status == 0 ? 'danger' : 'success'}} border-2 ">
                        <h5 class="text-light">Installment No: <span class="text-danger"></span> {{$installment->installment_no}}</h5>
                        <div>
                            <p>( {{ date('F j, Y', strtotime( $installment->payment_date) ) }} )</p>
                            <h5 class="text-light">{{$installment->amount}} /-</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif

@endsection
@section('script')
    <script>
        $(".search-client").select2({
            placeholder: "Select or Type to Search Client By Name / Email / Mobile ...",
            allowClear: true
        });
    </script>
@endsection

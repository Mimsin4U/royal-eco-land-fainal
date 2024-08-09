@extends('admin.master')
@section('title','Receive DownPayment')
@section('body')

@include('notify.notify')
<h1 class="text-center my-3">Receive DownPayment</h1>
<div class="row">
    <hr>
    <h4 class="text-center ">Order Details</h4>
    <div class="col-12 col-sm-4">
        <div class="card">
            <div class="card-body">
                <div>Name: {{$plotOrder->client->name}}</div>
                <div>Email: {{$plotOrder->client->email}}</div>
                <div>Mobile: {{$plotOrder->client->mobile}}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="card">
            <div class="card-body">
                <div>Plot Category: {{$plotOrder->category_name}}</div>
                <div>Plot No: {{$plotOrder->plot_no}}</div>
                <div>Plot Area: {{$plotOrder->plot_area}}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="card">
            <div class="card-body">
                <div>Total Price: {{$plotOrder->total_price}}
                </div>
                <div>Booking Money Paid: {{$plotOrder->booking_money}}</div>
                <div>Dp Date: <span class="text-danger">{{ date( 'F j, Y', strtotime($plotOrder->down_payment_date) ) }}</span></div>
            </div>
        </div>
    </div>
    <hr>
</div>
<div class="row justify-content-center">
    <div class="col-12 col-sm-8">
        <form action="{{route('receiveDp',$plotOrder->id)}}" method="post">
            @csrf
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">DownPayment Amount</label>
                <input type="text" name="down_payment" class="form-control" placeholder="Down Payment Amount">
                @error('down_payment')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Select Installment Year</label>
                <select class="form-select mb-3" name="installment_years" aria-label=".form-select-lg example">
                    <option value="5" selected>5 Years</option>
                    <option value="7">7 Years</option>
                    <option value="10">10 Years</option>
                </select>
                @error('installment_years')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <div>
                    <button class="btn w-100  btn-sm btn-primary @disabled($plotOrder->status == 2)">Receive</button>
                </div>
            </div>
        </form>
    </div>
    <hr>
</div>
@endsection

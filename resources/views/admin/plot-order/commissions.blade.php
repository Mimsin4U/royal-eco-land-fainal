@extends('admin.master')
@section('title','Commisions')
@section('body')

@include('notify.notify')
<h1 class="text-center">Plot Commissions</h1>
<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>SL NO</th>
            <th>Order_ID</th>
            <th>Deal By</th>
            <th>Recived By</th>
            <th>For</th>
            <th>Amount</th>
            <th>Erning</th>
            <th>Tax (15%)</th>
            <th>Payment Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($commissions as $commission)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $commission->plot_order_id }}</td>
            <td>{{$commission->plotOrder->confirmed_by ?? ''}}</td>
            <td>{{ $commission->employee_code }}</td>
            <td>
                @switch($commission->type)
                    @case(1)
                        {{'Booking Money'}}
                        @break
                    @case(2)
                        {{'Down Payment'}}
                        @break
                    @case(3)
                        {{"Installment no:"}} {{$commission->installment_no}}
                        @break
                @endswitch
            </td>
            <td>{{ $commission->amount }}</td>
            <td>{{ $commission->erning }}</td>
            <td>{{ $commission->tax }}</td>
            <td>{{date('F j, Y', strtotime($commission->payment_date))}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

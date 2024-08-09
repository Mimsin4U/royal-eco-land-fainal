@extends('admin.master')
@section('title','Plot Orders')
@section('body')
@include('notify.notify')

@if (Auth::user()->type == null)
<a href="{{route('plotOrder.manual')}}" class="btn btn-sm btn-primary">Add Order +</a> 
@endif
<h1 class="text-center">Plot Orders</h1>
<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>For category</th>
            <th>Plot_No</th>
            <th>Plot_UID</th>
            <th>Plot_Area</th>
            <th>Plot_Road_no</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Client NID</th>
            <th>Nomine Name</th>
            <th>Nomine NID</th>
            <th>Plot_Price</th>
            <th>Booking_Money</th>
            <th>Down_Payment_Date </th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($plotOrders as $plotOrder)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $plotOrder->client->name }}</td>
            <td>{{ $plotOrder->category_name }}</td>
            <td>{{ $plotOrder->plot_no }}</td>
            <td>{{ $plotOrder->plot_uid }}</td>
            <td>{{ $plotOrder->plot_area }}</td>
            <td>{{ $plotOrder->plot_road_no }}</td>
            <td>{{ $plotOrder->client->email }}</td>
            <td>{{ $plotOrder->client->mobile }}</td>
            <td>{{ $plotOrder->client_nid }}</td>
            <td>{{ $plotOrder->nomine }}</td>
            <td>{{ $plotOrder->nomine_nid }}</td>
            <td>{{ $plotOrder->total_price }} /-</td>
            <td>{{ $plotOrder->booking_money }} /-</td>
            <td>{{date('F j, Y', strtotime($plotOrder->down_payment_date))}}</td>
            <td> <span class="text-success">{{ $plotOrder->status == 1 ? 'Booking Money Paid' : '' }} {{ $plotOrder->status == 2 ? "Down Payment Paid $plotOrder->down_payment /-" : '' }}</span></td>
            <td>
                @if (Auth::user()->type == null)
                    <a href="{{route('receiveDpView',$plotOrder->id)}}" class="btn btn-sm btn-warning @disabled($plotOrder->status == 2)" >Receive DP</a>
                    <a class="btn btn-sm btn-primary" href="{{route('plotOrderInvoice',$plotOrder->id)}}" target="_blank"> <i class="fa fa-print" aria-hidden="true"></i> Print</a>
                @endif
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

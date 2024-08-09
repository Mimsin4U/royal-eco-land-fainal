@extends('admin.master')
@section('title','Plot Order')
@section('body')
@include('notify.notify')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4 text-center">Add Plot Order Menually</h2>
                <form class="form-horizontal repeater_parent " action="{{route('plotOrder.store')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-2 col-form-label">Client Name</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="name" required placeholder="Client User Name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email" required placeholder="Client Email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile" class="col-2 col-form-label">Mobile</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="mobile" required placeholder="Client Mobile Number">
                            @error('mobile')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile" class="col-2 col-form-label">Client NID</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="client_nid" required placeholder="Client NID Number">
                            @error('client_nid')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile" class="col-2 col-form-label">Nomine Name</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nomine" required placeholder="Nomine Name">
                            @error('nomine')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile" class="col-2 col-form-label">Nomine NID</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nomine_nid" required placeholder="Nomine NID Number">
                            @error('nomine_nid')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-2 col-form-label">Plot Category</label>
                        <div class="col-10">
                            <select class="form-select text-center" name="category_name" required>
                                @foreach ($plotCategories as $plotCategory)
                                <option value="{{$plotCategory->name}}"> {{$plotCategory->name}} </option>
                                @endforeach
                            </select>
                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-2 col-form-label">Plot No :</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="plot_no" required placeholder="Plot No">
                            @error('plot_no')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-2 col-form-label">Plot UID :</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="plot_uid" required placeholder="Plot uid">
                            @error('plot_uid')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-form-label">Plot Size :</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="plot_area" required placeholder="Plot Size">
                            @error('plot_area')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-form-label">Road Number:</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="plot_road_no" required placeholder="Plot Road Number">
                            @error('plot_road_no')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-form-label">Plot Price :</label>
                        <div class="col-10">
                            <input class="form-control" type="number" min="1" name="total_price" required placeholder="Plot_Amount">
                            @error('total_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-form-label">Booking Money :</label>
                        <div class="col-10">
                            <input class="form-control" type="number" min="1" name="booking_money" required placeholder="Booking_Amount">
                            @error('booking_money')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-form-label">Down Payment Date :</label>
                        <div class="col-10">
                            <input type="date" min="1" name="down_payment_date" required>
                            @error('down_payment_date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-form-label">Confirmed By :</label>
                        <div class="col-10">
                            <select name="confirmed_by" class="form-select" required>
                                @foreach ($directorors as $directoror)
                                <option value="{{$directoror->code}}">{{$directoror->name .' - '. $directoror->code}}</option>
                                @endforeach
                                @foreach ($jointDirectors as $jointDirector)
                                <option value="{{$jointDirector->code}}">{{$jointDirector->name .' - '. $jointDirector->code}}</option>
                                @endforeach

                                @foreach ($seniorManegers as $seniorManeger)
                                <option value="{{$seniorManeger->code}}">{{$seniorManeger->name .' - '. $seniorManeger->code}}</option>
                                @endforeach

                                @foreach ($asistentSeniorManegers as $asistentSeniorManeger)
                                <option value="{{$asistentSeniorManeger->code}}">{{$asistentSeniorManeger->name .' - '. $asistentSeniorManeger->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="vrId" value="">
                    <div class="d-flex">
                        <button type="submit" class="mx-auto btn btn-primary">Confirm Plot Order</button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection

@extends('admin.master')
@section('title','Add Client')
@section('body')
@include('notify.notify')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4 text-center">Add Client</h2>
                <form class="form-horizontal repeater_parent text-center" action="{{route('client.signup')}}" method="POST" >
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-2 col-form-label">UserName</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="name" required value="{{request()->route('username')}}" placeholder="Client User Name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email" required value="{{request()->route('email')}}" placeholder="Client Email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-2 col-form-label">Password</label>
                        <div class="col-10">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Client Password" />
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-2 col-form-label">Confirm Password</label>
                        <div class="col-10">
                            <input class="form-control" type="password" name="password_confirmation" required value="{{old('password_confirmation')}}" placeholder="Confirm The Password">
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="mx-auto btn btn-primary">Add New Client</button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection

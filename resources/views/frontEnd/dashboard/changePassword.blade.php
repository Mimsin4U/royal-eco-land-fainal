@extends('frontEnd.dashboard-master')
@section('content')
<div class="row justify-content-center bg-dark text-white py-4">
    <h2 class="text-center  mb-2">Change Password</h2>
    <div class="col-12 col-sm-8">
        <form class="{{route('client.updatePassword')}}" method="POST">
            @csrf
            @include('notify.notify')
            <div class="mb-2">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" name="current_password" placeholder="Old Password">
                @error('current_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">New Password</label >
                <input type="password" class="form-control"  name="password" value="{{ old('password') }}" placeholder="New Password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control"  name="password_confirmation" placeholder="Confirm New Password">
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn mt-2 btn-primary">Change</button>
        </form>
    </div>
</div>

<!-- content -->
@endsection

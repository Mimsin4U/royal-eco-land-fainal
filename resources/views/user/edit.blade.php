@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit User form</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('user.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-3 col-form-label">User Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="inputEmail3" placeholder="User Name"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail31" class="col-3 col-form-label">User Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" value="{{$user->email}}" name="email" id="inputEmail31" placeholder="User Email"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3 col-form-label">User Password</label>
                            <div class="col-9">
                                <input type="password" class="form-control" value="" name="password" id="inputEmail32" placeholder="User Password"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail33" class="col-3 col-form-label">User Mobile</label>
                            <div class="col-9">
                                <input type="number" class="form-control" value="{{$user->mobile}}" name="mobile" id="inputEmail33" placeholder="User Mobile"/>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update User Info</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

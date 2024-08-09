@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Edit TeamMember</h4>
                    <hr>
                    <form class="form-horizontal" action="{{route('team.update', ['id' => $team->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">TeamMember Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" value="{{$team->name}}" id="title" placeholder="Name"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">TeamMember Designation</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="designation" value="{{$team->designation}}"  placeholder="Designation"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">TeamMember Contact</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="contact" value="{{$team->contact}}"  placeholder="Contact"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">TeamMember Image</label>
                            <div class="col-9">
                                <input type="file" accept="image/*" class="form-control" name="image" id="inputEmail34" placeholder="team Image"/>
                                <img src="{{asset($team->image)}}" alt="" height="100" width="120"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" {{$team->status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="status" value="0" {{$team->status == 0 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary">Update TeamMember Info</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

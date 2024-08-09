@extends('admin.master')

@section('body')
@include('notify.notify')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Edit Gallery</h4>
                <hr>
                <form class="form-horizontal" action="{{route('gallery.update', ['id' => $gallery->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="subTitle" class="col-3 col-form-label">Change Category</label>
                        <div class="col-9">
                            <select name="category" class="form-select">
                                <option value="1" class="{{$gallery->category==1?'selected':''}}">Plot Selling</option>
                                <option value="2" {{$gallery->category==2?'selected':''}}>Plot Visits</option>
                                <option value="3" {{$gallery->category==3?'selected':''}}>Events</option>
                                <option value="4" {{$gallery->category==4?'selected':''}}>Plot Booking</option>
                                <option value="5" {{$gallery->category==5?'selected':''}}>Project Development</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Change Image</label>
                        <div class="col-9">
                            <input type="file" accept="image/*" class="form-control" name="image" id="inputEmail34" placeholder="gallery Image" />
                            <img src="{{asset($gallery->image)}}" alt="" height="100" width="120" />
                        </div>
                    </div>
                    <div class="justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary">Update Gallery Image</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection

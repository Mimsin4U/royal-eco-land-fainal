@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Edit Testimonial</h4>
                    <hr>
                    <form class="form-horizontal" action="{{route('testimonial.update', ['id' => $testimonial->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Person Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" value="{{$testimonial->name}}" id="title" placeholder="Name"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Person Designation</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="designation" value="{{$testimonial->designation}}"  placeholder="Designation"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Person Feedback</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="feedback" value="{{$testimonial->feedback}}"  placeholder="Feedback"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Person Image</label>
                            <div class="col-9">
                                <input type="file" accept="image/*" class="form-control" name="image" id="inputEmail34" placeholder="testimonial Image"/>
                                <img src="{{asset($testimonial->image)}}" alt="" height="100" width="120"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" {{$testimonial->status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="status" value="0" {{$testimonial->status == 0 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary">Update Testimonial</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

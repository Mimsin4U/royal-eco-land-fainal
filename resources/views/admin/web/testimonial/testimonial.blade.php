@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Create Testimonial</h4>
                    <hr><br>
                    <form class="form-horizontal" action="{{route('testimonial.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Person Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" id="title" placeholder="Name"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Person Designation</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="designation" placeholder="Designation"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Person Feedback</label>
                            <div class="col-9">
                                <textarea class="form-control" name="feedback" placeholder="Person Feedback"></textarea>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Person Image</label>
                            <div class="col-9">
                                <input type="file" accept="image/*" class="form-control" name="image" id="image" placeholder="Person Image"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" checked/> Active</label>
                                <label><input type="radio" name="status" value="0"/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary">Add Testimonial</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

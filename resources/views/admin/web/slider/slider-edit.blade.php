@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Edit Slider form</h4>
                    <hr>
                    <form class="form-horizontal" action="{{route('slider.update', ['id' => $slider->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="sl_title" value="{{$slider->title_one}}" id="title" placeholder="Title"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Sub Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="sl_sub_title" value="{{$slider->title_two}}" id="subTitle" placeholder="Sub Title"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Slider Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="sl_image" id="inputEmail34" placeholder="Slider Image"/>
                                <img src="{{asset($slider->image)}}" alt="" height="100" width="120"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="sl_status" value="1" {{$slider->status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="sl_status" value="0" {{$slider->status == 0 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update Slider Info</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

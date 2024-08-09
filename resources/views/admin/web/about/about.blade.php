@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Slider form</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('slider.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="sl_title" id="title" placeholder="Title"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Sub Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="sl_sub_title" id="subTitle" placeholder="Sub Title"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Slider Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="sl_image" id="image" placeholder="Slider Image"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="sl_status" value="1"/> Active</label>
                                <label><input type="radio" name="sl_status" value="2"/> Inactive</label>
                            </div>
                        </div>
                         
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create New Slider</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Edit Plot Category form</h4>
                    <hr>
                    <form class="form-horizontal" action="{{route('admin.plotCategory.update', ['id' => $plotCat->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text"  name="name" value="{{$plotCat->name}}" class="form-control"  id="name" placeholder="Title"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address2" class="col-3 col-form-label">Short Description</label>
                            <div class="col-9">
                                <textarea name="short_desc" class="form-control"  id="address" cols="20" rows="3"> {{$plotCat->short_desc}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address2" class="col-3 col-form-label">Long Description</label>
                            <div class="col-9">
                                <textarea id="simplemde1" name="long_desc" class="form-control"  id="address" cols="20" rows="5">{{$plotCat->long_desc}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="plc_image" id="inputEmail34" placeholder="Enter Your plotCat logo"/>
                                <img src="{{asset('/')}}{{$plotCat->image}}" alt="" height="100" width="120" class="mt-2"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo" class="col-3 col-form-label">Vedio Link</label>
                            <div class="col-9">
                                <textarea name="vedio" id="mission" class="form-control" cols="10" rows="2">{{$plotCat->vedio}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" {{$plotCat->status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="status" value="0" {{$plotCat->status == 2 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update Plot Category</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

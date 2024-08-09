@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center" >Edit Plot Type form</h4>
                    <hr>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('plotType.update', ['id' => $plotType->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text"  name="plt_name" value="{{$plotType->plt_name}}" class="form-control"  id="name" placeholder="Title"/>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="logo" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="plt_image" id="inputEmail34" placeholder="Enter Your plotType logo"/>
                                <img src="{{asset($plotType->plt_image)}}" alt="" height="100" width="120"/>
                            
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="address" class="col-3 col-form-label">Description</label>
                            <div class="col-9">
                                <textarea name="plt_description" class="form-control"  id="address" cols="20" rows="5">{{$plotType->plt_description}}</textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="plt_status" value="1" {{$plotType->plt_status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="plt_status" value="0" {{$plotType->plt_status == 2 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Update plotType Info</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

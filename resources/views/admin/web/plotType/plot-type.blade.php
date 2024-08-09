@extends('admin.master')

@section('body')
@include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Add Plot Type Form</h4>
                    <hr><br> 
                    <form class="form-horizontal" action="{{route('plotType.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text"  name="plt_name" class="form-control"  id="name" placeholder="Title"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" name="plt_image" class="form-control"  id="logo" placeholder="Enter Your plot logo"/>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="slogan" class="col-3 col-form-label">Description</label>
                            <div class="col-9">
                                <textarea name="plt_description" class="form-control"  id="address" cols="20" rows="5"></textarea>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="status" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="plt_status" value="1" checked /> Active</label>
                                <label><input type="radio" name="plt_status" value="2"/> Inactive</label>
                            </div>
                        </div>
                         
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create New Plot Type</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

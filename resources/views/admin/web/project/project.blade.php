@extends('admin.master')

@section('body')
@include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Add project form</h4>
                    <hr>
                    <form class="form-horizontal" action="{{route('project.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text"  name="p_name" class="form-control"  id="name" placeholder="Title"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slogan" class="col-3 col-form-label">Slogan</label>
                            <div class="col-9">
                                <input type="text" name="p_slogan" class="form-control"  id="slogan" placeholder="Enter Your Project Slogan"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="logo" class="col-3 col-form-label">Logo</label>
                            <div class="col-9">
                                <input type="file" name="p_logo" class="form-control"  id="logo" placeholder="Enter Your Project logo"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-3 col-form-label">Location</label>
                            <div class="col-9">
                                <input type="text" name="p_location"  class="form-control" id="location" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-3 col-form-label">Address</label>
                            <div class="col-9">
                                <textarea name="p_address" class="form-control"  id="address" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="p_status" value="1" checked/> Active</label>
                                <label><input type="radio" name="p_status" value="0"/> Inactive</label>
                            </div>
                        </div>
                         
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create New project</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

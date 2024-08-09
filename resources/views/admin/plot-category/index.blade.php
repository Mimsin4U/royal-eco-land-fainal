@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Add Plot Category</h4>
                    <hr>
                    <form class="form-horizontal" action="{{ route('admin.plotCategory.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Title" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" name="image" accept="image/*" class="form-control" id="image"
                                    placeholder="Select PLot-Category Featured Image" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Vedio Link</label>
                            <div class="col-9">
                                <textarea name="vedio" class="form-control" id="address" cols="10" rows="2" placeholder="Short Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slogan" class="col-3 col-form-label">Short Description</label>
                            <div class="col-9">
                                <textarea name="short_desc" class="form-control" id="address" cols="20" rows="2" placeholder="Short Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slogan" class="col-3 col-form-label">Long Description</label>
                            <div class="col-9">
                                <textarea id="simplemde1" name="long_desc" class="form-control" cols="5" rows="3" placeholder="Long Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" checked /> Active</label>
                                <label><input type="radio" name="status" value="0" /> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Add Plot Category</button>
                            </div>
                        </div>
                        <!-- HTML -->
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    
@endsection

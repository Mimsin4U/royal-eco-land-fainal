@extends('admin.master')

@section('body')
@include('notify.notify')
<div class="row">
    <div class="col-lg-12">
        <div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Add Gallery Image</h4>
                    <hr><br>
                    <form class="form-horizontal" action="{{route('gallery.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Choose Category</label>
                            <div class="col-9">
                                <select name="category" class="form-select">
                                    <option value="1">Plot Selling</option>
                                    <option value="2">Plot Visits</option>
                                    <option value="3">Events</option>
                                    <option value="4">Plot Booking</option>
                                    <option value="5">Project Development</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Slider Image</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="image" id="image" placeholder=" Image" />
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class=" header-title text-center">Gallery Manage
                    <hr>
                </h2>
                
                <table id="datatable-buttons" class="table table-striped dt-responsive      ">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img width="60" height="50" src="{{asset($gallery->image)}}" alt="">
                            </td>
                            <td>@switch($gallery->category)
                                @case(1)
                                    Plot Selling
                                    @break
                                @case(2)
                                    Plot Visits
                                    @break
                                @case(3)
                                    Events
                                    @break
                                @case(4)
                                    Plot Booking
                                    @break
                                @case(5)
                                    Project Development
                                    @break
                            @endswitch</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{route('gallery.edit', ['id' => $gallery->id])}}" class="btn btn-success btn-sm  " title="Edit">
                                                <i class="ri-edit-box-fill"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('gallery.delete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                                &nbsp;<input type="submit" onclick="return confirm('Ary you sure to delete this..');" class="btn btn-danger btn-sm " style="padding:5.5px 19px" value="X">
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection

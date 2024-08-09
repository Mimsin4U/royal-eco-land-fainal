@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Slider Manage</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Sub Title</th> 
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($abouts as $about)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$about->title_one}}</td>
                                <td>{{$about->title_two}}</td>
                                <td>{{$about->status}}</td>
                                <td>
                                    <img class="w-100 h-100" src="{{asset($about->image)}}" alt="">
                                </td>
                                <td>
                                    <a href="{{route('about.edit', ['id' => $about->id])}}" class="btn btn-success btn-sm" title="Edit">
                                        <i class="ri-edit-box-fill"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete').submit();" onclick="return confirm('Ary you sure to delete this..');"> <i class="ri-chat-delete-fill"></i></a>

                                    <form action="{{route('about.delete')}}" id="delete" method="post">
                                        @csrf
                                        <input type="hidden" name="slider_id" value="{{$about->id}}">
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

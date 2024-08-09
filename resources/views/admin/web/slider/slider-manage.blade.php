@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class=" header-title text-center">Slider Manage <hr></h2>
                    <table id="datatable-buttons" class="table table-striped dt-responsive      ">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Title</th>
                                <th>Sub Title</th>  
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$slider->title_one}}</td>
                                <td>{{$slider->title_two}}</td> 
                                <td>
                                    <img width="100" height="70" src="{{asset($slider->image)}}" alt="">
                                </td>
                                <td >
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{route('slider.edit', ['id' => $slider->id])}}" class="btn btn-success btn-sm  " title="Edit">
                                                    <i class="ri-edit-box-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('slider.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="slider_id" value="{{$slider->id}}">
                                                    &nbsp;<input type="submit" onclick="return confirm('Ary you sure to delete this..');" class="btn btn-danger btn-sm " style="padding:5.5px 19px"  value="X">
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    
                                    
                                    
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

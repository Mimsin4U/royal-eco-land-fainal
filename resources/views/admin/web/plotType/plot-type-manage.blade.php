@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Plot Type Manage</h4>
                    <hr><br>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive  ">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Description</th>  
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plotTypes as $plotType)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$plotType->plt_name}}</td>
                                <td>{{$plotType->plt_description}}</td> 
                                <td>
                                    <img width="100" src="{{asset($plotType->plt_image)}}" alt="">
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{route('plotType.edit', ['id' => $plotType->id])}}" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="ri-edit-box-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('plotType.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="plotType_id" value="{{$plotType->id}}">
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

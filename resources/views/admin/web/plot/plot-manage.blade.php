@extends('admin.master') 
@section('body')
@include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Plot Manage</h4>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Project Name</th>
                            <th>Plot Category Name</th>
                            <th>Plot Type Name</th>
                            <th>Plot Size</th> 
                            <th>Price</th> 
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plots as $plot)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$plot->name}}</td>
                                <td>{{$plot->p_name}}</td>
                                <td>{{$plot->plc_name}}</td>
                                <td>{{$plot->plt_name}}</td> 
                                <td>{{$plot->plot_size}}</td>  
                                <td>{{($plot->unit_price)*($plot->plot_size)}}</td>  
                                <td>
                                    <a href="{{route('plot.edit', ['id' => $plot->id])}}" class="btn btn-success btn-sm" title="Edit">
                                        <i class="ri-edit-box-fill"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete').submit();" onclick="return confirm('Ary you sure to delete this..');"> <i class="ri-chat-delete-fill"></i></a>

                                    <form action="{{route('plot.delete')}}" id="delete" method="post">
                                        @csrf
                                        <input type="hidden" name="plot_id" value="{{$plot->id}}">
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

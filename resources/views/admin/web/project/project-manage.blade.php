@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Project Manage</h4>
                    <hr>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Slogan</th> 
                            <th>Location</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$project->p_name}}</td>
                                <td>{{$project->p_slogan}}</td>
                                <td>{{$project->p_location}}</td>
                                <td>{{$project->p_address}}</td>
                                <td>
                                    <img width="100" src="{{asset($project->p_logo)}}" alt="">
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{route('project.edit', ['id' => $project->id])}}" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="ri-edit-box-fill"></i>
                                                </a>
                                            </td>
                                            <td>  
                                                <form action="{{route('project.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="project_id" value="{{$project->id}}">
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

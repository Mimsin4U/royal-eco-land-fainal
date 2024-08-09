@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class=" header-title text-center">Team Manage <hr></h2>
                    <table id="datatable-buttons" class="table table-striped dt-responsive      ">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Designation</th>  
                                <th>Contact Link</th>  
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teamMembers as $team)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->designation}}</td> 
                                <td>{{$team->contact}}</td> 
                                <td>
                                    <img width="100" height="70" src="{{asset($team->image)}}" alt="">
                                </td>
                                <td>{{$team->status == 1 ? 'Active' : 'Inactive'}}</td> 
                                <td >
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{route('team.edit', ['id' => $team->id])}}" class="btn btn-success btn-sm  " title="Edit">
                                                    <i class="ri-edit-box-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('team.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="team_id" value="{{$team->id}}">
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

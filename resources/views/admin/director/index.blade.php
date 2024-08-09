@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Directors</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Director +
                    </button>
                    <hr>
                    @include('notify.notify')
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Code</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($directors as $director)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $director->name }}</td>
                                    <td>{{ $director->email }}</td>
                                    <td>{{ $director->code }}</td>
                                    <td>{{ $director->mobile }}</td>
                                    <td><span class="text-{{ $director->status == 1 ? 'success' : 'danger' }}">{{ $director->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" title="Edit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDirector{{ $director->id }}">
                                                        <i class="ri-edit-box-fill"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form action="{{ route('director.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $director->id }}">
                                                        &nbsp;
                                                        <input type="submit"
                                                            onclick="return confirm('Ary you sure to delete this..');"
                                                            class="btn btn-danger btn-sm " style="padding:5.5px 19px"
                                                            value="X">
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

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="directorModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ route('director.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Add A Director</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="X"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="text" name="email" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Mobile</label>
                            <div class="col-9">
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile" />
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ---- Modal Edit ----  --}}

    @foreach ($directors as $director)
        <div class="modal fade" id="editDirector{{$director->id}}" tabindex="-1" aria-labelledby="directorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" action="{{ route('director.update',['id'=>$director->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Edit This Director</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="X"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Name</label>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name" value="{{$director->name}}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <input type="text" name="email" class="form-control" placeholder="Email"  value="{{$director->email}}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Mobile</label>
                                <div class="col-9">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile"  value="{{$director->mobile}}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-3">
                                Status :
                            </div>
                            <div class="col-9">
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1" {{ $director->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="status" value="0" {{ $director->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

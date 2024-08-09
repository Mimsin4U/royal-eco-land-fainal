@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Manage Plot Category</h4>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Short Description</th>
                                <th>Long Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plotCategories as $plotCat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plotCat->name }}</td>
                                    <td>{{ $plotCat->short_desc}}</td>
                                    <td>{{ $plotCat->long_desc}}</td>
                                    <td>
                                        <img width="100" height="70" src="{{ asset($plotCat->image)}}" alt="">
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.plotCategory.edit', ['id' => $plotCat->id]) }}"
                                                        class="btn btn-success btn-sm" title="Edit">
                                                        <i class="ri-edit-box-fill"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.plotCategory.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="plotCat_id" value="{{ $plotCat->id }}">
                                                        &nbsp;<input type="submit"
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
@endsection

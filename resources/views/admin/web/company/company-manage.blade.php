@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">companyInfo Manage</h4>
                    <hr>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Title</th> 
                            <th>Slogan</th> 
                            <th>Contact Number</th> 
                            <th>Address</th> 
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companyInfos as $companyInfo)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$companyInfo->c_name}}</td>
                                <td>{{$companyInfo->c_title}}</td>
                                <td>{{$companyInfo->c_slogan}}</td>
                                <td>{{$companyInfo->contact_number_one}} | {{$companyInfo->contact_number_two}}</td>
                                <td>{{$companyInfo->c_address_one}} <br> {{$companyInfo->c_address_two}}</td>
                                <td>
                                    <img width="50" src="{{asset($companyInfo->c_logo_jpg)}}" alt="">
                                    <img width="50" src="{{asset($companyInfo->c_logo_png)}}" alt="">
                                    <img width="50" src="{{asset($companyInfo->c_favicon)}}" alt="">
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{route('companyInfo.edit', ['id' => $companyInfo->id])}}" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="ri-edit-box-fill"></i>
                                                </a>
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

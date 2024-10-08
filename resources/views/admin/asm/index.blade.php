@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Asistent Sales Managers</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#assistantSalesManegerModal">
                        Add Asistent Sales Manager +
                    </button>
                    <hr>
                    @include('notify.notify')
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name | Code</th>
                                <th>Director | Code</th>
                                <th>Joint Director Name | Code</th>
                                <th>Senior Maneger Name | Code</th>
                                <th>Email</th>
                                <th>Code</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assistantSalesManegers as $assistantSalesManeger)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assistantSalesManeger->name}} ({{ $assistantSalesManeger->code}})</td>
                                    <td>{{ $assistantSalesManeger->director->name}} ({{ $assistantSalesManeger->director->code}})</td>
                                    <td>{{ $assistantSalesManeger->jointDirector->name ?? 'None'}} ({{ $assistantSalesManeger->jointDirector->code ?? ''}})</td>
                                    <td>{{ $assistantSalesManeger->seniorManeger->name ?? 'None'}} ({{$assistantSalesManeger->seniorManeger->code ?? ''}})</td>
                                    <td>{{ $assistantSalesManeger->email }}</td>
                                    <td>{{ $assistantSalesManeger->code }}</td>
                                    <td>{{ $assistantSalesManeger->mobile }}</td>
                                    <td><span
                                            class="text-{{ $assistantSalesManeger->status == 1 ? 'success' : 'danger' }}">{{ $assistantSalesManeger->status == 1 ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" title="Edit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editAsm{{ $assistantSalesManeger->id }}">
                                                        <i class="ri-edit-box-fill"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form action="{{ route('assistantSalesManeger.delete') }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $assistantSalesManeger->id }}">
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

    <!-- Modal -->
    <div class="modal modal-lg fade" id="assistantSalesManegerModal" tabindex="-1"
        aria-labelledby="assistantSalesManegerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{ route('assistantSalesManeger.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center" id="assistantSalesManegerModal">Add  Assistent Sales Manager</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="X"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Director</label>
                            <div class="col-9">
                                @if (Str::startsWith( auth()->user()->code,'D'))
                                    <h5>{{auth()->user()->name}}</h5>
                                @elseif (Str::startsWith( auth()->user()->code,'JD'))
                                    <h5>{{$directors[0]->name}}</h5>
                                @elseif (Str::startsWith( auth()->user()->code,'SM'))
                                    <h5>{{$directors[0]->name??'None'}}</h5>
                                @else
                                    <select name="director_id" class="form-select" id="director" required>
                                        <option value="">Select Director</option>
                                        @foreach ($directors as $director)
                                            <option value="{{$director->id}}">{{$director->name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Joint Director</label>
                            <div class="col-9">
                                @if (Str::startsWith( auth()->user()->code,'JD'))
                                    <h5>{{auth()->user()->name}}</h5>
                                @elseif (Str::startsWith( auth()->user()->code,'SM'))
                                    <h5>{{$jointDirectors[0]->name}}</h5>
                                @else
                                <select name="joint_director_id" class="form-select" id="jointDirector">
                                    <option value="">-- Select or Skip Joint Director --</option>
                                    @foreach ($jointDirectors as $jointDirector)
                                        <option value="{{$jointDirector->id}}">{{$jointDirector->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Senior Maneger</label>
                            <div class="col-9">
                                @if (Str::startsWith( auth()->user()->code,'SM'))
                                    <h5>{{$seniorManegers[0]->name}}</h5>
                                @else
                                <select name="senior_maneger_id" class="form-select" id="sm">
                                    <option value="">-- Select or Skip Senior Maneger --</option>
                                    @foreach ($seniorManegers as $seniorManeger)
                                        <option value="{{ $seniorManeger->id }}">{{ $seniorManeger->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Name" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="text" name="email" class="form-control" placeholder="Email" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Mobile</label>
                            <div class="col-9">
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile" required/>
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

    @foreach ($assistantSalesManegers as $assistantSalesManeger)
        <div class="modal fade" id="editAsm{{$assistantSalesManeger->id}}" tabindex="-1"
            aria-labelledby="directorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal"
                        action="{{ route('assistantSalesManeger.update', ['id' => $assistantSalesManeger->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Edit Asistent Senior Maneger
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="X"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Name</label>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name" value="{{ $assistantSalesManeger->name }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Director</label>
                                <div class="col-9">
                                    <select name="director_id" class="form-select" id="director">
                                        <option value="">Select Director</option>
                                        @foreach ($directors as $director)
                                            <option value="{{ $director->id }}"
                                                {{ $assistantSalesManeger->director->id == $director->id ? 'selected' : '' }}>
                                                {{ $director->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Joint Director</label>
                                <div class="col-9">
                                    <select name="joint_director_id" class="form-select" id="jointDirector">
                                        <option value="">Select Joint Director</option>
                                        @foreach ($jointDirectors as $jointDirector)
                                            <option value="{{ $jointDirector->id }}"
                                                {{ $assistantSalesManeger->jointDirector->id ?? null == $jointDirector->id ? 'selected' : '' }}>
                                                {{ $jointDirector->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Senior Maneger</label>
                                <div class="col-9">
                                    <select name="senior_maneger_id" class="form-select" id="jointDirector">
                                        <option value="">Select Senior Maneger</option>
                                        @foreach ($seniorManegers as $seniorManeger)
                                            <option value="{{ $seniorManeger->id }}" {{ $assistantSalesManeger->seniorManeger->id ?? null == $seniorManeger->id ? 'selected' : '' }}>
                                                {{ $seniorManeger->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ $assistantSalesManeger->email }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-3 col-form-label">Mobile</label>
                                <div class="col-9">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                        value="{{ $assistantSalesManeger->mobile }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3">
                                    Status :
                                </div>
                                <div class="col-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            {{ $assistantSalesManeger->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            {{ $assistantSalesManeger->status == 0 ? 'checked' : '' }}>
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
@section('script')
    <script>
        $("#director").change(function() {
            $.ajax({
                url: "{{ route('jointDirectorsByDirector') }}",
                method: 'GET',
                data: {
                    did: $(this).val()
                },
                success: function(response) {
                    $('#jointDirector').html($("<option></option>").attr("value", '').text(
                        '--- Select Joint Director ---'));
                    $.each(response, function(e, v) {
                        $('#jointDirector').append($("<option></option>").attr("value", v.id)
                            .text(v.name));
                    });
                }
            });
        });
        $("#jointDirector").change(function() {
            $.ajax({
                url: "{{ route('smByjointDirector') }}",
                method: 'GET',
                data: {
                    jdid: $(this).val()
                },
                success: function(response) {
                    $('#sm').html($("<option></option>").attr("value", '').text(
                        '--- Select Senior Maneger ---'));
                    $.each(response, function(e, v) {
                        $('#sm').append($("<option></option>").attr("value", v.id).text(v
                        .name));
                    });
                }
            });
        });
    </script>
@endsection

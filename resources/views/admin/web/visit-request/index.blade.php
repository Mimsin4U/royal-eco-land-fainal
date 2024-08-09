@extends('admin.master')
@section('body')

<div class="row ">
    <h1 class="text-center mt-3">Client Visit Requests</h1>
</div>
@include('notify.notify')
<div class="row">
    <div class="col-md-12">
        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>SL NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Request For</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Assigned To</th>
                    <th>Visit Date</th>
                    <th>Follow Date</th>
                    <th>Feedback</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitRequests as $visitRequest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $visitRequest->name }}</td>
                    <td>{{ $visitRequest->email }}</td>
                    <td>{{ $visitRequest->mobile }}</td>
                    <td>{{ $visitRequest->category_name }}</td>
                    <td>{{ $visitRequest->message }}</td>
                    <td>
                        <button type="button" value="{{$visitRequest->id}}" class="btn btn-dark btn-sm">
                            <span class="text-{{ $visitRequest->status == 'Pending..' ? 'danger' : 'success' }}">
                                {{$visitRequest->status}}
                            </span>
                        </button>
                    </td>
                    <td>
                        <button type="button" id="updateStatusBtn" value="{{$visitRequest->id}}" class="btn btn-light btn-sm" title="Click to Assign" {{ $visitRequest->status != 'Pending..' ? 'disabled' : '' }}>
                            <span class="text-dark">
                                {{ $visitRequest->assigned_to ?? 'None' }}
                            </span>
                        </button>
                    </td>
                    <td>
                        {{$visitRequest->visit_date ? date('F j, Y', strtotime($visitRequest->visit_date)) : 'N/A'}}
                    </td>
                    
                    <td>
                        {{$visitRequest->follow_date ? date('F j, Y', strtotime($visitRequest->follow_date)) : 'N/A'}}
                    </td>
                    <td>
                        {{$visitRequest->feedback ?? 'N/A'}}
                    </td>
                    <td>
                        <table>
                            <tr>
                                @if ($visitRequest->status == 'Confirmed')
                                <td>
                                    <a href="{{route('plotOrder.create', $visitRequest->id )}}" class="btn btn-sm btn-primary ">Add Order</a>
                                </td>
                                @endif
                                <td>
                                    <div class="d-flex g-3">
                                        <form action="{{route('visitRequest.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $visitRequest->id }}">
                                            &nbsp;<input type="submit" onclick="return confirm('Are you sure to delete this ?');" class="btn btn-danger btn-sm" style="padding:5.5px 19px" value="X">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="">Assign This Request</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-inner">
                    <form action="" method="post" class="default-form" id="vrStatusForm">
                        @csrf
                        <div class="form-group">
                            <label for="">Assign To</label>
                            <select name="assigned_to" class="form-select mt-2" required>

                                @foreach ($directorors as $directoror)
                                <option value="{{$directoror->code}}">{{$directoror->name .' - '. $directoror->code}}</option>
                                @endforeach
                                @foreach ($jointDirectors as $jointDirector)
                                <option value="{{$jointDirector->code}}">{{$jointDirector->name .' - '. $jointDirector->code}}</option>
                                @endforeach

                                @foreach ($seniorManegers as $seniorManeger)
                                <option value="{{$seniorManeger->code}}">{{$seniorManeger->name .' - '. $seniorManeger->code}}</option>
                                @endforeach

                                @foreach ($assistantSalesManegers as $asistentSeniorManeger)
                                <option value="{{$asistentSeniorManeger->code}}">{{$asistentSeniorManeger->name .' - '. $asistentSeniorManeger->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Visit Date :</label>
                            <input type="date" class=" ms-2" name="visit_date" required>
                        </div>
                        <div class="mt-3 d-flex">
                            <button type="submit" class="ms-auto btn btn-primary">Assign</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).on('click','#updateStatusBtn',function () {
            var visitRequestId = $(this).val();
            var updateUrl = "{{ url('/visit-requests/update')}}/" + visitRequestId;
            $('#updateStatusModal').modal('show');
            $.ajax({
                method: "GET",
                url: "{{ url('/visit-requests/edit')}}/" + visitRequestId ,
                success: function (r) {
                    // $('#vrStatus').val(r.visitRequest.status);
                    $('#vrStatusForm').attr('action',updateUrl);
                }
            });
        })
</script>
@endsection

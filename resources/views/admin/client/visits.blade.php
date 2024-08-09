@extends('admin.master')
@section('title','Client Visits')
@section('body')
@include('notify.notify')
<h1 class="text-center">Client Visits</h1>
<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>For</th>
            <th>Visit Date</th>
            <th>Client Message</th>
            <th>Status</th>
            <th>Follow Date</th>
            <th>My Feedback</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($visitRequests as $visitRequest)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $visitRequest->name }}</td>
            <td>{{$visitRequest->email}}</td>
            <td>{{ $visitRequest->mobile }}</td>
            <td>{{ $visitRequest->category_name }}</td>
            <td>
                {{$visitRequest->visit_date ? date('F j, Y', strtotime($visitRequest->visit_date)) : 'N/A'}}
            </td>
            <td>{{ $visitRequest->message }}</td>
            <td>
                <a href="{{route('client.visit.update',$visitRequest->id)}}" class="btn btn-sm btn-{{ $visitRequest->status == 'Connected' ? 'success' : 'warning' }} {{ $visitRequest->status == 'Confirmed' ? 'disabled' : '' }}" >
                        {{$visitRequest->status== 'Assigned' ? 'Connect' : 'Connected'}}
                </a>
            </td>
            <td>
                {{$visitRequest->follow_date ? date('F j, Y', strtotime($visitRequest->follow_date)) : 'N/A'}}
            </td>
            <td>
                @if ($visitRequest->feedback)
                {{$visitRequest->feedback}}
                @else
                <button type="button" id="feedbackBtn" value="{{$visitRequest->id}}" class="btn btn-sm btn-primary" {{ $visitRequest->status == 'Confirmed' ? 'disabled' : '' }}>
                    Give Feedback
                </button>
                @endif
            </td>
            <td>
                <a href="{{route('client.visit.confirm', $visitRequest->id )}}" class="btn btn-sm btn-danger {{ $visitRequest->status == 'Confirmed' ? 'disabled' : '' }}">Confirmed</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Give A Feedback</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-inner">
                    <form action="" method="POST" class="default-form" id="feedbackForm">
                        @csrf
                        <div class="form-group">
                            <label for="">Feedback</label>
                            <textarea class="form-control" name="feedback" cols="30" rows="2"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Next Follow Date :</label>
                            <input type="date" class=" ms-2" name="follow_date" required>
                        </div>
                        <div class="mt-3 d-flex">
                            <button type="submit" class="ms-auto btn btn-primary">Give Feedback</button>
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
    $(document).on('click','#feedbackBtn',function () {
            var visitRequestId = $(this).val();
            var url = "{{ url('/client/visit/feedback')}}/" + visitRequestId;
            $('#feedbackForm').attr('action',url);
            $('#feedbackModal').modal('show');
    });
</script>
@endsection

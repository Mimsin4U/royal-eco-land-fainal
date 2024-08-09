@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class=" header-title text-center">Faq Manage <hr></h2>
                    <table id="datatable-buttons" class="table table-striped dt-responsive      ">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->answer}}</td>
                                <td>{{$faq->status == 1 ? 'Active' : 'Inactive'}}</td> 
                                <td >
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{route('faq.edit', ['id' => $faq->id])}}" class="btn btn-success btn-sm  " title="Edit">
                                                    <i class="ri-edit-box-fill"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('faq.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="faq_id" value="{{$faq->id}}">
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

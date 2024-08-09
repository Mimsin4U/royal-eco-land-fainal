@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Edit Faq</h4>
                    <hr>
                    <form class="form-horizontal" action="{{route('faq.update', ['id' => $faq->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Faq Question</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="question" value="{{$faq->question}}"  placeholder="Question"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Faq Answer</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="answer" value="{{$faq->answer}}" id="title" placeholder="Answer" />
                            </div>
                        <div class="row mb-3 mt-2">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" {{$faq->status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="status" value="0" {{$faq->status == 0 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary">Update Faq</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

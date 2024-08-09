@extends('admin.master')

@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Create Faq</h4>
                    <hr><br>
                    <form class="form-horizontal" action="{{route('faq.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Faq Question</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="question" id="title" placeholder="Question"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subTitle" class="col-3 col-form-label">Faq Answer</label>
                            <div class="col-9">
                                <textarea name="answer" class="form-control" placeholder="Answer"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" checked/> Active</label>
                                <label><input type="radio" name="status" value="0"/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Add Faq</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection

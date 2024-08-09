@extends('admin.master')

@section('body')
@include('notify.notify')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Edit Hero Content</h4>
                <hr>
                <form class="form-horizontal" action="{{route('hero.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-3 col-form-label">Title</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="title" value="{{$hero->title}}" id="title" placeholder="Title" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="subTitle" class="col-3 col-form-label">Description</label>
                        <div class="col-9">
                            <textarea name="desc" class="form-control"  placeholder="Description">{{$hero->desc}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Choose Hero Vedio</label>
                        <div class="col-9">
                            <input type="file" accept="vedio/*" class="form-control" name="vedio" id="inputEmail34" placeholder="Hero Vedio" />
                        </div>
                    </div>
                    <div class="justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary">Update Hero Content</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection

@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="header-title text-center">Add User</h4>
                    </div>
                    <p class="text-muted font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('user.new')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-12 text-center mb-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        For Admin
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault3" value="2" >
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        For Team
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="selectTeam">
                            <div class="row mb-3"  >
                                <label for="name" class="col-3 col-form-label">Choose Member</label>
                                <div class="col-9">
                                    <select name="code" class="form-select col-9" id="code">
                                        <option value="">-- Select Team Member --</option>

                                        @foreach ($directorors as $directoror)
                                            <option value="{{$directoror->code}}">{{$directoror->name .' - '. $directoror->code}}</option>
                                        @endforeach
                                        @foreach ($jointDirectors as $jointDirector)
                                            <option value="{{$jointDirector->code}}">{{$jointDirector->name .' - '. $jointDirector->code}}</option>
                                        @endforeach
                                        @foreach ($seniorManegers as $seniorManeger)
                                            <option value="{{$seniorManeger->code}}">{{$seniorManeger->name .' - '. $seniorManeger->code}}</option>
                                        @endforeach
                                        @foreach ($asistentSeniorManegers as $asistentSeniorManeger)
                                            <option value="{{$asistentSeniorManeger->code}}">{{$asistentSeniorManeger->name .' - '. $asistentSeniorManeger->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-3 col-form-label">User Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="User Name"/>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail31" class="col-3 col-form-label">User Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email" id="inputEmail31" placeholder="User Email"/>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail32" class="col-3 col-form-label">User Password</label>
                            <div class="col-9">
                                <input type="password" class="form-control" name="password" id="inputEmail32" placeholder="User Password"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail33" class="col-3 col-form-label">User Mobile</label>
                            <div class="col-9">
                                <input type="number" class="form-control" name="mobile" id="inputEmail33" placeholder="User Mobile"/>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create New User</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection
@section('script')
    <script>
        $('#selectTeam').css('display', 'none');
        $("input[name=type]").click(function() {
            if($(this).val() == 1)
            {
                $('#selectTeam').css('display', 'none');
                $("input[name=name]").removeAttr('readonly');
                $("input[name=mobile]").removeAttr('readonly');
                $("input[name=email]").removeAttr('readonly');
            }
            else
            {
                $('#selectTeam').css('display', 'block');
                $("input[name=name]").attr("readonly","readonly").val('');
                $("input[name=mobile]").attr("readonly","readonly").val('');
                $("input[name=email]").attr("readonly","readonly").val('');
            }
        });
    </script>
    <script>
        $("#code").change(function(){
            $.ajax({
                url: "{{route("getTeamByCode")}}",
                method: 'GET',
                data: {code: $(this).val()},
                success: function(response) {
                    $("input[name=name]").val(response.name);
                    $("input[name=mobile]").val(response.mobile);
                    $("input[name=email]").val(response.email);
                }
            });
        });
    </script>
@endsection

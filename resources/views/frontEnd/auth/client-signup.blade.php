<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title> @yield('title') </title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontEndAsset') }}/assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontEndAsset') }}/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/owl.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/style.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/responsive.css" rel="stylesheet">
</head>

<body>
    <section class="ragister-section centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-6 col-md-6 offset-xl-3">
                    <div class="inner-box">
                        <h4 class="text-center">Sign up</h4>
                        <form action="{{route('client.signup')}}" method="post" class="default-form">
                            @csrf
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="name" required value="{{old('name')}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" required value="{{old('password')}}">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" >
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="theme-btn btn-one">Sign up</button>
                            </div>
                        </form>
                        <div class="othre-text">
                            <p>Already have an account? <a href="{{route('client.signin.view')}}">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-js -->
    <script src="{{ asset('frontEndAsset') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontEndAsset') }}/assets/js/script.js"></script>

</body><!-- End of page_wrapper -->
</html>



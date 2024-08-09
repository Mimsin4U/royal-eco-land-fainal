<!DOCTYPE html>
<html lang="en" data-layout="topnav">


<!-- Mirrored from coderthemes.com/hyper_2/saas/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:20:57 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Horizontal Layout | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}admin/assets/images/favicon.ico">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/vendor/daterangepicker/daterangepicker.css">
    <link href="{{ asset('/') }}admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('/') }}admin/assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="{{ asset('/') }}admin/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('/') }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom topnav-navbar">
            <div class="container-fluid detached-nav">

                <!-- Topbar Logo -->
                <div class="logo-topbar">
                    <!-- Logo light -->
                    <a href="index.html" class="logo-light">
                        <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $company->logo_png }}" alt="logo" height="45">
                        </span>
                    </a>

                    <!-- Logo Dark -->
                    <a href="index.html" class="logo-dark">
                        <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $company->logo_png }}" alt="dark logo" height="45">
                        </span>
                    </a>
                </div>
                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="notification-list d-none d-sm-inline-block">
                        <a class="nav-link" href="javascript:void(0)" id="light-dark-mode">
                            <i class="ri-moon-line noti-icon"></i>
                        </a>
                    </li>

                    <li class="notification-list d-none d-md-inline-block">
                        <a class="nav-link" href="#" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{ asset('/') }}admin/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            </span>
                            <span>
                                <span class="account-user-name">{{ Auth::guard('client')->user()->name }}</span>
                                <span class="account-position">{{ Auth::guard('client')->user()->email }}</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault();document.getElementById('client-log-out-form').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                            <form action="{{ route('client.signout') }}" method="post" id="client-log-out-form">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->


        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Right Sidebar -->
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Left sidebar -->
                                    <div class="c">
                                        <div class="email-menu-list mt-2">
                                            <a href="{{route('client.dashboard')}}" class="text-success fw-bold"><i class="ri-article-line me-2"></i>Dashboard</a>
                                            <a href="{{route('client.plots')}}" class="text-success fw-bold"><i class="ri-star-line me-2"></i>My Plot</a>
                                            <a href="{{route('client.paymentSummery')}}" class="text-success fw-bold"><i class="ri-article-line me-2"></i>Payment Summery</a>
                                            <a href="{{route('client.installments')}}" class="text-success fw-bold"><i class="ri-time-line me-2"></i>Installments</a>
                                            <a href="{{route('client.profile')}}" class="text-success fw-bold"><i class="ri-time-line me-2"></i>My Profile</a>
                                            <a href="{{route('client.changePassword')}}" class="text-success fw-bold"><i class="ri-time-line me-2"></i>Change Password</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                                <div class="clearfix"></div>
                            </div> <!-- end card-box -->
                        </div> <!-- end Col -->
                        <div class="col-9">
                            <div class="card">
                                <div class="card-body">
                                    <!-- End Left sidebar -->
                                    @yield('content')
                                    <!-- end inbox-rightbar-->
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->

                </div>
                <!-- container -->

            </div>


            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Royal Eco Land
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('/') }}admin/assets/js/vendor.min.js"></script>

    <!-- Daterangepicker js -->
    <script src="{{ asset('/') }}admin/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/daterangepicker/daterangepicker.js"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('/') }}admin/assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('/') }}admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script src="{{ asset('/') }}admin/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
    </script>

    <!-- Dashboard App js -->
    <script src="{{ asset('/') }}admin/assets/js/pages/demo.dashboard.js"></script>

    <!-- App js -->
    <script src="{{ asset('/') }}admin/assets/js/app.min.js"></script>

</body>

</html>

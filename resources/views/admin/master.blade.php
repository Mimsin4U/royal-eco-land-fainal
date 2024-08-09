<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}admin/assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet"
        href="{{ asset('/') }}admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="{{ asset('/') }}admin/assets/js/hyper-config.js"></script>
    <!-- Datatables css -->
    <link href="{{ asset('/') }}admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('/') }}admin/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('/') }}admin/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}admin/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}admin/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}admin/assets/vendor/simplemde/simplemde.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme Config Js -->
    <script src="{{ asset('/') }}admin/assets/js/hyper-config.js"></script>
    <!-- App css -->
    <link href="{{ asset('/') }}admin/assets/css/app-saas.min.css" rel="stylesheet" type="text/css"
        id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('/') }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    {{-- Select 2  --}}
    <link href="{{ asset('/') }}admin/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        html[data-sidenav-color=dark] .leftside-menu .logo {
            background: #fff !important;
        }
    </style>
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
                    <a href="index.html" class="logo-light" background="black">
                        <span class="logo-lg">
                            <img src="{{ asset('/') }}admin/assets/images/logo.png" alt="logo" height="22">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}admin/assets/images/logo-sm.png" alt="small logo"
                                height="22">
                        </span>
                    </a>
                    <!-- Logo Dark -->
                    <a href="index.html" class="logo-dark">
                        <span class="logo-lg">
                            <img src="{{ asset('/') }}admin/assets/images/logo-dark.png" alt="dark logo"
                                height="22">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}admin/assets/images/logo-dark-sm.png" alt="small logo"
                                height="22">
                        </span>
                    </a>
                </div>

                <!-- Sidebar Menu Toggle Button -->
                <button class="button-toggle-menu">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- Horizontal Menu Toggle Button -->
                <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>

                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="dropdown notification-list d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>
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
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{ asset('/') }}admin/assets/images/users/avatar-1.jpg" alt="user-image"
                                    class="rounded-circle">
                            </span>
                            <span>
                                <span class="account-user-name">{{ Auth::user()->name ?? '' }}</span>
                                <span class="account-position">( Name )</span>
                            </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item"
                                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <!-- Topbar Search Form -->
                <div class="app-search dropdown">
                    <form>
                        <div class="input-group">
                            <input type="search" class="form-control dropdown-toggle" placeholder="Search..."
                                id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                        </div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-notes font-16 me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-life-ring font-16 me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-cog font-16 me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle"
                                        src="{{ asset('/') }}admin/assets/images/users/avatar-2.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle"
                                        src="{{ asset('/') }}admin/assets/images/users/avatar-5.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">
            <!-- Logo Light -->
            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('/') }}royal_eco_land.png" alt="logo" height="50">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('/') }}admin/assets/images/logo-sm.png" alt="small logo" height="22">
                </span>
            </a>
            <!-- Logo Dark -->
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('/') }}admin/assets/images/logo-dark.png" alt="dark logo" height="22">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('/') }}admin/assets/images/logo-dark-sm.png" alt="small logo"
                        height="22">
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip"
                data-bs-placement="right" title="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </button>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!-- Leftbar User -->
                <div class="leftbar-user">
                    <a href="pages-profile.html">
                        <img src="{{ asset('/') }}admin/assets/images/users/avatar-1.jpg" alt="user-image"
                            height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name">Dominic Keller</span>
                    </a>
                </div>
                @if ( Str::startsWith( auth()->user()->code,'D') )
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-title side-nav-item">Navigation</li>
                        <li class="side-nav-item">
                            <a href="{{ route('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team"
                                class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Team module </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="team">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('jointDirector.manage') }}">Manage Joint Director</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('seniorManeger.manage') }}"> Manage SM </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('assistantSalesManeger.manage') }}">Manage ASM </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('client.visits') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> My Client Visits </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('plotOrders') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> My Plot Orders </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.commissions') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Commissions </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Withdraw Money </span>
                            </a>
                        </li>
                    </ul>
                @elseif (Str::startsWith( auth()->user()->code,'JD'))
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-title side-nav-item">Navigation</li>
                        <li class="side-nav-item">
                            <a href="{{ route('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team"
                                class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Team module </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="team">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('seniorManeger.manage') }}"> Manage SM </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('assistantSalesManeger.manage') }}">Manage ASM </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('client.visits') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> My Client Visits </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('plotOrders') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> My Plot Orders </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.commissions') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Commissions </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                        <a href="" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span>Withdraw Money </span>
                        </a>
                    </li>
                    </ul>
                @elseif (Str::startsWith( auth()->user()->code,'SM'))
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-title side-nav-item">Navigation</li>
                        <li class="side-nav-item">
                            <a href="{{ route('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team"
                                class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Team module </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="team">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('assistantSalesManeger.manage') }}">Manage ASM </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('client.visits') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> My Client Visits </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('plotOrders') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> My Plot Orders </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.commissions') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Commissions </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                        <a href="" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span>Withdraw Money </span>
                        </a>
                    </li>
                    </ul>
                @elseif (Str::startsWith( auth()->user()->code,'ASM'))
                <!--- Sidemenu -->
                <ul class="side-nav">
                    <li class="side-nav-title side-nav-item">Navigation</li>
                    <li class="side-nav-item">
                        <a href="{{ route('dashboard') }}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    {{-- <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Team module </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="team">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('assistantSalesManeger.manage') }}">Manage ASM </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="side-nav-item">
                        <a href="{{ route('client.visits') }}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> My Client Visits </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('plotOrders') }}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> My Plot Orders </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('admin.commissions') }}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span>Commissions </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span>Withdraw Money </span>
                        </a>
                    </li>
                </ul>    
                @else
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-title side-nav-item">Navigation</li>
                        <li class="side-nav-item">
                            <a href="{{ route('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> User Module </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    {{-- <li>
                                        <a href="{{ route('role.add') }}">Add Role</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('role.manage') }}">Manage Role</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('user.add') }}">Add User</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.manage') }}">Manage User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#client" aria-expanded="false" aria-controls="client" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Client Module </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="client">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('client.signup') }}">Add Client</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        {{-- <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#plot1" aria-expanded="false" aria-controls="#plot1"
                                class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Plot Module </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="plot1">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('plot.index') }}"> Add Plot </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('plot.manage') }}">Manage</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team"
                                class="side-nav-link">
                                <i class="uil-store"></i>
                                <span>Sicial Seles Team</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="team">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('director.manage') }}"> Manage Director</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('jointDirector.manage') }}">Manage Joint Director</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('seniorManeger.manage') }}"> Manage SM </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('assistantSalesManeger.manage') }}">Manage ASM </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('visitRequests') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Visit Requests </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('plotOrders') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Plot Orders </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.reciveInstallmentView') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Recive Installment </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('admin.commissions') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Commissions </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommercePlot" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span>Plot Category</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommercePlot">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('admin.plotCategory.create')}}">Add Plot Category</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.plotCategory.manage')}}">Manage Plot Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> Company Settings </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('company.index') }}">Company Information</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesSlider" aria-expanded="false" aria-controls="sidebarPagesSlider">
                                            <span> Slider </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesSlider">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="{{ route('slider') }}">Add Slider </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('slider.manage') }}">Manage</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesGallery" aria-expanded="false" aria-controls="sidebarPagesGallery">
                                            <span>Gallery </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesGallery">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="{{ route('gallery.manage') }}">Manage</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesMembers" aria-expanded="false" aria-controls="sidebarPagesMembers">
                                            <span>Corporate Team</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesMembers">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="{{ route('team') }}">Add Member </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('team.manage') }}">Manage Members</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesTestimonial" aria-expanded="false" aria-controls="sidebarPagesTestimonial">
                                            <span>Testimonial</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesTestimonial">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="{{ route('testimonial') }}">Add Testimonial</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('testimonial.manage') }}">Manage Testimonials</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarPagesFAQs" aria-expanded="false" aria-controls="sidebarPagesFAQs">
                                            <span> FAQs</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesFAQs">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="{{ route('faq') }}">Add FAQ </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('faq.manage') }}">Manage FAQs</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('hero.edit') }}">Hero Content</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                @endif
                <!--- End Sidemenu -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid mt-3">
                    @yield('body')
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <!-- Footer Start -->
            <footer class="footer position-fixed bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Royal Eco-Land Ltd.
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

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="card mb-0 p-3">
                    <h5 class="mt-0 font-16 fw-bold mb-3">Choose Layout</h5>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                    class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                    <span class="d-flex h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Vertical</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                    class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                    <span class="d-flex h-100 flex-column">
                                        <span class="bg-light d-flex p-1 align-items-center border-bottom">
                                            <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                            <span class="d-block border border-3 ms-auto"></span>
                                            <span class="d-block border border-3 ms-1"></span>
                                            <span class="d-block border border-3 ms-1"></span>
                                            <span class="d-block border border-3 ms-1"></span>
                                        </span>
                                        <span class="bg-light d-block p-1"></span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Horizontal</h5>
                        </div>
                    </div>
                    <h5 class="my-3 font-16 fw-bold">Color Scheme</h5>
                    <div class="colorscheme-cardradio">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-theme"
                                        id="layout-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column bg-white">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-theme"
                                        id="layout-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100 bg-black"
                                        for="layout-color-dark">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light-lighten d-flex h-100 flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light-lighten d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>
                    <div id="layout-width">
                        <h5 class="my-3 font-16 fw-bold">Layout Mode</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-mode"
                                        id="layout-mode-fluid" value="fluid">
                                    <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-fluid">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                            </div>
                            <div class="col-4" id="layout-boxed">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-mode"
                                        id="layout-mode-boxed" value="boxed">
                                    <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-mode-boxed">
                                        <span class="d-flex h-100 border-start border-end">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end flex-column p-1">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                            </div>
                            <div class="col-4" id="layout-detached">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-mode"
                                        id="data-layout-detached" value="detached">
                                    <label class="form-check-label p-0 avatar-md w-100" for="data-layout-detached">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-flex p-1 align-items-center border-bottom">
                                                <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                <span class="d-block border border-3 ms-auto"></span>
                                                <span class="d-block border border-3 ms-1"></span>
                                                <span class="d-block border border-3 ms-1"></span>
                                                <span class="d-block border border-3 ms-1"></span>
                                            </span>
                                            <span class="d-flex h-100 p-1 px-2">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Detached</h5>
                            </div>
                        </div>
                    </div>
                    <h5 class="my-3 font-16 fw-bold">Topbar Color</h5>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-topbar-color"
                                    id="topbar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                    <span class="d-flex h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-topbar-color"
                                    id="topbar-color-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                    <span class="d-flex h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-dark d-block p-1"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>
                    <div id="sidebar-color">
                        <h5 class="my-3 font-16 fw-bold">Sidebar Color</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-color"
                                        id="leftbar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-color"
                                        id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-dark d-flex h-100 flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-color"
                                        id="leftbar-color-default" value="default">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-default">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                    <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-size">
                        <h5 class="my-3 font-16 fw-bold">Sidebar Size</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-size"
                                        id="leftbar-size-default" value="default">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-size"
                                        id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-compact">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                                    <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-size"
                                        id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column">
                                                    <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-size"
                                        id="leftbar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label p-0 avatar-md w-100"
                                        for="leftbar-size-small-hover">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 border-end  flex-column">
                                                    <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                    <span class="d-block border border-3 w-100 mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Hover View</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidenav-size"
                                        id="leftbar-size-full" value="full">
                                    <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
                                        <span class="d-flex h-100">
                                            <span class="flex-shrink-0">
                                                <span class="d-flex h-100 border-end  flex-column">
                                                    <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                            </div>
                        </div>
                    </div>
                    <div id="layout-position">
                        <h5 class="my-3 font-16 fw-bold">Layout Position</h5>
                        <div class="btn-group radio" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-fixed" value="fixed">
                            <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                    <div id="sidebar-user">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="sidebar-user"
                                    id="sidebaruser-check">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary w-100">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
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
    <script
        src="{{ asset('/') }}admin/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
    </script>
    <!-- Dashboard App js -->
    <script src="{{ asset('/') }}admin/assets/js/pages/demo.dashboard.js"></script>
    <!-- Datatables js -->
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js">
    </script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js">
    </script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="{{ asset('/') }}admin/assets/js/pages/demo.datatable-init.js"></script>
    <!-- App js -->
    <script src="{{ asset('/') }}admin/assets/js/app.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/simplemde/simplemde.min.js"></script>
    <!-- SimpleMDE demo -->
    <script src="{{ asset('/') }}admin/assets/js/pages/demo.simplemde.js"></script>
    <script src="{{ asset('/') }}admin/assets/vendor/select2/js/select2.min.js"></script>
    @yield('script')
</body>

</html>

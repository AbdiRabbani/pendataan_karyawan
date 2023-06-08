<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Employee Profile | PT. Toyotomo</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('template/css/material-dashboard.css?v=3.0.4')}}" rel="stylesheet" />

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />


    <style>
        .bg-light-green {
            background: #22a78c;
        }

        body {
            overflow-x: hidden;
        }

    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">

        <div class="sidenav-header">
            <a class="navbar-brand m-0" href="/home">
                <span class="ms-1 font-weight-bold text-white">Employee Profile</span>
            </a>
        </div>

        <hr class="horizontal light mt-0 mb-2">

        <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/home">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-houses-fill"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/leave">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-telephone-outbound-fill"></i> </div>
                        <span class="nav-link-text ms-1">Leave Permit</span>
                    </a>
                </li>

                @if(Auth::user()->level == 'admin')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Administration
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="/user">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="/biodata">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="nav-link-text ms-1">Biodata</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="/departement">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-journal-arrow-up"></i>
                        </div>
                        <span class="nav-link-text ms-1">Departement</span>
                    </a>
                </li>
                @endif()


                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="/profile">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-badge"></i>
                        </div>

                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-box-arrow-left"></i>
                        </div>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </aside>

    <main class="main-content border-radius-lg ">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        @yield('content')
    </main>

    <!--   Core JS Files   -->
    <script src="{{asset('template/js/core/popper.min.js')}}"></script>
    <script src="{{asset('template/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('template/js/plugins/smooth-scrollbar.min.js')}}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('template/js/material-dashboard.min.js?v=3.0.4')}}"></script>

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('template/img/favicon.png')}}">
    <title>
        Login
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('template/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('template/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('template/css/material-dashboard.css?v=3.0.4')}}" rel="stylesheet" />

    <style>
        .bg-light-green {
            background: #22a78c;
        }
    </style>
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url({{asset('template/img/company-pict.png')}});">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-light-green shadow-lg border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                    <div class="row mt-3">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3 row">
                                        <label for="email"
                                            class="text-md-right me-2">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group input-group-outline mb-3 row">
                                        <label for="password"
                                            class="text-md-right me-2">{{ __('Password') }}</label>

                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="bg-light-green p-2 rounded border text-white px-3">
                                            {{ __('Sign In') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())

                                </script>,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="https://idn.sch.id" class="font-weight-bold text-white" target="_blank">IDN
                                    Boarding School Student</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{asset('tempate/js/core/popper.min.js')}}"></script>
    <script src="{{asset('tempate/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('tempate/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('tempate/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('tempate/js/material-dashboard.min.js?v=3.0.4')}}"></script>
</body>

</html>

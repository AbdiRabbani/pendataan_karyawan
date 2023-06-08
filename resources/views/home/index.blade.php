@extends('layouts.app')

@section('content')
@if(Auth::user()->level == 'admin')
@include('home.admin')
@else

<style>
    @media screen and (max-width: 767px) {
        .side-img {
            display: none;
        }
    }
</style>
<div class="container-fluid d-flex row" style="height: 90vh;">
    <div class="col-md-6 d-flex row align-items-center">
        <div class="mx-2 col-md-12 mt-5">
            <p class="h5">Hi {{Auth::user()->name}}</p>
            <p class="h2">Welcome to PT Toyotomo Leave Permit</p>
            <p class="h6">A simply web for employee of PT Toyotomo Leave Permit, This website is a project made by
                students from IDN boarding school for a competency test before an internship</p>
        </div>
        <div class="mt-4 col-md-12 d-flex justify-content-end">
            <a href="/leave" class="bg-light-green text-white px-5 py-3 text-center rounded">Leave</a>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())

                            </script>,
                            made by
                            <a href="https://idn.sch.id/" class="font-weight-bold" target="_blank">IDN Boarding School
                                Student</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="col-md-6 bg-light-green rounded side-img">

    </div>

</div>
@endif
@endsection

@extends('layouts.app')

@section('content')
@if(Auth::user()->level == 'admin')
@include('home.admin')
@else
<div class="container-fluid d-flex row" style="height: 90vh;">
    <div class="col-md-6">
        <div class="mx-2 col-md-12 mt-7">
            <p class="h5">Hi {{Auth::user()->name}}</p>
            <p class="h2">Welcome to PT Toyotomo Leave Permit</p>
            <p class="h6">A simply web for employee of PT Toyotomo Leave Permit, This website is a project made by
                students from IDN boarding school for a competency test before an internship</p>
        </div>
        <div class="mt-4 col-md-12 d-flex justify-content-end">
            <a href="/leave" class="bg-light-green text-white px-5 py-3 text-center rounded">Leave</a>
        </div>
    </div>
    <div class="col-md-6 bg-light-green rounded">

    </div>

</div>
@endif
@endsection

@extends('layouts.app')

@section('content')

@if(Auth::user()->level == 'admin')
<div class="container">
    Saya adalah admin
</div>
@else
<div class="container">
    saya adalah karyawan
</div>
@endif

@endsection

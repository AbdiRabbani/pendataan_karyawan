@extends('layouts.app')

@section('content')
   {{-- @if (Auth::user()->level=='admin') --}}
       @include('admin.admin')
    {{-- @else
    <p>KOntol</p>
   @endif --}}
@endsection

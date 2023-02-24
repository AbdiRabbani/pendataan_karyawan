@extends('layouts.app')
@section('content')
<div class="container">
    <form class="form" action="{{route('user.store')}}" method="post">
        @csrf

        <label for="formContent">
            <h3>User</h3>
        </label>
        <div class="col-md-12 row d-flex">
            <div class="col-md-4" id="formContent">
                <label for="dataName">Name</label>
                <input name="name" type="text" id="dataName" class="border p-2 form-control mb-3">
                <label for="dataEmail">EMail</label>
                <input name="email" type="email" id="dataEmail" class="border p-2 form-control mb-3">
                <label for="dataPassword">Password</label>
                <input name="password" type="password" id="dataPassword" class="border p-2 form-control mb-3">
            </div>
        </div>

        <div class="col-md-12 px-5 d-flex justify-content-end">
            <input type="submit" class="btn btn-success align-end">
        </div>
    </form>
</div>
@endsection

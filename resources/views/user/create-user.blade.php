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
                <input  name="name" type="text" id="dataName" class="border p-2 form-control mb-3 @error('name') is-invalid @enderror">
                @error('name')
                  <div class="invalid-feedback">
                     {{$message}}
                    </div>
                 @enderror
                <label for="dataEmail">EMail</label>
                <input  name="email" type="email" id="dataEmail" class="border p-2 form-control mb-3 @error('email') is-invalid @enderror">
                @error('email')
                  <div class="invalid-feedback">
                     {{$message}}
                    </div>
                 @enderror
                <label for="dataRole">Role</label>
                <select  name="level" id="dataRole" class="border p-2 form-control mb-3 @error('level') is-invalid @enderror">
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="staff">Leader/Staff</option>
                    <option value="administration">Operator/Administrasi</option>
                </select>
                <label for="dataPassword">Password</label>
                <input  name="password" type="password" id="dataPassword" class="border p-2 form-control mb-3 @error('password') is-invalid @enderror">
                @error('password')
                  <div class="invalid-feedback">
                     {{$message}}
                    </div>
                 @enderror
            </div>
        </div>

        <div class="col-md-12 px-5 d-flex justify-content-end">
            <input type="submit" class="btn btn-success align-end">
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" action="{{route('user.update', $user->id)}}" method="post">
        @csrf
        {{method_field('PUT')}}
        <label for="formContent">
            <h3>User</h3>
        </label>
        <div class="col-md-12 row d-flex">
            <div class="col-md-4" id="formContent">
                <label for="dataName">Name</label>
                <input name="name" type="text" id="dataName" class="border p-2 form-control mb-3" value="{{$user->name}}">
                <label for="dataEmail">EMail</label>
                <input name="email" type="email" id="dataEmail" class="border p-2 form-control mb-3" value="{{$user->email}}">
                <label for="dataRole">Role</label>
                <select name="level" id="dataRole" class="border p-2 form-control mb-3">
                    <option value="{{$user->level}}">{{$user->level}}--current</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="staff">staff</option>
                </select>
                <label for="dataPassword">Password</label>
                <input name="password" type="password" id="dataPassword" class="border p-2 form-control mb-3" placeholder="Input new password">
            </div>
        </div>

        <div class="col-md-12 px-5 d-flex justify-content-end">
            <input type="submit" class="bg-light-green p-2 px-3 rounded border text-white align-end align-end">
        </div>
    </form>
</div>
@endsection
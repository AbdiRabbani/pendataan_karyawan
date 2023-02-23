@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                        <h6 class="text-white text-capitalize ps-3 col-md-10">Users table</h6>
                        <h6 class="text-white text-capitalize ps-3 col-md-2 align-middle text-sm text-center">
                            <a class="text-white" href="/user/create"><i class="fa fa-user-plus"></i>Tambah User</a>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </thead>
                        <tbody>
                            @foreach($user as $row)
                            <tr>
                                <td class="px-4">{{$row->name}}</td>
                                <td class="px-4">{{$row->level}}</td>
                                <td class="px-4">{{$row->email}}</td>
                                <td class="align-middle text-center text-sm">
                                        <form action="{{ url('user/delete/'.$row->id) }}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <a href="{{ url('user/edit/'.$row->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="#" class="btn btn-success">Detail</a>
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

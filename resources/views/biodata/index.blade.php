@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light-green shadow-primary border-radius-lg pt-4 pb-3 row">
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
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th class="text-center">Action</th>
                            </thead>
                        <tbody>
                            @foreach($bio as $row)
                            <tr>
                                <td class="px-4">
                                    <img src="{{asset('/storage/images/profile/'.$row->photo)}}" alt="" class="img-thumbnail" width="70px">
                                </td>
                                <td class="px-4">{{$row->user->name}}</td>
                                <td class="px-4">{{$row->user->email}}</td>
                                <td class="px-4">{{$row->title->title_name}}</td>
                                <td class="align-middle text-center text-sm">
                                        <form action="{{route('biodata.destroy', $row->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <a href="{{route('biodata.edit', $row->id)}}" class="btn btn-warning">
                                               Edit
                                            </a>
                                            <a href="{{route('biodata.show', $row->id)}}" class="btn btn-success">
                                               Detail
                                            </a>
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
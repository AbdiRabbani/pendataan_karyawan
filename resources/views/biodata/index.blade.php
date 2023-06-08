@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light-green shadow-primary border-radius-lg pt-4 pb-3 row">
                        <h6 class="text-white text-capitalize ps-3 col-md-10">Biodata</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table">
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
                                    <img src="{{asset('/storage/images/profile/'.$row->photo)}}" alt="" class="img-thumbnail" width="80px" height="80px">
                                </td>
                                <td class="px-4 d-flex row">
                                    <p>{{$row->user->name}}</p>
                                    <p>{{$row->status}}</p>
                                </td>
                                <td class="px-4">{{$row->user->email}}</td>
                                <td class="px-4">
                                @if($row->user->level == 'staff')
                                    Leader/Staff
                                    @elseif($row->user->level == 'administration')
                                    Operator/Administration
                                    @elseif($row->user->level == 'admin')
                                    Admin
                                    @elseif($row->user->level == 'manager')
                                    Manager
                                    @else
                                    Supervisor
                                    @endif
                                </td>
                                <td class="align-middle text-center text-sm">
                                        <form action="{{route('biodata.destroy', $row->id)}}" method="post">
                                            @csrf
                                            <a href="{{route('biodata.edit', $row->id)}}" class="btn btn-warning btn-sm">
                                               Edit
                                            </a>
                                            <a href="{{route('biodata.show', $row->id)}}" class="btn btn-success btn-sm">
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
</div>
@endsection
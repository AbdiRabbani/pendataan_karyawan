@extends('layouts.app')

@section('content')

@if(Auth::user()->biodata == "true")
<div class="container-fluid py-4">
    <div class="col-md-12 d-flex justify-content-evenly">
        <div class="col-md-4 border rounded p-2 m-1">
            <p class="h6">Annual leave limit</p>
            <p><span class="h4">{{$annual_limit}}</span> day</p>
        </div>
        <div class="col-md-4 border rounded p-2 m-1">
            <p class="h6">Your leave this year</p>
            @if($leave)
            <p><span class="h4">{{$total}}</span> day</p>
            @else
            <p><span class="h4">0</span> day</p>
            @endif
        </div>
        <div class="col-md-4 border rounded p-2 m-1">
            <p class="h6">The rest of your leave this year</p>
            <p><span class="h4">{{$result}}</span> day</p>
        </div>
    </div>

    <div class="col-md-12 pt-5">
        <div class="col-md-12 d-flex justify-content-between">
            <p class="h3">Your leave history</p>
            @if($total >= $annual_limit)
            <a href="#" class="btn btn-success btn-sm disabled-leave">Add Leave Request</a>
            @else
            <a href="{{route('leave.create')}}" class="btn btn-success btn-sm">Add Leave Request</a>
            @endif
        </div>
        @foreach($leave as $row)
        <div class="col-md-10 border d-flex row p-2 my-3 mx-1">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <p class="fs-5">{{$row->name}}</p>
                <div class="">
                    @if($row->status == "approve")
                    <p class="bg-success rounded h6 px-1 text-white">{{$row->status}}d</p>
                    @elseif($row->status == "pending")
                    <p class="bg-warning rounded h6 px-1 text-white">{{$row->status}}</p>
                    @else
                    <p class="bg-danger rounded h6 px-1 text-white">{{$row->status}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <p>
                    {{$row->start_leave}} - {{$row->end_leave}}
                    <span>
                        @php
                        $date1=date_create($row->start_leave);
                        $date2=date_create($row->end_leave);
                        $diff=date_diff($date1,$date2)->format('%d');
                        echo '(' . ($diff + 1) . ' Days)';
                        @endphp
                    </span>
                </p>
            </div>
            <div class="col-md-12 mt-3 justify-content-end d-flex">
                @if($row->status == "approve")
                <button class="btn btn-danger" disabled>Cancel</button>
                @elseif($row->status == "rejected")
                <form action="{{route('leave.destroy', $row->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @else
                <form action="{{route('leave.destroy', $row->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@else
<div class="container-fluid py-4">
    <p>
        Biodata anda tidak lengkap, harap hubungi admin segera..
    </p>
</div>
@endif

<!-- Untuk approve cuti -->
@if(Auth::user()->level != 'staff' && Auth::user()->level != 'administration')
<div class="container-fluid py-4">
    <div class="col-md-12 d-flex justify-content-between row">
        <div class="col-md-12 d-flex justify-content-between">
            @if(Auth::user()->level != 'admin')
            <p class="h3 d-flex">
                Your staff leave request
            </p>
            @else
            <p class="h3 d-flex">
                All staff leave request
            </p>
            @csrf
            <!-- <button class="btn btn-danger btn-sm remove-data">reset all</button> -->
            <a href="/leave/history" class="btn btn-warning btn-sm">Leave History</a>
            @endif
        </div>

        <div class="table-responsive p-0 m-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>From</td>
                        <td>Desc</td>
                        <td>Time period</td>
                        <td class="align-middle text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                @if(Auth::user()->level == 'manager')
                    @foreach($manager as $row)
                    @if($row->status == "pending" && $row->user->level != "manager" && $row->user->level != "supervisor" && $row->user->level != "admin")
                    <tr>
                        <td>{{$row->user->name}} ({{$row->user->level}})</td>
                        <td>{{$row->name}}</td>
                        <td>
                            <p>
                                {{$row->start_leave}} - {{$row->end_leave}}
                                <span>
                                    @php
                                    $date1=date_create($row->start_leave);
                                    $date2=date_create($row->end_leave);
                                    $diff=date_diff($date1,$date2)->format('%d');
                                    echo '(' . ($diff + 1) . ' Days)';
                                    @endphp
                                </span>
                            </p>
                        </td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="approve" hidden>

                                @if($row->name != 'Izin' && $row->name != 'Sakit')
                                <input type="text" name="total_leave" value="
                                    @php
                                    $date1=date_create($row->start_leave);
                                    $date2=date_create($row->end_leave);
                                    $diff=date_diff($date1,$date2)->format('%d');
                                    echo intval($diff + 1);
                                    @endphp
                                " hidden>
                                @endif
                                <button class="btn btn-success btn-sm m-1">Approve</button>
                            </form>
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="rejected" hidden>
                                <button class="btn btn-danger btn-sm m-1">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endif

                    @endforeach
                    @elseif(Auth::user()->level == 'supervisor')
                    @foreach($supervisor as $row)
                    @if($row->status == "pending" && $row->user->level != "manager" && $row->user->level != "supervisor" && $row->user->level != "admin")
                    <tr>
                        <td>{{$row->user->name}} ({{$row->user->level}})</td>
                        <td>{{$row->name}}</td>
                        <td>
                            <p>
                                {{$row->start_leave}} - {{$row->end_leave}}
                                <span>
                                    @php
                                    $date1=date_create($row->start_leave);
                                    $date2=date_create($row->end_leave);
                                    $diff=date_diff($date1,$date2)->format('%d');
                                    echo '(' . ($diff + 1) . ' Days)';
                                    @endphp
                                </span>
                            </p>
                        </td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="approve" hidden>

                                @if($row->name != 'Izin' && $row->name != 'Sakit')
                                <input type="text" name="total_leave" value="
                                    @php
                                    $date1=date_create($row->start_leave);
                                    $date2=date_create($row->end_leave);
                                    $diff=date_diff($date1,$date2)->format('%d');
                                    echo intval($diff + 1);
                                    @endphp
                                " hidden>
                                @endif
                                <button class="btn btn-success btn-sm m-1">Approve</button>
                            </form>
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="rejected" hidden>
                                <button class="btn btn-danger btn-sm m-1">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    @elseif(Auth::user()->level == 'admin')
                    @foreach($admin as $row)
                    @if($row->status == "pending" && $row->id_luser != Auth::User()->id)
                    <tr>
                        <td>{{$row->user->name}} ({{$row->user->level}})</td>
                        <td>{{$row->name}}</td>
                        <td>
                            <p>
                                {{$row->start_leave}} - {{$row->end_leave}}
                                <span>
                                    @php
                                    $date1=date_create($row->start_leave);
                                    $date2=date_create($row->end_leave);
                                    $diff=date_diff($date1,$date2)->format('%d');
                                    echo '(' . ($diff + 1) . ' Days)';
                                    @endphp
                                </span>
                            </p>
                        </td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="approve" hidden>

                                @if($row->name != 'Izin' && $row->name != 'Sakit')
                                <input type="text" name="total_leave" value="
                                    @php
                                    $date1=date_create($row->start_leave);
                                    $date2=date_create($row->end_leave);
                                    $diff=date_diff($date1,$date2)->format('%d');
                                    echo intval($diff + 1);
                                    @endphp
                                " hidden>
                                @endif
                                <button class="btn btn-success btn-sm m-1">Approve</button>
                            </form>
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="rejected" hidden>
                                <button class="btn btn-danger btn-sm m-1">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $('.remove-data').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, remove all!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    '',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })
    });

    $('.disabled-leave').click(function () {
        Swal.fire(
            'Wanna Leave?',
            'You have use all your leave limmit',
            'question'
        )
    });

</script>

@endsection

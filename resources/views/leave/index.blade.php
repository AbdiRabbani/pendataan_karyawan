@extends('layouts.app')

@section('content')

@if(Auth::user()->level == 'admin')
<div class="container">
    Saya adalah admin
</div>
@elseif($user)
<div class="container-fluid py-4">
    @foreach($user as $row)
    <div class="col-md-12 d-flex justify-content-evenly">
        <div class="col-md-4 border rounded p-2 m-1">
            <p class="h6">Annual leave limit</p>
            <p><span class="h4">{{$row->leaveperyear}}</span> day</p>
        </div>
        <div class="col-md-4 border rounded p-2 m-1">
            <p class="h6">Your leave this year</p>
            <p><span class="h4">0</span> day</p>
        </div>
        <div class="col-md-4 border rounded p-2 m-1">
            <p class="h6">The rest of your leave this year</p>
            <p><span class="h4">0</span> day</p>
        </div>
    </div>
    @endforeach

    <div class="col-md-12 pt-5">
        <div class="col-md-12 d-flex justify-content-between">
            <p class="h3">Your leave history</p>
            <a href="{{route('leave.create')}}" class="btn btn-success">Add Leave Request</a>
        </div>
        @foreach($leave as $row)
        <div class="col-md-10 border d-flex row p-2 my-3 mx-1">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <p class="fs-5">{{$row->name}}</p>
                <div class="">
                    @if($row->status == "approve")
                    <p class="bg-success rounded h6 px-1 text-white">{{$row->status}}</p>
                    @elseif($row->status == "pending")
                    <p class="bg-warning rounded h6 px-1 text-white">{{$row->status}}</p>
                    @else
                    <p class="bg-danger rounded h6 px-1 text-white">{{$row->status}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <p>
                    {{$row->startLeave}} - {{$row->endLeave}}
                    <span>
                        @php
                        $date1=date_create($row->startLeave);
                        $date2=date_create($row->endLeave);
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
        Lengkapi biodata anda terlebih dahulu
    </p>
</div>
@endif

@if(Auth::user()->level != 'staff')
<div class="container-fluid py-4">
    <div class="col-md-12 d-flex justify-content-between row">
        <p class="h3">Your staff leave history</p>

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
                    @foreach($staff as $row)
                    @if($row->status == "pending")
                    <tr>
                        <td>{{$row->user->name}}</td>
                        <td>{{$row->name}}</td>
                        <td>
                            <p>
                                {{$row->startLeave}} - {{$row->endLeave}}
                                <span>
                                    @php
                                    $date1=date_create($row->startLeave);
                                    $date2=date_create($row->endLeave);
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
                                <button class="btn btn-success m-1">Approve</button>
                            </form>
                            <form action="{{route('leave.update', $row->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="text" name="status" value="rejected" hidden>
                                <button class="btn btn-danger m-1">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<script>
    // let date_1 = new Date(document.getElementById('start').innerText);
    // let date_2 = new Date(document.getElementById('end').innerText);

    // const days = (date_1, date_2) => {
    //     let difference = date_1.getTime() - date_2.getTime();
    //     let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
    //     return TotalDays;
    // }

    // let result = +days(date_1, date_2).toString().split('-').join('') + 1;
    // document.getElementById('result').innerText = '(' + result + ' days)'
    // console.log(result);

</script>

@endsection

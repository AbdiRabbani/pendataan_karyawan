@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{route('leave.store')}}" method="post" class="col-md-6">
        @csrf
        <label for="dataLeave">Title (your reason for leaving)</label>
        <input required type="text" name="name" id="dataLeave" class="form-control border p-2">
        
        <label for="dataStart">leave start date *M/D/Y</label>
        <input required type="date" name="start_leave" id="dataStart" class="form-control border p-2">

        <label for="dataEnd">leave end date *M/D/Y</label>
        <input required type="date" name="end_leave" id="dataEnd" class="form-control border p-2">

        <input required type="text" name="status" value="pending" id="" hidden>
        <input required type="text" name="id_luser" value="{{Auth::user()->id}}" id="" hidden>

        @foreach($user as $row)
        <input required type="text" name="id_manager" value="{{$row->dept->id_manager}}" id="" hidden>
        
        <input required type="text" name="id_supervisor" value="{{$row->dept->id_supervisor}}" id="" hidden>
        @endforeach

        <div class="text-end mt-4">
            <button class="btn btn-success">Send</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('dataStart').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0]
    document.getElementById('dataEnd').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0]
</script>
@endsection
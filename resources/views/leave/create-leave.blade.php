@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{route('leave.store')}}" method="post" class="col-md-6">
        @csrf
        <label for="dataName">Title (your reason for leaving)</label>
        <input type="text" name="name" id="dataName" class="form-control border p-2">
        
        <label for="dataStart">leave start date *M/D/Y</label>
        <input type="date" name="startleave" id="dataStart" class="form-control border p-2">

        <label for="dataEnd">leave end date *M/D/Y</label>
        <input type="date" name="endleave" id="dataEnd" class="form-control border p-2">

        <input type="text" name="status" value="pending" id="" hidden>
        <input type="text" name="id_luser" value="{{Auth::user()->id}}" id="" hidden>


        @foreach($user as $row)
        <input type="text" name="id_manager" value="{{$row->dept->id_manager}}" id="" hidden>
        
        <input type="text" name="id_supervisor" value="{{$row->dept->id_supervisor}}" id="" hidden>
        @endforeach

        <div class="text-end mt-4">
            <button class="btn btn-success">Send</button>
        </div>
    </form>
</div>
@endsection
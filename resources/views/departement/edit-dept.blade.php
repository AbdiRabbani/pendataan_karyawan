@extends('layouts.app')

@section('content')
<div class="container col-md-12 m-4 justify-content-start d-flex">
    <form action="{{route('departement.update', $dept->id)}}" class="d-flex row ms-0" method="post">
        @csrf
        {{method_field('PUT')}}
        <label for="editName" class="ms-0">Dept Name</label>
        <input required type="text" name="dept_name" id="editName" class="rounded border form-control p-2 ms-2"
            value="{{$dept->dept_name}}">

        <label for="manager-input" class="form-label">Manager Name</label>
        <select required name="id_manager" id="manager-input" class="form-select p-2 border mb-3">
            <option value="{{$dept->id_manager}}">{{$dept->manager->name}} --current</option>
            @foreach($manager as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>

        <label for="supervisor-input" class="form-label">Supervisor Name</label>
        <select name="id_supervisor" id="supervisor-input" class="form-select p-2 border mb-3">
        <option value="{{$dept->id_supervisor}}">{{$dept->supervisor->name}} --current</option>
            @foreach($supervisor as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>
        <div class="d-flex col-md-12 justify-content-end mt-4 p-0">
            <button class="btn btn-success col-md-6" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection

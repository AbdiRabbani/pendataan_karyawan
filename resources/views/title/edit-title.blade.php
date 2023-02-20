@extends('layouts.app')

@section('content')
<div class="container col-md-12 m-4 justify-content-start d-flex">
    <form action="{{url('edit-title', $title->id)}}" class="d-flex row ms-0" method="post">
        @csrf
        {{method_field('PUT')}}
        <label for="editName" class="ms-0">Title Name</label>
        <input type="text" name="title_name" id="editName" class="rounded border form-control p-2 ms-2" value="{{$title->title_name}}">
        <div class="d-flex col-md-12 justify-content-end mt-4 p-0">
            <button class="btn btn-success col-md-6" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection

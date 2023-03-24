@extends('layouts.app')

@section('content')
<form class="col-md-6 mt-5" id="formContent" method="post" action="{{route('family.update', $family->id)}}">
    @csrf
    {{method_field('PUT')}}
    <label for="dataName">Name</label>
    <input name="fname" type="text" id="dataFamilyName" class="border p-2 form-control mb-3" value="{{$family->fname}}">
    <input name="id_fuser" type="integer" class="border p-2 form-control mb-3" hidden value="{{$family->id_fuser}}">
    <label for="dataAccount">Gender</label>
    <select name="gender" class="form-select p-2 border mb-3" id="dataGender">
        <option value="{{$family->gender}}">{{$family->gender}}--current</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <label for="dataAccount">Relation</label>
    <input name="relation" type="text" id="dataRelation" class="border p-2 form-control mb-3" value="{{$family->relation}}">
    <label for="dataBPJSK">DOB</label>
    <input name="dob" type="date" id="dataDob" class="border p-2 form-control mb-3" value="{{$family->dob}}">
    <label for="dataBPJS">BPJS Kesehatan Member No</label>
    <input name="f_bpjs_kesehatan_member_no" type="number" id="dataBPJS" class="border p-2 form-control mb-3" value="{{$family->f_bpjs_kesehatan_member_no}}">
    <div class="text-end col-md-12">
      <button type="submit" class="btn btn-success">save</button>
    </div>
</form>
@endsection
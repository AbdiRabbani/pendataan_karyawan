@extends('layouts.app')

@section('content')

<div class="container">
    <form class="form" action="{{route('biodata.update', $bio->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="formContent">
            <h3>Profile</h3>
        </label>
        <div class="col-md-12 row d-flex">
            <div class="col-md-4" id="formContent">
                <label for="dataName">Name</label>
                <input type="text" id="dataName" class="border p-2 form-control mb-3" value="{{$bio->user->name}}" disabled>

                <input type="number" name="id_user" class="border p-2 form-control mb-3" value="{{$bio->user->id}}" hidden>

                <label for="dataEmail">E-Mail</label>
                <input type="email" id="dataEmail" class="border p-2 form-control mb-3" value="{{$bio->user->email}}"
                    disabled>
                <label for="dataPhoneP">Mobile Phone</label>
                <input name="mobile_phone" type="number" id="dataPhone" class="border p-2 form-control mb-3" value="{{$bio->mobile_phone}}">
                <label for="dataPhoto">Reupload Your Photo</label>
                <img src="{{asset('/storage/images/profile/'.$bio->photo)}}" class="img-thumbnail mb-2" width="100px" id="dataPhoto">
                <input name="photo" type="file" id="dataPhoto" class="border p-2 form-control mb-3">
                <label for="dataNip">NIP</label>
                <input name="nip" type="number" id="dataNip" class="border p-2 form-control mb-3" value="{{$bio->nip}}">
                <label for="dataDate">JoinDate</label>
                <input name="join_date" type="date" id="dataDate" class="border p-2 form-control mb-3"
                    value="{{$bio->join_date}}">
            </div>
            <div class="col-md-4">
                <label for="dataTitle">Title</label>
                <select name="id_title" class="form-select p-2 border mb-3" id="dataTitle">
                <option value="{{$bio->title->id}}" selected>{{$bio->title->title_name}}--current</option>
                    @foreach($title as $trow)
                    <option value="{{$trow->id}}">{{$trow->title_name}}</option>
                    @endforeach
                </select>
                <label for="dataDept">Deparatement</label>
                <select name="id_dept" class="form-select p-2 border mb-3" id="dataDept">
                    <option value="{{$bio->dept->id}}" selected>{{$bio->dept->dept_name}}--current</option>
                    @foreach($dept as $drow)
                    <option value="{{$drow->id}}">{{$drow->dept_name}}</option>
                    @endforeach
                </select>
                <label for="dataAdress">Adress</label>
                <input name="adress" type="text" id="dataAdress" class="border p-2 form-control mb-3"
                    value="{{$bio->adress}}">
                <label for="dataKTP">KTP No</label>
                <input name="no_ktp" type="number" id="dataKTP" class="border p-2 form-control mb-3"
                    value="{{$bio->no_ktp}}">
                <label for="dataHBD">Birth Date</label>
                <input name="birth_date" type="date" id="dataHBD" class="border p-2 form-control mb-3"
                    value="{{$bio->birth_date}}">
            </div>
        </div>

        <label for="formContent">
            <h3>Payroll</h3>
        </label>
        <div class="col-md-12 row d-flex">
            <div class="col-md-4" id="formContent">
                <label for="dataName">Bank Name</label>
                <input name="bank_name" type="text" id="dataName" class="border p-2 form-control mb-3"
                    value="{{$bio->bank_name}}">
                <label for="dataAccount">Account Name</label>
                <input name="account_name" type="text" id="dataAccount" class="border p-2 form-control mb-3"
                    value="{{$bio->account_name}}">
                <label for="dataAccount">Account Number</label>
                <input name="account_number" type="text" id="dataAccount" class="border p-2 form-control mb-3"
                    value="{{$bio->account_number}}">
                <label for="dataBPJSK">BPJS Ketenagakerjaan Member No</label>
                <input name="bpjs_ketenagakerjaan_member_no" type="number" id="dataBPJSK"
                    class="border p-2 form-control mb-3" value="{{$bio->bpjs_ketenagakerjaan_member_no}}">
                <label for="dataBPJS">BPJS Kesehatan Member No</label>
                <input name="bpjs_kesehatan_member_no" type="number" id="dataBPJS" class="border p-2 form-control mb-3"
                    value="{{$bio->bpjs_kesehatan_member_no}}">
            </div>
            <div class="col-md-4">
                <label for="dataTax">Tax Status</label>
                <input name="tax_status" type="text" id="dataTax" class="border p-2 form-control mb-3"
                    value="{{$bio->tax_status}}">
                <label for="dataNPWP">NPWP</label>
                <input name="npwp" type="number" id="dataNPWP" class="border p-2 form-control mb-3"
                    value="{{$bio->npwp}}">
                <label for="dataHIN">Health Insurance Number</label>
                <input name="health_insurance_number" type="number" id="dataHIN" class="border p-2 form-control mb-3"
                    value="{{$bio->health_insurance_number}}">
            </div>
        </div>

        <div class="col-md-12 px-5 d-flex justify-content-end">
            <input type="submit" class="bg-light-green p-2 rounded border text-white align-end px-3">
        </div>
    </form>
</div>
@endsection
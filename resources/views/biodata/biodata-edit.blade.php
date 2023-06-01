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
                <input type="text" id="dataName" class="border p-2 form-control mb-3" value="{{$bio->user->name}}"
                    disabled>

                <input type="number" name="id_user" class="border p-2 form-control mb-3" value="{{$bio->user->id}}"
                    hidden>

                <label for="dataEmail">E-Mail</label>
                <input type="email" id="dataEmail" class="border p-2 form-control mb-3" value="{{$bio->user->email}}"
                    disabled>
                <label for="dataPhoneP">Mobile Phone</label>
                <input required name="mobile_phone" type="number" id="dataPhone" class="border p-2 form-control mb-3"
                    value="{{$bio->mobile_phone}}">
                <label for="dataPhoto">Reupload Your Photo</label>
                <img src="{{asset('/storage/images/profile/'.$bio->photo)}}" class="img-thumbnail mb-2" width="100px"
                    id="dataPhoto">
                <input name="photo" type="file" id="dataPhoto" class="border p-2 form-control mb-3">
                <label for="dataNip">NIP</label>
                <input required name="nip" type="number" id="dataNip" class="border p-2 form-control mb-3"
                    value="{{$bio->nip}}">
                <label for="dataDate">JoinDate *M/D/Y</label>
                <input required name="join_date" type="date" id="dataDate" class="border p-2 form-control mb-3"
                    value="{{$bio->join_date}}">
            </div>
            <div class="col-md-4">
                <label for="dataTitle">Title</label>
                <select required class="form-select p-2 border mb-3" id="dataTitle" disabled>
                    <option value="">{{$bio->user->level}}</option>
                </select>
                <label for="dataDept">Deparatement</label>
                <select required name="id_dept" class="form-select p-2 border mb-3" id="dataDept">
                    <option value="{{$bio->dept->id}}" selected>{{$bio->dept->dept_name}}--current</option>
                    @foreach($dept as $drow)
                    <option value="{{$drow->id}}">{{$drow->dept_name}}</option>
                    @endforeach
                </select>
                <label for="dataStatus">Status</label>
                <select required name="status" class="form-select p-2 border mb-3" id="dataStatus">
                    <option selected value="{{$bio->status}}">{{$bio->status}}--current</option>
                    <option>Permanent</option>
                    <option>Contract</option>
                </select>
                <label for="dataAdress">Adress</label>
                <input required name="adress" type="text" id="dataAdress" class="border p-2 form-control mb-3"
                    value="{{$bio->adress}}">
                <label for="dataKTP">KTP No</label>
                <input required name="no_ktp" type="number" id="dataKTP" class="border p-2 form-control mb-3"
                    value="{{$bio->no_ktp}}">
                <label for="dataHBD">Birth Date *M/D/Y</label>
                <input required name="birth_date" type="date" id="dataHBD" class="border p-2 form-control mb-3"
                    value="{{$bio->birth_date}}">
            </div>
        </div>

        <label for="formContent">
            <h3>Leave Permit</h3>
        </label>
        <div class="col-md-12 row d-flex">
            <div class="col-md-4" id="formContent">
                <label for="dataLeave">Maximum Leave Per Year</label>
                <input type="number" class="form-control mb-3 border p-2" name="leaveperyear"
                    value="{{$bio->leaveperyear}}">
            </div>
        </div>

        <label for="formContent">
            <h3>Payroll</h3>
        </label>
        <div class="col-md-12 row d-flex">
            <div class="col-md-4" id="formContent">
                <label for="dataName">Bank Name</label>
                <input required name="bank_name" type="text" id="dataName" class="border p-2 form-control mb-3"
                    value="{{$bio->bank_name}}">
                <label for="dataAccount">Account Name</label>
                <input required name="account_name" type="text" id="dataAccount" class="border p-2 form-control mb-3"
                    value="{{$bio->account_name}}">
                <label for="dataAccount">Account Number</label>
                <input required name="account_number" type="text" id="dataAccount" class="border p-2 form-control mb-3"
                    value="{{$bio->account_number}}">
                <label for="dataBPJSK">BPJS Ketenagakerjaan Member No</label>
                <input required name="bpjs_ketenagakerjaan_member_no" type="number" id="dataBPJSK"
                    class="border p-2 form-control mb-3" value="{{$bio->bpjs_ketenagakerjaan_member_no}}">
                <label for="dataBPJS">BPJS Kesehatan Member No</label>
                <input required name="bpjs_kesehatan_member_no" type="number" id="dataBPJS"
                    class="border p-2 form-control mb-3" value="{{$bio->bpjs_kesehatan_member_no}}">
            </div>
            <div class="col-md-4">
                <label for="dataTax">Tax Status</label>
                <input required name="tax_status" type="text" id="dataTax" class="border p-2 form-control mb-3"
                    value="{{$bio->tax_status}}">
                <label for="dataNPWP">NPWP</label>
                <input required name="npwp" type="number" id="dataNPWP" class="border p-2 form-control mb-3"
                    value="{{$bio->npwp}}">
                <label for="dataHIN">Health Insurance Member No</label>
                <input required name="health_insurance_number" type="string" id="dataHIN"
                    class="border p-2 form-control mb-3" value="{{$bio->health_insurance_number}}">
            </div>
        </div>

        <label for="formContent" class="d-flex col-md-12 d-flex justify-content-between">
            <h3 class="col-md-6">Family</h3>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-success" id="btn-add">Add Family</button>
            </div>
        </label>

        <div class="col-md-12 row d-flex" id="table">
            @if($family)
            @foreach($family as $row)
            <div class="col-md-6 mt-5 op" id="formContent">
                <label for="dataName">Name</label>
                <input required name="fname[]" type="text" id="dataFamilyName" class="border p-2 form-control mb-3"
                    value="{{$row->fname}}">
                <input required name="id_fuser[]" type="integer" class="border p-2 form-control mb-3" hidden
                    value="{{$bio->id_user}}">
                <label for="dataAccount">Gender</label>
                <select required name="gender[]" class="form-select p-2 border mb-3" id="dataGender">
                    <option value="{{$row->gender}}">{{$row->gender}}--current</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label for="dataAccount">Relation</label>
                <input required name="relation[]" type="text" id="dataRelation" class="border p-2 form-control mb-3"
                    value="{{$row->relation}}">
                <label for="dataDob">DOB *M/D/Y</label>
                <input required name="dob[]" type="date" id="dataDob" class="border p-2 form-control mb-3"
                    value="{{$row->dob}}">
                <label for="dataBPJS">BPJS Kesehatan Member No</label>
                <input required name="f_bpjs_kesehatan_member_no[]" type="number" id="dataBPJS"
                    class="border p-2 form-control mb-3" value="{{$row->f_bpjs_kesehatan_member_no}}">
                <button type="button" class="btn btn-danger remove-table-row">Remove</button>
            </div>
            @endforeach
            @endif
        </div>

        <div class="col-md-12 px-5 d-flex justify-content-end">
            <input type="submit" class="btn btn-success align-end px-3" id="submit">
        </div>
    </form>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var i = 0;
    $('#btn-add').click(function () {
        i++;
        $('#table').append(
            `
            <div class="col-md-6 mt-5 op" id="formContent">
                <label for="dataName">Name</label>
                <input required name="fname[]" type="text" id="dataFamilyName" class="border p-2 form-control mb-3">
                <input required name="id_fuser[]" type="integer" class="border p-2 form-control mb-3" hidden value="{{$bio->id_user}}">
                <label for="dataAccount">Gender</label>
                <select required required name="gender[]" class="form-select p-2 border mb-3" id="dataGender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label for="dataAccount">Relation</label>
                <input required name="relation[]" type="text" id="dataRelation" class="border p-2 form-control mb-3">
                <label for="dataDob">DOB *M/D/Y</label>
                <input required name="dob[]" type="date" id="dataDob" class="border p-2 form-control mb-3">
                <label for="dataBPJS">BPJS Kesehatan Member No</label>
                <input required name="f_bpjs_kesehatan_member_no[]" type="number" id="dataBPJS" class="border p-2 form-control mb-3">
                <button type="button" class="btn btn-danger remove-table-row">Remove</button>
            </div>
            `
        );
    });

    $(document).on('click', '.remove-table-row', function () {
        $(this).parents('.op').remove();
    });

</script>
@endsection

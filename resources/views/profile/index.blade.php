@extends('layouts.app')

@section('content')
@if($bio)
<div class="container-fluid px-2 px-md-4">
    <div class="page-header max-height-300 border-radius-xl mt-4 d-flex justify-content-center align-items-center"
        height="300px">
        <img src="{{asset('template/img/company-pict.png')}}" alt="toyotomo company image" height="800px">
        <span class="mask bg-light-green opacity-6"></span>
    </div>
    @foreach($bio as $row)
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{asset('/storage/images/profile/'.$row->photo)}}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{Auth::user()->level}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Name:</strong> &nbsp; {{ Auth::user()->name }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">NIP:</strong> &nbsp; {{$row->nip}}
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:
                                    </strong> &nbsp; {{$row->status}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Join
                                        Date:</strong> &nbsp; {{$row->join_date}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Title:</strong> &nbsp; {{Auth::user()->level}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Departement:</strong> &nbsp; {{$row->dept->dept_name}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Address:</strong> &nbsp; {{$row->adress}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="">
                                        -
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">KTP
                                        No:</strong> &nbsp; {{$row->no_ktp}}</li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Birth
                                        Date:</strong> &nbsp; {{$row->birth_date}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile
                                        Phone:</strong>
                                    &nbsp; {{$row->mobile_phone}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">EMail:</strong>
                                    &nbsp; {{ Auth::user()->email }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Remaining
                                        Leave:</strong>
                                    &nbsp; {{ $result }} Day</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-2 px-md-4">
    <div class="col-md-12 bg-light-green p-2 px-3 mb-3 rounded">
        <h2 class="text-white">
            Payroll
        </h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-6 mb-xl-0 mb-4">
                    <div class="card bg-transparent shadow-xl">
                        <div class="overflow-hidden position-relative border-radius-xl">
                            <img src="{{asset('template/img/illustrations/pattern-tree.svg')}}"
                                class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100"
                                alt="pattern-tree">
                            <span class="mask bg-gradient-dark opacity-10"></span>
                            <div class="card-body position-relative z-index-1 p-3">
                                <i class="material-icons text-white p-2">wifi</i>
                                <h5 class="text-white mt-4 mb-5 pb-2">
                                    {{$row->account_number}}</h5>
                                <div class="d-flex">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <h6 class="text-white mb-0">{{$row->account_name}}</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                        <img class="w-60 mt-2" src="{{asset('template/img/logos/mastercard.png')}}"
                                            alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header mx-4 p-3 d-flex justify-content-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-light-green shadow text-center border-radius-lg">
                                        <i class="material-icons opacity-10">account_balance</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Bank Name</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">{{$row->bank_name}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header mx-4 p-3 d-flex justify-content-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-light-green shadow text-center border-radius-lg">
                                        <i class="material-icons opacity-10">account_balance_wallet</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Tax Status</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">{{$row->tax_status}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Detail Information</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-4">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                    class="text-dark">Bank Name:</strong> &nbsp; {{$row->bank_name}}
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Account Name:</strong>
                                                &nbsp; {{$row->account_name}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Account Number:</strong>
                                                &nbsp; {{$row->account_number}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Tax Status:</strong> &nbsp; {{$row->tax_status}}
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Ketenagakerjaan Membership No:</strong>
                                                &nbsp; {{$row->bpjs_ketenagakerjaan_member_no}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Kesehatan Membership No:</strong> &nbsp;
                                                {{$row->bpjs_kesehatan_member_no}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">NPWP:</strong> &nbsp; {{$row->npwp}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Health Insurance Member No:</strong> &nbsp;
                                                {{$row->health_insurance_number}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 col-md-12">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <th>Family</th>
                    <th>Gender</th>
                    <th>Relation</th>
                    <th>DOB</th>
                    <th>BPJS Kesehatan Membership No</th>
                </thead>
                <tbody class="table-group-divider">
                    @if($family)
                    @foreach($family as $row)
                    <tr>
                        <td class="px-4 py-4">{{$row->fname}}</td>
                        <td class="px-4 py-4">{{$row->gender}}</td>
                        <td class="px-4 py-4">{{$row->relation}}</td>
                        <td class="px-4 py-4">{{$row->dob}}</td>
                        <td class="px-4 py-4">{{$row->f_bpjs_kesehatan_member_no}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4 text-center"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-light-green p-6 text-white h1">Biodata Anda tidak lengkap harap hubungi admin segera</span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{asset('template/img/person-vector.png')}}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        -
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Name:</strong> &nbsp; {{ Auth::user()->name }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">NIP:</strong> &nbsp; -
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:
                                    </strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Join
                                        Date:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Title:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Departement:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Address:</strong> &nbsp; -</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="">
                                        -
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">KTP
                                        No:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Birth
                                        Date:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile
                                        Phone:</strong>
                                    &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">EMail:</strong>
                                    &nbsp; {{ Auth::user()->email }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Remaining
                                        Leave:</strong>
                                    &nbsp; -</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-2 px-md-4">
    <div class="col-md-12 bg-light-green p-2 px-3 mb-3 rounded">
        <h2 class="text-white">
            Payroll
        </h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-6 mb-xl-0 mb-4">
                    <div class="card bg-transparent shadow-xl">
                        <div class="overflow-hidden position-relative border-radius-xl">
                            <img src="{{asset('template/img/illustrations/pattern-tree.svg')}}"
                                class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100"
                                alt="pattern-tree">
                            <span class="mask bg-gradient-dark opacity-10"></span>
                            <div class="card-body position-relative z-index-1 p-3">
                                <i class="material-icons text-white p-2">wifi</i>
                                <h5 class="text-white mt-4 mb-5 pb-2">
                                    -</h5>
                                <div class="d-flex">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <h6 class="text-white mb-0">-</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                        <img class="w-60 mt-2" src="{{asset('template/img/logos/mastercard.png')}}"
                                            alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header mx-4 p-3 d-flex justify-content-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-light-green shadow text-center border-radius-lg">
                                        <i class="material-icons opacity-10">account_balance</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Bank Name</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="card">
                                <div class="card-header mx-4 p-3 d-flex justify-content-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-light-green shadow text-center border-radius-lg">
                                        <i class="material-icons opacity-10">account_balance_wallet</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Tax Status</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Detail Information</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-4">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                    class="text-dark">Bank Name:</strong> &nbsp; -
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Account Name:</strong>
                                                &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Account Number:</strong>
                                                &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Tax Status:</strong> &nbsp; -
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Ketenagakerjaan Membership No:</strong>
                                                &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Kesehatan Membership No:</strong> &nbsp;
                                                -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">NPWP:</strong> &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Health Insurance Member No:</strong> &nbsp;
                                                -
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 col-md-12">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table">
                <thead>
                    <th>Family</th>
                    <th>Gender</th>
                    <th>Relation</th>
                    <th>DOB</th>
                    <th>BPJS Kesehatan Membership No</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection

@extends('layouts.app')

@section('content')
@if($bio)
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-light-green  opacity-6"></span>
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
                        {{$title[$row->id_title - 1]->title_name}}
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
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Join
                                        Date:</strong> &nbsp; {{$row->join_date}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Title:</strong> &nbsp; {{$title[$row->id_title - 1]->title_name}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Departement:</strong> &nbsp; {{$dept[$row->id_dept - 1]->dept_name}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Address:</strong> &nbsp; {{$row->adress}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">KTP
                                        No:</strong> &nbsp; {{$row->no_ktp}}</li>
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
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Birth
                                        Date:</strong> &nbsp; {{$row->birth_date}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile
                                        Phone:</strong>
                                    &nbsp; {{$row->mobile_phone}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">E-Mail:</strong>
                                    &nbsp; {{ Auth::user()->email }}</li>
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
        <div class="col-lg-8">
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
                                                    class="text-dark">Tax Status:</strong> &nbsp; {{$row->tax_status}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Ketenagakerjaan Membership No:</strong>
                                                &nbsp; {{$row->bpjs_ketenagakerjaan_member_no}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Kesehatan Membership No:</strong> &nbsp;
                                                    {{$row->bpjs_kesehatan_member_no}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">NPWP:</strong> &nbsp; {{$row->npwp}}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Health Insurance Member No:</strong> &nbsp; {{$row->health_insurance_number}}
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
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Invoices</h6>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                                <span class="text-xs">#MS-415646</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $180
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                                <span class="text-xs">#RV-126749</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $250
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2020</h6>
                                <span class="text-xs">#FB-212562</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $560
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                                <span class="text-xs">#QW-103578</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $120
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                                <span class="text-xs">#AR-803481</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $300
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                    </ul>
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
                        <td class="px-4 py-4">pp</td>
                        <td class="px-4 py-4">pp</td>
                        <td class="px-4 py-4">pp</td>
                        <td class="px-4 py-4">pp</td>
                        <td class="px-4 py-4">pp</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4 text-center"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-light-green p-6 text-white h1">Harap Lengkapi Biodata Anda Terlebih Dahulu!!!</span>
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
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Join
                                        Date:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Title:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Departement:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Address:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">KTP
                                        No:</strong> &nbsp; -</li>
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
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Birth
                                        Date:</strong> &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile
                                        Phone:</strong>
                                    &nbsp; -</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">eMail:</strong>
                                    &nbsp; {{ Auth::user()->email }}</li>
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
        <div class="col-lg-8">
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
                                                    class="text-dark">Tax Status:</strong> &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Ketenagakerjaan Membership No:</strong>
                                                &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">BPJS Kesehatan Membership No:</strong> &nbsp;
                                                    -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">NPWP:</strong> &nbsp; -</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Health Insurance Member No:</strong> &nbsp; -
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
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Invoices</h6>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                                <span class="text-xs">#MS-415646</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $180
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                                <span class="text-xs">#RV-126749</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $250
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2020</h6>
                                <span class="text-xs">#FB-212562</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $560
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                                <span class="text-xs">#QW-103578</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $120
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                                <span class="text-xs">#AR-803481</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $300
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                        class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                    PDF</button>
                            </div>
                        </li>
                    </ul>
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

@extends('layouts.app')

@section('content')
<style>
    div.dataTables_wrapper div.dataTables_filter input {
        border: 1px solid lightgrey;
        border-radius: 5px;
    }

    div.dataTables_wrapper div.dataTables_length select {
        border: 1px solid lightgrey;
        border-radius: 10px;
        background-image: none;
        text-align: center;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination .paginate_button {
        margin: 0px 0px 0px 20px;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination .paginate_button a {
        width: auto;
        padding: 2px;
        border: none;
        background: none;
        box-shadow: none;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light-green shadow-primary border-radius-lg pt-4 pb-3 row d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3 col-md-2 text-center align">Users</h6>
                        <h6 class="text-white text-capitalize ps-3 col-md-2 align-middle text-sm text-center">
                            <a class="text-white" href="{{route('user.create')}}">Tambah User <i
                                    class="bi bi-person-plus-fill"></i></a>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-3">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>E-Mail</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Biodata</th>
                            </thead>
                            <tbody>
                                @foreach($user as $row)
                                <tr>
                                    <td class="px-4">{{$row->name}}</td>
                                    <td class="px-4">
                                        @if($row->level == 'staff')
                                        Leader/Staff
                                        @elseif($row->level == 'administration')
                                        Operator/Administration
                                        @elseif($row->level == 'admin')
                                        Admin
                                        @elseif($row->level == 'manager')
                                        Manager
                                        @else
                                        Supervisor
                                        @endif
                                    </td>
                                    <td class="px-4">{{$row->email}}</td>
                                    <td class="align-middle text-center">
                                        <form method="POST" action="{{ route('user.destroy', $row->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="{{route('user.edit', $row->id)}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger btn-flat remove-data"
                                                data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>

                                    </td>
                                    <td class="text-center align-middle">
                                        @if($row->biodata == 'false')
                                        <a href="{{url('user/biodata', $row->id)}}" class="btn btn-success btn-sm">
                                            Add Biodata
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $('.remove-data').click(function (event) {
            var form = $(this).closest("form");
            event.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        '',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        '',
                        'error'
                    )
                }
            })
        });

    </script>


    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        })
    </script>
    @endsection

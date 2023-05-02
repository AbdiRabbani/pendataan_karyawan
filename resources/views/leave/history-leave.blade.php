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
                    <div
                        class="bg-light-green shadow-primary border-radius-lg pt-4 pb-3 row d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3 col-md-2 text-center align">Leave History</h6>


                        <h6 class="text-white text-capitalize ps-3 col-md-2 align-middle text-sm text-center">
                            <form action="{{url('/leave/deleteAll')}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger remove btn-sm">Reset</button>
                            </form>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-3">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <th>From</th>
                                <th>Leave Reason</th>
                                <th>Days</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach($leave as $row)
                                <tr>
                                    <td class="px-4">
                                        {{$row->user->name}}
                                    </td>
                                    <td class="px-4">
                                        {{$row->name}}
                                    </td>
                                    <td class="px-4">
                                        {{$row->start_leave}} - {{$row->end_leave}}
                                        <span>
                                            @php
                                            $date1=date_create($row->start_leave);
                                            $date2=date_create($row->end_leave);
                                            $diff=date_diff($date1,$date2)->format('%d');
                                            echo '(' . ($diff + 1) . ' Days)';
                                            @endphp
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if($row->status == "approve")
                                        <div class="col-md-8">
                                            <p class="bg-success rounded h6 px-1 text-white">{{$row->status}}d</p>
                                        </div>
                                        @elseif($row->status == "pending")
                                        <div class="col-md-8">
                                            <p class="bg-warning rounded h6 px-1 text-white">{{$row->status}}</p>
                                        </div>
                                        @else
                                        <div class="col-md-8">
                                            <p class="bg-danger rounded h6 px-1 text-white">{{$row->status}}</p>
                                        </div>
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


    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        })

        $('.remove').click(function (event) {
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
    @endSection

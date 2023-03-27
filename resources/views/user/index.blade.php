@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light-green shadow-primary border-radius-lg pt-4 pb-3 row">
                        <h6 class="text-white text-capitalize ps-3 col-md-10">Users</h6>
                        <h6 class="text-white text-capitalize ps-3 col-md-2 align-middle text-sm text-center">
                            <a class="text-white" href="{{route('user.create')}}">Tambah User <i
                                    class="bi bi-person-plus-fill"></i></a>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-hover">
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
                                    <td class="px-4">{{$row->level}}</td>
                                    <td class="px-4">{{$row->email}}</td>
                                    <td class="align-middle text-center">
                                        <form method="POST" action="{{ route('user.destroy', $row->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="{{route('user.edit', $row->id)}}" class="btn btn-warning btn-sm">Edit</a>
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

    @endsection

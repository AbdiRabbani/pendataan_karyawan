@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-evenly align-items-center">
        <div class="col-6">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light-green shadow-primary border-radius-lg pt-4 pb-3 row">
                        <h6 class="text-white text-capitalize ps-3 col-md-10">Title table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table">
                            <thead>
                                <th>Title Name</th>
                                <th class="align-middle text-center text-sm">Action</th>
                            </thead>
                            <tbody>
                                @foreach($title as $row)
                                <tr>
                                    <td class="d-flex px-4 py-4">{{$row->title_name}}</td>
                                    <td class="align-middle text-center text-sm">
                                        <form action="{{ route('title.destroy', $row->id) }}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <a href="{{ route('title.edit', $row->id) }}" class="btn btn-warning">EDIT</a>
                                            <button type="submit" class="btn btn-danger remove-data">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-header justify-content-end d-flex">
                <h6 class="bg-light-green text-white p-2 rounded">Add Title 
                <i class="bi bi-building-fill-add"></i>
                </h6>
            </div>
            <form action="{{route('title.store')}}" method="post">
                @csrf
                <div class="mb-3 justify-content-start d-flex row">
                    <label for="title-input" class="form-label">Title Name</label>
                    <input name="title_name" type="text" class="form-control border p-2" id="title-input">
                </div>
                <div class="mb-3 justify-content-start d-flex row">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
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

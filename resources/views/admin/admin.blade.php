<div class="row mb-4 ">
    <div class="col-lg-12 col-md-6 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Admin Online</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-2 pb-">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th scope="col">
                                    No</th>
                                <th scope="col">
                                    Name</th>
                                <th scope="col">
                                    Email</th>
                                <th scope="col">
                                    Level</th>
                                <th scope="col">
                                    Last Seen</th>
                                <th scope="col">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="p-4" scope="row">{{ $loop->iteration }}</td>
                                {{-- <th scope="row">{{ $loop->id  }}</th> --}}
                                <td class="p-4">{{$user->name}}</td>
                                <td class="p-4">{{$user->email}}</td>
                                <td class="p-4">{{$user->level}}</td>
                                <td class="p-4">{{$user->last_seen}}</td>
                                @if (Cache::has('user-is-online-' . $user->id))
                                <td class="text-success p-4">Online</td>
                                @else
                                <td class="text-secondary p-4">Offline</td>
                                @endif
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
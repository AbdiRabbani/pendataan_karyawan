<div class="row mb-4 ">
    <div class="col-lg-12 col-md-6 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="p-2 rounded bg-light-green text-white">User Online</h6>
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
                                <td class="p-4">
                                    @if($user->level == 'staff')
                                    Leader/Staff
                                    @elseif($user->level == 'administration')
                                    Operator/Administration
                                    @elseif($user->level == 'admin')
                                    Admin
                                    @elseif($user->level == 'manager')
                                    Manager
                                    @else
                                    Supervisor
                                    @endif
                                </td>
                                @if (Cache::has('user-is-online-' . $user->id))
                                <td class="text-success p-4">Now</td>
                                @else
                                <!-- <td class="p-4">{{ Carbon\Carbon::parse($user->last_seen)->format('H')}} Hour {{ Carbon\Carbon::parse($user->last_seen)->format('i')}} Minute Ago</td> -->
                                <td class="p-4">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</td>
                                @endif
                                @if (Cache::has('user-is-online-' . $user->id))
                                <td class="text-success p-4"><span class="col-md-1 bg-success">•</span> Online</td>
                                @else
                                <td class="text-secondary p-4"><span class="col-md-1 bg-secondary">•</span> Offline</td>
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

@extends('layouts.app')
@section('content')
<!--begin::Col-->
<div class="col-xl-12" style="margin-top: 30px;">
    <!--begin::Chart widget 17-->
    <div class="card card-flush h-xl-100">
        <!--begin::Header-->
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Manage Users ({{ App\Models\User::count() }})</span>



                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all users on the platform</span>
            </h3>

            <form action="{{ route('admin.search.on.users') }}" method="GET" class="mb-4" style="width: 500px;">
                <div class="d-flex align-items-center gap-2">
                    <input
                        type="text"
                        name="query"
                        class="form-control"
                        placeholder="Search users..."
                        value="{{ request('query') }}">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </div>
            </form>

            <a href="{{ route('admin.dashboard') }}">
                <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm rounded-pill" style="height: 36px; width:160px">
                    <i class="fas fa-cogs me-2"></i> Dashboard
                </button>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            <table class="table table-striped gy-7 gs-7">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Created Date</th>
                        <th>Trusted Bdg</th>
                        <th>Terms</th>
                        <th>Profile</th>
                        <th>Trusts</th>
                        <th>Rpts</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $user->avatar) }}" class="me-4 w-25px" style="border-radius: 4px" alt="" />
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->country }}, {{ $user->city }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>

                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                @if($user->trusted == 'no')
                                <!--begin::Trusted-->
                                <form action="{{ route('admin.change.trusted.users', $user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="text-gray-800 fw-bolder fs-6 me-3" name="trusted" value="yes" type="submit"><i class="fas fa-check-circle text-success"></i>|Give</button>
                                </form>
                                <!--end::Trusted-->
                                @else
                                <!--begin::Not Trusted-->
                                <form action="{{ route('admin.change.trusted.users', $user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="text-gray-800 fw-bolder fs-6 me-3" name="trusted" value="no" type="submit"><i class="fas fa-times-circle text-danger"></i>|Swipe</button>
                                </form>
                                <!--end::Not Trusted-->
                                @endif
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <td>
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                @if($user->terms == 'accept')
                                <!--begin::Trusted-->
                                <i class="fas fa-check-circle text-success"></i>
                                <!--end::Trusted-->
                                @else
                                <!--begin::Not Trusted-->
                                <i class="fas fa-times-circle text-danger"></i>
                                <!--end::Not Trusted-->
                                @endif
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <td>
                            <a href="{{ route('user.overview', $user->id) }}">View</a>
                        </td>
                        <td>({{ $user->trust_points }})</td>
                        <td>({{ $user->reports }})</td>
                        <td>
                            @if($user->suspended == 'no')
                            <form action="{{ route('admin.change.suspended.users', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button name="suspended" value="yes" type="submit" class="fs-7 btn btn-danger">Suspend</button>
                            </form>
                            @else
                            <form action="{{ route('admin.change.suspended.users', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button name="suspended" value="no" type="submit" class="fs-7 btn btn-success">Activate</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.delete.user', $user->id) }}" method="POST" id="deleteForm-{{ $user->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete({{ $user->id }})">Delete</button>
                            </form>
                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Do you want to delete this user?, this action cannot be undone!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#6c757d',
                                        confirmButtonText: 'Yes, Delete user!',
                                        cancelButtonText: 'No, cancel!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('deleteForm-' + id).submit();
                                        }
                                    })
                                }
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
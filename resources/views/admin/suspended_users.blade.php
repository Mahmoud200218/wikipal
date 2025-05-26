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
                <span class="card-label fw-bolder text-dark">Suspended Users ({{ App\Models\User::where('suspended', 'yes')->count() }}) out of ({{ App\Models\User::count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all suspended users on the platform</span>
            </h3>
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
                        <th>Change Status</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suspendedUsers as $user)
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
                                @if($user->suspended == 'no')
                                <!--begin::suspended-->
                                <form action="{{ route('admin.change.suspended.users', $user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="text-gray-800 fw-bolder fs-6 me-3" name="suspended" value="yes" type="submit"><i class="fas fa-check-circle text-success"></i>| Give</button>
                                </form>
                                <!--end::suspended-->
                                @else
                                <!--begin::Not suspended-->
                                <form action="{{ route('admin.change.suspended.users', $user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="text-gray-800 fw-bolder fs-6 me-3" name="suspended" value="no" type="submit"><i class="fas fa-times-circle text-danger"></i>| Swipe</button>
                                </form>
                                <!--end::Not suspended-->
                                @endif
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <td>
                            <a href="{{ route('user.overview', $user->id) }}">View</a>
                        </td>
                    </tr>
                    @empty
                    <div class="text-center py-20">
                        <i class="fas fa-user-slash fa-5x text-danger mb-5"></i>
                        <h2 class="fw-bold text-dark mb-3">There are no <strong>Suspended</strong> users</h2>
                        <p class="text-muted fs-5">No account has been suspended yet, all users are active.</p>
                    </div>
                    @endforelse
                </tbody>
            </table>
            {{ $suspendedUsers->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
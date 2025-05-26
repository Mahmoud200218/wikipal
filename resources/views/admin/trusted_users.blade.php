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
                <span class="card-label fw-bolder text-dark">Trusted Users ({{ App\Models\User::where('trusted', 'yes')->count() }}) out of ({{ App\Models\User::count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all trusted users on the platform</span>
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
                        <th>Trusted Badge</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trustedUsers as $user)
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
                                    <button class="text-gray-800 fw-bolder fs-6 me-3" name="trusted" value="yes" type="submit"><i class="fas fa-check-circle text-success"></i>| Give</button>
                                </form>
                                <!--end::Trusted-->
                                @else
                                <!--begin::Not Trusted-->
                                <form action="{{ route('admin.change.trusted.users', $user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="text-gray-800 fw-bolder fs-6 me-3" name="trusted" value="no" type="submit"><i class="fas fa-times-circle text-danger"></i>| Swipe</button>
                                </form>
                                <!--end::Not Trusted-->
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
                        <span class="svg-icon svg-icon-5x svg-icon-primary mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="54px" height="54px" viewBox="0 0 24 24">
                                <path
                                    d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                    fill="#00A3FF" />
                                <path class="permanent"
                                    d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <h2 class="fw-bold text-dark mb-3">There are no <strong>Trusted</strong> users</h2>
                        <p class="text-muted fs-5">No account has been trusted yet.</p>
                    </div>
                    @endforelse
                </tbody>
            </table>
            {{ $trustedUsers->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
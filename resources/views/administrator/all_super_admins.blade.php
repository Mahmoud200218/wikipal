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
                <span class="card-label fw-bolder text-dark">Super Admins ({{ App\Models\Admin::where('super_admin', '1')->count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">All SUPER ADMINS on the platform</span>
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
                    <tr style="background-color: #DAA520;" class="fw-bold fs-6 text-white border-bottom border-gray-200">
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Account Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($super_admins as $super_admin)
                    <tr>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fd7e14" viewBox="0 0 16 16">
                                <path d="M3 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm10 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM8 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM2.5 5l2.5 4 3-3 3 3 2.5-4H2.5zm-1 6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v2H1.5v-2z" />
                            </svg>
                        <td>{{ $super_admin->name }}</td>
                        </td>
                        <td>{{ $super_admin->email }}</td>
                        <td>{{ $super_admin->created_at }}</td>
                        <td>
                            <p class="text-info">Super Admin</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $super_admins->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
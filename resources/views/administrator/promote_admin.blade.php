@extends('layouts.app')

@section('content')
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Promote to Super Admin Message-->
        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
            <div>
                <span style="font-size: 4rem;">🚀</span>
                <div class="pt-lg-10 mb-10">
                    <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Promote Admin to Super Admin</h1>

                    <div class="fw-semibold fs-3 text-muted mb-15">
                        You're about to grant this admin full administrative privileges.
                        <br />Super Admins can manage all aspects of the platform, including admins, users, content, and system settings.
                    </div>
                    <p class="fw-bolder fs-3 text-danger mb-5" style="border-left: 4px solid #dc3545; padding: 0 0 10px 12px;">
                        <i class="bi bi-shield-lock-fill me-2"></i> *{{ $admin->name }}* will be promoted to <span class="text-uppercase">Super Admin</span>
                    </p>

                    <form method="POST" action="{{ route('admin.add.super.admin', $admin->id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="super_admin" value="1" class="btn btn-lg btn-danger fw-bolder me-3">
                            Confirm Promotion
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-lg btn-light fw-bold">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Promote to Super Admin Message-->
    </div>
    <!--end::Main-->
</body>
<!--end::Body-->
@endsection
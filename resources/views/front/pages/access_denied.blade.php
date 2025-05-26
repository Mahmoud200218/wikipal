@extends('layouts.app')
@section('content')
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Access Denied Message-->
        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
            <!--begin::Icon-->
            <div>
                <span style="font-size: 4rem;">🚫</span>
            </div>
            <!--end::Icon-->

            <!--begin::Content-->
            <div class="pt-lg-10 mb-10">
                <h1 class="fw-bolder fs-2qx text-danger mb-7">Access Denied</h1>
                <div class="fw-semibold fs-3 text-muted mb-15">
                    You do not have permission to view this page.<br>
                    If you believe this is an error, please contact the administrator.
                </div>

                <div class="text-center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-lg btn-light-primary fw-bolder">
                        Return to Dashboard
                    </a>
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Access Denied Message-->
    </div>
    <!--end::Main-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Javascript-->
</body>
@endsection
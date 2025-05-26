@extends('layouts.app')
@section('content')
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15 bg-light">
                <!--begin::Header-->
                <div class="mb-10 pt-lg-10">
                    <img src="{{ asset('assets/media/icons/untrusted.png') }}" alt="Suspended" class="h-50px mb-5" />
                    <h1 class="fw-bolder fs-1 text-danger">Access Denied</h1>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="pt-lg-5 mb-10">
                    <h2 class="fw-semibold fs-2x text-gray-800 mb-4">Your account has been <strong class="text-danger">suspended</strong></h2>
                    <p class="fs-4 text-muted px-lg-20">
                        It looks like your account has been temporarily disabled due to a violation of our policies or inactivity.
                        <br>Please contact support if you believe this is a mistake.
                    </p>
                    <div class="mt-10">
                        <a href="{{ route('/') }}" class="btn btn-lg btn-primary fw-bold me-3">
                            Return to Homepage
                        </a>
                        <a href="{{ route('/') }}" class="btn btn-lg btn-light fw-bold">
                            Contact Support
                        </a>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Content-->

        </div>
        <!--end::Authentication - Signup Welcome Message-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
@endsection
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
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
                <!--begin::Logo-->
                <div>
                    <span style="font-size: 4rem;">👋</span> <!--end::Logo-->
                    <!--begin::Wrapper-->
                    <div class="pt-lg-10 mb-10">
                        <!--begin::Logo-->
                        <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Welcome to WikiPal</h1>
                        <!--end::Logo-->
                        <!--begin::Message-->
                        <div class="fw-semibold fs-3 text-muted mb-15">
                            Discover trusted news, insightful blogs, and a vibrant community all in one place.
                            <br />WikiPal empowers you to stay informed, share knowledge, and connect with like-minded voices.
                        </div>
                        <!--end::Message-->
                        <!--begin::Action-->
                        <div class="text-center">
                            <a href="{{ route('/') }}" class="btn btn-lg btn-primary fw-bolder"> Explore WikiPal
                            </a>

                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
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
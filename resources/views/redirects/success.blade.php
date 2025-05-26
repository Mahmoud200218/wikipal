@extends('layouts.app')
@section('content')
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('assets/media/auth/bg8.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('assets/media/auth/bg8-dark.jpg');
            }
        </style>
        <!--end::Page bg image-->


        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center text-center p-10">
                <!--begin::Wrapper-->
                <div class="card card-flush w-md-650px py-5">
                    <div class="card-body py-15 py-lg-20">

                        <!--begin::Logo-->
                        <div class="mb-7">
                            <a href="index.html" class="">
                                <img alt="Logo" src="assets/media/logos/logo2.png" class="h-40px" />
                            </a>
                        </div>
                        <!--end::Logo-->

                        <!--begin::Title-->
                        <h1 class="fw-bolder text-gray-900 mb-5">
                            Sent successfully </h1>
                        <!--end::Title-->

                        <!--begin::Text-->
                        <div class="fw-semibold fs-6 text-gray-500 mb-7">
                            This news will be verified by the moderators <br> and if approved you will be notified.
                        </div>
                        <!--end::Text-->

                        <!--begin::Illustration-->
                        <div class="mb-0">
                            <img src="assets/media/auth/welcome.png" class="mw-100 mh-300px theme-light-show" alt="" />
                            <img src="assets/media/auth/welcome-dark.png" class="mw-100 mh-300px theme-dark-show" alt="" />
                        </div>
                        <!--end::Illustration-->

                        <!--begin::Link-->
                        <div class="mb-0">
                            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-success">Go To Dashboard</a>
                        </div>
                        <!--end::Link-->

                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Signup Welcome Message-->
    </div>
    <!--end::Root-->
    <!--end::Main-->

@endsection
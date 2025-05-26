@extends('layouts.app')
@section('content')
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" style="top: 0;" id="kt_wrapper">
            <!--begin::Toolbar-->
            <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
                <!--begin::Container-->
                <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                        <!--begin::Title-->
                        <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Dashboard
                            <!--begin::Separator-->
                            <span class="h-20px border-gray-400 border-start mx-3"></span>
                            <!--end::Separator-->
                            <!--begin::Description-->
                            <small class="text-gray-500 fs-7 fw-bold my-1"><i class="fas fa-user text-primary"> </i> {{ Auth::user()->email }}</small>
                            <!--end::Description-->
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center">
                        <!--begin::Button-->
                        <a href="{{ route('user.profile') }}" class="btn btn-icon btn-color-primary bg-body w-80px h-35px h-lg-40px me-3">
                            My Profile
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <a href="{{ route('profile.edit') }}" class="btn btn-icon btn-color-primary bg-body w-150px h-35px h-lg-40px me-3">
                            Account Settings
                        </a>
                        <!--end::Button-->


                        <!--begin::Notifications-->
                        <!--begin::Activities-->
                        <div class="d-flex align-items-center ms-3 ms-lg-4" style="margin-right: 8px;">
                            <!--begin::Drawer toggle-->
                            <div class="position-relative">
                                <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-outline-secondary w-40px h-40px" id="kt_activities_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black" />
                                            <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>

                                <!--begin::Badge-->
                                @php
                                $user = Auth::user();
                                $count = $user->unReadNotifications()->count();
                                @endphp

                                @if ($count >= 9)
                                <span class="position-absolute top-0 start-100 translate-middle badge badge-circle bg-danger fs-8">
                                    +{{ $count }}
                                </span>
                                @else
                                <span class="position-absolute top-0 start-100 translate-middle badge badge-circle bg-danger fs-8">
                                    {{ $count }}
                                </span>
                                @endif
                                <!--end::Badge-->
                            </div>
                            <!--end::Drawer toggle-->
                        </div>
                        <!--end::Activities-->
                        <!--end::Notifications-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Container-->
            </div>
            <x-notifications.user.notification count="9" />
            <!--end::Toolbar-->
            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Row-->
                    <div class="row g-5 g-lg-10" style="margin-bottom: 10px;">
                        <!--begin::Col-->
                        <div class="col-xl-4 mb-xl-10">
                            <!--begin::Mixed Widget 2-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 bg-primary py-5">
                                    <h3 class="card-title fw-bolder text-white">Add News:</h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <!--begin::Chart-->
                                    <div class="mixed-widget-2-chart card-rounded-bottom bg-primary" data-kt-color="primary" style="height: 200px"></div>
                                    <!--end::Chart-->
                                    <!--begin::Stats-->
                                    <div class="card-p mt-n20 position-relative">
                                        <!--begin::Row-->
                                        <div class="row g-0">
                                            <!--begin::Col-->
                                            <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                                <a href="{{ route('dashboard.politics.index') }}" class="text-warning fw-bold fs-3">Politics</a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                                <a href="{{ route('dashboard.opinions.index') }}" class="text-primary fw-bold fs-3">Opinions</a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row g-0">
                                            <!--begin::Col-->
                                            <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                                <a href="{{ route('dashboard.travel.index') }}" class="text-warning fw-bold fs-3">Travel</a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col bg-light-success px-6 py-8 rounded-2">
                                                <a href="{{ route('dashboard.business.index') }}" class="text-success fw-bold fs-3 mt-2">Business</a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row g-0" style="margin-bottom: 20px;">
                                            <!--begin::Col-->
                                            <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                                <!--end::Svg Icon-->
                                                <a href="{{ route('dashboard.styles.index') }}" class="text-danger fw-bold fs-3 mt-2">Styles</a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                                <a href="{{ route('dashboard.tech.index') }}" class="text-primary fw-bold fs-3">Tech</a>
                                            </div>
                                            <!--end::Col-->

                                        </div>
                                        <!--end::Row-->



                                        <!--begin::Row-->
                                        <div class="row g-0">
                                            <!--begin::Col-->
                                            <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                                <!--end::Svg Icon-->
                                                <a href="{{ route('dashboard.stories.index') }}" class="text-danger fw-bold fs-3 mt-2">
                                                    Stories
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col bg-light-success px-6 py-8 rounded-2">
                                                <a href="{{ route('dashboard.sports.index') }}" class="text-success fw-bold fs-3 mt-2">Sports</a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 2-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4 mb-xl-10">
                            <!--begin::Mixed Widget 6-->
                            <div class="card h-xl-100">
                                <!--begin::Beader-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Post Statistics</span>
                                        <span class="text-muted fw-bold fs-7">Total posts you have published</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body p-0 d-flex flex-column">
                                    <!--begin::Stats-->
                                    <div class="card-px pt-5 pb-10 flex-grow-1">
                                        <!--begin::Row-->
                                        <div class="row g-0 mt-5 mb-10">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-info">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm010.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M3 6C2.4 6 2 5.6 2 5V3C2 2.4 2.4 2 3 2H5C5.6 2 6 2.4 6 3C6 3.6 5.6 4 5 4H4V5C4 5.6 3.6 6 3 6ZM22 5V3C22 2.4 21.6 2 21 2H19C18.4 2 18 2.4 18 3C18 3.6 18.4 4 19 4H20V5C20 5.6 20.4 6 21 6C21.6 6 22 5.6 22 5ZM6 21C6 20.4 5.6 20 5 20H4V19C4 18.4 3.6 18 3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H5C5.6 22 6 21.6 6 21ZM22 21V19C22 18.4 21.6 18 21 18C20.4 18 20 18.4 20 19V20H19C18.4 20 18 20.4 18 21C18 21.6 18.4 22 19 22H21C21.6 22 22 21.6 22 21Z" fill="black" />
                                                                    <path d="M3 16C2.4 16 2 15.6 2 15V9C2 8.4 2.4 8 3 8C3.6 8 4 8.4 4 9V15C4 15.6 3.6 16 3 16ZM13 15V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V15C11 15.6 11.4 16 12 16C12.6 16 13 15.6 13 15ZM17 15V9C17 8.4 16.6 8 16 8C15.4 8 15 8.4 15 9V15C15 15.6 15.4 16 16 16C16.6 16 17 15.6 17 15ZM9 15V9C9 8.4 8.6 8 8 8H7C6.4 8 6 8.4 6 9V15C6 15.6 6.4 16 7 16H8C8.6 16 9 15.6 9 15ZM22 15V9C22 8.4 21.6 8 21 8H20C19.4 8 19 8.4 19 9V15C19 15.6 19.4 16 20 16H21C21.6 16 22 15.6 22 15Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $politicsCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Politics</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $opinionsCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Opinions</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row g-0">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $travelCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Travel</div>
                                                    </div>
                                                    <!--end::Title-->

                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm010.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M3 6C2.4 6 2 5.6 2 5V3C2 2.4 2.4 2 3 2H5C5.6 2 6 2.4 6 3C6 3.6 5.6 4 5 4H4V5C4 5.6 3.6 6 3 6ZM22 5V3C22 2.4 21.6 2 21 2H19C18.4 2 18 2.4 18 3C18 3.6 18.4 4 19 4H20V5C20 5.6 20.4 6 21 6C21.6 6 22 5.6 22 5ZM6 21C6 20.4 5.6 20 5 20H4V19C4 18.4 3.6 18 3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H5C5.6 22 6 21.6 6 21ZM22 21V19C22 18.4 21.6 18 21 18C20.4 18 20 18.4 20 19V20H19C18.4 20 18 20.4 18 21C18 21.6 18.4 22 19 22H21C21.6 22 22 21.6 22 21Z" fill="black" />
                                                                    <path d="M3 16C2.4 16 2 15.6 2 15V9C2 8.4 2.4 8 3 8C3.6 8 4 8.4 4 9V15C4 15.6 3.6 16 3 16ZM13 15V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V15C11 15.6 11.4 16 12 16C12.6 16 13 15.6 13 15ZM17 15V9C17 8.4 16.6 8 16 8C15.4 8 15 8.4 15 9V15C15 15.6 15.4 16 16 16C16.6 16 17 15.6 17 15ZM9 15V9C9 8.4 8.6 8 8 8H7C6.4 8 6 8.4 6 9V15C6 15.6 6.4 16 7 16H8C8.6 16 9 15.6 9 15ZM22 15V9C22 8.4 21.6 8 21 8H20C19.4 8 19 8.4 19 9V15C19 15.6 19.4 16 20 16H21C21.6 16 22 15.6 22 15Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $bussinessCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Business</div>
                                                    </div>
                                                    <!--end::Title-->

                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                    <!--begin::Stats-->
                                    <div class="card-px pt-5 pb-10 flex-grow-1">
                                        <!--begin::Row-->
                                        <div class="row g-0 mt-5 mb-10">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-info">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm010.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M3 6C2.4 6 2 5.6 2 5V3C2 2.4 2.4 2 3 2H5C5.6 2 6 2.4 6 3C6 3.6 5.6 4 5 4H4V5C4 5.6 3.6 6 3 6ZM22 5V3C22 2.4 21.6 2 21 2H19C18.4 2 18 2.4 18 3C18 3.6 18.4 4 19 4H20V5C20 5.6 20.4 6 21 6C21.6 6 22 5.6 22 5ZM6 21C6 20.4 5.6 20 5 20H4V19C4 18.4 3.6 18 3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H5C5.6 22 6 21.6 6 21ZM22 21V19C22 18.4 21.6 18 21 18C20.4 18 20 18.4 20 19V20H19C18.4 20 18 20.4 18 21C18 21.6 18.4 22 19 22H21C21.6 22 22 21.6 22 21Z" fill="black" />
                                                                    <path d="M3 16C2.4 16 2 15.6 2 15V9C2 8.4 2.4 8 3 8C3.6 8 4 8.4 4 9V15C4 15.6 3.6 16 3 16ZM13 15V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V15C11 15.6 11.4 16 12 16C12.6 16 13 15.6 13 15ZM17 15V9C17 8.4 16.6 8 16 8C15.4 8 15 8.4 15 9V15C15 15.6 15.4 16 16 16C16.6 16 17 15.6 17 15ZM9 15V9C9 8.4 8.6 8 8 8H7C6.4 8 6 8.4 6 9V15C6 15.6 6.4 16 7 16H8C8.6 16 9 15.6 9 15ZM22 15V9C22 8.4 21.6 8 21 8H20C19.4 8 19 8.4 19 9V15C19 15.6 19.4 16 20 16H21C21.6 16 22 15.6 22 15Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $stylesCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Styles</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $techsCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Tech</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row g-0">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-success">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $storiesCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Stories</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm010.svg-->
                                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M3 6C2.4 6 2 5.6 2 5V3C2 2.4 2.4 2 3 2H5C5.6 2 6 2.4 6 3C6 3.6 5.6 4 5 4H4V5C4 5.6 3.6 6 3 6ZM22 5V3C22 2.4 21.6 2 21 2H19C18.4 2 18 2.4 18 3C18 3.6 18.4 4 19 4H20V5C20 5.6 20.4 6 21 6C21.6 6 22 5.6 22 5ZM6 21C6 20.4 5.6 20 5 20H4V19C4 18.4 3.6 18 3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H5C5.6 22 6 21.6 6 21ZM22 21V19C22 18.4 21.6 18 21 18C20.4 18 20 18.4 20 19V20H19C18.4 20 18 20.4 18 21C18 21.6 18.4 22 19 22H21C21.6 22 22 21.6 22 21Z" fill="black" />
                                                                    <path d="M3 16C2.4 16 2 15.6 2 15V9C2 8.4 2.4 8 3 8C3.6 8 4 8.4 4 9V15C4 15.6 3.6 16 3 16ZM13 15V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V15C11 15.6 11.4 16 12 16C12.6 16 13 15.6 13 15ZM17 15V9C17 8.4 16.6 8 16 8C15.4 8 15 8.4 15 9V15C15 15.6 15.4 16 16 16C16.6 16 17 15.6 17 15ZM9 15V9C9 8.4 8.6 8 8 8H7C6.4 8 6 8.4 6 9V15C6 15.6 6.4 16 7 16H8C8.6 16 9 15.6 9 15ZM22 15V9C22 8.4 21.6 8 21 8H20C19.4 8 19 8.4 19 9V15C19 15.6 19.4 16 20 16H21C21.6 16 22 15.6 22 15Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="fs-4 text-dark fw-bolder">{{ $sportsCount }}</div>
                                                        <div class="fs-7 text-muted fw-bold">Sports</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 6-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4 mb-xl-10">
                            @foreach ($latestNews as $news)
                            <div class="d-flex align-items-sm-center mb-7">
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label">
                                        <i class="bi bi-journal-text fs-2 text-primary"></i>
                                    </span>
                                </div>

                                @php
                                switch($news->table_name){
                                case 'opinions':
                                $route = route('opinions_details', $news->id);
                                break;
                                case 'politics':
                                $route = route('politics_details', $news->id);
                                break;
                                case 'sports':
                                $route = route('sports_details', $news->id);
                                break;
                                case 'styles':
                                $route = route('styles_details', $news->id);
                                break;
                                case 'technologies':
                                $route = route('techs_details', $news->id);
                                break;
                                case 'travel':
                                $route = route('travels_details', $news->id);
                                break;
                                case 'stories':
                                $route = route('stories_details', $news->id);
                                break;
                                case 'businesses':
                                $route = route('businesses_details', $news->id);
                                break;
                                }
                                @endphp
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <div class="flex-grow-1 me-2">
                                        <a href="{{ $route }}"
                                            class="text-gray-800 text-hover-primary fs-6 fw-bolder">
                                            {{ $news->title }}
                                        </a>
                                        <span class="text-muted fw-bold d-block fs-7">{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
                                    </div>
                                    <span class="badge badge-light fw-bolder my-2">New</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-5 g-lg-10" style="margin-top: 20px;">
                        <!--begin::Col-->
                        <p class="badge bg-primary latest_feed">Latest Feedback</p>
                        @foreach($feedbacks as $feedback)
                        <div class="col-xl-4 mb-xl-10">
                            <!--begin::Statistics Widget 1-->
                            <div class="card bgi-no-repeat h-xl-100" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-4.svg">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">MSG | {{ $feedback->name }}</a>
                                    <div class="fw-bolder text-primary my-6">{{ \Carbon\Carbon::parse($feedback->created_at)->format('d M Y') }}</div>
                                    <p class="text-dark-75 fw-bold fs-5 m-0">{{ $feedback->subject }}
                                        <br />
                                    </p>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 1-->
                        </div>
                        @endforeach
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <div class="row g-5 g-lg-10" style="margin-top: 20px;">
                        <p class="badge bg-primary latest_feed">Latest News</p>
                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Politics</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Politics::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($politics)
                                                @foreach($politics as $politic)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $politic->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.politics.show', $politic->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $politic->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $politic->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Opinions</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Opinion::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($opinions)
                                                @foreach($opinions as $opinion)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $opinion->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.opinions.show', $opinion->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $opinion->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $opinion->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->


                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Travel</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Travel::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($travels)
                                                @foreach($travels as $travel)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $travel->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.travel.show', $travel->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $travel->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $travel->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Business</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Business::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($businesses)
                                                @foreach($businesses as $business)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $business->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.business.show', $business->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $business->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $business->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Styles</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Style::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($styles)
                                                @foreach($styles as $style)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $style->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.styles.show', $style->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $style->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $style->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->


                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Technology</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Technology::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($techs)
                                                @foreach($techs as $tech)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $tech->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.tech.show', $tech->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $tech->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $tech->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->


                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Sports</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Sport::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($sports)
                                                @foreach($sports as $sport)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $sport->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.sports.show', $sport->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $sport->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $sport->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Tables Widget 3-->
                            <div class="card h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Stories</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">
                                            More than {{ App\Models\Dashboard\Story::where('user_id', auth()->id())->count() }} items have been added recently.
                                        </span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @if($stories)
                                                @foreach($stories as $story)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-50px me-2">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                    <img src="{{ asset('storage/' . $story->cover_image) }}" style="width:100%;" alt="">
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.stories.show', $story->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $story->title }}</a>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{ $story->short_title }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No items found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 3-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Calendar Widget 1-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Saved News</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Preview monthly events</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="../../demo20/dist/apps/calendar.html" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Calendar-->
                            <div id="kt_calendar_widget_1"></div>
                            <!--end::Calendar-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Calendar Widget 1-->
                    <!--begin::Calendar Widget 1-->
                    <!--begin::Card header-->
                    <p class="badge bg-primary latest_feed" style="margin: 70px 0 20px 0;">Latest Bookmark</p>
                    <!--begin::Code-->
                    <div class="pt-5" style="margin-top: 100px;">
                        <!--begin::Highlight-->
                        <div class="highlight">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <div class="nav-link active" data-bs-toggle="tab" role="tab">All the news bookmarks you've recently added | Total {{ App\Models\Dashboard\Bookmark::where('user_id', auth()->id())->count() }} Bookmarks </div>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_highlight_61cf086c0a000" role="tabpanel">
                                    <div class="highlight-code">
                                        <pre class="language-html text-white" style="height:400px;">
                                            <code class="language-html text-white">
                                                @foreach($bookmarks as $bookmark)
                                                <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
<button class="fs-5" style="" type="submit"><i class="fa fa-trash trash"></i>Delete</button>
#Name: {{ $bookmark->name }} <br><br>#URL: <a href="{{ $bookmark->url }}" target="_blank">{{ $bookmark->url }}</a> <br><br>#Description: {{ $bookmark->description }}<hr> 
</form>
@endforeach
</pre>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_highlight_61cf086c0a00a" role="tabpanel">
                                    <div class="highlight-code">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Highlight-->
                    </div>
                    <!--end::Code-->
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Calendar-->
                        <div id="kt_calendar_widget_1"></div>
                        <!--end::Calendar-->
                    </div>
                    <!--end::Card body-->
                    <!--end::Calendar Widget 1-->
                    <!--begin::Modals-->
                    <!--end::Modals-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
@endsection
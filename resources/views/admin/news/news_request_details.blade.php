@extends('layouts.app')
@section('content')
<!--begin::Col-->
<div class="col-xl-12">
    <!--begin::List Widget 6-->
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark">Details</h3>
            <a href="{{ route('admin.dashboard') }}">

            <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm rounded-pill" style="height: 36px; width:160px; margin: 15px 10px 0 0;">
                <i class="fas fa-cogs me-2"></i> Dashboard
            </button>
        </a>
        </div>
        <!--end::Header-->
        
        <!--begin::Body-->
        <div class="card-body pt-0">
            <!--begin::Item-->
            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-success me-5">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <!--end::Icon-->
                <!--begin::Title-->
                <div class="flex-grow-1 me-2">
                    <a href="#" class="fw-bolder text-gray-800 text-hover-success fs-6">Short Title</a>
                    <span class="text-muted fw-bold d-block">{{ $requestDetails->short_title }}</span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-success me-5">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <!--end::Icon-->
                <!--begin::Title-->
                <div class="flex-grow-1 me-2">
                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Title</a>
                    <span class="text-muted fw-bold d-block">{{ $requestDetails->title }}</span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-info me-5">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <!--end::Icon-->
                <!--begin::Title-->
                <div class="flex-grow-1 me-2">
                    <a href="#" class="fw-bolder text-gray-800 text-hover-info fs-6">First Description</a>
                    <span class="text-muted fw-bold d-block">{{ $requestDetails->first_description }}</span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center bg-light-info rounded p-5">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-info me-5">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <!--end::Icon-->
                <!--begin::Title-->
                <div class="flex-grow-1 me-2">
                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Second Description</a>
                    <span class="text-muted fw-bold d-block">{{ $requestDetails->second_description }}</span>
                </div>
                <!--end::Title-->


            </div>
            <!--end::Item-->

            <div class="d-flex align-items-center bg-light-info rounded p-5">
                <!--begin::Title-->
                <div class="flex-grow-1 me-2">
                    <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Resources:</a>
                    <ul class="list-group list-group-flush" style="margin-top: 20px;">
                        <li class="list-group-item bg-dark">
                            <p class="text-white pointer">Link1:</p> <a href="{{ $requestDetails->source_url_one  }}" target="_blank">{{ $requestDetails->source_url_one  }}</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <p class="text-white pointer">Link2:</p> <a href="{{ $requestDetails->source_url_two  }}" target="_blank">{{ $requestDetails->source_url_two  }}</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <p class="text-white pointer">Link3:</p> <a href="{{ $requestDetails->source_url_three  }}" target="_blank">{{ $requestDetails->source_url_three  }}</a>
                        </li>
                    </ul>
                </div>
                <!--end::Title-->
            </div>

            <div class="mt-12">
                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Trusted</th>
                            <th>Terms</th>
                            <th>Publication date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $requestDetails->user->name }}</td>
                            <td>{{ $requestDetails->user->email }}</td>
                            @if($requestDetails->user->trusted == 'yes')
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            @else
                            <td><i class="fas fa-times-circle text-danger"></i></td>
                            @endif

                            @if($requestDetails->policies == 'agree')
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            @else
                            <td><i class="fas fa-times-circle text-danger"></i></td>
                            @endif
                            <td>{{ $requestDetails->created_at }}</td>

                            @if($requestDetails->status == 'in_process')
                            <td>
                                <p class="text-primary">{{ $requestDetails->status }}</p>
                            </td>
                            @elseif($requestDetails->status == 'accepted')
                            <td>
                                <p class="text-success">{{ $requestDetails->status }}</p>
                            </td>
                            @else
                            <td>
                                <p class="text-danger">{{ $requestDetails->status }}</p>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 6-->
</div>
<!--end::Col-->
@endsection
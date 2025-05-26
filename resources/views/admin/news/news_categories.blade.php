@extends('layouts.app')
@section('content')
<!--begin::Tables Widget 10-->
<div class="card mb-5 mb-xl-8 mt-6">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">News Categories</span>
            <span class="text-muted mt-1 fw-bold fs-7">You can view news categories and <strong class="text-info">Select</strong> them from here.</span>
        </h3>
        <a href="{{ route('admin.dashboard') }}">
            <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm rounded-pill" style="height: 36px; width:160px">
                <i class="fas fa-cogs me-2"></i> Dashboard
            </button>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <div class="row g-4">
                <!-- In Process (Blue) -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary shadow-sm" style="height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-hourglass-split me-2 text-white"></i>In Process News
                            </h5>
                            <p class="card-text fs-2 fw-bold"></p>
                            <a href="{{ route('admin.process.news.requests') }}" class="btn btn-light">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Accepted (Green) -->
                <div class="col-md-4">
                    <div class="card text-white bg-success shadow-sm" style="height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-check-circle me-2 text-white"></i>Accepted News
                            </h5>
                            <p class="card-text fs-2 fw-bold"></p>
                            <a href="{{ route('admin.accepted.news.requests') }}" class="btn btn-light">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Rejected (Red) -->
                <div class="col-md-4">
                    <div class="card text-white bg-danger shadow-sm" style="height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-x-circle me-2 text-white"></i>Rejected News
                            </h5>
                            <p class="card-text fs-2 fw-bold"></p>
                            <a href="{{ route('admin.rejected.news.requests') }}" class="btn btn-light">View Details</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 10-->
@endsection
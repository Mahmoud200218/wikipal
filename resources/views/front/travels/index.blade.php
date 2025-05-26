@extends('layouts.app')
@section('search')
<div class="tit-style-parent">
    <div class="mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <h1 class="tit-style">Travels</h1>
        </div>
        <!--end::Container-->
    </div>
</div>
@endsection

@section('content')
<!--begin::Row-->
<div class="row">
    <!-- First Column: 70% of the width -->
    <div class="col-md-8" style="margin-right: 50px;">
        <!-- Begin Feature Post Section -->
        @if($travels->isNotEmpty())
        @foreach($travels as $travel)
        <div class="mb-10">
            <!-- Additional Posts -->
            <div class="ps-lg-6 mt-md-0 mt-17">
                <div>
                    <div class="fw-bold fs-5 mt-4 text-gray-600 text-dark tit">{{ Str::limit($travel->first_description, 300, '..') }}</div>
                    <div class="py-4 d-flex flex-lg-row">
                        <a href="{{ route('travels_details', $travel->id) }}" class="fw-bolder text-dark mb-4 tit">{{ Str::limit($travel->title, 60, '..') }}</a>
                        <img src="{{ asset('storage/' . $travel->cover_image) }}" style="height: 180px; width:200px;margin-left:50px;" alt="">
                    </div>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
        @else
        <div class="no-items-container">
            <h2 class="no-items-title">No items found</h2>
            <p class="no-items-text">
                It seems we couldn’t find what you’re looking for. Try adjusting your search or browsing other sections.
            </p>
            <button class="no-items-button" onclick="window.location.href='/'">Go Back Home</button>
        </div>

        @endif
        {{ $travels->withQueryString()->links() }}
    </div>

    <!-- Second Column: 30% of the width -->
    <div class="col-md-3 d-flex flex-column">
        <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">
            Most Read
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <!-- List of Posts -->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bolder text-dark mb-2 tit">1</div>
                </div>
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit">Luciana Borio and Scott Gottlieb</a>
            </div>
        </div>
        <hr>
        <!-- Additional Posts -->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bolder text-dark mb-2 tit">2</div>
                </div>
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit">Luciana Borio and Scott Gottlieb</a>
            </div>
        </div>
        <hr>
        <!-- Additional Posts -->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bolder text-dark mb-2 tit">3</div>
                </div>
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit">Luciana Borio and Scott Gottlieb</a>
            </div>
        </div>
        <hr>
        <!-- Additional Posts -->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bolder text-dark mb-2 tit">4</div>
                </div>
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit">Luciana Borio and Scott Gottlieb</a>
            </div>
        </div>
        <hr>
        <!-- Additional Posts -->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bolder text-dark mb-2 tit">5</div>
                </div>
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit">Luciana Borio and Scott Gottlieb</a>
            </div>
        </div>
    </div>
</div>


<!--begin::Row-->
@endsection
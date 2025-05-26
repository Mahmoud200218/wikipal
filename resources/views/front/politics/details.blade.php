@extends('layouts.app')
@section('search')
<div class="">
    <div class="mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <h1 class="tit-style" style="text-align: left;">{{ $politics->title ?? '' }}</h1>
        </div>
        <!--end::Container-->
    </div>

    <div class="mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <P class="tit-desc fs-3">{{ $politics->short_title ?? '' }}</P>
            <!--end::Container-->
        </div>
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <P class="tit-desc">{{ $politics->created_at->diffForHumans() }}</P>
            <!--end::Container-->
        </div>


        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <div class="d-flex align-items-center gap-3">
                @if($politics->podcast)
                 <!-- Broadcast Icon -->
                 <div>
                    <audio id="audioPlayer" controls>
                        <source src="{{ asset('storage/' . $politics->podcast ) }}" type="audio/ogg">
                    </audio>
                </div>
                @endif

                <!-- Twitter Share Button -->
                <x-front.share-news />

                <!-- Save Post Icon -->
                <div>
                    <button class="btn btn-icon bookmark-btn"
                        data-news-type="Opinion" type="button" id="deleteBtn">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <x-confirmation-toast-bookmark />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('content')
<!--begin::Row-->
<div class="row">
    @if($politics)
    <!--begin::Col-->
    <div class="col-md-8" style="max-width: 70%;">
        <!--begin::Feature post-->
        <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
            <div class="content">
                <!--begin::Video-->
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $politics->cover_image ) }}" style="height: 650px; width:800px;" alt="">
                </div>
                <!--end::Video-->
                <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
                    <P class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $politics->cover_image_description }}</P>
                    <!--end::Container-->
                </div>
                <!--begin::Body-->

                <div class="mb-5" style="width: 80%; margin:60px 0 0 60px">
                    <div class="">
                        <!--begin::Title-->
                        <a href="{{ route('user.overview', $politics->user->id) }}" class="fw-bold fs-4 text-dark-600 text-dark mt-4 desc">
                            By {{ $politics->user->name  }} </a>
                        <p class="line"></p>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="fw-bold fs-2 text-dark-600 text-dark mt-4 desc">
                            {{ $politics->first_description  }}
                        </div>
                        <br><br><br>
                        <div class="row align-items-center">
                            <!-- Description Column -->
                            <div class="col-md-6">
                                <div class="fw-bold fs-5 text-dark-600 text-dark mt-4 desc">
                                    {{ $politics->cover_image_description }}
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="col-md-6 mb-3">
                                <img src="{{ asset('storage/' . $politics->other_image) }}" style="height: 320px; width: 100%; object-fit: cover;" alt="Image">
                            </div>
                        </div>
                        <br><br><br>
                        <!-- Description Column -->
                        <div class="">
                            <div class="fw-bold fs-2 text-dark-600 text-dark mt-4 desc">
                                {{ $politics->second_description }}
                            </div>
                        </div>

                        <br><br><br><br>
                        <!-- Description Column -->
                        <div class="card bg-dark">
                            <div class="card-body bg-dark">
                                <p class="fs-3 tit text-white">Sources & References</p>
                                <ul class="list-group list-group-flush">
                                    <!-- Reference 1 -->
                                    <li class="list-group-item bg-dark">
                                        <p class="text-white pointer">Link1:</p> {{ $politics->source_url_one  }}
                                    </li>
                                    <!-- Reference 2 -->
                                    <li class="list-group-item bg-dark">
                                        <p class="text-white pointer">Link2:</p> {{ $politics->source_url_two  }}
                                    </li>
                                    <!-- Reference 3 -->
                                    <li class="list-group-item bg-dark">
                                        <p class="text-white pointer">Link3:</p> {{ $politics->source_url_three }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <livewire:comments :model="$politics" />
                </div>
            </div>
        </div>
        <!--end::Feature post-->
    </div>
    @else
    <div class="no-items-container">
        <h2 class="no-items-title">No items found</h2>
        <p class="no-items-text">
            It seems we couldn’t find what you’re looking for. Try adjusting your search or browsing other sections.
        </p>
        <button class="no-items-button" onclick="window.location.href='/'">Go Back Home</button>
    </div>

    @endif
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 d-flex flex-column" style="max-width: 30%;">
        <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">Most Read <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <!--begin::Post-->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <!--begin::Title-->
                <div class="col-md-6">
                    <!--begin::Text-->
                    <div class="fw-bolder text-dark mb-2 tit">1</div>
                    <!--end::Text-->
                </div>
                <!--end::Title-->
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit"> Luciana Borio and Scott Gottlieb Luciana Borio and Scott Gottlieb </a>
            </div>
            <!--end::Body-->
        </div>
        <hr>
        <!--end::Post-->
        <!--begin::Post-->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <!--begin::Title-->
                <div class="col-md-6">
                    <!--begin::Text-->
                    <div class="fw-bolder text-dark mb-2 tit">2</div>
                    <!--end::Text-->
                </div>
                <!--end::Title-->
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit"> Luciana Borio and Scott Gottlieb Luciana Borio and Scott Gottlieb </a>
            </div>
            <!--end::Body-->
        </div>
        <hr>
        <!--end::Post-->
        <!--begin::Post-->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <!--begin::Title-->
                <div class="col-md-6">
                    <!--begin::Text-->
                    <div class="fw-bolder text-dark mb-2 tit">3</div>
                    <!--end::Text-->
                </div>
                <!--end::Title-->
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit"> Luciana Borio and Scott Gottlieb Luciana Borio and Scott Gottlieb </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Post-->
        <hr>
        <!--begin::Post-->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <!--begin::Title-->
                <div class="col-md-6">
                    <!--begin::Text-->
                    <div class="fw-bolder text-dark mb-2 tit">4</div>
                    <!--end::Text-->
                </div>
                <!--end::Title-->
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit"> Luciana Borio and Scott Gottlieb Luciana Borio and Scott Gottlieb </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Post-->
        <hr>
        <!--begin::Post-->
        <div class="ps-lg-6 mt-md-0 mt-17">
            <div class="row">
                <!--begin::Title-->
                <div class="col-md-6">
                    <!--begin::Text-->
                    <div class="fw-bolder text-dark mb-2 tit">5</div>
                    <!--end::Text-->
                </div>
                <!--end::Title-->
                <a href="#" class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit"> Luciana Borio and Scott Gottlieb Luciana Borio and Scott Gottlieb </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Col-->
</div>
<!--begin::Row-->
@endsection
@extends('layouts.app')
@section('search')
<div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
        <!--begin::Main wrapper-->
        <div
            id="kt_docs_search_handler_basic"

            data-kt-search-keypress="true"
            data-kt-search-min-length="2"
            data-kt-search-enter="true"
            data-kt-search-layout="inline">

            <!--begin::Input Form-->
            <form data-kt-search-element="form" action="{{ route('search.on.content') }}" method="GET" class="w-300 position-relative mb-5" autocomplete="off">
                <!--begin::Hidden input(Added to disable form autocomplete)-->
                <input type="hidden" />
                <!--end::Hidden input-->

                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <!--end::Icon-->

                <!--begin::Input-->

                <input type="text" style="width: 88.5rem;" class="form-control form-control-lg form-control-solid px-15"
                    name="query"
                    value="{{ request('query') }}"
                    placeholder="{{ __('Search') }}"
                    data-kt-search-element="input" />
                <!--end::Input-->

        </div>
        <!--end::Main wrapper-->
        <div class="search-icon">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
            </button>
        </div>
        </form>
    </div>
    <!--end::Container-->
</div>
@endsection
@section('content')
<!--begin::Home card-->
<div class="card">
    <!--begin::Body-->
    <div class="card-body p-lg-20">
        <!--begin::Section-->
        <div class="mb-17">
            <div class="flex d-flex justify-content-between">
                <!--begin::Title-->
                <h3 class="text-dark fs-2 mt-4 mb-7 tit">{{ __('Democracy Dies in Darkness') }}</h3>
                <div id="live-video-section">
                    <a href="{{ route('live') }}" class="live-icon">
                        <div class="dot"></div>
                        <div class="text">{{ __('Live') }}</div>
                    </a>
                </div>
            </div>

            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Feature post-->
                    <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                        @if($lastPolitics)
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <a href="{{ route('politics_details', $lastPolitics->id ?? '') }}">
                                    <img src="{{ asset('storage/' . $lastPolitics->cover_image ?? '') }}" style="width: 80%;" alt="">
                                </a>
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <!--begin::Title-->
                                <a href="{{ route('politics_details', $lastPolitics->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                    {{ $lastPolitics->title }}</a>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $lastPolitics->short_title }}</div>
                                <!--end::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $lastPolitics->user->name }}</div>
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if($lastBusiness)
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $lastBusiness->cover_image) }}" style="width: 80%;" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <!--begin::Title-->
                                <a href="{{ route('businesses_details', $lastBusiness->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                    {{ $lastBusiness->title }}</a>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $lastBusiness->short_title }}</div>
                                <!--end::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $lastBusiness->user->name }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 justify-content-between d-flex flex-column">
                    <!--begin::Post-->
                    <!--begin::Body-->
                    <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Opinions') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    @foreach($opinions as $opinion)
                    <div class="ps-lg-6 mt-md-0 mt-17">
                        <div class="">
                            <!--begin::Title-->
                            <div class="fw-bold fs-5 mt-4 text-gray-600 text-dark tit">{{ $opinion->user->name }}</div>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <a href="{{ route('opinions_details', $opinion->id) }}" class="fw-bolder text-dark mb-4 tit">{{ Str::limit($opinion->title, 60, '..') }}</a>
                            <!--end::Text-->
                        </div>
                        <!--end::Body-->
                    </div>
                    @endforeach
                    <!--end::Post-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Row-->
        </div>
        <!--end::Section-->
        <hr>
        <div class="others">
            <!--begin::Section-->
            <div class="mb-17">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-md-6">
                        @foreach($techs as $tech)
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $tech->cover_image) }}" class="img-style" style="width: 100%;" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <!--begin::Title-->
                                <a href="{{ route('techs_details', $tech->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                    {{ $tech->title }}</a>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $tech->short_title }}</div>
                                <!--end::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $tech->user->name }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--end::Col-->
                    @foreach($politics as $politic)
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $politic->cover_image) }}" class="img-style" style="width: 100%;" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <!--begin::Title-->
                                <a href="{{ route('politics_details', $politic->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                    {{ $politic->title }}</a>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $politic->short_title }}</div>
                                <!--end::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $politic->user->name }}</div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    @endforeach
                    @foreach($businesses as $business)
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $business->cover_image) }}" class="img-style" style="width: 100%; max-height:600px" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <!--begin::Title-->
                                <a href="{{ route('businesses_details', $business->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                    {{ $business->title }}</a>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $business->short_title }}</div>
                                <!--end::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $business->user->name }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end::Col-->
                    <!--begin::Col-->
                    @foreach($stories as $story)
                    <div class="col-md-6">
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $story->cover_image) }}" class="img-style" style="width: 100%;" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <!--begin::Title-->
                                <a href="{{ route('stories_details', $story->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                    {{ $story->title }}</a>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $story->short_title }}</div>
                                <!--end::Text-->
                                <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $story->user->name }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end::Col-->
                </div>
                <!--begin::Row-->
            </div>
            <!--end::Section-->
        </div>
        @auth
        <div class="donate">
            <div class="donate_section">
                <div class="donate_content">
                    <p class="tit fs-3">{{ __('Post your latest news to be reviewed and published') }}</p>
                    <a href="{{ route('dashboard') }}"><button class="btn btn-dark">{{ __('Post News') }}</button></a>
                </div>
            </div>
        </div>
        @else
        <div class="donate">
            <div class="donate_section">
                <div class="donate_content">
                    <p class="tit fs-3">{{ __('Now is definitely not the time to stop reading.') }}</p>
                    <button class="btn btn-dark">{{ __('Sign in') }}</button>
                </div>
            </div>
        </div>
        @endauth
        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark"> <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Sports') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></h3>
                <!--end::Title-->
            </div>
            <!--end::Content-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row g-10">
                <!--begin::Col-->
                @foreach($sportsList as $sportList)
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <!--begin::Image-->
                        <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('storage/' . $sportList->cover_image)" href="{{ route('sports_details', $sportList->id) }}">
                            <img src="{{ 'storage/' . $sportList->cover_image }}" class="img-style-list" alt="">
                        </a>
                        <!--end::Image-->
                        <!--begin::Body-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <a href="{{ route('sports_details', $sportList->id) }}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base tit">{{ $sportList->title }}</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-bold fs-5 text-gray-600 text-dark my-4 desc">{{ $sportList->short_title }}</div>
                            <!--end::Text-->
                            <!--begin::Content-->
                            <div class="fs-6 fw-bolder">
                                <!--begin::Author-->
                                <a href="../../demo20/dist/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary fs-5 tit">Jane Miller</a>
                                <!--end::Author-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feature post-->
                </div>
                @endforeach
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark"> <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Technology') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></h3>
                <!--end::Title-->
            </div>
            <!--end::Content-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row g-10">
                <!--begin::Col-->
                @foreach($technologyList as $technology)
                <div class="col-md-4">
                    <!--begin::Hot sales post-->
                    <div class="card-xl-stretch me-md-6">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" href="{{ route('techs_details', $technology->id) }}">
                            <!--begin::Image-->
                            <img src="{{ 'storage/' . $technology->cover_image }}" class="img-style-list" alt="">
                            <!--end::Image-->
                        </a>
                        <!--end::Overlay-->
                        <!--begin::Body-->
                        <div class="mt-5">
                            <!--begin::Title-->
                            <a href="{{ route('techs_details', $technology->id) }}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base tit">{{ $technology->title }}</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 desc">{{ $technology->short_title }}</div>
                            <!--end::Text-->
                            <!--begin::Text-->
                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                <!--begin::Label-->
                                <span class="badge fs-2 fw-bolder text-dark p-2">
                                    <span class="text-gray-700 text-hover-primary fs-5 tit">{{ $technology->user->name }}</span></span>
                                <!--end::Label-->
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Hot sales post-->
                </div>
                @endforeach
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark"> <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Business') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></h3>
                <!--end::Title-->
            </div>
            <!--end::Content-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row g-10">
                <!--begin::Col-->
                @foreach($bussinessList as $bussiness)
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <!--begin::Image-->
                        <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" href="{{ route('businesses_details', $bussiness->id) }}">
                            <img src="{{ 'storage/' . $bussiness->cover_image }}" class="img-style-list" alt="">
                        </a>
                        <!--end::Image-->
                        <!--begin::Body-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <a href="{{ route('businesses_details', $bussiness->id) }}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base tit">{{ $bussiness->title }}</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-bold fs-5 text-gray-600 text-dark my-4 desc">{{ $bussiness->short_title }}</div>
                            <!--end::Text-->
                            <!--begin::Content-->
                            <div class="fs-6 fw-bolder">
                                <!--begin::Author-->
                                <a class="text-gray-700 text-hover-primary fs-5 tit">{{ $bussiness->user->name }}</a>
                                <!--end::Author-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feature post-->
                </div>
                @endforeach
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark"> <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Travel') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></h3>
                <!--end::Title-->
            </div>
            <!--end::Content-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row g-10">
                <!--begin::Col-->
                @foreach($travelList as $travel)
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <!--begin::Image-->
                        <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('storage/' . $travel->cover_image)">
                            <img src="{{ 'storage/' . $travel->cover_image }}" class="img-style-list" alt="">
                        </a>
                        <!--end::Image-->
                        <!--begin::Body-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <a href="{{ route('travels_details', $travel->id) }}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base tit">{{ $travel->title }}</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-bold fs-5 text-gray-600 text-dark my-4 desc">{{ $travel->short_title }}</div>
                            <!--end::Text-->
                            <!--begin::Content-->
                            <div class="fs-6 fw-bolder">
                                <!--begin::Author-->
                                <a class="text-gray-700 text-hover-primary fs-5 tit">{{ $travel->user->name }}</a>
                                <!--end::Author-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feature post-->
                </div>
                @endforeach
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
        <div class="donate">
            <div class="donate_section">
                <div class="donate_content">
                    <p class="tit fs-3">{{ __('Your donation can help us continue to spread the truth') }}</p>
                    <button>
                        <a class="nav-link nav-link-donate" href="{{ route('donate') }}">Donate</a>
                    </button>
                </div>
            </div>
        </div>

        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Title-->
            <h3 class="text-dark fs-2 mt-4 mb-7 tit">{{ __('Fashion popularity makes a difference in our world') }}</h3>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Feature post-->
                    <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                        @if($lastStyle)
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $lastStyle->cover_image) }}" style="height: 450px; width:500px;" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <div class="">
                                    <!--begin::Title-->
                                    <a href="{{ route('styles_details', $lastStyle->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                        {{ $lastStyle->title }}</a>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $lastStyle->short_title }}</div>
                                    <!--begin::Video-->
                                    <!--end::Video-->
                                    <!--end::Text-->
                                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $lastStyle->user->name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 justify-content-between d-flex flex-column">
                    <a href="{{ route('styles') }}" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Style') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <!--begin::Post-->
                    @foreach($stylesList as $style)
                    <div class="ps-lg-6 mt-md-0 mt-17">
                        <div class="">
                            <!--begin::Title-->
                            <div class="fw-bold fs-5 mt-4 text-gray-600 text-dark tit"> {{ $style->user->name }} </div>
                            <!--end::Title-->
                            <div class=" py-4 d-flex flex-lg-row">
                                <!--begin::Text-->
                                <a href="{{ route('styles_details', $style->id) }}" class="fw-bolder text-dark mb-4 tit">{{ $style->title }}</a>
                                <!--end::Text-->
                                <img src="{{ asset('storage/' . $style->cover_image) }}" style="height: 180px; width:200px; margin-left: 40px;" alt="">
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    @endforeach
                    <hr>
                    <!--end::Post-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Row-->
        </div>
        <!--end::Section-->
        <hr style="margin-bottom: 80px;margin-top: 60px">

        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark"> <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Featured Videos') }}<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></h3>
                <!--end::Title-->
            </div>
            <!--end::Content-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row g-10">
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <div class="mb-3">
                            <iframe class="embed-responsive-item card-rounded h-400px w-100" src="https://www.youtube.com/embed/qwDLsZMT9ro?si=wgpv1UAFu0EJg1uU" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <div class="mb-3">
                            <iframe class="embed-responsive-item card-rounded h-400px w-100" src="https://www.youtube.com/embed/G2XIqWXB9eo?si=eVDk4TGTr5fUeFPx" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <div class="mb-3">
                            <iframe class="embed-responsive-item card-rounded h-400px w-100" src="https://www.youtube.com/embed/bDP-NhNfRck?si=5UdnQji5JtEb0ECa" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
        <hr>
        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Title-->
            <h3 class="text-dark fs-2 mt-4 mb-7 tit">{{ __('Real Palestinian stories that express their suffering') }}</h3>
            <!--end::Title-->
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Feature post-->
                    <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                        @if($lastStory)
                        <div class="content">
                            <!--begin::Video-->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $lastStory->cover_image) }}" style="height: 450px; width:500px;" alt="">
                            </div>
                            <!--end::Video-->
                            <!--begin::Body-->

                            <div class="mb-5">
                                <div class="">
                                    <!--begin::Title-->
                                    <a href="{{ route('stories_details', $lastStory->id) }}" class="fs-2 text-dark fw-bolder text-hover-primary text-dark lh-base tit">
                                        {{ $lastStory->title }}</a>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $lastStory->short_title }}</div>
                                    <!--begin::Video-->
                                    <!--end::Video-->
                                    <!--end::Text-->
                                    <div class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">By {{ $lastStory->user->name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 justify-content-between d-flex flex-column">
                    <!--begin::Post-->
                    <!--begin::Body-->
                    <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Stories') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <!--begin::post-->
                    @foreach($stories as $story)
                    <div class="ps-lg-6 mt-md-0 mt-17">
                        <div class="">
                            <!--begin::Title-->
                            <div class="fw-bold fs-5 mt-4 text-gray-600 text-dark tit"> {{ $story->user->name }} </div>
                            <!--end::Title-->
                            <div class=" py-4 d-flex flex-lg-row">
                                <!--begin::Text-->
                                <a href="#" class="fw-bolder text-dark mb-4 tit">{{ $story->title }}</a>
                                <!--end::Text-->
                                <img src="{{ asset('storage/' . $story->cover_image) }}" style="height: 180px; width:200px;margin-left: 40px;">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <!--end::Post-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Row-->
        </div>
        <!--end::Section-->
        <hr>
        <!--begin::Section-->
        <div class="mb-17">
            <!--begin::Content-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Title-->
                <h3 class="text-dark"> <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{ __('Top Donors') }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path d="M8 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></h3>
                <!--end::Title-->
            </div>
            <!--end::Content-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mb-9"></div>
            <!--end::Separator-->
            <!--begin::Row-->
            <div class="row g-10">
                <!--begin::Col-->

                @foreach($topDonors as $index => $donor)
                @php
                $medals = ['🥇', '🥈', '🥉'];
                $color = $colors[$index] ?? '#ccc';
                $medal = $medals[$index] ?? '';
                @endphp

                <div class="col-md-4">
                    <div class="card-xl-stretch me-md-6 mb-5">
                        <div class="p-5 border rounded shadow-sm bg-white position-relative" style="height: 150px;">
                            <!--begin::Medal Icon-->
                            <div class="position-absolute top-0 end-0 m-3 fs-1" title="Rank #{{ $index + 1 }}">
                                {{ $medal }}
                            </div>
                            <!--end::Medal Icon-->

                            <!--begin::Name-->
                            <h3 class="fs-3 fw-bold text-dark mb-2">
                                {{ $donor->donater_name }}
                            </h3>
                            <!--end::Name-->

                            <!--begin::Amount-->
                            <p class="fw-semibold fs-5 text-success mb-3">
                                Donated: ${{ number_format($donor->actual_price, 2) }}
                            </p>
                            <!--end::Amount-->

                            <!--begin::Message-->
                            @if(!empty($donor->message))
                            <p class="fs-6 text-gray-700 fst-italic">
                                "{{ Str::limit($donor->message, 120) }}"
                            </p>
                            @endif
                            <!--end::Message-->

                        </div>
                    </div>
                </div>

                <!--end::Col-->
                @endforeach
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
    </div>
    <!--end::Body-->
</div>
<!--end::Home card-->
@endsection
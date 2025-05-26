@extends('layouts.app')
@section('search')
<div class="">
    <div class="mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <h1 class="tit-style" style="text-align: left;">{{ $opinion->title ?? '' }}</h1>
        </div>
        <!--end::Container-->
    </div>

    <div class="mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <P class="tit-desc fs-3">{{ $opinion->short_title ?? '' }}</P>
            <!--end::Container-->
        </div>
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <P class="tit-desc">{{ $opinion->created_at->diffForHumans() }}</P>
            <!--end::Container-->
        </div>


        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <div class="d-flex align-items-center gap-3">
                <!-- Broadcast Icon -->
                <div>
                    <audio id="audioPlayer" controls>
                        <source src="{{ asset('storage/' . $opinion->podcast ) }}" type="audio/ogg">
                    </audio>
                </div>


                <!-- Twitter Share Button -->
                <x-front.share-news />


                <!-- Edit Button -->
                <div>
                    <a href="{{ route('dashboard.opinions.edit', $opinion->id) }}" class="edit-btn">
                        <i class="fas fa-edit fs-4"></i><span class="fs-4">Edit</span>
                    </a>
                </div>

                <!-- Delete Button -->
                <div>
                    <form action="{{ route('dashboard.opinions.destroy', $opinion->id) }}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn-up" type="button" id="deleteBtn">
                            <i class="fas fa-trash fs-4"></i><span class="fs-4">Delete</span>
                        </button>
                    </form>
                </div>
                <x-confirmation-toast />

            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!--begin::Row-->
<div class="container">
    <div class="row">
        <!--begin::Col First Col - Left -->
        <div class="col-md-8">
            @if($opinion)
            <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                <div class="content">
                    <!--begin::Video-->
                    @if($opinion->cover_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $opinion->cover_image ) }}" style="height: 450px; width:600px;" alt="Cover image">
                    </div>
                    <!--end::Video-->
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
                        <P class="fw-bold fs-5 text-gray-600 text-dark mt-4 desc">{{ $opinion->cover_image_description }}</P>
                    </div>
                    @endif
                    <!--begin::Body-->
                    <div class="mb-5" style="width: 80%; margin:60px 0 0 60px">
                        <div class="">
                            <a href="#" class="fw-bold fs-4 text-dark-600 text-dark mt-4 desc">
                                By {{ $opinion->user->name  }} </a>
                            <p class="line"></p>
                            <div class="fw-bold fs-3 text-dark-600 text-dark mt-4 desc">
                                {{ $opinion->first_description  }}
                            </div>
                            <br><br><br>
                            @if($opinion->other_image)
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="fw-bold fs-5 text-dark-600 text-dark mt-4 desc">
                                        {{ $opinion->other_image_description }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/' . $opinion->other_image) }}" style="height: 320px; width: 100%; object-fit: cover;" alt="Image">
                                </div>
                            </div>
                            @endif
                            <br><br><br>
                            <div class="">
                                <div class="fw-bold fs-3 text-dark-600 text-dark mt-4 desc">
                                    {{ $opinion->second_description }}
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="card bg-dark">
                                <div class="card-body bg-dark">
                                    <p class="fs-3 tit text-white">{{ __('Sources & References') }}</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-dark">
                                            <p class="text-white pointer">Link1:</p> <a href="{{ $opinion->source_url_one  }}" target="_blank">{{ $opinion->source_url_one  }}</a>
                                        </li>
                                        <li class="list-group-item bg-dark">
                                            <p class="text-white pointer">Link2:</p> <a href="{{ $opinion->source_url_two  }}" target="_blank">{{ $opinion->source_url_two  }}</a>
                                        </li>
                                        <li class="list-group-item bg-dark">
                                            <p class="text-white pointer">Link3:</p> <a href="{{ $opinion->source_url_three  }}" target="_blank">{{ $opinion->source_url_three  }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="no-items-container">
                <h2 class="no-items-title">{{ __('No items found') }}</h2>
                <p class="no-items-text">
                    {{ __('It seems we couldn’t find what you’re looking for. Try adjusting your search or browsing other sections') }}
                </p>
                <button class="no-items-button" onclick="window.location.href='/'">{{ __('Go Back Home') }}</button>
            </div>
            @endif
        </div>
        <!--end::Col First Col - Left -->

        <!--begin::Col Second Col - Right -->
        <div class="col-md-4">
            <a href="#" class="fw-bold fs-4 mt-4 text-danger tit">{{__('Latest News')}}</a>
            @foreach($latestNews as $news)
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

            <div class="ps-lg-6 mt-md-0 mt-17">
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-6" style="width: 100%;">
                        <a href="{{ $route }}" class="fw-bolder text-dark fs-5 mb-2 tit">{{ $news->title }}</a>
                    </div>
                    <div class="fw-bold fs-4 mt-4 text-gray-600 text-dark tit"> {{ $news->created_at }} </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
        <!--end::Col Second Col - Right -->
    </div>
</div>
<!--begin::Row-->
@endsection
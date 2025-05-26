@extends('layouts.app')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Stories</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('/') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard.stories.index') }}" class="text-muted text-hover-primary">Stories</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit Stories/li>
                        <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post" style="margin-top:30px">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <form action="{{ route('dashboard.stories.update', $story->id) }}" method="post" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Cover Image</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            @if(isset($story->cover_image))
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('storage/' . $story->cover_image ) }})">
                                @else
                                <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                    @endif                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="cover_image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the news cover image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                            <!--end::Description-->
                            @error('cover_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!--end::Card body-->

                        <div class="card-body text-center pt-0">
                            <!--begin::Editor-->
                            <div>
                                <textarea name="cover_image_description" class="form-control mb-2" placeholder="Image Description" style="height: 150px;">{{ old('cover_image_description', $story->cover_image_description) }}</textarea>
                            </div>
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Write the cover image description of this news.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select">
                                <option></option>
                                <option value="active" selected="selected">Active</option>
                                <option value="archived">Archived</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category status.</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date &amp; time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title" value="{{ old('title', $story->title) }}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A Title is required and recommended to be clear.</div>
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Short Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="short_title" class="form-control mb-2" placeholder="Short Title" value="{{ old('short_title', $story->short_title) }}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A short and simple description to explain this news.</div>
                                <!--end::Description-->
                                @error('short_title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div style="margin-bottom: 30px;">
                                <!--begin::Label-->
                                <label class="form-label required">First Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <div>
                                    <textarea name="first_description" id="" class="form-control mb-2" placeholder="First Description" style="height: 200px;">{{ old('first_description', $story->first_description) }}</textarea>
                                </div>
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Write the first description of this news.</div>
                                <!--end::Description-->
                                @error('first_description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Second Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <div>
                                    <textarea name="second_description" id="" class="form-control mb-2" placeholder="Second Description" style="height: 150px;">{{ old('second_description',$story->second_description) }}</textarea>
                                </div>
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Write the second description of this news.</div>
                                <!--end::Description-->
                                @error('second_description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                    <!--begin::Other Image-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Other Image</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            @if(isset($story->other_image))
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('storage/' . $story->other_image ) }})">
                                @else
                                <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                    @endif                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="other_image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->

                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the news other image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                            <!--end::Description-->
                            @error('other_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!--end::Card body-->

                        <div class="card-body text-center pt-0">
                            <!--begin::Editor-->
                            <div>
                                <textarea name="other_image_description" id="" class="form-control mb-2" placeholder="Other Image Description" style="height: 150px;">{{ old('other_image_description', $story->other_image_description) }}</textarea>
                            </div>
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Write the other image description of this news.</div>
                            <!--end::Description-->
                            @error('other_image_description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Other Image-->

                    <!--begin::Podcasts-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Upload an audio file</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/audio.webp)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="podcast" accept=".mp3, .wav, .ogg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->

                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the news other image. Only *.mp3, *.wav and *.ogg image files are accepted</div>
                            <!--end::Description-->
                            @error('podcasts')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!--end::Card body-->
                        <!--end::Input group-->
                    </div>
                    <!--end::Podcasts-->

                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 g-5 g-xl-9">
                        <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2> Terms and Conditions for Publishing News</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bolder text-gray-600 mb-5"> Accuracy and Reliability:</div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>Users must ensure that all news they publish is accurate, truthful, and based on verifiable facts. Misleading, fabricated, or false information is strictly prohibited.
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>Users must cite credible sources for all claims, data, and statistics included in their news articles.
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>Users are required to fact-check their submissions before publishing.
                                        </div>
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bolder text-gray-600 mb-5"> Accountability:</div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>Users take full responsibility for the content they publish and acknowledge that they may face legal action or penalties for publishing false or defamatory information.
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>The platform reserves the right to suspend or terminate accounts that violate the terms of accuracy or reliability.
                                        </div>
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">

                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bolder text-gray-600 mb-5"> Editorial Oversight:</div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>Submitted news articles may be subject to review by moderators or editors to ensure compliance with platform guidelines.
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>The platform reserves the right to reject, remove, or edit articles that do not meet the publication standards.
                                        </div>
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">

                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bolder text-gray-600 mb-5"> Originality:</div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>All submissions must be original content created by the user. Plagiarized or copyrighted material without proper authorization is not allowed.
                                        </div>

                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bolder text-gray-600 mb-5"> Local Laws:</div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>Users must adhere to local, national, and international laws when publishing news. This includes avoiding hate speech, incitement to violence, and discrimination.
                                        </div>
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Add new card-->
                        <div class="ol-md-4">
                            <!--begin::Card-->
                            <div class="card h-md-100">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Button-->
                                    <div type="button" class="d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                        <!--begin::Illustration-->
                                        <img src="assets/media/logos/logo2.png" alt="" class="mw-100 mh-150px mb-7" />
                                        <!--end::Illustration-->
                                        <!--begin::Label-->
                                        <div class="fw-bolder fs-3 text-danger-600 text-danger">Please do not violate these policies.</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--begin::Button-->
                                </div>
                                <!--begin::Card body-->
                            </div>
                            <!--begin::Card-->
                        </div>
                        <!--begin::Add new card-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Reference Options</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Do you have sources?</label>
                                <!--end::Label-->
                                <select id="sourceSelect" name="have_source" class="form-select form-select-solid" data-control="select2" data-dropdown-css-class="w-200px" data-placeholder="Select an option">
                                    <option></option>
                                    <option value="yes" {{ $story->have_source == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $story->have_source == 'no' ? 'selected' : '' }}>No</option>
                                </select>

                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div id="linksContainer" style="display: none;">
                                <div>
                                    <label class="form-label">Link 1</label>
                                    <input id="link1" name="source_url_one" class="form-control mb-2" value="{{ old('source_url_one', $story->source_url_one) }}" />
                                </div>
                                <div>
                                    <label class="form-label">Link 2</label>
                                    <input id="link2" name="source_url_two" class="form-control mb-2" value="{{ old('source_url_two', $story->source_url_two) }}" />
                                </div>
                                <div>
                                    <label class="form-label">Link 3</label>
                                    <input id="link3" name="source_url_three" class="form-control mb-2" value="{{ old('source_url_three', $story->source_url_three) }}" />
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Meta options-->

                    <!--begin::Automation-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Publishing Policies</h2>
                            </div>

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <p class="text-muted">
                                By publishing content on our platform, you agree to adhere to the following:
                            <ul>
                                <li>All news and information must be accurate, reliable, and free from bias.</li>
                                <li>Do not publish offensive, defamatory, or plagiarized content.</li>
                                <li>Cite and reference sources where applicable, ensuring credibility.</li>
                                <li>You are solely responsible for the content you publish.</li>
                            </ul>
                            <strong class="text-danger">Note:</strong> Violation of these policies may result in content removal or account suspension.
                            </p>
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label mb-5">Do you agree with these policies?</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid" name="policies" id="policies">
                                    <option value="agree" {{ $story->policies == 'agree' ? 'selected' : '' }}>I Agree</option>
                                    <option value="disagree" {{ $story->policies == 'disagree' ? 'selected' : '' }}>I Do Not Agree</option>
                                </select>
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Automation-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="../../demo13/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            Save changes
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

@endsection
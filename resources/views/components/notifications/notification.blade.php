<!--begin::Activities drawer-->
<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
    <div class="card shadow-none rounded-0">
        <!--begin::Header-->
        <div class="card-header" id="kt_activities_header">
            <h3 class="card-title fw-bolder text-dark">Notifications({{ $contactCount ?? '0' }})</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body position-relative" id="kt_activities_body">
            <!--begin::Content-->
            <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
                @foreach($notifications as $notification)
                <!--begin::Timeline items-->
                <div class="timeline">
                    <!--begin::Timeline item-->
                    <div class="timeline-item">
                        <!--begin::Timeline line-->
                        <div class="timeline-line w-40px"></div>
                        <!--end::Timeline line-->
                        <!--begin::Timeline icon-->
                        <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                            <div class="symbol-label bg-light">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
                                        <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->

                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                <div class="fs-5 fw-bold mb-2">{{ $notification->data['category'] }} | {{ Str::limit($notification->data['body'], 250, '...') }}</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">Added at {{ $notification->created_at->diffForHumans() }} by </div>
                                    <!--end::Info-->
                                    <!--begin::User-->
                                    @if($notification->data['user_avatar'])
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{ $notification->data['user_name'] }}">
                                        <img src="{{ asset('storage/' . $notification->data['user_avatar']) }}" alt="img" />
                                    </div>
                                    @else
                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{ $notification->data['user_name'] }}">
                                        <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="img" />
                                    </div>
                                    @endif
                                    @if($notification->data['category'] == 'Advertisements' || $notification->data['category'] == 'Quick News')
                                    <span class="badge badge-light fw-bolder fs-8 px-2 py-1 ms-2" style="color: #DAA520;">Admin</span>
                                    @else
                                    <span class="badge badge-light fw-bolder fs-8 px-2 py-1 ms-2 text-primary">User</span>
                                    @endif
                                    <!--end::User-->
                                </div>
                                <!--end::Description-->

                            </div>

                            <!--end::Timeline heading-->
                            <!--begin::Timeline details-->
                            <div class="overflow-auto pb-5">
                                <!--begin::Record-->
                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                    <!--begin::Title-->
                                    <span class="fs-5 text-dark fw-bold w-375px min-w-200px">{{ Str::limit($notification->data['title'], 50, '...') }}</span>
                                    <!--end::Title-->
                                    <!--begin::Label-->
                                    <div class="min-w-175px pe-2">
                                        <span class="badge badge-light text-muted">{{ $notification->data['user_email'] }}</span>
                                    </div>
                                    <!--end::Label-->

                                    <!--begin::Action-->
                                    <a href="{{ $notification->data['view'] }}?notification_id={{ $notification->id }}" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                    <!--end::Action-->

                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
                                        <!--begin::Action-->
                                        <a href="{{ $notification->data['url'] }}?notification_id={{ $notification->id }}" class="text-active-light-primary fs-8">Mark as read</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Users-->
                                    @if($notification->unread())
                                    <span class="text-danger fs-2">*</span>
                                    @endif
                                </div>
                                <!--end::Record-->
                            </div>
                            <!--end::Timeline details-->
                        </div>
                        <!--end::Timeline content-->
                    </div>
                    <!--end::Timeline item-->
                </div>
                <!--end::Timeline items-->
                @endforeach
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
    </div>
</div>
<!--end::Activities drawer-->
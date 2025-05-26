<!--begin::Activities drawer-->
<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
    <div class="card shadow-none rounded-0">
        <!--begin::Header-->
        <div class="card-header" id="kt_activities_header">
            <h3 class="card-title fw-bolder text-dark">Notifications({{ $notificationsCount ?? '0' }})</h3>
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
                                @if($notification->data['category'] == 'Trusted User')
                                <img src="{{ asset('assets/media/icons/trusted.jpg') }}" alt="Trusted badge" width="60px" height="30px">
                                @elseif($notification->data['category'] == 'Un Trusted User')
                                <img src="{{ asset('assets/media/icons/untrusted.png') }}" alt="Trusted badge" width="40px" height="40px">
                                @else
                                <i class="fas fa-bell"></i>
                                @endif
                            </div>
                        </div>
                        <!--end::Timeline icon-->
                        <!--begin::Timeline content-->

                        <div class="timeline-content mb-10 mt-n1">
                            <!--begin::Timeline heading-->
                            <div class="pe-3 mb-5">
                                <!--begin::Title-->
                                @if($notification->data['category'] == 'News Accepted')
                                <div class="fs-5 fw-bold mb-2"><i class="fas fa-check-circle text-success fs-4" style="padding-right: 5px;"></i>{{ $notification->data['category'] }} | {{ Str::limit($notification->data['body'], 250, '...') }}</div>
                                @elseif($notification->data['category'] == 'News Rejected')
                                <div class="fs-5 fw-bold mb-2"><i class="fas fa-times-circle text-danger fs-4" style="padding-right: 5px;"></i>{{ $notification->data['category'] }} | {{ Str::limit($notification->data['body'], 250, '...') }}</div>
                                @else
                                <div class="fs-5 fw-bold mb-2">{{ $notification->data['category'] }} | {{ Str::limit($notification->data['body'], 250, '...') }}</div>
                                @endif
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <!--begin::Info-->
                                    <div class="text-muted me-2 fs-7">{{ $notification->created_at->diffForHumans() }} To </div>
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
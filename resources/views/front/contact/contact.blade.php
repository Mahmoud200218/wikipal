@extends('layouts.app')
@section('content')
<!--begin::Body-->
<div class="card-body p-lg-17">
    <!--begin::Row-->
    <div class="row mb-3">
        <!--begin::Col-->
        <div class="col-md-6 pe-lg-10">
            <!--begin::Form-->
            <form action="{{ route('contact.store') }}" method="post" class="form mb-15" id="kt_contact_form">
                @csrf
                <h1 class="fw-bolder text-dark mb-9">Send Us Email</h1>
                <!--begin::Input group-->
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2 text-dark required">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control " placeholder="Full Name" name="name" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2 text-dark required">Email</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" class="form-control" placeholder="Email" name="email" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-5 fv-row">
                    <!--begin::Label-->
                    <label class="fs-5 fw-bold mb-2 text-dark required">Subject</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control" placeholder="Subject" name="subject" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-10 fv-row">
                    <label class="fs-6 fw-bold mb-2 text-dark required">Message</label>
                    <textarea class="form-control" rows="6" name="message" placeholder="Message"></textarea>
                </div>
                <!--end::Input group-->
                <!--begin::Submit-->
                <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                    <span class="indicator-label text-white">Send Feedback</span>
                </button>
                <!--end::Submit-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 ps-lg-10">
            <!--begin::Wrapper-->
            <div class="flex-equal d-flex justify-content-center align-items-end ms-5 box">
                <img src="assets/media/logos/logo2.png" class="box-img" alt="">
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 mb-5 mb-lg-15">
        <!--begin::Col-->
        <div class="col-sm-6 pe-lg-10">
            <!--begin::Phone-->
            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
                <!--begin::Icon-->
                <!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
                <!--end::Icon-->
                <!--begin::Subtitle-->
                <h1 class="text-dark fw-bolder my-5">Let’s Speak</h1>
                <!--end::Subtitle-->
                <!--begin::Number-->
                <div class="text-gray-700 fw-bold fs-2">+970 (59) 593-6325</div>
                <!--end::Number-->
            </div>
            <!--end::Phone-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-sm-6 ps-lg-10">
            <!--begin::Address-->
            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                <span class="svg-icon svg-icon-3tx svg-icon-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Subtitle-->
                <h1 class="text-dark fw-bolder my-5">Our Head Office</h1>
                <!--end::Subtitle-->
                <!--begin::Description-->
                <div class="text-gray-700 fs-3 fw-bold">Middle East, Palestine, Gaza</div>
                <!--end::Description-->
            </div>
            <!--end::Address-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<!--end::Body-->
@endsection
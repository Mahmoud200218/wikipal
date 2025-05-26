@extends('layouts.app')
@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row gy-0 gx-10">
            <div class="col-xl-12">
                <div class="mb-10">
                    <x-dashboard.payment-methods-form :methods="$methods" />
                </div>
            </div>
            <div class="col-xl-4">
            </div>
        </div>
    </div>
</div>
@endsection
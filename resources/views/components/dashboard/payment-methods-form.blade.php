<div class="tab-content">
    <div class="tab-pane fade show active" id="kt_general_widget_1_3">
        <button><a href="{{ route('admin.dashboard') }}" class="fs-5">Dashboard</a></button>
        <!--begin::Tables Widget 5-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Payment Name</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($methods as $method)
                                    <tr>
                                        <td class="text-muted fw-bold">{{ $method->name }}</td>
                                        @if($method->status == 'active')
                                        <td class="text-muted fw-bold"><strong class="badge badge-success fs-7">Active</strong></td>
                                        @else
                                        <td class="text-muted fw-bold"><strong class="badge badge-danger fs-7">Not Active</strong></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.payments.edit', $method->id) }}" class="btn btn-sm btn-primary">Edit Payment</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 5-->
    </div>
</div>
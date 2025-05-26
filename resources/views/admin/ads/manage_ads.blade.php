@extends('layouts.app')
@section('content')
<!--begin::Col-->
<div class="col-xl-12" style="margin-top: 30px;">
    <!--begin::Chart widget 17-->
    <div class="card card-flush h-xl-100">
        <!--begin::Header-->
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Manage Advertisements ({{ App\Models\Ads::count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all advertisements on the platform</span>
            </h3>
            <a href="{{ route('admin.dashboard') }}">
                <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm rounded-pill" style="height: 36px; width:160px">
                    <i class="fas fa-cogs me-2"></i> Dashboard
                </button>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            <table class="table table-striped gy-7 gs-7">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>Logo</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Change Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allAds as $ads)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $ads->logo) }}" class="me-4 w-35px" style="border-radius: 4px" alt="" />
                        </td>
                        <td>{{ $ads->link }}</td>
                        <td>
                            @if ($ads->status === 'active')
                            <span class="badge bg-success text-uppercase fw-bold">Active</span>
                            @elseif ($ads->status === 'inactive')
                            <span class="badge bg-danger text-uppercase fw-bold">Disabled</span>
                            @else
                            <span class="badge bg-secondary text-uppercase fw-bold">{{ ucfirst($ads->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $ads->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.ads.change.status', $ads->id) }}" method="POST">
                                @csrf
                                @method('put')
                                @if($ads->status == 'active')
                                <button class="text-gray-800 fw-bolder fs-6 me-3" name="status" value="inactive" type="submit"><i class="fas fa-times-circle text-danger"></i>|Deactivate</button>
                                @else
                                <button class="text-gray-800 fw-bolder fs-6 me-3" name="status" value="active" type="submit"><i class="fas fa-check-circle text-success"></i>|Activate</button>
                                @endif
                                <button></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.delete.ads', $ads->id) }}" method="POST" id="deleteForm-{{ $ads->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete({{ $ads->id }})">Delete</button>
                            </form>
                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Do you want to delete this advertisement?, this action cannot be undone!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#6c757d',
                                        confirmButtonText: 'Yes, Delete advertisement!',
                                        cancelButtonText: 'No, cancel!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('deleteForm-' + id).submit();
                                        }
                                    })
                                }
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allAds->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
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
                <span class="card-label fw-bolder text-dark">Manage Admins ({{ App\Models\Admin::where('super_admin', '0')->count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all users on the platform</span>
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
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Super Admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $admin->avatar) }}" class="me-4 w-25px" style="border-radius: 4px" alt="" />
                        </td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.add.super.admin', $admin->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" name="super_admin" value="1" class="text-primary fs-7">Promote To Super Admin</button>
                            </form>
                        </td>
                        <td>
                            @if($admin->suspended == 'no')
                            <form action="{{ route('admin.suspend.admin', $admin->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button name="suspended" value="yes" type="submit" class="fs-7 btn btn-danger">Suspend</button>
                            </form>
                            @else
                            <form action="{{ route('admin.suspend.admin', $admin->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button name="suspended" value="no" type="submit" class="fs-7 btn btn-success">Activate</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.delete.admin', $admin->id) }}" method="POST" id="deleteForm-{{ $admin->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete({{ $admin->id }})" class="fs-7">Delete</button>
                            </form>
                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Do you want to delete this Admin?, this action cannot be undone!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#6c757d',
                                        confirmButtonText: 'Yes, Delete Admin!',
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
            {{ $admins->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
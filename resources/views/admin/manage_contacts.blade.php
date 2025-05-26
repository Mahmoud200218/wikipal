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
                <span class="card-label fw-bolder text-dark">Manage Contacts ({{ App\Models\Front\Contact::count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all contacts on the platform</span>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <form action="{{ route('admin.delete.contact', $contact->id) }}" method="POST" id="deleteForm-{{ $contact->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete({{ $contact->id }})">Delete</button>
                            </form>

                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Do you want to delete this contact?, this action cannot be undone!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#6c757d',
                                        confirmButtonText: 'Yes, Delete user!',
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
            {{ $contacts->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
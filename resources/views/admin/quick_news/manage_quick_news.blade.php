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
                <span class="card-label fw-bolder text-dark">Manage Quick News Requests ({{ App\Models\Admin\QuickNews::count() }})</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6">Manage all Quick News on the platform</span>
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
                        <th>Title</th>
                        <th>Short Tit</th>
                        <th>First-Desc</th>
                        <th>Second-Desc</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quickNewsRequests as $request)
                    <tr>
                        <td>
                            <div class="symbol symbol-50px me-5">
                                @if($request->cover_image)
                                <img src="{{ asset('storage/' . $request->cover_image) }}" alt="Cover image" />
                                @else
                                <img src="{{ asset('assets/media/default.png') }}" alt="Cover image" />
                                @endif
                            </div>
                        </td>
                        <td>{{ $request->title }}</td>
                        <td>{{ $request->short_title }}</td>
                        <td>{{ Str::limit($request->first_description, 250, '...') }}</td>
                        <td>{{ Str::limit($request->second_description, 250, '...') }}</td>
                        <td>{{ \Carbon\Carbon::parse($request->created_at)->format('d-m-y') }}</td>
                        <td><a href="{{ route('admin.quick.news.edit', $request->id) }}"><button><i class="fas fa-edit text-primary"></i></button></td></a>
                        <td>
                            <form action="{{ route('admin.delete.quick_news', $request->id) }}" method="POST" id="deleteForm-{{ $request->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete({{ $request->id }})">Delete</button>
                            </form>

                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Do you want to delete this Quick news?, this action cannot be undone!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#6c757d',
                                        confirmButtonText: 'Yes, Delete!',
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
            {{ $quickNewsRequests->withQueryString()->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 17-->
</div>
<!--end::Col-->
@endsection
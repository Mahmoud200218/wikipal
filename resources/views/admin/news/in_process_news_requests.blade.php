@extends('layouts.app')
@section('content')
<!--begin::Tables Widget 10-->
<div class="card mb-5 mb-xl-8 mt-6">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">In Process News Requests</span>
            <span class="text-muted mt-1 fw-bold fs-7">You can view news requests and <strong class="text-success">Accept</strong> or <strong class="text-danger">Reject</strong> them from here.</span>
        </h3>
        <a href="{{ route('admin.dashboard') }}">
            <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm rounded-pill" style="height: 36px; width:160px">
                <i class="fas fa-cogs me-2"></i> Dashboard
            </button>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="border-0">
                        <th class="p-0"></th>
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-200px"></th>
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-100px text-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach($newsRequests as $request)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-60px me-5">
                                    @if($request->cover_image)
                                    <img src="{{ asset('storage/' . $request->cover_image) }}" alt="Cover image" />
                                    @else
                                    <img src="{{ asset('assets/media/default.png') }}" alt="Cover image" />
                                    @endif
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="{{ route('user.overview', $request->user->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $request->user->name ?? 'User not found' }}</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">
                                        <span class="text-dark"></span>{{ $request->user->email ?? 'User not found' }}</span>
                                </div>
                                <!--end::Name-->
                            </div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.news.request.details', ['id' => $request->id, 'category' => $request->category]) }}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $request->short_title }}</a>
                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ $request->title }}</span>
                        </td>
                        <td class="text-end">
                            <span class="badge badge-light-primary">{{ $request->status }}</span>
                        </td>
                        @if($request->status == 'in_process')
                        <td class="text-end">
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <form action="{{ route('admin.news.status.update', $request->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="category" value="{{ $request->category }}">
                                    <input type="hidden" name="user_id" value="{{ $request->user_id }}">

                                    <button name="status" type="submit" value="accepted" class="fs-6"><i class="fas fa-check-circle text-success" style="margin-right: 4px;"></i></button>
                                </form>
                                <!--end::Svg Icon-->
                            </a>
                        </td>
                        <td class="text-end">
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <form action="{{ route('admin.news.status.update', $request->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="category" value="{{ $request->category }}">
                                    <input type="hidden" name="user_id" value="{{ $request->user_id }}">

                                    <button name="status" type="submit" value="accepted" class="fs-6"><i class="fas fa-times-circle text-danger" style="margin-right: 4px;"></i></button>
                                </form>
                                <!--end::Svg Icon-->
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
        {{ $newsRequests->withQueryString()->links() }}
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 10-->
@endsection
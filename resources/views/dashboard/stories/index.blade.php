@extends('layouts.app')
@section('content')
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Post-->
				<div class="post d-flex flex-column-fluid" id="kt_post">
					<!--begin::Container-->
					<div id="kt_content_container" class="container-xxl">
						<!--begin::Navbar-->
						<div class="card mb-8">
							<div class="card-body pt-9 pb-0">
								<!--begin::Details-->
								<div class="d-flex flex-wrap flex-sm-nowrap mb-6">
									<!--begin::Image-->
									<div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
										<img class="mw-50px mw-lg-75px" src="assets/media/logos/stories.png" alt="image" />
									</div>
									<!--end::Image-->
									<!--begin::Wrapper-->
									<div class="flex-grow-1">
										<!--begin::Head-->
										<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
											<!--begin::Details-->
											<div class="d-flex flex-column">
												<!--begin::Status-->
												<div class="d-flex align-items-center mb-1">
													<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">Stories</a>
													<span class="badge badge-light-danger me-auto">Verify authenticity</span>
												</div>
												<!--end::Status-->
												<!--begin::Description-->
												<div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">#Publish the most important and prominent in stories</div>
												<!--end::Description-->
											</div>
											<!--end::Details-->
											<!--begin::Actions-->
											<div class="d-flex mb-4">
												<a href="{{ route('dashboard.stories.create') }}" class="btn btn-sm btn-primary me-3">Publish Stories</a>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Head-->
										<!--begin::Info-->
										<div class="d-flex flex-wrap justify-content-start">
											<!--begin::Stats-->
											<div class="d-flex flex-wrap">
												<!--begin::Stat-->
												<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
													<!--begin::Number-->
													<div class="d-flex align-items-center">
														<div class="fs-4 fw-bolder">{{ \Carbon\Carbon::parse($LastStory->created_at ?? '')->format('d-m-Y') }}</div>
													</div>
													<!--end::Number-->
													<!--begin::Label-->
													<div class="fw-bold fs-6 text-gray-400">Latest news published</div>
													<!--end::Label-->
												</div>
												<!--end::Stat-->
												<!--begin::Stat-->
												<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
													<!--begin::Number-->
													<div class="d-flex align-items-center">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
														<span class="svg-icon svg-icon-3 svg-icon-success me-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
																<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ $storiesCount }}" data-kt-countup-prefix="">{{ $storiesCount }}</div>
													</div>
													<!--end::Number-->
													<!--begin::Label-->
													<div class="fw-bold fs-6 text-gray-400">Total News</div>
													<!--end::Label-->
												</div>
												<!--end::Stat-->
											</div>
											<!--end::Stats-->
											<!--begin::Users-->
											<div class="symbol-group symbol-hover mb-3">

												<!--begin::User-->
												@foreach($stories as $story)
												<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $story->title }}">
													@if($story->cover_image)
													<img alt="Pic" src="{{ asset('storage/' . $story->cover_image) }}" />
													@endif
												</div>
												@endforeach
												<!--end::User-->
												<!--begin::All users-->
												<div class="symbol symbol-35px symbol-circle">
													<span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder" title="View more Stories">+{{ $storiesCount }}</span>
												</div>
												<!--end::All users-->
											</div>
											<!--end::Users-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Details-->
								<div class="separator"></div>
							</div>
						</div>
						<!--end::Navbar-->
						<!--begin::Toolbar-->
						<div class="d-flex flex-wrap flex-stack pb-7">
							<!--begin::Title-->
							<div class="d-flex flex-wrap align-items-center my-1">
								<h3 class="fw-bolder me-5 my-1">Stories ({{ $storiesCount }})</h3>
							</div>
							<!--end::Title-->
							<!--begin::Controls-->
							<div class="d-flex flex-wrap my-1">
								<!--begin::Tab nav-->
								<ul class="nav nav-pills me-6 mb-2 mb-sm-0">
									<li class="nav-item m-0">
										<a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3 active" data-bs-toggle="tab" href="#kt_project_users_card_pane">
											<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
														<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</a>
									</li>
									<li class="nav-item m-0">
										<a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary" data-bs-toggle="tab" href="#kt_project_users_table_pane">
											<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
													<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</a>
									</li>
								</ul>
								<!--end::Tab nav-->
							</div>
							<!--end::Controls-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Tab Content-->
						<div class="tab-content">
							<!--begin::Tab pane-->
							<div id="kt_project_users_card_pane" class="tab-pane fade show active">
								<!--begin::Row-->
								<div class="row g-6 g-xl-9" style="margin-bottom: 25px;">
									@foreach($stories as $story)
									<!--begin::Col-->
									<div class="col-md-6 col-xxl-4">
										<!--begin::Card-->
										<div class="card">
											<!--begin::Card body-->
											<div class="card-body d-flex flex-center flex-column pt-12 p-9">
												<!--begin::Avatar-->
												@if($story->cover_image)
												<div class="symbol symbol-65px symbol-circle mb-5">
													<img src="{{ asset('storage/' . $story->cover_image) }}" alt="image" />
												</div>
												@endif
												<!--end::Avatar-->
												<!--begin::Name-->
												<a href="{{ route('dashboard.stories.show', $story->id) }}" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{ Str::limit($story->title, 60, '') }}</a>
												<!--end::Name-->
												<!--begin::Position-->
												<div class="fw-bold text-gray-400 mb-6">{{ Str::limit($story->short_title, 120, '...') }}</div>
												<!--end::Position-->
												<!--begin::Info-->
												<div class="d-flex flex-center flex-wrap">
													<!--begin::Stats-->
													<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
														<div class="fs-6 fw-bolder text-gray-700">Created:</div>
														<div class="fw-bold text-gray-400">{{ $story->created_at }}</div>
													</div>
													<!--end::Stats-->
													<!--begin::Stats-->
													<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
														<div class="fs-6 fw-bolder text-gray-700">
															<x-front.share-news />
														</div>
													</div>
													<!--end::Stats-->
													<!--begin::Stats-->
													<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
														@if($story->status == 'accepted')
														<div class="badge badge-light-success fw-bolder px-4 py-3 fs-7">Accepted</div>
														@elseif($story->status == 'in_process')
														<div class="badge badge-light-info fw-bolder px-4 py-3 fs-7">Process</div>
														@else
														<div class="badge badge-light-danger fw-bolder px-4 py-3 fs-7">Rejected</div>
														@endif
													</div>
													<!--end::Stats-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									@endforeach
								</div>
								{{ $stories->withQueryString()->links() }}
								<!--end::Row-->
							</div>
							<!--end::Tab pane-->
							<!--begin::Tab pane-->
							<div id="kt_project_users_table_pane" class="tab-pane fade">
								<!--begin::Card-->
								<div class="card card-flush">
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table id="kt_project_users_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
												<!--begin::Head-->
												<thead class="fs-7 text-gray-400 text-uppercase">
													<tr>
														<th class="min-w-250px"></th>
														<th class="min-w-150px"></th>
														<th class="min-w-90px"></th>
														<th class="min-w-90px"></th>
														<th class="min-w-50px text-end"></th>
													</tr>
												</thead>
												<!--end::Head-->
												<!--begin::Body-->
												<tbody class="fs-6">
													@foreach($storiesList as $story)
													<tr>
														<td>
															<!--begin::User-->
															<div class="d-flex align-items-center">
																<!--begin::Wrapper-->
																<div class="me-5 position-relative">
																	<!--begin::Avatar-->
																	@if($story->cover_image)
																	<div class="symbol symbol-35px symbol-circle">
																		<img alt="Pic" src="{{ asset('storage/' . $story->cover_image) }}" />
																	</div>
																	@endif
																	<!--end::Avatar-->
																</div>
																<!--end::Wrapper-->
																<!--begin::Info-->
																<div class="d-flex flex-column justify-content-center">
																	<div class="mb-1 text-gray-800">{{ Str::limit($story->title, 60, ) }}</div>
																	<div class="fw-bold fs-6 text-gray-400">{{ Str::limit($story->short_title, 120, '...') }}</div>
																</div>
																<!--end::Info-->
															</div>
															<!--end::User-->
														</td>
														<td>{{ $story->created_at }}</td>
														<td>
															<div class="fs-6 fw-bolder text-gray-700">
																<x-front.share-news />
															</div>
														</td>
														<td>
															@if($story->status == 'accepted')
															<span class="badge badge-light-success fw-bolder px-4 py-3">Accepted</span>
															@elseif($story->status == 'in_process')
															<span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
															@elseif($story->status == 'rejected')
															<span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
															@endif
														</td>
														<td class="text-end">
															<a href="{{ route('dashboard.stories.show', $story->id) }}" class="btn btn-light btn-sm">View</a>
														</td>
													</tr>
													@endforeach
												</tbody>
												<!--end::Body-->
											</table>
											{{ $storiesList->withQueryString()->links() }}
											<!--end::Table-->
										</div>
										<!--end::Table container-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Tab pane-->
						</div>
						<!--end::Tab Content-->
						<!--begin::Modals-->
						<!--end::Modals-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Post-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
<!--end::Root-->
@endsection
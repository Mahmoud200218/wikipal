@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Search Results ({{$count}})</h3>
    @forelse($result as $value)
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between">
            <!-- Article Info -->
            <div class="mb-3 mb-md-0">
                <h5 class="fw-bold text-dark">{{ $value->title }}</h5>
                <p class="text-muted mb-1">
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ $value->created_at->format('F j, Y') }}
                </p>
                <p class="" style="max-width: 800px;">{{ Str::limit($value->short_title, 200) }}</p>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-warning">No articles found matching your search.</div>
    @endforelse
</div>
@endsection
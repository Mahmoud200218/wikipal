@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg p-4 border-0" style="width: 100%; max-width: 500px;">
        
        <!-- Logo & Branding -->
        <div class="text-center mb-4">
            <h3 class="mt-2 fw-bold text-primary fs-1"><strong>WikiPal</strong></h3>
            <p class="text-muted small">Secure Verification Required</p>
        </div>

        <!-- Intro Text -->
        <div class="mb-3 text-center">
            <h4 class="fw-semibold text-dark">Confirm Your Password</h4>
            <p class="text-muted small">
                For your security, please confirm your password before continuing.
            </p>
        </div>

        <!-- Error Handling -->
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm border-1">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li class="small">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('password.confirm') }}" class="mt-3">
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold text-dark">🔒 Enter Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    placeholder="••••••••"
                    required
                    autofocus
                    autocomplete="current-password"
                >
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">
                    Confirm Password
                </button>
            </div>
        </form>

        <!-- Go Back -->
        <div class="mt-4 text-center">
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-muted small">
                ← Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection

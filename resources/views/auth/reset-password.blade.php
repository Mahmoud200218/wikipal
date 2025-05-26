@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg border-0 p-4" style="width: 100%; max-width: 500px;">

        <!-- Logo & Branding -->
        <div class="text-center mb-4">
            <h3 class="mt-2 fw-bold text-primary fs-1"><Strong>WikiPal</Strong></h3>
            <p class="text-muted small">Reset Your Password</p>
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
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                >
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold text-dark">New Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                >
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold text-dark">Confirm New Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                >
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">
                    Reset Password
                </button>
            </div>
        </form>

        <!-- Back to login -->
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-decoration-none text-muted small">
                ← Back to Login
            </a>
        </div>
    </div>
</div>
@endsection

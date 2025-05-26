@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg border-0 p-4" style="width: 100%; max-width: 500px;">

        <!-- Logo & Branding -->
        <div class="text-center mb-4">
            <h3 class="mt-2 fw-bold text-primary fs-1"><Strong>WikiPal</Strong></h3>
            <p class="text-muted small">Forgot Your Password?</p>
        </div>

        <!-- Intro -->
        <div class="mb-3 text-center">
            <p class="text-muted">
                No problem. Just enter your email and we'll send you a link to reset your password.
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

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
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="form-control form-control-lg @error('email') is-invalid @enderror">
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">
                    Email Password Reset Link
                </button>
            </div>
        </form>

        <!-- Back Link -->
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-decoration-none text-muted small">
                ← Back to Login
            </a>
        </div>
    </div>
</div>
@endsection
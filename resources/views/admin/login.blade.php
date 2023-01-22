@extends('admin.template-forms')

@section('title', 'Login')

@section('content')

<div class="card-body px-5 py-5">
    <h3 class="card-title text-center mb-3">Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf

            <div class="form-group mb-3">
                <label class="floating-label" for="Email">Email</label>
                <input name="email" type="text" class="form-control @error('name') is-invalid @enderror text-white" id="Email" value="{{ old('email') }}" placeholder="Email" required>
                @error('email')
                    <span class="text-danger sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label class="floating-label" for="Password">Password</label>
                <input name="password" type="password" class="form-control @error('name') is-invalid @enderror text-white" id="Password" placeholder="Password" required>
                @error('password')
                    <span class="text-danger sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group d-flex align-items-center justify-content-between">
                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password</a>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
            </div>
            <div class="d-flex">
                <button class="btn btn-facebook mr-2 col">
                <i class="mdi mdi-facebook"></i> Facebook </button>
                <button class="btn btn-google col">
                <i class="mdi mdi-instagram"></i> Instagram </button>
            </div>
            <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
    </form>
</div>

@endsection

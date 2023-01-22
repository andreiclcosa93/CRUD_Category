@extends('admin.template-forms')

@section('title', 'Register')

@section('content')

<div class="card-body px-5 py-5">
    <h3 class="card-title text-center mb-3">Register</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf

            <div class="form-group mb-3">
                <label class="floating-label" for="username">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror text-white" id="username" placeholder="Name" value="{{ old('name') }}" required>
            @error('name')
            <span class="text-danger sm">
                {{ $message }}
            </span>
            @enderror
            </div>


            <div class="form-group mb-3">
                <label class="floating-label" for="email">Email</label>
                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror text-white" id="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
            <span class="text-danger sm">
                    {{ $message }}
                </span>
            @enderror
            </div>

            <div class="form-group mb-4">
                <label class="floating-label" for="password">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror text-white" id="password" value="{{ old('password') }}" placeholder="Password" required>
            @error('password')
                <span class="text-danger sm">
                    {{ $message }}
                </span>
            @enderror
            </div>

            <div class="form-group mb-4">
                <label class="floating-label" for="password_confirmation">Password Confirmation</label>
                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror text-white" id="password_confirmation" placeholder="Password Confirmation" value="{{ old('password_confirmation') }}" required>
            @error('password_confirmation')
                <span class="text-danger sm">
                    {{ $message }}
                </span>
            @enderror
            </div>
    <div class="form-group d-flex align-items-center justify-content-between">
        <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input"> Remember me </label>
        </div>

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
    <p class="sign-up">Don't have an Account?<a href="{{ route('login') }}"> Sign Up</a></p>
    </form>
</div>

@endsection

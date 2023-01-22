{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('admin.template-forms')

@section('title', 'Forgot Password')

@section('content')



    <div class="card-body px-5 py-5">
        <h3 class="card-title text-center mb-3" style="color: #b71661;">Forgor Password</h3>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="text-info">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

                <div class="form-group mb-3">
                    <label class="floating-label" for="email">Email</label>
                    <input name="email" type="text" class="form-control @error('name') is-invalid @enderror text-white" id="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                    @error('email')
                        <span class="text-danger sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center d-flex justify-content-center mt-4 " style="color: #000;">
                    {{-- <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button> --}}
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Email Password Reset Link</button>
            </div>
            <div class="d-flex">
                <button class="btn btn-facebook mr-2 col">
                <i class="mdi mdi-facebook"></i> Facebook </button>
                <button class="btn btn-google col">
                <i class="mdi mdi-instagram"></i> Instagram </button>
            </div>
            <p class="sign-up">Back to Sign Up<a href="{{ route('login') }}"> Sign Up</a></p>


        </form>
    </div>



@endsection

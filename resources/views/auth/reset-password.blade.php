{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



@extends('admin.template-forms')

@section('title', 'Forgot Password')

@section('content')



    <div class="card-body px-5 py-5">

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="email">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="text" class="form-control @error('name') is-invalid @enderror text-white" id="email" value="{{ old('email', $request->email) }}" placeholder="Email" required autofocus>
                            @error('email')
                                <span class="text-danger sm">{{ $message }}</span>
                            @enderror
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="password">Password</label>
                    <div class="col-sm-9">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror mb-3 text-white" id="password" placeholder="Password" value="{{ old('password') }}" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="password_confirmation">Password Confirmation</label>
                    <div class="col-sm-9">
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror mb-3 text-white" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Password Confirmation" required>
                        @error('Password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center d-flex justify-content-end mt-4 " style="color: #000;">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Reset Password</button>
                    </div>
                </div>

        </form>
    </div>



@endsection

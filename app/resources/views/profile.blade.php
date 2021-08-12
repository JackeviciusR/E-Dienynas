@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You in your profile!') }}

                        @if ($errors->any())
                            <div class="alert alert-danger grid grid-cols-2" role="alert">
                                <i class="bi bi-check-lg"></i>

{{--                                <div class="alert alert-danger col-md-2 grid grid-rows">--}}
{{--                                    <a class="d-flex align-items-center text-muted" href="#">--}}
{{--                                        <span data-feather="plus-circle"></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="alert alert-danger col-md-6 grid grid-rows">--}}
                                    <h4 class="alert-heading">Error!</h4>
                                    <hr>
                                    {{--                                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>--}}
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
{{--                                </div>--}}

                            </div>
                        @endif

                        @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading"> {{ session('message') }} </h4>
                                </div>
{{--                            <div class="alert-content ml-4">--}}
{{--                                <div class="alert-title font-semibold text-lg text-green-800">--}}
{{--                                    {{ __('Success') }}--}}
{{--                                </div>--}}
{{--                                <div class="alert-description text-sm text-green-600">--}}
{{--                                    {{ session('message') }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}">
                            @method('PUT')
                            @csrf

                            <div class="container">
                                <div class="row mb-3">

                                    <!-- Name -->
                                    <label for="username" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>

        {{--                                        <div class="col-md-6">--}}
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ auth()->user()->username }}" required autocomplete="username" autofocus>
                                    <small class="form-text text-muted">Username</small>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
    {{--                                        </div>--}}
    {{--                                            <x-label for="name" :value="__('Name')" />--}}
    {{--                                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->users()->name }}" autofocus />--}}
                                </div>

                                    <!-- Email Address -->
                                <div class="row mb-3">
                                    <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

{{--                                        <div class="col-md-6">--}}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email">
                                    <small class="form-text text-muted">e-mail</small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    {{--                                            <x-label for="email" :value="__('Email')" />--}}
                                    {{--                                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->users()->email  }}" autofocus />--}}
{{--                                        </div>--}}
                                </div>

{{--                                </div>--}}

{{--                                <div class="row">--}}
                                    <!-- Password -->
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

{{--                                        <div class="col-md-6">--}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <small class="form-text text-muted">Please enter new password</small>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror

                                    {{--                                            <x-label for="new_password" :value="__('New password')" />--}}
                                    {{--                                            <x-input id="new_password" class="block mt-1 w-full"--}}
                                    {{--                                                     type="password"--}}
                                    {{--                                                     name="password"--}}
                                    {{--                                                     autocomplete="new-password" />--}}
{{--                                        </div>--}}
                                </div >

                                <!-- Confirm Password -->
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

{{--                                        <div class="col-md-6">--}}
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="confirm-password">
                                    <small class="form-text text-muted">Please repeat new password</small>


                                    {{--                                        </div>--}}
                                {{--                                            <x-label for="confirm_password" :value="__('Confirm Password')" />--}}
                                {{--                                            <x-input id="confirm_password" class="block mt-1 w-full"--}}
                                {{--                                                     type="password"--}}
                                {{--                                                     name="password_confirmation" required--}}
                                {{--                                                     autocomplete="confirm-password" />--}}
                                </div>

                            </div>

                            <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
{{--                                    <x-button class="ml-3">--}}
{{--                                        {{ __('Update') }}--}}
{{--                                    </x-button>--}}
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', __('Login | World-Newspapers.com'))
@section('heading', __('Login as administrator'))
@section('description', null)
@section('keywords', null)

@section('content')
    @include('success_message')
    <div class="bg-white px-3 py-4">
        <form class="row gap-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-12 d-flex flex-md-row flex-column">
                <label for="email" class="form-label col-sm-2 text-muted">
                    {{ __('Email') }}
                </label>
                <div class="d-flex flex-column col-md-10 col-12">
                    <input id="email" type="email"
                        class="form-control bg-white rounded-0 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 d-flex flex-md-row flex-column">
                <label for="subject" class="form-label col-sm-2 text-muted">
                    {{ __('Subject') }}
                </label>
                <div class="d-flex flex-column col-md-10 col-12">
                    <input id="password" type="password"
                        class="form-control bg-white rounded-0 @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 d-flex mt-1">
                <div class="col-sm-2"></div>
                <button type="submit" class="btn send-button text-white">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>

    <style>
        .send-button {
            background-color: #438496;

            &:hover,
            &:focus {
                background-color: #336674;
            }
        }
    </style>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

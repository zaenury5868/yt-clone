@extends('layouts.app')
@section('title', isset($title) ? $title : 'Login - Youtube Cloning')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2" x-show="sidebar" x-trap="sidebar" x-transition>
            @include('includes.sidebar')
        </div>
        <div class="col-md-10" id="content">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 600px">
                <span class="material-icons" style="font-size: 100px">subscriptions</span>
                <h2 class="fw-semibold text-center mt-4">Jangan lewatkan video baru</h2>
                <p>Login untuk melihat update dari channel YouTube favorit Anda</p>
                <a href="auth/google/redirect" class="text-decoration-none d-flex align-items-center text-black-50 gap-2 fw-semibold" style="background-color: #f1f1f1; padding: .5rem 1rem .5rem 1rem; border-radius: 1rem;">
                    <span class="material-icons">account_circle</span>
                    {{ __('Login') }}
                </a>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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
                                @if (Route::has('register'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('register') }}">{{ __('Daftar Akun') }}</a>
                                    @endif
                                    <a class="btn btn-link text-decoration-none" href="/auth/github/redirect">github</a>
                                    <a class="btn btn-link text-decoration-none" href="/auth/google/redirect">google</a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
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

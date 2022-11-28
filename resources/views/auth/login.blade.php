@extends('layouts.auth')

@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center d-none d-lg-block">
    <div class="d-flex col flex-column justify-content-center align-items-center">
        <img src="/assets/svg/notebook.svg" alt="notebook" class="img-fluid" width="500" height="500">
    </div>
    <div class="col d-flex flex-row justify-content-center mt-3">
        <div class="row ms-6 mt-5 text-center pe-2" style="border-right: 1px solid rgb(216, 216, 216);">
            <div class="col d-flex flex-column align-items-center" style="">
                <p class="display-3 m-0">Write</p>
                <p class="display-3 m-0">Notes</p>
            </div>
        </div>
        <div class="row ms-1 mt-5 ps-3 d-flex align-items-center">
            <div class="col">
                <p class="lead m-0">Write</p>
                <p class="lead m-0">keep</p>
                <p class="lead m-0">Remember</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center shadow-lg min-vh-100 pb-5" style="padding-top: 5rem;">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="position: relative">
        <div class="col-md-1 shadow-lg overlay-element d-flex justify-content-center align-items-center" style="background-color: rgb(108, 99, 255); width: 5rem; height: 5rem; border-radius: 100%;">
            <img src="/assets/img/logo.png" class="img-fluid" alt="logo" width="50" height="50">
        </div>
    </div>
    <div class="container d-md-flex flex-column justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(245, 245, 245);">
                <p class="card-title text-center pt-5" style="font-size: 2em">Signin</p>
                <p class="text-center m-0 p-0" style="color: #6c757d;">Welcome to Write Notes!</p>
                <hr class="mx-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="container d-flex flex-column">
                        <label for="email" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Email Address') }}</label>
                        <div class="col mx-5">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="email" class="col mx-5 col-form-label text-lg-start mt-4">{{ __('Password') }}</label>
                        <div class="col mx-5">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col d-sm-flex flex-row justify-content-between align-items-center mt-3 mx-5">
                            <div class="form-check d-flex flex-row justify-content-center">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="ms-2 form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="col-sm-5 text-center">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 0.8rem">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center mt-5">
                            <button type="submit" class="btn btn-outline-primary welcome-button" style="width: 20em">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <a class="btn btn-link mt-2 mb-4" href="{{ url('/register') }}" style="font-size: 0.8rem">
                            {{ __('Don\'t have anccount?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

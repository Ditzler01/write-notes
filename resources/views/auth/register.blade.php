@extends('layouts.auth')

@section('content')

<div class="container d-flex flex-column align-items-center justify-content-center shadow-lg min-vh-100 pb-5" style="padding-top: 5rem;">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="position: relative">
        <div class="col-md-1 shadow-lg overlay-element d-flex justify-content-center align-items-center" style="background-color: rgb(108, 99, 255); width: 5rem; height: 5rem; border-radius: 100%;">
            <img src="/assets/img/logo.png" class="img-fluid" alt="logo" width="50" height="50">
        </div>
    </div>
    <div class="container d-md-flex flex-column justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(245, 245, 245);">
                <p class="card-title text-center pt-5" style="font-size: 2em">Signup</p>
                <p class="text-center m-0 p-0" style="color: #6c757d;">Create an account to proceed</p>
                <hr class="mx-3">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="container d-flex flex-column p-0">
                        <label for="first_name" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('First Name') }}</label>
                    </div>
                    <div class="col mx-5">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container d-flex flex-column p-0">
                        <label for="last_name" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Last Name') }}</label>
                    </div>
                    <div class="col mx-5">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="first_name">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container d-flex flex-column p-0">
                        <label for="email" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Email') }}</label>
                    </div>
                    <div class="col mx-5">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container d-flex flex-column p-0">
                        <label for="email" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Password') }}</label>
                    </div>
                    <div class="col mx-5">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container d-flex flex-column p-0">
                        <label for="password-confirm" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Confirm Password') }}</label>
                    </div>
                    <div class="col mx-5">
                        <input id="password-confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col mx-5 d-flex justify-content-center mt-5" >
                        <button type="submit" class="btn btn-outline-primary welcome-button" style="width: 20em">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="col mx-5 d-flex justify-content-center" >
                        <a class="btn btn-link mt-2 mb-4" href="{{ url('/login') }}" style="font-size: 0.8rem">
                            {{ __('Already have an anccount?') }}
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container d-flex flex-column justify-content-center align-items-center d-none d-lg-block" style="position: relative">
    <div class="col d-flex flex-row justify-content-center mb-5" style="position: relative">
        <img src="/assets/svg/welcome.svg" alt="notebook" class="img-fluid" width="500" height="500">
    </div>
    <div class="d-flex col flex-column justify-content-center align-items-center mt-5" style="position: relative">
        <img src="/assets/svg/appreciation.svg" alt="notebook" class="img-fluid" width="300" height="300">
    </div>
</div>
@endsection

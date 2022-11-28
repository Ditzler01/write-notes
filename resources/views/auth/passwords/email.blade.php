@extends('layouts.auth')

@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center d-none d-lg-block" style="position: relative">
    <div class="col d-flex flex-row justify-content-center mb-5" style="position: relative">
        <img src="/assets/svg/forgot_password.svg" alt="notebook" class="img-fluid" width="500" height="500">
    </div>
</div>

<div class="container d-flex flex-column align-items-center justify-content-center shadow-lg min-vh-100 pb-5" style="padding-top: 5rem;">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="position: relative">
        <div class="col-md-1 shadow-lg overlay-element d-flex justify-content-center align-items-center" style="background-color: rgb(108, 99, 255); width: 5rem; height: 5rem; border-radius: 100%;">
            <img src="/assets/img/logo.png" class="img-fluid" alt="logo" width="50" height="50">
        </div>
    </div>
    <div class="container d-md-flex flex-column justify-content-center align-items-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card" style="background-color: rgb(245, 245, 245);">
                <p class="card-title text-center pt-5" style="font-size: 2em">Reset Password</p>
                <p class="text-center m-0 p-0" style="color: #6c757d;">Enter your email to proceed</p>
                <hr class="mx-3">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div class="container d-flex flex-column p-0">
                        <label for="email" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Email Address') }}</label>
                    </div>
                    <div class="col mx-5">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col mx-5 d-flex justify-content-center mt-5" >
                        <button type="submit" class="btn btn-outline-primary welcome-button" style="width: 20em">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                    <div class="col mx-5 d-flex justify-content-center mb-1">
                        <a class="btn btn-link mt-2 mb-4" href="{{ url('/login') }}" style="font-size: 0.8rem">
                            {{ __('Signin') }}
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

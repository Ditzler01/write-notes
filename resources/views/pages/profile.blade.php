@extends('layouts.app')

@section('content')

    <div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center" style="padding-top: 10rem; padding-bottom: 5rem;">
        <div class="container d-flex flex-column justify-content-center align-items-center" style="position: relative;">
            <div class="overlay-element d-flex justify-content-center align-items-center shadow" 
                style="background-color: rgb(245, 245, 245); width: 15rem; height: 15rem; border-radius: 100%; margin-left: -15rem;">    
                    @if ($user->profile_img == null)
                        <img id="profile-picture" onmouseover="showUpload()" src="/assets/svg/default_profile.svg" class="custom-shadow" alt="profile-picture" width="200rem" height="200rem" style="border-radius: 100%;">
                    @else
                    <div id="profile-picture" class="custom-shadow" onmouseover="showUpload()" 
                        style="border-radius: 100%; overflow: hidden;">
                        <img src="/images/{{ $user->profile_img }}" width="200rem" height="200rem" 
                            alt="profile-picture" style="object-fit: contain;">
                    </div>
                    @endif 
                    <div id="upload-img-hover" onmouseout="hideUpload()" onclick="upload()" class="round custom-shadow p-1 d-flex justify-content-center align-items-center d-none" 
                        style="width: 13rem; height: 13rem; background-color: rgba(80, 80, 80, 0.4); cursor: pointer;">
                        <img src="/assets/icon/upload-image.png" style="opacity: 0.7" alt="logo" width="80%" height="80%">
                    </div>
            </div>
        </div>
        <div class="container d-md-flex flex-column justify-content-center align-items-center">
            <div class="card" style="padding-top: 8rem; background-color: rgb(245, 245, 245)">
                <form method="POST" action="/update-profile" enctype="multipart/form-data">
                    @csrf
                    <input id="choose-file-button" accept="image/*" type="file" name="profile_img" class="d-none">
                    <div class="container d-lg-flex flex-row p-0 pe-5">
                        <div>
                            <div class="container d-flex flex-column p-0">
                                <label for="first_name" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('First Name') }}</label>
                            </div>
                            <div class="col ms-5">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" 
                                value="{{ $user->first_name }}" autocomplete="first_name">
        
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="container d-flex flex-column p-0">
                                <label for="last_name" class="col mx-5 col-form-label text-lg-start mt-3">{{ __('Last Name') }}</label>
                            </div>
                            <div class="col ms-5">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{  $user->last_name }}" autocomplete="first_name">
        
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col mx-5 d-flex justify-content-center mt-5" >
                        <button type="submit" class="btn btn-outline-primary welcome-button" style="width: 20em">
                            Update
                        </button>
                    </div>
                    <div class="col mx-5 d-flex justify-content-center">
                        <a class="btn btn-link mt-2 mb-4" href="" style="font-size: 0.8rem">
                            Delete Account
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

@endsection
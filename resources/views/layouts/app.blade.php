<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Write Notes</title>
        @vite(['resources/css/style.css', 'resources/js/app.js', 'resources/js/home.js'])
    </head>
    <body class="min-vh-100">
        <nav id="navbar" class="navbar m-0 py-2" style="border: solid 1px rgb(220, 220, 220); z-index: 5; background-color: rgb(250, 250, 250);">
            <div class="d-flex flex-row m-0 ps-lg-2 ps-1 py-1">
                <div class="col px-2 d-flex flex-row justify-content-center align-items-center">
                    <button id="hamburger" class="btn hamburger-btn" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <img src="/assets/img/logo.png" class="img-fluid ps-lg-2" alt="logo" width="50" height="50">
                </div>
                <div class="col-sm-4 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-0 m-0" style="font-size: 30px; font-weight: 300;">Write</p>
                </div>
            </div> 
            <div class="pe-lg-5 pe-3 d-sm-block d-none">
                <button id="profile-dropdown" type="button" class="btn border-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="custom-shadow"
                        style="border-radius: 100%; overflow: hidden;">
                        @if ($user->profile_img == null)
                            <img src="/assets/svg/profile_male.svg" width="50rem" height="50rem" 
                                alt="profile-picture" style="object-fit: contain;">
                        @else
                        <img src="/images/{{ $user->profile_img }}" width="50rem" height="50rem" 
                        alt="profile-picture" style="object-fit: contain;">
                        @endif
                    </div>
                </button>
                <div class="container-fluid position-relative">
                    <ul class="dropdown-menu position-absolute" style="left: -90px;" aria-labelledby="profile-dropdown">
                        <li>
                            <a class="dropdown-item" href="/profile">
                                <img src="/assets/icon/profile.png" class="img me-4" alt="logout" width="15" height="15"> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();">
                                <img src="/assets/icon/logout.png" class="img me-4" alt="logout" width="15" height="15"> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="wrapper" class="container-fluid ps-0 pe-0 d-flex flex-row m-0 min-vh-100 position-absolute top-0">
            {{-- SIDEBAR CONTAINER --}}
            <div id="sidebar" class="col-xxl-2 col-xl-3 col-lg-3 pt-4 vh-min-100 shadow-lg d-flex flex-column position-relative transition-anim" 
                style="background-color: rgb(245, 245, 245);">
                {{-- SIDEBAR CONTENT --}}
                <a class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start"
                    href="{{ route('home') }}" style="text-decoration: none; color: black;">
                    <div class="col-2">
                        <img src="/assets/icon/edit.png" class="img-fluid" alt="notes" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Notes</span>
                    </div>
                </a>
                <a class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start"
                    href="{{ url('archive') }}" style="text-decoration: none; color: black;">
                    <div class="col-2">
                        <img src="/assets/icon/archive.png" class="img-fluid" alt="archive" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Archive</span>
                    </div>
                </a>
                <a class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start"
                    href="{{ url('trash') }}" style="text-decoration: none; color: black;">
                    <div class="col-2">
                        <img src="/assets/icon/trash.png" class="img-fluid" alt="trash" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Trash</span>
                    </div>
                </a>
                <a class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start"
                    href="{{ url('profile') }}" style="text-decoration: none; color: black;">
                    <div class="col-2">
                        <img src="/assets/icon/profile.png" class="img-fluid" alt="profile" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Profile</span>
                    </div>
                </a>
                <div class="container-fluid ps-4 d-flex flex-row py-3 bottom-0 position-absolute">
                    <div class="col-auto d-flex align-items-center justify-content-center">
                        <img src="/assets/icon/logout.png" class="img-fluid" alt="logout" width="15" height="15">
                    </div>
                    <div class="ms-2 col-auto">
                        <a class="btn btn-link justify-content-center" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();" style="font-size: 1em">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end pe-3" style="color: rgb(200, 200, 200)">
                        v 1.01
                    </div>
                </div>
            </div>
            <div id="content-pane" class="container-fluid p-0 m-0 position-relative">
                @yield('content')
            </div>
        </div>

        {{-- MODALS --}}

        {{-- Add Modal --}}
        <div class="modal fade" id="add-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" id="add-note-modal">
                    <form method="POST" action="/add-note">
                        @csrf
                        <div class="modal-header pb-0 px-4" style="border: none;">
                            <input type="text" name="title" class="form-control note-form card-title p-0" placeholder="Title" style="font-weight: 550;">
                            <div class="col w-100 d-flex flex-row align-items-center justify-content-end">
                                <button type="button" class="btn-close m-1" data-bs-dismiss="modal" aria-label="Close"></button>
                                <button type="submit" class="btn-close btn-primary m-1 check-btn d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close"><img src="/assets/icon/check.png" alt="submit" width="25" height="25"></button>
                            </div>
                        </div>
                        <div class="modal-body boder-0 px-4">
                            <textarea name="note" class="form-control note-form card-title p-0 note-text-area scroll" placeholder="Write your text here."></textarea>
                        </div>
                        <div class="modal-footer p-0" style="border: none;">
                            <div class="container-fluid d-flex flex-row align-items-center justify-content-start gap-1">
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#ffffff', this)" style="background-color: #ffffff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="visible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#8ae6a2', this)" style="background-color: #8ae6a2;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#fffe9c', this)" style="background-color: #fffe9c;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#9cc0ff', this)" style="background-color: #9cc0ff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#fc9cff', this)" style="background-color: #fc9cff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#ff9ca9', this)" style="background-color: #ff9ca9;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#ffce9c', this)" style="background-color: #ffce9c;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#9cfffd', this)" style="background-color: #9cfffd;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColor('#d19cff', this)" style="background-color: #d19cff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none">
                            <input class="form-check-input" checked type="radio" name="color" id="#ffffff" value="#ffffff">
                            <input class="form-check-input" type="radio" name="color" id="#8ae6a2" value="#8ae6a2">
                            <input class="form-check-input" type="radio" name="color" id="#fffe9c" value="#fffe9c">
                            <input class="form-check-input" type="radio" name="color" id="#9cc0ff" value="#9cc0ff">
                            <input class="form-check-input" type="radio" name="color" id="#fc9cff" value="#fc9cff">
                            <input class="form-check-input" type="radio" name="color" id="#ff9ca9" value="#ff9ca9">
                            <input class="form-check-input" type="radio" name="color" id="#ffce9c" value="#ffce9c">
                            <input class="form-check-input" type="radio" name="color" id="#9cfffd" value="#9cfffd">
                            <input class="form-check-input" type="radio" name="color" id="#d19cff" value="#d19cff">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
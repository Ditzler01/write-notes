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
                    <img src="/assets/img/note.png" class="img-fluid ps-lg-2" alt="logo" width="50" height="50">
                </div>
                <div class="col-sm-4 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-0 m-0" style="font-size: 30px; font-weight: 300;">Write</p>
                </div>
            </div> 
            <div class="pe-lg-5 pe-3">
                <img src="/assets/svg/profile_male.svg" class="img-fluid shadow-sm" alt="logo" width="50" height="50" style="border-radius: 50%">
            </div>
        </nav>
        
        <div id="wrapper" class="wrapper d-flex flex-row m-0 min-vh-100 min-vw-100 position-absolute top-0">
            {{-- SIDEBAR CONTAINER --}}
            <div id="sidebar" class="col-xxl-2 col-xl-3 col-lg-3 pt-4 vh-min-100 shadow-lg d-flex flex-column position-relative transition-anim" 
                style="background-color: rgb(245, 245, 245);">
                {{-- SIDEBAR CONTENT --}}
                <div class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start">
                    <div class="col-2">
                        <img src="/assets/icon/edit.png" class="img-fluid" alt="notes" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Notes</span>
                    </div>
                </div>
                <div class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start">
                    <div class="col-2">
                        <img src="/assets/icon/archive.png" class="img-fluid" alt="archive" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Archive</span>
                    </div>
                </div>
                <div class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start">
                    <div class="col-2">
                        <img src="/assets/icon/trash.png" class="img-fluid" alt="trash" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Trash</span>
                    </div>
                </div>
                <div class="container-fluid ps-5 sidebar-btn d-flex flex-row align-items-center py-3 justify-content-center justify-content-md-center justify-content-lg-start">
                    <div class="col-2">
                        <img src="/assets/icon/profile.png" class="img-fluid" alt="profile" width="25" height="25">
                    </div>
                    <div class="ps-3 col-4">
                        <span class="justify-content-center" style="font-size: 1em;">Profile</span>
                    </div>
                </div>
                <div class="container-fluid ps-4 d-flex flex-row py-3 bottom-0 position-absolute">
                    <div class="col-auto d-flex align-items-center justify-content-center">
                        <img src="/assets/icon/logout.png" class="img-fluid" alt="logout" width="15" height="15">
                    </div>
                    <div class="ms-2 col-auto">
                        <a class="btn btn-link justify-content-center" href="{{ url('/login') }}" style="font-size: 1em">
                            {{ __('Logout') }}
                        </a>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end pe-3" style="color: rgb(200, 200, 200)">
                        v 1.01
                    </div>
                </div>
            </div>
            <div id="content-pane" class="container-fluid p-0 m-0">
                @yield('content')
            </div>
        </div>
    </body>
</html>
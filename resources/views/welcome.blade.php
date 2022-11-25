<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Write Notes</title>
        @vite(['resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
            <div class="row">
                <div class="col">
                    <img src="{{url('/assets/img/logo.png')}}" alt="logo" class="img-fluid" width="300" height="300">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <p class="display-2 fw-light text-center">Write Notes</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <button type="button" class="btn btn-outline-primary welcome-button btn-lg">Get Started</button>
                </div>
            </div>
        </div>
    </body>
</html>
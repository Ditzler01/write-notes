@extends('layouts.app')

@section('content')

    {{-- <div class="container d-flex justify-content-center align-items-center overflow-auto h-100">
        <img src="/assets/svg/add_note.svg" alt="notebook" class="img-fluid" width="500" height="500">
    </div> --}}

    <div class="container-fluid m-0 d-flex justify-content-md-evenly justify-content-center flex-row flex-wrap overflow-auto h-100 gap-3">
        <div class="card mt-5 note-card" style="min-width: 15rem; max-width: 20rem; height: 25rem; background-color: rgb(245, 245, 245);">
            <div class="card-body overflow-hidden mb-3">
                <div class="container overflow-hidden">
                    <div class="container-fluid d-flex align-items-center flex-row justify-content-between p-0 mb-3">
                        <h5 class="card-title m-0">Card title</h5>
                        <button id="more-dropdown" type="button" class="btn btn-outline-secondary border-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/icon/more.png" width="16" height="16" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="more-dropdown">
                            <li><a class="dropdown-item" href="#">Archive</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                          </ul>
                    </div> 
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 me-md-5 mb-md-5 me-3 mb-3" style="right: 0">
        </div>
    </div>
@endsection

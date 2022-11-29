@extends('layouts.app')

@section('content')

    {{-- <div class="container d-flex justify-content-center align-items-center overflow-auto h-100">
        <img src="/assets/svg/add_note.svg" alt="notebook" class="img-fluid" width="500" height="500">
    </div> --}}

    <div class="container-fluid px-md-5 m-0 d-flex justify-content-md-evenly justify-content-center flex-row flex-wrap overflow-auto h-100 gap-3">
        <div class="card mt-5 note-card" style="width: 20rem; height: 25rem; background-color: rgb(245, 245, 245);">
            <div class="card-body overflow-hidden mb-3">
                <div class="container overflow-hidden">
                    <div class="container-fluid d-flex align-items-center flex-row justify-content-between p-0 mb-3">
                        <h5 class="card-title text-center m-0">Card title</h5>
                        <div class="col-auto d-flex flex-row gap-1">
                            <div class="col-auto p-1 note-button-hover">
                                <img src="/assets/icon/archive.png" alt="notebook" class="img-fluid" width="20" height="20">
                            </div>
                            <div class="col-auto p-1 note-button-hover">
                                <img src="/assets/icon/trash.png" alt="notebook" class="img-fluid" width="20" height="20">
                            </div>
                        </div>
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
        <div class="round p-3 custom-shadow add-note" style="background-color: rgb(250, 250, 250); height: 3.5rem; width: 3.5rem;">
            <img src="/assets/icon/add.png" alt="notebook" class="img-fluid" height="100%" width="100%">
        </div>
    </div>

@endsection

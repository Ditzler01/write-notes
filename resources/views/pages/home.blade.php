@extends('layouts.app')

@section('content')

    @if (count($notes) <= 0)
        <div class="container d-flex justify-content-center align-items-center overflow-auto h-100">
            <img src="/assets/svg/add_note.svg" alt="notebook" class="img-fluid" width="500" height="500">
        </div>
    @else    
        <div class="container-fluid m-0 d-flex justify-content-md-evenly justify-content-center flex-row flex-wrap overflow-auto h-100 gap-3">
            @foreach ($notes as $note)
                <div class="card mt-5 note-card" style="min-width: 20rem; max-width: 20rem; height: 25rem; background-color: {{ $note['color'] }};">
                    <div class="card-body overflow-hidden mb-3">
                        <div class="container overflow-hidden">
                            <div class="container-fluid d-flex align-items-center flex-row justify-content-between p-0 mb-3">
                                <h5 class="card-title m-0">{{ $note['title'] }}</h5>
                                <button id="more-dropdown" type="button" class="btn btn-outline-secondary border-0" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/assets/icon/more.png" width="16" height="16" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="more-dropdown">
                                    <li><a href="archive/{{ $note['id'] }}" class="dropdown-item">Archive</a></li>
                                    <li><a href="trash/{{ $note['id'] }}" class="dropdown-item">Move to trash</a></li>
                                </ul>
                            </div> 
                            <p class="card-text">{!! nl2br(e($note['note'])) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="position-absolute bottom-0 me-md-5 mb-md-5 me-3 mb-3" style="right: 0">
        <div class="round p-3 custom-shadow add-note" style="background-color: rgb(250, 250, 250); height: 3.5rem; width: 3.5rem;" data-bs-toggle="modal" data-bs-target="#add-modal">
            <img src="/assets/icon/add.png" alt="notebook" class="img-fluid" height="100%" width="100%">
        </div>
    </div>
@endsection

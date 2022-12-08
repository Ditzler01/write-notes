@extends('layouts.app')

@section('content')
    @if (count($notes) <= 0)
    <div class="container d-flex flex-column justify-content-center align-items-center overflow-auto h-100">
        <img src="/assets/svg/trash.svg" alt="notebook" class="img-fluid" width="500" height="500">
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
                                <li><a href="trash/restore/{{ $note['id'] }}" class="dropdown-item">Restore</a></li>
                                <li><a href="trash/delete/{{ $note['id'] }}" class="dropdown-item">Delete</a></li>
                            </ul>
                        </div> 
                        <p class="card-text">{!! nl2br(e($note['note'])) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif

@endsection
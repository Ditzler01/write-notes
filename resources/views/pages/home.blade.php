@extends('layouts.app')

@section('content')

    @if (count($notes) <= 0)
        <div class="container d-flex justify-content-center align-items-center overflow-auto h-100">
            <img src="/assets/svg/add_note.svg" alt="notebook" class="img-fluid" width="500" height="500">
        </div>
    @else    
        <div class="container-fluid m-0 d-flex justify-content-md-evenly justify-content-center flex-row flex-wrap overflow-auto h-100 gap-3">
            @foreach ($notes as $note)
                <div class="card mt-5 note-card" style="min-width: 20rem; max-width: 20rem; height: 25rem; background-color: {{ $note['color'] }};"
                    data-bs-toggle="modal" onclick="setModalId('{{ $note['id'] }}')" data-bs-target="#u{{ $note['id'] }}">
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

    {{-- Update Modal --}}
    @foreach ($notes as $note)
        <div class="modal fade" id="u{{ $note['id'] }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" id="update-note-modal">
                    <form method="POST" action="/update-note/{{ $note['id'] }}">
                        @csrf
                        <div class="modal-header pb-0 px-4" style="border: none;">
                            <input type="text" name="title" class="form-control note-form card-title p-0" placeholder="Title" value="{{ $note['title'] }}" style="font-weight: 550;">
                            <div class="col w-100 d-flex flex-row align-items-center justify-content-end">
                                <button type="button" class="btn-close m-1" data-bs-dismiss="modal" aria-label="Close"></button>
                                <button type="submit" class="btn-close btn-primary m-1 check-btn d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close"><img src="/assets/icon/check.png" alt="submit" width="25" height="25"></button>
                            </div>
                        </div>
                        <div class="modal-body boder-0 px-4">
                            <textarea name="note" class="form-control note-form card-title p-0 note-text-area scroll" placeholder="Write your text here.">{{ $note['note'] }}</textarea>
                        </div>
                        <div class="modal-footer p-0" style="border: none;">
                            <div class="container-fluid d-flex flex-row align-items-center justify-content-start gap-1">
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#ffffff', this)" style="background-color: #ffffff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="visible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#8ae6a2', this)" style="background-color: #8ae6a2;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#fffe9c', this)" style="background-color: #fffe9c;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#9cc0ff', this)" style="background-color: #9cc0ff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#fc9cff', this)" style="background-color: #fc9cff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#ff9ca9', this)" style="background-color: #ff9ca9;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#ffce9c', this)" style="background-color: #ffce9c;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#9cfffd', this)" style="background-color: #9cfffd;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                                <div class="color-btn round d-flex align-items-center justify-content-center p-0 m-0">
                                    <div class="color-picker round d-flex align-items-center justify-content-center" onclick="changeColorUpdate('#d19cff', this)" style="background-color: #d19cff;">
                                        <img src="/assets/icon/check.png" alt="check" width="25" height="25" class="invisible">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none">
                            <input class="form-check-input" checked type="radio" name="color" id="#ffffffu" value="#ffffff">
                            <input class="form-check-input" type="radio" name="color" id="#8ae6a2u" value="#8ae6a2">
                            <input class="form-check-input" type="radio" name="color" id="#fffe9cu" value="#fffe9c">
                            <input class="form-check-input" type="radio" name="color" id="#9cc0ffu" value="#9cc0ff">
                            <input class="form-check-input" type="radio" name="color" id="#fc9cffu" value="#fc9cff">
                            <input class="form-check-input" type="radio" name="color" id="#ff9ca9u" value="#ff9ca9">
                            <input class="form-check-input" type="radio" name="color" id="#ffce9cu" value="#ffce9c">
                            <input class="form-check-input" type="radio" name="color" id="#9cfffdu" value="#9cfffd">
                            <input class="form-check-input" type="radio" name="color" id="#d19cffu" value="#d19cff">
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    @endforeach

@endsection

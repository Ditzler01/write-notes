<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\UserNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNote()
    {
        $userNoteId = uniqid(time());

        UserNote::create(
        [
            'id' => $userNoteId,
            'user_id' => Auth::user()->id
        ]);

        Note::create(
        [
            'title' => request('title'),
            'note' => request('note'),
            'color' => request('color'),
            'note_id' => $userNoteId
        ]);

        return redirect('home'); 
    }

    public function home()
    {
        return view('pages.home');
    }

    public function archive()
    {
        return view('pages.archive');
    }

    public function trash()
    {
        return view('pages.trash');
    }

    public function profile()
    {
        return view('pages.profile');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\UserNote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNote()
    {

        UserNote::create(
        [
            'id' => uniqid(time()),
            'user_id' => Auth::user()->id,
            'title' => request('title'),
            'note' => request('note'),
            'color' => request('color')
        ]);

        return redirect('home'); 
    }

    public function home()
    {
        $notes = UserNote::all()->toArray();

        return view('pages.home', ['notes' => $notes]);
    }
}

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

    public function moveToTrash($id)
    {
        
    }

    public function home()
    {
        $notes = DB::table('user_notes')->where('user_id', Auth::user()->id)->get()->toArray();

        return view('pages.home', ['notes' => $notes]);
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

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
        $user = Auth::user();

        if ($user->profile_img != null)
        {
            $image = $user->profile_img;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Auth::id() . '.' . 'png';
            $path = public_path() . '/images/' . $imageName;

            file_put_contents($path, base64_decode($image));

            $user->profile_img = $imageName;
        }

        return view('pages.home', ['notes' => $notes, 'user' => $user]);
    }
}

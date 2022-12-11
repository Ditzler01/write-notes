<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Note;
use App\Models\Trash;
use App\Models\UserNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function archive()
    {
        $notes = Archive::all()->toArray();
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

        return view('pages.archive', ['notes' => $notes, 'user' => $user]);
    }

    public function moveToArchive($id)
    {
        //Get note data
        $note = DB::table('user_notes')->where('id', $id)->get()->first();
        
        //Add data to archive
        Archive::create(
        [
            'id' => uniqid(time()),
            'user_id' => Auth::user()->id,
            'title' => $note->title,
            'note' => $note->note,
            'color' => $note->color
        ]);
        
        //Delete data row from user_notes
        DB::table('user_notes')->where('id', $id)->delete();

        return redirect('home');
    }

    public function restore($id)
    {
        //Get note data
        $note = DB::table('archives')->where('id', $id)->get()->first();

        //Restore data to user_notes
        UserNote::create(
        [
            'id' => uniqid(time()),
            'user_id' => Auth::user()->id,
            'title' => $note->title,
            'note' => $note->note,
            'color' => $note->color
        ]);

        //Delete data row from archive
        DB::table('archives')->where('id', $id)->delete();

        return redirect('archive');
    }

    public function moveToTrash($id)
    {
        //Get note data
        $note = DB::table('archives')->where('id', $id)->get()->first();
        $expiry_date = date('Y-m-d', strtotime(date('Y-m-d'). ' +7 days')); 
        
        //Add data to archive
        Trash::create(
        [
            'id' => uniqid(time()),
            'user_id' => Auth::user()->id,
            'title' => $note->title,
            'note' => $note->note,
            'color' => $note->color,
            'expiry_date' => $expiry_date
        ]);
        
        //Delete data row from user_notes
        DB::table('archives')->where('id', $id)->delete();

        return redirect('home');
    }
}

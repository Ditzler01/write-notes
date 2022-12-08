<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function moveToTrash($id)
    {
        //Get note data
        $note = DB::table('user_notes')->where('id', $id)->get()->first();
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
        DB::table('user_notes')->where('id', $id)->delete();

        return redirect('home');
    }
}

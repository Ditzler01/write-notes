<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = 
    [
        'id',
        'user_id',
        'title',
        'note',
        'color',
        'note_id',
        'expiry_date'
    ];
}

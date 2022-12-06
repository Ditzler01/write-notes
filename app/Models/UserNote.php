<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected $fillable = [
        'id',
        'user_id'
    ];
}

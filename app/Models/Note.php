<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

    public $fillable = [
        'title',
        'body',
        'is_public',
        'user_id'
    ];

    //Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

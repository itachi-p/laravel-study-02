<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];


    # One to Many (inverse)
    # Post belongs to a user
    # To get the owner or the info of the owner of a post
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

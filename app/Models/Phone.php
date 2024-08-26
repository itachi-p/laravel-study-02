<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    # One to One (inverse) Phone Model -> User Model
    # Phone belongs to a user
    # To get the info of the owner/user of the phone number
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

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
    public function user() // この名前(アクセスしたいモデルと同名)以外では不可の模様。
    // Userモデルからの外部キーアクセスではメソッド名は任意だったが、逆は仕様的に名称固定っぽい。
    {
        return $this->belongsTo(User::class);
    }
}

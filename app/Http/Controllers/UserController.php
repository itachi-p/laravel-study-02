<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    // show() - show the details of a user: id, name, email, phone number
    public function show($user_id)
    {
        $user = $this->user->findOrFail($user_id);

        return view('users.show')
            ->with('user', $user);
    }
}

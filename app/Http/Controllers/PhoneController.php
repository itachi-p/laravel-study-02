<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    private $phone;

    public function __construct(Phone $phone)
    {
        $this->phone = $phone;
    }


    // showUserInfo() - show the info of the owner of the phone number
    public function showUserInfo($phone_id)
    {
        $phone = $this->phone->findOrFail($phone_id);

        return view('phones.show')
            ->with('phone', $phone);
    }
}

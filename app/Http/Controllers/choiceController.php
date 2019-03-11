<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class choiceController extends Controller
{
    public function getSignin()
    {
        return view('signin');
    }

    public function getSignup()
    {
        return view('signup');
    }
}

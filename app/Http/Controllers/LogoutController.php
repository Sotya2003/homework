<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    function logout()
    {
        Session::forget('google_account');
        Session::forget('users');
        Auth::logout();

        return redirect('/home')->with('logout',1);
    }
}

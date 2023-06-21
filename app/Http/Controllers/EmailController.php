<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailConfirmation;

class EmailController extends Controller
{
    public function email_confirmation()
    {
        //email konfirmasi
        Mail::to("aryasotya2003@gmail.com")->send(new EmailConfirmation());
        return 'email terkirim';
    }
}

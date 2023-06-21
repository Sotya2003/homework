<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('halaman.forgotpassword');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //cek jika ada kolom kosong
        $request->validate
        (
            [
                'email' =>'required'
            ],
            [
                //pesan error
                'email.required'=>'Email tidak boleh kosong!.',
            ]
        );

        //cetak random token
        $token=random_int(100000, 999999);

        //email konfirmasi
        $email=$request->input('email');
        Session::put('confirmation_code',$token);
        Session::put('email',$email);
        Session::flash('forgot_password',1);
        Mail::to("$email")->send(new EmailConfirmation());

        return redirect('/forgot/confirmation');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

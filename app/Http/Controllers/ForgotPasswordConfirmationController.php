<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::get('confirmation_code'))
        {
            return view('halaman.forgotpasswordconfirmation');
        }
        else
        {
            return redirect('login');
        }
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
                'confirmation_code' =>'required|min:6',
                'password' =>'required|min:4',
            ],
            [
                //pesan error
                'confirmation_code.min'=>'Masukkan Kode Verifikasi dengan benar!.',
                'confirmation_code.required'=>'Kode Verifikasi tidak boleh kosong!.',
                'email.required'=>'Email tidak boleh kosong!.',
                'password.required'=>'Password tidak boleh kosong!.',
                'password.min'=>'Pasti Password nya 123!.'
            ]
        );

        if(Session::get('confirmation_code') == $request->input('confirmation_code'))
        {
            $users=users::where('email',Session::get('email'))->update
            (
                [
                    'password' => Hash::make($request->input('password'))
                ]
            );

            Session::forget('confirmation_code');
            return redirect('/home')->with('forgot_password_success',Session::get('email'));
        }
        else
        {
            Session::flash('verification_failed',1);
            return view('halaman.forgotpasswordconfirmation');
        }
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

<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::get('confirmation_code'))
        {
            return view('halaman.registerConfirmation');
        }
        else
        {
            return redirect('/register');
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
                'confirmation_code' =>'min:6|required',
            ],
            [
                //pesan error
                'confirmation_code.min'=>'Masukkan Kode Verifikasi dengan benar!.',
                'confirmation_code.required'=>'Kode Verifikasi tidak boleh kosong!.',
            ]
        );

        if(Session::get('confirmation_code') == $request->input('confirmation_code'))
        {
            $email=Session::get('email');
            users::create(Session::get('data'));
            Session::forget('data');
            Session::forget('email');
            Session::forget('no_telp');
            Session::forget('password');
            Session::forget('confirmation_code');
            Session::forget('email_confirmation_send');
            return redirect('/home')->with('register_success',$email);
        }
        else
        {
            Session::flash('verification_failed','1');
            return view('halaman.registerConfirmation');
        }
        //simpan data
        //users::create(Session::get('data'));
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

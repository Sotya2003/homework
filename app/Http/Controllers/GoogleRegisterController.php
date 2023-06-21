<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\google_account;
use Illuminate\Support\Facades\Hash;
use App\Models\users;

class GoogleRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('halaman.googleRegister');
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
        if(!Session::get('google_register'))
        {
            return redirect('/home');
        }

        //simpan data sementara di session
        Session::put('no_telp',$request->no_telp);
        Session::put('password',$request->password);

        //cek jika ada kolom kosong
        $request->validate
        (
            [
                'password' =>'required|min:4',
                'no_telp' =>'required|min:9|unique:users,no_telp',
            ],
            [
                //pesan error
                'no_telp.required'=>'Nomor Telepon tidak boleh kosong!.',
                'no_telp.min'=>'Masukkan Nomor Telepon dengan benar!.',
                'no_telp.unique'=>'Nomor Telepon sudah terdaftar!.',
                'password.required'=>'Password tidak boleh kosong!.',
                'password.min'=>'Pasti Password nya 123!.'
            ]
        );

        $google_register=Session::get('google_register');
        $create=users::create([
            'name' => $google_register->name,
            'email' => $google_register->email,
            'google_id' => $google_register->id,
            'permission' => 'user',
            'no_telp' =>$request->input('no_telp'),
            'password' =>Hash::make($request->input('password')),
            'status' =>'active',
        ]); 

        Session::flash('google_account_register', $google_register->email);
        Session::forget('password');
        return redirect('/home');
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

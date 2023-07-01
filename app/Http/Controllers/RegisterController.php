<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Mail\EmailConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //jika sudah login
        if(Session::get('users'))
        {
            return redirect('/')->with('already_login','1');
        }
        else
        {
            return view('halaman.register');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //simpan data di session
        Session::put('name',$request->name);
        Session::put('email',$request->email);
        Session::put('no_telp',$request->no_telp);
        Session::put('password',$request->password);

        //cek jika ada kolom kosong
        $request->validate
        (
            [
                'name' =>'required|unique:users,name',
                'email' =>'required|unique:users,email',
                //cek email sama
                'password' =>'required|min:4',
                'no_telp' =>'required|min:9|unique:users,no_telp',
            ],
            [
                //pesan error
                Session::flash('register_error',1),
                'name.required'=>'Nama tidak boleh kosong!.',
                'name.unique'=>'Nama ini sudah terdaftar!.',
                'email.required'=>'Email tidak boleh kosong!.',
                'email.unique'=>'Email ini sudah terdaftar!.',
                'no_telp.required'=>'Nomor Telepon tidak boleh kosong!.',
                'no_telp.min'=>'Masukkan Nomor Telepon dengan benar!.',
                'no_telp.unique'=>'Nomor Telepon sudah terdaftar!.',
                'password.required'=>'Password tidak boleh kosong!.',
                'password.min'=>'Pasti Password nya 123!.'
            ]
        );

        //cetak random token
        $token=random_int(100000, 999999);

        //enkripsi password
        $data=
        [
            'name' =>$request->input('name'),
            'email' =>$request->input('email'),
            'no_telp' =>$request->input('no_telp'),
            'password' =>Hash::make($request->input('password')),
            'remember_token' =>$token,
            'permission' =>'user',
        ];

        //email konfirmasi
        $email=$request->input('email');
        Session::put('confirmation_code',$token);
        Session::put('data',$data);
        Session::flash('register',1);

        //kirim email
        Mail::to("$email")->send(new EmailConfirmation());

    
        Session::put('email_confirmation_send',$token);
        Session::flash('register_confirmation_modal',1);

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

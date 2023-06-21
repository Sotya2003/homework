<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //jika sudah login
        if(Session::get('users')==!null)
        {
            return redirect('home/')->with('already_login','1');
        }
        else
        {
            return view('halaman.login');
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
        Session::flash('email',$request->email);
        Session::flash('password',$request->password);

        //cek jika ada kolom kosong
        $request->validate
        (
            [
                'email' =>'required',
                'password' =>'required',
            ],
            [
                'email.required'=>'Email tidak boleh kosong!.',
                'password.required'=>'Password tidak boleh kosong!.'
            ]
        );

        $data_login=
        [
            'email' =>$request->email,
            'password' =>$request->password
        ];

        if(Auth::attempt($data_login))
        {
            Session::put('users', Auth::user());
            return redirect('/home')->with('success',$request->email);
        }
        else
        {
            return redirect('/login')->with('login_failed',1);
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

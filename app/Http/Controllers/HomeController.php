<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        //notif home worker
        if(Session::get('users'))
        {
            if(Session::get('users')->permission=='worker')
            {
                $pesanan=Order::where('worker',Session::get('users')->email)->where('service_status','!=','complete')->where('paid_status','Unpaid')->count();
                Session::flash('worker_notif_pesanan',$pesanan);
                return view('halaman.utama');  
            }
            return view('halaman.utama');
        }
        
        return view('halaman.utama');
    }

    public function layanan()
    {
        //worker dilarang memesan
        if(Session::get('users'))
        {
            if(Session::get('users')->permission!=='worker')
            {
                return view('halaman.layanan')->with('halaman', 'layanan');
            }
            else
            {
                return redirect('/');
            }
        }
        else
        {
            return view('halaman.layanan');
        }
    }

    public function kontak()
    {
        return view('halaman.kontak');
    }

    public function tentangkami()
    {
        //notif home worker
        if(Session::get('users'))
        {
            if(Session::get('users')->permission=='worker')
            {
                $pesanan=Order::where('worker',Session::get('users')->email)->where('service_status','!=','complete')->where('paid_status','Unpaid')->count();
                Session::flash('worker_notif_pesanan',$pesanan);
                return view('tentang-kami');  
            }
            return view('halaman.tentang-kami');
        }

        return view('halaman.tentang-kami');
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
            return redirect('/home')->with('login_failed',1);
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

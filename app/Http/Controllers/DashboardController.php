<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //notif sebagai worker
        if(Session::get('users'))
        {
           if(Session::get('users')->permission=='worker')
            {
                $pesanan=Order::where('worker',Session::get('users')->email)->where('service_status','!=','complete')->where('paid_status','Unpaid')->count();
                Session::flash('worker_notif_pesanan',$pesanan);
                return view('halaman.dashboard.welcome');
            } 
        }
        else
        {
            return redirect('/');
        }

        //cek user
        if(Session::get('users'))
        {       
            return view('halaman.dashboard.welcome');
        }
        else
        {
            return redirect('home/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //s
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

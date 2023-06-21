<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class riwayatTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::get('users')->permission=='user')
        {
            $data=Order::where('email',Session::get('users')->email)->where('service_status','complete')->where('paid_status','Paid')->orderBy('id','desc')->get();
            return view('halaman.dashboard.riwayat_pesanan')->with('data',$data);
        }

        if(Session::get('users')->permission=='worker')
        {
            //notif worker pesanan masuk
            $pesanan=Order::where('worker',Session::get('users')->email)->where('service_status','!=','complete')->where('paid_status','Unpaid')->count();
            Session::flash('worker_notif_pesanan',$pesanan);

            $data=Order::where('worker',Session::get('users')->email)->where('service_status','complete')->where('paid_status','Paid')->orderBy('id','desc')->get();
            return view('halaman.dashboard.riwayat_pesanan')->with('data',$data);
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

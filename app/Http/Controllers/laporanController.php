<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::get('users'))
        {
            if(Session::get('users')->permission!=='admin')
            {
                return redirect('/');
            }
            else
            {
                Session::flash('year',date('Y'));
                return view('halaman.admin.laporan');
            }
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
        $year=$request->year;
        $month_before=$request->month_before;
        $month_after=$request->month_after;

        Session::flash('year',$year);
        Session::flash('month_before',$month_before);
        Session::flash('month_after',$month_after);

        //cek input bulan
        if($month_before==0 or $month_after==0)
        {
            Session::flash('error_month',1);
            return view('halaman.admin.laporan');
        }


        //tampilkan data
        $data1=Order::where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->get();
        Session::flash('data1',$data1);

        //jumlah transaksi
        $data2=Order::where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->count();
        Session::flash('data2',$data2);

        //total transaksi
        $data3=Order::where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->sum('total_price');
        Session::flash('data3',$data3);

        //jumlah transaksi bersih rumah
        $data4=Order::where('item','bersih_rumah')->where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->count();
        Session::flash('data4',$data4);
        //total transaksi bersih rumah
        $data4_1=Order::where('item','bersih_rumah')->where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->sum('total_price');
        Session::flash('data4_1',$data4_1);

        //jumlah transaksi elektronik
        $data5=Order::where('item','perbaikan_elektronik')->where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->count();
        Session::flash('data5',$data5);
        //jumlah transaksi elektronik
        $data5_1=Order::where('item','perbaikan_elektronik')->where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->sum('total_price');
        Session::flash('data5_1',$data5_1);

        //jumlah transaksi tukang kebun
        $data6=Order::where('item','tukang_kebun')->where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->count();
        Session::flash('data6',$data6);
        //jumlah transaksi tukang kebun
        $data6_1=Order::where('item','tukang_kebun')->where('paid_status','Paid')->whereYear('created_at',$year)->whereMonth('created_at','>=',$month_before)->whereMonth('created_at','<=',$month_after)->sum('total_price');
        Session::flash('data6_1',$data6_1);

        Session::flash('laporan',1);
        return view('halaman.admin.laporan');
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
     * Remove the specified resource mont$month_before storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\users;
use Illuminate\Support\Facades\Session;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Session::get('users'))
        {
            return redirect('/home');
        }
        else
        {
            //jika admin
            if(Session::get('users')->permission=='admin')
            {
                return redirect('/dashboard/semua-transaksi');
            }

            //jika worker
            if(Session::get('users')->permission=='worker')
            {
                //cari data
                $data=Order::where('worker',Session::get('users')->email)->get();

                //notif sebagai worker
                $pesanan=Order::where('worker',Session::get('users')->email)->where('service_status','!=','complete')->where('paid_status','Unpaid')->count();
                Session::flash('worker_notif_pesanan',$pesanan);

                //ketika pekerja ingin otw
                if($request->service_status=='processing' && $request->worker==Session::get('users')->email)
                {
                    Order::where('email',$request->email)->where('service_status',$request->service_status)->update
                    (
                        [
                            'service_status'=>'ontheway'
                        ]
                    );
                    return redirect('/dashboard/pesanan');
                }

                //ketika pekerja ingin mengerjakan
                if($request->service_status=='ontheway' && $request->worker==Session::get('users')->email)
                {
                    Order::where('email',$request->email)->where('service_status',$request->service_status)->update
                    (
                        [
                            'service_status'=>'working'
                        ]
                    );
                    return redirect('/dashboard/pesanan');
                }

                //ketika pekerja sudah selesai bekerja
                if($request->service_status=='working' && $request->worker==Session::get('users')->email)
                {
                    Order::where('email',$request->email)->where('service_status',$request->service_status)->update
                    (
                        [
                            'service_status'=>'complete'
                        ]
                    );
                    users::where('email',Session::get('users')->email)->update
                    (
                        [
                            'status'=>'active'
                        ]
                    );
                    return redirect('/dashboard/pesanan');
                }

                return view('halaman.dashboard.pesanan')->with('data',$data);
            }

            //jika user
            if(Session::get('users')->permission=='user')
            {
                $data=Order::where('email',Session::get('users')->email)->get();
                return view('halaman.dashboard.pesanan')->with('data',$data);
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
        return 'store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show';
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

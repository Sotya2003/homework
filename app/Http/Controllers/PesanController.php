<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pricing;
use App\Models\Order;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(Session::get('users'))
        {
            Session::flash('layanan', $request->layanan);
            return view('halaman.pesan'); 
        }
        else
        {
            Session::get('login_failed',1);
            return redirect('home/'); 
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
        $id=Session::get('users')->id.now()->format('Ymd').now()->format('His');

        //cek jika ada kolom kosong
        $request->validate
        (
            [
                'durasi' =>'required',
                'address' =>'required',
            ],
            [
                //pesan error
                'durasi.required'=>'Durasi tidak boleh kosong!.',
                'address.required'=>'Alamat tidak boleh kosong!.',
            ]
        );

        //cek apakah ada order belum dibayar
        $cek_tagihan=Order::where('email',Session::get('users')->email)->where('paid_status','Unpaid')->get('paid_status')->count();

        if($cek_tagihan==1)
        {
            Session::flash('error',1);
            return redirect('/pesan');
        }
        else
        {
            //cek ketersediaan pekerja
            $worker=users::where('permission','worker')->where('status','active')->first();

            if($worker)
            {
                $qty=(int)$request->durasi;
                $price=pricing::where('name',$request->pesanan)->get(['price']);

                //konversi array to raw data
                foreach($price as $price){Session::flash('price',$price);}

                // di jumlah
                $total_price=$qty*Session::get('price')->price;

                Order::create
                ([
                    'id'                =>$id,
                    'name'              =>Session::get('users')->name,
                    'email'             =>Session::get('users')->email,
                    'address'           =>$request->address,
                    'phone'             =>Session::get('users')->no_telp,
                    'item'              =>$request->pesanan,
                    'qty'               =>$request->durasi,
                    'price'             =>Session::get('price')->price,
                    'total_price'       =>$total_price,
                    'worker'            =>$worker->email,
                    'service_status'    =>'processing',
                    'paid_status'       =>'Unpaid',
                ]);

                //update status pekerja
                users::where('email',$worker->email)->update
                (
                    [
                        'status' => 'working'
                    ]
                );

                //meminta req sesi pembayaran
                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $order=Order::where('paid_status','Unpaid')->get('id');
                foreach($order as $order);
                $params =
                array(
                    'transaction_details' => array(
                        'order_id' => $order->id,
                        'gross_amount' => $total_price,
                    ),
                    'customer_details' => array(
                        'first_name' => Session::get('users')->name,
                        'last_name' => '',
                        'address' => $request->address,
                        'email' => Session::get('users')->email,
                        'phone' => Session::get('users')->no_telp,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);
                Order::where('email',Session::get('users')->email)->update
                (
                    [
                        'paymentToken' => $snapToken
                    ]
                );

                return redirect('/dashboard/pesanan');
            }
            else
            {
                Session::flash('worker_fail',1);
                return redirect('/home'); 
            }
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

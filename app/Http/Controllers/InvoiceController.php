<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
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
            $data=Order::where('id',$request->id)->get();
            foreach($data as $data)
            return view('halaman.dashboard.invoice')->with('data',$data);
            //return $data;
        }
    }

    public function callback(Request $request)
    {
        $serverKey=config('midtrans.server_key');
        $hashed=hash('sha512',$request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed==$request->signature_key)
        {
            if($request->transaction_status=='capture' OR $request->transaction_status=='settlement')
            {
                Order::where('id',$request->order_id)->update
                (
                    [
                        'paid_status'=>'Paid'
                    ]
                );
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

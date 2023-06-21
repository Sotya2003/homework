<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class cancelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //validasi akun & invoice
        $delete=Order::where('email',Session::get('users')->email)->where('id',$request->id)->count();

        //ubah status worker
        $worker_email=Order::where('email',Session::get('users')->email)->where('id',$request->id)->get();
        foreach($worker_email as $worker_email);

        if($delete==1)
        {
            Order::where('id', $request->id)->delete();
            users::where('email',$worker_email->worker)->update(['status'=>'active']);
            return redirect('/dashboard/pesanan');
        }
        else
        {
            return redirect('/dashboard/pesanan');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class AllTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Session::get('users')){return redirect('/home');}

        if(Session::get('users')->permission=='admin')
        {
           $data=Order::all();
           return view('halaman.admin.allTransaction')->with('data',$data);
        }
        else
        {
            return view('errors.404');
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

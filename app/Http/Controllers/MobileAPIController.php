<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\users;

class MobileAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=(['data' => Order::all()]);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function akun()
    {
        $data=(['data' => users::all()]);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->all();
        //return 'berhasil';
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

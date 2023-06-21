<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Session::get('users')){return redirect('/home');}

        if(Session::get('users')->permission=='admin')
        {
            $email=$request->email;

            //temukan data
            $data=users::all()->where('email', $email);

            Session::put('edit_data', $data);
            return view('halaman.admin.edit');
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
        // update data
        $users=users::where('email',$request->email)->update
        (
            [
                'permission' => $request->input('jabatan'),
                'no_telp' => $request->input('phone'),
            ]
        );

        return redirect('dashboard/kelola-akun/')->with('edit_success',1);
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

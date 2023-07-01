<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\users;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //notif worker pesanan masuk
        if(Session::get('users')->permission=='worker')
        {
            $pesanan=Order::where('worker',Session::get('users')->email)->where('service_status','!=','complete')->where('paid_status','Unpaid')->count();
            Session::flash('worker_notif_pesanan',$pesanan);
            $img=users::where('email',Session::get('users')->email)->get('img');
            foreach($img as $img);
            return view('halaman.dashboard.profil')->with('img',$img);
        }

        if (Session::get('users')) 
        {
            $img=users::where('email',Session::get('users')->email)->get('img');
            foreach($img as $img);
            return view('halaman.dashboard.profil')->with('img',$img);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi gambar
        $request->validate
        (
            [
                'img_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'img_1.required' => 'Wajib menggunakan gambar.',
                'img_1.mimes' => 'Wajib menggunakan format jpeg,png,jpg,gif,svg.',
                'img_1.image' => 'Bukan file gambar.',
                'img_1.max' => 'Tidak lebih dari 2MB.',
            ]
        );
        
        //cek gambar lama di db
        $oldImage=users::where('email',Session::get('users')->email)->get('img');
        foreach($oldImage as $oldImage);
        if($oldImage->img)
        {
            $image_path = $request->file('img_1')->store(Session::get('users')->email, 'public');
            //resize image
            $resize=ResizeImage::make('storage/'.$image_path)->resize(200, 200);
            ResizeImage::make($resize)->save('storage/'.$image_path);
            $delete=Storage::delete($oldImage->img);
            if($delete)
            {
                $update=users::where('email',Session::get('users')->email)->update
                (
                    [
                        'img'=>$image_path
                    ]
                );
                if($update)
                {
                    return redirect('/dashboard/profil');
                }
            }
        }
        else
        {
            //update img kolom
            $image_path = $request->file('img_1')->store(Session::get('users')->email, 'public');
            //resize image
            $resize=ResizeImage::make('storage/'.$image_path)->resize(200, 200);
            ResizeImage::make($resize)->save('storage/'.$image_path);
            $update=users::where('email',Session::get('users')->email)->update
            (
                [
                    'img'=>$image_path
                ]
            );
            if($update)
            {
                return redirect('/dashboard/profil');
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

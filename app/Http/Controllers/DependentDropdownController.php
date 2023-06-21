<?php

namespace App\Http\Controllers;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Illuminate\Http\Request;

class DependentDropdownController extends Controller
{
    public function index()
    {
        $provinces = Province::pluck('name', 'id');

        return view('halaman.region', [
            'provinces' => $provinces,
        ]);
    }
    public function store(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($cities);
    }
}
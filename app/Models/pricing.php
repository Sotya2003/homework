<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricing extends Model
{
    use HasFactory;

    //berikan akses input ke database
    protected $table='pricing';
    protected $fillable=['name','price'];
    protected $casts = [
        'price' => 'integer',
    ];
}

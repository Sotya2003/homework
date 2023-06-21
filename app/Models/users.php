<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    //berikan akses input ke database
    protected $table='users';
    protected $fillable=['name','status','google_id','email','no_telp','password','permission','remember_token','created_at','updated_at'];
}

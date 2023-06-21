<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class google_account extends Model
{
    use HasFactory;

    protected $table='google_account';
    protected $fillable = [
        'google_id',
        'name',
        'email',
        'remember_token',
        'created_at',
        'updated_at',
        'permission'
    ];
}

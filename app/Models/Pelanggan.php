<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{


    protected $fillable = [
        'kode',
        'name',
        'alamat',
        'phone',
        'email',
        'profile_image',
    ];
}

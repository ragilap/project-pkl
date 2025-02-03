<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    public function galeries()
    {
        return $this->hasMany(Galery::class);
    }
    public function albumvideo()
    {
        return $this->hasMany(albumvideo::class);
    }
    public function logo()
    {
        return $this->hasMany(logo::class);
    }
    public function submateri()
    {
        return $this->hasMany(submateri::class);
    }
}

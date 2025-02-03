<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryalbum extends Model
{
    use HasFactory;
    protected $fillable =['name','slug'];

    public function galeries()
    {
        return $this->hasMany(Galery::class);
    }
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logo extends Model
{ 
   protected $fillable = ['judul','image','deskripsi','quote'];
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(type::class, 'type_id');
    }
}

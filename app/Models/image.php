<?php

namespace App\Models;

use App\Http\Controllers\InformationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

public function information()
{
    return $this->belongsTo(InformationController::class);
}
}

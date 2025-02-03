<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialTeam extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function teams()
    {
        return $this->belongsTo(team::class, 'parent_id');
    }
}

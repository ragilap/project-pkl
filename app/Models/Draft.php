<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;
    protected $fillable =['publisher_id','article_id'];
   

    public function article()
    {
        return $this->hasOne(Article::class, 'published_at');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
     protected $table = 'tags';
 protected $fillable = ['name','slug'];

public function article()
{
    return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id');
}
}

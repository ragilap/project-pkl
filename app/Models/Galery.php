<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $fillable = ['judul', 'parent_id', 'file_path', 'type_id', 'draft', 'published_at', 'scheduled_at'];
    protected $dates = ['published_at', 'scheduled_at'];

    public function types()
{
    return $this->belongsTo(type::class,'type_id');
}

    public function articles()
{
    return $this->hasMany(Article::class);
}

public function album()
{
    return $this->belongsTo(Album::class, 'parent_id');
}
public function categories()
{
    return $this->belongsTo(categoryalbum::class, 'category_id');
}

}

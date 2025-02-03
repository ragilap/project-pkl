<?php

namespace App\Models;

use Oddvalue\LaravelDrafts\Traits\HasDrafts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Article extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded = ['id', 'created_at', 'is_published', 'updated_at', 'parent_id'];
    protected $dates = ['published_at', 'scheduled_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function drafts()
    {
        return $this->hasMany(Draft::class, 'is_draft');
    }
    public function galeries()
    {
        return $this->belongsTo(Galery::class, 'galery_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }
    public function incrementViews()
    {
        $this->increment('views');
    }
}

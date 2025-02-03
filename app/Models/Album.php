<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\EloquentSortable\Sortable;

class Album extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $guarded = ['id'];
    protected $fillable = ['nama_album','gambar_album' ,'order', 'draft','published_at'];
    protected $dates = ['published_at', 'scheduled_at'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    // ...

    // Metode buildSortQuery yang mengurutkan berdasarkan created_at terbaru
    // public function buildSortQuery(): \Illuminate\Database\Eloquent\Builder
    // {
    //     return static::query()->orderBy('created_at', 'asc');
    // }

    public function galery()
    {
        return $this->hasMany(Galery::class, 'parent_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

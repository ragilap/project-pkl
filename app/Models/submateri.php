<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class submateri extends Model implements Sortable
{
    use HasFactory; use SortableTrait;
    protected $fillable = [
        'order'
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];


    public function materi()
{
    return $this->belongsTo(materi::class, 'parent_id');
}

public function type()
{
    return $this->belongsTo(type::class, 'type_id');
}

public function categories()
{
    return $this->belongsTo(Category::class,'category_id');
}

}

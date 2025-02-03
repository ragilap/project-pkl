<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

  class albumvideo extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $guarded = ['id'];

    protected $fillable = ['nama_album', 'order','draft','published_at'];
    protected $dates = ['published_at', 'scheduled_at'];


    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];


    public function video()
    {
        return $this->hasMany(video::class, 'parent_id');
    }
    public function type_id()
    {
        return $this->belongsTo(type::class, 'type_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

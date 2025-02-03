<?php

namespace App\Models;

use App\Http\Controllers\ArticleController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class team extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = ['order', 'nama', 'quote', 'deskripsi', 'image', 'jabatan'];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    public function article()
    {
        return $this->belongsTo(ArticleController::class);
    }

    public function socialteam()
    {
        return $this->hasMany(SocialTeam::class, 'parent_id');
    }
}

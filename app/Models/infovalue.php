<?php

namespace App\Models;

use App\Http\Controllers\InformationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class infovalue extends Model implements Sortable
{
    use HasFactory; use SortableTrait;
    protected $fillable = ['icon','deskripsi', 'order','judul'];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    public function info()
    {
        return $this->belongsTo(InformationController::class);
        }
}

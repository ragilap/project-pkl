<?php

namespace App\Models;

use App\Http\Controllers\InformationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class contact extends Model implements Sortable
{
    use HasFactory; use SortableTrait;
    protected $fillable = ['type', 'order','value'];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $contactTypes = [
        'geo-alt' => 'Address',
        'telephone' => 'Phone',
        'envelope' => 'Email',
        'clock' => 'Open Hours',
        // Add more types as needed
    ];

    public function getContactTypes()
    {
        return $this->contactTypes;
    }

    // public static function getUnreadCount()
    // {
    //     return static::whereNull('read_at')->count();
    // }

    public function info()
    {
        return $this->belongsTo(InformationController::class);
    }
}

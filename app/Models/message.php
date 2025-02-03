<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','subject','message','haveread','created_at'];
    public static function unreadCount()
    {
        return static::where('haveread', false)->count();
    }
    // public static function unreadCountById($id)
    // {
    //     return static::where('id', $id)
    //         ->where('haveread', false)
    //         ->count();
    // }
}

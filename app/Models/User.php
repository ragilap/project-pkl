<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{  use Notifiable;
    use HasApiTokens, HasFactory, Notifiable,HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

protected $table='users';
protected $primaryKey='id';

    protected $fillable = [
        'name',
        'email',
        'username',
        'role',
        'password',
        'profile_image',

    ];

    public function logActivity($activityType)
    {
        $this->update(['activity' => $activityType]);
    }
    public function dataPelanggan()
    {
        return $this->hasOne(DataPelanggan::class, 'user_id');
    }
    public function draft()
    {
        return $this->hasOne(Draft::class,'publisher_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

public function article()
{
 return $this->hasMany(Article::class);
}

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

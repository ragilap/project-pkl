<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
  protected $fillable =['name','slug','deskripsi','image'];
  public function articles()
  {
      return $this->hasMany(Article::class);
  }
  public function jenismateri()
  {
      return $this->hasMany(jenismateri::class);
  }
  public function galeries()
  {
      return $this->hasMany(Galery::class);
  }
  public function albums()
  {
      return $this->hasMany(Album::class);
  }

}

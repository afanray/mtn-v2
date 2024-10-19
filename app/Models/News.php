<?php

namespace App\Models;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'title',
        'image',
        'categories',
        'content',
        'created_by',
        'updated_by',
    ];

 public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value); // Buat slug dari judul
    }

    public function user()
      {
          return $this->belongsTo(User::class);
      }
}

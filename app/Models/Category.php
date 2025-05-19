<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'text_color',
        'background_color',
        'slug',
        

    ];
      public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}

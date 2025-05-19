<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
       protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
           
        ];
    }
  
    public function getReadingTime(){
        $words = str_word_count($this->body);
        return ceil($words / 250);
    }
}

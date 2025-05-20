<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'image',
        'published_at',
        'is_featured',
    ];
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
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function likes(){
        return $this->belongsToMany(User::class,'post_like')->withTimestamps();
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
    public function getThumbnailImage(){
      $isUrl=  str_contains($this->image, 'https://') ? $this->image : asset('storage/'.$this->image);
      return $isUrl;
    }
    public function scopeWithCategory($query,string $category){
        
          $query->whereHas('categories', function($query) use ($category){
         $query->where('slug', $category);
     });
    }
}

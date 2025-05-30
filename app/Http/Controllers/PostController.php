<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //
    public function index(){
        $categories = Cache::remember('categories',Carbon::now()->addDay(),function(){
            return Category::whereHas('posts', function($query){
                $query->published();
            })->take(10)->get();
        });
        return view('posts.index',
        [
            'posts' => Post::take(5)->get(),
            'categories' => $categories
          
        ]);
    }
    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
}

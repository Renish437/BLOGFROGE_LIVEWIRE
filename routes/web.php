<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Livewire\PostList;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', HomeController::class)->name('home');
Route::get('/blog', [PostController::class,'index'])->name('posts.index');
Route::get('/blog/{post:slug}', [PostController::class,'show'])->name('posts.show');

Route::get('/language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('app.supported_locales'))) {
        // App::setLocale($locale);
        session()->put('locale', $locale);
       
    }
    return redirect()->back();
})->name('locale');
// Route::get('/posts-list', [PostList::class, 'getPostsJson'])->name('posts.list.json');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

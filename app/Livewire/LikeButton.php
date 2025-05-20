<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeButton extends Component
{
    
    public Post $post;

   public function toggleLike(){
       if(!Auth::check()){
          return $this->redirect(route('login'),true);
       }
       $user = Auth::user();
       $hasLiked = $user->likes()->where('post_id', $this->post->id)->exists();

       if($hasLiked){
           $user->likes()->detach($this->post->id);
           return;
       }
        $user->likes()->attach($this->post->id);

   }
    public function render()
    {
        
        return view('livewire.like-button');
    }
}

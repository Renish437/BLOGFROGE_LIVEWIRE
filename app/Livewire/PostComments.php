<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use WithPagination;


    public Post $post;

    #[Rule('required|min:3')]
    public string $comment;

    public function postComment(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
     $this->validateOnly('comment');
     $this->post->comments()->create([
      'user_id' => Auth::user()->id,
      'comment' => $this->comment
     ]);
     $this->reset('comment');
    }

    #[Computed()]
    public function comments(){
        return $this?->post->comments()->with('user')->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.post-comments');
    }
}

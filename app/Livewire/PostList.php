<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    #[Url('sort')]
    public $sort = 'desc';

    #[Url('search')]
    public $search ="";

    #[Url('category')]
    public $category ="";

    public function setSort($sort){
        $this->sort = ($sort == 'desc') ? 'desc' : 'asc';
        // $this->resetPage();
    }

  #[On('search')]
  public function updatedSearch($search){
      $this->search = $search;
      $this->resetPage();
  }
  public function clearFilters(){
      $this->search = '';
      $this->category = '';
      $this->resetPage();
  }
    #[Computed()]
    public function posts(){
     return Post::published()
     ->with('categories')
     ->when($this->activeCategory, function($query){
         $query->whereHas('categories', function($query){
             $query->where('slug', $this->category);
         });
     })
     ->where('title','like',"%{$this->search}%")
     ->orderBy('published_at', $this->sort)
     ->paginate(3);
    }
    #[Computed()]
    public function activeCategory(){
        return Category::where('slug', $this->category)->first();
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}

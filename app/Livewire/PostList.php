<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
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

    #[Url('popular')]
    public $popular=0;

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
     $query = Post::published()
     
     ->with('categories', 'author')
     ->when($this->activeCategory, function($query){
        //  $query->whereHas('categories', function($query){
        //      $query->where('slug', $this->category);
        //  });
        $query->withCategory($this->category);
     })
     ->when($this->popular, function($query){
        $query->popular();
     })
     ->where('title','like',"%{$this->search}%")
     ->orderBy('published_at', $this->sort);
    $paginated = $query->paginate(3);
    info('Posts on current page: ' . $paginated->count());
    return $paginated;
    }
    #[Computed()]
    public function activeCategory(){
        if($this->category == null || $this->category == ''){
            return false;
        }
        return Category::where('slug', $this->category)->first();
    }
public function togglePopular()
{
    $this->popular = !$this->popular;
    info('Toggle popular called: ' . $this->popular);
    $this->resetPage();
    // unset($this->posts);
    $this->redirectRoute('posts.index', ['sort' => $this->sort, 'search' => $this->search, 'category' => $this->category, 'popular' => $this->popular], navigate: true);
}
public function updatedPopular($value){
    $this->popular = $value;
    $this->resetPage();
    Cache::forget('livewire:posts:' . $this->getId());
    unset($this->posts);
    $this->dispatch('refresh-component');
    // $this->resetPage();
    $this->redirectRoute('posts.index',['sort' => $this->sort, 'search' => $this->search, 'category' => $this->category, 'popular' => $this->popular], navigate: true);
}
    public function render()
    {
     
    

        return view('livewire.post-list');
     
    }
}

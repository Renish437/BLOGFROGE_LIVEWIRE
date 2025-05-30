<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

use function Laravel\Prompts\search;

class SearchBox extends Component
{
  
   public $search="";
    public function updatedSearch(){
        $this->dispatch('search', search: $this->search);
    }
    public function update(){
          $this->dispatch('search', search: $this->search);
    }
    public function render()
    {
        return view('livewire.search-box');
    }
}

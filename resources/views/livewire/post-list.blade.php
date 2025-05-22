    <div wire:refresh-component="$refresh"   class=" px-3 lg:px-4 py-6 dark:bg-gray-800">
                    <div class="flex justify-between items-center border-b py-3 border-gray-100">
                        <div class="text-gray-600 dark:text-gray-300">
                            @if($this->activeCategory || $search)
       
                            <button class="text-gray-600 dark:text-gray-300 mr-3" wire:click="clearFilters()">X</button>
                            @endif
                            @if(!$search)
                              
                         
                             @if(!$search && !$this->activeCategory)
                                 All Posts  
                             
                                
                             @endif
                            @endif
                            @if($this->activeCategory)
                              <x-badge wire:navigate href="{{ route('posts.index',['category' => $this->activeCategory->slug]) }}"  textColor="{{ $this->activeCategory->text_color }}" bgColor="{{ $this->activeCategory->background_color }}" >
                        {{ $this->activeCategory->title }}
                       </x-badge>
                        @endif
                        @if($search)
                     
                              
                       
                        <span> Containing</span> <span class="text-gray-900 dark:text-gray-300">{{ $search }}</span>
                       
                     
                            
                        @endif
                                       @if($this->activeCategory || $search)
                                <div class="dot-spinner pt-2" wire:loading.delay  >
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
    <div class="dot-spinner__dot"></div>
</div>
@endif

                        </div>
                        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                            {{-- <x-checkbox wire:model.live="popular"  label="popular"/> --}}
                            <input  type="checkbox" name="popular" class="rounded border-gray-300 cursor-pointer text-purple-600  shadow-sm focus:ring-purple-500" wire:change="togglePopular()" {{ $this->popular ? 'checked' : '' }}  id="checkbox-here">
                            <x-label>Popular</x-label>
                            
                            <button class="{{ $sort === 'desc' ? 'text-gray-900 dark:text-gray-300 border-b' : 'text-gray-500 ' }} py-1 dark:text-gray-300 border-gray-800 dark:border-gray-100" wire:click="setSort('desc')">Latest</button>
                            <button class="{{ $sort === 'asc' ? 'text-gray-900 dark:text-gray-300 border-b' : 'text-gray-500 ' }} py-1  dark:text-gray-300 border-gray-800 dark:border-gray-100" wire:click="setSort('asc')">Oldest</button>
                        </div>
                    </div>
                    <div class="py-4">
                     @foreach ($this->posts as $post)
                         <x-posts.post-item wire:key="post-{{ $post->id }}"  :post="$post"/>
                     @endforeach
                    </div>
                    <div class="py-4">
                    
                        {{ $this->posts->onEachSide(1)->links() }}
                    </div>
                </div>

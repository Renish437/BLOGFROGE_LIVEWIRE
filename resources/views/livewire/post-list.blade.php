    <div  class=" px-3 lg:px-7 py-6 dark:bg-gray-800">
                    <div class="flex justify-between items-center border-b py-3 border-gray-100">
                        <div class="text-gray-600 dark:text-gray-300">
                            @if($search)
                                Searching for: <span class="text-gray-700 dark:text-gray-300">{{ $search }}</span>
                           @else 
                              All Posts  
                            @endif
                        </div>
                        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                            <button class="{{ $sort === 'desc' ? 'text-gray-900 dark:text-gray-300 border-b' : 'text-gray-500 ' }} py-1 dark:text-gray-300 border-gray-800 dark:border-gray-100" wire:click="setSort('desc')">Latest</button>
                            <button class="{{ $sort === 'asc' ? 'text-gray-900 dark:text-gray-300 border-b' : 'text-gray-500 ' }} py-1  dark:text-gray-300 border-gray-800 dark:border-gray-100" wire:click="setSort('asc')">Oldest</button>
                        </div>
                    </div>
                    <div class="py-4">
                     @foreach ($this->posts as $post)
                         <x-posts.post-item :post="$post"/>
                     @endforeach
                    </div>
                    <div class="py-4">
                        {{ $this->posts->onEachSide(1)->links() }}
                    </div>
                </div>

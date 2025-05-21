       @props(['post'])
       <div >
                            <a wire:navigate  href="{{ route('posts.show', $post) }}">
                                <div class="w-full h-52">
                                    <img class="w-full h-full object-cover rounded-xl"
                                        src="{{ $post->getThumbnailImage() }}" alt="">
                                </div>  
                            </a>
                            <div class="mt-3">
                                <div class="flex items-center mb-2 gap-x-2">
                                  @if($category = $post->categories()->first())
                                        <x-posts.category-badge :category="$category" />
                                 
                                    
                                  @endif
                                    <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
                                </div>
                                <a wire:navigate  href="{{ route('posts.show', $post) }}" class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ Str::limit($post->title, 50) }} #34</a>
                            </div>

                        </div>
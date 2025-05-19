       @props(['post'])
       <div >
                            <a href="#">
                                <div>
                                    <img class="w-full rounded-xl"
                                        src="{{ $post->getThumbnailImage() }}" alt="">
                                </div>  
                            </a>
                            <div class="mt-3">
                                <div class="flex items-center mb-2 gap-x-2">
                                  @if($category = $post->categories()->first())
                                      <x-badge wire:navigate href="{{ route('posts.index',['category' => $category->slug]) }}"  textColor="{{ $category->text_color }}" bgColor="{{ $category->background_color }}" >
                        {{ $category->title }}
                       </x-badge>
                                 
                                    
                                  @endif
                                    <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
                                </div>
                                <a href="#" class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ $post->title }} #34</a>
                            </div>

                        </div>
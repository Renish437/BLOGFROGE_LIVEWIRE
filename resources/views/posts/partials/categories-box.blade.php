 <div id="recommended-topics-box gap-3">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 gap-3 mb-3">Recommended Topics</h3>
                  <div class="flex gap-2">
                      @foreach ($categories as $category)
                        
                    <div class="topics flex flex-wrap justify-start">
                       <x-badge wire:navigate href="{{ route('posts.index',['category' => $category->slug]) }}"  textColor="{{ $category->text_color }}" bgColor="{{ $category->background_color }}" >
                        {{ $category->title }}
                       </x-badge>
                    </div>
                    @endforeach
                  </div>
                </div>
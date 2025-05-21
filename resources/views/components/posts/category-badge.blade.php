                     @props(['category'])  
                       <x-badge wire:navigate href="{{ route('posts.index',['category' => $category->slug]) }}" textColor="{{ $category->text_color }}" bgColor="{{ $category->background_color }}" >
                                                    {{ $category->title }}
                                                </x-badge>
                                                
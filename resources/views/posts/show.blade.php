<x-app-layout  :title="$post->title" >




   
   <div class="max-w-7xl mx-auto grid grid-cols-1 p-2 md:grid-cols-5 gap-10">
    
        <article class="col-span-1 md:col-span-3 mt-10 order-2 md:order-1 py-5 w-full dark:text-gray-100" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailImage() }}" alt="{{ $post->title }}">
            <h1 class="text-4xl font-bold text-left text-gray-800 dark:text-gray-100">
                {{ $post->title }}
            </h1>
            <div class="mt-2 flex justify-between items-center">
                <div class="flex py-5 text-base items-center">
                     <x-posts.author  :author="$post->author" size="lg"  />
                    <span class="text-gray-500 dark:text-gray-100 text-sm">| {{ $post->getReadingTime() }} min read</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500 dark:text-gray-100 mr-2">{{ $post->published_at->diffForHumans() }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                        stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div
                class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
                <div class="flex items-center gap-4">
                   <livewire:like-button :post="$post" :key="'like-button-' . $post->id" />
                     @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" :key="$category->id.now()" />
                                            @endforeach
                </div>
                 
                <div>
                    <div class="flex items-center">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 text-gray-500 dark:text-gray-100 dark:hover:text-gray-200 hover:text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </button>

                    </div>
                </div>
            </div>

            <div class="article-content prose py-3 text-gray-800 dark:text-gray-100 text-medium md:text-lg tracking-tight text-justify">
                {!! $post->body !!}
            </div>

           

       


        </article>
         <div class="col-span-1 order-2 md:order-2 md:col-span-2  w-full">
                     <livewire:post-comments :post="$post" :key="'comments-'.$post->id.now()" />
         </div>
   </div>

       


    

</x-app-layout>
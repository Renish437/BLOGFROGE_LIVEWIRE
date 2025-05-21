<x-app-layout >

 <div class="max-w-7xl mx-auto  grid grid-cols-7 gap-7">
            <div class="md:col-span-5 col-span-5">
            <livewire:post-list />
            </div>
            <div id="side-bar"
                class=" md:border-t-none dark:bg-gray-800 col-span-5 md:col-span-2   space-y-10 py-6 pt-10 md:border-l border-gray-100 h-screen sticky top-0">
              <livewire:search-box />

              
                 @include('posts.partials.categories-box')
             
            </div>
        </div>
   



</x-app-layout  >
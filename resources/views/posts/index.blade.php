<x-app-layout title="Blog Page">

 <div class="max-w-7xl mx-auto  grid grid-cols-1 md:grid-cols-4 gap-7">
            <div class="md:col-span-3 order-2 md:order-1">
            <livewire:post-list />
            </div>
            <div id="side-bar"
                class=" md:border-t-none order-1 md:order-2 dark:bg-gray-800  md:col-span-1  px-4  space-y-10 py-6 pt-10 md:border-l border-gray-100 h-1/2 md:h-screen md:sticky top-0">
              <livewire:search-box />

              
                 @include('posts.partials.categories-box')
             
            </div>
        </div>
   



</x-app-layout  >
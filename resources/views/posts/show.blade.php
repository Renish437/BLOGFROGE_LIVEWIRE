<x-app-layout  >

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{-- <livewire:post-show :post="$post" /> --}}
        <div class="bg-white dark:bg-gray-700 text-black dark:text-white">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $post->title }}</h1>
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
            <div class="mt-4">
                {!! $post->body !!}
            </div>
            

        </div>
    </div>
</x-app-layout>
<x-app-layout title="Home Page">



   


 @section('hero')
    <div class="w-full text-center py-32  dark:bg-gray-700">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700 dark:text-gray-900">
            {{ __('myhome.hero.title') }} <span class="text-purple-700 ">BLOGFORGE</span> <span class="text-gray-900"> News</span>
        </h1>
        <p class="text-gray-500 text-lg mt-1">{{ __('myhome.hero.desc') }}</p>
        <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
            href="http://127.0.0.1:8000/blog">{{ __('myhome.hero.cta') }}</a>
    </div>
 @endsection

  
        <div class="mb-10 dark:bg-gray-800  px-7 ">
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl text-purple-600 dark:text-gray-300 font-bold">{{ __('myhome.featured_posts') }}</h2>
                <div class="w-full">
                    <div class="grid grid-cols-3 gap-10 w-full">
                     @foreach ($featuredPosts as $post)
                     <div class="md:col-span-1 col-span-3">
                        <x-posts.post-card :post="$post" />
                     </div>
                     @endforeach
                     
                    </div>
                </div>
                <a class="mt-10 block text-center text-lg text-purple-600 dark:text-gray-300 font-semibold"
                    href="{{ route('posts.index') }}">{{ __('myhome.more_posts') }}</a>
            </div>
            <hr>

            <h2 class="mt-16 mb-5 text-3xl text-purple-600 dark:text-gray-300 font-bold">{{ __('myhome.latest_posts') }}</h2>
            <div class="w-full mb-5">
                <div class="grid grid-cols-3 gap-10 gap-y-32 w-full">
                   @foreach ($latestPosts as $post)
                     <div class="md:col-span-1 col-span-3">
                        <x-posts.post-card :post="$post" />
                     </div>
                     @endforeach
                
                 
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-purple-600 dark:text-gray-300 font-semibold"
                href="{{ route('posts.index') }}">{{ __('myhome.more_posts') }}</a>
        </div>
  


</x-app-layout>
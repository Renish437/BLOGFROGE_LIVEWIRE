<nav class="flex items-center justify-between shadow-xl sticky top-0 z-50 px-2 py-3 md:px-6 md:py-4 bg-white dark:bg-[#2e3745]">
    <!-- Left Section: Logo -->
    <div id="header-left" class="flex items-center">
        <div class="text-gray-800 font-bold">
            <a wire:navigate href="{{ route('home') }}" class="flex items-center">
                <x-application-logo class="w-10 h-10 md:w-12 md:h-12"/>
            </a>
        </div>
    </div>

    <!-- Center Section: Menu Links (Hidden on mobile, shown on larger screens) -->
    <div class="top-menu hidden md:flex md:items-center md:space-x-6">
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-gray-700 dark:text-gray-200 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">
            {{ __('Home') }}
        </x-nav-link>
        <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')" class="text-gray-700 dark:text-gray-200 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">
            {{ __('Blog') }}
        </x-nav-link>
    </div>

    <!-- Right Section: Dark Mode Toggle and Auth/Guest Links -->
    <div id="header-right" class="flex items-center space-x-4">
        <!-- Dark Mode Toggle -->
       <!-- From Uiverse.io by satyamchaudharydev --> 
<button  class="focus:outline-none">
  <label class="switch">
    <input type="checkbox"  :checked="localStorage.getItem('dark') === 'true'"
    @change="toggleDarkMode($event.target.checked)">
    <span class="slider"></span>
  </label>
</button>

        <!-- User Authentication Links -->
        @guest
            @include('layouts.partials.header-right-guest')
        @endguest
        @auth
            @include('layouts.partials.header-right-auth')
        @endauth

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6 text-gray-800 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (Hidden by default, toggled on mobile) -->
    <div id="mobile-menu" class="hidden md:hidden flex-col items-center justify-center bg-white dark:bg-[#2e3745] w-full absolute top-full left-0 shadow-xl">
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class=" w-full text-center py-3 px-12 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            {{ __('Home') }}
        </x-nav-link>
        <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')" class=" w-full text-center py-3 px-12 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            {{ __('Blog') }}
        </x-nav-link>
    </div>
    
<script>
    // JavaScript for mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', () => {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>

<style>
    /* Custom styles for dark mode toggle slider */
    .switch .slider {
        transition: background-color 0.3s;
    }
    .switch .slider:before {
        transition: transform 0.3s;
    }
</style>
</nav>

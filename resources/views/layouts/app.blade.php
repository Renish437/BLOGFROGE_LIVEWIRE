<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
  {{-- x-data="{isDarkMode: localStorage.getItem('dark')==='true'}"
  x-init="$watch('isDarkMode',val=>localStorage.setItem('dark',val))"
   x-bind:class="{'dark': isDarkMode}" --}}
   
    >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script>
    // Immediately apply dark mode on page load (even before Alpine/Livewire)
    if (localStorage.getItem('dark') === 'true') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Expose a global toggle function for your toggle switch
    window.toggleDarkMode = function (val) {
        localStorage.setItem('dark', val);
        document.documentElement.classList.toggle('dark', val);
    };
</script>

    </head>
    <body class="antialiased"  >
        <x-banner />

 
  
      @include('layouts.partials.header')

      @yield('hero')
    <main class="container mx-auto px-2 dark:px-0 flex flex-grow bg-gray-100 dark:bg-gray-800">
      
            {{ $slot }}
      
    </main>

   
      @include('layouts.partials.footer')

        @stack('modals')

        @livewireScripts
    </body>
</html>

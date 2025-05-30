@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ isset($title) ? $title . ' | ' : ''}} {{ config('app.name', '') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Styles -->
       
       


    </head>
    <body class="antialiased max-w-9xl  dark:bg-gray-800 bg-gray-50"  >
       @livewireStyles
        <x-banner />

 
  
      @include('layouts.partials.header')

      @yield('hero')
    <main class="container mx-auto  dark:bg-gray-800  flex  ">
      
            {{ $slot }}
      
    </main>

   
      @include('layouts.partials.footer')

        @stack('modals')

        @livewireScripts
    </body>
</html>

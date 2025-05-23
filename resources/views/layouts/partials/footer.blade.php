 <footer class="text-sm space-x-4 flex items-center border-t mx-auto max-w-7xl border-gray-100 dark:bg-gray-900 flex-wrap justify-between py-4 ">
<div>
            <a class="text-gray-500 hover:text-violet-500 dark:text-gray-100" href="#">{{ __('menu.home') }}</a>
        <a class="text-gray-500 hover:text-violet-500 dark:text-gray-100 " href="#">{{ __('menu.blog') }}</a>
        <a class="text-gray-500 hover:text-violet-500 dark:text-gray-100 " href="#">{{ __('menu.profile') }}</a>
</div>
<div class="flex space-x-4">
    @foreach (Config::get('app.supported_locales') as $locale => $data)
   <a href="{{ route('locale', $locale) }}">
     <x-dynamic-component :component="'flag-country-'.$data['icon']" class="w-6 h-6 "/>
   </a>
        {{-- <x-flag-country-$data['icon'] class="w-6 h-6 "/> --}}
    @endforeach
   {{-- <a href="{{ route('locale','en') }}">   <x-flag-country-us class="w-6 h-6 "/></a>
    <a href="{{ route('locale','np') }}">   <x-flag-country-np class="w-6 h-6"/></a> --}}
</div>
<p>Current Locale: {{ app()->getLocale() }}</p>
<p>Session Locale: {{ Session::get('locale') }}</p>
    </footer>
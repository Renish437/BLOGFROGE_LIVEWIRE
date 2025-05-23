@props(['active','navigate'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1  text-purple-600 hover:text-purple-700  text-md font-bold leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-gray-400  hover:text-purple-700 text-md font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $navigate ?? true ? 'wire:navigate' : ''}}  {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

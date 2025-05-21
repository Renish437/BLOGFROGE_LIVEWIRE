@props(['category', 'textColor', 'bgColor'])

@php
    $textColor = match($textColor) {
        'gray' => 'text-gray-100',
        'black' => 'text-black',
        'white' => 'text-white',
        'red' => 'text-red-600',
        'blue' => 'text-blue-600',
        'green' => 'text-green-600',
        default => 'text-gray-100'
    };
    $bgColor = match($bgColor) {
        'gray' => 'bg-gray-100',
        'black' => 'bg-black',
        'white' => 'bg-white',
        'red' => 'bg-red-500',
        'blue' => 'bg-blue-500',
        'green' => 'bg-green-500',
        default => 'bg-purple-500'
    };
@endphp

<button {{ $attributes }}  class="{{ $textColor }} {{ $bgColor }} rounded-xl px-3 py-1 mx-[1px] text-base">
    {{ $slot }}
</button>
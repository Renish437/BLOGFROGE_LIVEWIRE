@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:text-gray-200 dark:bg-gray-500 dark:border-gray-600 focus:ring-violet-500 focus:border-violet-500  focus:ring-violet-500 rounded-md shadow-sm']) !!}>

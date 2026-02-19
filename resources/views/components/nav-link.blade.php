@props(['active'])

@php
$classes = ($active ?? false) ? 'inline-flex items-center px-1 pt-1 border-b-2 border-lime-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-lime-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-lime-700 hover:border-lime-500 focus:outline-none focus:text-lime-700 focus:border-lime-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

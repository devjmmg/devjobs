@php
    $classes = "text-sm text-gray-600 hover:text-lime-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
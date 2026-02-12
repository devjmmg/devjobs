@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm list-none']) }}>
        @foreach ((array) $messages as $message)
            <li class="bg-red-100 text-red-500 p-2 border-l-4 border-red-500 font-semibold">{{ $message }}</li>
        @endforeach
    </ul>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))
                <div class="text-sm bg-green-100 text-green-500 p-2 border-l-4 border-green-500 font-semibold my-5">
                    {{session('message')}}
                </div>
            @endif

            <livewire:show-vacant />
            
        </div>
    </div>
</x-app-layout>
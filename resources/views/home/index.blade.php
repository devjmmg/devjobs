<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        @livewireStyles
    </head>
    <body>
        <x-app-layout>
            <div class="py-16 bg-gray-50 overflow-hidden lg:py-24">
                <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                    <div class="relative">
                        <h2 class="text-center text-4xl leading-8 font-extrabold tracking-tight text-lime-600 sm:text-6xl">Encuentra un trabajo en Tech de forma remota</h2>
                        <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">Encuentra el trabajo de tus sueños en una empresa internacional; tenemos vacantes para front end developer, backend, devops, mobile y mucho más!</p>
                    </div>
                </div>
            </div>

            <livewire:home-vacants />

        </x-app-layout>
        @livewireScripts
    </body>
</html>
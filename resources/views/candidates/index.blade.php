<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos: ' . $vacant->title) }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @forelse ($vacant->candidates as $c)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 border-b border-gray-300 md:flex md:justify-between md:items-center">
                        
                        <div class="space-y-2">
                            <p class="font-bold text-lg">{{$c->user->name}}</p>
                            <p class="font-semibold text-gray-600 text-base">{{$c->user->email}}</p>
                            <p class="font-semibold text-gray-600 text-base">Hace {{$c->created_at->diffForHumans()}}</p>
                        </div>
                        
                        <div class="flex justify-center items-center gap-2 mt-5 md:mt-0">
                            <a href="{{ asset('storage/cv/'.$c->cv) }}"
                                target="_blank"
                                rel="noreferrer noopener"
                                class="text-sm bg-lime-500 hover:bg-lime-600 transition p-3 rounded text-white">
                                Ver CV
                            </a>
                        </div>
                        
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-600 text-center p-4 font-semibold">
                    Aún no hay candidatos.
                </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
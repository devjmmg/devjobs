<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))
                <div class="text-sm bg-green-100 text-green-500 p-2 border-l-4 border-green-500 font-semibold my-5">
                    {{session('message')}}
                </div>
            @endif

             <div>
                @forelse ($notifications as $n)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="p-6 text-gray-900 border-b border-gray-300 md:flex md:justify-between md:items-center">
                            <div class="space-y-2">
                                <p class="font-bold text-lg"> {{$n->data['title']}}</p>
                                <p class="font-semibold text-gray-600 text-base">Hace {{$n->created_at->diffForHumans()}}</p>
                                
                            </div>
                            
                            <div class="flex justify-center items-center gap-2 mt-5 md:mt-0">
                                <button class="text-sm bg-lime-500 hover:bg-lime-600 transition-colors ease-linear duration-300 p-3 rounded text-white">Ver candidatos</button>
                            </div>
                        </div>
                    </div>
                @empty
                <p class="text-sm text-gray-600 text-center p-4 font-semibold">Aún no hay notificaciones nuevas.</p>
                @endforelse

                {{-- <div class="mt-5">
                    {{ $notifications->links() }}
                </div> --}}
            </div>
            
        </div>
    </div>
</x-app-layout>
<div class="bg-gray-100 p-3">
    
    <livewire:filter-vacants />

     <div class="max-w-7xl mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-3">Nuestras vacantes</h2>

        @forelse ($vacants as $vacant)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 border-b border-gray-300 md:flex md:justify-between md:items-center">
                    <div class="space-y-2">
                        <a href="{{route('vacants.show', $vacant)}}" class="font-bold text-lg">
                            <h2>{{$vacant->title}}</h2>
                        </a>
                        <p class="font-semibold text-gray-600 text-base">{{$vacant->enterprise}}</p>
                        <p class="font-semibold text-gray-600 text-base">{{$vacant->salary->salary}}</p>
                        <p class="font-semibold text-gray-600 text-base">{{$vacant->category->category}}</p>
                        <p class="text-base">Último día para postularse: <span class="font-semibold">{{$vacant->last_day->format('d-m-Y')}}</span></p>
                    </div>
                    
                    <div class="flex justify-center items-center gap-2 mt-5 md:mt-0">
                        <a href="{{route('vacants.show', $vacant)}}" class="text-sm bg-lime-500 hover:bg-lime-600 transition-colors ease-linear duration-300 p-3 rounded text-white">Ver vacante</a>
                    </div>
                </div>
            </div>
        @empty
        <p class="text-sm text-gray-600 text-center p-4 font-semibold">No hay vacantes...</p>
        @endforelse

        <div class="mt-5">
            {{ $vacants->links() }}
        </div>
    </div>
</div>
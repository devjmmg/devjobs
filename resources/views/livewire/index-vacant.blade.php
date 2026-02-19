 <div>
    @forelse ($vacants as $v)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <div class="p-6 text-gray-900 border-b border-gray-300 md:flex md:justify-between md:items-center">
                <div class="space-y-2">
                    <a href="{{route('vacants.show', $v)}}" class="font-bold text-lg">
                        <h2>{{$v->title}}</h2>
                    </a>
                    <p class="font-semibold text-gray-600 text-base">{{$v->enterprise}}</p>
                    <p class="text-base">Último día para postularse: <span class="font-semibold">{{$v->last_day->format('d-m-Y')}}</span></p>
                    <p class="{{ $v->published ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-500'}} inline-block font-bold p-2 rounded-full">{{$v->published ? 'Active' : 'Inactive'}}</p>
                </div>
                
                <div class="flex justify-center items-center gap-2 mt-5 md:mt-0">
                    <a href="{{route('candidates.index', $v)}}" class="text-sm bg-lime-500 hover:bg-lime-600 transition-colors ease-linear duration-300 p-3 rounded text-white">{{$v->candidates->count()}} Candidatos</a>
                    <a href="{{route('vacants.edit', $v)}}" class="text-sm bg-blue-500 hover:bg-blue-600 transition-colors ease-linear duration-300 p-3 rounded text-white">Editar</a>
                    <button wire:click="$dispatch('showAlert' , {{ $v->id }})" class="text-sm bg-red-500 hover:bg-red-600 transition-colors ease-linear duration-300 p-3 rounded text-white">Eliminar</button>
                </div>
            </div>
        </div>
    @empty
    <p class="text-sm text-gray-600 text-center p-4 font-semibold">Aún no hay vacantes publicadas...</p>
    @endforelse

    <div class="mt-5">
        {{ $vacants->links() }}
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showAlert', id => {
            Swal.fire({
                title: "¿Eliminar vacante?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteVacant', {vacant:id});
                    Swal.fire({
                        title: "¡Vacante eliminada!",
                        text: "La vacante ha sido eliminada permanentemente.",
                        icon: "success"
                    });
                }
            });
        });
    });
</script>
@endpush
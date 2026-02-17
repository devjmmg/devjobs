<div class="flex flex-col items-center justify-center bg-gray-100 rounded py-5">
    
    <h3 class="text-2xl font-semibold my-5">Postularme a esta vacante</h3>

    @if (session()->has('message') || $hasApplied)
        <div class="text-sm bg-green-100 text-green-500 p-2 border-l-4 border-green-500 font-semibold my-5">
            @if(session()->has('message'))
                {{ session('message') }}
            @else
                Ya te has postulado a esta vacante.
            @endif
        </div>
    @else
        <form class="flex flex-col justify-center w-96" wire:submit.prevent="applyVacant">
            <x-input-label for="cv" :value="__('Curriculum Vitae (pdf)')" />
            <x-text-input
                id="cv"
                class="block mt-1 w-full rounded-none"
                type="file"
                wire:model="cv"
                accept=".pdf" />
            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            <x-primary-button class="justify-center mt-5">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>

    @endif
</div>

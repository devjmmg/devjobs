<div>
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar y Filtrar Vacantes</h2>
    <div class="max-w-7xl mx-auto">
        <form method="POST" wire:submit.prevent="readDataForm">
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <x-input-label for="title" :value="__('Término de Búsqueda')" />
                    <x-text-input
                        id="title"
                        class="block mt-1 w-full"
                        type="text"
                        placeholder="Buscar por Término: ej. Laravel"
                        wire:model="title" />
                </div>

                <div class="mb-5">
                    <x-input-label for="category_id" :value="__('Categoría')" />
                    <select id="category_id" wire:model="category_id" class="rounded-md shadow-sm border-gray-300 focus:border-lime-300 focus:ring focus:ring-lime-200 focus:ring-opacity-50 w-full">
                        <option value="">--- Seleccionar ---</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <x-input-label for="salary_id" :value="__('Salario Mensual')" />
                    <select id="salary_id" wire:model="salary_id" class="rounded-md shadow-sm border-gray-300 focus:border-lime-300 focus:ring focus:ring-lime-200 focus:ring-opacity-50 w-full">
                        <option value="">--- Seleccionar ---</option>
                        @foreach ($salaries as $s)
                            <option value="{{ $s->id }}">{{$s->salary}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <x-primary-button>
                    {{ __('Buscar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

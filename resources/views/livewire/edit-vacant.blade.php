<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="editVacant">

    <div>
        <x-input-label for="published" :value="__('Publicar')" />
        <select wire:model="published" class="block mt-1 w-full border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-md shadow-sm">
            <option value="">--- Seleccionar opción ---</option>
            <option value="1">Publicada</option>
            <option value="0">No publicada</option>
        </select>
        <x-input-error :messages="$errors->get('published')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="title" :value="__('Título vacante')" />
        <x-text-input
            id="title"
            class="block mt-1 w-full"
            type="text"
            wire:model="title"
            name="title"
            placeholder="Título vacante"
            autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salary_id" :value="__('Salario mensual')" />
        <select wire:model="salary_id" id="salary_id" class="block mt-1 w-full border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-md shadow-sm">
            <option value="" selected>--- Seleccionar salario ---</option>
            @foreach ($salaries as $s)
                <option value="{{$s->id}}">{{$s->salary}}</option>                
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salary_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="category_id" :value="__('Categoría')" />
        <select wire:model="category_id" id="category_id" class="block mt-1 w-full border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-md shadow-sm">
            <option value="" selected>--- Seleccionar categoría ---</option>
            @foreach ($categories as $c)
                <option value="{{$c->id}}">{{$c->category}}</option>                
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="enterprise" :value="__('Empresa')" />
        <x-text-input
            id="enterprise"
            class="block mt-1 w-full"
            type="text"
            wire:model="enterprise"
            placeholder="Empresa: ej. Netflix, Uber, Shopify"
            autocomplete="enterprise" />
        <x-input-error :messages="$errors->get('enterprise')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Último día para postularse')" />
        <x-text-input
            id="last_day"
            class="block mt-1 w-full"
            type="date"
            wire:model="last_day" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Título vacante')" />
        <textarea
            wire:model="description"
            id="description"
            class="block mt-1 w-full border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-md shadow-sm"
            cols="30"
            rows="10"
            placeholder="Descripción general del puesto, experiencía"
        ></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input
            id="image"
            class="block mt-1 w-full rounded-none"
            type="file"
            wire:model="image"
            accept="image/*" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <div class="w-80 mx-auto">
        @if ($image && str_starts_with($image->getMimeType(), 'image/'))
            <img src="{{ $image->temporaryUrl() }}" alt="Imagen vacante {{ $title }}">
        @elseif ($image_current)
            <img src="{{ asset('storage/vacants/' . $image_current) }}" alt="Imagen vacante {{ $title }}">
        @endif
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Guardar') }}
    </x-primary-button>

</form>
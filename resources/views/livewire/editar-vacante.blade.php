<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante' novalidate>
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')" />

        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            autofocus 
            autocomplete="titulo" 
            placeholder="Titulo vacante"
        />

        @error('titulo')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select 
            wire:model="salario" 
            id="salario" 
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />

        <select 
            wire:model="categoria" 
            id="categoria" 
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            autofocus 
            autocomplete="empresa" 
            placeholder="Empresa: Ej. Netflix, Uber, Shopify"
        />
        @error('empresa')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />

        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
            autofocus 
            autocomplete="ultimo_dia" 
        />
        @error('ultimo_dia')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion_puesto" :value="__('Descripción')" />

        <textarea 
            wire:model="descripcion_puesto" 
            id="descripcion_puesto" 
            cols="30" 
            rows="10"
            placeholder="Derscripción general del puesto"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
            @error('descripcion_puesto')
                @livewire('mostrar-alerta', ['message' => $message])
            @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input
            wire:model="imagen_nueva" 
            id="imagen" 
            type="file"
            class="block mt-1 w-full" 
            accept="image/*"
        />

        <div class="flex flex-col justify-center  items-center my-5 w-100 ">
            <x-input-label for="imagen" :value="__('Imagen actual: ')" />
            
            <img src="{{ asset('storage/vacantes/'.$imagen) }}" alt="{{ 'Imagen vacante' . $titulo }}" class="w-80">
        </div>

        
        <div class="flex flex-col justify-center  items-center my-5 w-100 ">
            @if ($imagen_nueva)
                <x-input-label for="imagen" :value="__('Imagen nueva: ')" />

                <img 
                    class="w-80"
                    src="{{$imagen_nueva->temporaryUrl()}}" 
                    alt="Imagen subida oferta laboral"
                >

            @endif
        </div>

        @error('imagen_nueva')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Guardar cambios') }}
    </x-primary-button>
</form>
<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @session("mensaje")
        


    @endsession

    @if (session('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5">
           {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Currículum o Hoja de vida')" />
                <x-text-input  id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
            </div>

            @error('cv')
                @livewire('mostrar-alerta', ['message' => $message])
            @enderror

            <x-primary-button class="w-full justify-center mt-3">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif

    
</div>

<div class="p-6 bg-white border-b border-gray-200">
    <form wire:submit.prevent="save" method="POST">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre') }}</label>
            <input type="text" name="name" id="name" wire:model="city.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            @error('city.name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <a role="button" wire:click.prevent="delete('{{ $city->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</a>
            <a href="{{ route('admin.cities.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">{{ __('Cancelar') }}</a>
            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded ml-2">{{ $buttonText }}</button>
        </div>
    </form>
</div>
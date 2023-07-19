<div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <x-label for="department_id" value="Estado" />
            <select id="department_id" name="department_id" :value="old('department_id')" wire:model="department_id" required autofocus autocomplete="false" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="size 3 select">
                <option value="">-- Seleccionar --</option>
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <x-label for="city_id" value="Ciudad" />
            <select id="city_id" name="city_id" value="{{ old('city_id')}}" wire:model="city_id" required autofocus class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="size 3 select">
                <option value="" class="selector">-- Seleccionar --</option>
                @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            @error('city_id') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
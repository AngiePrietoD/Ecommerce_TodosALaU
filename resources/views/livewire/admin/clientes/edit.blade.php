<div>
    <x-slot name="header">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            {{ __($user->id? 'Editar cliente #'.$user->id : 'Agregar nuevo cliente') }}
   
    </x-slot>
    <div class="mt-2 sm:mt-4 sm:py-6 mx-auto bg-white lg:container">
        <x-validation-errors class="mb-4" />
        <form wire:submit.prevent="save" method="POST">
            @csrf
            <div class="p-2 sm:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4">
                    <div>
                        <x-label for="name" value="Nombre" />
                        <x-input id="name" class="block mt-1 w-full" wire:model="user.name" type="text" name="name" :value="old('name')"  autofocus autocomplete="firstname" />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-label for="lastname" value="Apellido" />
                        <x-input id="lastname" class="block mt-1 w-full" wire:model="user.lastname" type="text" name="lastname" :value="old('lastname')"  autofocus />
                        @error('lastname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <x-label for="address" value="Dirección" />
                        <x-textarea id="address" class="block  resize-none mt-1 w-full" wire:model="user.address" type="text" name="address" :value="old('address')" required autofocus />
                        @error('address') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-label for="department_id" value="Estado" />
                        <select id="department_id" name="department_id" :value="old('department_id')" wire:model="department_id" required autofocus autocomplete="false" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="size 3 select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($departments as $department)
                            <option value="{{ $department['id'] }}">{{ $department['name'] }}</option>
                            @endforeach
                        </select>
                        @error('department_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-label for="city_id" value="Ciudad" />
                        <select id="city_id" name="city_id" :value="old('city_id')" wire:model="user.city_id" required autofocus class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="size 3 select">
                            <option value="" class="selector">-- Seleccionar --</option>
                            @foreach($cities as $city)
                            <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                            @endforeach
                        </select>
                        @error('city_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-label for="email" value="Correo electrónico" />
                        <x-input id="email" class="block mt-1 w-full" wire:model="user.email" type="email" name="email" :value="old('email')" required />
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-label for="phone" value="Teléfono" />
                        <x-input id="phone" class="block mt-1 w-full" wire:model="user.phone" type="text" name="phone" :value="old('phone')" required autofocus />
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ $user->id? 'Actualizar' : 'Guardar' }}
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
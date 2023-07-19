<div>
    <x-slot name="header">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
            </svg>
            Registrar paquete</span>
    </x-slot>
    <x-validation-errors class="mb-4" />
    <div class="py-2 sm:py-6 sm:container mx-auto">
        <div class="sm:p-6 bg-white border-b border-gray-200">
            <form wire:submit.prevent="save" method="POST">
                <input id="user_id" wire:model="package.user_id" type="hidden" name="user_id" :value="old('user_id')" required>
                @csrf
                <div>
                    <div class="sm:flex">
                        <div class="p-2 sm:p-4 sm:w-1/3">
                            <div>
                                <x-label class="p-2" for="tracking" value="Cliente:" />
                                <div class="flex items-center">
                                    <div class="relative w-full">
                                        <input type="search" autocomplete="off" wire:model="search" id="default-search" class="block w-full p-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>
                                </div>
                                <div class="z-40 absolute px-10 w-96">
                                    @if($search && $search != $user->name . ' ' . $user->lastname )
                                    <table class="table-auto bg-white border w-full">
                                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                            <tr>
                                                <th class="border px-2 py-2 text-left">ID</th>
                                                <th class="border px-2 py-2 text-left">Cliente</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-sm divide-y divide-gray-100">
                                            @foreach($users as $user)
                                            <tr wire:click="setUser({{ $user->id }})" class="odd:bg-white even:bg-slate-50 hover:bg-sky-100" wire:key="user-{{$user->id}}">
                                                <td class="border px-2 py-1">{{ $user->id }}</td>
                                                <td class="border px-2 py-1">{{ $user->name }} {{ $user->lastname }}</ </tr>
                                                    @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <x-label class="p-2" for="tracking" value="Número de tracking:" />
                                <div class="flex items-center">
                                    <div class="relative w-full">
                                        <x-input id="tracking" placeholder="Número de tracking:" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="package.tracking" type="text" name="tracking" :value="old('tracking')" required autofocus />
                                    </div>
                                    <button type="submit" class="p-1 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <x-label class="p-2" for="shipper_id" value="{{ __('Shipper') }}" />
                                <select id="shipper_id" name="shipper_id" :value="old('shipper_id')" wire:model="package.shipper_id" required autofocus class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="size 3 select">
                                    <option value="" class="selector">-- Seleccionar --</option>
                                    @foreach($shippers as $shipper)
                                    <option value="{{ $shipper['id'] }}">
                                        {{ $shipper['name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label class="p-2" for="package_type_id" value="{{ __('Tipo de paquete') }}" />
                                <select id="package_type_id" name="package_type_id" :value="old('package_type_id')" wire:model="package.package_type_id" required autofocus class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" aria-label="size 3 select">
                                    <option value="" class="selector">-- Seleccionar --</option>
                                    @foreach($package_types as $type)
                                    <option value="{{ $type['id'] }}">
                                        {{ $type['name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <x-label class="p-2" for="fotos" value="{{ __('Fotos') }}" />
                                <input type="file" wire:model="fotos" accept="image/*;capture=camera" capture="environment" multiple>
                                <div wire:loading wire:target="fotos">Uploading...</div>
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>

                            <!--div>
                                <a class="button" id="startButton">Start</a>
                                <a class="button" id="resetButton">Reset</a>
                            </div>

                            <div>
                                <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
                            </div>

                            <div id="sourceSelectPanel" style="display:none">
                                <label for="sourceSelect">Change video source:</label>
                                <select id="sourceSelect" style="max-width:400px">
                                </select>
                            </div>
                            <div id="result"></div-->
                        </div>
                        <div class="p-2 sm:p-4 sm:w-2/3 sm:border-l-2">
                            <fieldset>
                                <div class="grid gap-1 grid-cols-2 sm:grid-cols-4 sm:gap-3">
                                    <div class="p-2 border">
                                        <x-label class="p-2 text-center" for="alto" value="Alto (pulgadas)" />
                                        <x-input id="alto" class="block mt-1 w-full text-center" wire:model="package.alto" type="number" name="alto" :value="old('alto')" required autofocus />
                                    </div>
                                    <div class="p-2 border">
                                        <x-label class="p-2 text-center" for="ancho" value="Ancho (pulgadas)" />
                                        <x-input id="ancho" class="block mt-1 w-full text-center" wire:model="package.ancho" type="number" name="ancho" :value="old('ancho')" required autofocus />
                                    </div>
                                    <div class="p-2 border">
                                        <x-label class="p-2 text-center" for="largo" value="Largo (pulgadas)" />
                                        <x-input id="largo" class="block mt-1 w-full text-center" wire:model="package.largo" type="number" name="largo" :value="old('largo')" required autofocus />
                                    </div>
                                    <div class="p-2 border">
                                        <x-label class="p-2 text-center" for="peso" value="Peso" />
                                        <x-input id="peso" class="block mt-1 w-full text-center" wire:model="package.peso" type="number" name="peso" :value="old('peso')" required autofocus />
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="my-4">
                                <legend class="my-4 font-semibold">Total de las medidas</legend>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-1 sm:gap-3">
                                    <div class="border">
                                        <x-label class="p-2 text-center" for="pies" value="Pies cúbicos" />
                                        <div class="block mt-1 w-full text-center font-semibold p-4">{{ number_format($pies, 2) }}</div>
                                    </div>
                                    <div class="border">
                                        <x-label class="p-2 text-center" for="lbs" value="Peso volumétrico" />
                                        <div class="block mt-1 w-full text-center font-semibold p-4">{{ number_format($volumen, 2) }} Libras</div>
                                    </div>
                                    <div class="border col-span-2 sm:col-span-1">
                                        <x-label class="p-2 text-center" for="peso" value="Total peso ({{$this->volumen > $package->peso ? 'Volumétrico': 'Neto'}})" />
                                        <div class="block mt-1 w-full text-center font-semibold p-4">{{ number_format($this->volumen > $package->peso? $this->volumen : $package->peso, 2 ) }} Libras</div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="my-4">
                                <div>
                                    <x-label class="p-2" for="notas" value="Notas" />
                                    <x-textarea id="notas" class="block  resize-none mt-1 w-full" rows="4" wire:model="package.notas" type="text" name="notas" :value="old('notas')" autofocus />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="border-t-2 flex items-center justify-end p-4">
                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                    <div class="grid grid-cols-5 gap-3">
                        @error('fotos.*') <span class="error">{{ $message }}</span> @enderror
                        @if ($fotos)
                        @foreach($fotos as $foto)
                        <div>
                            <img src="{{ $foto->temporaryUrl() }}">
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
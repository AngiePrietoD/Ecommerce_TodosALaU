<div>
    <x-slot name="header">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
        </svg>
        Preparados {{is_int($transport->id)? ' para enviar en transporte '.strtolower($transport->name): NULL }}
    </x-slot>

    <div class="bg-white mx-auto mt-2 p-2 sm:mt-4 sm:p-6 lg:container">
        @if(is_null($transport->id))
        <div class="py-3 sm:px-3 lg:px-8 lg:py-6 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3">
                @foreach($transports as $t)
                <a href="{{ route('admin.preparados.transporte', $t->id) }}" :active="request()->routeIs('admin.preparados.transporte', $t->id)" class="flex flex-col hover:shadow-lg hover:bg-sky-200 gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border rounded-xl dark:bg-slate-900 dark:border-gray-800">
                    <div class="inline-flex justify-center items-center">
                        <div class="flex items-center">
                            <img class="w-10 h-10 border-0 mr-2" src="/images/transport-{{ $t->id }}.svg">
                            <span class="text-2xl font-semibold uppercase text-gray-600 dark:text-gray-400">{{ $t->name }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-gray-200">
                            {{$t->packages()->whereNull('packages.dispatch_id')->count()}}
                        </h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @else
        <form wire:submit.prevent="prepareEnvio" method="POST">
            <div class="flex items-center mb-4">
                <div class="flex-auto mr-2">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" autocomplete="off" wire:model="search" id="default-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="flex-auto flex items-center">
                    <x-label class="p-2 hidden sm:inline-block whitespace-nowrap" for="code" value="Número de Guía:" />
                    <div class="w-full mr-3">
                        <x-input id="code" autocomplete="off" placeholder="Número de Guía:" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm w-full rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="dispatch.code" type="text" name="code" :value="old('code')" autofocus />
                        @error('dispatch.code') <span class="error text-danger-600">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex-none w-10 sm:w-36 items-center">
                    <button type="submit" class="flex rounded-md shadow bg-green-500 hover:bg-green-700 hover:text-white border-0 active:border-0 hover:border-0 text-white items-center justify-center w-full px-2 h-10">
                        <span class="hidden sm:inline-block">Crear envio</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="flex font-semibold text-xl text-gray-800 leading-tight">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                </svg>
                Paquetes ({{$packages->count()}})
            </h3>
            <table class="table-auto w-full mt-4 rounded-lg overflow-hidden">
                <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                    <tr>
                        <th class="border px-2 py-1 w-8">
                        </th>
                        <th class="px-2 py-2 text-center w-10">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('id')">
                                ID
                                @if($sortBy == 'id')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-center w-10">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('tracking')">
                                Tracking
                                @if($sortBy == 'tracking')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-left hidden sm:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('created_at')">
                                Fecha
                                @if($sortBy == 'created_at')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-left">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('name')">
                                Cliente
                                @if($sortBy == 'name')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-left w-12 hidden md:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('ancho')">
                                Ancho
                                @if($sortBy == 'ancho')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-left w-12 hidden md:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('alto')">
                                Alto
                                @if($sortBy == 'alto')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-left w-12 hidden md:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('largo')">
                                Largo
                                @if($sortBy == 'largo')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-left w-12 hidden md:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('peso')">
                                Peso
                                @if($sortBy == 'peso')
                                @if($sortDirection == 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                                @endif
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                                @endif
                            </span>
                        </th>
                        <th class="px-2 py-2 text-center w-14">Fotos</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @forelse ($packages->get() as $package)
                    <tr class="odd:bg-white even:bg-slate-50" wire:key="package-{{$package->id}}">
                        <td class="border px-2 py-1 text-center">
                            <input wire:model="packagesIds" wire:loading.attr="disabled" type="checkbox" name="select" value="{{ $package->id }}" @if($selected !==false) checked @endif>
                        </td>
                        <td class="border px-2 py-1 text-center">{{ $package->id }}</td>
                        <td class="border px-2 py-1">
                            <a href="{{ route('admin.tracking', $package->id) }}">
                                {{ $package->tracking }}
                            </a>
                        </td>
                        <td class="border px-2 py-1 w-40 hidden sm:table-cell">{{ $package->created_at }}</td>
                        <td class="border px-2 py-1 capitalize">{{ $package->user->name }} {{ $package->user->lastname }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->ancho }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->alto }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->largo }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->peso }}</td>
                        <td class="border px-2 py-1">
                            @if($package->photos->count())
                            <button type="button" class="inline-block rounded bg-primary w-6 h-6 items-center text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#modal{{ $package->id }}" data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr class=" text-center">
                        <td colspan="8" class="border px-4 py-2">No hay registros para mostrar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
        @endif
    </div>
</div>
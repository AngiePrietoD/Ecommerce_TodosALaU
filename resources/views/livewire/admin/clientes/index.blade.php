<div>
    <x-slot name="header">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
        Clientes
    </x-slot>
    <div class="mt-2 lg:mt-4 lg:container mx-auto">
        <div class="bg-white border-b border-gray-200 p-1 lg:p-3">
            <div class="flex items-center">
                <div class="grow mr-4">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" autocomplete="off" wire:model="search" id="default-search" class="block w-full p-1.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="w-10">
                    <a href="{{ route('admin.clientes.nuevo') }}" title="Edita cliente" :active="request()->routeIs('admin.clientes.nuevo')" class="flex items-center rounded-lg shadow bg-blue-500 hover:bg-blue-700 hover:text-white border-0 active:border-0 hover:border-0 text-white w-8 h-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                        </svg>
                    </a>
                </div>
            </div>
            <table class="table-auto w-full mt-4 rounded-lg overflow-hidden">
                <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                    <tr>
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
                        <th class="px-2 py-2 text-center w-10">Foto</th>
                        <th class="px-2 py-2 text-left sm:hidden">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('name')">
                                Nombres y Apellidos
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
                        <th class="px-2 py-2 text-left hidden sm:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('name')">
                                Nombres
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
                        <th class="px-2 py-2 text-left hidden sm:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('lastname')">
                                Apellidos
                                @if($sortBy == 'lastname')
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
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('phone')">
                                Teléfono
                                @if($sortBy == 'phone')
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
                        <th class="px-2 py-2 text-left hidden md:table-cell">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('email')">
                                Correo electrónico
                                @if($sortBy == 'email')
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
                        <th class="px-2 py-2 w-20 text-center"></th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @forelse ($users->items() as $i => $user)
                    <tr wire:key="user-field-{{ $user->id }}" class="odd:bg-white even:bg-slate-50">
                        <td class="border">
                            <a href="{{ route('admin.clientes.edit', $user->id) }}" title="Editar cliente" :active="request()->routeIs('admin.clientes.edit', $user->id)" class="block align-middle text-center border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                                {{ $user->id }}
                            </a>
                        </td>
                        <td>
                            <img class="rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                        </td>
                        <td class="border sm:hidden">
                            <a href="{{ route('admin.clientes.edit', $user->id) }}" title="Editar cliente" :active="request()->routeIs('admin.clientes.edit', $user->id)" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                                {{ $user->name }} {{ $user->lastname }}
                            </a>
                        </td>
                        <td class="border hidden sm:table-cell">
                            <a href="{{ route('admin.clientes.edit', $user->id) }}" title="Editar cliente" :active="request()->routeIs('admin.clientes.edit', $user->id)" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td class="border hidden sm:table-cell">
                            <a href="{{ route('admin.clientes.edit', $user->id) }}" title="Editar cliente" :active="request()->routeIs('admin.clientes.edit', $user->id)" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                                {{ $user->lastname }}
                            </a>
                        </td>
                        <td class="border hidden sm:table-cell px-2">{{ $user->phone }}</td>
                        <td class="border hidden md:table-cell px-2">{{ $user->email }}</td>
                        <td class="border">
                            <div class="flex gap-x-1">
                                <a href="{{ route('admin.recibidos.user', $user->id) }}" title="Paquetes sin instrucción de este cliente" :active="request()->routeIs('admin.recibidos.user', $user->id)" class="flex items-center rounded-lg shadow bg-orange-500 hover:bg-orange-700 hover:text-white border-0 active:border-0 hover:border-0 text-white w-6 h-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.clientes.edit', $user->id) }}" title="Editar cliente" :active="request()->routeIs('admin.clientes.edit', $user->id)" class="flex items-center rounded-lg shadow bg-blue-500 hover:bg-blue-700 hover:text-white border-0 active:border-0 hover:border-0 text-white w-6 h-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                @if($confirmando===$user->id)
                                <button wire:click="confirmed({{$user->id}})" data-toggle="modal" data-target="#exampleModal" class="rounded-lg shadow bg-gray-700 hover:bg-gray-900 text-white w-6 h-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                    </svg>
                                </button>
                                @else
                                <button wire:click="delete({{$user->id}})" data-toggle="modal" data-target="#exampleModal" class="rounded-lg shadow bg-red-500 hover:bg-red-700 text-white w-6 h-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class=" text-center">
                        <td colspan="8" class="border px-4 py-2">No hay registros para mostrar</td>
                    </tr>
                    @endforelse
                </tbody>
                @if ($users->hasPages())
                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-100">
                    <tr>
                        <td colspan="8" class="border px-4 py-2">
                            {{ $users->links() }}
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
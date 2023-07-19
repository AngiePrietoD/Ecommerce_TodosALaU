<div>
    <div class="px-3">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" autocomplete="off" wire:model="search" id="default-search" class="block w-full p-1.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="z-40 absolute px-10 w-96">
            @if($search)
            <table class="table-auto bg-white border w-full">
                <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                    <tr>
                        <th class="border px-2 py-2 text-left">ID</th>
                        <th class="border px-2 py-2 text-left">Cliente</th>
                        <th class="border px-2 py-2 text-left"></th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach($users as $user)
                    <tr class="odd:bg-white even:bg-slate-50 hover:bg-sky-100" wire:key="user-{{$user->id}}">
                        <td class="border px-2 py-1">{{ $user->id }}</td>
                        <td class="border px-2 py-1">{{ $user->name }} {{ $user->lastname }}</td>
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
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
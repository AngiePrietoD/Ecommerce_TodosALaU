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
        <div class="z-40 absolute px-10">
            @if($search)
            <table class="table-auto bg-white border w-full">
                <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                    <tr>
                        <th class="border px-2 py-2 text-left">ID</th>
                        <th class="border px-2 py-2 text-left">Fecha</th>
                        <th class="border px-2 py-2 text-left">Transporte</th>
                        <th class="border px-2 py-2 text-left">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach($packages as $package)
                    <tr wire:click="ir({{$package->id}})" class="odd:bg-white even:bg-slate-50 hover:bg-sky-100">
                        <td class="border px-2 py-1">{{ $package->id }}</td>
                        <td class="border px-2 py-1">{{ $package->created_at }}</td>
                        <td class="border px-2 py-1">{{ $package->tracking }}</td>
                        <td class="border px-2 py-1">{{ $package->packageStatus->name }}</td>
                        <td class="border px-2 py-1">
                            @if($package->transport_id)
                            <div class="flex items-center">
                                <img class="w-8 h-8 border-0" src="/images/transport-{{$package->transport_id }}.svg">
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
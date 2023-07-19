<div>
    <x-slot name="header">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
            </svg>
            En Tránsito ({{$packages->count()}})
    </x-slot>
    <div class="mt-2 p-2 sm:mt-4 sm:p-6 bg-white lg:container mx-auto">
        <form wire:submit.prevent="prepareRepacks" method="POST">
            <table class="table-auto border w-full">
                <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                    <tr>
                        <th class="border px-2 py-2 text-left">ID</th>
                        <th class="border px-2 py-2 text-left hidden sm:table-cell">Fecha</th>
                        <th class="border px-2 py-2 text-left">Tracking</th>
                        <th class="border px-2 py-2 text-left hidden md:table-cell">ancho</th>
                        <th class="border px-2 py-2 text-left hidden md:table-cell">alto</th>
                        <th class="border px-2 py-2 text-left hidden md:table-cell">largo</th>
                        <th class="border px-2 py-2 text-left hidden md:table-cell">Peso</th>
                        <th class="border px-2 py-2 w-14">Fotos</th>
                        <th class="border px-2 py-2 text-left w-10 sm:w-28"><span class="inline-block sm:hidden">Tran</span><span class="hidden sm:inline-block">Transporte</span></th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @forelse ($packages as $package)
                    <tr class="odd:bg-white even:bg-slate-50" wire:key="package-{{$package->id}}">
                        <td class="border px-2 py-1">{{ $package->id }}</td>
                        <td class="border px-2 py-1 hidden sm:table-cell">{{ $package->created_at }}</td>
                        <td class="border px-2 py-1">
                            <a href="{{ route('cliente.tracking', $package->id) }}">
                                {{ $package->tracking }}
                            </a>
                        </td>
                        <td class="border px-2 py-1 hidden md:table-cell">{{ $package->ancho }}</td>
                        <td class="border px-2 py-1 hidden md:table-cell">{{ $package->alto }}</td>
                        <td class="border px-2 py-1 hidden md:table-cell">{{ $package->largo }}</td>
                        <td class="border px-2 py-1 hidden md:table-cell">{{ $package->peso }}</td>
                        <td class="border px-2 py-1 text-center">
                            @if($package->photos->count())
                            <button type="button" class="inline-block rounded bg-primary w-8 h-8 items-center text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#modal{{ $package->id }}" data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </button>
                            @endif
                        </td>
                        <td class="border px-2 py-1">
                            <div class="flex items-center">
                                <img class="w-8 h-8 border-0 sm:mr-2" src="/images/transport-{{$package->transport->id}}.svg">
                                <span class="hidden sm:inline-block">{{ $package->transport?->name }}</span>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class=" text-center">
                        <td colspan="8" class="border px-4 py-2">No hay paquetes para mostrar</td>
                    </tr>
                    @endforelse
                </tbody>
                @if ($packages->hasPages())
                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    <tr>
                        <td colspan="8" class="border px-4 py-2">
                            {{ $packages->links() }}
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </form>
    </div>
</div>
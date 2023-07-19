<div>
    <x-slot name="header">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
        </svg>
        En tránsito
    </x-slot>

    <div class="mt-2 p-2 sm:mt-4 sm:p-6 bg-white lg:container mx-auto">
        @if(!$dispatch->id)
        <h3 class="flex font-semibold text-xl text-gray-800 leading-tight">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
            </svg>
            Embarcado ({{$dispatches->count()}})
        </h3>
        <table class="table-auto w-full my-4 rounded-lg overflow-hidden">
            <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                <tr>
                    <th class="p-2 text-center w-10">
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
                    <th class="p-2 text-left w-44">
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
                    <th class="p-2 text-left">
                        <span class="flex items-center cursor-pointer" wire:click="sortBy('code')">
                            <span class="hidden sm:inline-block">Número de </span>guía
                            @if($sortBy == 'code')
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
                    <th class="p-2 text-left w-10 sm:w-28">
                        <span class="flex items-center cursor-pointer" wire:click="sortBy('transport_id')">
                            <span class="inline-block sm:hidden">Tran</span><span class="hidden sm:inline-block">Transporte</span>
                            @if($sortBy == 'transport_id')
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
                    <th class="p-2 text-center w-10">
                        <span class="inline-block sm:hidden">PQ</span><span class="hidden sm:inline-block">Paquetes</span>
                    </th>
                    <th class="p-2 text-center w-10"></th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @forelse ($dispatches as $dispatch)
                <tr class="odd:bg-white even:bg-slate-50" wire:key="dispatch-{{ $dispatch->id }}">
                    <td class="border px-2 py-1 text-center">
                        <a href="{{ route('admin.enviados.dispatch', $dispatch->id) }}" :active="request()->routeIs('admin.enviados.dispatch', $dispatch->id)" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                            {{ $dispatch->id }}
                        </a>
                    </td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('admin.enviados.dispatch', $dispatch->id) }}" :active="request()->routeIs('admin.enviados.dispatch', $dispatch->id)" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                            {{ $dispatch->created_at }}
                        </a>
                    </td>
                    <td class="border px-2 py-1">
                        {{ $dispatch->code }}
                    </td>
                    <td class="border px-2 py-1">
                        <div class="flex items-center">
                            <img class="w-6 h-6 border-0 mr-2" src="/images/transport-{{ $dispatch->transport->id }}.svg" />
                            <span class="hidden sm:inline-block">{{ $dispatch->transport?->name }}</span>
                        </div>
                    </td>
                    <td class="border px-2 py-1 text-center">{{ $dispatch->packages->count() }}</td>
                    <td class="border text-center">
                        <button wire:click="recibido({{$dispatch->id }})" data-toggle="modal" data-target="#exampleModal" class="rounded-lg shadow bg-orange-700 hover:bg-orange-900 text-white w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr class=" text-center">
                    <td colspan="8" class="border px-4 py-2">No hay registros para mostrar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <h3 class="flex font-semibold text-xl text-gray-800 leading-tight">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
            </svg>
            Ya arribó ({{$theyArrived->count()}})
        </h3>
        <table class="table-auto w-full mt-4 rounded-lg overflow-hidden">
            <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                <tr>
                    <th class="p-2 text-center w-10">
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
                    <th class="p-2 text-left w-44">
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
                    <th class="p-2 text-left">
                        <span class="flex items-center cursor-pointer" wire:click="sortBy('code')">
                            <span class="hidden sm:inline-block">Número de </span>guía
                            @if($sortBy == 'code')
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
                    <th class="p-2 text-left w-10 sm:w-28">
                        <span class="flex items-center cursor-pointer" wire:click="sortBy('transport_id')">
                            <span class="inline-block sm:hidden">Tran</span><span class="hidden sm:inline-block">Transporte</span>
                            @if($sortBy == 'transport_id')
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
                    <th class="p-2 text-center w-10">
                        <span class="inline-block sm:hidden">PQ</span><span class="hidden sm:inline-block">Paquetes</span>
                    </th>
                    <th class="p-2 text-center w-10"></th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @forelse ($theyArrived as $arrived)
                <tr class="odd:bg-white even:bg-slate-50" wire:key="arrived-{{ $arrived->id }}">
                    <td class="border px-2 py-1 text-center w-10">
                        <a href="{{ route('admin.enviados.dispatch', $arrived->id) }}" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                            {{ $arrived->id }}
                        </a>
                    </td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('admin.enviados.dispatch', $arrived->id) }}" class="block align-middle border-0 hover:underline hover:border-0 w-full h-6 py-1 px-2">
                            {{ $arrived->created_at }}
                        </a>
                    </td>
                    <td class="border px-2 py-1">
                        {{ $arrived->code }}
                    </td>
                    <td class="border px-2 py-1">
                        <div class="flex items-center">
                            <img class="w-8 h-8 border-0 sm:mr-2" src="/images/transport-{{ $arrived->transport->id }}.svg" />
                            <span class="hidden sm:inline-block">{{ $arrived->transport?->name }}</span>
                        </div>
                    </td>
                    <td class="border px-2 py-1 text-center">{{ $arrived->packages->count() }}</td>
                    <td class="border px-2 py-1 text-center"></td>
                </tr>
                @empty
                <tr class=" text-center">
                    <td colspan="8" class="border px-4 py-2">No hay registros para mostrar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @else
        <table class="table-auto w-full mt-4 rounded-lg overflow-hidden">
            <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                <tr>
                    <th class="px-2 py-2 text-left w-10">
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
                    <th class="px-2 py-2 text-left w-32">
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
                    <th class="px-2 py-2 text-left w-32 hidden sm:table-cell">
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
                    <th class="px-2 py-2 text-center w-12 hidden md:table-cell">
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
                    <th class="px-2 py-2 text-center w-12 hidden md:table-cell">
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
                    <th class="px-2 py-2 text-center w-12 hidden md:table-cell">
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
                    <th class="px-2 py-2 text-center w-12 hidden md:table-cell">
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
                    <th class="px-2 py-2 text-center w-12">Fotos</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @forelse ($dispatch->packages as $package)
                <tr class="odd:bg-white even:bg-slate-50" wire:key="package-{{ $package->id }}">
                    <td class="border px-2 py-1">{{ $package->id }}</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('admin.tracking', $package->id) }}">
                            {{ $package->tracking }}
                        </a>
                    </td>
                    <td class="border px-2 py-1 w-40 hidden sm:table-cell">{{ $package->created_at }}</td>
                    <td class="border px-2 py-1 capitalize">{{ $package->user->name }} {{ $package->user->lastname }}</td>
                    <td class="border px-2 py-1 hidden md:table-cell">{{ $package->ancho }}</td>
                    <td class="border px-2 py-1 hidden md:table-cell">{{ $package->alto }}</td>
                    <td class="border px-2 py-1 hidden md:table-cell">{{ $package->largo }}</td>
                    <td class="border px-2 py-1 hidden md:table-cell">{{ $package->peso }}</td>
                    <td class="border px-2 py-1">
                        @if($package->photos->count())
                        <button type="button" class="inline-block rounded bg-primary w-8 h-8 items-center text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#modal{{ $package->id }}" data-te-ripple-init data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
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
        @endif
    </div>
</div>
<div>
    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
        Recibidos ({{ $packages->count() }})
    </x-slot>
    <div class="mt-2 p-2 sm:mt-4 sm:p-6 bg-white lg:container mx-auto">
        @if (session()->has('flash.banner'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('flash.banner') }}</p>
        </div>
        @endif
        <form wire:submit.prevent="prepareRepacks" method="POST">
            <table class="table-auto border w-full">
                <thead class="text-xs font-semibold uppercase text-white bg-sky-500">
                    <tr>
                        <th class="border px-2 py-2 text-center">
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
                        <th class="border px-2 py-2 text-left hidden sm:table-cell">
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
                        <th class="border px-2 py-2 text-left">
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
                        <th class="border px-2 py-2 text-left w-12 hidden md:table-cell">
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
                        <th class="border px-2 py-2 text-left w-12 hidden md:table-cell">
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
                        <th class="border px-2 py-2 text-left w-12 hidden md:table-cell">
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
                        <th class="border px-2 py-2 text-left w-12 hidden md:table-cell">
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
                        <th class="border px-2 py-2 w-8 hidden sm:table-cell">Fotos</th>
                        <th class="border px-2 py-2 text-center w-10 sm:w-28">
                            <span class="flex items-center cursor-pointer" wire:click="sortBy('transport_id')">
                                Transporte
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
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @forelse ($packages->items() as $package)
                    <tr class="odd:bg-white even:bg-slate-50" wire:key="package-{{$package->id}}">
                        <td class="border px-2 py-1 text-center">
                            {{ $package->id }}
                        </td>
                        <td class="border px-2 py-1 hidden sm:table-cell">{{ $package->created_at }}</td>
                        <td class="border px-2 py-1">
                            <a href="{{ route('cliente.tracking', $package->id) }}">
                                {{ $package->tracking }}
                            </a>
                        </td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->ancho }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->alto }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->largo }}</td>
                        <td class="border px-2 py-1 text-right hidden md:table-cell">{{ $package->peso }}</td>
                        <td class="border px-2 py-1 text-center hidden sm:table-cell">
                            @if($package->photos->count())
                            <button type="button" class="block rounded bg-blue-500 w-8 h-8 mx-auto leading-normal text-white drop-shadow-md hover:bg-blue-600 hover:shadow focus:bg-blue-600 focus:shadow focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow dark:shadow dark:hover:shadow dark:focus:shadow dark:active:shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </button>
                            @endif
                        </td>
                        <td class="border px-1 pt-1">
                            <ul class="grid grid-cols-3">
                                <li>
                                    <input type="radio" wire:change="dropTransport({{$package->id}});" {{$package->transport?->id=="" ? 'checked':''}} id="transport-{{$package->id}}" value="" name="transport-{{$package->id}}" class="hidden peer">
                                    <label title="Paquete sin instrucciones de envío" for="transport-{{$package->id}}" class="inline-flex peer-checked:filter-none border-2 rounded-md peer-checked:border-gray-500 peer-checked:bg-red-600 bg-red-400 text-white items-center justify-between w-8 h-8 cursor-pointer peer-checked:shadow peer-checked:text-white hover:text-white hover:bg-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002" />
                                        </svg>
                                    </label>
                                </li>
                                @foreach($transports as $transport)
                                <li>
                                    <input type="radio" wire:change="setTransport({{$package->id}}, {{$transport?->id}});" {{($package->transport?->id == $transport->id) ? 'checked':''}} id="transport-{{$package->id}}-{{$transport->id}}" name="transport-{{$package->id}}" class="hidden peer">
                                    <label title="{{$transport->name}}" for="transport-{{$package->id}}-{{$transport->id}}" class="inline-flex grayscale peer-checked:filter-none border-2 p-1 rounded-md peer-checked:border-gray-500 items-center justify-between w-8 h-8 text-gray-500 cursor-pointer peer-checked:shadow peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                        <img src="/images/transport-{{$transport->id}}.svg">
                                    </label>
                                </li>
                                @endforeach
                            </ul>
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
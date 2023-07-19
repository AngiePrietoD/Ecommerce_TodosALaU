<div>
    <x-slot name="header">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 md:w-6 h-5 md:h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
            </svg>
            Tracking: {{ $package->tracking }}
            Paquete: {{ $package->id }}
    </x-slot>
    <x-validation-errors class="mb-4" />
    <div class="py-2 sm:py-6 lg:container mx-auto">
        <div class="sm:p-6 bg-white border-b border-gray-200">
            <div>
                <div class="sm:flex border-b-2 mb-2">
                    <div class="sm:w-1/3 p-2">
                        <table class="w-full">
                            <tr>
                                <th class="border text-left w-32">Cliente:</th>
                                <td class="border px-2">{{ $package->user->name }} {{ $package->user->lastname }}</td>
                            </tr>
                            <tr>
                                <th class="border text-left w-32">Tracking:</th>
                                <td class="border px-2">{{ $package->tracking }}</td>
                            </tr>
                            <tr>
                                <th class="border text-left w-32">Shipper:</th>
                                <td class="border px-2">{{ $package->shipper->name }}</td>
                            </tr>
                            @if($package->package_type_id)
                            <tr>
                                <th class="border text-left w-32">Tipo de paquete:</th>
                                <td class="border px-2">{{ $package->packageType->name }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-right"></th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="sm:w-2/3 p-2 sm:p-4 sm:border-l-2">
                        <fieldset>
                            <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3">
                                <div class="p-2 border text-center">
                                    <x-label class="p-2" for="alto" value="Alto (pulgadas)" />
                                    <div>{{ $package->alto }}</div>
                                </div>
                                <div class="p-2 border text-center">
                                    <x-label class="p-2" for="ancho" value="Ancho (pulgadas)" />
                                    <div>{{ $package->ancho }}</div>
                                </div>
                                <div class="p-2 border text-center">
                                    <x-label class="p-2" for="largo" value="Largo (pulgadas)" />
                                    <div>{{ $package->largo }}</div>
                                </div>
                                <div class="p-2 border text-center">
                                    <x-label class="p-2" for="peso" value="Peso" />
                                    <div>{{ $package->peso }}</div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="my-4">
                            <legend class="my-4 font-semibold">Total de las medidas</legend>
                            <div class="grid grid-cols-3 gap-2 sm:gap-3">
                                <div class="border">
                                    <x-label class="p-2 text-center" for="pies" value="Pies cúbicos" />
                                    <div class="block mt-1 w-full text-center font-semibold p-4">{{ number_format($pies, 2) }}</div>
                                </div>
                                <div class="border">
                                    <x-label class="p-2 text-center" for="lbs" value="Peso volumétrico" />
                                    <div class="block mt-1 w-full text-center font-semibold p-4">{{ number_format($volumetrico, 2) }} Libras</div>
                                </div>
                                <div class="border">
                                    <x-label class="p-2 text-center" for="peso" value="Total peso ({{$volumetrico > $package->peso ? 'Volumétrico': 'Neto'}})" />
                                    <div class="block mt-1 w-full text-center font-semibold p-4">{{ number_format($volumetrico > $package->peso? $volumetrico : $package->peso, 2 ) }} Libras</div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="my-4">
                            <div>
                                <x-label class="p-2" for="notas" value="Notas" />
                                <div>{{ $package->notas }}</div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-3">
                    @if ($package->photos)
                    @foreach($package->photos as $foto)
                    <div>
                        <a href="{{ asset($foto->filename) }}" target="_blank">
                            <img class="border rounded-lg" src="{{ asset($foto->filename) }}">
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<x-app-layout>
    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
        {{ __('Recibir nuevo paquete') }}
    </x-slot>

    <div class="py-6 container mx-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:paquete :package="$package" />
        </div>
    </div>
</x-app-layout>
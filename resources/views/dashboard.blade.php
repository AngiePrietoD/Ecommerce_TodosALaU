<x-app-layout>
    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
        </svg>
        {{ __('Dashboard') }}
    </x-slot>

    <div class="mt-2 md:mt-6 md:container mx-auto bg-white border-b border-gray-200 md:rounded-lg overflow-hidden">
        <div class="p-3">
            <livewire:cliente.buscar />
        </div>
        <div class="grid grid-cols-2 gap-1 p-1 md:grid-cols-5 md:gap-3 md:p-3">
            @foreach($package_statuses as $status)
            <a href="{{ route('cliente.'.$status->path) }}" class="text-center hover:shadow-md hover:bg-sky-200 justify-center rounded-md border-2 p-3 dark:bg-gray-800">
                <h3 class="flex text-2xl font-semibold dark:text-white m-0 text-stone-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    {{ $status->name }}
                </h3>
                <p class="text-xl font-semibold capitalize">
                    <span class="text-sky-500">{{ $status->packagesByUser()->count() }}</span>
                </p>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
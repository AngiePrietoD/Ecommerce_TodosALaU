<x-app-layout>
    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
        </svg>
        {{ __('Dashboard') }}
    </x-slot>
    <div class="mt-2 md:mt-6 md:container mx-auto bg-white border-b border-gray-200 md:rounded-lg overflow-hidden">
        <div class="flex p-3">
            <div class="grow">
                <livewire:admin.buscador />
            </div>
            <div class="w-10">
                <a href="{{ route('admin.paquete.index') }}" title="Edita cliente" :active="request()->routeIs('admin.clientes.index')" class="flex items-center rounded-lg shadow bg-lime-500 hover:bg-lime-700 hover:text-white border-0 active:border-0 hover:border-0 text-white w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-1 p-1 md:grid-cols-5 md:gap-3 md:p-3">
            @foreach($package_statuses as $status)
            <div class="text-center rounded-md border-2 bg-gray-50 p-3 dark:bg-gray-800">
                <h3 class="text-2xl w-full text-center font-semibold dark:text-white m-0 text-stone-500">
                    {{ $status->name }}
                </h3>
                <p class="text-xl font-semibold capitalize">
                    <span class="text-sky-500">{{ $status->packages->count() }}</span>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
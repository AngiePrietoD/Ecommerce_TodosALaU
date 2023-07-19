<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">{{ $city->name }}</h1>
                <p class="text-gray-700">{{ $city->created_at?$city->created_at->diffForHumans():NULL }}</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('admin.cities.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">{{ __('Back') }}</a>
                <a href="{{ route('admin.cities.edit', $city) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">{{ __('Edit') }}</a>
                <a role="button" wire:click="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}</a>
            </div>
        </div>
    </div>
</div>
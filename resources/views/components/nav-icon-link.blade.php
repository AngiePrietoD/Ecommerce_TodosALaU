@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex w-full py-1 px-3 items-center rounded-t-lg border-b-4 border-blue-900 bg-stone-100 text-sm font-medium leading-5 text-blue focus:outline-none focus:border-blue-500 transition duration-150 ease-in-out'
: 'inline-flex w-full py-1 px-3 items-center rounded-t-lg border-b-4 border-transparent text-sm font-medium leading-5 text-white hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
@props(['active'])

@php
$classes = $active ? ' class="active"':NULL;
@endphp
<li class="menu-item">
    <a class="menu-link" {{ $attributes }}>
        {{ $slot }}
    </a>
</li>
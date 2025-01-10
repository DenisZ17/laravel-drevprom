@props(['active'])
@php
$classes = ($active ?? false)
            ? 'text-white'
            : 'text-gray-400';
@endphp
<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

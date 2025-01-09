@props(['active'])

@php
$classes = ($active ?? false)
            ? 'header__link-active'
            : 'header__link';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

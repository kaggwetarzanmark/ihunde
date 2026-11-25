@props(['name'])

<svg {{ $attributes->merge(['class' => 'ic', 'aria-hidden' => 'true', 'focusable' => 'false']) }}>
    <use href="#{{ $name }}"></use>
</svg>

@props(['title', 'description' => null])

<div {{ $attributes->class(['sh']) }}>
    <h2>{{ $title }}</h2>
    @if ($description)
        <p>{{ $description }}</p>
    @endif
</div>

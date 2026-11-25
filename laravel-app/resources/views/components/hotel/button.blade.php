@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->class(['btn']) }}>{{ $slot }}</a>

@props(['event'])

<li>
    <x-hotel.icon :name="$event['icon']" />
    <span>
        <b>{{ $event['name'] }}</b>
        {{ $event['description'] }}
    </span>
</li>

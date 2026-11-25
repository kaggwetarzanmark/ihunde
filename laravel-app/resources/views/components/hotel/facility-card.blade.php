@props(['facility'])

<div>
    <x-hotel.icon :name="$facility['icon']" />
    <h3>{{ $facility['name'] }}</h3>
    <p>{{ $facility['description'] }}</p>
</div>

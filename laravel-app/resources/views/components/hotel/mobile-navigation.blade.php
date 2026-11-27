<nav id="mnav" class="mnav" aria-label="Mobile" aria-hidden="true">
    <button class="burger x" type="button" aria-label="Close menu" data-m="close">
        <x-hotel.icon name="close" />
    </button>
    @foreach (config('ihunde.mobile_navigation') as $item)
        <a href="{{ route('home') . $item['href'] }}">{{ $item['label'] }}</a>
        @if (count($item['children']))
            <div class="sub">
                @foreach ($item['children'] as $child)
                    <a href="{{ route('home') . $child['href'] }}">{{ $child['label'] }}</a>
                @endforeach
            </div>
        @endif
    @endforeach
    <x-hotel.button :href="route('booking')">Book now</x-hotel.button>
</nav>

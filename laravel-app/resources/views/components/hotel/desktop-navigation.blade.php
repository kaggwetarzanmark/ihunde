<nav aria-label="Main">
    <ul class="main">
        @foreach (config('ihunde.navigation') as $item)
            <li>
                <a href="{{ route('home') . $item['href'] }}">
                    {{ $item['label'] }}
                    @if (count($item['children']))
                        <x-hotel.icon name="chev" class="car" />
                    @endif
                </a>
                @if (count($item['children']))
                    <ul class="dd">
                        @foreach ($item['children'] as $child)
                            <li>
                                <a href="{{ route('home') . $child['href'] }}">{{ $child['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>

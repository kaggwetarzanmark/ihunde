@props(['offer'])

<article class="of">
    <div
        class="im"
        style="background-image:var(--{{ $offer['image'] }})"
        role="img"
        aria-label="{{ $offer['alt'] }}"
    ></div>
    <div class="tx">
        <h3>{{ $offer['name'] }}</h3>
        <p>{{ $offer['description'] }}</p>
        <div class="pr">
            {{ $offer['price'] }}
            @if ($offer['price_note'])
                <small>{{ $offer['price_note'] }}</small>
            @endif
        </div>
        <a class="lk" href="{{ route('home') . $offer['href'] }}">{{ $offer['link_label'] }}</a>
    </div>
</article>

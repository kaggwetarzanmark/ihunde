@props(['room'])

<article
    class="card im"
    style="background-image:var(--{{ $room['image'] }})"
    aria-label="{{ $room['alt'] }}"
>
    <div>
        <h3>{{ $room['name'] }}</h3>
        <p>{{ $room['description'] }}</p>
        <p class="room-price">{{ $room['rate'] }} <small>per room per night</small></p>
        <ul aria-label="Room features">
            @foreach ($room['amenities'] as $icon)
                <li><x-hotel.icon :name="$icon" /></li>
            @endforeach
        </ul>
        <a class="lk room-link" href="{{ $room['href'] }}">View room details</a>
    </div>
</article>

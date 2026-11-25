@props(['testimonial'])

<figure>
    <div class="st" aria-label="5 stars">
        @for ($star = 0; $star < 5; $star++)
            <x-hotel.icon name="star" />
        @endfor
    </div>
    <blockquote>{{ $testimonial['quote'] }}</blockquote>
    <figcaption>{{ $testimonial['guest'] }}</figcaption>
</figure>

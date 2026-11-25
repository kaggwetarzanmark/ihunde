<x-hotel.mobile-navigation />

<header id="hd" class="hd{{ request()->routeIs('home') ? '' : ' solid' }}">
    <x-hotel.utility-bar />
    <div class="bar">
        <div class="wrap">
            <a class="brand" href="{{ route('home') }}#top">
                <img src="{{ asset('images/ihunde-logo.jpg') }}" alt="Ihunde Farm Lodge logo">
                <span>
                    Ihunde
                    <small>Farm Lodge</small>
                </span>
            </a>
            <x-hotel.desktop-navigation />
            <div class="rt">
                <x-hotel.button :href="route('pages.rates-and-availability')">Book now</x-hotel.button>
                <button class="burger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mnav" data-m="open">
                    <x-hotel.icon name="menu" />
                </button>
            </div>
        </div>
    </div>
</header>

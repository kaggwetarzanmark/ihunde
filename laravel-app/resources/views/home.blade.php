@extends('layouts.hotel')

@section('title', 'Ihunde Farm Lodge | Rooms and Rates in Kiruhura')
@section('meta_description', 'Find single and double rooms at Ihunde Farm Lodge in Nyakasharara, Kiruhura. View room and meal-plan rates, explore lodge services and contact the team.')

@section('content')
    <div id="top" class="hero">
        <div class="wrap">
            <div class="txt">
                <h1>Ihunde Farm Lodge in Kiruhura</h1>
                <p class="lead">Explore single and double rooms, published rates, dining and event options at our lodge in Nyakasharara, Uganda.</p>
            </div>
            <x-hotel.booking-form />
        </div>
    </div>

    <div class="am">
        <div class="wrap">
            @foreach (config('ihunde.amenities') as $amenity)
                <div>
                    <x-hotel.icon :name="$amenity['icon']" />
                    {{ $amenity['label'] }}
                </div>
            @endforeach
        </div>
    </div>

    <main id="main">
        <section id="about">
            <div class="wrap intro">
                <div>
                    <h2>A lodge stay in Nyakasharara, Kiruhura</h2>
                    <p>Ihunde Farm Lodge is in Nyakasharara, Kiruhura, Uganda. Single and double rooms are listed from UGX 200,000 per guest per night, with a maximum of two guests per room.</p>
                    <p>Half-board and full-board options are also listed. Contact the lodge to confirm availability, room set-up and which meals are included before booking.</p>
                    <a class="caps" href="#suites">Explore rooms and rates</a>
                </div>
                <div id="gallery" class="imgs" aria-label="Lodge photographs">
                    <div class="im a" style="background-image:var(--b2)" role="img" aria-label="Cottage bedroom"></div>
                    <div class="im b" style="background-image:var(--b1)" role="img" aria-label="Cottage interior"></div>
                    <div class="im c" style="background-image:var(--cot)" role="img" aria-label="Lodge gardens"></div>
                </div>
            </div>
        </section>

        <section id="suites" class="suites">
            <div class="wrap">
                <div class="room-showcase-heading">
                    <div>
                        <p class="room-showcase-eyebrow">Accommodation</p>
                        <h2>Where you will stay</h2>
                    </div>
                    <div>
                        <p>Single and double rooms are listed at UGX 200,000 per guest per night. Check dates and confirm room details directly with the lodge.</p>
                        <a class="room-showcase-overview-link" href="{{ route('pages.rates-and-availability') }}">Explore rates and meal plans</a>
                    </div>
                </div>
                <div class="room-showcase-grid">
                    @foreach (config('ihunde.rooms') as $room)
                        <article class="room-showcase-card">
                            <div
                                class="room-showcase-photo"
                                style="background-image:var(--{{ $room['image'] }})"
                                role="img"
                                aria-label="{{ $room['alt'] }}"
                            >
                                <span class="room-showcase-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="room-showcase-content">
                                <p class="room-showcase-eyebrow">Room type</p>
                                <h3>{{ $room['name'] }}</h3>
                                <p class="room-showcase-description">{{ $room['description'] }}</p>
                                <div class="room-showcase-footer">
                                    <div class="room-showcase-price">
                                        <strong>{{ $room['rate'] }}</strong>
                                        <span>per guest per night</span>
                                    </div>
                                    <a class="room-showcase-link" href="{{ $room['href'] }}">View room details</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="offers" class="offers">
            <div class="wrap">
                <x-hotel.section-heading
                    title="Room rates and meal plans"
                    description="Single or double room: UGX 200,000. Half board: UGX 250,000. Full board: UGX 300,000 per guest per night. Rates were shared by the lodge on 25 November 2026; confirm current pricing directly."
                />
                <div class="ogrid">
                    @foreach (config('ihunde.offers') as $offer)
                        <x-hotel.offer-card :offer="$offer" />
                    @endforeach
                </div>
            </div>
        </section>

        <section id="facilities">
            <div class="wrap">
                <x-hotel.section-heading
                    title="Dine, unwind, gather"
                    description="Explore dining, wellness and event options listed by the lodge. Confirm current availability and arrangements directly."
                />
                <div class="fac">
                    @foreach (config('ihunde.facilities') as $facility)
                        <x-hotel.facility-card :facility="$facility" />
                    @endforeach
                </div>
            </div>
        </section>

        <section id="events" class="ev">
            <div class="wrap">
                <div class="box">
                    <h2>Celebrate with us</h2>
                    <ul>
                        @foreach (config('ihunde.events') as $event)
                            <x-hotel.event-list-item :event="$event" />
                        @endforeach
                    </ul>
                    <p><x-hotel.button :href="route('home') . '#contact'">Ask about an event</x-hotel.button></p>
                </div>
            </div>
        </section>

        <section id="visit-details" class="tst">
            <div class="wrap">
                <x-hotel.section-heading
                    title="Planning your visit"
                    description="Useful questions to settle directly with the lodge before you travel."
                />
                <div class="tg">
                    <article class="visit-card"><h3>Confirm your room</h3><p>Share your dates and guest count to check availability, bed set-up and the current total price.</p><a href="{{ route('pages.accommodation') }}">Explore accommodation</a></article>
                    <article class="visit-card"><h3>Ask about meal plans</h3><p>Half-board and full-board rates are listed. Ask which meals, serving times and dietary options are included.</p><a href="{{ route('pages.rates-and-availability') }}">View rates</a></article>
                    <article class="visit-card"><h3>Plan an event</h3><p>Contact the lodge with your date, event type and estimated attendance to discuss arrangements.</p><a href="{{ route('pages.events') }}">Explore events</a></article>
                </div>
            </div>
        </section>

        <section id="faq" class="faq">
            <div class="wrap">
                <div>
                    <h2>Good to know</h2>
                    <p>Details are provided by the lodge. Confirm current availability and arrangements before travelling.</p>
                </div>
                <div>
                    @foreach (config('ihunde.faqs') as $faq)
                        <x-hotel.faq-item :faq="$faq" />
                    @endforeach
                </div>
            </div>
        </section>

        <div id="contact" class="cta">
            <div class="wrap">
                <x-hotel.section-heading
                    title="Plan your stay"
                    description="Call or message us to ask about rates, availability and event arrangements."
                />
                <p>
                    <x-hotel.button :href="config('ihunde.contact.phone_href')">
                        Call {{ config('ihunde.contact.phone') }}
                    </x-hotel.button>
                </p>
            </div>
        </div>
    </main>
@endsection

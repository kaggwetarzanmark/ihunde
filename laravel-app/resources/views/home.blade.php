@extends('layouts.hotel')

@section('title', 'Ihunde Farm Lodge | Comfort that goes beyond')

@section('content')
    <div id="top" class="hero">
        <div class="wrap">
            <div class="txt">
                <h1>Comfort that goes beyond</h1>
                <p class="lead">Private cottages, a spa with sauna and steam, fine dining and open gardens on a quiet estate in Kiruhura.</p>
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
                    <h2>A calm estate with garden and mountain views</h2>
                    <p>Ihunde Farm Lodge sits on a quiet street in Kiruhura. Each private cottage has its own bathroom, kitchen, bathrobes and free WiFi, arranged around a paved courtyard and open lawns.</p>
                    <p>Begin with a breakfast of your choice, spend the evening in the sauna, and rest knowing your car is safe on site.</p>
                    <a class="caps" href="#suites">Explore the rooms</a>
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
                        <p>Choose a single or double room, each at the same simple nightly rate. Ask us about availability and meal plans.</p>
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
                                        <span>per room per night</span>
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
                    description="Single or double room: UGX 200,000. Half board: UGX 250,000. Full board: UGX 300,000. Rates are per room per night."
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
                    description="Everything you need is on the property."
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

        <section id="reviews" class="tst">
            <div class="wrap">
                <x-hotel.section-heading
                    title="Guest stories"
                    description="Sample reviews for layout."
                />
                <div class="tg">
                    @foreach (config('ihunde.testimonials') as $testimonial)
                        <x-hotel.testimonial-card :testimonial="$testimonial" />
                    @endforeach
                </div>
            </div>
        </section>

        <section id="faq" class="faq">
            <div class="wrap">
                <div>
                    <h2>Good to know</h2>
                    <p>Quick answers for your stay. Need more? Call reception any time.</p>
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
                    description="Call or message us for rates, availability and event quotes. We can arrange your airport shuttle."
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

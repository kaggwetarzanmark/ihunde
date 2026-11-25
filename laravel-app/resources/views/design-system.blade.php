@extends('layouts.hotel')

@section('title', 'Design system | Ihunde Farm Lodge')

@section('content')
    <main id="main" class="design-system">
        <section class="ds-intro">
            <div class="wrap">
                <div class="sh">
                    <h1>Design system</h1>
                    <p>The reusable colours, typography and components used by the Ihunde Farm Lodge site.</p>
                </div>
            </div>
        </section>

        <section class="ds-section">
            <div class="wrap">
                <x-hotel.section-heading title="Colour palette" />
                <div class="ds-colors">
                    @foreach (config('ihunde.palette') as $color)
                        <div class="ds-color">
                            <div class="ds-swatch" style="background:{{ $color['value'] }}"></div>
                            <strong>{{ $color['name'] }}</strong>
                            <code>{{ $color['token'] }}: {{ $color['value'] }}</code>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="ds-section ds-soft">
            <div class="wrap">
                <x-hotel.section-heading title="Typography" />
                <div class="ds-type">
                    <h1>Comfort that goes beyond</h1>
                    <h2>A calm estate with garden and mountain views</h2>
                    <h3>Where you will stay</h3>
                    <p>Body copy uses Jost. Headings use Playfair Display for the active burgundy and gold theme.</p>
                    <p class="ds-font-note">Cormorant Garamond and DM Serif Display are also loaded as declared by the source design for its alternate theme definitions.</p>
                </div>
            </div>
        </section>

        <section class="ds-section">
            <div class="wrap">
                <x-hotel.section-heading title="Buttons and booking fields" />
                <div class="ds-buttons">
                    <x-hotel.button href="#ds-book">Primary button</x-hotel.button>
                    <x-hotel.button href="#ds-book" class="o">Secondary button</x-hotel.button>
                </div>
                <div id="ds-book" class="ds-booking">
                    <x-hotel.booking-form />
                </div>
            </div>
        </section>

        <section class="ds-section ds-soft">
            <div class="wrap">
                <x-hotel.section-heading title="Room cards" />
                <div class="cards">
                    @foreach (array_slice(config('ihunde.rooms'), 0, 1) as $room)
                        <x-hotel.room-card :room="$room" />
                    @endforeach
                </div>
            </div>
        </section>

        <section class="ds-section">
            <div class="wrap">
                <x-hotel.section-heading title="Offer cards" />
                <div class="ogrid">
                    @foreach (array_slice(config('ihunde.offers'), 0, 1) as $offer)
                        <x-hotel.offer-card :offer="$offer" />
                    @endforeach
                </div>
            </div>
        </section>

        <section class="ds-section ds-soft">
            <div class="wrap">
                <x-hotel.section-heading title="Facility cards" />
                <div class="fac">
                    @foreach (array_slice(config('ihunde.facilities'), 0, 2) as $facility)
                        <x-hotel.facility-card :facility="$facility" />
                    @endforeach
                </div>
            </div>
        </section>

        <section class="ds-section">
            <div class="wrap">
                <x-hotel.section-heading title="Testimonial card" />
                <div class="tg">
                    <x-hotel.testimonial-card :testimonial="config('ihunde.testimonials.0')" />
                </div>
            </div>
        </section>

        <section class="ds-section ds-soft">
            <div class="wrap">
                <x-hotel.section-heading title="FAQ accordion" />
                <div class="ds-faq">
                    <x-hotel.faq-item :faq="config('ihunde.faqs.0')" />
                </div>
            </div>
        </section>

        <section class="ds-section">
            <div class="wrap">
                <x-hotel.section-heading title="Gallery layout" />
                <div class="imgs ds-gallery" aria-label="Lodge photographs">
                    <div class="im a" style="background-image:var(--b2)" role="img" aria-label="Cottage bedroom"></div>
                    <div class="im b" style="background-image:var(--b1)" role="img" aria-label="Cottage interior"></div>
                    <div class="im c" style="background-image:var(--cot)" role="img" aria-label="Lodge gardens"></div>
                </div>
            </div>
        </section>
    </main>
@endsection

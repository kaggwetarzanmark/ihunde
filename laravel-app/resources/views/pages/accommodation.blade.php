@extends('layouts.hotel')

@section('title', 'Accommodation | Ihunde Farm Lodge')

@section('content')
    <main id="main" class="stay-page">
        <section class="stay-hero">
            <div class="wrap">
                <p class="stay-eyebrow">Ihunde Farm Lodge · {{ config('ihunde.accommodation.location') }}</p>
                <h1>Stay in Kiruhura</h1>
                <p class="stay-lead">Choose a single or double room, then select the meal plan that suits your stay.</p>
                <div class="stay-actions">
                    <a class="btn" href="{{ route('pages.rates-and-availability') }}">View room rates</a>
                    <a class="btn o" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Ask on WhatsApp</a>
                </div>
            </div>
        </section>

        <section class="stay-section">
            <div class="wrap">
                <div class="stay-heading">
                    <p class="stay-eyebrow">Accommodation</p>
                    <h2>Choose your room</h2>
                    <p>Both room types are listed at the same rate. Contact the lodge to confirm room setup and availability for your dates.</p>
                </div>
                <div class="stay-room-grid">
                    @foreach (config('ihunde.rooms') as $room)
                        <article class="stay-room-card">
                            <div
                                class="stay-room-image"
                                style="background-image:var(--{{ $room['image'] }})"
                                role="img"
                                aria-label="{{ $room['alt'] }}"
                            ></div>
                            <div class="stay-room-copy">
                                <p class="stay-eyebrow">Room type</p>
                                <h3>{{ $room['name'] }}</h3>
                                <p>{{ $room['description'] }}</p>
                                <a class="stay-link" href="{{ route($room['route']) }}">Explore {{ strtolower($room['name']) }}</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="stay-section stay-tint">
            <div class="wrap">
                <div class="stay-heading">
                    <p class="stay-eyebrow">Guest comforts</p>
                    <h2>Useful details for your stay</h2>
                </div>
                <div class="stay-facts">
                    @foreach (config('ihunde.accommodation.listing_features') as $feature)
                        <article class="stay-fact">
                            <h3>{{ $feature['label'] }}</h3>
                            <p>{{ $feature['description'] }}</p>
                        </article>
                    @endforeach
                </div>
                <p class="stay-note">{{ config('ihunde.accommodation.listing_note') }}</p>
            </div>
        </section>

        <section class="stay-section">
            <div class="wrap stay-rate-intro">
                <div>
                    <p class="stay-eyebrow">Rates</p>
                    <h2>Simple nightly room rates</h2>
                    <p>Single and double rooms are listed at UGX 200,000 per guest per night. Half-board and full-board rates are also available.</p>
                    <a class="stay-link" href="{{ route('pages.rates-and-availability') }}">See all rates and meal-plan notes</a>
                </div>
                <div class="stay-rate-callout">
                    <span>From</span>
                    <strong>UGX 200,000</strong>
                    <small>per guest per night</small>
                </div>
            </div>
        </section>

        <section class="stay-cta">
            <div class="wrap">
                <p class="stay-eyebrow">Plan your stay</p>
                <h2>Confirm your room and meal plan directly</h2>
                <p>Message the lodge to check availability, bed setup, and exactly what is included in each meal plan.</p>
                <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Message on WhatsApp</a>
                <a class="stay-cta-phone" href="{{ config('ihunde.contact.phone_href') }}">Call {{ config('ihunde.contact.phone') }}</a>
            </div>
        </section>
    </main>
@endsection

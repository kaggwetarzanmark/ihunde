@extends('layouts.hotel')

@section('title', $room['name'] . ' | Ihunde Farm Lodge')

@section('content')
    <main id="main" class="stay-page">
        <section class="stay-hero stay-room-hero" style="--stay-image:var(--{{ $room['image'] }})">
            <div class="wrap">
                <p class="stay-eyebrow">Accommodation · {{ config('ihunde.accommodation.location') }}</p>
                <h1>{{ $room['name'] }}</h1>
                <p class="stay-lead">{{ $room['page_description'] }}</p>
                <div class="stay-actions">
                    <a class="btn" href="{{ route('pages.rates-and-availability') }}">View rates</a>
                    <a class="btn o" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Ask about this room</a>
                </div>
            </div>
        </section>

        <section class="stay-section">
            <div class="wrap stay-room-detail">
                <div>
                    <p class="stay-eyebrow">Room rate</p>
                    <h2>{{ $room['rate'] }}</h2>
                    <p>Per guest per night. A maximum of two guests is allowed in each room. Confirm the room set-up and total price directly with the lodge.</p>
                    <a class="stay-link" href="{{ route('pages.rates-and-availability') }}">Compare meal plans</a>
                </div>
                <div class="stay-detail-panel">
                    <h2>Before you book</h2>
                    <ul>
                        <li>Confirm the bed arrangement and maximum occupancy for your selected room.</li>
                        <li>Ask whether breakfast is included in your chosen rate.</li>
                        <li>Check availability and any meal-plan inclusions directly with the lodge.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="stay-section stay-tint">
            <div class="wrap">
                <div class="stay-heading">
                    <p class="stay-eyebrow">At the lodge</p>
                    <h2>Guest amenities listed online</h2>
                    <p>{{ config('ihunde.accommodation.listing_note') }}</p>
                </div>
                <div class="stay-facts">
                    @foreach (config('ihunde.accommodation.listing_features') as $feature)
                        <article class="stay-fact">
                            <h3>{{ $feature['label'] }}</h3>
                            <p>{{ $feature['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="stay-cta">
            <div class="wrap">
                <p class="stay-eyebrow">Enquiries</p>
                <h2>Ask about {{ strtolower($room['name']) }}</h2>
                <p>Availability, room setup, and meal-plan details can vary. Confirm them directly before travelling.</p>
                <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Message on WhatsApp</a>
                <a class="stay-cta-phone" href="{{ config('ihunde.contact.phone_href') }}">Call {{ config('ihunde.contact.phone') }}</a>
            </div>
        </section>
    </main>
@endsection

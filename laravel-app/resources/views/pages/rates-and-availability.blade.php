@extends('layouts.hotel')

@section('title', 'Room Rates and Availability | Ihunde Farm Lodge')

@section('content')
    <main id="main" class="stay-page">
        <section class="stay-hero stay-rates-hero">
            <div class="wrap">
                <p class="stay-eyebrow">Accommodation · {{ config('ihunde.accommodation.location') }}</p>
                <h1>Room rates and meal plans</h1>
                <p class="stay-lead">Straightforward nightly pricing for single and double rooms, with half-board and full-board options.</p>
                <div class="stay-actions">
                    <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Check dates on WhatsApp</a>
                    <a class="btn o" href="{{ route('pages.accommodation') }}">Explore accommodation</a>
                </div>
            </div>
        </section>

        <section class="stay-section">
            <div class="wrap">
                <div class="stay-heading">
                    <p class="stay-eyebrow">UGX · per room per night</p>
                    <h2>Choose your rate</h2>
                    <p>{{ config('ihunde.accommodation.rate_note') }}</p>
                </div>
                <div class="stay-rate-grid">
                    @foreach (config('ihunde.offers') as $offer)
                        <article class="stay-rate-card">
                            <p class="stay-eyebrow">Ihunde Farm Lodge</p>
                            <h3>{{ $offer['name'] }}</h3>
                            <p class="stay-rate-price">{{ $offer['price'] }}</p>
                            <p class="stay-rate-unit">{{ $offer['price_note'] }}</p>
                            <p>{{ $offer['description'] }}</p>
                        </article>
                    @endforeach
                </div>
                <p class="stay-note">The lodge has not published the exact meals included in half board or full board. Please confirm the menu, serving times, and dietary options before choosing a plan.</p>
            </div>
        </section>

        <section class="stay-section stay-tint">
            <div class="wrap stay-rate-intro">
                <div>
                    <p class="stay-eyebrow">Breakfast information</p>
                    <h2>Confirm what your rate includes</h2>
                    <p>A current public booking listing notes continental breakfast daily from 7:00 AM to 10:00 AM, alongside complimentary Wi-Fi and self-parking. Confirm whether breakfast is included in your selected rate directly with the lodge.</p>
                </div>
                <div class="stay-detail-panel">
                    <h2>Before confirming</h2>
                    <ul>
                        <li>Check room availability for your dates.</li>
                        <li>Confirm the number of guests and bed arrangement.</li>
                        <li>Ask which meals are included in half board or full board.</li>
                        <li>Confirm any dietary requests with the lodge.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="stay-cta">
            <div class="wrap">
                <p class="stay-eyebrow">Availability</p>
                <h2>Get current details from the lodge</h2>
                <p>Rates and room availability can change. Send your dates and preferred room type to confirm the latest options.</p>
                <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Message on WhatsApp</a>
                <a class="stay-cta-phone" href="{{ config('ihunde.contact.phone_href') }}">Call {{ config('ihunde.contact.phone') }}</a>
            </div>
        </section>
    </main>
@endsection

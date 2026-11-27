@extends('layouts.hotel')

@section('title', 'Booking Enquiry | Ihunde Farm Lodge')
@section('meta_description', 'Plan a stay at Ihunde Farm Lodge in Kiruhura. Choose dates, a room and meal plan to estimate your total, then send an enquiry by WhatsApp.')

@section('content')
    <main id="main" class="stay-page booking-page">
        <section class="stay-hero">
            <div class="wrap">
                <p class="stay-eyebrow">Ihunde Farm Lodge · {{ config('ihunde.contact.location') }}</p>
                <h1>Plan your stay</h1>
                <p class="stay-lead">Choose your dates, room and rate plan to see an estimate. Each room can accommodate up to two guests.</p>
            </div>
        </section>

        <section class="stay-section">
            <div class="wrap">
                <x-hotel.booking-form />
            </div>
        </section>

        <section class="stay-section stay-tint booking-contact">
            <div class="wrap">
                <h2>What happens next?</h2>
                <p>Your details are placed into a WhatsApp message for you to review and send. The website does not check live availability or store your enquiry; the lodge must confirm your dates and reservation.</p>
                <p>Need help? Call <a href="{{ config('ihunde.contact.phone_href') }}">{{ config('ihunde.contact.phone') }}</a> or email <a href="mailto:{{ config('ihunde.contact.email') }}">{{ config('ihunde.contact.email') }}</a>.</p>
            </div>
        </section>
    </main>
@endsection

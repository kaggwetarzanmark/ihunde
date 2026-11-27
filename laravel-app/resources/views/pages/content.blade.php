@extends('layouts.hotel')

@section('title', $page['meta_title'])
@section('meta_description', $page['meta_description'])

@section('content')
    <main id="main" class="stay-page content-page">
        <section class="stay-hero">
            <div class="wrap">
                <p class="stay-eyebrow">Ihunde Farm Lodge · {{ config('ihunde.contact.location') }}</p>
                <p class="stay-eyebrow">{{ $page['eyebrow'] }}</p>
                <h1>{{ $page['title'] }}</h1>
                <p class="stay-lead">{{ $page['intro'] }}</p>
                <div class="stay-actions">
                    <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Ask on WhatsApp</a>
                    <a class="btn o" href="{{ route('pages.rates-and-availability') }}">View room rates</a>
                </div>
            </div>
        </section>

        @foreach ($page['sections'] as $section)
            <section class="stay-section {{ $loop->even ? 'stay-tint' : '' }}">
                <div class="wrap">
                    <div class="stay-heading">
                        <p class="stay-eyebrow">{{ $page['eyebrow'] }}</p>
                        <h2>{{ $section['title'] }}</h2>
                    </div>

                    @if (!empty($section['contact']))
                        <div class="stay-facts content-contact">
                            <article class="stay-fact">
                                <h3>Call the lodge</h3>
                                <p><a href="{{ config('ihunde.contact.phone_href') }}">{{ config('ihunde.contact.phone') }}</a></p>
                            </article>
                            <article class="stay-fact">
                                <h3>WhatsApp</h3>
                                <p><a href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">{{ config('ihunde.contact.whatsapp_phone') }}</a></p>
                            </article>
                            <article class="stay-fact">
                                <h3>Email</h3>
                                <p><a href="mailto:{{ config('ihunde.contact.email') }}">{{ config('ihunde.contact.email') }}</a></p>
                            </article>
                        </div>
                    @endif

                    @if (!empty($section['rates']))
                        <div class="stay-rate-grid content-rate-grid">
                            @foreach ($section['rates'] as $rate)
                                <article class="stay-rate-card">
                                    <h3>{{ $rate['name'] }}</h3>
                                    <p class="stay-rate-price">{{ $rate['price'] }}</p>
                                    <p class="stay-rate-unit">per guest per night</p>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    @if (!empty($section['gallery']))
                        <div class="content-gallery">
                            <figure>
                                <img src="{{ asset('images/ihunde-cottage-alt.jpg') }}" alt="Accommodation at Ihunde Farm Lodge" loading="lazy">
                                <figcaption>Guest room</figcaption>
                            </figure>
                            <figure>
                                <img src="{{ asset('images/ihunde-events.jpg') }}" alt="Lodge cottages and grounds at Ihunde Farm Lodge" loading="lazy">
                                <figcaption>Lodge cottages and grounds</figcaption>
                            </figure>
                            <figure>
                                <img src="{{ asset('images/ihunde-hero-burgundy.jpg') }}" alt="Guest room at Ihunde Farm Lodge" loading="lazy">
                                <figcaption>Guest room detail</figcaption>
                            </figure>
                        </div>
                    @endif

                    @if (!empty($section['sitemap']))
                        <div class="content-sitemap">
                            <h3>Explore Ihunde Farm Lodge</h3>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('pages.accommodation') }}">Accommodation</a></li>
                                <li><a href="{{ route('pages.single-room') }}">Single room</a></li>
                                <li><a href="{{ route('pages.double-room') }}">Double room</a></li>
                                <li><a href="{{ route('pages.rates-and-availability') }}">Rates and availability</a></li>
                                <li><a href="{{ route('booking') }}">Booking enquiry</a></li>
                                @foreach (config('ihunde_pages') as $slug => $sitePage)
                                    @if (!in_array($slug, ['sitemap', 'privacy', 'terms'], true))
                                        <li><a href="{{ url("/{$slug}") }}">{{ $sitePage['title'] }}</a></li>
                                    @endif
                                @endforeach
                                <li><a href="{{ route('pages.privacy') }}">Privacy information</a></li>
                                <li><a href="{{ route('pages.terms') }}">Website terms</a></li>
                                <li><a href="{{ route('cookies') }}">Cookie information</a></li>
                            </ul>
                        </div>
                    @endif

                    @foreach ($section['paragraphs'] ?? [] as $paragraph)
                        <p class="content-copy">{{ $paragraph }}</p>
                    @endforeach

                    @if (!empty($section['items']))
                        <ul class="content-list">
                            @foreach ($section['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!empty($section['links']))
                        <nav class="content-links" aria-label="Related pages">
                            @foreach ($section['links'] as $link)
                                <a class="stay-link" href="{{ $link['href'] }}" @if (str_starts_with($link['href'], 'https://')) target="_blank" rel="noopener noreferrer" @endif>
                                    {{ $link['label'] }}
                                </a>
                            @endforeach
                        </nav>
                    @endif
                </div>
            </section>
        @endforeach

        <aside class="stay-note content-trust-note">
            Information on this page is provided by Ihunde Farm Lodge. Rates, availability and service arrangements can change; please confirm details directly before travelling or making an event booking.
        </aside>

        <section class="stay-cta">
            <div class="wrap">
                <p class="stay-eyebrow">Contact the lodge</p>
                <h2>{{ $page['cta_title'] }}</h2>
                <p>{{ $page['cta_text'] }}</p>
                <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Message on WhatsApp</a>
                <a class="stay-cta-phone" href="{{ config('ihunde.contact.phone_href') }}">Call {{ config('ihunde.contact.phone') }}</a>
            </div>
        </section>
    </main>
@endsection

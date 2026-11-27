<!doctype html>
<html lang="en" data-v="e">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#FAF5F0">
    <meta name="description" content="@yield('meta_description', 'Ihunde Farm Lodge in Nyakasharara, Kiruhura, Uganda. View room rates, dining, wellness and event information, and contact the lodge directly.')">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Ihunde Farm Lodge">
    <meta property="og:title" content="@yield('title', 'Ihunde Farm Lodge | Kiruhura, Uganda')">
    <meta property="og:description" content="@yield('meta_description', 'Ihunde Farm Lodge in Nyakasharara, Kiruhura, Uganda. View room rates, dining, wellness and event information, and contact the lodge directly.')">
    <link rel="canonical" href="{{ url()->current() }}">
    <title>@yield('title', 'Ihunde Farm Lodge | Comfort that goes beyond')</title>
    @unless (request()->routeIs('home', 'pages.*', 'cookies', 'booking'))
        <meta name="robots" content="noindex,follow">
    @endunless
    @if (request()->routeIs('home', 'pages.*', 'booking'))
        <script type="application/ld+json">
            {!! json_encode([
                '@@context' => 'https://schema.org',
                '@type' => 'LodgingBusiness',
                'name' => 'Ihunde Farm Lodge',
                'url' => url('/'),
                'telephone' => config('ihunde.contact.phone'),
                'email' => config('ihunde.contact.email'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Nyakasharara',
                    'addressLocality' => 'Kiruhura',
                    'addressCountry' => 'UG',
                ],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
        </script>
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Playfair+Display:wght@500;600&family=DM+Serif+Display&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-homepage="{{ request()->routeIs('home') ? 'true' : 'false' }}">
    <a class="skip-link" href="#main">Skip to content</a>
    <x-hotel.icon-sprite />
    <x-hotel.header />
    @yield('content')
    <x-hotel.footer />
    <x-hotel.cookie-notice />
    <x-hotel.whatsapp-button />
</body>
</html>

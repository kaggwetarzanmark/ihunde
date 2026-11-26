<!doctype html>
<html lang="en" data-v="e">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#FAF5F0">
    <meta name="description" content="Ihunde Farm Lodge offers private cottages, dining, wellness and gardens in Kiruhura.">
    <title>@yield('title', 'Ihunde Farm Lodge | Comfort that goes beyond')</title>
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

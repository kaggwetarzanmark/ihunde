<?php

$roomRate = 'UGX 200,000';
$halfBoardRate = 'UGX 250,000';
$fullBoardRate = 'UGX 300,000';
$roomRateAmount = 200000;
$halfBoardRateAmount = 250000;
$fullBoardRateAmount = 300000;

return [
    'contact' => [
        'phone' => '+256 790 000 040',
        'phone_href' => 'tel:+256790000040',
        'whatsapp_phone' => '+256 790 000 030',
        'whatsapp_href' => 'https://wa.me/256790000030',
        'email' => 'Ihundefarlodge@gmail.com',
        'location' => 'Nyakasharara, Kiruhura, Uganda',
        'reception' => 'Reception 24 hours',
        'restaurant_hours' => 'Restaurant 6:30 AM to 11:00 PM',
    ],

    'socials' => [
        ['label' => 'WhatsApp', 'icon' => 'wa', 'href' => 'https://wa.me/256790000030'],
    ],

    'navigation' => [
        ['label' => 'Accommodation', 'href' => '/accommodation', 'children' => []],
        ['label' => 'Dining', 'href' => '/dining', 'children' => []],
        ['label' => 'Wellness', 'href' => '/wellness', 'children' => []],
        ['label' => 'Events', 'href' => '/events', 'children' => []],
        ['label' => 'Offers', 'href' => '/offers', 'children' => []],
        ['label' => 'About', 'href' => '/about', 'children' => []],
        ['label' => 'Contact', 'href' => '/contact', 'children' => []],
    ],

    'mobile_navigation' => [
        ['label' => 'Accommodation', 'href' => '/accommodation', 'children' => []],
        ['label' => 'Dining', 'href' => '/dining', 'children' => []],
        ['label' => 'Wellness', 'href' => '/wellness', 'children' => []],
        ['label' => 'Events', 'href' => '/events', 'children' => []],
        ['label' => 'Offers', 'href' => '/offers', 'children' => []],
        ['label' => 'Gallery', 'href' => '/gallery', 'children' => []],
        ['label' => 'About', 'href' => '/about', 'children' => []],
        ['label' => 'Contact', 'href' => '/contact', 'children' => []],
    ],

    'amenities' => [
        ['label' => 'Single and double rooms', 'icon' => 'bed'],
        ['label' => 'Restaurant and bar', 'icon' => 'fork'],
        ['label' => 'Sauna and steam', 'icon' => 'spa'],
        ['label' => 'Conference room', 'icon' => 'users'],
        ['label' => 'Party gardens', 'icon' => 'tree'],
        ['label' => 'Camp fire evenings', 'icon' => 'fire'],
    ],

    'rooms' => [
        [
            'name' => 'Single room',
            'description' => 'A single-room option for a stay in Kiruhura. Confirm the room setup directly with the lodge.',
            'rate' => $roomRate,
            'image' => 'b1',
            'alt' => 'Lodge room interior',
            'amenities' => ['bed', 'wifi'],
            'href' => '/single-room',
            'route' => 'pages.single-room',
            'page_description' => 'A single room provides a comfortable base for a stay in Kiruhura. Ask the lodge to confirm the bed arrangement and guest capacity for your dates.',
        ],
        [
            'name' => 'Double room',
            'description' => 'A double-room option for guests travelling together. Confirm the room setup directly with the lodge.',
            'rate' => $roomRate,
            'image' => 'b2',
            'alt' => 'Lodge room interior',
            'amenities' => ['bed', 'wifi'],
            'href' => '/double-room',
            'route' => 'pages.double-room',
            'page_description' => 'A double room is an option for guests travelling together. Confirm the bed arrangement and maximum occupancy with the lodge before booking.',
        ],
    ],

    'accommodation' => [
        'location' => 'Nyakasharara, Kiruhura, Uganda',
        'listing_features' => [
            [
                'label' => 'Continental breakfast',
                'description' => 'A current public booking listing notes breakfast daily from 7:00 AM to 10:00 AM.',
            ],
            [
                'label' => 'Wi-Fi',
                'description' => 'Complimentary Wi-Fi is listed for guests.',
            ],
            [
                'label' => 'On-site parking',
                'description' => 'Complimentary self-parking is listed.',
            ],
            [
                'label' => 'Balconies',
                'description' => 'The public listing notes balconies for accommodation units.',
            ],
            [
                'label' => 'Daily housekeeping',
                'description' => 'Daily housekeeping is listed for guest units.',
            ],
        ],
        'listing_note' => 'Facility details come from public booking listings and can change. Please confirm current amenities and breakfast inclusion with the lodge.',
        'rate_note' => 'Rates were shared by the lodge on 25 November 2026 and are in UGX per guest per night. Confirm current rates, meal-plan inclusions and availability directly before booking.',
    ],

    'offers' => [
        [
            'name' => 'Single or Double Room',
            'description' => 'The lodge has confirmed the same nightly rate for single and double rooms.',
            'price' => $roomRate,
            'price_note' => 'per guest per night',
            'price_value' => $roomRateAmount,
            'id' => 'room',
            'image' => 'b1',
            'alt' => 'Single room',
            'link_label' => 'Check availability',
            'href' => '#book',
        ],
        [
            'name' => 'Half Board',
            'description' => 'A half-board rate is available. Ask the lodge which meals and menu options are included.',
            'price' => $halfBoardRate,
            'price_note' => 'per guest per night',
            'price_value' => $halfBoardRateAmount,
            'id' => 'half-board',
            'image' => 'b2',
            'alt' => 'Double room',
            'link_label' => 'Check availability',
            'href' => '#book',
        ],
        [
            'name' => 'Full Board',
            'description' => 'A full-board rate is available. Ask the lodge which meals and menu options are included.',
            'price' => $fullBoardRate,
            'price_note' => 'per guest per night',
            'price_value' => $fullBoardRateAmount,
            'id' => 'full-board',
            'image' => 'cot',
            'alt' => 'Lodge gardens and cottages',
            'link_label' => 'Check availability',
            'href' => '#book',
        ],
    ],

    'facilities' => [
        [
            'name' => 'Restaurant and bar',
            'description' => 'Ask the lodge for current menus, prices and dietary options.',
            'icon' => 'fork',
        ],
        [
            'name' => 'Sauna and steam',
            'description' => 'Confirm availability, session times and access directly with the lodge.',
            'icon' => 'spa',
        ],
        [
            'name' => 'Lobby lounge',
            'description' => 'Contact the lodge to confirm current lounge access and arrangements.',
            'icon' => 'sofa',
        ],
        [
            'name' => 'Conference room',
            'description' => 'Ask about room set-up, equipment, capacity and current venue rates.',
            'icon' => 'users',
        ],
        [
            'name' => 'Party gardens',
            'description' => 'Enquire about date availability, guest capacity and event arrangements.',
            'icon' => 'tree',
        ],
        [
            'name' => 'Camp fire evenings',
            'description' => 'Ask whether a camp fire can be arranged during your visit.',
            'icon' => 'fire',
        ],
    ],

    'events' => [
        [
            'name' => 'Weddings and parties',
            'description' => 'Ask about garden availability, catering options and event pricing.',
            'icon' => 'tree',
        ],
        [
            'name' => 'Conferences',
            'description' => 'Enquire about conference room set-up and accommodation for attendees.',
            'icon' => 'users',
        ],
        [
            'name' => 'Camp fire evenings',
            'description' => 'Contact the lodge to check availability, arrangements and any additional cost.',
            'icon' => 'fire',
        ],
    ],

    'testimonials' => [
        [
            'quote' => 'A quiet, beautiful place. The room was spotless and the sauna was exactly what we needed after the drive.',
            'guest' => 'Amina K., Kampala',
        ],
        [
            'quote' => 'We held our team retreat here. The conference room, the meals and the camp fire evening were perfect.',
            'guest' => 'Daniel M., Mbarara',
        ],
        [
            'quote' => 'The room was comfortable, and the staff could not do enough for us.',
            'guest' => 'Sarah N., Entebbe',
        ],
    ],

    'faqs' => [
        [
            'question' => 'What room types and rates are listed?',
            'answer' => 'Single and double rooms are listed at UGX 200,000 per guest per night. Each room can accommodate a maximum of two guests; confirm room set-up and availability directly with the lodge.',
        ],
        [
            'question' => 'What do half board and full board cost?',
            'answer' => 'The listed rates are UGX 250,000 for half board and UGX 300,000 for full board per guest per night. Ask which meals are included before choosing a plan.',
        ],
        [
            'question' => 'Can I book a room on this website?',
            'answer' => 'The enquiry form estimates the stay in your browser and opens a prefilled WhatsApp message. It does not check live availability or confirm a reservation; the lodge must confirm your dates directly.',
        ],
        [
            'question' => 'What is included in each meal plan?',
            'answer' => 'The exact meals included are not specified here. Contact the lodge to confirm inclusions, serving times and any dietary options.',
        ],
        [
            'question' => 'Where is Ihunde Farm Lodge?',
            'answer' => 'The lodge is located in Nyakasharara, Kiruhura, Uganda. Contact the lodge for route guidance before travelling.',
        ],
    ],

    'footer_links' => [
        'explore' => [
            ['label' => 'Accommodation', 'href' => '/accommodation'],
            ['label' => 'Dining', 'href' => '/dining'],
            ['label' => 'Wellness', 'href' => '/wellness'],
            ['label' => 'Events', 'href' => '/events'],
            ['label' => 'Offers', 'href' => '/offers'],
            ['label' => 'Gallery', 'href' => '/gallery'],
        ],
        'pages' => [
            ['label' => 'Dining', 'href' => '/dining'],
            ['label' => 'Restaurant', 'href' => '/restaurant'],
            ['label' => 'Bar and Lounge', 'href' => '/bar-and-lounge'],
            ['label' => 'Room Service', 'href' => '/room-service'],
            ['label' => 'Menus', 'href' => '/menus'],
            ['label' => 'Single Room', 'href' => '/single-room'],
            ['label' => 'Double Room', 'href' => '/double-room'],
            ['label' => 'Rates and Availability', 'href' => '/rates-and-availability'],
            ['label' => 'Wellness', 'href' => '/wellness'],
            ['label' => 'Events', 'href' => '/events'],
            ['label' => 'Weddings', 'href' => '/weddings'],
            ['label' => 'Conferences and Retreats', 'href' => '/conferences-and-retreats'],
            ['label' => 'Party Gardens', 'href' => '/party-gardens'],
            ['label' => 'Camp Fire Evenings', 'href' => '/camp-fire-evenings'],
            ['label' => 'Offers', 'href' => '/offers'],
            ['label' => 'About', 'href' => '/about'],
            ['label' => 'Gallery', 'href' => '/gallery'],
            ['label' => 'Contact', 'href' => '/contact'],
        ],
        'legal' => [
            ['label' => 'Privacy', 'href' => '/privacy'],
            ['label' => 'Terms', 'href' => '/terms'],
            ['label' => 'Cookies', 'href' => '/cookies'],
            ['label' => 'Sitemap', 'href' => '/sitemap'],
        ],
    ],

    'palette' => [
        ['name' => 'Background', 'value' => '#FAF5F0', 'token' => '--bg'],
        ['name' => 'Surface', 'value' => '#FFFFFF', 'token' => '--surf'],
        ['name' => 'Sand', 'value' => '#F1E4DD', 'token' => '--sand'],
        ['name' => 'Primary burgundy', 'value' => '#6B1F2A', 'token' => '--pri'],
        ['name' => 'Deep burgundy', 'value' => '#4A121B', 'token' => '--deep'],
        ['name' => 'Gold', 'value' => '#B8893B', 'token' => '--acc'],
        ['name' => 'Dark gold', 'value' => '#8A5F16', 'token' => '--acct'],
        ['name' => 'Text', 'value' => '#3A2A2C', 'token' => '--ink'],
        ['name' => 'Gold border', 'value' => 'rgba(184,137,59,.6)', 'token' => '--line'],
    ],
];

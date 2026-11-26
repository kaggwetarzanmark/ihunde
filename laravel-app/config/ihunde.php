<?php

$roomRate = 'UGX 200,000';
$halfBoardRate = 'UGX 250,000';
$fullBoardRate = 'UGX 300,000';

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
        ['label' => 'Facebook', 'icon' => 'fb', 'href' => '#'],
        ['label' => 'Instagram', 'icon' => 'ig', 'href' => '#'],
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
        ['label' => 'Free WiFi', 'icon' => 'wifi'],
        ['label' => 'Safe parking', 'icon' => 'car'],
        ['label' => 'Room service', 'icon' => 'bell'],
        ['label' => 'Sauna and steam', 'icon' => 'spa'],
        ['label' => 'Airport shuttle', 'icon' => 'bus'],
        ['label' => 'Daily breakfast', 'icon' => 'cup'],
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
        'rate_note' => 'Rates shared by the lodge are in UGX per room per night. Meal-plan inclusions and availability should be confirmed directly before booking.',
    ],

    'offers' => [
        [
            'name' => 'Single or Double Room',
            'description' => 'The lodge has confirmed the same nightly rate for single and double rooms.',
            'price' => $roomRate,
            'price_note' => 'per room per night',
            'image' => 'b1',
            'alt' => 'Single room',
            'link_label' => 'Check availability',
            'href' => '#book',
        ],
        [
            'name' => 'Half Board',
            'description' => 'A half-board rate is available. Ask the lodge which meals and menu options are included.',
            'price' => $halfBoardRate,
            'price_note' => 'per room per night',
            'image' => 'b2',
            'alt' => 'Double room',
            'link_label' => 'Check availability',
            'href' => '#book',
        ],
        [
            'name' => 'Full Board',
            'description' => 'A full-board rate is available. Ask the lodge which meals and menu options are included.',
            'price' => $fullBoardRate,
            'price_note' => 'per room per night',
            'image' => 'cot',
            'alt' => 'Lodge gardens and cottages',
            'link_label' => 'Check availability',
            'href' => '#book',
        ],
    ],

    'facilities' => [
        [
            'name' => 'Restaurant and bar',
            'description' => 'Continental, buffet, à la carte, vegetarian and vegan dishes.',
            'icon' => 'fork',
        ],
        [
            'name' => 'Sauna and steam',
            'description' => 'A wellness centre to soften the day.',
            'icon' => 'spa',
        ],
        [
            'name' => 'Lobby lounge',
            'description' => 'A welcoming space to arrive, meet and wait for your shuttle.',
            'icon' => 'sofa',
        ],
        [
            'name' => 'Conference room',
            'description' => 'For workshops, trainings and private retreats.',
            'icon' => 'users',
        ],
        [
            'name' => 'Party gardens',
            'description' => 'Open lawns for weddings and celebrations.',
            'icon' => 'tree',
        ],
        [
            'name' => 'Safe parking',
            'description' => 'Free, secure on-site parking for every guest.',
            'icon' => 'car',
        ],
    ],

    'events' => [
        [
            'name' => 'Weddings and parties',
            'description' => 'Garden space with catering on site.',
            'icon' => 'tree',
        ],
        [
            'name' => 'Conferences',
            'description' => 'A private room with cottages close by.',
            'icon' => 'users',
        ],
        [
            'name' => 'Camp fire evenings',
            'description' => 'Gather by the fire after dinner.',
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
            'question' => 'What time are check-in and check-out?',
            'answer' => 'Check-in is from 2:00 PM and check-out is by 11:00 AM. Early arrival or late departure can be arranged on request.',
        ],
        [
            'question' => 'Is there an airport shuttle?',
            'answer' => 'Yes. Shuttle transfers are available on request. Share your flight details when you book.',
        ],
        [
            'question' => 'Is parking available?',
            'answer' => 'Free, secure parking is available on site for all guests.',
        ],
        [
            'question' => 'Do you host weddings and conferences?',
            'answer' => 'Yes. We have party gardens and a conference room. Contact us for a quote.',
        ],
        [
            'question' => 'Are children welcome?',
            'answer' => 'Please contact the lodge to confirm room suitability for children.',
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
            ['label' => 'Single Room', 'href' => '/single-room'],
            ['label' => 'Double Room', 'href' => '/double-room'],
            ['label' => 'Rates and Availability', 'href' => '/rates-and-availability'],
            ['label' => 'Restaurant', 'href' => '/restaurant'],
            ['label' => 'Bar and Lounge', 'href' => '/bar-and-lounge'],
            ['label' => 'Room Service', 'href' => '/room-service'],
            ['label' => 'Menus', 'href' => '/menus'],
            ['label' => 'Weddings', 'href' => '/weddings'],
            ['label' => 'Conferences and Retreats', 'href' => '/conferences-and-retreats'],
            ['label' => 'Party Gardens', 'href' => '/party-gardens'],
            ['label' => 'Camp Fire Evenings', 'href' => '/camp-fire-evenings'],
        ],
        'legal' => [
            ['label' => 'Privacy Policy', 'href' => '#'],
            ['label' => 'Terms', 'href' => '#'],
            ['label' => 'Cookies', 'href' => '/cookies'],
            ['label' => 'Sitemap', 'href' => '#'],
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

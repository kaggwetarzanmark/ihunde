<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;

class HotelPagesTest extends TestCase
{
    public function test_homepage_renders_the_burgundy_lodge_sections(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('data-v="e"', false)
            ->assertSee('Ihunde Farm Lodge in Kiruhura')
            ->assertSee('Where you will stay')
            ->assertSee('Dine, unwind, gather')
            ->assertSee('Good to know');
    }

    public function test_homepage_shows_the_confirmed_room_types_and_rates(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Single room')
            ->assertSee('Double room')
            ->assertSee('View room details')
            ->assertSee('Half Board')
            ->assertSee('Full Board')
            ->assertSee('UGX 200,000')
            ->assertSee('UGX 250,000')
            ->assertSee('UGX 300,000')
            ->assertDontSee('Family room')
            ->assertDontSee('UGX 450,000');
    }

    public function test_site_shows_the_current_lodge_contact_details(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('+256 790 000 040')
            ->assertSee('tel:+256790000040')
            ->assertSee('WhatsApp +256 790 000 030')
            ->assertSee('https://wa.me/256790000030')
            ->assertSee('Ihundefarlodge@gmail.com')
            ->assertSee('mailto:Ihundefarlodge@gmail.com');
    }

    public function test_floating_whatsapp_button_uses_the_lodge_contact_on_all_pages(): void
    {
        $paths = [
            '/',
            '/design-system',
            '/cookies',
            '/accommodation',
            '/single-room',
            '/double-room',
            '/rates-and-availability',
            '/booking',
            '/dining',
            '/restaurant',
            '/bar-and-lounge',
            '/room-service',
            '/menus',
            '/events',
            '/weddings',
            '/conferences-and-retreats',
            '/party-gardens',
            '/camp-fire-evenings',
            '/wellness',
            '/offers',
            '/about',
            '/contact',
            '/gallery',
            '/privacy',
            '/terms',
            '/sitemap',
        ];

        foreach ($paths as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('class="whatsapp-float"', false)
                ->assertSee('https://wa.me/256790000030')
                ->assertSee('aria-label="Chat with Ihunde Farm Lodge on WhatsApp"', false);
        }
    }

    public function test_accommodation_pages_show_confirmed_rates_and_public_listing_details(): void
    {
        $this->get('/accommodation')
            ->assertOk()
            ->assertSee('Stay in Kiruhura')
            ->assertSee('Nyakasharara, Kiruhura, Uganda')
            ->assertSee('Continental breakfast')
            ->assertSee('7:00 AM to 10:00 AM')
            ->assertSee('Complimentary Wi-Fi')
            ->assertSee('current amenities and breakfast inclusion');

        $this->get('/single-room')
            ->assertOk()
            ->assertSee('Single room')
            ->assertSee('UGX 200,000')
            ->assertSee('Per guest per night.')
            ->assertSee('bed arrangement and guest capacity');

        $this->get('/double-room')
            ->assertOk()
            ->assertSee('Double room')
            ->assertSee('UGX 200,000')
            ->assertSee('Per guest per night.')
            ->assertSee('maximum occupancy');

        $this->get('/rates-and-availability')
            ->assertOk()
            ->assertSee('UGX 250,000')
            ->assertSee('UGX 300,000')
            ->assertSee('UGX · per guest per night')
            ->assertSee('exact meals included');
    }

    public function test_lodging_structured_data_has_a_valid_schema_context(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('"@context":"https://schema.org"', false);
    }

    public function test_booking_enquiry_is_frontend_only_and_limits_each_room_to_two_guests(): void
    {
        foreach (['/', '/booking'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('id="guests-per-room"', false)
                ->assertSee('<option value="1">1 guest</option>', false)
                ->assertSee('<option value="2">2 guests</option>', false)
                ->assertDontSee('<option value="3"', false)
                ->assertDontSee('booking/availability', false)
                ->assertSee('data-rate="200000"', false)
                ->assertSee('data-rate="250000"', false)
                ->assertSee('data-rate="300000"', false)
                ->assertSee('Each room accommodates a maximum of two guests')
                ->assertSee('id="booking-estimate"', false)
                ->assertSee('Send enquiry on WhatsApp')
                ->assertSee('not a live availability check or confirmed reservation');
        }

        $this->get('/booking')
            ->assertOk()
            ->assertSee('Plan your stay')
            ->assertDontSee('<meta name="robots" content="noindex,follow">', false)
            ->assertSee('name="guest_name"', false)
            ->assertSee('name="guest_phone"', false)
            ->assertSee('name="guest_email"', false);
    }

    public function test_design_system_preview_renders(): void
    {
        $this->get('/design-system')
            ->assertOk()
            ->assertSee('Design system')
            ->assertSee('--pri')
            ->assertSee('Room cards');
    }

    public function test_cookie_notice_and_policy_explain_essential_cookies(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('cookie-notice', false)
            ->assertSee('essential cookies')
            ->assertSee('/cookies');

        $this->get('/cookies')
            ->assertOk()
            ->assertSee('Cookie information')
            ->assertSee('does not currently use analytics or advertising cookies');
    }

    public function test_navigation_links_are_flat_and_point_to_pages(): void
    {
        foreach (['navigation', 'mobile_navigation'] as $menuName) {
            $menu = config("ihunde.{$menuName}");
            $labels = array_column($menu, 'label');

            $this->assertContains('Accommodation', $labels);

            foreach ($menu as $item) {
                $this->assertSame([], $item['children']);
                $this->assertStringStartsWith('/', $item['href']);
            }
        }
    }

    public function test_non_home_pages_use_the_solid_header_by_default(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<header id="hd" class="hd">', false)
            ->assertSee('data-homepage="true"', false);

        $this->get('/accommodation')
            ->assertOk()
            ->assertSee('<header id="hd" class="hd solid">', false)
            ->assertSee('data-homepage="false"', false);
    }

    public function test_service_and_information_pages_render_distinct_content(): void
    {
        foreach (config('ihunde_pages') as $slug => $page) {
            $this->get("/{$slug}")
                ->assertOk()
                ->assertSee('<main id="main" class="stay-page content-page">', false)
                ->assertSee($page['title'])
                ->assertSee($page['intro'])
                ->assertSee($page['meta_title'])
                ->assertSee($page['meta_description'])
                ->assertSee('Information on this page is provided by Ihunde Farm Lodge')
                ->assertSee('application/ld+json')
                ->assertSee('canonical');
        }
    }

    public function test_homepage_uses_local_search_content_without_sample_testimonials(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Ihunde Farm Lodge in Kiruhura')
            ->assertSee('name="description"', false)
            ->assertSee('Nyakasharara, Kiruhura, Uganda')
            ->assertDontSee('Amina K., Kampala')
            ->assertDontSee('airport shuttle')
            ->assertDontSee('A quiet, beautiful place');
    }

    public function test_booking_form_validates_dates_and_does_not_claim_to_book(): void
    {
        $checkIn = Carbon::today()->addDays(2);
        $checkOut = $checkIn->copy()->addDay();

        $this->from('/')
            ->post('/booking/availability', [
                'check_in' => $checkIn->toDateString(),
                'check_out' => $checkOut->toDateString(),
                'guests' => '2',
            ])
            ->assertRedirect('/')
            ->assertSessionHas(
                'booking_status',
                'Availability checks are not connected yet. No booking request was sent; please contact the lodge to confirm.'
            );
    }

    public function test_booking_form_rejects_checkout_before_checkin(): void
    {
        $checkIn = Carbon::today()->addDays(2);

        $this->from('/')
            ->post('/booking/availability', [
                'check_in' => $checkIn->toDateString(),
                'check_out' => $checkIn->toDateString(),
                'guests' => '2',
            ])
            ->assertRedirect('/')
            ->assertSessionHasErrorsIn('booking', ['check_out']);
    }

    public function test_newsletter_form_does_not_claim_to_subscribe(): void
    {
        $this->from('/')
            ->post('/newsletter', ['email' => 'guest@example.com'])
            ->assertRedirect('/')
            ->assertSessionHas(
                'newsletter_status',
                'Newsletter sign-up is not connected yet. No subscription was created.'
            );
    }
}

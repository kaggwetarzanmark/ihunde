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
            ->assertSee('Comfort that goes beyond')
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
            ->assertSee('bed arrangement and guest capacity');

        $this->get('/double-room')
            ->assertOk()
            ->assertSee('Double room')
            ->assertSee('UGX 200,000')
            ->assertSee('maximum occupancy');

        $this->get('/rates-and-availability')
            ->assertOk()
            ->assertSee('UGX 250,000')
            ->assertSee('UGX 300,000')
            ->assertSee('exact meals included');
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

    public function test_placeholder_pages_render_with_the_shared_shell_and_empty_content(): void
    {
        $slugs = [
            'dining',
            'restaurant',
            'bar-and-lounge',
            'room-service',
            'menus',
            'events',
            'weddings',
            'conferences-and-retreats',
            'party-gardens',
            'camp-fire-evenings',
            'wellness',
            'offers',
            'about',
            'contact',
            'gallery',
        ];

        foreach ($slugs as $slug) {
            $this->get("/{$slug}")
                ->assertOk()
                ->assertSee('<main id="main" class="empty-page"></main>', false)
                ->assertSee('Stay in the loop')
                ->assertSee('Pages');
        }
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

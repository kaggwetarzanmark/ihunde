<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormStatusController extends Controller
{
    public function availability(Request $request): RedirectResponse
    {
        $request->validateWithBag('booking', [
            'check_in' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'check_out' => ['required', 'date_format:Y-m-d', 'after:check_in'],
            'guests' => ['required', 'in:1,2,3,4+'],
        ]);

        return back()->with(
            'booking_status',
            'Availability checks are not connected yet. No booking request was sent; please contact the lodge to confirm.'
        );
    }

    public function subscribe(Request $request): RedirectResponse
    {
        $request->validateWithBag('newsletter', [
            'email' => ['required', 'email'],
        ]);

        return back()->with(
            'newsletter_status',
            'Newsletter sign-up is not connected yet. No subscription was created.'
        );
    }
}

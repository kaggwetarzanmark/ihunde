<form
    id="book"
    class="book booking-form"
    data-whatsapp-url="{{ config('ihunde.contact.whatsapp_href') }}"
    aria-labelledby="booking-form-title"
>
    <div class="booking-form-heading">
        <h2 id="booking-form-title">Plan your stay</h2>
        <p>Each room accommodates a maximum of two guests. Rates are per guest per night.</p>
    </div>

    <div class="booking-field">
        <label for="ci">Check-in</label>
        <input id="ci" name="check_in" type="date" min="{{ now()->toDateString() }}" required>
    </div>
    <div class="booking-field">
        <label for="co">Check-out</label>
        <input id="co" name="check_out" type="date" min="{{ now()->addDay()->toDateString() }}" required>
    </div>
    <div class="booking-field">
        <label for="room-type">Room type</label>
        <select id="room-type" name="room_type" required>
            <option value="Single room">Single room</option>
            <option value="Double room">Double room</option>
        </select>
    </div>
    <div class="booking-field">
        <label for="rooms">Number of rooms</label>
        <input id="rooms" name="rooms" type="number" min="1" step="1" value="1" required>
    </div>
    <div class="booking-field">
        <label for="guests-per-room">Guests per room</label>
        <select id="guests-per-room" name="guests_per_room" required>
            <option value="1">1 guest</option>
            <option value="2">2 guests</option>
        </select>
    </div>
    <div class="booking-field">
        <label for="rate-plan">Rate plan</label>
        <select id="rate-plan" name="rate_plan" required>
            @foreach (config('ihunde.offers') as $offer)
                <option value="{{ $offer['id'] }}" data-rate="{{ $offer['price_value'] }}">
                    {{ $offer['name'] }} — {{ $offer['price'] }} per guest/night
                </option>
            @endforeach
        </select>
    </div>
    <div class="booking-field">
        <label for="guest-name">Your name</label>
        <input id="guest-name" name="guest_name" type="text" autocomplete="name" required>
    </div>
    <div class="booking-field">
        <label for="guest-phone">Phone number</label>
        <input id="guest-phone" name="guest_phone" type="tel" autocomplete="tel" required>
    </div>
    <div class="booking-field">
        <label for="guest-email">Email (optional)</label>
        <input id="guest-email" name="guest_email" type="email" autocomplete="email">
    </div>

    <div class="booking-form-summary">
        <div>
            <p class="booking-total-label">Estimated total</p>
            <p id="booking-estimate" class="booking-total" aria-live="polite" aria-atomic="true">
                Choose your dates to calculate an estimate.
            </p>
            <p class="booking-disclaimer">
                This is an estimate, not a live availability check or confirmed reservation. Meal inclusions and final pricing must be confirmed by the lodge.
            </p>
        </div>
        <a
            id="booking-whatsapp"
            class="btn"
            href="{{ config('ihunde.contact.whatsapp_href') }}?text={{ urlencode('Hello Ihunde Farm Lodge, I would like to enquire about room availability and rates.') }}"
            target="_blank"
            rel="noopener noreferrer"
        >Send enquiry on WhatsApp</a>
    </div>
</form>

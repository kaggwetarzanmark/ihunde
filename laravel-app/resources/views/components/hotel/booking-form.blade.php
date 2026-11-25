<form id="book" class="book" action="{{ route('booking.availability') }}" method="POST">
    @csrf
    <div>
        <label for="ci">Check in</label>
        <input
            id="ci"
            name="check_in"
            type="date"
            value="{{ old('check_in') }}"
            min="{{ now()->toDateString() }}"
            required
            @error('check_in', 'booking') aria-invalid="true" @enderror
        >
    </div>
    <div>
        <label for="co">Check out</label>
        <input
            id="co"
            name="check_out"
            type="date"
            value="{{ old('check_out') }}"
            min="{{ now()->addDay()->toDateString() }}"
            required
            @error('check_out', 'booking') aria-invalid="true" @enderror
        >
    </div>
    <div>
        <label for="g">Guests</label>
        <select id="g" name="guests" required @error('guests', 'booking') aria-invalid="true" @enderror>
            <option value="1" @selected(old('guests', '1') === '1')>1 guest</option>
            <option value="2" @selected(old('guests') === '2')>2 guests</option>
            <option value="3" @selected(old('guests') === '3')>3 guests</option>
            <option value="4+" @selected(old('guests') === '4+')>4 or more</option>
        </select>
    </div>
    <button class="btn" type="submit">Check availability</button>
    <div class="form-feedback" aria-live="polite">
        @if (session('booking_status'))
            <p class="form-status" role="status">{{ session('booking_status') }}</p>
        @endif
        @error('check_in', 'booking')
            <p class="form-error" role="alert">{{ $message }}</p>
        @enderror
        @error('check_out', 'booking')
            <p class="form-error" role="alert">{{ $message }}</p>
        @enderror
        @error('guests', 'booking')
            <p class="form-error" role="alert">{{ $message }}</p>
        @enderror
    </div>
</form>

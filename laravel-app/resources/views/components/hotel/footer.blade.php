<footer class="ft">
    <div class="nl">
        <div class="wrap">
            <div>
                <h3>Stay in the loop</h3>
                <p>Seasonal offers, event dates and news from the lodge.</p>
            </div>
            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <label class="sr" for="em">Email address</label>
                <input
                    id="em"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    placeholder="Your email address"
                    autocomplete="email"
                    required
                    @error('email', 'newsletter') aria-invalid="true" @enderror
                >
                <button class="btn" type="submit">Subscribe</button>
                <div class="form-feedback" aria-live="polite">
                    @if (session('newsletter_status'))
                        <p class="form-status" role="status">{{ session('newsletter_status') }}</p>
                    @endif
                    @error('email', 'newsletter')
                        <p class="form-error" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    <div class="wrap fg">
        <div>
            <a class="brand" href="{{ route('home') }}#top">
                <img src="{{ asset('images/ihunde-logo.jpg') }}" alt="Ihunde Farm Lodge logo">
                <span>
                    Ihunde
                    <small>Farm Lodge</small>
                </span>
            </a>
            <p>A quiet farm lodge in Kiruhura with private cottages, a spa, restaurant and gardens. Comfort that goes beyond.</p>
            <div class="soc" aria-label="Social media">
                @foreach (config('ihunde.socials') as $social)
                    <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}">
                        <x-hotel.icon :name="$social['icon']" />
                    </a>
                @endforeach
            </div>
        </div>
        <div>
            <h4>Explore</h4>
            <ul>
                @foreach (config('ihunde.footer_links.explore') as $link)
                    <li><a href="{{ route('home') . $link['href'] }}">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h4>Pages</h4>
            <ul>
                @foreach (config('ihunde.footer_links.pages') as $link)
                    <li><a href="{{ route('home') . $link['href'] }}">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="ct">
            <h4>Contact</h4>
            <div>
                <x-hotel.icon name="pin" />
                <span>Ihunde Farm Lodge<br>{{ config('ihunde.contact.location') }}</span>
            </div>
            <div>
                <x-hotel.icon name="phone" />
                <a href="{{ config('ihunde.contact.phone_href') }}">{{ config('ihunde.contact.phone') }}</a>
            </div>
            <div>
                <x-hotel.icon name="mail" />
                <a href="mailto:{{ config('ihunde.contact.email') }}">{{ config('ihunde.contact.email') }}</a>
            </div>
            <div>
                <x-hotel.icon name="clock" />
                <span>{{ config('ihunde.contact.reception') }}<br>{{ config('ihunde.contact.restaurant_hours') }}</span>
            </div>
        </div>
    </div>
    <div class="wrap fbar">
        <span>© 2026 Ihunde Farm Lodge. All rights reserved.</span>
        <span>
            @foreach (config('ihunde.footer_links.legal') as $link)
                <a href="{{ route('home') . $link['href'] }}">{{ $link['label'] }}</a>
            @endforeach
        </span>
        <a href="{{ route('home') }}#top">Back to top</a>
    </div>
</footer>

<footer class="ft">
    <div class="nl">
        <div class="wrap">
            <div>
                <h3>Need current details?</h3>
                <p>Ask about room availability, meal plans, restaurant service or event arrangements.</p>
            </div>
            <a class="btn" href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">Message the lodge</a>
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
            <p>Lodge accommodation and event enquiries in Nyakasharara, Kiruhura, Uganda.</p>
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
                <x-hotel.icon name="wa" />
                <a href="{{ config('ihunde.contact.whatsapp_href') }}" target="_blank" rel="noopener noreferrer">
                    WhatsApp {{ config('ihunde.contact.whatsapp_phone') }}
                </a>
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

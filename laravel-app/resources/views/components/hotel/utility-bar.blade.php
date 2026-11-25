<div class="util">
    <div class="wrap">
        <div class="l">
            <span>
                <a href="{{ config('ihunde.contact.phone_href') }}">
                    <x-hotel.icon name="phone" />
                    {{ config('ihunde.contact.phone') }}
                </a>
            </span>
            <span>
                <a href="mailto:{{ config('ihunde.contact.email') }}">
                    <x-hotel.icon name="mail" />
                    {{ config('ihunde.contact.email') }}
                </a>
            </span>
            <span>
                <x-hotel.icon name="clock" />
                {{ config('ihunde.contact.reception') }}
            </span>
        </div>
        <div class="soc" aria-label="Social media">
            @foreach (config('ihunde.socials') as $social)
                <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}">
                    <x-hotel.icon :name="$social['icon']" />
                </a>
            @endforeach
        </div>
    </div>
</div>

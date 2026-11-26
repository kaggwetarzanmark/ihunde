# Ihunde Farm Lodge Design System

The homepage and `/design-system` preview use the burgundy and gold theme from
the source HTML's `data-v="e"` design. The original source file remains
unchanged. Its embedded photographs, logo and SVG symbol sprite are extracted
under `public/images` and the reusable Blade component views.

## Colour tokens

The active theme defines these CSS custom properties in
`resources/css/ihunde.css`:

| Token | Value | Use |
| --- | --- | --- |
| `--bg` | `#FAF5F0` | Warm ivory page background |
| `--surf` | `#FFFFFF` | Cards and form surfaces |
| `--sand` | `#F1E4DD` | Soft section background |
| `--pri` | `#6B1F2A` | Primary burgundy |
| `--deep` | `#4A121B` | Deep burgundy footer |
| `--acc` | `#B8893B` | Gold accents |
| `--acct` | `#8A5F16` | Dark gold text and icons |
| `--ink` | `#3A2A2C` | Body text |
| `--line` | `rgba(184,137,59,.6)` | Gold borders |

The hero uses the source image `ihunde-hero-burgundy.jpg` and the original
burgundy overlay. The events section and image cards use the other extracted
source photographs in `public/images`.

## Typography

The layout loads the exact Google Fonts families and weights specified in the
source:

- **Jost** (300, 400, 500): body copy, navigation, buttons and form controls.
- **Playfair Display** (500, 600): headings and the active theme's display face.
- **Cormorant Garamond** (500, 600) and **DM Serif Display**: retained because
  the original design declares them for its alternate theme definitions.

The active burgundy theme uses Playfair Display for headings and Jost for body
text. Font loading requires access to Google Fonts; system serif/sans-serif
fallbacks remain in the stylesheet.

## Typography and spacing

- Body: `17.5px`, weight `300`, line-height `1.75`.
- Headings: weight `500`, line-height `1.1`; responsive hero title uses
  `clamp(46px, 7vw, 104px)`.
- Main content container: `1180px` maximum width with `28px` side padding.
- Header content: `1280px` maximum width.
- Standard section spacing: `104px` vertical; the final CTA uses `110px`.
- The introduction uses an `80px` desktop column gap and `48px` when stacked.
- Buttons use uppercase Jost, `12.5px`, weight `500`, `0.16em` letter spacing
  and `16px 34px` padding.

## Responsive rules

The original CSS breakpoints are retained:

- `1120px`: desktop navigation collapses to the mobile menu.
- `900px`: offer, testimonial and footer grids reflow.
- `860px`: introduction, room cards and facilities become single-column.
- `820px`: booking fields reflow to two columns.
- `760px`: amenity grid and utility bar adapt for small screens.
- `560px`: compact header and footer behavior.
- `prefers-reduced-motion`: disables hero entrance animation.

## Blade components

Components live under `resources/views/components/hotel` and are namespaced
as `<x-hotel.* />`.

| Component | Purpose | Main input |
| --- | --- | --- |
| `header` | Utility bar, desktop and mobile navigation | Site config |
| `mobile-navigation` | Responsive full-screen menu | `config/ihunde.php` |
| `desktop-navigation` | Dropdown navigation | `config/ihunde.php` |
| `footer` | Newsletter form, site links and contact details | Site config |
| `icon` | Reusable SVG symbol | `name` |
| `button` | Branded link button | `href`, slot, optional classes |
| `section-heading` | Centered section title and description | `title`, `description` |
| `booking-form` | Date and guest fields with validation feedback | Booking route |
| `room-card` | Room image card and feature icons | `room` array |
| `offer-card` | Offer image, description, price and link | `offer` array |
| `facility-card` | Facility icon, name and description | `facility` array |
| `event-list-item` | Event icon, name and description | `event` array |
| `testimonial-card` | Five-star guest quote | `testimonial` array |
| `faq-item` | Native accessible disclosure | `faq` array |

Page copy, navigation, client-provided room rates, sample content and palette
previews are centralized in `config/ihunde.php`. The homepage and design-system
preview both render the same components and data.

Navigation links are flat. The accommodation overview, single-room,
double-room, and rates-and-availability routes contain room and pricing
information. Room types and nightly rates were supplied by the lodge contact;
amenities and breakfast times are attributed to public booking listings and
should be reconfirmed with the lodge. Dining, wellness, events, offers, about,
contact and gallery routes remain empty placeholders. All pages retain the
shared site header and footer. The home page keeps its transparent header at
the top; other pages start with the compact sticky header.

## Forms and content needing confirmation

The booking availability and newsletter routes validate submissions, but do
not persist, send, or create bookings/subscriptions. Their responses state
this explicitly. Connecting a booking inventory or newsletter provider is
future backend work.

The cookie notice uses an essential-only preference cookie to remember when it
has been dismissed. The site currently has no analytics or advertising cookies.

The supplied HTML labels its reviews as samples. The following source values
also need confirmation before the site is used publicly:

- Half-board and full-board menu inclusions.
- Guest names and testimonials.
- Opening hours, facility descriptions and social profile URLs.
- Links for future pages and legal documents.

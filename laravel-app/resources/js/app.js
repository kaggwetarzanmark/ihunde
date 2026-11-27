const header = document.getElementById('hd');
const mobileMenu = document.getElementById('mnav');
const menuOpenButton = document.querySelector('[data-m="open"]');
const menuCloseButton = document.querySelector('[data-m="close"]');
const isHomePage = document.body.dataset.homepage === 'true';
const cookieNotice = document.getElementById('cookie-notice');
const cookieDismissButton = document.querySelector('[data-cookie-dismiss]');
const cookieNoticeValue = 'ihunde_cookie_notice=acknowledged';

function updateHeader() {
    header?.classList.toggle('solid', !isHomePage || window.scrollY > 60);
}

function setMobileMenuOpen(isOpen) {
    if (!mobileMenu || !menuOpenButton) return;

    mobileMenu.classList.toggle('open', isOpen);
    mobileMenu.setAttribute('aria-hidden', String(!isOpen));
    mobileMenu.inert = !isOpen;
    menuOpenButton.setAttribute('aria-expanded', String(isOpen));

    if (isOpen) {
        menuCloseButton?.focus();
    } else {
        menuOpenButton.focus();
    }
}

updateHeader();
window.addEventListener('scroll', updateHeader, { passive: true });

menuOpenButton?.addEventListener('click', () => setMobileMenuOpen(true));
menuCloseButton?.addEventListener('click', () => setMobileMenuOpen(false));

mobileMenu?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMobileMenuOpen(false));
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && mobileMenu?.classList.contains('open')) {
        setMobileMenuOpen(false);
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth > 1120 && mobileMenu?.classList.contains('open')) {
        setMobileMenuOpen(false);
    }
});

const checkIn = document.getElementById('ci');
const checkOut = document.getElementById('co');
const bookingForm = document.getElementById('book');
const bookingEstimate = document.getElementById('booking-estimate');
const bookingWhatsApp = document.getElementById('booking-whatsapp');
const bookingRooms = document.getElementById('rooms');
const bookingGuestsPerRoom = document.getElementById('guests-per-room');
const bookingRoomType = document.getElementById('room-type');
const bookingRatePlan = document.getElementById('rate-plan');
const bookingGuestName = document.getElementById('guest-name');
const bookingGuestPhone = document.getElementById('guest-phone');
const bookingGuestEmail = document.getElementById('guest-email');

function updateCheckOutMinimum() {
    if (!checkIn || !checkOut || !checkIn.value) return;

    const earliestCheckOut = new Date(`${checkIn.value}T00:00:00`);
    earliestCheckOut.setDate(earliestCheckOut.getDate() + 1);
    checkOut.min = [
        earliestCheckOut.getFullYear(),
        String(earliestCheckOut.getMonth() + 1).padStart(2, '0'),
        String(earliestCheckOut.getDate()).padStart(2, '0'),
    ].join('-');

    if (checkOut.value && checkOut.value < checkOut.min) {
        checkOut.value = '';
    }
}

function formatBookingDate(value) {
    return new Date(`${value}T00:00:00`).toLocaleDateString('en-UG', {
        day: 'numeric',
        month: 'short',
        year: 'numeric',
    });
}

function resetBookingWhatsApp() {
    if (!bookingForm || !bookingWhatsApp) return;

    const whatsappUrl = new URL(bookingForm.dataset.whatsappUrl);
    whatsappUrl.searchParams.set(
        'text',
        'Hello Ihunde Farm Lodge, I would like to enquire about room availability and rates.'
    );
    bookingWhatsApp.href = whatsappUrl.toString();
}

function updateBookingDetails() {
    if (!bookingForm || !bookingEstimate || !bookingWhatsApp || !checkIn || !checkOut) return;

    resetBookingWhatsApp();
    bookingRooms.setCustomValidity('');

    if (!checkIn.value || !checkOut.value) {
        bookingEstimate.textContent = 'Choose your dates to calculate an estimate.';
        return;
    }

    const nights = (Date.parse(`${checkOut.value}T00:00:00Z`) - Date.parse(`${checkIn.value}T00:00:00Z`)) / 86400000;
    const rooms = Number(bookingRooms.value);
    const guestsPerRoom = Number(bookingGuestsPerRoom.value);
    const selectedRate = bookingRatePlan.selectedOptions[0];
    const rate = Number(selectedRate.dataset.rate);
    const guests = rooms * guestsPerRoom;
    const total = nights * guests * rate;

    if (!Number.isInteger(nights) || nights < 1 || !Number.isSafeInteger(rooms) || rooms < 1 ||
        !Number.isSafeInteger(guests) || !Number.isSafeInteger(total)) {
        bookingRooms.setCustomValidity('Enter a smaller, whole number of rooms to calculate this estimate.');
        bookingEstimate.textContent = 'Check your stay details to calculate an estimate.';
        return;
    }

    const formattedTotal = new Intl.NumberFormat('en-US', { maximumFractionDigits: 0 }).format(total);
    bookingEstimate.textContent = `UGX ${formattedTotal} · ${nights} ${nights === 1 ? 'night' : 'nights'} · ${guests} ${guests === 1 ? 'guest' : 'guests'}`;

    if (!bookingForm.checkValidity()) return;

    const message = [
        'Hello Ihunde Farm Lodge, I would like to enquire about a stay.',
        `Name: ${bookingGuestName.value.trim()}`,
        `Phone: ${bookingGuestPhone.value.trim()}`,
        bookingGuestEmail.value.trim() ? `Email: ${bookingGuestEmail.value.trim()}` : null,
        `Check-in: ${formatBookingDate(checkIn.value)}`,
        `Check-out: ${formatBookingDate(checkOut.value)}`,
        `Nights: ${nights}`,
        `Room: ${bookingRoomType.value} × ${rooms}`,
        `Guests per room: ${guestsPerRoom} (${guests} total)`,
        `Rate plan: ${selectedRate.textContent.trim()}`,
        `Estimated total: UGX ${formattedTotal}`,
        'Please confirm availability, meal inclusions and the final price. This is an enquiry, not a confirmed booking.',
    ].filter(Boolean).join('\n');

    const whatsappUrl = new URL(bookingForm.dataset.whatsappUrl);
    whatsappUrl.searchParams.set('text', message);
    bookingWhatsApp.href = whatsappUrl.toString();
}

if (bookingForm) {
    updateCheckOutMinimum();
    updateBookingDetails();

    checkIn?.addEventListener('change', () => {
        updateCheckOutMinimum();
        updateBookingDetails();
    });
    bookingForm.addEventListener('input', updateBookingDetails);
    bookingForm.addEventListener('change', updateBookingDetails);
    bookingForm.addEventListener('submit', (event) => event.preventDefault());
    bookingWhatsApp?.addEventListener('click', (event) => {
        if (!bookingForm.checkValidity()) {
            event.preventDefault();
            bookingForm.reportValidity();
        }
    });
}

if (cookieNotice && !document.cookie.split(';').some((cookie) => cookie.trim() === cookieNoticeValue)) {
    cookieNotice.hidden = false;
    document.body.classList.add('cookie-notice-visible');
}

cookieDismissButton?.addEventListener('click', () => {
    if (!cookieNotice) return;

    const secureAttribute = window.location.protocol === 'https:' ? '; Secure' : '';
    document.cookie = `${cookieNoticeValue}; Max-Age=31536000; Path=/; SameSite=Lax${secureAttribute}`;
    cookieNotice.hidden = true;
    document.body.classList.remove('cookie-notice-visible');
});

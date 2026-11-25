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

updateCheckOutMinimum();
checkIn?.addEventListener('change', updateCheckOutMinimum);

if (cookieNotice && !document.cookie.split(';').some((cookie) => cookie.trim() === cookieNoticeValue)) {
    cookieNotice.hidden = false;
}

cookieDismissButton?.addEventListener('click', () => {
    if (!cookieNotice) return;

    const secureAttribute = window.location.protocol === 'https:' ? '; Secure' : '';
    document.cookie = `${cookieNoticeValue}; Max-Age=31536000; Path=/; SameSite=Lax${secureAttribute}`;
    cookieNotice.hidden = true;
});

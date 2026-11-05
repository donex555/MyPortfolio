/**
 * script.js
 * 1. Hamburger menu
 * 2. Floating back-to-top button
 * 3. Homepage reveal animations
 * 4. Gallery reveal animations + image preview (lightbox)
 */

// Tells header.php that this script loaded fine (see the safety timer there).
document.documentElement.classList.add('script-ready');

// ---------- 1. Hamburger menu ----------
const menuToggle = document.getElementById('menuToggle');
const siteMenu = document.getElementById('siteMenu');

function setMenuOpen(isOpen) {
    siteMenu.classList.toggle('is-open', isOpen);
    menuToggle.classList.toggle('is-open', isOpen);
    menuToggle.setAttribute('aria-expanded', String(isOpen));
    menuToggle.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
}

menuToggle.addEventListener('click', () => {
    setMenuOpen(!siteMenu.classList.contains('is-open'));
});

// Close the menu after picking a link (important on mobile).
siteMenu.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenuOpen(false));
});

// Close with the Escape key.
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setMenuOpen(false);
});

// If the window grows to desktop size, close the mobile menu.
window.matchMedia('(min-width: 769px)').addEventListener('change', (event) => {
    if (event.matches) setMenuOpen(false);
});

// ---------- 2. Back to top: floating button, scrolls to the top of the current page ----------
const backToTop = document.getElementById('backToTop');

backToTop.addEventListener('click', (event) => {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Show the button only after scrolling down a bit.
function updateBackToTop() {
    backToTop.classList.toggle('is-visible', window.scrollY > 300);
}
window.addEventListener('scroll', updateBackToTop, { passive: true });
updateBackToTop();

// ---------- 3. Homepage: reveal each section's layers when it appears ----------
const homeSections = document.querySelectorAll('.home-section');

function showLayers(section) {
    section.classList.add('is-shown'); // starts the slam + rattle in section 2
    section.querySelectorAll('.reveal').forEach((item) => item.classList.add('is-visible'));
}

if (homeSections.length > 0) {
    if ('IntersectionObserver' in window) {
        const sectionObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    showLayers(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        homeSections.forEach((section) => sectionObserver.observe(section));
    } else {
        homeSections.forEach(showLayers); // very old browsers: just show everything
    }
}

// ---------- 4a. Gallery pages: reveal titles and artworks as they scroll into view ----------
const galleryItems = document.querySelectorAll('.gallery-title, .art-item');

if (galleryItems.length > 0) {
    if ('IntersectionObserver' in window) {
        const galleryObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        galleryItems.forEach((item) => galleryObserver.observe(item));
    } else {
        galleryItems.forEach((item) => item.classList.add('is-visible'));
    }
}

// ---------- 4b. Gallery pages: image preview (lightbox) ----------
const lightbox = document.getElementById('lightbox');

if (lightbox) {
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');
    const artItems = Array.from(document.querySelectorAll('.art-item'));
    let currentIndex = 0;
    let lastFocusedElement = null;

    // Show the image at a position in the list (wraps around at the ends).
    function showImage(index) {
        currentIndex = (index + artItems.length) % artItems.length;
        const item = artItems[currentIndex];
        lightboxImage.src = item.dataset.full;
        lightboxImage.alt = item.querySelector('img').alt;
    }

    function openLightbox(index) {
        lastFocusedElement = document.activeElement;
        showImage(index);
        lightbox.hidden = false;
        document.body.classList.add('lightbox-open');
        lightboxClose.focus();
    }

    function closeLightbox() {
        lightbox.hidden = true;
        document.body.classList.remove('lightbox-open');
        lightboxImage.removeAttribute('src');
        if (lastFocusedElement) lastFocusedElement.focus();
    }

    artItems.forEach((item, index) => item.addEventListener('click', () => openLightbox(index)));
    lightboxClose.addEventListener('click', closeLightbox);
    lightboxPrev.addEventListener('click', () => showImage(currentIndex - 1));
    lightboxNext.addEventListener('click', () => showImage(currentIndex + 1));

    // Clicking the dark area around the image closes it.
    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) closeLightbox();
    });

    // Keyboard: Esc closes, arrow keys switch images.
    document.addEventListener('keydown', (event) => {
        if (lightbox.hidden) return;
        if (event.key === 'Escape') closeLightbox();
        if (event.key === 'ArrowLeft') showImage(currentIndex - 1);
        if (event.key === 'ArrowRight') showImage(currentIndex + 1);
    });
}
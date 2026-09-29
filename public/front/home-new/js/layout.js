/* Armstrong – shared layout scripts (header + floating tabs), used on every page */
(function () {
    'use strict';
    function ready(fn) { if (document.readyState !== 'loading') fn(); else document.addEventListener('DOMContentLoaded', fn); }
    ready(function () {
        /* ---- "inquiry now" side tab opens the quote modal ---- */
        var inq = document.querySelector('.Brochurs_btn_side');
        if (inq) {
            inq.setAttribute('href', 'javascript:void(0)');
            inq.removeAttribute('target');
            inq.setAttribute('data-bs-toggle', 'modal');
            inq.setAttribute('data-bs-target', '#exampleModal');
        }

        /* ---- header: top bar slides away on scroll, nav row stays ---- */
        var hdr = document.querySelector('header.hn-header');
        if (hdr) {
            var ticking = false;
            var update = function () {
                var y = window.pageYOffset || document.documentElement.scrollTop;
                // hysteresis (60 / 10) stops flickering near the threshold
                if (y > 60) hdr.classList.add('hn-scrolled');
                else if (y < 10) hdr.classList.remove('hn-scrolled');
                ticking = false;
            };
            window.addEventListener('scroll', function () {
                if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
            }, { passive: true });
            update();
        }

        /* ---- mobile / tablet mega-menu: single, reliable open/close ----
           The site's own main.js attaches TWO separate click handlers to nav-links
           (one bound only to the very first ".nav-link", one bound to every ".nav-link"
           with a ".mega_menu"). On the first item ("Products") both fire on the same
           click and cancel each other out, so its menu never opens on mobile.
           We intercept the click before either old handler runs (capture phase) and
           drive the toggle ourselves, the same way for every item. Desktop (hover-driven
           menu) is untouched. */
        document.addEventListener('click', function (e) {
            if (window.innerWidth > 991) return;
            var link = e.target.closest('.nav-item > .nav-link');
            if (!link) return;
            var menu = link.parentElement.querySelector(':scope > .mega_menu');
            if (!menu) return; // plain link (e.g. Blogs, Contact Us) – let it navigate as normal
            e.preventDefault();
            e.stopPropagation();
            var wasOpen = menu.classList.contains('active');
            document.querySelectorAll('.navbar-nav > .nav-item > .mega_menu.active').forEach(function (m) {
                m.classList.remove('active');
            });
            if (!wasOpen) menu.classList.add('active');
        }, true);
    });
})();

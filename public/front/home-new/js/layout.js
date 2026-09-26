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
    });
})();

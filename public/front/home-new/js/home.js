/* Armstrong – new home page scripts */
(function () {
    'use strict';

    function ready(fn) {
        if (document.readyState !== 'loading') fn();
        else document.addEventListener('DOMContentLoaded', fn);
    }

    // make the pagination dots clickable even if something else swallows Swiper's own handler
    function bindDots(sw, sel, loop) {
        var box = document.querySelector(sel);
        if (!sw || !box) return;
        box.addEventListener('click', function (e) {
            var b = e.target.closest('.swiper-pagination-bullet');
            if (!b || !box.contains(b)) return;
            var i = Array.prototype.indexOf.call(box.querySelectorAll('.swiper-pagination-bullet'), b);
            if (i < 0) return;
            if (loop) sw.slideToLoop(i); else sw.slideTo(i);
        });
    }

    ready(function () {
        /* ---- Manufacturing process slider (centered, active card taller) ---- */
        var process = document.querySelector('.hn-process__slider');
        if (process && typeof Swiper !== 'undefined') {
            var processSw = new Swiper(process, {
                slidesPerView: 'auto',
                centeredSlides: true,
                spaceBetween: 30,
                initialSlide: 2,
                grabCursor: true,
                pagination: { el: '.hn-process__dots', clickable: true }
            });
        }

        /* ---- Featured machine slider ---- */
        var feat = document.querySelector(".hn-feat__slider");
        if (feat && typeof Swiper !== "undefined") {
            var featSw = new Swiper(feat, { slidesPerView: 1, loop: true, autoplay: { delay: 5000, disableOnInteraction: false }, pagination: { el: ".hn-feat__dots", clickable: true } });
        }

        bindDots(featSw, ".hn-feat__dots", true);

        /* ---- Testimonials ---- */
        var testi = document.querySelector('.hn-testi__slider');
        if (testi && typeof Swiper !== 'undefined') {
            var testiSw = new Swiper(testi, {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: { delay: 4500, disableOnInteraction: false },
                pagination: { el: '.hn-testi__dots', clickable: true },
                breakpoints: {
                    768: { slidesPerView: 2 },
                    1200: { slidesPerView: 3 }
                }
            });
        }

        bindDots(testiSw, ".hn-testi__dots", true);
        bindDots(processSw, ".hn-process__dots", false);

        /* ---- stats counter: counts up once when the card scrolls into view ---- */
        var counters = document.querySelectorAll('[data-count]');
        if (counters.length) {
            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var run = function (el) {
                var target = parseInt(el.getAttribute('data-count'), 10);
                var suffix = '+';
                var duration = 2000;
                var start = null;
                el.style.display = 'inline-block';
                el.style.minWidth = el.offsetWidth + 'px'; // keep the width of the final number, no jumping
                var step = function (ts) {
                    if (start === null) start = ts;
                    var p = Math.min((ts - start) / duration, 1);
                    var eased = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.floor(eased * target) + suffix;
                    if (p < 1) window.requestAnimationFrame(step);
                    else el.textContent = target + suffix;
                };
                el.textContent = '0' + suffix;
                window.requestAnimationFrame(step);
            };
            if (!reduce && 'IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (e.isIntersecting) { run(e.target); io.unobserve(e.target); }
                });
            }, { threshold: 0.4 });
            counters.forEach(function (c) { io.observe(c); });
            }
        }

        /* ---- Hero video popup ---- */
        var pop = document.getElementById('hnVideo');
        if (pop) {
            var video = pop.querySelector('video');
            var open = function (e) {
                var src = (e && e.currentTarget && e.currentTarget.getAttribute('data-hn-video')) || video.dataset.src;
                if (video.getAttribute('src') !== src) video.setAttribute('src', src);
                pop.classList.add('open');
                video.play().catch(function () {});
            };
            var close = function () {
                pop.classList.remove('open');
                video.pause();
            };
            document.querySelectorAll('[data-hn-video]').forEach(function (b) { b.addEventListener('click', open); });
            pop.addEventListener('click', function (e) { if (e.target === pop) close(); });
            pop.querySelector('.hn-video__close').addEventListener('click', close);
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });
        }
    });
})();

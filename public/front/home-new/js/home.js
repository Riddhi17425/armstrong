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
                loop: true,
                initialSlide: 0,
                grabCursor: true,
                pagination: { el: '.hn-process__dots', clickable: true }
            });
        }

        /* ---- Featured machine slider ---- */
        var feat = document.querySelector(".hn-feat__slider");
        if (feat && typeof Swiper !== "undefined") {
            var featSw = new Swiper(feat, {
                slidesPerView: 1,
                loop: true,
                autoplay: { delay: 5000, disableOnInteraction: false },
                navigation: {
                    nextEl: ".hn-feat__arrow--next",
                    prevEl: ".hn-feat__arrow--prev"
                }
            });
        }

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

    });
})();

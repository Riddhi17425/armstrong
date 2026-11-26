/* Armstrong homepage behaviour */
window.Leaflet = window.L;

/* ---------- image fallbacks (replaces the old inline onerror handlers) ---------- */
(function () {
  'use strict';
  function onFail(img, fn) {
    img.addEventListener('error', fn);
    if (img.complete && img.naturalWidth === 0) fn();
  }
})();

(function () {
  'use strict';
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var STAR = 'M12 2l3 6.5 7 .9-5.2 4.8 1.4 7L12 17.8 5.8 21.2l1.4-7L2 9.4l7-.9z';
  function esc(s) { return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;'); }
  function reflow(el) { return el.offsetWidth; }

  /* ---------- smooth inertia scrolling ---------- */
  var lenis = null;
  function initLenis() {
    if (lenis || reduce || !window.Lenis || ('ontouchstart' in window)) return;
    lenis = new window.Lenis({ duration: 1.15, easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); }, smoothWheel: true });
    document.documentElement.classList.add('lenis');
    (function raf(t) { lenis.raf(t); requestAnimationFrame(raf); })(0);
    document.addEventListener('click', function (e) {
      var a = e.target.closest('a[href^="#"]'); if (!a || a.getAttribute('href').length < 2) return;
      var tgt = document.querySelector(a.getAttribute('href')); if (!tgt) return;
      e.preventDefault(); lenis.scrollTo(tgt, { offset: -70 });
    });
    setTimeout(function () { lenis.resize(); }, 50);
  }
  function lockScroll(on) { if (lenis) { on ? lenis.stop() : lenis.start(); } document.body.style.overflow = on ? 'hidden' : ''; }

  /* ---------- start-up ---------- */
  var started = false;
  function start() {
    if (started) return; started = true;
    document.body.classList.add('loaded');
    document.body.classList.remove('is-loading');
    initLenis();
    hero.init();
  }
  // no loading screen: start right away (after the script has finished setting up)
  setTimeout(start, 0);

  /* ---------- header: solid on scroll, hide on scroll down ---------- */
  var header = $('#siteHeader'), lastY = 0, menuOpen = false;
  var fab = $('.fab');
  function onScroll() {
    var y = window.scrollY;
    header.classList.toggle('scrolled', y > 60);
    if (!menuOpen) header.classList.toggle('hide', y > lastY && y > 700);
    // shown after the hero, hidden again at the very end of the page (footer bottom)
    if (fab) fab.classList.toggle('show', y > 500 && y + window.innerHeight < document.documentElement.scrollHeight - 140);
    // hero parallax
    if (!reduce && y < window.innerHeight * 1.2) {
      var bgs = $('.hero-bgs'), copy = $('.hero-copy');
      if (bgs) bgs.style.transform = 'translate3d(0,' + (y * 0.35) + 'px,0)';
      if (copy) { copy.style.transform = 'translate3d(0,' + (y * 0.15) + 'px,0)'; copy.style.opacity = Math.max(0, 1 - y / 600); }
    }
    lastY = y;
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------- mobile menu ---------- */
  var burger = $('.burger'), mm = $('#mobileMenu');
  if (burger && mm) {
    burger.addEventListener('click', function () {
      menuOpen = !menuOpen;
      burger.setAttribute('aria-expanded', menuOpen);
      burger.setAttribute('aria-label', menuOpen ? 'Close menu' : 'Open menu');
      if (menuOpen) { mm.hidden = false; reflow(mm); mm.classList.add('open'); lockScroll(true); header.classList.remove('hide'); }
      else { mm.classList.remove('open'); lockScroll(false); setTimeout(function () { if (!menuOpen) mm.hidden = true; }, 700); }
      $$('a', mm).forEach(function (a, i) { a.style.transitionDelay = menuOpen ? (0.25 + i * 0.05) + 's' : '0s'; });
    });
    $$('a', mm).forEach(function (a) { a.addEventListener('click', function () { if (menuOpen) burger.click(); }); });
  }

  /* ---------- hero: one headline, one looping video ---------- */
  var hero = (function () {
    var title = $('#heroTitle'), sub = $('#heroSub'), video = $('.hero-video');

    // split the headline into words so each one can rise in
    function words(el) {
      var walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null), nodes = [], n;
      while ((n = walker.nextNode())) { if (!n.parentNode.closest('svg') && n.nodeValue.trim()) nodes.push(n); }
      var d = 0;
      nodes.forEach(function (t) {
        var frag = document.createDocumentFragment();
        t.nodeValue.split(/(\s+)/).forEach(function (part) {
          if (!part) return;
          if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(part)); return; }
          var w = document.createElement('span'); w.className = 'w';
          var i = document.createElement('span'); i.textContent = part; i.style.transitionDelay = (d++ * 0.07) + 's';
          w.appendChild(i); frag.appendChild(w);
        });
        t.parentNode.replaceChild(frag, t);
      });
    }
    function init() {
      if (!title) return;
      words(title);
      reflow(title); title.classList.add('show'); sub.classList.add('show');

      if (!video) return;
      if (reduce) { video.removeAttribute('autoplay'); video.pause(); return; }
      // only play while the banner is on screen
      if ('IntersectionObserver' in window) new IntersectionObserver(function (e) {
        if (e[0].isIntersecting) { var p = video.play(); if (p && p.catch) p.catch(function () {}); }
        else video.pause();
      }, { threshold: 0.1 }).observe($('#hero'));
    }
    return { init: init };
  })();

  /* ---------- section headings: split into words, rise in on scroll ---------- */
  function splitWords(el) {
    var walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null), nodes = [], n;
    while ((n = walker.nextNode())) { if (!n.parentNode.closest('svg') && n.nodeValue.trim()) nodes.push(n); }
    var k = 0;
    nodes.forEach(function (t) {
      var frag = document.createDocumentFragment();
      t.nodeValue.split(/(\s+)/).forEach(function (part) {
        if (!part) return;
        if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(part)); return; }
        var w = document.createElement('span'); w.className = 'w';
        var i = document.createElement('span'); i.textContent = part; i.style.transitionDelay = (k++ * 0.06) + 's';
        w.appendChild(i); frag.appendChild(w);
      });
      t.parentNode.replaceChild(frag, t);
    });
    el.classList.add('split');
  }
  if (!reduce) $$('section:not(#hero) h2').forEach(function (h) { if (h.id !== 'fmTitle') splitWords(h); });

  /* ---------- scroll reveal ---------- */
  var revealSel = [
    'section:not(#hero) .eyebrow', 'section:not(#hero) h2', 'section:not(#hero) .head',
    'section:not(#hero) .g > *', 'section:not(#hero) form', '.tm-track', '#testimonials .dots',
    'section:not(#hero) p', 'footer .g > *', 'footer .wrap > div'
  ].join(',');
  var counters = [];
  $$(revealSel).forEach(function (el) {
    if (el.classList.contains('split')) return;
    if (el.classList.contains('foot-badges') || el.classList.contains('foot-bottom')) return; // bottom rows stay visible (page ends right below them)
    if (el.classList.contains('foot-badges') || el.classList.contains('foot-bottom')) return; // bottom rows stay visible (page ends right below them)
    if (el.closest('#hero') || el.closest('.rv') || el.closest('#plantLegend') || el.closest('.map-wrap') || el.closest('.tm-track')) return;
    el.classList.add('rv');
    var sibs = Array.prototype.filter.call(el.parentNode.children, function (c) { return c.classList.contains('rv'); });
    el.style.setProperty('--d', sibs.indexOf(el) % 6);
  });

  // short red bars
  $$('.accent-bar').forEach(function (s) { s.classList.add('bar56'); });

  // line-drawn icons in the numbers grid
  $$('#stats svg').forEach(function (svg) {
    svg.classList.add('draw');
    $$('path,circle,ellipse,rect', svg).forEach(function (p) {
      if (p.hasAttribute('stroke-dasharray')) return;   // dotted stitch lines keep their dashes (no draw-in)
      try { var L = Math.ceil(p.getTotalLength()) + 2; p.style.strokeDasharray = L; p.style.strokeDashoffset = reduce ? 0 : L; p.dataset.len = L; } catch (e) {}
    });
  });

  // count-up numbers
  $$('#stats .stat-value').forEach(function (s) {
    if (/^\d+$/.test(s.textContent.trim())) {
      s.classList.add('count'); s.dataset.to = s.textContent.trim(); counters.push(s);
    }
  });
  function countUp(el) {
    var to = +el.dataset.to, from = to > 1000 ? Math.round(to * 0.95) : 0, t0 = null, D = 1800;
    if (reduce) { el.textContent = to; return; }
    function step(ts) {
      if (!t0) t0 = ts;
      var p = Math.min(1, (ts - t0) / D), e = 1 - Math.pow(2, -10 * p);
      el.textContent = Math.round(from + (to - from) * (p === 1 ? 1 : e));
      if (p < 1) requestAnimationFrame(step);
    }
    el.textContent = from; requestAnimationFrame(step);
  }

  function activate(el) {
    el.classList.add('in');
    $$('h2.split', el).forEach(function (h) { h.classList.add('in'); });
    $$('.draw', el).forEach(function (svg) {
      $$('path,circle,ellipse,rect', svg).forEach(function (p, i) { p.style.transitionDelay = (0.3 + i * 0.12) + 's'; p.style.strokeDashoffset = 0; });
    });
    $$('.count', el).forEach(countUp);
  }
  var io = 'IntersectionObserver' in window ? new IntersectionObserver(function (entries) {
    entries.forEach(function (en) { if (en.isIntersecting) { activate(en.target); io.unobserve(en.target); } });
  }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' }) : null;
  var watch = $$('.rv, .map-wrap, h2.split').filter(function (h) { return !(h.classList.contains('split') && h.closest('.rv')); })
    .concat($$('.bar56').filter(function (b) { return !b.closest('.rv'); }));
  watch.forEach(function (el) { io ? io.observe(el) : activate(el); });

  /* ---------- plants: satellite map, plot outlines, pins, unit switcher ---------- */
  (function () {
    var legend = $('#plantLegend'), el = $('#plantMap'), wrap = $('.map-wrap');
    if (!legend || !el) return;
    /* EDIT HERE: exact positions. In Google Maps right-click each building > copy the lat, lng.
       w / h = plot size in metres, rot = rotation in degrees. The values below are approximate. */
    var units = [
      { n: 'Unit 1', area: 'Phase IV, GIDC Vatva', ll: [22.9711934, 72.6419502], w: 101, h: 90, rot: -36,
        vid: 's6EGImtiRD4', file: 'assets/videos/unit-1.mp4',
        a: 'Plot No. A2/502-1, Opp. Indo German Tool Room, Phase-4, GIDC Estate, Vatva, Ahmedabad - 382445, Gujarat, India.' },
      { n: 'Unit 2', area: 'Panchratna Estate, Ramol', ll: [22.9711355, 72.6560241], w: 60, h: 90, rot: 6,
        vid: 'KPL5ACWmJNw', file: 'assets/videos/unit-2.mp4',
        a: 'Panchratna Industrial Estate, Plot No. 10/5, Cross Road, Nr. Vatva GIDC, Phase IV, Ramol, Ahmedabad - 382445, Gujarat, India.' }
    ];
    /* unit video: plays right on the map (covers the map area), closes with X / Esc / picking another unit */
    var vbox = document.createElement('div');
    vbox.className = 'pmap-video'; vbox.hidden = true;
    vbox.innerHTML = '<button type="button" class="pmap-video-x" aria-label="Close video">&times;</button><div class="pmap-video-frame"></div>';
    document.body.appendChild(vbox); /* full-screen popup: lives on <body> so no parent can clip or offset it */
    var vframe = vbox.querySelector('.pmap-video-frame');
    function ytFrame(i) {
      vframe.innerHTML = '<iframe src="https://www.youtube-nocookie.com/embed/' + units[i].vid + '?autoplay=1&rel=0&modestbranding=1" title="' + esc(units[i].n) + ' facility video" allow="autoplay; encrypted-media; picture-in-picture; fullscreen" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
    }
    function openVideo(i) {
      stopTour();
      // own file first (assets/videos/unit-N.mp4); if it is missing / fails, fall back to the YouTube video
      var v = document.createElement('video');
      v.controls = true; v.autoplay = true; v.setAttribute('playsinline', ''); v.preload = 'auto';
      v.addEventListener('error', function () { if (!vbox.hidden) ytFrame(i); }, true);
      v.src = units[i].file;
      vframe.innerHTML = ''; vframe.appendChild(v);
      vbox.hidden = false; reflow(vbox); vbox.classList.add('open');
      vbox.querySelector('.pmap-video-x').focus();
    }
    function closeVideo() {
      if (vbox.hidden) return;
      vbox.classList.remove('open'); vframe.innerHTML = ''; vbox.hidden = true;
    }
    vbox.querySelector('.pmap-video-x').addEventListener('click', closeVideo);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeVideo(); });
    var cur = 0, map = null;
    function pinsIn() { return wrap.classList.contains('pins-in'); }
    legend.innerHTML = units.map(function (u, i) {
      return '<button class="u' + (i === 0 ? ' on' : '') + '" role="tab" aria-selected="' + (i === 0) + '" data-i="' + i + '"><span class="n"><i aria-hidden="true"></i>' + u.n + '<em>' + esc(u.area) + '</em></span><span class="a"><span>' + esc(u.a) + '</span></span></button>';
    }).join('');
    var hoverT = null;
    function hoverPick(i) { clearTimeout(hoverT); hoverT = setTimeout(function () { if (i !== cur) pick(i, true); }, 140); }
    $$('.u', legend).forEach(function (b, i) {
      b.addEventListener('click', function () { clearTimeout(hoverT); pick(i, true); });
      b.addEventListener('mouseenter', function () { hoverPick(i); });
      b.addEventListener('focus', function () { hoverPick(i); });
    });
    legend.addEventListener('mouseleave', function () { clearTimeout(hoverT); });

    function rect(ll, w, h, rot) {
      var lat = ll[0], lng = ll[1], mLat = 1 / 111320, mLng = 1 / (111320 * Math.cos(lat * Math.PI / 180)), r = (rot || 0) * Math.PI / 180;
      return [[-w / 2, -h / 2], [w / 2, -h / 2], [w / 2, h / 2], [-w / 2, h / 2]].map(function (p) {
        var x = p[0] * Math.cos(r) - p[1] * Math.sin(r), y = p[0] * Math.sin(r) + p[1] * Math.cos(r);
        return [lat + y * mLat, lng + x * mLng];
      });
    }
    /* One-time guided tour: Unit 1 -> Unit 2 -> back to Unit 1.
       Any manual interaction (pick, map drag/click, zoom buttons) cancels it. */
    var tourTimers = [];
    function stopTour() { tourTimers.forEach(clearTimeout); tourTimers = []; }
    function startTour() {
      if (reduce) return;
      var DWELL = 4200;
      [1, 0].forEach(function (idx, k) {
        tourTimers.push(setTimeout(function () { pick(idx, true, true); }, DWELL * (k + 1)));
      });
    }
    function pick(i, fly, auto) {
      if (!auto) stopTour();
      if (i !== cur) closeVideo();
      cur = i;
      $$('.u', legend).forEach(function (b, k) { b.classList.toggle('on', k === i); b.setAttribute('aria-selected', k === i); });
      if (!map) return;
      units.forEach(function (u, k) {
        var on = k === i;
        u.poly.setStyle(on ? { color: '#E32329', weight: 2.5, dashArray: '7 6', fillColor: '#FACC15', fillOpacity: .45 } : { color: '#fff', weight: 1.6, dashArray: null, fillColor: '#fff', fillOpacity: .12 });
        if (on) u.poly.bringToFront();
        var pin = u.mk.getElement && u.mk.getElement(); if (pin) pin.classList.toggle('on', on);
        u.mk.setZIndexOffset(on ? 1000 : 0);
      });
      if (fly) map.flyTo(units[i].ll, 18, { duration: reduce ? 0 : 1.2 });
    }
    function fallback() {
      el.innerHTML = '<iframe title="Armstrong units on the map" src="https://www.google.com/maps?q=GIDC+Phase+4+Vatva+Ahmedabad&t=k&z=15&output=embed" loading="lazy" class="pmap-frame"></iframe>';
      $$('.pmap-zoom').forEach(function (z) { z.hidden = true; });
    }
    function init() {
      var L = window.Leaflet || window.L;
      if (!L || typeof L.map !== 'function') { fallback(); return; }
      map = L.map(el, { zoomControl: false, scrollWheelZoom: false, attributionControl: false, center: [23.0225, 72.5714], zoom: 11, zoomSnap: 0.25 });
      L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 19, attribution: 'Imagery &copy; Esri, Maxar, Earthstar Geographics'
      }).addTo(map);
      units.forEach(function (u, i) {
        u.poly = L.polygon(rect(u.ll, u.w, u.h, u.rot), { className: 'plot plot-' + i, color: '#fff', weight: 1.6, fillColor: '#fff', fillOpacity: .12 }).addTo(map);
        u.poly.on('click', function () { pick(i, true); });
        u.mk = L.marker(u.ll, {
          keyboard: false,
          icon: L.divIcon({ className: 'pin-wrap', iconSize: null, iconAnchor: [-14, 46],
            html: '<span class="pin" style="--pd:' + (i * 0.18) + 's"><i></i><b>' + u.n + '</b><em>' + esc(u.area) + '</em><s class="pin-play" aria-hidden="true"></s></span><span class="pin-addr">' + esc(u.a) + '</span>' })
        }).addTo(map);
        // red (active) label plays the unit video; a white one just selects the unit first
        u.mk.on('click', function () { if (i === cur && pinsIn()) openVideo(i); else pick(i, true); });
        u.mk.on('mouseover', function () { hoverPick(i); });
        u.poly.on('mouseover', function () { hoverPick(i); });
      });
      $$('.pmap-zoom button').forEach(function (b) { b.addEventListener('click', function () { stopTour(); map.setZoom(map.getZoom() + (+b.dataset.z)); }); });
      el.addEventListener('pointerdown', stopTour);
      el.addEventListener('click', function () { map.scrollWheelZoom.enable(); });
      el.addEventListener('mouseleave', function () { map.scrollWheelZoom.disable(); });
      pick(0, false);
    }
    init();
    // cinematic intro: city view -> fly in over the units once the map is on screen
    var played = false;
    function intro() {
      if (played || !map) return; played = true;
      map.invalidateSize();
      var b = (window.Leaflet || window.L).latLngBounds(units.map(function (u) { return u.ll; }));
      setTimeout(function () {
        map.flyToBounds(b, { padding: [120, 120], duration: reduce ? 0 : 2.6, maxZoom: 16 });
        map.once('moveend', function () {
          wrap.classList.add('pins-in');
          setTimeout(function () { pick(0, true, true); startTour(); }, 900);
        });
      }, reduce ? 0 : 700);
    }
    if ('IntersectionObserver' in window) new IntersectionObserver(function (e, o) { if (e[0].isIntersecting) { intro(); o.disconnect(); } }, { threshold: 0.35 }).observe(wrap);
    else intro();
  })();

  /* ---------- values: numbered tabs + text + photo, rotates every 7s (pauses only while off-screen; mouse hover no longer pauses it) ---------- */
  (function () {
    var root = $('.vals'); if (!root) return;
    var tabs = $$('.vals-tab', root), slides = $$('.vals-slide', root);
    var interval = +root.getAttribute('data-interval') || 7000;
    var cur = 0, timer = null, hover = false, visible = false;
    root.style.setProperty('--dur', interval + 'ms');

    function paused() { return hover || !visible || reduce; }
    function schedule() {
      clearTimeout(timer);
      if (!paused()) timer = setTimeout(function () { show(cur + 1); }, interval);
    }
    function show(i) {
      cur = (i + slides.length) % slides.length;
      tabs.forEach(function (t, k) {
        var on = k === cur;
        t.classList.remove('on'); if (on) { reflow(t); t.classList.add('on'); }   // restarts the progress line
        t.setAttribute('aria-selected', on ? 'true' : 'false'); t.tabIndex = on ? 0 : -1;
      });
      slides.forEach(function (s, k) { s.classList.toggle('on', k === cur); });
      // phone/tablet: tabs sit in a swipe row, so bring the active one into view (scrolls only that row, never the page)
      var bar = tabs[cur].parentNode; if (bar.scrollWidth > bar.clientWidth) bar.scrollTo({ left: tabs[cur].offsetLeft - 20, behavior: reduce ? 'auto' : 'smooth' });
      schedule();
    }
    tabs.forEach(function (t, k) { t.addEventListener('click', function () { show(k); }); });
    root.addEventListener('keydown', function (e) {
      var d = (e.key === 'ArrowDown' || e.key === 'ArrowRight') ? 1 : (e.key === 'ArrowUp' || e.key === 'ArrowLeft') ? -1 : 0;
      if (!d) return; e.preventDefault(); show(cur + d); tabs[cur].focus();
    });
    if ('IntersectionObserver' in window) new IntersectionObserver(function (e) {
      visible = e[0].isIntersecting;
      root.classList.toggle('paused', !visible || hover);
      if (visible) show(cur); else clearTimeout(timer);
    }, { threshold: 0.3 }).observe(root);
    else { visible = true; schedule(); }
  })();

  /* ---------- industries slider: infinite loop both ways, auto-plays, arrows, swipe; pauses on hover / touch / off-screen ---------- */
  (function () {
    var track = $('.industries'); if (!track) return;
    var cards = $$('.industry', track), n = cards.length, prevB = $('button[aria-label="Previous industry"]'), nextB = $('button[aria-label="Next industry"]'), num = $('#indNum');
    if (!n) return;
    var INTERVAL = 4000, timer = null, hover = false, touching = false, visible = false, settle = null, target = null;
    // three identical sets: [clones] [real cards] [clones]; the scroll position is wrapped by exactly one set, so the jump is invisible
    function clones() { return cards.map(function (c) { var k = c.cloneNode(true); k.classList.add('industry--clone'); k.setAttribute('aria-hidden', 'true'); $$('.rv', k).concat(k.classList.contains('rv') ? [k] : []).forEach(function (e) { e.classList.remove('rv', 'in'); }); return k; }); }
    var before = clones(), after = clones();
    before.forEach(function (k) { track.insertBefore(k, cards[0]); });
    after.forEach(function (k) { track.appendChild(k); });
    function gap() { return parseFloat(getComputedStyle(track).columnGap) || 0; }
    function step() { return cards[0].getBoundingClientRect().width + gap(); }
    function setW() { return step() * n; }
    function index() { return target !== null ? target : Math.round(track.scrollLeft / step()); } // 0..3n, real cards are n..2n-1; while a slide is animating, the index it is heading to
    function perView() { return Math.max(1, Math.floor((track.clientWidth + gap() + 4) / step())); }
    function jump(left) { track.style.scrollSnapType = 'none'; track.scrollLeft = left; requestAnimationFrame(function () { track.style.scrollSnapType = ''; }); }
    function wrap() {
      var w = setW();
      if (track.scrollLeft < w * 0.5) jump(track.scrollLeft + w);
      else if (track.scrollLeft >= w * 1.5) jump(track.scrollLeft - w);
    }
    function go(i) { target = i; track.scrollTo({ left: i * step(), behavior: reduce ? 'auto' : 'smooth' }); }
    function next() { go(index() + 1); }
    function prev() { go(index() - 1); }
    function update() { if (num) num.textContent = ('0' + ((((index() + perView() - 1) % n) + n) % n + 1)).slice(-2); }
    function schedule() { clearInterval(timer); if (reduce) return; timer = setInterval(function () { if (!hover && !touching && visible) next(); }, INTERVAL); }
    function onScroll() { update(); clearTimeout(settle); settle = setTimeout(function () { wrap(); target = null; update(); }, 140); }
    track.addEventListener('scroll', onScroll, { passive: true });
    function place() { jump(setW() + (((index() % n) + n) % n) * step()); update(); }
    window.addEventListener('resize', place);
    if (prevB) prevB.addEventListener('click', function () { prev(); schedule(); });
    if (nextB) nextB.addEventListener('click', function () { next(); schedule(); });
    track.addEventListener('mouseenter', function () { hover = true; });
    track.addEventListener('mouseleave', function () { hover = false; });
    track.addEventListener('focusin', function () { hover = true; });
    track.addEventListener('focusout', function () { hover = false; });
    var touchT = null;
    track.addEventListener('touchstart', function () { touching = true; target = null; clearTimeout(touchT); }, { passive: true });
    track.addEventListener('touchend', function () { clearTimeout(touchT); touchT = setTimeout(function () { touching = false; schedule(); }, 3000); }, { passive: true });
    track.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') { e.preventDefault(); next(); schedule(); } else if (e.key === 'ArrowLeft') { e.preventDefault(); prev(); schedule(); }
    });
    if ('IntersectionObserver' in window) new IntersectionObserver(function (e) { visible = e[0].isIntersecting; }, { threshold: 0.3 }).observe(track); else visible = true;
    jump(setW()); update(); schedule();
  })();

  /* ---------- category video tiles: local files autoplay (muted) while on screen ---------- */
  (function () {
    var tiles = $$('#videos .vt');
    tiles.forEach(function (t) {
      var v = $('video', t); if (!v) return;
      // no file yet (or it failed to load): fall back to the thumbnail, and the click opens the YouTube video
      function noFile() { v.remove(); t.classList.remove('playing'); t.removeAttribute('data-file'); }
      v.addEventListener('playing', function () { t.classList.add('playing'); });
      v.addEventListener('error', noFile);
    });
    if (reduce || !('IntersectionObserver' in window)) return;
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        var v = $('video', en.target); if (!v) return;
        if (en.isIntersecting) { var p = v.play(); if (p && p.catch) p.catch(function () {}); }
        else v.pause();
      });
    }, { threshold: 0.35 });
    tiles.forEach(function (t) { io.observe(t); });
  })();

  /* ---------- lightbox (YouTube or uploaded video files) ---------- */
  (function () {
    var modal = $('#ytModal'); if (!modal) return;
    var frame = $('.ytm-frame', modal), closeBtn = $('.ytm-x', modal), lastFocus = null;
    function open(id, file) {
      lastFocus = document.activeElement;
      frame.innerHTML = file
        ? '<video src="' + esc(file) + '" controls autoplay playsinline></video>'
        : '<iframe src="https://www.youtube-nocookie.com/embed/' + id + '?autoplay=1&rel=0&modestbranding=1" title="Armstrong machine video" allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe>';
      modal.hidden = false; reflow(modal); modal.classList.add('open');
      lockScroll(true); closeBtn.focus();
    }
    function close() {
      modal.classList.remove('open'); lockScroll(false);
      setTimeout(function () { modal.hidden = true; frame.innerHTML = ''; }, 400);
      if (lastFocus) lastFocus.focus();
    }
    document.addEventListener('click', function (e) {
      var t = e.target.closest('a[data-yt], button[data-yt], a[data-file]');
      if (!t || e.metaKey || e.ctrlKey) return;
      e.preventDefault(); open(t.getAttribute('data-yt'), t.getAttribute('data-file'));
    });
    closeBtn.addEventListener('click', close);
    modal.addEventListener('click', function (e) { if (e.target === modal) close(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) close(); });
    // product cards with a video open the player too
    $$('section a[href*="youtube.com/watch?v="]').forEach(function (a) {
      if (!a.hasAttribute('data-yt')) { var m = a.href.match(/v=([\w-]{11})/); if (m) a.setAttribute('data-yt', m[1]); }
    });
  })();

  /* ---------- testimonials carousel ---------- */
  (function () {
    var track = $('#tmTrack'); if (!track) return;
    var data = $$('figure', track).map(function (f) {
      var lab = (f.querySelector('[role="img"]') || {}).getAttribute ? f.querySelector('[role="img"]').getAttribute('aria-label') : '5 out of 5';
      var spans = $$('figcaption > span:last-child > span', f);
      return {
        q: f.querySelector('blockquote').textContent.trim(),
        stars: parseInt(lab, 10) || 5,
        av: f.querySelector('figcaption > span').textContent.trim(),
        img: (f.querySelector('figcaption .av img') || {}).src || '',
        n: spans[0] ? spans[0].textContent.trim() : '',
        r: spans[1] ? spans[1].textContent.trim() : ''
      };
    });
    if (!data.length) return;
    var cur = 1 % data.length, timer, dots = $('#tmDots');
    $('#tmTotal').textContent = ('0' + data.length).slice(-2);
    dots.innerHTML = data.map(function () { return '<span></span>'; }).join('');
    function card(d, on) {
      var st = ''; for (var k = 0; k < 5; k++) st += '<svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24"' + (k >= d.stars ? ' class="off"' : '') + '><path d="' + STAR + '"></path></svg>';
      return '<figure class="tm-card' + (on ? ' on' : '') + '"><div class="tm-top in-t"><span class="stars" role="img" aria-label="' + d.stars + ' out of 5 stars">' + st + '</span><span class="qm" aria-hidden="true">“</span></div>' +
        '<blockquote class="in-t">' + esc(d.q) + '</blockquote>' +
        '<figcaption class="in-t"><span class="av" aria-hidden="true">' + (d.img ? '<img src="' + esc(d.img) + '" alt="" width="48" height="48">' : esc(d.av)) + '</span><span><span class="nm">' + esc(d.n) + '</span><span class="rl">' + esc(d.r) + '</span></span></figcaption></figure>';
    }
    function render() {
      var L = data.length, order = L >= 3 ? [(cur - 1 + L) % L, cur, (cur + 1) % L] : data.map(function (_, i) { return i; });
      track.innerHTML = order.map(function (i) { return card(data[i], i === cur); }).join('');
      $('#tmNum').textContent = ('0' + (cur + 1)).slice(-2);
      $$('span', dots).forEach(function (s, i) { s.classList.toggle('on', i === cur); });
    }
    function go(i) {
      cur = (i + data.length) % data.length;
      track.classList.add('swap');
      setTimeout(function () { render(); reflow(track); track.classList.remove('swap'); }, reduce ? 0 : 420);
      restart();
    }
    function restart() { clearInterval(timer); timer = setInterval(function () { go(cur + 1); }, 6500); }
    var sec = $('#testimonials');
    $('button[aria-label="Previous testimonial"]', sec).addEventListener('click', function () { go(cur - 1); });
    $('button[aria-label="Next testimonial"]', sec).addEventListener('click', function () { go(cur + 1); });
    track.addEventListener('mouseenter', function () { clearInterval(timer); });
    track.addEventListener('mouseleave', restart);
    // swipe on touch
    var x0 = null;
    track.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true });
    track.addEventListener('touchend', function (e) { if (x0 === null) return; var dx = e.changedTouches[0].clientX - x0; if (Math.abs(dx) > 40) go(cur + (dx < 0 ? 1 : -1)); x0 = null; });
    render(); restart();
  })();
})();

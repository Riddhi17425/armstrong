{{-- [TEST-PAGE-DYNAMIC] Header: shared layouts.frontheader (new-design branch enabled by test_new) --}}
@include('layouts.frontheader', ['test_new' => true, 'tn_home' => true])

  <main class="page">

    <!-- Hero banner -->
    <section id="hero">
      <div class="hero-bgs" aria-hidden="true">
        <video class="hero-video" autoplay muted loop playsinline preload="metadata" poster="https://atcomart.com/armstrong/public/front/home-new/images/hero-poster.webp" src="https://atcomart.com/armstrong/public/front/img/Armstrong_home_vid.webm"></video>
      </div>
      <div class="hero-copy">
        <h1 id="heroTitle" class="hero-h">India's Leading Manufacturer of FIBC &amp; Woven Sack Machinery</h1>
        <p id="heroSub"><strong>Four decades</strong> of engineering. Machinery built for <strong>precision</strong>, <br><strong>productivity</strong> and <strong>lasting performance</strong>.</p>
      </div>

    </section>

    <!-- Intro -->
    <section class="intro">
      <div class="wrap">
        <p class="eyebrow">About Us</p>
        <h2 class="intro-title">Finishing Machinery for FIBC &amp; Woven-Sack Makers, Built in India Since 1982.</h2>
        <p class="intro-tagline"><strong>Engineering precision, delivering excellence. Transforming the industrial packaging industry.</strong></p>
        <div class="g intro-cols">
          <p>With over 40 years of experience in working for the industrial packaging industry, we are now a leading name as the top FIBC machine manufacturers in India. From FIBC machines and woven sack machinery to HDPE sack sewing solutions. Our FIBC machines are built for durability, precision, and efficiency.</p>
          <p>Every machine we deliver is designed, assembled, and tested in-house in our state-of-the-art workplace, meeting industrial standards for high-quality and powerful performance. Today we serve across 70+ countries, not just with our machines, but even additional technical expertise through customization and after-sales support.</p>
        </div>
        <div class="btn-row intro-actions">
          <a href="{{ route('productlist') }}" class="btn">Explore machines →</a>
          {{-- opens the same Request a Quote popup as the previous home page (modal #exampleModal from layouts.quote-modal) --}}
          <a href="javascript:void(0);" class="btn ghost" data-bs-toggle="modal" data-bs-target="#exampleModal">Request a quote</a>
        </div>
      </div>
    </section>

    <!-- Stats grid -->
    <section id="stats">
      <div class="wrap relative-wrap">
        <div class="g stats-grid">
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">1982</span></div>
                <div class="stat-label">Founded as Stitchman</div>
                <div class="stat-desc">By Mr. Sanjay Shah, and led today with Mr. Vyom Shah</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><rect x="5.7" y="85.2" width="130" height="20.8" rx="4"></rect><path d="M44 94.2H122"></path><path d="M24.4 63.8V33Q24.4 27 31 27.5L87 31.5Q96 32 101 33L116 38Q119 40 119 44V85"></path><path d="M41 62Q42 49 58 48.5H76Q84 50 82 66Q82 76 76 85"></path><circle cx="100.2" cy="49.5" r="6.8"></circle><path d="M33 18V63.8M29.5 63.8H36.3V74H29.5Z"></path><path stroke="#E32329" d="M33 74V84"></path><rect x="88.3" y="6.7" width="19.5" height="6" rx="2"></rect><rect x="87.7" y="29.1" width="20.7" height="3.6" rx="1.8"></rect><path d="M90 12.7V29.1M106 12.7V29.1"></path><path stroke="#E32329" d="M91 15H105M91 18.4H105M91 21.8H105M91 25.2H105"></path><rect x="122.5" y="32.5" width="11.3" height="34.7" rx="5.6"></rect><path d="M119 44H122.5"></path><path d="M14 85L62 85L57 110L10 112Z"></path><path stroke="#E32329" stroke-dasharray="3 3" d="M15 105H38L44 98L52 89"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">2015</span></div>
                <div class="stat-label">Finishing machinery begins</div>
                <div class="stat-desc">Automated finishing machines added to our sewing range</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><path d="M10 104H131"></path><rect x="4" y="109" width="15" height="6"></rect><rect x="93.5" y="109" width="15" height="6"></rect><rect x="124.5" y="109" width="10.5" height="6"></rect><path d="M17 104V32H26.3M99 104V32H26.3"></path><rect x="32" y="22" width="69" height="10" rx="2"></rect><rect x="31.6" y="46" width="61" height="14.4" rx="7"></rect><ellipse cx="28" cy="53" rx="4.5" ry="7"></ellipse><path d="M92.8 53H98"></path><rect x="12" y="74" width="87" height="17" rx="8"></rect><ellipse cx="10" cy="82.5" rx="5" ry="8"></ellipse><rect x="104.8" y="44" width="26.2" height="60" rx="3"></rect><rect x="110" y="50" width="14.5" height="10"></rect><path d="M104.8 78H131"></path><circle cx="110.7" cy="66.5" r="1.8"></circle><circle cx="123.9" cy="66.5" r="1.8"></circle><circle cx="117.3" cy="66.5" r="1.8" stroke="#E32329"></circle><path d="M103.8 31V18.4"></path><rect x="98.3" y="4" width="11" height="14.4" fill="#E32329" stroke="#E32329"></rect><path d="M99.5 10.6H108" stroke="#F4F4F4"></path><path d="M33.8 60C32 80 26 92 21 103M83 60C79 80 66 92 64.5 103"></path><path stroke="#E32329" stroke-dasharray="3 3" d="M49 62C48 80 36 90 30 103M70 62C68 80 57 92 55 103"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">70</span><span class="stat-unit">+</span></div>
                <div class="stat-label">Countries – machines exported to</div>
                <div class="stat-desc">Machines and spare parts shipped to packaging makers worldwide</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><circle cx="56.8" cy="45.2" r="36.5"></circle><ellipse cx="56.8" cy="45.2" rx="19" ry="36.5"></ellipse><path d="M56.8 8.7V81.7M20.3 45.2H93.3M25.5 27Q56.8 33 88 27"></path><path stroke="#E32329" d="M4.7 45.2A54 17 0 0 0 112.7 45.2" transform="rotate(-18 58.7 45.2)"></path><path stroke="#E32329" d="M100 43.2A54 17 0 0 0 107.6 38" transform="rotate(-18 58.7 45.2)"></path><circle cx="103" cy="23.3" r="3.8" stroke="#E32329"></circle><path d="M69.5 66.8L103.2 50.6L132.9 61.4L99.2 78.9ZM69.5 66.8V91L99.2 104.5V78.9M132.9 61.4V86.9L99.2 104.5"></path><path stroke="#E32329" d="M86.4 58.7L116.1 69.5M91.5 56.2L121.5 66.8M86 63.5V79L91 76L96 79V67"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">ZED</span><span class="stat-unit">Gold</span></div>
                <div class="stat-label">MSME certified</div>
                <div class="stat-desc">Zero defect, zero effect manufacturing, audited</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="1.6" stroke-linejoin="round" stroke-linecap="round"><circle cx="70" cy="48" r="28"></circle><circle cx="70" cy="48" r="20" stroke="#E32329"></circle><path stroke="#E32329" d="M60 48l7 7 13-14"></path><path d="M54 72l-10 34 14-8 8 14 6-30M86 72l10 34-14-8-8 14"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">3</span><span class="stat-unit">units</span></div>
                <div class="stat-label">Manufacturing units</div>
                <div class="stat-desc">Vatva GIDC, Ahmedabad: design, machining, assembly and trial runs</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><path d="M4 96H71L134 84"></path><path d="M9 96V57L45.5 34L63.5 40.4V57L77 31L95 38.7V54.3L109 30.3L127.6 36.8V85"></path><path d="M9 57L30 60L63.5 40.4"></path><path d="M101 33V14H107V31M112.5 33V9H118.5V35"></path><rect x="21.5" y="69" width="39" height="27"></rect><path d="M21.5 76H60.5M21.5 82H60.5M21.5 88H60.5"></path><path stroke="#E32329" d="M76 68L93 64V79L76 83ZM84.5 66V81M104 63L120 59V74L104 78ZM112 61V76"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">ISO</span><span class="stat-unit">9001:2015</span></div>
                <div class="stat-label">Quality certified</div>
                <div class="stat-desc">Certified quality management system</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><path d="M12 80L68 107L125 79.3M12 80V91L68 119L125 90.3V79.3M68 107V119M12 80L34.7 68.7M125 79.3L101.6 68.3"></path><path d="M34.7 80.9V3.4H86.2L101.6 17V80.9"></path><path d="M86.2 3.4V17H101.6"></path><path d="M42.2 12.2H79M42.2 17.7H79M42.2 23.5H62.6"></path><text x="68" y="37" text-anchor="middle" font-family="Quattrocento Sans, Arial, sans-serif" font-weight="700" font-size="12" fill="#1A1A1A" stroke="none">ISO</text><text x="68" y="47" text-anchor="middle" font-family="Quattrocento Sans, Arial, sans-serif" font-weight="700" font-size="9" fill="#1A1A1A" stroke="none">9001:2015</text><circle cx="68" cy="65" r="13" stroke="#E32329"></circle><circle cx="68" cy="65" r="9.5" stroke="#E32329"></circle><path stroke="#E32329" d="M63 65L67 69L74 61M60 76L56 91L62 88L66 94L68 79M76 76L80 91L74 88L70 94L68 79"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">80</span><span class="stat-unit">+</span></div>
                <div class="stat-label">Innovative products</div>
                <div class="stat-desc">Industrial packaging machinery and spare parts</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><path stroke="#E32329" d="M77.4 43.5L77.2 42.8L77 42.1L76.8 41.4L76.6 40.8L76.5 40.1L76.4 39.4L76.3 38.7L76.2 38L76.2 37.3L74.2 36.5L72.2 35.7L72.2 34.9L72.3 34L72.4 33.2L72.5 32.3L72.7 31.5L72.9 30.7L73.1 29.9L73.3 29L73.6 28.2L73.9 27.5L78 28.3L78.2 27.7L78.6 27L78.9 26.4L79.3 25.8L79.7 25.2L80.1 24.6L80.5 24.1L80.9 23.5L81.4 23L81.9 22.5L79.6 19.1L80.2 18.5L80.8 17.9L81.5 17.4L82.2 16.9L82.9 16.4L83.6 15.9L84.3 15.5L85 15.1L85.8 14.7L86.6 14.4L88.2 16.1L89.5 17.5L90.2 17.3L90.9 17.1L91.6 16.9L92.2 16.7L92.9 16.6L93.6 16.5L94.3 16.4L95 16.3L95.7 16.3L96.5 14.3L97.3 12.3L98.1 12.3L99 12.4L99.8 12.5L100.7 12.6L101.5 12.8L102.3 13L103.1 13.2L104 13.4L104.8 13.7L105.5 14L104.7 18.1L105.3 18.3L106 18.7L106.6 19L107.2 19.4L107.8 19.8L108.4 20.2L108.9 20.6L109.5 21L110 21.5L110.5 22L113.9 19.7L114.5 20.3L115.1 20.9L115.6 21.6L116.1 22.3L116.6 23L117.1 23.7L117.5 24.4L117.9 25.1L118.3 25.9L118.6 26.7L116.9 28.3L115.5 29.6L115.7 30.3L115.9 31L116.1 31.7L116.3 32.3L116.4 33L116.5 33.7L116.6 34.4L116.7 35.1L116.7 35.8L118.7 36.5L120.7 37.4L120.7 38.2L120.6 39.1L120.5 39.9L120.4 40.8L120.2 41.6L120 42.4L119.8 43.2L119.6 44.1L119.3 44.9L119 45.6L114.9 44.8L114.7 45.4L114.3 46.1L114 46.7L113.6 47.3L113.2 47.9L112.8 48.5L112.4 49L112 49.6"></path><path stroke="#E32329" d="M84.2 30.8L84.8 29.8L85.4 28.8L86.1 27.9L86.9 27L87.8 26.2L88.7 25.5L89.7 24.9L90.7 24.3L91.8 23.9L93 23.5L94.1 23.3L95.3 23.1L96.5 23.1L97.6 23.1L98.8 23.3L99.9 23.5L101.1 23.9L102.2 24.3L103.2 24.9L104.2 25.5L105.1 26.2L106 27L106.8 27.9L107.5 28.8L108.1 29.8L108.7 30.8"></path><path d="M15.9 105H53.3M66.8 105H125.3"></path><rect x="19.5" y="69.8" width="32.4" height="35.1"></rect><path d="M27.6 69.8V39.3L33.9 32.5H60V69.8M38.4 32.5V67.6"></path><path d="M35.3 60H51.9V66.3H35.3Z"></path><path d="M53.3 63.1H64.5" stroke-dasharray="3 3"></path><path d="M51.5 42H95.1A4.0 4.0 0 0 1 95.1 50.1H51.5A4.0 4.0 0 0 1 51.5 42Z"></path><circle cx="51.5" cy="46" r="2"></circle><path d="M50.6 84.7H72.2A3.1 3.1 0 0 1 72.2 91H50.6A3.1 3.1 0 0 1 50.6 84.7Z"></path><path d="M57.8 50.1C64.5 67.6 75.8 74.4 87 75.7M96.9 50.1C98.3 63.1 107.3 72.1 116.3 75.7"></path><path stroke="#E32329" d="M71.3 66.3H92.4"></path><ellipse cx="82.5" cy="90.1" rx="10.8" ry="14.4"></ellipse><circle cx="82.5" cy="90.1" r="5.0"></circle><path d="M82.5 75.7H110.4M82.5 104.5H110.4M110.4 75.7C120.8 77.5 123.9 84.7 123.9 90.1C123.9 95.5 120.8 102.7 110.4 104.5"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">120</span><span class="stat-unit">+</span></div>
                <div class="stat-label">People</div>
                <div class="stat-desc">Engineers, machinists, assemblers and service technicians</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><g stroke="#E32329"><path d="M56 34.5V30Q56 18 70 18T84 30V34.5" transform="translate(0 0)"></path><path d="M67 19V31M73 19V31"></path><rect x="50.5" y="34" width="38" height="5" rx="2.5" transform="translate(0.5 0)"></rect></g><path d="M58 39V50Q58 61 70 64Q82 61 82 50V39"></path><path d="M49 67L70 74L92 66M78 73H88"></path><g transform="translate(35 70)"><path d="M-14 -14C-14 -26 -8 -30 0 -30S14 -26 14 -14"></path><path d="M-3 -29V-17M3 -29V-17"></path><rect x="-19" y="-14" width="38" height="5" rx="2.5"></rect><path d="M-12 -9V1Q-12 12 0 15Q12 12 12 1V-9"></path><path d="M-30 40V34Q-30 22 -18 19L-8 15L0 22L8 15L18 19Q30 22 30 34V40Z"></path><path d="M0 22V40M-17 31H-11M11 31H17"></path></g><g transform="translate(106 70)"><path d="M-14 -14C-14 -26 -8 -30 0 -30S14 -26 14 -14"></path><path d="M-3 -29V-17M3 -29V-17"></path><rect x="-19" y="-14" width="38" height="5" rx="2.5"></rect><path d="M-12 -9V1Q-12 12 0 15Q12 12 12 1V-9"></path><path d="M-30 40V34Q-30 22 -18 19L-8 15L0 22L8 15L18 19Q30 22 30 34V40Z"></path><path d="M0 22V40M-17 31H-11M11 31H17"></path></g></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
          <div class="stat">
            <div class="stat-top">
              <div>
                <div class="stat-fig"><span class="stat-value">40</span><span class="stat-unit">+</span></div>
                <div class="stat-label">Years of experience</div>
                <div class="stat-desc">Partners of Juki &amp; NLI (Japan) and Orsan (Turkey)</div>
              </div>
              <svg class="stat-ico" aria-hidden="true" width="140" height="120" viewBox="0 0 140 120" fill="none" stroke="#1A1A1A" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><path d="M69.8 4.1L72.1 4.7L74.3 6.1L76.3 8.0L78.1 9.7L80.0 10.6L82.2 10.8L84.6 10.3L87.3 9.6L89.9 9.4L92.2 10.1L93.9 11.7L95.1 14.1L95.9 16.7L96.6 19.1L97.8 20.9L99.6 22.1L102.0 22.8L104.6 23.6L107.0 24.8L108.6 26.5L109.3 28.8L109.1 31.4L108.4 34.1L107.9 36.5L108.1 38.7L109.0 40.6L110.7 42.4L112.6 44.4L114.0 46.6L114.6 48.9L114.0 51.2L112.6 53.4L110.7 55.4L109.0 57.2L108.1 59.1L107.9 61.3L108.4 63.7L109.1 66.4L109.3 69.0L108.6 71.3L107.0 73.0L104.6 74.2L102.0 75.0L99.6 75.7L97.8 76.9L96.6 78.7L95.9 81.1L95.1 83.7L93.9 86.1L92.2 87.7L89.9 88.4L87.3 88.2L84.6 87.5L82.2 87.0L80.0 87.2L78.1 88.1L76.3 89.8L74.3 91.7L72.1 93.1L69.8 93.7L67.5 93.1L65.3 91.7L63.3 89.8L61.5 88.1L59.6 87.2L57.4 87.0L55.0 87.5L52.3 88.2L49.7 88.4L47.4 87.7L45.7 86.1L44.5 83.7L43.7 81.1L43.0 78.7L41.8 76.9L40.0 75.7L37.6 75.0L35.0 74.2L32.6 73.0L31.0 71.3L30.3 69.0L30.5 66.4L31.2 63.7L31.7 61.3L31.5 59.1L30.6 57.2L28.9 55.4L27.0 53.4L25.6 51.2L25.0 48.9L25.6 46.6L27.0 44.4L28.9 42.4L30.6 40.6L31.5 38.7L31.7 36.5L31.2 34.1L30.5 31.4L30.3 28.8L31.0 26.5L32.6 24.8L35.0 23.6L37.6 22.8L40.0 22.1L41.8 20.9L43.0 19.1L43.7 16.7L44.5 14.1L45.7 11.7L47.4 10.1L49.7 9.4L52.3 9.6L55.0 10.3L57.4 10.8L59.6 10.6L61.5 9.7L63.3 8.0L65.3 6.1L67.5 4.7Z"></path><path d="M87.9 23.1A31.5 31.5 0 0 1 97.1 64.6"></path><path d="M94.6 68.3A31.5 31.5 0 1 1 54.0 21.6"></path><path stroke="#E32329" d="M69.8 31.9L74.4 43.6L86.9 44.3L77.2 52.3L80.4 64.5L69.8 57.7L59.2 64.5L62.4 52.3L52.7 44.3L65.2 43.6Z"></path><path d="M42.5 82.8L28.2 106.5L44 100.5L51.8 114.4L64 91.5M97.5 82.8L111.8 106.5L96 100.5L88.2 114.4L75.6 91.5"></path></svg>
            </div>
            <span class="accent-bar" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </section>

    <!-- Our plants (map) -->
    <section id="plants">
      <div class="wrap relative-wrap">
        <div class="g plants-head">
          <div>
            <p class="eyebrow eyebrow--red">Our plants</p>
            <h2 class="display-title">Precision Manufacturing Infrastructure</h2>
          </div>
          <p class="plants-intro">Armstrong manufactures advanced industrial machinery, including FIBC Machines, Woven Sack Machines, Sewing Machines, Mulch Film Punching Machines, and Bag Closing Machines. Our in-house manufacturing process ensures precision engineering, strict quality control, and reliable performance from design to final testing.</p>
        </div>
      </div>
      <div class="map-wrap">
        <div id="plantMap" class="pmap" role="region" aria-label="Satellite map of Armstrong units, Vatva GIDC, Ahmedabad"></div>
        <div class="pmap-zoom"><button type="button" data-z="1" aria-label="Zoom in">+</button><button type="button" data-z="-1" aria-label="Zoom out">−</button></div>
        <div id="plantLegend" role="tablist" aria-label="Our units"></div>
      </div>
    </section>

    <!-- Six pillars -->
    <section class="sec">
      <div class="wrap">
        <div class="head">
          <div><p class="eyebrow">Why Armstrong</p><h2 class="h2">Machinery, R&amp;D, Standards <em>and People.</em></h2></div>
        </div>
        <div class="g pillars">
          <div class="pillar"><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0E1A2B" stroke-width="1.5"><circle pathLength="1" cx="12" cy="12" r="3"></circle><path pathLength="1" d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M4.9 19.1L7 17M17 7l2.1-2.1"></path></svg><h3 class="pillar-title">In-House Manufacturing</h3><p class="body-text">Critical parts machined and assembled under our own roof.</p></div>
          <div class="pillar"><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0E1A2B" stroke-width="1.5"><path pathLength="1" d="M9 3h6M10 3v6l-5 9a2 2 0 002 3h10a2 2 0 002-3l-5-9V3"></path></svg><h3 class="pillar-title">Continuous R&amp;D</h3><p class="body-text">New models and upgrades shaped by what customers run every day.</p></div>
          <div class="pillar"><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0E1A2B" stroke-width="1.5"><path pathLength="1" d="M12 2l3 6 6 .9-4.5 4.3 1 6.3L12 16.6 6.5 19.5l1-6.3L3 8.9 9 8z"></path></svg><h3 class="pillar-title">ZED Gold Quality</h3><p class="body-text">Zero-defect, zero-effect processes, audited and certified.</p></div>
          <div class="pillar"><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0E1A2B" stroke-width="1.5"><path pathLength="1" d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 005.4-5.4l-2.5 2.5-2.5-2.5z"></path></svg><h3 class="pillar-title">Spare Parts On Hand</h3><p class="body-text">FIBC machine spares stocked for fast dispatch, ours and others'.</p></div>
          <div class="pillar"><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0E1A2B" stroke-width="1.5"><circle pathLength="1" cx="12" cy="12" r="9"></circle><path pathLength="1" d="M3 12h18M12 3c3 3.5 3 14.5 0 18M12 3c-3 3.5-3 14.5 0 18"></path></svg><h3 class="pillar-title">Global Exports</h3><p class="body-text">Machines shipped, installed and supported across continents.</p></div>
          <div class="pillar"><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0E1A2B" stroke-width="1.5"><circle pathLength="1" cx="9" cy="8" r="3.5"></circle><path pathLength="1" d="M2.5 20a6.5 6.5 0 0113 0M16 4.5a3.5 3.5 0 010 7M18 14.5a6.5 6.5 0 013.5 5.5"></path></svg><h3 class="pillar-title">Service &amp; Training</h3><p class="body-text">Installation, operator training and after-sales support.</p></div>
        </div>
      </div>
    </section>

    <!-- Videos: one tile per product category. Each tile autoplays a short local clip (assets/videos/<name>.webm); tiles are display-only for now (no click action) -->
    <section id="videos" class="sec">
      <div class="wrap">
        <div class="head">
          <div><p class="eyebrow">Explore our product range</p><h2 class="h2 h2--regular">See Our Machines <em>at Work.</em></h2><p class="head-desc">We build the machines that turn raw material into finished bags: FIBC machines, woven sack machines, sewing machines, mulch film punching machines, bag closing machines, and more. Each one is made to run reliably for years, so you spend less time on downtime and more time on production.</p></div>
          <a href="{{ route('productlist') }}" class="btn btn--red">View all categories →</a>
        </div>
        {{-- dynamic: categories with is_feature = 1 and a category_video (managed from Admin > Product Category) --}}
        @php $featVideos = $category->where('is_feature', 1)->filter(fn($c) => !empty($c->category_video))->sortBy('sort_order')->values(); @endphp
        @foreach($featVideos->chunk(2) as $vRowIdx => $vRow)
        <div class="g video-row{{ $vRowIdx % 2 ? ' video-row--rev' : '' }}">
          @foreach($vRow as $vIdx => $vCat)
          @php
            $vPoster = preg_replace('/\.[^.]+$/', '.png', $vCat->category_video);
            $vNo = $vRowIdx * 2 + $vIdx + 1;
          @endphp
          <a class="vt" href="{{ route('products.listing', $vCat->url) }}" target="_blank" rel="noopener" aria-label="{{ $vCat->name }} machines">@if(file_exists(base_path($vPoster)))<img class="vt-img" src="{{ asset($vPoster) }}" alt="" loading="lazy">@endif<video muted loop playsinline preload="none" src="{{ asset($vCat->category_video) }}"></video><div class="ov" aria-hidden="true"></div><span class="no">{{ sprintf('%02d', $vNo) }}</span><div class="bd"><div class="big">{{ $vCat->name }}</div><div class="sm">{{ $vCat->name }} machines</div><div class="ttl">{{ $vCat->name }} machines at work</div><div class="ex">EXPLORE <i aria-hidden="true"></i></div></div></a>
          @endforeach
        </div>
        @endforeach
      </div>
    </section>

    <!-- Values: numbered tabs, a headline + line, and a photo; rotates by itself every 7 seconds -->
    <section id="values" class="sec">
      <div class="wrap">
        <p class="eyebrow">Our values</p>
        <h2 class="values-title">Why Choose Armstrong?</h2>
        <p class="head-desc values-desc">When you're investing in industrial packaging machinery, you need more than a supplier, you need a partner who understands your production line inside out. That's what four decades of building FIBC machines, woven sack machines, and finishing equipment have taught us. Here's what sets Armstrong apart for manufacturers across 70+ countries.</p>
        <div class="vals" data-interval="7000">
          <div class="vals-tabs" role="tablist" aria-label="Our values">
            <button type="button" class="vals-tab on" role="tab" aria-selected="true"><small>01</small><span>Proven Expertise</span><i aria-hidden="true"></i></button>
            <button type="button" class="vals-tab" role="tab" aria-selected="false" tabindex="-1"><small>02</small><span>Innovative Solutions</span><i aria-hidden="true"></i></button>
            <button type="button" class="vals-tab" role="tab" aria-selected="false" tabindex="-1"><small>03</small><span>End-to-End Offerings</span><i aria-hidden="true"></i></button>
            <button type="button" class="vals-tab" role="tab" aria-selected="false" tabindex="-1"><small>04</small><span>Global Reach</span><i aria-hidden="true"></i></button>
            <button type="button" class="vals-tab" role="tab" aria-selected="false" tabindex="-1"><small>05</small><span>Customer Focused</span><i aria-hidden="true"></i></button>
            <button type="button" class="vals-tab" role="tab" aria-selected="false" tabindex="-1"><small>06</small><span>Durable Design</span><i aria-hidden="true"></i></button>
          </div>
          <div class="vals-stage">
          <div class="vals-slide on" role="tabpanel">
            <div class="vals-copy"><h3>Proven Expertise</h3><p>40+ years delivering high-quality PP/PE machinery globally.</p></div>
            <div class="vals-media"><img src="{{ asset('public/front/assets/images/values/proven-expertise.webp') }}" alt="Armstrong technicians wrapping and packing a machine" width="1280" height="713" loading="lazy"></div>
          </div>
          <div class="vals-slide" role="tabpanel">
            <div class="vals-copy"><h3>Innovative Solutions</h3><p>Cutting-edge technology for maximum productivity and efficiency.</p></div>
            <div class="vals-media"><img src="{{ asset('public/front/assets/images/values/innovative-solutions.webp') }}" alt="Armstrong BelTek fold machine" width="1280" height="713" loading="lazy"></div>
          </div>
          <div class="vals-slide" role="tabpanel">
            <div class="vals-copy"><h3>End-to-End Offerings</h3><p>Comprehensive machines and spare parts, all under one roof.</p></div>
            <div class="vals-media"><img src="{{ asset('public/front/assets/images/values/end-to-end.webp') }}" alt="Armstrong automatic machine line" width="1280" height="713" loading="lazy"></div>
          </div>
          <div class="vals-slide" role="tabpanel">
            <div class="vals-copy"><h3>Global Reach</h3><p>Trusted partner across 70+ countries with local support.</p></div>
            <div class="vals-media"><img src="{{ asset('public/front/assets/images/values/global-reach.webp') }}" alt="Machine crate being loaded onto a truck for dispatch" width="1280" height="713" loading="lazy"></div>
          </div>
          <div class="vals-slide" role="tabpanel">
            <div class="vals-copy"><h3>Customer Focused</h3><p>Tailored solutions and dedicated service for every client.</p></div>
            <div class="vals-media"><img src="{{ asset('public/front/assets/images/values/customer-focused.webp') }}" alt="Armstrong customer support team at work" width="1280" height="713" loading="lazy"></div>
          </div>
          <div class="vals-slide" role="tabpanel">
            <div class="vals-copy"><h3>Durable Design</h3><p>Heavy-duty machinery built for long-lasting performance.</p></div>
            <div class="vals-media"><img src="{{ asset('public/front/assets/images/values/durable-design.webp') }}" alt="Printed woven fabric running through an Armstrong machine" width="1280" height="713"></div>
          </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Industries: auto-scrolling slider of photo cards (label, photo, short line, title) -->
    @if($applications->isNotEmpty())
    <section class="sec section-tint" id="industries">
      <div class="wrap">
        <div class="head ind-head">
          <div>
            <p class="eyebrow">Applications</p>
            <h2 class="industries-title">The Industries We Build For.</h2>
          </div>
          <div class="slider-ctrl">
            <span class="slider-count"><b id="indNum">01</b> / <span id="indTotal">{{ str_pad($applications->count(), 2, '0', STR_PAD_LEFT) }}</span></span>
            <button type="button" class="arrow-btn" aria-label="Previous industry"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1A1A1A" stroke-width="1.8"><path d="M19 12H5M11 6l-6 6 6 6"></path></svg></button>
            <button type="button" class="arrow-btn arrow-btn--dark" aria-label="Next industry"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></button>
          </div>
        </div>
        <div class="industries" tabindex="0" aria-label="Industries we build for">
          {{-- [TEST-PAGE-DYNAMIC] START: Applications (industries slider) - from the Application model, same data as /application page --}}
          @foreach($applications as $application)
          <div class="industry"><div class="industry-img"><img src="{{ asset($application->application_image) }}" alt="{{ $application->alt ?: $application->name }}" width="738" height="554" loading="lazy"></div><h3 class="industry-title">{{ $application->name }}</h3><p class="industry-desc">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags((string) $application->short_description)), 110) }}</p></div>
          @endforeach
          {{-- [TEST-PAGE-DYNAMIC] END: Applications --}}
        </div>
      </div>
    </section>
    @endif

    <!-- Certificates -->
    <section class="certs">
      <div class="wrap">
        <div class="head head--tight"><div><p class="eyebrow">Recognition</p><h2 class="h2">Certifications <em>&amp; Quality Standards</em></h2><p class="head-desc">Certifications aren't paperwork for us; they're proof. Our FIBCA membership and industry affiliations reflect the same standards we hold ourselves to: precision, safety, and machines built to last, wherever they end up.</p></div></div>
        <div class="g cert-grid">
          <div class="card cert"><img class="cert-logo" src="{{ asset('public/front/assets/images/certifications/fibca.png') }}" alt="FIBCA member" loading="lazy"><div class="cert-name">Flexible Intermediate Bulk Container Association</div></div>
          <div class="card cert"><img class="cert-logo" src="{{ asset('public/front/assets/images/certifications/iftex.png') }}" alt="IFTEX" loading="lazy"><div class="cert-name">Indian Federation of Woven Technical Textiles</div></div>
          <div class="card cert"><img class="cert-logo" src="{{ asset('public/front/assets/images/certifications/pmmai.png') }}" alt="PMMAI" loading="lazy"><div class="cert-name">Plastics Machinery Manufacturers Association of India</div></div>
          <div class="card cert"><img class="cert-logo" src="{{ asset('public/front/assets/images/certifications/plexconcil.png') }}" alt="Plexconcil" loading="lazy"><div class="cert-name">The Plastics Export Promotion Council</div></div>
          <div class="card cert"><img class="cert-logo" src="{{ asset('public/front/assets/images/certifications/iip.webp') }}" alt="Indian Institute of Packaging" loading="lazy"><div class="cert-name">Indian Institute of Packaging</div></div>
        </div>
      </div>
    </section>

    <!-- Built For a Stronger Tomorrow (content from the live site; same card format as the "Why Armstrong" pillars) -->
    <section class="sec section-tint" id="stronger">
      <div class="wrap">
        <div class="head">
          <div><h2 class="h2">Built For <em>a Stronger Tomorrow.</em></h2><p class="head-desc">Good machines don't happen by accident; they come from constant refinement. Between our R&amp;D team, our testing lab, and our fabrication units, every FIBC and woven sack machine we ship has been through real scrutiny before it ever reaches your floor.</p></div>
        </div>
        <div class="g pillars pillars--4">
          <div class="pillar"><img src="{{ asset('public/front/assets/images/features/feat-1.svg') }}" alt="" width="50" height="54" loading="lazy"><h3 class="pillar-title">Fully Equipped Testing and Inspection Lab</h3><p class="body-text">Every machine is tested thoroughly before it leaves our facility.</p></div>
          <div class="pillar"><img src="{{ asset('public/front/assets/images/features/feat-2.svg') }}" alt="" width="54" height="54" loading="lazy"><h3 class="pillar-title">Continuous Process Improvement &amp; Innovation</h3><p class="body-text">We keep refining our processes so machines run faster and last longer.</p></div>
          <div class="pillar"><img src="{{ asset('public/front/assets/images/features/feat-3.svg') }}" alt="" width="54" height="54" loading="lazy"><h3 class="pillar-title">State-of-the-Art Assembly &amp; Fabrication Units</h3><p class="body-text">Built in-house, so we control quality at every step.</p></div>
          <div class="pillar"><img src="{{ asset('public/front/assets/images/features/feat-4.svg') }}" alt="" width="54" height="54" loading="lazy"><h3 class="pillar-title">Dedicated R&amp;D and Prototyping Zone</h3><p class="body-text">Real customer problems shape every machine we design.</p></div>
        </div>
      </div>
    </section>

    @if($clientsays->isNotEmpty())
    <!-- Testimonials -->
    <section id="testimonials">
      <div class="wrap relative-wrap">
        <div class="g tm-head">
          <div>
            <p class="eyebrow eyebrow--red">Testimonials</p>
            <h2 class="display-title display-title--tight">What Our Customers Say.</h2>
          </div>
          <p class="tm-intro">Don't just take our word for it, hear from packaging manufacturers across 70+ countries who rely on Armstrong's machines to run their production lines efficiently, day after day.</p>
        </div>
        <!-- Rendered by assets/js/main.js from the quotes below -->
        <div id="tmTrack" class="tm-track g">
          {{-- [TEST-PAGE-DYNAMIC] START: Testimonials - from the Client model (name, description, designation, rating, profile_image) --}}
          @foreach($clientsays as $client)
          @php
              $tn_rating = max(0, min(5, (int) ($client->rating ?? 5)));
              $tn_words  = preg_split('/\s+/', trim((string) $client->name), -1, PREG_SPLIT_NO_EMPTY);
              $tn_init   = strtoupper(mb_substr($tn_words[0] ?? '', 0, 1) . (count($tn_words) > 1 ? mb_substr(end($tn_words), 0, 1) : ''));
              $tn_has_img = !empty($client->profile_image) && file_exists(base_path('public/front/images/clients/' . $client->profile_image));
          @endphp
          <figure class="tm-card">
            <div class="tm-top"><span class="stars" role="img" aria-label="{{ $tn_rating }} out of 5 stars">@for($i = 1; $i <= 5; $i++)<svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24"@if($i > $tn_rating) class="off"@endif><path d="M12 2l3 6.5 7 .9-5.2 4.8 1.4 7L12 17.8 5.8 21.2l1.4-7L2 9.4l7-.9z"></path></svg>@endfor</span><span class="qm" aria-hidden="true">“</span></div>
            <blockquote>“{{ trim(html_entity_decode(strip_tags((string) $client->description))) }}”</blockquote>
            <figcaption><span class="av" aria-hidden="true">@if($tn_has_img)<img src="{{ asset('public/front/images/clients/' . $client->profile_image) }}" alt="" width="48" height="48">@else{{ $tn_init }}@endif</span><span><span class="nm">{{ $client->name }}</span><span class="rl">{{ ($client->designation && strcasecmp(trim($client->designation), trim($client->name)) !== 0) ? $client->designation : '' }}</span></span></figcaption>
          </figure>
          @endforeach
          {{-- [TEST-PAGE-DYNAMIC] END: Testimonials --}}
        </div>
        <div class="tm-foot">
          <div id="tmDots" class="dots" aria-hidden="true"></div>
          <div class="slider-ctrl">
            <span class="slider-count"><b id="tmNum">02</b> / <span id="tmTotal">08</span></span>
            <button type="button" class="arrow-btn" aria-label="Previous testimonial"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1A1A1A" stroke-width="1.8"><path d="M19 12H5M11 6l-6 6 6 6"></path></svg></button>
            <button type="button" class="arrow-btn arrow-btn--dark" aria-label="Next testimonial"><svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"></path></svg></button>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- Process -->
    <section class="sec">
      <div class="wrap">
        <div class="head"><div><p class="eyebrow">Working Together</p><h2 class="h2">From Enquiry <em>to Installation.</em></h2><p class="head-desc">Every Armstrong machine follows a structured process - from initial enquiry and market analysis to design, fabrication, quality testing, and final dispatch. This disciplined approach to industrial machine manufacturing ensures every FIBC, woven sack, or sewing machine we ship meets strict quality benchmarks and is ready for seamless installation at your facility.</p></div></div>
        <div class="g process">
          <div class="step"><div class="step-no">01</div><h3 class="step-title">Enquiry</h3><p class="small-text">Share your bag spec and output target.</p></div>
          <div class="step"><div class="step-no">02</div><h3 class="step-title">Proposal</h3><p class="small-text">Machine recommendation and quotation.</p></div>
          <div class="step"><div class="step-no">03</div><h3 class="step-title">Order</h3><p class="small-text">PO confirmed, build scheduled.</p></div>
          <div class="step"><div class="step-no">04</div><h3 class="step-title">Build &amp; Trial</h3><p class="small-text">Manufactured and trial-run on your fabric.</p></div>
          <div class="step"><div class="step-no">05</div><h3 class="step-title">Dispatch</h3><p class="small-text">Packed and shipped to your plant.</p></div>
          <div class="step"><div class="step-no">06</div><h3 class="step-title">Install &amp; Train</h3><p class="small-text">On-site setup, training and support.</p></div>
        </div>
      </div>
    </section>

    @if($blogs->isNotEmpty())
    <!-- Blogs -->
    <section id="blogs" class="sec section-tint">
      <div class="wrap">
        <div class="head">
          <div><p class="eyebrow">Blogs</p><h2 class="h2">Latest Insights <em>&amp; Industry Guides</em></h2></div>
          <a href="{{ route('blog') }}" class="btn ghost">View all blogs →</a>
        </div>
        <div class="blog-grid">
          {{-- [TEST-PAGE-DYNAMIC] START: Blogs - latest 3 active blogs from the Blogs model --}}
          @foreach($blogs->take(3) as $blog)
          @php
              $tn_blog_url = route('blogs.detail', $blog->url);
              $tn_blog_img = ($blog->front_image && file_exists(base_path($blog->front_image)))
                  ? asset('/' . $blog->front_image)
                  : asset('public/front/assets/images/blogs/bag-stitching-machine.jpg');
          @endphp
          <article class="blog rv">
            <a href="{{ $tn_blog_url }}" class="blog-img"><img src="{{ $tn_blog_img }}" alt="{{ $blog->title }}" width="500" height="341" loading="lazy"></a>
            <p class="blog-cat">{{ $blog->date ? date('F j, Y', strtotime($blog->date)) : '' }}</p>
            <h3 class="blog-title"><a href="{{ $tn_blog_url }}">{{ $blog->title }}</a></h3>
            <p class="blog-ex">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags((string) $blog->short_description)), 160) }}</p>
            <a href="{{ $tn_blog_url }}" class="blog-more">Read article <span aria-hidden="true">→</span></a>
          </article>
          @endforeach
          {{-- [TEST-PAGE-DYNAMIC] END: Blogs --}}
        </div>
      </div>
    </section>

  </main>
    @endif

{{-- [TEST-PAGE-DYNAMIC] Footer (+ floating buttons, video lightbox, scripts): shared layouts.frontfooter (new-design branch enabled by test_new) --}}
@include('layouts.frontfooter', ['test_new' => true])

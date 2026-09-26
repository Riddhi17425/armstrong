@include('layouts.frontheader', [
    'og_image' => asset('public/front/img/manufacture.webp'),
    'home_new' => true
])
@php
    /* All assets of the new home page live in public/front/home-new/{css,js,images,icons} */
    $hn = asset('public/front/home-new');

    // name, image, keyword (category match), x, y, w, h  -> px inside the 390x222 (spare parts: 790x222) image area of the Figma card
    $products = [
        ['FIBC Machines',                  'prod-fibc',        'fibc',     22, 47, 345, 139, 390],
        ['Woven Sack Machines',            'prod-woven',       'woven',    22, 53, 345, 127, 390],
        ['Sewing Machines',                'prod-sewing',      'sewing',   60, 14, 269, 206, 390],
        ['Mulch Film Punching Machines',   'prod-mulch',       'mulch',    20, 38, 350, 158, 390],
        ['Bag Closing Machines',           'prod-bagclosing',  'closing',  22, 23, 346, 187, 390],
        ['Needle Loom Machines',           'prod-needleloom',  'needle',   36, 33, 318, 168, 390],
        ['Tarpaulin Machines',             'prod-tarpaulin',   'tarpaulin',22, 17, 346, 200, 390],
        ['Circular Loom Machines',         'prod-circular',    'circular', 27, 27, 336, 179, 390],
        ['Conveyor Machines',              'prod-conveyor',    'conveyor', 137,25, 115, 184, 390],
        ['Flexographic Printing Machines', 'prod-flexo',       'flexo',    20, 30, 349, 173, 390],
        ['Spare Parts',                    'prod-spare',       'spare',    117,19, 555, 195, 790],
    ];
    $pct = fn($v, $base) => round($v / $base * 100, 3) . '%';
    $H = 222;
@endphp
<link rel="stylesheet" href="{{ $hn }}/css/home.css">

<main class="hn">

    {{-- ================= HERO ================= --}}
    <section class="hn-hero">
        <div class="hn-wrap">
            <div class="hn-hero__content">
                <div class="hn-hero__text">
                    <h1>India's Leading Manufacturer of FIBC &amp; Woven Sack Machinery</h1>
                    <p>Four decades of engineering. Machinery built for precision, <br>productivity and lasting performance.</p>
                </div>
                <div class="hn-hero__btns">
                    <a href="{{ route('productlist') }}" class="hn-btn hn-btn--white">Explore Our Machines <img src="{{ $hn }}/icons/arrow-btn-dark.svg" alt=""></a>
                    <a href="#" class="hn-btn hn-btn--ghost" data-bs-toggle="modal" data-bs-target="#exampleModal">Request a Quote <img src="{{ $hn }}/icons/arrow-sm-white.svg" alt=""></a>
                </div>
            </div>
            <button type="button" class="hn-play" data-hn-video aria-label="Play video"><img src="{{ $hn }}/icons/play.svg" alt=""></button>
        </div>
    </section>

    {{-- ================= STATS ================= --}}
    <div class="hn-wrap">
        <div class="hn-stats">
            <div class="hn-stat"><strong data-count="120">120+</strong><span>Talented
Team</span></div>
            <i class="hn-stats__sep"></i>
            <div class="hn-stat"><strong data-count="80">80+</strong><span>Innovative<br>Products</span></div>
            <i class="hn-stats__sep"></i>
            <img class="hn-stats__img" src="{{ $hn }}/images/stats-center.png" alt="Armstrong">
            <i class="hn-stats__sep"></i>
            <div class="hn-stat"><strong data-count="70">70+</strong><span>Export Countries</span></div>
            <i class="hn-stats__sep"></i>
            <div class="hn-stat"><strong data-count="5500">5500+</strong><span>Worldwide<br>Customer</span></div>
        </div>
    </div>

    {{-- ================= ABOUT ================= --}}
    <section class="hn-about hn-after-stats">
        <div class="hn-about__text">
            <div class="hn-about__top">
                <h2 class="hn-title">About <span>Armstrong</span></h2>
                <div class="hn-about__paras">
                    <p>Engineering precision, delivering excellence.Transforming the industrial packaging industry.</p>
                    <p>With over 40 years of experience in working for the industrial packaging industry, we are now a leading name as the top FIBC machine manufacturers in India. From FIBC machines and woven sack machinery to HDPE sack sewing solutions. Our FIBC machines are built for durability, precision, and efficiency.</p>
                    <p>Every machine we deliver is designed, assembled, and tested in-house in our state-of-the-art workplace, meeting industrial standards for high-quality and powerful performance. Today we serve across 30 countries, not just with our machines, but even additional technical expertise through customization and after-sales support.</p>
                    <!-- <p>With over 40 years of experience in working for the industrial packaging industry, we are now a leading name as the top FIBC machine manufacturers in India. From FIBC machines and woven sack machinery to HDPE sack sewing solutions. Our FIBC machines are built for durability, precision, and efficiency.</p>
                    <p>Every machine we deliver is designed, assembled, and tested in-house in our state-of-the-art workplace, meeting industrial standards for high-quality and powerful performance. Today we serve across 30+ countries, not just with our machines, but even additional technical expertise through customization and after-sales support.</p> -->
                </div>
            </div>
            <div class="hn-about__bar"></div>
            <div class="hn-about__tag">Quality &nbsp;|&nbsp; Innovation &nbsp;|&nbsp; Reliability</div>
        </div>
        <img class="hn-about__img" src="{{ $hn }}/images/about.png" alt="About Armstrong" loading="lazy">
    </section>

    {{-- ================= PRODUCT RANGE ================= --}}
    <section class="hn-block hn-products">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>Our</span> Product Range</h2>
                <p class="hn-lead">Our advanced machinery ensures precision, efficiency, and consistent quality.
It reduces wastage, energy use, and downtime while maintaining safety.
With modern technology, we deliver reliable and scalable manufacturing solutions.</p>
            </div>
            <div class="hn-btnrow">
                <a href="{{ route('productlist') }}" class="hn-btn hn-btn--red">Explore all machines <img src="{{ $hn }}/icons/arrow-sm-white.svg" alt=""></a>
                <a href="#" class="hn-btn hn-btn--line" data-bs-toggle="modal" data-bs-target="#exampleModal">Get A Quote <img src="{{ $hn }}/icons/arrow-sm-red.svg" alt=""></a>
            </div>
            <div class="hn-pgrid">
                @foreach($products as [$name, $img, $kw, $x, $y, $w, $h, $base])
                    @php
                        $cat = $category->first(fn($c) => \Illuminate\Support\Str::contains(strtolower($c->name ?? ''), $kw));
                        $link = $cat ? route('products.listing', $cat->url) : route('productlist');
                    @endphp
                    <a href="{{ $link }}" class="hn-pcard {{ $base > 390 ? 'hn-pcard--wide' : '' }}">
                        <span class="hn-pcard__media">
                            <img src="{{ $hn }}/images/{{ $img }}.png" alt="{{ $name }}" loading="lazy"
                                 style="--x:{{ $pct($x, $base) }};--y:{{ $pct($y, $H) }};--w:{{ $pct($w, $base) }};--h:{{ $pct($h, $H) }}">
                        </span>
                        <span class="hn-pcard__bar"><b>{{ $name }}</b><img src="{{ $hn }}/icons/card-arrow.svg" alt=""></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= PRECISION MANUFACTURING INFRASTRUCTURE ================= --}}
    <section class="hn-block hn-infra">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>Precision</span> Manufacturing Infrastructure</h2>
                <p class="hn-lead">Our manufacturing infrastructure is equipped with state-of-the-art machinery designed to deliver precision, efficiency, and consistent quality. From advanced weaving and needle loom machines to high-speed finishing equipment, every setup is optimized for maximum productivity and minimal downtime. These machines not only ensure uniform output but also reduce wastage, save energy, and enhance operational safety. With cutting-edge technology at the core of our operations, our infrastructure supports scalable production while maintaining superior standards, making us a reliable partner in industrial manufacturing.</p>
            </div>
            <div class="hn-units">
                <div class="hn-unit">
                    <div class="hn-unit__img" style="background-image:url('{{ $hn }}/images/infra-unit1.png')">
                        <button type="button" class="hn-play" data-hn-video="{{ asset('public/front/img/video-factory.mp4') }}" aria-label="Play video"><img src="{{ $hn }}/icons/play.svg" alt=""></button>
                    </div>
                    <a href="{{ route('our.infrastructure') }}" class="hn-unit__bar">
                        <div class="hn-unit__left"><img src="{{ $hn }}/icons/infra-1.svg" alt=""><h3>Raffia Woven &amp; FIBC Machinery Unit-1</h3></div>
                        <p>Advanced machinery for high-performance FIBC and woven sack production.</p>
                    </a>
</div>
                <div class="hn-unit">
                    <div class="hn-unit__img" style="background-image:url('{{ $hn }}/images/infra-unit2.png')">
                        <button type="button" class="hn-play" data-hn-video="{{ asset('public/front/img/Armstrong_Video_Manufacturing.mp4') }}" aria-label="Play video"><img src="{{ $hn }}/icons/play.svg" alt=""></button>
                    </div>
                    <a href="{{ route('our.infrastructure') }}" class="hn-unit__bar">
                        <div class="hn-unit__left"><img src="{{ $hn }}/icons/infra-2.svg" alt=""><h3>Sewing Machines &amp; Spares Unit-2</h3></div>
                        <p>Precision solutions for sewing machines and spares manufacturing.</p>
                    </a>
</div>
            </div>
        </div>
    </section>

    {{-- ================= BUILT FOR A STRONGER TOMORROW ================= --}}
    <section class="hn-block hn-built">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>Built</span> <span>For</span> a Stronger Tomorrow</h2>
                <p class="hn-lead">Our advanced infrastructure enables precision manufacturing, consistent quality, and continuous innovation, helping us deliver reliable solutions for a stronger tomorrow.</p>
            </div>
            <div class="hn-cols">
                @foreach([
                    ['feat-1', 'Fully equipped testing and inspection lab', 'Ensuring superior quality and reliability at every stage.', '50x54'],
                    ['feat-2', 'Continuous process improvement & innovation', 'Upgrading technology and processes for better performance.', '54x54'],
                    ['feat-3', 'State-of-the-art assembly & fabrication units', 'Modern facilities with advanced machinery for precision manufacturing', '54x54'],
                    ['feat-4', 'Dedicated R&D and prototyping zone', 'Transforming ideas into reliable solutions for tomorrow', '54x54'],
                ] as $i => [$ic, $t, $d, $size])
                    @if($i) <i class="hn-vline"></i> @endif
                    <div class="hn-col">
                        <div class="hn-col__icon"><img src="{{ $hn }}/icons/{{ $ic }}.svg" alt="" width="{{ explode('x', $size)[0] }}" height="{{ explode('x', $size)[1] }}"></div>
                        <div class="hn-col__body"><h3>{{ $t }}</h3><p>{{ $d }}</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= FEATURED MACHINE ================= --}}
    <section class="hn-block hn-featured">
        <div class="hn-wrap">
            @php
                $featured = [
                    ['Bag', 'Closing Machines', 'featured-machine', 'Bag Closing Machines'],
                    ['FIBC', 'Machines', 'prod-fibc', 'FIBC Machines'],
                    ['Woven Sack', 'Machines', 'prod-woven', 'Woven Sack Machines'],
                    ['Sewing', 'Machines', 'prod-sewing', 'Sewing Machines'],
                ];
                $specs = [
                    ['spec-1', 'Global Experience', 'Upto 2000 SPM'],
                    ['spec-2', 'Lorem ipsum', 'Lorem ipsum dolor sit'],
                    ['spec-3', 'Lorem ipsum', 'Lorem ipsum dolor sit'],
                ];
            @endphp
            <div class="swiper hn-feat__slider">
                <div class="swiper-wrapper">
                    @foreach($featured as [$w1, $w2, $img, $alt])
                    <div class="swiper-slide">
                        <div class="hn-feat">
                            <div class="hn-feat__text">
                                <h2 class="hn-title"><span>{{ $w1 }}</span> {{ $w2 }}</h2>
                                <p>Lorem ipsum dolor sit amet consectetur. Morbi tempor vitae quis est amet viverra quis amet. In euismod ultrices nulla sed enim fames proin. Lectus ante metus imperdiet lectus eget.</p>
                                <a href="{{ route('productlist') }}" class="hn-btn hn-btn--red">Explore all machines <img src="{{ $hn }}/icons/arrow-sm-white.svg" alt=""></a>
                            </div>
                            <div class="hn-feat__stage">
                                <div class="hn-feat__frame">
                                    <img class="hn-feat__pic" src="{{ $hn }}/images/{{ $img }}.png" alt="{{ $alt }}" loading="lazy">
                                    <div class="hn-feat__badge"><img src="{{ $hn }}/icons/featured-badge.svg" alt=""></div>
                                </div>
                            </div>
                            <ul class="hn-feat__specs">
                                @foreach($specs as [$ic, $t, $d])
                                    <li class="hn-spec">
                                        <span class="hn-spec__ic"><img src="{{ $hn }}/icons/{{ $ic }}.svg" alt=""></span>
                                        <span class="hn-spec__line"></span>
                                        <span class="hn-spec__txt"><b>{{ $t }}</b><span>{{ $d }}</span></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hn-feat hn-feat--dots"><div class="hn-dots hn-feat__dots"></div></div>
        </div>
    </section>

    {{-- ================= WHY CHOOSE ARMSTRONG ================= --}}
    <section class="hn-block hn-why">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>Why</span> Choose Armstrong?</h2>
                <p class="hn-lead">Lorem ipsum dolor sit amet consectetur. Morbi tempor vitae quis est amet viverra quis amet. In euismod ultrices nulla sed enim fames proin. Lectus ante metus imperdiet lectus eget. In vitae in sit imperdiet aliquam fames. Ullamcorper in turpis vestibulum dolor libero lobortis. Aliquet nibh pulvinar et volutpat. Lacinia netus sem mauris amet nunc ut eget.</p>
            </div>
            <div class="hn-why__grid">
                @foreach([
                    ['why-1', 44, 'Proven Industry Expertise', 'With decades of experience, we understand the packaging industry and deliver solutions that perform in real-world conditions.'],
                    ['why-2', 40, 'In-House Manufacturing', 'Our state-of-the-art facility ensures complete control over quality, timely delivery, and continuous improvement.'],
                    ['why-3', 44, 'Engineering & Innovation', 'We invest in modern R&D to build machines that are smarter, more efficient, and reliable for demanding environments.'],
                    ['why-4', 42, 'Custom-Built Solutions', 'Every business is unique. We design and manufacture machines tailored to your exact specifications and requirements.'],
                    ['why-5', 50, 'End-to-End Support', 'From installation and training to after-sales service, we are with you at every step for uninterrupted performance.'],
                    ['why-6', 50, 'Global Experience', 'Our machines are trusted across 30+ countries, with tailored solutions worldwide for diverse industries.'],
                ] as [$ic, $s, $t, $d])
                    <div class="hn-why__card">
                        <span class="hn-why__ic"><img src="{{ $hn }}/icons/{{ $ic }}.svg" alt="" width="{{ $s }}" height="{{ $s }}"></span>
                        <div class="hn-why__body"><h3>{{ $t }}</h3><i></i><p>{{ $d }}</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= MANUFACTURING PROCESS ================= --}}
    <section class="hn-block hn-process">
        <img class="hn-process__map" src="{{ $hn }}/icons/world-map.svg" alt="">
        <div class="hn-process__inner">
            <div class="hn-wrap">
                <div class="hn-head">
                    <h2 class="hn-title"><span>Our</span> Manufacturing Process</h2>
                    <p class="hn-lead">Lorem ipsum dolor sit amet consectetur. Morbi tempor vitae quis est amet viverra quis amet. In euismod ultrices nulla sed enim fames proin. Lectus ante metus imperdiet lectus eget. In vitae in sit imperdiet aliquam fames. Ullamcorper in turpis vestibulum dolor libero lobortis. Aliquet nibh pulvinar et volutpat. Lacinia netus sem mauris amet nunc ut eget.</p>
                </div>
            </div>
            <div class="swiper hn-process__slider">
                <div class="swiper-wrapper">
                    @foreach([
                        ['10', 'Market Requirement Analysis', 'Understanding trends to match your business demand.', 'proc-enquiry'],
                        ['11', 'Enquiry', 'We listen to your needs and project goals.', 'proc-enquiry'],
                        ['01', 'Training & Handover', 'Complete guidance for smooth machine handling.', 'proc-training'],
                        ['02', 'Machine Installation & Commissioning', 'Seamless setup for quick operations.', 'proc-install'],
                        ['03', 'Packing & Dispatch', 'Safe packaging and on-time delivery worldwide.', 'proc-dispatch'],
                    ] as [$no, $t, $d, $img])
                        <div class="swiper-slide">
                            <div class="hn-step">
                                <i class="hn-step__dot"></i>
                                <span class="hn-step__no">{{ $no }}</span>
                                <img class="hn-step__img" src="{{ $hn }}/images/{{ $img }}.png" alt="{{ $t }}" loading="lazy">
                                <h3>{{ $t }}</h3>
                                <p>{{ $d }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hn-dots hn-process__dots"></div>
        </div>
    </section>

    {{-- ================= CERTIFICATIONS ================= --}}
    <section class="hn-cert">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>Certifications</span> &amp; Quality Standards</h2>
                <p class="hn-lead" style="max-width:1480px">Lorem ipsum dolor sit amet consectetur. Morbi tempor vitae quis est amet viverra quis amet. In euismod ultrices nulla sed enim fames proin. Lectus ante metus imperdiet lectus eget. In vitae in sit imperdiet aliquam fames. Ullamcorper in turpis vestibulum dolor libero lobortis. Aliquet nibh pulvinar et volutpat. Lacinia netus sem mauris amet nunc ut eget.</p>
            </div>
            <div class="hn-cert__row">
                <div class="hn-cert__item">
                    <img src="{{ $hn }}/images/cert-fibca.png" alt="FIBCA member" width="207.56" height="67.8">
                    <span>Flexible Intermediate Bulk<br>Container Association</span>
                </div>
                <i class="hn-cert__line"></i>
                <div class="hn-cert__item"><img src="{{ $hn }}/images/cert-2.png" alt="Certification" width="205" height="69" style="object-fit:cover"></div>
                <i class="hn-cert__line"></i>
                <div class="hn-cert__item"><img src="{{ $hn }}/images/cert-pmmai.png" alt="PMMAI" width="166" height="132"></div>
                <i class="hn-cert__line"></i>
                <div class="hn-cert__item"><img src="{{ $hn }}/images/cert-4.png" alt="Certification" width="107" height="134"></div>
                <i class="hn-cert__line"></i>
                <div class="hn-cert__item"><img src="{{ $hn }}/images/cert-5.png" alt="Certification" width="127" height="141" style="object-fit:cover"></div>
            </div>
        </div>
    </section>

    {{-- ================= TESTIMONIALS ================= --}}
    <section class="hn-block hn-testi">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>What Our</span> Customers Say?</h2>
                <p class="hn-lead">Lorem ipsum dolor sit amet consectetur. Morbi tempor vitae quis est amet viverra quis amet. In euismod ultrices nulla sed enim fames proin. Lectus ante metus imperdiet lectus eget. In vitae in sit imperdiet aliquam fames. Ullamcorper in turpis vestibulum dolor libero lobortis. Aliquet nibh pulvinar et volutpat. Lacinia netus sem mauris amet nunc ut eget.</p>
            </div>
            <div class="swiper hn-testi__slider">
                <div class="swiper-wrapper">
                    @php $testis = [
                        ['harsh gajjar', 'Very responsive team. Good service and overall great experience.', 'user-1'],
                        ['Swati Darji', 'Recommend to all.. supportive staff .. best quality product .. best in PP bag machinery and FIBC machinery.. timely delivery...', 'user-2'],
                        ['Meet Dave', 'Faster service provider, Top class quality FIBC, Wovensack & Bag closer stitching machines manufacturer..', 'user-3'],
                    ]; $testis = array_merge($testis, $testis); @endphp
                    @foreach($testis as [$name, $text, $img])
                        <div class="swiper-slide">
                            <div class="hn-tcard">
                                <div class="hn-tcard__author"><img src="{{ $hn }}/images/{{ $img }}.png" alt="{{ $name }}"><b>{{ $name }}</b></div>
                                <p>{{ $text }}</p>
                                <div class="hn-tcard__foot">
                                    <div class="hn-stars">@for($i = 0; $i < 5; $i++)<img src="{{ $hn }}/icons/star.svg" alt="">@endfor</div>
                                    <div class="hn-quote"><img src="{{ $hn }}/icons/quote-1.svg" alt=""><img src="{{ $hn }}/icons/quote-2.svg" alt=""></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hn-dots hn-testi__dots"></div>
        </div>
    </section>

    {{-- ================= LATEST INSIGHTS ================= --}}
    <section class="hn-block hn-blogs">
        <div class="hn-wrap">
            <div class="hn-head">
                <h2 class="hn-title"><span>Latest Insights</span> &amp; Industry Guides</h2>
                <p class="hn-lead">Lorem ipsum dolor sit amet consectetur. Morbi tempor vitae quis est amet viverra quis amet. In euismod ultrices nulla sed enim fames proin. Lectus ante metus imperdiet lectus eget. In vitae in sit imperdiet aliquam fames. Ullamcorper in turpis vestibulum dolor libero lobortis. Aliquet nibh pulvinar et volutpat. Lacinia netus sem mauris amet nunc ut eget.</p>
            </div>
            @php
                $demoBlogs = [
                    ['June 23, 2026', 'What Makes a Heat Sealing Machine the Right Choice for Your Packaging Industry'],
                    ['June 19, 2026', 'Bag Closing Machines: How to Choose the Right One for Your Industry'],
                    ['June 8, 2026',  'How to Choose the Right Industrial Heavy- Duty Bag Sealing Machine for Your Business'],
                ];
            @endphp
            <div class="hn-blogs__grid">
                @foreach($demoBlogs as $i => [$date, $title])
                    @php $item = $blogs->values()->get($i); @endphp
                    <a class="hn-bcard" href="{{ $item ? route('blogs.detail', $item->url) : route('blog') }}">
                        <div>
                            <div class="hn-bcard__date"><span>Date</span><i></i><span>{{ $item && $item->created_at ? $item->created_at->format('F j, Y') : $date }}</span></div>
                            <h3>{{ $item->title ?? $title }}</h3>
                        </div>
                        <div class="hn-bcard__img">
                            <img src="{{ $item && $item->front_image && file_exists(base_path($item->front_image)) ? asset('/' . $item->front_image) : $hn . '/images/blog-' . ($i + 1) . '.png' }}" alt="{{ $item->title ?? $title }}" loading="lazy">
                        </div>
                        <div class="hn-bcard__more"><span>Read More</span><img src="{{ $hn }}/icons/blog-arrow.svg" alt=""></div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</main>

{{-- hero video popup --}}
<div class="hn-video" id="hnVideo">
    <div class="hn-video__box">
        <button type="button" class="hn-video__close" aria-label="Close">&times;</button>
        <video controls playsinline preload="none" poster="{{ asset('public/front/img/Armstrong_home_thumb.jpg') }}" data-src="{{ asset('public/front/img/Armstrong_home_vid3.mp4') }}"></video>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ $hn }}/js/home.js"></script>
@include('layouts.frontfooter')

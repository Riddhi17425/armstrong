@php $home_new = true; /* new Figma header is used on EVERY page */ @endphp
{{-- [TEST-PAGE-NEW-DESIGN] class imports hoisted to file top (they used to sit inside the header markup); needed because the legacy header is now wrapped in @if --}}
@php
use App\Models\ProductCategory;
use App\Models\ProductMaster;
use App\Models\Application;
@endphp
{{-- [TEST-PAGE-NEW-DESIGN] switch: every page except the home page ('/') gets the new header/footer; the test page passes test_new + tn_home (transparent header over the hero), inner pages get the same header in its solid white form --}}
@php
    $test_new = $test_new ?? !Request::is('/');
    $tn_inner = !empty($test_new) && empty($tn_home);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $metatitle ?? 'Armstrong' !!}</title>
    <meta name="description" content="{{ $metadescription ?? '' }}">
    <link rel="icon" type="image/x-icon" href="{{asset('public/front/images/favicon.webp')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/img/favicon.webp')}}">

    <!--og tags-->
     <meta property="og:title" content="{!! $metatitle ?? 'Armstrong' !!}">
    <meta property="og:description" content="{!! $metadescription ?? ''!!}">
    <meta property="og:image" content="{{ $og_image ?? asset('public/admin/milestone/milestone-4-68b95fdcf2219.jpg') }}">

    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:type" content="website">

    @if (Request::is('woven-bag-lamination-machine'))
        <meta name="robots" content="noindex, nofollow">
    @endif
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MF2C8CJ3');</script>
    <!-- End Google Tag Manager -->


    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- NEW ADDED FOR NEW HOME PAGE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    {{-- [TEST-PAGE-NEW-DESIGN] home page (and test): full new-home css. INNER pages: only the header/footer part of it (style-layout.css) - the page content uses the legacy css/style.css below. --}}
    @if(empty($tn_inner))<link rel="stylesheet" href="{{ asset('public/front/assets/css/style.css') }}">@endif

    <!-- Select2 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css')}}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <style>
        .custom-placeholder {
            color: #666;
        }

        @media (max-width: 767.98px) {
            .custom-placeholder {
                display: none;
            }


        }



       .language-select  {
        display: flex;
        align-items: center;
        border: 1px solid #DDDDDD;
        border-radius: 5px;
        padding: .4em 0;
    }



    .dropdown-wrapper {
      position: relative;
      width: 200px;
    }

    .dropdown-input-lan {
      width: 100%;
      border: none;
      padding-left:10px;
      cursor: pointer;
    }



    .dropdown-input-lan:focus {
      outline: none;
      border-color: unset;

    }

    .dropdown-list {
      position: absolute;
      top: 136%;
      left: -50px;
      right: -15px;
      max-height: 250px;
      overflow-y: auto;
      background: #fff;
      /*border: 1px solid #ddd;*/
      /*border-radius: 6px;*/
      z-index: 100;
      display: none;
    }

    .dropdown-list.show {
      display: block;
    }

    .dropdown-list .search-box {
      padding: 6px 10px;
      /*border-bottom: 1px solid #ddd;*/
      /*background: #f9f9f9;*/
    }

    .dropdown-list .search-box input {
      width: 100%;
      padding: 6px 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .dropdown-list .search-box input:focus {
      outline: none;
      border-color: none;
    }

    .dropdown-list .list-items div {
      padding: 8px 12px;
      cursor: pointer;
    }

    .dropdown-list .list-items div:hover {
      background-color: #f1f1f1;
    }

    /* Hide Google Translate elements */
    .goog-te-banner-frame,
    .skiptranslate {
      display: none !important;
    }

    body {top: 0 !important;}

    /* Ensure dropdown remains untranslated */
    .notranslate {translate: no;}

    .skiptranslate {display: none !important;}
    .modal-body .contact{border:none;padding:0;}
    .select2-container--default .select2-selection--single{border:none;}

    /* NEW CODE FOR First category red by default, hovered category red */
    .category-btn.active .pagename span {
        color: #E41E29 !important;
    }
    .category-btn .pagename span {
        color: #333;
        transition: color 0.2s ease;
    }
    .category-btn:hover .pagename span {
        color: #E41E29 !important;
    }

    .application_header_link img
    {
        width: 80px;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 4px;
    }
    .phone-icon{
        display: flex;
        align-content: center;
        align-items: center;
    }
    .phone-icon p{
        margin-bottom: 0;
    }
       .phone-icon .fas{
        transform: rotate(90deg);
    }
    
    @media (max-width: 1537px) {
        .application_header_link img {
    width: 70px;

}

    @media (max-width: 1441px) {
        .application_header_link img {
    width: 60px;

}


    }

    </style>

    <meta name="google-site-verification" content="TlYf45dh6qXvTaP3Fa7Rfs8LCcGkuluXggXlj4TXlZQ" />

    <script type="application/ld+json">
    {!! $localSchema !!}
    </script>
    
    @if(!empty($home_new))
    <link rel="stylesheet" href="{{ asset('public/front/home-new/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/home-new/css/footer.css') }}">
    @endif
    {{-- [TEST-PAGE-NEW-DESIGN] new homepage stylesheet re-loaded last (only on the test page) so its sections/header win over the shared legacy css --}}
    @if(!empty($test_new))
    @if(empty($tn_inner)) <link rel="stylesheet" href="{{ asset('public/front/assets/css/style.css') }}"> @else <link rel="stylesheet" href="{{ asset('public/front/assets/css/style-layout.css') }}?v=1"> @endif {{-- inner pages: header/footer css loaded AFTER the legacy css so it wins for the header/footer only --}}
    @if(!empty($tn_home))
    {{-- [TEST-PAGE-NEW-DESIGN] new HOME page only: undo the generic rules of the shared bootstrap/legacy css (global box-sizing, 14px/21px base text, capitalized h1/h2, button font/padding) INSIDE the new sections (main.page + footer.foot), so they look exactly like the new design. Written with :where() so every class rule of the new design still wins; the header/mega menu and all other pages are untouched. --}}
    <style>
      main.page, footer.foot{font-size:16px;line-height:normal}
      :where(main.page, footer.foot) *, :where(main.page, footer.foot) *::before, :where(main.page, footer.foot) *::after{box-sizing:content-box}
      :where(main.page, footer.foot) :where(button, input, select, textarea, summary, progress, meter){box-sizing:border-box} /* browser default for form controls */
      :where(main.page, footer.foot) h1, :where(main.page, footer.foot) h2{text-transform:none}
    </style>
    @endif
    {{-- [TEST-PAGE-NEW-DESIGN] original mega menu is shown in a panel below the new header --}}
    <style>
      .tn-mega{position:fixed;left:0;right:0;z-index:1000;display:block;visibility:hidden;opacity:0;pointer-events:none;transition:opacity .2s ease,visibility 0s linear .2s} /* side gaps: moving the mouse into them closes the menu; shown instantly (no effect) */
      .tn-mega.open{visibility:visible;opacity:1;pointer-events:auto;transition-delay:0s} /* plain fade only (no up/down movement) */
      .tn-mega, .tn-mega *{overscroll-behavior:contain} /* scrolling inside the menu never scrolls the page behind it */
      #siteHeader.tn-no-fx,#siteHeader.tn-no-fx *{transition-duration:.2s !important} /* smooth (not abrupt) colour change of the header; size never changes so nothing moves */
      /* white header on hover WITHOUT shrinking: menu links keep their exact position (only colour/background change) */
      /* header is shorter while its menu is open (bottom white space removed); top padding keeps the links at exactly the same position */
      /* same height with and without hover (links never move), slightly shorter than the original 136px so everything sits a little higher */
      @media (min-width:992px){#siteHeader{height:116px}}
      #siteHeader.tn-keep.scrolled{height:116px !important}
      #siteHeader.tn-keep.scrolled .logo-hdr--icon{height:48px}
      #siteHeader.tn-keep.scrolled .logo-hdr--text{height:38px}
      @media (max-width:1024px){#siteHeader.tn-keep.scrolled .logo-hdr--icon{height:38px}#siteHeader.tn-keep.scrolled .logo-hdr--text{height:30px}}
      /* header must stay visible while its menu is open (page scroll can hide it, which pushed the panel to the very top) */
      #siteHeader.tn-open{transform:none !important;box-shadow:none !important}
      /* header + panel look like ONE white block: no shadow/edge between them, one soft shadow only under the panel */
      .tn-mega .mega_menu{box-shadow:0 22px 30px -20px rgba(0,0,0,.3) !important;border:0 !important}
      /* inner lists fit inside the panel (the original gives them 64vh each, which made a 2nd scrollbar and cut the last items) */
      .tn-mega .product_menu .nav{height:max(240px, calc(100vh - 261px)) !important}
      .tn-mega .product_menu .tab-content{max-height:max(240px, calc(100vh - 261px)) !important}
      /* hide the old green WhatsApp float button (from the shared footer) on the new test page; the new design has its own round WhatsApp button */
      .float-buttons{display:none !important}
      /* arrow after menu items that open a menu + a little more space between the header menu items */
      #siteHeader .navw a{margin:0 8px}
      #siteHeader .navw a .tn-arrow{margin-left:6px;vertical-align:-1px;stroke:currentColor !important;transition:transform .2s ease}
      #siteHeader .navw a:hover .tn-arrow{transform:rotate(180deg)}
      /* inner pages: the same header, always in its solid white form (no transparent state), always visible; page content starts right below it */
      /* floating mail/WhatsApp/call buttons: Font Awesome (loaded on inner pages) also owns the class ".fab" and turned this column into inline blocks - restore the intended layout */
      div.fab{display:flex;flex-direction:column;gap:12px;line-height:normal;font-style:normal}
      div.fab .fab-btn{display:flex;width:48px;height:48px;line-height:normal}
      #siteHeader.tn-solid, #siteHeader.tn-solid.hide{transform:none !important}
      #siteHeader.tn-solid{box-shadow:none !important;border-bottom:1px solid #e3e3e3} /* inner pages: no shadow under the header, a thin border instead */
      /* WhatsApp popup button keeps its ORIGINAL look (the new generic .btn style had turned it red / left aligned) */
      #exampleModal-4 .popup-btn{display:block;min-height:0;gap:0;padding:12px;font:600 16px/1.5 'Quattrocento Sans',sans-serif;text-align:center;border:0;border-radius:12px;background:#720f14;color:#fff;transform:none;box-shadow:none}
      #exampleModal-4 .popup-btn:hover{background:#191818;color:#fff;transform:none;box-shadow:none}
      body:has(> #siteHeader.tn-solid){padding-top:88px}
      @media (max-width:991px){body:has(> #siteHeader.tn-solid){padding-top:68px}}
      /* language dropdown (globe icon) */
      #tnLangBtn{background:none;border:0;padding:0;cursor:pointer}
      .tn-lang{position:fixed;right:24px;top:100px;width:260px;z-index:1200}
      .tn-lang .dropdown-wrapper{width:100%}
      .tn-lang .dropdown-list{top:0;left:0;right:0;border-radius:6px;box-shadow:0 12px 30px rgba(0,0,0,.2);color:#333}
      .tn-lang .dropdown-list .list-items div{color:#333;font-size:16px}
      /* ===== mobile / tablet header + menu (<=1024px): same look as the new desktop header (white bar, dark text, red Contact Us) ===== */
      @media (max-width:1024px){
        #siteHeader .logo-hdr{filter:none !important}
        #siteHeader .burger span{background:#1A1A1A !important;filter:none !important}
        #siteHeader{background:#fff;height:76px !important;box-shadow:0 1px 0 #e3e3e3}
        #siteHeader:not(.scrolled) .hdr-contact{text-shadow:none}
        body:has(> #siteHeader.tn-solid){padding-top:76px}
        #siteHeader .hdr-brand{padding-left:20px}
        .mmenu{background:#fff;align-items:flex-start;padding:92px 24px 32px;overflow-y:auto;-webkit-overflow-scrolling:touch}
        .mmenu nav{width:100%;gap:0}
        .mmenu a,.mmenu .mm-acc{font:600 19px/1.3 'Quattrocento Sans',sans-serif;color:#1A1A1A;letter-spacing:0}
        .mmenu .mm-top,.mmenu .mm-acc{display:flex;align-items:center;justify-content:space-between;width:100%;padding:16px 0;border:0;border-bottom:1px solid #e3e3e3;background:none;text-align:left;cursor:pointer}
        .mmenu .mm-acc .mm-chev{transition:transform .25s ease;flex:none}
        .mmenu .mm-acc[aria-expanded="true"]{color:#E32329}
        .mmenu .mm-acc[aria-expanded="true"] .mm-chev{transform:rotate(180deg)}
        .mmenu .mm-sub{padding:4px 0 8px 14px;border-bottom:1px solid #e3e3e3}
        .mmenu .mm-sub[hidden]{display:none}
        .mmenu .mm-sub a{display:block;padding:11px 0;font:400 17px/1.35 'Quattrocento Sans',sans-serif;color:#333}
        .mmenu a:hover{color:#E32329}
        .mmenu .mm-contact{display:flex;align-items:center;justify-content:center;height:52px;margin-top:22px;border-radius:5px;background:#E32329;color:#fff !important;font-weight:700}
        .mm-tools{margin-top:24px}
        .mm-tools a,.mm-tools span{border-color:#1A1A1A}
        .mm-tools svg{stroke:#1A1A1A}
        .mm-tools a:hover svg{stroke:#fff}
      }
      @media (max-width:560px){#siteHeader .hdr-brand{padding-left:16px}.logo-hdr--icon{height:34px !important}.logo-hdr--text{height:26px !important}}
      .tn-mega-panel{display:none}
      .tn-mega-panel.on{display:block}
      .tn-mega .mega_menu{max-height:calc(100vh - 215px) !important;min-height:0;padding-top:16px !important;padding-bottom:30px !important;display:block !important;visibility:visible !important;position:static !important;width:100%;z-index:auto;transform:none}
      @media (max-width:991px){.tn-mega{display:none !important}}
    </style>
    @endif
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MF2C8CJ3"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- <div id="loader">-->
    <!--     <div class="loader-logo">Armstrong</div>-->
    <!--     <div class="loader-bar"><span></span></div>-->
    <!--</div>-->

    {{-- ===== [TEST-PAGE-NEW-DESIGN] START: header + mobile menu for the new homepage design (used only when $test_new is passed) ===== --}}
    @if(!empty($test_new))
    @php
        // Menu = same items/destinations as the ORIGINAL header menu: Products, Media, About Us, Blogs, Contact Us.
        // Products sub-links are dynamic (active product categories); Applications stays hidden exactly like in the original header.
        // data used by the ORIGINAL Products mega menu (same queries as the original header)
        $product_categories = ProductCategory::where('status', 'Active')->get();
        $orsan_products = ProductMaster::where('subcategory_id', 1)->where('product_status', 'active')->get();
        $armstrong_products = ProductMaster::where('subcategory_id', 2)->where('product_status', 'active')->get();
        $newlong_products = ProductMaster::where('subcategory_id', 4)->where('product_status', 'active')->get();
        $juki_products = ProductMaster::where('subcategory_id', 3)->where('product_status', 'active')->get();
        $tn_prod_links = [['All Products', route('productlist')]]; // only used to flag Products as having a panel
        $tn_menu = [
            ['Products', route('productlist'), $tn_prod_links],
            ['Media', null, [['Events', route('front.event')], ['Videos', route('front.video')]]],
            ['About Us', null, [['Company Profile', route('about')], ['Our Infrastructure', route('our.infrastructure')], ['Certificates', route('certificates')]]],
            ['Blogs', route('blog'), []],
        ];
    @endphp
  {{-- [TEST-PAGE-NEW-DESIGN] hidden placeholders for the OLD header elements that the shared legacy script (public/front/js/main.js) expects (.nav-link + .mega_menu, #hamburger). Without them that script stops with an error and skips the code after it on every page. Not visible, no function. --}}
  <div style="display:none" aria-hidden="true"><span id="hamburger"></span><div class="nav-item"><a class="nav-link" href="javascript:void(0)" tabindex="-1"></a><div class="mega_menu"></div></div></div>
  <header id="siteHeader"@if(!empty($tn_inner)) class="scrolled tn-solid"@endif>
    <a href="{{ url('/') }}" class="hdr-brand">
      <img class="logo logo-hdr logo-hdr--icon" src="{{ asset('public/front/assets/images/hdr-logo-icon.svg') }}" alt="" width="65" height="65">
      <img class="logo logo-hdr logo-hdr--text" src="{{ asset('public/front/assets/images/hdr-logo-text.svg') }}" alt="Armstrong" width="178" height="51">
    </a>
    <div class="hdr-main">
      <nav class="nav navw" aria-label="Primary">
        @foreach($tn_menu as $tn_i => $tn_item)
        <a href="{{ $tn_item[1] ?: 'javascript:void(0)' }}"@if(!empty($tn_item[2])) data-tn-mega="{{ $tn_i }}"@endif>{{ $tn_item[0] }}@if(!empty($tn_item[2]))<svg class="tn-arrow" aria-hidden="true" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 9l7 7 7-7"></path></svg>@endif</a>
        @endforeach
      </nav>
      <div class="hdr-tools">
        <a href="tel:+916358740011" class="ibtn" aria-label="Call +91 63587 40011"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2"></path></svg></a>
        <a href="mailto:info@armstrongex.com" target="_blank" rel="noopener" class="ibtn" aria-label="Email info@armstrongex.com"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></a>
        <button type="button" class="ibtn tn-lang-open" id="tnLangBtn" aria-label="Select language" aria-haspopup="true"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3c3 3.5 3 14.5 0 18M12 3c-3 3.5-3 14.5 0 18"></path></svg></button>
      </div>
    </div>
    <a href="{{ route('contact') }}" class="hdr-contact">Contact Us</a>
    <button type="button" class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu"><span></span><span></span><span></span></button>
  </header>

  <!-- Mobile menu (same dynamic menu as the header above) -->
  <div id="mobileMenu" class="mmenu" hidden data-lenis-prevent>
    <nav aria-label="Mobile">
      @foreach($tn_menu as $tn_i => $tn_item)
        @if($tn_item[0] === 'Products')
          <div class="mm-group">
            <button type="button" class="mm-acc" aria-expanded="false">{{ $tn_item[0] }}<svg class="mm-chev" aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 9l7 7 7-7"></path></svg></button>
            <div class="mm-sub" hidden>
              <a href="{{ route('productlist') }}">All Products</a>
              @foreach($product_categories->sortBy('sort_order') as $tn_cat)<a href="{{ route('products.listing', $tn_cat->url) }}">{{ $tn_cat->name }}@if(in_array($tn_cat->name, ['Mulch Film Punching','Needle Loom'])) Machine @elseif($tn_cat->name !== 'Spare Parts') Machines @endif</a>@endforeach
            </div>
          </div>
        @elseif(!empty($tn_item[2]))
          <div class="mm-group">
            <button type="button" class="mm-acc" aria-expanded="false">{{ $tn_item[0] }}<svg class="mm-chev" aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 9l7 7 7-7"></path></svg></button>
            <div class="mm-sub" hidden>@foreach($tn_item[2] as $tn_sub)<a href="{{ $tn_sub[1] }}">{{ $tn_sub[0] }}</a>@endforeach</div>
          </div>
        @else
          <a class="mm-top" href="{{ $tn_item[1] }}">{{ $tn_item[0] }}</a>
        @endif
      @endforeach
      <a class="mm-contact" href="{{ route('contact') }}">Contact Us</a>

      <div class="mm-tools">
        <a href="tel:+916358740011" aria-label="Call +91 63587 40011"><svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2"></path></svg></a>
        <a href="mailto:info@armstrongex.com" target="_blank" rel="noopener" aria-label="Email info@armstrongex.com"><svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></a>
        <span class="tn-lang-open" role="button" tabindex="0" aria-label="Select language" style="cursor:pointer"><svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" stroke-linecap="round"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3c3 3.5 3 14.5 0 18M12 3c-3 3.5-3 14.5 0 18"></path></svg></span>
      </div>
    </nav>
  </div>

  <script>
    /* mobile menu accordion (Products / Media / About Us) */
    document.querySelectorAll('#mobileMenu .mm-acc').forEach(function (b) {
      b.addEventListener('click', function () {
        var open = b.getAttribute('aria-expanded') === 'true', sub = b.nextElementSibling;
        b.setAttribute('aria-expanded', open ? 'false' : 'true');
        if (sub) sub.hidden = open;
      });
    });
  </script>
  {{-- [TEST-PAGE-NEW-DESIGN] language dropdown for the globe icon. Same markup/ids as the original header, so the ORIGINAL language script (Google Translate, search, cookie) works unchanged. --}}
  <div class="tn-lang notranslate" id="tnLang">
    <div class="dropdown-wrapper notranslate">
      <input type="text" id="dropdownInput" class="dropdown-input-lan" placeholder="Select Language" readonly style="display:none">
      <div class="dropdown-list border rounded" id="dropdownList">
        <div class="search-box"><input type="text" id="searchInput" placeholder="Search language..."></div>
        <div class="list-items" id="listItems"></div>
      </div>
    </div>
    <div id="google_translate_element" style="display:none;"></div>
  </div>
  <script>
    /* [TEST-PAGE-NEW-DESIGN] globe icon (desktop header + mobile menu) opens the language list below the header */
    (function () {
      var hdr = document.getElementById('siteHeader'), box = document.getElementById('tnLang'), input = document.getElementById('dropdownInput');
      if (!hdr || !box || !input) return;
      document.querySelectorAll('.tn-lang-open').forEach(function (b) {
        b.addEventListener('click', function (e) {
          e.stopPropagation(); /* the original script closes the list on any click outside it */
          var sv = b.querySelector('svg') || b, rc = sv.getBoundingClientRect(); /* dropdown opens right under the globe drawing itself (not the taller button box) */
          box.style.top = (rc.bottom + 6) + 'px';
          box.style.right = Math.max(8, window.innerWidth - rc.right - 24) + 'px';
          input.click();       /* original script toggles the list */
        });
      });
    })();
  </script>
  {{-- [TEST-PAGE-NEW-DESIGN] ORIGINAL mega-menu panels (copied unchanged from the original header below), opened from the new header links --}}
  <div class="tn-mega" id="tnMega" data-lenis-prevent>
    <div class="tn-mega-panel" data-tn-panel="0">
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="d-flex align-items-start product_menu">

                                        {{-- LEFT SIDE (Categories) --}}
                                        <div class="nav flex-column nav-pills col-lg-3 col-md-3 col-12" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            @foreach($product_categories->sortBy('sort_order') as $index => $category)
                                            <button
                                                class="d-none d-md-block nav-link category-btn @if($index == 0) active @endif"
                                                data-id="{{ $category->id }}" type="button">
                                                <a class="icon" href="{{ route('products.listing', $category->url) }}">
                                                    <img src="{{ asset('/' . $category->category_small_image ?? 'public/front/img/cp.png') }}"
                                                        alt="{{ $category->title }}" class="img-fluid">
                                                    <div class="pagename">
                                                        <span>
                                                            {{ $category->name }}
                                                            @if($category->name == 'Mulch Film Punching' ||
                                                            $category->name == 'Needle Loom')
                                                            Machine

                                                            @elseif($category->name=='Spare Parts')

                                                            @else
                                                            Machines
                                                            @endif
                                                        </span>
                                                    </div>
                                                </a>
                                            </button>
                                            <a class="icon d-block d-md-none"
                                                href="{{ route('products.listing', $category->url) }}">
                                                <div class="pagename">
                                                    <span>
                                                        {{ $category->name }}
                                                        @if($category->name == 'Mulch Film Punching' || $category->name
                                                        == 'Needle Loom')
                                                        Machine
                                                        @else
                                                        Machines
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="tab-content col-lg-9 d-none d-md-block">
                                            <div class="tab-pane fade show active">
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-12">
                                                        <ul id="dynamic-product-list" class="two-col-product">
                                                            <li>Select a category to view products</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Special container for category 3 (FIBC & Woven Sack) -->

                                                <!--<div id="special-category-container" class="row justify-content-between mt-5">-->
                                                <!--     <div class="col-lg-6 mb-3">-->
                                                <!--         <ul>-->
                                                <!--             <h3 class="certi_head">FIBC Machines</h3>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'armstrong-sewing-machines') }}">-->
                                                <!--                     Armstrong Sewing Machines-->
                                                <!--                 </a>-->
                                                <!--             </li>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'orsan-machines') }}">-->
                                                <!--                     Orsan Machines-->
                                                <!--                 </a>-->
                                                <!--             </li>-->

                                                <!--         </ul>-->
                                                <!--     </div>-->
                                                <!--     <div class="col-lg-6 mb-3">-->
                                                <!--         <ul>-->
                                                <!--             <h3 class="certi_head">Woven Sack Machines</h3>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'newlong-machines') }}">-->
                                                <!--                     NewLong Machine-->
                                                <!--                 </a>-->
                                                <!--             </li>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'juki-machines') }}">-->
                                                <!--                     Juki Machine-->
                                                <!--                 </a>-->
                                                <!--             </li>-->

                                                <!--         </ul>-->
                                                <!--     </div>-->
                                                <!-- </div>-->
                                                <div id="special-category-container"
                                                    class="row justify-content-between mt-5">
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">FIBC Machines</h3>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'armstrong-sewing-machines-fibc') }}">
                                                                    Armstrong Sewing Machines </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'orsan-machines') }}">
                                                                    Orsan Machines </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'juki-machines') }}">
                                                                    Juki Machine </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">Woven Sack Machines</h3>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'armstrong-sewing-machines') }}">
                                                                    Armstrong Sewing Machines </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'newlong-machines') }}">
                                                                    NewLong Machine </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div id="special-category-spare"
                                                    class="row justify-content-between mt-5">
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">FIBC Spare Parts</h3>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'armstrong-spare-parts-fibc') }}">
                                                                    Armstrong Spare Parts </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'orsan-spare-parts') }}">
                                                                    Orsan Spare Parts </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'juki-spare-parts') }}">
                                                                    Juki Spare Parts </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">Woven Sack Machines</h3>
                                                            <!--<li>-->
                                                            <!--    <a href="{{ route('products.spareparts', 'armstrong-spare-parts') }}"> Armstrong Sewing Machines </a>-->
                                                            <!--</li>-->
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'newlong-spare-parts') }}">
                                                                    NewLong Machine </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'bag-closer-spare') }}">
                                                                <h3 class="certi_head">Bag Closing Spare</h3>
                                                            </a>

                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'bcs-machine-spare') }}">
                                                                <h3 class="certi_head">BCS Machine Spare</h3>
                                                            </a>

                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'needle-loom-spare') }}">
                                                                <h3 class="certi_head">Needle Loom Spare</h3>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'ultrasonic-loom-cutter') }}">
                                                                <h3 class="certi_head">Ultrasonic Loom Cutter</h3>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'circular-loom-spare-parts') }}">
                                                                <h3 class="certi_head">Circular Loom Spare Parts</h3>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    <div class="tn-mega-panel" data-tn-panel="1">
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon icon1" href="{{route('front.event')}}">
                                                <img src="{{asset('public/front/img/Events.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Events</span>
                                                </div>
                                            </a>
                                            <a class="icon icon3 mb-0" href="{{route('front.video')}}">
                                                <img src="{{asset('public/front/img/Videos.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Videos</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/Media.webp')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/event-banner.webp')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <!--<img src="{{asset('public/front/img/gallery-banner.jpg')}}" alt="cp" class=" img-fluid main-bg2 bd_10">-->
                                            <img src="{{asset('public/front/img/Media.webp')}}" alt="cp"
                                                class=" img-fluid main-bg3 bd_10">
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    <div class="tn-mega-panel" data-tn-panel="2">
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon  icon1" href="{{route('about')}}">
                                                <img src="{{asset('public/front/img/Company Profile.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Company Profile</span>
                                                </div>
                                            </a>
                                            <a class="icon  icon2" href="{{route('our.infrastructure')}}">
                                                <img src="{{asset('public/front/img/Our Infrastructure.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Our Infrastructure</span>
                                                </div>
                                            </a>
                                            <a class="icon mb-0  icon3" href="{{route('certificates')}}">
                                                <img src="{{asset('public/front/img/Certificates.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Certificates</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/ABOUT.webp')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/company-profile-banner.webp')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <img src="{{asset('public/front/img/ABOUT.webp')}}" alt="cp"
                                                class=" img-fluid main-bg2 bd_10">
                                            <img src="{{asset('public/front/img/certificates-banner.webp')}}" alt="cp"
                                                class=" img-fluid main-bg3 bd_10">
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
  </div>
  <script>
    /* [TEST-PAGE-NEW-DESIGN] open/close the original mega menu on hover (desktop only) */
    (function () {
      var box = document.getElementById('tnMega'), hdr = document.getElementById('siteHeader'), t, openY = 0;
      if (!box || !hdr) return;
      var links = document.querySelectorAll('#siteHeader [data-tn-mega]'), panels = box.querySelectorAll('.tn-mega-panel');
      /* panel always starts exactly at the bottom edge of the header (the header height changes when it turns white) */
      function place() { box.style.top = (hdr.getBoundingClientRect().bottom - 1) + 'px'; }
      function open(i) {
        clearTimeout(t);
        hdr.classList.remove('hide'); openY = window.scrollY; /* header must be visible; remember where the menu opened */
        hdr.classList.add('tn-no-fx'); /* header changes instantly, no animation */
        hdr.classList.add('tn-open'); /* keeps the header visible while the menu is open */
        if (!hdr.classList.contains('scrolled')) hdr.classList.add('tn-keep'); /* header not scrolled yet: go white but keep its full size */
        hdr.classList.add('scrolled'); /* white header while the menu is open (same look as on scroll) */
        panels.forEach(function (p) { p.classList.toggle('on', p.getAttribute('data-tn-panel') === i); });
        box.classList.add('open');
        /* follow the header bottom on every frame while it animates to the white state, so the panel never overlaps/cuts the header */
        var until = Date.now() + 700;
        (function follow() { place(); if (Date.now() < until && box.classList.contains('open')) requestAnimationFrame(follow); })();
      }
      /* stays open while the pointer is anywhere on the header or the panel (no flicker when the header resizes); closes only after the pointer left both */
      function close() {
        clearTimeout(t);
        t = setTimeout(function () {
          if (hdr.matches(':hover') || box.matches(':hover')) return;
          box.classList.remove('open');
          hdr.classList.toggle('scrolled', window.scrollY > 60); hdr.classList.remove('tn-keep'); hdr.classList.remove('tn-open'); setTimeout(function () { if (!box.classList.contains('open')) hdr.classList.remove('tn-no-fx'); }, 100); /* back to normal (white only if the page is scrolled) */
        }, 250);
      }
      /* small delay before opening (hover intent): menu does not pop up the instant the pointer touches a link; switching while already open is immediate */
      var OPEN_DELAY = 250, ot;
      links.forEach(function (a) {
        a.addEventListener('mouseenter', function () {
          clearTimeout(ot);
          if (box.classList.contains('open')) { open(a.getAttribute('data-tn-mega')); return; }
          ot = setTimeout(function () { open(a.getAttribute('data-tn-mega')); }, OPEN_DELAY);
        });
        a.addEventListener('mouseleave', function () { clearTimeout(ot); });
      });
      hdr.addEventListener('transitionend', function () { if (box.classList.contains('open')) place(); });
      hdr.addEventListener('mouseleave', close);
      box.addEventListener('mouseenter', function () { clearTimeout(t); });
      box.addEventListener('mouseleave', close);
      /* page scroll closes the menu, but scrolling INSIDE the menu (categories / product lists) must not */
      /* smooth-scroll momentum keeps firing scroll events right after the user stops, so only a real scroll away from the opening position closes it */
      window.addEventListener('scroll', function () {
        if (!box.classList.contains('open')) return;
        hdr.classList.remove('hide'); /* keep the header visible while its menu is open */
        if (box.matches(':hover')) return;
        if (Math.abs(window.scrollY - openY) > 150) { box.classList.remove('open'); hdr.classList.remove('tn-open', 'tn-keep', 'tn-no-fx'); }
      }, { passive: true });
    })();
  </script>
  @if(!empty($tn_inner))
  <script>
    /* [TEST-PAGE-NEW-DESIGN] inner pages: keep the header in its solid white form (the shared scroll script removes 'scrolled' near the top of the page) */
    (function () {
      var h = document.getElementById('siteHeader');
      if (!h) return;
      new MutationObserver(function () { if (!h.classList.contains('scrolled')) h.classList.add('scrolled'); }).observe(h, { attributes: true, attributeFilter: ['class'] });
    })();
  </script>
  @endif
    @else
    {{-- ===== [TEST-PAGE-NEW-DESIGN] END (header) - the ORIGINAL header below is unchanged ===== --}}
    <header @if(!empty($home_new)) class="hn-header" @endif>
        @if(!empty($home_new))
        <div class="hn-topbar">
            <div class="container">
                <div class="hn-topbar__in">
                    <a class="hn-topbar__mail" href="mailto:inquiry@armstrongex.com"><img src="{{ asset('public/front/home-new/icons/hdr-mail.svg') }}" alt=""><span>inquiry@armstrongex.com</span></a>
                    <i class="hn-topbar__sep"></i>
                    <a class="hn-topbar__btn" href="{{ asset('public/Armstrong_Brochure_2025.pdf') }}" target="_blank"><img src="{{ asset('public/front/home-new/icons/hdr-download.svg') }}" alt=""><span>Brochure</span></a>
                    
                    <!--<a class="hn-topbar__btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#brochureModal">-->
                    <!--    <img src="{{ asset('public/front/home-new/icons/hdr-download.svg') }}" alt="">-->
                    <!--    <span>Brochure</span>-->
                    <!--</a>-->
                    
                    <i class="hn-topbar__sep"></i>
                    <div  class="phone-icon">
                        <div class="hn-topbar__social hn-topbar__contact">
                            <a href="tel:+916358820089" aria-label="Call +91 6358 820 089">
                                <i class="fas fa-phone-alt"></i>
                            </a>
                        </div>
                        <p>+91 6358 820 089</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    @if(!empty($home_new))<img src="{{ asset('public/front/home-new/icons/hdr-logo-icon.svg') }}" alt="Armstrong" class="hn-logo-i"><img src="{{ asset('public/front/home-new/icons/hdr-logo-text.svg') }}" alt="Armstrong" class="hn-logo-t">@else<img src="{{asset('public/front/img/logo.svg')}}" alt="logo" class="img-fluid hed-logo1">
                    <img src="{{asset('public/front/img/armstrong_logo_header.svg')}}" alt="logo"
                        class="img-fluid hed-logo2">
                    @endif
                </a>
                <div class="hamburger" id="hamburger" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </div>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0  navbar-nav-scroll">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('productlist')}}">Products
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>


                            @php

                            // Fetch active categories
                            $product_categories = ProductCategory::where('status', 'Active')->get();
                            $orsan_products = ProductMaster::where('subcategory_id', 1)->where('product_status',
                            'active')->get();
                            $armstrong_products = ProductMaster::where('subcategory_id', 2)->where('product_status',
                            'active')->get();
                            $newlong_products = ProductMaster::where('subcategory_id', 4)->where('product_status',
                            'active')->get();
                            $juki_products = ProductMaster::where('subcategory_id', 3)->where('product_status',
                            'active')->get();
                            $applications = Application::where('status' , 'Active')->orderBy('created_at' , 'desc')->get();
                            @endphp

                            <div class="mega_menu">
                                <div class="container">
                                    <div class="d-flex align-items-start product_menu">

                                        {{-- LEFT SIDE (Categories) --}}
                                        <div class="nav flex-column nav-pills col-lg-3 col-md-3 col-12" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            @foreach($product_categories->sortBy('sort_order') as $index => $category)
                                            <button
                                                class="d-none d-md-block nav-link category-btn @if($index == 0) active @endif"
                                                data-id="{{ $category->id }}" type="button">
                                                <a class="icon" href="{{ route('products.listing', $category->url) }}">
                                                    <img src="{{ asset('/' . $category->category_small_image ?? 'public/front/img/cp.png') }}"
                                                        alt="{{ $category->title }}" class="img-fluid">
                                                    <div class="pagename">
                                                        <span>
                                                            {{ $category->name }}
                                                            @if($category->name == 'Mulch Film Punching' ||
                                                            $category->name == 'Needle Loom')
                                                            Machine

                                                            @elseif($category->name=='Spare Parts')

                                                            @else
                                                            Machines
                                                            @endif
                                                        </span>
                                                    </div>
                                                </a>
                                            </button>
                                            <a class="icon d-block d-md-none"
                                                href="{{ route('products.listing', $category->url) }}">
                                                <div class="pagename">
                                                    <span>
                                                        {{ $category->name }}
                                                        @if($category->name == 'Mulch Film Punching' || $category->name
                                                        == 'Needle Loom')
                                                        Machine
                                                        @else
                                                        Machines
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                        <div class="tab-content col-lg-9 d-none d-md-block">
                                            <div class="tab-pane fade show active">
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-12">
                                                        <ul id="dynamic-product-list" class="two-col-product">
                                                            <li>Select a category to view products</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Special container for category 3 (FIBC & Woven Sack) -->

                                                <!--<div id="special-category-container" class="row justify-content-between mt-5">-->
                                                <!--     <div class="col-lg-6 mb-3">-->
                                                <!--         <ul>-->
                                                <!--             <h3 class="certi_head">FIBC Machines</h3>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'armstrong-sewing-machines') }}">-->
                                                <!--                     Armstrong Sewing Machines-->
                                                <!--                 </a>-->
                                                <!--             </li>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'orsan-machines') }}">-->
                                                <!--                     Orsan Machines-->
                                                <!--                 </a>-->
                                                <!--             </li>-->

                                                <!--         </ul>-->
                                                <!--     </div>-->
                                                <!--     <div class="col-lg-6 mb-3">-->
                                                <!--         <ul>-->
                                                <!--             <h3 class="certi_head">Woven Sack Machines</h3>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'newlong-machines') }}">-->
                                                <!--                     NewLong Machine-->
                                                <!--                 </a>-->
                                                <!--             </li>-->
                                                <!--             <li>-->
                                                <!--                 <a href="{{ route('products.special', 'juki-machines') }}">-->
                                                <!--                     Juki Machine-->
                                                <!--                 </a>-->
                                                <!--             </li>-->

                                                <!--         </ul>-->
                                                <!--     </div>-->
                                                <!-- </div>-->
                                                <div id="special-category-container"
                                                    class="row justify-content-between mt-5">
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">FIBC Machines</h3>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'armstrong-sewing-machines-fibc') }}">
                                                                    Armstrong Sewing Machines </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'orsan-machines') }}">
                                                                    Orsan Machines </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'juki-machines') }}">
                                                                    Juki Machine </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">Woven Sack Machines</h3>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'armstrong-sewing-machines') }}">
                                                                    Armstrong Sewing Machines </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.special', 'newlong-machines') }}">
                                                                    NewLong Machine </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div id="special-category-spare"
                                                    class="row justify-content-between mt-5">
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">FIBC Spare Parts</h3>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'armstrong-spare-parts-fibc') }}">
                                                                    Armstrong Spare Parts </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'orsan-spare-parts') }}">
                                                                    Orsan Spare Parts </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'juki-spare-parts') }}">
                                                                    Juki Spare Parts </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <h3 class="certi_head">Woven Sack Machines</h3>
                                                            <!--<li>-->
                                                            <!--    <a href="{{ route('products.spareparts', 'armstrong-spare-parts') }}"> Armstrong Sewing Machines </a>-->
                                                            <!--</li>-->
                                                            <li>
                                                                <a
                                                                    href="{{ route('products.spareparts', 'newlong-spare-parts') }}">
                                                                    NewLong Machine </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'bag-closer-spare') }}">
                                                                <h3 class="certi_head">Bag Closing Spare</h3>
                                                            </a>

                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'bcs-machine-spare') }}">
                                                                <h3 class="certi_head">BCS Machine Spare</h3>
                                                            </a>

                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'needle-loom-spare') }}">
                                                                <h3 class="certi_head">Needle Loom Spare</h3>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'ultrasonic-loom-cutter') }}">
                                                                <h3 class="certi_head">Ultrasonic Loom Cutter</h3>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <ul>
                                                            <a
                                                                href="{{ route('products.spareparts', 'circular-loom-spare-parts') }}">
                                                                <h3 class="certi_head">Circular Loom Spare Parts</h3>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- @if(isset($applications) && is_countable($applications) && count($applications) > 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.application')}}">Applications
                            <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">

                                    <div class="nav nav-pills row " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach($applications as $key => $application)
                                         <div class="col-md-3">
                                            <button class="d-none d-md-block nav-link category-btn w-100" data-id="1" type="button">
                                            <a class="icon application_header_link" href="{{ route('front.application.details',['url' => $application->url ]) }}">
                                                <img src="{{ asset($application->application_image)}}" alt="" class="img-fluid">
                                                <div class="pagename">
                                                    <span>
                                                    {{ $application->name }}
                                                    </span>
                                                </div>
                                            </a>
                                        </button>
                                        <a class="icon d-block d-md-none" href="https://www.testintelliworkz.tech/armstrong/category/fibc-machine">
                                            <div class="pagename">
                                                <span>
                                                {{ $application->name }}
                                                </span>
                                            </div>
                                        </a>
                                       </div>
                                       @endforeach
                                    </div>

                                </div>
                            </div>
                        </li> 
                        @endif --}} 
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{route('research.development')}}">R&D</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link" onclick="avoid(0);" href="javascript:avoid(0);">Media
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon icon1" href="{{route('front.event')}}">
                                                <img src="{{asset('public/front/img/Events.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Events</span>
                                                </div>
                                            </a>
                                            <a class="icon icon3 mb-0" href="{{route('front.video')}}">
                                                <img src="{{asset('public/front/img/Videos.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Videos</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/Media.webp')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/event-banner.webp')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <!--<img src="{{asset('public/front/img/gallery-banner.jpg')}}" alt="cp" class=" img-fluid main-bg2 bd_10">-->
                                            <img src="{{asset('public/front/img/Media.webp')}}" alt="cp"
                                                class=" img-fluid main-bg3 bd_10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{route('career')}}">Careers-->
                        <!--        <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"-->
                        <!--            class="img-fluid setting-icon">-->
                        <!--    </a>-->
                        <!--    <div class="mega_menu">-->
                        <!--        <div class="container">-->
                        <!--            <div class="mega_menu_wrapper">-->
                        <!--                <div class="icons">-->
                        <!--                    <a class="icon icon1" href="{{route('career')}}">-->
                        <!--                        <img src="{{asset('public/front/img/Open Positions.webp')}}" alt="cp"-->
                        <!--                            class="img-fluid d-none d-md-block">-->
                        <!--                        <div class="pagename">-->
                        <!--                            <span>Open Positions</span>-->
                        <!--                        </div>-->
                        <!--                    </a>-->
                        <!--                    <a class="icon icon2" href="{{route('front.lifearmstrong')}}">-->
                        <!--                        <img src="{{asset('public/front/img/Life at Armstrong.webp')}}" alt="cp"-->
                        <!--                            class="img-fluid d-none d-md-block">-->
                        <!--                        <div class="pagename">-->
                        <!--                            <span>Life at Armstrong</span>-->
                        <!--                        </div>-->
                        <!--                    </a>-->
                        <!--                </div>-->
                        <!--                <div class="icons_bg">-->
                        <!--                    <img src="{{asset('public/front/img/Career.webp')}}" alt="cp"-->
                        <!--                        class=" img-fluid main-bg bd_10">-->
                        <!--                    <img src="{{asset('public/front/img/open-positions-banner.webp')}}" alt="cp"-->
                        <!--                        class=" img-fluid main-bg1 bd_10">-->
                        <!--                    <img src="{{asset('public/front/img/life-at-armstrong-banner.webp')}}"-->
                        <!--                        alt="cp" class=" img-fluid main-bg2 bd_10">-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</li>-->


                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">About Us
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon  icon1" href="{{route('about')}}">
                                                <img src="{{asset('public/front/img/Company Profile.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Company Profile</span>
                                                </div>
                                            </a>
                                            <a class="icon  icon2" href="{{route('our.infrastructure')}}">
                                                <img src="{{asset('public/front/img/Our Infrastructure.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Our Infrastructure</span>
                                                </div>
                                            </a>
                                            <a class="icon mb-0  icon3" href="{{route('certificates')}}">
                                                <img src="{{asset('public/front/img/Certificates.webp')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Certificates</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/ABOUT.webp')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/company-profile-banner.webp')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <img src="{{asset('public/front/img/ABOUT.webp')}}" alt="cp"
                                                class=" img-fluid main-bg2 bd_10">
                                            <img src="{{asset('public/front/img/certificates-banner.webp')}}" alt="cp"
                                                class=" img-fluid main-bg3 bd_10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blog')}}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                        </li>
                    </ul>
                    <form class="d-flex mb-3 mb-lg-0">
                        <div class="language-select me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 32 32"
                                fill="none">
                                <path
                                    d="M16 28C18.66 27.9998 21.2446 27.1163 23.348 25.488C25.4515 23.8598 26.9546 21.5791 27.6213 19.004M16 28C13.34 27.9998 10.7554 27.1163 8.65197 25.488C6.54854 23.8598 5.04544 21.5791 4.37867 19.004M16 28C19.3133 28 22 22.6267 22 16C22 9.37334 19.3133 4 16 4M16 28C12.6867 28 10 22.6267 10 16C10 9.37334 12.6867 4 16 4M27.6213 19.004C27.868 18.044 28 17.0373 28 16C28.0033 13.9361 27.4718 11.9067 26.4573 10.1093M27.6213 19.004C24.0656 20.9752 20.0656 22.0064 16 22C11.784 22 7.82267 20.9133 4.37867 19.004M4.37867 19.004C4.12633 18.0226 3.9991 17.0133 4 16C4 13.86 4.56 11.8493 5.54267 10.1093M16 4C18.1283 3.99911 20.2186 4.56448 22.0563 5.63809C23.894 6.71169 25.4129 8.25489 26.4573 10.1093M16 4C13.8717 3.99911 11.7814 4.56448 9.94375 5.63809C8.10606 6.71169 6.58708 8.25489 5.54267 10.1093M26.4573 10.1093C23.5542 12.6239 19.8407 14.0055 16 14C12.0027 14 8.34667 12.5333 5.54267 10.1093"
                                    stroke="#172A42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>


                                <div class="ml-4">
                                    <div class="dropdown-wrapper notranslate">
                                    <input type="text" id="dropdownInput" class="dropdown-input-lan" placeholder="Select Language" readonly>
                                    <div class="dropdown-list border rounded" id="dropdownList">
                                      <div class="search-box">
                                        <input type="text" id="searchInput" placeholder="Search language...">
                                      </div>
                                      <div class="list-items" id="listItems"></div>
                                    </div>
                                  </div>

                                  <div id="google_translate_element" style="display:none;"></div
                                </div>
                            </div>


                        </div>


                @if(!empty($home_new))
                    <a class="hn-brochure-m" href="{{ asset('public/Armstrong_Brochure_2025.pdf') }}" target="_blank"><img src="{{ asset('public/front/home-new/icons/hdr-download.svg') }}" alt=""><span>Download Brochure</span></a>
                    <a class="hn-quote-m" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal">Request a Quote</a>
                    @endif
                </div>

                <a class="request_btn mt-3 mt-lg-0" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 31" fill="none">
                        <!-- Your SVG paths -->
                        <path
                            d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z"
                            fill="white" />
                        <path
                            d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z"
                            fill="white" />
                        <path
                            d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z"
                            fill="white" />
                        <path
                            d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z"
                            fill="white" />
                    </svg>
                    <span class="old-text">Request a Quote</span>
                    <span class="new-text">Request a Quote</span>
                </a>
                </form>
            </div>
            </div>
        </nav>
    </header>
    @endif {{-- [TEST-PAGE-NEW-DESIGN] end of original-header wrapper --}}

    @include('layouts.quote-modal')
    @include('layouts.image-modal')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const RECAPTCHA_SITE_KEY = "{{ env('RECAPTCHA_SITE_KEY') }}";
        function hideerrormessage(e) {
            $(e).nextAll('.validation-error').first().hide();
        }
    </script>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const phoneCodeInput = document.getElementById("phone_code");

    // Initialize Select2 for country dropdown
    $('#country').select2({
        placeholder: 'Select Country',
        allowClear: true,
        width: '100%'
    });

    // Update phone code on country change
    $('#country').on('change', function () {
        // Get selected option's data-phonecode
        const phoneCode = $(this).find(':selected').data('phonecode');
        phoneCodeInput.value = phoneCode ? '+' + phoneCode : '';
    });
});
</script>


<!----------------------->
 <script>
    const languages = [
      { code: 'af', name: 'Afrikaans' }, { code: 'sq', name: 'Shqip (Albanian)' }, { code: 'am', name: 'አማርኛ (Amharic)' }, { code: 'ar', name: 'العربية (Arabic)' }, { code: 'hy', name: 'Հայերեն (Armenian)' }, { code: 'az', name: 'Azərbaycan (Azerbaijani)' }, { code: 'eu', name: 'Euskara (Basque)' }, { code: 'be', name: 'Беларуская (Belarusian)' }, { code: 'bn', name: 'বাংলা (Bengali)' }, { code: 'bs', name: 'Bosanski (Bosnian)' },
      { code: 'bg', name: 'Български (Bulgarian)' }, { code: 'ca', name: 'Català (Catalan)' }, { code: 'ceb', name: 'Cebuano' }, { code: 'ny', name: 'Chichewa' }, { code: 'zh-CN', name: '中文 (Chinese Simplified)' }, { code: 'zh-TW', name: '中文繁體 (Chinese Traditional)' }, { code: 'co', name: 'Corsican' }, { code: 'hr', name: 'Hrvatski (Croatian)' }, { code: 'cs', name: 'Čeština (Czech)' }, { code: 'da', name: 'Dansk (Danish)' },
      { code: 'nl', name: 'Nederlands (Dutch)' }, { code: 'en', name: 'English' }, { code: 'eo', name: 'Esperanto' }, { code: 'et', name: 'Eesti (Estonian)' }, { code: 'tl', name: 'Filipino' }, { code: 'fi', name: 'Suomi (Finnish)' }, { code: 'fr', name: 'Français (French)' }, { code: 'fy', name: 'Frysk (Frisian)' }, { code: 'gl', name: 'Galego (Galician)' }, { code: 'ka', name: 'ქართული (Georgian)' },
      { code: 'de', name: 'Deutsch (German)' }, { code: 'el', name: 'Ελληνικά (Greek)' }, { code: 'gu', name: 'ગુજરાતી (Gujarati)' }, { code: 'ht', name: 'Kreyòl ayisyen (Haitian Creole)' }, { code: 'ha', name: 'Hausa' }, { code: 'haw', name: 'ʻŌlelo Hawaiʻi (Hawaiian)' }, { code: 'he', name: 'עברית (Hebrew)' }, { code: 'hi', name: 'हिन्दी (Hindi)' }, { code: 'hmn', name: 'Hmong' }, { code: 'hu', name: 'Magyar (Hungarian)' },
      { code: 'is', name: 'Íslenska (Icelandic)' }, { code: 'ig', name: 'Igbo' }, { code: 'id', name: 'Bahasa Indonesia' }, { code: 'ga', name: 'Gaeilge (Irish)' }, { code: 'it', name: 'Italiano (Italian)' }, { code: 'ja', name: '日本語 (Japanese)' }, { code: 'jw', name: 'Javanese' }, { code: 'kn', name: 'ಕನ್ನಡ (Kannada)' }, { code: 'kk', name: 'Қазақ тілі (Kazakh)' }, { code: 'km', name: 'Khmer (ភាសាខ្មែរ)' },
      { code: 'rw', name: 'Kinyarwanda' }, { code: 'ko', name: '한국어 (Korean)' }, { code: 'ku', name: 'Kurdî (Kurdish)' }, { code: 'ky', name: 'Кыргызча (Kyrgyz)' }, { code: 'lo', name: 'ລາວ (Lao)' }, { code: 'la', name: 'Latina (Latin)' }, { code: 'lv', name: 'Latviešu (Latvian)' }, { code: 'lt', name: 'Lietuvių (Lithuanian)' }, { code: 'lb', name: 'Lëtzebuergesch (Luxembourgish)' }, { code: 'mk', name: 'Македонски (Macedonian)' },
      { code: 'mg', name: 'Malagasy' }, { code: 'ms', name: 'Bahasa Melayu (Malay)' }, { code: 'ml', name: 'മലയാളം (Malayalam)' }, { code: 'mt', name: 'Malti (Maltese)' }, { code: 'mi', name: 'Māori' }, { code: 'mr', name: 'मराठी (Marathi)' }, { code: 'mn', name: 'Монгол (Mongolian)' }, { code: 'my', name: 'မြန်မာစာ (Myanmar/Burmese)' }, { code: 'ne', name: 'नेपाली (Nepali)' }, { code: 'no', name: 'Norsk (Norwegian)' },
      { code: 'or', name: 'ଓଡ଼ିଆ (Odia)' }, { code: 'ps', name: 'پښتو (Pashto)' }, { code: 'fa', name: 'فارسی (Persian)' }, { code: 'pl', name: 'Polski (Polish)' }, { code: 'pt', name: 'Português (Portuguese)' }, { code: 'pa', name: 'ਪੰਜਾਬੀ (Punjabi)' }, { code: 'ro', name: 'Română (Romanian)' }, { code: 'ru', name: 'Русский (Russian)' }, { code: 'sm', name: 'Gagana Sāmoa (Samoan)' }, { code: 'gd', name: 'Gàidhlig (Scots Gaelic)' },
      { code: 'sr', name: 'Српски (Serbian)' }, { code: 'st', name: 'Sesotho' }, { code: 'sn', name: 'Shona' }, { code: 'sd', name: 'سنڌي (Sindhi)' }, { code: 'si', name: 'සිංහල (Sinhala)' }, { code: 'sk', name: 'Slovenčina (Slovak)' }, { code: 'sl', name: 'Slovenščina (Slovenian)' }, { code: 'so', name: 'Soomaali (Somali)' }, { code: 'es', name: 'Español (Spanish)' }, { code: 'su', name: 'Sundanese' },
      { code: 'sw', name: 'Kiswahili (Swahili)' }, { code: 'sv', name: 'Svenska (Swedish)' }, { code: 'tg', name: 'Тоҷикӣ (Tajik)' }, { code: 'ta', name: 'தமிழ் (Tamil)' }, { code: 'tt', name: 'Татар (Tatar)' }, { code: 'te', name: 'తెలుగు (Telugu)' }, { code: 'th', name: 'ไทย (Thai)' }, { code: 'tr', name: 'Türkçe (Turkish)' }, { code: 'tk', name: 'Türkmençe (Turkmen)' }, { code: 'uk', name: 'Українська (Ukrainian)' },
      { code: 'ur', name: 'اردو (Urdu)' }, { code: 'ug', name: 'ئۇيغۇرچە (Uyghur)' }, { code: 'uz', name: 'Oʻzbek (Uzbek)' }, { code: 'vi', name: 'Tiếng Việt (Vietnamese)' }, { code: 'cy', name: 'Cymraeg (Welsh)' }, { code: 'xh', name: 'isiXhosa (Xhosa)' }, { code: 'yi', name: 'ייִדיש (Yiddish)' }, { code: 'yo', name: 'Yorùbá' }, { code: 'zu', name: 'isiZulu (Zulu)' }
    ];

    const dropdownInput = document.getElementById('dropdownInput');
    const dropdownList = document.getElementById('dropdownList');
    const listItemsContainer = document.getElementById('listItems');
    const searchInput = document.getElementById('searchInput');

    // Render language items
    function renderList(list) {
      listItemsContainer.innerHTML = '';
      list.forEach(lang => {
        const div = document.createElement('div');
        div.textContent = lang.name;
        div.dataset.code = lang.code;
        div.classList.add('notranslate'); // Prevent translation of list items
        div.addEventListener('click', () => {
          dropdownInput.value = lang.name;
          dropdownList.classList.remove('show');
          changeLanguage(lang.code);
        });
        listItemsContainer.appendChild(div);
      });
    }

    // Initial render
    renderList(languages);

    // Search filter
    searchInput.addEventListener('input', () => {
      const term = searchInput.value.toLowerCase();
      const filtered = languages.filter(l => l.name.toLowerCase().includes(term));
      renderList(filtered);
    });

    // Toggle dropdown
    dropdownInput.addEventListener('click', () => dropdownList.classList.toggle('show'));

    // Close dropdown on click outside
    document.addEventListener('click', e => {
      if (!e.target.closest('.dropdown-wrapper')) dropdownList.classList.remove('show');
    });

    // Google Translate
    function changeLanguage(languageCode) {
      if (!languageCode) return;
      deleteGoogTransCookies();
      document.cookie = languageCode === 'en' ? 'googtrans=/en/en; path=/;' : `googtrans=/en/${languageCode}; path=/;`;
      // Reload the page to apply translation
      window.location.reload();
    }

    // function deleteGoogTransCookies() {
    //   document.cookie.split(';').forEach(cookie => {
    //     const name = cookie.split('=')[0].trim();
    //     if (name === 'googtrans') {
    //       document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;';
    //     }
    //   });
    // }

    function deleteGoogTransCookies() {
            // Get all cookies
            const cookies = document.cookie.split(';');

            // Find and delete all googtrans cookies
            cookies.forEach(cookie => {
                const cookieName = cookie.split('=')[0].trim();
                // console.log("Cookie found first : " + cookieName);
                if (cookieName === 'googtrans') {
                    // console.log('Found googtrans cookie, attempting to delete...');

                    // Try multiple deletion strategies to cover all cases
                    const hostname = window.location.hostname;
                    const domainParts = hostname.split('.');

                    // Delete with various path and domain combinations
                    document.cookie = 'googtrans=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    document.cookie = 'googtrans=; path=/; domain=' + hostname + '; expires=Thu, 01 Jan 1970 00:00:01 GMT;';

                    // Try with parent domain (e.g., .example.com)
                    if (domainParts.length > 2) {
                        const parentDomain = '.' + domainParts.slice(-2).join('.');
                        document.cookie = 'googtrans=; path=/; domain=' + parentDomain + '; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    }

                    // Also try without domain (lets browser handle it)
                    document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';

                    // console.log('Deleted googtrans cookie');
                }
                // console.log("Cookie found: " + cookieName);
            });

            // Force clear by setting empty value
            document.cookie = 'googtrans=; path=/;';
        }

    // Set default selection based on cookie and ensure dropdown remains in English
    window.addEventListener('load', () => {
      const cookie = document.cookie.split(';').find(c => c.trim().startsWith('googtrans='));
      if (cookie) {
        const langCode = cookie.split('=')[1].split('/')[2];
        const found = languages.find(l => l.code === langCode);
        if (found) {
          dropdownInput.value = found.name; // Set dropdown to original English name
        }
      }
      // Re-render the list to ensure it stays in English
      renderList(languages);
    });

    // Google Translate init
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: languages.map(l => l.code).join(','),
        autoDisplay: false
      }, 'google_translate_element');
    }
  </script>
  <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!----------------->

    <script>
        let headerCaptchaId, careerCaptchaId, noVacancyCaptchaId;

        window.onCaptchasLoad = function () {

            // request form
            if (document.getElementById('headerCaptcha')) {
                headerCaptchaId = grecaptcha.render('headerCaptcha', {
                    'sitekey': RECAPTCHA_SITE_KEY,
                    'callback': function () {
                        document.getElementById('header-captcha-error').style.display = "none";
                    }
                });
            }

            // career form
            if (document.getElementById('careerCaptcha')) {
                careerCaptchaId = grecaptcha.render('careerCaptcha', {
                    'sitekey': RECAPTCHA_SITE_KEY,
                    'callback': function () {
                        document.getElementById('captcha-errors_careers').style.display = "none";
                    },
                    'expired-callback': function () {
                        document.getElementById('captcha-errors_careers').style.display = "block";
                    }
                });
            }

            // no vacancy form
            if (document.getElementById('noVacency_captcha')) {
                noVacancyCaptchaId = grecaptcha.render('noVacency_captcha', {
                    'sitekey': RECAPTCHA_SITE_KEY,
                    'callback': function () {
                        document.getElementById('captcha-errors_no_vanacy_form').style.display = "none";
                    },
                    'expired-callback': function () {
                        document.getElementById('captcha-errors_no_vanacy_form').style.display = "block";
                    }
                });
            }
        };

        // -------------------- BLOCKED DOMAINS (used by other forms) --------------------
        const blockedDomains = [
            "mailinator.com",
            "tempmail.com",
            "10minutemail.com",
            "yopmail.com",
            "guerrillamail.com",
            "maildrop.cc",
            "dispostable.com",
            "trashmail.com"
        ];

        function getEmailDomain(email) {
            return email.substring(email.lastIndexOf("@") + 1).toLowerCase();
        }

        const strictEmailRegex = /^(?!.*\.\.)(?!\.)(?!.*\.$)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

        // -------------------- VALIDATION FUNCTION (used by other forms) --------------------
        function validateField(el) {
            const val = el.val().trim();
            const name = el.attr('name');

            if (!val) {
                showError(el, 'This field is required.');
                return false;
            } else if (name === 'contact' && !/^\d{10,20}$/.test(val)) {
                showError(el, 'Contact number must be 10–20 digits.');
                return false;
            } else if (name === 'email') {
                if (!strictEmailRegex.test(val)) {
                    showError(el, 'Please enter a valid email address.');
                    return false;
                } else if (blockedDomains.includes(getEmailDomain(val))) {
                    showError(el, 'Invalid email addresses are not allowed.');
                    return false;
                } else {
                    hideError(el);
                }
            } else {
                hideError(el);
            }
            return true;
        }

        // -------------------- ERROR DISPLAY HELPERS (one single copy) --------------------
        function showError(element, message) {
            hideError(element);
            element.closest('.floating-group').append(`<small class="text-danger validation-error">${message}</small>`);
            element.addClass('is-invalid');
        }

        function hideError(element) {
            element.removeClass('is-invalid');
            element.closest('.floating-group').find('.validation-error').remove();
        }

        // -------------------- QUOTE FORM VALIDATION (new) --------------------
        function validateQuoteField($input) {
            const val = $input.val().trim();
            const id = $input.attr('id');
            let msg = '';

            if (id === 'quote_fname') {
                if (!val) msg = 'Please enter your name.';
                else if (!/^[A-Za-z]+(?:\s[A-Za-z]+)*$/.test(val)) msg = 'Name may only contain letters and spaces.';
            }
            else if (id === 'quote_company_name') {
                if (!val) msg = 'Please enter your company name.';
            }
            else if (id === 'quote_phone') {
                if (!val) msg = 'Please enter your contact number.';
                else if (!/^\d{10,15}$/.test(val)) msg = 'Contact number must be 10 to 15 digits.';
            }
            else if (id === 'quote_email') {
                if (!val) msg = 'Please enter your email.';
                else if (!strictEmailRegex.test(val)) msg = 'Please enter a valid email.';
                else if (blockedDomains.includes(getEmailDomain(val))) msg = 'Please use a valid company email address.';
            }

            if (msg) {
                showError($input, msg);
                return false;
            }
            hideError($input);
            return true;
        }

        $(document).ready(function () {
            const quoteFieldIds = ['quote_fname', 'quote_company_name', 'quote_phone', 'quote_email'];

            // Clear error while typing
            $(document).on('input', '#quoteForm input', function () {
                if (quoteFieldIds.includes(this.id)) hideError($(this));
            });

            // Validate when leaving a field
            $(document).on('blur', '#quoteForm input', function () {
                if (quoteFieldIds.includes(this.id)) validateQuoteField($(this));
            });

            // Reset quote form when modal closes
            $('#exampleModal').on('hidden.bs.modal', function () {
                $('#quoteForm')[0].reset();
                $('#quoteForm .validation-error').remove();
                $('#quoteForm .is-invalid').removeClass('is-invalid');
                $('#custom_captcha_error').hide();
                $('#quote-form-messages').empty();
                $('#reload-button').click();   // reload custom captcha image
                if (typeof headerCaptchaId !== 'undefined' && window.grecaptcha) {
                    grecaptcha.reset(headerCaptchaId);
                }
            });
        });
    </script>

    <script>
        window.APP_URLS = {
            productDetail: "{{ Route::has('products.detail') ? route('products.detail', ':url') : '' }}",
            categoryProducts: "{{ Route::has('category.products') ? route('category.products', ':id') : '' }}",
            defaultBanner: "{{ asset('public/front/img/products_bg_1.png') }}",
            image_path: "{{ asset('/') }}",
        };
    </script>

    <script>
        // Updated JavaScript for product header dynamic content
        document.addEventListener('DOMContentLoaded', function () {
            const categoryButtons = document.querySelectorAll('.category-btn');
            const productListContainer = document.querySelector('#dynamic-product-list');
            const specialCategoryContainer = document.querySelector('#special-category-container');
            const specialCategoryContainerspare = document.querySelector('#special-category-spare');

            function loadProducts(categoryId) {
                // Skip if APP_URLS is missing or empty
                if (!window.APP_URLS
                    || !window.APP_URLS.categoryProducts
                    || window.APP_URLS.categoryProducts === '') {
                    console.warn("APP_URLS not defined on this page, skipping loadProducts");
                    return;
                }

                // Special case for category ID 3 - show FIBC and Woven Sack machines
                if (categoryId == 3) {
                    // Hide the dynamic product list
                    if (productListContainer) {
                        productListContainer.style.display = 'none';
                    }

                    // Show the special category container
                    if (specialCategoryContainer) {
                        specialCategoryContainer.style.display = 'flex';
                    }


                    return; // Exit early for category 3
                }

                if (categoryId == 15) {

                    if (productListContainer) {
                        productListContainer.style.display = 'none';
                    }

                    // Show the special category container
                    if (specialCategoryContainer) {
                        specialCategoryContainer.style.display = 'none';
                    }


                    if (specialCategoryContainerspare) {
                        specialCategoryContainerspare.style.display = 'flex';
                    }
                    return; // Exit early for category 15
                }

                // Default behavior for other categories
                // Show the dynamic product list and hide special container
                if (productListContainer) {
                    productListContainer.style.display = 'block';
                }
                if (specialCategoryContainer) {
                    specialCategoryContainer.style.display = 'none';
                }

                if (specialCategoryContainerspare) {
                    specialCategoryContainerspare.style.display = 'none';
                }
                var url = window.APP_URLS.categoryProducts.replace(':id', categoryId);

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (!productListContainer) return; // skip if no container on page

                        if (data.error) {
                            productListContainer.innerHTML = `<li>${data.error}</li>`;
                            return;
                        }

                        if (data.products && data.products.length > 0) {
                            productListContainer.innerHTML = data.products.map(product => {
                                let productUrl = window.APP_URLS.productDetail
                                    ? window.APP_URLS.productDetail.replace(':url', product.url)
                                    : '#';
                                return `
                            <li>
                                <a href="${productUrl}">
                                    ${product.product_name}
                                </a>
                            </li>
                        `;
                            }).join('');
                        } else {
                            productListContainer.innerHTML = `<li>No products available</li>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        if (productListContainer) {
                            productListContainer.innerHTML = `<li>Error loading products</li>`;
                        }
                    });
            }

            // Load first category on page load
            if (categoryButtons.length > 0 && window.APP_URLS.categoryProducts) {
                loadProducts(categoryButtons[0].getAttribute('data-id'));
            }

            // OLD CODE
            // Add hover (mouseenter) event to each category
            // categoryButtons.forEach(button => {
            //     button.addEventListener('mouseenter', function () {
            //         categoryButtons.forEach(btn => btn.classList.remove('active'));
            //         this.classList.add('active');
            //         loadProducts(this.getAttribute('data-id'));
            //     });
            // });
            // NEW CODE START
            categoryButtons.forEach(button => {
                button.addEventListener('mouseenter', function () {
                    // Remove active from all, add to hovered
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    loadProducts(this.getAttribute('data-id'));
                });
            });

            // When mouse leaves the entire product menu, reset first category to active (red)
            const productMenu = document.querySelector('.product_menu');
            if (productMenu) {
                productMenu.addEventListener('mouseleave', function () {
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    if (categoryButtons.length > 0) {
                        categoryButtons[0].classList.add('active');
                        loadProducts(categoryButtons[0].getAttribute('data-id'));
                    }
                });
            }
            // NEW CODE END

        });
        window.ORSAN_PRODUCTS = @json($orsan_products -> map(function ($product) {
            return [
                'name' => $product -> product_name,
                'url' => route('products.detail', $product -> url)
            ];
        }));

        window.ARMSTRONG_PRODUCTS = @json($armstrong_products -> map(function ($product) {
            return [
                'name' => $product -> product_name,
                'url' => route('products.detail', $product -> url)
            ];
        }));

        window.NEWLONG_PRODUCTS = @json($newlong_products -> map(function ($product) {
            return [
                'name' => $product -> product_name,
                'url' => route('products.detail', $product -> url)
            ];
        }));

        window.JUKI_PRODUCTS = @json($juki_products -> map(function ($product) {
            return [
                'name' => $product -> product_name,
                'url' => route('products.detail', $product -> url)
            ];
        }));
    </script>

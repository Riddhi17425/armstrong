<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11201625696"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11201625696');
</script>
    <!-- Google Tag Manager --> 
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': 
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], 
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,
         f); 
        })(window,document,'script','dataLayer','GTM-MF2C8CJ3');</script> 
        <!-- End Google Tag Manager --> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $metatitle ?? 'Armstrong' !!}</title>
    <meta name="description" content="{!! $metadescription ?? ''!!}">
    <link rel="icon" type="image/x-icon" href="{{asset('public/front/images/favicon.png')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/img/favicon.png')}}">
    
    <!--og tags-->
     <meta property="og:title" content="{!! $metatitle ?? 'Armstrong' !!}">
    <meta property="og:description" content="{!! $metadescription ?? ''!!}">
    <meta property="og:image" content="{{ $og_image ?? asset('public/admin/milestone/milestone-4-68b95fdcf2219.jpg') }}">
   
    <meta property="og:url" content="https://www.armstrongex.com/">
   
    <meta property="og:type" content="website">
    
    @if (Request::is('woven-bag-lamination-machine'))
        <meta name="robots" content="noindex, nofollow">
    @endif

    
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
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!-- Select2 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css')}}">
    <link rel="canonical" href="{{ $_SERVER['SCRIPT_URI'] }}" />

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
      left: -30px;
      right: 0;
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
    </style>
    
    <meta name="google-site-verification" content="TlYf45dh6qXvTaP3Fa7Rfs8LCcGkuluXggXlj4TXlZQ" />
</head>

<body>
<!-- Google Tag Manager (noscript) --> 
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM
MF2C8CJ3" 
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> 
<!-- End Google Tag Manager (noscript) --> 
    <!-- <div id="loader">-->
    <!--     <div class="loader-logo">Armstrong</div>-->
    <!--     <div class="loader-bar"><span></span></div>-->
    <!--</div>-->

    <header>
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('public/front/img/logo.svg')}}" alt="logo" class="img-fluid hed-logo1">
                    <img src="{{asset('public/front/img/armstrong_logo_header.svg')}}" alt="logo"
                        class="img-fluid hed-logo2">
                </a>
                <div class="hamburger" id="hamburger" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </div>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0  navbar-nav-scroll">
                        <li class="nav-item d-none">
                            <a class="nav-link">About Us2
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon" href="{{route('about')}}">
                                                <img src="{{asset('public/front/img/Company Profile.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Company Profile</span>
                                                </div>
                                            </a>
                                            <a class="icon icon2" href="{{route('our.infrastructure')}}">
                                                <img src="{{asset('public/front/img/Our Infrastructure.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Our Infrastructure</span>
                                                </div>
                                            </a>
                                            <a class="icon mb-0 icon3" href="{{route('certificates')}}">
                                                <img src="{{asset('public/front/img/Certificates.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Certificates</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/Career.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About Us
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon  icon1" href="{{route('about')}}">
                                                <img src="{{asset('public/front/img/Company Profile.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Company Profile</span>
                                                </div>
                                            </a>
                                            <a class="icon  icon2" href="{{route('our.infrastructure')}}">
                                                <img src="{{asset('public/front/img/Our Infrastructure.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Our Infrastructure</span>
                                                </div>
                                            </a>
                                            <a class="icon mb-0  icon3" href="{{route('certificates')}}">
                                                <img src="{{asset('public/front/img/Certificates.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Certificates</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/ABOUT.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/company-profile-banner.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <img src="{{asset('public/front/img/ABOUT.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg2 bd_10">
                                            <img src="{{asset('public/front/img/certificates-banner.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg3 bd_10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('productlist')}}">Products
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>

 
                            @php
                            use App\Models\ProductCategory;
                            use App\Models\ProductMaster;

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
                            @endphp

                            <div class="mega_menu">
                                <div class="container">
                                    <div class="d-flex align-items-start product_menu">

                                        {{-- LEFT SIDE (Categories) --}}
                                        <div class="nav flex-column nav-pills col-lg-3 col-md-3 col-12" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            @foreach($product_categories as $index => $category)
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('research.development')}}">R&D</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.video')}}">Media
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon icon1" href="{{route('front.event')}}">
                                                <img src="{{asset('public/front/img/Events.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Events</span>
                                                </div>
                                            </a>
                                            <a class="icon icon3 mb-0" href="{{route('front.video')}}">
                                                <img src="{{asset('public/front/img/Videos.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Videos</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/Media.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/event-banner.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <!--<img src="{{asset('public/front/img/gallery-banner.jpg')}}" alt="cp" class=" img-fluid main-bg2 bd_10">-->
                                            <img src="{{asset('public/front/img/Media.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg3 bd_10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('career')}}">Careers
                                <img src="{{asset('public/front/img/setting_icon.svg')}}" alt="setting"
                                    class="img-fluid setting-icon">
                            </a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="mega_menu_wrapper">
                                        <div class="icons">
                                            <a class="icon icon1" href="{{route('career')}}">
                                                <img src="{{asset('public/front/img/Open Positions.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Open Positions</span>
                                                </div>
                                            </a>
                                            <a class="icon icon2" href="{{route('front.lifearmstrong')}}">
                                                <img src="{{asset('public/front/img/Life at Armstrong.png')}}" alt="cp"
                                                    class="img-fluid d-none d-md-block">
                                                <div class="pagename">
                                                    <span>Life at Armstrong</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="icons_bg">
                                            <img src="{{asset('public/front/img/Career.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg bd_10">
                                            <img src="{{asset('public/front/img/open-positions-banner.jpg')}}" alt="cp"
                                                class=" img-fluid main-bg1 bd_10">
                                            <img src="{{asset('public/front/img/life-at-armstrong-banner.jpg')}}"
                                                alt="cp" class=" img-fluid main-bg2 bd_10">
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


                </div>

                <a class="request_btn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

    @include('layouts.quote-modal')
    
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


        
        
         // -------------------- blocked domains--------------------
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
        function showError(el, msg) {
            hideError(el);
            el.after('<small class="validation-error text-danger">' + msg + '</small>');
        }

        function hideError(el) {
            el.next('.validation-error').remove();
        }

        // -------------------- VALIDATION FUNCTION --------------------
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
                hideError(el); // full name, company name, etc.
            }
            return true;
        }

        


        // -------------------- Quote FORM --------------------
        $(document).ready(function () {
            $('#reload-button').click(function () {
                $('#captcha-image').attr('src', '{{ route("captcha.image") }}?' + Date.now());
            });
        });
        // Blocked disposable/spam domains
        const blockedDomainsQuote = [
            "mailinator.com",
            "tempmail.com",
            "10minutemail.com",
            "yopmail.com",
            "guerrillamail.com",
            "maildrop.cc",
            "dispostable.com",
            "trashmail.com"
        ];

        // Helper to get domain from email
        function getEmailDomainQuote(email) {
            return email.substring(email.lastIndexOf("@") + 1).toLowerCase();
        }

        // Stricter email regex: no consecutive dots, cannot start/end with dot
        const strictEmailRegexQuote = /^(?!.*\.\.)(?!\.)(?!.*\.$)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

        // -------------------- Validation Helpers --------------------
        function showError(el, msg) {
            hideError(el);
            el.after('<small class="validation-error text-danger">' + msg + '</small>');
        }
        function hideError(el) {
            el.next('.validation-error').remove();
        }

        function validateQuoteField(el) {
            const val = el.val().trim();
            const id = el.attr('id');

            if (!val) {
                showError(el, 'This field is required.');
                return false;
            } else if (id === 'quote_phone' && !/^\d{10,20}$/.test(val)) {
                showError(el, 'Contact number must be 10–20 digits.');
                return false;
            } else if (id === 'quote_email') {
                if (!strictEmailRegexQuote.test(val)) {
                    showError(el, 'Please enter a valid email address.');
                    return false;
                } else if (blockedDomainsQuote.includes(getEmailDomainQuote(val))) {
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

       $(document).ready(function () {
    // Hide error helper
    function hideError($el) {
        $el.removeClass("validation-error");
        $el.next(".error-msg").remove();
    }

    // List of disallowed email domains
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

    // Validation logic
    function validateQuoteField($input) {
        let val = $input.val().trim();
        let id = $input.attr("id");
        let valid = true;
        let msg = "";

        // --- Name validation ---
        if (id === "quote_fname") {
            if (val === "") {
                msg = "Please enter your name.";
                valid = false;
            } else if (!/^[A-Za-z\s]+$/.test(val)) {
                msg = "Name must contain only alphabets and spaces.";
                valid = false;
            }
        }

        // --- Company name validation ---
        else if (id === "quote_company_name") {
            if (val === "") {
                msg = "Please enter your company name.";
                valid = false;
            }
        }

        // --- Phone validation ---
        else if (id === "quote_phone") {
            if (val === "") {
                msg = "Please enter your contact number.";
                valid = false;
            } else if (val.length < 10) {
                msg = "Contact number must be at least 10 digits.";
                valid = false;
            }
        }

        // --- Email validation ---
        else if (id === "quote_email") {
            if (val === "") {
                msg = "Please enter your email.";
                valid = false;
            } else {
                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(val)) {
                    msg = "Please enter a valid email.";
                    valid = false;
                } else {
                    // Extract domain part
                    let domain = val.split("@")[1]?.toLowerCase() || "";
                    if (blockedDomains.some(bad => domain.includes(bad))) {
                        msg = "Please use a valid company email address.";
                        valid = false;
                    }
                }
            }
        }

        // --- Show or hide error message ---
        if (!valid) {
            $input.addClass("validation-error");
            if ($input.next(".error-msg").length === 0) {
                $input.after('<small class="error-msg text-danger">' + msg + "</small>");
            }
        } else {
            hideError($input);
        }

        return valid;
    }

    // Input & blur validation
    $(document).on("input", "#quoteForm input", function () {
        hideError($(this));
    });

    $(document).on("blur", "#quoteForm input", function () {
        validateQuoteField($(this));
    });

    // Reload captcha
    $(document).on("click", "#reload-button", function () {
        $("#captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
    });

    // Submit handler
    $(document).on("click", "#quoteSubmitBtn", function (e) {
        e.preventDefault();

        let form = $("#quoteForm");
        let $btn = $(this);
        let isValid = true;

        $(".error-msg").remove();
        $("#custom_captcha_error").hide();
        form.find(".validation-error").removeClass("validation-error");

        // Validate all required fields
        form.find("input[type='text'], input[type='tel'], input[type='email']").each(function () {
            if (!validateQuoteField($(this))) {
                isValid = false;
            }
        });

        // Custom captcha
        let captcha = $("#custom_captcha").val().trim();
        if (captcha === "") {
            $("#custom_captcha_error").show().text("Please enter the captcha.");
            isValid = false;
        }

        if (!isValid) return;

        // Disable button during captcha check
        $btn.prop("disabled", true).text("Verifying captcha...");

        $.ajax({
            url: "{{ route('captcha.verify') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                custom_captcha: captcha,
            },
            success: function (response) {
                if (response.success) {
                    $btn.text("Submitting...");
                    form.off("submit").submit(); // submit naturally
                } else {
                    $("#custom_captcha_error").show().text(response.message);
                    $btn.prop("disabled", false).text("Submit");
                    $("#captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
                }
            },
            error: function () {
                alert("Something went wrong. Please try again.");
                $btn.prop("disabled", false).text("Submit");
                $("#captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
            },
        });
    });
});






        // -------------------- ERROR DISPLAY HELPERS --------------------
        function showError(element, message) {
            hideError(element);
            element.closest('.floating-group').append(`<small class="text-danger validation-error">${message}</small>`);
            element.addClass('is-invalid');
        }

        function hideError(element) {
            element.removeClass('is-invalid');
            element.closest('.floating-group').find('.validation-error').remove();
        }

        // -------------------- MODAL RESET --------------------
        $(".modal").on("hidden.bs.modal", function () {
            let form = $("#quoteForm")[0];
            if (form) {
                form.reset();
                $("#header-captcha-error").hide();
                $("#quoteForm .validation-error").remove();
                if (typeof headerCaptchaId !== 'undefined') {
                    grecaptcha.reset(headerCaptchaId);
                }
            }
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

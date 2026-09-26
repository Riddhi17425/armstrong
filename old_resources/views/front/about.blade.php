@include('layouts.frontheader')

<section class="breadcrumb_wrapper">
  <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="JavaScript:Void(0)"> About Us </a></li>
            <li class="breadcrumb-item active" aria-current="page">Company Profile</li>
        </ol>
    </nav>
    <div class="setting_vector_icon">
        <h1 class="heading">At a Glance</h1>
        <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
    </div>
  </div>
</section>

<section class="section-mt ">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg">
                <div class="profile_exp">
                    <div class="info-tag">
                        <span> Exporters and manufacturers of the world's finest finishing machines for 40+ years.</span>
                        <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting_vector">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div>
                     Armstrong is a trusted manufacturer and exporter of finishing machinery and spare parts for the PP/FIBC and woven-sack industries. Established over four decades ago and headquartered in Ahmedabad, we have built a strong reputation for delivering reliable, precise, and durable solutions that meet global standards. Our product range covers every stage of finishing, from fabric cutting and liner sealing to baffle punching, bag rolling, and high-speed sewing, making us a one-stop solutions partner. Backed by continuous R&D and a commitment to quality, Armstrong continues to support packaging manufacturers worldwide with technology that enhances efficiency and performance.
                </div>

                <div class="pro_exp_bt pb-0">
                    <div class="row mt-5 counter_start">
                        <div class="col-6 col-md-3 mb-4 mb-lg-auto">
                            <div class="counter_card">
                                <h2 class="count counter mb-3" data-count="70" data-suffix="+">70+</h2>
                                <p class="mb-0">Export <br> Countries</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-4 mb-lg-auto">
                            <div class="counter_card">
                                <h2 class=" count counter mb-3" data-count="120" data-suffix="+">120+</h2>
                                <p class="mb-0">Talented <br> Team</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-4 mb-lg-auto">
                            <div class="counter_card">
                                <h2 class=" count counter mb-3" data-count="80" data-suffix="+">80+</h2>
                                <p class="mb-0">Innovative <br> Products</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-4 mb-lg-auto">
                            <div class="counter_card">
                                <h2 class=" count counter mb-3" data-count="5500" data-suffix="+">5500+</h2>
                                <p class="mb-0">Worldwide <br> Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg text-center text-lg-end">
                <div class="pro_exp_lt">
                    <img src="{{ asset('public/front/img/round_vector2.png') }}" alt="round vector" class="img-fluid">
                    <div class="pro_exp_lt_bg">
                        <h1 class="heading">43</h1>
                        <p>YEARS OF <br>
                            Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- slider -->
<section>
    <div class="container-fluid px-md-0">
        <div class="hero_slider">
            <div class="hero_swiper swiper">
                <div class="swiper-wrapper">
                @foreach($homesliders as $slider)
                    @php
                        // Get only the file name (remove folder path if present)
                        $imageName = basename($slider->image);
                
                        // Extract filename without extension
                        $filename = strtolower(pathinfo($imageName, PATHINFO_FILENAME));
                
                        // remove spaces
                        $filename = str_replace(' ', '', $filename);
                
                        // take only the part before underscore (e.g., fibc_1 → fibc)
                        $filename = explode('_', $filename)[0];
                
                        // mapping of filenames to URLs
                                                $redirects = [
                           
                            'fibc'                    => route('products.listing', ['url' => 'fibc-machine']),
                            'needleloommachine'       => route('products.listing', ['url' => 'niddle-loom']),
                            'needleloom'              => route('products.listing', ['url' => 'niddle-loom']),
                            'mulchfilmpunchingmachine'=> route('products.listing', ['url' => 'mulch-film-punching']),
                            'mulchfilmpunching'       => route('products.listing', ['url' => 'mulch-film-punching']),
                            'wovensackmachines'       => route('products.listing', ['url' => 'woven-sack']),
                            'wovensack'               => route('products.listing', ['url' => 'woven-sack']),
                            'sewingmachines'          => route('products.listing', ['url' => 'sewing']),
                            'tarpaulinmachines'       => route('products.listing', ['url' => 'tarpaulin']),
                            'tarpaulin'               => route('products.listing', ['url' => 'tarpaulin']),
                            'bagclosingmachines'      => route('products.listing', ['url' => 'bag-closing']),
                            'bagclosing'              => route('products.listing', ['url' => 'bag-closing']),
                        ];
                
                        $link = $redirects[$filename] ?? '#';
                    @endphp
                
                    <div class="swiper-slide">
                        <a href="{{ $link }}">
                            <img class="w-100 bd_10" src="{{ asset('public/admin/homeslider/'.$imageName) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($slider->image, PATHINFO_FILENAME)) }}">
                        </a>
                    </div>
                @endforeach



                    <!--@foreach($homesliders as $slider)-->
                    <!--    <div class="swiper-slide">-->
                    <!--        <a href="#">-->
                    <!--            <img class="w-100" src="{{ asset('public/admin/homeslider/'.$slider->image) }}" alt="Slider Image">-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--@endforeach -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-mt ">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="main_head head_wrapper ">Company Culture</h2>
                <p>At Armstrong, our people are our strength. With a team of 70+ skilled and passionate engineers and experts, we get you cutting-edge finishing machinery powered by technical excellence, modern innovation, and strategic collaboration. All guided by one goal, delivering the best for our customers. We nurture an environment where ideas grow, challenges are overcome collectively, and customer satisfaction is the core of everything we do.</p>
            </div>
        </div>
    </div>

    <div class="section-mt vision">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 d-none d-lg-block">
                    <div>
                        <!--<img class="img-fluid" src="{{ asset('public/front/img/vision_1.png') }}" alt="vision">-->
                        <video class="vision_video" autoplay playsinline loop muted style="border-radius:50%;object-fit: fill;">
                          <source src="{{ asset('public/front/img/vision_arm.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 vision_cet">
                            <div class="vision_cet_f">
                                <h3>Vision</h3>
                                <p>To be the leading one-stop solution provider for the global PP/PE industry, delivering excellence, reliability, and innovation at every stage.</p>
                            </div>
                        </div>
                        
                        <div class="d-lg-none text-center my-4">
                         <!--<img class="img-fluid" src="{{ asset('public/front/img/vision_1.png') }}" alt="Mission">-->
                         <video class="vision_video"  autoplay playsinline loop muted style="border-radius:50%;object-fit: fill;">
                          <source src="{{ asset('public/front/img/vision_arm.mp4') }}" type="video/mp4">
                        </video>
                       </div>
                      
                        <div class="col-lg-6">
                            <div class="vision_cet_l">
                                <h3>Mission</h3>
                                <p>To drive continuous innovation in our products - minimizing manual effort and enabling high-speed, efficient production across the PP/PE industry.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 text-center text-lg-end">
                    <div>
                        <!--<img class=" img-fluid" src="{{ asset('public/front/img/vision_2.png') }}" alt="vision">-->
                        <video class="vision_video" autoplay playsinline loop muted style="border-radius:50%;object-fit: fill;">
                          <source src="{{ asset('public/front/img/mission_armstrong.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="milstone section-mt">
    <div class="container">
        <div class="text-center">
            <h2 class="main_head head_wrapper">Our Legacy</h2>
            <p>The journey of growth driven by precision and excellence</p>
        </div>

        {{-- Dynamic Years --}}
        <div class="time_line">
            @foreach($milestones as $index => $milestone)
                <h4 class="year {{ $index === 0 ? 'active' : '' }}">{{ $milestone->year }}</h4>
            @endforeach
        </div>

        {{-- Dynamic Slides --}}
        <div class="time_line_bt swiper">
            <div class="swiper-wrapper">
                @foreach($milestones as $milestone)
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-lg-5">
                                <span>
                                    <img class="img-fluid rounded-3 mb-3 mb-md-0" src="{{ asset('/'.$milestone->image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($milestone->alt_tag, PATHINFO_FILENAME)) }}">
                                </span>
                            </div>
                            <div class="col-lg-7">
                                <div class="time_line_bt_lt">
                                    <h2>{{ $milestone->title }}</h2>
                                    <p>{!! $milestone->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Navigation Arrows --}}
            <div class="milstone_arrow">
                <span class="swiper-button-prev1">
                    <img src="{{ asset('public/front/img/arrow_left.svg') }}" alt="arrow" class="img-fluid">
                </span>
                <span class="swiper-button-next1">
                    <img src="{{ asset('public/front/img/arrow_right.svg') }}" alt="arrow" class="img-fluid">
                </span>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 order-1 order-lg-0">
                <div>
                 
                     <!--<img class="img-fluid" src="{{asset('public/front/img/map.gif')}}" alt="maps">-->
                       <video autoplay muted playsinline loop
        style="width: 100%; height: 100%; object-fit: cover; display: block;"
  <source src="{{ asset('public/front/img/MAP.mp4') }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
               
               </div>
            </div>

            <div class="col-lg-4">
                <h2 class="main_head fw-bolder"> Trusted by 1600+ Global Clients</h2>
                <!--<h4 class="mb-4 news-title lh-base pt-0">TRUSTED CLIENTS</h4>-->
                <p>From innovation to reliability, Armstrong’s finishing solutions enable industries across 70+ countries redefine efficiency, scale production, and secure long-term success.</p>
            </div>
        </div>
    </div>

</section>

<section class="section-pt">
    <div class="container">
        <div class=" help-card">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_head text-white mb-3">Ready to upgrade your production?</h2>
                    <P class="help_card_subtext">Our experts are here to get you innovative finishing solutions that drive performance and reliability</P>
                    <div class=" mt-5">
                        <a class="need-request"  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> Get A Quote •</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">
                <img src="{{ asset('public/front/img/fibca-iftex.svg') }}" alt="fibca iftex" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')
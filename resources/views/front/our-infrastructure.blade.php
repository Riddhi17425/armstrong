@include('layouts.frontheader', [
    'og_image' => asset('public/front/img/ABOUT.jpg')
])

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="Javascript:Void(0)"> About Us </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Our Infrastructure</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
           <h1 class="hero-title mb-3">Our Infrastructure </h1>
           <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <p >Our advanced infrastructure combines automation and expertise, delivering precise finishing solutions that maximize efficiency and customer satisfaction.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row g-4 gx-lg-5 justify-content-between">
            <div class="col-lg-6">
                <div>
                    <p>At Armstrong, infrastructure is the base of reliability. Our state-of-the-art facility integrates advanced technology, skilled craftsmanship, and strict quality control to deliver precision-driven finishing solutions. Every machine is designed, assembled, and tested in-house, ensuring complete control over customization, performance, and global standards. From single-unit machines to full-line systems, our robust and scalable infrastructure helps us get you engineer solutions that reduce labor involvement, increase production capacity, and consistently meet real-world industry demands.</p>
                </div>
            </div>
            <div class="col-lg-6 position-relative">
                <div class="pro_exp_bt infrastructure_slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="counter_card">
                                <h2 class="count mb-3">60,000+</h2>
                                <p class="mb-0">sq. ft. <br />Manufacturing Area</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="counter_card">
                                <h2 class="count mb-3">40+</h2>
                                <p class="mb-0">Skilled Engineers & <br />Technicians</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="counter_card">
                                <h2 class="count mb-3">10+</h2>
                                <p class="mb-0">Dedicated Production <br />Zones</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="counter_card">
                                <h2 class="count mb-3">5+</h2>
                                <p class="mb-0">Advanced Assembly <br />Lines</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- slider -->
<section class="section-mt">
    <div class="container-fluid px-md-0">
        <div class="text-center">
            <h2 class="main_head">Committed To Quality. Driven By Trust</h2>
        </div>
        <div class="hero_slider">
            <div class="hero_swiper swiper">
                <div class="swiper-wrapper">
                    @foreach($infrastructureslider as $data)
                    <div class="swiper-slide">
                        <a href="{{ asset('/' . $data->image) }}" data-fancybox="gallery">
                            <img class="w-100 bd_10" src="{{ asset('/' . $data->image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($data->alt, PATHINFO_FILENAME)) }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class=" container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-8 text-center">
                <h2 class="main_head head_wrapper">Where Precision Meets Innovation</h2>
                <p>Check out our dedicated zones at the work station that power each Armstrong machine.</p>
            </div>
        </div>

        <div class="row">
            @foreach($facilities as $facility) 
                <div class="col-lg-4 mb-4 mb-lg-4">
                    <div class="our_facility">
                        <span>
                             <img src="{{ asset('/' . $facility->image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($facility->alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid bd_10">
                        </span>
                        <h2 class="sub_head">{{ $facility->title }}</h2>
                        <p>{!! $facility->description !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.frontfooter')
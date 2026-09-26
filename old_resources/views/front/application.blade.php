@include('layouts.frontheader')

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home </a></li>
                <li class="breadcrumb-item active" aria-current="page">Applications</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading mb-4">Industrial Packaging Machinery Applications</h1>
            <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector"
                class="img-fluid setting-wrapper" style="top:10%">
            <div class="col-lg-12 m-auto text-center">
                <p class="news-title">Our Core Industries</p>
                <p>Being associated with the industrial packaging industry for more than 40 years, we now stand as one
                    of the leading names among the FIBC machine manufacturers in India. With sturdiness, exactness, and
                    efficiency as their primary attributes, our FIBC machines are made to last. Armstrong designs and
                    manufactures high-performance bag-making machines, finishing lines, and spare parts for industries
                    handling bulk materials. Each machine we provide is engineered, constructed, and evaluated
                    internally in our advanced facility, adhering to industry standards for exceptional quality and
                    strong performance. </p>
            </div>
        </div>
    </div>
</section>

<section class="section-pt">
    <div class="container">

        <div class="row">
            @foreach ($applications as $application)
                <div class="col-mb-6 col-lg-4 mb-4 product_card">
                    <a href="{{ route('front.application.details',['url' => $application->url ]) }}">
                        <img src="{{ asset($application->application_image)}}" alt="images" class="img-fluid mb-4">
                    </a>
                    <a href="{{ route('front.application.details',['url' => $application->url ]) }}">
                        <h3 class="news-title">{{ $application->name }} </h3>
                    </a>
                    <div class="product-contant mt-0">
                        @if(isset($application->short_description) && $application->short_description != '')
                        <!--{!! $application->short_description  !!}-->
                        {!! mb_substr(strip_tags($application->short_description), 0, 100) !!}.....
                        @endif
                        <span>
                            <a class="arrow_circle" href="{{ route('front.application.details',['url' => $application->url ]) }}">
                                <img src="{{ asset('public/front/img/arrow.png')}}" alt="arrow"
                                    class="img-fluid arrow_icon">
                            </a>
                        </span>
                    </div>
                </div>
            @endforeach
            

            {{-- <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-mb-6 col-lg-4 mb-4 product_card">
                <a href="#">
                    <img src="public/front/img/application/applicaiton_1.png" alt="images" class="img-fluid mb-4">
                </a>
                <a href="#">
                    <h3 class="news-title">Agriculture </h3>
                </a>
                <div class="product-contant mt-0">
                    <p class="mb-0">Agricultural packaging requires high-volume and durable bag production. Armstrong’s
                        bag-making machines and FIBC bag finishing machines are engineered to handle grains, seeds, and
                        crops</p>
                    <span>
                        <a class="arrow_circle" href="#">
                            <img src="https://www.localhost/armstrong/public/front/img/arrow.png" alt="arrow"
                                class="img-fluid arrow_icon">
                        </a>
                    </span>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<section class="section-pt">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-7">

                <h2 class="main_head mb-md-3 mb-lg-4">Why Rely on Us?
                </h2>
                <p>Over the last 40 years, Armstrong has developed into a globally recognised leader in industrial
                    finishing machinery. We started with importing sewing machines from Japan to innovating FIBC
                    automation. Later, we entered into the mulch and agriculture sectors. Having more than 80 product lines and customers in more than 70 countries, we are not
                    simply producers of <b>FIBC machines.</b></p>

                <div>
                    <h4 class="news-title">Built-in Innovation</h4>
                    <p> Our
                        industrial machine solutions are subjected to live fabric trials and a thorough final quality
                        check before shipping. What you get is not a mere product but a
                        solution that has already been verified.</p>
                </div>

                <div>
                    <h4 class="news-title">From Stitch to Automation </h4>
                    <p>If you are sourcing a woven sack machinery or an entire end-to-end FIBC automation line,
                        Armstrong is present at every step of finishing - fabric cutting, liner sealing, baffle
                        punching, bag rolling, and further. No loopholes in the production process. </p>
                </div>
            </div>
            <div class="col-lg-5">
                <div>
                    <img class=" img-fluid" src="public/front/img/application/why_rely_Us.webp" alt="images">
                </div>

            </div>
        </div>
    </div>
</section>


<section class="section-pt">
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="main_head head_wrapper">Frequently asked questions</h2>
            <!--<p>Frequently asked questions</p>-->
        </div>

        <div class="accordion" id="accordionExample">

            <!-- FAQ 1 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne">
                    What industries use Armstrong industrial packaging machinery?
                </h5>

                <div id="collapseOne"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample">

                    <div>
                        Armstrong machines serve agriculture, food processing, fertilizers, chemicals, animal feed, construction, minerals, plastics, FIBC and other industrial packaging applications.
                    </div>

                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo">
                    Which machines are suitable for fertilizer packaging?
                </h5>

                <div id="collapseTwo"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                       Armstrong heavy-duty and automatic bag closing machines are suitable for high-volume fertilizer bag closing and continuous packaging operations.
                    </div>

                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree">
                    Which Armstrong machines are used for FIBC manufacturing?
                </h5>

                <div id="collapseThree"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                       Armstrong offers FIBC machinery for cutting, sewing, testing, printing, cleaning and finishing jumbo bags.
                    </div>

                </div>
            </div>
            
            <!-- FAQ 4 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFour"
                    aria-expanded="false"
                    aria-controls="collapseFour">
                    Which machines are suitable for PP woven bags?
                </h5>

                <div id="collapseFour"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                      Armstrong offers bag closing, sewing and PP woven bag-making machines designed for PP woven and laminated bags.
                    </div>

                </div>
            </div>
            
            <!-- FAQ 5 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFive"
                    aria-expanded="false"
                    aria-controls="collapseFive">
                    Can Armstrong machinery be customized for specific applications?
                </h5>

                <div id="collapseFive"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                      Yes. Armstrong provides application-specific customization, including machine configurations, conveyor setups and FIBC bag sizes or designs.
                    </div>

                </div>
            </div>
            
            
            <!-- FAQ 6 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSix"
                    aria-expanded="false"
                    aria-controls="collapseSix">
                    Which machine is suitable for high-volume bag closing?
                </h5>

                <div id="collapseSix"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                       The AS 800/802 heavy-duty bag closing machines are suitable for high-volume production, with configurations offering up to 900–1000 bags per hour.
                    </div>

                </div>
            </div>
            
            <!-- FAQ 7 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseSeven"
                    aria-expanded="false"
                    aria-controls="collapseSeven">
                    What industries use industrial bag closing machines?
                </h5>

                <div id="collapseSeven"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                       Industrial bag closing machines are commonly used in fertilizer, agriculture, food processing, chemicals, cement, animal feed, minerals and construction-material industries.
                    </div>

                </div>
            </div>
            
            <!-- FAQ 8 -->
            <div class="mb-4">
                <h5 class="according_head"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseEight"
                    aria-expanded="false"
                    aria-controls="collapseEight">
                    How do I choose the right packaging machine for my application?
                </h5>

                <div id="collapseEight"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">

                    <div>
                       Choose based on your product, bag material and size, required production volume, closure type and level of automation. Armstrong can recommend a suitable machine based on these requirements.
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>



<section class="section-pt">
    <div class="container">
        <div class=" help-card">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_head text-white mb-3">Want to Upgrade Your Bag Making Line?</h2>
                    <P class="help_card_subtext">Armstrong offers cutting-edge PPC bag-making equipment, FIBC bag
                        finishing machines, and whole industrial solutions that increase productivity, minimise
                        downtime, and guarantee consistent production, among other benefits.</P>
                    <div class=" mt-5">
                        <a class="need-request" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> Get a
                            Quote </a>
                        <a class="need-request ms-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-4" >Send Inquiry on WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What industries use Armstrong industrial packaging machinery?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Armstrong machines serve agriculture, food processing, fertilizers, chemicals, animal feed, construction, minerals, plastics, FIBC and other industrial packaging applications."
    }
  },{
    "@type": "Question",
    "name": "Which machines are suitable for fertilizer packaging?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Armstrong heavy-duty and automatic bag closing machines are suitable for high-volume fertilizer bag closing and continuous packaging operations."
    }
  },{
    "@type": "Question",
    "name": "Which Armstrong machines are used for FIBC manufacturing?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Armstrong offers FIBC machinery for cutting, sewing, testing, printing, cleaning and finishing jumbo bags."
    }
  },{
    "@type": "Question",
    "name": "Which machines are suitable for PP woven bags?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Armstrong offers bag closing, sewing and PP woven bag-making machines designed for PP woven and laminated bags."
    }
  },{
    "@type": "Question",
    "name": "Can Armstrong machinery be customized for specific applications?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes. Armstrong provides application-specific customization, including machine configurations, conveyor setups and FIBC bag sizes or designs."
    }
  },{
    "@type": "Question",
    "name": "Which machine is suitable for high-volume bag closing?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The AS 800/802 heavy-duty bag closing machines are suitable for high-volume production, with configurations offering up to 900–1000 bags per hour."
    }
  },{
    "@type": "Question",
    "name": "What industries use industrial bag closing machines?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Industrial bag closing machines are commonly used in fertilizer, agriculture, food processing, chemicals, cement, animal feed, minerals and construction-material industries."
    }
  },{
    "@type": "Question",
    "name": "How do I choose the right packaging machine for my application?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Choose based on your product, bag material and size, required production volume, closure type and level of automation. Armstrong can recommend a suitable machine based on these requirements."
    }
  }]
}
</script>

@include('layouts.frontfooter')

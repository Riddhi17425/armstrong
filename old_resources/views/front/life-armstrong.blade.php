@include('layouts.frontheader')

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="JavaScript:Void(0)">Careers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Life at Armstrong</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading mb-4">Life At Armstrong</h1>
            <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector" class="img-fluid setting-wrapper">
            <div class="col-lg-8 m-auto text-center">
                <p class="news-title">Where Passion And Innovation Drive Success</p>
                <p>Join a team where ambition drives action, collaboration sparks innovation, and every day brings the chance to create finishing solutions that shape the future of industry and create a powerful impact.
                </p>
            </div>
        </div>
    </div>   
</section>

<section class="mt-5">
    <div class="container">
        <div class="row gx-md-5">
            <div class="col-lg-7">

                <h2 class="main_head mb-md-5 mb-3">Work That Leads With A Culture That Inspires</h2>
                <p>At Armstrong, we are driven by purpose. From engineers to innovators, we turn ideas into innovative solutions that build the future of the industry. </p>
                <p>Working here is about turning bold ideas into action, collaborating with brilliant minds and creating finishing solutions that help the industry evolve.</p>
            </div>
            <div class="col-lg-5">
                <div>
                    <img class=" img-fluid" src="{{asset('public/front/img/our-culture.jpg')}}" alt="Work That Leads With A Culture That Inspires">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="how-it-works section-pt">
    <div class="container-fluid px-0">
        <div class="text-center mb-5">
            <h2 class="main_head head_wrapper">Beyond the machines</h2>
            <p class="text-center">Celebrating the people, moments, and milestones that power Armstrong every day.</p>
        </div>
        <div class="how-slider owl-carousel">
            @foreach($lifearmstrong as $item)
                <div class="slide-content">
                    <div class="image-circle">
                        <img src="{{asset('/'.$item->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($item->alt_tag, PATHINFO_FILENAME)) }}">
                    </div>
                    <div class="slide-text">
                        <h3>{{$item->title}}</h3>
                        <!--<p>{!! $item->description !!} </p>-->
                    </div>
                </div>
            @endforeach    
        </div>
       <!-- Custom Arrows -->
        <div class="custom_arrow">
            <img src="{{ asset('public/front/img/arrow_left.svg') }}" alt="Previous" class="img-fluid custom-prev">
            <img src="{{ asset('public/front/img/arrow_right.svg') }}" alt="Next" class="img-fluid custom-next">
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row gx-md-5">
            <div class="col-lg-7">

                <h2 class="main_head mb-md-5 mb-3">It's The Right Fit For You, If...</h2>
                <p>you're not up for a desk job...But you wish to learn, innovate and grow. If you thrive on challenges, care about quality, and want your work to matter, Armstrong is ready for you.</p>
                <p>Let's transform the future of industrial machinery, together!</p>
                <ul class="my-4">
                    <li>100+ quality testing checkpoints</li>
                    <li>High-impact global projects</li>
                    <li>Future-ready industry 4.0 integration</li>
                    <li>Transparent career growth with mentorship</li>
                    <li>Culture of innovation with trust & teamwork</li>
                </ul>
                <a class="sub_btn2" href="{{route('career')}}">
                    <span>View Job Details</span>
                    <svg class="ms-3" width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 14.3333L14.3333 1M14.3333 1H4.33333M14.3333 1V11" stroke="#E41E29"
                            stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-auto">
                <div>
                    <img class=" img-fluid" src="{{asset('public/front/img/perfect-fit-image.webp')}}" alt="life armstrong">
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.frontfooter')
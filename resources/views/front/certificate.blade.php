@include('layouts.frontheader', [
    'og_image' => asset('public/admin/certificate/e3539844-070b-4c8a-85ca-499a446b8723.png')
])
<style>
.fancybox__thumbs
{
 display:none;
}

</style>

<section class="breadcrumb_wrapper">
   <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="JavaScript:Void(0)"> About Us </a></li>
            <li class="breadcrumb-item active" aria-current="page">Certificates</li>
        </ol>
    </nav>
    <div class="setting_vector_icon">
        <h1 class="heading">Certifications</h1>
        <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
    </div>
    <div class="col-lg-10 m-auto text-center">
        <p>At Armstrong, certifications reflect more than compliance. 
        They showcase our commitment to global quality standards, reliability, and customer trust.
        Every certification reinforces our promise to deliver finishing solutions that excel in precision, safety, and long-term performance worldwide.</p>
    </div>
   </div>
</section>
<section class="section-pt">
    <div class="container">
        <div class="row g-4 g-xxl-5">
            @foreach($certificates as $certificate)
                <div class="col-sm-6 col-lg-4">
                    <div class="certi">
                        <a href="{{ asset('/'.$certificate->image) }}" data-fancybox="certificates">
                            <img class="img-fluid" src="{{ asset('/'.$certificate->image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($certificate->alt, PATHINFO_FILENAME)) }}">
                        </a>
                        <a href="{{ asset('/'.$certificate->image) }}" data-fancybox="certificates">
                            <img class="certi_plush" src="{{ asset('public/front/img/arrow_plush.svg') }}" alt="arrow plush">
                        </a>
                    </div>
                    <!--<div>-->
                    <!--    <h3 class="news-title mt-2 mt-lg-4">{{ ucfirst(strtolower($certificate->name))  }}</h3>-->
                    <!--</div>-->
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.frontfooter')

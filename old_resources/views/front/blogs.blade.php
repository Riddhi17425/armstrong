@include('layouts.frontheader', [
    'og_image' => asset('public/admin/blogs/woven-fabric-cutting-and-stitching-machine-features-benefits-6926e33c00768.png')
])

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
    </nav>
    <div class="setting_vector_icon">
        <h1 class="heading">Our Blogs</h1>
        <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
    </div>
    </div>
</section>
<section class="section-pt">
    <div class="container">
        <div class="row g-4 g-xxl-5">
            @foreach($blogs as $blog)
                <div class="col-sm-6 col-lg-4">
                    <div class="blogs_card">
                         <a href="{{ route('blogs.detail', $blog->url) }}"><img src="{{ asset('/'.$blog->front_image) }}" alt="{{ $blog->title }}" class="img-fluid"></a>
                        <div class="blogs_card_bt">
                        <p>{{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}</p>
                            <div class="blogs_content">
                                <a href="{{ route('blogs.detail', $blog->url) }}"><h3 class="blogs-title">
                                    {{ $blog->title }}
                                </h3>
                                </a>
                                <span> 
                                    <a class="arrow_circle" href="{{ route('blogs.detail', $blog->url) }}">
                                        <img src="{{ asset('public/front/img/arrow.png') }}" alt="arrow" class="img-fluid arrow_icon">
                                    </a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="section-pt">
    <div class="container">
        <div class=" help-card">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_head text-white mb-3">Need Help Finding the Right Machine?</h2>
                    <P class="help_card_subtext">Our experts are here to guide you with personalized solutions.</P>
                    <div class=" mt-5">
                        <a class="need-request"  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> Request a Quote • </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <img src="{{asset('public/front/img/fibca-iftex.svg')}}" alt="fibca iftex" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')

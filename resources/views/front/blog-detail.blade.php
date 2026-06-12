@include('layouts.frontheader', [
    'og_image' => asset($blog->detail_image)
])

    @if (!empty($blog->blog_faq) && count($blog->blog_faq) > 0)
        @php
    $faqSchemaEntities = [];

    foreach ($blog->blog_faq as $faq) {

        $question = trim($faq['faq_title'] ?? '');
        $answer = trim(strip_tags($faq['faq_description'] ?? ''));

        if ($question && $answer) {
            $faqSchemaEntities[] = [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ];
        }
    }
@endphp

            @if(!empty($faqSchemaEntities))
                <script type="application/ld+json">
                    {!! json_encode([
                        '@context' => 'https://schema.org',
                        '@type' => 'FAQPage',
                        'mainEntity' => $faqSchemaEntities,
                    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                </script>
            @endif
        @endif

<style>
    .blog_detail_wrapper h4{
            font-size:25px;
            font-weight:700;
        }
        .blog_detail_wrapper a{
            color:#e41e29;
        }
      /* Default Accordion Header Color */
.according_head {
    background: #fff7f8;   /* light blue */
    color: #003366;
    padding: 18px 22px;
    cursor: pointer;
    font-weight: 600;
    border-radius: 6px;
    margin-bottom: 5px;
    transition: 0.3s;
    position: relative;
}

/* On Hover */
.according_head:hover {
    background: #fff7f8;
}

/* When Accordion is Open (active) */
.according_head[aria-expanded="true"] {
    background: #e41e29;   /* dark blue */
    color: #ffffff;
}

/* Arrow Icon */
.according_head::after {
    content: "\25BC";
    position: absolute;
    right: 18px;
    font-size: 14px;
    transition: 0.3s;
}

/* Rotate Arrow When Open */
.according_head[aria-expanded="true"]::after {
    transform: rotate(180deg);
}

/* Accordion Body */
.accordion-collapse > div {
    padding: 15px 22px;
    background: #ffffff;
    /*border-left: 2px solid #003366;*/
    /*border-right: 2px solid #003366;*/
    /*border-bottom: 2px solid #003366;*/
    border-radius: 0 0 6px 6px;
}

.comparison-table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 20px;
  }

  .comparison-table thead {
    background: var(--red);
    color: #fff;
  }

  .comparison-table th,
  .comparison-table td {
    padding: 14px 16px;
    text-align: center;
  }

  .comparison-table th {
    font-size: 16px;
    letter-spacing: 0.5px;
  }

  .comparison-table tbody tr {
    border-bottom: 1px solid #eee;
    transition: 0.3s;
  }

  .comparison-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .comparison-table tbody tr:hover {
    background-color: #f1f7f1;
    transform: scale(1.01);
  }

  .comparison-table td:first-child {
    font-weight: bold;
    text-align: left;
    color: #333;
  }

  .highlight {
    color: #2E7D32;
    font-weight: bold;
  }

  .low {
    color: #d32f2f;
    font-weight: bold;
  }

</style>
<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('blog')}}">Blogs</a></li>
            {{-- <li class="breadcrumb-item active" aria-current="page">Certificates</li> --}}
        </ol>
    </nav>
    <div class="setting_vector_icon">
        <h1 class="heading">{{$blog->title}}</h1>
        <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
    </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="text-center my-5">
            <img src="{{asset('/'.$blog->detail_image)}}" alt="blog" class="img-fluid">
        </div>
        <div class="blog_detail_wrapper">
            <div class="row">
                <div class="col-lg-2">
                    <div class="blog_date">
                        <h2 class="hero-title">{{ \Carbon\Carbon::parse($blog->date)->format('d') }}</h2>
                        <h6>{{ strtoupper(\Carbon\Carbon::parse($blog->date)->format('F Y')) }}</h6>
                    </div>
                </div>
                <div class="col-lg-10">
                    <!--<h2 class="sub_head">{{$blog->title}}</h2>-->
                    <!--<p><Strong>Introduction</Strong></p>-->
                    <!--<p>{!! $blog->short_description !!}</p>-->

                    <p>{!! $blog->detail_description !!}</p>
                    @if(Request::is('blogs/pp-woven-bag-cutting-machines-for-bag-production'))
    <div class="row mb-4 text-center">
        <div class="col-md-12">
            <div class="video_card_top">
                <img src="https://www.armstrongex.com/public/admin/product/videos/images/1757588250_Armstrong%20BCS%20Machine.png"
                     alt="FIBC Fabric Cutting Machine"
                     class="img-fluid">

                <a href="https://www.youtube.com/watch?v=5DbR-6W3giU" data-fancybox="video-gallery">
                    <img class="play_btn"
                         src="https://www.armstrongex.com/public/front/img/play-btn.png"
                         alt="play">
                </a>
            </div>
        </div>
    </div>
@endif
                    @if(!empty($blog->cta_image))
                        <a href="{{ route('contact') }}">
                            <img src="{{ asset('/' . $blog->cta_image) }}" alt="cta" class="img-fluid mb-3">
                        </a>
                    @endif
                    {!! $blog->conclusion !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="accoding">
<div class="container">

        @if (!empty($blog->blog_faq) && count($blog->blog_faq) > 0)

<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-10">
<h4 class="text-center mb-5"><b>Frequently Asked Questions</b></h4>
<div id="accordionExample">

                        @foreach ($blog->blog_faq as $index => $faq)
<div class="mb-4">
<h5 class="according_head" 

                                    data-bs-toggle="collapse"

                                    data-bs-target="#collapse{{ $index }}"

                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"

                                    aria-controls="collapse{{ $index }}">

                                    {{ $faq['faq_title'] }}
</h5>
<div id="collapse{{ $index }}" 

                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"

                                    data-bs-parent="#accordionExample">
<div>

                                        {!! $faq['faq_description'] !!}
</div>
</div>
</div>

                        @endforeach
</div>
</div>
</div>

        @endif
</div>
</section>
<section class="section-mt">
    <div class="container">
        <div class="row justify-content-center my-lg-5">
            <div class="col-lg-8 text-center">
                <h2 class="main_head head_wrapper">Blogs You may also like</h2>
                <p>Explore more articles on innovation, engineering, and industry leadership.</p>
            </div>
        </div>
        <div class="blog_list_slider owl-theme owl-carousel">
            @foreach($blogs as $otherBlog)
                <div class="blogs_card">
                    <a href="{{ route('blogs.detail', $otherBlog->url) }}">
                        <img src="{{ asset('/'.$otherBlog->front_image) }}" alt="otherBlog" class="img-fluid">
                    </a>
                    <div class="blogs_card_bt">
                        <p>{{ \Carbon\Carbon::parse($otherBlog->date)->format('F j, Y') }}</p>
                        <div class="blogs_content">
                           <a href="{{ route('blogs.detail', $otherBlog->url) }}">
                                <h3 class="blogs-title">{{ $otherBlog->title }}</h3>
                           </a>
                            <span>
                                <a class="arrow_circle" href="{{ route('blogs.detail', $otherBlog->url) }}">
                                    <img src="{{ asset('public/front/img/arrow.png') }}" alt="arrow" class="img-fluid arrow_icon">
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Custom Navigation Buttons -->
        <div class="custom-nav">
            <div id="customPrev">                
                <a class="arrow_circle">
                    <img src="{{asset('public/front/img/arrow.png')}}" alt="arrow" class="img-fluid arrow_icon" style="transform: scaleX(-1);">
                </a> 
                Previous
            </div>
            <div id="customNext">
                 Next
                <a class="arrow_circle">
                    <img src="{{asset('public/front/img/arrow.png')}}" alt="arrow" class="img-fluid arrow_icon">
                </a>               
            </div>
        </div>
    </div>
</section>

 
@include('layouts.frontfooter')
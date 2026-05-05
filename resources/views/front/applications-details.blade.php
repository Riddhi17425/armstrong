@include('layouts.frontheader')


<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home </a></li>
                <li class="breadcrumb-item"><a href="{{url('/application')}}">Applications </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $applications->name }}</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading mb-4">{{ $applications->details_title }}</h1>
            {{-- short descriptions --}}
            {!! $applications->short_description !!}
            <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector"
                class="img-fluid setting-wrapper" style="top:10%">
        </div>
    </div>
</section>

<section class="section-pt">
    <div class="container">
        <div class="row gx-4 gx-xxl-5">
            <div class="col-lg-7">
                <svg width="60" height="60" viewBox="0 0 70 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M49.6154 54.2402C47.674 51.6969 45.8608 48.7849 44.1758 45.5043C42.4908 42.2237 41.6484 39.3486 41.6484 36.8789C41.6484 34.4093 42.3993 31.313 43.9011 27.5901C45.4396 23.8672 47.3077 20.4391 49.5055 17.306C51.7033 14.1729 53.956 11.2793 56.2637 8.62536C61.2088 2.87512 64.1758 0 65.1648 0C66.1538 0 67.1978 0.552908 68.2967 1.65872C69.4322 2.76454 70 3.79663 70 4.755C70 4.90245 68.6996 6.22942 66.0989 8.73594C58.1868 16.2186 54.2308 21.7661 54.2308 25.3785C54.2308 27.4426 55.4762 29.6543 57.967 32.0133C62.6923 36.584 65.0549 39.9568 65.0549 42.1316C65.0549 44.3063 64.3773 46.6101 63.022 49.0429C61.7033 51.4388 60.1465 53.5399 58.3517 55.346C56.5568 57.1154 55.1465 58 54.1209 58C53.0952 58 51.5934 56.7467 49.6154 54.2402ZM7.96703 54.2402C6.02564 51.6969 4.21245 48.7849 2.52747 45.5043C0.842491 42.2237 0 39.3486 0 36.8789C0 34.4093 0.750916 31.313 2.25275 27.5901C3.79121 23.8672 5.65934 20.4391 7.85714 17.306C10.0549 14.1729 12.3077 11.2793 14.6154 8.62536C19.5604 2.87512 22.5275 0 23.5165 0C24.5055 0 25.5495 0.552908 26.6484 1.65872C27.7839 2.76454 28.3516 3.79663 28.3516 4.755C28.3516 4.90245 27.0513 6.22942 24.4506 8.73594C16.5385 16.2186 12.5824 21.7661 12.5824 25.3785C12.5824 27.4426 13.8278 29.6543 16.3187 32.0133C21.044 36.584 23.4066 39.9568 23.4066 42.1316C23.4066 44.3063 22.7289 46.6101 21.3736 49.0429C20.0549 51.4388 18.4982 53.5399 16.7033 55.346C14.9084 57.1154 13.4982 58 12.4725 58C11.4469 58 9.94505 56.7467 7.96703 54.2402Z"
                        fill="#E41E29" />
                </svg>

                <h2 class="main_head d-block">How do we support you?</h2>
                {{-- top descriptions --}}
                {!! $applications->website_top_desc  !!}
            </div>
            @if($applications->website_top_image)
                <div class="col-lg-5">
                    <div>
                        <img class=" img-fluid" src="{{ asset($applications->website_top_image)}}" alt="image">
                    </div>

                </div>
            @endif
        </div>

    </div>
</section>

@if($products->isNotEmpty())
<section class="section-pt">
    <div class="container">

        <div class="text-center mb-3">
            <h2 class="main_head head_wrapper">Machines Used in Agricultural Packaging </h2>
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-mb-6 col-lg-4 mb-3 product_card">
                    <a href="{{ route('products.detail' , ['url' => $product->url]) }}">
                        <img src="{{ asset('public/admin/product/front_image/' .$product->front_image) }}" alt="images" class="img-fluid mb-4">
                        <h3 class="news-title pt-0">{{ $product->product_name }} </h3>
                    </a>
                    <div class="product-contant mt-0">
                        {{ \Illuminate\Support\Str::limit(strip_tags($product->product_short_desc), 150) }}
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>
@endif

<section class="section-pt">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-7">

                {{-- bottom desc --}}
                {!! $applications->website_bottom_desc !!}

            </div>
            @if($applications->website_bottom_image)
                <div class="col-lg-5">
                    <div>
                        <img class=" img-fluid" src="{{ asset($applications->website_bottom_image) }}" alt="images">
                    </div>

                </div>
            @endif
        </div>
    </div>
</section>



@if(!empty($faqs))
<section class="section-pt">
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="main_head head_wrapper">FAQs</h2>
            <p>Frequently asked questions</p>
        </div>

        <div class="accordion" id="accordionExample">

            @foreach($faqs as $index => $faq)

                <div class="mb-4">
                    <h5 class="according_head"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $index }}"
                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $index }}">

                        {{ $faq['title'] ?? '' }}
                    </h5>

                    <div id="collapse{{ $index }}"
                         class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                         data-bs-parent="#accordionExample">

                        <div>
                            {!! $faq['description'] ?? '' !!}
                        </div>

                    </div>
                </div>

            @endforeach

        </div>

    </div>
</section>
@endif

@if (!empty($faqs) && count($faqs) > 0)
        @php
            $faqSchemaEntities = [];

            foreach ($faqs as $faq) {

                $question = trim($faq['title'] ?? '');
                $answer = trim(strip_tags($faq['description'] ?? ''));

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


@include('layouts.frontfooter')
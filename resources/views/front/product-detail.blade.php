@include('layouts.frontheader', [
    'og_image' => asset($product->images->first()->image ?? '')
])

@if($product->url == 'bag-testing-machine')
 <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@type": "Product",
        "name": "Bag Testing Machine",
        "image": "https://www.armstrongex.com/public/admin/uploads/products/bag-testing-machine.png",
        "description": "Armstrong Bag Testing Machine tests strength and durability of HDPE and PP bags, with load capacities of 50Kgf, 100Kgf, 250Kgf, 250Kgf, and above.",
        "brand": {
            "@type": "Brand",
            "name": "Armstrong"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.6",
            "bestRating": "5",
            "worstRating": "3",
            "ratingCount": "25"
        }
    }
    </script>
@endif
<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb custom-breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('products.listing', $category_url->url) }}">Products</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$product->category->name}}</li>
           </ol>
        </nav>
        <div class="setting_vector_icon">
           <h1 class="heading">{{$product->product_name}}</h1>
           <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
    </div>    
</section>
<section class="section-pt">
   <div class="container">
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-7">
            @if($product->images->count() > 1)
            <div id="product_details" class="owl-carousel owl-theme">
                @foreach($product->images->skip(1) as $image)
                <div class="text-center">
                    <img src="{{ asset($image->image) }}" 
                         alt="product" 
                         class="img-fluid mb-2 product_card_details_img">
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center">
                <img src="{{ asset($product->images->first()->image ?? '') }}" 
                     alt="{{$product->product_name}}" 
                     class="img-fluid product_card_details_img">
            </div>
            @endif
        </div>
         <div class="col-md-5">
            @if(!empty($product->model_name))
            <p class="fw-bold">
               <span class="model_text">Model:</span> {{$product->model_name}}
            </p>

            @if($product->model_name == 'DN-2W' || $product->product_name == 'Twin Seam Bag Sewing Machine')
               <p class="fw-bold">
                     <span class="model_text">Available Models:</span> DN-2W, DN-2LW, DN-2HS, DN-2LHS
               </p>
            @endif
         @endif
            {!! $product->product_short_desc !!}
            
            <a class="request_btn" href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal2">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                  <!-- Your SVG paths -->
                  <path d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z" fill="white" />
                  <path d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z" fill="white" />
                  <path d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z" fill="white" />
                  <path d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z" fill="white" />
               </svg>
               <span class="old-text">Enquire Now</span>
               <span class="new-text">Enquire Now</span>
            </a>
         </div>
      </div>
   </div>
</section>

<section class="section-pt">
   <div class="container">
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-6">
            @if(!empty($usps) && is_array($usps) && count($usps) > 0)
                {{-- Sirf agar USPs available hain --}}
                <h2 class="main_head_48 head_wrapper mb-4">USPs</h2>
        
                @foreach($usps as $usp)
                    @php
                        $name = trim($usp['name'] ?? '');
                        $description = strip_tags($usp['description'] ?? '');
                        $description = trim($description);
                        $displayName = (substr($name, -1) === ':') ? $name : $name . ':';
                    @endphp
        
                    <p><b>{{ $displayName }}</b> {{ $description }}</p>
                @endforeach
        
            @elseif(!empty($product->product_desc))
                
                {!! $product->product_desc !!}
        
            @else
                <p>No details available.</p>
            @endif
        </div>

         @if ($product->video || $product->thumnail_image)
    <div class="col-md-6">
        <div class="video_card_top">
            @if($product->video_source == 'youtube' && $product->video)
                {{-- ✅ YouTube Video --}}
                <img src="{{ $product->thumnail_image 
                    ? asset('/' . $product->thumnail_image) 
                    : 'https://img.youtube.com/vi/' . \Illuminate\Support\Str::afterLast($product->video, 'v=') . '/hqdefault.jpg' }}" 
                    alt="{{ $product->product_name }}" 
                    class="img-fluid">
                <a href="{{ $product->video }}" data-fancybox="video-gallery">
                    <img class="play_btn" src="{{asset('public/front/img/play-btn.png')}}" alt="play">
                </a>

            @elseif($product->video_source == 'upload' && $product->video)
                {{-- ✅ Uploaded Video --}}
                <img src="{{ $product->thumnail_image 
                    ? asset('/' . $product->thumnail_image) 
                    : asset('default-thumbnail.jpg') }}" 
                    alt="{{ $product->product_name }}" 
                    class="img-fluid">
                <a href="{{ asset('/' . $product->video) }}" data-fancybox="video-gallery">
                    <img class="play_btn" src="{{asset('public/front/img/play-btn.png')}}" alt="play">
                </a>
            @else
                {{-- If no video exists, just show the image --}}
                <img src="{{ $product->thumnail_image 
                    ? asset('/' . $product->thumnail_image) 
                    : asset('default-thumbnail.jpg') }}" 
                    alt="{{ $product->product_name }}" 
                    class="img-fluid">
            @endif
        </div>
    </div>
@endif

   </div>
</section>
@if ($applications)
    <section class="how-it-works section-pt">
   <div class="container px-0">
      <div class="text-center">
         <h2 class="main_head_48 head_wrapper">Applications</h2>
      </div>
      <p class="text-center">
            {!! !empty($product->product_app_desc) 
                ? $product->product_app_desc 
                : 'Our Process: From Idea to Installation' !!}
        </p>
      <div class="how-slider owl-carousel">
         @foreach($applications as $application)
            <div class="slide-content">
               <div class="image-circle">
                  <img src="{{ asset('/' . $application->application_image) }}" 
                     alt="{{  str_replace(['-', '_'],' ', pathinfo($application->alt, PATHINFO_FILENAME)) }}">
               </div>
               <div class="slide-text">
                  <h3>{{ $application->name }}</h3>
                  <p>{{ $application->description }}</p>
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
@endif

   @php
    $hasSpecifications = $specifications && is_array($specifications) && count($specifications) > 0;
    $hasTechDesc = !empty($product->product_tech_desc);
@endphp

@if($hasSpecifications || $hasTechDesc)
    <section class="section-pt">
        <div class="container">
            <div class="text-center">
                <h2 class="main_head_48 head_wrapper">Technical Specifications</h2>
            </div>

            @if($hasSpecifications)
                @php
                    $count = count($specifications);
                    $half = ceil($count / 2);
                @endphp

                <div class="row mt-5 gx-md-5">
                    @if($count > 10)
                        <!-- 2 Column Tables -->
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="table-responsive rounded-3 overflow-hidden">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Parameter</th>
                                            <th scope="col">Specification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(array_slice($specifications, 0, $half) as $spec)
                                            <tr>
                                                <td>{{ $spec['name'] ?? '' }}</td>
                                                <td>{!! $spec['description'] ?? '' !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive rounded-3 overflow-hidden">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Parameter</th>
                                            <th scope="col">Specification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(array_slice($specifications, $half) as $spec)
                                            <tr>
                                                <td>{{ $spec['name'] ?? '' }}</td>
                                                <td>{!! $spec['description'] ?? '' !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <!-- Single Full Width Table -->
                        <div class="col-md-12">
                            <div class="table-responsive rounded-3 overflow-hidden">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Parameter</th>
                                            <th scope="col">Specification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($specifications as $spec)
                                            <tr>
                                                <td>{{ $spec['name'] ?? '' }}</td>
                                                <td>{!! $spec['description'] ?? '' !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Table ke baad description dikhao agar hai -->
                @if($hasTechDesc)
                    <div class="mt-5 text-center">
                        {!! $product->product_tech_desc !!}
                    </div>
                @endif

            @elseif($hasTechDesc)
                <!-- Sirf description hai (specifications nahi) -->
                <div class="mt-5 text-center">
                    {!! $product->product_tech_desc !!}
                </div>
            @endif
        </div>
    </section>
@endif
   
   
 
@if($keyFeature?->description && trim(strip_tags($keyFeature->description)) !== '')
<section class="section-mt">
    <div class="container">
        <h3 class="main_head_48 head_wrapper mb-4">
            {{ $keyFeature->title ?? 'Key Features' }}
        </h3>
        {!! $keyFeature->description !!}
    </div>
</section>
@endif

@if($faqs && $faqs->isNotEmpty())
<section class="accoding section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-center">
                    <h4 class="main_head_48 head_wrapper mb-4">
                        FAQs – {{ $product->product_name }}
                    </h4>
                </div>

                <div id="accordionExample">
                    @foreach($faqs as $key => $faq)
                        <div class="mb-4">
                            <h5 class="according_head {{ $key == 0 ? '' : 'collapsed' }}"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $key }}"
                                aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $key }}">
                                {{ $faq->question }}
                            </h5>

                            <div id="collapse{{ $key }}"
                                 class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                 data-bs-parent="#accordionExample">
                                <div>
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endif

 <?php
    $releted_count = $relatedProducts->count();
  ?>
@if($releted_count != 0)
    <section class="section-mt">
    <div class="container">
        <div class="row justify-content-center my-lg-5">
            <div class="col-lg-8 ">
                <h2 class="main_head_48 head_wrapper">Related Machines You May Like</h2>
                <p>Engineered for high-performance lamination, cutting, and recycling in heavy-duty tarpaulin production.</p>
            </div>
            <div class="col-lg-4">
                @if($releted_count >= 3)
                <div class="custom_arrow justify-content-md-end">
                    <img src="{{ asset('public/front/img/arrow_left.svg') }}" alt="Previous" id="productprev" class="img-fluid product-prev">
                    <img src="{{ asset('public/front/img/arrow_right.svg') }}" alt="Next" id="productnext" class="img-fluid product-next">
                </div>
                @endif
             </div>
        </div>
         <div class="{{ $releted_count >= 3 ? 'product_list_slider owl-theme owl-carousel' : 'row row-cols-md-6 row-cols-lg-3' }} mt-3 mt-md-0">
            @foreach($relatedProducts as $relatedProduct)
               <div class="product_card">
                     <a href="{{ route('products.detail', $relatedProduct->url) }}">
                        <img src="{{ asset('public/admin/product/front_image/'.$relatedProduct->front_image) }}" 
                             alt="{{ str_replace(['-', '_'],' ', pathinfo($relatedProduct->front_image, PATHINFO_FILENAME)) }}" 
                             class="img-fluid product_card_img">
                     </a>
                     <div class="product-contant">
                        <a href="{{ route('products.detail', $relatedProduct->url) }}">
                           <h3 class="news-title">{{ $relatedProduct->product_name }}</h3>
                        </a>
                        <span>
                           <a class="arrow_circle" href="{{ route('products.detail', $relatedProduct->url) }}">
                                 <img src="{{ asset('public/front/img/arrow.png') }}" alt="arrow" class="img-fluid arrow_icon">
                           </a>
                        </span>
                     </div>
               </div>
            @endforeach
         </div>

    </div>
</section>
@endif



@include('layouts.frontfooter')
@php
    

    if($products->isNotEmpty()) {
        $first = $products->first();

        // Get images from front_image JSON or fallback relationship
        $images = [];

        if(!empty($first->front_image)) {
            $decoded = json_decode($first->front_image, true);
            if(is_array($decoded)) {
                $images = $decoded;
            } else {
                $images = [$first->front_image];
            }
        } elseif($first->images->isNotEmpty()) {
            $images = $first->images->pluck('image')->toArray();
        }

        if(!empty($images)) {
            $ogImage = asset('public/admin/product/front_image/' . $images[0]);
        }
    }
@endphp
@include('layouts.frontheader', [
    'og_image' => $ogImage
])

@php
    
    $listing_desc = $category->listing_desc ?? '';            
    $detail_description = $category->detail_description ?? ''; 
@endphp

<style>
    .ym_card.product_card .product-contant{
        background-color: #E41E29;
            border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    }
</style>

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="Javascript:Void(0)">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading">{{ $category->name }}
             @if($category->name == 'Mulch Film Punching' || $category->name == 'Needle Loom')
                                                            Machine
                                                        @elseif($category->name=='Spare Parts')
                                                        
                                                        @else
                                                            Machines
                                                        @endif
            </h1>
           @if(!empty(trim($listing_desc)))
                <div class="listing-desc mt-3 col-lg-10 m-auto text-center">
                    {!! $listing_desc !!}
            
                    
                    @if(request()->is('*bag-closing-machine'))
                    <div class="mt-4">
                        <a class="request_btn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 31" fill="none">
                                <!-- Your SVG paths -->
                                <path d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z" fill="white" />
                                <path d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z" fill="white" />
                                <path d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z" fill="white" />
                                <path d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z" fill="white"/>
                            </svg>
                            <span class="old-text">Request a Quote</span>
                            <span class="new-text">Request a Quote</span>
                        </a>
                    </div>
                    @endif
                </div>
            @endif

            
            <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
    </div>
    <!-- Search Button -->
<div class="search_button"data-bs-toggle="modal" data-bs-target="#SearchModal">
    <i class="fas fa-search"></i>
</div>
<!-- Search Modal -->
<!-- Modal -->
<div class="modal SearchModalbox fade" id="SearchModal" tabindex="-1" aria-labelledby="SearchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class=" Searchbody">
            <div class="search_box position-relative">
          <input type="text" id="searchInput" class="form-control ps-5" placeholder="Search...">
          <i class="fas fa-search position-absolute" style="top: 50%; left: 15px; transform: translateY(-50%); color: #888;"></i>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="search_suggestions" id="searchSuggestions"></div>
      </div>
    </div>
  </div>
</div>

</section>

<section class="section-pt">
    <div class="container">
        <div class="row">

            @forelse($products as $product)
                @php
                    $images = [];

                    // Decode front_image if it's JSON array
                    if(!empty($product->front_image)) {
                        $decoded = json_decode($product->front_image, true);
                        if(is_array($decoded)) {
                            $images = $decoded; // multiple images
                        } else {
                            $images = [$product->front_image]; // single image
                        }
                    }
                    // Fallback to related images if front_image is empty
                    elseif($product->images->isNotEmpty()) {
                        $images = $product->images->pluck('image')->toArray();
                    }
                @endphp

                <div class="col-mb-6 col-lg-4 mb-4 product_card">

                    @if(count($images) > 1)
                        {{-- Multiple images: slider (no link) --}}
                        <div class="spare_par_slider owl-carousel owl-theme  product_card_img overflow-hidden">
                            @foreach($images as $img)
                                <img src="{{ asset('public/admin/product/front_image/' . $img) }}"
                                     alt="{{ str_replace(['-', '_'],' ', pathinfo($img, PATHINFO_FILENAME)) }}"
                                     class="img-fluid  mb-2">
                            @endforeach
                        </div>

                    @elseif(count($images) === 1)
                        {{-- Single image (clickable) --}}
                        <a href="{{ route('products.detail', $product->url) }}">
                            <img src="{{ asset('public/admin/product/front_image/' . $images[0]) }}"
                                 alt="{{ str_replace(['-', '_'],' ', pathinfo($images[0], PATHINFO_FILENAME)) }}"
                                 class="img-fluid product_card_img">
                        </a>

                    @else
                        {{-- No image (clickable) --}}
                        <a href="{{ route('products.detail', $product->url) }}">
                            <img src="{{ asset('public/front/img/no-image.png') }}"
                                 alt="{{ $product->product_name }}"
                                 class="img-fluid product_card_img">
                        </a>
                    @endif

                    {{-- ✅ Product content --}}

                    <!------------------->
                    
                    <div class="product-contant">
                        @if(count($images) > 1)
                            {{-- Multiple images → no link --}}
                          
                                <h3 class="news-title">{{ $product->product_name }}</h3>
                           
                        @else
                            {{-- Single / no image → linked --}}
                            <a href="{{ route('products.detail', $product->url) }}">
                                <h3 class="news-title">{{ $product->product_name }}</h3>
                            </a>
                        @endif

                        <span>
                            @if(count($images) > 1)
                                {{-- No link --}}
                                 <a class="request_btn px-3 py-1" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-product="{{ $product->product_name }}">
                                <span>Enquire Now</span>
                            </a>
                            @else
                                {{-- Linked --}}
                                <a class="arrow_circle" href="{{ route('products.detail', $product->url) }}">
                                    <img src="{{ asset('public/front/img/arrow.png') }}" 
                                         alt="arrow" 
                                         class="img-fluid arrow_icon">
                                </a>
                            @endif
                        </span>
                        
                    </div>
                    
                    <!---------------->

                </div>
            @empty
                <p class="text-center">No products found in this category.</p>
            @endforelse
            <!--@if($category->name == 'Sewing')-->
            <!--<div class="col-mb-6 col-lg-4 mb-4 product_card">-->
    
            <!--    <div class="product_card_img position-relative overflow-hidden">-->
            <!--        <a href="https://www.youtube.com/watch?v=KPL5ACWmJNw" target="_blank">-->
        
            <!--            <img src="{{ asset('public/front/img/sewing-machine-video.png') }}"-->
            <!--                 class="img-fluid w-100"-->
            <!--                 alt="Armstrong Sewing Machine Manufacturing Plant">-->
        
            <!--            <div class="play_btn">-->
            <!--                <i class="fas fa-play"></i>-->
            <!--            </div>-->
        
            <!--        </a>-->
            <!--    </div>-->
        
            <!--    <div class="product-contant bg-danger text-white p-3">-->
            <!--        <h3 class="news-title text-white">-->
            <!--            ARMSTRONG SEWING | STITCHING MACHINE MANUFACTURING PLANT |-->
            <!--            IN-HOUSE SPARES PRODUCTION FACILITY TOUR LINE-->
            <!--        </h3>-->
            <!--    </div>-->
    
            <!--</div>-->
            <!--@endif-->
            @if($category->name == 'Sewing')
                 <div class="col-mb-6 col-lg-4 mb-4 product_card ym_card">
                
                            <div class="product_card_img position-relative overflow-hidden video_card_top h-100">
                                <a href="https://www.youtube.com/watch?v=KPL5ACWmJNw" target="_blank">
                    
                                    <img src="{{ asset('public/front/img/sewing-machine-video.png') }}"
                                         class="img-fluid w-100 h-100"
                                         alt="Armstrong Sewing Machine Manufacturing Plant">
                    
                                    <img class="play_btn" src="https://www.armstrongex.com/public/front/img/play-btn.png" alt="play">
                    
                                </a>
                            </div>
                    
                            <div class="product-contant text-white p-3 mt-0 d-none">
                                <h3 class="news-title text-white m-0 pt-0">
                                     Armstrong Sewing | Stitching Machine Manufacturing Plant | In-House Spares Production Facility Tour Line
                                </h3>
                            </div>
                
                        </div>
            @endif
        </div>
    </div>
</section>

@if(!empty(trim($detail_description)))
<section class="section-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto listing-desc-bottom">
                {!! $detail_description !!}
            </div>
        </div>
    </div>
</section>
@endif

@php
    $faqs = [];

    if (isset($category->faqs)) {
        if (is_array($category->faqs)) {
            $faqs = $category->faqs;
        } elseif (is_string($category->faqs)) {
            $decoded = json_decode($category->faqs, true);
            $faqs = is_array($decoded) ? $decoded : [];
        }
    }
@endphp
@if(!empty($faqs))
<section class="accoding section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="text-center">
                    <h4 class="main_head_48 head_wrapper mb-4">
                        FAQs – {{ $category->name }} Machine
                    </h4>
                </div>

                <div id="accordionExample">

                    @foreach($faqs as $key => $faq)
                        <div class="mb-4">

                            <h5
                                class="according_head {{ $key != 0 ? 'collapsed' : '' }}"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $key }}"
                                aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $key }}"
                            >
                                {{ $faq['question'] ?? '' }}
                            </h5>

                            <div
                                id="collapse{{ $key }}"
                                class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                data-bs-parent="#accordionExample"
                            >
                                <div>
                                    {!! $faq['answer'] ?? '' !!}
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




<section class="section-pt">
    <div class="container">
        <div class="help-card">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_head text-white mb-3">Need Help Finding the Right Machine?</h2>
                    <p class="help_card_subtext">Our experts are here to guide you with personalized solutions.</p>
                    <div class="mt-5">
                        <a class="need-request" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Request a Quote • </a>
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
<script>
    window.PRODUCTS = @json($productsForJs);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const suggestionsBox = document.getElementById('searchSuggestions');

    let ajaxTimer;

    $(document).on('keyup', '#searchInput', function () {
    //searchInput.addEventListener('keyup', function () {
        const query = this.value.trim();

        clearTimeout(ajaxTimer);

        if (query.length < 3) {
            suggestionsBox.innerHTML = '';
            return;
        }

        // Small delay (debounce) before request
        ajaxTimer = setTimeout(() => {
            fetch(`{{ route('products.search') }}?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(products => {
                    if (products.length === 0) {
                        suggestionsBox.innerHTML = '<p>No matching products found.</p>';
                        return;
                    }

                    suggestionsBox.innerHTML = products.map(product => `
                        <div class="suggestion-item d-flex align-items-center mb-2" style="cursor:pointer;" onclick="window.location.href='${product.url}'">
                            <img src="${product.image}" alt="${product.name}" style="width:40px; height:40px; object-fit:cover; margin-right:10px;">
                            <span>${product.name}</span>
                        </div>
                    `).join('');
                })
                .catch(err => {
                    console.error(err);
                    suggestionsBox.innerHTML = '<p>Error fetching products.</p>';    
                });
        }, 300); // debounce 300ms
    });
});
</script>
<script>
    
</script>

<style>
        .section-pt {
        padding-top: 60px;
    }
</style>


@include('layouts.frontfooter')

@php

    if($products->isNotEmpty()) {

        $firstProduct = $products->first();
        $images = [];
        if(!empty($firstProduct->front_image)) {
            $decoded = json_decode($firstProduct->front_image, true);
            $images = is_array($decoded) ? $decoded : [$firstProduct->front_image];
        }
        elseif($firstProduct->images->isNotEmpty()) {
            $images = $firstProduct->images->pluck('image')->toArray();
        }
        if(!empty($images)) {
            $ogImage = asset('public/admin/product/front_image/' . $images[0]);
        }
    }

@endphp

@include('layouts.frontheader')


<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="Javascript:Void(0)">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading">{{ $title }}</h1>
            <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
    </div>

    <!-- Search Button -->
    <div class="search_button" data-bs-toggle="modal" data-bs-target="#SearchModal">
        <i class="fas fa-search"></i>
    </div>
  
    <!-- Search Modal -->
    <div class="modal SearchModalbox fade" id="SearchModal" tabindex="-1" aria-labelledby="SearchModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body">
            <div class="Searchbody">
                <div class="search_box position-relative">
                    <input type="text" id="searchInput" class="form-control ps-5" placeholder="Search...">
                    <i class="fas fa-search position-absolute" 
                       style="top: 50%; left: 15px; transform: translateY(-50%); color: #888;"></i>
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
                    // Initialize images array
                    $images = [];

                    // If front_image is JSON array
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
                        {{-- Multiple images slider --}}
                        <div class="spare_par_slider owl-carousel owl-theme product_card_img overflow-hidden">
                            @foreach($images as $img)
                                    <img src="{{ asset('public/admin/product/front_image/' . $img) }}"
                                         alt="{{ $product->product_name }}"
                                         class="img-fluid">
                            @endforeach
                        </div>
                      

                    @else
                        {{-- Single image --}}
                        <a href="{{ route('products.detail', $product->url) }}">
                            <img src="{{ asset('public/admin/product/front_image/' . $images[0]) }}"
                                 alt="{{ $product->product_name }}"
                                 class="img-fluid product_card_img">
                        </a>
                    @endif
                    @if(count($images) == 1)
                        <div class="product-contant">
                            <a href="{{ route('products.detail', $product->url) }}">
                                <h3 class="news-title">{{ $product->product_name }}</h3>
                            </a>
                            <span>
                                <a class="arrow_circle" href="{{ route('products.detail', $product->url) }}">
                                    <img src="{{ asset('public/front/img/arrow.png') }}"
                                        alt="arrow"
                                        class="img-fluid arrow_icon">
                                </a>
                            </span>
                        </div>
                        @else
                        <div class="product-contant">
                            <h3 class="news-title">{{ $product->product_name }}</h3>
                            <a class="request_btn px-3 py-1" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-product="{{ $product->product_name }}">
                                <span>Enquire Now</span>
                            </a>
                        </div>
                    @endif  
                </div>
            @empty
                <p class="text-center">No products found in {{ $title }}.</p>
            @endforelse
        </div>
    </div>
</section>
<section class="section-pt">
    <div class="container">
        <div class="help-card">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_head text-white mb-3">Need Help Finding the Right Machine?</h2>
                    <p class="help_card_subtext">Our experts are here to guide you with personalized solutions.</p>
                    <div class="mt-5">
                        <a class="need-request" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Request a Quote •
                        </a>
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
<script>
    var modal = document.getElementById('exampleModal2');
 
    modal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        var productName = button.getAttribute('data-product');
 
        // Update the modal input field
        var input = modal.querySelector('#t_product');
        input.value = productName;
    });
</script>
@include('layouts.frontheader')
<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="Javascript:Void(0)">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">  Product Categories</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading">Product Categories</h1>
            <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
    </div>
</section>
<section class="section-pt">
    <div class="container">
         <div class="row gy-4">
            @foreach($category as $index => $cat)
                <div class="col-md-12">
                    <div class="product_list_card overflow-hidden">
                        <div class="row align-items-center">
                            @if($index % 2 == 0)
                                <!-- Image on left for even index -->
                                <div class="col-md-7">
                                    <img src="{{ asset('public/admin/productcategory/listing/'.$cat->category_listing_image) }}" alt="{{ $cat->name }}" class="img-fluid">
                                </div>
                                <div class="col-md-5 my-4 my-md-0">
                                    <div class="listitem">
                                        <h2 class="sub_head mb-3">{{ $cat->name }} 
                                         @if($cat->name == 'Mulch Film Punching' || $cat->name == 'Needle Loom')
                                                            Machine
                                                        @else
                                                            Machines
                                                        @endif
                                        </h2>
                                        <p>{{ $cat->description }}</p>
                                        <div>
                                            <a class="sub_btn2" href="{{ route('products.listing', $cat->url) }}">
                                                <span>View Products</span>
                                                <svg class="ms-3" width="15" height="15" viewBox="0 0 15 15">
                                                    <path d="M1 14.3333L14.3333 1M14.3333 1H4.33333M14.3333 1V11" stroke="#E41E29" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Image on right for odd index -->
                                <div class="col-md-5 order-2 order-md-1 my-4 my-md-0">
                                    <div class="listitem">
                                        <h2 class="sub_head mb-3">{{ $cat->name }} 
                                         @if($cat->name == 'Mulch Film Punching' || $cat->name == 'Needle Loom')
                                                            Machine
                                                        @else
                                                            Machines
                                                        @endif
                                        </h2>
                                        <p>{{ $cat->description }}</p>
                                        <div>
                                            <a class="sub_btn2" href="{{ route('products.listing', $cat->url) }}">
                                                <span>View Products</span>
                                                <svg class="ms-3" width="15" height="15" viewBox="0 0 15 15">
                                                    <path d="M1 14.3333L14.3333 1M14.3333 1H4.33333M14.3333 1V11" stroke="#E41E29" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 order-1 order-md-2">
                                    <img src="{{ asset('public/admin/productcategory/listing/'.$cat->category_listing_image) }}" alt="{{ $cat->name }}" class="img-fluid">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
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
@include('layouts.frontfooter')

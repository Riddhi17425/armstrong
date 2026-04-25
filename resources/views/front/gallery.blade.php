    @include('layouts.frontheader')

    <section class="breadcrumb_wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb custom-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="Javascript:void(0)">Media</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
            </nav>
            <div class="setting_vector_icon">
                <h1 class="heading">Glimpses</h1>
                <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector" class="img-fluid setting-wrapper">
            </div>
        </div>
    </section>

    <section class="section-mt"> 
        <div class="container">   
            <div class="container">
               
                <div class="modern-tabs">
                    <ul class="nav nav-tabs" id="filledTabs" role="tablist">
                        {{-- Static All Tab --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" 
                                id="all-tab" 
                                data-bs-toggle="tab" 
                                data-id="all" 
                                data-bs-target="#all" 
                                type="button" 
                                role="tab" 
                                aria-selected="true">
                                All
                            </button>
                        </li>

                        {{-- Dynamic Tabs --}}
                        @foreach($gallery_types as $type)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" 
                                    id="tab-{{ $type->id }}"
                                    data-bs-toggle="tab"
                                    data-id="{{ $type->id }}"
                                    data-bs-target="#tab-content-{{ $type->id }}"
                                    type="button" 
                                    role="tab" 
                                    aria-selected="false">
                                    {{ $type->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="filledTabsContent">
                        {{-- All Tab Content --}}
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="row gy-4 g-lg-5 gallery-container">
                                @foreach ($gallery as $item)
                                    <div class="col-lg-6 gallery-item" data-type-id="{{ $item->gallery_type_id }}">
                                        <a data-fancybox="Gallery" href="{{ asset('/' . $item->image) }}">
                                            <img src="{{ asset('/' . $item->image) }}" alt="gallery" class="img-fluid">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Dynamic Tab Content (empty at start, images filtered by JS) --}}
                        @foreach($gallery_types as $type)
                            <div class="tab-pane fade" 
                                id="tab-content-{{ $type->id }}" 
                                role="tabpanel" 
                                aria-labelledby="tab-{{ $type->id }}">
                                <div class="row gy-4 g-lg-5 gallery-container">
                                    {{-- Images will be shown here dynamically --}}
                                    @foreach ($gallery as $item)
                                        @if ($item->types == $type->id)
                                            <div class="col-lg-6 gallery-item" data-type-id="{{ $item->types }}">
                                                <a data-fancybox="Gallery" href="{{ asset('/' . $item->image) }}">
                                                    <img src="{{ asset('/' . $item->image) }}" alt="gallery" class="img-fluid">
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll(".modern-tabs .nav-link").forEach((tab) => {
  tab.addEventListener("click", function () {
    let parent = this.closest(".nav"); // ul.nav
    let parentWidth = parent.offsetWidth;
    let scrollPos = this.offsetLeft - parentWidth / 2 + this.offsetWidth / 2;

    parent.scrollTo({
      left: scrollPos,
      behavior: "smooth"
    });
  });
});

    </script>

    <script>
        


        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.nav-link');

            tabs.forEach(tab => {
                tab.addEventListener('shown.bs.tab', function (e) {
                    const typeId = e.target.getAttribute('data-id');

                    // Find the active tab content container
                    const activePaneId = e.target.getAttribute('data-bs-target');
                    const activePane = document.querySelector(activePaneId);

                    if (!activePane) return;

                    // Get all images in that container
                    const galleryItems = activePane.querySelectorAll('.gallery-item');

                    galleryItems.forEach(item => {
                        const itemTypeId = item.getAttribute('data-type-id');

                        if (typeId === 'all' || itemTypeId === typeId) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Trigger All tab filtering on first load
            const initialTab = document.querySelector('.nav-link.active');
            if (initialTab) {
                initialTab.dispatchEvent(new Event('shown.bs.tab'));
            }
        });

    </script>

    @include('layouts.frontfooter')
@include('layouts.frontheader')

<section class="breadcrumb_wrapper">
   <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="Javascript:void(0)">Media</a></li>
                <li class="breadcrumb-item active" aria-current="page">Videos</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading mb-4">Videos</h1>
            <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector" class="img-fluid setting-wrapper">
            <div class="col-lg-8 m-auto text-center">
                <!-- <p class="news-title">Driving Innovation in Industrial Machinery Since 1982</p> -->
                <p>Discover Armstrong in action through our videos, showcasing advanced finishing solutions, precision engineering, and customer-focused innovation. Experience how our machines reduce labor, boost efficiency, and redefine global packaging standards, all captured in motion.</p>
            </div>
        </div>

   </div>
</section class="mt-80">
<!-- Video Listing Section -->
<section class="mt-5" id="videoList">
    <div class="container">
      
        <div class="modern-tabs" id="categoryTabs">
             <ul class="nav nav-tabs scroll-tabs">
                @foreach ($product_category as $product_category_button)
                @if($product_category_button->name != 'Spare Parts' && $product_category_button->name != 'Circular Loom')
                    <li>
                        <button class="nav-link {{ request('category') == $product_category_button->id ? 'active' : '' }}" 
                                data-id="{{ $product_category_button->id }}">
                            {{ $product_category_button->name }}
                        </button>
                    </li>
                    @endif
                @endforeach
                 
             </ul>
        </div>

        <div class="row gy-3 gy-lg-0 g-lg-5" id="videosContent">
            <p>Select a category to see products/videos.</p>
        </div>
        
    </div>
</section>

 
<section class="mt-80">
    @php
        $bannerVideo = $videos->firstWhere('is_banner', 1);
    @endphp 

    @if($bannerVideo)
        <div class="video_card_top text-center">
            @if($bannerVideo->video_source == 'youtube')
                {{-- ✅ YouTube Banner Video --}}
                <a href="{{ $bannerVideo->video }}" data-fancybox data-width="100%" data-height="100%">
                    <img class="img-fluid rounde-3" 
                         src="{{ $bannerVideo->thumnail_image 
                                ? asset('/' . $bannerVideo->thumnail_image) 
                                : 'https://img.youtube.com/vi/' . \Illuminate\Support\Str::afterLast($bannerVideo->video, 'v=') . '/hqdefault.jpg' }}" 
                         alt="{{ $bannerVideo->title }}">
                </a> 
            @elseif($bannerVideo->video_source == 'upload')
                {{-- ✅ Uploaded Banner Video --}}
                <a href="{{ asset('/' . $bannerVideo->video) }}" data-fancybox data-width="100%" data-height="100%">
                    <img class="img-fluid" 
                         src="{{ $bannerVideo->thumnail_image 
                                ? asset('/' . $bannerVideo->thumnail_image) 
                                : asset('default-thumbnail.jpg') }}" 
                         alt="{{ $bannerVideo->video_title }}">
                </a>
            @endif
        </div>
    @else
        {{-- ✅ Fallback if no banner video exists --}}
        <a href="https://youtu.be/k9iQnI9c1OQ?si=x3hIQiclIYi-10Ri" data-fancybox data-width="100%" data-height="100%">
            <img class="img-fluid" src="{{ asset('public/front/img/video_2.png') }}" alt="video">
        </a>
    @endif
</section>

<section class="mt-80" id="moreVideosList">
    <div class="container">
        <div class="row gy-3 gy-lg-0 g-lg-5" id="moreVideosContent">
            <!-- More videos will be loaded here via AJAX -->
        </div>
    </div>
</section>

@include('layouts.frontfooter')

<script>


    window.APP_URLS = {
        videolist: "{{ route('filter-videos', ['category' => 'CATEGORY_ID_PLACEHOLDER']) }}",
        productDetail: "{{ Route::has('products.detail') ? route('products.detail', ':url') : '' }}",
        categoryProducts: "{{ Route::has('category.products') ? route('category.products', ':id') : '' }}",
        image_path: "{{ asset('/') }}",
    };


</script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('#categoryTabs .nav-link');
    const videosContent = document.getElementById('videosContent');
    const moreVideosContent = document.getElementById('moreVideosContent');

    if (tabs.length === 0) return;

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const categoryId = this.getAttribute('data-id');
            var url = window.APP_URLS.videolist.replace('CATEGORY_ID_PLACEHOLDER', categoryId);

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        videosContent.innerHTML = '';
                        moreVideosContent.innerHTML = '';

                        if (data.data.videos.length === 0) {
                            videosContent.innerHTML = '<p>No videos found for this category.</p>';
                        } else {
                            // Split videos: first 4 and the rest
                            const firstVideos = data.data.videos.slice(0, 4);
                            const moreVideos = data.data.videos.slice(4);

                            // Render first 4 videos
                            firstVideos.forEach(video => {
                                const videoHtml = generateVideoHtml(video);
                                videosContent.insertAdjacentHTML('beforeend', videoHtml);
                            });

                            // Render remaining videos
                            moreVideos.forEach(video => {
                                const videoHtml = generateVideoHtml(video);
                                moreVideosContent.insertAdjacentHTML('beforeend', videoHtml);
                            });
                        }
                    } else {
                        videosContent.innerHTML = '<p>Error loading videos.</p>';
                        moreVideosContent.innerHTML = '';
                    }
                })
                .catch(err => {
                    console.error(err);
                    videosContent.innerHTML = '<p>Something went wrong.</p>';
                    moreVideosContent.innerHTML = '';
                });
        });
    });

    // Trigger click on first tab by default
    tabs[0].click();
});

// Helper function to generate video HTML
function generateVideoHtml(video) {
    return `
        <div class="col-lg-6">
            <div class="video_card">
                <div class="video_card_top">
                    ${video.video_source === 'youtube' ? `
                    <img class="img-fluid rounded-3"
                        src="${video.thumbnail}" alt="${video.title}">
                    <a href="${video.video_url}" data-fancybox data-width="100%" data-height="100%">
                        <img class="play_btn" src="{{ asset('public/front/img/play-btn.png') }}" alt="play">
                    </a>` : `
                    <a href="${video.video_url}" data-fancybox data-width="100%" data-height="100%">
                        <img class="img-fluid" src="${video.thumbnail}" alt="${video.title}">
                    </a>`}
                </div>
            </div>
        </div>`;
}


</script>

@include('layouts.frontheader', [
    'og_image' => asset('public/front/img/transform-your-vision-to-reality.png')
])


<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="Javascript:void(0)">Careers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Open Positions</li>
        </ol>
    </nav>
    <div class="setting_vector_icon">
        <h1 class="heading mb-4">Job Openings</h1>
        <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector" class="img-fluid setting-wrapper">
        <div class="col-lg-8 m-auto text-center">
            <p class="news-title">Build to Transform. Innovate With Armstrong</p>
            <p>At Armstrong, we don’t just build machines; we create solutions that transform the industrial machinery industry. Every role, from engineering to operations thrives on innovation, accuracy, and purpose. Explore careers where your work truly matters.</p>
        </div>
    </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-7">

                <h2 class="main_head mb-md-3 mb-xxl-5 mb-3">Transform Your Vision To Reality. Start Your Journey</h2>
                <p> Armstrong is more than just a workplace! It's a platform for bold ideas, career growth, and making a difference in the industry. Collaborate, innovate, and lead in building cutting-edge, innovative, and power-packed finishing solutions to create an impact.</p>
            </div>
            <div class="col-lg-5">
                <div>
                    <img class=" img-fluid" src="{{asset('public/front/img/transform-your-vision-to-reality.png')}}" alt="transform your vision to reality">
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <h2 class="main_head head_wrapper">Lead with Impact. Build with Armstrong</h2>
            <div class="text-lg-end mt-lg-4 mt-lg-0">
                <select id="departmentSelect" class="form-select open_positions_select">
                    <option value="">Select Department</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <p class="my-md-5 my-4">
            At Armstrong, every department plays an important role in achieving goals, from engineering and production to sales, operations, and IT. We value each employee who works with passion, curiosity, and a commitment to excellence, no matter their area of expertise. Here, you’ll find the support, tools, and opportunities you need to grow, lead, and make the right impact.
        </p>

        <div class="row g-lg-5 gy-4" id="jobsContainer">
            @foreach($jobs as $job)
                <div class="col-lg-6" data-department="{{ $job->department_id }}">
                    <div class="careers_card">
                        <h4 class="sub_head">{{ $job->title }}</h4>
                        <p>{!! $job->short_description !!}</p>
                        <div>
                            <a class="sub_btn2" href="{{ route('career.detail', $job->url) }}">
                                <span>View Job Details</span>
                                <svg class="ms-3" width="15" height="15" viewBox="0 0 15 15">
                                    <path d="M1 14.3333L14.3333 1M14.3333 1H4.33333M14.3333 1V11"
                                        stroke="#E41E29" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.frontfooter')
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--Select filter-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const departmentSelect = document.getElementById("departmentSelect");
    const jobCards = document.querySelectorAll("#jobsContainer .job-card");

    departmentSelect.addEventListener("change", function () {
        const selectedDept = this.value.trim();

        jobCards.forEach(card => {
            const deptId = card.dataset.department;

            if (selectedDept === "" || deptId === selectedDept) {
                card.style.display = "block";  // Show
            } else {
                card.style.display = "none";   // Hide
            }
        });
    });
});
</script>

<script>
    window.APP_URLS = {
       jobDetailsPage: "{{ url('career-details') }}/:url", // keep :slug as placeholder
        productDetail: "{{ Route::has('products.detail') ? route('products.detail', ':url') : '' }}",
        categoryProducts: "{{ Route::has('category.products') ? route('category.products', ':id') : '' }}",
        defaultBanner: "{{ asset('public/front/img/products_bg_1.png') }}",
        image_path: "{{ asset('/') }}",

    }
$(document).ready(function () {
    $('#departmentSelect').on('change', function () {
        let deptId = $(this).val();

        $.ajax({
            url: "{{ route('career.jobs') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                department_id: deptId
            },
            success: function (res) {
                let jobsHtml = '';
                if (res.jobs.length > 0) {
                    res.jobs.forEach(job => {
                         let jobUrl = window.APP_URLS.jobDetailsPage.replace(':url', job.url);
                        jobsHtml += `
                        <div class="col-lg-6">
                            <div class="careers_card">
                                <h4 class="sub_head">${job.title}</h4>
                                <p>${job.short_description ?? ''}</p>
                                <div>
                                    <a class="sub_btn2" href="${jobUrl}">
                                        <span>View Job Details</span>
                                        <svg class="ms-3" width="15" height="15" viewBox="0 0 15 15">
                                            <path d="M1 14.3333L14.3333 1M14.3333 1H4.33333M14.3333 1V11"
                                                stroke="#E41E29" stroke-width="1.33333"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>`;
                    });
                } else {
                    jobsHtml = `<div class="col-12"><p>No jobs found in this department.</p></div>`;
                }
                $('#jobsContainer').html(jobsHtml);
            }
        });
    });
});
</script>
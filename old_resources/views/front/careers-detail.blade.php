@include('layouts.frontheader')

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
            <h1 class="heading mb-4">Open Positions</h1>
            <img src="{{asset('public/front/img/setting_vector.svg')}}" alt="setting vector" class="img-fluid setting-wrapper">
            <div class="col-lg-8 m-auto text-center">
                <p class="news-title">Building that meets purpose role-by-role!</p>
                <p>It's not just about crafting the machine, it's about shaping the industry and driving growth and innovation. From engineering and design to operations and service, each position matters to complete a collective mission, leading with precision, perfection, and purpose. Explore career paths where your work truly matters, and your future thrives.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="careers-detail">
                    <h2 class="main_head">{{ $job->title }}</h2>
                    {!! $job->details !!} 
                    {!! $job->description !!}
                </div>
            </div>

            <div class="col-lg-5 mt-3 mt-md-0">
                <div class="contact">
                    <div class="contact_bot">
                        <form id="careerForm" action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-between">
                        
                                {{-- Full Name --}}
                                <div class="col-lg-12 floating-group">
                                    <input type="text" name="fullname" id="fullname" placeholder=" " maxlength="70"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart(); validateField(this)">
                                        <input type="text" value="{{ $job->title }}" name="job_possition" hidden>
                                    <label>Full Name <span>*</span></label>
                                    <small class="text-danger error-msg" id="fullname-error"></small>
                                </div>
                        
                                {{-- Email --}}
                                <div class="col-lg-12 floating-group">
                                    <input type="email" name="email" id="email" maxlength="70" placeholder=" " oninput="validateEmail(this)">
                                    <label>Email ID <span>*</span></label>
                                    <small class="text-danger error-msg" id="email-error"></small>
                                </div>
                        
                                {{-- Phone --}}
                                <div class="col-lg-12 floating-group">
                                    <input type="text" name="phone" id="phone" placeholder=" " maxlength="20" minlength="10"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20); validateField(this)">
                                    <label>Contact Number <span>*</span></label>
                                    <small class="text-danger error-msg" id="phone-error"></small>
                                </div>
                        
                                {{-- Location --}}
                                <div class="col-lg-12 floating-group">
                                    <input type="text" name="current_location" maxlength="70" id="current_location" placeholder=" ">
                                    <label>Current Location</label>
                                </div>
                        
                                {{-- LinkedIn --}}
                                <div class="col-lg-12 floating-group">
                                    <input type="text" name="linkedin_profile" maxlength="70" id="linkedin_profile" placeholder=" ">
                                    <label>LinkedIn Profile</label>
                                </div>
                        
                                {{-- Resume --}}
                                <div class="col-lg-12 floating-group">
                                    <span class="upload_res">Upload Resume <span style="color:#E41E29">*</span></span>
                                    
                                    <input type="file" name="resume" id="resume" 
                                        accept=".pdf,.doc,.docx" onchange="validateResume(this)">
                                    
                                    <small class="text-danger error-msg" id="resume-error"></small>
                                </div>
                        
                                <div class="row align-items-center mb-4">
                                    <!-- Captcha Image -->
                                    <div class="d-flex justify-content-around align-items-end">
                                    <div class="col-auto">
                                        <img id="job-captcha-image" src="{{ route('captcha.image') }}" alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
                                    </div>

                                    <!-- Reload Button -->
                                    <div class="col-auto">
                                        <svg style="cursor: pointer;" id="job-reload-button" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047" stroke="#333333" stroke-miterlimit="10" stroke-linecap="round"/>
                                            <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                    

                                    <!-- Captcha Input -->
                                    <div class="col-auto mt-3 mt-md-0">
                                        <input 
                                            type="text" 
                                            id="job_custom_captcha" 
                                            placeholder="Enter captcha" 
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,4);" 
                                            autocomplete="off">
                                    </div>
                                    </div>
                                    <small id="job_custom_captcha_error" class="text-danger text-start" style="display:none;">Please Verify Captcha.</small>
                                </div>
                        
                                {{-- Submit --}}
                                <div class="col-lg-12">
                                    <button type="submit" class="sub_btn">
                                        <span>Apply Now</span>
                                        <svg class="ms-2" width="15" height="16" viewBox="0 0 15 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 14.6663L14.3333 1.33301M14.3333 1.33301H4.33333M14.3333 1.33301V11.333"
                                                stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')
<script src="https://www.google.com/recaptcha/api.js?onload=onCaptchasLoad&render=explicit" async defer></script>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

<script>
$(document).ready(function () {
    $('#job-reload-button').click(function() {
    $('#job-captcha-image').attr('src', '{{ route("captcha.image") }}?' + Date.now());
});
});
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("careerForm");
    const submitBtn = form.querySelector("button[type=submit]");

    // Validation rules
    function validateField(input, errorId, message) {
        const errorEl = document.getElementById(errorId);
        if (!input.value.trim()) {
            errorEl.textContent = message;
            input.classList.add("is-invalid");
            return false;
        } else {
            errorEl.textContent = "";
            input.classList.remove("is-invalid");
            return true;
        }
    }

    function validateEmail(input) {
        const errorEl = document.getElementById("email-error");
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!input.value.trim()) {
            errorEl.textContent = "Email is required";
            input.classList.add("is-invalid");
            return false;
        } else if (!regex.test(input.value)) {
            errorEl.textContent = "Enter a valid email address";
            input.classList.add("is-invalid");
            return false;
        }
        errorEl.textContent = "";
        input.classList.remove("is-invalid");
        return true;
    }

    function validatePhone(input) {
        const errorEl = document.getElementById("phone-error");
        const value = input.value.trim();
        if (!value) {
            errorEl.textContent = "Phone number is required";
            input.classList.add("is-invalid");
            return false;
        } else if (value.length < 10 || value.length > 20) {
            errorEl.textContent = "Phone number must be 10–20 digits";
            input.classList.add("is-invalid");
            return false;
        }
        errorEl.textContent = "";
        input.classList.remove("is-invalid");
        return true;
    }

    function validateResume(input) {
        const errorEl = document.getElementById("resume-error");

        if (!input.files || input.files.length === 0) {
            errorEl.textContent = "Resume is required";
            input.classList.add("is-invalid");
            return false;
        }

        const file = input.files[0];
        const maxSize = 5 * 1024 * 1024; // 5 MB in bytes

        if (file.size > maxSize) {
            errorEl.textContent = "File size must not exceed 5 MB";
            input.classList.add("is-invalid");
            return false;
        }

        errorEl.textContent = "";
        input.classList.remove("is-invalid");
        return true;
    }

    // Real-time validation
    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("input", () => {
            switch (input.id) {
                case "fullname":
                    validateField(input, "fullname-error", "Full name is required");
                    break;
                case "email":
                    validateEmail(input);
                    break;
                case "phone":
                    validatePhone(input);
                    break;
                case "resume":
                    validateResume(input);
                    break;
            }
        });
        input.addEventListener("blur", () => {
            input.dispatchEvent(new Event("input"));
        });
    });

    // Submit validation + captcha
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        let valid = true;

        if (!validateField(document.getElementById("fullname"), "fullname-error", "Full name is required")) valid = false;
        if (!validateEmail(document.getElementById("email"))) valid = false;
        if (!validatePhone(document.getElementById("phone"))) valid = false;
        if (!validateResume(document.getElementById("resume"))) valid = false;

        // Captcha validation
        let captcha = $("#job_custom_captcha").val().trim();
        if (captcha === "") {
            $("#job_custom_captcha_error").show().text("Please enter the captcha.");
            valid = false;
        } else {
            $("#job_custom_captcha_error").hide().text("");
        }

        if (!valid) return;

        // Disable button while verifying captcha
        submitBtn.disabled = true;
        submitBtn.innerHTML = "Verifying captcha...";

        $.ajax({
            url: '{{ route("captcha.verify") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                custom_captcha: captcha
            },
            success: function(response) {
                if (response.success) {
                    submitBtn.innerHTML = "Submitting...";
                    // native submit AFTER validation
                    $("#careerForm")[0].submit();
                } else {
                    $("#job_custom_captcha_error").show().text(response.message);
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = "Submit";
                    $("#job-captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
                }
            },
            error: function() {
                alert("Something went wrong. Please try again.");
                submitBtn.disabled = false;
                submitBtn.innerHTML = "Submit";
                $("#job-captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
            }
        });
    });
});

document.querySelectorAll('.careers-detail h4')
    .forEach(el => el.classList.add('careers_head'));
</script>


<style>
    #resume {
        display: inline-block;
        font-size: 14px;
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
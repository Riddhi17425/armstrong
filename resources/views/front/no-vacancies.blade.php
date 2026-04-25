@include('layouts.frontheader')

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="Javascript:Void(0)">Careers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Open Positions</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="heading mb-4">Open Positions</h1>
            <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
            <div class="col-lg-8 m-auto text-center">
                <p class="news-title">Work with Purpose Grow with Armstrong</p>
                <p>At Armstrong, we don’t just build machines — we craft solutions that shape industries and drive progress.
                    From engineering and design to operations and service, every role plays a part in our mission to lead
                    through innovation, precision, and purpose. Explore career paths where your work truly matters — and
                    your future can thrive.</p>
            </div>
        </div>
    </div>        
</section>

<section class="mt-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-7">

                <h2 class="main_head mb-5">From Vision to Impact Start Your Journey Here</h2>
                <p>Armstrong is more than just a workplace — it’s a launchpad for bold ideas, meaningful careers, and
                    real-world impact. As a global leader in industrial machinery and smart manufacturing, we thrive on
                    engineering excellence, creative problem-solving, and a shared purpose that drives every team — from
                    R&D and production to logistics, sales, and support.</p>
                <p>We’re looking for passionate individuals who are curious, driven, and ready to shape the future of
                    industry. Whether you’re improving systems, developing next-gen technologies, or leading key
                    initiatives, your work helps build smarter, more sustainable solutions.</p>
                <p>Join a workplace that values collaboration, invests in your growth, and empowers you to lead with
                    purpose. <b>Explore our open positions and take the first step toward a career built on innovation,
                        integrity, and long-term impact.</b></p>
            </div>
            <div class="col-lg-5">
                <div>
                    <img class=" img-fluid" src="{{ asset('public/front/img/amstrong-activities.png') }}" alt=" Your Journey">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="main_head head_wrapper mb-4">No Open Roles But We’re Always Building</h2>
                <p>At Armstrong, we’re constantly evolving — designing smarter machines, expanding capabilities, and
                    powering progress across industries. While there are no active vacancies at the moment, we’re always
                    open to connecting with passionate, skilled professionals. If you’re excited about what we do and
                    want to be considered for future opportunities, we’d love to hear from you. Please send your resume
                    and a brief cover letter to: <a
                        href="mailto:careers@armstrongex.com"><b>careers@armstrongex.com</b></a></p>
            </div>
        </div>

        <div class="contact col-lg-9 m-auto mt-5">
            <div class="contact_bot">
                
                <form id="novacancyForm" action="{{ route('novacancy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between">
                        {{-- Full Name --}}
                        <div class="col-lg-5 floating-group">
                            <input type="text" name="fullname" id="fullname" placeholder=" " maxlength="70"
                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart(); validateField(this)">
                            <label>Full Name <span>*</span></label>
                            <small class="text-danger error-msg" id="fullname-error"></small>
                        </div>

                        {{-- Email --}}
                        <div class="col-lg-5 floating-group">
                            <input type="email" name="email" id="email" maxlength="70" placeholder=" "
                                oninput="validateEmail(this)">
                            <label>Email ID <span>*</span></label>
                            <small class="text-danger error-msg" id="email-error"></small>
                        </div>

                        {{-- Phone --}}
                        <div class="col-lg-5 floating-group">
                            <input type="text" name="phone" id="phone" placeholder=" " maxlength="20"
                                minlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20); validateField(this)">
                            <label>Contact Number <span>*</span></label>
                            <small class="text-danger error-msg" id="phone-error"></small>
                        </div>

                        {{-- Location --}}
                        <div class="col-lg-5 floating-group">
                            <input type="text" name="current_location" maxlength="70" id="current_location"
                                placeholder=" ">
                            <label>Current Location</label>
                        </div>

                        {{-- LinkedIn --}}
                        <div class="col-lg-5 floating-group">
                            <input type="text" name="linkedin_profile" maxlength="70" id="linkedin_profile"
                                placeholder=" ">
                            <label>LinkedIn Profile</label>
                        </div>

                        {{-- Resume --}}
                        <div class="col-lg-12 floating-group">
                            <span class="upload_res">Upload Resume <span style="color:#E41E29">*</span></span>
                            <div class="custom-file-upload">
                                <input type="file" name="resume" id="resume" class="file-input" accept=".pdf,.doc,.docx"
                                onchange="validateResume(this)">
                                <span class="file-label" id="chooseFileBtn">Choose File</span>
                                <span class="file-name">No File Chosen</span>
                                <small class="text-danger error-msg" id="resume-error"></small>
                            </div>
                        </div>

                        {{-- Captcha --}}
                        <div class="col-lg-12 mb-3">
                            <div id="noVacency_captcha"></div>
                            <small class="text-danger error-msg" id="captcha-errors_no_vanacy_form" style="display:none;">Please
                                verify that you are not a robot.</small>
                        </div>

                        {{-- Submit --}}
                        <div class="col-lg-12 px-0">
                            <button type="submit" class="sub_btn">
                                <span>Apply Now</span>
                                <svg class="ms-2" width="15" height="16" viewBox="0 0 15 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 14.6663L14.3333 1.33301M14.3333 1.33301H4.33333M14.3333 1.33301V11.333"
                                        stroke="white" stroke-width="1.33333" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@include('layouts.frontfooter')
<script src="https://www.google.com/recaptcha/api.js?onload=onCaptchasLoad&render=explicit" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("novacancyForm");
        if (!form) return;

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
            const maxSize = 5 * 1024 * 1024; // 5 MB
            if (file.size > maxSize) {
                errorEl.textContent = "File size must not exceed 5 MB";
                input.classList.add("is-invalid");
                return false;
            }

            errorEl.textContent = "";
            input.classList.remove("is-invalid");
            return true;
        }

        function validateCaptcha() {
            const errorEl = document.getElementById("captcha-errors_no_vanacy_form");
            const response = grecaptcha.getResponse(noVacancyCaptchaId); // ✅ check actual response
            if (!response || response.length === 0) {
                errorEl.style.display = "block";
                return false;
            }
            errorEl.style.display = "none";
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

        // Submit validation
        form.addEventListener("submit", function(e) {
            let valid = true;

            if (!validateField(document.getElementById("fullname"), "fullname-error", "Full name is required")) valid = false;
            if (!validateEmail(document.getElementById("email"))) valid = false;
            if (!validatePhone(document.getElementById("phone"))) valid = false;
            if (!validateResume(document.getElementById("resume"))) valid = false;
            if (!validateCaptcha()) valid = false;

            if (!valid) {
                e.preventDefault();
                return;
            }

            submitBtn.disabled = true;
            submitBtn.innerHTML = `<span>Submitting...</span>`;
        });
    });
</script>

<script>
    document.getElementById('chooseFileBtn').addEventListener('click', function() {
        document.getElementById('resume').click(); // manually trigger input
    });

    document.getElementById('resume').addEventListener('change', function() {
        const fileName = this.files.length > 0 ? this.files[0].name : 'No File Chosen';
        document.querySelector('.file-name').textContent = fileName;
    });
</script>

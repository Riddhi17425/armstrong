@include('layouts.frontheader')
    <style>
        .contact .select2-container--default .select2-selection--single {
            border-radius: 0px;
            border: none;
        }
        .intl-tel-input {
            width: 100%;
        }
        
        .iti--allow-dropdown
        {
            display:block !important;
        }
        
        .iti__selected-country
        {
            height:auto !important;
        }
    </style>

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Contact Us</li>
            </ol>
        </nav>
   
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="hero-title mb-md-3">Contact Us</h1>
            </div> 
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-auto">
                <h3 class="sub_head fw-medium">Get In Touch</h3>
                <p class="my-4 mb-2">Need assistance in choosing the right finishing equipment for your PP/PE business? </p>
                <p>
                    Reach out to our experts for personalized support, expert guidance, and high-performance machinery to increase business efficiency and growth. 
                </p>
                <span>
                    <img src="{{ asset('public/front/img/fibca-iftex_2.svg') }}" alt="fibca iftex" class="img-fluid contact_log">
                </span>
            </div>
            
            <div class="col-lg-9">
                <div class="contact">
                    <div class="contact_bot">
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row gx-5">
                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="fname" name="name" onkeyup="hideerrormessage(this)"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    maxlength="70" placeholder=" ">
                                    <label for="fname">First Name <span>*</span></label>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="company" name="company_name" onkeyup="hideerrormessage(this)"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    maxlength="70" placeholder=" ">
                                    <label for="company">Company Name <span>*</span></label>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="tel" id="contact_phone" placeholder=" " autocomplete="tel" maxlength="20" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);"><br>
                                    
                                    <input type="hidden" name="country" id="contact_country">
                                    <input type="hidden" name="phonecode" id="contact_phonecode">
                                    <input type="hidden" name="contact" id="contact_value">
                                    <input type="hidden" name="full_phone" id="contact_full_phone">
                                </div>
                                
                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="email" onkeyup="hideerrormessage(this)" maxlength="60" name="email" placeholder=" ">
                                    <label for="email">Email <span>*</span></label>
                                </div>

                                <div class="col-lg-12 floating-group">
                                    <textarea id="message" rows="1" name="message" placeholder=""></textarea>
                                    <label for="message">Message</label>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <div class="col-auto">
                                        <img id="contact-captcha-image" src="{{ route('captcha.image') }}" alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
                                    </div>

                                    <div class="col-auto">
                                        <svg style="cursor: pointer;" id="contact_reload_button" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047" stroke="#333333" stroke-miterlimit="10" stroke-linecap="round"/>
                                            <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"/>
                                        </svg>
                                    </div>

                                    <div class="col-auto mt-3 mt-md-0">
                                        <input 
                                            type="text" 
                                            id="contact_custom_captcha" 
                                            placeholder="Enter captcha" 
                                            maxlength="4" 
                                            inputmode="numeric" 
                                            pattern="[0-9]*" 
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,4);" 
                                            autocomplete="off"
                                            name="contact_custom_captcha"> </div>
                                    <small id="contact_custom_captcha_error" class="text-danger text-start" style="display:none;">Please Verify Captcha.</small>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="sub_btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="contact_icon_main">
            <div class="contact_icon">
                <span>
                    <img src="{{asset('public/front/img/email-icon.svg')}}" alt="email">
                </span>
                <h5>Email:</h5>
                <p class="news-title mb-0"><a href="mailto:exportsales@armstrongex.com" class="text-center">exportsales@armstrongex.com</a></p>
                <p class="news-title mb-0"><a href="mailto:sales@armstrongex.com" class="text-center">sales@armstrongex.com</a></p>
                <p class="news-title"><a href="mailto:info@armstrongex.com" class="text-center">info@armstrongex.com</a></p>
            </div>

            <div class="contact_icon">
                <span>
                    <img src="{{ asset('public/front/img/phone-icon.svg')}}" alt="phone">
                </span>
                <h5>Mobile:</h5>
                <p class="news-title mb-0"><a href="tel:+916358740011" class="text-center">+91 63587 40011</a></p>
                <p class="news-title mb-0"><a href="tel:+916358740024" class="text-center">+91 63587 40024</a></p>
                <p class="news-title"><a href="tel:+916358740025" class="text-center">+91 63587 40025</a></p>
            </div>

            <div class="contact_icon">
                <span>
                    <img src="{{asset('public/front/img/telephone-icon.svg')}}" alt="telephone">
                </span>
                <h5>Telephone:</h5>
                <p class="news-title"><a href="tel:07927543747" class="text-center">079-27543747</a></p>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row gx-xxl-5 justify-content-between">
            <div class="col-xxl-8 col-lg-9 mb-4 mb-lg-auto">
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d917.8695178765508!2d72.56648176947161!3d23.04292833279844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848a71fc1291%3A0x488613e99d533cc7!2sARMSTRONG!5e0!3m2!1sen!2sin!4v1757924451007!5m2!1sen!2sin"
                        width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-3">
                <div class="mb-4">
                    <h4 class="sub__head_red mb-4">Office Address:</h4>
                    <a href="https://www.google.com/maps/place/Navajivan+Trust+Campus/@23.043368,72.5633172,17z/data=!3m1!4b1!4m6!3m5!1s0x395e848ac8a7faf3:0xef7e3956674804fc!8m2!3d23.043368!4d72.5658921!16s%2Fg%2F1tcztbjm?entry=ttu&g_ep=EgoyMDI1MDkxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                        <p>6th Floor, SARAP Building, Opp. Navjivan Press, B/H Gujarat Vidyapith, Ahmedabad - 380014, Gujarat, India.</p>
                    </a>
                </div>

                <h4 class="sub__head_red mb-4">Factory Address:</h4>

                <div>
                    <h6 class="address_small_head">Unit 1</h6>
                    <a href="https://www.google.com/maps/search/Plot+no.+A2%2F502-1,+Opp.+Indo-German+Tool+Room+Phase+-+4,+GIDC+Estate,+Vatva,+Ahmedabad,+Gujarat+382445,+India/@22.9713059,72.6397786,17z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI1MDgxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                        <p>Plot No. A2/502-1, Opp. Indo German Tool Room, Phase-4, GIDC Estate, Vatva, Ahmedabad - 382445, Gujarat, India.</p>
                    </a>
                </div>
                <div>
                    <h6 class="address_small_head">Unit 2</h6>
                    <a href="https://www.google.com/maps/search/7603,+Phase+IV,+GIDC+Industrial+Estate,+Vatva,+Ahmedabad+-+382445,+Gujarat,+India./@22.9739435,72.6536447,12z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI1MDkxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                        <p>7603, Phase IV, GIDC Industrial Estate, Vatva, Ahmedabad - 382445, Gujarat, India.</p>
                    </a>    
                </div>
                 <div>
                    <h6 class="address_small_head">Unit 3</h6>
                    <a href="https://maps.app.goo.gl/BekxXUXuvXGjEK5g8" target="_blank">
                        <p>Panchratna Industrial Estate, Plot No. 10/5, Cross Road, Nr. Vatva GIDC, Phase IV, Ramol, Ahmedabad-382445, Gujarat, India.</p>
                    </a>    
                </div>
                <!--<div>-->
                <!--    <h6 class="address_small_head">Unit 3</h6>-->
                <!--    <a href="https://www.google.com/maps/place/Swarnim+Industrial+Park/@22.9739649,72.7308973,16z/data=!4m10!1m2!2m1!1sA-55,+Swarnim+Ind+Park,+Bakrol+Road,+Bakrol+Bujrang,+Ahmedabad-382430,+Gujarat,+India.!3m6!1s0x395e62c80f6936fb:0x76902217b7bddf0e!8m2!3d22.9758715!4d72.7356428!15sClZBLTU1LCBTd2FybmltIEluZCBQYXJrLCBCYWtyb2wgUm9hZCwgQmFrcm9sIEJ1anJhbmcsIEFobWVkYWJhZC0zODI0MzAsIEd1amFyYXQsIEluZGlhLpIBFm1hY2hpbmluZ19tYW51ZmFjdHVyZXKqAZ4BEAEqJSIhYSA1NSBzd2FybmltIGluZCBwYXJrIGJha3JvbCByb2FkKAAyHhABIhoM-idHTV2-xq4dHlut32m5av40p1O654ZnATJTEAIiT2EgNTUgc3dhcm5pbSBpbmQgcGFyayBiYWtyb2wgcm9hZCBiYWtyb2wgYnVqcmFuZyBhaG1lZGFiYWQgMzgyNDMwIGd1amFyYXQgaW5kaWHgAQA!16s%2Fg%2F11dd_nxsbv?entry=ttu&g_ep=EgoyMDI1MDkxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">-->
                <!--        <p>A-55, Swarnim Ind Park, Bakrol Road, Bakrol Bujrang, Ahmedabad-382430, Gujarat, India.</p>-->
                <!--    </a>    -->
                <!--</div>-->
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.20/css/intlTelInput.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.20/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.20/js/utils.js"></script>

<script>
// ==================== GLOBAL VARIABLES ====================
let contactIti;

// ==================== INTL TEL INPUT INITIALIZATION ====================
document.addEventListener("DOMContentLoaded", function() {
    const contactInput = document.querySelector("#contact_phone");

    if (contactInput) {
        contactIti = window.intlTelInput(contactInput, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                fetch("https://ipapi.co/json")
                    .then((res) => res.json())
                    .then((data) => callback(data.country_code))
                    .catch(() => callback("in"));
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.20/js/utils.js"
        });

        // Update hidden fields on input and country change
        contactInput.addEventListener('input', updatePhoneFields);
        contactInput.addEventListener('countrychange', updatePhoneFields);
    }

    // CAPTCHA Reload Logic
    $('#contact_reload_button').click(function() {
        $('#contact-captcha-image').attr('src', '{{ route("captcha.image") }}?' + Date.now());
        $("#contact_custom_captcha").val('');
        $("#contact_custom_captcha_error").hide();
    });
});

function updatePhoneFields() {
    if (contactIti) {
        const countryData = contactIti.getSelectedCountryData();
        const phoneNumber = document.querySelector("#contact_phone").value.trim();
        
        document.querySelector("#contact_country").value = countryData.name || '';
        document.querySelector("#contact_phonecode").value = countryData.dialCode || '';
        
        if (phoneNumber) {
            // Store only the digits (without country code) in contact_value
            document.querySelector("#contact_value").value = phoneNumber.replace(/\D/g, '');
            // Store full international number (e.g., +911234567890)
            document.querySelector("#contact_full_phone").value = contactIti.getNumber();
        } else {
             document.querySelector("#contact_value").value = '';
             document.querySelector("#contact_full_phone").value = '';
        }
    }
}

// ==================== VALIDATION FUNCTIONS ====================
function validateField($field) {
    let fieldName = $field.attr('name');
    let fieldId = $field.attr('id');
    let value = $field.val().trim();
    let isValid = true;
    
    // Remove existing error for this field
    $field.next('.validation-error').remove();
    
    // Skip validation for hidden fields
    if ($field.attr('type') === 'hidden') {
        return true;
    }
    
    // Name validation
    if (fieldName === 'name') {
        if (value === '') {
            showError($field, 'Name is required.');
            isValid = false;
        }
    }
    
    // Company name validation
    if (fieldName === 'company_name') {
        if (value === '') {
            showError($field, 'Company name is required.');
            isValid = false;
        }
    }
    
    // Phone validation (checking the visible input field)
    if (fieldId === 'contact_phone') {
        const digits = value.replace(/\D/g, '');
        if (value === '') {
            showError($field, 'Phone number is required.');
            isValid = false;
        } 
        // UPDATED CLIENT-SIDE MIN LENGTH CHECK TO 10
        else if (digits.length < 10) { 
            showError($field, 'Phone number must be at least 10 digits.');
            isValid = false;
        }
    }
    
    // Email validation
    if (fieldName === 'email') {
        if (value === '') {
            showError($field, 'Email is required.');
            isValid = false;
        } else if (!isValidEmail(value)) {
            showError($field, 'Please enter a valid email address.');
            isValid = false;
        }
    }
    
    return isValid;
}

function showError($field, message) {
    $field.after('<span class="validation-error text-danger d-block mt-1" style="font-size: 0.875rem;">' + message + '</span>');
}

function hideError($field) {
    $field.next('.validation-error').remove();
}

function hideerrormessage(element) {
    hideError($(element));
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// ==================== LIVE VALIDATION ====================
$(document).on('input', '#contactForm input:not([type="hidden"])', function() {
    hideError($(this));
});

$(document).on('blur', '#contactForm input:not([type="hidden"])', function() {
    validateField($(this));
});

// ==================== FORM SUBMIT (FASTEST REDIRECT FIX) ====================
$(document).on('submit', '#contactForm', function(e) {
    e.preventDefault();
    let form = $(this);
    let isValid = true;
    let $btn = form.find("button[type=submit]");
    
    // 1. Reset errors and prepare
    $(".error-msg").remove();
    $("#contact_custom_captcha_error").hide();
    form.find('.validation-error').remove();
    
    // Update phone fields before validation
    updatePhoneFields();

    // 2. Client-Side Validation
    form.find('input:not([type="hidden"])').each(function() {
        if (this.id !== 'contact_custom_captcha' && !validateField($(this))) {
            isValid = false;
        }
    });

    // Client-side Captcha check (and show error)
    let captcha = $("#contact_custom_captcha").val().trim();
    if (captcha === "") {
        $("#contact_custom_captcha_error").show().text("Please enter the captcha.");
        isValid = false;
    }

    if (!isValid) return;

    // 3. AJAX Submission & INSTANT REDIRECT FIX
    $btn.prop("disabled", true).text("Submitting...");

    let formData = form.serialize();

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json',
        // Set a low timeout for better UX if the server is slow
        timeout: 8000, 
        
        // We only implement the 'error' handler to catch validation failures (422)
        success: function(response) {
            // If success, the redirect below handles the navigation immediately.
        },
        error: function(xhr) {
            $btn.prop("disabled", false).text("Submit");
            
            // Handle server-side validation errors (422)
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;

                form.find('.validation-error').remove();
                $("#contact_custom_captcha_error").hide();
                
                // Display specific errors
                $.each(errors, function(key, value) {
                     if (key === 'contact_custom_captcha') {
                          $("#contact_custom_captcha_error").show().text(value[0]);
                     } else if (key === 'contact') {
                         // Target the visible phone input
                         $('#contact_phone').after('<span class="validation-error text-danger d-block mt-1" style="font-size: 0.875rem;">' + value[0] + '</span>');
                     }
                      else {
                          // Other field errors
                          $(`[name=${key}]`).after('<span class="validation-error text-danger d-block mt-1" style="font-size: 0.875rem;">' + value[0] + '</span>');
                     }
                });

                // Always reload captcha on failure
                $('#contact_reload_button').click();

            } else {
                // Non-validation error (e.g., timeout, 500)
                alert("An error occurred during submission. Please try again later.");
            }
        }
    });
    
    setTimeout(function() {
        window.location.href = '{{ route('thankyou') }}';
    }, 100);

});
</script>

@include('layouts.frontfooter')
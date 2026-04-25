@include('layouts.frontheader', [
    'og_image' => asset('public/front/img/setting_vector.svg')
])


<style>
.contact .select2-container--default .select2-selection--single {
    border-radius: 0px;
    border: none;
}
.intl-tel-input {
    width: 100%;
}
.iti--allow-dropdown {
    display:block !important;
}
.iti__selected-country {
    height:auto !important;
}
.validation-error {
    font-size: 0.875rem;
}
</style>

<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Channel Partner</li>
            </ol>
        </nav>
        <div class="setting_vector_icon">
            <h1 class="hero-title mb-3">Channel Partner</h1>
            <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <p class="mb-4">Expand your business! Partner with India’s most trusted manufacturer of industrial sewing, sealing & finishing machinery for FIBC, Woven Sack, Tarpaulin & Technical Textile industries.</p>
                <a href="#channelpartner_form" class="sub_btn">Apply as Channel Partner</a>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row gx-lg-5">
            <div class="col-lg-7 order-2 order-md-1">
                <h2 class="main_head">Benefits For Authorized Partners</h2>
                <p>As an authorized partner, you get access to Armstrong’s complete product ecosystem, marketing, and engineering support, designed to help you scale your business quickly.</p>
                <ul class="my-4">
                    <li class="text-capitalize">Exclusive dealership territory</li>
                    <li class="text-capitalize">Access to factory-backed technical support</li>
                    <li class="text-capitalize">End-to-end onboarding & product training</li>
                    <li class="text-capitalize">Marketing materials & branding resources</li>
                    <li class="text-capitalize">Partner listing on Armstrong website</li>
                    <li class="text-capitalize">Pre-sales & post-sales engineering assistance</li>
                    <li class="text-capitalize">Dedicated Partner Relationship Manager</li>
                    <li class="text-capitalize">Priority machine dispatch & inventory allocation</li>
                    <li class="text-capitalize">High-margin spare parts business</li>
                    <li class="text-capitalize">AMC service revenue (recurring)</li>
                    <li class="text-capitalize">Invitation to factory events & partner meets</li>
                    <li class="text-capitalize">Access to partner portal (future-ready) for documents, updates & product manuals</li>
                </ul>
                <p class="mb-0">We also offer pre-dispatch inspections and customer-centric testing for complete satisfaction.</p>
            </div>
            <div class="col-lg-5 order-1 order-md-2">
                <img class="img-fluid mb-3 mb-md-0" src="{{ asset('public/front/img/armstrong_authorized_partner.png') }}" alt="Armstrong Authorized Partner">
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <h2 class="main_head head_wrapper">Why Become a partner with Armstrong?</h2>
        <p class="my-md-5 my-4">
           Armstrong has 30+ years of engineering excellence, a global client base, and proven machinery performance making it  the preferred manufacturing partner for industrial automation in bulk packaging and material handling. As a Channel Partner, you get access to our expansive product portfolio, advanced R&D support and dedicated marketing, and also technical assistance.
        </p>
        <div class="row g-lg-4 gy-4">
            <div class="col-lg-6">
                <div class="innovations">
                    <h4 class="sub__head_red">Trusted Brand For Industrial Machinery</h4>
                    <p>With 30+ years of innovation and 10,000+ installations worldwide, Armstrong is known for high-performance machinery engineered for reliability, precision and global safety standards.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="innovations">
                    <h4 class="sub__head_red">Massive Product Portfolio</h4>
                    <p>They offer a wide range of machinery trusted by leading FIBC, Woven Sack, Tarpaulin & Technical Textile manufacturers, including Loop Sewing Machines, Panel Sewing Machines, Tarpaulin Lines, Punching Machines, Multi-Run Stitching Solutions, Customized Automation Machinery.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="innovations">
                    <h4 class="sub__head_red">Huge Growth & Demand</h4>
                    <p>FIBC, Technical Textile & Packaging segments are growing rapidly due to increasing global demand in logistics, agriculture, chemicals, polymers & infrastructure.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="innovations">
                    <h4 class="sub__head_red">Better Margins & Recurring Revenue</h4>
                    <p>Proceeds through: Machine sales, Annual maintenance (AMC), Spare parts supply, After-sales service, OEM service support, ensuring a continuous monthly revenue.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-mt">
    <div class="container">
        <div class="row gx-lg-5">
            <div class="col-lg-5">
                <img class="img-fluid mb-3 mb-md-0" src="{{ asset('public/front/img/ideal_business_profiles.png') }}" alt="Ideal Business Profiles">
            </div>
            <div class="col-lg-7">
                <h2 class="main_head">Eligibility & Ideal Business Profile</h2>
                <p>Every Armstrong machine goes through full-cycle in-house testing designed to simulate real-world manufacturing conditions. To maximize partner success, we onboard businesses that can represent our brand with technical and commercial competence.</p>
                <p class="certi_head mb-1">Best-Suited Profiles</p>
                <ul class="mb-md-4 mb-1">
                    <li class="text-capitalize">Industrial Machinery Distributors</li>
                    <li class="text-capitalize">Engineering Consultants / Automation Providers</li>
                    <li class="text-capitalize">Existing B2B businesses wanting to expand into machinery supply</li>
                </ul>
                <p class="certi_head mb-1">Minimum Requirements</p>
                <ul class="mb-md-4 mb-0">
                    <li class="text-capitalize">Basic technical understanding of industrial machines</li>
                    <li class="text-capitalize">Ability to offer local customer support</li>
                    <li class="text-capitalize">Small warehouse/storage facility (preferred)</li>
                    <li class="text-capitalize">Existing B2B network (ideal but not mandatory)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-mt" id="channelpartner_form">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5 text-start text-lg-start mb-4 mb-lg-auto pe-md-5">
                <h3 class="sub_head mb-3">Become an Authorized Channel Partner with Armstrong</h3>
                <p>If you want to expand your industrial machinery portfolio or enter a high-demand engineering segment, partnering with Armstrong in Ahmedabad gives you direct access to India’s most reliable FIBC, Woven Sack, Tarpaulin & Technical Textile machinery line.Whether you're an industrial distributor, engineering consultant, or a business expanding into machinery supply. Armstrong gives you everything you need to succeed in the market.</p>
                <p>Whether you're an industrial distributor, engineering consultant, or a business expanding into machinery supply, Armstrong gives you everything you need to succeed in the market.</p>
            </div>
            <div class="col-lg-7">
                <div class="contact">
                    <div class="contact_bot">
                        <form id="channelpartnerForm" action="{{ route('channelpartnerstore') }}" method="POST">
                            @csrf
                            <div class="row gx-5">
                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="name" name="name" maxlength="70" placeholder=" ">
                                    <label for="name">Name <span>*</span></label>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="company_name" name="company_name" maxlength="70" placeholder=" ">
                                    <label for="company_name">Company Name <span>*</span></label>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="tel" id="channel_phone" placeholder=" " autocomplete="tel" maxlength="20" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                                    <input type="hidden" name="country" id="channel_country">
                                    <input type="hidden" name="phonecode" id="channel_phonecode">
                                    <input type="hidden" name="contact" id="channel_contact_value">
                                    <input type="hidden" name="full_phone" id="channel_full_phone">
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="email" id="email" name="email" maxlength="60" placeholder=" ">
                                    <label for="email">Email <span>*</span></label>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <select name="business_type" id="business_type" class="form-select">
                                        <option value="" disabled selected>Business Type <span>*</span></option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="IT / Software">IT / Software</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Education">Education</option>
                                        <option value="Pharma">Pharma</option>
                                        <option value="Consulting">Consulting</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="industry_segment" name="industry_segment" maxlength="70" placeholder=" ">
                                    <label for="industry_segment">Industry Segment <span>*</span></label>
                                </div>

                                <div class="col-lg-12 floating-group">
                                    <textarea id="message" name="message" rows="3" placeholder=" "></textarea>
                                    <label for="message">Message</label>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <div class="col-auto">
                                        <img id="channel-captcha-image" src="{{ route('captcha.image') }}" alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
                                    </div>
                                    <div class="col-auto">
                                        <svg style="cursor: pointer;" id="channel_reload_button" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047" stroke="#333333" stroke-miterlimit="10" stroke-linecap="round"/>
                                            <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                    <div class="col-auto mt-3 mt-md-0">
                                        <input type="text" id="channel_custom_captcha" placeholder="Enter captcha" maxlength="4" inputmode="numeric" pattern="[0-9]*" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,4);" autocomplete="off" name="contact_custom_captcha">
                                        <small id="channel_custom_captcha_error" class="text-danger text-start" style="display:none;">Please Verify Captcha.</small>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="sub_btn">Become a Channel Partner</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
let channelIti;

// ==================== INTL TEL INPUT INITIALIZATION ====================
document.addEventListener("DOMContentLoaded", function() {
    const channelInput = document.querySelector("#channel_phone");
    if (channelInput) {
        channelIti = window.intlTelInput(channelInput, {
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
        channelInput.addEventListener('input', updateChannelPhoneFields);
        channelInput.addEventListener('countrychange', updateChannelPhoneFields);
    }

    // CAPTCHA Reload Logic
    $('#channel_reload_button').click(function() {
        $('#channel-captcha-image').attr('src', '{{ route("captcha.image") }}?' + Date.now());
        $("#channel_custom_captcha").val('');
        $("#channel_custom_captcha_error").hide();
    });
});

function updateChannelPhoneFields() {
    if (channelIti) {
        const countryData = channelIti.getSelectedCountryData();
        const phoneNumber = document.querySelector("#channel_phone").value.trim();
        document.querySelector("#channel_country").value = countryData.name || '';
        document.querySelector("#channel_phonecode").value = countryData.dialCode || '';
        document.querySelector("#channel_contact_value").value = phoneNumber ? phoneNumber.replace(/\D/g,'') : '';
        document.querySelector("#channel_full_phone").value = phoneNumber ? channelIti.getNumber() : '';
    }
}

// ==================== VALIDATION FUNCTIONS ====================
function validateChannelField($field) {
    let fieldName = $field.attr('name');
    let fieldId = $field.attr('id');
    let value = $field.val() ? $field.val().trim() : '';
    let isValid = true;
    $field.next('.validation-error').remove();
    if ($field.attr('type') === 'hidden' || fieldName === 'message') return true;

    if (value === '') {
        showError($field, 'This field is required.');
        isValid = false;
        return isValid;
    }
    if (fieldId === 'channel_phone') {
        const digits = value.replace(/\D/g,'');
        if (digits.length < 10) {
            showError($field, 'Phone number must be at least 10 digits.');
            isValid = false;
        }
    }
    if (fieldName === 'email') {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            showError($field, 'Please enter a valid email address.');
            isValid = false;
        }
    }
    return isValid;
}

function showError($field, message) {
    $field.after('<span class="validation-error text-danger d-block mt-1">' + message + '</span>');
}

// ==================== LIVE VALIDATION ====================
$(document).on('input','#channelpartnerForm input:not([type="hidden"]), #channelpartnerForm select, #channelpartnerForm textarea',function(){
    $(this).next('.validation-error').remove();
});

$(document).on('blur','#channelpartnerForm input:not([type="hidden"]), #channelpartnerForm select',function(){
    validateChannelField($(this));
});

// ==================== FORM SUBMIT - FIXED ====================
$(document).on('submit','#channelpartnerForm',function(e){
    e.preventDefault();
    let form = $(this);
    let isValid = true;
    let $btn = form.find("button[type=submit]");
    form.find('.validation-error').remove();
    $("#channel_custom_captcha_error").hide();
    
    // Update phone fields before validation
    updateChannelPhoneFields();

    // Validate all required fields
    form.find('input, select, textarea').each(function(){
        if(this.id === 'channel_phone' || this.name === 'name' || this.name === 'company_name' || 
           this.name === 'email' || this.name === 'business_type' || this.name === 'industry_segment'){
            if(!validateChannelField($(this))) isValid = false;
        }
    });

    // Validate captcha
    let captcha = $("#channel_custom_captcha").val().trim();
    if(captcha === ""){
        $("#channel_custom_captcha_error").show().text("Please enter the captcha.");
        isValid = false;
    }

    if(!isValid){
        $btn.prop("disabled", false).text("Become a Channel Partner");
        return;
    }

    $btn.prop("disabled", true).text("Submitting...");
    let formData = form.serialize();

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json',
        timeout: 15000,
        success: function(response){
            console.log('Form submitted successfully', response);
            // FIXED: Only redirect on success
            if(response.success || response.status === 'success'){
                window.location.href = response.redirect || '{{ route('thankyou') }}';
            }
        },
        error: function(xhr){
            $btn.prop("disabled", false).text("Become a Channel Partner");
            
            if(xhr.status === 422){
                const errors = xhr.responseJSON.errors;
                form.find('.validation-error').remove();
                $("#channel_custom_captcha_error").hide();
                
                $.each(errors, function(key, value){
                    if(key === 'contact_custom_captcha'){
                        $("#channel_custom_captcha_error").show().text(value[0]);
                    }else if(key === 'contact'){
                        $('#channel_phone').after('<span class="validation-error text-danger d-block mt-1">'+value[0]+'</span>');
                    }else{
                        $(`[name="${key}"]`).after('<span class="validation-error text-danger d-block mt-1">'+value[0]+'</span>');
                    }
                });
                
                // Reload captcha on error
                $('#channel-captcha-image').attr('src', '{{ route("captcha.image") }}?' + Date.now());
                $("#channel_custom_captcha").val('');
            } else if(xhr.status === 500){
                alert("Server error occurred. Please try again later.");
            } else if(xhr.status === 0 || xhr.statusText === 'timeout'){
                alert("Request timeout. Please check your connection and try again.");
            } else {
                alert("An error occurred during submission. Please try again later.");
            }
        }
    });
    
    // REMOVED: Don't redirect immediately - wait for success response
});
</script>

@include('layouts.frontfooter')

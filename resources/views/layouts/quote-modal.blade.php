<style>
    .form-control:focus{
        border-color:var(--dd-color);
        box-shadow:none;
    }
    .intl-tel-input {
        width: 100%;
    }
</style>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request A Quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="contact">
                        <div class="contact_bot">
                            <form id="quoteForm" action="{{ route('quote.store') }}" method="POST">
                                @csrf
                                <div style="display:none;">
                                    <input type="text" name="website_url" id="website_url" value="">
                                </div>
                                
                                <div id="quote-form-messages" class="mt-3 text-center"></div>

                                <div class="row gx-5">
                                    <div class="col-lg-12 floating-group mb-3">
                                        <input type="text" id="quote_fname" name="name"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                            maxlength="70" placeholder=" " required>
                                        <label for="fname">First Name <span>*</span></label>
                                    </div>

                                    <div class="col-lg-12 floating-group mb-3">
                                        <input type="text" id="quote_company_name"
                                            name="company_name"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                            maxlength="70" placeholder=" " required>
                                        <label for="fname">Company Name <span>*</span></label>
                                    </div>

                                    <div class="col-lg-12 floating-group mb-3">
                                        <input type="tel" id="quote_phone" name="contact" placeholder=" "
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);"> 
                                    
                                        <input type="hidden" name="country" id="quote_country">
                                        <input type="hidden" name="phonecode" id="quote_phonecode">
                                        <input type="hidden" name="full_phone" id="quote_full_phone">
                                    </div>

                                    <div class="col-lg-12 floating-group mb-3">
                                        <input type="email" id="quote_email" maxlength="60" name="email" placeholder=" " required>
                                        <label for="email">Email <span>*</span></label>
                                    </div>
                                    
                                    <div class="col-lg-12 floating-group mv-3">
                                        <textarea id="quote_message" rows="1" name="message" maxlength="150"
                                            placeholder=" "></textarea>
                                        <label for="message">Message </label>
                                    </div>

                                    <div class="row align-items-center mb-4">
                                        <div class="col-auto">
                                            <img id="captcha-image" src="{{ route('captcha.image') }}"
                                                alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
                                        </div>

                                        <div class="col-auto">
                                            <svg style="cursor: pointer;" id="reload-button" width="23" height="20"
                                                viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047"
                                                    stroke="#333333" stroke-miterlimit="10" stroke-linecap="round" />
                                                <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333"
                                                    stroke-miterlimit="10" stroke-linecap="round" />
                                            </svg>
                                        </div>

                                        <div class="col-auto mt-3 mt-md-0">
                                            <input type="text" id="custom_captcha" placeholder="Enter captcha"
                                                maxlength="4" inputmode="numeric" pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,4);"
                                                autocomplete="off" name="custom_captcha">
                                        </div>
                                        <small id="custom_captcha_error" class="text-danger text-start"
                                            style="display:none;">Please Verify Captcha.</small>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="button" id="quoteSubmitBtn" class="sub_btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const quoteInput = document.querySelector("#quote_phone");
        const form = $('#quoteForm');
        const submitBtn = $('#quoteSubmitBtn');
        const formMessages = $('#quote-form-messages');
    
        // Initialize intl-tel-input
        const quoteIti = window.intlTelInput(quoteInput, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function(success, failure) {
                fetch('https://ipapi.co/json')
                    .then(res => res.json())
                    .then(data => success(data.country_code))
                    .catch(() => success('in'));
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
        });

        // CAPTCHA Reload Logic
        $('#reload-button').on('click', function() {
            var captchaImage = $('#captcha-image');
            captchaImage.attr('src', captchaImage.attr('src').split('?')[0] + '?' + Date.now());
            $('#custom_captcha').val('');
            $('#custom_captcha_error').hide();
        });
    
        // --- AJAX Form Submission Handler ---
        $(submitBtn).on('click', function (e) {
            e.preventDefault(); 
            
            // 1. Populate hidden fields
            const countryData = quoteIti.getSelectedCountryData();
            $('#quote_country').val(countryData.name);
            $('#quote_phonecode').val(countryData.dialCode);
            $('#quote_full_phone').val(quoteIti.getNumber());
            
            // 2. Client-side CAPTCHA Check (Basic Length)
            const captchaInput = $('#custom_captcha');
            if (captchaInput.val().length !== 4) {
                 $('#custom_captcha_error').show().text('Please enter the 4-digit captcha.');
                 return; // Stop submission
            } else {
                 $('#custom_captcha_error').hide();
            }

            // 3. AJAX Submission
            submitBtn.attr('disabled', true).text('Submitting...');
            formMessages.empty().removeClass('text-danger text-success');

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(), // Includes custom_captcha now that it has a name attribute
                dataType: 'json', 
                
                success: function(response) {
                    if (response.status === 'success' && response.redirect) {
                        window.location.href = response.redirect;
                    } 
                },
                error: function(xhr) {
                    submitBtn.attr('disabled', false).text('Submit');
                    formMessages.empty().removeClass('text-success').addClass('text-danger');
                    
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        
                        // Check specifically for CAPTCHA errors
                        if (errors.custom_captcha) {
                             errorMsg = errors.custom_captcha[0];
                             $('#reload-button').click(); // Reload CAPTCHA on server failure
                        } else {
                             // Display generic validation error message
                             errorMsg = 'Please correct the highlighted fields: ';
                             $.each(errors, function(key, value) {
                                 errorMsg += value[0] + ' ';
                             });
                        }
                        formMessages.text(errorMsg);
                    } else {
                        formMessages.text('A network error occurred. Please check your connection.');
                    }
                }
            });
        });
    });
    </script>
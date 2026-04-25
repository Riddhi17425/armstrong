<footer class="section-pt section-mt">
    <div class="container">
        <div class="row ft-mb">
            <div class="col-md-3">
                <a href="{{ route('front.home') }}"><img src="{{ asset('public/front/img/ft-logo.svg') }}" alt="footer logo" class="img-fluid mb-4"></a>
                <P class="mb-4">The one and only complete solution providers of high-quality industrial finishing
                    machines and spare parts.</P>
                <div class="ft_contact">
                    <div class="mb-1">
                        <span>T:</span> <a href="tel:07927543747">079-27543747</a>
                    </div>
                    <div class="d-flex gap-1 mb-1">
                        <span>M: </span> <span><a href="tel:916358740011"> +91 63587 40011</a> , <a href="tel:916358740024"> +91 63587 40024</a> , <br/> <a href="tel:+916358740025"> +91 63587 40025</a></span>
                    </div>
                    <div class="mb-1">
                        <span>E:</span> <a href="mailto:inquiry@armstrongex.com"> inquiry@armstrongex.com</a> <br>
                        <span>E:</span> <a href="mailto:info@armstrongex.com"> info@armstrongex.com</a> <br>
                        <span>E:</span> <a href="mailto:exportsales@armstrongex.com"> exportsales@armstrongex.com</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 row ft_items">
                <div class="ft_menu col-md-2 col-6 mb-3 mb-md-0">
                    <h3 class="ft_title">Quick Links</h3>
                    <ul class="ft_list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('research.development') }}">R&D</a></li>
                        <li><a href="{{ route('blog') }}">Blogs</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('channelpartner') }}">Channel Partner</a></li>
                    </ul>
                    <h3 class="ft_title mt-4">About Us</h3>
                    <ul class="ft_list">
                        <li><a href="{{route('about')}}">Company Profile</a></li>
                        <li><a href="{{ route('our.infrastructure') }}">Our Infrastructure</a></li>
                        <li><a href="{{ route('certificates') }}">Certificates</a></li>
                    </ul>
                </div>
                @php
                    use App\Models\ProductCategory;
                    $product_categories = ProductCategory::where('status', 'Active')->get();
                @endphp
                <div class="ft_menu col-md-3 col-6 mb-3 mb-md-0">
                    <h3 class="ft_title">Products</h3>
                    <ul class="ft_list">
                        @foreach($product_categories as $category)
                            <li>
                                <a href="{{ route('products.listing', $category->url) }}">
                                    {{ $category->name }}
                                     @if($category->name == 'Mulch Film Punching' || $category->name == 'Needle Loom')
                                                            Machine
                                                        @elseif($category->name=='Spare Parts')
                                                        
                                                        @else
                                                            Machines
                                                        @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ft_menu col-md-2 col-6 mb-3 mb-md-0">
                    <h3 class="ft_title">Media</h3>
                    <ul class="ft_list">
                        <li><a href="{{route('front.event')}}">Events</a></li>
                        <!--<li><a href="{{route('front.gallery')}}">Gallery</a></li>-->
                        <li><a href="{{route('front.video')}}">Videos</a></li>
                    </ul>
                    <div class="d-none d-md-block">
                        <h3 class="ft_title mt-4">Careers</h3>
                        <ul class="ft_list">
                            <li><a href="{{route('career')}}">Open Positions</a></li>
                            <li><a href="{{route('front.lifearmstrong')}}">Life at Armstrong</a></li>
                        </ul>
                    </div>
                </div>
                <div class="ft_menu col-md-2 col-6 mb-3 mb-md-0 d-block d-md-none">
                    <h3 class="ft_title">Careers</h3>
                    <ul class="ft_list">
                        <li><a href="{{route('career')}}">Open Positions</a></li>
                        <li><a href="{{route('front.lifearmstrong')}}">Life at Armstrong</a></li>
                    </ul>
                </div>
                <div class="col-xxl-3 col-lg-4 ft_menu">
                    <h3 class="ft_title">Locate Us</h3>
                    <h3 class="address_title">Office Address:</h3>
                    <a href="https://www.google.com/maps/place/Navajivan+Trust+Campus/@23.043368,72.5633172,17z/data=!3m1!4b1!4m6!3m5!1s0x395e848ac8a7faf3:0xef7e3956674804fc!8m2!3d23.043368!4d72.5658921!16s%2Fg%2F1tcztbjm?entry=ttu&g_ep=EgoyMDI1MDkxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                    <p>6th Floor, SARAP Building, Opp. Navjivan Press, B/H Gujarat Vidyapith, Ahmedabad - 380014, Gujarat, India.</p>
                    </a>
                    
                   <!-- <h3 class="address_title mt-3">Factory Address:</h3>-->
                   <!-- <p class="mb-0"><b>Unit 1</b></p>-->
                   <!--<a href="https://www.google.com/maps/search/Plot+no.+A2%2F502-1,+Opp.+Indo-German+Tool+Room+Phase+-+4,+GIDC+Estate,+Vatva,+Ahmedabad,+Gujarat+382445,+India/@22.9713059,72.6397786,17z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI1MDgxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">-->
                   <!--     <p>Plot No. A2/502-1, Opp. Indo German Tool Room, Phase-4, GIDC Estate, Vatva, Ahmedabad - 382445, Gujarat, India.</p>-->
                   <!-- </a>-->
                   <!--  <p class="mb-0"><b>Unit 2</b></p>-->
                   <!-- <a href="https://www.google.com/maps/search/7603,+Phase+IV,+GIDC+Industrial+Estate,+Vatva,+Ahmedabad+-+382445,+Gujarat,+India./@22.9739435,72.6536447,12z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI1MDkxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">-->
                   <!-- <p>7603, Phase IV, GIDC Industrial Estate, Vatva, Ahmedabad - 382445, Gujarat, India.</p>-->
                   <!-- </a> -->
                   <!-- <p class="mb-0"><b>Unit 3</b></p>-->
                   <!-- <a href="https://www.google.com/maps/place/Swarnim+Industrial+Park/@22.9739649,72.7308973,16z/data=!4m10!1m2!2m1!1sA-55,+Swarnim+Ind+Park,+Bakrol+Road,+Bakrol+Bujrang,+Ahmedabad-382430,+Gujarat,+India.!3m6!1s0x395e62c80f6936fb:0x76902217b7bddf0e!8m2!3d22.9758715!4d72.7356428!15sClZBLTU1LCBTd2FybmltIEluZCBQYXJrLCBCYWtyb2wgUm9hZCwgQmFrcm9sIEJ1anJhbmcsIEFobWVkYWJhZC0zODI0MzAsIEd1amFyYXQsIEluZGlhLpIBFm1hY2hpbmluZ19tYW51ZmFjdHVyZXKqAZ4BEAEqJSIhYSA1NSBzd2FybmltIGluZCBwYXJrIGJha3JvbCByb2FkKAAyHhABIhoM-idHTV2-xq4dHlut32m5av40p1O654ZnATJTEAIiT2EgNTUgc3dhcm5pbSBpbmQgcGFyayBiYWtyb2wgcm9hZCBiYWtyb2wgYnVqcmFuZyBhaG1lZGFiYWQgMzgyNDMwIGd1amFyYXQgaW5kaWHgAQA!16s%2Fg%2F11dd_nxsbv?entry=ttu&g_ep=EgoyMDI1MDkxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank">-->
                   <!-- <p>A-55, Swarnim Ind Park, Bakrol Road, Bakrol Bujrang, Ahmedabad-382430, Gujarat, India.</p>-->
                   <!-- </a> -->
                    
                   
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex align-items-center justify-content-between copyrigt_text">
            <div>
                <p class="mb-0">All Rights Reserved | Armstrong © <?php echo date('Y'); ?></p>
            </div>
            <div class="social_items">
                <a href="https://www.facebook.com/armstrong.stitchman" target="_blank"><img src="{{ asset('public/front//img/facebook_icon.svg') }}" alt="facebook" class="img-fluid"></a>
                <a href="https://www.linkedin.com/company/armstrong-india/" target="_blank"><img src="{{ asset('public/front//img/linkedin_icon.svg') }}" alt="linkedin" class="img-fluid"></a>
                <a href="https://www.youtube.com/@armstrongmachineryllp1330" target="_blank"><img src="{{ asset('public/front//img/youtube_icon.svg') }}" alt="youtube" class="img-fluid"></a>
            </div>
            <div class="d-flex">
                <a href="{{route('privacy-policy')}}" class="">Privacy Policy</a><span class="mx-2">|</span><a href="{{route('terms-condition')}}" class="">Terms &
                    Conditions</a>
            </div>
        </div>
    </div>
</footer>


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Enquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="contact">
                    <div class="contact_bot">
                        <form id="productenquiryForm" action="{{ route('product.enquiry.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="p_fname" name="name" onkeyup="hideerrormessage(this)" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();" maxlength="70" placeholder=" ">
                                    <label for="p_fname" class="enquiry_lable">Full Name <span>*</span></label>
                                </div>

                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="p_company_name" onkeyup="hideerrormessage(this)" name="company_name" oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();" maxlength="70" placeholder=" ">
                                    <label for="p_company_name" class="enquiry_lable">Company Name <span>*</span></label>
                                </div>
                                
                                <div class="col-lg-12 floating-group">
                                    <input type="hidden" id="original_product_url" name="original_product_url">
                                    <input type="text" id="t_product" onkeyup="hideerrormessage(this)" name="product_name" maxlength="70" placeholder=" " readonly>
                                    <label for="product_name" class="enquiry_lable">Product Name</label>
                                </div>
                                
                                <!--<div class="col-lg-6 floating-group">-->
                                <!--    <input type="tel" id="p_phone" name="contact" placeholder=" " oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">-->
                                <!--    <label for="p_email" class="enquiry_lable">Contact Number <span>*</span></label>-->
                                <!--</div>-->
                                <div class="col-lg-6 floating-group">
                                    <input type="tel" id="p_phone" name="contact_display" placeholder=" " oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                                    <input type="hidden" id="p_country_name" name="country">
                                    <input type="hidden" id="p_full_phone" name="contact"> <!-- Combined code+phone -->
                                    <label for="p_phone" class="enquiry_lable">Contact Number <span>*</span></label>
                                </div>
                                
                            
                                <div class="col-lg-6 floating-group">
                                    <input type="text" id="p_email" maxlength="60" name="email" placeholder=" ">
                                    <label for="p_email" class="enquiry_lable">Email <span>*</span></label>
                                </div>

                                <div class="col-lg-12 floating-group">
                                    <textarea id="p_message" rows="1" onkeyup="hideerrormessage(this)" name="message" maxlength="150" placeholder=" "></textarea>
                                    <label for="message" class="enquiry_lable">Message </label>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <!-- Captcha Image -->
                                    <div class="col-auto">
                                        <img id="product-captcha-image" src="{{ route('captcha.image') }}" alt="CAPTCHA Image" style="border: 1px solid #ccc; height: 40px;">
                                    </div>

                                    <!-- Reload Button -->
                                    <div class="col-auto">
                                        <svg style="cursor: pointer;" id="product-reload-button" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.539 9.54947C19.539 4.46972 15.5667 0.755859 10.4869 0.755859C5.40715 0.755859 1.34335 4.81966 1.34335 9.89941C1.34335 14.9792 5.40715 19.043 10.4869 19.043C12.9252 19.043 14.9571 18.027 16.5826 16.6047" stroke="#333333" stroke-miterlimit="10" stroke-linecap="round"/>
                                            <path d="M21.5833 5.86837L19.589 9.66244L15.4799 8.32953" stroke="#333" stroke-miterlimit="10" stroke-linecap="round"/>
                                        </svg>
                                    </div>

                                    <!-- Captcha Input -->
                                    <div class="col-auto mt-3 mt-md-0">
                                        <input 
                                            type="text" 
                                            id="product_custom_captcha" 
                                            placeholder="Enter captcha" 
                                             oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,4);" 
                                            autocomplete="off">
                                    </div>
                                    <small id="product_custom_captcha_error" class="text-danger text-start" style="display:none;">Please Verify Captcha.</small>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit"  class="sub_btn">Submit</button>
                                </div>
                            </div> 
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- whatsapp  icon -->

<!--<a href="https://api.whatsapp.com/send?phone=916358820089&text=Hello,%20I'm%20visiting%20your%20website%20and%20would%20like%20to%20know%20more" class="whatsapp-float" target="_blank">-->
<!--    <img src="{{ asset('public/front/img/WhatsApp.svg') }}" alt="WhatsApp">-->
<!--</a>-->
<!--<img style="cursor: pointer; width:64px" src="{{ asset('public/front/img/WhatsApp.svg') }}" alt="whatsapp" class="whatsapp-float" data-bs-toggle="modal" data-bs-target="#exampleModal-4">-->
<div class="float-buttons">
        <div class="WhatsAppButton"> 
            <a data-bs-toggle="modal" data-bs-target="#exampleModal-4" target="_blank"> 
                <i class="fab fa-whatsapp" id="whatsapp"></i>
                <!--<span>WhatsApp<br><small>9163587 40011 </small></span>-->
             </a>
        </div>
    </div>
<a  class="request_btn Brochurs_btn_side" href="{{ asset('public/Armstrong_Brochure_2025.pdf') }}" target="_blank">Brochure</a>


<style>
  .iti__tel-input {
    padding-left: 85px !important;
  }

  .iti__country-container {
    top: 17px !important;
  }

  /*.contact .floating-group span {*/
  /*  color: #666666;*/
  /*}*/

  .error-msg {
    display: block;
  }

  .iti--inline-dropdown {
    display: block !important;
  }
  
  .iti__selected-country
  {
      height:auto !important;
  }
  
  .iti__selected-country
  {
      height:auto !important;
  }
  
  .popup-box_whatsapp {
     overflow: visible; 
}
  
  .popup-box_whatsapp .iti__country-container {
    top: 10px !important;
  }
  
</style>
<div class="modal fade" id="exampleModal-4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-dialog">
    <div class="modal-content popup-box popup-box_whatsapp">

      <div class="modal-header popup-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat with us on WhatsApp</h5>
        <button type="button" class="btn-close white-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="{{ route('whatsaapinquiry') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label">Message <span class="text-danger"></span></label>
            <textarea class="form-control popup-input" rows="3" name="message" id="message_set"></textarea>
          </div>

          <!--<div class="mb-3">-->
          <!--  <label class="form-label">Contact No. <span class="text-danger">*</span></label>-->
          <!--  <input type="text" class="form-control popup-input" required name="number"-->
          <!--    id="number_set"-->
          <!--    oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">-->
          <!--</div>-->
          <div class="mb-3">
            <label class="form-label">Contact No. <span class="text-danger">*</span></label>
        
            <input 
                type="tel"
                class="form-control popup-input"
                id="wa_phone"
                placeholder=""
                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);"
                required
            >
        
             <!--Hidden fields -->
            <input type="hidden" name="number" id="wa_full_phone">
            <input type="hidden" name="country" id="wa_country_name">
        </div>


          <div class="d-grid">
            <button type="submit" class="btn popup-btn">Start Chat with Us</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

@include('layouts.cookies')
@if(session('whatsapp_url'))
    <script>
        window.onload = function () {
            window.open("{{ session('whatsapp_url') }}", "_blank");
        };
    </script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<script src="{{ asset('public/front/js/main.js') }}" defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoad&render=explicit" async defer></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>
<!-- bootstrap -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const phoneInputField = document.querySelector("#p_phone");
    const countryNameField = document.querySelector("#p_country_name");
    const fullPhoneField = document.querySelector("#p_full_phone");

    // Initialize plugin
    const iti = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        separateDialCode: true,
        preferredCountries: ["in", "us", "gb", "ae"],
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("in"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js",
    });

    // On form submit — combine country code + number and country name
    const form = document.getElementById("productenquiryForm");
    form.addEventListener("submit", function (e) {
        const countryData = iti.getSelectedCountryData();
        const dialCode = countryData.dialCode;
        const countryName = countryData.name;
        const phoneNumber = phoneInputField.value.replace(/\s+/g, "");

        fullPhoneField.value = `+${dialCode}${phoneNumber}`;
        countryNameField.value = countryName;
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Extract product name from URL
    const urlPath = window.location.pathname;
    const productMatch = urlPath.match(/\/product\/([^\/]+)/);
    // console.log('11111111111111111111111 '  + productMatch)
    if(productMatch != null){
        // console.log('2222222222222222222222')
        $("#original_product_url").val(productMatch[1]);
        const productUrlField = document.getElementById("product_url");
        if (productMatch && productMatch[1]) {
            let productName = productMatch[1].replace(/-/g, ' ');
            productName = productName.replace(/\b\w/g, char => char.toUpperCase());
    
            const productField = document.getElementById("t_product");
            if (productField) {
                productField.value = productName; 
            }
        }
    }else{
        
        var modal = document.getElementById('exampleModal2');
    
        modal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            var productName = button.getAttribute('data-product');
     
            // Update the modal input field
            var input = modal.querySelector('#t_product');
            input.value = productName;
        });
        
    }
});
</script>
<script>
document.querySelectorAll(".mega_menu_wrapper").forEach(wrapper => {
    const icons = wrapper.querySelectorAll(".icon");
    const images = wrapper.querySelectorAll(".icons_bg img");

    const iconBgMap = {
        icon1: ".main-bg1",
        icon2: ".main-bg2",
        icon3: ".main-bg3"
    };

    let lastHovered = ".main-bg"; // default bg

    function showImage(selector) {
        images.forEach(img => img.style.display = "none");
        const target = wrapper.querySelector(selector);
        if (target) target.style.display = "block";
    }

    // initial load
    showImage(lastHovered);

    // hover on icons
    icons.forEach(icon => {
        icon.addEventListener("mouseenter", () => {
            const iconClass = [...icon.classList].find(c => c.startsWith("icon") && c !== "icon");
            if (iconBgMap[iconClass]) {
                showImage(iconBgMap[iconClass]);
                lastHovered = iconBgMap[iconClass]; // save last hovered
            }
        });
    });

    // **reset bg when dropdown opens**
    const parentNavItem = wrapper.closest(".nav-item");
    if (parentNavItem) {
        parentNavItem.addEventListener("mouseenter", () => {
            lastHovered = ".main-bg"; // reset to default
            showImage(lastHovered);
        });
    }
});
</script>
<script>
$(document).ready(function () {
   
    $('#exampleModal-4').on('shown.bs.modal', function () {
        isAnyModalOpen = true;
    });
    
    $('#exampleModal-4').on('hidden.bs.modal', function () {
        isAnyModalOpen = false;
    });

    // Blocked disposable/spam domains
    const blockedDomains = [
        "mailinator.com",
        "tempmail.com",
        "10minutemail.com",
        "yopmail.com",
        "guerrillamail.com",
        "maildrop.cc",
        "dispostable.com",
        "trashmail.com",
        "spam.com",
        "test.com",
        "example.com"
    ];

    function getEmailDomain(email) {
        return email.substring(email.lastIndexOf("@") + 1).toLowerCase();
    }

    // Stricter regex: no start/end dot, no consecutive dots
    const emailRegex = /^(?!.*\.\.)(?!\.)(?!.*\.$)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    // Reload captcha
    $('#product-reload-button').click(function() {
        $('#product-captcha-image').attr('src', '{{ route("captcha.image") }}?' + Date.now());
    });

    // Helper function to show error after label
    function showErrorAfterLabel($input, message) {
        let $label = $("label[for='" + $input.attr("id") + "']");
        $label.next(".error-msg").remove();
        $label.after('<small class="error-msg text-danger">' + message + '</small>');
    }

    // Clear error messages while typing
    $("#productenquiryForm input, #productenquiryForm textarea").on("input", function () {
        $("label[for='" + $(this).attr("id") + "']").next(".error-msg").remove();
    });

    // Blur validation for required text fields
    $("#p_fname, #p_company_name, #t_product").on("blur", function () {
        let val = $(this).val().trim();
        if (val === "") {
            showErrorAfterLabel($(this), "This field is required.");
        } else {
            $("label[for='" + $(this).attr("id") + "']").next(".error-msg").remove();
        }
    });

    // Phone blur validation
    $("#p_phone").on("blur", function () {
        let phone = $(this).val().trim();
        if (phone === "") {
            showErrorAfterLabel($(this), "Phone number is required.");
        } else if (!/^\d{10,20}$/.test(phone)) {
            showErrorAfterLabel($(this), "Enter a valid phone number (10–20 digits).");
        } else {
            $("label[for='p_phone']").next(".error-msg").remove();
        }
    });

    // Email blur validation
    $("#p_email").on("blur", function () {
        let email = $(this).val().trim();
        if (email === "") {
            showErrorAfterLabel($(this), "Email is required.");
        } else if (!emailRegex.test(email)) {
            showErrorAfterLabel($(this), "Enter a valid email address.");
        } else if (blockedDomains.includes(getEmailDomain(email))) {
            showErrorAfterLabel($(this), "Invalid email addresses are not allowed.");
        } else {
            $("label[for='p_email']").next(".error-msg").remove();
        }
    });

    // Main form submit
    $("#productenquiryForm").on("submit", function (e) {
        e.preventDefault(); // stop default submit
        let isValid = true;

        // Remove previous errors
        $(".error-msg").remove();
        $("#product_custom_captcha_error").hide();

        // Full Name
        if ($("#p_fname").val().trim() === "") {
            showErrorAfterLabel($("#p_fname"), "Full name is required.");
            isValid = false;
        }

        // Company Name
        if ($("#p_company_name").val().trim() === "") {
            showErrorAfterLabel($("#p_company_name"), "Company name is required.");
            isValid = false;
        }

        // Product Name
        if ($("#t_product").val().trim() === "") {
            showErrorAfterLabel($("#t_product"), "Product name is required.");
            isValid = false;
        }

        // Phone
        let phone = $("#p_phone").val().trim();
        if (phone === "") {
            showErrorAfterLabel($("#p_phone"), "Phone number is required.");
            isValid = false;
        } else if (!/^\d{10,20}$/.test(phone)) {
            showErrorAfterLabel($("#p_phone"), "Enter a valid phone number (10–20 digits).");
            isValid = false;
        }

        // Email
        let email = $("#p_email").val().trim();
        if (email === "") {
            showErrorAfterLabel($("#p_email"), "Email is required.");
            isValid = false;
        } else if (!emailRegex.test(email)) {
            showErrorAfterLabel($("#p_email"), "Enter a valid email address.");
            isValid = false;
        } else if (blockedDomains.includes(getEmailDomain(email))) {
            showErrorAfterLabel($("#p_email"), "Invalid email addresses are not allowed.");
            isValid = false;
        }

        // Captcha
        let captcha = $("#product_custom_captcha").val().trim();
        if (captcha === "") {
            $("#product_custom_captcha_error").show().text("Please enter the captcha.");
            isValid = false;
        }

        if (!isValid) return;

        // Disable button while verifying captcha
        let $btn = $(this).find("button[type=submit]");
        $btn.prop("disabled", true).text("Verifying captcha...");

        $.ajax({
            url: '{{ route("captcha.verify") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                custom_captcha: captcha
            },
            success: function(response) {
                if (response.success) {
                    $btn.text("Submitting...");
                    // native submit AFTER validation
                    $("#productenquiryForm")[0].submit();
                } else {
                    $("#product_custom_captcha_error").show().text(response.message);
                    $btn.prop("disabled", false).text("Submit");
                    $("#product-captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
                }
            },
            error: function() {
                alert("Something went wrong. Please try again.");
                $btn.prop("disabled", false).text("Submit");
                $("#product-captcha-image").attr("src", "{{ route('captcha.image') }}?" + Date.now());
            }
        });
    });
});
</script>
<!--whatsapp-->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const waPhoneInput = document.querySelector("#wa_phone");
    const waFullPhone = document.querySelector("#wa_full_phone");
    const waCountryName = document.querySelector("#wa_country_name");

    if (!waPhoneInput) return;

    const waIti = window.intlTelInput(waPhoneInput, {
        initialCountry: "auto",
        separateDialCode: true,
        preferredCountries: ["in", "ae", "us", "gb"],
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("in"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js",
    });

    // Handle WhatsApp form submit
    const waForm = waPhoneInput.closest("form");

    waForm.addEventListener("submit", function () {

        const countryData = waIti.getSelectedCountryData();
        const dialCode = countryData.dialCode;
        const countryName = countryData.name;
        const phone = waPhoneInput.value.replace(/\s+/g, "");

        waFullPhone.value = `+${dialCode}${phone}`;
        waCountryName.value = countryName;
    });

});
</script>

<!--whatsapp end-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script> if (window.innerWidth < 768) {
  AOS.init({ disable: true });
} else {
  AOS.init({ duration: 1000 });
}
</script>

</body>
</html>
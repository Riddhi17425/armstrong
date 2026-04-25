<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/Favicon_Logo.svg') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <title>QR Code Form</title>

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family: 'Nunito Sans', sans-serif; }
        .container { background-color: #F0F0F0; width: 400px; margin: 0 auto; padding: 20px; border-radius: 8px; }
        form { display: grid; grid-template-columns: 1fr; grid-gap: 20px; margin-top:10px; }
        .form-field { display: flex; flex-direction: column; }
        input[type="text"], input[type="email"], input[type="tel"], select {
            height: 2.4em; font-size: 1em; padding-left: 5px;
            outline: none; border: 2px solid transparent;
            border-radius: 5px; background-color: #ffffff;
        }
        label { font-size: 1.1em; margin-bottom: 7px; }
        textarea { resize: none; font-size: 1em; padding: 6px 5px; border-radius: 5px; }
        .btn {
            background-color: #ED3337; border-radius: 40px;
            border: none; color: #fff;
            padding: 10px 20px; font-size: 1.2em;
            cursor: pointer; width: fit-content; margin: 0 auto;
        }
        .btn:disabled { background-color: #6c757d; cursor: not-allowed; }
        .spinner {
            width: 14px; height: 14px;
            border: 2px solid white; border-top: 2px solid transparent;
            border-radius: 50%; display: inline-block;
            animation: spin 0.8s linear infinite; margin-right: 5px;
        }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        @media (max-width: 415px) { .container { width: 100%; } }
        .sucss-msg { color: green; margin: 20px 0; }

        /* IMAGE BUTTON DESIGN */
        .image-btns {
            display: flex;
            /*flex-direction: column;*/
            gap: 12px;
        }
        .img-btn {
            width: 100%;
            padding: 12px 16px;
            border-radius: 14px;
            border: 1px solid #d0d7de;
            background: #ffffff;
            font-size: 15px;
            cursor: pointer;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .img-btn.gray {
            background: #f6f8fa;
        }
        .img-btn:hover {
            background: #eef2f5;
        }
    </style>
</head>

<body>
<div style="margin:0 auto; max-width:600px; display:flex; justify-content:center;">
    <div class="container">

        <div style="text-align:center;">
            <img src="{{ asset('public/Favicon_Logo.svg') }}" style="max-width:100px;">
        </div>

        @if(session('success'))
            <p class="sucss-msg">{{ session('success') }}</p>
        @endif

        <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data" onsubmit="handleSubmit(event)">
            @csrf

            <div class="form-field">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Your Name" required>
            </div>

            <div class="form-field">
                <label>Company Name</label>
                <input type="text" name="company_name" placeholder="Your Company Name" required>
            </div>

            <div class="form-field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Your Email" required>
            </div>

            <div class="form-field">
                <label>Mobile No.</label>
                <input type="tel" name="phone" minlength="10" maxlength="10" placeholder="Your Contact No." required>
            </div>

            <div class="form-field">
                <label>Country</label>
                <select id="country" name="country" required style="width:100%;">
                    <option disabled selected>Select Country</option>
                    @foreach($country as $countrys)
                        <option value="{{ $countrys->name }}">{{ $countrys->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field">
                <label>Note</label>
                <textarea name="note" placeholder="Note"></textarea>
            </div>

            <!-- IMAGE UPLOAD -->
            <div class="form-field">
                <label>Choose Image Option</label>

                <div class="image-btns">
                    <button type="button" class="img-btn" onclick="openGallery()">
                        📁 Upload Image
                    </button>

                    <button type="button" class="img-btn gray" onclick="openCamera()">
                        📷 Take Picture
                    </button>
                </div>

                <!--<input type="file" name="image" id="imageInput" accept="image/*" hidden>-->
                <input type="file" name="image" id="imageInput" accept="image/*" hidden>

                <small id="fileName" style="margin-top:8px; color:#333; font-size:14px;"></small>

            </div>

            <div class="form-field">
                <button type="submit" id="submitBtn" class="btn">Submit</button>
            </div>
        </form>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
// 1. Handle Form Submission UI
function handleSubmit(e) {
    const btn = document.getElementById("submitBtn");
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span> Submitting...';
}

// 2. Image Upload Triggers
function openGallery() {
    const input = document.getElementById('imageInput');
    input.removeAttribute('capture');
    input.click();
}

function openCamera() {
    const input = document.getElementById('imageInput');
    input.setAttribute('capture', 'environment');
    input.click();
}

// Display selected file name
document.getElementById('imageInput').addEventListener('change', function () {
    const fileNameEl = document.getElementById('fileName');
    if (this.files && this.files.length > 0) {
        fileNameEl.textContent = '📎 Selected: ' + this.files[0].name;
    } else {
        fileNameEl.textContent = '';
    }
});

// 3. Country Fetching Logic
$(document).ready(function () {
    // Initialize Select2
    $("#country").select2({ 
        placeholder: "Search or Select Country", 
        width: "100%" 
    });

    // Function to set value in Select2
    function setCountry(countryName) {
        if (!countryName) return;
        
        // Find if the option exists (case-insensitive search)
        let matchedValue = null;
        $('#country option').each(function() {
            if ($(this).text().toLowerCase().trim() === countryName.toLowerCase().trim()) {
                matchedValue = $(this).val();
                return false; // break loop
            }
        });

        if (matchedValue) {
            $('#country').val(matchedValue).trigger('change');
            console.log("Auto-selected: " + matchedValue);
        }
    }

    // Attempt 1: Using ipapi.co
    $.getJSON('https://ipapi.co/json/', function(data) {
        if (data && data.country_name) {
            setCountry(data.country_name);
        }
    }).fail(function() {
        // Attempt 2 Fallback: Using ip-api.com
        $.getJSON('https://ip-api.com/json/?callback=?', function(data) {
            if (data && data.country) {
                setCountry(data.country);
            }
        });
    });
});
</script>

</body>
</html>

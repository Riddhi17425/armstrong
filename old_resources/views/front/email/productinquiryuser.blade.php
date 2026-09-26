<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Armstrong</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0; padding:0; background-color:#ffffff;">
  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center">
        <!-- Main container -->
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" style="max-width:600px; width:100%;">

          <!-- Header -->
          <tr>
      <td style="padding:30px 20px 15px 20px;">
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
          <tr>
            <!-- Logo -->
            <td align="left" style="vertical-align:middle;">
              <img src="{{ asset('public/front/img/logo.png')}}" alt="Logo" style="display:block; max-width:150px;">
            </td>
            <!-- Contact -->
            <td align="right" style="font-family:Arial, sans-serif; font-size:12px; color:#666666; padding-left: 30px;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="padding-right:10px; border-right:1px solid #888888;white-space: nowrap;">
                    <a href="tel:+916358740011" style="color:#666666; text-decoration:none;white-space: nowrap;">
                      <strong style="color:#182653;">M :</strong> +91 63587 40011
                    </a><br>
                    <a href="tel:+916358740024" style="color:#666666; text-decoration:none;white-space: nowrap;">
                      <strong style="color:#182653;">M :</strong> +91 63587 40024
                    </a>
                  </td>
                  <td style="padding-left:10px;white-space: nowrap;">
                    <a href="tel:+916358740025" style="color:#666666; text-decoration:none;white-space: nowrap;">
                      <strong style="color:#182653;">M :</strong> +91 63587 40025
                    </a><br>
                    <a href="mailto:inquiry@armstrongex.com" style="color:#666666; text-decoration:none;white-space: nowrap;">
                      <strong style="color:#182653;">E :</strong> inquiry@armstrongex.com
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>

          <!-- Divider -->
          <tr>
            <td colspan="2" style="background:#94BDDA; height:4px; line-height:4px; font-size:0;"></td>
          </tr>

          <!-- Banner -->
          <!--<tr>-->
          <!--  <td colspan="2" style="padding:20px;">-->
          <!--    <img src="{{ asset('public/front/img/eaperience.png')}}" alt="Banner" style="display:block; width:100%; height:auto;">-->
          <!--  </td>-->
          <!--</tr>-->

          <!-- Content -->
          <tr>
            <td colspan="2" style="padding:0 20px 20px 20px; font-family:Arial, sans-serif; color:#666666;">
                <p style="font-size:16px;color:#111;">Dear {{ $data['name'] }},</p>
              <h1 style="margin:20px 0 10px; text-align:center; font-size:16px; font-weight:600; color:#111111;">Thank you for reaching out to Armstrong Products.</h1>
       
              <p style="margin:0; font-size:14px; line-height:22px;">
               We have received your product enquiry and shared it with our sales and technical support team. Our team will review your request and get back to you shortly.</p>
                <p style="margin-top:20px; font-size:14px; line-height:22px;">We appreciate your interest in our products and look forward to assisting you.</p>
              
              <div style="text-align:center;margin-top:20px;">
    <a style="
    padding: 5px;
    background-color: #E41E29;
    color: white;
    text-decoration: none;
    border-radius: 5px;"
    href="https://www.armstrongex.com/public/Armstrong_Brochure_2025.pdf" target="_blank">
        <svg width="28" height="14" viewBox="0 0 28 14" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M6.71029 12.2085L1.50196 7.00016M1.50196 7.00016L6.71029 1.79183M1.50196 7.00016H26.502"
                stroke="white" stroke-width="2.08333" stroke-linecap="round" stroke-linejoin="round" />
        </svg>Product Brochure
    </a>
</div>
            </td>
          </tr>
          <!-- Contact Info Row -->
          <tr>
  <td colspan="2" style="padding:20px;">
    <hr style="border:none; border-top:1px solid #DDDDDD; margin:0 0 15px;">
    <p style="font-size:14px; line-height:22px; color:#666666; margin:0 0 15px; text-align:center; font-family:Arial, sans-serif;">
      If you have any urgent questions, feel free to contact us
    </p>

    <table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" style="white-space:nowrap;">
      <tr>
        <!-- Email -->
        <td style="font-size:14px; font-family:Arial, sans-serif; color:#666666; padding-right:10px; border-right:1px solid #888888; white-space:nowrap;">
          <a href="mailto:inquiry@armstrongex.com" style="color:#666666; text-decoration:none; white-space:nowrap; display:inline-block;">
            <img src="{{ asset('public/front/img/email.png')}}" alt="Email" style="vertical-align:middle; margin-right:5px;"> inquiry@armstrongex.com
          </a>
        </td>

        <!-- Phone -->
        <td style="font-size:14px; font-family:Arial, sans-serif; color:#666666; padding-left:10px; white-space:nowrap;">
          <a href="tel:+916358740011" style="color:#666666; text-decoration:none; white-space:nowrap; display:inline-block;">
            <img src="{{ asset('public/front/img/phone.png')}}" alt="Phone" style="vertical-align:middle; margin-right:5px;"> +91 63587 40011
          </a>
        </td>
      </tr>
    </table>
  </td>
</tr>


          <!-- Footer -->
          <tr>
            <td colspan="2" style="background-color:#182653; text-align:center; padding:12px;">
              <p style="margin:0; font-size:12px; color:#ffffff; font-family:Arial, sans-serif;">
                All Rights Reserved | Armstrong © {{ date('Y') }}
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>

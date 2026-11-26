@include('layouts.frontheader')

<style>
    .according_head {
    background: #EEE;   /* light blue */
    color: #003366;
    padding: 18px 22px;
    cursor: pointer;
    font-weight: 600;
    border-radius: 6px;
    margin-bottom: 5px;
    transition: 0.3s;
    position: relative;
}

/* On Hover */
.according_head:hover {
    /*background: #fff7f8;*/
}

/* When Accordion is Open (active) */
.according_head[aria-expanded="true"] {
    background: #e41e29;   /* dark blue */
    color: #ffffff;
}

/* Arrow Icon */
.according_head::after {
    content: "\25BC";
    position: absolute;
    right: 18px;
    font-size: 14px;
    transition: 0.3s;
}

/* Rotate Arrow When Open */
.according_head[aria-expanded="true"]::after {
    transform: rotate(180deg);
}

/* Accordion Body */
.accordion-collapse > div {
    padding: 15px 22px;
    background: #ffffff;
    /*border-left: 2px solid #003366;*/
    /*border-right: 2px solid #003366;*/
    /*border-bottom: 2px solid #003366;*/
    border-radius: 0 0 6px 6px;
}
</style>

<section class="breadcrumb_wrapper">
   <div class="container">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="Javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Best Jumbo Bag Loop Sewing Machine in Ahmedabad</li>
         </ol>
      </nav>
      <div class="setting_vector_icon">
         <h1 class="heading mb-4 col-md-10 m-auto">Best Jumbo Bag Loop Sewing Machine in Ahmedabad</h1>
         <div class="col-lg-8 m-auto text-center">
            <!-- <p class="news-title">Driving Innovation in Industrial Machinery Since 1982</p> -->
            <p><b>Looking for a high-precision jumbo bag loop sewing machine in Ahmedabad?</b> Armstrong delivers industry-leading loop sewing solutions trusted by FIBC manufacturers across <b>Changodar, Sanand, Narol, Bavla, Odhav, and Kathwada.</b> We supply, install & support <b>LU-5030 Jumbo Bag Loop Sewing Machines</b> across Gujarat with full after-sales service, operator training, and AMC options. If you need a <b>reliable FIBC loop sewing, big bag top stitching, or automatic jumbo bag loop machine</b> — you're in the right place.</p>
         </div>
      </div>
   </div>
</section>
<section class="section-mt">
   <div class="container">
      <div class="row justify-content-between">
         <div class="col-lg-5 text-center text-lg-start mb-4 mb-lg-auto pe-5">
            <h3 class="sub_head">Get Pricing for Jumbo Bag Loop Sewing Machine in Ahmedabad</h3>
            <p>
               The Big Bag Loop Sewing Machine is purpose-built for sewing FIBC bag loops with precision and speed. It supports multiple working areas and speeds up to 300 mm/s, handling hook sizes from 300 mm to 800 mm and loop lengths up to 680 mm. With automatic back-tack, servo motor drive, and optional two- or four-thread trimming, it delivers consistent, high-strength stitches. Touchscreen control allows easy pattern programming, ensuring smooth, stable performance for continuous production of lifting loops used in heavy-duty bulk packaging.
            </p>
         </div>
         <div class="col-lg-7">
            <div class="contact">
               <div class="contact_bot">
                  <form id="channelpartner" action="{{ route('channelpartnerstore') }}" method="POST">
                     @csrf
                     <div class="row gx-5">
                        <div class="col-lg-6 floating-group">
                           <input type="text" id="name" name="name" maxlength="70" placeholder=" ">
                           <label for="name">First Name <span>*</span></label>
                        </div>
                        <div class="col-lg-6 floating-group">
                           <input type="text" id="company_name" name="company_name" maxlength="70" placeholder=" ">
                           <label for="company_name">Company Name <span>*</span></label>
                        </div>
                        <div class="col-lg-6 floating-group">
                           <input type="text" id="contact" name="contact" maxlength="20" placeholder=" ">
                           <label for="contact">Contact Number <span>*</span></label>
                        </div>
                        <div class="col-lg-6 floating-group">
                           <input type="email" id="email" name="email" maxlength="60" placeholder=" ">
                           <label for="email">Email ID <span>*</span></label>
                        </div>
                        <div class="col-lg-12 floating-group">
                           <textarea id="message" name="message" rows="1" placeholder=" "></textarea>
                           <label for="message">Message</label>
                        </div>
                        <div class="col-lg-12 mt-3">
                           <button type="submit" class="sub_btn">Request LU-5030 Price for Ahmedabad</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section-pt">
   <div class="container">
      <div class="text-center mb-4">
         <h2 class="title_48">LU-5030: Best Automatic Jumbo Bag Loop Sewing <br/> Machine for Ahmedabad Factories</h2>
      </div>
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-7">
            <div class="text-center">
               <img src="https://www.armstrongex.com/public/admin/uploads/products/product_1757137429_68bbca15a0287.png" alt="product" class="img-fluid product_card_details_img">
            </div>
         </div>
         <div class="col-md-5">
            <p class="fw-bold">
               <span class="model_text">LU-5030:</span>   Ahmedabad’s Most Preferred Jumbo Bag Loop Sewing Machine
            </p>
            <p>The LU-5030 Loop Sewing Machine is specially engineered for FIBC bag manufacturers requiring <b>high speed, accuracy, and consistent loop stitching quality.</b> The system supports multiple working areas and speeds up to <b>300 m/min,</b> handling loop widths from <b>200 mm to 800 mm</b> and loop lengths up to <b>1000 mm.</b></p>
            <p>With a <b>servo motor drive, automatic back-tack, user-friendly touch panel,</b> and <b>0% deviation controls,</b> it ensures perfect loop stitching for heavy-duty bulk packaging.</p>
         </div>
      </div>
   </div>
</section>
<section class="section-pt">
   <div class="container">
      <div class="video_card">
         <div class="video_card_top">
            <img class="img-fluid rounded-3"
               src="{{ asset('public/front/img/seo-video-banner.png') }}" alt="images">
            <a href="" data-fancybox data-width="100%" data-height="100%">
            <img class="play_btn" src="{{ asset('public/front/img/play-btn.png') }}" alt="play">
            </a>
         </div>
      </div>
   </div>
</section>

<section class="section-pt">
    <div class="container">
        <div class="text-center">
            <h2 class="title_48">Technical Specifications</h2>
        </div>
        <div class="row mt-3 mt-md-5 gx-md-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="table-responsive rounded-3 overflow-hidden">
                    <table class="table  table-bordered  table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Parameter</th>
                                <th scope="col">Specification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Machine Type</td>
                                <td>High-Speed Roll-to-Roll BCS Machine with Gusset</td>
                            </tr>
                            <tr>
                                <td>Bag Width Range</td>
                                <td>200 mm – 800 mm</td>
                            </tr>
                            <tr>
                                <td>Gusset Depth</td>
                                <td>30 mm – 100 mm</td>
                            </tr>
                            <tr>
                                <td>Twist Gusset Range</td>
                                <td>30 mm – 80 mm</td>
                            </tr>
                            <tr>
                                <td>Maximum Operating Speed</td>
                                <td>Up to 320 meters/minute</td>
                            </tr>
                            <tr>
                                <td>Material Compatibility</td>
                                <td>Laminated & unlaminated woven fabric, BOPP</td>
                            </tr>
                            <tr>
                                <td>Cutting Mechanism</td>
                                <td>
                                    <p class="mb-0">- Rod-less cold cutter (for laminated fabric)</p>
                                    <p class="mb-0">- Zigzag & plane heat cutter (for unlaminated fabric)</p>
                                    <p class="mb-0"> - Perforation roller (for woven sacks)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Folding Options</td>
                                <td>Single & Double Gusset Folding <br>
                                    Bottom Folding</td>
                            </tr>
                            <tr>
                                <td>Sealing System</td>
                                <td>Heat sealing for laminated and unlaminated woven bags</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive rounded-3 overflow-hidden">
                    <table class="table  table-bordered  table-striped mb-0">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Parameter</th>
                                <th scope="col">Specification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Control System</td>
                                <td>PLC with Touchscreen Interface</td>
                            </tr>
                            <tr>
                                <td>Cutting Registration</td>
                                <td>I-Mark Proxy Sensor (for printed materials)</td>
                            </tr>
                            <tr>
                                <td>Roll Handling</td>
                                <td>Hydraulic Auto Roll Lifting System</td>
                            </tr>
                            <tr>
                                <td>Fabric Roll Diameter</td>
                                <td>Up to 1200 mm (typically)</td>
                            </tr>
                            <tr>
                                <td>Power Supply</td>
                                <td>3 Phase, 415V, 50Hz (customizable as per requirement)</td>
                            </tr>
                            <tr>
                                <td>Installed Power</td>
                                <td>Approx. 15–18 kW (varies based on configuration)</td>
                            </tr>
                            <tr>
                                <td>Machine Dimensions</td>
                                <td>
                                    Approx. 5000 mm (L) × 2000 mm (W) × 1800 mm (H) (varies)
                                </td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>Approx. 2500–3000 kg (depends on features selected)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-pt">
   <div class="container">
       
       <div class="row gx-md-5">
           
            <div class="col-lg-6 mt-4 mt-lg-auto mb-4 mb-md-0">
                <div>
                    <img class=" img-fluid" src="{{ asset('public/front/img/perfect-fit-image.webp') }}" alt="images">
                </div>
            </div>
            
            <div class="col-lg-6">
                <h2 class="title_48">Why Choose Our Jumbo Bag Loop Sewing Machine in Ahmedabad?</h2>
               
                <ul class="my-4">
                    <li>High-<b>speed servo system</b> (up to 300 mm/s)</li>
                    <li>Ideal for <b>FIBC jumbo bag lifting loops</b></li>
                    <li>Flexible <b>pattern programming</b> with touchscreen control</li>
                    <li>Automatic <b>back-tack & trimming system</b></li>
                    <li>Heavy-duty design suitable for <b>Ahmedabad’s bulk manufacturing units</b></li>
                    <li>On-site <b>installation + rapid</b> service support in Ahmedabad</li>
                    <li>Direct manufacturer pricing</li>
                </ul>
               
            </div>
           
        </div>
       
   </div>
</section>

<section class="section-pt">
   <div class="container">
       
      <div class="text-center">
           <h2 class=" mb-5 main_head"><b>FAQs</b></h2>
      </div>
       
      <div class="row">
         <div class="col-lg-6">
            

            <div id="accordionExample">

               <!-- FAQ 1 -->
               <div class="mb-4">
                  <h5 class="according_head"
                     data-bs-toggle="collapse"
                     data-bs-target="#collapse1"
                     aria-expanded="true"
                     aria-controls="collapse1">
                     FAQ Title 1
                  </h5>
                  <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                     <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     </div>
                  </div>
               </div>

               <!-- FAQ 2 -->
               <div class="mb-4">
                  <h5 class="according_head"
                     data-bs-toggle="collapse"
                     data-bs-target="#collapse2"
                     aria-expanded="false"
                     aria-controls="collapse2">
                     FAQ Title 2
                  </h5>
                  <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div>
                        Vestibulum ante ipsum primis in faucibus orci luctus.
                     </div>
                  </div>
               </div>

               <!-- FAQ 3 -->
               <div class="mb-4">
                  <h5 class="according_head"
                     data-bs-toggle="collapse"
                     data-bs-target="#collapse3"
                     aria-expanded="false"
                     aria-controls="collapse3">
                     FAQ Title 3
                  </h5>
                  <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div>
                        Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
                     </div>
                  </div>
               </div>

            </div>

         </div>
          <div class="col-lg-6">


            <div id="accordionExample">

               <!-- FAQ 1 -->
               <div class="mb-4">
                  <h5 class="according_head"
                     data-bs-toggle="collapse"
                     data-bs-target="#collapse4"
                     aria-expanded="false"
                     aria-controls="collapse4">
                     FAQ Title 1
                  </h5>
                  <div id="collapse4" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     </div>
                  </div>
               </div>

               <!-- FAQ 2 -->
               <div class="mb-4">
                  <h5 class="according_head"
                     data-bs-toggle="collapse"
                     data-bs-target="#collapse5"
                     aria-expanded="false"
                     aria-controls="collapse5">
                     FAQ Title 2
                  </h5>
                  <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div>
                        Vestibulum ante ipsum primis in faucibus orci luctus.
                     </div>
                  </div>
               </div>

               <!-- FAQ 3 -->
               <div class="mb-4">
                  <h5 class="according_head"
                     data-bs-toggle="collapse"
                     data-bs-target="#collapse6"
                     aria-expanded="false"
                     aria-controls="collapse6">
                     FAQ Title 3
                  </h5>
                  <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div>
                        Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</section>


 <section class="section-mt">
    <div class="container">
       <h2 class="title_48 mb-4">Other Prodcuts</h2>
         <div class="product_list_slider owl-theme owl-carousel mt-3 mt-md-0">
          
               <div class="product_card">
                     <a href="#">
                        <img src="https://www.armstrongex.com/public/admin/product/front_image/WOVEN%20SACKS%20SEWING%20MACHINES_Model_%20Newlong%20DKN3WGP%20(2).png" alt="images" class="img-fluid product_card_img">
                     </a>
                     <div class="product-contant">
                        <a href="#">
                           <h3 class="news-title">Ultrasonic Hemming Machine</h3>
                        </a>
                        <span>
                           <a class="arrow_circle" href="#">
                                 <img src="{{ asset('public/front/img/arrow.png') }}" alt="arrow" class="img-fluid arrow_icon">
                           </a>
                        </span>
                     </div>
               </div>
           
         </div>

    </div>
</section>




@include('layouts.frontfooter')
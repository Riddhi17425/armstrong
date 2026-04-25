@include('layouts.frontheader')

<style>
   /* Default Accordion Header Color */
   .according_head {
   background: #fff7f8;   /* light blue */
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
   background: #fff7f8;
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
            <li class="breadcrumb-item"><a href="">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Woven Sack  </li>
         </ol>
      </nav>
      <div class="setting_vector_icon">
         <h1 class="heading">PP Woven Bag Lamination Machine  </h1>
         <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
      </div>
   </div>
</section>
<section class="section-pt">
   <div class="container">
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-7">
            <div class="text-center">
               <img src="{{ asset('public/front/img/lamination-machine.png') }}" alt="product" class="img-fluid product_card_details_img">
            </div>
         </div>
         <div class="col-md-5">
            <!--<p class="fw-bold">-->
            <!--   <span class="model_text">Model:</span> LAMTEK 1650-->
            <!--</p>-->
            <!--<p>High-Speed PP Woven Bag Lamination Machine</p>-->
            <p>Armstrong’s <strong>LAMTEK 1650 PP woven sack lamination machine</strong> represents a new class of advanced coating & lamination technology engineered specifically for modern woven sack and FIBC production lines. Built for fault-free, high-speed, 24/7 industrial operation, it delivers uniform lamination at 150 MPM with unmatched precision, stability, and efficiency.</p>
            
            <p>Designed to integrate seamlessly into tubular & flat PP/HDPE woven fabric processing, this <strong>pp woven fabric lamination machine</strong> transforms raw rolls into premium laminated packaging substrates with perfect alignment, zero wrinkles, and consistent coating thickness—making it ideal for manufacturers operating high-volume <strong>pp woven bags making machine</strong> lines.</p>
            
            <a class="request_btn" href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal2">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                  <!-- Your SVG paths -->
                  <path d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z" fill="white"></path>
                  <path d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z" fill="white"></path>
                  <path d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z" fill="white"></path>
                  <path d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z" fill="white"></path>
               </svg>
               <span class="old-text">Request A Quote</span>
               <span class="new-text">Request A Quote</span>
            </a>
         </div>
      </div>
   </div>
</section>
<section class="section-pt">
   <div class="container">
       <div class="row">
           <div class=" col-md-12">
            <h2 class="main_head_48 head_wrapper mb-4">PP Woven Bag Lamination Machine Manufacturer  </h2>
            </div>
       </div>
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
           <p>For decades, Armstrong has been delivering high-performance <strong>woven sack lamination machine</strong> solutions tailored to the evolving needs of woven sack and flexible packaging manufacturers. Inspired by global production standards, our lamination line follows the same engineering philosophy demonstrated universally across advanced industrial markets.</p>
         <div class="col-md-6">
            
           
            <ul class="mb-4">
               <li class="text-capitalize"><strong>State-of-the-art T-Die coating & co-extrusion technology</strong></li>
               <li class="text-capitalize"><strong>New ergonomic industrial design with optimised footprint</strong></li>
               <li class="text-capitalize"><strong>Highly efficient inline lamination for minimal wastage & maximum output</strong></li>
               <li class="text-capitalize"><strong>Intelligent automation for stable lamination at high speeds</strong></li>
            </ul>
            <p>This makes LAMTEK 1650 a <strong>High-speed woven sack lamination machine</strong> and the ultimate lamination solution for manufacturers targeting scale, quality consistency, and premium retail packaging performance.</p>
            <p>Built specifically for woven sack, FIBC fabric, and BOPP laminated bag manufacturers, this <strong>PP Woven Sack Laminating Machine</strong> helps industries achieve consistent branding, moisture protection, and high-value packaging performance at scale.</p>
            
         </div>
         <div class="col-md-6">
             
            <div class="video_card_top">
               <img src="https://www.armstrongex.com/public/admin/product/videos/images/1764154525_PP Woven Bag Lamination Machine 1.png" alt="" class="img-fluid">
               <a href="https://youtu.be/Xblg7x0mCiA" data-fancybox="video-gallery">
               <img class="play_btn" src="https://www.armstrongex.com/public/front/img/play-btn.png" alt="play">
               </a>
            </div>
         </div>
         
      </div>
   </div>
</section>
<section class="section-mt">
    <div class="container">
        <h3 class="main_head_48 head_wrapper mb-4">Why Manufacturers Choose LAMTEK 1650 </h3>
         <ul>
             <li><strong>High-Speed, Stable Lamination (Up to 150 MPM) :</strong> Uniform lamination of PP woven fabric and BOPP/multilayer films with bubble-free bonding and zero wrinkles—even during long continuous runs. This makes it a dependable <strong>Pp woven sack laminating machine</strong> for large-scale operations.</li>
            <li><strong>Precision T-Die Coating System:</strong> Micrometer-level coat thickness control ensures perfect surfaces, strong bonds, and superior print clarity across all laminated substrates.</li>
            <li><strong>BOPP Auto Registration:</strong> Automatic brand, text, and graphic alignment eliminates manual intervention and improves print consistency.</li>
            <li><strong>BST Auto Edge Trimming:</strong> Smart trimming ensures clean edges, reduced waste, and conversion-ready rolls for downstream processing.</li>
            <li><strong>Crease-Less Turn Bar System:</strong> Smooth web rotation prevents film creasing and surface marks—ideal for high-value packaging applications.</li>
            <li><strong>Energy-Efficient Heating & Cooling:</strong> Optimised heat zones and cooling rollers reduce power consumption while sustaining peak bonding quality.</li>
            <li><strong>Heavy-Duty Industrial Build:</strong> A reinforced frame, rigid mechanical drive, and premium components ensure minimum downtime and maximum lifespan, making it a reliable <strong>Laminating Machine for PP Woven Bag</strong> production.</li>
         </ul>
    </div>
</section>
<section class="section-pt">
   <div class="container">
      <div class="text-center">
         <h3 class="main_head_48 head_wrapper mb-4">Specifications </h3>
         <!--<p>The technical specifications of this machine have been designed to deliver maximum accuracy at high volumes thanks to its integrated system of intelligent automation, high-precision cut tools and durable mechanical construction that enables long-term performance in industrial environments.</p>-->
      </div>
      <div class="row justify-content-center gx-md-5">
         <div class="col-md-8 mb-4 mb-lg-0">
            <div class="table-responsive rounded-3 overflow-hidden">
               <table class="table table-bordered table-striped mb-0">
                  <thead class="table-dark">
                     <tr>
                        <th scope="col">Parameter</th>
                        <th scope="col">Specification</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Max. Lamination Speed</td>
                        <td>
                           <p>Up to 150 MPM</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Lamination Type</td>
                        <td>
                           <p>T-Die Hot-Melt Lamination / Co-Extrusion</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Substrates</td>
                        <td>
                           <p>PP Woven, BOPP, PE, Multilayer Films</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Web Alignment</td>
                        <td>
                           <p>Auto Registration + BST Web Guide</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Edge Trimming</td>
                        <td>
                           <p>Auto BST Trimming</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Turn Bar</td>
                        <td>
                           <p>Zero-Crease Turn Bar System</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Heating Zones</td>
                        <td>
                           <p>Multi-Zone Smart Heating</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Cooling System</td>
                        <td>
                           <p>High-Efficiency Cooling Rollers</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Control System</td>
                        <td>
                           <p>Intelligent PLC + HMI Touch Panel</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Build Quality</td>
                        <td>
                           <p>Heavy-Duty Industrial Grade</p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <p class="text-md-center text-start mt-1 mt-md-3">Technical specifications remain unchanged and customisable as per requirement </p>
      <div class="mt-3 d-flex justify-content-md-center justify-content-start">
          <a class="request_btn" href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                  <!-- Your SVG paths -->
                  <path d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z" fill="white"></path>
                  <path d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z" fill="white"></path>
                  <path d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z" fill="white"></path>
                  <path d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z" fill="white"></path>
               </svg>
               <span class="old-text">Request A Quote</span>
               <span class="new-text">Request A Quote</span>
            </a>
      </div>
      </div>
      
  
   </div>
</section>

<section class="how-it-works section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="text-center">
         <h3 class="main_head_48 head_wrapper mb-4">Applications</h3>
         <p class="text-start text-md-center">LAMTEK 1650 laminates PP woven fabrics, BOPP films, and multilayer substrates for:</p>
         <p class="mb-4 text-start text-md-center">PP laminated woven sacks - FIBC jumbo bag fabrics - Box bags / shopping bags - Printed packaging rolls - Moisture-proof industrial & retail packaging</p>
        <!--  <ul class="mb-4 text-start text-md-center list-unstyled">       -->
        <!--    <li>PP laminated woven sacks</li>-->
        <!--    <li>FIBC jumbo bag fabrics</li>-->
        <!--    <li>Box bags / shopping bags</li>-->
        <!--    <li>Printed packaging rolls</li>-->
        <!--    <li>Moisture-proof industrial & retail packaging</li>-->
        <!--</ul>-->

        
        <p class="mb-4 text-start text-md-center">This <strong>woven sack lamination machine</strong> supports manufacturers across food grains, fertilizers, chemicals, cement, agriculture, and retail packaging sectors.</p>
      </div>
            </div>
        </div>
    </div>
   <div class="container-fluid px-0">
      
      <div class="how-slider owl-carousel ">
       
                    <div class="slide-content">
                       <div class="image-circle">
                          <img src="https://www.armstrongex.com/public/admin/application/food-processing_68c119dfd08c4.png" alt="textiles non Woven fabrics">
                       </div>
                       <div class="slide-text">
                          <h3>Food Processing</h3>
                          <p></p>
                       </div>
                    </div>
             
                    <div class="slide-content">
                       <div class="image-circle">
                          <img src="https://www.armstrongex.com/public/admin/application/fertilizer-agrochemicals_68c11a8c73c18.png" alt="packaging logistics">
                       </div>
                       <div class="slide-text">
                          <h3>Fertilizer & Agrochemicals</h3>
                          <p></p>
                       </div>
                    </div>
               
                    
              
                    <div class="slide-content">
                       <div class="image-circle">
                          <img src="https://www.armstrongex.com/public/admin/application/textiles-non-woven-fabrics_68c11ac58cada.png" alt="agriculture">
                       </div>
                       <div class="slide-text">
                          <h3>Textiles & Non-Woven Fabrics</h3>
                          <p></p>
                       </div>
                    </div>
               
                    <div class="slide-content">
                       <div class="image-circle">
                          <img src="https://www.armstrongex.com/public/admin/application/packaging-logistics_68c11ad5563bd.png" alt="fertilizer agrochemicals">
                       </div>
                       <div class="slide-text">
                          <h3>Packaging & Logistics</h3>
                          <p></p>
                       </div>
                    </div>
              
                    <div class="slide-content">
                       <div class="image-circle">
                          <img src="https://www.armstrongex.com/public/admin/application/construction-building-materials_68c11ae616023.png" alt="specialty powders granules">
                       </div>
                       <div class="slide-text">
                          <h3>Construction & Building Materials</h3>
                          <p></p>
                       </div>
                    </div>
            </div>
            
      <!-- Custom Arrows -->
        <div class="custom_arrow">
            <img src="https://www.armstrongex.com/public/front/img/arrow_left.svg" alt="Previous" class="img-fluid custom-prev">
            <img src="https://www.armstrongex.com/public/front/img/arrow_right.svg" alt="Next" class="img-fluid custom-next">
        </div>
   </div>
</section>
<section class="accoding section-pt">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-9">
            <div class="text-center">
               <h4 class="main_head_48 head_wrapper mb-4">FAQs – PP Woven Bag Lamination Machine   </h4>
            </div>
            <div id="accordionExample">
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                     Is it suitable for heavy-duty industrial use?
                  </h5>
                  <div id="collapse0" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                     <div>
                         Yes — it is designed for long-hour, high-output factory environments.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                     Does it support automatic feeding and trimming?
                  </h5>
                  <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                     <div>
                        Yes — with auto web feeding, tension control, and BST trimming systems.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                     Can it handle wide rolls for jumbo bags?
                  </h5>
                  <div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Yes — suitable for woven sacks, FIBC jumbo bags, and large packaging rolls.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Does it support hot-melt lamination?
                  </h5>
                  <div id="collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                       Yes — the T-Die system ensures strong bonding for woven fabric substrates.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                     Which industries does it serve?
                  </h5>
                  <div id="collapse5" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        FIBC, food grains, fertilizers, chemicals, retail packaging, cement, and agriculture.
                     </div>
                  </div>
               </div>
               
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                     Does Armstrong provide spares & training?
                  </h5>
                  <div id="collapse6" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Yes — complete spare parts support, installation, and operator training are provided.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@include('layouts.frontfooter')
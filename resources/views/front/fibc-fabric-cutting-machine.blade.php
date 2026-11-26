@include('layouts.frontheader', [
    'og_image' => asset('public/admin/uploads/products/product_1757489304_68c12898a7798.png')
])
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
              <li class="breadcrumb-item active" aria-current="page">FIBC  </li>
           </ol>
        </nav>
        <div class="setting_vector_icon">
           <h1 class="heading">FIBC Fabric Cutting Machine </h1>
           <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
    </div>    
</section>
<section class="section-pt">
   <div class="container">
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-7">
                        <div class="text-center">
                <img src="https://www.armstrongex.com/public/admin/uploads/products/product_1757489304_68c12898a7798.png" alt="product" class="img-fluid product_card_details_img">
            </div>
                    </div>
         <div class="col-md-5">
                        <p>The FIBC fabric cutting machine is designed to deliver precision, speed, and consistency in cutting PP woven fabric used in jumbo bag manufacturing. This pp woven bag cutting machine is built for harsh industrial environments where fabrics are produced continuously and accuracy cannot be compromised. The system comes in two different widths, 1.4 meters and 2.2 meters, giving manufacturers the flexibility to produce bags of various sizes and styles without changing equipment. </p>
                        <p>With support for star-cut and round spout-cut patterns, along with hot, cold, and zigzag cutting options, this pp bag cutting machine gives manufacturers complete control over their FIBC production requirements. Whether you're producing jumbo bags, Q-bags, baffle bags, or PP woven sacks, this pp woven sack cutting machine ensures cutting precision that directly improves the final bag’s strength, sealing accuracy, and performance in the field.</p>
                        
            <a class="request_btn" href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal2">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                  <!-- Your SVG paths -->
                  <path d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z" fill="white"></path>
                  <path d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z" fill="white"></path>
                  <path d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z" fill="white"></path>
                  <path d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z" fill="white"></path>
               </svg>
               <span class="old-text">Enquire Now</span>
               <span class="new-text">Enquire Now</span>
            </a>
         </div>
      </div>
   </div>
</section>

<section class="section-pt">
   <div class="container">
       <div class="row">
           <div class=" col-md-12">
                           <h2 class="main_head_48 head_wrapper mb-4">FIBC Fabric Cutting Machine Manufacturer </h2>

           </div>
       </div>
        <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
             <p>Armstrong is recognized as one of India’s leading manufacturers of high-performance FIBC fabric cutting machines, delivering advanced machinery designed specifically for woven sack and jumbo bag production. Our machines cater to the complete FIBC ecosystem, PP woven bags, U-panel bags, 4-panel bags, baffle bags, liner-filled bags, spout bags, corner-loop bags, and a wide range of customized industrial packaging solutions.</p>
            <div class="col-md-6">
              
               <p>This <strong>automatic pp woven bag cutting machine</strong> is engineered to ensure dimensional accuracy, clean edges, and repeatable cutting quality, all of which are critical to the assembly and load-bearing performance of jumbo bags. A poorly cut spout or uneven panel can lead to bag deformation, weak sealing, or loading issues, problems that this <strong>woven sack bag cutting machine</strong> is specifically designed to eliminate.</p>
                     <p class="certi_head mb-1">Armstrong’s cutting machines are built on three core principles:</p>                                          
                   <ul class="mb-4">
                       <li class="text-capitalize">Precision that supports the structural strength of an FIBC</li>
                       <li class="text-capitalize">Automation that reduces operator dependency</li>
                       <li class="text-capitalize">Durability that withstands long-hour industrial cycles</li>
                   </ul>
                   <p>Whether you’re running a large-scale facility producing hundreds of thousands of woven sacks daily or a specialized unit handling bulk shipments, this <strong>pp woven fabric cutting machine</strong> delivers the consistency and reliability needed to stay competitive in today’s demanding market.</p>
                               
            </div>
            <div class="col-md-6">
                <div class="video_card_top">
                     <img src="https://www.armstrongex.com/public/admin/product/videos/images/1757584868_FIBC Fabric Cutting Machine.png" alt="FIBC Fabric Cutting Machine" class="img-fluid">
                              <a href="https://www.youtube.com/watch?v=fd9_BsuzfLA" data-fancybox="video-gallery">
                             <img class="play_btn" src="https://www.armstrongex.com/public/front/img/play-btn.png" alt="play">
                         </a>
                 </div>
            </div>
        </div>
                  
   </div>
</section>
<section class="section-pt">
         <div class="container">
            <div class="text-center">
               <h3 class="main_head_48 head_wrapper">Technical Specifications </h3>
               <p class="text-start text-md-center">The technical specifications of this <strong>pp woven fabric cutting machines</strong> range have been designed to deliver maximum accuracy at high volumes. This is achieved through an integrated system of intelligent automation, high-precision cutting tools, and durable mechanical construction that enables long-term performance in continuous industrial environments.</p>
            </div>
               <div class="row mt-5 gx-md-5">
               
                              <div class="col-md-6 mb-4 mb-lg-0">
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
                              <td>Fabric type</td>
                              <td><p>Tubler or Flat fabric</p></td>
                           </tr>
                                                      <tr>
                              <td>Maximum width of fabric</td>
                              <td><p>2200mm</p></td>
                           </tr>
                                                      <tr>
                              <td>Maximum diameter of fabric roll</td>
                              <td><p>1500 mm</p></td>
                           </tr>
                                                      <tr>
                              <td>Maximum weight of fabric roll</td>
                              <td><p>1000 kgs</p></td>
                           </tr>
                                                      <tr>
                              <td>Cutting Length</td>
                              <td><p>200-25000 mm</p></td>
                           </tr>
                                                      <tr>
                              <td>Round spout</td>
                              <td><p>30cm with machine</p></td>
                           </tr>
                                                      <tr>
                              <td>Cross punch</td>
                              <td><p>20cm with the machine</p></td>
                           </tr>
                                                   </tbody>
                     </table>
                  </div>
               </div>
               <div class="col-md-6">
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
                              <td>Bottom</td>
                              <td><p>Straight cut / Zigzag Cut ( Any one With Machine )</p></td>
                           </tr>
                                                      <tr>
                              <td>Production Speed without spout</td>
                              <td><p>1 meters Length 16 Pcs/ Min*</p></td>
                           </tr>
                                                      <tr>
                              <td>Production Speed with spout</td>
                              <td><p>1 meters Length 13 Pcs/ Min*</p></td>
                           </tr>
                                                      <tr>
                              <td>Cutting Accuracy</td>
                              <td><p>+/-2% mm</p></td>
                           </tr>
                                                      <tr>
                              <td>Power Consumption</td>
                              <td><p>15 W</p></td>
                           </tr>
                                                      <tr>
                              <td>Machine Dimension(L x W x H)</td>
                              <td><p>5.7 x 2.9 x 1.3 meter</p></td>
                           </tr>
                                                   </tbody>
                     </table>
                  </div>
               </div>
                           </div>
                           
                           <div class="text-center mt-3">
                               <a class="request_btn" href="Javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal2">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                  <!-- Your SVG paths -->
                  <path d="M6.73996 21.3126C5.9323 21.3126 5.27515 21.9696 5.27515 22.7773C5.27515 23.585 5.93224 24.2421 6.73996 24.2421C7.54763 24.2421 8.20472 23.585 8.20472 22.7773C8.20472 21.9696 7.54763 21.3126 6.73996 21.3126Z" fill="white"></path>
                  <path d="M6.7399 16.0394C3.02457 16.0394 0.00195312 19.062 0.00195312 22.7773C0.00195312 26.4925 3.02457 29.5151 6.7399 29.5151C10.4552 29.5151 13.4778 26.4925 13.4778 22.7773C13.4778 19.062 10.4552 16.0394 6.7399 16.0394ZM6.73996 25.9998C4.96309 25.9998 3.51749 24.5542 3.51749 22.7773C3.51749 21.0004 4.96309 19.5548 6.73996 19.5548C8.51683 19.5548 9.96242 21.0004 9.96242 22.7773C9.96242 24.5542 8.51683 25.9998 6.73996 25.9998Z" fill="white"></path>
                  <path d="M24.5515 21.3124C22.2864 21.3124 20.4502 23.1486 20.4502 25.4137C20.4502 27.6788 22.2864 29.515 24.5515 29.515C26.8166 29.515 28.6528 27.6788 28.6528 25.4137C28.6528 23.1486 26.8166 21.3124 24.5515 21.3124ZM24.5515 26.2926C24.0662 26.2926 23.6727 25.8991 23.6727 25.4137C23.6727 24.9283 24.0662 24.5348 24.5515 24.5348C25.0369 24.5348 25.4304 24.9283 25.4304 25.4137C25.4304 25.8991 25.0369 26.2926 24.5515 26.2926Z" fill="white"></path>
                  <path d="M29.1212 13.8131H26.3679V10.5387C26.3679 10.3772 26.4993 10.2458 26.6608 10.2458H27.4225C27.9078 10.2458 28.3013 9.85229 28.3013 9.36693C28.3013 8.88156 27.9078 8.48807 27.4225 8.48807H26.6608C25.5301 8.48807 24.6101 9.408 24.6101 10.5387V13.8131H19.9816L17.4982 4.02841H18.1261C18.6115 4.02841 19.005 3.63492 19.005 3.14956C19.005 2.66419 18.6115 2.2707 18.1261 2.2707H4.78694C4.30157 2.2707 3.90808 2.66419 3.90808 3.14956C3.90808 3.63492 4.30157 4.02841 4.78694 4.02841H4.97378L3.95853 12.9113C2.64312 13.2835 1.40387 13.9169 0.328506 14.7807C-0.04987 15.0846 -0.110277 15.6378 0.19369 16.0162C0.497656 16.3946 1.05075 16.4549 1.42924 16.151C2.95177 14.9281 4.78811 14.2817 6.73981 14.2817C11.4243 14.2817 15.2355 18.0928 15.2355 22.7773C15.2355 23.2106 15.2024 23.646 15.1372 24.071C15.0636 24.5508 15.3929 24.9994 15.8727 25.0729C15.9179 25.0799 15.9627 25.0832 16.007 25.0832C16.4336 25.0832 16.808 24.7721 16.8746 24.3375C16.9092 24.1123 16.9358 23.8847 16.9553 23.6561H18.9619C19.7102 21.2814 21.9329 19.5546 24.5514 19.5546C26.9628 19.5546 29.0383 21.019 29.9361 23.1051C29.977 23.0038 30 22.8933 30 22.7773V14.6919C30 14.2065 29.6066 13.8131 29.1212 13.8131ZM6.73987 12.5239C6.41411 12.5239 6.08934 12.5403 5.76651 12.5714L6.74286 4.02841H12.5404V13.8131H11.7121C10.2385 12.9924 8.54298 12.5239 6.73987 12.5239ZM14.2982 13.8131V4.02841H15.6847L18.1681 13.8131H14.2982Z" fill="white"></path>
               </svg>
               <span class="old-text">Enquire Now</span>
               <span class="new-text">Enquire Now</span>
            </a>
                           </div>
         </div>
      </section>
      <section class="section-mt">
    <div class="container">
        <h2 class="main_head_48 head_wrapper mb-4">FIBC Fabric Cutting Machine Key Features </h2>
         <h5 class="certi_head mb-1">Flexible Cutting Options for All FIBC Designs</h5>
         <p>Manufacturers today produce a wide variety of FIBC bags, each requiring a unique cutting profile. This <strong>pp woven sack cutting machine</strong> supports star cuts, round spout cuts, and conventional panel cuts, ensuring compatibility with multiple bag styles. Whether you're preparing fabric for oversized jumbo bags or compact PP woven sacks, the system adapts effortlessly.</p>
         <p>The availability of hot, cold, and zigzag blades ensures clean cuts on laminated, non-laminated, and coated fabrics without fraying or distortion, essential for high-quality sealing and stitching in woven sack production.</p>
        <h5 class="certi_head mb-1">Precision-Driven Cutting for PP Woven Fabrics</h5>
        <p>The machine is optimized for PP and HDPE woven fabrics, ensuring accuracy in every cut. Its guided feeding system prevents fabric skewing, stretching, or slipping, common issues in low-grade <strong>pp bag cutting machines</strong>. This level of precision is vital because even a 2–3 mm deviation can impact bag alignment, sealing integrity, and load balance. Armstrong’s engineering ensures consistent output from the first cut to the thousandth.</p>
        <h5 class="certi_head mb-1">Industrial-Grade Structure for 24/7 Production</h5>
        <p>FIBC factories often operate in multiple shifts, and equipment must withstand continuous use with minimal vibration and wear. This <strong>woven sack bag cutting machine</strong> is built with a rigid steel frame designed to remain stable during high-speed operation.</p>
        <p>Unlike entry-level systems that require frequent recalibration or blade replacement, Armstrong’s machine uses long-life mechanical components that reduce downtime and improve overall production efficiency.</p>
        
        <h5 class="certi_head mb-1">Intelligent PLC-Based Automation</h5>
        <p>With a user-friendly PLC interface, operators can easily set:</p>
        <ul class="mb-4">
            <li class="text-capitalize">Cut lengths</li>
            <li class="text-capitalize">Cutting temperature (for hot blades)</li>
            <li class="text-capitalize">Spout design selection</li>
            <li class="text-capitalize">Production counts</li>
            <li class="text-capitalize">Repeat batches</li>
        </ul>
        <p>Stored programs allow quick changeovers between fabric types and bag designs, improving workflow efficiency and minimizing operator dependency. This automation transforms the machine into a true <strong>automatic pp woven bag cutting machine</strong>, reducing human error and improving batch-to-batch consistency.</p>
        <h5 class="certi_head mb-1">Lower Fabric Waste and Better Yield</h5>
        <p>
            Fabric is the most expensive input in FIBC manufacturing. Even small inaccuracies can result in significant material loss. Armstrong’s <strong>pp woven fabric cutting machine</strong> is engineered to minimize waste through precise feed control, blade accuracy, and optimized spacing between cuts—ensuring higher yield per roll and lower overall production costs.
        </p>
        
        <h5 class="certi_head mb-1">Seamless Integration with Complete FIBC Production Lines</h5>
        <P>The system integrates smoothly into complete manufacturing setups that include:</P>
         <ul class="mb-4">
            <li class="text-capitalize">Woven sack cutting and sewing machines</li>
            <li class="text-capitalize">PP woven bag automatic cutting and stitching machines</li>
            <li class="text-capitalize">PP woven bag cutting & sewing machine lines</li>
            <li class="text-capitalize">PP woven sacks making machines</li>
            <li class="text-capitalize">PP woven bag cutting sewing printing lines</li>
        </ul>
        <p>This makes it ideal for manufacturers upgrading to fully automated woven bag or jumbo bag production systems.</p>
        <h5 class="certi_head mb-1">Operator-Friendly, Safe, and Low-Maintenance Design</h5>
        <p>Designed for single-operator control, the machine reduces labor dependency while maintaining high output. Safety covers, intuitive controls, and simplified mechanics make daily operation smooth and reliable.</p>
        <p class="mb-0">Routine lubrication and periodic blade checks are sufficient to keep the <strong>pp woven sack cutting machine</strong> running at peak performance, no complex servicing, no frequent breakdowns.</p>
        
    </div>
</section>
<section class="how-it-works section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="text-center">
         <h3 class="main_head_48 head_wrapper mb-4">Applications</h3>
         <p class="mb-4 text-start text-md-center">Ideal for cutting PP woven fabric rolls, jumbo bag panels, and tubular fabrics used in manufacturing FIBCs, woven sacks, baffle bags, spout assemblies, U-panel bags, and other heavy-duty industrial packaging solutions.</p>
      </div>
            </div>
        </div>
    </div>
   <div class="container-fluid px-0">
      
      <div class="how-slider owl-carousel ">
                   <div class="slide-content">
               <div class="image-circle">
                  <img src="https://www.armstrongex.com/public/admin/application/textiles-non-woven-fabrics_68c11ac58cada.png" alt="textiles non Woven fabrics">
               </div>
               <div class="slide-text">
                  <h3>Textiles &amp; Non-Woven Fabrics</h3>
                  <p></p>
               </div>
            </div>
                <div class="slide-content">
                    <div class="image-circle">
                       <img src="https://www.armstrongex.com/public/admin/application/packaging-logistics_68c11ad5563bd.png" alt="packaging logistics">
                    </div>
                    <div class="slide-text">
                       <h3>Packaging &amp; Logistics</h3>
                       <p></p>
                    </div>
               </div>
               <div class="slide-content">
                    <div class="image-circle">
                       <img src="https://www.armstrongex.com/public/admin/application/specialty-powders-granules_68c120bb6ab85.png" alt="specialty powders granules">
                    </div>
                    <div class="slide-text">
                       <h3>Specialty Powders &amp; Granules</h3>
                       <p></p>
                    </div>
               </div>
               <div class="slide-content">
                    <div class="image-circle">
                       <img src="https://www.armstrongex.com/public/admin/application/agriculture_68c119c6b41eb.png" alt="agriculture">
                    </div>
                    <div class="slide-text">
                       <h3>Agriculture</h3>
                       <p></p>
                    </div>
               </div>
               <div class="slide-content">
                    <div class="image-circle">
                       <img src="https://www.armstrongex.com/public/admin/application/fertilizer-agrochemicals_68c11a8c73c18.png" alt="fertilizer agrochemicals">
                    </div>
                    <div class="slide-text">
                       <h3>Fertilizer &amp; Agrochemicals</h3>
                       <p></p>
                    </div>
               </div>
               <div class="slide-content">
                    <div class="image-circle">
                       <img src="https://www.armstrongex.com/public/admin/application/plastics-polymers_68c11ab6019e1.png" alt="plastics polymers">
                    </div>
                    <div class="slide-text">
                       <h3>Plastics &amp; Polymers</h3>
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

        
<div class="row     justify-content-center">
<div class="col-lg-9">
<div class="text-center">
         <h4 class="main_head_48 head_wrapper mb-4">FAQs – FIBC Fabric Cutting Machine</h4>
      </div>
<div id="accordionExample">

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0">

                                   What materials can the FIBC Fabric Cutting Machine cut?
</h5>
<div id="collapse0" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
<div>

                                       It cuts PP/HDPE woven fabrics, laminated fabrics, tubular rolls, liner fabrics, and materials used in jumbo bag and woven sack production.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">

                                    Is the cutting length adjustable in Armstrong’s machine?
</h5>
<div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
<div>

                                        Yes. The PLC system allows fully adjustable cutting lengths with consistent repeatability.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">

                                   What is the cutting accuracy of Armstrong’s FIBC fabric cutting machine?
</h5>
<div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                         The machine maintains high accuracy through controlled feeding, stable tension, and precise blade systems.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">

                                    What is the production capacity of the FIBC Fabric Cutting Machine?
</h5>
<div id="collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                       Designed for high-speed operations, it supports continuous industrial cutting for large FIBC facilities.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">

                                    Does Armstrong provide installation and training?
</h5>
<div id="collapse4" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                       Yes. Professional installation, commissioning, and operator training are included.
</div>
</div>
</div>
<div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">

                                    What industries benefit from using this machine?
</h5>
<div id="collapse5" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                        FIBC manufacturers, woven sack producers, industrial packaging units, chemical and fertilizer industries, and bulk material processors.
</div>
</div>
</div>
<div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">

                                   Can Armstrong customize the machine?
</h5>
<div id="collapse6" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                        Yes. Customization options include cut sizes, spout shapes, blade types, and automation levels.
</div>
</div>
</div>
<div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">

                                   How much maintenance does the machine require?
</h5>
<div id="collapse7" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                      Very low maintenance, routine lubrication and blade inspections are sufficient for optimal performance.
</div>
</div>
</div>
                        </div>
</div>
</div>

        </div>
</section>
@include('layouts.frontfooter')
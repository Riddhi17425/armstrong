@include('layouts.frontheader', [
    'og_image' => asset('public/admin/uploads/products/product_1758088175_68ca4bef2c443.png')
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
   
   .certi_heads
   {
     font-weight: 700; 
   }
   
   .how-slider::before, .how-slider::after
   {
      top: 26.3%;
   }
   
   .how-slider
   {
      min-height: 550px;
   }
   

   @media screen and (max-width: 1601px) {
    .how-slider::before, .how-slider::after {
        top: 27.3%;
    }
}
   @media screen and (max-width: 1441px) {
    .how-slider {
        min-height: 510px;
    }
    
     .how-slider::before, .how-slider::after {
        top: 30%;
    }
}
   

   @media screen and (max-width: 1281px) {
       .how-slider::before, .how-slider::after {
        top: 36.3%;
    }
}



</style>
<section class="breadcrumb_wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb custom-breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="">Products</a></li>
              <li class="breadcrumb-item active" aria-current="page">Woven Sack</li>
           </ol>
        </nav>
        <div class="setting_vector_icon">
           <h1 class="heading">Six-Color Flexographic Roll-To-Roll Printing Machine </h1>
           <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
        </div>
    </div>    
</section>
<section class="section-pt">
   <div class="container">
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-7">
                        <div class="text-center">
                <img src="https://www.armstrongex.com/public/admin/uploads/products/product_1758088175_68ca4bef2c443.png" alt="product" class="img-fluid product_card_details_img">
            </div>
                    </div>
         <div class="col-md-5">
                        <p>The <strong>Six Colors Roll-to-Roll Flexographic Printing Machine</strong> utilizes a cylinder-less, high-speed printing method and has been designed for continuous multi-colour printing on woven bags and roll substrates. This <strong>roll to roll flexographic printing machine</strong> is built for flexibility and precision, enabling vivid, sharp, and uniform brand images on PP woven bags, HDPE fabrics, laminated substrates, and other roll-to-roll packaging materials.</p>
                  <!--<p>As a <strong>Roll to Roll Printing Machine Without Change Cylinder 6 Color</strong>, it eliminates mechanical changeovers and ensures uninterrupted workflow. The <strong>online roll to roll flexographic printing machine</strong> architecture supports stable, high-speed output for demanding industrial environments.</p>-->
                <p>The <strong>6 Colors Flexo Roll to Roll Printing Machine</strong> is equipped with an intelligent PLC touchscreen panel that enables operators to adjust bag length instantly and change print settings quickly, while controlling and monitoring from one centralized interface.This <strong>Fully Automatic 6 Colors Flexo Roll to Roll Printing</strong> system is ideal for factories seeking high-volume, high-precision printing with minimal downtime.</p>
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
              <h2 class="main_head_48 head_wrapper mb-4">6 Flexographic Printing Machine Manufacturer</h2>

           </div>
       </div>
        <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
            <div class="col-md-6">
               <p>For more than four decades, Armstrong has been a global leader as a <strong>roll to roll flexographic printing machine manufacturer</strong>, trusted by woven sack producers across India, Asia, Africa, Europe, and the Middle East.</p>
                     <p>Engineered for heavy-duty industrial use, Armstrong’s <strong>roll to roll flexographic printing machine</strong> supports all major woven and laminated substrates used in packaging:</p>                                          
                   <ul class="mb-4">
                       <li class="text-capitalize">PP woven sacks</li>
                       <li class="text-capitalize">HDPE woven bags</li>
                       <li class="text-capitalize">BOPP laminated rolls</li>
                       <li class="text-capitalize">Multi-layer coated films</li>
                       <li class="text-capitalize">Custom printed industrial packaging</li>
                   </ul>
                  <p>The <strong>Roll to Roll Printing Machine Without Change Cylinder 6 Color</strong> delivers reliable operation and accurate production with crisp registration, consistent colour output, and uniform print quality across long production cycles. Designed for fast installation and easy setup, it reduces operator training time while maximizing machine uptime.
</p>
                    
                    <p>With Armstrong’s decades of manufacturing expertise, woven sack producers benefit from:</p>   
                    <ul class="mb-4">
                       <li class="text-capitalize">Stronger brand printing consistency</li>
                       <li class="text-capitalize">Reduced ink wastage</li>
                       <li class="text-capitalize">Lower maintenance requirements</li>
                       <li class="text-capitalize">Faster project turnaround</li>
                       <li class="text-capitalize">Enhanced long-term production efficiency</li>
                   </ul>
                   
                   <p>This makes Armstrong one of the most trusted <strong>flexographic printers for roll-to-roll coating</strong> and industrial packaging applications worldwide.</p>
            </div>
            <!--<div class="col-md-6">-->
            <!--    <div class="video_card_top">-->
            <!--         <img src="https://www.armstrongex.com/public/admin/product/videos/images/1757584868_FIBC Fabric Cutting Machine.png" alt="FIBC Fabric Cutting Machine" class="img-fluid">-->
            <!--                  <a href="https://www.youtube.com/watch?v=fd9_BsuzfLA" data-fancybox="video-gallery">-->
            <!--                 <img class="play_btn" src="https://www.armstrongex.com/public/front/img/play-btn.png" alt="play">-->
            <!--             </a>-->
            <!--     </div>-->
            <!--</div>-->
        </div>
                  
   </div>
</section>
<!--<section class="section-pt">-->
<!--         <div class="container">-->
<!--            <div class="text-center">-->
<!--               <h3 class="main_head_48 head_wrapper">Technical Specifications </h3>-->
<!--               <p class="text-start text-md-center">The technical specifications of this machine have been designed to deliver maximum accuracy at high volumes thanks to its integrated system of intelligent automation, high-precision cut tools and durable mechanical construction that enables long-term performance in industrial environments.</p>-->
<!--            </div>-->
<!--               <div class="row mt-5 gx-md-5">-->
               
<!--                              <div class="col-md-6 mb-4 mb-lg-0">-->
<!--                  <div class="table-responsive rounded-3 overflow-hidden">-->
<!--                     <table class="table table-bordered table-striped mb-0">-->
<!--                        <thead class="table-dark">-->
<!--                           <tr>-->
<!--                              <th scope="col">Parameter</th>-->
<!--                              <th scope="col">Specification</th>-->
<!--                           </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                                                      <tr>-->
<!--                              <td>Fabric type</td>-->
<!--                              <td><p>Tubler or Flat fabric</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Maximum width of fabric</td>-->
<!--                              <td><p>2200mm</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Maximum diameter of fabric roll</td>-->
<!--                              <td><p>1500 mm</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Maximum weight of fabric roll</td>-->
<!--                              <td><p>1000 kgs</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Cutting Length</td>-->
<!--                              <td><p>200-25000 mm</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Round spout</td>-->
<!--                              <td><p>30cm with machine</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Cross punch</td>-->
<!--                              <td><p>20cm with the machine</p></td>-->
<!--                           </tr>-->
<!--                                                   </tbody>-->
<!--                     </table>-->
<!--                  </div>-->
<!--               </div>-->
<!--               <div class="col-md-6">-->
<!--                  <div class="table-responsive rounded-3 overflow-hidden">-->
<!--                     <table class="table table-bordered table-striped mb-0">-->
<!--                        <thead class="table-dark">-->
<!--                           <tr>-->
<!--                              <th scope="col">Parameter</th>-->
<!--                              <th scope="col">Specification</th>-->
<!--                           </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                                                      <tr>-->
<!--                              <td>Bottom</td>-->
<!--                              <td><p>Straight cut / Zigzag Cut ( Any one With Machine )</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Production Speed without spout</td>-->
<!--                              <td><p>1 meters Length 16 Pcs/ Min*</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Production Speed with spout</td>-->
<!--                              <td><p>1 meters Length 13 Pcs/ Min*</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Cutting Accuracy</td>-->
<!--                              <td><p>+/-2% mm</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Power Consumption</td>-->
<!--                              <td><p>15 W</p></td>-->
<!--                           </tr>-->
<!--                                                      <tr>-->
<!--                              <td>Machine Dimension(L x W x H)</td>-->
<!--                              <td><p>5.7 x 2.9 x 1.3 meter</p></td>-->
<!--                           </tr>-->
<!--                                                   </tbody>-->
<!--                     </table>-->
<!--                  </div>-->
<!--               </div>-->
<!--                           </div>-->
<!--         </div>-->
<!--      </section>-->
      <section class="section-mt">
    <div class="container">
        <h2 class="main_head_48 head_wrapper mb-4">Our Flexographic Printing Machine Key Features </h2>
         <h5 class="certi_heads mb-1">Cylinder-Less Printing for Zero Changeover</h5>
         <p>As a <strong>Roll to Roll Printing Machine Without Change Cylinder 6 Color</strong>, the system allows instant adjustment of bag size and artwork directly through the PLC interface—saving hours of downtime per production cycle.</p>
        <h5 class="certi_heads mb-1">Six-Color High-Definition Printing</h5>
        <p>The advanced six-colour flexo system ensures sharp detailing, vibrant colour reproduction, and stable registration—ideal for branded woven sacks, agricultural bags, retail packaging, and industrial designs.</p>
        <h5 class="certi_heads mb-1">Intelligent Ink Mixing & Circulation</h5>
        <p>Smart ink management automatically mixes, circulates, and stabilizes inks, reducing colour mismatch, sedimentation, and viscosity issues. The result: cleaner prints, consistent colours, and reduced ink waste.</p>
        <h5 class="certi_heads mb-1">High-Speed Roll-to-Roll Operation</h5>
        <!--<p>Built for continuous industrial production, the machine features inverter-controlled unwinding and rewinding for stable tension, wrinkle-free substrate movement, and uninterrupted roll-to-roll printing.</p>-->
        <p>Built for continuous industrial production, the <strong>online roll to roll flexographic printing machine</strong> features inverter-controlled unwinding and rewinding for stable tension, wrinkle-free substrate movement, and uninterrupted roll-to-roll printing.
</p>
        <h5 class="certi_heads mb-1">Dual Drying System for Fast Ink Curing</h5>
        <p>
            High-efficiency hot air drying ensures rapid ink curing, allowing high-speed multi-colour printing without smudging or colour degradation.
        </p>
        
        <h5 class="certi_heads mb-1">Intelligent PLC Touchscreen Control</h5>
        <P>Operators can monitor and control print length, drying temperature, speed, ink usage, tension, and registration in real time—minimizing setup time and maximizing consistency.</P>
         
        <h5 class="certi_heads mb-1">Heavy-Duty Industrial Construction</h5>
        <p>Reinforced frames, precision drive systems, and industrial-grade components ensure vibration-free performance even during long production runs.</p>
        
        <h5 class="certi_heads mb-1">Versatility Across Substrates</h5>
        <p>Whether used alongside a <strong>fabric roll gusseting and cutting machine</strong> or integrated into a complete woven sack production line, this system adapts seamlessly to PP woven, BOPP laminated, coated films, and roll-based substrates.</p>
    </div>
</section>
<section class="how-it-works section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="text-center">
         <h3 class="main_head_48 head_wrapper mb-4">Applications</h3>
         <p class="mb-4 text-start text-md-center">This <strong>roll to roll flexographic printing machine</strong> is widely used for large-scale, multi-colour printing on woven sacks, laminated rolls, and roll-based packaging materials requiring consistent branding and high-volume output.</p>
         <p class="mb-4 text-start text-md-center"><b>It is commonly applied in:</b> Woven sack manufacturing - Fertilizer and grain packaging - Cement and construction material bags - Polymer and chemical packaging - Animal feed bags - Food-grade woven sacks - Export packaging and industrial branding<p>
             <!--<ul class="mb-4">-->
             <!--          <li class="text-capitalize">Woven sack manufacturing</li>-->
             <!--          <li class="text-capitalize">Fertilizer and grain packaging</li>-->
             <!--          <li class="text-capitalize">Cement and construction material bags</li>-->
             <!--          <li class="text-capitalize">Polymer and chemical packaging</li>-->
             <!--          <li class="text-capitalize">Animal feed bags</li>-->
             <!--          <li class="text-capitalize">Food-grade woven sacks</li>-->
             <!--          <li class="text-capitalize">Export packaging and industrial branding</li>-->
             <!--      </ul>-->
      </div>
            </div>
        </div>
    </div>
   <div class="container-fluid px-0">
      
      <div class="how-slider owl-carousel ">
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
                          <img src="https://www.armstrongex.com/public/admin/application/food-processing_68c119dfd08c4.png" alt="textiles non Woven fabrics">
                       </div>
                       <div class="slide-text">
                          <h3>Food Processing</h3>
                          <p></p>
                       </div>
                    </div>
                   <div class="slide-content">
               <div class="image-circle">
                  <img src="https://www.armstrongex.com/public/admin/application/animal-feed-poultry_68c11a412eabc.png" alt="textiles non Woven fabrics">
               </div>
               <div class="slide-text">
                  <h3>Animal Feed &amp; Poultry</h3>
                  <p></p>
               </div>
            </div>
                
               <div class="slide-content">
                    <div class="image-circle">
                       <img src="https://www.armstrongex.com/public/admin/application/pet-food_68c11a744ae0b.png" alt="specialty powders granules">
                    </div>
                    <div class="slide-text">
                       <h3>Pet Food</h3>
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
                       <img src="https://www.armstrongex.com/public/admin/application/packaging-logistics_68c11ad5563bd.png" alt="packaging logistics">
                    </div>
                    <div class="slide-text">
                       <h3>Packaging &amp; Logistics</h3>
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
         <h4 class="main_head_48 head_wrapper mb-4">FAQs – Six-Color Flexographic Roll-To-Roll Printing Machine</h4>
      </div>
<div id="accordionExample">

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0">

                                   What substrates can this machine print on?
</h5>
<div id="collapse0" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
<div>

                                       PP woven fabric, HDPE woven fabric, laminated rolls, BOPP films, coated films, and other roll-to-roll substrates.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">

                                    What is the production speed?
</h5>
<div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
<div>

                                        Typically 50–70 pcs/min, depending on substrate type and print complexity.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">

                                   Is it suitable for long continuous production runs?
</h5>
<div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                        Yes. The roll-to-roll system is designed for continuous, high-volume industrial printing with minimal downtime.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">

                                   Which industries benefit most from this machine?
</h5>
<div id="collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                       Woven sack manufacturers, fertilizer companies, cement plants, agriculture, food packaging, chemicals, polymers, and industrial packaging.
</div>
</div>
</div>

                        <div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">

                                    Does it support automatic tension control and web alignment?
</h5>
<div id="collapse4" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                       Yes. It includes inverter-controlled unwinding/winding and automatic colour registration.
</div>
</div>
</div>
<div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">

                                    Can Armstrong customize the machine?
</h5>
<div id="collapse5" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                       Yes. Print sizes, colour configurations, web widths, and automation levels can be customized.
</div>
</div>
</div>
<div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">

                                   What safety features are included?
</h5>
<div id="collapse6" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>

                                        Emergency stops, overload protection, heat-shielded drying units, and fully enclosed guards.
</div>
</div>
</div>
<div class="mb-4">
<h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">

                                  What makes Armstrong’s machine stand out?
</h5>
<div id="collapse7" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
<div>
                                Its cylinder-less design, heavy-duty build quality, low maintenance needs, global service support, and reliable long-term performance.
</div>
</div>
</div>
                        </div>
</div>
</div>

        </div>
</section>
@include('layouts.frontfooter')
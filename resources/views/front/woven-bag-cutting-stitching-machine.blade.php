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
            <li class="breadcrumb-item active" aria-current="page">Woven Bag Cutting & Stitching Machine </li>
         </ol>
      </nav>
      <div class="setting_vector_icon">
         <h1 class="heading">Woven Bag Cutting & Stitching Machine </h1>
         <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
      </div>
   </div>
</section>
<section class="section-pt">
   <div class="container">
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <div class="col-md-7">
            <div class="text-center">
               <img src="https://www.armstrongex.com/public/admin/uploads/products/product_1757066605_68bab56dd4ca4.png" alt="product" class="img-fluid product_card_details_img">
            </div>
         </div>
         <div class="col-md-5">
            <p>Armstrong Woven Bag Cutting and Sewing Machine is designed and built with precision engineering to provide high-speed, accurate, and consistent cutting and sewing of industrial woven bags. This <strong>pp bag cutting and stitching solution</strong> is perfect for long-term use if you want dependability and productivity.</p>
            <p>The <strong>Automatic PP Woven Bag Cutting Machine</strong> uses an advanced servo-controlled system to Cut, Fold, Stitch, and Stack flawlessly woven bags made of PP, HDPE, & BOPP. The <strong>pp woven bag cutting machine</strong> accurately cuts all products to specified lengths, minimizes Material Wastage, & produces Woven Bags that Are Uniform in Appearance to 95%. This advanced <strong>woven sack bag cutting machine</strong> can be used to manufacture bags for fertilizers, grains, sugar, construction materials, and polymer bulk packaging. The <strong>pp woven bag cutting and sewing machine</strong>, with a width range of 300 mm to 800 mm, is capable of producing 30-45 completed woven bags every minute.</p>
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
            <h2 class="main_head_48 head_wrapper mb-4">Leading Manufacturer of BCS Machine </h2>
         </div>
      </div>
      <div class="row gy-4 gy-lg-0 gx-lg-5 align-items-center">
         <p>For more than four decades, Armstrong has been a trusted <strong>woven bag cutting machine manufacturer</strong>, supplying advanced BCS systems to woven sack producers across India, Asia, Africa, the Middle East, and Europe.</p>
         <p>Our <strong>BCS Machine for PP Woven Bag</strong> combines precision cutting technology with high-strength stitching mechanisms to ensure every PP woven and HDPE woven sack meets strict dimensional, strength, and finishing standards. Designed as a <strong>BCS Machine for PP Woven Sack</strong>, it supports continuous 24/7 industrial operation.</p>
         <div class="col-md-6">
            <p class="certi_head mb-1">Built for heavy-duty performance, it ensures:</p>
            <ul class="mb-4">
               <li class="text-capitalize">Uniform cutting of woven fabric</li>
               <li class="text-capitalize">Consistent seam strength and stitching durability</li>
               <li class="text-capitalize">Accurate bag length control</li>
               <li class="text-capitalize">Reduced operator dependency</li>
               <li class="text-capitalize">Improved material utilization</li>
            </ul>
            <p>Armstrong’s systems function as a complete <strong>pp woven bag cutting sewing machine</strong>, supporting standard PP bags, HDPE woven sacks, FIBC components, jumbo bag liners, Q-bags, baffle bag components, and more.</p>
            <p>With synchronized drives, intelligent PLC control, and ergonomic design, Armstrong stands as a reliable <strong>Bag Cutting and Stitching Machine Manufacturer</strong>, helping producers achieve higher output, fewer errors, and consistent export-quality performance.</p>
         </div>
         <div class="col-md-6">
            <div class="video_card_top">
               <img src="https://www.armstrongex.com/public/admin/product/videos/images/1757588250_Armstrong%20BCS%20Machine.png" alt="FIBC Fabric Cutting Machine" class="img-fluid">
               <a href="https://www.youtube.com/watch?v=5DbR-6W3giU" data-fancybox="video-gallery">
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
         <p class="text-start text-md-center">Built for precision and high-speed woven sack conversion, this <strong>PP Woven Bag Cutting & Sewing Machine</strong> ensures accurate cutting, consistent stitching, and seamless stacking for PP and HDPE bag production.</p>
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
                        <td>Operator Requirement</td>
                        <td>
                           <p>1 Person</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Fabric Roll Capacity</td>
                        <td>
                           <p>Up to 500 kg</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Bag Width Range</td>
                        <td>
                           <p>12" to 32"</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Bag Length Range</td>
                        <td>
                           <p>17" to 55"</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Production Speed</td>
                        <td>
                           <p>20–35 Bags per Minute</p>
                        </td>
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
                        <td>Rated Power</td>
                        <td>
                           <p>15 HP</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Actual Power Consumption</td>
                        <td>
                           <p>10 HP</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Pneumatic Requirement</td>
                        <td>
                           <p>8–10 kg/cm²</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Machine Dimensions (L × W × H)</td>
                        <td>
                           <p>19 ft × 15 ft × 5.5 ft</p>
                        </td>
                     </tr>
                     <tr>
                        <td>Net Weight</td>
                        <td>
                           <p>Approx. 2500 kg</p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section-mt">
   <div class="container">
      <h2 class="main_head_48 head_wrapper mb-4">Key Features</h2>
      <p>Armstrong’s <strong>Fully Automatic PP Woven Bag Cutting & Sewing Machine</strong> is designed to optimize every stage of woven sack conversion, ensuring efficiency, durability, and consistent output.</p>
      <h5 class="certi_heads mb-1">Fast cross-cutting with servo-controlled accuracy</h5>
      <p>The servo-controlled cutting system ensures each sack is cut to exact length, reducing waste and ensuring uniform batches—key for any <strong>pp woven sack cutting machine</strong>.</p>
      <h5 class="certi_heads mb-1">Automatic folding and stitching in one continuous process</h5>
      <p>Integrated folding and heavy-duty stitching eliminate manual steps, delivering strong seams suitable for industrial load conditions.
      </p>
      <h5 class="certi_heads mb-1">Smart PLC interface for easy operation</h5>
      <p>Operators can easily control bag length, speed, and stitching parameters through an intuitive PLC interface.</p>
      <h5 class="certi_heads mb-1">Automatic stacking for high-volume production</h5>
      <p>
         Finished bags are neatly stacked, improving handling efficiency and reducing post-production labor.
      </p>
      <h5 class="certi_heads mb-1">Built for durability & continuous industrial use</h5>
      <P>Heavy-duty steel construction, vibration-free operation, and industrial-grade drives support long production cycles.</P>
      <h5 class="certi_heads mb-1">Supports multiple bag types</h5>
      <p>From PP woven and HDPE sacks to laminated bags and FIBC components, this <strong>automatic woven sack cutting and stitching machine</strong> offers unmatched versatility.</p>
   </div>
</section>
<section class="how-it-works section-pt">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-9">
            <div class="text-center">
               <h3 class="main_head_48 head_wrapper mb-4">Applications</h3>
               <p class="mb-4 text-start text-md-center">The <strong>Woven Bag Cutting & Stitching Machine</strong> is used across industries where durable, high-quality woven packaging is essential for storage and transportation.</p>
               <p class="mb-4 text-start text-md-center">This <strong>pp bag cutting machine</strong> delivers fast, accurate, and uniform bag finishing across all woven packaging applications.</p>
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
               <h4 class="main_head_48 head_wrapper mb-4">FAQs - Woven Bag Cutting & Stitching Machine</h4>
            </div>
            <div id="accordionExample">
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                     What is a Woven Bag Cutting & Stitching Machine?
                  </h5>
                  <div id="collapse0" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                     <div>
                        It is a high-speed conversion system that automates cutting, folding, stitching, and stacking of PP and HDPE woven bags.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                     How does the machine work for PP woven and HDPE bags?
                  </h5>
                  <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                     <div>
                        Fabric rolls are fed into the system, cut, folded, stitched, counted, and stacked automatically.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                     Can the machine handle FIBC and jumbo bags?
                  </h5>
                  <div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Yes, it supports woven components for FIBC and jumbo bag production.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                     Is it suitable for food-grade and chemical-grade bags?
                  </h5>
                  <div id="collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Yes, its precision cutting and strong stitching suit food, grain, fertilizer, and chemical packaging.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                     What safety features are included?
                  </h5>
                  <div id="collapse4" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Emergency stops, guarded sewing heads, overload protection, and insulated wiring ensure safe operation.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                     Can Armstrong customize the machine?
                  </h5>
                  <div id="collapse5" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Yes, length settings, stitching types, and operational parameters can be customized.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                     What is the production speed?
                  </h5>
                  <div id="collapse6" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Typically 30–45 bags per minute, depending on configuration and fabric quality.
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <h5 class="according_head collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                     Can it be used for Q-bags, baffle bags, or U-panel bags?
                  </h5>
                  <div id="collapse7" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                     <div>
                        Yes, it supports woven components for various FIBC formats.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@include('layouts.frontfooter')
@include('layouts.frontheader')
<section class="breadcrumb_wrapper">
  <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terms &amp; Conditions</li>
        </ol>
    </nav>
    <div class="setting_vector_icon">
        <h1 class="heading">Terms &amp; Conditions</h1>
        <img src="{{ asset('public/front/img/setting_vector.svg') }}" alt="setting vector" class="img-fluid setting-wrapper">
    </div>
  </div>
</section>

<section class="section-mt ">
        <div class="container ">
      <h2>Introduction</h2>
      <p>Welcome to Armstrong’s official website, by accessing, browsing, or using this website, you agree to be bound by these Terms and Conditions. These terms are designed to protect both Armstrong and our customers, ensuring a transparent, professional, and fair business relationship.</p>

      <h2>Use of Website</h2>
      <p>The information provided on this website is intended for general guidance, product awareness, and promotional purposes.</p>
      <p>While Armstrong strives to keep information accurate and updated, specifications, designs, and details may change without notice as part of continuous innovation.</p>
      <p>Unauthorized use of the website, including reproduction, modification, or commercial exploitation of content, without written permission from Armstrong, is strictly prohibited.</p>

      <h2>Products &amp; Services</h2>
      <p>All machinery, spare parts, and solutions listed on this website are subject to availability, technical updates, and performance improvements.</p>
      <p>Images and descriptions are indicative; final deliverables may vary depending on manufacturing updates and customization requirements.</p>
      <p>Armstrong reserves the right to accept, decline, or modify any order or inquiry based on business feasibility.</p>

      <h2>Pricing &amp; Payment</h2>
      <p>Prices are subject to change without prior notice due to raw material costs, exchange rates, or market conditions.</p>
      <p>Quotations issued by Armstrong are valid only for the period mentioned in the proposal.</p>
      <p>All payments must be made as per agreed commercial terms in purchase orders or contracts.</p>

      <h2>Warranty &amp; Liability</h2>
      <p>Armstrong provides warranties as specified in official documentation for each machine or part.</p>
      <p>Warranty does not cover misuse, improper handling, or unauthorized modifications by the customer.</p>
      <p>Armstrong shall not be liable for any incidental, indirect, or consequential damages arising from the use or inability to use our machinery or services.</p>

      <h2>Intellectual Property</h2>
      <p>All designs, logos, trademarks, technical drawings, product names, and content on this site remain the sole property of Armstrong.</p>
      <p>Unauthorized reproduction, redistribution, or use of Armstrong’s intellectual property is strictly prohibited.</p>

      <h2>Third-Party Links</h2>
      <p>The website may contain links to third-party sites for additional resources. Armstrong is not responsible for the content, policies, or practices of such sites.</p>

      <h2>Governing Law</h2>
      <p>These terms and conditions are governed by the laws of India. Any disputes shall be subject exclusively to the jurisdiction of the courts in Ahmedabad, Gujarat.</p>

    </div>
</section>

@include('layouts.frontfooter')
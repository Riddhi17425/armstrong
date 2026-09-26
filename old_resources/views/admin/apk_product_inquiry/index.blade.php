@extends('admin.layouts.app')

@section('content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div id="message-pop-up" class="alert  alert-dismissible fade show"  role="alert" style="display: none">
                    <span id="success-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Inquiry Data</h3>
                        <div class="mb-3">
                            <select id="inquiryFilter" class="form-select">
                                <option value="product-inquiry">Product Inquiry</option>
                                <option value="contact-us-inquiry">Contact-us Inquiry</option>
                                <option value="application-inquiry">Application Inquiry</option>
                                <option value="landing-page-inquiry">Landing Page Inquiry</option>
                            </select>
                        </div>
                    </div>
                </div> 
            </div> <!-- Row end  --> 
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="apk-product-inquiry" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Purpose Of Inquiry</th>
                                        <th>Full Name</th> 
                                        <th>Phone</th> 
                                        <th>Email</th>  
                                        <th>Company Name</th>
                                    </tr>
                                </thead>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>

    <!-- Add Industries-->
    <div class="modal fade" id="industries_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="industries_modalLabel">Add Industries</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="industries_form" method="Post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="industries_name" class="form-label">Industries Name</label>
                                <input type="text" name="industries_id" id="industries_id" hidden>
                                <input type="text" class="form-control" name="industries_name" id="industries_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                 placeholder="Add Industries Name" required>
                                <span class="text-danger error" id="span_industries"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="industries_status" class="form-label">Status</label> <br>
                                <input type="radio"  name="industries_status" value="Active"> Active
                                <input type="radio" name="industries_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_industries_status"></span>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="Saveindustries" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>
    <script>
        // js load on footer
        window.APP_URLS = {
            csrfToken: "{{ csrf_token() }}",
            apk_product_inquiry_data : "{{ route('admin.apk.get.product.inquiry') }}",

        };
        </script>
        <script src="{{ asset('public/admin/js/apkproduct/apkproducts.js') }} " defer></script>
    @endsection
    

     
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
                        <h3 class="fw-bold mb-0">Product Feature Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#product_feature_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Product Feature</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="productfeaturetable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th> 
                                        <th>Status</th>
                                        <th>Actions</th>  
                                    </tr>
                                </thead>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>

    <!-- Add Category-->
    <div class="modal fade" id="product_feature_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="product_feature_modalLabel">Add Product Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="product_feature_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="product_feature_name" class="form-label">Name <span class="required-star text-danger">*</span></label>
                                <input type="text" name="product_feature_id" id="product_feature_id" hidden>
                                <input type="text" class="form-control" name="product_feature_name" id="product_feature_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                 placeholder="Add Product feature ">
                                <span class="text-danger error" id="span_product_feature"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="product_feature_status" class="form-label">Status <span class="required-star text-danger">*</span></label> <br>
                                <input type="radio"  name="product_feature_status" value="Active"> Active
                                <input type="radio" name="product_feature_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_product_feature_status"></span>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="SaveProductfeature" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        // js load on footer
        window.APP_URLS = {
            product_featureStore: "{{ route('productfeature.store') }}",
            product_featureUpdate: "{{ route('productfeature.update', [':id']) }}",
            csrfToken: "{{ csrf_token() }}", 
            product_feature_get_data : "{{ route('product_feature_get_data') }}",
            product_feature_edit_data : "{{ route('productfeature.edit' , [':id']) }}",
            product_feature_delete_data : "{{ route('productfeature.delete' , [':id']) }}",
            image_path: "{{ asset('/') }}"

        };
    </script>

    <script src="{{ asset('public/admin/js/product_feature/product_feature.js') }}" defer></script>

    @endsection
    

    
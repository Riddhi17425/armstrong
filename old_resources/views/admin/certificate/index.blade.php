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
                        <h3 class="fw-bold mb-0">Certificate Image Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#certificate_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Certificate Images</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="certificatetable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
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
    <div class="modal fade" id="certificate_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="certificate_modalLabel">Add Certificate Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="certificate_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="certificate_name" class="form-label">Name <span class="required-star text-danger">*</span></label>
                                <input type="text" name="certificate_id" id="certificate_id" hidden>
                                <input type="text" class="form-control" name="certificate_name" id="certificate_name" placeholder="Add certificate name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();" required>
                                <span class="text-danger error" id="span_certificate"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <label for="alt" class="form-label">Alt</label>
                                <input type="text" name="alt" id="certificate_id" hidden>
                                <input type="text" class="form-control" name="alt" id="alt" placeholder="Add Alt">
                            </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="certificate_status" class="form-label">Status <span class="required-star text-danger">*</span></label> <br>
                                <input type="radio"  name="certificate_status" value="Active"> Active
                                <input type="radio" name="certificate_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_certificate_status"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="certificate_image" class="form-label">Image <span class="required-star text-danger">*</span></label>
                                <input type="file" class="form-control" name="certificate_image" id="certificate_image" onchange="validateAndPreviewImage()">
                                <span class="text-danger error" id="span_certificate_image"></span>
                            </div>

                            <div class="col-sm-12">
                                <label>
                                    <input type="checkbox" name="compress" value="1"> Compress Image
                                </label>
                            </div>

                            <div class="col-sm-12">
                                <img id="preview_certificate_image" src="#" alt="Preview" class="mt-2" style="max-width: 100%; height: auto; display: none;" />
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="Savecertificate" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        // js load on footer
        window.APP_URLS = {
            CertificateStore: "{{ route('certificate.store') }}",
            CertificateUpdate: "{{ route('certificate.update', [':id']) }}",
            csrfToken: "{{ csrf_token() }}", 
            certificate_get_data : "{{ route('certificate_get_data') }}",
            certificate_edit_data : "{{ route('certificate.edit' , [':id']) }}",
            certificate_delete_data : "{{ route('certificate.delete' , [':id']) }}",
            image_path: "{{ asset('/') }}"

        };
    </script>

    <script src="{{ asset('public/admin/js/certificate/certificate.js') }}" defer></script>

    @endsection
    

    
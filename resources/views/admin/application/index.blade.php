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
                        <h3 class="fw-bold mb-0">Application Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#application_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add application</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="applicationtable" class="table table-hover align-middle mb-0" style="width:100%">
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

    <!-- Add application-->
    <div class="modal fade" id="application_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="application_modalLabel">Add Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="application_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="application_name" class="form-label">Application Name <span class="required-star text-danger">*</span></label>
                                <input type="text" name="application_id" id="application_id" hidden>
                                <input type="text" class="form-control" name="application_name" id="application_name" placeholder="Add application">
                                <span class="text-danger  error" id="span_application"></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="alt" class="form-label">Alt</label>
                                <input type="text" name="alt" id="application_id" hidden>
                                <input type="text" class="form-control" name="alt" id="alt" placeholder="Add Alt">
                                <span class="text-danger  error" id="span_application_alt"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="application_status" class="form-label">Status <span class="required-star text-danger">*</span></label> <br>
                                <input type="radio"  name="application_status" value="Active"> Active
                                <input type="radio" name="application_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_application_status"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="application_image" class="form-label">Application Image <span class="required-star text-danger">*</span></label>
                                <input type="file" class="form-control" name="application_image" id="application_image" onchange="validateAndPreviewImage()">
                                <span class="text-danger error" id="span_application_image"></span>
                            </div>
                            <div class="col-sm-12">
                                <label>
                                    <input type="checkbox" name="compress" value="1"> Compress Image
                                </label>
                            </div>
                            <img id="preview_application_image" src="#" alt="Preview" class="mt-2" style="max-width: 100%; height: auto; display: none;" />
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="Saveapplication" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        // js load on footer
        window.APP_URLS = {
            applicationStore: "{{ route('application.store') }}",
            applicationUpdate: "{{ route('application.update', [':id']) }}",
            csrfToken: "{{ csrf_token() }}", 
            application_get_data : "{{ route('application_get_data') }}",
            application_edit_data : "{{ route('application.edit' , [':id']) }}",
            application_delete_data : "{{ route('application.delete' , [':id']) }}",
            image_path: "{{ asset('/') }}"
        }; 
    </script>

    <script src="{{ asset('public/admin/js/application/application.js') }}" defer></script>

    @endsection
    

    
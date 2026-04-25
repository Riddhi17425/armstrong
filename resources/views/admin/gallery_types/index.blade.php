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
                        <h3 class="fw-bold mb-0">Gallery Types Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#gallerytypes_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Gallery Types</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="gallerytypestable" class="table table-hover align-middle mb-0" style="width:100%">
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

    <!-- Add gallery types-->
    <div class="modal fade" id="gallerytypes_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="gallerytypes_modalLabel">Add Gallery Types</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="gallerytypes_form" method="Post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="gallerytypes_name" class="form-label">Gallery Types Name <span class="required-star text-danger">*</span></label>
                                <input type="text" name="gallerytypes_id" id="gallerytypes_id" hidden>
                                <input type="text" class="form-control" name="gallerytypes_name" id="gallerytypes_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                 placeholder="Add gallery types Name" required>
                                <span class="text-danger error" id="span_gallerytypes"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="gallerytypes_status" class="form-label">Status <span class="required-star text-danger">*</span></label> <br>
                                <input type="radio"  name="gallerytypes_status" value="Active"> Active
                                <input type="radio" name="gallerytypes_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_gallerytypes_status"></span>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="Savegallerytypes" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>
    <script>
        // js load on footer
        window.APP_URLS = {
            gallerytypesStore: "{{ route('gallerytypesStoreAndUpdate') }}",
            csrfToken: "{{ csrf_token() }}",
            gallerytypes_get_data : "{{ route('gallerytypes_get_data') }}",
            gallerytypes_edit_data : "{{ route('gallerytypes.edit' , [':id']) }}",
            gallerytypes_delete_data : "{{ route('gallerytypes.delete' , [':id']) }}",

        };
        </script>
        <script src="{{ asset('public/admin/js/gallerytypes/gallerytypes.js') }} " defer></script>
    @endsection
    

     
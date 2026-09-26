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
                        <h3 class="fw-bold mb-0">Industries Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#industries_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Industries</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="industriestable" class="table table-hover align-middle mb-0" style="width:100%">
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
            industriesStore: "{{ route('industriesStoreAndUpdate') }}",
            csrfToken: "{{ csrf_token() }}",
            industries_get_data : "{{ route('industries_get_data') }}",
            industries_edit_data : "{{ route('industries.edit' , [':id']) }}",
            industries_delete_data : "{{ route('industries.delete' , [':id']) }}",

        };
        </script>
        <script src="{{ asset('public/admin/js/industries/industries.js') }} " defer></script>
    @endsection
    

     
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
                            <a href="{{ route('application.create') }}">
                                <button type="button" class="btn btn-primary btn-set-task w-sm-100" ><i class="icofont-plus-circle me-2 fs-6"></i>Add application</button>
                            </a>
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
    

    
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
                        <h3 class="fw-bold mb-0">InfrastructureSlider Image Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#infrastructureslider_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Infrastructureslider Images</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="infrastructureslidertable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
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
    <div class="modal fade" id="infrastructureslider_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="infrastructureslider_modalLabel">Add infrastructureslider Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="infrastructureslider_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="infrastructureslider_id" id="infrastructureslider_id" hidden>
                                <label for="infrastructureslider_status" class="form-label">Status</label> <br>
                                <input type="radio"  name="infrastructureslider_status" value="Active"> Active
                                <input type="radio" name="infrastructureslider_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_infrastructureslider_status"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <label for="alt" class="form-label">Alt</label>
                                <input type="text" name="infrastructureslider_id" id="infrastructureslider_id" hidden>
                                <input type="text" class="form-control" name="alt" id="alt" placeholder="Add Alt">
                            </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="infrastructureslider_image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="infrastructureslider_image" id="infrastructureslider_image" onchange="validateAndPreviewImage()">
                                <span class="text-danger error" id="span_infrastructureslider_image"></span>
                            </div>

                            <div class="col-sm-12">
                                <label>
                                    <input type="checkbox" name="compress" value="1"> Compress Image
                                </label>
                            </div>

                            <div class="col-sm-12">
                                <img id="preview_infrastructureslider_image" src="#" alt="Preview" class="mt-2" style="max-width: 100%; height: auto; display: none;" />
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="Saveinfrastructureslider" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        // js load on footer
        window.APP_URLS = {
            InfrastructuresliderStore: "{{ route('infrastructureslider.store') }}",
            InfrastructuresliderUpdate: "{{ route('infrastructureslider.update', [':id']) }}",
            csrfToken: "{{ csrf_token() }}", 
            Infrastructureslider_get_data : "{{ route('infrastructureslider_get_data') }}",
            Infrastructureslider_edit_data : "{{ route('infrastructureslider.edit' , [':id']) }}",
            Infrastructureslider_delete_data : "{{ route('infrastructureslider.delete' , [':id']) }}",
            image_path: "{{ asset('/') }}"

        };
    </script>

    <script src="{{ asset('public/admin/js/infrastructureslider/infrastructureslider.js') }}" defer></script>

    @endsection
    

    
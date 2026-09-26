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
                        <h3 class="fw-bold mb-0">Application Create</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a href="{{ route('application') }}">
                                <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" >Back</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
        </div>
        <div class="card">
            <div class="card-body">
                <form id="application_form" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="application_name" class="form-label">Application Name <span class="required-star text-danger">*</span></label>
                            <input type="text" name="application_id" id="application_id" hidden>
                            <input type="text" class="form-control" name="application_name" id="application_name" placeholder="Add application">
                            <span class="text-danger  error" id="span_application"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="alt" class="form-label">Alt</label>
                            <input type="text" class="form-control" name="alt" id="alt" placeholder="Add Alt">
                            <span class="text-danger  error" id="span_application_alt"></span>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label>URL</label>
                            <input type="text" name="url" id="url" class="form-control" placeholder="Enter URL">
                        </div>

                        <div class="col-sm-6">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta Title">
                        </div>

                        <div class="col-sm-12">
                            <label>Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control summernote" rows="2"></textarea>
                        </div>

                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="alt" class="form-label">Web Site Details Title</label>
                            <input type="text" class="form-control" name="details_title" id="details_title" placeholder="Add Details Title">
                            <span class="text-danger  error" id="span_application_alt"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="application_status" class="form-label">Status <span class="required-star text-danger">*</span></label> <br>
                            <input type="radio" name="application_status" value="Active"> Active
                            <input type="radio"name="application_status" value="In-Active"> In Active <br>
                            <span class="text-danger error" id="span_application_status"></span>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-sm-10">
                            <label for="application_image" class="form-label">Application Image <span class="required-star text-danger">*</span></label>
                            <input type="file" class="form-control" name="application_image" id="application_image" onchange="validateAndPreviewImage()">
                            <span class="text-danger error" id="span_application_image"></span>
                        </div>
                        <div class="col-sm-2">
                            <img id="preview_application_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                        </div>
                        <div class="col-sm-10">
                            <label>
                                <input type="checkbox" name="compress" value="1"> Compress Image
                            </label>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <!-- Website Top Image -->
                        <div class="col-sm-6">
                            <label class="form-label">Website Top Image</label>
                            <input type="file" class="form-control" name="website_top_image" id="website_top_image">
                            <img id="preview_top_image" style="max-width:100px; display:none;">
                        </div>

                        <!-- Website Bottom Image -->
                        <div class="col-sm-6">
                            <label class="form-label">Website Bottom Image</label>
                            <input type="file" class="form-control" name="website_bottom_image" id="website_bottom_image">
                            <img id="preview_bottom_image" style="max-width:100px; display:none;">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label>Short Description</label>
                            <textarea name="short_description" class="form-control summernote"></textarea>
                        </div>

                        <div class="col-sm-12">
                            <label>Website Top Description</label>
                            <textarea name="website_top_desc" class="form-control summernote"></textarea>
                        </div>

                        <div class="col-sm-12">
                            <label>Website Bottom Description</label>
                            <textarea name="website_bottom_desc" class="form-control summernote"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label>FAQs</label>
                            <div id="faq_container"></div>

                            <button type="button" id="add_faq" class="btn btn-success mt-2">
                                Add FAQ
                            </button>
                        </div>
                    </div>
                </form>
                <button type="button" id="Saveapplication" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>


    <script>
        // js load on footer
        window.APP_URLS = {
            index : "{{ route('application') }}",
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
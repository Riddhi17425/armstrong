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
                        <h3 class="fw-bold mb-0">Product Category Information</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#category_modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Category</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3"> 
                        <div class="card-body">
                            <table id="categorytable" class="table table-hover align-middle mb-0" style="width:100%">
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
    <div class="modal fade" id="category_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="category_modalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="deadline-form">
                    <form id="category_form" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="category_name" class="form-label">Category Name <span class="required-star text-danger">*</span></label>
                                <input type="text" name="category_id" id="category_id" hidden>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Add Category">
                                <span class="text-danger error" id="span_category"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="short_desc" class="form-label">Short Desc <span class="required-star text-danger">*</span></label>
                                <input type="text" class="form-control" name="short_desc" id="category_short_desc" placeholder="Add Short Description">
                                <span class="text-danger error" id="span_shortdesc"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Add Meta Title">
                                <span class="text-danger error" id="span_meta_title"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="url" class="form-label">Url <span class="required-star text-danger">*</span></label>

                                <input type="text" class="form-control" name="url" id="category_url" placeholder="Add Url">
                                <span class="text-danger error" id="span_url"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="category_name" class="form-label">Description <span class="required-star text-danger">*</span></label>
                                <input type="text" class="form-control" name="description" id="category_description" placeholder="Add description">
                                <span class="text-danger error" id="span_desc"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description" rows="4" placeholder="Add Meta description"></textarea>
                                <span class="text-danger error" id="span_meta_desc"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="category_status" class="form-label">Status <span class="required-star text-danger">*</span></label> <br>
                                <input type="radio"  name="category_status" value="Active"> Active
                                <input type="radio" name="category_status" value="In-Active"> In Active <br>
                                <span class="text-danger error" id="span_category_status"></span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="category_image" class="form-label">Category  Image <span class="required-star text-danger">*</span></label>
                                <input type="file" class="form-control" name="category_image" id="category_image" onchange="validateAndPreviewImage()">
                                <span class="text-danger error" id="span_category_image"></span>
                            </div>
                            <img id="preview_category_image" src="#" alt="Preview" class="mt-2" style="max-width: 100%; height: auto; display: none;" />
                        </div>
                        
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="category_small_image" class="form-label">Category Small Image <span class="required-star text-danger">*</span></label>
                                <input type="file" class="form-control" name="category_small_image" id="category_small_image" onchange="validateAndPreviewSmallImage()">
                                <span class="text-danger error" id="span_category_small_image"></span>
                            </div>
                            <img id="preview_category_small_image" src="#" alt="Preview" class="mt-2" style="max-width: 100%; height: auto; display: none;" />
                        </div>
                        
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="listing_desc" class="form-label">Listing Description </label>
                                <textarea class="form-control" name="listing_desc" id="category_listing_desc"></textarea>

                                <!--<input type="text" class="form-control" name="listing_desc" id="category_listing_desc" placeholder="Add Listing Description">-->
                                <!--<span class="text-danger error" id="span_listdesc"></span>-->
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="detail_description" class="form-label">Detail Description </label>
                                <textarea class="form-control" name="detail_description" id="category_detail_description"></textarea>

                                <!--<input type="text" class="form-control" name="listing_desc" id="category_listing_desc" placeholder="Add Listing Description">-->
                                <!--<span class="text-danger error" id="span_listdesc"></span>-->
                            </div>
                        </div>
                        
                        <div class="card mb-4 border">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <strong>FAQ Title & Description</strong>
                                    <button type="button" id="addFaqBlock" class="btn btn-sm btn-success">+ Add More</button>
                            </div>
                            <div class="card-body" id="faqRepeater">
                                {{-- One FAQ block --}}
                                <div class="faqGroup border rounded p-3 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="question[]" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description </label>
                                        <textarea name="answer[]" class="form-control summernote" rows="4" ></textarea>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-danger removeFaq">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form> 
                </div> 
                 
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="SaveCategory" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>

    <script> 
        // js load on footer
        window.APP_URLS = {
            categoryStore: "{{ route('category.store') }}",
            categoryUpdate: "{{ route('category.update', [':id']) }}",
            csrfToken: "{{ csrf_token() }}", 
            category_get_data : "{{ route('category_get_data') }}",
            category_edit_data : "{{ route('category.edit' , [':id']) }}",
            category_delete_data : "{{ route('category.delete' , [':id']) }}",
            image_path : "{{ asset('/') }}",
            };
    </script>

    {{-- Summernote CSS --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

{{-- jQuery (agar layout me already nahi hai to) --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Summernote JS --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

{{-- Category JS --}}
<script src="{{ asset('public/admin/js/productcategory/category.js') }}"></script>

{{-- Summernote INIT --}}
<script>
$(document).ready(function () {

    $('#category_listing_desc').summernote({
        height: 200,
        placeholder: 'Add Listing Description',
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });

    $('#category_modal').on('hidden.bs.modal', function () {
        $('#category_listing_desc').summernote('reset');
    });

});
</script>

<script>
    $(document).ready(function () {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 200,
            placeholder: 'Enter Description here...'
        });
 
        // Add More
        $('#addFaqBlock').click(function () {
            let block = `
        <div class="faqGroup border rounded p-3 mb-3">
            <div class="mb-3">
                <label class="form-label">Title </label>
                <input type="text" name="question[]" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Description </label>
                <textarea name="answer[]" class="form-control summernote" rows="4" ></textarea>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-danger removeFaq">Remove</button>
            </div>
        </div>
            `;
            $('#faqRepeater').append(block);
            // Re-init summernote for new textareas
            $('.summernote').summernote({
                height: 200,
                placeholder: 'Enter Description here...'
            });
        });
 
        // Remove block
        $(document).on('click', '.removeFaq', function () {
            $(this).closest('.faqGroup').remove();
        });
    });
</script>



    @endsection
    
 
    
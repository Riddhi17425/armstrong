@extends('admin.layouts.app')

@section('content')
<style>
    .required-star { color: red; }
</style>
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        {{-- Page Header --}}
        <div class="row align-items-center">
            <div id="message-pop-up" class="alert alert-dismissible fade show" role="alert" style="display: none">
                <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Add Product</h3>
                    <a href="{{ route('product') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>  

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="prodcutForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                   
                            {{-- Product Info --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Product Information</strong></div>
                                <div class="card-body row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Category <span class="required-star">*</span></label>
                                        <select name="category" id="category_select"
                                                class="form-control @error('category') is-invalid @enderror">
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach ($data['product_category'] as $item)
                                                <option value="{{ $item->id }}" 
                                                    {{ old('category') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3" id="subcategory_wrapper"  style="display: none;">
                                        <label class="form-label">Product SubCategory <span class="required-star">*</span></label>
                                        <select name="subcategory_id" id="subcategory_select"
                                                class="form-control @error('subcategory_id') is-invalid @enderror">
                                            <option value="" selected disabled>Select SubCategory</option>
                                            <option value="1">Orsan</option>
                                            <option value="2">Armstrong</option>
                                            <option value="3">Juki</option>
                                            <option value="4">NewLong</option>
                                            <option value="5">Circulum Loom</option>
                                        </select>
                                        @error('subcategory_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3"> 
                                        <label class="form-label">Product Name <span class="required-star">*</span></label>
                                        <input type="text" name="product_name" 
                                            class="form-control @error('product_name') is-invalid @enderror" 
                                            value="{{ old('product_name') }}" placeholder="Enter Product Model Name">
                                        @error('product_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3"> 
                                        <label class="form-label">Product Model</label>
                                        <input type="text" name="model_name" 
                                            class="form-control @error('model_name') is-invalid @enderror" 
                                            value="{{ old('model_name') }}" placeholder="Enter Product Name">
                                        @error('model_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3"> 
                                        <label class="form-label">Product Url <span class="required-star">*</span></label>
                                        <input type="text" name="url" 
                                            class="form-control @error('url') is-invalid @enderror" 
                                            value="{{ old('url') }}" placeholder="Enter url here">
                                        @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3"> 
                                        <label class="form-label">Meta Title </label>
                                        <input type="text" name="meta_title" 
                                            class="form-control @error('meta_title') is-invalid @enderror" 
                                            value="{{ old('meta_title') }}" placeholder="Enter Meta Title">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Images <span class="required-star">*</span></label>
                                        <input type="file" name="product_images[]" 
                                            class="form-control color-image-input @error('product_images') is-invalid @enderror" 
                                            multiple>
                                        @error('product_images')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="preview-images-zone mt-2 d-flex flex-wrap gap-2 position-relative"></div>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger removeColor" style="display: none;">-</button>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Front Image <span class="required-star">*</span></label>
                                        <input type="file" name="front_image[]" 
                                            class="form-control color-image-input @error('front_image') is-invalid @enderror" 
                                            multiple>
                                        @error('front_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="preview-images-zone mt-2 d-flex flex-wrap gap-2 position-relative"></div>
                                    </div>
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Product Video</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Video Source -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Video Source </label>
                                                    <select name="video_source" id="video_source"
                                                        class="form-control @error('video_source') is-invalid @enderror" onchange="toggleVideoSource()">
                                                        <option value="upload" {{ old('video_source', 'upload') == 'upload' ? 'selected' : '' }}>Upload Video</option>
                                                        <option value="youtube" {{ old('video_source') == 'youtube' ? 'selected' : '' }}>YouTube Link</option>
                                                    </select>
                                                    @error('video_source')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Upload Video (default visible) -->
                                                <div class="col-md-6 mb-3" id="upload_video_wrapper">
                                                    <label class="form-label">Select Video </label>
                                                    <input type="file" id="video_file"
                                                        class="form-control @error('uploaded_video_path') is-invalid @enderror" accept="video/*" onchange="previewVideo(event)">
                                                    @error('uploaded_video_path')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror 

                                                    <div class="progress mt-2" style="display:none;">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                                                    </div>

                                                    <video id="video_preview" controls style="margin-top:10px; max-width:100%; display:none;">
                                                        <source id="video_preview_src" src="" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>

                                                <!-- YouTube Link (hidden initially) -->
                                                <div class="col-md-6 mb-3" id="youtube_link_wrapper" style="display: none;">
                                                    <label class="form-label">YouTube Link </label>
                                                    <input type="text" name="youtube_link" id="youtube_link"
                                                        class="form-control @error('youtube_link') is-invalid @enderror" value="{{ old('youtube_link') }}"
                                                        placeholder="Paste YouTube link here">
                                                    @error('youtube_link')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label"> Thumbnails Images </label>
                                                    <input type="file" name="thumbnails_image" id="thumbnails_image"
                                                        class="form-control color-image-input @error('thumbnails_image') is-invalid @enderror" onchange="validateAndPreviewImage()"
                                                        multiple>
                                                    @error('thumbnails_image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                    <img id="preview_thumbnails_image" src="#" alt="Preview" class="mt-2" style="max-width: 100px; height: auto; display: none;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Product Features --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Product Features</strong></div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label">Select Features <span class="required-star">*</span></label>
                                                    <div class="size-selection-container">
                                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                                            @php
                                                                $features = $data['feature']->pluck('name')->toArray();
                                                                $oldFeatures = old('product_feature', []);
                                                            @endphp
                                                            @foreach($features as $feature)
                                                            <div class="form-check">
                                                                <input class="btn-check size-checkbox" type="checkbox" 
                                                                    name="product_feature[]" value="{{ $feature }}" 
                                                                    id="feature_{{ $feature }}"
                                                                    {{ in_array($feature, $oldFeatures) ? 'checked' : '' }}>
                                                                <label class="btn btn-outline-primary size-btn" for="feature_{{ $feature }}">
                                                                    {{ $feature }}
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="selected-sizes-display">
                                                            <small class="text-muted">Selected: </small>
                                                            <span id="selectedFeaturesText" class="fw-bold text-primary">None</span>
                                                        </div>
                                                        @error('product_feature')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-12 mb-3">
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Product Application Description </strong></div>
                                    <div class="card-body">
                                        <textarea name="product_app_desc" 
                                            class="form-control @error('product_app_desc') is-invalid @enderror" 
                                            id="app_description">{{ old('product_app_desc') }}</textarea>
                                        @error('product_app_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>


                                    {{-- Industries --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Applications</strong></div> 
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label">Select Applications <span class="required-star">*</span></label>
                                                    <div class="size-selection-container">
                                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                                            @php
                                                                $application = $data['application']->pluck('name')->toArray();
                                                                $oldIndustries = old('product_application', []);
                                                            @endphp
                                                            @foreach($application as $industry)
                                                                <div class="form-check">
                                                                    <input class="btn-check size-checkbox" type="checkbox" 
                                                                        name="product_application[]" value="{{ $industry }}" 
                                                                        id="application_{{ $industry }}"
                                                                        {{ in_array($industry, $oldIndustries) ? 'checked' : '' }}>
                                                                    <label class="btn btn-outline-primary size-btn" for="application_{{ $industry }}">
                                                                        {{ $industry }}
                                                                    </label>
                                                                </div>
                                                            @endforeach 
                                                        </div>
                                                        <div class="selected-sizes-display">
                                                            <small class="text-muted">Selected: </small>
                                                            <span id="selectedApplicationText" class="fw-bold text-primary">None</span>
                                                        </div>
                                                        @error('product_application')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- PDF Upload --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Upload PDF</strong></div>
                                <div class="card-body">
                                    <label class="form-label">Upload Product PDF <span class="required-star">*</span></label>
                                    <input type="file" name="product_pdf" id="product_pdf" 
                                        class="form-control @error('product_pdf') is-invalid @enderror" 
                                        accept="application/pdf">
                                    @error('product_pdf')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    <div id="pdfPreviewContainer" class="mt-3" style="display: none;">
                                        <label class="form-label">PDF Preview:</label>
                                        <iframe id="pdfPreview" src="" width="100%" height="400px" frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>

                            {{-- USP's --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <strong>USP's</strong>
                                    <button type="button" class="btn btn-success btn-sm" id="addUsps">+ Add More</button>
                                </div>
                                <div class="card-body" id="UspsWrapper">
                                    <div class="row UspsGroup mb-3">
                                        <div class="col-md-5 ">
                                            <label class="form-label">Title <span class="required-star">*</span></label>
                                            <input type="text" name="product_usp[0][name]" 
                                                class="form-control @error('product_usp.0.name') is-invalid @enderror" 
                                                value="{{ old('product_usp.0.name') }}" placeholder="Enter USP Title">
                                            @error('product_usp.0.name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Description <span class="required-star">*</span></label>
                                            <textarea name="product_usp[0][description]" 
                                                class="form-control product_usps_description @error('product_usp.0.description') is-invalid @enderror" 
                                                placeholder="Enter USP Description">{{ old('product_usp.0.description') }}</textarea>
                                            @error('product_usp.0.description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-md-12 mb-3">
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Product Technical Description </strong></div>
                                    <div class="card-body">
                                        <textarea name="product_tech_desc" 
                                            class="form-control @error('product_tech_desc') is-invalid @enderror" 
                                            id="tech_description">{{ old('product_tech_desc') }}</textarea>
                                        @error('product_tech_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Technical Specifications --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <strong>Technical Specifications</strong>
                                    <button type="button" class="btn btn-success btn-sm" id="addtechnicals">+ Add More</button>
                                </div>
                                <div class="card-body" id="technicalsWrapper">
                                    <div class="row techinalsGroup mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label">Parameter <span class="required-star">*</span></label>
                                            <input type="text" name="product_technical[0][name]" 
                                                class="form-control @error('product_technical.0.name') is-invalid @enderror" 
                                                value="{{ old('product_technical.0.name') }}" placeholder="Enter Parameter">
                                            @error('product_technical.0.name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Specifications <span class="required-star">*</span></label>
                                            <textarea name="product_technical[0][description]" 
                                                class="form-control product_technical @error('product_technical.0.description') is-invalid @enderror" 
                                                >{{ old('product_technical.0.description') }}</textarea>
                                            @error('product_technical.0.description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Status --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Status</strong></div>
                                <div class="card-body">
                                    <!--<label class="form-label">Product Status <span class="required-star">*</span></label>-->
                                    <!--<select name="product_status" class="form-control @error('product_status') is-invalid @enderror">-->
                                    <!--    <option value="Active" {{ old('product_status') == "Active" ? 'selected' : '' }}>Active</option>-->
                                    <!--    <option value="In-Active" {{ old('product_status') == "In-Active" ? 'selected' : '' }}>Inactive</option>-->
                                    <!--</select>-->
                                    <!--@error('product_status')<div class="invalid-feedback">{{ $message }}</div>@enderror-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Status <span class="required-star">*</span></label>
                                            <select name="product_status" class="form-control @error('product_status') is-invalid @enderror">
                                                <option value="Active" {{ old('product_status') == "Active" ? 'selected' : '' }}>Active</option>
                                                <option value="In-Active" {{ old('product_status') == "In-Active" ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('product_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Is this Product Live ? <span class="required-star">*</span></label>
                                            <select name="is_live" class="form-control @error('is_live') is-invalid @enderror">
                                                <option value="">- Please Select -</option>
                                                <option value="1" {{ old('is_live') == "1" ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ old('is_live') == "0" ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('is_live')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Product Short Description </strong></div>
                                    <div class="card-body">
                                        <textarea name="product_short_desc" 
                                            class="form-control @error('product_short_desc') is-invalid @enderror" 
                                            id="short_description">{{ old('product_short_desc') }}</textarea>
                                        @error('product_short_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Product Description</strong></div>
                                <div class="card-body">
                                    <textarea name="product_desc" 
                                        class="form-control @error('product_desc') is-invalid @enderror" 
                                        rows="4" id="product_desc">{{ old('product_desc') }}</textarea>
                                    @error('product_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Meta Description </strong></div>
                                    <div class="card-body">
                                        <textarea name="meta_description" 
                                            class="form-control @error('meta_description') is-invalid @enderror" 
                                            id="meta_description">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </form>
                    </div> {{-- End Card Body --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS Section --}}
<script>
    window.APP_URLS = {
        productvideoUploadChunk: "{{ route('admin.Productvideo.chunkUpload') }}",
    };
</script>
<script src="{{ asset('public/admin/js/product/product.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script> 
$(document).ready(function() {
    $('#product_desc').summernote({
        placeholder: 'Enter Description here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']], 
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
    $('#short_description,#tech_description,#app_description').summernote({
        placeholder: 'Enter Short Description here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
        $('#meta_description').summernote({
        placeholder: 'Enter Short Description here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
    $('.product_technical').summernote({
        placeholder: 'Enter Technical Specifications here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });

    $('.product_usps_description').summernote({
        placeholder: 'Enter Technical Specifications here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });

    // Update selected features and application display
    function updateSelectedDisplay(checkboxes, displayId) {
        const selected = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
        const displayText = selected.length > 0 ? selected.join(', ') : 'None';
        $(`#${displayId}`).text(displayText);
    }

    $('.size-checkbox').on('change', function() {
        const container = $(this).closest('.size-selection-container');
        const checkboxes = container.find('.size-checkbox');
        const displayId = container.find('.selected-sizes-display span').attr('id');
        updateSelectedDisplay(checkboxes, displayId);
    });

    // Initialize selected displays
    updateSelectedDisplay($('.size-selection-container').eq(0).find('.size-checkbox'), 'selectedFeaturesText');
    updateSelectedDisplay($('.size-selection-container').eq(1).find('.size-checkbox'), 'selectedApplicationText');

    // Show/hide subcategory based on category selection
    function toggleSubcategory() {
        const categorySelect = $('#category_select');
        const subcategoryWrapper = $('#subcategory_wrapper');
         const subcategorySelect = $('#subcategory_select');
        const selectedCategoryName = categorySelect.find('option:selected').text().trim();
        
       if (selectedCategoryName === 'Sewing' || selectedCategoryName === 'Spare Parts') {
            subcategoryWrapper.show();
            if (selectedCategoryName === 'Spare Parts') {
            let extraSpareSubs = [
                { id: 5, name: 'Circular Loom' },
                { id: 6, name: 'Bag Closing' },
                { id: 7, name: 'Needle Loom' },
                { id: 8, name: 'BCS Machine' }
            ];

            extraSpareSubs.forEach(function (sub) {
                subcategorySelect.append('<option class="extra-sub" value="' + sub.id + '">' + sub.name + '</option>');
            });
        }
        } else {
            subcategoryWrapper.hide();
            $('select[name="subcategory_id"]').val('');
        }
    }

    $('#category_select').on('change', toggleSubcategory);
    toggleSubcategory(); // Initialize on page load
});
</script>
<script>
    let currentPDFUrl = null;
    document.getElementById('product_pdf').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('pdfPreviewContainer');
        const previewFrame = document.getElementById('pdfPreview');

        // Revoke previous URL to prevent memory leaks
        if (currentPDFUrl) {
            URL.revokeObjectURL(currentPDFUrl);
        }

        if (file && file.type === "application/pdf") {
            currentPDFUrl = URL.createObjectURL(file);
            previewFrame.src = currentPDFUrl;
            previewContainer.style.display = 'block';
        } else {
            previewFrame.src = '';
            previewContainer.style.display = 'none';
        }
    });

    // Clean up on page unload
    window.addEventListener('unload', function() {
        if (currentPDFUrl) {
            URL.revokeObjectURL(currentPDFUrl);
        }
    });
</script>
@endsection
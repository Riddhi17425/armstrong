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
                    <h3 class="fw-bold mb-0">Edit Product</h3>
                    <a href="{{ route('product') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="prodcutForm" action="{{ route('product.update', $data['product_details']->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Product Info --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Product Information</strong></div>
                                <div class="card-body row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Category <span class="required-star">*</span></label>
                                        <select name="category" id="category_select"
                                                class="form-control @error('category') is-invalid @enderror">
                                            <option value="" disabled>Select Category</option>
                                            @foreach ($data['product_category'] as $item)
                                                <option value="{{ $item->id }}" 
                                                    {{ old('category', $data['product_details']->category_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3" id="subcategory_wrapper" style="display: {{ $data['product_details']->category && $data['product_details']->category->name == 'Sewing Machines' ? 'block' : 'none' }};">
                                        <label class="form-label">Product SubCategory <span class="required-star">*</span></label>
                                        <select name="subcategory_id"
                                                class="form-control @error('subcategory_id') is-invalid @enderror">
                                            <option value="" selected disabled>Select SubCategory</option>
                                            <option value="1" {{ old('subcategory_id', $data['product_details']->subcategory_id) == 1 ? 'selected' : '' }}>FIBC Machines</option>
                                            <option value="2" {{ old('subcategory_id', $data['product_details']->subcategory_id) == 2 ? 'selected' : '' }}>Woven Sack Machines</option>
                                        </select>
                                        @error('subcategory_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Name <span class="required-star">*</span></label>
                                        <input type="text" name="product_name" 
                                            class="form-control @error('product_name') is-invalid @enderror" 
                                            value="{{ old('product_name', $data['product_details']->product_name) }}" 
                                            placeholder="Enter Product Name">
                                        @error('product_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Model</label>
                                        <input type="text" name="model_name" 
                                            class="form-control @error('model_name') is-invalid @enderror" 
                                            value="{{ old('model_name', $data['product_details']->model_name) }}" 
                                            placeholder="Enter Product Model Name">
                                        @error('model_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Url <span class="required-star">*</span></label>
                                        <input type="text" name="url" 
                                            class="form-control @error('url') is-invalid @enderror" 
                                            value="{{ old('url', $data['product_details']->url) }}" 
                                            placeholder="Enter url here">
                                        @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" 
                                            class="form-control @error('meta_title') is-invalid @enderror" 
                                            value="{{ old('meta_title', $data['product_details']->meta_title) }}" 
                                            placeholder="Enter Meta title">
                                        @error('meta_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Images <span class="required-star">*</span></label>
                                        <input type="file" name="product_images[]" 
                                            class="form-control color-image-input @error('product_images') is-invalid @enderror" 
                                            multiple>
                                        @error('product_images')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <div class="preview-images-zone mt-2 d-flex flex-wrap gap-2 position-relative">
                                            @foreach($data['product_images'] as $image)
                                                <div class="position-relative">
                                                    <img src="{{ asset('/' . $image->image) }}" 
                                                        style="height:70px;width:70px;object-fit:cover;margin-right:10px;border-radius:6px;">
                                                    <button type="button" 
                                                            class="btn btn-danger btn-sm remove-image" 
                                                            style="position:absolute;top:-5px;right:-5px;padding:0 5px;line-height:1;">×</button>
                                                    <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Front Image <span class="required-star">*</span></label>
                                        <input type="file" name="front_image" id="front_image"
                                            class="form-control @error('front_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                        @error('front_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if ($data['product_details']->front_image)
                                            <img id="preview_front_image" src="{{ asset('public/admin/product/front_image/'.$data['product_details']->front_image) }}"  width="150" height="120" alt="">
                                        @endif
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger removeColor" style="display: none;">-</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Product Video</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Video Source -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Video Source </label>
                                            <select name="video_source" id="video_source"
                                                class="form-control @error('video_source') is-invalid @enderror"
                                                onchange="toggleVideoSource()">
                                                <option value="upload" {{ old('video_source', $data['product_details']->video_source ?? '') == 'upload' ? 'selected' : '' }}>Upload Video</option>
                                                <option value="youtube" {{ old('video_source', $data['product_details']->video_source ?? '') == 'youtube' ? 'selected' : '' }}>YouTube Link</option>
                                            </select>
                                            @error('video_source')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Upload Video (if chosen) --}}
                                        <div class="col-md-6 mb-3" id="upload_video_wrapper"
                                            style="{{ old('video_source', $data['product_details']->video_source ?? '') == 'youtube' ? 'display:none;' : '' }}">
                                            <label class="form-label">Select Video </label>
                                            <input type="file" id="video_file"
                                                class="form-control @error('uploaded_video_path') is-invalid @enderror" accept="video/*"
                                                onchange="previewVideo(event)">
                                            @error('uploaded_video_path')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <div class="progress mt-2" style="display:none;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                                            </div>

                                            {{-- Existing Video Preview --}}
                                            <video id="video_preview" controls style="margin-top:10px; max-width:100%; {{ !empty($data['product_details']->video) && $data['product_details']->video_source=='upload' ? '' : 'display:none;' }}">
                                                @if (!empty($data['product_details']->video) && $data['product_details']->video_source == 'upload')
                                                    <source id="video_preview_src" src="{{ asset('/' . $data['product_details']->video) }}" type="video/mp4">
                                                @endif
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>

                                        {{-- YouTube Link (if chosen) --}}
                                        <div class="col-md-6 mb-3" id="youtube_link_wrapper"
                                            style="{{ old('video_source', $data['product_details']->video_source ?? '') == 'upload' ? 'display:none;' : '' }}">
                                            <label class="form-label">YouTube Link </label>
                                            <input type="text" name="youtube_link" id="youtube_link"
                                                class="form-control @error('youtube_link') is-invalid @enderror"
                                                value="{{ old('youtube_link', $data['product_details']->video_source == 'youtube' ? $data['product_details']->video : '') }}"
                                                placeholder="Paste YouTube link here">
                                            @error('youtube_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            {{-- YouTube Embed Preview --}}
                                            @php
                                                function getYoutubeId($url) {
                                                    // Handle youtu.be links
                                                    if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $matches)) {
                                                        return $matches[1];
                                                    }

                                                    // Handle watch?v= links
                                                    if (preg_match('/v=([^\?&]+)/', $url, $matches)) {
                                                        return $matches[1];
                                                    }

                                                    // Handle embed links
                                                    if (preg_match('/embed\/([^\?&]+)/', $url, $matches)) {
                                                        return $matches[1];
                                                    }

                                                    return null;
                                                }

                                                $youtubeId = getYoutubeId($data['product_details']->video);
                                            @endphp

                                            @if ($youtubeId && $data['product_details']->video_source == 'youtube')
                                                <div class="mt-2">
                                                    <iframe width="100%" height="250"
                                                        src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                        frameborder="0" allowfullscreen>
                                                    </iframe>
                                                </div>
                                            @endif
                                        </div> 

                                        <div class="col-md-4 mb-3">
                                        <label class="form-label">Thumbnails Image</label>
                                        <input type="file" name="thumbnails_image" id="thumbnails_image"
                                            class="form-control @error('thumbnails_image') is-invalid @enderror"
                                            onchange="validateAndPreviewImage()">
                                        @error('thumbnails_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        {{-- Existing Thumbnail Preview --}}
                                        <div class="mt-2">
                                            @if (!empty($data['product_details']->thumnail_image))
                                                <img src="{{ asset('/' . $data['product_details']->thumnail_image) }}"
                                                    id="preview_thumbnails_image"
                                                    style="max-width: 100%; height: auto;" alt="Current Thumbnail">
                                            @else
                                                <img id="preview_thumbnails_image" src="#" alt="Preview"
                                                    style="max-width: 100%; height: auto; display:none;" />
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Features --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Features</strong></div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Select Features <span class="required-star">*</span></label>
                                            <div class="size-selection-container">
                                                <div class="d-flex flex-wrap gap-2 mb-3">
                                                    @foreach($data['feature'] as $feature)
                                                        <div class="form-check">
                                                            <input class="btn-check size-checkbox" type="checkbox" 
                                                                name="product_feature[]" value="{{ $feature->name }}" 
                                                                id="size_{{ $feature->name }}"
                                                                {{ in_array($feature->name, old('product_feature', $data['product_details']->product_feature)) ? 'checked' : '' }}>
                                                            <label class="btn btn-outline-primary size-btn" for="size_{{ $feature->name }}">
                                                                {{ $feature->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="selected-sizes-display">
                                                    <small class="text-muted">Selected: </small>
                                                    <span id="selectedFeaturesText" class="fw-bold text-primary">
                                                        {{ empty(old('product_feature', $data['product_details']->product_feature)) ? 'None' : implode(', ', old('product_feature', $data['product_details']->product_feature)) }}
                                                    </span>
                                                </div>
                                                @error('product_feature')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="card-body">
                                    <label class="form-label">Product Application Description</label>
                                    <textarea name="product_app_desc" 
                                        class="form-control @error('product_app_desc') is-invalid @enderror" 
                                        id="app_description">{{ old('product_app_desc', $data['product_details']->product_app_desc) }}</textarea>
                                    @error('product_app_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                
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
                                                        $selectedApplications = old('product_application', $data['product_details']->product_applications ?? []);
                                                    @endphp

                                                    @foreach($application as $industry)
                                                        <div class="form-check">
                                                            <input class="btn-check size-checkbox" type="checkbox" 
                                                                name="product_application[]" 
                                                                value="{{ $industry }}" 
                                                                id="application_{{ $industry }}"
                                                                {{ in_array($industry, $selectedApplications) ? 'checked' : '' }}>
                                                            <label class="btn btn-outline-primary size-btn" for="application_{{ $industry }}">
                                                                {{ $industry }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="selected-sizes-display">
                                                    <small class="text-muted">Selected: </small>
                                                    <span id="selectedApplicationText" class="fw-bold text-primary">
                                                        {{ count($selectedApplications) ? implode(', ', $selectedApplications) : 'None' }}
                                                    </span>
                                                </div>

                                                @error('product_application')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
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
                                    <div id="pdfPreviewContainer" class="mt-3" style="display: {{ $data['product_details']->product_pdf ? 'block' : 'none' }};">
                                        <label class="form-label">PDF Preview:</label>
                                        <iframe id="pdfPreview" 
                                            src="{{ $data['product_details']->product_pdf ? asset('/' . $data['product_details']->product_pdf) : '' }}" 
                                            width="100%" height="400px" frameborder="0"></iframe>
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
                                    <input type="text" name="" id="hidden_product_id" value="{{ $data['product_details']->id }}" hidden>
                                    @foreach($data['product_details']->product_usp as $index => $usp)
                                        <div class="row UspsGroup mb-3">
                                            <div class="col-md-5">
                                                <label class="form-label">Title <span class="required-star">*</span></label>
                                                <input type="text" name="product_usp[{{ $index }}][name]" 
                                                    class="form-control @error('product_usp.'.$index.'.name') is-invalid @enderror" 
                                                    value="{{ old('product_usp.'.$index.'.name', $usp['name'] ?? '') }}">
                                                @error('product_usp.'.$index.'.name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Description <span class="required-star">*</span></label>
                                                <textarea name="product_usp[{{ $index }}][description]" 
                                                    class="form-control @error('product_usp.'.$index.'.description') is-invalid @enderror" 
                                                    id="usp_description_{{ $index }}">{{ old('product_usp.'.$index.'.description', $usp['description'] ?? '') }}</textarea>
                                                @error('product_usp.'.$index.'.description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger removeColor" {{ count($data['product_details']->product_usp) <= 1 ? 'style=display:none;' : '' }}>-</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                             <div class="card-body">
                                    <label class="form-label">Product Technical Description</label>
                                    <textarea name="product_tech_desc" 
                                        class="form-control @error('product_tech_desc') is-invalid @enderror" 
                                        id="tech_description">{{ old('product_tech_desc', $data['product_details']->product_tech_desc) }}</textarea>
                                    @error('product_tech_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                
                            {{-- Technical Specifications --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <strong>Technical Specifications</strong>
                                    <button type="button" class="btn btn-success btn-sm" id="addtechnicals">+ Add More</button>
                                </div>
                                <div class="card-body" id="technicalsWrapper">
                                    @foreach($data['product_details']->product_technical as $index => $technical)
                                        <div class="row techinalsGroup mb-3">
                                            <div class="col-md-5">
                                                <label class="form-label">Parameter <span class="required-star">*</span></label>
                                                <input type="text" name="product_technical[{{ $index }}][name]" 
                                                    class="form-control @error('product_technical.'.$index.'.name') is-invalid @enderror" 
                                                    value="{{ old('product_technical.'.$index.'.name', $technical['name'] ?? '') }}">
                                                @error('product_technical.'.$index.'.name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div> 
                                            <div class="col-md-6">
                                                <label class="form-label">Specifications <span class="required-star">*</span></label>
                                                <textarea name="product_technical[{{ $index }}][description]" 
                                                    class="form-control @error('product_technical.'.$index.'.description') is-invalid @enderror" 
                                                    id="technical_description_{{ $index }}">{{ old('product_technical.'.$index.'.description', $technical['description'] ?? '') }}</textarea>
                                                @error('product_technical.'.$index.'.description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger removeTechnical" {{ count($data['product_details']->product_technical) <= 1 ? 'style=display:none;' : '' }}>-</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Status</strong></div>
                                <div class="card-body">
                                    <!--<label class="form-label">Product Status <span class="required-star">*</span></label>-->
                                    <!--<select name="product_status" class="form-control @error('product_status') is-invalid @enderror">-->
                                    <!--    <option value="Active" {{ old('product_status', $data['product_details']->product_status) == 'Active' ? 'selected' : '' }}>Active</option>-->
                                    <!--    <option value="In-Active" {{ old('product_status', $data['product_details']->product_status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>-->
                                    <!--</select>-->
                                    <!--@error('product_status')<div class="invalid-feedback">{{ $message }}</div>@enderror-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Status <span class="required-star">*</span></label>
                                            <select name="product_status" class="form-control @error('product_status') is-invalid @enderror">
                                                <option value="Active" {{ old('product_status', $data['product_details']->product_status) == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="In-Active" {{ old('product_status', $data['product_details']->product_status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('product_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Is this Product Live ? <span class="required-star">*</span></label>
                                            <select name="is_live" class="form-control @error('is_live') is-invalid @enderror">
                                                <option value="">- Please Select -</option>
                                                <option value="1" {{ old('is_live', $data['product_details']->is_live) == 1 ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ old('is_live', $data['product_details']->is_live) == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('is_live')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                    <label class="form-label">Product Short Description</label>
                                    <textarea name="product_short_desc" 
                                        class="form-control @error('product_short_desc') is-invalid @enderror" 
                                        id="short_description">{{ old('product_short_desc', $data['product_details']->product_short_desc) }}</textarea>
                                    @error('product_short_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            {{-- Description --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Product Description</strong></div>
                                <div class="card-body">
                                    <textarea name="product_desc" 
                                        class="form-control @error('product_desc') is-invalid @enderror" 
                                        rows="4" id="product_desc">{{ old('product_desc', $data['product_details']->product_desc) }}</textarea>
                                    @error('product_desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Meta Description </strong></div>
                                    <div class="card-body">
                                        <textarea name="meta_description" 
                                            class="form-control @error('meta_description') is-invalid @enderror" 
                                            id="meta_description">{{ old('meta_description', $data['product_details']->meta_description) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
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
    // Initialize Summernote for textareas
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

    // Initialize Summernote for existing USP and Technical Description textareas
    @foreach($data['product_details']->product_usp as $index => $usp)
        $('#usp_description_{{ $index }}').summernote({
            placeholder: 'Enter USP Description here...',
            height: 150,
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
    @endforeach
    @foreach($data['product_details']->product_technical as $index => $technical)
        $('#technical_description_{{ $index }}').summernote({
            placeholder: 'Enter Technical Specification here...',
            height: 150,
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
    @endforeach

    // PDF Preview
    document.getElementById('product_pdf').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('pdfPreviewContainer');
        const previewFrame = document.getElementById('pdfPreview');

        if (file && file.type === "application/pdf") {
            const fileURL = URL.createObjectURL(file);
            previewFrame.src = fileURL;
            previewContainer.style.display = 'block';
        } else {
            previewFrame.src = '';
            previewContainer.style.display = 'none';
        }
    });

    // Show/hide subcategory based on category selection
    function toggleSubcategory() {
        const categorySelect = $('#category_select');
        const subcategoryWrapper = $('#subcategory_wrapper');
        const selectedCategoryName = categorySelect.find('option:selected').text().trim();
        
        if (selectedCategoryName === 'Sewing Machines') {
            subcategoryWrapper.show();
        } else {
            subcategoryWrapper.hide();
            $('select[name="subcategory_id"]').val('');
        }
    }

    $('#category_select').on('change', toggleSubcategory);
    toggleSubcategory(); // Initialize on page load
});
</script>
@endsection
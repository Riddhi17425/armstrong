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
                    <h3 class="fw-bold mb-0">Add Product Description</h3>
                    <a href="{{ route('product-description.index') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>  

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="prodcutDescriptionForm" action="{{ route('product-description.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                   
                            {{-- Product Info --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Product Description Information</strong></div>
                                <div class="card-body row">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Products <span class="required-star">*</span></label>
                                            <select name="product" id="product_select"
                                                    class="form-control @error('product') is-invalid @enderror">
                                                <option value="" selected disabled>Select Product</option>
                                                @foreach ($data['products'] as $item)
                                                    <option value="{{ $item->id }}" 
                                                        {{ old('product') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3"> 
                                            <label class="form-label">Description Title <span class="required-star">*</span></label>
                                            <input type="text" name="description_title" 
                                                class="form-control @error('description_title') is-invalid @enderror" 
                                                value="{{ old('description_title') }}" placeholder="Enter Product Description Title">
                                            @error('description_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3"> 
                                            <label class="form-label">Product Description<span class="required-star">*</span></label>
                                            <textarea name="description" id="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Enter Product Description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Save Product Description</button>
                            </div>
                        </form>
                    </div> {{-- End Card Body --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS Section --}}
<script src="{{ asset('public/admin/js/product/product_description.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script> 
$(document).ready(function() {
    $('#description').summernote({
        placeholder: 'Enter Product Description here...',
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
});
</script>
@endsection
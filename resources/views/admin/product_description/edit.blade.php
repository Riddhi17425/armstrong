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
                    <h3 class="fw-bold mb-0">Edit Product Description</h3>
                    <a href="{{ route('product-description.index') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>  

        <div class="card">
            <div class="card-body">
                <form method="POST" 
                      action="{{ route('product-description.update', $data['productDescription']->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Product <span class="text-danger">*</span></label>
                            <select name="product" class="form-control">
                                @foreach ($data['products'] as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $data['productDescription']->product_master_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description Title</label>
                            <input type="text" name="description_title"
                                class="form-control"
                                value="{{ old('description_title', $data['productDescription']->title) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description"
                                class="form-control">{{ old('description', $data['productDescription']->description) }}</textarea>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary">Update Product Description</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

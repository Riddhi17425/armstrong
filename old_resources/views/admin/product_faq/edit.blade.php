@extends('admin.layouts.app')

@section('content')
<style>
    .required-star { color: red; }
</style>

<div class="container-xxl">
    {{-- Page Header --}}
        <div class="row align-items-center">
            <div id="message-pop-up" class="alert alert-dismissible fade show" role="alert" style="display: none">
                <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Edit Product Faqs</h3>
                    <a href="{{ route('product-faqs.index') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>

    <form action="{{ route('product-faqs.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- Product --}}
        <div class="mb-3">
    <label class="form-label">Product <span class="required-star">*</span></label>
    <select name="product" class="form-control" required>
        @foreach ($products as $prod)
            <option value="{{ $prod->id }}" 
                {{ $product->id == $prod->id ? 'selected' : '' }}>
                {{ $prod->product_name }}
            </option>
        @endforeach
    </select>
</div>

        {{-- FAQs --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <strong>FAQs</strong>
                <button type="button" class="btn btn-success btn-sm" id="addFaq">
                    + Add More
                </button>
            </div>

            <div class="card-body" id="faqWrapper">
                @foreach ($faqs as $key => $faq)
                <div class="row faq-item mb-3">
                    <input type="hidden" name="faq_id[]" value="{{ $faq->id }}">

                    <div class="col-md-5">
                        @if($key == 0)<label class="form-label">Question <span class="required-star">*</span></label>@endif
                        <input type="text" name="question[]" class="form-control"
                               value="{{ $faq->question }}" required>
                    </div>

                    <div class="col-md-6">
                        @if($key == 0)<label class="form-label">Answer <span class="required-star">*</span></label>@endif
                        <textarea name="answer[]" class="form-control faq-answer" required>{!! $faq->answer !!}</textarea>
                    </div>

                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger removeFaq">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Update FAQs</button>
        </div>
    </form>
</div>

<script src="{{ asset('public/admin/js/product/product_faqs_edit.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $('.faq-answer').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
});
</script>
@endsection

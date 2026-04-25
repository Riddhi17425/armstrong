@extends('admin.layouts.app')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">

            <div id="message-pop-up" class="alert alert-dismissible fade show"
                 role="alert" style="display:none">
                <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product FAQs</h3>
                <a href="{{ route('product-faqs.create') }}">
                    <button class="btn btn-primary">
                        <i class="icofont-plus-circle me-2"></i>Add Product FAQs
                    </button>
                </a>
            </div>
        </div>

        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="product_faqs_table"
                               class="table table-hover align-middle mb-0 w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Total FAQs</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
window.APP_URLS = {
    getProductFaqs: "{{ route('product-faqs.fetch') }}",
    deleteProductFaqs: "{{ route('product-faqs.delete', [':id']) }}",
    csrfToken: "{{ csrf_token() }}"
};
</script>
<script src="{{ asset('public/admin/js/product/product_faq.js') }}" defer></script>
@endsection

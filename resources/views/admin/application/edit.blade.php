@extends('admin.layouts.app')

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div id="message-pop-up" class="alert alert-dismissible fade show" role="alert" style="display:none">
                <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <div class="border-0 mb-4">
                <div class="card-header py-3 bg-transparent d-flex justify-content-between border-bottom">
                    <h3 class="fw-bold mb-0">Application Edit</h3>
                    <a href="{{ route('application') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <form id="application_form" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- ================= BASIC INFO ================= --}}
                    <div class="row g-3 mb-3">

                        <div class="col-sm-6">
                            <label>Application Name *</label>
                            <input type="hidden" id="application_id" name="application_id" value="{{ $application->id }}">
                            <input type="text" class="form-control" name="application_name"
                                   id="application_name" value="{{ $application->name }}">
                            <span class="text-danger error" id="span_application"></span>
                        </div>

                        <div class="col-sm-6">
                            <label>Alt</label>
                            <input type="text" class="form-control" name="alt"
                                   id="alt" value="{{ $application->alt }}">
                        </div>

                    </div>

                    <div class="row g-3 mb-3">

                        <div class="col-sm-6">
                            <label>URL</label>
                            <input type="text" name="url" id="url"
                                value="{{ $application->url }}"
                                class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"
                                value="{{ $application->meta_title }}"
                                class="form-control">
                        </div>

                        <div class="col-sm-12">
                            <label>Meta Description</label>
                            <textarea name="meta_description" id="meta_description"
                                    class="form-control summernote">{{ $application->meta_description }}</textarea>
                        </div>

                    </div>

                    {{-- ================= TITLE + STATUS ================= --}}
                    <div class="row g-3 mb-3">

                        <div class="col-sm-6">
                            <label>Website Details Title</label>
                            <input type="text" class="form-control" name="details_title"
                                   id="details_title" value="{{ $application->details_title }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Status *</label><br>

                            <input type="radio" name="application_status" value="Active"
                                {{ $application->status == 'Active' ? 'checked' : '' }}> Active

                            <input type="radio" name="application_status" value="In-Active"
                                {{ $application->status == 'In-Active' ? 'checked' : '' }}> In Active
                        </div>

                    </div>

                    {{-- ================= MAIN IMAGE ================= --}}
                    <div class="row g-3 mb-3">

                        <div class="col-sm-10">
                            <label>Main Image</label>
                            <input type="file" class="form-control" name="application_image"
                                   id="application_image" onchange="validateAndPreviewImage()">
                            <span class="text-danger error" id="span_application_image"></span>

                            <img id="preview_application_image"
                                src="{{ $application->application_image ? asset($application->application_image) : '' }}"
                                style="max-width:100px; {{ $application->application_image ? '' : 'display:none;' }}">
                        </div>

                    </div>

                    {{-- ================= TOP & BOTTOM IMAGE ================= --}}
                    <div class="row g-3 mb-3">

                        <div class="col-sm-6">
                            <label>Website Top Image</label>
                            <input type="file" class="form-control" name="website_top_image"
                                   id="website_top_image">

                            <img id="preview_top_image"
                                src="{{ $application->website_top_image ? asset($application->website_top_image) : '' }}"
                                style="max-width:100px; {{ $application->website_top_image ? '' : 'display:none;' }}">
                        </div>

                        <div class="col-sm-6">
                            <label>Website Bottom Image</label>
                            <input type="file" class="form-control" name="website_bottom_image"
                                   id="website_bottom_image">

                            <img id="preview_bottom_image"
                                src="{{ $application->website_bottom_image ? asset($application->website_bottom_image) : '' }}"
                                style="max-width:100px; {{ $application->website_bottom_image ? '' : 'display:none;' }}">
                        </div>

                    </div>

                    {{-- ================= SUMMERNOTE ================= --}}
                    <div class="row g-3 mb-3">

                        <div class="col-sm-12">
                            <label>Short Description</label>
                            <textarea name="short_description" class="form-control summernote">
                                {!! $application->short_description !!}
                            </textarea>
                        </div>

                        <div class="col-sm-12">
                            <label>Website Top Description</label>
                            <textarea name="website_top_desc" class="form-control summernote">
                                {!! $application->website_top_desc !!}
                            </textarea>
                        </div>

                        <div class="col-sm-12">
                            <label>Website Bottom Description</label>
                            <textarea name="website_bottom_desc" class="form-control summernote">
                                {!! $application->website_bottom_desc !!}
                            </textarea>
                        </div>

                    </div>

                    {{-- ================= FAQ ================= --}}
                    <div class="row mb-3">
                        <div class="col-sm-12">

                            <label>FAQs</label>

                            <div id="faq_container">

                                @php
                                    $faqs = $application->faq ?? [];
                                @endphp

                                @foreach($faqs as $index => $faq)
                                    <div class="faq-item border p-3 mb-2">

                                        <div class="d-flex justify-content-between">
                                            <h6>FAQ</h6>
                                            <button type="button" class="btn btn-danger remove_faq">X</button>
                                        </div>

                                        <input type="text"
                                               name="faq[{{ $index }}][title]"
                                               class="form-control mb-2"
                                               value="{{ $faq['title'] ?? '' }}"
                                               placeholder="Question">

                                        <textarea id="faq_desc_{{ $index }}"
                                                  name="faq[{{ $index }}][description]"
                                                  class="form-control summernote">
                                            {!! $faq['description'] ?? '' !!}
                                        </textarea>

                                    </div>
                                @endforeach

                            </div>

                            <button type="button" id="add_faq" class="btn btn-success mt-2">
                                Add FAQ
                            </button>

                        </div>
                    </div>

                </form>

                <button type="button" id="Saveapplication" class="btn btn-primary">
                    Update
                </button>

            </div>
        </div>

    </div>
</div>

{{-- ================= JS GLOBAL ================= --}}
<script>
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
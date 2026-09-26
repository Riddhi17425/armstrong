@extends('admin.layouts.app')

@section('content')
    <style>
        .required-star {
            color: red;
        }
    </style>
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            {{-- Page Header --}}
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Edit Data</h3>
                        <a href="{{ route('lifearmstrong') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('lifearmstrong.update', $lifearmstrong->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Life Armstrong Information</strong></div>
                                    <div class="card-body row">
                                        {{-- Title --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span class="required-star">*</span></label>
                                            <input type="text" name="lifearmstrong_title"
                                                class="form-control @error('lifearmstrong_title') is-invalid @enderror"
                                                value="{{ old('lifearmstrong_title', $lifearmstrong->title) }}" placeholder="Enter Title Here">
                                            @error('lifearmstrong_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Image --}}
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="lifearmstrong_image" id="lifearmstrong_image"
                                                class="form-control color-image-input @error('lifearmstrong_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                            @error('lifearmstrong_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if($lifearmstrong->image)
                                                <div class="mt-2">
                                                    <img id="preview_lifearmstrong_image" src="{{ asset($lifearmstrong->image) }}" width="150" height="120" alt="{{ $lifearmstrong->alt_tag }}">
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Status --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status <span class="required-star">*</span></label>
                                            <select name="lifearmstrong_status"
                                                class="form-control @error('lifearmstrong_status') is-invalid @enderror">
                                                <option value="Active" {{ old('lifearmstrong_status', $lifearmstrong->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="In-Active" {{ old('lifearmstrong_status', $lifearmstrong->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('lifearmstrong_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Alt --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alt <span class="required-star">*</span></label>
                                            <input type="text" name="lifearmstrong_alt"
                                                class="form-control @error('lifearmstrong_alt') is-invalid @enderror"
                                                value="{{ old('lifearmstrong_alt', $lifearmstrong->alt_tag) }}" placeholder="Enter Alt Here">
                                            @error('lifearmstrong_alt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="card mb-4 border">
                                            <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                            <div class="card-body">
                                                <textarea name="lifearmstrong_desc"
                                                    class="form-control @error('lifearmstrong_desc') is-invalid @enderror"
                                                    rows="4" id="lifearmstrong_desc">{{ old('lifearmstrong_desc', $lifearmstrong->description) }}</textarea>
                                                @error('lifearmstrong_desc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div> {{-- End Card Body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Section --}}
    <script src="{{ asset('public/admin/js/lifearmstrong/lifearmstrong.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#lifearmstrong_desc').summernote({
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
        });
    </script>
@endsection

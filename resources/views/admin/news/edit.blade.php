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
            <div id="message-pop-up" class="alert alert-dismissible fade show" role="alert" style="display: none">
                <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Edit News</h3>
                    <a href="{{ route('news') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- News Info --}}
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>News Information</strong></div>
                                <div class="card-body row">

                                    {{-- Title --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="required-star">*</span></label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $news->title) }}" placeholder="Enter Title">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- News Url --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Url <span class="required-star">*</span></label>
                                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                            value="{{ old('url', $news->url) }}" placeholder="Enter url">
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Short Description --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Short Description <span class="required-star">*</span></label>
                                        <textarea name="short_description" id="short_description"
                                            class="form-control @error('short_description') is-invalid @enderror"
                                            placeholder="Enter short description">{{ old('short_description', $news->short_description) }}</textarea>
                                        @error('short_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Front Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Front Image</label>
                                        <input type="file" name="front_image" class="form-control @error('front_image') is-invalid @enderror">
                                        @if($news->front_image)
                                            <img src="{{ asset('/' . $news->front_image) }}" class="mt-2" style="max-width: 100px;">
                                        @endif
                                        @error('front_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Detail Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Detail Image</label>
                                        <input type="file" name="detail_image" class="form-control @error('detail_image') is-invalid @enderror">
                                        @if($news->detail_image)
                                            <img src="{{ asset('/' . $news->detail_image) }}" class="mt-2" style="max-width: 100px;">
                                        @endif
                                        @error('detail_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="Active" {{ old('status', $news->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="In-Active" {{ old('status', $news->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" id="date" value="{{$news->date}}" name="date" class="form-control">
                                    </div>

                                    {{-- Detail Description --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Detail Description</strong> <span class="required-star">*</span></div>
                                        <div class="card-body">
                                            <textarea name="detail_description" class="form-control @error('detail_description') is-invalid @enderror"
                                                rows="4" id="detail_description">{{ old('detail_description', $news->detail_description) }}</textarea>
                                            @error('detail_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update News</button>
                            </div>
                        </form>
                    </div> {{-- End Card Body --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS Section --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#detail_description').summernote({
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
        $('#short_description').summernote({
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

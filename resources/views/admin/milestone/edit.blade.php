@extends('admin.layouts.app')

@section('content')
<style>
    .required-star { color: red; }
    .preview-img { max-width: 100px; margin-top: 5px; }
</style>

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">

        {{-- Page Header --}}
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Edit Milestone</h3>
                    <a href="{{ route('milestone') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('milestone.update', $milestone->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>Milestone Information</strong></div>
                                <div class="card-body row">

                                    {{-- Year --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Milestone Year <span class="required-star">*</span></label>
                                        <input type="text" name="milestone_year" class="form-control @error('milestone_year') is-invalid @enderror"
                                            value="{{ old('milestone_year', $milestone->year) }}" maxlength="4" minlength="4"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);">
                                        @error('milestone_year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Image Upload --}}
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Image <span class="required-star">*</span></label>
                                        <input type="file" name="milestone_image" id="milestone_image"
                                            class="form-control @error('milestone_image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                        @error('milestone_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if ($milestone->image)
                                            <img id="preview_milestone_image" src="{{ asset($milestone->image) }}"  width="150" height="120" alt="{{ $milestone->alt_tag }}">
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="required-star">*</span></label>
                                        <input type="text" name="milestone_title"
                                            class="form-control @error('milestone_title') is-invalid @enderror"
                                            value="{{ old('milestone_title', $milestone->title) }}">
                                        @error('milestone_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Milestone Status <span class="required-star">*</span></label>
                                        <select name="milestone_status" class="form-control @error('milestone_status') is-invalid @enderror">
                                            <option value="Active" {{ old('milestone_status', $milestone->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="In-Active" {{ old('milestone_status', $milestone->status) == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('milestone_status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Alt Text --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alt Text <span class="required-star">*</span></label>
                                        <input type="text" name="milestone_alt"
                                            class="form-control @error('milestone_alt') is-invalid @enderror"
                                            value="{{ old('milestone_alt', $milestone->alt_tag) }}">
                                        @error('milestone_alt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Milestone Description <span class="required-star">*</span></label>
                                        <textarea name="milestone_desc" class="form-control @error('milestone_desc') is-invalid @enderror"
                                            id="milestone_desc" rows="4">{{ old('milestone_desc', $milestone->description) }}</textarea>
                                        @error('milestone_desc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update Milestone</button>
                            </div>

                        </form>
                    </div> {{-- End card-body --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS --}}
<script src="{{ asset('public/admin/js/milestone/milestone.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#milestone_desc').summernote({
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

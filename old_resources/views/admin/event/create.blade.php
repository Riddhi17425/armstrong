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
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add Events</h3>
                            <a href="{{ route('event') }}" class="btn btn-primary btn-set-task">Back</a>
                        </div>
                    </div>
                </div>

                {{-- Form Section --}}
                <div class="row clearfix g-3">
                    <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Milestone Info --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Events Information</strong></div>
                                        <div class="card-body row">                                     
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Title <span
                                                        class="required-star">*</span></label>
                                                <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    value="{{ old('title') }}" placeholder="Enter Title Here">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="date" class="form-label">Start Date <span
                                                        class="required-star">*</span></label>
                                                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" 
                                                class="form-control @error('start_date') is-invalid @enderror">
                                                @error('start_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="date" class="form-label">End Date <span
                                                        class="required-star">*</span></label>
                                                <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" 
                                                class="form-control @error('end_date') is-invalid @enderror">
                                                @error('end_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">address <span
                                                        class="required-star">*</span></label>
                                                <input type="text" name="address"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    value="{{ old('address') }}" placeholder="Enter Address Here">
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Status <span
                                                        class="required-star">*</span></label>
                                                <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                    <option value="Active"
                                                        {{ old('status') == 'Active' ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="In-Active"
                                                        {{ old('status') == 'In-Active' ? 'selected' : '' }}>Inactive
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Image <span class="required-star">*</span></label>
                                                <input type="file" name="image" id="event_image" class="form-control @error('image') is-invalid @enderror" onchange="validateAndPreviewImage()">
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <img id="preview_event_image" src="#" alt="Preview" class="mt-2" style="width: 120px; height: 100px; display: none;" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Alt <span class="required-star">*</span></label>
                                                <input type="text" name="alt"
                                                    class="form-control @error('alt') is-invalid @enderror"
                                                    value="{{ old('alt') }}" placeholder="Enter Alt Here">
                                                @error('alt')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="card mb-4 border">
                                                <div class="card mb-4 border">
                                                    <div class="card-header bg-light"><strong>Description </strong><span class="required-star">*</span></div>
                                                    <div class="card-body">
                                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"
                                                            id="description">{{ old('description') }}</textarea>
                                                        @error('description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- Submit --}}
                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Save Events</button>
                                        </div>
                                </form>
                            </div> {{-- End Card Body --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- JS Section --}}
        <script src="{{ asset('public/admin/js/events/events.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#description').summernote({
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

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
                        <h3 class="fw-bold mb-0">Add Video</h3>
                        <a href="{{ route('admin.video') }}" class="btn btn-primary btn-set-task">Back</a>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('admin.video.store') }}" id="videoForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Milestone Info --}}
                                <div class="card mb-4 border">
                                    <div class="card-header bg-light"><strong>Add Video </strong></div>
                                    <div class="card-body row">
                                       <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span
                                                    class="required-star">*</span></label>
                                            <input type="text" name="video_title"
                                                class="form-control @error('video_title') is-invalid @enderror"
                                                value="{{ old('video_title') }}" placeholder="Enter Title Here">
                                            @error('video_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label"> Thumbnails Images <span class="required-star">*</span></label>
                                            <input type="file" name="thumbnails_image" id="thumbnails_image"
                                                class="form-control color-image-input @error('thumbnails_image') is-invalid @enderror" onchange="validateAndPreviewImage()"
                                                multiple>
                                            @error('thumbnails_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="preview-images-zone mt-2 d-flex flex-wrap gap-2 position-relative">
                                            </div>
                                            <img id="preview_thumbnails_image" src="#" alt="Preview" class="mt-2" style="max-width: 100%; height: auto; display: none;" />
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger removeColor"
                                                style="display: none;">-</button>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Video Source <span class="required-star">*</span></label>
                                            <select name="video_source" id="video_source"
                                                class="form-control @error('video_source') is-invalid @enderror" onchange="toggleVideoSource()">
                                                <option value="upload" {{ old('video_source', 'upload') == 'upload' ? 'selected' : '' }}>Upload Video</option>
                                                <option value="youtube" {{ old('video_source') == 'youtube' ? 'selected' : '' }}>YouTube Link</option>
                                            </select>
                                            @error('video_source')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Upload Video (default visible) --}}
                                        <div class="col-md-6 mb-3" id="upload_video_wrapper">
                                            <label class="form-label">Select Video <span class="required-star">*</span></label>
                                            <input type="file" id="video_file"
                                                class="form-control @error('uploaded_video_path') is-invalid @enderror" accept="video/*" onchange="previewVideo(event)">
                                            @error('uploaded_video_path')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <div class="progress mt-2" style="display:none;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                                            </div>

                                            <video id="video_preview" controls style="margin-top:10px; max-width:100%; display:none;">
                                                <source id="video_preview_src" src="" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>

                                        {{-- YouTube Link (hidden initially) --}}
                                        <div class="col-md-6 mb-3" id="youtube_link_wrapper" style="display: none;">
                                            <label class="form-label">YouTube Link <span class="required-star">*</span></label>
                                            <input type="text" name="youtube_link" id="youtube_link"
                                                class="form-control @error('youtube_link') is-invalid @enderror" value="{{ old('youtube_link') }}"
                                                placeholder="Paste YouTube link here">
                                            @error('youtube_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Video Status <span
                                                    class="required-star">*</span></label>
                                            <select name="video_status"
                                                class="form-control @error('video_status') is-invalid @enderror">
                                                <option value="Active"
                                                    {{ old('video_status') == 'Active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="In-Active"
                                                    {{ old('video_status') == 'In-Active' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                            @error('video_status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="card mb-4 border">
                                            <div class="card mb-4 border">
                                                <div class="card-header bg-light"><strong>Video Description </strong><span class="required-star">*</span></div>
                                                <div class="card-body">
                                                    <textarea name="video_desc" class="form-control @error('video_desc') is-invalid @enderror" rows="4"
                                                        id="video_desc">{{ old('video_desc') }}</textarea>
                                                    @error('video_desc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- Submit --}}
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Save Video</button>
                                    </div>
                                </div>
                            </form>
                        </div> {{-- End Card Body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Section --}}
    <script src="{{ asset('public/admin/js/videoModule/video.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.APP_URLS = {
            videoUploadChunk: "{{ route('admin.video.chunkUpload') }}",
            deletemilestone:"{{ route('milestone.delete' , [':id']) }}",
            csrfToken: "{{ csrf_token() }}",
            image_path: "{{ asset('/') }}"
        };
    </script>
    
@endsection

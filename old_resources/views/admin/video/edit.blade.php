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
                    <h3 class="fw-bold mb-0">Edit Video</h3>
                    <a href="{{ route('admin.video') }}" class="btn btn-primary btn-set-task">Back</a>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="videoForm" action="{{ route('admin.video.update', $videoData->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-4 border">
                                <div class="card-header bg-light"><strong>{{ isset($videoData) ? 'Edit Video' : 'Add Video' }}</strong></div>
                                <div class="card-body row">

                                    {{-- Title --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="required-star">*</span></label>
                                        <input type="text" name="video_title"
                                            class="form-control @error('video_title') is-invalid @enderror"
                                            value="{{ old('video_title', $videoData->video_title ?? '') }}" placeholder="Enter Title Here">
                                        @error('video_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Thumbnail --}}
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Thumbnails Image <span class="required-star">*</span></label>
                                        <input type="file" name="thumbnails_image" id="thumbnails_image"
                                            class="form-control @error('thumbnails_image') is-invalid @enderror"
                                            onchange="validateAndPreviewImage()">
                                        @error('thumbnails_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        {{-- Existing Thumbnail Preview --}}
                                        <div class="mt-2">
                                            @if (!empty($videoData->thumnail_image))
                                                <img src="{{ asset('/' . $videoData->thumnail_image) }}"
                                                    id="preview_thumbnails_image"
                                                    style="max-width: 100%; height: auto;" alt="Current Thumbnail">
                                            @else
                                                <img id="preview_thumbnails_image" src="#" alt="Preview"
                                                    style="max-width: 100%; height: auto; display:none;" />
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Video Source --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Video Source <span class="required-star">*</span></label>
                                        <select name="video_source" id="video_source"
                                            class="form-control @error('video_source') is-invalid @enderror"
                                            onchange="toggleVideoSource()">
                                            <option value="upload" {{ old('video_source', $videoData->video_source ?? '') == 'upload' ? 'selected' : '' }}>Upload Video</option>
                                            <option value="youtube" {{ old('video_source', $videoData->video_source ?? '') == 'youtube' ? 'selected' : '' }}>YouTube Link</option>
                                        </select>
                                        @error('video_source')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Upload Video (if chosen) --}}
                                    <div class="col-md-6 mb-3" id="upload_video_wrapper"
                                        style="{{ old('video_source', $videoData->video_source ?? '') == 'youtube' ? 'display:none;' : '' }}">
                                        <label class="form-label">Select Video <span class="required-star">*</span></label>
                                        <input type="file" id="video_file"
                                            class="form-control @error('uploaded_video_path') is-invalid @enderror" accept="video/*"
                                            onchange="previewVideo(event)">
                                        @error('uploaded_video_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <div class="progress mt-2" style="display:none;">
                                            <div class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                                        </div>

                                        {{-- Existing Video Preview --}}
                                        <video id="video_preview" controls style="margin-top:10px; max-width:100%; {{ !empty($videoData->video) && $videoData->video_source=='upload' ? '' : 'display:none;' }}">
                                            @if (!empty($videoData->video) && $videoData->video_source == 'upload')
                                                <source id="video_preview_src" src="{{ asset('/' . $videoData->video) }}" type="video/mp4">
                                            @endif
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>

                                    {{-- YouTube Link (if chosen) --}}
                                    <div class="col-md-6 mb-3" id="youtube_link_wrapper"
                                        style="{{ old('video_source', $videoData->video_source ?? '') == 'upload' ? 'display:none;' : '' }}">
                                        <label class="form-label">YouTube Link <span class="required-star">*</span></label>
                                        <input type="text" name="youtube_link" id="youtube_link"
                                            class="form-control @error('youtube_link') is-invalid @enderror"
                                            value="{{ old('youtube_link', $videoData->video_source == 'youtube' ? $videoData->video : '') }}"
                                            placeholder="Paste YouTube link here">
                                        @error('youtube_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        {{-- YouTube Embed Preview --}}
                                       @php
                                            function getYoutubeId($url) {
                                                // Handle youtu.be links
                                                if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $matches)) {
                                                    return $matches[1];
                                                }

                                                // Handle watch?v= links
                                                if (preg_match('/v=([^\?&]+)/', $url, $matches)) {
                                                    return $matches[1];
                                                }

                                                // Handle embed links
                                                if (preg_match('/embed\/([^\?&]+)/', $url, $matches)) {
                                                    return $matches[1];
                                                }

                                                return null;
                                            }

                                            $youtubeId = getYoutubeId($videoData->video);
                                        @endphp

                                        @if ($youtubeId && $videoData->video_source == 'youtube')
                                            <div class="mt-2">
                                                <iframe width="100%" height="250"
                                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                    frameborder="0" allowfullscreen>
                                                </iframe>
                                            </div>
                                        @endif
                                    </div> 

                                    {{-- Status --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Video Status <span class="required-star">*</span></label>
                                        <select name="video_status"
                                            class="form-control @error('video_status') is-invalid @enderror">
                                            <option value="Active" {{ old('video_status', $videoData->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="In-Active" {{ old('video_status', $videoData->status ?? '') == 'In-Active' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('video_status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="card mb-4 border">
                                        <div class="card-header bg-light"><strong>Video Description </strong><span class="required-star">*</span></div>
                                        <div class="card-body">
                                            <textarea name="video_desc" class="form-control @error('video_desc') is-invalid @enderror" rows="4"
                                                id="video_desc">{{ old('video_desc', $videoData->video_description ?? '') }}</textarea>
                                            @error('video_desc')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                {{-- Submit --}}
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">{{ isset($videoData) ? 'Update Video' : 'Save Video' }}</button>
                                </div>
                            </div>
                        </form>
                    </div> {{-- End card-body --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS --}}
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

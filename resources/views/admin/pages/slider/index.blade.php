@extends('admin.app')

@section('admin_content')

    <div class="content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">

                    <div class="page-title-box">

                        <div class="page-title-right">

                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">
                                    Home Slider
                                </li>
                            </ol>

                        </div>

                        <h4 class="page-title">
                            Home Slider
                        </h4>

                    </div>

                </div>
            </div>

            <!-- Form -->

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">

                            <h4 class="header-title">
                                {{ $slider ? 'Update Home Slider' : 'Create Home Slider' }}
                            </h4>

                        </div>

                        <div class="card-body">

                            <form action="{{ route('slider.createOrUpdate',$slider ? $slider->id : null) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    <!-- Title -->

                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">

                                            Title

                                            <span class="text-danger">*</span>

                                        </label>

                                        <input
                                            type="text"
                                            name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title',$slider->title ?? '') }}"
                                            placeholder="Enter Slider Title">

                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <!-- Video -->

                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">
                                            Slider Video
                                        </label>

                                        <input
                                            type="file"
                                            name="videos"
                                            class="form-control @error('videos') is-invalid @enderror"
                                            accept=".mp4,.mov,.avi,.mkv,.webm">

                                        <small class="text-muted">
                                            Supported: MP4, MOV, AVI, MKV, WEBM (Max: 50MB)
                                        </small>

                                        @error('videos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    @if(!empty($slider?->videos))

                                        <div class="col-md-12 mb-3">

                                            <label class="form-label">
                                                Current Video
                                            </label>

                                            <div>

                                                <video
                                                    width="450"
                                                    controls
                                                    class="rounded border">

                                                    <source
                                                        src="{{ asset('videos/slider/'.$slider->videos) }}"
                                                        type="video/mp4">

                                                    Your browser does not support the video tag.

                                                </video>

                                            </div>

                                        </div>

                                    @endif

                                </div>

                                <div class="mt-3">

                                    <button
                                        type="submit"
                                        class="btn btn-primary">

                                        <i class="ri-save-line"></i>

                                        {{ $slider ? 'Update Slider' : 'Save Slider' }}

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

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
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Vision</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Vision</h4>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">
                                {{ $vision ? 'Update Vision' : 'Create Vision' }}
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('vision.createOrUpdate', $vision ? $vision->id : null) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="title"
                                               value="{{ old('title', $vision->title ?? '') }}"
                                               class="form-control @error('title') is-invalid @enderror">

                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Staff Creating Change -->
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">Staff Creating Change</label>
                                        <input type="number"
                                               name="staff_creating_change_no"
                                               value="{{ old('staff_creating_change_no', $vision->staff_creating_change_no ?? 0) }}"
                                               class="form-control">
                                    </div>

                                    <!-- Making an Impact -->
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">Making an Impact</label>
                                        <input type="number"
                                               name="making_an_impact_no"
                                               value="{{ old('making_an_impact_no', $vision->making_an_impact_no ?? 0) }}"
                                               class="form-control">
                                    </div>

                                    <!-- Bold Partners -->
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">Bold Partners</label>
                                        <input type="number"
                                               name="bold_partners_no"
                                               value="{{ old('bold_partners_no', $vision->bold_partners_no ?? 0) }}"
                                               class="form-control">
                                    </div>

                                    <!-- Cover Image -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cover Image</label>
                                        <input type="file"
                                               name="cover_image"
                                               class="form-control @error('cover_image') is-invalid @enderror">

                                        @error('cover_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if(!empty($vision?->cover_image))
                                            <div class="mt-2">
                                                <img src="{{ asset($vision->cover_image) }}"
                                                     class="img-thumbnail"
                                                     style="max-height:150px;">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Support Image -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Support Image</label>
                                        <input type="file"
                                               name="support_image"
                                               class="form-control @error('support_image') is-invalid @enderror">

                                        @error('support_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if(!empty($vision?->support_image))
                                            <div class="mt-2">
                                                <img src="{{ asset($vision->support_image) }}"
                                                     class="img-thumbnail"
                                                     style="max-height:150px;">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Video -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Video</label>

                                        <input type="file"
                                               name="video_file"
                                               class="form-control @error('video_file') is-invalid @enderror">

                                        @error('video_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if(!empty($vision?->video_file))
                                            <div class="mt-3">
                                                <video width="350" controls>
                                                    <source src="{{ asset($vision->video_file) }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Details -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Details</label>

                                        <textarea
                                            id="summernoteEdit{{ $vision ? $vision->id : '' }}"
                                            name="details">{{ old('details', $vision->details ?? '') }}</textarea>

                                        @error('details')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ $vision ? 'Update Vision' : 'Save Vision' }}
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

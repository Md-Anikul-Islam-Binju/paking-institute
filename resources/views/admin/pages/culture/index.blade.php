@extends('admin.app')

@section('admin_content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Our Culture</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Our Culture</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">
                        {{ $culture ? 'Update Our Culture' : 'Create Our Culture' }}
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('culture.createOrUpdate', $culture?->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!-- Title -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Title <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $culture->title ?? '') }}">

                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Video -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Video File</label>

                                <input type="file"
                                       name="videos_file"
                                       class="form-control @error('videos_file') is-invalid @enderror"
                                       accept="video/*">

                                @error('videos_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if(!empty($culture?->videos_file))
                                    <div class="mt-3">
                                        <video width="250" controls>
                                            <source src="{{ asset($culture->videos_file) }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                            </div>

                            <!-- Details -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Details</label>

                                <textarea
                                    id="summernoteEdit{{ $culture?->id }}"
                                    name="details">{{ old('details', $culture->details ?? '') }}</textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary">
                            {{ $culture ? 'Update Culture' : 'Save Culture' }}
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

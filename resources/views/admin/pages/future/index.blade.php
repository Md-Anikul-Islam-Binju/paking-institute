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
                                <li class="breadcrumb-item active">
                                    Future
                                </li>
                            </ol>
                        </div>

                        <h4 class="page-title">
                            Future
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
                                {{ $future ? 'Update Future' : 'Create Future' }}
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('future.createOrUpdate', $future ? $future->id : null) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Title
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                               name="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $future->title ?? '') }}"
                                               placeholder="Enter Title">

                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <!-- Cover Image -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Cover Image
                                        </label>

                                        <input type="file"
                                               name="cover_image"
                                               class="form-control @error('cover_image') is-invalid @enderror">

                                        @error('cover_image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        @if(!empty($future?->cover_image))
                                            <div class="mt-3">
                                                <img src="{{ asset('images/future/'.$future->cover_image) }}"
                                                     class="img-thumbnail"
                                                     style="max-width:180px;">
                                            </div>
                                        @endif

                                    </div>

                                    <!-- Details -->
                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">
                                            Details
                                        </label>

                                        <textarea id="summernoteEdit{{ $future ? $future->id : '' }}"
                                                  name="details">{{ $future ? $future->details : '' }}</textarea>

                                    </div>

                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $future ? 'Update Future' : 'Save Future' }}
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

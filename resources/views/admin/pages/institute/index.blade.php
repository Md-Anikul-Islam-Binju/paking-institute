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
                                    Institute Event
                                </li>
                            </ol>
                        </div>

                        <h4 class="page-title">Institute Event</h4>
                    </div>
                </div>
            </div>


            <!-- Form -->
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="header-title">
                                {{ $instituteEvent ? 'Update Institute Event' : 'Create Institute Event' }}
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('institute-event.createOrUpdate', $instituteEvent ? $instituteEvent->id : null) }}"
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
                                               value="{{ old('title', $instituteEvent->title ?? '') }}"
                                               placeholder="Enter title">

                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Slug -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Slug
                                        </label>

                                        <input type="text"
                                               name="slug"
                                               class="form-control @error('slug') is-invalid @enderror"
                                               value="{{ old('slug', $instituteEvent->slug ?? '') }}"
                                               placeholder="Enter slug">

                                        @error('slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Remark -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Remark
                                        </label>

                                        <textarea name="remark"
                                                  rows="5"
                                                  class="form-control @error('remark') is-invalid @enderror"
                                                  placeholder="Enter remark">{{ old('remark', $instituteEvent->remark ?? '') }}</textarea>

                                        @error('remark')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Image -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Image
                                        </label>

                                        <input type="file"
                                               name="image"
                                               class="form-control @error('image') is-invalid @enderror">

                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        @if(!empty($instituteEvent?->image))
                                            <div class="mt-3">
                                                <img src="{{ asset($instituteEvent->image) }}"
                                                     alt="Institute Event Image"
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

                                        <textarea name="details"
                                                  rows="6"
                                                  class="form-control @error('details') is-invalid @enderror"
                                                  placeholder="Enter details">{{ old('details', $instituteEvent->details ?? '') }}</textarea>

                                        @error('details')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Sub Title -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">
                                            Sub Title
                                        </label>

                                        <input type="text"
                                               name="sub_title"
                                               class="form-control @error('sub_title') is-invalid @enderror"
                                               value="{{ old('sub_title', $instituteEvent->sub_title ?? '') }}"
                                               placeholder="Enter sub title">

                                        @error('sub_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Sub Details -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">
                                            Sub Details
                                        </label>

                                        <textarea name="sub_details"
                                                  rows="6"
                                                  class="form-control @error('sub_details') is-invalid @enderror"
                                                  placeholder="Enter sub details">{{ old('sub_details', $instituteEvent->sub_details ?? '') }}</textarea>

                                        @error('sub_details')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Sub Remark -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">
                                            Sub Remark
                                        </label>

                                        <textarea name="sub_remark"
                                                  rows="5"
                                                  class="form-control @error('sub_remark') is-invalid @enderror"
                                                  placeholder="Enter sub remark">{{ old('sub_remark', $instituteEvent->sub_remark ?? '') }}</textarea>

                                        @error('sub_remark')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Sub Remark Details -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">
                                            Sub Remark Details
                                        </label>

                                        <textarea name="sub_remark_details"
                                                  rows="6"
                                                  class="form-control @error('sub_remark_details') is-invalid @enderror"
                                                  placeholder="Enter sub remark details">{{ old('sub_remark_details', $instituteEvent->sub_remark_details ?? '') }}</textarea>

                                        @error('sub_remark_details')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Sub Image -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Sub Image
                                        </label>

                                        <input type="file"
                                               name="sub_image"
                                               class="form-control @error('sub_image') is-invalid @enderror">

                                        @error('sub_image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        @if(!empty($instituteEvent?->sub_image))
                                            <div class="mt-3">
                                                <img src="{{ asset($instituteEvent->sub_image) }}"
                                                     alt="Institute Event Sub Image"
                                                     class="img-thumbnail"
                                                     style="max-width:180px;">
                                            </div>
                                        @endif
                                    </div>

                                </div>


                                <!-- Submit -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $instituteEvent ? 'Update Institute Event' : 'Save Institute Event' }}
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

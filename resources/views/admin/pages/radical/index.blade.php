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
                                    Radical Yet Practical
                                </li>
                            </ol>
                        </div>

                        <h4 class="page-title">
                            Radical Yet Practical
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
                                {{ $radical ? 'Update Radical' : 'Create Radical' }}
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('radical.createOrUpdate', $radical ? $radical->id : null) }}"
                                  method="POST">

                                @csrf

                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">
                                            Title
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                               name="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $radical->title ?? '') }}"
                                               placeholder="Enter Title">

                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <!-- Details -->
                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">
                                            Details
                                        </label>

                                        <textarea id="summernoteEdit{{ $radical ? $radical->id : '' }}"
                                                  name="details">{{ $radical ? $radical->details : '' }}</textarea>

                                    </div>

                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $radical ? 'Update Radical' : 'Save Radical' }}
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

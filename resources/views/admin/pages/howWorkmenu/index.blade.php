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
                                How We Work Menu
                            </li>

                        </ol>

                    </div>

                    <h4 class="page-title">
                        How We Work Menu
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

                            {{ $howWorkMenu
                            ? 'Update How We Work Menu'
                            : 'Create How We Work Menu'
                            }}

                        </h4>

                    </div>


                    <div class="card-body">

                        <form
                            action="{{ route(
                                    'howWorkMenu.createOrUpdate',
                                    $howWorkMenu ? $howWorkMenu->id : null
                                ) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="row">


                                <!-- How We Work Title -->

                                <div class="col-md-12 mb-3">

                                    <label class="form-label">

                                        How We Work Title

                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="how_we_work_title"
                                        class="form-control @error('how_we_work_title') is-invalid @enderror"
                                        value="{{ old(
                                                'how_we_work_title',
                                                $howWorkMenu->how_we_work_title ?? ''
                                            ) }}"
                                        placeholder="Enter How We Work Title"
                                    >

                                    @error('how_we_work_title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror

                                </div>


                                <!-- How We Work Details -->

                                <div class="col-md-12 mb-3">

                                    <label class="form-label">
                                        How We Work Details
                                    </label>

                                    <textarea
                                        name="how_we_work_details"
                                        rows="5"
                                        class="form-control @error('how_we_work_details') is-invalid @enderror"
                                        placeholder="Enter How We Work Details"
                                    >{{ old(
                                            'how_we_work_details',
                                            $howWorkMenu->how_we_work_details ?? ''
                                        ) }}</textarea>

                                    @error('how_we_work_details')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror

                                </div>


                                <hr class="my-3">


                                <!-- Insight -->

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Insight Title

                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="insight_title"
                                        class="form-control @error('insight_title') is-invalid @enderror"
                                        value="{{ old(
                                                'insight_title',
                                                $howWorkMenu->insight_title ?? ''
                                            ) }}"
                                        placeholder="Enter Insight Title"
                                    >

                                    @error('insight_title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Insight Logo
                                    </label>

                                    <input
                                        type="file"
                                        name="insight_logo"
                                        class="form-control @error('insight_logo') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.webp,.svg"
                                    >

                                    <small class="text-muted">
                                        JPG, JPEG, PNG, WEBP, SVG (Max: 2MB)
                                    </small>

                                    @error('insight_logo')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror


                                    @if(!empty($howWorkMenu?->insight_logo))

                                    <div class="mt-3">

                                        <label class="form-label d-block">
                                            Current Insight Logo
                                        </label>

                                        <img
                                            src="{{ asset(
                                                        'images/how-work-menu/' .
                                                        $howWorkMenu->insight_logo
                                                    ) }}"
                                            alt="Insight Logo"
                                            style="max-width: 120px; max-height: 100px;"
                                            class="img-thumbnail"
                                        >

                                    </div>

                                    @endif

                                </div>


                                <hr class="my-3">


                                <!-- Partnership -->

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Partnership Title

                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="partnership_title"
                                        class="form-control @error('partnership_title') is-invalid @enderror"
                                        value="{{ old(
                                                'partnership_title',
                                                $howWorkMenu->partnership_title ?? ''
                                            ) }}"
                                        placeholder="Enter Partnership Title"
                                    >

                                    @error('partnership_title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Partnership Logo
                                    </label>

                                    <input
                                        type="file"
                                        name="partnership_logo"
                                        class="form-control @error('partnership_logo') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.webp,.svg"
                                    >

                                    <small class="text-muted">
                                        JPG, JPEG, PNG, WEBP, SVG (Max: 2MB)
                                    </small>

                                    @error('partnership_logo')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror


                                    @if(!empty($howWorkMenu?->partnership_logo))

                                    <div class="mt-3">

                                        <label class="form-label d-block">
                                            Current Partnership Logo
                                        </label>

                                        <img
                                            src="{{ asset(
                                                        'images/how-work-menu/' .
                                                        $howWorkMenu->partnership_logo
                                                    ) }}"
                                            alt="Partnership Logo"
                                            style="max-width: 120px; max-height: 100px;"
                                            class="img-thumbnail"
                                        >

                                    </div>

                                    @endif

                                </div>


                                <hr class="my-3">


                                <!-- Approach -->

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Approach Title

                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        name="approach_title"
                                        class="form-control @error('approach_title') is-invalid @enderror"
                                        value="{{ old(
                                                'approach_title',
                                                $howWorkMenu->approach_title ?? ''
                                            ) }}"
                                        placeholder="Enter Approach Title"
                                    >

                                    @error('approach_title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Approach Logo
                                    </label>

                                    <input
                                        type="file"
                                        name="approach_logo"
                                        class="form-control @error('approach_logo') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.webp,.svg"
                                    >

                                    <small class="text-muted">
                                        JPG, JPEG, PNG, WEBP, SVG (Max: 2MB)
                                    </small>

                                    @error('approach_logo')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                    @enderror


                                    @if(!empty($howWorkMenu?->approach_logo))

                                    <div class="mt-3">

                                        <label class="form-label d-block">
                                            Current Approach Logo
                                        </label>

                                        <img
                                            src="{{ asset(
                                                        'images/how-work-menu/' .
                                                        $howWorkMenu->approach_logo
                                                    ) }}"
                                            alt="Approach Logo"
                                            style="max-width: 120px; max-height: 100px;"
                                            class="img-thumbnail"
                                        >

                                    </div>

                                    @endif

                                </div>


                            </div>


                            <!-- Submit -->

                            <div class="mt-3">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >

                                    <i class="ri-save-line"></i>

                                    {{ $howWorkMenu
                                    ? 'Update How We Work Menu'
                                    : 'Save How We Work Menu'
                                    }}

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

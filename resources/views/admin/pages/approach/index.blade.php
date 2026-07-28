@extends('admin.app')

@section('admin_content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Approach Section</h4>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <h4 class="card-title">
                {{ $approach ? 'Update Approach' : 'Create Approach' }}
            </h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form
                action="{{ route('approach.createOrUpdate', $approach->id ?? null) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $approach->title ?? '') }}"
                        placeholder="Enter Title">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Cover Image
                    </label>

                    <input
                        type="file"
                        name="cover_image"
                        class="form-control">

                    @if(!empty($approach?->cover_image))
                        <img
                            src="{{ asset('images/approach/'.$approach->cover_image) }}"
                            class="img-thumbnail mt-2"
                            style="width:120px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Details
                    </label>

                    <textarea
                        id="summernote"
                        name="details">{{ old('details', $approach->details ?? '') }}</textarea>
                </div>

                <div class="text-end">
                    <button class="btn btn-primary">

                        {{ $approach ? 'Update' : 'Save' }}

                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection

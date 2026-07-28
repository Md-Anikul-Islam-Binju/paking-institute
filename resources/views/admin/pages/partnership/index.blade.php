@extends('admin.app')

@section('admin_content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">
                    Partnership Section
                </h4>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('partnership.createOrUpdate',$partnership->id ?? '') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title',$partnership->title ?? '') }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Cover Image
                        </label>

                        <input type="file"
                               name="cover_image"
                               class="form-control">

                        @if(!empty($partnership->cover_image))
                            <img src="{{ asset('images/partnership/'.$partnership->cover_image) }}"
                                 class="img-thumbnail mt-2"
                                 width="120">
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Details
                        </label>

                        <textarea id="summernote"
                                  name="details">{{ old('details',$partnership->details ?? '') }}</textarea>
                    </div>

                </div>

                <div class="text-end">
                    <button class="btn btn-primary">
                        Save Changes
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection

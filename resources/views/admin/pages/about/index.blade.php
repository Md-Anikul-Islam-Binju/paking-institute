{{--@extends('admin.app')--}}
{{--@section('admin_content')--}}
{{--    <div class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="page-title-box">--}}
{{--                        <div class="page-title-right">--}}
{{--                            <ol class="breadcrumb m-0">--}}
{{--                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>--}}
{{--                                <li class="breadcrumb-item active">About</li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                        <h4 class="page-title">About</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Form row -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4 class="header-title">Form</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="{{route('about.createOrUpdate',$about ? $about->id : null)}}" method="post" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <div class="row g-2">--}}


{{--                                    <div class="mb-3 col-md-4">--}}
{{--                                        <label for="name" class="form-label">About Title</label>--}}
{{--                                        <input type="text" class="form-control" name="title" value="{{$about?$about->title:''}}"--}}
{{--                                               placeholder="Enter Title English">--}}
{{--                                    </div>--}}


{{--                                    <div class="mb-3 col-md-4">--}}
{{--                                        <label for="image" class="form-label">About Image Image</label>--}}
{{--                                        <input type="file" class="form-control" name="image" value="{{$about?$about->image:''}}"--}}
{{--                                               placeholder="Enter Image">--}}
{{--                                        @if($about? $about->image:'')--}}
{{--                                            <img src="{{asset($about? $about->image:'' )}}" alt="Current Image" class="mt-2" style="max-width: 100px;">--}}
{{--                                        @endif--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="row g-2">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label>Short Description </label>--}}
{{--                                                <textarea id="summernoteEdit{{ $about ? $about->id : '' }}" name="details">{{ $about ? $about->details : '' }}</textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


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
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </div>
                        <h4 class="page-title">About</h4>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">
                                {{ $about ? 'Update About' : 'Create About' }}
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('about.createOrUpdate', $about ? $about->id : null) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>

                                        <input type="text"
                                               name="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $about->title ?? '') }}"
                                               placeholder="Enter title">

                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Cover Image -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cover Image</label>

                                        <input type="file"
                                               name="cover_image"
                                               class="form-control @error('cover_image') is-invalid @enderror">

                                        @error('cover_image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        @if(!empty($about?->cover_image))
                                            <div class="mt-3">
                                                <img src="{{ asset($about->cover_image) }}"
                                                     alt="About Image"
                                                     class="img-thumbnail"
                                                     style="max-width:180px;">
                                            </div>
                                        @endif
                                    </div>


{{--                                    <!-- Description -->--}}
{{--                                    <div class="col-md-12 mb-3">--}}
{{--                                        <label class="form-label">Short Description <span class="text-danger">*</span></label>--}}
{{--                                        <textarea id="summernoteEdit{{ $about ? $about->id : '' }}" name="details">{{ $about ? $about->details : '' }}</textarea>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $about ? 'Update About' : 'Save About' }}
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

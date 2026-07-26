
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

                                <li class="breadcrumb-item active">
                                    Leadership
                                </li>

                            </ol>

                        </div>

                        <h4 class="page-title">
                            Leadership
                        </h4>

                    </div>

                </div>

            </div>


            <div class="card">

                <div class="card-header">

                    <h4 class="header-title">

                        {{ $leadership ? 'Update Leadership' : 'Create Leadership' }}

                    </h4>

                </div>

                <div class="card-body">

                    <form
                        action="{{ route('leadership.createOrUpdate',$leadership ? $leadership->id : null) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Title
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title',$leadership->title ?? '') }}"
                                    placeholder="Enter Title">

                                @error('title')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                                @enderror

                            </div>


                            <div class="col-md-12 mb-4">

                                <label class="form-label">

                                    Cover Image

                                </label>

                                <input
                                    type="file"
                                    name="cover_image"
                                    class="form-control @error('cover_image') is-invalid @enderror">

                                @error('cover_image')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                                @enderror

                            </div>


                            @if(!empty($leadership?->cover_image))

                                <div class="col-md-12 mb-4">

                                    <img
                                        src="{{ asset($leadership->cover_image) }}"
                                        class="img-thumbnail"
                                        style="max-height:220px;">

                                </div>

                            @endif

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="ri-save-line"></i>

                            {{ $leadership ? 'Update Leadership' : 'Save Leadership' }}

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

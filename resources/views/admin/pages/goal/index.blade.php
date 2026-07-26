
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
                                    Our Goal
                                </li>

                            </ol>

                        </div>

                        <h4 class="page-title">
                            Our Goal
                        </h4>

                    </div>

                </div>
            </div>

            <!-- Form -->
            <div class="card">

                <div class="card-header">

                    <h4 class="header-title">

                        {{ $goal ? 'Update Our Goal' : 'Create Our Goal' }}

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('goal.createOrUpdate',$goal ? $goal->id : null) }}"
                          method="POST">

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
                                    value="{{ old('title',$goal->title ?? '') }}"
                                    placeholder="Enter Title">

                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label">Details</label>
                                <textarea
                                    id="summernoteEdit{{ $goal ? $goal->id : '' }}"
                                    name="details">{{ old('details',$goal->details ?? '') }}</textarea>

                            </div>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            <i class="ri-save-line"></i>
                            {{ $goal ? 'Update Our Goal' : 'Save Our Goal' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




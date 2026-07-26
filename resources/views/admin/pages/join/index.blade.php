@extends('admin.app')
@section('admin_content')
    <style>
        .dropzoneWrapperEdit{
            border:2px dashed #d9d9d9;
            border-radius:10px;
            /*padding:30px;*/
            text-align:center;
            cursor:pointer;
            transition:.3s;
            background:#fafafa;
        }

        .dropzoneWrapperEdit:hover{
            border-color:#0d6efd;
            background:#f8fbff;
        }

        .image-preview{
            position:relative;
            display:inline-block;
            margin:10px;
        }

        .img-preview{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:8px;
            border:1px solid #ddd;
        }

        .remove-preview{
            position:absolute;
            top:5px;
            right:5px;
            width:22px;
            height:22px;
            background:#dc3545;
            color:#fff;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            font-size:14px;
        }
    </style>
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
                                <li class="breadcrumb-item active">Join Us</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Join Us</h4>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">
                                {{ $join ? 'Update Join Us' : 'Create Join Us' }}
                            </h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('join.createOrUpdate',$join ? $join->id : null) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">
                                            Title
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title',$join->title ?? '') }}"
                                            placeholder="Enter title">

                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Multiple Images -->
                                    <div id="dropzoneWrapperJoin" class="dropzoneWrapperEdit">
                                        <i class="ri-upload-cloud-2-line text-muted" style="font-size:50px"></i>
                                        <h5 class="mt-2">Drag & Drop Images Here</h5>
                                        <small class="text-muted">or click to browse</small>
                                        <input
                                            type="file"
                                            id="image-input-join"
                                            name="multiple_image[]"
                                            multiple
                                            accept="image/*"
                                            style="position:absolute;left:-9999px;">
                                    </div>

                                    <input type="hidden"
                                           name="deleted_images"
                                           id="deleted-images-join"
                                           value="[]">
                                    <div id="image-preview-container-join" class="mt-3 d-flex flex-wrap gap-2">
                                        @if($join && $join->multiple_image)
                                            @foreach($join->multiple_image as $image)
                                                <div class="image-preview">
                                                    <img src="{{ asset($image) }}" class="img-preview">
                                                    <span class="remove-preview" data-filename="{{ $image }}">
                                                        <i class="ri-close-line"></i>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Details -->
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-bold"> Details</label>
                                        <textarea
                                            id="summernoteEdit{{ $join ? $join->id : '' }}"
                                            name="details">{{ old('details',$join->details ?? '') }}</textarea>
                                    </div>
                                </div>

                                <button class="btn btn-primary">
                                    <i class="ri-save-line"></i>
                                    {{ $join ? 'Update Join Us' : 'Save Join Us' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const wrapper = document.getElementById('dropzoneWrapperJoin');
            const input = document.getElementById('image-input-join');
            const preview = document.getElementById('image-preview-container-join');
            const deleted = document.getElementById('deleted-images-join');

            wrapper.addEventListener('click', function () {
                input.click();
            });

            wrapper.addEventListener('dragover', function (e) {
                e.preventDefault();
                wrapper.style.borderColor = '#0d6efd';
            });

            wrapper.addEventListener('dragleave', function () {
                wrapper.style.borderColor = '#ddd';
            });

            wrapper.addEventListener('drop', function (e) {

                e.preventDefault();

                wrapper.style.borderColor = '#ddd';

                previewImages(e.dataTransfer.files);

            });

            input.addEventListener('change', function () {

                previewImages(this.files);

            });

            function previewImages(files){

                Array.from(files).forEach(function(file){

                    if(!file.type.match('image.*')) return;

                    const reader=new FileReader();

                    reader.onload=function(e){

                        preview.insertAdjacentHTML('beforeend',`

                    <div class="image-preview">

                        <img src="${e.target.result}" class="img-preview">

                        <span class="remove-preview">
                            <i class="ri-close-line"></i>
                        </span>

                    </div>

                `);

                    };

                    reader.readAsDataURL(file);

                });

            }

            preview.addEventListener('click',function(e){

                const btn=e.target.closest('.remove-preview');

                if(!btn) return;

                const filename=btn.dataset.filename;

                if(filename){

                    let arr=JSON.parse(deleted.value);

                    arr.push(filename);

                    deleted.value=JSON.stringify(arr);

                }

                btn.parentElement.remove();

            });

        });
    </script>
@endsection


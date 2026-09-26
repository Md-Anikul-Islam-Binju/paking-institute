
@extends('admin.app')

@section('admin_content')

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
                            Media Center
                        </li>

                    </ol>

                </div>

                <h4 class="page-title">
                    Media Center
                </h4>

            </div>

        </div>
    </div>


    <div class="col-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('media-center-create')

                        <button type="button"
                                class="btn btn-info"
                                data-bs-toggle="modal"
                                data-bs-target="#addNewModalId">

                            Add New

                        </button>

                    @endcan

                </div>

            </div>


            <div class="card-body">


                {{-- Success Message --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                {{-- Error Message --}}
                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        {{ session('error') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                <table id="basic-datatable"
                       class="table table-striped dt-responsive nowrap w-100">

                    <thead>

                    <tr>

                        <th>S/N</th>

                        <th>Image</th>

                        <th>Title</th>

                        <th>Date</th>

                        <th>Tag</th>

                        <th>Management Board</th>



                        <th width="120">
                            Action
                        </th>

                    </tr>

                    </thead>


                    <tbody>

                    @foreach($mediaCenters as $key => $mediaCenter)

                        <tr>

                            {{-- S/N --}}
                            <td>
                                {{ $mediaCenters->firstItem() + $key }}
                            </td>


                            {{-- Image --}}
                            <td>

                                @if($mediaCenter->cover_image)

                                    <img src="{{ asset('images/media-center/' . $mediaCenter->cover_image) }}"
                                         class="img-thumbnail"
                                         style="width:60px;height:60px;object-fit:cover;">

                                @else

                                    <span class="text-muted">
                                    N/A
                                </span>

                                @endif

                            </td>


                            {{-- Title --}}
                            <td>
                                {{ $mediaCenter->title }}
                            </td>


                            {{-- Date --}}
                            <td>

                                @if($mediaCenter->date)

                                    {{ \Carbon\Carbon::parse($mediaCenter->date)->format('d M Y') }}

                                @else

                                    N/A

                                @endif

                            </td>


                            {{-- Tag --}}
                            <td>

                                @if($mediaCenter->tag)

                                    <span class="badge bg-info">
                                    {{ $mediaCenter->tag }}
                                </span>

                                @else

                                    N/A

                                @endif

                            </td>


                            {{-- Management Board --}}
                            <td>

                                {{ $mediaCenter->managementBoard?->name ?? 'N/A' }}

                            </td>





                            {{-- Action --}}
                            <td>

                                <div class="d-flex justify-content-end gap-1">

                                    @can('media-center-edit')

                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editNewModalId{{ $mediaCenter->id }}">

                                            Edit

                                        </button>

                                    @endcan


                                    @can('media-center-delete')

                                        <a href="{{ route('media.center.destroy',$mediaCenter->id) }}"
                                           class="btn btn-danger btn-sm"
                                           data-bs-toggle="modal"
                                           data-bs-target="#danger-header-modal{{ $mediaCenter->id }}">

                                            Delete

                                        </a>

                                    @endcan

                                </div>

                            </td>

                        </tr>


                        {{-- ================================================= --}}
                        {{-- EDIT MODAL --}}
                        {{-- ================================================= --}}

                        <div class="modal fade"
                             id="editNewModalId{{ $mediaCenter->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">


                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit Media Center
                                        </h4>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal">
                                        </button>

                                    </div>


                                    <div class="modal-body">

                                        <form action="{{ route('media.center.update',$mediaCenter->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')


                                            <div class="row">


                                                {{-- Title --}}
                                                <div class="col-md-8">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Title
                                                        </label>

                                                        <input type="text"
                                                               name="title"
                                                               class="form-control"
                                                               value="{{ $mediaCenter->title }}"
                                                               placeholder="Enter Title"
                                                               required>

                                                    </div>

                                                </div>


                                                {{-- Date --}}
                                                <div class="col-md-4">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Date
                                                        </label>

                                                        <input type="date"
                                                               name="date"
                                                               class="form-control"
                                                               value="{{ $mediaCenter->date }}">

                                                    </div>

                                                </div>


                                                {{-- Tag --}}
                                                <div class="col-md-6">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Tag
                                                        </label>

                                                        <input type="text"
                                                               name="tag"
                                                               class="form-control"
                                                               value="{{ $mediaCenter->tag }}"
                                                               placeholder="Enter Tag">

                                                    </div>

                                                </div>


                                                {{-- Management Board --}}
                                                <div class="col-md-6">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Management Board
                                                        </label>

                                                        <select name="management_board_id"
                                                                class="form-select">

                                                            <option value="">
                                                                Select Management Board
                                                            </option>

                                                            @foreach($managements as $management)

                                                                <option value="{{ $management->id }}"
                                                                    {{ $mediaCenter->management_board_id == $management->id ? 'selected' : '' }}>

                                                                    {{ $management->name }}

                                                                </option>

                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>


                                                {{-- Image --}}
                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Cover Image
                                                        </label>

                                                        <input type="file"
                                                               name="cover_image"
                                                               class="form-control"
                                                               accept="image/*">

                                                        @if($mediaCenter->cover_image)

                                                            <img src="{{ asset('images/media-center/' . $mediaCenter->cover_image) }}"
                                                                 class="mt-2 rounded border"
                                                                 style="width:80px;height:80px;object-fit:cover;">

                                                        @endif

                                                        <small class="text-muted d-block mt-1">
                                                            Optional. JPG, JPEG, PNG or WEBP. Maximum 4MB.
                                                        </small>

                                                    </div>

                                                </div>


                                            </div>


                                            {{-- CKEditor Remark --}}
                                            <div class="row">

                                                <div class="col-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Remark
                                                        </label>

                                                        <textarea id="ckeditorEdit{{ $mediaCenter->id }}"
                                                                  name="remark">{{ $mediaCenter->remark }}</textarea>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="text-end">

                                                <button type="submit"
                                                        class="btn btn-primary">

                                                    <i class="ri-save-line"></i>
                                                    Update

                                                </button>

                                            </div>


                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- DELETE MODAL --}}
                        {{-- ================================================= --}}

                        <div class="modal fade"
                             id="danger-header-modal{{ $mediaCenter->id }}"
                             tabindex="-1">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">


                                    <div class="modal-header modal-colored-header bg-danger">

                                        <h4 class="modal-title">
                                            Delete
                                        </h4>

                                        <button type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal">
                                        </button>

                                    </div>


                                    <div class="modal-body">

                                        <h5 class="mt-0">

                                            Are you sure you want to delete this Media Center?

                                        </h5>

                                    </div>


                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">

                                            Close

                                        </button>


                                        <a href="{{ route('media.center.destroy',$mediaCenter->id) }}"
                                           class="btn btn-danger">

                                            Delete

                                        </a>

                                    </div>


                                </div>

                            </div>

                        </div>


                    @endforeach

                    </tbody>

                </table>


                {{-- Pagination --}}
                @if($mediaCenters->hasPages())

                    <div class="mt-3">

                        {{ $mediaCenters->links() }}

                    </div>

                @endif


            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- ADD MODAL --}}
    {{-- ========================================================= --}}

    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static"
         tabindex="-1"
         aria-labelledby="addNewModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title"
                        id="addNewModalLabel">

                        Add Media Center

                    </h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">


                    <form method="POST"
                          action="{{ route('media.center.store') }}"
                          enctype="multipart/form-data">

                        @csrf


                        <div class="row">


                            {{-- Title --}}
                            <div class="col-md-8">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="Enter Title"
                                           value="{{ old('title') }}"
                                           required>

                                    @error('title')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                    @enderror

                                </div>

                            </div>


                            {{-- Date --}}
                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Date
                                    </label>

                                    <input type="date"
                                           name="date"
                                           class="form-control"
                                           value="{{ old('date') }}">

                                    @error('date')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                    @enderror

                                </div>

                            </div>


                            {{-- Tag --}}
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Tag
                                    </label>

                                    <input type="text"
                                           name="tag"
                                           class="form-control"
                                           placeholder="Enter Tag"
                                           value="{{ old('tag') }}">

                                    @error('tag')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                    @enderror

                                </div>

                            </div>


                            {{-- Management Board --}}
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Management Board
                                    </label>

                                    <select name="management_board_id"
                                            class="form-select">

                                        <option value="">
                                            Select Management Board
                                        </option>

                                        @foreach($managements as $management)

                                            <option value="{{ $management->id }}"
                                                {{ old('management_board_id') == $management->id ? 'selected' : '' }}>

                                                {{ $management->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('management_board_id')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                    @enderror

                                </div>

                            </div>


                            {{-- Image --}}
                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Cover Image
                                    </label>

                                    <input type="file"
                                           name="cover_image"
                                           class="form-control"
                                           accept="image/*">

                                    <small class="text-muted">
                                        Optional. JPG, JPEG, PNG or WEBP. Maximum 4MB.
                                    </small>

                                    @error('cover_image')

                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>

                                    @enderror

                                </div>

                            </div>


                        </div>


                        {{-- CKEditor Remark --}}
                        <div class="row">

                            <div class="col-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Remark
                                    </label>

                                    <textarea id="ckeditor"
                                              name="remark">{{ old('remark') }}</textarea>

                                    @error('remark')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <div class="text-end">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="ri-save-line"></i>
                                Submit

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- CKEDITOR --}}
    {{-- ========================================================= --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* Add Modal CKEditor */

            const editorElement = document.querySelector('#ckeditor');

            if (editorElement) {

                ClassicEditor
                    .create(editorElement)
                    .catch(error => {
                        console.error(error);
                    });

            }


            /* Edit Modal CKEditors */

            @foreach($mediaCenters as $mediaCenter)

            const editEditor{{ $mediaCenter->id }} =
                document.querySelector('#ckeditorEdit{{ $mediaCenter->id }}');

            if (editEditor{{ $mediaCenter->id }}) {

                ClassicEditor
                    .create(editEditor{{ $mediaCenter->id }})
                    .catch(error => {
                        console.error(error);
                    });

            }

            @endforeach

        });

    </script>

@endsection


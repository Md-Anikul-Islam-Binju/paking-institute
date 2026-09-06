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
                                    <a href="{{ route('dashboard') }}">Insight Type</a>
                                </li>
                                <li class="breadcrumb-item active">Insight Type</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Insight Type</h4>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            @can('insight-type-create')
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

                        <table id="basic-datatable"
                               class="table table-striped dt-responsive nowrap w-100">

                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Type</th>
                                <th>Primary Image</th>
                                <th>Secondary Image</th>
                                <th>Color</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($types as $key => $type)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>{{ $type->type }}</td>
                                    <td>
                                        @if($type->primary_image)
                                            <img src="{{ asset($type->primary_image) }}"
                                                 width="60"
                                                 height="45"
                                                 style="object-fit: cover;"
                                                 class="rounded">
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>
                                        @if($type->secondary_image)
                                            <img src="{{ asset($type->secondary_image) }}"
                                                 width="60"
                                                 height="45"
                                                 style="object-fit: cover;"
                                                 class="rounded">
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>
                                        @if($type->color_code)
                                            <div class="d-flex align-items-center gap-2">
                                            <span style="
                                                width:25px;
                                                height:25px;
                                                display:inline-block;
                                                background:{{ $type->color_code }};
                                                border:1px solid #ddd;
                                                border-radius:4px;
                                            "></span>

                                                {{ $type->color_code }}
                                            </div>
                                        @else
                                            N/A
                                        @endif
                                    </td>


                                    <td>
                                        @if($type->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>

                                        <div class="d-flex justify-content-end gap-1">

                                            @can('insight-type-edit')
                                                <button
                                                    class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $type->id }}">
                                                    Edit
                                                </button>
                                            @endcan

                                            @can('insight-type-delete')
                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $type->id }}">
                                                    Delete
                                                </button>
                                            @endcan

                                        </div>

                                    </td>

                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade"
                                     id="editModal{{ $type->id }}"
                                     tabindex="-1">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Edit Insight Type
                                                </h4>

                                                <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <form method="POST"
                                                      action="{{ route('insight.type.update',$type->id) }}"   enctype="multipart/form-data">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Type
                                                        </label>

                                                        <input type="text"
                                                               name="type"
                                                               value="{{ $type->type }}"
                                                               class="form-control"
                                                               required>
                                                    </div>

                                                    <!-- Primary Image -->
                                                    <div class="col-md-12">
                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Primary Image
                                                            </label>

                                                            @if($type->primary_image)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset($type->primary_image) }}"
                                                                         width="100"
                                                                         height="70"
                                                                         style="object-fit: cover;"
                                                                         class="rounded border">
                                                                </div>
                                                            @endif

                                                            <input type="file"
                                                                   name="primary_image"
                                                                   class="form-control"
                                                                   accept="image/*">

                                                        </div>
                                                    </div>

                                                    <!-- Secondary Image -->
                                                    <div class="col-md-12">
                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Secondary Image
                                                            </label>

                                                            @if($type->secondary_image)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset($type->secondary_image) }}"
                                                                         width="100"
                                                                         height="70"
                                                                         style="object-fit: cover;"
                                                                         class="rounded border">
                                                                </div>
                                                            @endif

                                                            <input type="file"
                                                                   name="secondary_image"
                                                                   class="form-control"
                                                                   accept="image/*">

                                                        </div>
                                                    </div>

                                                    <!-- Color -->
                                                    <div class="col-md-12">
                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Color Code
                                                            </label>

                                                            <input type="text"
                                                                   name="color_code"
                                                                   class="form-control"
                                                                   placeholder="#000000"
                                                                   value="{{ $type->color_code }}">

                                                        </div>
                                                    </div>

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Status
                                                        </label>

                                                        <select name="status"
                                                                class="form-select">

                                                            <option value="1"
                                                                {{ $type->status==1 ? 'selected' : '' }}>
                                                                Active
                                                            </option>

                                                            <option value="0"
                                                                {{ $type->status==0 ? 'selected' : '' }}>
                                                                Inactive
                                                            </option>

                                                        </select>

                                                    </div>

                                                    <div class="text-end">

                                                        <button class="btn btn-primary">
                                                            Update
                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade"
                                     id="deleteModal{{ $type->id }}"
                                     tabindex="-1">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header bg-danger text-white">

                                                <h5 class="modal-title">
                                                    Delete
                                                </h5>

                                                <button type="button"
                                                        class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                Are you sure you want to delete this Insight Type?

                                            </div>

                                            <div class="modal-footer">

                                                <button class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <a href="{{ route('insight.type.destroy',$type->id) }}"
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

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Add Modal -->
    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static"
         tabindex="-1"
         aria-labelledby="addNewModalLabel"
         aria-hidden="true">

        <div class="modal-dialog  modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">
                        Add Insight Type
                    </h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <div class="modal-body">

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

                    <form method="POST"
                          action="{{ route('insight.type.store') }}"   enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <!-- Type -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Type
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                           name="type"
                                           class="form-control"
                                           placeholder="Enter Insight Type"
                                           value="{{ old('type') }}"
                                           required>

                                    @error('type')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>


                            <!-- Primary Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Primary Image
                                    </label>

                                    <input type="file"
                                           name="primary_image"
                                           class="form-control"
                                           accept="image/*">

                                    @error('primary_image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Secondary Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Secondary Image
                                    </label>

                                    <input type="file"
                                           name="secondary_image"
                                           class="form-control"
                                           accept="image/*">

                                    @error('secondary_image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Color Code -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Color Code
                                    </label>

                                    <input type="text"
                                           name="color_code"
                                           class="form-control"
                                           placeholder="#000000"
                                           value="{{ old('color_code') }}">

                                    @error('color_code')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Status
                                    </label>

                                    <select name="status" class="form-select">

                                        <option value="1" selected>
                                            Active
                                        </option>

                                        <option value="0">
                                            Inactive
                                        </option>

                                    </select>

                                    @error('status')
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

@endsection

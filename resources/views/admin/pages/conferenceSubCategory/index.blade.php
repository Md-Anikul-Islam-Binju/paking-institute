
@extends('admin.app')

@section('admin_content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box">

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            Conference Sub Category
                        </li>

                        <li class="breadcrumb-item active">
                            Conference Sub Category
                        </li>

                    </ol>

                </div>

                <h4 class="page-title">
                    Conference Sub Category
                </h4>

            </div>

        </div>

    </div>

    <div class="col-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('conference-category-create')

                        <button class="btn btn-info"
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
                        <th>Conference Category</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="120">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($subCategories as $key => $subCategory)

                        <tr>

                            <td>{{ $key+1 }}</td>

                            <td>
                                {{ $subCategory->category?->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $subCategory->name }}
                            </td>

                            <td>

                                @if($subCategory->status)

                                    <span class="badge bg-success">
                Active
            </span>

                                @else

                                    <span class="badge bg-danger">
                Inactive
            </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex justify-content-end gap-1">

                                    @can('conference-sub-category-edit')

                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editNewModalId{{ $subCategory->id }}">
                                            Edit
                                        </button>

                                    @endcan

                                    @can('conference-sub-category-delete')

                                        <button type="button"
                                                class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#danger-header-modal{{ $subCategory->id }}">
                                            Delete
                                        </button>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade"
                             id="editNewModalId{{ $subCategory->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit Conference Sub Category
                                        </h4>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <form action="{{ route('conference.sub.category.update',$subCategory->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <!-- Category -->

                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Conference Category
                                                        </label>

                                                        <select name="conference_category_id"
                                                                class="form-select"
                                                                required>

                                                            <option value="">
                                                                Select Category
                                                            </option>

                                                            @foreach($categories as $category)

                                                                <option value="{{ $category->id }}"
                                                                    {{ $subCategory->conference_category_id == $category->id ? 'selected' : '' }}>

                                                                    {{ $category->name }}

                                                                </option>

                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                                <!-- Name -->

                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Name
                                                        </label>

                                                        <input type="text"
                                                               name="name"
                                                               class="form-control"
                                                               value="{{ $subCategory->name }}"
                                                               required>

                                                    </div>

                                                </div>

                                                <!-- Status -->

                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Status
                                                        </label>

                                                        <select name="status"
                                                                class="form-select">

                                                            <option value="1"
                                                                {{ $subCategory->status==1 ? 'selected' : '' }}>
                                                                Active
                                                            </option>

                                                            <option value="0"
                                                                {{ $subCategory->status==0 ? 'selected' : '' }}>
                                                                Inactive
                                                            </option>

                                                        </select>

                                                    </div>

                                                </div>

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
                             id="danger-header-modal{{ $subCategory->id }}"
                             tabindex="-1">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header modal-colored-header bg-danger">

                                        <h4 class="modal-title">
                                            Delete
                                        </h4>

                                        <button type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <h5>
                                            Are you sure you want to delete this Conference Sub Category?
                                        </h5>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <a href="{{ route('conference.sub.category.destroy',$subCategory->id) }}"
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

    <!-- Add Modal -->

    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Conference Sub Category
                    </h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form action="{{ route('conference.sub.category.store') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <!-- Conference Category -->

                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Conference Category
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select name="conference_category_id"
                                            class="form-select"
                                            required>

                                        <option value="">
                                            Select Conference Category
                                        </option>

                                        @foreach($categories as $category)

                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <!-- Name -->

                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           required>

                                </div>

                            </div>

                            <!-- Status -->

                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Status
                                    </label>

                                    <select name="status"
                                            class="form-select">

                                        <option value="1">
                                            Active
                                        </option>

                                        <option value="0">
                                            Inactive
                                        </option>

                                    </select>

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

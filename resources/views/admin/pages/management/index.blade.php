@extends('admin.app')
@section('admin_content')
{{-- CKEditor CDN --}}
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Management Board</a></li>
                    <li class="breadcrumb-item active">Management Board</li>
                </ol>
            </div>
            <h4 class="page-title">Management Board</h4>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                @can('management-create')
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

            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">

                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Expert Category</th>
                    <th>Designation</th>
                    <th>Details</th>
                    <th width="120">Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($managements as $key => $management)

                <tr>

                    <td>{{ $key+1 }}</td>

                    <td>
                        <img src="{{ asset('images/management/'.$management->image) }}"
                             class="img-thumbnail"
                             style="width:60px;height:60px;object-fit:cover;">
                    </td>

                    <td>{{ $management->name }}</td>
                    <td>{{ $management->category?->name ?? 'N/A' }}</td>

                    <td>{{ $management->designation }}</td>
                    <td>
                        {!! $management->details
                            ? \Illuminate\Support\Str::limit(strip_tags($management->details), 50)
                            : 'N/A'
                        !!}
                    </td>


                    <td>
                        <div class="d-flex justify-content-end gap-1">

                            @can('management-edit')
                            <button type="button"
                                    class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editNewModalId{{ $management->id }}">
                                Edit
                            </button>
                            @endcan

                            @can('management-delete')
                            <a href="{{ route('management.destroy',$management->id) }}"
                               class="btn btn-danger btn-sm"
                               data-bs-toggle="modal"
                               data-bs-target="#danger-header-modal{{ $management->id }}">
                                Delete
                            </a>
                            @endcan

                        </div>
                    </td>

                </tr>

                <!-- Edit Modal -->
                <div class="modal fade"
                     id="editNewModalId{{ $management->id }}"
                     data-bs-backdrop="static"
                     tabindex="-1">

                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Edit Management Board
                                </h4>

                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <form action="{{ route('management.update',$management->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Expert Category </label>
                                                <select name="expert_category_id" class="form-select">
                                                    <option selected>Select Expert Category</option>
                                                    @foreach($categories as $key => $category)
                                                        <option value="{{ $category->id }}" {{ $management->expert_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Name
                                                </label>

                                                <input type="text"
                                                       name="name"
                                                       class="form-control"
                                                       value="{{ $management->name }}"
                                                       required>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Designation
                                                </label>

                                                <input type="text"
                                                       name="designation"
                                                       class="form-control"
                                                       value="{{ $management->designation }}"
                                                       required>
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Image
                                                </label>

                                                <input type="file"
                                                       name="image"
                                                       class="form-control">

                                                <img src="{{ asset('images/management/'.$management->image) }}"
                                                     class="mt-2 rounded border"
                                                     style="width:70px;height:70px;object-fit:cover;">

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label>Details</label>
                                                    <textarea id="summernoteEdit{{ $management->id }}" name="details">{{ $management->details }}</textarea>
                                                </div>
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
                     id="danger-header-modal{{ $management->id }}"
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
                                    Are you sure you want to delete this Management Board member?
                                </h5>

                            </div>

                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-light"
                                        data-bs-dismiss="modal">
                                    Close
                                </button>

                                <a href="{{ route('management.destroy',$management->id) }}"
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
     aria-labelledby="addNewModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="addNewModalLabel">
                    Add Management Board Member
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

                <form method="POST"
                      action="{{ route('management.store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">


                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Expert Category </label>
                                <select name="expert_category_id" class="form-select">
                                    <option selected>Select Expert Category</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">

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

                        <!-- Designation -->
                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Designation
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       name="designation"
                                       class="form-control"
                                       placeholder="Enter Designation"
                                       required>

                            </div>

                        </div>

                        <!-- Image -->
                        <div class="col-md-12">

                            <div class="mb-3">

                                <label class="form-label">
                                    Image
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="file"
                                       name="image"
                                       class="form-control"
                                       accept="image/*"
                                       required>

                            </div>

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label> Details </label>
                                <textarea id="summernote" name="details"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">

                        <button type="submit" class="btn btn-primary">
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



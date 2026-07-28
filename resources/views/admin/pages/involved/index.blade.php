@extends('admin.app')

@section('admin_content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Involved</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Involved Section
                        </li>
                    </ol>
                </div>

                <h4 class="page-title">
                    Involved Section
                </h4>
            </div>
        </div>
    </div>

    <div class="col-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('involved-create')
                        <button
                            type="button"
                            class="btn btn-info"
                            data-bs-toggle="modal"
                            data-bs-target="#addNewModalId">

                            Add New

                        </button>
                    @endcan

                </div>

            </div>

            <div class="card-body">

                <table
                    id="basic-datatable"
                    class="table table-striped dt-responsive nowrap w-100">

                    <thead>

                    <tr>

                        <th>S/N</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($involveds as $key => $involved)

                        <tr>

                            <td>
                                {{ $key + 1 }}
                            </td>

                            <td>

                                @if($involved->image)

                                    <img
                                        src="{{ asset('images/involved/'.$involved->image) }}"
                                        class="img-thumbnail"
                                        style="width:60px;height:60px;object-fit:cover;">

                                @else

                                    <span class="badge bg-secondary">
                                    N/A
                                </span>

                                @endif

                            </td>

                            <td>
                                {{ $involved->title }}
                            </td>

                            <td>

                                @if($involved->details)

                                    {!! \Illuminate\Support\Str::limit(strip_tags($involved->details),80) !!}

                                @else

                                    <span class="badge bg-secondary">
                                    N/A
                                </span>

                                @endif

                            </td>

                            <td style="width:120px;">

                                <div class="d-flex justify-content-end gap-1">

                                    @can('involved-edit')

                                        <button
                                            class="btn btn-info btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $involved->id }}">

                                            Edit

                                        </button>

                                    @endcan

                                    @can('involved-delete')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $involved->id }}">

                                            Delete

                                        </button>

                                    @endcan

                                </div>

                            </td>

                            <!-- Edit Modal -->
                            <div class="modal fade"
                                 id="editModal{{ $involved->id }}"
                                 data-bs-backdrop="static"
                                 tabindex="-1"
                                 aria-labelledby="editModalLabel{{ $involved->id }}"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-lg modal-dialog-centered">

                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Edit Involved
                                            </h4>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <form action="{{ route('involved.update',$involved->id) }}"
                                                  method="POST"
                                                  enctype="multipart/form-data">

                                                @csrf
                                                @method('PUT')

                                                <div class="row">

                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">
                                                            Title
                                                        </label>

                                                        <input type="text"
                                                               name="title"
                                                               class="form-control"
                                                               value="{{ $involved->title }}"
                                                               required>
                                                    </div>

                                                    <div class="col-md-12 mb-3">

                                                        <label class="form-label">
                                                            Image
                                                        </label>

                                                        <input type="file"
                                                               name="image"
                                                               class="form-control">

                                                        @if($involved->image)

                                                            <img src="{{ asset('images/involved/'.$involved->image) }}"
                                                                 class="img-thumbnail mt-2"
                                                                 style="width:70px;height:70px;object-fit:cover;">

                                                        @endif

                                                    </div>

                                                    <div class="col-md-12 mb-3">

                                                        <label class="form-label">
                                                            Details
                                                        </label>

                                                        <textarea id="summernoteEdit{{ $involved->id }}"
                                                                  name="details">{{ $involved->details }}</textarea>

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
                                 id="deleteModal{{ $involved->id }}"
                                 tabindex="-1"
                                 aria-labelledby="deleteModalLabel{{ $involved->id }}"
                                 aria-hidden="true">

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

                                            <h5 class="mt-0">
                                                Are you sure you want to delete this record?
                                            </h5>

                                            <p class="mb-0">
                                                <strong>{{ $involved->title }}</strong>
                                            </p>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button"
                                                    class="btn btn-light"
                                                    data-bs-dismiss="modal">
                                                Close
                                            </button>

                                            <a href="{{ route('involved.destroy',$involved->id) }}"
                                               class="btn btn-danger">
                                                Delete
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </tr>

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

        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">
                        Add Involved
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

                    <form action="{{ route('involved.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <!-- Title -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Title
                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Enter Title"
                                       required>
                            </div>

                            <!-- Image -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Image
                                </label>

                                <input type="file"
                                       name="image"
                                       class="form-control"
                                       accept="image/*"
                                       required>
                            </div>

                            <!-- Details -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Details
                                    </label>

                                    <textarea id="summernote"
                                              name="details"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">
                                <i class="ri-save-line"></i>
                                Save Involved
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

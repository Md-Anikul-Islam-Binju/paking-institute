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
                            <a href="javascript:void(0);">Explore</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Explore
                        </li>
                    </ol>
                </div>

                <h4 class="page-title">
                    Explore
                </h4>

            </div>
        </div>
    </div>

    <div class="col-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('explore-create')

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
                        <th>Title</th>
                        <th>Topic</th>
                        <th>Tag</th>
                        <th>Details</th>
                        <th width="120">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($explores as $key => $explore)

                        <tr>

                            <td>{{ $key+1 }}</td>

                            <td>
                                {{ $explore->title }}
                            </td>

                            <td>
                                {{ $explore->topic ?: 'N/A' }}
                            </td>

                            <td>

                                @if($explore->tag)

                                    @foreach(explode(',', $explore->tag) as $tag)

                                        <span class="badge bg-primary">
                                    {{ trim($tag) }}
                                </span>

                                    @endforeach

                                @else

                                    <span class="badge bg-secondary">
                                N/A
                            </span>

                                @endif

                            </td>

                            <td>
                                {!! $explore->details
                                ? \Illuminate\Support\Str::limit(strip_tags($explore->details),20)
                                : 'N/A' !!}
                            </td>

                            <td>

                                <div class="d-flex justify-content-end gap-1">

                                    @can('explore-edit')

                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editNewModalId{{ $explore->id }}">
                                            Edit
                                        </button>

                                    @endcan

                                    @can('explore-delete')

                                        <a href="{{ route('explore.destroy',$explore->id) }}"
                                           class="btn btn-danger btn-sm"
                                           data-bs-toggle="modal"
                                           data-bs-target="#danger-header-modal{{ $explore->id }}">
                                            Delete
                                        </a>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                        <!-- Edit Modal -->

                        <div class="modal fade"
                             id="editNewModalId{{ $explore->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit Explore
                                        </h4>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <form action="{{ route('explore.update',$explore->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <!-- Title -->
                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Title
                                                        </label>

                                                        <input type="text"
                                                               name="title"
                                                               class="form-control"
                                                               value="{{ $explore->title }}"
                                                               required>

                                                    </div>

                                                </div>

                                                <!-- Topic -->
                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Topic
                                                        </label>

                                                        <input type="text"
                                                               name="topic"
                                                               class="form-control"
                                                               value="{{ $explore->topic }}"
                                                               placeholder="Enter Topic">

                                                    </div>

                                                </div>

                                                <!-- Tag -->
                                                <div class="col-md-12">

                                                    <div class="mb-3">

                                                        <label class="form-label">
                                                            Tag
                                                        </label>

                                                        <input type="text"
                                                               name="tag"
                                                               class="form-control"
                                                               value="{{ $explore->tag }}"
                                                               placeholder="AI, Economy, Research">

                                                        <small class="text-muted">
                                                            Separate multiple tags with comma (,)
                                                        </small>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-12">

                                                    <div class="mb-3">

                                                        <label>
                                                            Details
                                                        </label>

                                                        <textarea id="summernoteEdit{{ $explore->id }}"
                                                                  name="details">{{ $explore->details }}</textarea>

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
                             id="danger-header-modal{{ $explore->id }}"
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

                                        <h5 class="mt-0">
                                            Are You Want to Delete this Explore?
                                        </h5>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <a href="{{ route('explore.destroy',$explore->id) }}"
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

                    <h4 class="modal-title"
                        id="addNewModalLabel">
                        Add Explore
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

                    <form action="{{ route('explore.store') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <!-- Title -->
                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="Enter Title"
                                           required>

                                </div>

                            </div>

                            <!-- Topic -->
                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Topic
                                    </label>

                                    <input type="text"
                                           name="topic"
                                           class="form-control"
                                           placeholder="Enter Topic">

                                </div>

                            </div>

                            <!-- Tag -->
                            <div class="col-md-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Tag
                                    </label>

                                    <input type="text"
                                           name="tag"
                                           class="form-control"
                                           placeholder="AI, Economy, Research">

                                    <small class="text-muted">
                                        Separate multiple tags with comma (,)
                                    </small>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">

                                <div class="mb-3">

                                    <label>
                                        Details
                                    </label>

                                    <textarea id="summernote"
                                              name="details"></textarea>

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

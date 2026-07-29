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
                            Conference Category
                        </li>

                        <li class="breadcrumb-item active">
                            Conference Category
                        </li>

                    </ol>

                </div>

                <h4 class="page-title">
                    Conference Category
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
                        <th>Explore Vision</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="120">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($categories as $key => $category)

                        <tr>

                            <td>{{ $key+1 }}</td>

                            <td>{{ $category->name }}</td>
                            <td>
                                {{ $category->exploreVision->name ?? 'N/A' }}
                            </td>
                            <td>

                                @if($category->status)

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

                                    @can('conference-category-edit')

                                        <button class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editNewModalId{{ $category->id }}">
                                            Edit
                                        </button>

                                    @endcan

                                    @can('conference-category-delete')

                                        <button class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#danger-header-modal{{ $category->id }}">
                                            Delete
                                        </button>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                        <!-- ================= Edit Modal ================= -->

                        <div class="modal fade"
                             id="editNewModalId{{ $category->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit Conference Category
                                        </h4>

                                        <button class="btn-close"
                                                data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <form action="{{ route('conference.category.update',$category->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-md-12 mb-3">

                                                    <label class="form-label">
                                                        Explore Vision
                                                    </label>

                                                    <select name="explore_vision_id" class="form-select" required>

                                                        @foreach($exploreVisions as $vision)

                                                            <option value="{{ $vision->id }}"
                                                                {{ $category->explore_vision_id == $vision->id ? 'selected':'' }}>
                                                                {{ $vision->name }}
                                                            </option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                                <div class="col-md-12 mb-3">

                                                    <label class="form-label">
                                                        Name
                                                    </label>

                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           value="{{ $category->name }}"
                                                           required>

                                                </div>

                                                <div class="col-md-12 mb-3">

                                                    <label class="form-label">
                                                        Status
                                                    </label>

                                                    <select name="status"
                                                            class="form-select">

                                                        <option value="1"
                                                            {{ $category->status==1 ? 'selected':'' }}>
                                                            Active
                                                        </option>

                                                        <option value="0"
                                                            {{ $category->status==0 ? 'selected':'' }}>
                                                            Inactive
                                                        </option>

                                                    </select>

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

                        <!-- ================= Delete Modal ================= -->

                        <div class="modal fade"
                             id="danger-header-modal{{ $category->id }}"
                             tabindex="-1">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header modal-colored-header bg-danger">

                                        <h4 class="modal-title">
                                            Delete
                                        </h4>

                                        <button class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <h5>
                                            Are you sure you want to delete this Conference Category?
                                        </h5>

                                    </div>

                                    <div class="modal-footer">

                                        <button class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <a href="{{ route('conference.category.destroy',$category->id) }}"
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

    <!-- ================= Add Modal ================= -->

    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static"
         tabindex="-1">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Conference Category
                    </h4>

                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form action="{{ route('conference.category.store') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Explore Vision
                                </label>

                                <select name="explore_vision_id" class="form-select" required>

                                    <option value="">
                                        Select Explore Vision
                                    </option>

                                    @foreach($exploreVisions as $vision)

                                        <option value="{{ $vision->id }}">
                                            {{ $vision->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Name
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter Category Name"
                                       required>

                            </div>

                            <div class="col-md-12 mb-3">

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

                        <div class="text-end">

                            <button class="btn btn-primary">

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

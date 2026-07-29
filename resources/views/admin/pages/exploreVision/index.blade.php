
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
                            Explore Vision
                        </li>

                        <li class="breadcrumb-item active">
                            Explore Vision
                        </li>

                    </ol>

                </div>

                <h4 class="page-title">
                    Explore Vision
                </h4>

            </div>

        </div>

    </div>

    <div class="col-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('explore-vision-create')

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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Tag</th>
                        <th width="120">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($visions as $key=>$vision)

                        <tr>

                            <td>{{ $key+1 }}</td>

                            <td>

                                @if($vision->cover_image)

                                    <img src="{{ asset('images/explore-vision/'.$vision->cover_image) }}"
                                         class="img-thumbnail"
                                         style="width:60px;height:60px;object-fit:cover;">

                                @else

                                    <span class="badge bg-secondary">
                                    N/A
                                </span>

                                @endif

                            </td>

                            <td>

                                {{ $vision->name }}

                            </td>

                            <td>

                                @if($vision->tag)

                                    @foreach(explode(',',$vision->tag) as $tag)

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

                                <div class="d-flex justify-content-end gap-1">

                                    @can('explore-vision-edit')

                                        <button class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editNewModalId{{ $vision->id }}">
                                            Edit
                                        </button>

                                    @endcan

                                    @can('explore-vision-delete')

                                        <button class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#danger-header-modal{{ $vision->id }}">
                                            Delete
                                        </button>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                        <!-- ================= Edit Modal ================= -->

                        <div class="modal fade"
                             id="editNewModalId{{ $vision->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit Explore Vision
                                        </h4>

                                        <button class="btn-close"
                                                data-bs-dismiss="modal"></button>

                                    </div>

                                    <div class="modal-body">

                                        <form action="{{ route('explore.vision.update',$vision->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-md-12 mb-3">

                                                    <label>Name</label>

                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           value="{{ $vision->name }}"
                                                           required>

                                                </div>

                                                <div class="col-md-12 mb-3">

                                                    <label>Tag</label>

                                                    <input type="text"
                                                           name="tag"
                                                           class="form-control"
                                                           value="{{ $vision->tag }}">

                                                </div>

                                                <div class="col-md-12 mb-3">

                                                    <label>Cover Image</label>

                                                    <input type="file"
                                                           name="cover_image"
                                                           class="form-control">

                                                    @if($vision->cover_image)

                                                        <img src="{{ asset('images/explore-vision/'.$vision->cover_image) }}"
                                                             class="mt-2 rounded border"
                                                             style="width:80px">

                                                    @endif

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
                             id="danger-header-modal{{ $vision->id }}"
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
                                            Are you sure you want to delete this Explore Vision?
                                        </h5>

                                    </div>

                                    <div class="modal-footer">

                                        <button class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <a href="{{ route('explore.vision.destroy',$vision->id) }}"
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

                        Add Explore Vision

                    </h4>

                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form action="{{ route('explore.vision.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-md-12 mb-3">

                                <label>Name</label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       required>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label>Tag</label>

                                <input type="text"
                                       name="tag"
                                       class="form-control"
                                       placeholder="AI, Economy, Policy">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label>Cover Image</label>

                                <input type="file"
                                       name="cover_image"
                                       class="form-control">

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

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
                                <li class="breadcrumb-item active">Insight</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Insight</h4>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            @can('insight-create')
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

                        <table
                               class="table table-striped dt-responsive nowrap w-100">

                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Cover</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Tag</th>
{{--                                <th>Management</th>--}}
                                <th>PDF</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($insights as $key => $insight)

                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        @if($insight->cover_image)
                                            <img src="{{ asset('images/insight/'.$insight->cover_image) }}"
                                                 class="img-thumbnail"
                                                 style="width:60px;height:60px;object-fit:cover;">
                                        @else
                                            <span class="badge bg-secondary">N/A</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $insight->type->type ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($insight->title, 50) }}
                                    </td>

                                    <td>
                                        {{ $insight->date ? \Carbon\Carbon::parse($insight->date)->format('d M Y') : 'N/A' }}
                                    </td>

                                    <td>
                                        @if($insight->tag)
                                            @foreach(explode(',', $insight->tag) as $tag)
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

{{--                                    <td>--}}
{{--                                        @if(!empty($insight->multiple_management_board_id))--}}
{{--                                            @foreach($managements->whereIn('id',$insight->multiple_management_board_id) as $board)--}}
{{--                                                <span class="badge bg-info mb-1">--}}
{{--                                                   {{ $board->name }}--}}
{{--                                                </span>--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <span class="badge bg-secondary">--}}
{{--                                                N/A--}}
{{--                                            </span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}




                                    <td>
                                        @if($insight->pdf_file)
                                            <a href="{{ asset('files/insight-pdf/'.$insight->pdf_file) }}"
                                               target="_blank"
                                               class="btn btn-sm btn-danger">
                                                <i class="ri-file-pdf-line"></i> PDF
                                            </a>
                                        @else
                                            <span class="badge bg-secondary">N/A</span>
                                        @endif
                                    </td>

                                    <td style="width:120px;">

                                        <div class="d-flex justify-content-end gap-1">

                                            @can('insight-edit')

                                                <button
                                                    class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editInsightModal{{ $insight->id }}">
                                                    Edit
                                                </button>

                                            @endcan

                                            @can('insight-delete')

                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteInsightModal{{ $insight->id }}">
                                                    Delete
                                                </button>

                                            @endcan

                                        </div>

                                    </td>

                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade"
                                     id="editInsightModal{{ $insight->id }}"
                                     data-bs-backdrop="static"
                                     tabindex="-1"
                                     aria-hidden="true">

                                    <div class="modal-dialog modal-xl modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Edit Insight
                                                </h4>

                                                <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <form method="POST"
                                                      action="{{ route('insight.update',$insight->id) }}"
                                                      enctype="multipart/form-data">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">

                                                        <!-- Type -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    Insight Type
                                                                </label>

                                                                <select name="type_id"
                                                                        class="form-select"
                                                                        required>

                                                                    <option value="">
                                                                        Select Type
                                                                    </option>

                                                                    @foreach($types as $type)

                                                                        <option value="{{ $type->id }}"
                                                                            {{ $insight->type_id==$type->id ? 'selected':'' }}>
                                                                            {{ $type->type }}
                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <!-- Date -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    Date
                                                                </label>

                                                                <input type="date"
                                                                       name="date"
                                                                       class="form-control"
                                                                       value="{{ $insight->date }}">
                                                            </div>
                                                        </div>

                                                        <!-- Title -->
                                                        <div class="col-md-12">
                                                            <div class="mb-3">

                                                                <label class="form-label">
                                                                    Title
                                                                </label>

                                                                <input type="text"
                                                                       name="title"
                                                                       class="form-control"
                                                                       value="{{ $insight->title }}"
                                                                       required>

                                                            </div>
                                                        </div>

                                                        <!-- Tag -->
                                                        <div class="col-md-12">
                                                            <div class="mb-3">

                                                                <label class="form-label">
                                                                    Tags
                                                                </label>

                                                                <input type="text"
                                                                       name="tag"
                                                                       class="form-control"
                                                                       data-role="tagsinput"
                                                                       value="{{ $insight->tag }}">

                                                            </div>
                                                        </div>

                                                        <!-- Management Board -->
                                                        <div class="col-md-12">

                                                            <div class="mb-3">

                                                                <label class="form-label">
                                                                    Management Board
                                                                </label>

                                                                <select name="multiple_management_board_id[]"
                                                                        class="form-control"
                                                                        multiple="multiple">

                                                                    @foreach($managements as $management)
                                                                        <option value="{{ $management->id }}"
                                                                            {{ in_array($management->id, $insight->multiple_management_board_id ?? []) ? 'selected' : '' }}>
                                                                            {{ $management->name }}
                                                                            ({{ $management->designation }})
                                                                        </option>
                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <!-- Cover Image -->
                                                        <div class="col-md-12">

                                                            <div class="mb-3">

                                                                <label class="form-label">
                                                                    Cover Image
                                                                </label>

                                                                <input type="file"
                                                                       name="cover_image"
                                                                       class="form-control">

                                                                @if($insight->cover_image)

                                                                    <img src="{{ asset('images/insight/'.$insight->cover_image) }}"
                                                                         class="img-thumbnail mt-2"
                                                                         style="width:120px;">

                                                                @endif

                                                            </div>

                                                        </div>

                                                        <!-- Remark -->
                                                        <div class="col-md-12">

                                                            <div class="mb-3">

                                                                <label class="form-label">
                                                                    Remark
                                                                </label>

                                                                <textarea
                                                                    id="summernoteEdit{{ $insight->id }}"
                                                                    name="remark">{{ $insight->remark }}</textarea>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">
                                                                PDF File
                                                            </label>

                                                            <input type="file"
                                                                   name="pdf_file"
                                                                   class="form-control"
                                                                   accept=".pdf">

                                                            @if($insight->pdf_file)
                                                                <a href="{{ asset('files/insight-pdf/'.$insight->pdf_file) }}"
                                                                   target="_blank"
                                                                   class="btn btn-sm btn-outline-danger mt-2">
                                                                    <i class="ri-file-pdf-line"></i> Current PDF
                                                                </a>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="text-end">

                                                        <button class="btn btn-primary">

                                                            <i class="ri-save-line"></i>

                                                            Update

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- Delete Modal -->
                                <div id="danger-header-modal{{ $insight->id }}"
                                     class="modal fade"
                                     tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="danger-header-modalLabel{{ $insight->id }}"
                                     aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header modal-colored-header bg-danger">
                                                <h4 class="modal-title" id="danger-header-modalLabel{{ $insight->id }}">
                                                    Delete Insight
                                                </h4>

                                                <button type="button"
                                                        class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <h5 class="mt-0">
                                                    Are you sure you want to delete this Insight?
                                                </h5>

                                                <p class="mb-0 text-muted">
                                                    <strong>{{ $insight->title }}</strong>
                                                </p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-light"
                                                        data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <a href="{{ route('insight.destroy', $insight->id) }}"
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

                        <div class="d-flex justify-content-end">
                            {{ $insights->links('pagination::bootstrap-5') }}
                        </div>

                    </div>

                </div>
            </div>




        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1"
         aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">
                        Add Insight
                    </h4>

                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('insight.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <!-- Type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Insight Type
                                </label>

                                <select name="type_id" class="form-select" required>
                                    <option value="">Select Type</option>

                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Date
                                </label>

                                <input type="date"
                                       name="date"
                                       class="form-control">
                            </div>

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

                            <!-- Tag -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Tag
                                </label>

                                <input type="text"
                                       name="tag"
                                       class="form-control"
                                       placeholder="AI, Research, Economy">
                            </div>

                            <!-- Cover Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Cover Image
                                </label>

                                <input type="file"
                                       name="cover_image"
                                       class="form-control"
                                       accept="image/*">
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Management Board
                                </label>

                                <select name="multiple_management_board_id[]"
                                        class="form-control"
                                        multiple="multiple">

                                    @foreach($managements as $management)
                                        <option value="{{ $management->id }}">
                                            {{ $management->name }}
                                            ({{ $management->designation }})
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- Remark -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Remark
                                    </label>

                                    <textarea id="summernote"
                                              name="remark"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    PDF File
                                </label>

                                <input type="file"
                                       name="pdf_file"
                                       class="form-control"
                                       accept=".pdf">

                                <small class="text-muted">
                                    Optional (PDF only)
                                </small>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">
                                <i class="ri-save-line"></i>
                                Save Insight
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


@endsection

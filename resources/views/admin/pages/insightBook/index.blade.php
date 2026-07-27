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
                                <li class="breadcrumb-item active">Insight Book</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Insight Book</h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            @can('insight-book-create')
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
                                <th>Insight</th>
                                <th>Chapter No</th>
                                <th>Title</th>
                                <th width="120">Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($books as $key=>$book)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($book->insight->title ?? 'N/A', 50) }}
                                    </td>

                                    <td>
                                        {{ $book->chapter_no ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($book->title ?? 'N/A', 30) }}
                                    </td>


                                    <td>

                                        <div class="d-flex justify-content-end gap-1">

                                            @can('insight-book-edit')
                                                <button
                                                    class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $book->id }}">
                                                    Edit
                                                </button>
                                            @endcan

                                            @can('insight-book-delete')
                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $book->id }}">
                                                    Delete
                                                </button>
                                            @endcan

                                        </div>

                                    </td>

                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade"
                                     id="editModal{{ $book->id }}"
                                     tabindex="-1"
                                     data-bs-backdrop="static">

                                    <div class="modal-dialog modal-xl modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h4 class="modal-title">
                                                    Edit Insight Book
                                                </h4>

                                                <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                <form method="POST"
                                                      action="{{ route('insight.book.update',$book->id) }}">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">

                                                        <div class="col-md-6 mb-3">

                                                            <label>Insight</label>

                                                            <select name="insight_id"
                                                                    class="form-select"
                                                                    required>

                                                                @foreach($insights as $insight)

                                                                    <option
                                                                        value="{{ $insight->id }}"
                                                                        {{ $book->insight_id==$insight->id ? 'selected':'' }}>

                                                                        {{ $insight->title }}

                                                                    </option>

                                                                @endforeach

                                                            </select>

                                                        </div>

                                                        <div class="col-md-6 mb-3">

                                                            <label>Chapter No</label>

                                                            <input type="number"
                                                                   name="chapter_no"
                                                                   class="form-control"
                                                                   value="{{ $book->chapter_no }}">

                                                        </div>

                                                        <div class="col-md-12 mb-3">

                                                            <label>Title</label>

                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="title"
                                                                   value="{{ $book->title }}"
                                                                   required>

                                                        </div>

                                                        <div class="col-md-12">

                                                            <label>Details</label>

                                                            <textarea
                                                                id="summernoteEdit{{ $book->id }}"
                                                                name="details">{{ $book->details }}</textarea>

                                                        </div>



                                                    </div>

                                                    <div class="text-end mt-3">

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
                                     id="deleteModal{{ $book->id }}"
                                     tabindex="-1">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header bg-danger text-white">

                                                <h5 class="modal-title">
                                                    Delete Insight Book
                                                </h5>

                                                <button type="button"
                                                        class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                Are you sure you want to delete
                                                <strong>{{ $book->title }}</strong>?

                                            </div>

                                            <div class="modal-footer">

                                                <button class="btn btn-light"
                                                        data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <a href="{{ route('insight.book.destroy',$book->id) }}"
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

        <div class="modal-dialog modal-xl modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">
                        Add Insight Book
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

                    <form action="{{ route('insight.book.store') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <!-- Insight -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Insight
                                </label>

                                <select name="insight_id"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        Select Insight
                                    </option>

                                    @foreach($insights as $insight)
                                        <option value="{{ $insight->id }}">
                                            {{ $insight->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- Chapter -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Chapter No
                                </label>

                                <input type="number"
                                       name="chapter_no"
                                       class="form-control"
                                       placeholder="Enter Chapter No">
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

                            <!-- Details -->
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Details
                                </label>

                                <textarea id="summernote"
                                          name="details"></textarea>

                            </div>


                        </div>

                        <div class="d-flex justify-content-end">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="ri-save-line"></i>
                                Save Insight Book

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection

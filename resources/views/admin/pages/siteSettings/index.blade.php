
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

                        <li class="breadcrumb-item">
                            Site Setting
                        </li>

                        <li class="breadcrumb-item active">
                            Site Setting
                        </li>

                    </ol>

                </div>


                <h4 class="page-title">
                    Site Setting
                </h4>

            </div>

        </div>

    </div>



    <div class="col-12">

        <div class="card">


            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('site-setting-create')

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
                        <th>Page</th>
                        <th>Title</th>
                        <th width="120">
                            Action
                        </th>

                    </tr>

                    </thead>



                    <tbody>


                    @foreach($siteSettings as $key=>$item)

                        <tr>

                            <td>
                                {{ $key+1 }}
                            </td>


                            <td>
                                {{ $item->page }}
                            </td>


                            <td>
                                {{ $item->title }}
                            </td>


                            <td>

                                <div class="d-flex justify-content-end gap-1">


                                    @can('site-setting-edit')

                                        <button class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">

                                            Edit

                                        </button>

                                    @endcan



                                    @can('site-setting-delete')

                                        <button class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id }}">

                                            Delete

                                        </button>

                                    @endcan


                                </div>


                            </td>


                        </tr>





                        {{-- Edit Modal --}}

                        <div class="modal fade"
                             id="editModal{{ $item->id }}"
                             data-bs-backdrop="static">


                            <div class="modal-dialog modal-lg modal-dialog-centered">


                                <div class="modal-content">


                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit Site Setting
                                        </h4>

                                        <button class="btn-close"
                                                data-bs-dismiss="modal"></button>

                                    </div>



                                    <div class="modal-body">


                                        <form action="{{ route('site.setting.update',$item->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')


                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Page
                                                </label>


                                                <select name="page"
                                                        class="form-select"
                                                        required>


                                                    @php

                                                        $pages = [
                                                            'Cookies',
                                                            'Terms of use',
                                                            'Privacy Policy',
                                                            'Accessibility',
                                                            'Financial Statements'
                                                        ];

                                                    @endphp



                                                    @foreach($pages as $page)

                                                        <option value="{{ $page }}"
                                                            {{ $item->page == $page ? 'selected':'' }}>

                                                            {{ $page }}

                                                        </option>

                                                    @endforeach


                                                </select>


                                            </div>



                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Title
                                                </label>


                                                <input type="text"
                                                       name="title"
                                                       class="form-control"
                                                       value="{{ $item->title }}"
                                                       required>

                                            </div>



                                            <div class="col-md-12">

                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        Details
                                                    </label>

                                                    <textarea id="summernoteEdit{{ $item->id }}"
                                                              name="details">{{ $item->details }}</textarea>

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





                        {{-- Delete Modal --}}

                        <div class="modal fade"
                             id="deleteModal{{ $item->id }}">


                            <div class="modal-dialog modal-dialog-centered">


                                <div class="modal-content">


                                    <div class="modal-header bg-danger">

                                        <h4 class="modal-title text-white">
                                            Delete
                                        </h4>


                                        <button class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>


                                    </div>


                                    <div class="modal-body">

                                        <h5>
                                            Are you sure you want to delete this page?
                                        </h5>

                                    </div>


                                    <div class="modal-footer">


                                        <button class="btn btn-light"
                                                data-bs-dismiss="modal">

                                            Close

                                        </button>


                                        <a href="{{ route('site.setting.destroy',$item->id) }}"
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





    {{-- Add Modal --}}


    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static">


        <div class="modal-dialog modal-lg modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Site Setting
                    </h4>


                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>


                </div>



                <div class="modal-body">


                    <form action="{{ route('site.setting.store') }}"
                          method="POST">


                        @csrf


                        <div class="mb-3">

                            <label class="form-label">
                                Page
                            </label>


                            <select name="page"
                                    class="form-select"
                                    required>


                                <option value="">
                                    Select Page
                                </option>


                                <option value="Cookies">
                                    Cookies
                                </option>

                                <option value="Terms of use">
                                    Terms of use
                                </option>

                                <option value="Privacy Policy">
                                    Privacy Policy
                                </option>

                                <option value="Accessibility">
                                    Accessibility
                                </option>

                                <option value="Financial Statements">
                                    Financial Statements
                                </option>


                            </select>


                        </div>



                        <div class="mb-3">

                            <label class="form-label">
                                Title
                            </label>


                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   placeholder="Enter title"
                                   required>

                        </div>



                        <div class="col-md-12">

                            <div class="mb-3">

                                <label class="form-label">
                                    Details
                                </label>

                                <textarea id="summernote"
                                          name="details"></textarea>

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

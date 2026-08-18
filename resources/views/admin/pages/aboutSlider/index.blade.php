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

                        <li class="breadcrumb-item active">
                            About Slider
                        </li>

                    </ol>

                </div>


                <h4 class="page-title">
                    About Slider
                </h4>

            </div>

        </div>

    </div>



    <div class="col-12">

        <div class="card">


            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('about-slider-create')

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
                        <th>Title</th>

                        <th width="120">
                            Action
                        </th>

                    </tr>

                    </thead>


                    <tbody>


                    @foreach($aboutSliders as $key => $item)

                        <tr>

                            <td>
                                {{ $key + 1 }}
                            </td>


                            <td>

                                @if($item->image)

                                    <img src="{{ asset('images/about-slider/' . $item->image) }}"
                                         width="100"
                                         height="70"
                                         class="rounded object-fit-cover">

                                @endif

                            </td>


                            <td>
                                {{ $item->title }}
                            </td>



                            <td>

                                <div class="d-flex justify-content-end gap-1">


                                    @can('about-slider-edit')

                                        <button class="btn btn-info btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModalId{{ $item->id }}">

                                            Edit

                                        </button>

                                    @endcan



                                    @can('about-slider-delete')

                                        <button class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModalId{{ $item->id }}">

                                            Delete

                                        </button>

                                    @endcan


                                </div>

                            </td>

                        </tr>



                        {{-- Edit Modal --}}

                        <div class="modal fade"
                             id="editModalId{{ $item->id }}"
                             data-bs-backdrop="static"
                             tabindex="-1">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">


                                    <div class="modal-header">

                                        <h4 class="modal-title">
                                            Edit About Slider
                                        </h4>


                                        <button class="btn-close"
                                                data-bs-dismiss="modal">
                                        </button>

                                    </div>



                                    <div class="modal-body">

                                        <form action="{{ route('about.slider.update', $item->id) }}"
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
                                                           value="{{ $item->title }}"
                                                           required>

                                                </div>



                                                <div class="col-md-12 mb-3">

                                                    <label class="form-label">
                                                        Image
                                                    </label>


                                                    <input type="file"
                                                           name="image"
                                                           class="form-control">


                                                    @if($item->image)

                                                        <img src="{{ asset('images/about-slider/' . $item->image) }}"
                                                             width="150"
                                                             class="mt-2 rounded">

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



                        {{-- Delete Modal --}}

                        <div class="modal fade"
                             id="deleteModalId{{ $item->id }}"
                             tabindex="-1">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">


                                    <div class="modal-header modal-colored-header bg-danger">

                                        <h4 class="modal-title">
                                            Delete
                                        </h4>


                                        <button class="btn-close btn-close-white"
                                                data-bs-dismiss="modal">
                                        </button>

                                    </div>



                                    <div class="modal-body">

                                        <h5>
                                            Are you sure you want to delete this About Slider?
                                        </h5>

                                    </div>



                                    <div class="modal-footer">

                                        <button class="btn btn-light"
                                                data-bs-dismiss="modal">

                                            Close

                                        </button>


                                        <a href="{{ route('about.slider.destroy', $item->id) }}"
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
         data-bs-backdrop="static"
         tabindex="-1">


        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title">
                        Add About Slider
                    </h4>


                    <button class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>



                <div class="modal-body">

                    <form action="{{ route('about.slider.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf


                        <div class="row">


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



                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Image
                                </label>


                                <input type="file"
                                       name="image"
                                       class="form-control"
                                       required>

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

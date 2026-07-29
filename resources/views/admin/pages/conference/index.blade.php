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
                            Conference
                        </li>

                    </ol>

                </div>


                <h4 class="page-title">
                    Conference
                </h4>


            </div>

        </div>

    </div>



    <div class="row">

        <div class="col-12">


            <div class="card">


                <div class="card-header">

                    <div class="d-flex justify-content-end">

                        @can('conference-create')

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

                            <th>Category</th>

                            <th>Sub Category</th>

                            <th>Title</th>

                            <th>Date</th>

                            <th>Status</th>

                            <th width="120">
                                Action
                            </th>

                        </tr>

                        </thead>



                        <tbody>


                        @foreach($conferences as $key=>$conference)


                            <tr>


                                <td>
                                    {{ $key+1 }}
                                </td>


                                <td>

                                    {{ $conference->exploreVision->name ?? 'N/A' }}

                                </td>



                                <td>

                                    {{ $conference->category->name ?? 'N/A' }}

                                </td>



                                <td>

                                    {{ $conference->subCategory->name ?? 'N/A' }}

                                </td>



                                <td>

                                    {{ $conference->title }}

                                </td>



                                <td>

                                    @if($conference->date)

                                        {{ \Carbon\Carbon::parse($conference->date)->format('d F Y') }}

                                    @else

                                        N/A

                                    @endif

                                </td>



                                <td>

                            <span class="badge bg-success">
                                Active
                            </span>

                                </td>



                                <td>


                                    <div class="d-flex justify-content-end gap-1">


                                        @can('conference-edit')

                                            <button class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editNewModalId{{ $conference->id }}">
                                                Edit
                                            </button>

                                        @endcan



                                        @can('conference-delete')

                                                <button class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#danger-header-modal{{ $conference->id }}">
                                                    Delete
                                                </button>

                                        @endcan


                                    </div>


                                </td>



                            </tr>

                            <!-- ================= Edit Modal ================= -->

                            <div class="modal fade"
                                 id="editNewModalId{{ $conference->id }}"
                                 data-bs-backdrop="static"
                                 tabindex="-1">


                                <div class="modal-dialog modal-xl modal-dialog-centered">


                                    <div class="modal-content">


                                        <div class="modal-header">

                                            <h4 class="modal-title">
                                                Edit Conference
                                            </h4>


                                            <button class="btn-close"
                                                    data-bs-dismiss="modal">
                                            </button>

                                        </div>



                                        <div class="modal-body">


                                            <form action="{{ route('conference.update',$conference->id) }}"
                                                  method="POST"
                                                  enctype="multipart/form-data">


                                                @csrf
                                                @method('PUT')


                                                <div class="row">


                                                    <!-- Explore Vision -->

                                                    <div class="col-md-4 mb-3">

                                                        <label class="form-label">
                                                            Explore Vision
                                                        </label>


                                                        <select name="explore_vision_id"
                                                                class="form-select"
                                                                required>


                                                            @foreach($exploreVisions as $vision)

                                                                <option value="{{ $vision->id }}"
                                                                    {{ $conference->explore_vision_id == $vision->id ? 'selected':'' }}>

                                                                    {{ $vision->name }}

                                                                </option>

                                                            @endforeach


                                                        </select>

                                                    </div>




                                                    <!-- Category -->

                                                    <div class="col-md-4 mb-3">

                                                        <label class="form-label">
                                                            Category
                                                        </label>


                                                        <select name="conference_category_id"
                                                                class="form-select"
                                                                required>


                                                            @foreach(\App\Models\ConferenceCategory::where('explore_vision_id',$conference->explore_vision_id)->get() as $category)


                                                                <option value="{{ $category->id }}"
                                                                    {{ $conference->conference_category_id == $category->id ? 'selected':'' }}>

                                                                    {{ $category->name }}

                                                                </option>


                                                            @endforeach


                                                        </select>


                                                    </div>






                                                    <!-- Sub Category -->

                                                    <div class="col-md-4 mb-3">


                                                        <label class="form-label">
                                                            Sub Category
                                                        </label>


                                                        <select name="conference_sub_category_id"
                                                                class="form-select"
                                                                required>


                                                            @foreach(\App\Models\ConferenceSubCategory::where('conference_category_id',$conference->conference_category_id)->get() as $sub)


                                                                <option value="{{ $sub->id }}"
                                                                    {{ $conference->conference_sub_category_id == $sub->id ? 'selected':'' }}>


                                                                    {{ $sub->name }}


                                                                </option>


                                                            @endforeach


                                                        </select>


                                                    </div>







                                                    <!-- Title -->

                                                    <div class="col-md-12 mb-3">


                                                        <label class="form-label">
                                                            Title
                                                        </label>


                                                        <input type="text"
                                                               name="title"
                                                               value="{{ $conference->title }}"
                                                               class="form-control"
                                                               required>


                                                    </div>






                                                    <!-- Tag -->

                                                    <div class="col-md-6 mb-3">


                                                        <label class="form-label">
                                                            Tag
                                                        </label>


                                                        <input type="text"
                                                               name="tag"
                                                               value="{{ $conference->tag }}"
                                                               class="form-control">


                                                    </div>






                                                    <!-- Date -->

                                                    <div class="col-md-6 mb-3">


                                                        <label class="form-label">
                                                            Date
                                                        </label>


                                                        <input type="date"
                                                               name="date"
                                                               value="{{ $conference->date }}"
                                                               class="form-control">


                                                    </div>






                                                    <!-- Start Time -->

                                                    <div class="col-md-6 mb-3">


                                                        <label class="form-label">
                                                            Start Time
                                                        </label>


                                                        <input type="time"
                                                               name="start_time"
                                                               value="{{ $conference->start_time }}"
                                                               class="form-control">


                                                    </div>






                                                    <!-- End Time -->

                                                    <div class="col-md-6 mb-3">


                                                        <label class="form-label">
                                                            End Time
                                                        </label>


                                                        <input type="time"
                                                               name="end_time"
                                                               value="{{ $conference->end_time }}"
                                                               class="form-control">


                                                    </div>







                                                    <!-- Image -->

                                                    <div class="col-md-12 mb-3">


                                                        <label class="form-label">
                                                            Cover Image
                                                        </label>


                                                        <input type="file"
                                                               name="cover_image"
                                                               class="form-control">



                                                        @if($conference->cover_image)

                                                            <img src="{{ asset('images/conference/'.$conference->cover_image) }}"
                                                                 width="100"
                                                                 class="mt-2">

                                                        @endif


                                                    </div>







                                                    <!-- Video -->

                                                    <div class="col-md-12 mb-3">


                                                        <label class="form-label">
                                                            Video Link
                                                        </label>


                                                        <input type="text"
                                                               name="videos_link"
                                                               value="{{ $conference->videos_link }}"
                                                               class="form-control">


                                                    </div>







                                                    <!-- Details -->

                                                    <div class="col-md-12 mb-3">


                                                        <label class="form-label">
                                                            Details
                                                        </label>


                                                        <textarea name="details"
                                                                  class="form-control"
                                                                  rows="5">{{ $conference->details }}</textarea>


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
                                 id="danger-header-modal{{ $conference->id }}"
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

                                            <a href="{{ route('conference.destroy',$conference->id) }}"
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

    <!-- ================= Add Modal ================= -->

    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static"
         tabindex="-1">


        <div class="modal-dialog modal-xl modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Conference
                    </h4>


                    <button class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>



                <div class="modal-body">


                    <form action="{{ route('conference.store') }}"
                          method="POST"
                          enctype="multipart/form-data">


                        @csrf



                        <div class="row">



                            <!-- Explore Vision -->

                            <div class="col-md-4 mb-3">


                                <label class="form-label">
                                    Explore Vision
                                </label>


                                <select name="explore_vision_id"
                                        id="exploreVision"
                                        class="form-select"
                                        required>


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





                            <!-- Category -->

                            <div class="col-md-4 mb-3">


                                <label class="form-label">
                                    Conference Category
                                </label>


                                <select name="conference_category_id"
                                        id="category"
                                        class="form-select"
                                        required>


                                    <option value="">
                                        Select Category
                                    </option>


                                </select>


                            </div>





                            <!-- Sub Category -->

                            <div class="col-md-4 mb-3">


                                <label class="form-label">
                                    Conference Sub Category
                                </label>


                                <select name="conference_sub_category_id"
                                        id="subCategory"
                                        class="form-select"
                                        required>


                                    <option value="">
                                        Select Sub Category
                                    </option>


                                </select>


                            </div>






                            <!-- Title -->

                            <div class="col-md-12 mb-3">


                                <label class="form-label">
                                    Title
                                </label>


                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Enter Conference Title"
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
                                       placeholder="Enter Tag">


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







                            <!-- Start Time -->

                            <div class="col-md-6 mb-3">


                                <label class="form-label">
                                    Start Time
                                </label>


                                <input type="time"
                                       name="start_time"
                                       class="form-control">


                            </div>






                            <!-- End Time -->

                            <div class="col-md-6 mb-3">


                                <label class="form-label">
                                    End Time
                                </label>


                                <input type="time"
                                       name="end_time"
                                       class="form-control">


                            </div>







                            <!-- Cover Image -->

                            <div class="col-md-12 mb-3">


                                <label class="form-label">
                                    Cover Image
                                </label>


                                <input type="file"
                                       name="cover_image"
                                       class="form-control">


                            </div>






                            <!-- Video Link -->

                            <div class="col-md-12 mb-3">


                                <label class="form-label">
                                    Video Link
                                </label>


                                <input type="text"
                                       name="videos_link"
                                       class="form-control"
                                       placeholder="Youtube / Video URL">


                            </div>







                            <!-- Details -->

                            <div class="col-md-12 mb-3">


                                <label class="form-label">
                                    Details
                                </label>


                                <textarea name="details"
                                          class="form-control"
                                          rows="5"></textarea>


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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>

        $(document).ready(function(){


            // Explore Vision Change

            $('#exploreVision').on('change', function(){


                let visionId = $(this).val();


                $('#category').html(
                    '<option value="">Select Category</option>'
                );


                $('#subCategory').html(
                    '<option value="">Select Sub Category</option>'
                );



                if(visionId){


                    $.ajax({

                        url: "{{ url('/conference-category') }}/" + visionId,

                        type: "GET",


                        success:function(data){


                            $.each(data,function(key,value){


                                $('#category').append(

                                    `<option value="${value.id}">
                                ${value.name}
                            </option>`

                                );


                            });


                        }


                    });


                }



            });





            // Category Change


            $('#category').on('change', function(){


                let categoryId = $(this).val();



                $('#subCategory').html(

                    '<option value="">Select Sub Category</option>'

                );



                if(categoryId){


                    $.ajax({


                        url: "{{ url('/conference-sub-category') }}/" + categoryId,


                        type:"GET",


                        success:function(data){


                            $.each(data,function(key,value){


                                $('#subCategory').append(

                                    `<option value="${value.id}">
                                ${value.name}
                            </option>`

                                );


                            });


                        }



                    });


                }



            });



        });

    </script>

@endsection

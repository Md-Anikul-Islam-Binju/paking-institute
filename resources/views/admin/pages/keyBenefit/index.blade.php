@extends('admin.app')
@section('admin_content')
    <style>
        .dropzoneWrapperEdit{
            border:2px dashed #d9d9d9;
            border-radius:10px;
            /*padding:30px;*/
            text-align:center;
            cursor:pointer;
            transition:.3s;
            background:#fafafa;
        }

        .dropzoneWrapperEdit:hover{
            border-color:#0d6efd;
            background:#f8fbff;
        }

        .image-preview{
            position:relative;
            display:inline-block;
            margin:10px;
        }

        .img-preview{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:8px;
            border:1px solid #ddd;
        }

        .remove-preview{
            position:absolute;
            top:5px;
            right:5px;
            width:22px;
            height:22px;
            background:#dc3545;
            color:#fff;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            font-size:14px;
        }
    </style>
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
                                <li class="breadcrumb-item active">Key Benefit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Key Benefit</h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            @can('key-benefit-create')
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
                                <th>Involved</th>
                                <th>Title</th>
                                <th>Video</th>
                                <th>Details</th>
                                <th>Gallery</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($keyBenefits as $key=>$benefit)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>
                                        @if($benefit->image)
                                            <img src="{{ asset('images/key-benefit/'.$benefit->image) }}"
                                                 class="img-thumbnail"
                                                 style="width:60px;height:60px;object-fit:cover;">
                                        @else
                                            <span class="badge bg-secondary">N/A</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $benefit->involved->title ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($benefit->title,40) }}
                                    </td>

                                    <td>
                                        @if($benefit->videos)
                                            <a href="{{ $benefit->videos }}"
                                               target="_blank"
                                               class="btn btn-sm btn-danger">
                                                Video
                                            </a>
                                        @else
                                            <span class="badge bg-secondary">
                                    N/A
                                </span>
                                        @endif
                                    </td>

                                    <td>
                                        {!! $benefit->details
                                            ? \Illuminate\Support\Str::limit(strip_tags($benefit->details),50)
                                            : 'N/A' !!}
                                    </td>

                                    <td>
                                        @if(!empty($benefit->multiple_image))
                                            @foreach($benefit->multiple_image as $img)
                                                <img src="{{ asset('images/key-benefit/multiple/'.$img) }}"
                                                     class="img-thumbnail me-1 mb-1"
                                                     style="width:45px;height:45px;object-fit:cover;">
                                            @endforeach
                                        @else
                                            <span class="badge bg-secondary">N/A</span>
                                        @endif
                                    </td>

                                    <td style="width:120px">

                                        <div class="d-flex justify-content-end gap-1">

                                            @can('key-benefit-edit')
                                                <button class="btn btn-info btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $benefit->id }}">
                                                    Edit
                                                </button>
                                            @endcan

                                            @can('key-benefit-delete')
                                                <button class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $benefit->id }}">
                                                    Delete
                                                </button>
                                            @endcan

                                        </div>

                                    </td>

                                </tr>

                                {{-- ================= Edit Modal ================= --}}

                                <div class="modal fade"
                                     id="editModal{{ $benefit->id }}"
                                     data-bs-backdrop="static">

                                    <div class="modal-dialog modal-lg modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4>Edit Key Benefit</h4>

                                                <button class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <form method="POST"
                                                      action="{{ route('key.benefit.update',$benefit->id) }}"
                                                      enctype="multipart/form-data">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">

                                                        <div class="col-md-6 mb-3">
                                                            <label>Involved</label>

                                                            <select class="form-select"
                                                                    name="involved_id">

                                                                @foreach($involveds as $item)

                                                                    <option value="{{ $item->id }}"
                                                                        {{ $benefit->involved_id==$item->id?'selected':'' }}>

                                                                        {{ $item->title }}

                                                                    </option>

                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label>Title</label>

                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="title"
                                                                   value="{{ $benefit->title }}">
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label>Video Link</label>

                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="videos"
                                                                   value="{{ $benefit->videos }}">
                                                        </div>

                                                        <div class="col-md-6 mb-3">

                                                            <label>Image</label>

                                                            <input type="file"
                                                                   class="form-control"
                                                                   name="image">

                                                            @if($benefit->image)

                                                                <img src="{{ asset('images/key-benefit/'.$benefit->image) }}"
                                                                     class="mt-2"
                                                                     style="width:60px">

                                                            @endif

                                                        </div>

                                                        <div class="col-md-12">

                                                            <label>Details</label>

                                                            <textarea
                                                                id="summernoteEdit{{ $benefit->id }}"
                                                                name="details">{{ $benefit->details }}</textarea>

                                                        </div>


                                                        <div class="col-md-12 mb-3">

                                                            <label class="form-label fw-bold">
                                                                Gallery Images
                                                            </label>

                                                            <div id="dropzoneWrapperBenefit{{ $benefit->id }}"
                                                                 class="dropzoneWrapperEdit">

                                                                <i class="ri-upload-cloud-2-line text-muted"
                                                                   style="font-size:50px"></i>

                                                                <h5 class="mt-2">
                                                                    Drag & Drop Images Here
                                                                </h5>

                                                                <small class="text-muted">
                                                                    or click to browse
                                                                </small>

                                                                <input
                                                                    type="file"
                                                                    id="image-input-benefit{{ $benefit->id }}"
                                                                    name="multiple_image[]"
                                                                    multiple
                                                                    accept="image/*"
                                                                    style="position:absolute;left:-9999px;">

                                                            </div>

                                                            <input
                                                                type="hidden"
                                                                name="deleted_images"
                                                                id="deleted-images-benefit{{ $benefit->id }}"
                                                                value="[]">

                                                            <div id="image-preview-container-benefit{{ $benefit->id }}"
                                                                 class="mt-3 d-flex flex-wrap gap-2">

                                                                @if(!empty($benefit->multiple_image))

                                                                    @foreach($benefit->multiple_image as $image)

                                                                        <div class="image-preview">

                                                                            <img src="{{ asset('images/key-benefit/multiple/'.$image) }}"
                                                                                 class="img-preview">

                                                                            <span class="remove-preview"
                                                                                  data-filename="{{ $image }}">
                                                                                <i class="ri-close-line"></i>
                                                                            </span>

                                                                        </div>

                                                                    @endforeach

                                                                @endif

                                                            </div>

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

                                {{-- ================= Delete Modal ================= --}}

                                <div class="modal fade"
                                     id="deleteModal{{ $benefit->id }}">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header bg-danger text-white">

                                                <h5>Delete</h5>

                                                <button class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"></button>

                                            </div>

                                            <div class="modal-body">

                                                Are you sure want to delete this?

                                            </div>

                                            <div class="modal-footer">

                                                <button class="btn btn-light"
                                                        data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <a href="{{ route('key.benefit.destroy',$benefit->id) }}"
                                                   class="btn btn-danger">

                                                    Delete

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <script>

                                    document.addEventListener('DOMContentLoaded',function(){

                                        const wrapper=document.getElementById('dropzoneWrapperBenefit{{ $benefit->id }}');
                                        const input=document.getElementById('image-input-benefit{{ $benefit->id }}');
                                        const preview=document.getElementById('image-preview-container-benefit{{ $benefit->id }}');
                                        const deleted=document.getElementById('deleted-images-benefit{{ $benefit->id }}');

                                        if(wrapper){

                                            wrapper.onclick=()=>input.click();

                                            wrapper.ondragover=function(e){
                                                e.preventDefault();
                                                wrapper.style.borderColor='#0d6efd';
                                            }

                                            wrapper.ondragleave=function(){
                                                wrapper.style.borderColor='#ddd';
                                            }

                                            wrapper.ondrop=function(e){

                                                e.preventDefault();

                                                wrapper.style.borderColor='#ddd';

                                                input.files=e.dataTransfer.files;

                                                previewImages(e.dataTransfer.files);

                                            }

                                            input.onchange=function(){

                                                previewImages(this.files);

                                            }

                                            function previewImages(files){

                                                Array.from(files).forEach(function(file){

                                                    if(!file.type.match('image.*')) return;

                                                    const reader=new FileReader();

                                                    reader.onload=function(e){

                                                        preview.insertAdjacentHTML('beforeend',`

                        <div class="image-preview">

                            <img src="${e.target.result}" class="img-preview">

                            <span class="remove-preview">

                                <i class="ri-close-line"></i>

                            </span>

                        </div>

                    `);

                                                    };

                                                    reader.readAsDataURL(file);

                                                });

                                            }

                                            preview.onclick=function(e){

                                                const btn=e.target.closest('.remove-preview');

                                                if(!btn) return;

                                                const filename=btn.dataset.filename;

                                                if(filename){

                                                    let arr=JSON.parse(deleted.value);

                                                    arr.push(filename);

                                                    deleted.value=JSON.stringify(arr);

                                                }

                                                btn.parentElement.remove();

                                            }

                                        }

                                    });

                                </script>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- ================= Add Modal ================= --}}

    <div class="modal fade"
         id="addNewModalId"
         data-bs-backdrop="static">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4>Add Key Benefit</h4>

                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form action="{{ route('key.benefit.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>Involved</label>

                                <select class="form-select"
                                        name="involved_id"
                                        required>

                                    <option value="">Select</option>

                                    @foreach($involveds as $item)

                                        <option value="{{ $item->id }}">
                                            {{ $item->title }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Title</label>

                                <input type="text"
                                       class="form-control"
                                       name="title"
                                       required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Video Link</label>

                                <input type="text"
                                       class="form-control"
                                       name="videos">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Image</label>

                                <input type="file"
                                       class="form-control"
                                       name="image">

                            </div>

                            <div class="col-md-12">

                                <label>Details</label>

                                <textarea id="summernote"
                                          name="details"></textarea>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label class="form-label fw-bold">
                                    Gallery Images
                                </label>

                                <div id="dropzoneWrapperBenefit" class="dropzoneWrapperEdit">

                                    <i class="ri-upload-cloud-2-line text-muted"
                                       style="font-size:50px"></i>

                                    <h5 class="mt-2">
                                        Drag & Drop Images Here
                                    </h5>

                                    <small class="text-muted">
                                        or click to browse
                                    </small>

                                    <input
                                        type="file"
                                        id="image-input-benefit"
                                        name="multiple_image[]"
                                        multiple
                                        accept="image/*"
                                        style="position:absolute;left:-9999px;">

                                </div>

                                <div id="image-preview-container-benefit"
                                     class="mt-3 d-flex flex-wrap gap-2">

                                </div>

                            </div>


                        </div>

                        <div class="text-end mt-3">

                            <button class="btn btn-primary">

                                Submit

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <script>

        document.addEventListener('DOMContentLoaded',function(){

            const wrapper=document.getElementById('dropzoneWrapperBenefit');
            const input=document.getElementById('image-input-benefit');
            const preview=document.getElementById('image-preview-container-benefit');

            if(wrapper){

                wrapper.onclick=()=>input.click();

                wrapper.ondragover=function(e){
                    e.preventDefault();
                    wrapper.style.borderColor='#0d6efd';
                }

                wrapper.ondragleave=function(){
                    wrapper.style.borderColor='#ddd';
                }

                wrapper.ondrop=function(e){

                    e.preventDefault();

                    wrapper.style.borderColor='#ddd';

                    input.files=e.dataTransfer.files;

                    previewImages(e.dataTransfer.files);

                }

                input.onchange=function(){

                    preview.innerHTML='';

                    previewImages(this.files);

                }

                function previewImages(files){

                    Array.from(files).forEach(function(file){

                        if(!file.type.match('image.*')) return;

                        const reader=new FileReader();

                        reader.onload=function(e){

                            preview.insertAdjacentHTML('beforeend',`

                        <div class="image-preview">

                            <img src="${e.target.result}" class="img-preview">

                            <span class="remove-preview">
                                <i class="ri-close-line"></i>
                            </span>

                        </div>

                    `);

                        };

                        reader.readAsDataURL(file);

                    });

                }

                preview.onclick=function(e){

                    const btn=e.target.closest('.remove-preview');

                    if(btn){

                        btn.parentElement.remove();

                    }

                }

            }

        });

    </script>
@endsection

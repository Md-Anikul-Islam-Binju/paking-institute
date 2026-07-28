@extends('admin.app')

@section('admin_content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">How We Work</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('how.work.createOrUpdate', $howWork->id ?? '') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <!-- Title -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title', $howWork->title ?? '') }}">
                    </div>

                    <!-- Main Details (Summernote) -->
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Details</label>
                        <textarea id="summernote"
                                  name="details">{{ old('details', $howWork->details ?? '') }}</textarea>
                    </div>

                </div>

                <hr>

                <h5 class="mb-3">Strategy</h5>

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Strategy Logo</label>
                        <input type="file"
                               name="strategy_logo"
                               class="form-control">

                        @if(!empty($howWork->strategy_logo))
                            <img src="{{ asset('images/how-work/'.$howWork->strategy_logo) }}"
                                 class="img-thumbnail mt-2"
                                 width="80">
                        @endif
                    </div>

                    <div class="col-md-9 mb-3">
                        <label class="form-label">Strategy Details</label>
                        <input type="text"
                               name="strategy_details"
                               class="form-control"
                               value="{{ old('strategy_details', $howWork->strategy_details ?? '') }}"
                               placeholder="Enter Strategy Details">
                    </div>

                </div>

                <hr>

                <h5 class="mb-3">Policy</h5>

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Policy Logo</label>
                        <input type="file"
                               name="policy_logo"
                               class="form-control">

                        @if(!empty($howWork->policy_logo))
                            <img src="{{ asset('images/how-work/'.$howWork->policy_logo) }}"
                                 class="img-thumbnail mt-2"
                                 width="80">
                        @endif
                    </div>

                    <div class="col-md-9 mb-3">
                        <label class="form-label">Policy Details</label>
                        <input type="text"
                               name="policy_details"
                               class="form-control"
                               value="{{ old('policy_details', $howWork->policy_details ?? '') }}"
                               placeholder="Enter Policy Details">
                    </div>

                </div>

                <hr>

                <h5 class="mb-3">Delivery</h5>

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Delivery Logo</label>
                        <input type="file"
                               name="delivery_logo"
                               class="form-control">

                        @if(!empty($howWork->delivery_logo))
                            <img src="{{ asset('images/how-work/'.$howWork->delivery_logo) }}"
                                 class="img-thumbnail mt-2"
                                 width="80">
                        @endif
                    </div>

                    <div class="col-md-9 mb-3">
                        <label class="form-label">Delivery Details</label>
                        <input type="text"
                               name="delivery_details"
                               class="form-control"
                               value="{{ old('delivery_details', $howWork->delivery_details ?? '') }}"
                               placeholder="Enter Delivery Details">
                    </div>

                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection

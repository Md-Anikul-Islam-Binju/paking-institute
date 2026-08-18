@extends('frontend.layout')
@section('content')
<!-- Hero Profile Section -->
<section class="container text-center mb-5 pb-4 mt-5">
    <!-- Title -->
    <h1 class="display-3 mb-4" style="font-family: 'Times New Roman', serif;">  {{ $expertDetail->name }}</h1>

    <!-- Profile Image -->
    <div class="mx-auto mb-4" style="max-width: 380px;">
        <img src="{{ asset('images/management/'.$expertDetail->image) }}"
             alt="Sanna Marin Profile"
             class="img-fluid w-100 object-fit-cover"
             style="aspect-ratio: 3/4;">
    </div>

    <!-- Subtitle -->
    <p class="text-uppercase fw-semibold tracking-wider small text-secondary mb-4">
        {{ $expertDetail->designation }}
    </p>

    <!-- Biography Button -->
    <!-- Biography Button -->
    <button type="button"
            class="btn btn-dark rounded-pill px-4 py-2 text-uppercase fw-semibold tracking-wider small"
            data-bs-toggle="modal"
            data-bs-target="#bioneModal">
        Biography
        <i class="bi bi-arrow-right ms-2"></i>
    </button>
</section>
<!-- Biography Fullscreen Modal -->
<div class="modal fade"
     id="bioneModal"
     tabindex="-1"
     aria-labelledby="bioneModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-fullscreen">

        <div class="modal-content bg-black text-white position-relative">

            <!-- Close Button -->
            <div class="position-absolute top-0 end-0 p-4" style="z-index: 10;">
                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>


            <!-- Modal Content -->
            <div class="modal-body d-flex align-items-center justify-content-center p-3 p-md-5">

                <div class="container" style="max-width: 1100px;">

                    <div class="row align-items-center gy-5">


                        <!-- Left: Profile Image -->
                        <div class="col-md-5 text-center">

                            <img src="{{ asset('images/management/' . $expertDetail->image) }}"
                                 alt="{{ $expertDetail->name }}"
                                 class="img-fluid w-100 object-fit-cover"
                                 style="max-width: 380px; aspect-ratio: 4/5;">

                        </div>


                        <!-- Right: Biography -->
                        <div class="col-md-7 ps-md-5">

                            <!-- Name -->
                            <h1 id="bioneModalLabel"
                                class="display-3 fw-normal mb-1"
                                style="font-family: 'Times New Roman', serif;">
                                {{ $expertDetail->name }}
                            </h1>


                            <!-- Designation -->
                            <p class="text-uppercase fw-semibold tracking-wider text-white-50 small mb-4">
                                {{ $expertDetail->designation }}
                            </p>


                            <!-- Biography -->
                            <div class="pe-3"
                                 style="max-height: 380px; overflow-y: auto;">

                                {!! $expertDetail->details !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Section Divider -->
<div class="container mb-4">
    <hr class="border-secondary opacity-25 m-0">
</div>

@if($expertDetail->insight_count)
<!-- Insights & Articles Section -->
<section class="container py-3">
    <!-- Section Label -->
    <p class="text-uppercase fw-semibold tracking-wider small text-secondary mb-4">
        INSIGHTS BY {{ $expertDetail->name }} ({{ $expertDetail->insight_count }})
    </p>

    <div class="row">
        @foreach($expertDetail->insights as $insight)
       <a class="text-decoration-none" href="{{route('insight.details',$insight->slug)}}">
           <div class="col-md-5 col-lg-4">
               <!-- Customized Article Card -->

               <div class="card border-0 rounded-0 bg-transparent">
                   <img src="{{ asset('images/insight/'.$insight->cover_image) }}"
                        class="card-img-top rounded-0"
                        alt="Referendum Voting">
                   <div class="card-body px-0 pt-3">
                       <!-- Category Tag -->
                       <p class="card-text small text-uppercase fw-semibold text-secondary mb-2">
                           <span class="text-warning me-1">●</span>  {{ $insight->type->type ?? 'N/A' }}
                       </p>
                       <!-- Article Title -->
                       <h3 class="card-title h4 font-serif fw-normal mb-3" style="font-family: 'Times New Roman', serif;">
                           <a href="#" class="text-dark text-decoration-none">
                               {{ $insight->title }}
                           </a>
                       </h3>
                       <!-- Date -->
                       <p class="card-text small text-muted text-uppercase">
                           {{ $insight->date ? \Carbon\Carbon::parse($insight->date)->format('d M Y') : 'N/A' }}
                       </p>
                   </div>
               </div>

           </div>
       </a>
        @endforeach
    </div>

    <!-- End of List Indicator -->
    <div class="text-center mt-5 pt-5 mb-5">
            <span class="text-uppercase fw-semibold tracking-wider small text-secondary">
                END OF LIST
            </span>
    </div>
</section>
@endif
@endsection

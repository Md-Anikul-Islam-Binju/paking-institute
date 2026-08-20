@extends('frontend.layout')
@section('content')


    <!-- conference -->
    <section class="vision-section py-5 text-bg-light"  data-header-theme="light">
        <br>
        <div class="container ">
            <div class="mt-5">
                <small class="text-uppercase text-secondary fw-semibold">conference</small>
                <h1 class="display-1 fw-bold mt-3 mb-5">
                    Future of
                    <span class="d-inline-block border border-2 border-dark rounded-pill px-4 py-2">
                        Britain
                    </span>
                    <span class="d-inline-z bg-powderblue border border-2 border-dark rounded-pill px-4 py-2">
                        2024
                    </span>
                </h1>
                <p class="lead w-75">
                    On 9 July 2024, the Future of Britain Conference – hosted by the Tony Blair Institute for Global Change and My Life My Say – explored governing in the age of AI.</p>
            </div>

        </div>
    </section>


    <section class="d-flex align-items-center py-5" style="background-color: #b5d8d3;">
        <div class="container py-lg-5">

            <div class="row g-5 align-items-start">

                <!-- Left Title -->
                <div class="col-12 col-md-5 col-lg-4">
                    <h2 class="display-3 fw-normal text-black"
                        style="font-family: Georgia, serif;">
                        Explore
                    </h2>
                </div>

                <!-- Dynamic Category List -->
                <div class="col-12 col-md-7 col-lg-8">

                    <div class="list-group list-group-flush bg-transparent">

                        @forelse($vision->categories as $category)

                            <a href="#{{ $category->slug }}"
                               class="list-group-item bg-transparent text-black border-0 border-bottom border-dark py-4 px-0 d-flex justify-content-start align-items-center gap-3 text-decoration-none">

                            <span class="fs-2 fw-normal"
                                  style="font-family: Georgia, serif;">
                                {{ $category->name }}
                            </span>

                                <i class="bi bi-arrow-right-circle-fill fs-3"></i>

                            </a>

                        @empty

                            <p class="text-muted">
                                No categories available.
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>
    </section>



    @forelse($vision->categories as $category)

        <!-- CATEGORY SECTION -->
        <section id="{{ $category->slug }}"
                 class="container py-5"
                 style="max-width: 960px;">

            <!-- Header Section -->
            <div class="mb-5">

                <h1 class="display-3 fw-normal text-black mb-4"
                    style="font-family: Georgia, serif;">

                    {{ $category->name }}

                </h1>

            </div>


            {{-- ========================= --}}
            {{-- CATEGORY CONFERENCES --}}
            {{-- ========================= --}}

            @forelse($category->conferences as $conference)

                <!-- Conference Item -->
                <div class="row g-4 align-items-center py-5 border-top border-dark">

                    <!-- Left Image -->
                    <div class="col-12 col-md-5">

                        <div class="card-bg-peach rounded-1 p-4 d-flex justify-content-center align-items-center position-relative"
                             style="height: 220px;">

                            @if($conference->cover_image)

                                <img src="{{ asset('images/conference/' . $conference->cover_image) }}"
                                     alt="{{ $conference->title }}"
                                     class="img-fluid rounded-1 object-fit-cover shadow-sm"
                                     style="width: 100%; height: 100%; object-fit: cover;">

                            @else

                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">

                                <span class="text-muted">
                                    No Image
                                </span>

                                </div>

                            @endif


                            <!-- Start Time Badge -->
{{--                            @if($conference->start_time)--}}

{{--                                <span class="position-absolute bottom-0 start-50 translate-middle-x mb-3 badge-time">--}}

{{--                                {{ \Carbon\Carbon::parse($conference->start_time)->format('g.i A') }}--}}

{{--                            </span>--}}

{{--                            @endif--}}

                        </div>

                    </div>


                    <!-- Right Content -->
                    <div class="col-12 col-md-7 ps-md-4">

                        <!-- Conference Title -->
                        <h2 class="h2 fw-normal text-black mb-2"
                            style="font-family: Georgia, serif; line-height: 1.2;">

                            {{ $conference->title }}

                        </h2>


                        <!-- Conference Time -->
                        @if($conference->start_time && $conference->end_time)

                            <p class="small text-muted fw-semibold mb-1">

                                {{ \Carbon\Carbon::parse($conference->start_time)->format('g.i A') }}

                                -

                                {{ \Carbon\Carbon::parse($conference->end_time)->format('g.i A') }}

                            </p>

                        @endif


                        <!-- Conference Tag -->
                        @if($conference->tag)

                            <p class="text-uppercase text-muted fw-bold mb-3"
                               style="font-size: 0.68rem; letter-spacing: 0.5px;">

                                {{ $conference->tag }}

                            </p>

                        @endif


                        <!-- Conference Details -->
                        @if($conference->details)

                            <p class="small text-dark mb-4"
                               style="line-height: 1.5; font-size: 0.85rem;">

                                {{ \Illuminate\Support\Str::limit(strip_tags($conference->details), 300) }}

                            </p>

                        @endif


                        <!-- Video Link -->
                        @if($conference->videos_link)

                            <a href="{{ $conference->videos_link }}"
                               target="_blank"
                               class="btn btn-dark rounded-pill px-4 py-2 text-uppercase fw-semibold"
                               style="font-size: 0.72rem; letter-spacing: 1px;">

                                Watch Recording

                                <i class="bi bi-arrow-right ms-2"></i>

                            </a>

                        @elseif($conference->videos_file)

                            <a href="{{ asset('images/conference/video/' . $conference->videos_file) }}"
                               target="_blank"
                               class="btn btn-dark rounded-pill px-4 py-2 text-uppercase fw-semibold"
                               style="font-size: 0.72rem; letter-spacing: 1px;">

                                Watch Recording

                                <i class="bi bi-arrow-right ms-2"></i>

                            </a>

                        @endif

                    </div>

                </div>

            @empty

                <!-- No Conference -->
                <div class="border-top border-dark py-4">

                    <p class="text-muted mb-0">
                        No conference available.
                    </p>

                </div>

            @endforelse


            <!-- Bottom Border -->
            <div class="border-top border-dark"></div>

        </section>

    @empty

        <section class="container py-5">

            <p class="text-muted text-center">
                No categories available.
            </p>

        </section>

    @endforelse




    <section class="py-5 d-flex align-items-center min-vh-50" style="background-color: #b5d8d3;">
        <div class="container py-lg-5">
            <div class="row g-4 align-items-start">

                <!-- Left Column: Label -->
                <div class="col-12 col-md-4 col-lg-3">
                <span class="text-uppercase fw-semibold small text-black" style="letter-spacing: 1.5px; font-size: 0.8rem;">
                    INTERACTIVE
                </span>
                </div>

                <!-- Right Column: Heading, Paragraph & Call to Action Button -->
                <div class="col-12 col-md-8 col-lg-9 ps-lg-4">
                    <h2 class="display-3 fw-normal text-black mb-4" style="font-family: Georgia, serif; line-height: 1.1;">
                        Are you a 21st-century leader?
                    </h2>

                    <p class="text-black mb-5 pe-lg-5" style="font-size: 1.05rem; line-height: 1.6; max-width: 680px;">
                        Step into a position of leadership and explore what it takes to create a reimagined state. Set your priorities, invest in tech infrastructure, implement policies and see your impact.
                    </p>

                    <div>
                        <a href="#" class="btn btn-dark rounded-pill px-4 py-3 text-uppercase fw-semibold d-inline-flex align-items-center gap-2" style="font-size: 0.75rem; letter-spacing: 1px;">
                            REIMAGINE THE STATE <i class="bi bi-arrow-right fs-6"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Explore -->
    <section class="py-5" style="background-color: #f4f4f4;">
        <div class="container py-lg-5">
            <div class="row g-4 align-items-start">

                <!-- Left Column: Label -->
                <div class="col-12 col-md-3">
                <span class="text-uppercase fw-normal small text-dark" style="letter-spacing: 1px; font-size: 0.75rem;">
                    EXPLORE
                </span>
                </div>

                <!-- Right Column: Navigation Links -->
                <div class="col-12 col-md-9 col-lg-8">
                    <div class="d-flex flex-column">

                        @forelse($vision->categories as $category)

                            <a href="#{{ $category->slug }}"
                               class="list-group-item bg-transparent text-black border-0 border-bottom border-dark py-4 px-0 d-flex justify-content-start align-items-center gap-3 text-decoration-none">

                            <span class="fs-2 fw-normal"
                                  style="font-family: Georgia, serif;">
                                {{ $category->name }}
                            </span>

                                <i class="bi bi-arrow-right-circle-fill fs-3"></i>

                            </a>

                        @empty

                            <p class="text-muted">
                                No categories available.
                            </p>

                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@extends('frontend.layout')
@section('content')

    <!-- initiative -->
    <section class="vision-section py-5 text-bg-dark">
        <br>
        <div class="container ">
            <div class="mt-5">
                <small class="text-uppercase text-white fw-semibold">Initiatives</small>
                <h1 class="display-1 fw-bold mt-3 mb-5">
                    Future of
                    <span class="d-inline-block border border-2 border-white rounded-pill px-4 py-2">
                        Britain
                    </span>
                </h1>
                <p class="lead w-75">
                    {!! $future->details !!}
                    </p>
            </div>
            <!-- শুধুমাত্র এই ডাইভটিতেই ওভারল্যাপ ক্লাস থাকবে -->
            <div class="overlapping-image-wrapper ">
                <img
                    src="{{ asset('images/future/'.$future->cover_image) }}"
                    class="img-fluid w-100  shadow-lg  object-fit-cover"
                    alt="Hero Banner Image"
                >
            </div>
        </div>

    </section>

    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row">
                <!-- Left Column: Title -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <span class="text-uppercase fw-semibold tracking-wide small">Explore Our Vision</span>
                </div>

                <!-- Right Column: Conference List -->
                <div class="col-lg-9">
                    <!-- 2024 Item -->
                    @foreach($visions as $vision)
                    <div class="row align-items-center pb-5">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <img src="{{ asset('images/explore-vision/'.$vision->cover_image) }}" alt="Future of Britain Conference 2024" class="img-fluid rounded-1 w-100 object-fit-cover" style="height: 220px;">
                        </div>
                        <div class="col-md-7 ps-md-4">
                            <h2 class="display-6 mb-4"> {{ $vision->name }}</h2>
                            <a href="{{route('future.details',$vision->slug)}}" class="btn btn-dark text-uppercase fw-semibold rounded-pill px-4 py-2 small">
                                {{$vision->tag}} &rarr;
                            </a>
                        </div>
                    </div>

                    <hr class="border-dark my-0">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-powderblue">
        <div class="container py-5">
            <div class="mb-5">
                <h2 class="display-1 fw-bold">Explore the topics</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
                <!-- Card 1: Health -->
                @foreach($explores as $explore)
                <div class="col">
                    <hr>
                    <div class="card h-100 bg-transparent border-0">
                        <div class="card-body">
                            <h3 class="card-title mb-5"> {{ $explore->title }}</h3>
                            <h2 class="card-title"> {{ $explore->topic ?: 'N/A' }}</h2>
                            <p class="card-text mb-4 fw-bold">{!!  $explore->details ?: 'N/A'  !!}</p>
                            <a href="#" class="btn btn-outline-dark text-uppercase fw-semibold rounded-pill px-4 py-2">
                                {{$explore->tag}} &rarr;</a>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block">
                </div>
                @endforeach
            </div>
            <!-- শুধুমাত্র এই ডাইভটিতেই ওভারল্যাপ ক্লাস থাকবে -->
            <div class="overlapping-image-wrapper ">
                <img
                    src="{{ asset('frontend/img/1.webp') }}"
                    class="img-fluid w-100  shadow-lg  object-fit-cover"
                    alt="Hero Banner Image"
                >
            </div>
        </div>
    </section>

    <!-- Explore -->
    <section class="py-5 bg-dark text-white">
        <div class="container py-4">
            <div class="row g-4">

                <!-- Left Column: Badge / Label -->
                <div class="col-md-3">
                    <span class="badge text-secondary-emphasis text-uppercase fw-normal rounded-1 px-2 py-1">
                        EXPLORE
                    </span>
                </div>

                <!-- Right Column: Links List -->
                <div class="col-md-9">
                    <div class="d-flex flex-column">

                        <!-- Item 1 -->
                        <a href="#"
                           class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                            <span class="display-5 font-serif">Insights</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                        <!-- Item 2 -->
                        <a href="#"
                           class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                            <span class="display-5 font-serif">Approach</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                        <!-- Item 3 -->
                        <a href="#"
                           class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-bottom border-secondary">
                            <span class="display-5 font-serif">Partnerships</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

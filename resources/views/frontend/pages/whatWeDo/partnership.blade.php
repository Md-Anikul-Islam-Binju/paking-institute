@extends('frontend.layout')
@section('content')

    <!-- Partnerships -->

    <section class="vision-section py-5 text-bg-dark">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Partnerships</small>
                <h2 class="display-1 fw-bold mt-3">{{$partnership->title}}</h2>
                <h5>{!! $partnership->details  !!}</h5>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5">
            <div class="mb-5">
                <h1 class="display-1 fw-bold">How to get involved</h1>
                <p class="lead w-75">
                    Whether you’re looking to connect with global changemakers or co-develop scalable technology solutions with governments, TBI offers multiple ways to partner.
                </p>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
                @foreach($involveds as $involved)
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('images/involved/'.$involved->image) }}" style="height: 40rem" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">  {{ $involved->title }}</h2>
                            <p class="card-text mb-4">{!!$involved->details !!}</p>
                            <button class="btn btn-outline-dark text-uppercase fw-semibold rounded-pill px-4 py-2">Join Our Network </button>
                        </div>
                    </div>
                </div>
                @endforeach
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
                        <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                            <span class="display-5 font-serif">Insights</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                        <!-- Item 2 -->
                        <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                            <span class="display-5 font-serif">Approach</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                        <!-- Item 3 -->
                        <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-bottom border-secondary">
                            <span class="display-5 font-serif">Partnerships</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

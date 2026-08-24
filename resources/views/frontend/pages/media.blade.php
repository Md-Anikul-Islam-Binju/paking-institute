@extends('frontend.layout')
@section('content')

    <section class="mt-5" data-header-theme="light">
        <br><br>
        <div class="container">
            <div class="mb-4">
                <h1 class="display-1">Media Centre</h1>
            </div>
            <div class="row d-flex flex-column flex-md-row gap-5">
                <!-- Image Column (First on mobile, second on desktop) -->
                <div class="col-md-5 order-1 order-md-2 mb-4 mb-md-0">
                    <img src="https://via.placeholder.com/600x400" alt="Media Centre" class="img-fluid rounded">
                </div>

                <!-- Text Column (Second on mobile, first on desktop) -->
                <div class="col-md-5 order-2 order-md-1">
                    <p class="fw-bold mb-3">
                        Here you’ll find TBI’s latest press releases, statements, and insights from our team.
                    </p>
                    <p class="fw-bold mb-3">
                        If you have a media enquiry, or you would like to speak with one of our experts, please click the link below.
                    </p>

                    <button class="btn btn-outline-dark rounded-pill px-4 d-inline-flex align-items-center gap-2">
                        Get in touch <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container py-4">

            <!-- Item 1 -->
            <article class="border-top border-bottom border-dark border-1 py-4">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-circle-fill text-dark me-2 fs-6" style="font-size: 8px !important;"></i>
                    <span class="text-uppercase fw-semibold small tracking-wide">News</span>
                </div>
                <h2 class="display-6 text-dark font-serif my-2">
                    <a href="#" class="text-decoration-none text-dark">Tony Blair's tribute to Kevin Keegan</a>
                </h2>
                <p class="text-uppercase text-secondary small mt-3 mb-0">20th July 2026</p>
            </article>

            <!-- Item 2 -->
            <article class="border-bottom border-dark border-1 py-4">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-circle-fill text-dark me-2" style="font-size: 8px !important;"></i>
                    <span class="text-uppercase fw-semibold small">News</span>
                </div>
                <h2 class="display-6 text-dark my-2">
                    <a href="#" class="text-decoration-none text-dark">Tony Blair's tribute to Roy Hattersley</a>
                </h2>
                <p class="text-uppercase text-secondary small mt-3 mb-0">15th June 2026</p>
            </article>

            <!-- Item 3 -->
            <article class="border-bottom border-dark border-1 py-4">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-circle-fill text-dark me-2" style="font-size: 8px !important;"></i>
                    <span class="text-uppercase fw-semibold small">News</span>
                </div>
                <h2 class="display-6 text-dark my-2">
                    <a href="#" class="text-decoration-none text-dark">
                        Europe must shift from “climate-first, climate only” approach to energy
                    </a>
                </h2>
                <p class="text-uppercase text-secondary small mt-3 mb-0">5th May 2026</p>
            </article>

            <!-- Item 4 -->
            <article class="border-bottom border-dark border-1 py-4">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-circle-fill text-dark me-2" style="font-size: 8px !important;"></i>
                    <span class="text-uppercase fw-semibold small">News</span>
                </div>
                <h2 class="display-6 text-dark my-2">
                    <a href="#" class="text-decoration-none text-dark">TBI calls for biggest overhaul of state</a>
                </h2>
                <p class="text-uppercase text-secondary small mt-3 mb-0">2nd May 2026</p>
            </article>

        </div>
    </section>


@endsection

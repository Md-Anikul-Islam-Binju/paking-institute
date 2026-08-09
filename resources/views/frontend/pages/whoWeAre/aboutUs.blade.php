@extends('frontend.layout')
@section('content')

    <!-- ABOUT US -->

    <section class="vision-section py-5 bg-light text-dark">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">About Us</small>
                <h2 class="display-2 fw-bold mt-3"> {{$aboutUs->title}}</h2>
            </div>
        </div>
    </section>

    <!-- OUR VISION -->

    <section class="vision-section py-5 bg-dark text-white">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Our Vision</small>
                <h2 class="display-2 fw-bold mt-3"> {{$ourVision->title}}</h2>
            </div>

            <div class="row mt-4">
                <div class="col-lg-5"></div>

                <div class="col-lg-5 offset-lg-2 d-flex flex-column justify-content-center">
                    <p class="lead fw-bold">
                        {!! $ourVision->details !!}
                    </p>

                    <p class="lead fs-5 mt-4 fw-bold">
                        If you believe politics done well has the power to transform lives, we invite you to
                        <a href="" class="text-white text-decoration-underline">learn about our approach</a>,
                        <a href="" class="text-white text-decoration-underline">explore our insights</a> or
                        <a href="" class="text-white text-decoration-underline">join our team</a>.
                    </p>
                </div>
            </div>

            <div class="row mt-3 d-flex align-items-center">

                <div class="col-lg-6">

                    <img src="{{ asset($ourVision->cover_image) }}" class="img-fluid vision-img-large" alt="">

                </div>

                <div class="col-lg-6">

                    <div class="small-image-wrapper w-50">

                        <img src="{{ asset($ourVision->support_image) }}" class="img-fluid vision-img-small" alt="">

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- COUNTER-->

    <section class="counter-section py-5">

        <div class="container">

            <div class="row text-center gy-5 ">
                <div class="col-md-4">
                    <h2 class="counter-number  display-1 fw-bold">
                        {{$ourVision->staff_creating_change_no}}+
                    </h2>
                    <p class="fw-bold">
                        staff creating change
                    </p>
                </div>

                <div class="col-md-4">

                    <h2 class="counter-number  display-1 fw-bold">
                        {{$ourVision->making_an_impact_no}}+
                    </h2>

                    <p class="fw-bold">
                        countries where we're making an impact
                    </p>

                </div>

                <div class="col-md-4">

                    <h2 class="counter-number  display-1 fw-bold">
                        {{$ourVision->bold_partners_no}}+
                    </h2>

                    <p class="fw-bold">
                        bold partners in action
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- JOIN US -->
    <section class="vision-section py-5 bg-light text-dark">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Join Us</small>
                <h2 class="display-2 fw-bold mt-3"> We don’t just talk, we do. Lead the change with us</h2>
            </div>

            <div class="row mt-4">
                <div class="col-lg-5"></div>

                <div class="col-lg-5 offset-lg-2 d-flex flex-column justify-content-center">
                    <p class="lead fw-bold">
                        We’re a global team of political strategists, policy experts, delivery practitioners, technology specialists and more. We’re from the public, private and tech sectors. We come from over 50 different countries and speak over 45 languages. We are united in our desire to make the world a better place and our optimism that it can be done. If you’re a dynamic changemaker who shares our vision, there’s room at our table for you.
                    </p>
                    <button class="btn btn-dark rounded-pill mt-4 w-50">BE PART OF IT <i class="bi bi-arrow-right"></i></button>
                </div>
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

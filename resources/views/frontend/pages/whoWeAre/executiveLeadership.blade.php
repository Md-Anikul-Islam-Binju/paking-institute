@extends('frontend.layout')
@section('content')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            background: #f8f8f8;
        }

        section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 48px;
            font-weight: 400;
            margin-bottom: 50px;
        }

        .member-card img {
            width: 100%;
            height: 430px;
            object-fit: cover;
            background: #ddd;
            transition: transform 0.4s ease;
        }

        .member-card:hover img {
            transform: scale(1.05);
        }

        .member-info {
            padding-top: 20px;
        }

        .member-info h4 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .member-info p {
            margin: 0;
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
        }

        /* Bottom Navigation */
        .slider-bottom {
            display: flex;
            align-items: center;
            margin-top: 50px;
        }

        .slider-line {
            flex: 1;
            height: 1px;
            background: #d9d9d9;
        }

        .slider-nav {
            display: flex;
            gap: 15px;
            margin-left: 35px;
        }

        .custom-prev,
        .custom-next {
            position: static !important;
            margin: 0 !important;
            width: 60px;
            height: 60px;
            border: 1px solid #222;
            border-radius: 50%;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .custom-prev::after,
        .custom-next::after {
            display: none;
        }

        .custom-prev:hover,
        .custom-next:hover {
            background: #000;
            color: #fff;
        }

        /* Responsive Styles */
        @media (max-width: 767px) {
            .slider-bottom {
                flex-direction: column;
                gap: 25px;
            }

            .slider-nav {
                margin-left: 0;
            }

            .section-title {
                font-size: 36px;
            }

            .member-card img {
                height: 350px;
            }
        }
    </style>
    <section class="vision-section py-5 text-bg-dark">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Leadership</small>
                <h2 class="display-1 fw-bold mt-3 w-100">{{$leadership->title}}</h2>
            </div>
            <!-- শুধুমাত্র এই ডাইভটিতেই ওভারল্যাপ ক্লাস থাকবে -->
            <div class="overlapping-image-wrapper ">
                <img
                    src="{{ asset($leadership->cover_image) }}"
                    class="img-fluid w-100  shadow-lg  object-fit-cover"
                    alt="Hero Banner Image"
                >
            </div>

        </div>
    </section>

    <section class="py-5 py-lg-6">
        <div class="container py-5">
            <div>
                <small class="text-uppercase fw-semibold text-secondary">
                    Our Goal
                </small>
                <div class="mb-5">
                    <h2 class="display-1">
                        {{$ourGoal->title}}
                    </h2>
                </div>
            </div>

            <h2 class="display-1 fw-normal mt-4 lh-1 font-serif">
            </h2>

            <div class="row g-5 align-items-start">

                <!-- Left -->
                <div class="col-lg-6"></div>

                <!-- Right -->
                <div class="col-lg-5 offset-lg-1 d-flex flex-column justify-content-between">

                    <div class="mt-lg-5 pt-lg-5">
                        <p class="fs-4 lh-lg mb-0">
                            {!! $ourGoal->details !!}
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Executive Leadership Section -->
    <section class="py-5 bg-light">
        <div class="container py-md-4">
            <div class="row align-items-center g-4 g-lg-5">

                <!-- Left Column: Title, 2 Paragraphs, 1 Button -->
                <div class="col-12 col-md-6 pe-md-4">
                    <h2 class="font-serif display-6 text-dark fw-normal mb-4">
                        {{$tonyBlair->name}}<br>
                        <span> {{$tonyBlair->designation}}</span>
                    </h2>
                    <p class="text-secondary mb-4">
                        {!! $tonyBlair->details !!}
                    </p>

                    <a href="#" class="btn btn-dark rounded-pill px-4 py-2 text-uppercase fw-bold btn-sm tracking-wider">
                        Read More <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

                <!-- Right Column: Image -->
                <div class="col-12 col-md-6">
                    <img src="{{ asset('images/management/'.$tonyBlair->image) }}" alt="Tony Blair" class="img-fluid w-100 object-fit-cover">
                </div>

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-md-4">
            <div class="row align-items-center g-4 g-lg-5">
                <!-- Left Column: Image -->
                <div class="col-12 col-md-6">
                    <img src="{{ asset('images/management/'.$catherineRimmer->image) }}" alt="Catherine Rimmer" class="img-fluid w-100 object-fit-cover">
                </div>
                <!-- Right Column: Title, 2 Paragraphs, 1 Button -->
                <div class="col-12 col-md-6 ps-md-4">
                    <h2 class="font-serif display-6 text-dark fw-normal mb-4">
                        {{$catherineRimmer->name}}<br>
                        <span> {{$catherineRimmer->designation}}</span>
                    </h2>
                    <p class="text-secondary mb-3"> {!! $catherineRimmer->details !!}</p>
                    <a href="#" class="btn btn-dark rounded-pill px-4 py-2 text-uppercase fw-bold btn-sm tracking-wider">
                        Read More <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2 class="section-title">Management Board</h2>

            <!-- Swiper Slider Container -->
            <div class="swiper managementSlider">
                <div class="swiper-wrapper">

                    <!-- Member Card 1 -->
                    @foreach($managementBoards as $managementBoard)
                    <div class="swiper-slide">
                        <div class="member-card">
                            <img src="{{ asset('images/management/'.$managementBoard->image) }}" alt="John Smith">
                            <div class="member-info">
                                <h4>{{$managementBoard->name}}</h4>
                                <p>{{$managementBoard->designation}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Bottom Navigation -->
            <div class="slider-bottom">
                <div class="slider-line"></div>
                <div class="slider-nav">
                    <div class="custom-prev" role="button" aria-label="Previous slide">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </div>
                    <div class="custom-next" role="button" aria-label="Next slide">
                        <i class="bi bi-arrow-right fs-5"></i>
                    </div>
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

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/boxicons.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper Initialization Script -->
    <script>
        const swiper = new Swiper(".managementSlider", {
            loop: true,
            spaceBetween: 25,
            slidesPerView: 1,
            navigation: {
                nextEl: ".custom-next",
                prevEl: ".custom-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        });
    </script>
@endsection

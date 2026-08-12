@extends('frontend.layout')
@section('content')
    <style>
        .video-wrapper {
            position: relative;
            cursor: pointer;
        }

        .play-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ffffff;
            border: none;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            color: #000000;
            transition: transform 0.2s ease, opacity 0.3s ease;
        }

        .play-btn:hover {
            transform: translate(-50%, -50%) scale(1.08) !important;
        }

        .duration-badge {
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
    </style>
    <!-- ABOUT US -->

    <section class="vision-section py-5 text-bg-dark">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Careers</small>
                <h2 class="display-1 fw-bold mt-3">{{$career->title}}</h2>
                <h5>{!! $career->details !!}</h5>
                <button class="btn btn-outline-light rounded-pill mt-3 py-2 text-uppercase fw-semibold ">Find Your Role <i class="bi bi-arrow-right ms-2"></i></button>
            </div>

        </div>
    </section>

    <!-- OUR VISION -->
    <section class="vision-section py-5 text-bg-white">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Our Culture</small>
                <h2 class="display-2 fw-bold mt-3">{{$culture->title}}</h2>
            </div>

            <div class="row mt-4">
                <div class="col-lg-5"></div>

                <div class="col-lg-5 offset-lg-2 d-flex flex-column justify-content-center">
                    <p class="lead fw-bold">
                        {!! $culture->details !!}
                    </p>
                    <button class="btn btn-outline-dark rounded-pill mt-2 py-2 w-25 text-uppercase fw-semibold ">
                        About Us <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <div class="video-wrapper overflow-hidden rounded shadow" id="videoContainer">
                <video id="myVideo" class="w-100 d-block ifject-fit-cover">
                    <source src="{{ asset($culture->videos_file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Centered Custom Play Button -->
                <button id="playBtn" class="play-btn position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center text-uppercase shadow-sm">
                    PLAY
                </button>

                <!-- Time Duration Badge (Bottom Right) -->
                <div id="videoDuration" class="duration-badge position-absolute bottom-0 end-0 m-3 text-white">
                    01:28
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

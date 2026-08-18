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

        /*for image slider*/
        .custom-carousel-wrapper {
            overflow: hidden;
            padding-top: 30px;
            position: relative;
        }

        .custom-carousel-inner {
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.5s ease-in-out;
        }

        .slider-card {
            flex: 0 0 78%;
            padding: 0 3px;
            transition: transform 0.5s ease, opacity 0.5s ease;
            opacity: 0.45;
            transform: scale(0.95);
        }

        .slider-card.active {
            opacity: 1;
            transform: scale(1);
        }

        .slider-card img {
            width: 100%;
            height: 45rem;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        /* Bottom Divider Line */
        .slider-divider {
            border: 0;
            border-top: 1px solid #e0e0e0;
            margin: 25px 0 20px 0;
            opacity: 1;
        }

        /* Controls Container at Bottom Right */
        .controls-container {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-right: 15px;
        }

        /* Minimalist Circle Buttons */
        .btn-control {
            width: 42px;
            height: 42px;
            background-color: transparent;
            color: #333;
            border: 1px solid #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .btn-control:hover {
            background-color: #333;
            color: #fff;
        }
    </style>

    <!-- ABOUT US -->

    <section class="vision-section py-5 bg-light text-dark">
        <div class="container ">
            <div class="mt-2 mb-5">
                <small class="text-uppercase text-secondary fw-semibold">About Us</small>
                <h2 class="display-2 fw-bold mt-3"> {{$aboutUs->title}}</h2>
            </div>
            <!-- শুধুমাত্র এই ডাইভটিতেই ওভারল্যাপ ক্লাস থাকবে -->
            <div class="overlapping-image-wrapper ">
                <img
                    src="{{ asset($aboutUs->cover_image) }}"
                    class="img-fluid w-100  shadow-lg  object-fit-cover"
                    alt="Hero Banner Image"
                >
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

    <!--video section-->
    <section class="py-5">
        <div class="container">

            <div class="video-wrapper overflow-hidden rounded shadow" id="videoContainer">
                <video id="myVideo" class="w-100 d-block ifject-fit-cover">
                    <source src="{{ asset($ourVision->video_file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Centered Custom Play Button -->
                <button id="playBtn"
                        class="play-btn position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center text-uppercase shadow-sm">
                    PLAY
                </button>

                <!-- Time Duration Badge (Bottom Right) -->
                <div id="videoDuration" class="duration-badge position-absolute bottom-0 end-0 m-3 text-white">
                    01:28
                </div>
            </div>

        </div>
    </section>

    <!-- JOIN US -->
    <section class="vision-section py-5 bg-light text-dark">
        <div class="container ">
            <div class="mt-2">
                <small class="text-uppercase text-secondary fw-semibold">Join Us</small>
                <h2 class="display-2 fw-bold mt-3"> {{$join->title}}</h2>
            </div>

            <div class="row mt-4">
                <div class="col-lg-5"></div>

                <div class="col-lg-5 offset-lg-2 d-flex flex-column justify-content-center">
                    <p class="lead fw-bold">
                       {!! $join->details !!}
                    </p>
                    <a href="{{route('career')}}" class="btn btn-dark rounded-pill mt-4 w-50">BE PART OF IT <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>


    <!--slider sction -->
    <!-- Slider Section -->
    <div class="my-5 custom-carousel-wrapper">

        <!-- Slider Track -->
        <div class="custom-carousel-inner" id="sliderTrack">

            @foreach($aboutSliders as $key => $aboutSlider)

                <div class="slider-card">

                    <img
                        src="{{ asset('images/about-slider/' . $aboutSlider->image) }}"
                        alt="{{ $aboutSlider->title }}"
                    >

                </div>

            @endforeach

        </div>


        <!-- Divider Line -->
        <div class="container">

            <hr class="slider-divider">

            <!-- Navigation Buttons -->
            <div class="controls-container">

                <button class="btn-control"
                        id="prevBtn"
                        aria-label="Previous">

                    <i class="bi bi-arrow-left"></i>

                </button>


                <button class="btn-control"
                        id="nextBtn"
                        aria-label="Next">

                    <i class="bi bi-arrow-right"></i>

                </button>

            </div>

        </div>

    </div>


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

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const track = document.getElementById('sliderTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');


            function updateActiveState() {

                const cards = track.querySelectorAll('.slider-card');

                // Remove active class from all
                cards.forEach(card => {
                    card.classList.remove('active');
                });

                // Find middle item
                const middleIndex = Math.floor(cards.length / 2);

                // Add active class only to middle item
                if (cards[middleIndex]) {
                    cards[middleIndex].classList.add('active');
                }
            }


            // Next
            nextBtn.addEventListener('click', function () {

                const firstCard = track.firstElementChild;

                track.appendChild(firstCard);

                updateActiveState();

            });


            // Previous
            prevBtn.addEventListener('click', function () {

                const lastCard = track.lastElementChild;

                track.insertBefore(
                    lastCard,
                    track.firstElementChild
                );

                updateActiveState();

            });


            // Initial active state
            updateActiveState();

        });
    </script>
@endsection
